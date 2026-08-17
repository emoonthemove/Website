<?php do_action('illustrator_edge_before_page_header'); ?>

<header class="edgtf-page-header">
	<?php if($show_fixed_wrapper) : ?>
		<div class="edgtf-fixed-wrapper">
	<?php endif; ?>
	<div class="edgtf-menu-area" <?php illustrator_edge_inline_style(array($menu_area_background_color)); ?>>
		<?php if($menu_area_in_grid) : ?>
			<div class="edgtf-grid">
		<?php endif; ?>
			<?php do_action( 'illustrator_edge_after_header_menu_area_html_open' )?>
			<div class="edgtf-vertical-align-containers">
				<div class="edgtf-position-left"><!--
                 --><div class="edgtf-position-left-inner">
						<?php if(!$hide_logo) {
							illustrator_edge_get_logo();
						} ?>
					</div>
				</div>
				<div class="edgtf-position-right"><!--
                 --><div class="edgtf-position-right-inner">
						<?php illustrator_edge_get_main_menu(); ?>

						<?php if(is_active_sidebar('edgtf-expanding-right-from-main-menu')) : ?>
							<div class="edgtf-menu-right-widgets">
								<?php dynamic_sidebar('edgtf-expanding-right-from-main-menu'); ?>
							</div>
						<?php endif; ?>
						<?php illustrator_edge_get_expanding_header_opener(true); ?>
					</div>
				</div>
				<span class="edgtf-expanding-background" <?php illustrator_edge_inline_style($menu_icon_background_color);?>></span>
			</div>
		<?php if($menu_area_in_grid) : ?>
		</div>
		<?php endif; ?>
	</div>
	<?php if($show_fixed_wrapper) : ?>
		</div>
	<?php endif; ?>
	<?php if($show_sticky) {
		illustrator_edge_get_sticky_header();
	} ?>
</header>

<?php do_action('illustrator_edge_after_page_header'); ?>