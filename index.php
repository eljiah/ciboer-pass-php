<?php
include 'logic/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CIBOER PASS - Villa, Cafe & Glamping Experience</title>
    <meta
      name="description"
      content="Nikmati pengalaman liburan yang menyegarkan di CIBOER PASS - destinasi villa, cafe, dan glamping terbaik"
    />

    <!-- Favicon and Fonts -->
    <link rel="icon" href="assets/LOGO.png" type="image/png" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- Bootstrap 5 CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />

    <style>
      :root {
        --primary-color: #e1b74d;
        --secondary-color: #333;
        --text-light: #ffffff;
        --section-light: #ffffff;
        --section-dark: #dedede;
      }

      body {
        font-family: "Poppins", sans-serif;
        background-color: var(--primary-color);
        color: var(--secondary-color);
      }

      .carousel-item {
        height: 50vh;
        min-height: 300px;
        background: no-repeat center center scroll;
        background-size: cover;
      }

      .carousel-caption {
        background: rgba(0, 0, 0, 0.5);
        padding: 15px;
        border-radius: 10px;
      }

      .hero-section {
        background-size: cover;
        background-position: center;
        color: var(--secondary-color);
      }

      .card-hover:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      }

      .service-icon {
        font-size: 3rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
      }

      section {
        position: relative;
        padding: 100px 0;
      }

      section:nth-child(odd) {
        background-color: var(--section-light);
      }

      section:nth-child(even) {
        background-color: var(--section-dark);
      }

      #home {
        padding: 0;
      }

      #welcome {
        margin-top: -2px;
      }
    </style>
  </head>
  <body>
    <?php include "partials/navbar.php" ?>

    <main>
      <section id="home">
        <div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button
              type="button"
              data-bs-target="#mainCarousel"
              data-bs-slide-to="0"
              class="active"
              aria-current="true"
              aria-label="Slide 1"
            ></button>
            <button
              type="button"
              data-bs-target="#mainCarousel"
              data-bs-slide-to="1"
              aria-label="Slide 2"
            ></button>
            <button
              type="button"
              data-bs-target="#mainCarousel"
              data-bs-slide-to="2"
              aria-label="Slide 3"
            ></button>
          </div>
          <div class="carousel-inner">
            <div
              class="carousel-item active"
              style="background-image: url('assets/HEADLINE2.webp')"
            >
              <div class="carousel-caption d-none d-md-block">
                <h5>Cafe Tour</h5>
                <p>Rasakan Kehangatan Secangkir Kopi di Tengah Harmoni Alam</p>
              </div>
            </div>
            <div
              class="carousel-item"
              style="background-image: url('assets/d\'garden.webp')"
            >
              <div class="carousel-caption d-none d-md-block">
                <h5>Villa Tour</h5>
                <p>
                  Jelajahi Keindahan dan Kenyamanan di Setiap Sudut Vila Kami
                </p>
              </div>
            </div>
            <div
              class="carousel-item"
              style="background-image: url('assets/pemandangan3.webp')"
            >
              <div class="carousel-caption d-none d-md-block">
                <h5>Glamping Tour</h5>
                <p>Glamping: Kemewahan Bertemu Petualangan</p>
              </div>
            </div>
          </div>
          <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#mainCarousel"
            data-bs-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#mainCarousel"
            data-bs-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>

      <section id="welcome" class="hero-section text-center py-5 bg-light">
        <div class="wave-top"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h1 class="display-4 mb-4">Selamat Datang di CIBOER PASS</h1>
              <p class="lead mb-4">
                Temukan keindahan alam, kenyamanan istimewa, dan petualangan tak
                terlupakan di destinasi wisata terhits di Majalengka, Jawa
                Barat. CIBOER PASS menghadirkan paduan sempurna antara keindahan
                terasering sawah, pemandangan Gunung Ciremai, dan fasilitas
                modern untuk pengalaman liburan yang luar biasa.
              </p>
              <div class="d-flex justify-content-center">
                <a href="#services" class="btn btn-warning btn-lg me-3"
                  >Jelajahi Layanan</a
                >
                <a href="#contact" class="btn btn-warning btn-lg me-3"
                  >Hubungi Kami</a
                >
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="about" class="py-5 bg-white">
        <div class="wave-top"></div>
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center mb-5">
              <h2 class="display-5 fw-bold">Tentang CIBOER PASS</h2>
              <p class="lead text-muted">
                Destinasi Wisata Premium di Kaki Gunung Ciremai
              </p>
            </div>
          </div>
          <div class="row align-items-center">
            <div class="col-md-6">
              <h3>Sejarah & Visi</h3>
              <p style="text-align: justify">
                CIBOER PASS didirikan dengan visi untuk menciptakan destinasi
                wisata yang memadukan keindahan alam dengan kenyamanan modern.
                Berlokasi strategis di kaki Gunung Ciremai, kami berkomitmen
                untuk memberikan pengalaman liburan yang tak terlupakan bagi
                setiap pengunjung.
              </p>
              <h3 class="mt-4">Fasilitas Unggulan</h3>
              <ul>
                <li>Villa mewah dengan pemandangan pegunungan</li>
                <li>Cafe dengan konsep outdoor yang instagramable</li>
                <li>Area glamping eksklusif</li>
                <li>Spot foto dengan latar terasering sawah</li>
                <li>Area parkir luas dan aman</li>
                <li>Taman dan area bermain anak</li>
              </ul>
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-6 mb-4">
                  <img
                    src="assets/baratie.webp"
                    alt="Fasilitas CIBOER PASS"
                    class="img-fluid rounded shadow"
                  />
                </div>
                <div class="col-6 mb-4">
                  <img
                    src="assets/Gambar 1.2.webp"
                    alt="Pemandangan CIBOER PASS"
                    class="img-fluid rounded shadow"
                  />
                </div>
                <div class="col-12">
                  <div class="bg-light p-4 rounded shadow">
                    <h4>Mengapa Memilih Kami?</h4>
                    <div class="row mt-3">
                      <div class="col-6">
                        <div class="d-flex align-items-center mb-3">
                          <i class="fas fa-check-circle text-success me-2"></i>
                          <span>Lokasi Strategis</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                          <i class="fas fa-check-circle text-success me-2"></i>
                          <span>Pemandangan Eksotis</span>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="d-flex align-items-center mb-3">
                          <i class="fas fa-check-circle text-success me-2"></i>
                          <span>Fasilitas Lengkap</span>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                          <i class="fas fa-check-circle text-success me-2"></i>
                          <span>Pelayanan Prima</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="services" class="bg-light py-4">
        <div class="wave-top"></div>
        <div class="container">
          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading fw-normal lh-1">
                Ciboer Pass & <span class="text-muted">Villa Ciboer Pass</span>
              </h2>
              <p class="lead" style="text-align: justify">
                Ciboer Pass merupakan salah satu tempat wisata yang hits di
                Majalengka, Jawa Barat. Dengan menampilkan terasering sawah,
                Ciboer Pass memiliki sajian yang menakjubkan dan banyak spot
                untuk berfoto. Pemandangan persawahan yang indah dan segarnya
                udara pegunungan membuat pengalaman berkunjung ke Ciboer Pass
                semakin istimewa. Pemandangan Gunung Ciremai juga memperindah
                latar belakang terasering ini. Selain menampilkan pemandangan
                yang indah, Ciboer Pass juga memiliki Cofee shop yang
                instagramable.
              </p>
            </div>
            <div class="col-md-5">
              <img
                src="assets/Gambar 2.1.webp"
                alt="Ciboer Pass Landscape"
                class="featurette-image img-fluid mx-auto"
              />
            </div>
          </div>

          <hr class="featurette-divider" />

          <div class="row featurette">
            <div class="col-md-7 order-md-2">
              <h2 class="featurette-heading fw-normal lh-1">
                Pilih Villa <span class="text-muted">Terbaik & Nyaman</span>
              </h2>
              <p class="lead" style="text-align: justify">
                Ciboer Pass memiliki fasilitas yang lengkap, termasuk area
                parkir kendaraan. Cafe dengan pemandangan sawah yang
                menakjubkan, penginapan atau villa dengan berbagai pilihan tipe
                dan harga per malam, Gazebo, Camping ground yang jauh dari
                keramaian, serta Sungai yang jernih.
              </p>
            </div>
            <div class="col-md-5 order-md-1">
              <img
                src="assets/Gambar 2.3.webp"
                alt="Villa Ciboer Pass"
                class="featurette-image img-fluid mx-auto"
              />
            </div>
          </div>

          <hr class="featurette-divider" />

          <div class="row featurette">
            <div class="col-md-7">
              <h2 class="featurette-heading fw-normal lh-1">
                Lokasi & <span class="text-muted">Waktu Kunjungan</span>
              </h2>
              <p class="lead" style="text-align: justify">
                Alamat Ciboer Pass terletak di Jl.Ciboer, Desa Bantaragung,
                Kecamatan Sindangwangi, Kabupaten Majalengka, Jawa Barat.
                Lokasinya berada di perbatasan dengan Kabupaten Cirebon. Hampir
                di sepanjang perjalanan menuju lokasi akan terlihat area
                persawahan yang indah, dengan udara yang segar lagi menyejukkan.
                Ciboer Pass seringkali dibandingkan dengan terasering di Ubud.
              </p>
            </div>
            <div class="col-md-5">
              <img
                src="assets/maps1.webp"
                alt="Lokasi Ciboer Pass"
                class="featurette-image img-fluid mx-auto"
              />
            </div>
          </div>
        </div>
      </section>

      <section id="promo" class="bg-white py-5">
        <div class="wave-top"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-4 mb-3">
              <div class="card border-warning">
                <div class="card-body">
                  <h4 class="card-title">Glamping Eksklusif</h4>
                  <p>
                    Penginapan nyaman di tenda mewah dengan pemandangan
                    spektakuler
                  </p>
                  <span class="badge bg-warning text-dark">Mulai 150K</span>
                  <a href="katalog.php" class="btn btn-warning mt-3 mb-2 w-100"
                    >Lihat Katalog</a
                  >
                  <a href="paket.php" class="btn btn-warning w-100"
                    >Pesan Sekarang</a
                  >
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card border-warning">
                <div class="card-body">
                  <h4 class="card-title">Paket Staycation</h4>
                  <p>Pengalaman menginap lengkap dengan fasilitas premium</p>
                  <span class="badge bg-warning text-dark">Mulai 250K</span>
                  <a href="katalog.php" class="btn btn-warning mt-3 mb-2 w-100"
                    >Lihat Katalog</a
                  >
                  <a href="paket.php" class="btn btn-warning w-100"
                    >Pesan Sekarang</a
                  >
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <div class="card border-warning">
                <div class="card-body">
                  <h4 class="card-title">Promo Akhir Tahun</h4>
                  <p>Diskon spesial untuk pengalaman glamping dan staycation</p>
                  <span class="badge bg-warning text-dark">Terbatas!</span>
                  <a href="katalog.php" class="btn btn-warning mt-3 mb-2 w-100"
                    >Lihat Katalog</a
                  >
                  <a href="paket.php" class="btn btn-warning w-100"
                    >Pesan Sekarang</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>
    
      
      <?php include "partials/footer.php" ?>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
