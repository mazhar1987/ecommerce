<?php add_category(); ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard <small>Categories</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Categories
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-4">
                <p class="text-center alert-success"><?php display_message(); ?></p>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="category-title">Title</label>
                        <input type="text" class="form-control" name="cat_name">
                    </div>
                    <div class="form-group">
                        <input type="submit" name="add_category" class="btn btn-primary" value="Add Category">
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <table class="table">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Title</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php display_category_in_admin(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
