<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package law-ohio
 */

get_header();
?>

	<div class="banner-style inner-banner">
		<div class="container container-2">
			<div class="inner-hb-center">
				<div class="inner-hb-big">
					<h1 class="text-noeffect"><?php printf( __( 'Search Results for: %s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
				</div>
			</div>
		</div>
	</div>
	<div class="middle-content">
		<div class="container container-2">
			<div class="blog-main">
				<div class="row">

					<?php
					if ( have_posts() ) {

						while ( have_posts() ) {
							the_post();
							get_template_part( 'template-parts/content', 'search' );
						}
						get_template_part('template-parts/custom/numbered', 'pagination');

					}
					else{

						get_template_part('template-parts/content', 'none');
					} ?>
				</div>
			</div>
		</div>
	</div>

<?php
get_footer();