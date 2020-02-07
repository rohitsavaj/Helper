<?php
/*
|--------------------------------------------------------------------------
| css js include
|--------------------------------------------------------------------------
*/
function wp_enqueue_scripts_fun() {
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', get_template_directory_uri().'/js/jquery.min.js', array(),null);
	wp_enqueue_style('montserrat', 'https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700', array(), null);
	wp_enqueue_style('oswald', 'https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700', array(), null);
	wp_enqueue_style('open-sans', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600', array(), null);
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome.css', array(), null);
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/css/font-awesome.css', array(), null);
	wp_enqueue_style('animate-css', get_template_directory_uri().'/css/animate.min.css', array('bootstrap-css'),null);
	wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/css/bootstrap.min.css',array(),null);
	wp_enqueue_style('style-css', get_template_directory_uri().'/style.css', array(), null);
	wp_enqueue_style('responsive-css', get_template_directory_uri().'/css/responsive.css', array(), null);
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/js/bootstrap.min.js', array('jquery'),null,true);
	wp_enqueue_script('wow-js', get_template_directory_uri().'/js/wow.min.js', array('jquery'),null,true);
	if(is_front_page()){
		wp_enqueue_script('magnific-popup', get_template_directory_uri().'/js/jquery.magnific-popup.min.js', array(),null,true);
	}
	wp_enqueue_script('custom-js', get_template_directory_uri().'/js/custom.js', array(),null,true);
}
add_action('wp_enqueue_scripts', 'wp_enqueue_scripts_fun',11);

/*
|--------------------------------------------------------------------------
| active class
|--------------------------------------------------------------------------
*/
function my_secondary_menu_classes( $classes, $item ) {
  global $post;
  // blog single page
  $classes[] =  get_post_type();
  if ( $item->title == 'Blog' && 'post' == get_post_type() && ( is_singular('post') || is_archive() ) ) {
	  $classes[] = 'current-menu-item';
  }
  //echo '<pre>'; print_r($item); echo '</pre>';
  return $classes;
}
add_filter( 'nav_menu_css_class', 'my_secondary_menu_classes', 10, 2 );

/*
|--------------------------------------------------------------------------
| breadcrumbs
|--------------------------------------------------------------------------
*/
function breadcrumbs_func() { ob_start();
  if (function_exists('bcn_display') && !is_front_page() && !is_404()) { ?>
	  <div class='breadcrumbs' typeof='BreadcrumbList' vocab='http://schema.org/'>
		  <?php
		  bcn_display(); ?>
	  </div>
	<?php
  }
  return ob_get_clean();
}
add_shortcode('breadcrumbs', 'breadcrumbs_func');

/*
|--------------------------------------------------------------------------
| thank you redirect
|--------------------------------------------------------------------------
*/
add_action('wp_footer', 'thank_you_redirect');
function thank_you_redirect(){ ?>
  <script>
	  document.addEventListener('wpcf7mailsent', function(event) {
		  location = '<?php echo get_permalink( get_page_by_path( 'thank_you' ) );?>';
	  }, false);
  </script>
  <?php
}

/*
|--------------------------------------------------------------------------
| acf option page
|--------------------------------------------------------------------------
*/
if ( function_exists( 'acf_add_options_page' ) ) {
	acf_add_options_page( 'Theme Options' );
}

/*
|--------------------------------------------------------------------------
| disable gutenberg
|--------------------------------------------------------------------------
*/
add_filter( 'use_block_editor_for_post', '__return_false', 10 );
add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );

/*
|--------------------------------------------------------------------------
| menu class bootstrap4
|--------------------------------------------------------------------------
*/
add_filter( 'nav_menu_link_attributes', 'wpse156165_menu_add_class', 10, 3 );
function wpse156165_menu_add_class( $atts, $item, $args ) {
  $class = 'nav-link'; // or something based on $item
  $atts['class'] = $class;
  return $atts;
}
add_filter( 'nav_menu_css_class', 'secondary_li_class', 10, 2 );
function secondary_li_class( $classes, $item ) {
  global $post;
  $classes[] = 'nav-item';
  //echo '<pre>'; print_r($item); echo '</pre>';
  return $classes;
}
/*
|--------------------------------------------------------------------------
| remove emoji script
|--------------------------------------------------------------------------
*/
function disable_emojis() {
  if ( ! is_admin() ) {
	  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	  remove_action( 'wp_print_styles', 'print_emoji_styles' );
	  remove_action( 'admin_print_styles', 'print_emoji_styles' );
	  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	  add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	  add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
  }
}
add_action( 'init', 'disable_emojis' );
/*
|--------------------------------------------------------------------------
| page menu order
|--------------------------------------------------------------------------
*/
function custom_book_column( $column, $post_id ) {
  global $post;

  switch ( $column ) {
	  case 'menu_order' :
		  echo  $post->menu_order;
		  break;
  }
}
function set_custom_edit_book_columns($columns) {
  //unset( $columns['author'] );
  $columns['menu_order'] = __( 'Menu Order', 'southbaylawyer' );
  return $columns;
}

