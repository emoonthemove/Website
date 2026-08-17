<?php

class IllustratorEdgeWoocommerceDropdownCart extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'edgtf_woocommerce_dropdown_cart', // Base ID
			esc_html__('Edge Woocommerce Dropdown Cart', 'illustrator'), // Name
			array( 'description' => esc_html__( 'Edge Woocommerce Dropdown Cart', 'illustrator' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		global $post;
		extract( $args );

		global $woocommerce;
		global $illustrator_edge_options;

		$cart_style = 'edgtf-with-icon';

		?>
		<div class="edgtf-shopping-cart-outer">
			<div class="edgtf-shopping-cart-inner">
				<div class="edgtf-shopping-cart-header">
					<a class="edgtf-header-cart" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>">
						<span class="edgtf-cart-icon icon_cart"></span>
						<span class="edgtf-cart-amount"><?php echo esc_html($woocommerce->cart->get_cart_contents_count()); ?></span>
					</a>

					<div class="edgtf-shopping-cart-dropdown">
						<?php
						$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
						$list_class    = array( 'edgtf-cart-list', 'product_list_widget' );
						?>
						<ul>

							<?php if ( ! $cart_is_empty ) : ?>

								<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

									$_product      = $cart_item['data'];

									// Only display if allowed
									if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
										continue;
									}

									// Get price
									$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_including_tax($_product);
									?>


									<li>
										<div class="edgtf-item-image-holder">
											<a href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>">
												<?php echo wp_kses( $_product->get_image(), array(
													'img' => array(
														'src'    => true,
														'width'  => true,
														'height' => true,
														'class'  => true,
														'alt'    => true,
														'title'  => true,
														'id'     => true
													)
												) ); ?>
											</a>
										</div>
										<div class="edgtf-item-info-holder">
											<div class="edgtf-item-left">
												<a href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>">
													<?php echo apply_filters( 'woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
												</a>
												<div class="edgtf-quantity-holder">
													<span class="edgtf-quantity"><?php echo esc_html( $cart_item['quantity'] ); ?></span>
													<span>x</span>
													<?php echo apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?>
												</div>
											</div>
											<div class="edgtf-cart-remove">
												<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove edgtf-no-link" title="%s"><span class="ion-close"></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_html__('Remove this item', 'illustrator') ), $cart_item_key ); ?>
											</div>
										</div>
									</li>

								<?php endforeach; ?>
							</ul>
								<div class="edgtf-cart-bottom">
									<div class="edgtf-subtotal-holder clearfix">
										<span class="edgtf-total"><?php esc_html_e( 'Total', 'illustrator' ); ?>:</span>
										<span class="edgtf-total-amount">
											<?php echo wp_kses( $woocommerce->cart->get_cart_subtotal(), array(
												'span' => array(
													'class' => true,
													'id'    => true
												)
											) ); ?>
										</span>
									</div>
									<div class="edgtf-btns-holder clearfix">
										<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>"
										   class="edgtf-btn edgtf-btn-small edgtf-btn-solid view-cart">
											<?php esc_html_e( 'View Cart', 'illustrator' ); ?>
										</a>
										<a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>"
										   class="edgtf-btn edgtf-btn-small edgtf-btn-solid checkout">
											<?php esc_html_e( 'Checkout', 'illustrator' ); ?>
										</a>
									</div>
								</div>
							<?php else : ?>

								<li class="edgtf-empty-cart"><?php esc_html_e( 'No products in the cart.', 'illustrator' ); ?></li>
							</ul>

							<?php endif; ?>

						<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

						<?php endif; ?>


						<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

}

add_action( 'widgets_init', create_function( '', 'register_widget( "IllustratorEdgeWoocommerceDropdownCart" );' ) );
?>
<?php
add_filter( 'woocommerce_add_to_cart_fragments', 'illustrator_edge_woocommerce_header_add_to_cart_fragment' );
function illustrator_edge_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();
	?>
	<div class="edgtf-shopping-cart-header">
		<a class="edgtf-header-cart" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>">
			<span class="edgtf-cart-icon icon_cart"></span>
			<span class="edgtf-cart-amount"><?php echo esc_html($woocommerce->cart->get_cart_contents_count()); ?></span>
		</a>

		<div class="edgtf-shopping-cart-dropdown">
			<?php
			$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;
			//$list_class = array( 'edgtf-cart-list', 'product_list_widget' );
			?>
			<ul>

				<?php if ( ! $cart_is_empty ) : ?>

					<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :

						$_product      = $cart_item['data'];

						// Only display if allowed
						if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
							continue;
						}

						// Get price
						$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax($_product) : wc_get_price_including_tax($_product);
						?>

						<li>
							<div class="edgtf-item-image-holder">
								<?php echo wp_kses( $_product->get_image(), array(
									'img' => array(
										'src'    => true,
										'width'  => true,
										'height' => true,
										'class'  => true,
										'alt'    => true,
										'title'  => true,
										'id'     => true
									)
								) ); ?>
							</div>
							<div class="edgtf-item-info-holder">
								<div class="edgtf-item-left">
									<a href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>">
										<?php echo apply_filters( 'woocommerce_widget_cart_product_title', $_product->get_title(), $_product ); ?>
									</a>
									<div class="edgtf-quantity-holder">
										<span class="edgtf-quantity"><?php echo esc_html( $cart_item['quantity'] ); ?></span>
										<span>x</span>
										<?php echo apply_filters( 'woocommerce_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?>
									</div>
								</div>
								<div class="edgtf-cart-remove">
									<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove edgtf-no-link" title="%s"><span class="ion-close"></span></a>', esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ), esc_html__('Remove this item', 'illustrator') ), $cart_item_key ); ?>
								</div>
							</div>
						</li>

					<?php endforeach; ?>
				</ul>
					<div class="edgtf-cart-bottom">
						<div class="edgtf-subtotal-holder clearfix">
							<span class="edgtf-total"><?php esc_html_e( 'Total', 'illustrator' ); ?>:</span>
								<span class="edgtf-total-amount">
									<?php echo wp_kses( $woocommerce->cart->get_cart_subtotal(), array(
										'span' => array(
											'class' => true,
											'id'    => true
										)
									) ); ?>
								</span>
						</div>
						<div class="edgtf-btns-holder clearfix">
							<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>"
							   class="edgtf-btn edgtf-btn-small edgtf-btn-solid view-cart">
								<?php esc_html_e( 'View Cart', 'illustrator' ); ?>
							</a>
							<a href="<?php echo esc_url( $woocommerce->cart->get_checkout_url() ); ?>"
							   class="edgtf-btn edgtf-btn-small edgtf-btn-solid checkout">
								<?php esc_html_e( 'Checkout', 'illustrator' ); ?>
							</a>
						</div>
					</div>
				<?php else : ?>

					<li class="edgtf-empty-cart"><?php esc_html_e( 'No products in the cart.', 'illustrator' ); ?></li>
				</ul>

				<?php endif; ?>
			<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

			<?php endif; ?>


			<?php if ( sizeof( $woocommerce->cart->get_cart() ) <= 0 ) : ?>

			<?php endif; ?>
		</div>
	</div>

	<?php
	$fragments['div.edgtf-shopping-cart-header'] = ob_get_clean();

	return $fragments;
}

?>