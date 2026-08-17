<?php
$icon_html = illustrator_edge_icon_collections()->renderIcon($icon, $icon_pack, $params);
?>
<div class="edgtf-icon-list-item <?php echo esc_attr($classes);?>" <?php illustrator_edge_inline_style($style);?>>
	<div class="edgtf-icon-list-icon-holder">
		<?php if ($link !== '') { ?>
			<a class="edgtf-icon-item-link" href="<?php echo esc_url($link)?>" target="<?php echo esc_attr($target)?>"></a>
		<?php } ?>
        <div class="edgtf-icon-list-icon-holder-inner clearfix">
			<?php if(!empty($custom_icon)) {
                echo wp_get_attachment_image($custom_icon, 'full');
            }
			else {
                print $icon_html;
            } ?>
		</div>
	</div>
	<p class="edgtf-icon-list-text" <?php illustrator_edge_inline_style($title_style)?> > <?php echo esc_attr($title)?></p>
</div>