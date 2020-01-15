<?php
require_once('../resources/config.php');

include_once(TEMPLATE_FRONT . DS . 'header.php');
include_once(TEMPLATE_FRONT . DS . 'topnav.php');





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

<?php
include_once(TEMPLATE_FRONT . DS . 'home_slider.php');
include_once(TEMPLATE_FRONT . DS . 'home_new_arrival.php');
include_once(TEMPLATE_FRONT . DS . 'home_cta.php');
include_once(TEMPLATE_FRONT . DS . 'home_best_seller.php');
include_once(TEMPLATE_FRONT . DS . 'home_testimonial.php');
include_once(TEMPLATE_FRONT . DS . 'home_top_rated.php');
include_once(TEMPLATE_FRONT . DS . 'home_brand.php');
include_once(TEMPLATE_FRONT . DS . 'home_blog.php');
?>

<?php include_once(TEMPLATE_FRONT . DS . 'footer.php'); ?>