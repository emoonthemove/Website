<?php $illustrator_edge_sidebar = illustrator_edge_sidebar_layout(); ?>
<?php get_header(); ?>
	<?php illustrator_edge_get_title(); ?>
	<?php get_template_part('slider'); ?>
	<div class="edgtf-container">
		<?php do_action('illustrator_edge_after_container_open'); ?>
		<div class="edgtf-container-inner clearfix">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php if(($illustrator_edge_sidebar == 'default')||($illustrator_edge_sidebar == '')) : ?>
					<?php the_content(); ?>
					<?php do_action('illustrator_edge_page_after_content'); ?>
				<?php elseif($illustrator_edge_sidebar == 'sidebar-33-right' || $illustrator_edge_sidebar == 'sidebar-25-right'): ?>
					<div <?php echo illustrator_edge_sidebar_columns_class(); ?>>
						<div class="edgtf-column1 edgtf-content-left-from-sidebar">
							<div class="edgtf-column-inner">
								<?php the_content(); ?>
								<?php do_action('illustrator_edge_page_after_content'); ?>
							</div>
						</div>
						<div class="edgtf-column2">
							<?php get_sidebar(); ?>
						</div>
					</div>
				<?php elseif($illustrator_edge_sidebar == 'sidebar-33-left' || $illustrator_edge_sidebar == 'sidebar-25-left'): ?>
					<div <?php echo illustrator_edge_sidebar_columns_class(); ?>>
						<div class="edgtf-column1">
							<?php get_sidebar(); ?>
						</div>
						<div class="edgtf-column2 edgtf-content-right-from-sidebar">
							<div class="edgtf-column-inner">
								<?php the_content(); ?>
								<?php do_action('illustrator_edge_page_after_content'); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<?php do_action('illustrator_edge_before_container_close'); ?>
	</div>
	<?php do_action('illustrator_edge_after_container_close'); ?>
<?php get_footer(); ?>