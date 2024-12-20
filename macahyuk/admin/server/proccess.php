<?php

require_once "../../database.php";

if(isset($_GET['ashdbnasjbdnajdbasdas']) && isset($_GET['klsafbasn'])) {
    $status = $_GET['klsafbasn'];
    updateAllServer($status);
} elseif(isset($_GET['abnsabsadjasbdjajsdn']) && isset($_GET['asdsjnjsasa'])) {
    $status = $_GET['asdsjnjsasa'];
    updateAllServer($status);
} elseif(isset($_GET['kasnksanjlnsandkasjdnan']) && isset($_GET['ajsdbjsadnsa'])) {
    $status = $_GET['ajsdbjsadnsa'];
    updateTopUpServer($status);
} elseif(isset($_GET['asndajsdbjsajdbsadasjsahda']) && isset($_GET['ajsdjbsadasjd'])) {
    $status = $_GET['ajsdjbsadasjd'];
    updateTopUpServer($status);
} 
header("Location: ./");
exit;