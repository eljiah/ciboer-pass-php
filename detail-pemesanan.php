<?php
session_start();
include 'logic/functions.php';

// Cek apakah user sudah login
if (!isset($_SESSION['user_id'])) {
    // Redirect ke halaman login dengan pesan error
    $_SESSION['error'] = "Silakan login terlebih dahulu untuk melihat detail pemesanan.";
    header("Location: login.php");
    exit;
}

// Ambil data pemesanan sesuai user_id
$user_id = $_SESSION['user_id'];
$dataPemesanan = getPemesananData($user_id);

// Tangkap aksi hapus pemesanan
if (isset($_POST['hapus'])) {
    $id_pemesanan = $_POST['hapus'];

    // Panggil fungsi hapusPemesanan
    $hasil = hapusPemesanan($id_pemesanan);

    if ($hasil) {
        $_SESSION['success'] = "Pemesanan berhasil dihapus";
    } else {
        $_SESSION['error'] = "Gagal menghapus pemesanan";
    }

    // Redirect kembali ke halaman detail pemesanan
    header("Location: detail-pemesanan.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemesanan - CIBOER PASS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .card {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: #ffc107 !important;
            color: #000 !important;
        }
    </style>
</head>

<body class="bg-light">
    <?php include "partials/navbar.php"; ?>

    <div class="container overflow-hidden" style="margin-top: 5rem; margin-bottom: 5rem;">
        <div class="row justify-content-center my-5">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header">
                        <h2 class="text-center mb-0">Detail Pemesanan Anda</h2>
                    </div>
                    <div class="card-body p-4">
                        <?php if (isset($_SESSION['success'])): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?= $_SESSION['success'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php unset($_SESSION['success']); ?>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $_SESSION['error'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php unset($_SESSION['error']); ?>
                        <?php endif; ?>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Kunjungan</th>
                                        <th>Nama</th>
                                        <th>No. HP</th>
                                        <th>Durasi</th>
                                        <th>Paket</th>
                                        <th>Kode Kupon</th>
                                        <th>Harga Paket</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($dataPemesanan)): ?>
                                        <?php $no = 1; ?>
                                        <?php foreach ($dataPemesanan as $row): ?>
                                            <tr>
                                                <td style="white-space: nowrap;"><?= $no++ ?></td>
                                                <td style="white-space: nowrap;"><?= formatTanggalIndonesia($row['tanggal_kunjungan']) ?></td>
                                                <td style="white-space: nowrap;"><?= htmlspecialchars($row['nama']) ?></td>
                                                <td style="white-space: nowrap;"><?= htmlspecialchars($row['no_handphone']) ?></td>
                                                <td style="white-space: nowrap;"><?= $row['durasi_kunjungan'] ?> hari</td>
                                                <td style="white-space: nowrap;">
                                                    <?php
                                                    $paket = [];
                                                    if ($row['paket'] & 1) $paket[] = "Inap";
                                                    if ($row['paket'] & 2) $paket[] = "Transport";
                                                    if ($row['paket'] & 4) $paket[] = "Makan";
                                                    echo implode(", ", $paket);
                                                    ?>
                                                </td>
                                                <td style="white-space: nowrap;"><?= $row['kode_kupon'] ? $row['kode_kupon'] : '-' ?></td>
                                                <td style="white-space: nowrap;">Rp <?= number_format($row['harga_paket'], 0, ',', '.') ?></td>
                                                <td style="white-space: nowrap;">Rp <?= number_format($row['total_harga'], 0, ',', '.') ?></td>
                                                <td style="white-space: nowrap;">
                                                    <form action="" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pemesanan ini?');">
                                                        <input type="hidden" name="hapus" value="<?= $row['id'] ?>">
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="10" class="text-center">Belum ada pemesanan</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="text-center mt-4">
                            <a href="paket.php" class="btn btn-primary">
                                <i class="fas fa-plus-circle"></i> Pesan Paket Wisata
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "partials/footer.php"; ?>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>