<?php
if(!function_exists('illustrator_edge_map_portfolio_meta_fields')) {

    function illustrator_edge_map_portfolio_meta_fields() {
        global $illustrator_edge_Framework;
		$edgt_pages = array();
		$pages = get_pages(); 
		foreach($pages as $page) {
			$edgt_pages[$page->ID] = $page->post_title;
		}

		//Portfolio Images

		$edgtPortfolioImages = new IllustratorEdgeMetaBox("portfolio-item", esc_html__("Portfolio Images (multiple upload)", 'illustrator'), '', '', 'portfolio_images');
		$illustrator_edge_Framework->edgtMetaBoxes->addMetaBox("portfolio_images",$edgtPortfolioImages);

			$edgt_portfolio_image_gallery = new IllustratorEdgeMultipleImages("edgt_portfolio-image-gallery",esc_html__("Portfolio Images", 'illustrator'),esc_html__("Choose your portfolio images", 'illustrator'));
			$edgtPortfolioImages->addChild("edgt_portfolio-image-gallery",$edgt_portfolio_image_gallery);

		//Portfolio Images/Videos 2

		$edgtPortfolioImagesVideos2 = new IllustratorEdgeMetaBox("portfolio-item", esc_html__("Portfolio Images/Videos (single upload)", 'illustrator'));
		$illustrator_edge_Framework->edgtMetaBoxes->addMetaBox("portfolio_images_videos2",$edgtPortfolioImagesVideos2);

			$edgt_portfolio_images_videos2 = new IllustratorEdgeImagesVideosFramework(esc_html__("Portfolio Images/Videos 2", 'illustrator'),esc_html__("ThisIsDescription", 'illustrator'));
			$edgtPortfolioImagesVideos2->addChild("edgt_portfolio_images_videos2",$edgt_portfolio_images_videos2);

		//Portfolio Additional Sidebar Items

		$edgtAdditionalSidebarItems = illustrator_edge_add_meta_box(
		    array(
		        'scope' => array('portfolio-item'),
		        'title' => esc_html__('Additional Portfolio Sidebar Items', 'illustrator'),
		        'name' => 'portfolio_properties'
		    )
		);

			$edgt_portfolio_properties = illustrator_edge_add_options_framework(
			    array(
			        'label' => esc_html__('Portfolio Properties', 'illustrator'),
			        'name' => 'edgt_portfolio_properties',
			        'parent' => $edgtAdditionalSidebarItems
			    )
			);
		}

    add_action('illustrator_edge_meta_boxes_map', 'illustrator_edge_map_portfolio_meta_fields');
}