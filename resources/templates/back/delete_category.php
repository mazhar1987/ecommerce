<?php
require_once('../../resources/config.php');

if (isset($_GET['delete_category_id'])) {
    $category_delete_query = query("DELETE FROM categories WHERE cat_id = ". escape_string($_GET['delete_category_id']) ." ");
    confirm($category_delete_query);

    set_message("Category Deleted");
    redirect("index.php?categories");
} else {
    redirect("index.php?categories");
}