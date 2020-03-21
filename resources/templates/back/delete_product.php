<?php
require_once('../../resources/config.php');

if (isset($_GET['delete_product_id'])) {
    $product_delete_query = query("DELETE FROM products WHERE product_id = ". escape_string($_GET['delete_product_id']) ." ");
    confirm($product_delete_query);

    set_message("Product Deleted");
    redirect("index.php?products");
} else {
    redirect("index.php?products");
}