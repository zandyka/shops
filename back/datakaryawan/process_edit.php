<?php
include '../db.php';

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $ID = $_POST['ID'];
    $Nama = $_POST['Nama'];
    $Usia = $_POST['Usia'];
    $Alamat = $_POST['Alamat'];
    $Nomor_Telepon = $_POST['Nomor_Telepon'];
    $Jabatan = $_POST['Jabatan'];
    $Gaji = $_POST['Gaji'];
    $Tanggal_Mulai = $_POST['Tanggal_Mulai'];
    $Departemen = $_POST['Departemen'];
    $Status_Pernikahan = $_POST['Status_Pernikahan'];
    $Email = $_POST['Email'];
    $Atribut_Khusus = $_POST['Atribut_Khusus'];

    // Query untuk update data
    $sql = "UPDATE karyawan 
            SET 
                Nama = '$Nama', 
                Usia = $Usia, 
                Alamat = '$Alamat', 
                `Nomor Telepon` = '$Nomor_Telepon', 
                Jabatan = '$Jabatan', 
                Gaji = $Gaji, 
                `Tanggal Mulai` = '$Tanggal_Mulai', 
                Departemen = '$Departemen', 
                `Status Pernikahan` = '$Status_Pernikahan', 
                Email = '$Email', 
                `Atribut Khusus` = '$Atribut_Khusus'
            WHERE ID = '$ID'";

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>