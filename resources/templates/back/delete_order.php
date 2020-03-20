<?php
require_once('../../resources/config.php');

if (isset($_GET['delete_order_id'])) {
    $order_delete_query = query("DELETE FROM orders WHERE order_id = ". escape_string($_GET['delete_order_id']) ." ");
    confirm($order_delete_query);

    set_message("Order Deleted");
    redirect("index.php?orders");
} else {
    redirect("index.php?orders");
}