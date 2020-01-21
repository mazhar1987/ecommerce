<?php
require_once('../resources/config.php');

include_once(TEMPLATE_FRONT . DS . 'header.php');
include_once(TEMPLATE_FRONT . DS . 'top_nav.php');
?>

        <div class="body__overlay"></div>
        <!-- Start Offset Wrapper -->
        <div class="offset__wrapper">
        <?php
            include_once(TEMPLATE_FRONT . DS . 'header_search.php');
            include_once(TEMPLATE_FRONT . DS . 'header_cart.php');
        ?>
        </div>
        <!-- End Offset Wrapper -->
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
            <?php include_once(TEMPLATE_FRONT . DS . 'breadcrumbs.php'); ?>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Grid -->
        <section class="htc__product__grid bg__white ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-lg-push-3 col-md-9 col-md-push-3 col-sm-12 col-xs-12">
                        <?php include_once(TEMPLATE_FRONT . DS . 'category_products.php'); ?>
                    </div>
                    <div class="col-lg-3 col-lg-pull-9 col-md-3 col-md-pull-9 col-sm-12 col-xs-12 smt-40 xmt-40">
                        <?php include_once(TEMPLATE_FRONT . DS . 'left_sidebar.php'); ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Grid -->
<?php
include_once(TEMPLATE_FRONT . DS . 'home_brand.php');
include_once(TEMPLATE_FRONT . DS . 'footer.php');
?></html>