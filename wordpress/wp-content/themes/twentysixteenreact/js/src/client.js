'use strict';

import React from 'react';
import ReactDOMServer from 'react-dom/server';
import App from './components/App.jsx';
import reducer from './reducer';
import { render } from 'react-dom';
import { createStore, applyMiddleware } from 'redux';
import { Provider } from 'react-redux';
import { Map } from 'immutable';
import thunk from 'redux-thunk';

let initialState = Map(window.__INITIAL_STATE__);

const store = createStore(reducer, initialState, applyMiddleware(thunk));

render(
	<Provider store={store}>
		<App />
	</Provider>,
	document.querySelector('.reactifywp-app-container')
);
