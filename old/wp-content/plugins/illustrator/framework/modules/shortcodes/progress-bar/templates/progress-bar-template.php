<div <?php illustrator_edge_class_attribute($progress_bar_classes);?>>
	<div class="edgtf-progress-title-holder clearfix">
		<span class="edgtf-progress-title"><?php echo esc_attr($title)?></span>
		<span class="edgtf-progress-number-wrapper <?php echo esc_attr($percentage_classes)?> " >
			<span class="edgtf-progress-number">
				<span class="edgtf-percent">0</span>
			</span>
		</span>
	</div>
	<div class="edgtf-progress-content-outer " <?php illustrator_edge_inline_style($bar_color); ?>>
		<div data-percentage=<?php echo esc_attr($percent)?> class="edgtf-progress-content" <?php illustrator_edge_inline_style($active_color); ?> ></div>
	</div>
</div>