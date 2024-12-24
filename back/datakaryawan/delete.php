<?php
include '../db.php';

$id = $_GET['id'];
$sql = "DELETE FROM karyawan WHERE ID='$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
?>