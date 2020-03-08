<?php
session_start();
include '../koneksi.php';
$tampil="SELECT * FROM pendaftaran WHERE no_psb='".$_GET['no_psb']."'";
$query=mysql_query($tampil)or die("gagal".mysql_error());
$row=mysql_fetch_array($query);
$a=$row['no_psb'];
$b=$row['nisn'];
$c=$row['nama'];
$d=$row['tempat_lahir'];
$e=$row['jkel'];
$f=$row['gol_drh'];
$g=$row['alamat'];
$h=$row['agama'];
$i=$row['warga_negara'];
$j=$row['no_ijazah'];
$k=$row['wali'];
$l=$row['alamat_wali'];
$m=$row['telepon'];
$n=$row['pekerjaan_wali'];
$o=$row['pendidikan_wali'];
$p=$row['foto'];
?>
<html>
<head>
    <title>SIPENSI</title>
        <script type="text/javascript" src="../assets/lib/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="../assets/source/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="../assets/soucre/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="shortcut icon" href="../vendor/images/baru.jpg">
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
        <td colspan='3' align='center'>FORMULIR PENDAFTARAN SISWA BARU SMA PERGURUAN BUDAYA [ONLINE]</td>
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
                    <td>NISN</td><td>:</td><td><?php echo $b; ?></td>
                </tr>
                <tr>
                    <td>Nama</td><td>:</td><td><?php echo $c; ?></td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td><td>:</td><td><?php echo $d; ?></td>
                </tr>    
                <tr>
                    <td>Tanggal Lahir</td><td>:</td><td><?php echo date('d M Y', strtotime($row['tgl_lahir'])); ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td><td>:</td><td><?php echo $e; ?></td>
                </tr>
                <tr>
                    <td>Golongan Darah</td><td>:</td><td><?php echo $f; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td><td>:</td><td><?php echo $g; ?></td>
                </tr>
                <tr>
                    <td>Agama</td><td>:</td><td><?php echo $h; ?></td>
                </tr>
                <tr>
                    <td>Warga Negara</td><td>:</td><td><?php echo $i; ?></td>
                </tr>
                <tr>
                    <td>No Ijazah</td><td>:</td><td><?php echo $j; ?></td>
                </tr>
                <tr>
                    <td>Nama Wali</td><td>:</td><td><?php echo $k; ?></td>
                </tr>
                <tr>
                    <td>Alamat Wali</td><td>:</td><td><?php echo $l; ?></td>
                </tr>
                <tr>
                    <td>No Telepon</td><td>:</td><td><?php echo $m; ?></td>
                </tr>                
                <tr>
                    <td>Pekerjaan Wali</td><td>:</td><td><?php echo $n; ?></td>
                </tr>
                <tr>
                    <td>Pendidikan Wali</td><td>:</td><td><?php echo $o; ?></td>
                </tr>
                <tr>
                    <td>Dokumen Ijazah / SKL</td><td>:</td><td><a href="../assets/img/pendaftar/<?php echo $p; ?>" class "perbesar"><img src='../assets/img/pendaftar/<?php echo $p; ?>' width='100' height='100'></td></td>
                </tr>
                <tr>
                    <td>Tanggal Daftar</td><td>:</td><td><?php echo date('d M Y', strtotime($row['tgl_daftar'])); ?></td>
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