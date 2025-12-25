<?php
include 'koneksi.php';
$id = $_GET['id'];

// Hapus berdasarkan id_ukt, bukan id mahasiswa
$sql = "DELETE FROM tbukt WHERE id_ukt='$id'";

if ($conn->query($sql) === TRUE) {
    header("location: ukt.php");
} else {
    echo "Gagal menghapus: " . $conn->error;
}
?>