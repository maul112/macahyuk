<?php

session_start();
session_unset();
session_destroy();
setcookie("kanjsbdhiadbasndksandaiuwfajjsabdbasgdabasdj", "", time() - 3600);
setcookie("lkadndbasdkalsdabsha", "", time() - 3600);
header("Location: ./login.php");