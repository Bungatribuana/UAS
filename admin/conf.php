<?php
$servername = "localhost";
$username = "root"; // replace with your username
$password = ""; // replace with your password
$database = "perpustakaan_kampus"; // replace with your database name

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