function my_movie_sortable_columns( $columns ) {
  $columns['menu_order'] = 'menu_order';
  return $columns;
}

add_action( 'manage_page_posts_custom_column' , 'custom_book_column', 100, 2 );
add_filter( 'manage_page_posts_columns', 'set_custom_edit_book_columns' );
add_filter( 'manage_edit-page_sortable_columns', 'my_movie_sortable_columns' );

/*
|--------------------------------------------------------------------------
| Allow Span tags in editor
|--------------------------------------------------------------------------
*/
function myextensionTinyMCE($init) {
  // Command separated string of extended elements
  $ext = 'span[id|name|class|style]';
  // Add to extended_valid_elements if it alreay exists
  if ( isset( $init['extended_valid_elements'] ) ) {
	  $init['extended_valid_elements'] .= ',' . $ext;
  } else {
	  $init['extended_valid_elements'] = $ext;
  }
  // Super important: return $init!
  return $init;
}
add_filter('tiny_mce_before_init', 'myextensionTinyMCE' );

/*
|--------------------------------------------------------------------------
| custom permalinks only for practice-area post type
|--------------------------------------------------------------------------
*/
function custom_permalinks_exclude_post_type_fun( $post_type ) {
if ( $post_type == 'practice-area' || $post_type == 'city') {
  return '__false';
}
return '__true';
}
add_filter( 'custom_permalinks_exclude_post_type', 'custom_permalinks_exclude_post_type_fun');

/*
|--------------------------------------------------------------------------
| menu title
|--------------------------------------------------------------------------
*/
function filter_nav_menu_items($menu){
	$post_type = ($menu->object); //gets post type
	//if post type is a page, then create a new URL
	if ($post_type === 'practicearea') {
		$menu_title = get_field('menu_title',$menu->ID) ? ' ('.get_field('menu_title',$menu->ID) . ')' : '' ;
		$menu->post_title = $menu->post_title . $menu_title;
		$menu->title = $menu->title . $menu_title;
	}
	return $menu; //return the filtered object
}
add_filter( 'wp_setup_nav_menu_item', 'filter_nav_menu_items', 1 );

class Set_Title_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
		$menu_title = get_field('menu_title',$item->object_id) ? get_field('menu_title',$item->object_id) : $item->title ;
		$output .= sprintf( "\n<li %s><a href='%s' title='%s' >%s</a>\n", $class_names, $item->url, $menu_title, $menu_title );
	}
}

//Use
wp_nav_menu( [
	'theme_location' => 'primary',
	'container'      => false,
	'menu_class'     => 'nav navbar-nav',
	'walker'         => new Set_Title_Walker_Nav_Menu(),
] );

/*
|--------------------------------------------------------------------------
| enable vcf upload
|--------------------------------------------------------------------------
*/
function be_enable_vcard_upload( $mime_types ){
	$mime_types['vcf'] = 'text/x-vcard';
	return $mime_types;
}
add_filter('upload_mimes', 'be_enable_vcard_upload' );

/*
|--------------------------------------------------------------------------
| wp_list_pages with meta_box
|--------------------------------------------------------------------------
*/
class WPSE_130877_Custom_Walker extends Walker_Page {

