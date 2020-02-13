WooCommerce Add Payment Type to Emails

https://gerhardpotgieter.com/2013/11/14/woocommerce-add-payment-type-to-emails/

<?php
// Place the following code in your theme's functions.php file to add the payment type to all emails
add_action( 'woocommerce_email_after_order_table', 'wc_add_payment_type_to_emails', 15, 2 );
function wc_add_payment_type_to_emails( $order, $is_admin_email ) {
    echo '<p><strong>Payment Type:</strong> ' . $order->payment_method_title . '</p>';
}
// Place the following code in your theme's functions.php file to add the payment type to admin emails only
add_action( 'woocommerce_email_after_order_table', 'wc_add_payment_type_to_admin_emails', 15, 2 );
function wc_add_payment_type_to_admin_emails( $order, $is_admin_email ) {
    if ( $is_admin_email ) {
        echo '<p><strong>Payment Type:</strong> ' . $order->payment_method_title . '</p>';
    }
}
?>

https://gist.github.com/kloon/7464079#file-functions-php

-------
https://businessbloomer.com/woocommerce-add-payment-method-order-emails/