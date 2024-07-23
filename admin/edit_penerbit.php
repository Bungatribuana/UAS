<?php
session_start();
include 'conf.php';

if (isset($_GET['kodepenerbit'])) {
    $kodepenerbit = $_GET['kodepenerbit'];

    // Fetch the current data
    $query = mysqli_query($conn, "SELECT * FROM tb_penerbit WHERE kodepenerbit='$kodepenerbit'");
    $data = mysqli_fetch_array($query);

    // Check if data is found
    if (!$data) {
        echo "<script>alert('Data tidak ditemukan.');</script>";
        echo "<script>window.location.href='tb_penerbit.php';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID tidak diberikan.');</script>";
    echo "<script>window.location.href='tb_penerbit.php';</script>";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kodepenerbit = $_POST['kodepenerbit'];
    $namapenerbit = $_POST['namapenerbit'];
    $alamatpenerbit = $_POST['alamatpenerbit'];
    $telppenerbit = $_POST['telppenerbit'];

    // Update the record
    $query_update = mysqli_query($conn, "UPDATE tb_penerbit SET kodepenerbit='$kodepenerbit', namapenerbit='$namapenerbit', alamatpenerbit='$alamatpenerbit' WHERE kodepenerbit='$kodepenerbit'");

    if ($query_update) {
        echo "<script>alert('Berhasil Mengupdate Data');</script>";
        echo "<script>window.location.href='tb_penerbit.php';</script>";
    } else {
        echo "Gagal mengupdate data ke database: " . mysqli_error($conn);
    }
}
?>
<!doctype html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>Edit Data Penerbit</title>
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
                    <strong class="card-title">Edit Data Penerbit</strong>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="kodepenerbit">Kode Penerbit</label>
                            <input type="text" class="form-control" id="kodepenerbit" name="kodepenerbit" value="<?php echo $data['kodepenerbit']; ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="namapenerbit">Nama Penerbit</label>
                            <input type="text" class="form-control" id="namapenerbit" name="namapenerbit" value="<?php echo $data['namapenerbit']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="alamatpenerbit">Alamat Penerbit</label>
                            <input type="text" class="form-control" id="alamatpenerbit" name="alamatpenerbit" value="<?php echo $data['alamatpenerbit']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telppenerbit">Nomor Telepon</label>
                            <input type="text" class="form-control" id="telppenerbit" name="telppenerbit" value="<?php echo $data['telppenerbit']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Update</button>
                        <a href="tb_penerbit.php" class="btn btn-danger btn-block">Batal</a>
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
