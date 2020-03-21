<?php
require_once('../resources/config.php');

include_once(TEMPLATE_FRONT . DS . 'header.php');
include_once(TEMPLATE_FRONT . DS . 'top_nav.php');
?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <?php include_once(TEMPLATE_FRONT . DS . 'left_sidebar.php'); ?>

            <div class="col-md-9">

                <?php include_once(TEMPLATE_FRONT . DS . 'home_slider.php'); ?>

                <div class="row">

                    <?php get_products(); ?>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->


<?php include_once(TEMPLATE_FRONT . DS . 'footer.php'); ?>