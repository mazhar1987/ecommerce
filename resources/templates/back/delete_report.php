<?php
require_once('../../resources/config.php');

if (isset($_GET['delete_report_id'])) {
    $report_delete_query = query("DELETE FROM reports WHERE report_id = ". escape_string($_GET['delete_report_id']) ." ");
    confirm($report_delete_query);

    set_message("Report Deleted");
    redirect("index.php?reports");
} else {
    redirect("index.php?reports");
}