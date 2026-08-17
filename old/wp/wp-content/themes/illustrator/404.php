<?php get_header(); ?>

	<div class="edgtf-container">
	<?php do_action('illustrator_edge_after_container_open'); ?>
		<div class="edgtf-container-inner edgtf-404-page">
			<div class="edgtf-page-not-found-part">
				<span class="edgtf-404-text"><?php esc_html_e('404', 'illustrator'); ?></span>
			</div>
			<div class="edgtf-page-not-found">
				<h1>
					<?php if(illustrator_edge_options()->getOptionValue('404_title')){
						echo esc_html(illustrator_edge_options()->getOptionValue('404_title'));
					}
					else{
						esc_html_e('Page cannot be found', 'illustrator');
					} ?>
				</h1>
				<p>
					<?php if(illustrator_edge_options()->getOptionValue('404_text')){
						echo esc_html(illustrator_edge_options()->getOptionValue('404_text'));
					}
					else{
						esc_html_e('The page requested couldn\'t be found. This could be a spelling error in the URL or a removed page.', 'illustrator');
					} ?>
				</p>
				<?php
					$illustrator_edge_params = array();
					if (illustrator_edge_options()->getOptionValue('404_back_to_home')){
						$illustrator_edge_params['text'] = illustrator_edge_options()->getOptionValue('404_back_to_home');
					}
					else{
						$illustrator_edge_params['text'] = esc_html__("Go Back",'illustrator');
					}
					$illustrator_edge_params['link'] = esc_url(home_url('/'));
					$illustrator_edge_params['target'] = '_self';
				    $illustrator_edge_params['background_color'] = '#303030';

					if (shortcode_exists('edgtf_button')){
						echo illustrator_edge_execute_shortcode('edgtf_button',$illustrator_edge_params);
					} else { ?>
						<a href="<?php echo esc_url(home_url('/'));?>" target="_self" class="edgtf-btn edgtf-btn-large edgtf-btn-solid">
							<span class="edgtf-btn-text"><?php echo esc_html($illustrator_edge_params['text']);?></span>
						</a>
					<?php } ?>
			</div>
		</div>
		<?php do_action('illustrator_edge_before_container_close'); ?>
	</div>
<?php get_footer(); ?>