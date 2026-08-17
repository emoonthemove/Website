<div class="edgtf-grid">
	<div class="edgtf-two-columns-66-33 clearfix">
		<div class="edgtf-column1">
			<div class="edgtf-column-inner">
				<?php illustrator_edge_portfolio_get_info_part('content'); ?>
			</div>
		</div>
		<div class="edgtf-column2">
			<div class="edgtf-column-inner">
				<div class="edgtf-portfolio-info-holder">
					<?php

	                //get portfolio info title
	                illustrator_edge_portfolio_get_info_part('info-title');

					//get portfolio custom fields section
					illustrator_edge_portfolio_get_info_part('custom-fields');

					//get portfolio categories section
					illustrator_edge_portfolio_get_info_part('categories');

					//get portfolio tags section
					illustrator_edge_portfolio_get_info_part('tags');

					//get portfolio date section
					illustrator_edge_portfolio_get_info_part('date');

					//get portfolio share section
					illustrator_edge_portfolio_get_info_part('social');
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="edgtf-big-image-holder">
	<?php
	$media = illustrator_edge_get_portfolio_single_media();

	if(is_array($media) && count($media)) : ?>
		<div class="edgtf-portfolio-media edgtf-ptf-wide-slider edgtf-slick-slider-navigation-style">
			<?php foreach($media as $single_media) : ?>
				<div class="edgtf-portfolio-single-media">
					<?php illustrator_edge_portfolio_get_media_html($single_media); ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>