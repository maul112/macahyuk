<?php
$title = "Books";
require_once "../config.php";
require_once BASEPATH . "/layouts/header.php";

if(!isset($_GET['mkasjkbasdasndkadjasnd'])) {
    header("Location:./");
    exit;
}

$id = $_GET['mkasjkbasdasndkadjasnd'];

$dataBook = getDataBookById($id);
$bookCat = getBookCatByID($id);
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once BASEPATH . "/layouts/sidebar.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php require_once BASEPATH . "/layouts/topbar.php"; ?>

            <div class="container-fluid">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Overview Buku</h6>
                    </div>
                    <div class="card-body mt-0">

                    <!-- Begin Page Content -->

                        <main class="container mt-5">
                            <button type="button" class="btn btn-success d-inline-block mb-3" onclick="document.location.href = './'">&raquo; Kembali</button>
                            <div class="row mb-5">
                            <!-- Gambar dan Detail Singkat Buku -->
                                <div class="col-md-3">
                                    <?php if (explode(':',$dataBook['cover_src'])[0]=='https'):?>
                                        <img src="<?=$dataBook['cover_src']?>" alt="Book Cover" class="book-cover" style="width: 100%;">
                                    <?php else:?>
                                        <img src="<?=BASEURL.'/assets'.'/'.$dataBook['cover_src']?>" class="book-cover" width="200">
                                    <?php endif?>
                                </div>
                            <!-- Informasi Lengkap Buku -->
                                <div class="col-md-9">
                                    <h4 class="fw-bold mt-3">Judul Buku: <?= $dataBook['title'] ?></h4>
                                    <p><strong>Penulis:</strong> <?= $dataBook['author'] ?></p>
                                    <p><strong>Halaman:</strong> <?= $dataBook['page'] ?></p>
                                    <p><strong>Kategori:</strong> <?= $bookCat != []? join(', ',$bookCat) : '' ?></p>
                                    <p class="mt-3">
                                        <strong>Deskripsi:</strong><br>
                                        <?= $dataBook['description'] ?>
                                    </p>
                                    <p><strong>Overview</strong></p>
                                    <p><?= $dataBook['overview'] ?></p>
                                </div>
                        </main>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->

            <?php require_once BASEPATH . "/layouts/footer.php"; ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


<script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
    
    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

})(jQuery); // End of use strict

</script>

    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
        let table = new DataTable(document.getElementById('dataTable') , {
            responsive: true
        });
    </script>

</body>

</html>