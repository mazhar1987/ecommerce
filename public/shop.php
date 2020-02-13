<?php
require_once('../resources/config.php');

include_once(TEMPLATE_FRONT . DS . 'header.php');
include_once(TEMPLATE_FRONT . DS . 'top_nav.php');
?>


<!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="hero-spacer">
            <h1>Shop</h1>
        </header>

        <hr>

        <!-- Page Features -->
        <div class="row text-center">

            <?php get_products_in_shop_page(); ?>

        </div>
        <!-- /.row -->
    </div>
<!-- /.container -->
<?php include_once(TEMPLATE_FRONT . DS . 'footer.php'); ?>
