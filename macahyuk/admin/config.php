<?php
define("BASEPATH", $_SERVER["DOCUMENT_ROOT"] . "/macahyuk/admin");
define("BASEURL", "https://macahyuk.kesug.com/macahyuk/admin");
define("TAKROKAROAN", "https://macahyuk.kesug.com/macahyuk");

require_once $_SERVER["DOCUMENT_ROOT"] . "/macahyuk/admin/database.php";

session_start();

if($_SESSION['lkadndbasdkalsdabsha'] == hash('sha256', 'User')) {
    header("Location: ". TAKROKAROAN . "/");
    exit;
}

if(!isset($_SESSION['kanjsbdhiadbasndksandaiuwfajjsabdbasgdabasdj'])) {
    header("Location: ". TAKROKAROAN . "/login.php");
    exit;
}

// var_dump($_SESSION);