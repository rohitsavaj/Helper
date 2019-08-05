<!--Location Start: <?php echo __DIR__.'/'. basename(__FILE__); ?>-->
<ul>
	<?php
	if(get_field('facebook','option')) { ?>
		<li><a href="<?php the_field('facebook', 'option'); ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
		<?php
	}
	if(get_field('twitter','option')) { ?>
		<li><a href="<?php the_field('twitter', 'option'); ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
		<?php
	}
	if(get_field('linkedin','option')) { ?>
		<li><a href="<?php the_field('linkedin', 'option'); ?>" target="_blank" title="LinkedIn"><i class="fa fa-linkedin"></i></a></li>
		<?php
	}
	if(get_field('google_business','option')) { ?>
		<li><a href="<?php the_field('google_business', 'option'); ?>" target="_blank" title="Google Business"><i class="fa fa-google-plus"></i></a></li>
		<?php
	} ?>
</ul>
<!--Location End: <?php echo __DIR__.'/'. basename(__FILE__); ?>-->