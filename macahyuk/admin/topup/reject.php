<?php
$title = "Books";
require_once "../config.php";
require_once BASEPATH . "/layouts/header.php";

if(isset($_GET['lalsdjasndnasdd'])) {
    $id = $_GET['lalsdjasndnasdd'];
    mysqli_query(DB, "UPDATE topup SET status = 'reject' WHERE bank_id = '$id'");
}
header("Location: ./");
exit;