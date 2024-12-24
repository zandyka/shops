<?php
require '../db.php';
$response = ['success' => false, 'message' => 'Terjadi kesalahan'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['productName']);
    $price = trim($_POST['productPrice']);
    $description = trim($_POST['productDescription']);

    // Validasi input
    if (empty($name) || empty($price) || empty($description)) {
        $response['message'] = 'Semua bidang wajib diisi';
    } else if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['productImage']['tmp_name'];
        $fileName = basename($_FILES['productImage']['name']);
        $filePath = '../uploads/' . $fileName;

        // Pindahkan file dan simpan ke database
        if (move_uploaded_file($fileTmpPath, $filePath)) {
            $query = "INSERT INTO tb_products (name, price, description, image) VALUES (:name, :price, :description, :image)";
            $stmt = $pdo->prepare($query);
            if ($stmt->execute([':name' => $name, ':price' => $price, ':description' => $description, ':image' => $fileName])) {
                $response['success'] = true;
                $response['message'] = 'Produk berhasil ditambahkan';
            } else {
                $response['message'] = 'Gagal menyimpan data produk';
            }
        } else {
            $response['message'] = 'Gagal mengupload gambar produk';
        }
    } else {
        $response['message'] = 'Gambar produk wajib diupload';
    }
}

header('Content-Type: application/json');
echo json_encode($response);
?>
