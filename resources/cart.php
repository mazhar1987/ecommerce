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
            redirect('../public/checkout.php');
        } else {
            set_message("We only have " . $row['product_quantity'] . " Available");
            redirect('../public/checkout.php');
        }
    }
}

if (isset($_GET['remove'])) {
    $_SESSION['product_' . $_GET['remove']]--;

    if ($_SESSION['product_' . $_GET['remove']] < 1) {
        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
        redirect("../public/checkout.php");
    } else {
        redirect("../public/checkout.php");
    }
}

if (isset($_GET['delete'])) {
    $_SESSION['product_' . $_GET['delete']] = 0;
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    redirect("../public/checkout.php");
}
?>

<div class="container">
    <div class="row"></div>
</div>

<?php include_once(TEMPLATE_FRONT . DS . 'footer.php'); ?>
