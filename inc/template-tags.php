<?php
/**
 * Custom Twenty Sixteen template tags
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

\NodeifyWP\App::instance()->register_template_tag( 'twentysixteen_custom_header_sizes', function() {
	return apply_filters( 'twentysixteen_custom_header_sizes', '(max-width: 709px) 85vw, (max-width: 909px) 81vw, (max-width: 1362px) 88vw, 1200px' );
}, true, 'after_theme_setup' );

\NodeifyWP\App::instance()->register_template_tag( 'twentysixteen_the_custom_logo', function() {
	if ( function_exists( 'the_custom_logo' ) ) {
		ob_start();

		the_custom_logo();

		return ob_get_clean();
	}
} );

\NodeifyWP\App::instance()->register_post_tag( 'twentysixteen_entry_meta', function( $post ) {
	ob_start();

	if ( 'post' === get_post_type() ) {
		$author_avatar_size = apply_filters( 'twentysixteen_author_avatar_size', 49 );
		printf( '<span class="byline"><span class="author vcard">%1$s<span class="screen-reader-text">%2$s </span> <a class="url fn n" href="%3$s">%4$s</a></span></span>',
			get_avatar( get_the_author_meta( 'user_email' ), $author_avatar_size ),
			_x( 'Author', 'Used before post author name.', 'twentysixteen' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_the_author()
		);
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		twentysixteen_entry_date();
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', _x( 'Format', 'Used before post format.', 'twentysixteen' ) ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( 'post' === get_post_type() ) {
		twentysixteen_entry_taxonomies();
	}

	if ( ! is_singular() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'twentysixteen' ), get_the_title() ) );
		echo '</span>';
	}

	return ob_get_clean();
} );

\NodeifyWP\App::instance()->register_post_tag( 'twentysixteen_post_thumbnail', function() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return '';
	}

	ob_start();

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
	</a>

	<?php endif; // End is_singular()

	return ob_get_clean();
} );

\NodeifyWP\App::instance()->register_template_tag( 'twentysixteen_credits', function() {
	ob_start();

	do_action( 'twentysixteen_credits' );

	return ob_get_clean();
} );

\NodeifyWP\App::instance()->register_post_tag( 'edit_link', function() {
	ob_start();

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
			get_the_title()
		),
		'<span class="edit-link">',
		'</span>'
	);

	return ob_get_clean();
} );

\NodeifyWP\App::instance()->register_post_tag( 'comments_title', function() {
	ob_start();

    $comments_number = get_comments_number();
    if ( 1 === $comments_number ) {
        /* translators: %s: post title */
        printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'twentysixteen' ), get_the_title() );
    } else {
        printf(
            /* translators: 1: number of comments, 2: post title */
            _nx(
                '%1$s thought on &ldquo;%2$s&rdquo;',
                '%1$s thoughts on &ldquo;%2$s&rdquo;',
                $comments_number,
                'comments title',
                'twentysixteen'
            ),
            number_format_i18n( $comments_number ),
            get_the_title()
        );
    }

    return ob_get_clean();
} );

\NodeifyWP\App::instance()->register_post_tag( 'comments_title', function() {
	ob_start();

	the_comments_navigation();

	return ob_get_clean();
} );

\NodeifyWP\App::instance()->register_post_tag( 'comments_number', function() {
	return get_comments_number();
} );

\NodeifyWP\App::instance()->register_post_tag( 'comments_html', function() {
	ob_start();
	?>
	
	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'per_page'    => 20,
				'short_ping'  => true,
				'avatar_size' => 42,
			) );
		?>
	</ol>

	<?php
	return ob_get_clean();
} );

\NodeifyWP\App::instance()->register_post_tag( 'comment_form', function() {
	ob_start();

	comment_form( array(
		'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
		'title_reply_after'  => '</h2>',
	) );

	return ob_get_clean();
} );

if ( ! function_exists( 'twentysixteen_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own twentysixteen_entry_date() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_entry_date() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		get_the_date(),
		esc_attr( get_the_modified_date( 'c' ) ),
		get_the_modified_date()
	);

	printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
		_x( 'Posted on', 'Used before publish date.', 'twentysixteen' ),
		esc_url( get_permalink() ),
		$time_string
	);
}
endif;

if ( ! function_exists( 'twentysixteen_entry_taxonomies' ) ) :
/**
 * Prints HTML with category and tags for current post.
 *
 * Create your own twentysixteen_entry_taxonomies() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_entry_taxonomies() {
	$categories_list = get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'twentysixteen' ) );
	if ( $categories_list && twentysixteen_categorized_blog() ) {
		printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Categories', 'Used before category names.', 'twentysixteen' ),
			$categories_list
		);
	}

	$tags_list = get_the_tag_list( '', _x( ', ', 'Used between list items, there is a space after the comma.', 'twentysixteen' ) );
	if ( $tags_list ) {
		printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
			_x( 'Tags', 'Used before tag names.', 'twentysixteen' ),
			$tags_list
		);
	}
}
endif;

if ( ! function_exists( 'twentysixteen_categorized_blog' ) ) :
/**
 * Determines whether blog/site has more than one category.
 *
 * Create your own twentysixteen_categorized_blog() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 *
 * @return bool True if there is more than one category, false otherwise.
 */
function twentysixteen_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'twentysixteen_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'twentysixteen_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so twentysixteen_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so twentysixteen_categorized_blog should return false.
		return false;
	}
}
endif;

/**
 * Flushes out the transients used in twentysixteen_categorized_blog().
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'twentysixteen_categories' );
}
add_action( 'edit_category', 'twentysixteen_category_transient_flusher' );
add_action( 'save_post',     'twentysixteen_category_transient_flusher' );

