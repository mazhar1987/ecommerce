<?php
require_once('../../config.php');

if (isset($_GET['id'])) {
    $category_delete_query = query("DELETE FROM categories WHERE cat_id = ". escape_string($_GET['id']) ." ");
    confirm($category_delete_query);

    set_message("Category Deleted");
    redirect("../../../public/admin/index.php?categories");
} else {
    redirect("../../../public/admin/index.php?categories");
}