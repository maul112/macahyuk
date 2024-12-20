<?php 
include_once("../config.php"); 
include_once("../database.php");
if ($_SERVER['REQUEST_METHOD']=='POST'){
  $arrV = explode('#',$_POST['value']);
  $bookID = (int)$arrV[0];
  $userID = (int)$arrV[1];
  $checkedStatus = filter_var($_POST['ch'],FILTER_VALIDATE_BOOLEAN);
  $checkWishlist = checkWhislist($bookID,$userID);

  if ($checkedStatus===true && $checkWishlist===false){
    addWishlist($bookID,$userID);
  }elseif($checkedStatus===false && $checkWishlist===true) {
    deleteWishlist($bookID,$userID);
  }
  $numWishlistBook = getNumsWishlistBook($bookID);
  echo number_format($numWishlistBook);
}
?>