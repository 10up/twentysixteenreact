'use strict';

class Post extends React.Component {
    render() {
    	let id = 'post-' + this.props.post.ID;
    	return (
			<article id={id} className={this.props.post.post_class}>
				<header className="entry-header">
					{'single' === this.props.route ?
						<h1 className="entry-title">
							{this.props.post.the_title}
						</h1>
					:
						<h1 className="entry-title">
							<a href={this.props.post.permalink}>{this.props.post.the_title}</a>
						</h1>
					}
				</header>

				<div dangerouslySetInnerHTML={{__html: this.props.post.twentysixteen_post_thumbnail}}></div>

				<div className="entry-content" dangerouslySetInnerHTML={{__html: this.props.post.the_content}}>
				</div>

				<footer className="entry-footer" dangerouslySetInnerHTML={{__html: this.props.post.twentysixteen_entry_meta}}>
				</footer>

				<div dangerouslySetInnerHTML={{__html: this.props.post.edit_link}}></div>

			</article>
		);
    }
}

export default Post;
