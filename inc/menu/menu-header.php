
<?php /* Top Mission / ?>
<?php if(of_get_option('poxy_enable_top_header_menu')) : ?>
<section>
	<div class="site-width">
		<div class="s1 <?php if(of_get_option('poxy_full_width_header')) { echo "full-width";} else {echo "copy-width";}; ?> vert-c">
			<div>
			
				<span class="zeta left mb0"><?php bloginfo( 'description' ); ?></span>
				<span class="zeta2 right mb0">info</span>

			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<?php // Top Mission */ ?>




<?php /* Top Mission / ?>
<?php if(of_get_option('poxy_enable_top_header_menu')) : ?>
<section class="mission">
	<div class="site-width">
		<div class="<?php echo $copy_class; ?>">
			<div class="s4 hide show-e"></div>
			<div class="wp-tagline pox a_12-12 b_12-12 g_12-12 d_12-12 e_11-12 mb0 txt-c">
				<p class="zeta mb0 left"><span class="ep11 mb0"><?php bloginfo( 'description' ); ?></span></p>
			</div>
			<div class="s4 hide show-e"></div>
			<div class="qox _a_12-12 _b_12-12 _g_12-12 _d_12-11 e_11-12 mb0 txt-c">
				<p class="zeta ep11 mb0 right"><span>Call today: <a class="gold" href="#">303-289-2222</a></span></p>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<?php // Top Mission */ ?>



<?php //* header-small-nav / ?>
<?php //if(of_get_option('poxy_enable_top_header_menu')) : ?>
<section id="top-bar" class="hide-d hide-e">
	<div class="site-width">
		<div class="<?php if(of_get_option('poxy_full_width_header')) { echo "full-width";} else {echo "copy-width";}; ?> relative">
			<div class="wp-tagline left vert-c2 hide">
				<span class="usa-flag"></span>
				<span class="made-in-usa zeta mb0"><?php bloginfo( 'description' ); ?></span>
			</div>
		
			<?php poxy_clean_header_nav(); ?>
		</div>
	</div>
</section>
<?php //endif; ?>
<?php // header-small-nav */ ?>