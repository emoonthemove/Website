<li class="edgtf-blog-list-item clearfix">
	<div class="edgtf-blog-list-item-inner">
		<?php if ($show_image == 'yes' && has_post_thumbnail()) { ?>
			<div class="edgtf-item-image">
				<a href="<?php echo esc_url(get_permalink()); ?>">
					<?php
						 echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
					?>
				</a>
			</div>
		<?php } ?>
		<div class="edgtf-item-text-holder">
			<<?php echo esc_html( $title_tag)?> class="edgtf-item-title">
				<a href="<?php echo esc_url(get_permalink()) ?>" >
					<?php echo esc_attr(get_the_title()) ?>
				</a>
			</<?php echo esc_html($title_tag) ?>>
			
			<div class="edgtf-item-info-section">
				<?php illustrator_edge_post_info(array(
					'author' => 'yes',
					'category' => 'yes',
				)) ?>
			</div>
			
			<?php if ($text_length != '0') {
				$excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt(); ?>
				<p class="edgtf-excerpt"><?php echo esc_html($excerpt)?>...</p>
			<?php } ?>

			<div class="edgtf-info-bottom edgtf-item-info-section">
				<div class="edgtf-info-btm-left">
					<?php illustrator_edge_post_info(array(
						'comments' => 'yes',
						'like' => 'yes',
					)) ?>
				</div>
				<div class="edgtf-info-btm-right">
					<?php echo illustrator_edge_get_button_html(array(
						'type' => 'transparent',
						'link' => get_the_permalink(),
						'text' => esc_html__('Read More', 'illustrator'),
					)); ?>
				</div>
			</div>
		</div>
	</div>	
</li>