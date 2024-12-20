<?php
$title = "Register";
$page = "register";
require_once "./config.php";
require_once "./database.php";

session_start();
session_unset();
session_destroy();

$all = getAllServer();

if($all['status'] == 'on') {
    if(isset($_COOKIE['kanjsbdhiadbasndksandaiuwfajjsabdbasgdabasdj']) && isset($_COOKIE['lkadndbasdkalsdabsha'])) {
        $email = $_COOKIE['kanjsbdhiadbasndksandaiuwfajjsabdbasgdabasdj'];
        $temp = getUserByEmail($email);
        if(mysqli_num_rows($temp) != 0) {
            $_SESSION['kanjsbdhiadbasndksandaiuwfajjsabdbasgdabasdj'] = $email;
            $status = mysqli_fetch_assoc($temp)['status'];
            $status = hash('sha256', $status);
            $_SESSION['lkadndbasdkalsdabsha'] = $status;
        }
    }

    if(isset($_SESSION['kanjsbdhiadbasndksandaiuwfajjsabdbasgdabasdj'])) {
        header("Location: ./");
        exit;
    }

    if(isset($_POST['register'])) {
        $fullname = htmlspecialchars($_POST['fullname']);
        $username = strtolower(htmlspecialchars($_POST['username']));
        $email = htmlspecialchars($_POST['email']);
        $birth = htmlspecialchars($_POST['birth']);
        $password = htmlspecialchars($_POST['password']);
        $cpassword = htmlspecialchars($_POST['cpassword']);
        $valid = true;
        if(!validateFullName($fullname)[0]) {
            $valid = false;
            $errFullName = validateFullName($fullname)[1];
        }
        if(!validateUsername($username)[0]) {
            $valid = false;
            $errUsername = validateUsername($username)[1];
        }
        if(!ValidateEmail($email)[0]) {
            $valid = false;
            $errEmail = ValidateEmail($email)[1];
        }
        if(strlen($password) < 8) {
            $valid = false;
            $errPass = "Password minimal 8 karakter";
        }
        if($password !== $cpassword) {
            $valid = false;
            $errCpass = "Konfirmasi password tidak sama!";
        }
        if($birth != "" && !validateBirth($birth)[0]) {
            $valid = false;
            $errBirth = validateBirth($birth)[1];
        }
        if($valid) {
    
            $password = hash('sha256', $password);
    
            $data = [
                'fullname' => $fullname,
                'username' => $username,
                'email' => $email,
                'birth' => $birth,
                'password' => $password
            ];
            
            insertUserData($data);

            header("Location: ./login.php");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="./assets/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title><?= $title ?></title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6 mx-auto min-vh-100 d-flex">
            <div class="m-auto w-100 border rounded-4 shadow p-5">
                <form method="post">
                    <?= $all['status'] == 'off'? "<p class='text-danger text-center'>Server sedang Maintenance</p>" : '' ?>
                    <h1 class="text-center mb-5">Register</h1>
                    <div class="form-floating mb-3">
                        <input type="text" name="fullname" class="form-control <?= isset($errFullName)? 'border-danger' : ''?>" id="floatingInput" placeholder="." autocomplete="off" value="<?= (isset($valid) && !$valid)? $fullname : '' ?>">
                        <label for="floatingInput">Full Name</label>
                        <?= isset($errFullName)? "<p class='ms-1 text-danger'>$errFullName</p>" : '' ?>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control <?= isset($errUsername)? 'border-danger' : ''?>" id="floatingInput" placeholder="." autocomplete="off" value="<?= (isset($valid) && !$valid)? $username : ''?>">
                        <label for="floatingInput">Username</label>
                        <?= isset($errUsername)? "<p class='ms-1 text-danger'>$errUsername</p>" : '' ?>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control <?= isset($errEmail)? 'border-danger' : ''?>" id="floatingInput" placeholder="." autocomplete="off" value="<?= (isset($valid) && !$valid)? $email : '' ?>">
                        <label for="floatingInput">Email</label>                        
                        <?= isset($errEmail)? "<p class='ms-1 text-danger'>$errEmail</p>" : '' ?>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" name="birth" class="form-control <?= isset($errBirth)? 'border-danger' : ''?>" id="floatingInput" placeholder="." autocomplete="off" value="<?= (isset($valid) && !$valid)? $birth : '' ?>">
                        <label for="floatingInput">Birth</label>
                        <?= isset($errBirth)? "<p class='ms-1 text-danger'>$errBirth</p>" : '' ?>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control <?= isset($errPass)? 'border-danger' : ''?>" id="floatingPassword" placeholder="." autocomplete="off" >
                        <label for="floatingPassword">Password</label>
                        <?= isset($errPass)? "<p class='ms-1 text-danger'>$errPass</p>" : '' ?>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="cpassword" class="form-control <?= isset($errCpass)? 'border-danger' : ''?>" id="floatingPassword" placeholder="." autocomplete="off">
                        <label for="floatingPassword">Konfirmasi Password</label>
                        <?= isset($errCpass)? "<p class='ms-1 text-danger'>$errCpass</p>" : '' ?>
                    </div>
                    <div class="mb-3 d-flex">
                        <input type="submit" name="register" value="register" class="btn btn-primary btn-lg d-block mx-auto">
                    </div>
                    <div>
                        <p class="text-center">Sudah punya akun? <a href="./login.php" class="link-primary">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>