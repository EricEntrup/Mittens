import os
import gym
import requests
import tensorflow as tf
from collections import deque
import time
import random
import numpy as np
import yaml
import math
from gym import spaces

from tensorflow.keras import Model, Sequential
from tensorflow.keras.layers import Dense, Conv2D, Flatten, Input
from tensorflow.keras.optimizers import Adam
from tensorflow.keras.losses import Huber
from tensorflow.keras.initializers import he_normal
from stable_baselines.common.callbacks import BaseCallback
from tensorflow.keras.callbacks import History
from stable_baselines import PPO2
from stable_baselines.common.vec_env import DummyVecEnv
from stable_baselines.common.policies import BasePolicy, MlpLnLstmPolicy, MlpPolicy
import robin_stocks as rs
from dotenv import load_dotenv
from stable_baselines.common.callbacks import CheckpointCallback


load_dotenv()
logged_in = rs.login(
    os.getenv("ROBINHOOD_USER"), 
    os.getenv("ROBINHODD_PASS")
    )


class MittensEnv(gym.Env):
    metadata = {'render.modes': ['live', 'file', 'none']}
    viewer = None
    def __init__(self, ticker, principal=1000, receptive_field=30):
        super(MittensEnv, self).__init__()
        self.log = {}
        self.last_ask = 0
        self.last_bid = 0
        self.timestep = 0
        self.ticker = ticker
        self.holdings = 0
        self.history = []
        self.principal = principal
        self.initial_principal = principal
        self.receptive_field = receptive_field
        # self.action_space = spaces.Box(low=-1, high=1, shape=(1,), dtype=np.float32)
        self.action_space = spaces.Discrete(3)

        self.observation_space = spaces.Box(low=0, high=1, shape=(receptive_field, 8), dtype=np.float16)

    def reset(self):
        print("======================= RESTART ======================")
        self.log = {}
        self.timestep = 0
        self.holdings = 0
        self.last_ask = 0
        self.last_bid = 0
        self.average_price = 0
        self.history = []
        self.principal = self.initial_principal


        count = 0
        while count < int(2 * self.receptive_field):
            count += 1
            quote = self.crypto_quote()
            self.history.append([quote["ask_price"], quote["bid_price"], self.initial_principal, 0])
            time.sleep(1)
        quote = self.crypto_quote()
        return self._next_observation(quote["ask_price"], quote["bid_price"])

    def _next_observation(self, ask, bid):
        
        self.history.append([ask, bid, self.principal, self.holdings])

        avg_ask = np.convolve(
            np.array(self.history)[:,0], np.ones(self.receptive_field)/self.receptive_field, mode='valid')[-self.receptive_field:]

        avg_bid = np.convolve(
            np.array(self.history)[:,1], np.ones(self.receptive_field)/self.receptive_field, mode='valid')[-self.receptive_field:]

        avg1_ask = np.convolve(np.array(self.history)[:,0], np.ones(5)/5, mode='valid')[-self.receptive_field:]
        avg1_bid = np.convolve(np.array(self.history)[:,1], np.ones(5)/5, mode='valid')[-self.receptive_field:]

        avgs = np.array([avg_ask, avg_bid, avg1_ask, avg1_bid]).T
        obs = np.array(self.history[-self.receptive_field:])
        obs = np.hstack((obs, avgs))

        return obs

    def step(self, action):
        # action = action[0]
        time.sleep(1)
        crypto_amount = 0
        dollar_amount = 0
        quote =  self.crypto_quote()
        ask = quote['ask_price']
        bid = quote['bid_price']
        status = "HOLD"
        penalty = .1
        # if action < -0.1:
        if action == 0:
            status = "SELL"
            penalty = -1
            crypto_amount, dollar_amount = self.sell_order(ask, bid)
        
        # if action > 0.1:
        if action == 2:
            status = "BUY"
            penalty = -1
            crypto_amount, dollar_amount = self.buy_order(ask, bid)

        obs = self._next_observation(ask, bid)
        
        profit = self.principal + self.holdings * bid - self.initial_principal

        reward = profit + penalty
        
        done = profit < 0.3 * self.initial_principal - self.initial_principal
        
        self.logging(
            status,
            action,
            crypto_amount,
            dollar_amount,
            ask,
            bid,
            self.principal,
            self.holdings,
            reward,
            done,
            profit
        )

        return obs, reward, done, {}

    def render(self, mode='human', **kwargs):
        return

    def logging(self, status, action, crypto, dollar, ask, bid, principal, holding, reward, done, profit):
        payload = {
            "status": str(status),
            "action": float(action),
            "crypto": float(crypto),
            "dollar": float(dollar),
            "price": float(ask),
            "bid_price": float(bid),
            "principal": float(principal),
            "holding": float(holding),
            "reward": float(reward),
            "done": str(done),
            "profit": float(profit)
        }
        try:
            res = requests.post('http://localhost:8080/update', json=payload)
        except:
            print('oops')

        for i,j in payload.items():
            print(i, j)
        print("\n\n")

    def crypto_position(self):
        quantity = 0
        avg_cost = 0
        positions = rs.crypto.get_crypto_positions()
        for position in positions:
            if 'currency' in position:
                if self.ticker == position["currency"]["code"]:
                    cost = float(position["cost_bases"][0]["direct_cost_basis"])
                    quantity = float(position["cost_bases"][0]["direct_quantity"])
                    if quantity > 0:
                        avg_cost = cost / quantity

        data = {
            "quantity": quantity,
            "avg_cost": avg_cost
        }

        return data

    def crypto_quote(self):
        try:
            quote = rs.crypto.get_crypto_quote(self.ticker)

            data = {
                'ask_price':  float(quote['ask_price']),
                'volume':     float(quote['volume']),
                'bid_price': float(quote['bid_price'])
            }
        except:
            data = {
                'ask_price':  self.last_ask,
                'volume':     0,
                'bid_price': self.last_bid
            }

        return data

    def buying_power(self):
        profile = rs.profiles.load_account_profile()
        #return float(profile['buying_power'])
        return self.principal


    def selling_power(self):
        quantity = self.crypto_position()['quantity']

        return self.holdings

    def sell_order(self, ask, bid):
        # Amount of crypto coins available
        crypto_amount = self.selling_power()

        # Complete the sell order
        #status = rs.orders.order_sell_crypto_by_quantity(self.ticker, sell_amount)

        dollar_amount = bid * crypto_amount

        self.holdings -= crypto_amount

        self.principal += dollar_amount

        return crypto_amount, dollar_amount

    def buy_order(self, ask, bid):
        
        # Amount of dollars available
        dollar_amount = self.buying_power()

        # Complete the buy order
        #status = rs.order_buy_crypto_by_price(self.ticker, amountInDollars=buy_amount)

        crypto_amount = dollar_amount / ask
        
        self.holdings += crypto_amount

        self.principal -= dollar_amount

        return crypto_amount, dollar_amount
        






