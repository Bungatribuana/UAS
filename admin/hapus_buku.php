<?php
session_start();
include 'conf.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kodebuku'])) {
    $kodebuku = $_GET['kodebuku'];

    // Delete dependent records first
    $delete_details_query = "DELETE FROM tb_detiltransaksi WHERE kodebuku='$kodebuku'";
    if (mysqli_query($conn, $delete_details_query)) {
        // Delete the main record
        $delete_buku_query = "DELETE FROM tb_buku WHERE kodebuku='$kodebuku'";
        
        if (mysqli_query($conn, $delete_buku_query)) {
            echo "<script>alert('Data berhasil dihapus!');</script>";
            echo "<script>window.location.href='tb_buku.php';</script>";
        } else {
            echo "Gagal menghapus data dari tb_buku: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal menghapus data dari tb_detiltransaksi: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('ID tidak ditemukan!');</script>";
    echo "<script>window.location.href='tb_buku.php';</script>";
}
?>
