'use strict';

import React from 'react';

class Sidebar extends React.Component {
    render() {
        return (
            <aside id="secondary" className="sidebar widget-area" role="complementary" dangerouslySetInnerHTML={{__html: this.props.sidebars['sidebar-1']}}>
            </aside>
        );
    }
}

export default Sidebar;
