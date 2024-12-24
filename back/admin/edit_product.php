<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: ../login.php');
    exit();
}

require '../db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil data produk
    $query = "SELECT * FROM tb_products WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $product = $stmt->fetch();

    // Cek apakah produk ditemukan
    if (!$product) {
        echo "<p>Product not found!</p>";
        exit();
    }
} else {
    echo "<p>Invalid product ID!</p>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target = '../uploads/' . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);

        $query = "UPDATE tb_products SET name = ?, description = ?, price = ?, image = ? WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name, $description, $price, $image, $id]);
    } else {
        $query = "UPDATE tb_products SET name = ?, description = ?, price = ? WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$name, $description, $price, $id]);
    }

    header('Location: products.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="icon" type="image/x-icon" href="../iconred.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background: linear-gradient(135deg, #f9f9f9, #ececec);
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
            padding: 30px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            text-align: center;
            color: #333;
            font-weight: 700;
            margin-bottom: 30px;
        }

        label {
            font-weight: 600;
            color: #555;
        }

        .btn-primary {
            background: #007bff;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background: #0056b3;
        }

        .btn-secondary {
            background: #6c757d;
            border: none;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 8px;
        }

        .input-group-text {
            background-color: #e9ecef;
            border: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Edit Product</h1>
        <form action="edit_product.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data"
            class="needs-validation" novalidate>
            <div class="mb-4">
                <label for="name" class="form-label">Product Name</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-tag"></i></span>
                    <input type="text" class="form-control" name="name" id="name"
                        value="<?php echo htmlspecialchars($product['name']); ?>" required>
                    <div class="invalid-feedback">Product name is required.</div>
                </div>
            </div>
            <div class="mb-4">
                <label for="description" class="form-label">Description</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                    <textarea name="description" class="form-control" id="description"
                        required><?php echo htmlspecialchars($product['description']); ?></textarea>
                    <div class="invalid-feedback">Description is required.</div>
                </div>
            </div>
            <div class="mb-4">
                <label for="price" class="form-label">Price</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
                    <input type="number" class="form-control" name="price" id="price"
                        value="<?php echo htmlspecialchars($product['price']); ?>" required step="0.01">
                    <div class="invalid-feedback">Price is required.</div>
                </div>
            </div>
            <div class="mb-4">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Update Product">
                <a href="products.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <script>
        (function () {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
        })();
    </script>
</body>

</html>