<?php

require_once "../config.php";

if(isset($_GET['lsjbdlanjdakjdjlasbhbaj'])) {
    $id = $_GET['lsjbdlanjdakjdjlasbhbaj'];
    readFeedback($id);
}
header("Location: ./");
exit;