<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php
    /**
     * @see illustrator_edge_header_meta() - hooked with 10
     * @see edgt_user_scalable - hooked with 10
     */
    ?>
	<?php if (!illustrator_edge_is_ajax_request()) do_action('illustrator_edge_header_meta'); ?>

	<?php if (!illustrator_edge_is_ajax_request()) wp_head(); ?>
</head>

<body <?php body_class();?>>
<?php if (!illustrator_edge_is_ajax_request()) illustrator_edge_get_side_area(); ?>

<?php

$id = illustrator_edge_get_page_id();

if(illustrator_edge_get_meta_field_intersect('smooth_page_transitions',$id) === 'yes' &&
	illustrator_edge_get_meta_field_intersect('page_transition_preloader',$id) === 'yes') {
?>
<div class="edgtf-smooth-transition-loader edgtf-mimic-ajax">
    <div class="edgtf-st-loader">
        <div class="edgtf-st-loader1">
            <?php illustrator_edge_loading_spinners(); ?>
        </div>
    </div>
</div>
<?php } ?>

<div class="edgtf-wrapper">
	<?php do_action('illustrator_edge_after_wrapper_open'); ?>
    <div class="edgtf-wrapper-inner">
        <?php if (!illustrator_edge_is_ajax_request()) illustrator_edge_get_header(); ?>

        <?php if ((!illustrator_edge_is_ajax_request()) && illustrator_edge_options()->getOptionValue('show_back_button') == "yes") { ?>
            <a id='edgtf-back-to-top'  href='#'>
                <span class="edgtf-icon-stack">
                     <?php
                        illustrator_edge_icon_collections()->getBackToTopIcon('font_elegant');
                    ?>
                </span>
                <span class="edgtf-icon-stack">
                     <?php
                        illustrator_edge_icon_collections()->getBackToTopIcon('font_elegant');
                    ?>
                </span>
            </a>
        <?php } ?>
        <?php if (!illustrator_edge_is_ajax_request()) illustrator_edge_get_full_screen_menu(); ?>

        <div class="edgtf-content" <?php illustrator_edge_content_elem_style_attr(); ?>>
            <?php if(illustrator_edge_is_ajax_enabled()) { ?>
            <div class="edgtf-meta">
                <?php do_action('illustrator_edge_ajax_meta'); ?>
                <span id="edgtf-page-id"><?php echo esc_html(get_queried_object_id()); ?></span>
                <div class="edgtf-body-classes"><?php echo esc_html(implode( ',', get_body_class())); ?></div>
            </div>
            <?php } ?>
            <div class="edgtf-content-inner">