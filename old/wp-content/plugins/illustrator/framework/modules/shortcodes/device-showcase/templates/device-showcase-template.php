<div <?php illustrator_edge_class_attribute($shortcode_classes);?>>
	<div class="edgtf-device-showcase-inner">
		<div class="edgtf-image-holder">
			<img class="edgtf-image-frame" src="<?php echo EDGE_ASSETS_ROOT ?>/css/img/device-showcase-screen.png" alt="<?php esc_html(_e('device showcase desktop screen','illustrator')); ?>" />
			<div class="edgtf-image-holder-inner">
				<img class="edgtf-device-showcase-image" src="<?php echo wp_get_attachment_url( $image ); ?>" alt="<?php echo get_the_title( $image ); ?>" />
			</div>
		</div>
		<div class="edgtf-text-holder">
			<?php if ($image_title != '') { ?>
				<h4 class="edgtf-image-title"><?php echo esc_attr($image_title) ?></h4>
			<?php } ?>
		</div>
	</div>
	<?php if ($image_link != '') { ?>
		<a class="edgtf-device-showcase-link" href="<?php echo esc_url($image_link) ?>" target="<?php echo esc_attr($image_target) ?>"></a>
	<?php } ?>
</div>
