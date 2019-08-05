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

	<div class="middle-content">
		<section class="sitemap-sec">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<table class="table table-bordered" id="meta_data">
							<thead>
							<tr>
								<th>POST TYPE</th>
								<th>URL</th>
								<th>META TITLE</th>
								<th>META DESC</th>
							</tr>
							</thead>
							<tbody>
							<?php
							/*post*/
							$posts1 = get_posts(['post_type' => 'post', 'posts_per_page' => -1,]);
							foreach ($posts1 as $post) { setup_postdata($post); ?>
								<tr>
									<td><?php echo $post->post_type;?></td>
									<td><?php the_permalink(); ?></td>
									<td><?php echo str_replace('%%sitename%%',get_bloginfo('name'),get_post_meta(get_the_ID(), '_yoast_wpseo_title', true)); ?></td>
									<td><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?></td>
								</tr>
								<?php
							}
							/*post*/

							/*page*/
							$page1 = get_posts(['post_type' => 'page', 'posts_per_page' => -1,]);
							foreach ($page1 as $post) { setup_postdata($post);
								$h1 = (get_field('h1')) ? get_field('h1') : get_the_title();?>
								<tr>
									<td><?php echo $post->post_type;?></td>
									<td><?php the_permalink(); ?></td>
									<td><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_title', true); ?></td>
									<td><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?></td>
								</tr>
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
											<tr>
												<td><?php echo $post->post_type; ?></td>
												<td><?php the_permalink(); ?></td>
												<td><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_title', true); ?></td>
												<td><?php echo get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?></td>
											</tr>
											<?php
										}
										wp_reset_postdata(); ?>
										<?php
									}
								}
							}
							/*custom post type*/ ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php
}
get_footer();