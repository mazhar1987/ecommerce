<?php
require_once('../../resources/config.php');
include_once(TEMPLATE_BACK . DS . 'admin_header.php');
include_once(TEMPLATE_BACK . DS . 'admin_navbar.php');
?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
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

        <?php include_once(TEMPLATE_BACK . DS . 'dashboard_info.php'); ?>
        <?php include_once(TEMPLATE_BACK . DS . 'dashboard_transaction.php'); ?>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

<?php include_once(TEMPLATE_BACK . DS . 'admin_footer.php'); ?>