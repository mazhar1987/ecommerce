<?php
require_once('../resources/config.php');

include_once(TEMPLATE_FRONT . DS . 'header.php');
include_once(TEMPLATE_FRONT . DS . 'top_nav.php');

report();

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Thank You</h1>
        </div>
    </div>
</div>


<?php include_once(TEMPLATE_FRONT . DS . 'footer.php'); ?>
