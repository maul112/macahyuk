<?php
$pathThisfile='books\byCat.php';
$title = "Category";
$page = "home";
require "../layouts/header.php";
$cat = getAllCat();
if (isset($_GET['id'])){
    $catID = $_GET['id'];
    if ($catID=='0'){
        $bookByCat = getAllBooks();
    }else {
        $bookByCat = getBooksByCatID($catID);
    }
}else {
    header("location:../index.php");
    exit;
}
?>
<!-- #e4e6e8 -->
<main class="container my-5">
    <!-- Kategori Buku -->
    <section id="kategori_buku">
        <h2 class="mb-4">Kategori Buku</h2>
            <a href="./byCat.php?id=0" type="button" class="btn <?= ($catID=='0')?'btn-primary':'btn-outline-primary' ?> me-3 mb-4">All</a>
            <?php foreach($cat as $row):$id=$row['id'];?>
                <a href="./byCat.php?id=<?=$id?>" type="button" class="btn <?= ($id==$catID)?'btn-primary':'btn-outline-primary' ?> me-3 mb-4" >
                    <?= $row['name'] ?>
                </a>
            <?php endforeach?>
    </section>

    <!-- Book by Cat -->
    <section class="mb-5">
        <div class="row g-3">
            <?php 
            if (!empty($bookByCat)):
                // for ($i=0; $i < 5; $i++) :
                foreach ($bookByCat as $row):
                $bookID = $row['id'];
                $bookTittle = $row['title'];
                $bookDescription = $row['description'];
                $cover_src = $row['cover_src'];
                $author = $row['author'];
            ?>
                    <div class="col-md-2">
                    <a href="./read.php?id=<?=$bookID?>" class="text-decoration-none">
                        <div class="card img-cover shadow cardBook">
                            <!-- <img src="../assets/<?=$bookID.'.'.$cover_extension?>" class="card-img-top" alt="Book Cover"> -->
                            <?php if (explode(':',$row['cover_src'])[0]=='https'): ?>
                                <img src="<?=$cover_src?>" class="card-img-top" alt="Book Cover">
                            <?php else:?>
                                <img src="<?=BASEURL.'/assets'.'/'.$cover_src?>" class="card-img-top" alt="Book Cover">
                            <?php endif?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $bookTittle ?></h5>
                                <p class="card-text"><?= $author ?></p>
                                <span class="fs-8 text-danger"><i class="bi bi-heart-fill"></i> <?= number_format(getNumsWishlistBook($bookID)) ?> </span>
                            </div>
                        </div>
                    </a>
                    </div>
                    
                <?php endforeach?>
                <?php //endfor?>
            <?php endif?>
        </div>
    </section>
</main>

<?php require "../layouts/footer.php"; ?>
