'use strict';

import React from 'react';
import NavMenu from './NavMenu.jsx';

class Footer extends React.Component {
	render() {
		return (
			<footer id="colophon" className="site-footer" role="contentinfo">

				{this.props.nav_menus.primary ?
					<nav className="main-navigation" role="navigation" aria-label="Footer Primary Menu">
						<NavMenu {...this.props} className="primary-menu" location="primary" />
					</nav>
				: '' }

				{this.props.nav_menus.social ?
					<nav className="social-navigation" role="navigation" aria-label="Footer Social Links Menu">
						<NavMenu {...this.props} className="social-links-menu" location="social" />
					</nav>
				: '' }

				<div className="site-info">
					{this.props.template_tags.twentysixteen_credits}
					<span className="site-title"><a href={this.props.template_tags.home_url} rel="home">{this.props.template_tags.bloginfo_name}</a></span>
					<a href="https://wordpress.org">Proudly powered by WordPress</a>
				</div>
			</footer>
		);
	}
}

export default Footer;
