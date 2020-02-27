<?php
require_once('../../resources/config.php');
include_once(TEMPLATE_BACK . DS . 'admin_header.php');
include_once(TEMPLATE_BACK . DS . 'admin_navbar.php');
?>


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">All Orders</h1>
            </div>

            <div class="col-md-12">
                <table class="table table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Photo</th>
                            <th>Quantity</th>
                            <th>Invoice Number</th>
                            <th>Order Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>21</td>
                            <td>Nikon 234</td>
                            <td>
                                <img src="http://placehold.it/62x62" alt="">
                            </td>
                            <td>Cameras</td>
                            <td>456464</td>
                            <td>Jun 2039</td>
                            <td>Completed</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

<?php include_once(TEMPLATE_BACK . DS . 'admin_footer.php'); ?>