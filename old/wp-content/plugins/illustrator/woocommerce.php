<?php 
/*
Template Name: WooCommerce
*/ 
?>
<?php

$illustrator_edge_id = get_option('woocommerce_shop_page_id');
$illustrator_edge_shop = get_post($illustrator_edge_id);
$illustrator_edge_sidebar = illustrator_edge_sidebar_layout();

if(get_post_meta($illustrator_edge_id, 'edgt_page_background_color', true) != ''){
	$illustrator_edge_background_color = 'background-color: '.esc_attr(get_post_meta($illustrator_edge_id, 'edgt_page_background_color', true));
}else{
	$illustrator_edge_background_color = '';
}

$illustrator_edge_content_style = '';
if(get_post_meta($illustrator_edge_id, 'edgt_content-top-padding', true) != '') {
	if(get_post_meta($illustrator_edge_id, 'edgt_content-top-padding-mobile', true) == 'yes') {
		$illustrator_edge_content_style = 'padding-top:'.esc_attr(get_post_meta($illustrator_edge_id, 'edgt_content-top-padding', true)).'px !important';
	} else {
		$illustrator_edge_content_style = 'padding-top:'.esc_attr(get_post_meta($illustrator_edge_id, 'edgt_content-top-padding', true)).'px';
	}
}

if ( get_query_var('paged') ) {
	$illustrator_edge_paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
	$illustrator_edge_paged = get_query_var('page');
} else {
	$illustrator_edge_paged = 1;
}

get_header();

illustrator_edge_get_title();
get_template_part('slider');

$illustrator_edge_full_width = false;

if ( illustrator_edge_options()->getOptionValue('edgtf_woo_products_list_full_width') == 'yes' && !is_singular('product') ) {
	$illustrator_edge_full_width = true;
}

if ( $illustrator_edge_full_width ) { ?>
	<div class="edgtf-full-width" <?php illustrator_edge_inline_style($illustrator_edge_background_color); ?>>
<?php } else { ?>
	<div class="edgtf-container" <?php illustrator_edge_inline_style($illustrator_edge_background_color); ?>>
<?php }
		if ( $illustrator_edge_full_width ) { ?>
			<div class="edgtf-full-width-inner" <?php illustrator_edge_inline_style($illustrator_edge_content_style); ?>>
		<?php } else { ?>
			<div class="edgtf-container-inner clearfix" <?php illustrator_edge_inline_style($illustrator_edge_content_style); ?>>
		<?php }

			//Woocommerce content
			if ( ! is_singular('product') ) {

				switch( $illustrator_edge_sidebar ) {

					case 'sidebar-33-right': ?>
						<div class="edgtf-two-columns-66-33 grid2 edgtf-woocommerce-with-sidebar clearfix">
							<div class="edgtf-column1">
								<div class="edgtf-column-inner">
									<?php illustrator_edge_woocommerce_content(); ?>
								</div>
							</div>
							<div class="edgtf-column2">
								<?php get_sidebar();?>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-25-right': ?>
						<div class="edgtf-two-columns-75-25 grid2 edgtf-woocommerce-with-sidebar clearfix">
							<div class="edgtf-column1 edgtf-content-left-from-sidebar">
								<div class="edgtf-column-inner">
									<?php illustrator_edge_woocommerce_content(); ?>
								</div>
							</div>
							<div class="edgtf-column2">
								<?php get_sidebar();?>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-33-left': ?>
						<div class="edgtf-two-columns-33-66 grid2 edgtf-woocommerce-with-sidebar clearfix">
							<div class="edgtf-column1">
								<?php get_sidebar();?>
							</div>
							<div class="edgtf-column2">
								<div class="edgtf-column-inner">
									<?php illustrator_edge_woocommerce_content(); ?>
								</div>
							</div>
						</div>
					<?php
						break;
					case 'sidebar-25-left': ?>
						<div class="edgtf-two-columns-25-75 grid2 edgtf-woocommerce-with-sidebar clearfix">
							<div class="edgtf-column1">
								<?php get_sidebar();?>
							</div>
							<div class="edgtf-column2 edgtf-content-right-from-sidebar">
								<div class="edgtf-column-inner">
									<?php illustrator_edge_woocommerce_content(); ?>
								</div>
							</div>
						</div>
					<?php
						break;
					default:
						illustrator_edge_woocommerce_content();
				}

			} else {
				illustrator_edge_woocommerce_content();
			} ?>

			</div>
	</div>
	<?php do_action('illustrator_edge_after_container_close'); ?>
<?php get_footer(); ?>
