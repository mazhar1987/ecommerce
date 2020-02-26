<?php
require_once('../resources/config.php');

include_once(TEMPLATE_FRONT . DS . 'header.php');
include_once(TEMPLATE_FRONT . DS . 'top_nav.php');

if (isset($_GET['tx'])) {
    $amount = $_GET['amt'];
    $currency_code = $_GET['cc'];
    $transaction = $_GET['tx'];
    $status = $_GET['st'];
} else {
    redirect('checkout.php');
}

$order_query = query("INSERT INTO orders (order_amount, order_transaction, order_status, order_currency_code) VALUES ('{$amount}', '{$transaction}', '{$status}', '{$currency_code}')");
confirm($order_query);

session_destroy();


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Thank You</h1>
        </div>
    </div>
</div>


<?php include_once(TEMPLATE_FRONT . DS . 'footer.php'); ?>
