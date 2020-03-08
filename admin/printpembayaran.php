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
<?php if($_GET['print']=='ya'){
    echo "<script type='text/javascript'>javascript:window.print()</script>";
    }; ?>
<script type="text/javascript">
$(document).ready(function() {
    $(".perbesar").fancybox();
})
</script>
    <link rel="stylesheet" href="gaya.css">
    </head>
<body>
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
</body>
    
</html>