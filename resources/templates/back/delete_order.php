<?php
require_once('../../config.php');

if (isset($_GET['id'])) {
    $order_delete_query = query("DELETE FROM orders WHERE order_id = ". escape_string($_GET['id']) ." ");
    confirm($order_delete_query);

    set_message("Order Deleted");
    redirect("../../../public/admin/index.php?orders");
} else {
    redirect("../../../public/admin/index.php?orders");
}