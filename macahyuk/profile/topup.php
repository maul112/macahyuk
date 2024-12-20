<?php
$title = "TopUp";
$page = "user";
require_once "../config.php";
require_once BASEPATH . "/layouts/header.php";

$username=mysqli_fetch_assoc(getUserByEncryptEmail($_SESSION['kanjsbdhiadbasndksandaiuwfajjsabdbasgdabasdj']))['username'];

$all = getAllServer();

if($all['status'] == 'off') {
    header("Location: " . BASEURL . "/register.php");
}

if(isset($_GET['nominal'])) {
    $nominal = $_GET['nominal'];
}

if(isset($_POST['submit'])) {
    $nominal = htmlspecialchars($_POST['nominal']);
    $password = htmlspecialchars($_POST['password']);
    date_default_timezone_set('Asia/Jakarta');
    $valid = true;
    if(!ValidateNominal($nominal)[0]) {
        $errNominal = ValidateNominal($nominal)[1];
        $valid = false;
    }

    $id = $_SESSION['user_id'];
    $passFromDB = getDataUserByID($id)['password'];
    if($passFromDB != hash('sha256', $password)) {
        $valid = false;
        $errPass = "Password salah!";
    }

    if($nominal > 100000) {
        $errNominal = "Nominal terlalu tinggi!";
        $valid = false;
    }

    if($valid) {
        $topup = getTopUpServer();
        if($topup['status'] == 'off') {
            $success = false;
        } else {
            $userBank = getDataBankByUserID($id)['id'];
            $check = cekDataTopupByBankId($userBank);
            // var_dump($check);die;
            if(mysqli_num_rows($check) == 0) {
                insertDataTopup($userBank, $nominal);
                $success = true;
            } else {
                $success = false;
            }
        }
    }
}
?>
<?php if(isset($success) && $success) : ?>
<div id="app"></div>
<?php elseif(isset($success) && !$success): ?>
<div id="app"></div>
<?php else: ?>
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6 mx-auto min-vh-100 d-flex">
            <div class="m-auto w-100 border rounded-4 shadow p-5">
                <form action="" method="post">
                    <h1 class="text-center mb-5">TopUp</h1>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="." autocomplete="off" readonly value="<?=$username?>">
                        <label for="floatingInput">Username</label>
                        <?= "<p class='ms-1'>Hello</p>" ?>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" name="nominal" class="form-control" id="floatingInput" placeholder="." autocomplete="off" value="<?= isset($nominal)? $nominal : '' ?>">
                        <label for="floatingInput">Nominal</label>
                        <?= isset($errNominal)? "<p class='ms-1 mb-0 text-danger'>$errNominal</p>" : "" ?>
                        <div class="container-fluid mt-1 p-0">
                            <a href="topup.php?nominal=5000" class="badge text-bg-secondary text-decoration-none">Rp5.000</a>
                            <a href="topup.php?nominal=10000" class="badge text-bg-secondary text-decoration-none">Rp10.000</a>
                            <a href="topup.php?nominal=20000" class="badge text-bg-secondary text-decoration-none">Rp20.000</a>
                            <a href="topup.php?nominal=50000" class="badge text-bg-secondary text-decoration-none">Rp50.000</a>
                            <a href="topup.php?nominal=100000" class="badge text-bg-secondary text-decoration-none">Rp100.000</a>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control" id="floatingInput" placeholder=".">
                        <label for="floatingInput">Konfirmasi Password</label>
                        <?= isset($errPass)? "<p class='ms-1 mb-0 text-danger'>$errPass</p>" : "" ?>
                    </div>
                    <div class="mb-3 d-flex">
                        <input type="submit" name="submit" value="Request" class="btn btn-primary btn-lg d-block">
                        <input type="button" name="back" value="Back" class="btn btn-danger btn-lg d-block ms-3" onclick="document.location.href = './'">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endif ?>
<?php
if(isset($success) && $success) {
    echo "<script type='module' crossorigin src='../js/topupalertsuccess.js'></script>";
} elseif(isset($success) && !$success) {
    echo "<script type='module' crossorigin src='../js/topupalertreject.js'></script>";
}
require_once "../layouts/footer.php";
?>