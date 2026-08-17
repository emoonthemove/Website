<?php

if ($show_more == 'load_more'){
	$text = esc_html__('Load More','edge-cpt');
	$type = '';
}else{
	$text = esc_html__('Loading...','edge-cpt');
	$type = 'transparent';
}

if($query_results->max_num_pages>1){ ?>
	<div class="edgtf-ptf-list-paging">
		<span class="edgtf-ptf-list-load-more">
			<?php 
				echo illustrator_edge_get_button_html(array(
					'type' => $type,
					'link' => 'javascript: void(0)',
					'text' => $text
				));
			?>
		</span>
	</div>
<?php }