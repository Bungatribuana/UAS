<?php
session_start();
include 'conf.php';

// Check if 'kodetransaksi' is provided in the URL
if (isset($_GET['kodetransaksi'])) {
    $kodetransaksi = $_GET['kodetransaksi'];
    
    // Prevent SQL Injection
    $kodetransaksi = mysqli_real_escape_string($conn, $kodetransaksi);

    // Fetch the current data
    $query = "SELECT * FROM tb_detiltransaksi WHERE kodetransaksi='$kodetransaksi'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result);

        $kodebuku = $data['kodebuku'];
        $tglpinjam = $data['tglpinjam'];
        $jumlahbuku = $data['jumlahbuku'];
        $status = $data['status'];
        $tglkembali = $data['tglkembali'];
    } else {
        echo "<script>alert('Data tidak ditemukan.');</script>";
        echo "<script>window.location.href='tb_detiltransaksi.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('Kode transaksi tidak diberikan.');</script>";
    echo "<script>window.location.href='tb_detiltransaksi.php';</script>";
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kodebuku = mysqli_real_escape_string($conn, $_POST['kodebuku']);
    $tglpinjam = mysqli_real_escape_string($conn, $_POST['tglpinjam']);
    $jumlahbuku = mysqli_real_escape_string($conn, $_POST['jumlahbuku']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $tglkembali = mysqli_real_escape_string($conn, $_POST['tglkembali']);

    // Update query
    $query_update = "UPDATE tb_detiltransaksi SET kodebuku='$kodebuku', tglpinjam='$tglpinjam', jumlahbuku='$jumlahbuku', status='$status', tglkembali='$tglkembali' WHERE kodetransaksi='$kodetransaksi'";
    $result_update = mysqli_query($conn, $query_update);

    if ($result_update) {
        echo "<script>alert('Berhasil Mengupdate Data');</script>";
        echo "<script>window.location.href='tb_detiltransaksi.php';</script>";
    } else {
        echo "Gagal mengupdate data: " . mysqli_error($conn);
    }
}

// Fetch book titles for dropdown
$booksQuery = "SELECT kodebuku, judulbuku FROM tb_buku";
$booksResult = mysqli_query($conn, $booksQuery);
?>
<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>Edit Data Detail Transaksi</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin: 20px auto;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-radius: 10px 10px 0 0;
        }
        .btn-success {
            background-color: #28a745;
            border: none;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center">
                    <strong class="card-title">Edit Data Detail Transaksi</strong>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label>Kode Transaksi</label>
                            <input type="text" class="form-control" name="kodetransaksi" value="<?php echo htmlspecialchars($kodetransaksi); ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Judul Buku</label>
                            <select name="kodebuku" class="form-control" required>
                                <?php while ($book = mysqli_fetch_array($booksResult)) { ?>
                                    <option value="<?php echo htmlspecialchars($book['kodebuku']); ?>" <?php echo $book['kodebuku'] == $kodebuku ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($book['judulbuku']); ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="date" name="tglpinjam" class="form-control" value="<?php echo htmlspecialchars($tglpinjam); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Buku</label>
                            <input type="number" name="jumlahbuku" class="form-control" value="<?php echo htmlspecialchars($jumlahbuku); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control" value="<?php echo htmlspecialchars($status); ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="date" name="tglkembali" class="form-control" value="<?php echo htmlspecialchars($tglkembali); ?>" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Update</button>
                        <a href="tb_detiltransaksi.php" class="btn btn-danger btn-block">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .row -->
</div><!-- .container -->

<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
