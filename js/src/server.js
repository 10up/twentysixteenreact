'use strict';

/**
 * Includes and React are compiled separately for heap snapshots
 */

let initialState = includes.immutable.Map({
	route: PHP.context.$route,
	posts: PHP.context.$posts,
	template_tags: PHP.context.$template_tags,
	nav_menus: PHP.context.$nav_menus,
	sidebars: PHP.context.$sidebars,
	user: PHP.context.$user
});

import App from './components/App.jsx';
import { Provider } from 'react-redux';

const store = includes.redux.createStore(includes.reducer, initialState, includes.redux.applyMiddleware(includes.thunk));

print(includes.ReactDOMServer.renderToStaticMarkup(
	<html>
        <head dangerouslySetInnerHTML={{__html: PHP.context.$template_tags.wp_head}}>
        </head>
        <body className={PHP.context.$template_tags.get_body_class}>
        	<div className="nodeifywp-app-container">
        		<Provider store={store}>
					<App />
				</Provider>
            </div>

            <script src={PHP.includes_js_url}></script>
			<script src={PHP.client_js_url}></script>
        </body>
    </html>
));
