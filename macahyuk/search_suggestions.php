<?php
include_once("config.php");
include_once("database.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['query'])) {
    $query = trim($_POST['query']);
    if (!empty($query)) {
        $dataTitle=getTitleLikeQuery($query);
        if (!empty($dataTitle)) {
            foreach ($dataTitle as $row) {
                $title = htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8');
                $bookID = $row['id'];
                echo "<a href='./books/read.php?id=$bookID' class='list-group-item list-group-item-action'>$title</a>";
            }
        } else {
            echo "<p class='list-group-item'>Tidak ada hasil ditemukan</p>";
        }
    }
}
?>
