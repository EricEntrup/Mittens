const registerRepo = require('../repository');

async function createUser(req, res) {
  let user = {};
  let userData = {};
  const registerSuccessMessage = 'You have successfully registered, you can now log in.';
  try {
    user = await registerRepo.createUser(req.body);
    userData = await registerRepo.findUser(user)
  } catch (error) {
    user = error;
  }
  if (userData.email) {
    req.session.messages = { success: registerSuccessMessage };
    res.redirect('/login');
  }
  const { code } = user;
  const databaseError =
    code === 'ER_DUP_ENTRY' ? 'The email has already been taken.' : 'Something went wrong.';
  req.session.messages = { databaseError };
  res.redirect('/register');
}

module.exports = createUser;
