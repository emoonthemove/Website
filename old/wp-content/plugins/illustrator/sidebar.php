<?php
$illustrator_edge_sidebar = illustrator_edge_get_sidebar();
?>
<div class="edgtf-column-inner">
    <aside class="edgtf-sidebar">
        <?php
            if (is_active_sidebar($illustrator_edge_sidebar)) {
                dynamic_sidebar($illustrator_edge_sidebar);
            }
        ?>
    </aside>
</div>
