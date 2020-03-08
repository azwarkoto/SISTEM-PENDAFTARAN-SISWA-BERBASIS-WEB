<?php
session_start();
if (!isset($_SESSION['idk'])){
header("Location:../admin/index.php?pesan=belum_login");
}
?>
<?php
include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIPENSI</title>

    <!-- Bootstrap Core CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/img/baru.jpg">

    <!-- Custom CSS -->
    <link href="../assets/css/landing-page.css" rel="stylesheet">
    <script type="text/javascript" src="../assets/lib/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="../assets/source/jquery.fancybox.js?v=2.1.5"></script>
    <link rel="stylesheet" type="text/css" href="../assests/soucre/jquery.fancybox.css?v=2.1.5" media="screen" />
    <script type="text/javascript">
    $(document).ready(function() {
    $(".perbesar").fancybox();
    })
    </script>
    <!-- Custom Fonts -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="../assets/slide/js/slidergezz.1.3.8.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/slide/css/slidergezz.css"/>
   

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="#">Pendaftaran Siswa Baru</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="index.php"><i class="glyphicon glyphicon-home"></i> Beranda</a>
                    </li>

                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="glyphicon glyphicon-file"></i> Laporan</a>
                    <ul class="dropdown-menu">

                    <li><a href="laporanpendaftar.php">
                    <i class="glyphicon glyphicon-user"></i> Laporan Data Pendaftar</a></li>
    
                    <li><a href="laporanpembayaran.php">
                    <i class="glyphicon glyphicon-shopping-cart"></i> Laporan Data Konfirmasi Pembayaran</a></li>

                    <li><a href="laporansiswa.php">
                    <i class="glyphicon glyphicon-user"></i> Laporan Data Siswa</a></li>

                    <li><a href="laporanditerima.php">
                    <i class="glyphicon glyphicon-user"></i> Laporan Siswa Diterima</a></li>
                              
                  </ul>
                  </li>

                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <i class="glyphicon glyphicon-cog"></i> Pengaturan</a>
                    <ul class="dropdown-menu">

                    <li><a href="gantipass.php">
                    <i class="glyphicon glyphicon-lock"></i> Ganti Password</a></li>
    
                    <li><a href="backup.php">
                    <i class="glyphicon glyphicon-hdd"></i> Backup & Restore Data</a></li>
                              
                  </ul>
                  </li>

                    <li>
                        <a href="logout.php"><i class="glyphicon glyphicon-lock"></i> Logout</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>