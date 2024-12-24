<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

// Koneksi ke database
require '../db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin - List Produk</title>
    <link rel="icon" type="image/x-icon" href="../iconred.png" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        .product-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .popover-form {
            top: 20%;
            left: 50%;
            transform: translate(-50%, -20%);
            width: 400px;
            z-index: 1050;
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">Admin Page</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../../front/index.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link" href="products.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-bag"></i></div>
                            Products
                        </a>
                        <a class="nav-link" href="tables.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Karyawan
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Administrator
                </div>
            </nav>
        </div> <!-- Main Content -->
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">List Produk</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">List Produk</li>
                    </ol>

                    <!-- Daftar Produk -->
                    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                        <?php
                        // Query untuk mengambil data produk dari database
                        $query = "SELECT * FROM tb_products";
                        $stmt = $pdo->query($query);
                        while ($product = $stmt->fetch()) {
                            echo '
                            <div class="col-md-4 mb-4">
                                <div class="card h-100">
                                    <img src="../uploads/' . htmlspecialchars($product['image']) . '" class="product-image card-img-top" alt="' . htmlspecialchars($product['name']) . '">
                                    <div class="card-body text-center">
                                        <h5 class="fw-bolder">' . htmlspecialchars($product['name']) . '</h5>
                                        <p class="text-muted">Rp ' . number_format($product['price'], 2, ',', '.') . '</p>
                                        <p class="text-muted">' . substr(htmlspecialchars($product['description']), 0, 50) . '...</p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <!-- Tombol Lihat Detail -->
                                        <button type="button" class="btn btn-info btn-sm" 
                                            data-bs-toggle="popover" 
                                            title="Deskripsi Lengkap" 
                                            data-bs-content="' . htmlspecialchars($product['description']) . '">Lihat Detail
                                        </button>
                                        <!-- Tombol Edit -->
                                        <a href="edit_product.php?id=' . $product['id'] . '" class="btn btn-warning btn-sm" onclick="return confirm(\'Anda ingin mengedit produk ini?\')">Edit</a>
                                        <!-- Tombol Hapus -->
                                        <a href="delete_product.php?id=' . $product['id'] . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus produk ini?\')">Hapus</a>
                                    </div>
                                </div>
                            </div>';
                        }
                        ?>
                    </div>

                    <!-- Tombol Tambah Produk -->
                    <div class="d-flex justify-content-center my-4">
                        <a href="add.php" class="btn btn-primary">Tambah Produk</a>
                    </div>
                </div>

            </main>
            <!-- Footer -->
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex justify-content-between small">
                        <div class="text-muted">&copy; MSI.co 2024</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script>
        document.getElementById('addProductBtn').addEventListener('click', function () {
            window.location.href = 'add.php';
        });
    </script>
</body>

</html>