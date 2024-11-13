<?php

defined( 'ABSPATH' ) || exit;

/**
 * Custom Rule: Order - Shipping State
 *
 * This rule checks the shipping state of an order.
 */
class AutomateWoo_Rule_Order_Shipping_State extends \AutomateWoo\Rules\Rule {

	public $type = 'select';

	public $data_item = 'order';

	private $us_states = array(
		'AL' => 'Alabama',
		'AK' => 'Alaska',
		'AZ' => 'Arizona',
		'AR' => 'Arkansas',
		'CA' => 'California',
		'CO' => 'Colorado',
		'CT' => 'Connecticut',
		'DE' => 'Delaware',
		'FL' => 'Florida',
		'GA' => 'Georgia',
		'HI' => 'Hawaii',
		'ID' => 'Idaho',
		'IL' => 'Illinois',
		'IN' => 'Indiana',
		'IA' => 'Iowa',
		'KS' => 'Kansas',
		'KY' => 'Kentucky',
		'LA' => 'Louisiana',
		'ME' => 'Maine',
		'MD' => 'Maryland',
		'MA' => 'Massachusetts',
		'MI' => 'Michigan',
		'MN' => 'Minnesota',
		'MS' => 'Mississippi',
		'MO' => 'Missouri',
		'MT' => 'Montana',
		'NE' => 'Nebraska',
		'NV' => 'Nevada',
		'NH' => 'New Hampshire',
		'NJ' => 'New Jersey',
		'NM' => 'New Mexico',
		'NY' => 'New York',
		'NC' => 'North Carolina',
		'ND' => 'North Dakota',
		'OH' => 'Ohio',
		'OK' => 'Oklahoma',
		'OR' => 'Oregon',
		'PA' => 'Pennsylvania',
		'RI' => 'Rhode Island',
		'SC' => 'South Carolina',
		'SD' => 'South Dakota',
		'TN' => 'Tennessee',
		'TX' => 'Texas',
		'UT' => 'Utah',
		'VT' => 'Vermont',
		'VA' => 'Virginia',
		'WA' => 'Washington',
		'WV' => 'West Virginia',
		'WI' => 'Wisconsin',
		'WY' => 'Wyoming',
	);

	public function init() {
		$this->title = __( 'Order - Shipping State', 'automatewoo' );
		$this->group = __( 'Order', 'automatewoo' );

		$this->compare_types = array(
			'is'     => __( 'is', 'automatewoo' ),
			'is_not' => __( 'is not', 'automatewoo' ),
		);
	}

	public function load_admin_details() {
		$this->add_option(
			'state',
			array(
				'field_type' => 'select',
			)
		);
	}

	public function get_select_choices() {
		return $this->us_states;
	}

	public function validate( $order, $compare, $expected_value ) {
		$actual_value = $order->get_shipping_state();

		switch ( $compare ) {
			case 'is':
				return $actual_value === $expected_value;
			case 'is_not':
				return $actual_value !== $expected_value;
		}

		return false;
	}
}
