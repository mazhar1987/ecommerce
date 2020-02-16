<?php
require_once('../resources/config.php');

include_once(TEMPLATE_FRONT . DS . 'header.php');
include_once(TEMPLATE_FRONT . DS . 'top_nav.php');

if (isset($_GET['add'])) {
    $_SESSION['product_' . $_GET['add']];
    redirect('index.php');;
}
?>

<div class="container">
    <div class="row"></div>
</div>

<?php include_once(TEMPLATE_FRONT . DS . 'footer.php'); ?>
