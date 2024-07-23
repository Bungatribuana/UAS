<?php
session_start();
include 'conf.php';

if (isset($_GET['kodepenulis'])) {
    $id = $_GET['kodepenulis'];

    // Fetch the current data
    $query = mysqli_query($conn, "SELECT * FROM tb_penulis WHERE kodepenulis='$id'");
    $data = mysqli_fetch_array($query);

    // Check if data is found
    if (!$data) {
        echo "<script>alert('Data tidak ditemukan.');</script>";
        echo "<script>window.location.href='tb_penulis.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID tidak diberikan.');</script>";
    echo "<script>window.location.href='tb_penulis.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kodepenulis = $_POST['kodepenulis'];
    $namapenulis = $_POST['namapenulis'];
    $alamatpenulis = $_POST['alamatpenulis'];
    $telppenulis = $_POST['telppenulis'];

    // Update the record
    $query_update = mysqli_query($conn, "UPDATE tb_penulis SET kodepenulis='$kodepenulis', namapenulis='$namapenulis', alamatpenulis='$alamatpenulis' WHERE kodepenulis='$kodepenulis'");

    if ($query_update) {
        echo "<script>alert('Berhasil Mengupdate Data');</script>";
        echo "<script>window.location.href='tb_penulis.php';</script>";
    } else {
        echo "Gagal mengupdate data ke database: " . mysqli_error($conn);
    }
}
?>
<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>Edit Data Penulis</title>
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
                    <strong class="card-title">Edit Data Penulis</strong>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="kodepenulis">Kode Penulis</label>
                            <input type="text" class="form-control" id="kodepenulis" name="kodepenulis" value="<?php echo $data['kodepenulis']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="namapenulis">Nama Penulis</label>
                            <input type="text" class="form-control" id="namapenulis" name="namapenulis" value="<?php echo $data['namapenulis']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="alamatpenulis">Alamat Penulis</label>
                            <input type="text" class="form-control" id="alamatpenulis" name="alamatpenulis" value="<?php echo $data['alamatpenulis']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telppenulis">Nomor Telepon</label>
                            <input type="text" class="form-control" id="telppenulis" name="telppenulis" value="<?php echo $data['telppenulis']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Update</button>
                        <a href="tb_penulis.php" class="btn btn-danger btn-block">Batal</a>
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
