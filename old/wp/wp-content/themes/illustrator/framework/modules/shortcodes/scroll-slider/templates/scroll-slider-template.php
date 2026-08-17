<div class="edgtf-scroll-slider <?php echo esc_attr($classes);?>">
	<div class="edgtf-scs-inner">
		<?php foreach ($images as $image) { ?>
			<div class="edgtf-scs-item">
				<div class="edgtf-scs-item-inner">
					<?php if ($pretty_photo) { ?>
						<a href="<?php echo esc_url($image['url'])?>" data-rel="prettyPhoto[scs_pretty_photo]" title="<?php echo esc_attr($image['title']); ?>">
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
					<?php if ($show_title == 'yes' && $image['title'] !== '') { ?>
						<span class="edgtf-scs-title"><?php echo esc_attr($image['title']); ?></span>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
	</div>
	<?php if ($navigation == 'yes') { ?>
		<span class="edgtf-scs-navigation">
			<span class="edgtf-scs-nav edgtf-scs-nav-left icon-arrows-left"></span>
			<span class="edgtf-scs-nav edgtf-scs-nav-right icon-arrows-right"></span>
		</span>
	<?php } ?>
</div>