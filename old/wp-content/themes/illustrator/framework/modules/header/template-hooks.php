<?php

//top header bar
add_action('illustrator_edge_before_page_header', 'illustrator_edge_get_header_top');

//mobile header
add_action('illustrator_edge_after_page_header', 'illustrator_edge_get_mobile_header');