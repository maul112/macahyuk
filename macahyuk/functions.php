<?php 
include_once("database.php");
function checkLogin($dataPOST, &$invalid){
  $username = $dataPOST['username'];
  $pwd = $dataPOST['pwd'];
  $stmt = DB->prepare("SELECT * FROM users where username=? and password=?");
  $stmt->bind_param("ss",$username,$pwd);
  $stmt->execute();
  $res = $stmt->get_result();
  // echo $res->num_rows;
  if (($res->num_rows)>0){
    $dataUser = ($res->fetch_assoc());
    $_SESSION['user_id'] = $dataUser['id'];
    return header('location: index.php');
  }
  else {
    $invalid[] = 'Uname or pwd salah';
    return;
  }
}

function validateSelectInput($selectInput, &$error){
  if (empty($selectInput)) $error = "masukan tidak boleh kosong";
  else return true;
  return false;
}

function checkBalance($user_id,$duration_id,&$err){
  $currentBalance = getCurrentBalance($user_id);
  $price=getPriceByDurationID($duration_id);
  if ($currentBalance < $price) $err="Saldo anda tidak mencukupi:) silahkan Top-up <a href='".BASEURL."/profile/topup.php'>disini</a> ";
  else return true;
  return false;
}


?>