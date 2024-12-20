<?php
$pathThisfile='profile/edit.php';
$title = "edit";
$page = "profile";
include_once "../layouts/header.php";
if (isset($_POST['saveChangesNewAv']) && isset($_POST['newAv']) && !empty($_POST['newAv'])){
    // print_r($_POST);
    updateAv($user_id, $_POST['newAv']);
    // echo "<script>window.location.href=edit.php;</script>";
    header('location: edit.php');
    exit;
}
if (isset($_POST['editProfile'])){
    updateDataUser($user_id, $_POST);
    // echo "<script>window.location.href=index.php;</script>";
    header('location:index.php');
    exit;
}
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h3 class="text-center mb-4">Edit Profil</h3>
                    <form action="" method="POST" enctype="multipart/form-data">

                        <!-- =============== TEST =============== -->
                        <!-- =============== TEST =============== -->
                        
                        <!-- AVATAR -->
                        <div class="text-center mb-4">
                            <img src="../assets/av<?=$av?>.png" class="rounded-circle img-thumbnail img-profile" alt="Foto Profil">
                        </div>
                        <div class="text-center mb-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editAv">
                                Changes Avatar
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="editAv" tabindex="-1" aria-labelledby="editAvLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editAvLabel">Changes Avatar</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h4 class="text-center mb-4">Pilih Avatar</h4>
                                        <div class="row mb-3 text-center">
                                            <?php for ($i=1; $i<=6; $i++): ?>
                                                <div class="col-4 mb-3">
                                                    <input value="<?=$i?>" type="radio" class="btn-check" name="newAv" id="av<?= $i ?>" autocomplete="off">
                                                    <label class="btn rounded-circle btn-outline-primary" for="av<?= $i ?>">
                                                        <img class="rounded-circle avInModal" src="../assets/av<?= $i ?>.png" alt="avatar">
                                                    </label>
                                                </div>
                                            <?php endfor?>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="saveChangesNewAv" class="btn btn-primary" data-bs-dismiss="modal" id="saveChangesNewAv" onclick="">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" id="name" name="username" class="form-control" value="<?=$dataUser['username']?>" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="<?=$dataUser['email']?>" required>
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="mb-3">
                            <label for="birth" class="form-label">Tanggal Lahir</label>
                            <input type="date" id="birth" name="birth" class="form-control" value="<?=$dataUser['birth']?>">
                        </div>

                        <!-- Password Baru -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah">
                        </div>

                        <!-- Tombol Simpan -->
                        <div class="d-flex justify-content-center mt-4">
                            <button type="submit" class="btn btn-primary mx-2" name="editProfile">Simpan Perubahan</button>
                            <a href="index.php" class="btn btn-outline-secondary mx-2">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once "../layouts/footer.php";
?>