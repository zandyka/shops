<?php
// Include konfigurasi database
include '../db.php';

// Cek jika form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    $alamat = $_POST['alamat'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $jabatan = $_POST['jabatan'];
    $gaji = $_POST['gaji'];
    $tanggal_mulai = $_POST['tanggal_mulai'];
    $departemen = $_POST['departemen'];
    $status_pernikahan = $_POST['status_pernikahan'];
    $email = $_POST['email'];
    $atribut_khusus = $_POST['atribut_khusus'];

    // Query untuk memasukkan data
    $sql = "INSERT INTO karyawan (ID, Nama, Usia, Alamat, `Nomor Telepon`, Jabatan, Gaji, `Tanggal Mulai`, Departemen, `Status Pernikahan`, Email, `Atribut Khusus`)
            VALUES ('$id', '$nama', '$usia', '$alamat', '$nomor_telepon', '$jabatan', '$gaji', '$tanggal_mulai', '$departemen', '$status_pernikahan', '$email', '$atribut_khusus')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Karyawan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #74ebd5, #acb6e5);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .form-card {
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .form-card h2 {
            font-size: 1.8rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #333;
            text-align: center;
        }

        .form-label {
            font-weight: 600;
            color: #555;
        }

        .form-control {
            border-radius: 8px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
            border-color: #4a90e2;
        }

        .btn-primary,
        .btn-secondary {
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #4a90e2;
            border-color: #4a90e2;
        }

        .btn-secondary:hover {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="form-card">
        <h2>Tambah Data Karyawan</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                    <input type="text" class="form-control" id="id" name="id" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="usia" class="form-label">Usia</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    <input type="number" class="form-control" id="usia" name="usia" min="22" max="60" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="nomor_telepon" class="form-label">Nomor Telepon</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                    <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="jabatan" class="form-label">Jabatan</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                    <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="gaji" class="form-label">Gaji</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                    <input type="number" class="form-control" id="gaji" name="gaji" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-calendar-check"></i></span>
                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="departemen" class="form-label">Departemen</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-building"></i></span>
                    <input type="text" class="form-control" id="departemen" name="departemen" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="status_pernikahan" class="form-label">Status Pernikahan</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-ring"></i></span>
                    <select class="form-select" id="status_pernikahan" name="status_pernikahan" required>
                        <option value="Lajang">Lajang</option>
                        <option value="Menikah">Menikah</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="atribut_khusus" class="form-label">Atribut Khusus</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-tags"></i></span>
                    <input type="text" class="form-control" id="atribut_khusus" name="atribut_khusus">
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>