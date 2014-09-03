<?php //*/ Content  ?>
<?php while (have_posts()) : the_post(); ?>	
<?php
$content = get_the_content();
if($content != '') { ?>
<section class="content">
	<div class="site-width">
		<div class="copy-width">
				
			<?php poxy_edit_post(); ?>		    
			<div <?php post_class('clearfix'); ?>>						
				<?php the_content(); ?>	
			</div>							
						    			
		</div>
	</div>
</section>
<div class="clearboth"></div>
<?php } else { ?>
<?php } ?>
<?php endwhile; ?>	
<?php wp_reset_query();	?>
<?php // Content */ ?>