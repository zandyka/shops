<?php
include '../db.php';

// Ambil ID dari parameter URL
$id = $_GET['id'];

// Query untuk mendapatkan data karyawan berdasarkan ID
$sql = "SELECT * FROM karyawan WHERE ID = '$id'";
$result = $conn->query($sql);

// Periksa apakah data ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Data tidak ditemukan!";
    exit;
}
?>

<?php
include '../db.php';

// Ambil ID dari parameter URL
$id = $_GET['id'];

// Query untuk mendapatkan data karyawan berdasarkan ID
$sql = "SELECT * FROM karyawan WHERE ID = '$id'";
$result = $conn->query($sql);

// Periksa apakah data ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Data tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Karyawan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <h2>Edit Data Karyawan</h2>
        <form action="process_edit.php" method="POST">
            <!-- Input ID (readonly) -->
            <div class="mb-3">
                <label for="ID" class="form-label">ID</label>
                <input type="text" class="form-control" id="ID" name="ID" value="<?php echo $row['ID']; ?>" readonly>
            </div>
            <!-- Input Nama -->
            <div class="mb-3">
                <label for="Nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="Nama" name="Nama" value="<?php echo $row['Nama']; ?>"
                    required>
            </div>
            <!-- Input Usia -->
            <div class="mb-3">
                <label for="Usia" class="form-label">Usia</label>
                <input type="number" class="form-control" id="Usia" name="Usia" value="<?php echo $row['Usia']; ?>"
                    required>
            </div>
            <!-- Input Alamat -->
            <div class="mb-3">
                <label for="Alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="Alamat" name="Alamat" rows="2"
                    required><?php echo $row['Alamat']; ?></textarea>
            </div>
            <!-- Input Nomor Telepon -->
            <div class="mb-3">
                <label for="Nomor_Telepon" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="Nomor_Telepon" name="Nomor_Telepon"
                    value="<?php echo $row['Nomor Telepon']; ?>" required>
            </div>
            <!-- Input Jabatan -->
            <div class="mb-3">
                <label for="Jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="Jabatan" name="Jabatan"
                    value="<?php echo $row['Jabatan']; ?>" required>
            </div>
            <!-- Input Gaji -->
            <div class="mb-3">
                <label for="Gaji" class="form-label">Gaji</label>
                <input type="number" class="form-control" id="Gaji" name="Gaji" value="<?php echo $row['Gaji']; ?>"
                    required>
            </div>
            <!-- Input Tanggal Mulai -->
            <div class="mb-3">
                <label for="Tanggal_Mulai" class="form-label">Tanggal Mulai</label>
                <input type="date" class="form-control" id="Tanggal_Mulai" name="Tanggal_Mulai"
                    value="<?php echo $row['Tanggal Mulai']; ?>" required>
            </div>
            <!-- Input Departemen -->
            <div class="mb-3">
                <label for="Departemen" class="form-label">Departemen</label>
                <input type="text" class="form-control" id="Departemen" name="Departemen"
                    value="<?php echo $row['Departemen']; ?>" required>
            </div>
            <!-- Input Status Pernikahan -->
            <div class="mb-3">
                <label for="Status_Pernikahan" class="form-label">Status Pernikahan</label>
                <select class="form-select" id="Status_Pernikahan" name="Status_Pernikahan" required>
                    <option value="Lajang" <?php echo ($row['Status Pernikahan'] == 'Lajang') ? 'selected' : ''; ?>>Lajang
                    </option>
                    <option value="Menikah" <?php echo ($row['Status Pernikahan'] == 'Menikah') ? 'selected' : ''; ?>>
                        Menikah</option>
                </select>
            </div>
            <!-- Input Email -->
            <div class="mb-3">
                <label for="Email" class="form-label">Email</label>
                <input type="email" class="form-control" id="Email" name="Email" value="<?php echo $row['Email']; ?>"
                    required>
            </div>
            <!-- Input Atribut Khusus -->
            <div class="mb-3">
                <label for="Atribut_Khusus" class="form-label">Atribut Khusus</label>
                <textarea class="form-control" id="Atribut_Khusus" name="Atribut_Khusus" rows="2"
                    required><?php echo $row['Atribut Khusus']; ?></textarea>
            </div>
            <!-- Tombol Simpan dan Kembali -->
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