if __name__ == "__main__":
    from stable_baselines import ACKTR
    vect_env = DummyVecEnv([lambda: MittensEnv(ticker="LTC", principal=100, receptive_field=60)])

    model = PPO2(MlpLnLstmPolicy,
             vect_env,
             verbose=1,
             nminibatches=1,
             tensorboard_log="./tensorboard/")

    checkpoint_callback = CheckpointCallback(save_freq=500, save_path='./model_checkpoints/')

    model.learn(total_timesteps=10000, callback=[checkpoint_callback])











































# def train(self, environment, num_of_episodes = 1000):
#     total_timesteps = 0  

#     for episode in range(0, num_of_episodes):

#         # Initialize variables
#         average_loss_per_episode = []
#         average_loss = 0
#         total_epoch_reward = 0

#         done = False

#         # Reset the enviroment
#         obs = enviroment.reset()


#         while not done:

#             # Run Action
#             action = self.action(obs)

#             # Take action    
#             obs, reward, dones, info = enviroment.step(action)

            
#             loss = self.primary_network.train_on_batch(states, target)

            
#             return loss

















# class ExpirienceReplay:
#     def __init__(self, maxlen = 2000):
#         self._buffer = deque(maxlen=maxlen)
    
#     def store(self, state, action, reward, next_state, terminated):
#         self._buffer.append((state, action, reward, next_state, terminated))
              
#     def get_batch(self, batch_size):
#         if no_samples > len(self._samples):
#             return random.sample(self._buffer, len(self._samples))
#         else:
#             return random.sample(self._buffer, batch_size)
        
