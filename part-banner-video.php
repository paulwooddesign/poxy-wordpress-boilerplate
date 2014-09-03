<?php $banner_head_size = "poxy a_11a12 b_11b12"; ?>

<section>
	<div class="site-width bg-cover relative" <?php poxy_bgi_1x1(2000, 500); ?>>

		<video autoplay loop poster="//demosthenes.info/assets/images/polina.jpg" id="bgvid">
			<source src="//demosthenes.info/assets/videos/polina.webm" type="video/webm">
			<source src="//demosthenes.info/assets/videos/polina.mp4" type="video/mp4">
		</video>

		<span class="paxy ap_11ap11" style="background:rgba(255,255,255,.5);" ></span>

		<div class="copy-width">

				<div class="copy-width <?php echo $banner_head_size; ?>">

					<div class="vert-c txt-c mb0" style="position:absolute; z-index:999; top:0; left:0; width:100%; height:100%;">

						<div class="header-title">
							<div class="pox ap_34 bp_34 gp34 relative" style="margin:0 auto !important; float:none;">

								<h5 class="sub-head accent-color mb0">
									<?php $page_sub_head = get_post_meta($post->ID, "_poxy_page_sub_head", true); ?>
									<?php if ($page_sub_head) : ?>
										<?php echo $page_sub_head; ?>
									<?php else: ?>
										<?php poxy_text(0, 4); ?>
									<?php endif; ?>
								</h5>

								<h1 class="title animated fadeInDown delay-05s <?php //echo $page_head_size; ?> giga mb0">
									<span><?php the_title(); ?></span>
								</h1>

								<p class="description has-line animated fadeInUp delay-05s">
									<?php $page_description = get_post_meta($post->ID, "_poxy_page_description", true); ?>
									<?php if ($page_description) : ?>
										<?php echo $page_description; ?>
									<?php else: ?>
										<?php poxy_text(0, 30); ?>
									<?php endif; ?>
								</p>

							</div>
						</div>

					</div>
				</div>

	</div>
</section>
