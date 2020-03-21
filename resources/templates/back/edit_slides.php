
<?php

// Check if product is available
if (isset($_GET['id'])) {
    $user_has_query = query("SELECT * FROM users WHERE user_id =" . escape_string($_GET['id']) . " ");
    confirm($user_has_query);

    while ($row = fetch_array($user_has_query)) {
        $user_id = escape_string($row['user_id']);
        $username = escape_string($row['username']);
        $user_password = escape_string($row['user_password']);
        $user_firstname = escape_string($row['user_firstname']);
        $user_lastname = escape_string($row['user_lastname']);
        $user_email = escape_string($row['user_email']);
        $user_image = escape_string($row['user_image']);
    }

    edit_slider();
}


?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard <small>Edit Slider</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Edit Slider
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <p class="text-center bg-success"><?php display_message(); ?></p>
        <form action="" method="post" enctype="multipart/form-data">
            <?php add_slide(); ?>
            <div class="form-group">
                <label for="slider_title">Slide Title</label>
                <input type="text" name="slider_title" class="form-control">
            </div>
            <div class="form-group">
                <label for="slider_image">Slide Image</label>
                <input type="file" name="slider_image" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="add_slider" class="btn btn-primary btn-lg btn-block" value="Add Slider">
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <?php get_current_slide_in_admin(); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <hr>
        <h3>Slides Available</h3>
        <hr>
    </div>

    <?php get_slide_thumbnails(); ?>

</div>


