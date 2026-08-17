<?php do_action('illustrator_edge_before_sticky_header'); ?>

<div class="edgtf-sticky-header">
    <?php do_action( 'illustrator_edge_after_sticky_menu_html_open' ); ?>
    <div class="edgtf-sticky-holder">
    <?php if($sticky_header_in_grid) : ?>
        <div class="edgtf-grid">
            <?php endif; ?>
            <div class=" edgtf-vertical-align-containers">
                <div class="edgtf-position-left"><!--
                 --><div class="edgtf-position-left-inner">
                        <?php if(!$hide_logo) {
                            illustrator_edge_get_logo('sticky');
                        } ?>
                    </div>
                </div>
                <?php if ($centered_menu) { ?>
				<div class="edgtf-position-center"><!--
                 --><div class="edgtf-position-center-inner">
						<?php illustrator_edge_get_sticky_menu('edgtf-sticky-nav'); ?>
					</div>
				</div>
                <?php } ?>
                <div class="edgtf-position-right"><!--
                 --><div class="edgtf-position-right-inner">
						<?php
							switch($header_type):
								case 'header-standard':

			                        if (!$centered_menu) { 
										illustrator_edge_get_sticky_menu('edgtf-sticky-nav');
			                        }
									illustrator_edge_get_sticky_header_widget();

									break;
								case 'header-full-screen':

									illustrator_edge_get_full_screen_opener();

									break;
							endswitch;
						?>
                    </div>
                </div>
                <?php if ($header_type == 'header-expanding'){ ?>
					<span class="edgtf-expanding-background"></span>
                <?php } ?>
            </div>
            <?php if($sticky_header_in_grid) : ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php do_action('illustrator_edge_after_sticky_header'); ?>