#     def get_arrays_from_batch(self, batch):
#         states = np.array([x[0] for x in batch])
#         actions = np.array([x[1] for x in batch])
#         rewards = np.array([x[2] for x in batch])
#         next_states = np.array([(np.zeros(NUM_STATES) if x[3] is None else x[3]) 
#                                 for x in batch])
        
#         return states, actions, rewards, next_states
        
#     @property
#     def buffer_size(self):
#         return len(self._buffer)






# class DDQNAgent:
#     def __init__(self, expirience_replay, state_size, actions_size, optimizer):
        
#         # Initialize atributes
#         self._state_size = state_size
#         self._action_size = actions_size
#         self._optimizer = optimizer
        
#         self.expirience_replay = expirience_replay
        
#         # Initialize discount and exploration rate
#         self.epsilon = MAX_EPSILON
        
#         # Build networks
#         self.primary_network = self._build_network()
#         self.primary_network.compile(loss='mse', optimizer=self._optimizer)

#         self.target_network = self._build_network()   
   
#     def _build_network(self):
#         network = Sequential()
#         network.add(Dense(30, activation='relu', kernel_initializer=he_normal()))
#         network.add(Dense(30, activation='relu', kernel_initializer=he_normal()))
#         network.add(Dense(self._action_size))
        
#         return network
    
#     def align_epsilon(self, step):
#         self.epsilon = MIN_EPSILON + (MAX_EPSILON - MIN_EPSILON) * math.exp(-LAMBDA * step)
    
#     def align_target_network(self):
#         for t, e in zip(self.target_network.trainable_variables, 
#                     self.primary_network.trainable_variables): t.assign(t * (1 - TAU) + e * TAU)
    
#     def action(self, state):
#         if np.random.rand() < self.epsilon:
#             return np.random.randint(0, self._action_size - 1)
#         else:
#             q_values = self.primary_network(state.reshape(1, -1))
#             return np.argmax(q_values)
    
#     def store(self, state, action, reward, next_state, terminated):
#         self.expirience_replay.store(state, action, reward, next_state, terminated)



#     def train(self, environment, num_of_episodes = 1000):
#         total_timesteps = 0  

#         for episode in range(0, num_of_episodes):

#             # Reset the enviroment
#             state = enviroment.reset()

#             # Initialize variables
#             average_loss_per_episode = []
#             average_loss = 0
#             total_epoch_reward = 0

#             terminated = False

#             while not terminated:

#                 # Run Action
#                 action = self.action(state)

#                 # Take action    
#                 next_state, reward, dones, _ = enviroment.step(action)

                
#                 # Predict Q(s,a) and Q(s',a') given the batch of states
#                 q_values_state = self.primary_network(states).numpy()
#                 q_values_next_state = self.primary_network(next_states).numpy()
                
#                 # Copy the q_values_state into the target
#                 target = q_values_state
#                 updates = np.zeros(rewards.shape)
                        
#                 valid_indexes = np.array(next_states).sum(axis=1) != 0
#                 batch_indexes = np.arange(BATCH_SIZE)

#                 action = np.argmax(q_values_next_state, axis=1)
#                 q_next_state_target = self.target_network(next_states)
#                 updates[valid_indexes] = rewards[valid_indexes] + GAMMA * q_next_state_target.numpy()[batch_indexes[valid_indexes], action[valid_indexes]]
                
#                 target[batch_indexes, actions] = updates
#                 loss = self.primary_network.train_on_batch(states, target)

#                 # update target network parameters slowly from primary network
#                 self.align_target_network()
                
#                 return loss





#                 loss = agent.train(BATCH_SIZE)
#                 average_loss += loss

#                 state = next_state
#                 agent.align_epsilon(total_timesteps)
#                 total_timesteps += 1

#                 if terminated:
#                     average_loss /= total_epoch_reward
#                     average_loss_per_episode.append(average_loss)
#                     self._print_epoch_values(episode, total_epoch_reward, average_loss)
                
#                 # Real Reward is always 1 for Cart-Pole enviroment
#                 total_epoch_reward +=1




















    
#     def train(self, batch_size):
#         if self.expirience_replay.buffer_size < BATCH_SIZE * 3:
#             return 0
        
#         batch = self.expirience_replay.get_batch(batch_size)
#         states, actions, rewards, next_states = expirience_replay.get_arrays_from_batch(batch)
        
