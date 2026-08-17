<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content">
		<div class="edgtf-post-text">
			<div class="edgtf-post-text-inner clearfix">
				<div class="edgtf-post-mark edgtf-quote-mark">
					<span class="edgtf-post-mark-inner">
						<span class="icon_quotations"></span>
					</span>
				</div>
				<h4 class="edgtf-post-title">
					<?php echo esc_html(get_post_meta(get_the_ID(), "edgtf_post_quote_text_meta", true)); ?>
				</h4>
				<span class="edgtf-quote-author"><?php the_title(); ?></span>
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