<div <?php illustrator_edge_class_attribute($tab_class)?>>
	<ul class="edgtf-tabs-nav">
		<?php foreach ($tabs_titles as $tab_title) { ?>
			<li>
				<a href="#tab-<?php echo sanitize_title($tab_title)?>">
					<?php if(in_array('edgtf-vertical-tab', $tab_class) && (in_array('edgtf-tab-with-icon', $tab_class) || in_array('edgtf-tab-only-icon', $tab_class))) { ?>
						<span class="edgtf-icon-frame"></span>
					<?php } ?>

					<?php if($tab_title !== '' && !in_array('edgtf-tab-only-icon', $tab_class)) { ?>
						<span class="edgtf-tab-text-after-icon">
							<?php echo esc_attr($tab_title)?>
						</span>
					<?php } ?>
						
					<?php if(!in_array('edgtf-vertical-tab', $tab_class) && (in_array('edgtf-tab-with-icon', $tab_class) || in_array('edgtf-tab-only-icon', $tab_class))) { ?>
						<span class="edgtf-icon-frame"></span>
					<?php } ?>
				</a>
			 </li>
		<?php } ?>
	</ul> 
	<?php echo do_shortcode($content); ?>
</div>