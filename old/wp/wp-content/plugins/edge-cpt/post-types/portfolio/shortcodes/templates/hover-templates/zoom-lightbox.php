<div class="edgtf-item-text-holder">
	<?php
		$featured_image_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); //original size				
		$large_image = $featured_image_array[0];
	?>
	<a class="edgtf-portfolio-lightbox" title="<?php the_title();?>" href="<?php echo esc_url($large_image);?>" data-rel="prettyPhoto[pretty_photo_gallery]">
		<span class="icon_plus"></span>
	</a>
</div>