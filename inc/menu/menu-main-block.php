<section class="hide show-a show-b">
<div class="site-width relative">
	<div class="<?php if(of_get_option('poxy_full_width_header')) { echo "full-width";} else {echo "copy-width";}; ?>">
		<?php get_template_part( 'part-logo-main' ); ?>
		<nav id="main-nav" class="main-nav" role="navigation">
			<ul id="main-ul" class="block-menu">
			<?php
				wp_nav_menu( array(
				'theme_location'  => 'main',
				'menu'            => 'main',
				'container' => false,
				'menu_class' => 'main-nav-ul',
				'echo' => true,
				'before' => '',
				'after' => '',
				'link_before' => '',
				'link_after' => '',
				'items_wrap'      => '%3$s',
				'depth' => 0,
				'walker' => new poxy_block_menu_walker())
			);?>
			</ul>

		</nav>
	</div>
</div>
</section>
