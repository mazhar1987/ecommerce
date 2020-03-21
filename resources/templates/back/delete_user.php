<?php
require_once('../../resources/config.php');

if (isset($_GET['delete_user_id'])) {
    $user_delete_query = query("DELETE FROM users WHERE user_id = ". escape_string($_GET['delete_user_id']) ." ");
    confirm($user_delete_query);

    set_message("User is Deleted");
    redirect("index.php?users");
} else {
    redirect("index.php?users");
}