<?php
include 'koneksi.php';

$id_ukt = $_POST['id_ukt'];
$id_mhs = $_POST['id_mhs'];
$semester = $_POST['semester'];
$biaya = $_POST['biaya'];
$tgl = $_POST['tanggal_bayar'];
$status = $_POST['status'];

$sql = "UPDATE tbukt SET 
        id_mhs = '$id_mhs',
        semester = '$semester',
        biaya = '$biaya',
        tanggal_bayar = '$tgl',
        status = '$status'
        WHERE id_ukt = '$id_ukt'";

if ($conn->query($sql) === TRUE) {
    header("location: ukt.php");
} else {
    echo "Error updating record: " . $conn->error;
}
?>