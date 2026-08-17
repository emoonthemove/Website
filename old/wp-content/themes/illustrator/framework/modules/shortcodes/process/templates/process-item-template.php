<div <?php illustrator_edge_class_attribute($item_classes); ?>>
	<div class="edgtf-pi-holder-inner">
		<?php if(!empty($number)) : ?>
			<div class="edgtf-pi-number-holder">
				<span class="edgtf-pi-arrow"><span class="arrow_right"></span></span>
				<span class="edgtf-pi-number"><?php echo esc_html($number); ?></span>
			</div>
		<?php endif; ?>
		<?php if(!empty($title) || !empty($text)) : ?>
			<div class="edgtf-pi-content-holder">
				<?php if(!empty($title)) : ?>
					<div class="edgtf-pi-title-holder">
						<h5 class="edgtf-pi-title"><?php echo esc_html($title); ?></h5>
					</div>
				<?php endif; ?>

				<?php if(!empty($text)) : ?>
					<div class="edgtf-pi-text-holder">
						<p><?php echo esc_html($text); ?></p>
					</div>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</div>