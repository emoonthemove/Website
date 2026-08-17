<?php $date_format = 'F d, Y';?>
<div class="edgtf-portfolio-slider-content">
	<span class="edgtf-control edgtf-open arrow_up"></span>

	<div class="edgtf-description">
		<div class="edgtf-ptf-table">
			<div class="edgtf-ptf-table-cell">
				<h3><?php the_title(); ?></h3>
				<span class="edgtf-ptf-date"><?php the_time($date_format); ?></span>
			</div>
		</div>
	</div>

	<div class="edgtf-portfolio-slider-content-info">
		<div class="edgtf-ptf-table">
			<div class="edgtf-ptf-table-cell">
				<div class="egtf-ptf-content-holder">
					<?php illustrator_edge_portfolio_get_info_part('content'); ?>
					<span class="edgtf-control edgtf-close arrow_down"></span>
				</div>
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
<div class="edgtf-full-screen-slider-holder">
	<?php
	$media = illustrator_edge_get_portfolio_single_media();

	if(is_array($media) && count($media)) : ?>
		<div class="edgtf-portfolio-full-screen-slider">
			<?php foreach($media as $single_media) : ?>
				<div class="edgtf-portfolio-single-media">
					<?php illustrator_edge_portfolio_get_media_html($single_media); ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>