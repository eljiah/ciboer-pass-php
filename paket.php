<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CIBOER PASS - Pemesanan Paket Wisata</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <style>
    :root {
      --primary-color: #ffc107;
    }

    body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar-brand img {
      height: 40px;
    }

    .carousel-item {
      height: 500px;
      background-size: cover;
      background-position: center;
    }

    .card {
      border: none;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
      color: #000;
    }

    .btn-primary:hover {
      background-color: #e0a800;
      border-color: #e0a800;
      color: #000;
    }
  </style>
</head>

<body>
  <?php
  ob_start();
  session_start();
  include "logic/koneksi.php";
  include "logic/functions.php";

  // Cek apakah user sudah login
  if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
  }

  // Ambil data user dari database menggunakan fungsi
  $user = getUserData($_SESSION['user_id']);
  if (!$user) {
    header("Location: login.php");
    exit();
  }

  include "partials/navbar.php";
  ?>

  <main class="container py-5 mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Form Pemesanan Paket Wisata</h4>
          </div>
          <div class="card-body">
            <form method="post" action="logic/proses.php" autocomplete="off">
              <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($_SESSION['user_id']); ?>">
              <div class="mb-3">
                <label for="nama_pemesanan" class="form-label">Nama Lengkap</label>
                <input
                  type="text"
                  class="form-control"
                  id="nama_pemesanan"
                  name="nama_pemesanan"
                  placeholder="Nama Lengkap Sesuai Tanda Pengenal"
                  value="<?php echo htmlspecialchars($user['nama']); ?>"
                  required />
              </div>
              <div class="mb-3">
                <label for="hp_pemesan" class="form-label">Nomor Handphone</label>
                <input
                  type="tel"
                  class="form-control"
                  id="hp_pemesan"
                  name="hp_pemesan"
                  placeholder="Nomor Handphone (contoh: 08xxxxxxxxxx)"
                  value="<?php echo htmlspecialchars($user['no_hp']); ?>"
                  required />
              </div>
              <div class="mb-3">
                <label for="waktu_wisata" class="form-label">Tanggal Kunjungan</label>
                <input
                  type="date"
                  class="form-control"
                  id="waktu_wisata"
                  name="waktu_wisata"
                  required />
              </div>
              <div class="mb-3">
                <label for="hari_wisata" class="form-label">Durasi Kunjungan (Hari)</label>
                <input
                  type="number"
                  class="form-control"
                  id="hari_wisata"
                  name="hari_wisata"
                  min="1"
                  value="1"
                  required />
              </div>
              <div class="mb-4">
                <label class="form-label">Pilihan Paket</label>
                <div class="form-check mb-2">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    name="paket_inap"
                    value="1"
                    id="paket_inap" />
                  <label class="form-check-label" for="paket_inap">
                    Penginapan (Rp 1.000.000/malam)
                  </label>
                </div>
                <div class="form-check mb-2">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    name="paket_transport"
                    value="1"
                    id="paket_transport" />
                  <label class="form-check-label" for="paket_transport">
                    Transportasi (Rp 1.200.000/hari)
                  </label>
                </div>
                <div class="form-check">
                  <input
                    class="form-check-input"
                    type="checkbox"
                    name="paket_makan"
                    value="1"
                    id="paket_makan" />
                  <label class="form-check-label" for="paket_makan">
                    Makan 3x Sehari (Rp 500.000/hari)
                  </label>
                </div>
              </div>
              <div class="mb-3">
                <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                <input
                  type="number"
                  class="form-control"
                  id="jumlah_peserta"
                  name="jumlah_peserta"
                  min="1"
                  value="1"
                  required />
              </div>
              <div class="mb-3">
                <label for="kupon" class="form-label">Kode Kupon</label>
                <input
                  type="text"
                  class="form-control"
                  id="kupon"
                  name="kupon"
                  placeholder="Masukkan kode kupon jika ada" />
              </div>
              <div class="mb-3">
                <label for="harga" class="form-label">Harga Paket</label>
                <div class="input-group">
                  <span class="input-group-text">Rp</span>
                  <input
                    type="number"
                    class="form-control"
                    id="harga"
                    name="harga"
                    readonly />
                </div>
              </div>
              <div class="mb-4">
                <label for="total" class="form-label">Total Tagihan</label>
                <div class="input-group">
                  <span class="input-group-text">Rp</span>
                  <input
                    type="number"
                    class="form-control"
                    id="total"
                    name="total"
                    readonly />
                </div>
              </div>
              <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">
                  Pesan Sekarang
                </button>
                <button type="reset" class="btn btn-outline-secondary">
                  Reset Form
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include "partials/footer.php" ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const paket_inap = 1000000;
    const paket_transport = 1200000;
    const paket_makan = 500000;

    function applyDiscount(total) {
      const kuponCode = document.getElementById("kupon").value.toUpperCase();
      const hari = new Date(document.getElementById("waktu_wisata").value).getDay();
      const jumlahPeserta = parseInt(document.getElementById("jumlah_peserta").value);
      const hariMenginap = parseInt(document.getElementById("hari_wisata").value);

      if (kuponCode === "WEEKDAY25" && hari >= 1 && hari <= 5) {
        return total * 0.75; // 25% discount
      } else if (kuponCode === "GROUP15" && jumlahPeserta >= 8) {
        return total * 0.85; // 15% discount
      } else if (kuponCode === "STAY20" && hariMenginap >= 3) {
        return total * 0.80; // 20% discount
      } else if (kuponCode === "FIRST10") {
        return total * 0.90; // 10% discount
      }
      return total;
    }

    function updateTotalCost() {
      let totalCost = 0;

      const inapCheckbox = document.getElementById("paket_inap");
      const transportCheckbox = document.getElementById("paket_transport");
      const makanCheckbox = document.getElementById("paket_makan");

      if (inapCheckbox.checked) {
        totalCost += paket_inap;
      }
      if (transportCheckbox.checked) {
        totalCost += paket_transport;
      }
      if (makanCheckbox.checked) {
        totalCost += paket_makan;
      }

      document.getElementById("harga").value = totalCost;
      updateTotal();
    }

    function updateTotal() {
      const hari_wisata =
        parseInt(document.getElementById("hari_wisata").value) || 0;
      const jumlah_peserta =
        parseInt(document.getElementById("jumlah_peserta").value) || 0;
      const harga = parseInt(document.getElementById("harga").value) || 0;

      let totalTagihan = hari_wisata * jumlah_peserta * harga;
      totalTagihan = applyDiscount(totalTagihan);
      document.getElementById("total").value = totalTagihan;
    }

    // Event listeners
    const inputs = [
      "paket_inap",
      "paket_transport",
      "paket_makan",
      "hari_wisata",
      "jumlah_peserta",
      "kupon",
      "waktu_wisata"
    ];
    inputs.forEach((id) => {
      document.getElementById(id).addEventListener("change", updateTotalCost);
    });

    // Initial calculation
    updateTotalCost();
  </script>
</body>

</html>