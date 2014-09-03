<!-- mobile-nav -->
<section id="mobile-nav" class="<?php if(of_get_option('poxy_dark_header')) { echo "dark";}; ?> <?php echo of_get_option('poxy_header_position'); ?>">
	<div class="<?php if(of_get_option('poxy_full_width_header')) { echo "full-width";} else {echo "copy-width";}; ?>">
		<nav id="mobile-menu" class="mobile-menu">
			<div class="mp-level">
				<h2 class="icon"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h2>
				<ul id="menu-mobile" class="mobile-nav-ul">
				<?php
					wp_nav_menu( array(
					'theme_location'  => 'mobile',
					'menu'            => 'mobile',
					'container' => false,
					'menu_class' => '',
					'echo' => true,
					'before' => '',
					'after' => '',
					'link_before' => '',
					'link_after' => '',
					'items_wrap'      => '%3$s',
					'depth' => 0,
					'walker' => new poxy_mobile_menu_walker())
					 );
				?>
				</ul>
			</div>
		</nav>
		<?php get_template_part( 'part-mobile-logo' ); ?>
		<div class="scroller">
			<div class="scroller-inner relative">
				<a href="#" id="trigger" class="menu-trigger left">
					<div class="mobile-toggle">
			            <span></span>
			            <span></span>
			            <span></span>
			        </div>
				</a>
			</div>

			<?php //*/ ?>
			<a href="#" id="trigger-overlay"></a>
			<?php //*/ ?>

			<div class="clearboth"></div>
		</div>
	</div>
</section>
<div class="clearboth"></div>