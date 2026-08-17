<?php $illustrator_edge_sidebar = illustrator_edge_sidebar_layout(); ?>
<?php get_header(); ?>
<?php 

$illustrator_edge_blog_page_range = illustrator_edge_get_blog_page_range();
$illustrator_edge_max_number_of_pages = illustrator_edge_get_max_number_of_pages();

if ( get_query_var('paged') ) { $illustrator_edge_paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $illustrator_edge_paged = get_query_var('page'); }
else { $illustrator_edge_paged = 1; }
?>
<?php illustrator_edge_get_title(); ?>
	<div class="edgtf-container">
		<?php do_action('illustrator_edge_after_container_open'); ?>
		<div class="edgtf-container-inner clearfix">
			<div class="edgtf-container">
				<?php do_action('illustrator_edge_after_container_open'); ?>
				<div class="edgtf-container-inner" >
					<div class="edgtf-blog-holder edgtf-blog-type-standard edgtf-search-page">
				<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="edgtf-post-content">
							<div class="edgtf-post-text">
								<div class="edgtf-post-text-inner">
									<h3>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
									</h3>
									<p>
										<?php the_excerpt();?>
									</p>
									<?php
									if (shortcode_exists('edgtf_button')){
										echo illustrator_edge_get_button_html(array(
										'size' => 'medium',
										'link' => get_the_permalink(),
										'text' => esc_html__('Read More', 'illustrator'),
										'custom_class' => 'edgtf-blog-btn-read-more'
									));
									} else { ?>
										<a href="<?php the_permalink();?>" target="_self" class="edgtf-btn edgtf-btn-medium edgtf-btn-solid edgtf-blog-btn-read-more">
											<span class="edgtf-btn-text"><?php esc_html_e('Read More', 'illustrator'); ?></span>
										</a>
									<?php }	?>
								</div>
							</div>
						</div>
					</article>
					<?php endwhile; ?>
					<?php
						if(illustrator_edge_options()->getOptionValue('pagination') == 'yes') {
							illustrator_edge_pagination($illustrator_edge_max_number_of_pages, $illustrator_edge_blog_page_range, $illustrator_edge_paged);
						}
					?>
					<?php else: ?>
					<div class="entry">
						<p><?php esc_html_e('No posts were found.', 'illustrator'); ?></p>
					</div>
					<?php endif; ?>
				</div>
				<?php do_action('illustrator_edge_before_container_close'); ?>
			</div>
			</div>
		</div>
		<?php do_action('illustrator_edge_before_container_close'); ?>
	</div>
	<?php do_action('illustrator_edge_after_container_close'); ?>
<?php get_footer(); ?>