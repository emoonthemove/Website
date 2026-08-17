<?php
$link_text = get_post_meta(get_the_ID(), "edgtf_post_link_link_text_meta", true);
$link = get_post_meta(get_the_ID(), "edgtf_post_link_link_meta", true);

if ($link_text !== '') { ?>
<h4 class="edgtf-post-title">
	<a href="<?php echo esc_url($link) ?>" title="<?php the_title_attribute(); ?>"><?php echo esc_html($link_text); ?></a>
</h4>
<?php } ?>