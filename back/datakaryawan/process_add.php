<?php
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ID = $_POST['ID'];
    $Nama = $_POST['Nama'];
    $Usia = $_POST['Usia'];
    // Ambil semua input lainnya

    $sql = "INSERT INTO karyawan (ID, Nama, Usia) VALUES ('$ID', '$Nama', '$Usia')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>