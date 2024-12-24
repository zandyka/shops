<?php
require '..\back\db.php'; // Menghubungkan ke database

// Mengambil semua produk dari database
$query = "SELECT * FROM tb_products";
$stmt = $pdo->query($query);
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Shop Homepage - Start Bootstrap Template</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/iconnew.png" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Karantina:wght@300;400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

    .btnglow {
      padding: 15px 40px;
      border: none;
      outline: none;
      font-family: Poppins;
      color: #fff;
      cursor: pointer;
      position: relative;
      z-index: 0;
      border-radius: 12px;
    }

    .button-container {
      display: grid;
      place-items: center;
      /* Menempatkan di tengah horizontal & vertical */
      height: 50px;
      /* Atur tinggi sesuai kebutuhan */
    }

    .btnglow::after {
      content: "";
      z-index: -1;
      position: absolute;
      width: 100%;
      height: 100%;
      background-color: #333;
      left: 0;
      top: 0;
      border-radius: 10px;
    }

    .btnglow::before {
      content: "";
      background: linear-gradient(45deg,
          #FF0000, #FF7300, #FFFB00, #48FF00,
          #00FFD5, #002BFF, #FF00C8, #FF0000);
      position: absolute;
      top: -2px;
      left: -2px;
      background-size: 600%;
      z-index: -1;
      width: calc(100% + 4px);
      height: calc(100% + 4px);
      filter: blur(8px);
      animation: glowing 20s linear infinite;
      transition: opacity .3s ease-in-out;
      border-radius: 10px;
      opacity: 0;
    }

    @keyframes glowing {
      0% {
        background-position: 0 0;
      }

      50% {
        background-position: 400% 0;
      }

      100% {
        background-position: 0 0;
      }
    }

    /* hover */
    .btnglow:hover::before {
      opacity: 1;
    }

    .btnglow:active:after {
      background: transparent;
    }

    .btnglow:active {
      color: #000;
      font-weight: bold;
    }
  </style>

</head>

<body>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container px-5">
      <img src="assets/logonw.png" style="width: 50px" alt="Toko Online Logo" class="navbar-logo me-2" />
      <a class="navbar-brand" href="index.php">MSI.co</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="galery.html">Galery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.php">Products</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">Contact</a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
              <li>
                <a class="dropdown-item"
                  href="https://wa.me/6282370741432?text=Halo,%20saya%20ingin%20mengetahui%20lebih%20lanjut%20tentang%20produk%20Anda.">What'sApp</a>
              </li>
              <li>
                <a class="dropdown-item" href="https://www.instagram.com/zandyka._/">Instagram</a>
              </li>
            </ul>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="\tokoonline\back\login.php">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Header-->
  <header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
        <h1 class="display-4 fw-bolder">Shop in style</h1>
        <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
      </div>
    </div>
  </header>

  <!-- Section-->
  <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
      <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php
        // Membatasi jumlah produk yang ditampilkan
        $query = "SELECT * FROM tb_products";
        $stmt->execute();

        // Menampilkan produk
        while ($product = $stmt->fetch()) {
          echo '<div class="col mb-5">';
          echo '<div class="card h-100">';

          // Badge "Sale" (Opsional, bisa dihapus jika tidak diperlukan)
          echo '<div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>';

          // Gambar produk dengan ukuran yang sama
          echo '<img src="/tokoonline/back/uploads/' . htmlspecialchars($product['image']) . '" class="card-img-top" alt="' . htmlspecialchars($product['name']) . '" style="height: 200px; object-fit: cover;">';

          echo '<div class="card-body p-4">';
          echo '<div class="text-center">';

          // Nama produk
          echo '<h5 class="fw-bolder">' . htmlspecialchars($product['name']) . '</h5>';

          // Harga produk (hanya harga asli)
          echo '<p class="card-text">Rp' . number_format($product['price'], 2, ',', '.') . '</p>';

          // Deskripsi produk (menampilkan 3 kata pertama)
          $description_short = implode(' ', array_slice(explode(' ', $product['description']), 0, 3)) . '...';
          echo '<p class="card-text description-short" title="' . htmlspecialchars($product['description']) . '">' . $description_short . '</p>';

          echo '</div>';
          echo '</div>';

          // Tombol "Add to cart" dengan popover
          echo '<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">';
          echo '<div class="text-center">';
          echo '<a class="btn btn-outline-dark mt-auto" href="#" data-bs-toggle="popover" data-bs-content="' . htmlspecialchars($product['description']) . '">Lihat Detail</a>';
          echo '</div>';
          echo '</div>';

          echo '</div>';
          echo '</div>';
        }
        ?>
      </div>
      <div class="button-container">
        <button class="btnglow " onclick="window.location.href='../back/login.php';"><span>Add Your
            Product!</span></button>
      </div>
  </section>


  <!-- Footer-->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p>
    </div>
  </footer>
  <!-- Bootstrap core JS-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
  <script>
    // Menginisialisasi semua popovers
    document.addEventListener('DOMContentLoaded', function () {
      var popoverTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="popover"]'));
      popoverTriggerList.forEach(function (popoverTriggerEl) {
        new bootstrap.Popover(popoverTriggerEl);
      });
    });
  </script>

</body>

</html>