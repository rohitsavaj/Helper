<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package law-ohio
 */

get_header();

if ( have_posts() ) { ?>

	<?php
	while ( have_posts() ) {
		the_post(); ?>

		<?php
	} ?>

	<?php
}

get_footer();