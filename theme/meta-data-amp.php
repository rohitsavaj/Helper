<?php
/**
 * Template Name: Meta Data
 */

get_header();
while (have_posts()) { the_post();


	$args = array(
		'public' => true,
		'_builtin' => false
	);

	$output = 'names'; // names or objects, note names is the default
	$operator = 'and'; // 'and' or 'or'

	$post_types = get_post_types($args, $output, $operator); ?>
		<?php
		/*post*/
		$posts1 = get_posts(['post_type' => 'post', 'posts_per_page' => -1,]);
		foreach ($posts1 as $post) { setup_postdata($post); ?>
			<p><?php the_permalink(); ?></p>
			<?php
		}
		/*post*/

		/*page*/
		$page1 = get_posts(['post_type' => 'page', 'posts_per_page' => -1,]);
		foreach ($page1 as $post) { setup_postdata($post);
			$h1 = (get_field('h1')) ? get_field('h1') : get_the_title();?>
			<p><?php the_permalink(); ?></p>
			<?php
		}
		/*page*/

		/*custom post type*/
		foreach ($post_types as $post_type) {

			$customposts = get_posts(['post_type' => $post_type, 'posts_per_page' => -1,]);
			if ( 1 == get_post_type_object( $post_type )->publicly_queryable ) {
				if ($customposts) { ?>
					<?php
					foreach ($customposts as $post) {
						setup_postdata($post); ?>
						<p><?php the_permalink(); ?></p>
						<?php
					}
					wp_reset_postdata(); ?>
					<?php
				}
			}
		}
		/*custom post type*/ ?>
							
	<?php
}
get_footer();