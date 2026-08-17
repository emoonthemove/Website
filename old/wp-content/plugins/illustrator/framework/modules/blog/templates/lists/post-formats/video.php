<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="edgtf-post-content">
		<div class="edgtf-post-image">
			<?php illustrator_edge_get_module_template_part('templates/parts/video', 'blog'); ?>
		</div>
		<div class="edgtf-post-text">
			<div class="edgtf-post-text-inner">
				<?php illustrator_edge_get_module_template_part('templates/lists/parts/title', 'blog'); ?>

				<?php  if ($type == 'standard-whole-post') {
					the_content();
				}
				else{
					illustrator_edge_excerpt($excerpt_length);
				}
				?>
				<?php illustrator_edge_get_module_template_part('templates/lists/parts/pages-navigation', 'blog');  ?>

				<div class="edgtf-post-info-holder edgtf-post-info-bottom">
					<div class="edgtf-post-info-holder-left">
						<?php illustrator_edge_post_info(array(
							'date' => 'yes',
							'author' => $show_author,
							'category' => $show_category,
							'comments' => 'yes',
							'like' => 'yes'
						)) ?>
					</div>
					<div class="edgtf-post-info-holder-right">
						<?php if (shortcode_exists('edgtf_button')){
							echo illustrator_edge_get_button_html(array(
								'type' => 'transparent',
								'link' => get_the_permalink(),
								'text' => esc_html__('Read More', 'illustrator')
							)); 
						}
						else{ ?>
							<a href="<?php the_permalink();?>" target="_blank" class="edgtf-btn edgtf-btn-large edgtf-btn-transparent">
								<span class="edgtf-btn-text"><?php esc_html_e('Read More','illustrator');?></span>
							</a>
						<?php }	?>
					</div>
				</div>
			</div>
		</div>
	</div>
</article>