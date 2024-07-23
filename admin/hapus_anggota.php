<?php
session_start();
include 'conf.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['kodeanggota'])) {
    $kodeanggota = $_GET['kodeanggota'];

    // Hapus data dari database
    $query = "DELETE FROM tb_anggota WHERE kodekanggota='$kodeanggota'";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil dihapus!');</script>";
        echo "<script>window.location.href='tb_anggota.php';</script>";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('ID tidak ditemukan!');</script>";
    echo "<script>window.location.href='tb_anggota.php';</script>";
}
?>


