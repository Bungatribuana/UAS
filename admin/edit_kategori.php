<?php
session_start();
include 'conf.php';

if (isset($_GET['kodekategori'])) {
    $kodekategori = $_GET['kodekategori'];

    // Fetch the current data
    $query = mysqli_query($conn, "SELECT * FROM tb_kategori WHERE kodekategori='$kodekategori'");
    $data = mysqli_fetch_array($query);

    // Check if data is found
    if (!$data) {
        echo "<script>alert('Data tidak ditemukan.');</script>";
        echo "<script>window.location.href='tb_kategori.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID tidak diberikan.');</script>";
    echo "<script>window.location.href='tb_kategori.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kodekategori = $_POST['kodekategori'];
    $namakategori = $_POST['namakategori'];


    // Update the record
    $query_update = mysqli_query($conn, "UPDATE tb_kategori SET kodekategori='$kodekategori', namakategori='$namakategori' WHERE kodekategori='$kodekategori'");

    if ($query_update) {
        echo "<script>alert('Berhasil Mengupdate Data');</script>";
        echo "<script>window.location.href='tb_kategori.php';</script>";
    } else {
        echo "Gagal mengupdate data ke database: " . mysqli_error($conn);
    }
}
?>
<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>Edit Data Kategori</title>
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
                    <strong class="card-title">Edit Data Kategori</strong>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="kodekaetgori">Kode Kategori</label>
                            <input type="text" class="form-control" id="kodekategori" name="kodekategori" value="<?php echo $data['kodekategori']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="namakategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="namakategori" name="namakategori" value="<?php echo $data['namakategori']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Update</button>
                        <a href="tb_kategoris.php" class="btn btn-danger btn-block">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .row -->
</div><!-- .container -->

<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
