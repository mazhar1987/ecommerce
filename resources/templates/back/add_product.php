
<div class="row">
    <div class="col-lg-12">
        <h3 class="text-center alert-success"><?php display_message(); ?></h3>
        <h1 class="page-header">
            Dashboard <small>Add Product</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Add Product
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="product-title">Product Title </label>
                        <input type="text" name="product_title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="product-title">Product Description</label>
                        <textarea name="product_description" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-3">
                            <label for="product-price">Product Price</label>
                            <input type="number" name="product_price" class="form-control" size="60">
                        </div>
                    </div>
                </div><!--Main Content-->

                <!-- SIDEBAR-->
                <aside id="admin_sidebar" class="col-md-4">
                    <div class="form-group">
                        <input type="submit" name="draft" class="btn btn-warning btn-lg" value="Draft">
                        <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
                    </div>
                    <!-- Product Categories-->
                    <div class="form-group">
                        <label for="product-title">Product Category</label>
                        <hr>
                        <select name="product_category" id="" class="form-control">
                            <option value="">Select Category</option>
                        </select>
                    </div>
                    <!-- Product Brands-->
                    <div class="form-group">
                        <label for="product-title">Product Brand</label>
                        <select name="product_brand" id="" class="form-control">
                            <option value="">Select Brand</option>
                        </select>
                    </div>
                    <!-- Product Tags -->
                    <div class="form-group">
                        <label for="product-title">Product Keywords</label>
                        <input type="text" name="product_tags" class="form-control">
                    </div>
                    <!-- Product Image -->
                    <div class="form-group">
                        <label for="product-title">Product Image</label>
                        <input type="file" name="product_image">
                    </div>
                </aside><!--SIDEBAR-->
            </div>
        </form>
    </div>
</div>
