<?php
if (isset($_GET['username'])) {
    $username = $_GET['username'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>PERPUSTAKAAN BERBASIS WEB</title>
    <link rel="stylesheet" type="text/css" href="tambahan/bootstrap-4.1.3/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="tambahan/bootstrap-4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/register-style.css">
    <link rel="stylesheet" type="text/css" href="tambahan/font-awesome/css/font-awesome.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        .table td {
            color: black; /* Mengubah warna teks menjadi hijau */
            font-weight: bold; /* Membuat teks menjadi tebal */
            font-size: 20px; /* Mengubah ukuran font menjadi 20 */
        }
    </style>
</head>
<body style="background-image: url('') !important;">
    <div class="container">
        <div class='row'>
            <div class="col-md-2" style="padding-top: 20px;">
                <a href="login.php" class="btn btn-info btn-icon btn-sm">
                    <i class="fa fa-arrow-left"></i>
                </a>
            </div>
            <div class="col-md-8 form-register-container">
                <h2>Data Jadwal Pelatihan</h2>
                <table class="table table-bordered table-super-condensed">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Pendaftaran</th>
                            <th>ID User</th>
                            <th>ID Jadwal</th>
                            <th>Tanggal Daftar</th>                                              
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'admin/conf.php';
                        $query = mysqli_query($conn, "SELECT * FROM pendaftaran ORDER BY id_pendaftaran DESC");
                        if ($query) {
                            $no = 1;
                            while ($data = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $data['id_pendaftaran']; ?></td>
                            <td><?php echo $data['id_user']; ?></td>
                            <td><?php echo $data['id_jadwal']; ?></td>
                            <td><?php echo $data['tanggal_daftar']; ?></td>                                   
                            <td>
                                <div class="btn-group">
                                    <!-- Additional buttons can go here -->
                                </div>
                            </td>
                        </tr>
                        <?php
                                $no++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="tambahan/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap-4.1.3/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="tambahan/bootstrap-4.1.3/dist/js/bootstrap.min.js"></script>

</body>
</html>
