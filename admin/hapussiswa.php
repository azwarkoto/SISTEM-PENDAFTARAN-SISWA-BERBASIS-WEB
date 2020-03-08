<?php
ob_start();
include("../koneksi.php");
$a=$_GET['nisn'];
$qry=mysql_query("DELETE FROM calon_siswa WHERE nisn='$a'");
if($qry){
header("location:datasiswa.php");
} else {
echo "<script>alert('Maaf Data Gagal Terdelete!');history.go(-1);</script>";
} 
ob_clean();
?>