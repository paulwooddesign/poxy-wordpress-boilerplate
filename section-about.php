<?php //* GAMMA SECTION HEADING / ?>
<section>
	<div class="site-width">
		<div class="copy-width">
			<?php poxy_edit(); ?>
			<h2>
				<span class="beta"><?php the_title(); ?></span>
			</h2>
		</div>
	</div>
</section>
<?php // GAMMA SECTION HEADING */ ?>

<?php //* Start Block / ?>
<section>
  <div class="site-width">
    <div class="copy-width">
      <p><?php the_content(); ?></p>
    </div>
  </div>
</section>
<?php //End Block */ ?>

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

while ($sections->have_posts()) : $sections->the_post();

	get_template_part( 'section-sub-about');

endwhile;
wp_reset_query();
?>
<?php // SUB PAGE LOOP */ ?>
