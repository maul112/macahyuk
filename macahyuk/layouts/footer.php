<?php 
if (isset($_POST['feedbackSubmit'])){
    $check = getUserFeedback($_SESSION['user_id']);
    if(mysqli_num_rows($check) == 0) {
        $feedback=$_POST['feedback'];
        if (insertDataFeedback($user_id,$feedback)){
            echo "
            <script>
                Swal.fire({
                    title: 'Feedback terkirim',
                    text: 'Terimakasih atas feedback anda!',
                    icon: 'success'
                }).then(() => {
                    window.location.href = '".BASEURL."/$pathThisfile';
                });
            </script>";
        }
    } else {
        echo "
        <script>
            Swal.fire({
                title: 'Feedback tidak terkirim',
                text: 'Anda sudah mengirim feedback sebelumnya, mohon menunggu 7 hari lagi!',
                icon: 'error'
            }).then(() => {
                window.location.href = '".BASEURL."/$pathThisfile';
            });
        </script>";
    }
    // unset($_POST['feedbackSubmit']);
}
?>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Tentang Kami</h5>
                    <p>MacahYuk adalah platform peminjaman buku online yang menawarkan berbagai koleksi buku berkualitas untuk pembaca Indonesia.</p>
                    <p>&copy; 2024 MacahYuk. Semua Hak Dilindungi.</p>
                </div>
                <div class="col-md-6">
                    <h5>Berikan Feedback</h5>
                    <form id="feedbackForm" action="" method="POST">
                        <div class="mb-3">
                            <label for="feedbackMessage" class="form-label">Masukkan Feedback Anda</label>
                            <textarea class="form-control" id="feedbackMessage" rows="3" required name="feedback"></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" name="feedbackSubmit" class="btn btn-light">Kirim Feedback</button>
                            <!-- <span id="feedbackStatus" class="text-success d-none">Terima kasih atas feedback Anda!</span> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>