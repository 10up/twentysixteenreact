'use strict';

/**
 * This puts the entire React module in the global scope as "React".
 */
require('expose-loader?React!react');

let includes = {};

includes.ReactDOMServer = require('react-dom/server');
includes.reducer = require('./reducer').default;
includes.redux = require('redux');
includes.ReactRedux = require('react-redux');
includes.immutable = require('immutable');
includes._ = require('lodash');
includes.thunk = require('redux-thunk').default;
includes.htmlescape = require('htmlescape');
includes.actions = require('./actions/index.js');

module.exports = includes;
