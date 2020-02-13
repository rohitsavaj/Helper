<!DOCTYPE html>
<html lang="en">
<head>
	<title>WP Helper Git</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
	<h1>Guidelines for New project</h1>
</div>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h3>js/custom.js</h3>
			<a href="https://github.com/rohitsavajwebslaw/WP-Helper-Git/blob/master/custom.js">Click Here</a>
			<h3>inc/functions-custom.php</h3>
			<a href="https://github.com/rohitsavajwebslaw/WP-Helper-Git/blob/master/functions-custom.php">Click Here</a>
			<h3>custom/social-icons.php</h3>
			<a href="https://github.com/rohitsavajwebslaw/WP-Helper-Git/blob/master/social-icons.php">Click Here</a>
			<h3>custom/numbered-pagination.php</h3>
			<a href="https://github.com/rohitsavajwebslaw/WP-Helper-Git/blob/master/numbered-pagination.php">Click Here</a>
			<h3>inc/template-tags.php</h3>
			<a href="https://github.com/rohitsavajwebslaw/WP-Helper-Git/blob/master/template-tags.php">Click Here</a>
			<h3>page-templates/meta-data.php</h3>
			<a href="https://github.com/rohitsavajwebslaw/WP-Helper-Git/blob/master/meta-data.php">Click Here</a>
			<h3>custom/social-share.php</h3>
			<a href="https://github.com/rohitsavajwebslaw/WP-Helper-Git/blob/master/social-share.php">Click Here</a>
			<h3>Template part location</h3>
			<a href="https://github.com/rohitsavajwebslaw/WP-Helper-Git/blob/master/social-share.php">Click Here</a>
			<h3>Contact form 7</h3>
			<a href="https://github.com/rohitsavajwebslaw/WP-Helper-Git/blob/master/social-share.php">Click Here</a>
		</div>
	</div>
</div>

</body>
</html>


ACF fields Import - New project https://drive.google.com/file/d/1cuL2shcT5s2klJFx7ueeVU5zIGBBUWyS/view?usp=sharing

Popup - Form
https://drive.google.com/open?id=1xCsJTbN45lw6j-4B_5tboRf2ga7I6h_d

Search Form
<form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
	<input type="search" class="form-control" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />kor
</form>
<button title="Search Here" type="submit"><i class="fa fa-search"></i></button>

Site logo
<a href="<?php echo site_url();?>" title="<?php bloginfo('name');?>">
	<img src="<?php the_field('site_logo','option');?>" alt="<?php bloginfo('name');?>">
</a>

Favicon
<link rel="icon" href="<?php the_field('favicon','option');?>">