<?php 
include_once("../config.php"); 
include_once("../database.php");
include_once("../functions.php");
// deleteWishlist(3,2);
// addWishlist(3,2);
$err='';
// print_r(getCurrentBalance(1));echo'<br><br><br>';
// print_r(getPriceByDurationID(6));echo'<br><br><br>';
checkBalance(1,1,$err);
echo $err;
?>