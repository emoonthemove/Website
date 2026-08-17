<?php

if ( ! function_exists('illustrator_edge_social_options_map') ) {

	function illustrator_edge_social_options_map() {

		illustrator_edge_add_admin_page(
			array(
				'slug'  => '_social_page',
				'title' => esc_html__('Social Networks', 'illustrator'),
				'icon'  => 'fa fa-share-alt'
			)
		);

		/**
		 * Enable Social Share
		 */
		$panel_social_share = illustrator_edge_add_admin_panel(array(
			'page'  => '_social_page',
			'name'  => 'panel_social_share',
			'title' => esc_html__('Enable Social Share', 'illustrator')
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Social Share', 'illustrator'),
			'description'	=> esc_html__('Enabling this option will allow social share on networks of your choice', 'illustrator'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_panel_social_networks, #edgtf_panel_show_social_share_on'
			),
			'parent'		=> $panel_social_share
		));

		$panel_show_social_share_on = illustrator_edge_add_admin_panel(array(
			'page'  			=> '_social_page',
			'name'  			=> 'panel_show_social_share_on',
			'title' 			=> esc_html__('Show Social Share On', 'illustrator'),
			'hidden_property'	=> 'enable_social_share',
			'hidden_value'		=> 'no'
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_post',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Posts', 'illustrator'),
			'description'	=> esc_html__('Show Social Share on Blog Posts', 'illustrator'),
			'parent'		=> $panel_show_social_share_on
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_page',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Pages', 'illustrator'),
			'description'	=> esc_html__('Show Social Share on Pages', 'illustrator'),
			'parent'		=> $panel_show_social_share_on
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_attachment',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Media', 'illustrator'),
			'description'	=> esc_html__('Show Social Share for Images and Videos', 'illustrator'),
			'parent'		=> $panel_show_social_share_on
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_portfolio-item',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Portfolio Item', 'illustrator'),
			'description'	=> esc_html__('Show Social Share for Portfolio Items', 'illustrator'),
			'parent'		=> $panel_show_social_share_on
		));

		if(illustrator_edge_is_woocommerce_installed()){
			illustrator_edge_add_admin_field(array(
				'type'			=> 'yesno',
				'name'			=> 'enable_social_share_on_product',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Product', 'illustrator'),
				'description'	=> esc_html__('Show Social Share for Product Items', 'illustrator'),
				'parent'		=> $panel_show_social_share_on
			));
		}

		/**
		 * Social Share Networks
		 */
		$panel_social_networks = illustrator_edge_add_admin_panel(array(
			'page'  			=> '_social_page',
			'name'				=> 'panel_social_networks',
			'title'				=> esc_html__('Social Networks', 'illustrator'),
			'hidden_property'	=> 'enable_social_share',
			'hidden_value'		=> 'no'
		));

		/**
		 * Facebook
		 */
		illustrator_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'facebook_title',
			'title'		=> esc_html__('Share on Facebook', 'illustrator')
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_facebook_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'illustrator'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Facebook', 'illustrator'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_facebook_share_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_facebook_share_container = illustrator_edge_add_admin_container(array(
			'name'		=> 'enable_facebook_share_container',
			'hidden_property'	=> 'enable_facebook_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'facebook_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'illustrator'),
			'parent'		=> $enable_facebook_share_container
		));

		/**
		 * Twitter
		 */
		illustrator_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'twitter_title',
			'title'		=> esc_html__('Share on Twitter', 'illustrator')
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_twitter_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'illustrator'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Twitter', 'illustrator'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_twitter_share_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_twitter_share_container = illustrator_edge_add_admin_container(array(
			'name'		=> 'enable_twitter_share_container',
			'hidden_property'	=> 'enable_twitter_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'twitter_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'illustrator'),
			'parent'		=> $enable_twitter_share_container
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'text',
			'name'			=> 'twitter_via',
			'default_value'	=> '',
			'label'			=> esc_html__('Via', 'illustrator'),
			'parent'		=> $enable_twitter_share_container
		));

		/**
		 * Google Plus
		 */
		illustrator_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'google_plus_title',
			'title'		=> esc_html__('Share on Google Plus', 'illustrator')
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_google_plus_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'illustrator'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Google Plus', 'illustrator'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_google_plus_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_google_plus_container = illustrator_edge_add_admin_container(array(
			'name'		=> 'enable_google_plus_container',
			'hidden_property'	=> 'enable_google_plus_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'google_plus_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'illustrator'),
			'parent'		=> $enable_google_plus_container
		));

		/**
		 * Linked In
		 */
		illustrator_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'linkedin_title',
			'title'		=> esc_html__('Share on LinkedIn', 'illustrator')
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_linkedin_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'illustrator'),
			'description'	=> esc_html__('Enabling this option will allow sharing via LinkedIn', 'illustrator'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_linkedin_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_linkedin_container = illustrator_edge_add_admin_container(array(
			'name'		=> 'enable_linkedin_container',
			'hidden_property'	=> 'enable_linkedin_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'linkedin_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'illustrator'),
			'parent'		=> $enable_linkedin_container
		));

		/**
		 * Tumblr
		 */
		illustrator_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'tumblr_title',
			'title'		=> esc_html__('Share on Tumblr', 'illustrator')
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_tumblr_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'illustrator'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Tumblr', 'illustrator'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_tumblr_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_tumblr_container = illustrator_edge_add_admin_container(array(
			'name'		=> 'enable_tumblr_container',
			'hidden_property'	=> 'enable_tumblr_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'tumblr_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'illustrator'),
			'parent'		=> $enable_tumblr_container
		));

		/**
		 * Pinterest
		 */
		illustrator_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'pinterest_title',
			'title'		=> esc_html__('Share on Pinterest', 'illustrator')
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_pinterest_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'illustrator'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Pinterest', 'illustrator'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_pinterest_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_pinterest_container = illustrator_edge_add_admin_container(array(
			'name'				=> 'enable_pinterest_container',
			'hidden_property'	=> 'enable_pinterest_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'pinterest_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'illustrator'),
			'parent'		=> $enable_pinterest_container
		));

		/**
		 * VK
		 */
		illustrator_edge_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'vk_title',
			'title'		=> esc_html__('Share on VK', 'illustrator')
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_vk_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'illustrator'),
			'description'	=> esc_html__('Enabling this option will allow sharing via VK', 'illustrator'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#edgtf_enable_vk_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_vk_container = illustrator_edge_add_admin_container(array(
			'name'				=> 'enable_vk_container',
			'hidden_property'	=> 'enable_vk_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		illustrator_edge_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'vk_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'illustrator'),
			'parent'		=> $enable_vk_container
		));

		if(defined('EDGEF_TWITTER_FEED_VERSION')) {
            $twitter_panel = illustrator_edge_add_admin_panel(array(
                'title' => esc_html__('Twitter', 'illustrator'),
                'name'  => 'panel_twitter',
                'page'  => '_social_page'
            ));

            illustrator_edge_add_admin_twitter_button(array(
                'name'   => 'twitter_button',
                'parent' => $twitter_panel
            ));
        }

        if(defined('EDGEF_INSTAGRAM_FEED_VERSION')) {
            $instagram_panel = illustrator_edge_add_admin_panel(array(
                'title' => esc_html__('Instagram', 'illustrator'),
                'name'  => 'panel_instagram',
                'page'  => '_social_page'
            ));

            illustrator_edge_add_admin_instagram_button(array(
                'name'   => 'instagram_button',
                'parent' => $instagram_panel
            ));
        }
	}

	add_action( 'illustrator_edge_options_map', 'illustrator_edge_social_options_map', 17);
}