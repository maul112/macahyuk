<?php
session_start();
ob_start();
include_once($_SERVER["DOCUMENT_ROOT"] . "/macahyuk/config.php");
include_once(BASEPATH .  "/database.php");
include_once(BASEPATH .  "/functions.php");
date_default_timezone_set('Asia/Jakarta');
if (!isset($_SESSION['user_id'])){
    header("location: /macahyuk/login.php");
    exit;
}

$all = getAllServer();

if($all['status'] == 'off') {
    header("Location: " . BASEURL . "/register.php");
}

if($_SESSION['lkadndbasdkalsdabsha'] == hash('sha256', 'Admin')) {
    header("Location: ". BASEURL ."/admin" . "/");
    exit;
}

$user_id = ($_SESSION['user_id']);
// print_r($user_id);
$dataUser = getDataUserByID($user_id);
if ($dataUser)
$av = $dataUser['avatar'];
// print_r(BASEURL);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/x-icon" href="<?= BASEURL ?>/assets/favicon.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="<?=BASEURL?>/assets/styles.css">
    <title>MacahYuk | <?= $title ?></title>
    <style>
        .navbar img{
            width: 27px;
            object-fit: cover;
        }
        .card-img-top{
            width: 100%;
            height: 270px;
            object-fit: cover;
        }

        .cardBook:hover{
            transform: translateY(-5px);
            border: 1.8px solid rgb(13 110 253);
        }
        .book-cover {
            max-width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 7px;
        }
        .img-profile{
            width: 190px;
            object-fit: cover;
        }

        .avInModal{
            width: 100px;
            object-fit: cover;
        }

        #suggestions {
            border: 1px solid #ddd;
            background: #fff;
            border-radius: 5px;
        }
        #suggestions .list-group-item {
            cursor: pointer;
            padding: 10px;
            font-size: 14px;
        }
        #suggestions .list-group-item:hover {
            background-color: #f8f9fa;
        }

    </style>
</head>
<body>
    <!-- Navbar Beranda -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-5">
        <div class="container px-5">
            <a class="navbar-brand fw-bold text-primary shadow" href="<?=BASEURL?>/index.php">MacahYuk</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-3">
                        <a href="<?=BASEURL?>/" class="nav-link <?=($page==='home')?'fw-bold':''?>">Home</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="<?=BASEURL?>/profile/meminjam.php" class="nav-link <?=($page==='meminjam')?'fw-bold':''?>">Meminjam</a>
                    </li>
                    <li class="nav-item mx-3">
                        <a href="<?=BASEURL?>/profile/wishlist.php" class="nav-link <?=($page==='wishlist')?'fw-bold':''?>">My-Wishlist</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-flex align-items-center me-3">
                        <!-- <a href="<?= BASEURL ?>/top-up/" type="button" class="nav-link btn btn-outline-primary">Hello</a> -->
                        <a class="badge text-bg-success nav-link" href="<?= BASEURL ?>/profile/topup.php"><i class="bi bi-currency-bitcoin"></i>: <span><?=number_format(getCurrentBalance($user_id))?></span> </a>
                    </li>
                    <!-- <li class="nav-item"><a href="<?= BASEURL ?>/profile/index.php" class="nav-link"><?= $dataUser['username'] ?></a></li> -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle p-1" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?=BASEURL?>/assets/av<?= $av ?>.png" class="rounded-circle" alt="Foto Profil">
                            <?= $dataUser['username'] ?>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= BASEURL ?>/profile/index.php">Profile</a></li>
                            <li><a class="dropdown-item " href="<?= BASEURL ?>/logout.php" onclick="return confirm('apakah anda yakin ingin logout')">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>