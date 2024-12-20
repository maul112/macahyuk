<?php
$title = "Users";
require_once "../config.php";
require_once BASEPATH . "/layouts/header.php";

if(isset($_GET['jkadjasdkj'])) {
    $id = $_GET['jkadjasdkj'];
    
    deleteDataUserByIdEncrypt($id);
    echo "
        <script>
            alert('User berhasil dihapus!');
            document.location.href = './';
        </script>
    ";
} else {
    header("Location: ./");
    exit;
}