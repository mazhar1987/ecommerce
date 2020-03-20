<?php
require_once('../../resources/config.php');
include_once(TEMPLATE_BACK . DS . 'admin_header.php');
include_once(TEMPLATE_BACK . DS . 'admin_navbar.php');

if (!isset($_SESSION['username'])) {
    redirect('../../public');
}

?>

<div id="page-wrapper">

    <div class="container-fluid">

        <?php

        if ($_SERVER['REQUEST_URI'] == "/practice/php/ecommerce/public/admin/" || $_SERVER['REQUEST_URI'] == "/practice/php/ecommerce/public/admin/index.php") {

            $page_heading = <<<DELIMETER
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center alert-success"><?php display_message(); ?></h3>
                    <h1 class="page-header">
                        Dashboard <small>Statistics Overview</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li class="active">
                            <i class="fa fa-dashboard"></i> Dashboard
                        </li>
                    </ol>
                </div>
            </div>
            DELIMETER;
            echo $page_heading;


            include_once(TEMPLATE_BACK . DS . 'dashboard_info.php');
            include_once(TEMPLATE_BACK . DS . 'dashboard_transaction.php');
        }

        if (isset($_GET['orders'])) {
            include_once(TEMPLATE_BACK . DS . 'orders.php');
        } else if (isset($_GET['delete_order_id'])) {
            include_once(TEMPLATE_BACK . DS . 'delete_order.php');
        } else if (isset($_GET['categories'])) {
            include_once(TEMPLATE_BACK . DS . 'categories.php');
        } else if (isset($_GET['delete_category_id'])) {
            include_once(TEMPLATE_BACK . DS . 'delete_category.php');
        } else if (isset($_GET['products'])) {
            include_once(TEMPLATE_BACK . DS . 'products.php');
        } else if (isset($_GET['add_product'])) {
            include_once(TEMPLATE_BACK . DS . 'add_product.php');
        } else if (isset($_GET['edit_product'])) {
            include_once(TEMPLATE_BACK . DS . 'edit_product.php');
        } else if (isset($_GET['delete_product_id'])) {
            include_once(TEMPLATE_BACK . DS . 'delete_product.php');
        } else if (isset($_GET['users'])) {
            include_once(TEMPLATE_BACK . DS . 'users.php');
        } else if (isset($_GET['add_user'])) {
            include_once(TEMPLATE_BACK . DS . 'add_user.php');
        } else if (isset($_GET['edit_user'])) {
            include_once(TEMPLATE_BACK . DS . 'edit_user.php');
        } else if (isset($_GET['delete_user_id'])) {
            include_once(TEMPLATE_BACK . DS . 'delete_user.php');
        } else if (isset($_GET['reports'])) {
            include_once(TEMPLATE_BACK . DS . 'reports.php');
        } else if (isset($_GET['delete_report_id'])) {
            include_once(TEMPLATE_BACK . DS . 'delete_report.php');
        }

        ?>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include_once(TEMPLATE_BACK . DS . 'admin_footer.php'); ?>