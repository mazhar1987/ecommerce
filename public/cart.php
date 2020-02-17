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
            redirect('checkout.php');
        } else {
            set_message("We only have " . $row['product_quantity'] . " Available");
            redirect('checkout.php');
        }
    }
}

if (isset($_GET['remove'])) {
    $_SESSION['product_' . $_GET['remove']]--;

    if ($_SESSION['product_' . $_GET['remove']] < 1) {
        redirect("checkout.php");
    } else {
        redirect("checkout.php");
    }
}

if (isset($_GET['delete'])) {
    $_SESSION['product_' . $_GET['delete']] = 0;
    redirect("checkout.php");
}
?>

<div class="container">
    <div class="row"></div>
</div>

<?php include_once(TEMPLATE_FRONT . DS . 'footer.php'); ?>
