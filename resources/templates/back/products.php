
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
