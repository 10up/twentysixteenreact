'use strict';

import React from 'react';

class NavMenu extends React.Component {
    render() {
    	function processMenuItem(menuItem, key) {
    		let classes = 'menu-item';
    		if (menuItem.children && menuItem.children.length) {
    			classes += ' menu-item-has-children';
    		}

            return (
                <li key={key} className={classes}>
                    <a href={menuItem.url}>
						{menuItem.title}
					</a>

                    {menuItem.children && menuItem.children.length ?
                    	<ul className="sub-menu">
                    		{menuItem.children.map(processMenuItem)}
                    	</ul>
                    : '' }
                </li>
            );
        }

    	let menuComponent = this.props.nav_menus[this.props.location].map(processMenuItem);
        return (
            <ul className={this.props.className}>
            	{menuComponent}
            </ul>
        );
    }
}

export default NavMenu;
