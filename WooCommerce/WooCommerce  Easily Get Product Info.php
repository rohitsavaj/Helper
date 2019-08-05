source: https://businessbloomer.com/woocommerce-easily-get-product-info-title-sku-desc-product-object/

1. You have access to $product


Hooks (do_action and apply_filters) use additional arguments which are passed on to the function. If they allow you to use the “$product” object you’re in business. Alternatively, you can declare the “global $product” inside your function.

In both cases, here’s how to get all the product information:
// Get Product ID

$product->get_id(); (fixes the error: "Notice: id was called incorrectly. Product properties should not be accessed directly")

// Get Product General Info

$product->get_type();
$product->get_name();
$product->get_slug();
$product->get_date_created();
$product->get_date_modified();
$product->get_status();
$product->get_featured();
$product->get_catalog_visibility();
$product->get_description();
$product->get_short_description();
$product->get_sku();
$product->get_menu_order();
$product->get_virtual();
get_permalink( $product->get_id() );

// Get Product Prices

$product->get_price();
$product->get_regular_price();
$product->get_sale_price();
$product->get_date_on_sale_from();
$product->get_date_on_sale_to();
$product->get_total_sales();

// Get Product Tax, Shipping & Stock

$product->get_tax_status();
$product->get_tax_class();
$product->get_manage_stock();
$product->get_stock_quantity();
$product->get_stock_status();
$product->get_backorders();
$product->get_sold_individually();
$product->get_purchase_note();
$product->get_shipping_class_id();

// Get Product Dimensions

$product->get_weight();
$product->get_length();
$product->get_width();
$product->get_height();
$product->get_dimensions();

// Get Linked Products

$product->get_upsell_ids();
$product->get_cross_sell_ids();
$product->get_parent_id();

// Get Product Variations

$product->get_attributes();
$product->get_default_attributes();

// Get Product Taxonomies

$product->get_categories();
$product->get_category_ids();
$product->get_tag_ids();

// Get Product Downloads

$product->get_downloads();
$product->get_download_expiry();
$product->get_downloadable();
$product->get_download_limit();

// Get Product Images

$product->get_image_id();
$product->get_image();
$product->get_gallery_image_ids();

// Get Product Reviews

$product->get_reviews_allowed();
$product->get_rating_counts();
$product->get_average_rating();
$product->get_review_count();
2. You have access to $product_id

If you have access to the product ID (once again, usually the do_action or apply_filters will make this possible to you), you have to get the product object first. Then, do the exact same things as above.
// Get $product object from product ID

$product = wc_get_product( $product_id );

// Now you have access to (see above)...

$product->get_type();
$product->get_name();
// etc.
// etc.
3. You have access to the Order object or Order ID

How to get the product information inside the Order? In this case you will need to loop through all the items present in the order, and then apply the rules above.
// Get $product object from $order / $order_id

$order = new WC_Order( $order_id );
$items = $order->get_items();

foreach ( $items as $item ) {

$product = wc_get_product( $item['product_id'] );

// Now you have access to (see above)...

$product->get_type();
$product->get_name();
// etc.
// etc.

}
4. You have access to the Cart object

How to get the product information inside the Cart? In this case, once again, you will need to loop through all the items present in the cart, and then apply the rules above.
// Get $product object from Cart object

$cart = WC()->cart->get_cart();

foreach( $cart as $cart_item ){

$product = wc_get_product( $cart_item['product_id'] );

// Now you have access to (see above)...

$product->get_type();
$product->get_name();
// etc.
// etc.

}