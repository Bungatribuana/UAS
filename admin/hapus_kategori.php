<?php
session_start();
include 'conf.php';

if (isset($_GET['kodekategori'])) {
    $kodekategori = $_GET['kodekategori'];

    // Prevent SQL Injection
    $kodekategori = mysqli_real_escape_string($conn, $kodekategori);

    // Check if there are dependent records
    $checkQuery = "SELECT COUNT(*) as count FROM tb_buku WHERE kodekategori='$kodekategori'";
    $checkResult = mysqli_query($conn, $checkQuery);
    $checkData = mysqli_fetch_assoc($checkResult);

    if ($checkData['count'] > 0) {
        echo "<script>alert('Cannot delete category as there are dependent records in tb_buku.');</script>";
        echo "<script>window.location.href='tb_kategori.php';</script>";
        exit();
    }

    // Delete the category
    $query = "DELETE FROM tb_kategori WHERE kodekategori='$kodekategori'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "<script>alert('Category deleted successfully.');</script>";
        echo "<script>window.location.href='tb_kategori.php';</script>";
    } else {
        echo "Failed to delete category: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('Category code not provided.');</script>";
    echo "<script>window.location.href='tb_kategori.php';</script>";
}
?>
