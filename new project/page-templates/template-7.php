<?php
/* Template Name: template-7 */
get_header();

if ( have_posts() ) {
    while ( have_posts() ) { the_post(); ?>



<?php
    }
}
get_footer();?>