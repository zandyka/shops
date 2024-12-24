<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        // Proses Login
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM tb_users WHERE username = ? AND password = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username, $password]);

        if ($stmt->rowCount() > 0) {
            $_SESSION['admin'] = $username;
            header('Location: admin/index.php');
        } else {
            $error = 'Login gagal. Username atau password salah.';
        }
    } elseif (isset($_POST['signup'])) {
        // Proses Sign Up
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "INSERT INTO tb_users (username, password) VALUES (?, ?)";
        $stmt = $pdo->prepare($query);

        try {
            $stmt->execute([$username, $password]);
            $success = 'Pendaftaran berhasil. Silakan login.';
        } catch (Exception $e) {
            $error = 'Pendaftaran gagal. Username mungkin sudah terdaftar.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Sign Up</title>
    <link rel="icon" type="image/x-icon" href="iconred.png" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #CDCDCD;
            background-image:
                repeating-linear-gradient(to right, transparent 0 150px, #0001 150px 151px),
                repeating-linear-gradient(to bottom, transparent 0 150px, #0001 150px 151px),
                linear-gradient(to right, #CDCDCDcc, #CDCDCDcc),
                url(../front/css/logot/bg.jpg);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #333;
            max-width: 400px;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }

        .form-label {
            color: #ccc;
        }

        .btn-primary {
            background-color: #1db954;
            /* Spotify green */
            border: none;
        }

        .btn-primary:hover {
            background-color: #17a447;
        }

        .btn-secondary {
            background-color: #555;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #444;
        }

        .nav-tabs .nav-link.active {
            background-color: #1db954;
            color: #fff;
        }

        .nav-tabs .nav-link {
            color: #aaa;
        }
    </style>
</head>

<body>
    <div class="container">
        <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="signin-tab" data-bs-toggle="tab" data-bs-target="#signin"
                    type="button" role="tab" aria-controls="signin" aria-selected="true">Sign In</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signup" type="button"
                    role="tab" aria-controls="signup" aria-selected="false">Sign Up</button>
            </li>
        </ul>

        <div class="tab-content">
            <!-- Sign In Form -->
            <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                <h2 class="text-center mb-4">Login Admin</h2>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" class="needs-validation" novalidate>
                    <!-- Username -->
                    <div class="mb-3">
                        <label for="inputUsername" class="form-label fw-bold">Username</label>
                        <input type="text" class="form-control" id="inputUsername" name="username" required>
                        <div class="invalid-feedback">Harus diisi</div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="inputPassword" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control" id="inputPassword" name="password" required>
                        <div class="invalid-feedback">Harus diisi</div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="showPassword">
                            <label class="form-check-label" for="showPassword">Tampilkan Password</label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-3 text-center">
                        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                    </div>

                    <!-- Back to Home -->
                    <div class="text-center">
                        <a href="../front/index.php" class="btn btn-secondary w-100">Back to Home</a>
                    </div>

                </form>
            </div>

            <!-- Sign Up Form -->
            <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                <h2 class="text-center mb-4">Buat Akun</h2>

                <?php if (isset($success)): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success; ?>
                    </div>
                <?php elseif (isset($error)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" class="needs-validation" novalidate>
                    <!-- Username -->
                    <div class="mb-3">
                        <label for="signupUsername" class="form-label fw-bold">Username</label>
                        <input type="text" class="form-control" id="signupUsername" name="username" required>
                        <div class="invalid-feedback">Harus diisi</div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="signupPassword" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="password" required>
                        <div class="invalid-feedback">Harus diisi</div>
                    </div>

                    <!-- Show Password Option -->
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" id="showPasswordSignUp">
                        <label class="form-check-label" for="showPasswordSignUp">Tampilkan Password</label>
                    </div>

                    <!-- Submit Button -->
                    <div class="mb-3 text-center">
                        <button type="submit" name="signup" class="btn btn-primary w-100">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Validasi HTML5 untuk memastikan form terisi
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

        // Tampilkan/hide password di Sign In
        document.getElementById('showPassword').addEventListener('change', function () {
            var passwordField = document.getElementById('inputPassword');
            if (this.checked) {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });

        // Tampilkan/hide password di Sign Up
        document.getElementById('showPasswordSignUp').addEventListener('change', function () {
            var passwordField = document.getElementById('signupPassword');
            if (this.checked) {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>
</body>

</html>