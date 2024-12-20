<?php

$title = "meminjam";
$page = "meminjam";
require "../layouts/header.php";

$borrowedBooks = getDataBookBeingBorrowedByUserID($user_id);

updateBorrowedBooks();

// print_r($borrowedBooks);
?>
<!-- Header -->
<header class="bg-primary text-white text-center py-4">
    <h1>Meminjam</h1>
    <p class="lead">Daftar buku yang anda pinjam</p>
</header>
<!-- Main Content -->
<main class="container my-5">
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
                            <th scope="col">End Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh Data -->
                        <?php $count=0; foreach($borrowedBooks as $row):$count++;
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
                                            <!-- <img src="<?=BASEURL.'/assets'.'/'.$dataBook['cover_src']?>" class="book-cover"> -->
                                            <img src="<?=BASEURL.'/assets'.'/'.$cover_src?>" alt="Book Cover" class="img-thumbnail" style="max-width: 80px;">
                                        <?php endif?>
                                    </td>
                                    <td><?= $dataBook['title'] ?></td>
                                    <td><?=$dataBook['author']?></td>
                                    <td><i class="bi bi-heart-fill text-danger"></i> <?= number_format(getNumsWishlistBook($book_id)) ?></td>
                                    <td class="text-danger fw-bold"><?= $row['end_date'] ?></td>
                                    <td>
                                        <a href="exp.php?bberhvbuyefvbvirebvuiuerbuibguri=<?=$book_id?>" type="button" class="text-decoration-none btn btn-primary">Baca Buku</a>
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

