<?php
/**
 * Plugin Name: AutomateWoo Order Rule - Shipping State
 * Description: Adds a custom AutomateWoo rule to check the shipping state on order.
 * Version: 1.0
 * Author: WP Special Projects
 * Text Domain: automatewoo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_filter(
	'automatewoo/rules/includes',
	function( $rules ) {
		// Include the shipping state rule file.
		include plugin_dir_path( __FILE__ ) . 'class-automatewoo-rule-order-shipping-state.php';

		// Register the rule with a unique key and rule class name.
		$rules['order_shipping_state'] = 'AutomateWoo_Rule_Order_Shipping_State';

		return $rules;
	}
);

