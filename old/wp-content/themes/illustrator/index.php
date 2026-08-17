<?php
$illustrator_edge_blog_archive_pages_classes = illustrator_edge_blog_archive_pages_classes(illustrator_edge_get_default_blog_list());
?>
<?php get_header(); ?>
<?php illustrator_edge_get_title(); ?>
<div class="<?php echo esc_attr($illustrator_edge_blog_archive_pages_classes['holder']); ?>">
	<?php do_action('illustrator_edge_after_container_open'); ?>
	<div class="<?php echo esc_attr($illustrator_edge_blog_archive_pages_classes['inner']); ?>">
		<?php illustrator_edge_get_blog(illustrator_edge_get_default_blog_list()); ?>
	</div>
	<?php do_action('illustrator_edge_before_container_close'); ?>
</div>
<?php do_action('illustrator_edge_after_container_close'); ?>
<?php get_footer(); ?>
