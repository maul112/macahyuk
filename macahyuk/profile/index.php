<?php
$pathThisfile='profile/index.php';
$title = "index";
$page = "profile";
include_once "../layouts/header.php";
$user_id = $dataUser['id'];
$dataBank = getDataBankByUserID($user_id);
$dataBukuDipinjam = getDataBookBeingBorrowedByUserID($user_id);
$dataWishlist = getDataWishlistByUserID($user_id);
$bankId = getDataBankByUserID($user_id)['id'];
$request = mysqli_num_rows(cekDataTopupByBankId($bankId));
// var_dump(cekDataTopupByBankId($bankId));die;
$nominal = mysqli_num_rows(cekDataTopupByBankId($bankId)) == 0? 0 : mysqli_fetch_assoc(cekDataTopupByBankId($bankId))['nominal'];
// var_dump($nominal);
// print_r($dataWishlist);
// echo "../assets/av$av.png";
?>

<div class="container mt-1 my-3">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col text-center">
            <h1 class="fw-bold">Profil Pengguna</h1>
        </div>
    </div>

    <!-- Card Profil -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <!-- Foto Profil -->
                    <div class="text-center mb-4">
                        <img src="../assets/av<?= $av ?>.png" class="rounded-circle img-thumbnail img-profile" alt="Foto Profil">
                    </div>
                    <!-- Informasi Pengguna -->
                    <h4 class="text-center mb-3"><?= $dataUser['username'] ?></h4>
                    <p class="text-muted text-center mb-4"><?= $dataUser['email'] ?></p>

                    <!-- Detail Profil -->
                    <div class="row mb-3">
                        <div class="col-3"></div>
                        <div class="col-4 fw-bold">Balance</div>
                        <div class="col-5"><b>: </b> <?= number_format($dataBank['current_balance']) ?> <a href="topup.php" class="card-link">Top-Up&raquo;</a></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3"></div>
                        <div class="col-4 fw-bold">Jumlah Buku Dipinjam</div>
                        <div class="col-5"><b>: </b> <?= count($dataBukuDipinjam) ?> <a href="meminjam.php" class="card-link">Detail&raquo;</a></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3"></div>
                        <div class="col-4 fw-bold">Wishlist Buku</div>
                        <div class="col-5">
                            <b>: </b> <?= count($dataWishlist) ?> <a href="wishlist.php" class="card-link">Detail&raquo;</a> 
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3"></div>
                        <div class="col-4 fw-bold">Request Topup</div>
                        <div class="col-5">
                            <b>: </b> <?= $request ?> ( Rp<a class="text-black text-decoration-none"><?= $nominal?> )</a> 
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="d-flex justify-content-center">
                        <a href="edit.php" class="btn btn-primary mx-2">Edit Profil</a>
                        <a href="../logout.php" class="btn btn-outline-danger mx-2" onclick="return confirm('Anda yakin ingin logout?')">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>


<?php
include_once "../layouts/footer.php";
?>
