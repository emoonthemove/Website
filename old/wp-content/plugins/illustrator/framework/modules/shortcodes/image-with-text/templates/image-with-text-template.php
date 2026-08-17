<div class="edgtf-image-with-text <?php echo esc_attr($classes);?>">
	<div class="edgtf-image-with-text-holder-inner">
		<?php if($link != '') { ?>
		<a class="edgtf-image-with-text-link" href="<?php echo esc_attr($link); ?>" <?php illustrator_edge_inline_attr($target, 'target'); ?>></a>
		<?php } ?>
		<div class="edgtf-image-with-text-image-holder">
			<div class="edgtf-image-with-text-image">
				<img src="<?php echo esc_url($image); ?>" alt="" />
			</div>
		</div>
		<?php if($title != '' || $subtitle != '' || $link != '') { ?>
			<div class="edgtf-image-with-text-overlay">
				<div class="edgtf-image-with-text-overlay-inner">
					<div class="edgtf-image-with-text-text-holder">
						<div class="edgtf-image-with-text-text-holder-inner">
							<?php if($subtitle != '') { ?>
								<div class="edgtf-image-with-text-subtitle-holder">
										<h6 <?php illustrator_edge_inline_style($subtitle_styles); ?>><?php echo esc_html($subtitle); ?></h6>
								</div>
							<?php } ?>
							<?php if($title != '') { ?>
								<div class="edgtf-image-with-text-title-holder">
									<<?php echo esc_attr($title_tag); ?> <?php illustrator_edge_inline_style($title_styles); ?> class="edgtf-image-with-text-title"><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
								</div>
							<?php } ?>
						<?php if($link != '') { ?>
								<a class="edgtf-img-with-text-read-more" href="<?php echo esc_attr($link); ?>" <?php illustrator_edge_inline_attr($target, 'target'); ?>>
									<span class="arrow_right"></span>
								</a>
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>