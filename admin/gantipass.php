	<?php
	include 'header.php';
	//mengatasi error notice dan warning
	//error ini biasa muncul jika dijalankan di localhost, jika online tidak ada masalah
	error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED);
	
	//koneksi ke database
include ("../koneksi.php");	
	//proses jika tombol rubah di klik
	if($_POST['submit']){
		//membuat variabel untuk menyimpan data inputan yang di isikan di form
		$password_lama			= $_POST['password_lama'];
		$password_baru			= $_POST['password_baru'];
		$konfirmasi_password	= $_POST['konfirmasi_password'];
		
		//cek dahulu ke database dengan query SELECT
		//kondisi adalah WHERE (dimana) kolom password adalah $password_lama di encrypt m5
		//encrypt -> md5($password_lama)
		$password_lama	= md5($password_lama);
		$cek 			= mysql_query("SELECT password FROM admin WHERE password='$password_lama'");
		$qry 			= mysql_num_rows($cek);
		if($qry){
			//kondisi ini jika password lama yang dimasukkan sama dengan yang ada di database
			//membuat kondisi minimal password adalah 5 karakter
			if(strlen($password_baru) >= 5){
				//jika password baru sudah 5 atau lebih, maka lanjut ke bawah
				//membuat kondisi jika password baru harus sama dengan konfirmasi password
				if($password_baru == $konfirmasi_password){
					//jika semua kondisi sudah benar, maka melakukan update kedatabase
					//query UPDATE SET password = encrypt md5 password_baru
					//kondisi WHERE id user = session id pada saat login, maka yang di ubah hanya user dengan id tersebut
					$password_baru 	= md5($password_baru);
					$user 		= $_SESSION['idn']; //ini dari session saat login
					
					$update 		= mysql_query("UPDATE admin SET password='$password_baru' WHERE username='$user'");
					if($update){
						//kondisi jika proses query UPDATE berhasil
						echo "<script>alert('Password Berhasil di Simpan!');location.href='admin.php';</script>";
					}else{
						//kondisi jika proses query gagal
						echo "<script>alert('Gagal Merubah Password!');history.go(-1);</script>";
					}					
				}else{
					//kondisi jika password baru beda dengan konfirmasi password
					echo "<script>alert('Konfirmasi Password Tidak Cocok!');history.go(-1);</script>";
				}
			}else{
				//kondisi jika password baru yang dimasukkan kurang dari 5 karakter
				echo "<script>alert('Minimal Password Baru Adalah 5 Karakter!');history.go(-1);</script>";
			}
		}else{
			//kondisi jika password lama tidak cocok dengan data yang ada di database
			echo "<script>alert('Password Lama Tidak Cocok!');history.go(-1);</script>";
		}
	}
	?>
<center><h2>Form Ganti Password</h2></center>
	<form method="post" action="">
		<table 	width="53%" border="0" align="center">
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><?php echo $_SESSION['idn'];?></td>
			<tr>
			<tr>
				<td>Password Lama</td>
				<td>:</td>
				<td><input type="password" name="password_lama" required></td>
			<tr>
			<tr>
				<td>Password Baru</td>
				<td>:</td>
				<td><input type="password" name="password_baru" required></td>
			<tr>
			<tr>
				<td>Konfirmasi Password</td>
				<td>:</td>
				<td><input type="password" name="konfirmasi_password" required></td>
			<tr>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td><input type="submit" name="submit" value="Simpan"></td>
			<tr>
		</table>
	</form>
	<?php include 'footer.php'; ?>