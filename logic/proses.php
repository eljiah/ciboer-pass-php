<?php
require '../database/koneksi.php';

// Ambil data form
$nama = $_POST['nama_pemesanan'];
$hp = $_POST['hp_pemesan']; 
$tgl = $_POST['waktu_wisata'];
$durasi = (int) $_POST['hari_wisata'];
$peserta = (int) $_POST['jumlah_peserta'];
$kupon = isset($_POST['kupon']) ? trim($_POST['kupon']) : '';

// Hitung paket
$paket_inap = isset($_POST['paket_inap']) ? 1000000 * $durasi : 0;
$paket_transport = isset($_POST['paket_transport']) ? 1200000 * $durasi : 0; 
$paket_makan = isset($_POST['paket_makan']) ? 500000 * $durasi * $peserta : 0;

$total = $paket_inap + $paket_transport + $paket_makan;

// Hitung diskon
$diskon = 0;
if($kupon) {
    switch($kupon) {
        case 'WEEKDAY25': $diskon = 0.25; break;
        case 'GROUP15': if($peserta >= 8) $diskon = 0.15; break;
        case 'STAY20': if($durasi >= 3) $diskon = 0.20; break;
        case 'FIRST10': $diskon = 0.10; break;
    }
}

$total_akhir = $total - ($total * $diskon);

// Simpan ke database
$paket = (isset($_POST['paket_inap']) ? 1 : 0) + 
         (isset($_POST['paket_transport']) ? 2 : 0) + 
         (isset($_POST['paket_makan']) ? 4 : 0);

$sql = "INSERT INTO pemesanan (nama, no_handphone, tanggal_kunjungan, durasi_kunjungan, paket, kode_kupon) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $db->prepare($sql);
$stmt->bind_param("sssiis", $nama, $hp, $tgl, $durasi, $paket, $kupon);
$stmt->execute();
$stmt->close();
$db->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Pemesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @media print { .no-print { display: none; } }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Detail Pemesanan</h2>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Nama:</strong></div>
                    <div class="col-md-8"><?= $nama ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>No HP:</strong></div>
                    <div class="col-md-8"><?= $hp ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Tanggal:</strong></div>
                    <div class="col-md-8"><?= $tgl ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Durasi:</strong></div>
                    <div class="col-md-8"><?= $durasi ?> hari</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Jumlah Peserta:</strong></div>
                    <div class="col-md-8"><?= $peserta ?></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Total:</strong></div>
                    <div class="col-md-8">Rp <?= number_format($total, 0, ',', '.') ?></div>
                </div>
                <?php if($diskon > 0): ?>
                <div class="row mb-3">
                    <div class="col-md-4"><strong>Diskon:</strong></div>
                    <div class="col-md-8"><?= ($diskon * 100) ?>%</div>
                </div>
                <?php endif; ?>
                <div class="row mb-4">
                    <div class="col-md-4"><strong>Total Akhir:</strong></div>
                    <div class="col-md-8 fw-bold fs-5">Rp <?= number_format($total_akhir, 0, ',', '.') ?></div>
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
