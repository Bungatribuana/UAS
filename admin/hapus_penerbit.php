<?php
session_start();
include 'conf.php';

if (isset($_GET['kodepenerbit'])) {
    $kodepenerbit = $_GET['kodepenerbit'];

    // Hapus data dari database
    $query = "DELETE FROM tb_penerbit WHERE kodepenerbit='$kodepenerbit'";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data berhasil dihapus!');</script>";
        echo "<script>window.location.href='tb_penerbit.php';</script>";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    echo "<script>alert('ID tidak ditemukan!');</script>";
    echo "<script>window.location.href='tb_penerbit.php';</script>";
}
?>
