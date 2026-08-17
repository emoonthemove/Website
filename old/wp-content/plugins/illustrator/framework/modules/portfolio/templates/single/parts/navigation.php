<?php if ( illustrator_edge_options()->getOptionValue( 'portfolio_single_hide_pagination' ) !== 'yes' ) : ?>

	<?php
	$nav_same_category = illustrator_edge_options()->getOptionValue( 'portfolio_single_nav_same_category' ) == 'yes';
	?>

	<div class="edgtf-portfolio-single-nav">
		<div class="edgtf-portfolio-single-nav-inner">
			<?php if ( get_previous_post() !== '' ) : ?>
				<div class="edgtf-portfolio-prev">
					<?php if ( $nav_same_category ) {
						previous_post_link( '%link', '<span class="arrow_left"></span>'.esc_html__( 'Previous Project', 'illustrator' ), true, '', 'portfolio_category' );
					} else {
						previous_post_link( '%link', '<span class="arrow_left"></span>'.esc_html__( 'Previous Project', 'illustrator' ) );
					} ?>
				</div>
			<?php endif; ?>
			<?php if ( get_next_post() !== '' ) : ?>
				<div class="edgtf-portfolio-next">
					<?php if ( $nav_same_category ) {
						next_post_link( '%link', esc_html__( 'Next Project', 'illustrator' ).'<span class="arrow_right"></span>', true, '', 'portfolio_category' );
					} else {
						next_post_link( '%link', esc_html__( 'Next Project', 'illustrator' ).'<span class="arrow_right"></span>');
					} ?>
				</div>
			<?php endif; ?>
		</div>
	</div>

<?php endif; ?>