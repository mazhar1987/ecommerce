<?php
require_once('../resources/config.php');

include_once(TEMPLATE_FRONT . DS . 'header.php');
include_once(TEMPLATE_FRONT . DS . 'top_nav.php');
?>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4">
                <h1 class="text-center">Login</h1>
                <p class="text-center alert-danger"><?php display_message(); ?></p>
                <form class="" action="" method="post" enctype="multipart/form-data">
                    <?php login_user(); ?>
                    <div class="form-group">
                        <label for="">username</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                     <div class="form-group">
                         <label for="password">Password</label>
                         <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                      <input type="submit" name="submit" class="btn btn-primary" >
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once(TEMPLATE_FRONT . DS . 'footer.php'); ?>
