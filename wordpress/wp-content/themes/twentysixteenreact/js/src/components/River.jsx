'use strict';

import React from 'react';
import Post from './Post.jsx';

class River extends React.Component {
    render() {
        return (
        	<div id="primary" className="content-area">
	            <main id="main" className="site-main" role="main">
		            {this.props.posts.map(function(post, key) {
		            	return <Post key={key} {...this.props} post={post} />
		            }, this)}
	            </main>
            </div>
        );
    }
}

export default River;
