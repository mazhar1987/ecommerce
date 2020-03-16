<?php
require_once('../../config.php');

if (isset($_GET['id'])) {
    $product_delete_query = query("DELETE FROM products WHERE product_id = ". escape_string($_GET['id']) ." ");
    confirm($product_delete_query);

    set_message("Product Deleted");
    redirect("../../../public/admin/index.php?products");
} else {
    redirect("../../../public/admin/index.php?products");
}