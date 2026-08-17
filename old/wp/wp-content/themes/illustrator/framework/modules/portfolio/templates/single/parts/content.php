<?php $title_tag = 'h3';

$type = illustrator_edge_get_portfolio_single_type();

if ($type == 'full-screen-slider'){
	$title_tag = 'h1';
}
?>
<div class="edgtf-portfolio-info-item edgtf-content-item">
    <<?php echo esc_attr($title_tag); ?> class="edgtf-portfolio-title"><?php the_title(); ?></<?php echo esc_attr($title_tag); ?>>
    <?php
    	if ($type == 'full-screen-slider'){
    		echo illustrator_edge_execute_shortcode('edgtf_separator', array('width' => '150px', 'color' => '#1f1f1f', 'thickness' => '2','position' => 'left'));
		}
	?>
    <div class="edgtf-portfolio-content">
        <?php the_content(); ?>
    </div>
</div>