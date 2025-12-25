<?php
include 'koneksi.php';
$id = $_GET['id'];
$sql = "DELETE FROM tbukt WHERE id_ukt='$id'";

if ($conn->query($sql) === TRUE) {
    header("location: ukt.php");
} else {
    echo "Gagal menghapus: " . $conn->error;
}
?>