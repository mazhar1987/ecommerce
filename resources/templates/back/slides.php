
<?php add_slide(); ?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Dashboard <small>Sliders</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Sliders
            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <form action="" method="post" enctype="multipart/form-data">
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
    <div class="col-md-8">
        <h3 class="text-center">Slides Available</h3>
        <hr>
    </div>
</div>


