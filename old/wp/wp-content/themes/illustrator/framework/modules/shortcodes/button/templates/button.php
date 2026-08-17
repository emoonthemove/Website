<button type="submit" <?php illustrator_edge_inline_style($button_styles); ?> <?php illustrator_edge_class_attribute($button_classes); ?> <?php echo illustrator_edge_get_inline_attrs($button_data); ?> <?php echo illustrator_edge_get_inline_attrs($button_custom_attrs); ?>>
    <span class="edgtf-btn-text"><?php echo esc_html($text); ?></span>
    <?php if ($icon !== '' && $icon_pack !== '') { ?>
		<span class="edgtf-btn-icon-holder">
			<?php echo illustrator_edge_icon_collections()->renderIcon($icon, $icon_pack); ?>
		</span>
	<?php } ?>
</button>