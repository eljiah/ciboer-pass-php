<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kupon Diskon - CIBOER PASS</title>
  <meta
    name="description"
    content="Dapatkan kupon diskon spesial untuk pengalaman menginap di CIBOER PASS" />

  <!-- Favicon and Fonts -->
  <link rel="icon" href="assets/logo.png" type="image/png" />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
    rel="stylesheet" />

  <!-- Bootstrap 5 CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet" />

  <!-- Font Awesome -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    rel="stylesheet" />

  <style>
    :root {
      --primary-color: #e1b74d;
      --secondary-color: #333;
      --text-light: #ffffff;
    }

    body {
      font-family: "Poppins", sans-serif;
      background-color: var(--primary-color);
      color: var(--secondary-color);
    }

    .coupon-card {
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin: 20px 0;
      padding: 20px;
      position: relative;
      overflow: hidden;
    }

    .coupon-card::before {
      content: "";
      position: absolute;
      left: -20px;
      top: 50%;
      transform: translateY(-50%);
      width: 40px;
      height: 40px;
      background: var(--primary-color);
      border-radius: 50%;
    }

    .coupon-card::after {
      content: "";
      position: absolute;
      right: -20px;
      top: 50%;
      transform: translateY(-50%);
      width: 40px;
      height: 40px;
      background: var(--primary-color);
      border-radius: 50%;
    }

    .discount-amount {
      font-size: 2.5rem;
      font-weight: bold;
      color: var(--primary-color);
    }

    .coupon-code {
      background: #f8f9fa;
      padding: 10px;
      border-radius: 5px;
      font-family: monospace;
      font-size: 1.2rem;
    }

    .copy-notification {
      display: none;
      position: fixed;
      top: 20px;
      right: 20px;
      background: #28a745;
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      z-index: 1000;
    }
  </style>
</head>

<body>
  <?php include "partials/navbar.php" ?>

  <div id="copyNotification" class="copy-notification" style="margin-top: 5rem;">
    Kode berhasil disalin!
  </div>

  <main>
    <div class="container py-5" style="margin-top: 5rem;">
      <h1 class="text-center mb-5">Kupon Diskon Spesial</h1>

      <div class="row">
        <div class="col-md-6">
          <div class="coupon-card">
            <div class="text-center">
              <h3>Diskon Weekday</h3>
              <div class="discount-amount">25%</div>
              <p>Berlaku Senin-Jumat</p>
              <div class="coupon-code mb-3">WEEKDAY25</div>
              <button class="btn btn-warning" onclick="copyCode('WEEKDAY25')">Salin Kode</button>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="coupon-card">
            <div class="text-center">
              <h3>Diskon Group</h3>
              <div class="discount-amount">15%</div>
              <p>Minimal 8 Orang</p>
              <div class="coupon-code mb-3">GROUP15</div>
              <button class="btn btn-warning" onclick="copyCode('GROUP15')">Salin Kode</button>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="coupon-card">
            <div class="text-center">
              <h3>Diskon Long Stay</h3>
              <div class="discount-amount">20%</div>
              <p>Minimal 3 Malam</p>
              <div class="coupon-code mb-3">STAY20</div>
              <button class="btn btn-warning" onclick="copyCode('STAY20')">Salin Kode</button>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="coupon-card">
            <div class="text-center">
              <h3>Diskon First Timer</h3>
              <div class="discount-amount">10%</div>
              <p>Khusus Pengunjung Pertama</p>
              <div class="coupon-code mb-3">FIRST10</div>
              <button class="btn btn-warning" onclick="copyCode('FIRST10')">Salin Kode</button>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-5">
        <h4 class="text-center">Syarat dan Ketentuan:</h4>
        <ul class="list-group">
          <li class="list-group-item">
            Satu kupon hanya dapat digunakan satu kali
          </li>
          <li class="list-group-item">
            Tidak dapat digabungkan dengan promo lainnya
          </li>
          <li class="list-group-item">Berlaku untuk semua jenis kamar</li>
          <li class="list-group-item">
            Periode promo dapat berubah sewaktu-waktu
          </li>
        </ul>
      </div>
    </div>
  </main>

  <?php include "partials/footer.php" ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function copyCode(code) {
      navigator.clipboard.writeText(code).then(() => {
        const notification = document.getElementById('copyNotification');
        notification.style.display = 'block';
        setTimeout(() => {
          notification.style.display = 'none';
        }, 2000);
      });
    }
  </script>
</body>

</html>