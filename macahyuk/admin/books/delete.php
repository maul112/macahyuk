<?php
$title = "Books";
require_once "../config.php";
require_once BASEPATH . "/layouts/header.php";

if(isset($_GET['lkanshfjafnjsabjj'])) {
    $id = $_GET['lkanshfjafnjsabjj'];
    mysqli_query(DB, "DELETE FROM books WHERE id = '$id'");
}
header("Location: ./");
exit;