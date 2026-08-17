<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content">
		<div class="edgtf-post-image">
			<?php illustrator_edge_get_module_template_part('templates/parts/video', 'blog'); ?>
		</div>
		<div class="edgtf-post-text">
			<div class="edgtf-post-text-inner clearfix">
				<?php illustrator_edge_get_module_template_part('templates/single/parts/title', 'blog'); ?>

				<?php the_content(); ?>

				<?php illustrator_edge_get_module_template_part('templates/lists/parts/pages-navigation', 'blog');  ?>
				
				<div class="edgtf-post-info-holder edgtf-post-info-bottom">
					<div class="edgtf-post-info-holder-left">
						<?php illustrator_edge_post_info(array(
							'date' => 'yes',
							'author' => 'yes',
							'category' => 'yes',
						)) ?>
					</div>
					<div class="edgtf-post-info-holder-right">
						<?php illustrator_edge_post_info(array(
							'comments' => 'yes',
							'like' => 'yes',
						), 'single') ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php do_action('illustrator_edge_before_blog_article_closed_tag'); ?>
</article>