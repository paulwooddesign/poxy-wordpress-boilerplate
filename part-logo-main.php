<?php $poxy_logo = of_get_option('logo'); ?>
<?php if($poxy_logo) : ?>	
<div id="logo" class="pox a_13-14 b_13-14">
	<a href="<?php bloginfo('url'); ?>" style="background-image: url(<?php echo $poxy_logo; ?>);">
		<?php /*/ ?>
		<img src="<?php echo $poxy_logo; ?>" />
		<?php //*/ ?>
	</a>
</div>
<?php else : ?>		
<div id="logo">	
	<a href="<?php bloginfo('url'); ?>"></a>
</div>
<?php endif; ?>	