<?php
include 'koneksi.php';
$id = $_GET['id'];
$sql = "DELETE FROM tbmahasiswa WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    header("location: index.php");
} else {
    echo "Gagal menghapus: " . $conn->error;
}
?>