<?php
require_once('../../resources/config.php');

if (isset($_GET['delete_slider_id'])) {

    // Delete image file from directory
    $find_image_query = query("SELECT slider_image FROM sliders WHERE slider_id=". escape_string($_GET['delete_slider_id']) ." LIMIT 1");
    confirm($find_image_query);
    $row = fetch_array($find_image_query);
    $target_path = UPLOAD_DIRECTORY . DS . $row['slider_image'];
    unlink($target_path);

    // Delete slider item from system and DB
    $slide_delete_query = query("DELETE FROM sliders WHERE slider_id = ". escape_string($_GET['delete_slider_id']) ." ");
    confirm($slide_delete_query);

    set_message("Slider item is Deleted");
    redirect("index.php?slides");
} else {
    redirect("index.php?slides");
}