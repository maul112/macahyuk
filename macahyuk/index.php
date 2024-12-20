<?php
$pathThisfile='index.php';
$title = "Home";
$page = "home";
require "./layouts/header.php";
$cat = getAllCat();
?>
<!-- Hero Section -->
<header class="bg-primary text-white text-center py-5">
    <div class="container">
        <h1>Selamat Datang di MacahYuk</h1>
        <p class="lead">Platform peminjaman buku online terlengkap</p>
        <form class="d-flex justify-content-center mt-4">
            <div class="position-relative w-50 me-2">
                <input id="searchInput" class="form-control me-2" type="search" placeholder="Cari buku..." aria-label="Search" onkeyup="showSuggestions(this.value)">
                <div id="suggestions" class="list-group position-absolute w-100" style="z-index: 1000; max-height: 200px; overflow-y: auto; display: none;"></div>
            </div>
            <!-- <button class="btn btn-light" type="submit">Cari</button> -->
        </form>
    </div>
</header>

<!-- Main Content -->
<main class="container my-5">
    <!-- Buku Populer -->
    <section class="mb-5">
        <h2 class="mb-4">
            <input type="radio" class="btn-check" name="typeView" value="populer" id="populer" autocomplete="off" onclick="changesView()">
            <label class="btn btn-outline-secondary fs-5" for="populer">Buku Populer</label>

            <input type="radio" class="btn-check" name="typeView" value="wishlist" id="wishlist" autocomplete="off" onclick="changesView()">
            <label class="btn btn-outline-secondary fs-5" for="wishlist">Wishlist terbanyak</label>
        </h2>
        <div class="row g-3" id="viewAwal">
            <?php 
            $populerBooks = getPopulerBooks();
            if (!empty($populerBooks)):
                // for ($i=0; $i < 5; $i++) :
                foreach ($populerBooks as $row):
                $bookID = $row['id'];
                $bookTittle = $row['title'];
                $bookDescription = $row['description'];
                $cover_src = $row['cover_src'];
                $author = $row['author'];
            ?>
                    <div class="col-md-2">
                    <a href="./books/read.php?id=<?=$bookID?>" class="text-decoration-none">
                        <div class="card img-cover shadow cardBook">
                            <!-- <img src="assets/<?=$bookID.'.'.$cover_extension?>" class="card-img-top" alt="Book Cover"> -->
                            <img src="<?=$cover_src?>" class="card-img-top" alt="Book Cover">
                            <div class="card-body">
                                <h5 class="card-title"><?= $bookTittle ?></h5>
                                <p class="card-text"><?= $author ?></p>
                                <p><?= $row['page'] ?></p>
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

    <!-- Kategori Buku -->
    <section id="kategori_buku">
        <h2 class="mb-4">Kategori Buku</h2>
            <a href="./books/byCat.php?id=0" type="button" class="btn <?= ($catID=='0')?'btn-primary':'btn-outline-primary' ?> btn-outline-primary me-3 mb-3">All</a>
            <?php foreach($cat as $row):$id=$row['id'];?>
                <a href="./books/byCat.php?id=<?=$id?>" type="button" class="btn btn-outline-primary me-3 mb-3">
                    <?= $row['name'] ?>
                </a>
            <?php endforeach?>
    </section>
</main>

<script>
    // function changesView() {
    //     const populer=document.getElementById('populer')
    //     const wishlist=document.getElementById('wishlist')
    //     var checkedStatus=populer;
    //     if (wishlist.checked){
    //         checkedStatus=wishlist;
    //     }

    //     // const v=document.getElementById('typeView');
    //     // console.log(checkedStatus.value);
    //     $.ajax({
    //         type: "POST",
    //         url: "action.php",
    //         data: {
    //             checkedStatus:checkedStatus
    //         },
    //         success: function (response) {
    //             console.log('--success--');
    //             $('#viewAwal').html(response);
    //         }
    //     });
        
    // }

    function changesView() {
        const populer = document.getElementById('populer');
        const wishlist = document.getElementById('wishlist');
        let checkedStatus = populer.checked ? 'populer' : 'wishlist';

        $.ajax({
            type: "POST",
            url: "action.php",
            data: {
                checkedStatus: checkedStatus
            },
            success: function (response) {
                console.log('success');
                $('#viewAwal').html(response);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error: ', status, error);
                console.error(xhr.responseText);
                $('#viewAwal').html('<p class="text-danger">Terjadi kesalahan saat memuat data.</p>');
            }
        });
    }

    function showSuggestions(query) {
        const suggestionsDiv = document.getElementById("suggestions");
        if (query.length === 0) {
            suggestionsDiv.style.display = "none";
            suggestionsDiv.innerHTML = "";
            return;
        }

        $.ajax({
            type: "POST",
            url: "search_suggestions.php",
            data: { query: query },
            success: function (response) {
                console.log('succes:'+response);
                if (response.trim() !== "") {
                    suggestionsDiv.style.display = "block";
                    suggestionsDiv.innerHTML = response;
                } else {
                    suggestionsDiv.style.display = "none";
                    suggestionsDiv.innerHTML = "";
                }
            },
            error: function () {
                suggestionsDiv.style.display = "none";
                suggestionsDiv.innerHTML = "";
            }
        });
    }

</script>

<?php require "./layouts/footer.php"; ?>