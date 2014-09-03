<?php $poxy_logo = of_get_option('mobile_logo'); ?>
<?php if($poxy_logo) : ?>	
<div id="mobile-logo" style="background-image: url(<?php echo $poxy_logo; ?>);">
<?php else : ?>		
<div id="mobile-logo">	
<?php endif; ?>	
<?php poxy_edit_logo();?>
	<a style="width:100%; height:100%; position:absolute;" href="<?php bloginfo('url'); ?>"></a>
</div>