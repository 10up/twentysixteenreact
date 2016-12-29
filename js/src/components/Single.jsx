'use strict';

import Post from './Post.jsx';
import Comments from './Comments.jsx';

class Single extends React.Component {
    render() {
        return (
        	<div id="primary" className="content-area">
	            <main id="main" className="site-main" role="main">
					<Post {...this.props} post={this.props.posts[0]} />
	            </main>

	            <Comments post={this.props.posts[0]} />
            </div>
        );
    }
}

export default Single;
