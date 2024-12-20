<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up Koin</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Header -->
        <div class="row mb-4">
            <div class="col text-center">
                <h1 class="fw-bold">Top Up Koin</h1>
                <p class="text-muted">Isi saldo koin Anda untuk meminjam lebih banyak buku</p>
            </div>
        </div>

        <!-- Form Top Up -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <form action="" method="POST">
                            <!-- Saldo Saat Ini -->
                            <div class="mb-4 text-center">
                                <h5>Saldo Koin Anda Saat Ini:</h5>
                                <h3 class="fw-bold text-primary">50</h3>
                            </div>

                            <!-- Nominal Top Up -->
                            <div class="mb-3">
                                <label for="topupAmount" class="form-label fw-bold">Nominal Top Up</label>
                                <select class="form-select" id="topupAmount" name="topupAmount" required>
                                    <option value="" disabled selected>Pilih nominal</option>
                                    <option value="10000">10,000 Koin -- Rp10,000</option>
                                    <option value="20000">20,000 Koin -- Rp20,000</option>
                                    <option value="50000">50,000 Koin -- Rp40,000</option>
                                    <option value="100000">100,000 Koin -- Rp75,000</option>
                                    <option value="200000">200,000 Koin -- Rp140,000</option>
                                    <!-- <option value="10000">10,000 Koin</option>
                                    <option value="20000">20,000 Koin</option>
                                    <option value="50000">50,000 Koin</option>
                                    <option value="100000">100,000 Koin</option>
                                    <option value="100000">200,000 Koin</option> -->
                                </select>
                            </div>

                            <!-- Metode Pembayaran -->
                            <div class="mb-4">
                                <label for="paymentMethod" class="form-label fw-bold">Metode Pembayaran</label>
                                <select class="form-select" id="paymentMethod" name="paymentMethod" required>
                                    <option value="" disabled selected>Pilih metode pembayaran</option>
                                    <option value="bank_transfer">Transfer Bank</option>
                                    <option value="ewallet">E-Wallet</option>
                                    <option value="credit_card">Kartu Kredit</option>
                                </select>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-success">Top-up Koin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="row mt-5">
            <div class="col text-center">
                <p class="text-muted">© 2024 Perpustakaan Online</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
