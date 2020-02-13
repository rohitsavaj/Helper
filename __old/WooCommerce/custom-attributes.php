https://stackoverflow.com/questions/13374883/woocommerce-getting-custom-attributes
Get custom product attributes in Woocommerce
<?php

global $product;
$koostis = array_shift( wc_get_product_terms( $product->id, 'pa_koostis', array( 'fields' => 'names' ) ) );

global $product;
$koostis = $product->get_attribute( 'pa_koostis' );

$result = array_shift(woocommerce_get_product_terms($product->id, 'pa_koostis', 'names'));