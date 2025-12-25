<?php
include 'koneksi.php';

// Tangkap data dari form
$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];

// Query update data
$sql = "UPDATE tbmahasiswa SET nim='$nim', nama='$nama', jk='$jk' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    // Jika berhasil, kembali ke halaman utama
    header("location: index.php");
} else {
    // Jika gagal, tampilkan error
    echo "Error updating record: " . $conn->error;
}
?>