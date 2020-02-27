<?php
require_once('../../resources/config.php');
include_once(TEMPLATE_BACK . DS . 'admin_header.php');
include_once(TEMPLATE_BACK . DS . 'admin_navbar.php');
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-header">All Products</h1>
            </div>

            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Price</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>20</td>
                            <td>Nikon 234 <br>
                                <img src="http://placehold.it/62x62" alt="">
                            </td>
                            <td>Category</td>
                            <td>123</td>
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
