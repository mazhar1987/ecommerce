<?php
require_once('../resources/config.php');

include_once(TEMPLATE_FRONT . DS . 'header.php');
include_once(TEMPLATE_FRONT . DS . 'top_nav.php');

if (isset($_GET['add'])) {

    $product_query_to_cart = query("SELECT * FROM products WHERE product_id =" . escape_string($_GET['add']) . " ");
    confirm($product_query_to_cart);

    while ($row = fetch_array($product_query_to_cart)) {
        if ($row['product_quantity'] != $_SESSION['product_' . $_GET['add']]) {
            $_SESSION['product_' . $_GET['add']] += 1;
        } else {
            set_message("We only have " . $row['product_quantity'] . " Available");
            redirect('checkout.php');
        }
    }



}
?>

<div class="container">
    <div class="row"></div>
</div>

<?php include_once(TEMPLATE_FRONT . DS . 'footer.php'); ?>
