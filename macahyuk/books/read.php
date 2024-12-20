<?php
$pathThisfile='books/read.php';
$title = "read";
$page = "books";
require "../layouts/header.php";
// require "../database.php";

if (isset($_GET['id'])){
    $bookID = $_GET['id'];
    $dataBook = getBookByID($bookID);
    $numWishlist = getNumsWishlistBook($bookID);
    if (!$dataBook){
        header("location:../index.php");
        exit;
    }
    $bookCat = getBookCatByID($bookID);
    // var_dump($dataBook);echo "<br><br>";
    // var_dump($bookCat);
}else {
    header("location:../index.php");
    exit;
}
if (isset($_POST['pinjamBuku'])){
    $duration_id=$_POST['duration_id'];
    $errors = [
        'duration_id'=>''
    ];
    if (validateSelectInput($duration_id,$errors['duration_id'])===true && checkBalance($user_id,$duration_id,$errors['duration_id'])===true){
        addTransaction($user_id,$bookID,$duration_id);
        echo "
        <script>
            Swal.fire({
                title: 'Good job!',
                text: 'Buku berhasil dipinjam, silahkan cek di Meminjam',
                icon: 'success'
            }).then(() => {
                window.location.href = 'read.php?id=$bookID';
            });
        </script>";
    }
}
$durations = getDurations();
?>

<main class="container mt-5">
    <div class="row mb-5">
        <!-- Gambar dan Detail Singkat Buku -->
        <div class="col-md-3">
            <?php if (explode(':',$dataBook['cover_src'])[0]=='https'):?>
                <img src="<?=$dataBook['cover_src']?>" alt="Book Cover" class="book-cover">
            <?php else:?>
                <img src="<?=BASEURL.'/assets'.'/'.$dataBook['cover_src']?>" class="book-cover">
            <?php endif?>


            <div class="mt-3">
                <input type="checkbox" class="btn-check" id="wishlistStatus" value="<?= $bookID.'#'.$user_id ?>" autocomplete="off" <?= (checkWhislist($bookID,$user_id)===true)?'checked':'' ?> onclick="updateWishlistStatus(this.checked,this.value)" >
                <label class="btn btn-outline-danger" for="wishlistStatus"><i class="bi bi-heart-fill"></i> Wishlist (<span id="numWishlist"><?= number_format($numWishlist) ?></span>)</label>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#bookOverview">
                    <i class="bi bi-book-half"></i> Overview
                </button>
                <!-- Modal -->
                <div class="modal fade" id="bookOverview" tabindex="-1" aria-labelledby="bookOverviewLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="bookOverviewLabel">Book Overview</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h3 class="ms-2 mb-4"><?= $dataBook['title'] ?></h3>
                                <div class="row mb-3 m-2">
                                    <?= $dataBook['overview'] ?>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" onclick="">Ok</button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Lengkap Buku -->
        <div class="col-md-9">
            <h2 class="fw-bold">Judul Buku: <?= $dataBook['title'] ?></h2>
            <p><strong>Penulis:</strong> <?= $dataBook['author'] ?></p>
            <p><strong>Halaman:</strong> <?= $dataBook['page'] ?></p>
            <p><strong>Kategori:</strong> <?= $bookCat != []? join(', ',$bookCat) : '' ?></p>
            <p class="mt-3">
                <strong>Deskripsi:</strong><br>
                <?= $dataBook['description'] ?>
            </p>

            <!-- Pilihan Peminjaman -->
            <h4 class="mt-4">Peminjaman Buku</h4>
            <form action="" method="POST">
                <input type="hidden" name="book_id" value="1"> <!-- ID Buku -->
                <div class="mb-3">
                    <label for="duration" class="form-label">Pilih Durasi Peminjaman</label>
                    <select class="form-select" id="duration" name="duration_id" required>
                        <option value="" disabled selected>Pilih Durasi</option>
                        <?php foreach($durations as $row):?>
                            <option value="<?=$row['id']?>"><?=$row['day']?> Hari - Rp. <?=$row['price']?> </option>
                        <?php endforeach?>
                    </select>
                </div>
                <!-- INVALID -->
                <?php if(!empty($errors['duration_id'])):?>
                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-3"></i>
                        <div>
                            <?= $errors['duration_id'] ?>
                        </div>
                    </div>
                <?php endif?>

                <button type="submit" name="pinjamBuku" class="btn btn-primary w-100">Pinjam Buku</button>
            </form>
        </div>
    </div>
</main>

<!-- ==================================== TEST ==================================== -->

<!-- ==================================== TEST ==================================== -->

<script>
    function updateWishlistStatus(checkedStatus,bookAndUser_ID){
        console.log(bookAndUser_ID);
        console.log(checkedStatus);
        // var value = bookAndUser_ID;
        $.ajax({
            type: "POST",
            url: "action.php",
            data: {
                value:bookAndUser_ID,
                ch:checkedStatus
            },
            success: function (response) {
                console.log('success:'+response);
                $('#numWishlist').html(response);
            },
            
            error: function (xhr, status, error) {
                console.error('Error Status:', status);
                console.error('Error Detail:', error);
                console.error('Response:', xhr.responseText);
            }
        });
    }

</script>

<?php require "../layouts/footer.php"; ?>