<?php include 'header.php'; ?>
<br><br><br>
<form enctype="multipart/form-data" action="recovery.php" method="post">
	<p align="center"><em>Aplikasi ini digunakan untuk <strong><a href="backup.php">backup</a></strong> dan <strong><a href="recovery.php">restore</a></strong> semua data yang ada didalam database &quot;<strong>ta_pendaftaran</strong>&quot;.</em></p>
	<table align="center">
	<tr><td>File Backup Database (*.sql) <input type="file" name="datafile" size="30" id="gambar" /></td></tr>
	<tr><td><input type="submit" onclick="return confirm('Apakah Anda yakin akan restore database?')" name="restore" value="Restore Database" /></td>
	</tr>
	</table>
</form>


<?php
if(isset($_POST['restore'])){
	$koneksi=mysql_connect("localhost","root","");
	mysql_select_db("ta_pendaftaran",$koneksi);
	
	$nama_file=$_FILES['datafile']['name'];
	$ukuran=$_FILES['datafile']['size'];
	
	//periksa jika data yang dimasukan belum lengkap
	if ($nama_file=="")
	{
		echo "<script>alert('Pilih file database Anda!');history.go(-1);</script>";
	}else{
		//definisikan variabel file dan alamat file
		$uploaddir='../assets/restore/';
		$alamatfile=$uploaddir.$nama_file;

		//periksa jika proses upload berjalan sukses
		if (move_uploaded_file($_FILES['datafile']['tmp_name'],$alamatfile))
		{
			
			$filename = '../assets/restore/'.$nama_file.'';
			
			// Temporary variable, used to store current query
			$templine = '';
			// Read in entire file
			$lines = file($filename);
			// Loop through each line
			foreach ($lines as $line)
			{
				// Skip it if it's a comment
				if (substr($line, 0, 2) == '--' || $line == '')
					continue;
			 
				// Add this line to the current segment
				$templine .= $line;
				// If it has a semicolon at the end, it's the end of the query
				if (substr(trim($line), -1, 1) == ';')
				{
					// Perform the query
					mysql_query($templine) or print('Error performing query \'<strong>' . $templine . '\': ' . mysql_error() . '<br /><br />');
					// Reset temp variable to empty
					$templine = '';
				}
			}
			echo "<center>Berhasil Restore Database, silahkan di cek.</center>";
		
		}else{
			//jika gagal
			echo "Proses upload gagal, kode error = " . $_FILES['location']['error'];
		}	
	}

}else{
	unset($_POST['restore']);
}
?>
<?php include 'footer.php'; ?>