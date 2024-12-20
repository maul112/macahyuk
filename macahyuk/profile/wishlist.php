<?php

$title = "Wishlist Buku";
$page = "wishlist";
require "../layouts/header.php";

$wishlistBooks = getDataWishlistByUserID($user_id);
updateBorrowedBooks();
?>

<!-- Header -->
<header class="bg-primary text-white text-center py-4">
    <h1>Wishlist Anda</h1>
    <p class="lead">Daftar buku favorit Anda</p>
</header>

<!-- Main Content -->
<main class="container my-5" style="min-height: 29vh;">
    <!-- Wishlist Table -->
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Cover</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Jumlah Like</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh Data -->
                        <?php $count=0; foreach($wishlistBooks as $row):$count++;
                        $book_id=$row['book_id'];
                        $dataBook=getBookByID($book_id);
                        $cover_src=$dataBook['cover_src'];
                        ?>
                        
                            <tr>
                                <th scope="row"><?= $count ?></th>
                                <td>
                                    <?php if (explode(':',$dataBook['cover_src'])[0]=='https'):?>
                                        <img src="<?=$cover_src?>" alt="Book Cover" class="img-thumbnail" style="max-width: 80px;">
                                    <?php else:?>
                                        <img src="<?=BASEURL.'/assets'.'/'.$cover_src?>" alt="Book Cover" class="img-thumbnail" style="max-width: 80px;">
                                    <?php endif?>

                                </td>
                                <td><?= $dataBook['title'] ?></td>
                                <td><?=$dataBook['author']?></td>
                                <td><i class="bi bi-heart-fill text-danger"></i> <?= number_format(getNumsWishlistBook($book_id)) ?></td>
                                <td>
                                    <a href="../books/read.php?id=<?=$book_id?>" type="button" class="text-decoration-none btn btn-info">Lihat Buku</a>
                                    <a href="hapusWishlist.php?uvberibv=<?=$user_id?>&bvgeugfyure=<?=$book_id?>" type="button" class="text-decoration-none btn btn-danger">Hapus Wishlist</a>
                                </td>
                            </tr>
                        
                        <?php endforeach?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php 
include_once "../layouts/footer.php";
?>