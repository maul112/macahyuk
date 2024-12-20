<?php
$title = "Users";
require_once "../config.php";
require_once BASEPATH . "/layouts/header.php";

if(!isset($_GET['jwjsankdahDNNASBDASNJAS'])) {
    header("location: ./");
    exit;
}

$id = $_GET['jwjsankdahDNNASBDASNJAS'];

$categories = getCategories();
$book = getDataBookById($id);
$category = array_values(getCategoriesByBookId($id));
$bookCategory = [];
foreach($category as $data) {
    $bookCategory[] = $data['category_id'];
}

if(isset($_POST['submit'])) {
    $bookId = htmlspecialchars($_POST['book_id']);
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $page = htmlspecialchars($_POST['page']);
    $author = htmlspecialchars($_POST['author']);
    $overview = htmlspecialchars($_POST['overview']);
    $categories = $_POST['category'];

    $valid = true;

    if($valid) {
        $data = [
            'book_id' => $bookId,
            'title' => $title,
            'description' => $description,
            'page' => $page,
            'author' => $author,
            'overview' => $overview
        ];
        updateBook($data);

        deleteBookCategoryByBookId($bookId);

        foreach($categories as $category) {
            insertCategoriesById($bookId, $category);
        }

        echo "
        <script>
            alert('Buku berhasil diedit!');
            document.location.href = './';
        </script>
        ";
    }
}

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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Buku</h6>
                        </div>
                        <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="book_id" value="<?= $book['id'] ?>">
                            <div class="form-floating mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" autocomplete="off" value="<?= (isset($valid) && !$valid)? $title : $book['title'] ?>">
                                <?= isset($errTitle)? "<p class='ms-1 text-danger'>$errTitle</p>" : '' ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description" id="description" autocomplete="off" value="<?= (isset($valid) && !$valid)? $description : $book['description'] ?>">
                                <?= isset($errDes)? "<p class='ms-1 text-danger'>$errDes</p>" : '' ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="page">Page</label>
                                <input type="number" class="form-control" name="page" id="page" autocomplete="off" value="<?= (isset($valid) && !$valid)? $page : $book['page'] ?>">
                                <?= isset($errPage)? "<p class='ms-1 text-danger'>$errPage</p>" : '' ?>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" name="author" id="author" autocomplete="off" value="<?= (isset($valid) && !$valid)? $author : $book['author'] ?>">
                                <?= isset($errAuthor)? "<p class='ms-1 text-danger'>$errAuthor</p>" : '' ?>
                            </div>
                            <div class="form-group">
                                <label for="overview">Overview</label>
                                <textarea class="form-control" name="overview" id="overview" rows="3"><?= (isset($valid) && !$valid)? $overview : $book['overview'] ?></textarea>
                            </div>
                            <?php foreach($categories as $category) : ?>
                            <div class="form-group form-check">
                                <input type="checkbox" name="category[]" class="form-check-input" value="<?= $category['id']?>" id="<?= $category['name'] ?>" <?= in_array($category['id'], $bookCategory)? 'checked' : '' ?>>
                                <label class="form-check-label" for="<?= $category['name'] ?>"><?= $category['name']?></label>
                            </div>
                            <?php endforeach ?>
                            <div class="mb-3">
                                <input type="submit" name="submit" value="Edit" class="btn btn-warning d-inline-block mx-auto me-2">
                                <input type="button" name="button" value="Cancel" class="btn btn-danger d-inline-block mx-auto me-2" onclick="document.location.href = './'">
                            </div>
                        </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

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