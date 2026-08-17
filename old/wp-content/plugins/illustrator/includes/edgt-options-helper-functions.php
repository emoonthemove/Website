<?php

if(!function_exists('illustrator_edge_is_responsive_on')) {
    /**
     * Checks whether responsive mode is enabled in theme options
     * @return bool
     */
    function illustrator_edge_is_responsive_on() {
        return illustrator_edge_options()->getOptionValue('responsiveness') !== 'no';
    }
}