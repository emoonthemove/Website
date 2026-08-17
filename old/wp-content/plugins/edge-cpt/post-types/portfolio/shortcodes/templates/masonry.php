<article class="edgtf-portfolio-item <?php echo esc_attr($article_masonry_size)?> <?php echo esc_attr($categories)?>">
	<div class="edgtf-portfolio-item-inner">
		<a class ="edgtf-portfolio-link" href="<?php echo esc_url($item_link); ?>"></a>
		<div class = "edgtf-item-image-holder">
			<div class="edgtf-item-image-holder-inner">
				<?php
					echo get_the_post_thumbnail(get_the_ID(),$thumb_size);
				?>
			</div>
		</div>
		<div class="edgtf-item-text-overlay">
			<div class="edgtf-item-text-overlay-inner">
				<?php echo edge_cpt_get_shortcode_module_template_part('portfolio','hover-templates/'.$hover_type, '', $hover_params); ?>
			</div>
		</div>
	</div>
</article>
