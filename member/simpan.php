<?php
ob_start();
include("../koneksi.php");
    $a=$_POST['no_psb'];
    $b=$_POST['atas_nama'];
    $c=$_POST['tgl_bayar'];
    $d=$_POST['nominal'];
    $bukti=$_FILES['bukti']['name'];
    $tmp=$_FILES['bukti']['tmp_name'];
    $e=date('dmYHis').$bukti;
    $path="../assets/img/pembayaran/".$e;
    $f=$_POST['status'];
    
if (!empty($a)) {
    echo "";
}
else {
    die ("<script>alert('No PSB Harus di Isi!');history.go(-1);</script>");
}

$cekdulu= "SELECT * FROM pembayaran WHERE no_psb='$_POST[no_psb]'"; //username dan $_POST[un] diganti sesuai dengan yang kalian gunakan
$prosescek= mysql_query($cekdulu);
if (mysql_num_rows($prosescek)>0) { //proses mengingatkan data sudah ada
    die ("<script>alert('Anda sudah melakukan pembayaran');location.href='pembayaran.php';</script>");
}
else { //proses menambahkan data, tambahkan sesuai dengan yang kalian gunakan
 
}
if (!empty($b)) {
    echo "";
}
else {
    die ("<script>alert('Atas Nama Harus di Isi!');location.href='pembayaran.php';</script>");
}

if ($d <450000) {
    die ("<script>alert('Maaf Nominal Yang Anda Bayarkan Kurang, Harap Segera Melunasi Pembayaran Anda!');history.go(-1);</script>");
}

if (!empty($d)) {
    echo "";
}
else {
    die ("<script>alert('Nominal Harus di Isi!');history.go(-1);</script>");
}

if (!empty($e)) {
    echo "";
}
else {
    die ("<script>alert('Bukti Harus di Isi!');history.go(-1);</script>");
}
if(move_uploaded_file($tmp, $path)){
$perintah="INSERT INTO pembayaran (no_psb,atas_nama,tgl_bayar,nominal,bukti_pembayaran,status) values('$a','$b','$c','$d','$e','$f')";
$simpan=mysql_query($perintah,$koneksi) or die(mysql_error());
if($simpan) {
        echo "<script>alert('Data Anda Berhasil Tersimpan!');location.href='pembayaran.php?no_psb=$a';</script>";
}
}
else {
    echo "<script>alert('Maaf Data Gagal Tersimpan!');history.go(-1);</script>";
}
ob_flush();
?>