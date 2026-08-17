<?php if(illustrator_edge_options()->getOptionValue('blog_single_navigation') == 'yes'){ ?>
	<?php $navigation_blog_through_category = illustrator_edge_options()->getOptionValue('blog_navigation_through_same_category') ?>
	<div class="edgtf-blog-single-navigation">
		<div class="edgtf-blog-single-navigation-inner">
			<?php if(get_previous_post() != ""){
				if($navigation_blog_through_category == 'yes'){
					if(get_previous_post(true) != ""){
						$prev_post = get_previous_post(true);
					}
				} else {
					if(get_previous_post() != ""){
						$prev_post = get_previous_post();
					}
				}

				$prev_post_ID = $prev_post->ID;
				$prev_background_image_src = wp_get_attachment_image_src(get_post_thumbnail_id($prev_post_ID),'illustrator_edge_square');
				$prev_post_thumbnail = $prev_background_image_src[0];
				$prev_classes = '';

				if ($prev_post_thumbnail == ''){
					$prev_classes = 'edgtf-nav-no-img';
				}

				$prev_post_title = '';

				if($prev_post->post_title != '') {
					$prev_post_title = $prev_post->post_title;
				}

				$prev_html = '<div class="edgtf-nav-holder '.esc_attr($prev_classes).'">';
				$prev_html .= '<div class="edgtf-nav-image" style="background-image:url('.esc_url($prev_post_thumbnail).');">';
				$prev_html .= '</div>';
				$prev_html .= '<div class="edgtf-nav-title">';
				$prev_html .= '<span class="edgtf-nav-title-span">'.esc_html($prev_post_title).'</span>';
				$prev_html .= '<span class="edgtf-nav-text">';
				$prev_html .= '<span class="edgtf-nav-arrows arrow_left"></span>';
				$prev_html .= esc_html__('Previous','illustrator');
				$prev_html .= '</span>';
				$prev_html .= '</div>';
				$prev_html .= '</div>';

				?>
				<div class="edgtf-blog-single-prev">
					<?php
					if($navigation_blog_through_category == 'yes'){
						previous_post_link('%link', $prev_html, true,'','category');
						
					} else {
						previous_post_link('%link',$prev_html);
					}
					?>
				</div><!-- close div.blog_prev -->
			<?php } else { ?>
				<div class="edgtf-nav-holder"></div>
			<?php } ?>

			<div class="edgtf-blog-single-share">
				<?php 
					if (shortcode_exists('edgtf_social_share')) {
						echo illustrator_edge_get_social_share_html();
					} ?>
			</div>

			<?php if(get_next_post() != ""){
				if($navigation_blog_through_category == 'yes'){
					if(get_next_post(true) != ""){
						$next_post = get_next_post(true);
					}
				} else {
					if(get_next_post() != ""){
						$next_post = get_next_post();
					}
				}

				$next_post_ID = $next_post->ID;
				$next_background_image_src = wp_get_attachment_image_src(get_post_thumbnail_id($next_post_ID),'illustrator_edge_square');
				$next_post_thumbnail = $next_background_image_src[0];
				$next_classes = '';

				if ($next_post_thumbnail == ''){
					$next_classes = 'edgtf-nav-no-img';
				}

				$next_post_title = '';

				if($next_post->post_title != '') {
					$next_post_title = $next_post->post_title;
				}

				$next_html = '<div class="edgtf-nav-holder '.esc_attr($next_classes).'">';
				$next_html .= '<div class="edgtf-nav-title">';
				$next_html .= '<span class="edgtf-nav-title-span">'.esc_html($next_post_title).'</span>';
				$next_html .= '<span class="edgtf-nav-text">';
				$next_html .= esc_html__('Next','illustrator');
				$next_html .= '<span class="edgtf-nav-arrows arrow_right"></span>';
				$next_html .= '</span>';
				$next_html .= '</div>';
				$next_html .= '<div class="edgtf-nav-image" style="background-image:url('.esc_url($next_post_thumbnail).');">';
				$next_html .= '</div>';
				$next_html .= '</div>';

				?>
				<div class="edgtf-blog-single-next">
					<?php
					if($navigation_blog_through_category == 'yes'){
						next_post_link('%link', $next_html, true,'','category');
					} else {
						next_post_link('%link',$next_html);
					}
					?>
				</div>
			<?php } else { ?>
				<div class="edgtf-nav-holder"></div>
			<?php } ?>
		</div>
	</div>
<?php } ?>