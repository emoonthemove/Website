<?php

/**
 * Widget that adds search icon that triggers opening of search form
 *
 * Class Edge_Search_Opener
 */
class IllustratorEdgeSearchOpener extends IllustratorEdgeWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'edgt_search_opener', // Base ID
            esc_html__('Edge Search Opener', 'illustrator') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'name'        => 'search_icon_size',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Size (px)', 'illustrator'),
                'description' => esc_html__('Define size for Search icon', 'illustrator')
            ),
            array(
                'name'        => 'search_icon_color',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Color', 'illustrator'),
                'description' => esc_html__('Define color for Search icon', 'illustrator')
            ),
            array(
                'name'        => 'search_icon_hover_color',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Hover Color', 'illustrator'),
                'description' => esc_html__('Define hover color for Search icon', 'illustrator')
            ),
            array(
                'name'        => 'show_label',
                'type'        => 'dropdown',
                'title'       => esc_html__('Enable Search Icon Text', 'illustrator'),
                'description' => esc_html__("Enable this option to show \'Search\' text next to search icon in header", 'illustrator'),
                'options'     => array(
                    ''    => '',
                    'yes' => esc_html__('Yes', 'illustrator'),
                    'no'  => esc_html__('No', 'illustrator')
                )
            ),
			array(
				'name'			=> 'close_icon_position',
				'type'			=> 'dropdown',
				'title'			=> esc_html__('Close icon stays on opener place', 'illustrator'),
				'description'	=> esc_html__('Enable this option to set close icon on same position like opener icon', 'illustrator'),
				'options'		=> array(
					'yes'	=> esc_html__('Yes', 'illustrator'),
					'no'	=> esc_html__('No', 'illustrator')
				)
			)
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {
        global $illustrator_edge_options, $illustrator_edge_IconCollections;

        $search_type_class    = 'edgtf-search-opener';
		$fullscreen_search_overlay = false;
        $search_opener_styles = array();
        $show_search_text     = $instance['show_label'] == 'yes' || $illustrator_edge_options['enable_search_icon_text'] == 'yes' ? true : false;
		$close_icon_on_same_position = $instance['close_icon_position'] == 'yes' ? true : false;
		$data = '';

		if (isset($illustrator_edge_options['search_type']) && $illustrator_edge_options['search_type'] == 'fullscreen-search') {
			if (isset($illustrator_edge_options['search_animation']) && $illustrator_edge_options['search_animation'] == 'search-from-circle') {
				$fullscreen_search_overlay = true;
			}
		}

        if(isset($illustrator_edge_options['search_type']) && $illustrator_edge_options['search_type'] == 'search_covers_header') {
            if(isset($illustrator_edge_options['search_cover_only_bottom_yesno']) && $illustrator_edge_options['search_cover_only_bottom_yesno'] == 'yes') {
                $search_type_class .= ' search_covers_only_bottom';
            }
        }

        if(!empty($instance['search_icon_size'])) {
            $search_opener_styles[] = 'font-size: '.$instance['search_icon_size'].'px';
        }
        
        if(!empty($instance['search_icon_color'])) {
            $search_opener_styles[] = 'color: '.$instance['search_icon_color'];
			$data .= 'data-color='.$instance['search_icon_color'];
        }


		if ($instance['search_icon_hover_color'] !== ''){
			$data .= ' data-hover-color='.$instance['search_icon_hover_color'];
		}

        ?>

        <a <?php echo esc_attr($data); ?>
			<?php if ( $close_icon_on_same_position ) {
				echo illustrator_edge_get_inline_attr('yes', 'data-icon-close-same-position');
			} ?>
            <?php illustrator_edge_inline_style($search_opener_styles); ?>
            <?php illustrator_edge_class_attribute($search_type_class); ?> href="javascript:void(0)">
            <?php if(isset($illustrator_edge_options['search_icon_pack'])) {
                $illustrator_edge_IconCollections->getSearchIcon($illustrator_edge_options['search_icon_pack'], false);
            } ?>
            <?php if($show_search_text) { ?>
                <span class="edgtf-search-icon-text"><?php esc_html_e('Search', 'illustrator'); ?></span>
            <?php } ?>
        </a>
		<?php if($fullscreen_search_overlay) { ?>
			<div class="edgtf-fullscreen-search-overlay"></div>
		<?php } ?>
    <?php }
}