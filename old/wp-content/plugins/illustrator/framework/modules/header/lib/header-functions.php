<?php
use IllustratorEdge\Modules\Header\Lib;

if(!function_exists('illustrator_edge_set_header_object')) {
    function illustrator_edge_set_header_object() {
        $header_type = illustrator_edge_get_meta_field_intersect('header_type', illustrator_edge_get_page_id());

        $object = Lib\HeaderFactory::getInstance()->build($header_type);

        if(Lib\HeaderFactory::getInstance()->validHeaderObject()) {
            $header_connector = new Lib\HeaderConnector($object);
            $header_connector->connect($object->getConnectConfig());
        }
    }

    add_action('wp', 'illustrator_edge_set_header_object', 1);
}