<?php
$page = "admin";
date_default_timezone_set('Asia/Jakarta');
$reqs = getAllPendingRequest();
require_once "../config.php";
$unreadNotif = getUnreadFeedbackLimit5();
// var_dump(BASEPATH);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - <?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="<?= BASEURL ?>/favicon.png">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />

    <style>
        .sidebar #sidebarToggle::after, .sidebar-dark #sidebarToggle::after {
            display: none;
        }

        .bi-list::before {
            color: black;
        }

        label[for='dt-length-0'] {
            margin-left: 0.4rem;
        }

        label[for='dt-search-0'] {
            margin-right: 0.4rem;
        }
    </style>

</head>