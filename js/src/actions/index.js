'use strict';

export const setContext = (route, template_tags, posts, nav_menus, sidebars, user) => ({ type: 'SET_CONTEXT', route, template_tags, posts, nav_menus, sidebars, user });

export function navigate(location, apiUrl, user) {
	return function (dispatch) {
		if ('' === location) {
			location = '/';
		}

		if (window && window.jQuery) {
			let data = {
				location: location
			};

			if (user && user.rest_nonce) {
				data._wpnonce = user.rest_nonce;
			}

			return jQuery.ajax({
				url: apiUrl,
				method: 'get',
				data: data,
				xhrFields: {
					withCredentials: true
				}
			}).done(function(data) {
				dispatch(setContext(
					data.route,
					data.template_tags,
					data.posts,
					data.nav_menus,
					data.sidebars,
					data.user
				));

				history.pushState({}, data.route.document_title, location);
			}).error(function() {
				// @Todo: Handle error gracefully
				console.log('An error occured');
			});
		}
	};
}
