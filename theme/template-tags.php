<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package southbaylawyer
 */

if ( ! function_exists( 'post_date' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function post_date() {
		$time_string = '%2$s';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '%2$s';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
		/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'southbaylawyer' ),
			'' . $time_string . ''
		);

		echo '<span><i class="fa fa-calendar"></i>' . $posted_on . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'post_author' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function post_author() {
		$byline = sprintf(
		/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'southbaylawyer' ),
			'' . esc_html( get_the_author() ) . ''
		);

		echo '<span><i class="fa fa-user"></i>' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'undercoverlawyer_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function post_categories() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'southbaylawyer' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span><i class="fa fa-sitemap"></i>' . esc_html__( '%1$s', 'southbaylawyer' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

		}


	}
	function post_tags() {

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'southbaylawyer' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<span><i class="fas fa-tags"></i>' . esc_html__( 'Tagged %1$s', 'southbaylawyer' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}

	}

	function media_terms() {
		$terms = get_the_terms( get_the_ID() , get_object_taxonomies(get_post_type())[0] );
		if ( ! empty( $terms ) ) {
			echo '<span><i class="fa fa-sitemap"></i>';
			foreach ( $terms as $term ) {
				$entry_terms .= '<a href="'.get_term_link($term->term_id).'">'.$term->name.'</a>'. ', ';
			}
			$entry_terms = rtrim( $entry_terms, ', ' );
			echo $entry_terms . '</span>';
		}
	}

endif;
/*
 * call this
<?php post_author();?>
<?php post_categories();?>
<?php post_date();?>
<?php post_tags();?>
 *
 *
 *
 */