<?php
// Sertakan file konfigurasi database
include '../db.php';

// Query untuk mengambil data karyawan
$sql = "SELECT * FROM karyawan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karyawan</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container my-4">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center my-3">
            <h2>Daftar Karyawan Msi.co</h2>
            <div class="d-flex justify-content-end">
                <a href="http://localhost/phpmyadmin/index.php?route=/sql&pos=0&db=db_sbd&table=karyawan"
                    class="btn btn-info me-2" target="_blank">Lihat Database</a>
                <a href="add.php" class="btn btn-primary me-2">Tambah Data</a>
                <a href="../admin/tables.php" class="btn btn-secondary">Kembali</a>
            </div>
        </div> <!-- Tabel -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover mt-4">
                <h> wdwdawdwdawdawd
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Usia</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Jabatan</th>
                        <th>Gaji</th>
                        <th>Tanggal Mulai</th>
                        <th>Departemen</th>
                        <th>Status Pernikahan</th>
                        <th>Email</th>
                        <th>Atribut Khusus</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../db.php';
                    $sql = "SELECT * FROM karyawan";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['ID'] . "</td>";
                            echo "<td>" . $row['Nama'] . "</td>";
                            echo "<td>" . $row['Usia'] . "</td>";
                            echo "<td>" . $row['Alamat'] . "</td>";
                            echo "<td>" . $row['Nomor Telepon'] . "</td>";
                            echo "<td>" . $row['Jabatan'] . "</td>";
                            echo "<td>" . number_format($row['Gaji'], 0, ',', '.') . "</td>";
                            echo "<td>" . $row['Tanggal Mulai'] . "</td>";
                            echo "<td>" . $row['Departemen'] . "</td>";
                            echo "<td>" . $row['Status Pernikahan'] . "</td>";
                            echo "<td>" . $row['Email'] . "</td>";
                            echo "<td>" . $row['Atribut Khusus'] . "</td>";
                            echo "<td>
                                    <a href='edit.php?id=" . $row['ID'] . "' class='btn btn-sm btn-warning'>Edit</a>
                                    <a href='delete.php?id=" . $row['ID'] . "' class='btn btn-sm btn-danger'>Hapus</a>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='13'>Tidak ada data karyawan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- Inisialisasi DataTables -->
    <script>
        $(document).ready(function () {
            $('table').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/id.json" // Bahasa Indonesia
                },
                "paging": true,
                "searching": true,
                "ordering": true
            });
        });
    </script>
</body>

</html>