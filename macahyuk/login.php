<?php
$title = "Login";
$page = "login";
require_once "./config.php";
include_once "./database.php";

session_start();

// $password = hash('sha256', 'pwd12345');
// mysqli_query(DB, "UPDATE users SET password = '$password' WHERE id = 10");

$all = getAllServer();
// $serverStatus = $all['status'];

// if($all['status'] == 'on') {
if(isset($_COOKIE['kanjsbdhiadbasndksandaiuwfajjsabdbasgdabasdj']) && isset($_COOKIE['lkadndbasdkalsdabsha'])) {
    $email = $_COOKIE['kanjsbdhiadbasndksandaiuwfajjsabdbasgdabasdj'];
    $temp = getUserByEmail($email);
    if(mysqli_num_rows($temp) != 0) {
        $_SESSION['kanjsbdhiadbasndksandaiuwfajjsabdbasgdabasdj'] = $email;
        $temp = mysqli_fetch_assoc($temp);
        $status = $temp['status'];
        $_SESSION['fullname'] = $temp['fullname'];
        $status = hash('sha256', $status);
        $_SESSION['lkadndbasdkalsdabsha'] = $status;
        $_SESSION['user_id'] = $temp['id'];
    }
}
    
if(isset($_SESSION['kanjsbdhiadbasndksandaiuwfajjsabdbasgdabasdj']) && $_SESSION['lkadndbasdkalsdabsha']) {
    $userStatus = $_SESSION['lkadndbasdkalsdabsha'];
    if($userStatus == 'Admin') {
        header("Location: ./admin/");
        exit;
    } else {
        header("Location: ./");
        exit;
    }
}
if(isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password = hash('sha256', $password);
    $temp = getUserByEmail($email);
    $valid = true;

    if(mysqli_num_rows($temp) == 1) {
        $temp = mysqli_fetch_assoc($temp);
        if($password === $temp['password']) {
            $ooo = $email;
            $id = $temp['id'];
            $email = hash('sha256', $email);
            $status = hash('sha256', $temp['status']);
            
            if(($all['status'] == 'off' && $temp['status'] == 'Admin') || $temp['status'] == 'Admin') {
                setcookie('kanjsbdhiadbasndksandaiuwfajjsabdbasgdabasdj', $email, time() + 864000);
                setcookie('lkadndbasdkalsdabsha', $status, time() + 864000);

                $_SESSION['kanjsbdhiadbasndksandaiuwfajjsabdbasgdabasdj'] = $email;
                $_SESSION['lkadndbasdkalsdabsha'] = $status;
                $temp = getUserByEmail($ooo);
                $_SESSION['fullname'] = mysqli_fetch_assoc($temp)['fullname'];
                $_SESSION['user_id'] = $id;
                header("Location: ./admin/");
            } elseif($all['status'] == 'on') {
                if(isset($_POST['remember'])) {
                    setcookie('kanjsbdhiadbasndksandaiuwfajjsabdbasgdabasdj', $email, time() + 864000);
                    setcookie('lkadndbasdkalsdabsha', $status, time() + 864000);
                }
                $_SESSION['kanjsbdhiadbasndksandaiuwfajjsabdbasgdabasdj'] = $email;
                $_SESSION['lkadndbasdkalsdabsha'] = $status;
                $temp = getUserByEmail($ooo);
                $_SESSION['fullname'] = mysqli_fetch_assoc($temp)['fullname'];
                $_SESSION['user_id'] = $id;

                // $id=$temp['id'];
                insertDataBank($id,$password);

                if($_SESSION['lkadndbasdkalsdabsha'] == hash('sha256', "Admin")) {
                    header("Location: ./admin/");
                } else {
                    header("Location: ./");
                }
                exit;
            }

        } else {
            $errPass = "Password salah!";
            $valid = false;
        }
    } else {
        $errEmail = "Email salah atau tidak terdaftar!";
        $valid = false;

    }
}
// }

// session_unset();
// session_destroy();
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
                <form action="" method="post">
                    <?= $all['status'] == 'off'? "<p class='text-danger text-center'>Server sedang Maintenance</p>" : '' ?>
                    <h1 class="text-center mb-5">Login</h1>
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control <?= isset($errEmail)? 'border-danger' : '' ?>" id="floatingInput" placeholder="." autocomplete="off" value="<?= (isset($valid) && !$valid)? $email : '' ?>">
                        <label for="floatingInput">Email address</label>
                        <?= isset($errEmail)? "<p class='ms-1 text-danger'>$errEmail</p>" : '' ?>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control <?= isset($errPass)? 'border-danger' : '' ?>" id="floatingPassword" placeholder="." autocomplete="off">
                        <label for="floatingPassword">Password</label>
                        <?= isset($errPass)? "<p class='ms-1 text-danger'>$errPass</p>" : '' ?>
                    </div>
                    <div class="form-check mb-3">
                        <label class="form-check-label" for="remember">
                            Remember Me for 10 Days
                        </label>
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    </div>
                    <div class="mb-3 d-flex">
                        <input type="submit" name="submit" value="login" class="btn btn-primary btn-lg d-block mx-auto">
                    </div>
                    <div>
                        <p class="text-center">Belum punya akun? <a href="./register.php" class="link-primary">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>