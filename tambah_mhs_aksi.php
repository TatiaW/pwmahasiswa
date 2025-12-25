<?php
include 'koneksi.php';

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];

$sql = "INSERT INTO tbmahasiswa (nim, nama, jk) VALUES ('$nim', '$nama', '$jk')";

if ($conn->query($sql) === TRUE) {
    header("location: index.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>