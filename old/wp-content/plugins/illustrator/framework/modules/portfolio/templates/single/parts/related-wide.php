<?php 
$back_to_link = get_post_meta( get_the_ID(), 'portfolio_single_back_to_link', true );
?>

<div class="edgtf-portfolio-list-holder-outer edgtf-ptf-gallery edgtf-portfolio-slider-holder edgtf-portfolio-related-holder" data-items='3' data-centered='yes'>
    <h5 class="edgtf-ptf-related-title"><?php esc_html_e('Related Projects', 'illustrator'); ?></h5>
    <div class="edgtf-portfolio-list-holder clearfix">
        <?php
        $query = illustrator_edge_get_related_post_type(get_the_ID(), array('posts_per_page' => '6'));
        if (is_object($query)) {
            if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <?php if (has_post_thumbnail()) {
                    $id = get_the_ID();
                    $item_link = get_permalink($id);
                    if (get_post_meta($id, 'portfolio_external_link', true) !== '') {
                        $item_link = get_post_meta($id, 'portfolio_external_link', true);
                    }

                    $categories = wp_get_post_terms($id, 'portfolio-category');
                    $category_html = '';
                    $k = 1;
                    foreach ($categories as $cat) {
                        $category_html .= '<span>' . $cat->name . '</span>';
                        if (count($categories) != $k) {
                            $category_html .= ' / ';
                        }
                        $k++;
                    }
                    ?>
                    <article class="edgtf-portfolio-item mix">
	                    <div class="edgtf-portfolio-item-inner">
	                    	<div class = "edgtf-item-image-holder">
								<a class="edgtf-portfolio-link" href="<?php echo esc_url($item_link); ?>"></a>
								<?php
									echo get_the_post_thumbnail(get_the_ID(),'illustrator_edge_landscape');
								?>
								<div class="edgtf-item-text-overlay">
									<div class="edgtf-item-text-overlay-inner">
										<div class="edgtf-item-text-holder">
											<h5 class="edgtf-item-title">
												<?php echo esc_attr(get_the_title()); ?>
											</h5>
											<div class="edgtf-ptf-category-holder">
												<?php
												print $category_html;
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </article>
                <?php } ?>
                <?php
            endwhile;
            endif;
            wp_reset_postdata();
        } else { ?>
            <p><?php esc_html_e('No related portfolios were found.', 'illustrator'); ?></p>
        <?php }
        ?>
    </div>
</div>

