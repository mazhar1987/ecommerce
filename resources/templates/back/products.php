
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard <small>Products</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Products
            </li>
        </ol>
        <h4 class="text-center alert-success"><?php display_message(); ?></h4>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <p><a class="btn btn-primary" href="index.php?add_product">Add Product</a></p>
    </div>
    <div class="col-md-12">
        <table class="table table-hover table-responsive">
            <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Image</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php display_products(); ?>
            </tbody>
        </table>
    </div>
</div>
