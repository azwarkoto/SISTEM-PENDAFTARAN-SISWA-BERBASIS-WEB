<?php
ob_start();
include("../koneksi.php");
$a=$_GET['no_psb'];
$qry=mysql_query("DELETE FROM pendaftaran WHERE no_psb='$a'");
if($qry){
header("location:datapendaftar.php");
} else {
echo "<script>alert('Maaf Data Gagal Terdelete!');history.go(-1);</script>";
} 
ob_clean();
?>