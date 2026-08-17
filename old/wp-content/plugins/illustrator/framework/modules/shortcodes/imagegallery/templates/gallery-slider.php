<div class="edgtf-image-gallery">
	<div class="edgtf-image-gallery-sliding <?php echo esc_attr($slider_classes);?>" <?php echo illustrator_edge_get_inline_attrs($slider_data); ?>>
		<?php foreach ($images as $image) { ?>
			<div class="edgtf-gallery-image-holder">
				<?php if ($pretty_photo) { ?>
					<a href="<?php echo esc_url($image['url'])?>" data-rel="prettyPhoto[single_pretty_photo]" title="<?php echo esc_attr($image['title']); ?>">
				<?php } 
				elseif ($image['link'] !== '') { ?>
					<a href="<?php echo esc_url($image['link'])?>" target="<?php echo esc_attr($image['link_target']);?>">
				<?php } ?>
					<?php if(is_array($image_size) && count($image_size)) : ?>
						<?php echo illustrator_edge_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
					<?php else: ?>
						<?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
					<?php endif; ?>			
				<?php if ($pretty_photo || $image['link'] !== '') {?>
					</a>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>