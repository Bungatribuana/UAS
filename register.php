<?php
include 'admin/conf.php';

// Tambahkan pengecekan koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['daftar'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $password = md5($_POST['password']);
    $role = $_POST['role'];

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO user (nama, email, nim, prodi, password, role) VALUES (?, ?, ?, ?, ?, ?)");
    
    // Tambahkan pengecekan statement
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $nama, $email, $nim, $prodi, $password, $role);

    if ($stmt->execute()) {
        echo "<script>alert('Berhasil Register');</script>";
        header("location: login.php");
        exit;
    } else {
        echo "<script>alert('Gagal Register: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="tambahan/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="tambahan/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="tambahan/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/register-style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body style="background-image: url('') !important;">
    <div class="container">
        <div class='row'>
            <div class="col-md-4"></div>
            <div class="col-md-4 form-register-container">
                <h2 class="">Registrasi Akun</h2>
                <form action="" method="post">
                    <label>Nama</label>
                    <input class="form-control" type="text" name="nama" required>
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" required>
                    <label>NIM</label>
                    <input class="form-control" type="text" name="nim" required>
                    <label>Prodi</label>
                    <select class="form-control" name="prodi" required>
                        <option value="" disabled selected>Pilih Prodi</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                    </select>
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" required>
                    <label>Role</label>
                    <input class="form-control" type="text" name="role" required><br>
                    <input type="checkbox" name="" required> Saya setuju dengan <a href="#">syarat dan ketentuan</a>.
                    <button type="submit" name="daftar" class="btn btn-success" style="margin-top: 20px;">DAFTAR</button>
                    <a href="index.php" class="btn btn-danger" style="margin-top: 20px; float:right">BATAL</a>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="tambahan/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
