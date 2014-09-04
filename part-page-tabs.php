<?php //* SUB PAGE TABS / ?>
<div class='tabs'>
	<span class="s1"></span>
	<ul class="copy-width POXY A_5_15A18 B_5_15B15 C_5_15C15 D_5_15D15 E_5_15E15">

		<?php
		$args = array(
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => 5,
			'post_parent'         => poxy_id(),
			'orderby'             => 'menu_order',
			'post_type'           => array(
			'page'
		));

		$sections = new WP_Query( $args );

		while ($sections->have_posts()) : $sections->the_post();?>

			<li>
				<a <?php poxy_bgi_1x1(); ?> class="paxy ap_11ap11" href="#<?php echo poxy_slug(); ?>"/>
					<span class="oxy ap_11 txt-c"><?php the_title(); ?></span>
				</a>
			</li>

		<?php
		endwhile;
		wp_reset_query();
		?>

	</ul>

	<?php //* SUB PAGE LOOP / ?>
	<?php
	$args = array(
		'ignore_sticky_posts' => 1,
		'posts_per_page'      => 99,
		'post_parent'         => poxy_id(),
		'orderby'             => 'menu_order',
		'post_type'           => array(
		'page'
	));

	$sections = new WP_Query( $args );

	while ($sections->have_posts()) : $sections->the_post(); ?>
		<div id="<?php echo poxy_slug(); ?>">
			<?php get_template_part( 'section-about'); ?>
		</div>
	<?php
	endwhile;
	wp_reset_query();
	?>
	<?php //* SUB PAGE LOOP / ?>

</div><!-- TABS -->

<script type="text/javascript">
	//<![CDATA[
	jQuery(document).ready(function(){
		jQuery('.tabs').easytabs();
	});
	//]]>
</script>
<?php // SUB PAGE TABS */ ?>
