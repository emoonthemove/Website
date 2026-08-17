<div class="edgtf-item-text-holder">
	<?php
		echo $category_html;
	?>

	<<?php echo esc_attr($title_tag)?> class="edgtf-item-title">
		<a class ="edgtf-portfolio-title-link" href="<?php echo esc_url($item_link); ?>">
			<?php echo esc_attr(get_the_title()); ?>
		</a>
	</<?php echo esc_attr($title_tag)?>>

	<?php
		$featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); //original size				
		$large_image = $featured_image_array[0];
	?>
	<a class="edgtf-portfolio-lightbox" title="<?php the_title();?>" href="<?php echo esc_url($large_image);?>" data-rel="prettyPhoto[pretty_photo_gallery]">
		<span class="icon_plus"></span>
	</a>
</div>