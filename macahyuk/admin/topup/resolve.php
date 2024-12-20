<?php
$title = "Books";
require_once "../config.php";
require_once BASEPATH . "/layouts/header.php";

if(isset($_GET['afnajsjbadbjad']) && isset($_GET['askjfjasfbabsas'])) {
    $id = $_GET['afnajsjbadbjad'];
    $nominal = $_GET['askjfjasfbabsas'];
    mysqli_query(DB, "UPDATE topup SET status = 'resolve' WHERE bank_id = '$id'");
    mysqli_query(DB, "UPDATE bank SET current_balance = current_balance + '$nominal' WHERE id = '$id'");
}
header("Location: ./");
exit;