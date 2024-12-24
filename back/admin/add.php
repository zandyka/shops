<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

require '../db.php'; // Pastikan db.php memiliki koneksi yang benar ke database

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Admin - Tambah Produk</title>
    <link rel="icon" type="image/x-icon" href="../iconred.png" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: linear-gradient(135deg, #f1f1f1, #e9ecef);
            font-family: 'Arial', sans-serif;
        }

        .container-fluid {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-weight: 700;
        }
    </style>
</head>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="index.php">Admin Page</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown">
                    <i class="fas fa-user fa-fw"></i>
                </a>
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
                    <h1 class="mt-4">Tambah Produk Baru</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> Dashboard</a></li>
                        <li class="breadcrumb-item active"><i class="fas fa-list"></i> Tambah Produk</li>
                    </ol>

                    <form id="addProductForm" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="productName" class="form-label">Nama Produk</label>
                            <input type="text" id="productName" name="productName" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Harga Produk</label>
                            <input type="number" id="productPrice" name="productPrice" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Deskripsi Produk</label>
                            <textarea id="productDescription" name="productDescription" class="form-control" rows="3"
                                required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="productImage" class="form-label">Gambar Produk</label>
                            <input type="file" id="productImage" name="productImage" class="form-control" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Tambah
                                Produk</button>
                            <a href="products.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>
                                Kembali</a>
                        </div>
                    </form>

                    <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $name = trim($_POST['productName']);
                        $price = trim($_POST['productPrice']);
                        $description = trim($_POST['productDescription']);

                        if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === UPLOAD_ERR_OK) {
                            $fileTmpPath = $_FILES['productImage']['tmp_name'];
                            $fileName = basename($_FILES['productImage']['name']);
                            $filePath = '../uploads/' . $fileName;

                            if (move_uploaded_file($fileTmpPath, $filePath)) {
                                $query = "INSERT INTO tb_products (name, price, description, image) VALUES (:name, :price, :description, :image)";
                                $stmt = $pdo->prepare($query);
                                try {
                                    $stmt->execute([
                                        ':name' => $name,
                                        ':price' => $price,
                                        ':description' => $description,
                                        ':image' => $fileName
                                    ]);
                                    echo '<div class="alert alert-success mt-3">Produk berhasil ditambahkan ke database!</div>';
                                } catch (PDOException $e) {
                                    echo '<div class="alert alert-danger mt-3">Error: ' . $e->getMessage() . '</div>';
                                }
                            } else {
                                echo '<div class="alert alert-danger mt-3">Gagal mengupload gambar produk.</div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger mt-3">Gambar produk wajib diupload.</div>';
                        }
                    }
                    ?>
                </div>
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="text-muted">&copy; MSI.co 2024</div>
                </div>
            </footer>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>