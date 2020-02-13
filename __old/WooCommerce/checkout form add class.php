<?php
//add bootstrap class to form fields
add_filter('woocommerce_form_field_args',  'wc_form_field_bootstrap_class_fun',10,3);
function wc_form_field_bootstrap_class_fun($args_bs, $key_bs, $value_bs) {
	$args_bs['class'][] = 'form-group';
	$args_bs['input_class'] = array( 'form-control' );
	return $args_bs;
}
//!add bootstrap class to form fields
?>