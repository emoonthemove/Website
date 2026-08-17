<?php

get_header();
illustrator_edge_get_title();
get_template_part('slider');
illustrator_edge_single_portfolio();
do_action('illustrator_edge_after_container_close');
get_footer();

?>