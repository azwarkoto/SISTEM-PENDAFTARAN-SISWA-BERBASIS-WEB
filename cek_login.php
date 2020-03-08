<?php
ob_start(); // untukmembuffer;
include ("koneksi.php");

//membuatvariabeluntukmenampung input username dan password
	$nisn = $_POST['nisn'];
	$pass = md5($_POST['password']);//memproteksidarimysql injection

$nisn = stripslashes($nisn); // menghapus backslash padatampilanphp
$pass = stripslashes($pass);
$nisn = mysql_real_escape_string($nisn); // memfilterkarakterkhususmisal '
$pass = mysql_real_escape_string($pass);
if($nisn=='' || $pass==''){
		echo "Form belum lengkap!!";
	}else{
		include "koneksi.php";
		$sqlLogin = mysql_query("SELECT * FROM pendaftaran 
						WHERE nisn='$nisn' AND password='$pass'",$koneksi);
		$jml = mysql_num_rows($sqlLogin);
		$d=mysql_fetch_array($sqlLogin);
		if($jml > 0){
			session_start();
			$_SESSION['status']	= "login";
			$_SESSION['id']		= $d['nisn'];
			$_SESSION['member']	= $d['nama'];
			
			header('location:member/index.php');
		}else{
			echo "<script>alert('NISN dan Password anda Salah!!!');location.href='login.php';</script>";
}
}
ob_end_flush();
?> 