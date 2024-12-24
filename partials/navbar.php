<header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#" aria-label="CIBOER PASS Homepage">
            <div class="row justify-content-center align-items-center">
              <div class="col">
                <img
                  src="assets/logo.png"
                  alt="CIBOER PASS Logo"
                  height="40"
                  loading="lazy"
                />
              </div>
              <div class="col">
                <h5 class="mb-0">CIBOER PASS</h5>
              </div>
            </div>
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php#home">Beranda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php#services">Layanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php#about">Tentang</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Kontak</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="gallery.php">Galeri</a>
              </li>
              <li class="nav-item"></li>
                <a class="nav-link" href="kupon.php">Kupon</a>
              </li>
              <li class="nav-item"></li>
                <a href="paket.php" class="nav-link">Pesan Sekarang</a>
              </li>
              <?php if(isset($_SESSION['user_id'])): ?>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo $_SESSION['nama']; ?>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="detail-pemesanan.php">Detail Pemesanan</a></li>
                    <li><a class="dropdown-item" href="login.php?logout=true">Logout</a></li>
                  </ul>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>