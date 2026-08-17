<?php
/**
 * Blockquote shortcode template
 */
?>

<blockquote class="edgtf-blockquote-shortcode" <?php illustrator_edge_inline_style($blockquote_style); ?> >
	<span class="edgtf-icon-quotations-holder">
		<?php echo illustrator_edge_icon_collections()->getQuoteIcon("font_elegant", true); ?>
	</span>
	<p class="edgtf-blockquote-text">
		<?php echo esc_attr($text); ?>
	</p>
</blockquote>