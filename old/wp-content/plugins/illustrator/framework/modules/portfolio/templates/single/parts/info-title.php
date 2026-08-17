<?php
$show_title = false;

//check if there is any od the info parts one by one, if it does then show title

//check categories
if(illustrator_edge_options()->getOptionValue('portfolio_single_hide_categories') !== 'yes') {
    $categories   = wp_get_post_terms(get_the_ID(), 'portfolio-category');

    if(is_array($categories) && count($categories)){
    	$show_title = true;
    }
}

//check custom fields
$custom_fields = get_post_meta(get_the_ID(), 'edgt_portfolios', true);

if(is_array($custom_fields) && count($custom_fields)){
	$show_title = true;
}

if(illustrator_edge_options()->getOptionValue('portfolio_single_hide_date') !== 'yes'){
	$show_title = true;
}

$tags = wp_get_post_terms(get_the_ID(), 'portfolio_tag');

if(is_array($tags) && count($tags)){
	$show_title = true;
}


if ($show_title) { ?>
	<span class="edgtf-portfolio-info-title"><?php esc_html_e('Info','illustrator');?></span>
<?php } ?>
