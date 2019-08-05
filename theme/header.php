<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="icon" href="<?php the_field('favicon','option');?>">
	<?php wp_head();

	if( get_field('google_analytics','option') ) {
		the_field('google_analytics','option');
	} ?>
</head>
<body <?php body_class(); ?>>
<?php
if(get_field('schema_code')) {
	echo '<div style="display:none;">'. get_field('schema_code') . '</div>';
}
if( get_field('schema_business','option') ) {
	the_field('schema_business','option');
} ?>