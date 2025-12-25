<?php
include 'koneksi.php';

$id_mhs = $_POST['id_mhs'];
$semester = $_POST['semester'];
$biaya = $_POST['biaya'];
$tgl = $_POST['tanggal_bayar'];
$status = $_POST['status'];

$sql = "INSERT INTO tbukt (id_mhs, semester, biaya, tanggal_bayar, status) 
        VALUES ('$id_mhs', '$semester', '$biaya', '$tgl', '$status')";

if ($conn->query($sql) === TRUE) {
    header("location: ukt.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>