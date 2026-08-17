<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

$edge_product_id = $product->get_id();
$edge_product_min_purchase = $product->get_min_purchase_quantity();
$edge_product_max_purchase = $product->get_max_purchase_quantity();

echo wc_get_stock_html( $product );

?>

<?php if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

	<form class="cart" method="post" enctype='multipart/form-data'>
		<?php
			/**
			 * @since 3.0.0.
			 */
			do_action( 'woocommerce_before_add_to_cart_quantity' );
		?>

	 	<?php
			woocommerce_quantity_input( array(
			'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $edge_product_min_purchase, $product ),
			'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $edge_product_max_purchase, $product ),
			'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : $edge_product_min_purchase,
		) );

		/**
		 * @since 3.0.0.
		 */
		do_action( 'woocommerce_after_add_to_cart_quantity' );
	 	?>

	 	<input type="hidden" name="add-to-cart" value="<?php echo esc_attr( $edge_product_id ); ?>" />

		<?php
			//Overriden add to cart button
			do_action('illustrator_edge_woocommerce_add_to_cart_button');
		?>

		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

<?php endif; ?>