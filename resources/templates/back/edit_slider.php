
<?php

// Check if product is available
if (isset($_GET['id'])) {
    $slider_has_query = query("SELECT * FROM sliders WHERE slider_id =" . escape_string($_GET['id']) . " ");
    confirm($slider_has_query);

    while ($row = fetch_array($slider_has_query)) {
        $slider_title = escape_string($row['slider_title']);
        $slider_image = escape_string($row['slider_image']);
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
                <input type="text" name="slider_title" class="form-control" value="<?php echo $slider_title; ?>">
            </div>
            <div class="form-group">
                <label for="slider_image">Slide Image</label>
                <input type="file" name="slider_image" class="form-control">
                <br>
                <img width="200" src="../../resources/<?php echo display_image($slider_image); ?>" alt="<?php echo $slider_title; ?>">
            </div>
            <div class="form-group">
                <input type="submit" name="update_slider" class="btn btn-primary btn-lg btn-block" value="Update">
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


