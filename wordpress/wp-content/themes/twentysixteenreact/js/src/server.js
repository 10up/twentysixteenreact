'use strict';

import React from 'react';
import ReactDOMServer from 'react-dom/server';
import reducer from './reducer';
import App from './components/App.jsx';
import { createStore, applyMiddleware } from 'redux';
import { Map } from 'immutable';
import { Provider } from 'react-redux';
import _ from 'lodash';
import thunk from 'redux-thunk';

let initialState = Map({
	route: PHP.context.$route,
	posts: PHP.context.$posts,
	template_tags: _.omit(PHP.context.$template_tags, ['wp_footer']),
	nav_menus: PHP.context.$nav_menus,
	sidebars: PHP.context.$sidebars,
	user: PHP.context.$user
});

const store = createStore(reducer, initialState, applyMiddleware(thunk));

const clientUrl = PHP.context.$template_tags.stylesheet_directory_url + '/js/client.js'

print(ReactDOMServer.renderToStaticMarkup(
	<html>
        <head dangerouslySetInnerHTML={{__html: PHP.context.$template_tags.wp_head}}>
        </head>
        <body className={PHP.context.$template_tags.get_body_class}>
        	<div className="nodeifywp-app-container">
        		<Provider store={store}>
					<App />
				</Provider>
            </div>

			<script src={PHP.client_js_url}></script>
        </body>
    </html>
));
