<?php 

// Раскрывающийся список колличесва товара.

function ace_quantity_input_field_args( $args, $product ) {
	if ( ! $product->is_sold_individually() ) {
		$args['min_value'] = 1;
		$args['max_value'] = 10;
		$args['step'] = 2;
	}

	return $args;
}
add_filter( 'woocommerce_quantity_input_args', 'ace_quantity_input_field_args', 10, 2 );



?>