<div class="edgtf-crossfade-images" >
	<?php if($link != '') { ?>
		<a class="edgtf-cfi-link" href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($link_target) ?>"></a>
	<?php } ?>
	<div class="edgtf-cfi-img-holder" style=" background-color: <?php echo esc_attr($background_color)?>;">
		<div class="edgtf-cfi-img-holder-inner">
			<img src="<?php echo wp_get_attachment_url($initial_image,'full');?>" alt="initial image" />
			<div class="edgtf-cfi-image-hover" style="background-image: url(<?php echo wp_get_attachment_url($hover_image,'full');?>);"></div>
		</div>
	</div>
	<?php if ($title != '') { ?>
		<div class="edgtf-cfi-title-holder">
			<h3 class="edgtf-cfi-title"><?php echo esc_attr($title) ?></h3>
		</div>
	<?php } ?>
</div>