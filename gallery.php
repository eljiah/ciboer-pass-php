<?php 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <!-- LightGallery CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/lightgallery.js/dist/css/lightgallery.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/lightgallery.js/dist/css/lg-thumbnail.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/lightgallery.js/dist/css/lg-fullscreen.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <title>PASS - GALLERY PAGE</title>
    <style>
      body {
        background-color: #e1b74d;
      }

      .gallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        padding: 20px;
      }

      .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.4s ease;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      }

      .gallery-item:hover {
        transform: translateY(-5px) scale(1.02);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
      }

      .gallery-item img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        border-radius: 12px;
        transition: all 0.4s ease;
      }

      .gallery-item:hover img {
        filter: brightness(1.1);
      }

      .gallery-item .overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(transparent, rgba(0, 0, 0, 0.7));
        color: white;
        padding: 15px;
        opacity: 0;
        transition: opacity 0.3s ease;
      }

      .gallery-item:hover .overlay {
        opacity: 1;
      }

      .pagination {
        display: flex;
        justify-content: center;
        margin: 30px 0;
        gap: 10px;
      }

      .pagination a {
        padding: 12px 20px;
        background-color: #007bff;
        color: white;
        border-radius: 8px;
        text-decoration: none;
        transition: all 0.3s ease;
        font-weight: 500;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .pagination a:hover {
        background-color: #0056b3;
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
      }

      .pagination a.active {
        background-color: #0056b3;
        transform: scale(1.05);
      }

      .gallery-header {
        text-align: center;
        padding: 40px 0;
      }

      .gallery-header h1 {
        font-size: 3rem;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
      }

      .gallery-header p {
        color: #34495e;
        font-size: 1.2rem;
        max-width: 600px;
        margin: 0 auto;
      }

      .filter-buttons {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 30px;
      }

      .filter-btn {
        padding: 8px 16px;
        border: none;
        border-radius: 6px;
        background-color: #34495e;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .filter-btn:hover,
      .filter-btn.active {
        background-color: #2c3e50;
        transform: translateY(-2px);
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
   <?php include "partials/navbar.php" ?>

    <!-- Gallery Section -->
    <div class="container my-5 pt-4">
      <div class="gallery-header animate__animated animate__fadeIn">
        <h1>Galeri Foto</h1>
        <p>Koleksi momen-momen terbaik yang kami abadikan untuk Anda</p>
      </div>

      <div class="filter-buttons animate__animated animate__fadeInUp">
        <button class="filter-btn active" data-filter="all">Semua</button>
        <button class="filter-btn" data-filter="nature">Alam</button>
        <button class="filter-btn" data-filter="culture">Budaya</button>
        <button class="filter-btn" data-filter="architecture">
          Arsitektur
        </button>
      </div>

      <div class="gallery animate__animated animate__fadeIn" id="gallery">
        <!-- Gallery items will be loaded dynamically -->
      </div>
    </div>
    </main>
    
    <?php include "partials/footer.php" ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery.js/dist/lightgallery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery.js/dist/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery.js/dist/plugins/fullscreen/lg-fullscreen.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/lightgallery.js/dist/plugins/zoom/lg-zoom.min.js"></script>

    <script>
      // Gallery data with categories
      const galleryItems = [
        {
          src: "assets/Gambar 1.1.webp",
          thumb: "assets/Gambar 1.1.webp",
          title: "Gambar 1",
          category: "nature",
          description: "Keindahan alam yang memukau",
        },
        {
          src: "assets/Gambar 1.2.webp",
          thumb: "assets/Gambar 1.2.webp",
          title: "Gambar 2",
          category: "culture",
          description: "Warisan budaya yang tak ternilai",
        },
        {
          src: "assets/Gambar 1.3.webp",
          thumb: "assets/Gambar 1.3.webp",
          title: "Gambar 3",
          category: "architecture",
          description: "Arsitektur megah yang menakjubkan",
        },
        {
          src: "assets/Gambar 1.4.webp",
          thumb: "assets/Gambar 1.4.webp",
          title: "Gambar 4",
          category: "nature",
          description: "Panorama alam yang mempesona",
        },
        {
          src: "assets/Gambar 1.5.webp",
          thumb: "assets/Gambar 1.5.webp",
          title: "Gambar 5",
          category: "culture",
          description: "Tradisi budaya yang masih terjaga",
        },
        {
          src: "assets/Gambar 1.6.webp",
          thumb: "assets/Gambar 1.6.webp",
          title: "Gambar 6",
          category: "architecture",
          description: "Bangunan bersejarah yang memukau",
        },
        {
          src: "assets/Gambar 1.7.webp",
          thumb: "assets/Gambar 1.7.webp",
          title: "Gambar 7",
          category: "nature",
          description: "Keindahan alam yang menakjubkan",
        },
        {
          src: "assets/Gambar 1.8.webp",
          thumb: "assets/Gambar 1.8.webp",
          title: "Gambar 8",
          category: "culture",
          description: "Warisan budaya yang mempesona",
        },
        {
          src: "assets/Gambar 1.9.webp",
          thumb: "assets/Gambar 1.9.webp",
          title: "Gambar 9",
          category: "architecture",
          description: "Arsitektur klasik yang memukau",
        },
        {
          src: "assets/Gambar 1.10.webp",
          thumb: "assets/Gambar 1.10.webp",
          title: "Gambar 10",
          category: "nature",
          description: "Panorama alam yang indah",
        },
        {
          src: "assets/Gambar 1.11.webp",
          thumb: "assets/Gambar 1.11.webp",
          title: "Gambar 11",
          category: "culture",
          description: "Tradisi budaya yang unik",
        },
        {
          src: "assets/Gambar 1.12.webp",
          thumb: "assets/Gambar 1.12.webp",
          title: "Gambar 12",
          category: "architecture",
          description: "Bangunan modern yang menawan",
        },
        {
          src: "assets/Gambar 1.13.webp",
          thumb: "assets/Gambar 1.13.webp",
          title: "Gambar 13",
          category: "nature",
          description: "Keindahan alam yang alami",
        },
        {
          src: "assets/Gambar 1.14.webp",
          thumb: "assets/Gambar 1.14.webp",
          title: "Gambar 14",
          category: "culture",
          description: "Warisan budaya yang berharga",
        },
        {
          src: "assets/Gambar 1.15.webp",
          thumb: "assets/Gambar 1.15.webp",
          title: "Gambar 15",
          category: "architecture",
          description: "Arsitektur unik yang memukau",
        },
        {
          src: "assets/Gambar 2.1.webp",
          thumb: "assets/Gambar 2.1.webp",
          title: "Gambar 16",
          category: "nature",
          description: "Keindahan alam yang menakjubkan",
        },
        {
          src: "assets/Gambar 2.2.webp",
          thumb: "assets/Gambar 2.2.webp",
          title: "Gambar 17",
          category: "culture",
          description: "Tradisi budaya yang mempesona",
        },
        {
          src: "assets/Gambar 2.3.webp",
          thumb: "assets/Gambar 2.3.webp",
          title: "Gambar 18",
          category: "architecture",
          description: "Bangunan megah yang memukau",
        },
        {
          src: "assets/Gambar 2.4.webp",
          thumb: "assets/Gambar 2.4.webp",
          title: "Gambar 19",
          category: "nature",
          description: "Panorama alam yang indah",
        },
        {
          src: "assets/Gambar 2.5.webp",
          thumb: "assets/Gambar 2.5.webp",
          title: "Gambar 20",
          category: "culture",
          description: "Warisan budaya yang berharga",
        },
        {
          src: "assets/Gambar 2.6.webp",
          thumb: "assets/Gambar 2.6.webp",
          title: "Gambar 21",
          category: "architecture",
          description: "Arsitektur klasik yang menawan",
        },
        {
          src: "assets/Gambar 2.7.webp",
          thumb: "assets/Gambar 2.7.webp",
          title: "Gambar 22",
          category: "nature",
          description: "Keindahan alam yang alami",
        },
        {
          src: "assets/Gambar 2.8.webp",
          thumb: "assets/Gambar 2.8.webp",
          title: "Gambar 23",
          category: "culture",
          description: "Tradisi budaya yang unik",
        },
        {
          src: "assets/Gambar 2.9.webp",
          thumb: "assets/Gambar 2.9.webp",
          title: "Gambar 24",
          category: "architecture",
          description: "Bangunan modern yang memukau",
        },
        {
          src: "assets/Gambar 2.10.webp",
          thumb: "assets/Gambar 2.10.webp",
          title: "Gambar 25",
          category: "nature",
          description: "Panorama alam yang menakjubkan",
        },
        {
          src: "assets/Gambar 2.11.webp",
          thumb: "assets/Gambar 2.11.webp",
          title: "Gambar 26",
          category: "culture",
          description: "Warisan budaya yang tak ternilai",
        },
      ];

      // Load gallery items with filtering
      function loadGallery(filter = "all") {
        const gallery = document.getElementById("gallery");
        gallery.innerHTML = ""; // Clear existing items

        galleryItems.forEach((item) => {
          if (filter === "all" || item.category === filter) {
            const div = document.createElement("div");
            div.className = "gallery-item animate__animated animate__fadeIn";
            div.innerHTML = `
              <a href="${item.src}" data-lg-size="1200-800" data-sub-html="<h4>${item.title}</h4><p>${item.description}</p>">
                <img src="${item.thumb}" alt="${item.title}" loading="lazy" />
                <div class="overlay">
                  <h4>${item.title}</h4>
                  <p>${item.description}</p>
                </div>
              </a>
            `;
            gallery.appendChild(div);
          }
        });

        // Initialize LightGallery
        if (typeof lightGallery === "function") {
          const lgInstance = lightGallery(gallery, {
            thumbnail: true,
            zoom: true,
            fullScreen: true,
            download: false,
            counter: true,
            animateThumb: true,
            zoomFromOrigin: true,
            allowMediaOverlap: true,
            toggleThumb: true,
          });
        }
      }

      // Filter functionality
      document.querySelectorAll(".filter-btn").forEach((btn) => {
        btn.addEventListener("click", (e) => {
          document
            .querySelectorAll(".filter-btn")
            .forEach((b) => b.classList.remove("active"));
          e.target.classList.add("active");
          loadGallery(e.target.dataset.filter);
        });
      });

      // Initialize everything when DOM is loaded
      document.addEventListener("DOMContentLoaded", () => {
        loadGallery();
      });
    </script>
  </body>
</html>
