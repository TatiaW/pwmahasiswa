<?php
include 'koneksi.php';
$id = $_POST['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$sql = "UPDATE tbmahasiswa SET nim='$nim', nama='$nama', jk='$jk' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("location: mahasiswa.php");
} else {
    echo "Error updating record: " . $conn->error;
}
?>