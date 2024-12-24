<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Katalog - CIBOER PASS</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
    rel="stylesheet" />
  <style>
    :root {
      --primary-color: #e1b74d;
      --secondary-color: #333;
      --text-light: #ffffff;
    }

    body {
      font-family: "Poppins", sans-serif;
      background-color: #f8f9fa;
      color: var(--secondary-color);
      padding-top: 80px;
    }

    .product-content {
      border: none;
      margin-bottom: 30px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .product-content:hover {
      transform: translateY(-5px);
    }

    .product-content .product-image {
      position: relative;
      overflow: hidden;
      border-radius: 10px 10px 0 0;
      height: 250px;
    }

    .product-content .product-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .product-deatil {
      padding: 20px;
    }

    .product-deatil h5 a {
      color: var(--secondary-color);
      font-weight: 600;
      text-decoration: none;
      font-size: 1.2rem;
    }

    .product-deatil h5 a span {
      color: var(--primary-color);
      font-size: 0.9rem;
      margin-top: 5px;
    }

    .price-container span {
      color: var(--secondary-color);
      font-weight: 600;
      font-size: 1.3rem;
    }

    .description {
      padding: 0 20px;
      color: #666;
      font-size: 0.9rem;
      line-height: 1.6;
    }

    .product-info {
      padding: 20px;
    }

    .btn-success {
      background-color: var(--primary-color);
      border: none;
      padding: 10px 25px;
      font-weight: 500;
    }

    .btn-success:hover {
      background-color: #c9a43d;
    }

    .rating label {
      color: var(--primary-color);
      font-size: 1.2rem;
      margin-right: 2px;
    }

    .tag2.hot {
      background-color: var(--primary-color);
      color: white;
      padding: 5px 15px;
      border-radius: 20px;
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 0.8rem;
      font-weight: 500;
    }

    @media (max-width: 768px) {
      .product-content {
        margin-bottom: 20px;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <?php include "partials/navbar.php" ?>

  <div class="container">
    <h2 class="text-center mb-5">Pilihan Katalog CIBOER PASS</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="product-content">
          <div class="product-image">
            <img src="assets/Kamar 1.5.webp" alt="Katalog Arjuna" />
            <span class="tag2 hot">TERSEDIA</span>
          </div>
          <div class="product-deatil">
            <h5 class="name">
              <a href="#"> Katalog Arjuna <span>Standard Room</span> </a>
            </h5>
            <p class="price-container">
              <span>Rp 500.000/malam</span>
            </p>
          </div>
          <div class="description">
            <p>
              Kapasitas 4-6 orang, 1 kamar tidur, 1 kamar mandi, Breakfast 2
              pax, Best View, Tempat Santai, Kolam Renang
            </p>
          </div>
          <div class="product-info">
            <div class="row align-items-center">
              <div class="col-6">
                <a href="paket.html" class="btn btn-success">Pesan Sekarang</a>
              </div>
              <div class="col-6 text-end">
                <div class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="far fa-star"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="product-content">
          <div class="product-image">
            <img src="assets/Kamar 1.6.webp" alt="Katalog Bima" />
            <span class="tag2 hot">TERSEDIA</span>
          </div>
          <div class="product-deatil">
            <h5 class="name">
              <a href="#"> Katalog Bima <span>Deluxe Room</span> </a>
            </h5>
            <p class="price-container">
              <span>Rp 800.000/malam</span>
            </p>
          </div>
          <div class="description">
            <p>
              Kapasitas 6-8 orang, 1 kamar tidur, 1 kamar mandi, Breakfast 2
              pax, Best View, Tempat Santai, Wifi & TV, Kolam Renang
            </p>
          </div>
          <div class="product-info">
            <div class="row align-items-center">
              <div class="col-6">
                <a href="paket.html" class="btn btn-success">Pesan Sekarang</a>
              </div>
              <div class="col-6 text-end">
                <div class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="product-content">
          <div class="product-image">
            <img src="assets/Kamar 1.7.webp" alt="Katalog Krisna" />
            <span class="tag2 hot">TERSEDIA</span>
          </div>
          <div class="product-deatil">
            <h5 class="name">
              <a href="#"> Katalog Krisna <span>Suite Room</span> </a>
            </h5>
            <p class="price-container">
              <span>Rp 1.200.000/malam</span>
            </p>
          </div>
          <div class="description">
            <p>
              Kapasitas 8-10 orang, 2 kamar tidur, 2 kamar mandi, Breakfast 4
              pax, Ruang Tamu, Wifi, AC & TV, Kolam Renang
            </p>
          </div>
          <div class="product-info">
            <div class="row align-items-center">
              <div class="col-6">
                <a href="paket.html" class="btn btn-success">Pesan Sekarang</a>
              </div>
              <div class="col-6 text-end">
                <div class="rating">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include "partials/footer.php" ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>