'use strict';

class Comments extends React.Component {
	render() {
		return (
			<div id="comments" className="comments-area">

				{ parseInt(this.props.post.comments_number) > 0 ?
					<div>
						<h2 className="comments-title">
							{this.props.post.comments_title}
						</h2>

						<div dangerouslySetInnerHTML={{__html: this.props.post.comments_navigation}}></div>

						<div dangerouslySetInnerHTML={{__html: this.props.post.comments_html}}></div>

						<div dangerouslySetInnerHTML={{__html: this.props.post.comments_navigation}}></div>
					</div>
				: '' }

				<div dangerouslySetInnerHTML={{__html: this.props.post.comment_form}}></div>
			</div>
		);
	}
}

export default Comments;
