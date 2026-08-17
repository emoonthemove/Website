<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<a class="edgtf-post-whole-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
	<div class="edgtf-post-content">
		<div class="edgtf-post-text">
			<div class="edgtf-post-text-inner">
				<div class="edgtf-post-mark edgtf-link-mark">
					<span class="edgtf-post-mark-inner">
						<span class="icon_link"></span>
					</span>
				</div>
				<?php illustrator_edge_get_module_template_part('templates/lists/parts/link', 'blog'); ?>
				<span class="edgtf-post-link-title">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</span>
			</div>
		</div>
	</div>
</article>