	function start_el( &$output, $page, $depth, $args, $current_page = 0 ) {
		if ( $depth )
			$indent = str_repeat("\t", $depth);
		else
			$indent = '';
		extract($args, EXTR_SKIP);
		$css_class = array('page_item', 'page-item-'.$page->ID);
		if ( !empty($current_page) ) {
			$_current_page = get_post( $current_page );
			if ( in_array( $page->ID, $_current_page->ancestors ) )
				$css_class[] = 'current_page_ancestor';
			if ( $page->ID == $current_page )
				$css_class[] = 'current_page_item';
			elseif ( $_current_page && $page->ID == $_current_page->post_parent )
				$css_class[] = 'current_page_parent';
		}
		elseif ( $page->ID == get_option('page_for_posts') ) {
			$css_class[] = 'current_page_parent';
		}

		$css_class = implode( ' ', apply_filters( 'page_css_class', $css_class, $page, $depth, $args, $current_page ) );
		$icon_class = get_post_meta($page->ID, 'icon_class', true); //Retrieve stored icon class from post meta

		$output .= $indent . '<li class="' . $css_class . '">';
		$output .= '<a href="' . get_permalink($page->ID) . '">' . $link_before;

		if($icon_class){ //Test if $icon_class exists
			$output .= '<span class="' . $icon_class . '"></span>'; //If it exists output a span with the $icon_class attached to it
		}
		//custom meta box
		$output .= get_post_meta( $page->ID, 'sidebar_title', true );
		//custom meta box
		$output .= $link_after . '</a>';

		if ( !empty($show_date) ) {
			if ( 'modified' == $show_date )
				$time = $page->post_modified;
			else
				$time = $page->post_date;
			$output .= " " . mysql2date($date_format, $time);
		}
	}
}
// use:
wp_list_pages(array(
	'post_type' => 'practice-areas',
	'title_li'    => '',
	'echo'        => 1,
	'walker' => new WPSE_130877_Custom_Walker()
));

/*
|--------------------------------------------------------------------------
| media images size remove (excerpt cropping image)
|--------------------------------------------------------------------------
*/
function remove_default_image_sizes( $sizes ) {
	unset( $sizes[ 'thumbnail' ]);
	unset( $sizes[ 'medium' ]);
	unset( $sizes[ 'medium_large' ]);
	unset( $sizes[ 'large' ]);
	unset( $sizes[ '1536x1536' ]);
	unset( $sizes[ '2048x2048' ]);
	return $sizes;
}
add_filter( 'intermediate_image_sizes_advanced', 'remove_default_image_sizes' );

/*
|--------------------------------------------------------------------------
| webp support
|--------------------------------------------------------------------------
*/
function webp_upload_mimes($existing_mimes) {
	$existing_mimes['webp'] = 'image/webp';
	return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');

//enable preview / thumbnail for webp image files.
function webp_is_displayable($result, $path) {
	if ($result === false) {
		$displayable_image_types = array( IMAGETYPE_WEBP );
		$info = @getimagesize( $path );

		if (empty($info)) {
			$result = false;
		} elseif (!in_array($info[2], $displayable_image_types)) {
			$result = false;
		} else {
			$result = true;
		}
	}

	return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);

/*
|--------------------------------------------------------------------------
| remove custom post type slug
| https://wordpress.org/support/topic/how-to-create-a-custom-post-type-without-extra-slug/
| replace 'events' with your post type slug
|--------------------------------------------------------------------------
*/
function na_remove_slug( $post_link, $post, $leavename ) {
	if ( 'events' != $post->post_type || 'publish' != $post->post_status ) {
		return $post_link;
	}
	$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
	return $post_link;
}
add_filter( 'post_type_link', 'na_remove_slug', 10, 3 );

function na_parse_request( $query ) {
	if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
		return;
	}
	if ( ! empty( $query->query['name'] ) ) {
		$query->set( 'post_type', array( 'post', 'events', 'page' ) );
	}
}
add_action( 'pre_get_posts', 'na_parse_request' );

/*
|--------------------------------------------------------------------------
| acf admin slug
| https://www.advancedcustomfields.com/resources/acf-render_field/
| https://www.coderomeos.org/select-and-copy-data-to-clipboard-using-jquery
|--------------------------------------------------------------------------
*/
function my_acf_input_admin_footer() {
	if ( get_post_type() != 'acf-field-group' ) { ?>
		<script type="text/javascript">
            jQuery(function($) {
                $('#wpwrap').each(function(index) {
                    $(this).on('click','.copy-to-clipboard input', function() {
                        $(this).focus();
                        $(this).select();
                        document.execCommand('copy');
                        //$(".copied").text("Copied to clipboard").show().fadeOut(1200);
                    });
                });
            });
		</script>
		<?php
	}
}
add_action('acf/input/admin_footer', 'my_acf_input_admin_footer');

add_action('acf/render_field', 'show_field_details', 1);
function show_field_details($field) {
	if ( get_post_type() !='acf-field-group' ) {
		echo '
	<div class="description copy-to-clipboard" style="margin-bottom: 10px;">
		<input readonly="readonly" type="text" value="'.trim($field['_name']).'" style="color: #0c5460;">
	</div>
	';
	}
}