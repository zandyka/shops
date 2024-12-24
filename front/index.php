<?php
require '\coding\xampp\htdocs\tokoonline\back\db.php'; // Menghubungkan ke database

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
  <title>MSI.co</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/iconnew.png" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/logos.css" rel="stylesheet" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Karantina:wght@300;400;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    .card {
      border: none;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .card:hover {
      transform: scale(1.02);
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .card-img-top {
      height: 200px;
      object-fit: cover;
    }

    .description-short {
      color: #555;
      cursor: pointer;
    }

    .description-short:hover::after {
      content: attr(title);
      position: absolute;
      background: #fff;
      border: 1px solid #ddd;
      padding: 10px;
      max-width: 300px;
      z-index: 10;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .btnkece {
      display: flex;
      /* Menggunakan Flexbox */
      justify-content: center;
      /* Memusatkan secara horizontal */
      align-items: center;
      /* Memusatkan secara vertikal */
    }

    .btnkece button {
      position: relative;
      border: none;
      color: white;
      background: #222;
      padding: 0.5em 0.5em;
      /* Menggunakan unit em untuk ukuran responsif */
      font-size: 1.5rem;
      /* Font responsif */
      font-weight: 700;
      cursor: pointer;
      text-transform: uppercase;
      outline: none;
      box-shadow: 0 5px 15px rgba(0, 0, 0, .2);
      overflow: hidden;
    }

    button:hover {
      box-shadow: 0 5px 15px rgba(0, 0, 0, .2);
    }

    .btnkece button:after {
      position: absolute;
      content: '';
      left: 0;
      top: 0;
      width: 150%;
      height: 580%;
      transition: all 0.5s ease-in-out;
      background: #5581F1;
      transform: translate(-98%, -25%) rotate(45deg);
    }

    .btnkece:hover button:after {
      transform: translate(-9%, -25%) rotate(45deg);
    }

    button span {
      position: relative;
      z-index: 1;
    }
  </style>
</head>

<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0">

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
    <header class="bg-dark py-3">
      <div class="container px-3">
        <div class="row gx-5 align-items-center justify-content-center">
          <div class="col-lg-8 col-xl-7 col-xxl-6">
            <div class="my-5 text-center text-xl-start">
              <h1 class="display-5 fw-bolder text-white mb-2">
                Where Every Wish Finds Its Treasure
              </h1>
              <p class="lead fw-normal text-white-50 mb-4">
                Di MSI.CO, kami memahami pentingnya teknologi dalam kehidupan sehari-hari. Sebagai toko online yang
                terpercaya, kami berkomitmen untuk menyediakan berbagai produk berkualitas tinggi seperti laptop,
                komputer, dan aksesoris teknologi lainnya yang dirancang untuk memenuhi kebutuhan pribadi dan
                profesional Anda.
              </p>
              <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                <a class="btn btn-outline-light btn-lg px-4" href="about.html">Learn More</a>
              </div>
            </div>
          </div>
          <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
            <div class="banner">
              <div class="product">
                <div class="soda" style="--url: url(logot/ungu.png)"></div>
                <div class="soda" style="--url: url(logot/merah.png)"></div>
              </div>
              <div class="rock">
                <img src="css/logot/rock1.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Features section-->
    <section class="py-5" id="features">
      <div class="container px-5 my-5">
        <div class="row gx-5">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <h2 class="fw-bolder mb-0">Visi & Misi</h2>
          </div>
          <div class="col-lg-8">
            <div class="row gx-5 row-cols-1 row-cols-md-2">
              <div class="col mb-5 h-100">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
                  <i class="bi bi-building"></i>
                </div>
                <h2 class="h5">Visi</h2>
                <p class="mb-0">
                  Menjadi toko online terkemuka yang menyediakan solusi teknologi terbaik dan terpercaya, serta menjadi
                  pilihan utama bagi pelanggan dalam memenuhi kebutuhan perangkat teknologi berkualitas tinggi.
                </p>
              </div>

              <div class="col mb-5 mb-md-0 h-100">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
                  <i class="bi bi-toggles2"></i>
                </div>
                <h2 class="h5">Misi</h2>
                <p class="mb-0">
                  1. Menyediakan produk teknologi yang inovatif dan berkualitas tinggi dari merek-merek ternama, guna
                  memenuhi kebutuhan pribadi dan profesional pelanggan.<br />
                  2. Memberikan pelayanan pelanggan yang unggul dengan memastikan kepuasan pelanggan melalui pengalaman
                  belanja yang mudah, aman, dan cepat.
                </p>
              </div>


            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Testimonial section-->
    <div class="py-5 bg-light">
      <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
          <div class="col-lg-10 col-xl-7">
            <div class="text-center">
              <div class="fs-4 mb-4 fst-italic">
                "MSI.co is the best ngl"
              </div>
              <div class="d-flex align-items-center justify-content-center">
                <img class="rounded-circle me-3" src="assets/aripah.png" alt="..." />
                <div class="fw-bold">
                  Aripah The Cat
                  <span class="fw-bold text-primary mx-1">/</span>
                  CEO, Pomodoro
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Blog preview section-->
    <section class="py-5">
      <div class="container px-5 my-5">
        <div class="row gx-8 justify-content-center">
          <div class="col-lg-50 col-xl-99">
            <div class="text-center">
              <h2 class="fw-bolder">About us</h2>
              <p class="lead fw-normal text-muted mb-5">
                MSI.CO didirikan pada tahun 2021 dengan tujuan menyediakan solusi teknologi terbaik bagi pelanggan.
                Sebagai toko online terkemuka, kami menawarkan berbagai produk berkualitas seperti laptop, komputer, dan
                aksesoris dari merek ternama. Kami berkomitmen untuk memberikan layanan pelanggan yang unggul dan terus
                berinovasi untuk memenuhi kebutuhan teknologi Anda.
              </p>
            </div>
          </div>
        </div>

        <div class="row gx-5">
          <div class="col-lg-4 mb-5">
            <div class="card h-100 shadow border-0">
              <img class="card-img-top" src="assets/1.png" alt="..." />
              <div class="card-body p-4">
                <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                  review
                </div>
                <a class="text-decoration-none link-dark stretched-link" href="#!">
                  <h5 class="card-title mb-3">Amazing!!</h5>
                </a>
                <p class="card-text mb-0">
                  "Luar biasa! MSI.co benar-benar menyediakan produk teknologi berkualitas. Saya membeli laptop gaming
                  dan sangat puas dengan performanya. Proses pembelian juga sangat mudah, dan barang tiba lebih cepat
                  dari yang saya kira. Layanan pelanggannya sangat responsif, dan saya pasti akan berbelanja di sini
                  lagi!"
                </p>
              </div>
              <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                <div class="d-flex align-items-end justify-content-between">
                  <div class="d-flex align-items-center">
                    <img class="rounded-circle me-3" src="assets/kimber.png" alt="..." />
                    <div class="small">
                      <div class="fw-bold">Kelly Rowan</div>
                      <div class="text-muted">
                        March 12, 2023 &middot; 6 min read
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-5">
            <div class="card h-100 shadow border-0">
              <img class="card-img-top" src="assets/belan.png" alt="..." />
              <div class="card-body p-4">
                <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                  what they said about us
                </div>
                <a class="text-decoration-none link-dark stretched-link" href="#!">
                  <h5 class="card-title mb-3">Very Pleasant</h5>
                </a>
                <p class="card-text mb-0">
                  "Saya sangat terkesan dengan website MSI.co! Navigasinya mudah, tampilannya modern, dan informasinya
                  lengkap. Saya berhasil menemukan laptop impian saya dengan cepat. Tidak sabar untuk melihat produk
                  baru lainnya!"
                </p>
              </div>
              <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                <div class="d-flex align-items-end justify-content-between">
                  <div class="d-flex align-items-center">
                    <img class="rounded-circle me-3" src="assets/josiah.png" alt="..." />
                    <div class="small">
                      <div class="fw-bold">Josiah Barclay</div>
                      <div class="text-muted">
                        March 23, 2023 &middot; 4 min read
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-5">
            <div class="card h-100 shadow border-0">
              <img class="card-img-top" src="assets/kakek.png" alt="..." />
              <div class="card-body p-4">
                <div class="badge bg-primary bg-gradient rounded-pill mb-2">
                  review
                </div>
                <a class="text-decoration-none link-dark stretched-link" href="#!">
                  <h5 class="card-title mb-3">
                    Recommended
                  </h5>
                </a>
                <p class="card-text mb-0">
                  "Luar biasa! Website MSI.co memberikan pengalaman belanja online yang profesional dan terpercaya.
                  Informasi tentang perusahaan juga menambah keyakinan saya untuk membeli perangkat elektronik dari
                  sini. Highly recommended!"
                </p>
              </div>
              <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                <div class="d-flex align-items-end justify-content-between">
                  <div class="d-flex align-items-center">
                    <img class="rounded-circle me-3" src="assets/evelyn.png" alt="..." />
                    <div class="small">
                      <div class="fw-bold">Evelyn Martinez</div>
                      <div class="text-muted">
                        April 2, 2023 &middot; 10 min read
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <section class="page-section" id="products">
          <div class="container">
            <h2 class="text-center mt-0">Produk Kami</h2>
            <hr class="divider" />
            <div class="row">
              <?php
              // Membatasi jumlah produk yang ditampilkan
              $stmt = $pdo->prepare("SELECT * FROM tb_products LIMIT 3");
              $stmt->execute();

              // Menampilkan produk
              while ($product = $stmt->fetch()) {
                echo '<div class="col-12 col-md-6 col-lg-4 mb-4">';
                echo '<div class="card h-100">';
                echo '<div class="card-img-container">';
                echo '<img src="/tokoonline/back/uploads/' . htmlspecialchars($product['image']) . '" class="card-img-top" alt="' . htmlspecialchars($product['name']) . '">';
                echo '</div>';
                echo '<div class="card-body d-flex flex-column justify-content-between">';
                echo '<div>';
                echo '<h5 class="card-title">' . htmlspecialchars($product['name']) . '</h5>';
                echo '<p class="card-text">Rp' . number_format($product['price'], 2, ',', '.') . '</p>';
                echo '<p class="card-text description-short data-bs-toggle="popover" data-bs-content="" title="' . htmlspecialchars($product['description']) . '">' . substr(htmlspecialchars($product['description']), 0, 50) . '...</p>';
                echo '</div>';
                echo '<a href="https://wa.me/089612990205" class="btn btn-success d-flex align-items-center justify-content-center mt-2" target="_blank">';
                echo '<i class="bi bi-whatsapp me-2"></i> Beli Sekarang';
                echo '</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }
              ?>
            </div>
            <div class="text-center mt-4">
              <div class="btnkece">
                <button onclick="window.location.href='products.php';"><span>Checkout our products!</span></button>
              </div>
            </div>
          </div>
        </section>

      </div>
    </section>
  </main>

  <!-- Footer-->
  <footer class="bg-dark py-4 mt-auto">
    <div class="container px-5">
      <div class="row align-items-center justify-content-between flex-column flex-sm-row">
        <div class="col-auto">
          <div class="small m-0 text-white">
            Copyright &copy; Msi.co 2024
          </div>
        </div>
        <div class="col-auto">
          <a class="link-light small" href="#!">Privacy</a>
          <span class="text-white mx-1">&middot;</span>
          <a class="link-light small" href="#!">Terms</a>
          <span class="text-white mx-1">&middot;</span>
          <a class="link-light small"
            href="https://wa.me/6281234567890?text=Halo,%20saya%20ingin%20mengetahui%20lebih%20lanjut%20tentang%20produk%20Anda.">Contact</a>
        </div>
      </div>
    </div>
  </footer>
  <!-- Bootstrap JS Bundle (termasuk Popper.js) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Core theme JS-->
  <script src="js/scripts.js"></script>
</body>

</html>