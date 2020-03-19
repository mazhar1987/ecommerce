
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard <small>Reports</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Reports
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p class="text-center alert-success"><?php display_message(); ?></p>
        <table class="table table-hover table-responsive">
            <thead>
            <tr>
                <th>Report ID</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Order ID</th>
                <th>Product Price</th>
                <th>Product Quantity</th>
            </tr>
            </thead>

            <tbody>
            <?php display_reports(); ?>
            </tbody>
        </table>
    </div>
</div>