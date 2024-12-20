<?php 
include_once("../database.php");
if (isset($_GET['uvberibv']) && isset($_GET['bvgeugfyure'])){
  $userID=$_GET['uvberibv'];
  $bookID=$_GET['bvgeugfyure'];
  deleteWishlist($bookID,$userID);
}
echo "<script>window.location.href='wishlist.php'</script>";
?>
