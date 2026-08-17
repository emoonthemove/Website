<?php // This line is needed for mixItUp gutter ?>
<article class="edgtf-portfolio-item mix <?php echo esc_attr($categories)?>">
	<div class = "edgtf-item-image-holder">
		<?php
			echo get_the_post_thumbnail(get_the_ID(),$thumb_size);
		?>
		<?php
			$featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); //original size				
			$large_image = $featured_image_array[0];
		?>
		<a class="edgtf-portfolio-lightbox" title="<?php the_title();?>" href="<?php echo esc_url($large_image);?>" data-rel="prettyPhoto[pretty_photo_gallery]">
			<span class="icon_plus"></span>
		</a>
	</div>
	<div class="edgtf-item-text-holder">
		<<?php echo esc_attr($title_tag)?> class="edgtf-item-title">
			<a href="<?php echo esc_url($item_link); ?>">
				<?php echo esc_attr(get_the_title()); ?>
			</a>	
		</<?php echo esc_attr($title_tag)?>>
		<?php
			echo $category_html;
		?>
	</div>
</article>
<?php // This line is needed for mixItUp gutter ?>