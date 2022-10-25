<?php 


add_action('woocommerce_payment_complete_order_status_processing', 'milwaukee_payment_processing_handler');
function milwaukee_payment_processing_handler($order_id) {
    echo $order_id;
    $order = wc_get_order($order_id);
    echo $order;
    file_put_contents('woocommerce-order.php', $order);
}

add_filter('woocommerce_payment_complete_order_status', 'milwaukee_payment_order_status_handler');
function milwaukee_payment_order_status_handler($processing,) {
    echo $processing;
    echo $order_id;
    echo $order;
    file_put_contents('woocommerce-order.php', $order);
    file_put_contents('woocommerce-order.php', $order_id);
    file_put_contents('woocommerce-order.php', $processing);

    return $processing;
}