<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content">
		<?php illustrator_edge_get_module_template_part('templates/lists/parts/image', 'blog'); ?>
		<?php illustrator_edge_get_module_template_part('templates/parts/audio', 'blog'); ?>
		<div class="edgtf-post-text">
			<div class="edgtf-post-text-inner">
				<div class="edgtf-post-info-holder">
					<div class="edgtf-post-info-holder-left">
						<?php illustrator_edge_post_info(array(
							'date' => 'yes',
							'author' => $show_author,
							'category' => $show_category
						)) ?>
					</div>
					<div class="edgtf-post-info-holder-right">
						<?php illustrator_edge_post_info(array(
							'comments' => 'yes',
							'like' => 'yes'
						)) ?>
					</div>
				</div>
				<?php illustrator_edge_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
				<?php illustrator_edge_excerpt($excerpt_length); ?>
				<?php illustrator_edge_get_module_template_part('templates/lists/parts/pages-navigation', 'blog');  ?>
			</div>
		</div>
	</div>
</article>