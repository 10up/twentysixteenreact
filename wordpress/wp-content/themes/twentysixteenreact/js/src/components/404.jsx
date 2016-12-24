'use strict';

class Missing404 extends React.Component {
	render() {
		return (
			<div id="primary" className="content-area">
				<main id="main" className="site-main" role="main">
					<section className="error-404 not-found">
						<header className="page-header">
							<h1 className="page-title">Oops! That page can&rsquo;t be found.</h1>
						</header>

						<div className="page-content">
							<p>It looks like nothing was found at this location.</p>
						</div>
					</section>
				</main>
			</div>
		);
	}
}

export default Missing404;
