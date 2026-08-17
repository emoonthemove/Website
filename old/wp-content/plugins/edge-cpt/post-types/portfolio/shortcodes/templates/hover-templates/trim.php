<div class="edgtf-item-text-holder">
	<?php
		echo $category_html;
	?>

	<<?php echo esc_attr($title_tag)?> class="edgtf-item-title">
		<a class ="edgtf-portfolio-title-link" href="<?php echo esc_url($item_link); ?>">
			<?php echo esc_attr(get_the_title()); ?>
		</a>
	</<?php echo esc_attr($title_tag)?>>

	<a class="edgtf-ptf-read-more" title="<?php esc_html_e('Go to Project','edge-cpt');?>" href="<?php echo esc_url($item_link); ?>" data-type="portfolio_list">
		<span class="arrow_right"></span>
	</a>
</div>