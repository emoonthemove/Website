<?php do_action('illustrator_edge_before_page_header'); ?>
<aside class="edgtf-vertical-menu-area">
    <div class="edgtf-vertical-menu-area-table">
	    <div class="edgtf-vertical-menu-area-table-cell" <?php illustrator_edge_inline_style($vertical_header_alignment);?>>
	        <div class="edgtf-vertical-area-background" <?php illustrator_edge_inline_style(array($vertical_header_background_color,$vertical_header_opacity,$vertical_background_image)); ?>></div>
	        <?php if(!$hide_logo) {
	            illustrator_edge_get_logo();
	        } ?>
	        <?php illustrator_edge_get_vertical_main_menu(); ?>
	        <div class="edgtf-vertical-area-widget-holder">
                <?php illustrator_edge_get_header_widget(); ?>
	        </div>
	    </div>
    </div>
</aside>
<?php do_action('illustrator_edge_after_page_header'); ?>