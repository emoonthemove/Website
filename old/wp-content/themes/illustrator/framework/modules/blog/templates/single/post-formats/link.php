<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content">
		<div class="edgtf-post-text">
			<a href="<?php echo esc_url(get_post_meta(get_the_ID(), "edgtf_post_link_link_meta", true)); ?>" class="edgtf-blog-link-holder"></a>
			<div class="edgtf-post-text-inner clearfix">
				<div class="edgtf-post-mark edgtf-link-mark">
					<span class="edgtf-post-mark-inner">
						<span class="icon_link"></span>
					</span>
				</div>
				<?php illustrator_edge_get_module_template_part('templates/single/parts/link', 'blog'); ?>
				<span class="edgtf-post-link-title">
					<a href="<?php echo esc_url(get_post_meta(get_the_ID(), "edgtf_post_link_link_meta", true)); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</span>
			</div>
		</div>

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
</article>