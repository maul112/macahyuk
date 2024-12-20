<?php 
include_once("config.php"); 
include_once("database.php");
if ($_SERVER['REQUEST_METHOD']=='POST'){
    $checkedStatus=$_POST['checkedStatus'];
    if ($checkedStatus=='populer'){
        $dataBooks=getPopulerBooks();
    }elseif($checkedStatus=='wishlist'){
        $dataBooks=get10BooksMostWishlist();
    }
    if (empty($dataBooks)) {
        echo "<p class='text-danger'>Tidak ada data ditemukan.</p>";
        exit;
    }
    foreach ($dataBooks as $row){
        $bookID = $row['id'];
        $bookTittle = $row['title'];
        // $bookDescription = $row['description'];
        $cover_src = $row['cover_src'];
        $author = $row['author'];
        $numsWishlist=number_format(getNumsWishlistBook($bookID));

        echo "
        <div class='col-md-2'>
            <a href='./books/read.php?id=$bookID' class='text-decoration-none'>
                <div class='card img-cover shadow cardBook'>
                    <img src='$cover_src' class='card-img-top' alt='Book Cover'>
                    <div class='card-body'>
                        <h5 class='card-title'> $bookTittle </h5>
                        <p class='card-text'> $author </p>
                        <span class='fs-8 text-danger'><i class='bi bi-heart-fill'></i> $numsWishlist</span>
                    </div>
                </div>
            </a>
        </div>
        ";
    }
}
?>