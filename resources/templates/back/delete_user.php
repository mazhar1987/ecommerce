<?php
require_once('../../config.php');

if (isset($_GET['id'])) {
    $user_delete_query = query("DELETE FROM users WHERE user_id = ". escape_string($_GET['id']) ." ");
    confirm($user_delete_query);

    set_message("User is Deleted");
    redirect("../../../public/admin/index.php?users");
} else {
    redirect("../../../public/admin/index.php?users");
}