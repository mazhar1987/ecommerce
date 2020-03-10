
<?php
add_product()
?>

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
                        <label for="product_name">Product Name </label>
                        <input type="text" name="product_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="product_shortDes">Product Short Description</label>
                        <textarea name="product_shortDes" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="product_description">Product Description</label>
                        <textarea name="product_description" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-3">
                            <label for="product_price">Product Price</label>
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
                        <label for="product_cat_id">Product Category</label>
                        <hr>
                        <select name="product_cat_id" id="" class="form-control">
                            <option value="">Select Category</option>
                        </select>
                    </div>
                    <!-- Product Brands-->
                    <div class="form-group">
                        <label for="product_brand">Product Brand</label>
                        <input type="text" name="product_brand" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="product_quantity">Product Quantity</label>
                        <input type="number" name="product_quantity" class="form-control">
                    </div>
                    <!-- Product Tags -->
<!--                    <div class="form-group">-->
<!--                        <label for="product_tags">Product Keywords</label>-->
<!--                        <input type="text" name="product_tags" class="form-control">-->
<!--                    </div>-->
                    <!-- Product Image -->
                    <div class="form-group">
                        <label for="product_image">Product Image</label>
                        <input type="file" name="product_image">
                    </div>
                </aside><!--SIDEBAR-->
            </div>
        </form>
    </div>
</div>
