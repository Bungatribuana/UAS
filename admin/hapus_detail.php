<?php
session_start();
include 'conf.php';

if (isset($_GET['kodetransaksi'])) {
    $kodetransaksi = $_GET['kodetransaksi'];
    $query = "DELETE FROM tb_detiltransaksi WHERE kodetransaksi='$kodetransaksi'";
    
    if (mysqli_query($conn, $query)) {
        header('Location: tb_detiltransaksi.php');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
