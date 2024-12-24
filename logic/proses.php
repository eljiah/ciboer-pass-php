<?php
require 'koneksi.php';
require 'functions.php';

$hasil = simpanPemesanan($_POST);

// Cek status pemesanan
if(!$hasil['status']) {
    $_SESSION['error'] = "Gagal menyimpan pemesanan. Silakan coba lagi.";
    header("Location: ../paket.php");
    exit();
}

// Ambil data hasil pemesanan
$data = $hasil['data'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pemesanan - CIBOER PASS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print { 
            .no-print { 
                display: none; 
            } 
        }
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
    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Detail Pemesanan</h2>
                    <img src="../assets/img/logo.png" alt="CIBOER PASS" height="50" class="no-print">
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Nama Pemesan:</strong></div>
                    <div class="col-md-8"><?= htmlspecialchars($data['nama']) ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Nomor Handphone:</strong></div>
                    <div class="col-md-8"><?= htmlspecialchars($data['hp']) ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Tanggal Kunjungan:</strong></div>
                    <div class="col-md-8"><?= date('d F Y', strtotime($data['tgl'])) ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Durasi Kunjungan:</strong></div>
                    <div class="col-md-8"><?= htmlspecialchars($data['durasi']) ?> hari</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Jumlah Peserta:</strong></div>
                    <div class="col-md-8"><?= htmlspecialchars($data['peserta']) ?> orang</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Total Biaya:</strong></div>
                    <div class="col-md-8">Rp <?= number_format($data['total'], 0, ',', '.') ?></div>
                </div>
                <?php if($data['diskon'] > 0): ?>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Diskon:</strong></div>
                    <div class="col-md-8"><?= ($data['diskon'] * 100) ?>%</div>
                </div>
                <?php endif; ?>
                <div class="row mb-4">
                    <div class="col-md-4"><strong>Total yang Harus Dibayar:</strong></div>
                    <div class="col-md-8">
                        <h3 class="text-primary mb-0">Rp <?= number_format($data['total_akhir'], 0, ',', '.') ?></h3>
                    </div>
                </div>
                
                <div class="alert alert-info mt-3">
                    <i class="fas fa-info-circle"></i> Silakan simpan atau cetak halaman ini sebagai bukti pemesanan Anda.
                </div>
                
                <div class="text-center mt-4 no-print">
                    <button onclick="window.print()" class="btn btn-primary me-2">
                        <i class="fas fa-print"></i> Cetak
                    </button>
                    <a href="../detail-pemesanan.php" class="btn btn-secondary">
                        <i class="fas fa-list"></i> Lihat Semua Pemesanan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script>
        window.print();
        window.onafterprint = () => window.location.href = '../paket.php';
    </script>
</body>
</html>
