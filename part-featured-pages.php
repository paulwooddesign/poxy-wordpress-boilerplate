<?php /*/ ?>
<section>
	<div class="site-width">
		<div class="copy-width">
			<h3 class="beta section-head"><span>About Us</span></h3>
		</div>
	</div>
</section>
<?php //*/ ?>

<?php //*/ ?>
<?php $featured_page_count = intval(of_get_option('poxy_featured_pages_count')); ?>
<?php $featured_pages_title = of_get_option('poxy_featured_pages_title'); ?>
<?php $featured_pages_links_enabled = of_get_option('poxy_featured_pages_links_enabled'); ?>
<?php if($featured_page_count > 0) : ?>
<?php $featured_pages_bkg = of_get_option('poxy_featured_pages_bkg'); ?>
<section>
	<div class="site-width">
		<div class="copy-width">

			<?php
			$args = array(
				'ignore_sticky_posts' => 1,
				//'meta_key' => '_poxy_page_featured',
				'meta_value' => true,
		    	'posts_per_page' => 4,
		    	'post_type' => array(
				'page'
				)
			);
			?>

			<?php $pages = new WP_Query( $args ); ?>

			<div class="POX A_4_14A14 B_4_14B14 C_2_12C12 D_2_12D12 E_1_11E11 ">
			<?php while ($pages->have_posts()) : $pages->the_post(); ?>
				<figure class="wp2">

					<a href="<?php the_permalink(); ?>">
						<div class="greyscale poxy_ a_14a14 b_14a14 c_12c12 d_12-12 _e_11e11 bg-cover" style="background-image: url(<?php poxy_thumb(); ?>);"></div>
					</a>
					<div class="s1"></div>
					<span class="has-line-left relative"><h3><?php the_title(); ?></h3></span>
					<div class="s2"></div>
					<div class="clearboth"></div>
					<p><?php poxy_excerpt(20); ?></p>
				</figure>

			<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<?php //*/ ?>
