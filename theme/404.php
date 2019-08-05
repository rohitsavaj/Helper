<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package southbaylawyer
 */

get_header(); ?>

	<div class="middle-content">
		<div class="extra-page-main">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-8 col-sm-10 col-xs-12 offset-lg-3 offset-md-2 offset-sm-1">
						<div class="extra-page">
							<div class="border-design">
								<div class="ep-tl">404</div>
								<figure>The Page You Are Searching is Not available</figure>
								<div class="ep-contact">
									<a href="tel:<?php the_field('phone1', 'option'); ?>"><?php the_field('phone1', 'option'); ?></a>
								</div>
								<div class="ep-homeback">
									<a class="send-btn effect-1" href="<?php echo site_url();?>" title="Back to Home">Back to Home</a>
								</div>
								<div class="ep-social">
									<div class="h-socials">
										<?php get_template_part('template-parts/custom/social', 'icons'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php
get_footer();