#         # Predict Q(s,a) and Q(s',a') given the batch of states
#         q_values_state = self.primary_network(states).numpy()
#         q_values_next_state = self.primary_network(next_states).numpy()
        
#         # Copy the q_values_state into the target
#         target = q_values_state
#         updates = np.zeros(rewards.shape)
                
#         valid_indexes = np.array(next_states).sum(axis=1) != 0
#         batch_indexes = np.arange(BATCH_SIZE)

#         action = np.argmax(q_values_next_state, axis=1)
#         q_next_state_target = self.target_network(next_states)
#         updates[valid_indexes] = rewards[valid_indexes] + GAMMA * 
#                   q_next_state_target.numpy()[batch_indexes[valid_indexes], action[valid_indexes]]
        
#         target[batch_indexes, actions] = updates
#         loss = self.primary_network.train_on_batch(states, target)

#         # update target network parameters slowly from primary network
#         self.align_target_network()
        
#         return loss


# #https://rubikscode.net/2020/01/27/double-dqn-with-tensorflow-2-and-tf-agents-2/


# class AgentTrainer():
#     def __init__(self, agent, enviroment):
#         self.agent = agent
#         self.enviroment = enviroment
        
#     def _take_action(self, action):
#         next_state, reward, terminated, _ = self.enviroment.step(action) 
#         next_state = next_state if not terminated else None
#         reward = np.random.normal(1.0, REWARD_STD)
#         return next_state, reward, terminated
    
#     def _print_epoch_values(self, episode, total_epoch_reward, average_loss):
#         print("**********************************")
#         print(f"Episode: {episode} - Reward: {total_epoch_reward} - Average Loss: {average_loss:.3f}")
    
#     def train(self, num_of_episodes = 1000):
#         total_timesteps = 0  

#         for episode in range(0, num_of_episodes):

#             # Reset the enviroment
#             state = self.enviroment.reset()

#             # Initialize variables
#             average_loss_per_episode = []
#             average_loss = 0
#             total_epoch_reward = 0

#             terminated = False

#             while not terminated:

#                 # Run Action
#                 action = agent.act(state)

#                 # Take action    
#                 next_state, reward, terminated = self._take_action(action)
#                 agent.store(state, action, reward, next_state, terminated)
                




#                 if self.expirience_replay.buffer_size < BATCH_SIZE * 3:
#                     return 0
                
#                 batch = self.expirience_replay.get_batch(batch_size)
#                 states, actions, rewards, next_states = expirience_replay.get_arrays_from_batch(batch)
                
#                 # Predict Q(s,a) and Q(s',a') given the batch of states
#                 q_values_state = self.primary_network(states).numpy()
#                 q_values_next_state = self.primary_network(next_states).numpy()
                
#                 # Copy the q_values_state into the target
#                 target = q_values_state
#                 updates = np.zeros(rewards.shape)
                        
#                 valid_indexes = np.array(next_states).sum(axis=1) != 0
#                 batch_indexes = np.arange(BATCH_SIZE)

#                 action = np.argmax(q_values_next_state, axis=1)
#                 q_next_state_target = self.target_network(next_states)
#                 updates[valid_indexes] = rewards[valid_indexes] + GAMMA * q_next_state_target.numpy()[batch_indexes[valid_indexes], action[valid_indexes]]
                
#                 target[batch_indexes, actions] = updates
#                 loss = self.primary_network.train_on_batch(states, target)

#                 # update target network parameters slowly from primary network
#                 self.align_target_network()
                
#                 return loss





#                 loss = agent.train(BATCH_SIZE)
#                 average_loss += loss

#                 state = next_state
#                 agent.align_epsilon(total_timesteps)
#                 total_timesteps += 1

#                 if terminated:
#                     average_loss /= total_epoch_reward
#                     average_loss_per_episode.append(average_loss)
#                     self._print_epoch_values(episode, total_epoch_reward, average_loss)
                
#                 # Real Reward is always 1 for Cart-Pole enviroment
#                 total_epoch_reward +=1







# optimizer = Adam()
# expirience_replay = ExpirienceReplay(50000)
# agent = DDQNAgent(expirience_replay, NUM_STATES, NUM_ACTIONS, optimizer)
# agent_trainer = AgentTrainer(agent, enviroment)
# agent_trainer.train()







































