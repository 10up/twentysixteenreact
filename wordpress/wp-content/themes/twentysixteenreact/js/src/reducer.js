import {List, Map} from 'immutable';

export default function(state = Map(), action) {
	switch (action.type) {
		case 'SET_CONTEXT':
			return Map({ route: action.route, posts: action.posts, template_tags: action.template_tags, nav_menus: action.nav_menus, sidebars: action.sidebars, user: action.user });
			break;
	}

	return state;
}
