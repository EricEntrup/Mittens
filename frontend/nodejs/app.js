require('dotenv').config({
  path: `./.env`,
});

var express = require('express');
var path = require('path');
var cookieParser = require('cookie-parser');
var logger = require('morgan');
const session = require('express-session');
const initAuthMiddleware = require('./features/login/init-auth-middleware');
var indexRouter = require('./routes/index');

const staticFolder = 'public';
var app = express();

// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'pug');
//app.set('base', process.env.BASE_URL);
app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use('/', express.static(path.join(__dirname, staticFolder)));

const { COOKIE_EXPIRATION_MS } = process.env;
app.use(
    session({
      secret: 'keyboard cat',
      name: process.env.SESSION_COOKIE_NAME,
      resave: false,
      saveUninitialized: true,
      cookie: {
        secure: process.env.NODE_ENV === 'production',
        expires: Date.now() + parseInt(COOKIE_EXPIRATION_MS, 10),
        maxAge: parseInt(COOKIE_EXPIRATION_MS, 10),
      },
    })
);

initAuthMiddleware(app);

app.use((req, res, next) => {
  if (req.session) {
    res.locals.messages = req.session.messages;
    res.locals.userInfo = req.session.userInfo;
    req.session.messages = {};
  }
  next();
});

app.use('/', indexRouter);

// catch 404 and forward to error handler
app.use((req, res) => {
  res.status(404).render('Pages/404');
});


module.exports = app;
