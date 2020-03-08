<?php
session_start();
include '../koneksi.php';
$tampil="SELECT * FROM pembayaran WHERE no_psb='".$_GET['no_psb']."'";
$query=mysql_query($tampil)or die("gagal".mysql_error());
$row=mysql_fetch_array($query);
$a=$row['no_psb'];
$b=$row['atas_nama'];
$c=$row['nominal'];
$d=$row['bukti_pembayaran'];
function rupiah($angka){
  $hasil_rupiah="Rp " . number_format($angka,2,',',',');
  return $hasil_rupiah;
}
?>
<html>
<head>
    <title>SIPENSI</title>
        <script type="text/javascript" src="../assets/lib/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="../assets/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="../assets/soucre/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="shortcut icon" href="../assets/img/baru.jpg">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script type="text/javascript">
$(document).ready(function() {
    $(".perbesar").fancybox();
})
</script>
    <link rel="stylesheet" href="gaya.css">
    </head>    <!-- Custom styles for this template -->
    <style>
      body {
        padding-top: 54px;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 56px;
        }
      }

    </style>

  <!-- Page Content -->
    <div class="container">
<table border='0' cellpadding='3' cellspacing='1' width='700' style='font-family: "time news roman"; font-size: 12px; background: #ffffff;'>
    <!-- kop -->
    <tr><td colspan='3'><?php include 'kop.php' ?></td></tr>
    <!-- kop -->
    <tr>
        <td colspan='3' align='center'>LEMBAR KONFIRMASI PEMBAYARAN PENDAFTARAN SISWA BARU SMA PERGURUAN BUDAYA [ONLINE]</td>
    </tr>
    <tr>
        <td width='20'><!-- margin kanan --><br></td>
        <td>
        <!-- Bagian Tengah / Isi -->
            <!-- tabel kontent -->

<table border='0' cellpadding='3' cellspacing='1' width='100%' style='font-family: "time news roman"; font-size: 14px;'>
                <tr><td colspan="3" align="center"><button class="btn btn-secondary" onclick="window.open('printpembayaran.php?print=ya&no_psb=<?php echo $a; ?>','popupwindow','scrollbars=yes, width=750,height=600');"><i class="glyphicon glyphicon-print"></i> Cetak</button></td></tr>
                <tr>
                    <td colspan='3'><b><font size="5">Data Konfirmasi Pembayaran</b></td><!-- SubJudul/Kategori -->
                    <td><!-- nomor formulir --></td>
                </tr>
                <!-- Isi Konten -->
                
                <table style='font-family: "time news roman"; font-size: 12px;' border='0' cellpadding='3' cellspacing='1' width='100%'>
                <tr>
                    <td colspan='3'><b>Biodata Siswa</b></td><!-- SubJudul/Kategori -->
                    <td><!-- nomor formulir --></td>
                </tr>
                <tr>
                    <td>No PSB</td><td>:</td><td><?php echo $a; ?></td>
                </tr>
                <tr>
                    <td>Atas Nama</td><td>:</td><td><?php echo $b; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Bayar</td><td>:</td><td><?php echo date('d M Y', strtotime($row['tgl_bayar'])); ?></td>
                </tr>
                <tr>
                    <td>Nominal yang di Bayarkan</td><td>:</td><td><?php echo rupiah($c); ?></td>
                </tr>    
                <tr>
                    <td>Bukti Pembayaran</td><td>:</td><td><a href="../assets/img/pembayaran/<?php echo $d; ?>" class "perbesar"><img src='../assets/img/pembayaran/<?php echo $d; ?>' width='100' height='100'></td>
                </tr>
                <tr>
                    <td colspan='4'><br></td>
                </tr>
                <!-- Isi Konten -->
            </table>
        </td>
        <td width='20'><!-- margin kiri --></td>
    </tr>
                </table>
                <!-- Bootstrap core JavaScript -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>