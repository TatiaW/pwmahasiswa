<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "dbuniversitas";

$conn = new mysqli($servername, $username, $password,$database);

if ($conn->connect_error) {
  die("Gak Konek " . $conn->connect_error);
}

?>