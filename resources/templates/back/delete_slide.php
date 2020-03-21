<?php
require_once('../../resources/config.php');

if (isset($_GET['delete_slider_id'])) {
    $slide_delete_query = query("DELETE FROM sliders WHERE slider_id = ". escape_string($_GET['delete_slider_id']) ." ");
    confirm($slide_delete_query);

    set_message("Slider item is Deleted");
    redirect("index.php?slides");
} else {
    redirect("index.php?slides");
}