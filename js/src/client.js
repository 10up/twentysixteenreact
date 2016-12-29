'use strict';

/**
 * Includes are compiled separately for heap snapshot purposes
 */

import App from './components/App.jsx';
import { Provider } from 'react-redux';

import { render } from 'react-dom';

let initialState = includes.immutable.Map(window.__INITIAL_STATE__);

const store = includes.redux.createStore(includes.reducer, initialState, includes.redux.applyMiddleware(includes.thunk));

render(
	<Provider store={store}>
		<App />
	</Provider>,
	document.querySelector('.nodeifywp-app-container')
);
