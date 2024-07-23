<?php
session_start();
include 'conf.php';
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Buku</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
        
    <?php include 'sidebar.php'; ?>

    <div id="right-panel" class="right-panel">

        <?php include 'header.php'; ?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Data Buku
                            <a href="permintaan.php" class="btn btn-info btn-sm">
                                <i class="fa fa-refresh"></i>
                                Refresh
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Jadwal</a></li>
                            <li class="active">Pelatihan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Buku</strong>
                            <a href="tambah_data.php" class="btn btn-success btn-sm" style="margin-left: 15px;">
                                <i class="fa fa-plus"></i> Tambah Data Buku
                            </a>
                        </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Buku</th>
                                        <th>Judul Buku</th>
                                        <th>Nama Penulis</th>
                                        <th>Nama Penerbit</th> 
                                        <th>Nama Kategori</th>  
                                        <th>Tgl Terbit</th>                          
                                        <th>Jml Halaman</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query = mysqli_query($conn, "SELECT tb_buku.kodebuku, tb_buku.judulbuku, tb_buku.tglterbit, tb_buku.jlhhalaman, tb_penulis.namapenulis, tb_penerbit.namapenerbit, tb_kategori.namakategori 
                                    FROM tb_buku 
                                    JOIN tb_penulis ON tb_buku.kodepenulis = tb_penulis.kodepenulis 
                                    JOIN tb_penerbit ON tb_buku.kodepenerbit = tb_penerbit.kodepenerbit 
                                    JOIN tb_kategori ON tb_buku.kodekategori = tb_kategori.kodekategori");
                                    
                                    if ($query) {
                                        $no = 1;
                                        while ($data = mysqli_fetch_array($query)) {
                                            $kodebuku = $data['kodebuku'];
                                            $judulbuku = $data['judulbuku'];
                                            $namapenulis = $data['namapenulis'];
                                            $namapenerbit = $data['namapenerbit'];
                                            $namakategori = $data['namakategori'];
                                            $tglterbit = $data['tglterbit'];
                                            $jlhhalaman = $data['jlhhalaman'];
                                          
                                    ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo htmlspecialchars($kodebuku); ?></td>
                                                <td><?php echo htmlspecialchars($judulbuku); ?></td>
                                                <td><?php echo htmlspecialchars($namapenulis); ?></td>
                                                <td><?php echo htmlspecialchars($namapenerbit); ?></td>
                                                <td><?php echo htmlspecialchars($namakategori); ?></td>  
                                                <td><?php echo htmlspecialchars($tglterbit); ?></td>     
                                                <td><?php echo htmlspecialchars($jlhhalaman); ?></td>    
                                                <td>   
                                                                         
                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-danger btn-sm" href="hapus_buku.php? kodebuku=<?php echo $data['kodebuku']; ?>">
                                                            <i class="fa fa-times"></i>
                                                            Hapus
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="edit_buku.php? kodebuku=<?php echo $data['kodebuku']; ?>">
                                                            <i class="fa fa-pencil"></i>
                                                            Edit
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php   
                                            $no++;
                                        }
                                    } else {
                                    ?>
                                        <tr>
                                            <td colspan="8">Data Kosong</td>
                                        </tr>                        
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

    </div><!-- /#right-panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table').DataTable();
        });
    </script>

</body>
</html>
