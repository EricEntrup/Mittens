import os
import json
import time
import random
import numpy as np
import pandas as pd
from datetime import datetime
from flask import Flask, Markup, render_template, Response, request, jsonify
import robin_stocks as rs
from dotenv import load_dotenv
load_dotenv()
logged_in = rs.login(
    os.getenv("ROBINHOOD_USER"), 
    os.getenv("ROBINHODD_PASS")
    )
app = Flask(__name__)



TICKER = 'LTC'
queue = []

def crypto_quote(ticker):
    quote = rs.crypto.get_crypto_quote(ticker)

    data = {
        'timestamp':  datetime.now(),
        'ask_price':  float(quote['ask_price']),
        'bid_price':  float(quote['bid_price']),
        'mark_price': float(quote['mark_price']),
        'high_price': float(quote['high_price']),
        'low_price':  float(quote['low_price']),
        'open_price': float(quote['open_price']),
        'volume':     float(quote['volume']),
    }

    return data


@app.route('/update', methods=['GET', 'POST'])
def update():
    queue.append(request.json)
    return 'Success'


@app.route('/model')
def model():
    def get_update():
        prices = []

        while True:
            if len(queue) > 0:
                item = queue.pop(0)
                prices.append(item["price"])

                avg_30sec = np.convolve(np.array(prices), np.ones(30)/30, mode='valid')
                if len(avg_30sec) > 30:
                    item["avg_30sec"] = float(avg_30sec[-1])
                else:
                    item["avg_30sec"] = item["price"]
                json_data = json.dumps(item)
                yield f"data:{json_data}\n\n"

    return Response(get_update(), mimetype='text/event-stream')



# @app.route('/chart-data')
# def chart_data():
#     def get_quote():
#         i=0
#         idx=0
#         samples = pd.DataFrame()

#         while True:
#             i+=1
#             quote = crypto_quote(TICKER)
#             samples = samples.append(quote, ignore_index=True)

#             json_data = {
#                 'ask_price': samples['ask_price'].iloc[-1],
#                 'avg_30sec': np.mean(samples['ask_price'].iloc[-30:]),
#             }

#             if i%300==0 and not samples.empty:
#                 idx = samples.index[-1]
#                 json_data['avg_5min'] = np.mean(samples.loc[idx-300:idx, 'ask_price'])
#                 json_data['avg_1hr'] = np.mean(samples.loc[idx-3600:idx, 'ask_price'])

#             json_data = json.dumps(json_data)
#             yield f"data:{json_data}\n\n"
#             time.sleep(1)

#     return Response(get_quote(), mimetype='text/event-stream')



@app.route('/')
def index():
    return render_template('index.html')



if __name__ == '__main__':
    app.run(host='0.0.0.0', port=8080)