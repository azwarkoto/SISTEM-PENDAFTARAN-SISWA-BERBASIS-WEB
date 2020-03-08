<?php
session_start();
if (!isset($_SESSION['idn'])){
header("Location:./index.php?pesan=belum_login");
}
ob_start();
include "../koneksi.php";
    $a=$_POST['atas_nama'];
    $b=$_POST['nominal'];   
    $bukti=$_FILES['bukti']['name'];
    $tmp=$_FILES['bukti']['tmp_name'];
    $c=date('dmYHis').$bukti;
    $path="../assets/img/pembayaran/".$c;
    $d=$_POST['status'];
    $e=$_POST['idadmin'];
    if (!empty($a)) {
    echo "";
}
else {
    die ("<script>alert('Atas Nama Harus di Isi!');history.go(-1);</script>");
}

if (!empty($b)) {
    echo "";
}
else {
    die ("<script>alert('Nomnila Bayar Harus di Isi!');history.go(-1);</script>");
}

if (!empty($c)) {
    echo "";
}
else {
    die ("<script>alert('Bukti Pembayaran Harus di Isi!');history.go(-1);</script>");
}



if(move_uploaded_file($tmp, $path)){
        $query = "SELECT * FROM pembayaran where no_psb='".$_GET['no_psb']."'";
        $sql = mysql_query($query,$koneksi); // Eksekusi/Jalankan query dari variabel $query
        $data = mysql_fetch_array($sql);

if(is_file("../assets/img/pembayaran/".$data['bukti_pembayaran'])) 
unlink("../assets/img/pembayaran/".$data['bukti_pembayaran']);

$ubah="UPDATE pembayaran set atas_nama='$a',nominal='$b',bukti_pembayaran='$c',status='$d',idadmin='$e' where no_psb='".$_GET['no_psb']."'";
$update=mysql_query($ubah,$koneksi) or die(mysql_error());
if($update) {
        echo "<script>alert('Data Anda Berhasil Tersimpan!');location.href='datapembayaran.php';</script>";
}
else {
    echo "<script>alert('Maaf Data Gagal Tersimpan!');history.go(-1);</script>";
}
}
else {
    $ubah1="UPDATE pembayaran set atas_nama='$a',nominal='$b',status='$d',idadmin='$e' where no_psb='".$_GET['no_psb']."'";
    $update1=mysql_query($ubah1,$koneksi) or die(mysql_error());
    
    if($update1) {
        echo "<script>alert('Data Anda Berhasil Tersimpan!');location.href='datapembayaran.php';</script>";
}
else {
    echo "<script>alert('Maaf Data Gagal Tersimpan!');history.go(-1);</script>";
}
}
ob_flush();
?>