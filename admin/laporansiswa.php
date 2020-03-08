<?php include "header.php"; ?>
       <div class="container">
<center><h3>&nbsp;</h3>
  <h3><b> Laporan  Data Siswa</b></h3>
</center>
<p>&nbsp;  </p>
    <div style="border:1px solid #B0C4DE; padding:10px; overflow:auto; width:1113px; height:500px;">
    <?php
           $Open = mysql_connect("localhost","root","");
        if (!$Open){
        die ("Koneksi ke Engine MySQL Gagal !");
        }
      $Koneksi = mysql_select_db("ta_pendaftaran");
        if (!$Koneksi){
        die ("Koneksi ke Database Gagal !");
        }
    ?>
    <form action="laporansiswa.php" method="post" name="postform">
      <p align="center"><font size="3"><b>Pencarian Data Berdasarkan Periode Tanggal</b></font></p><br />
      <table border="0">
        <tr>
          <td width="125"><b>Dari Tanggal</b></td>
          <td colspan="2" width="190"><input type="date" name="tanggal_awal" size="16" /></td>
          <td width="125"><b>Sampai Tanggal</b></td>
          <td colspan="2" width="190"><input type="date" name="tanggal_akhir" size="16" /></td>
          <td colspan="2" width="190"><input type="submit" value="Pencarian Data" name="pencarian" /></td>
        </tr>
      </table>
    </form><br/>


<?php
      //proses jika sudah klik tombol pencarian data
      if(isset($_POST['pencarian'])){
      //menangkap nilai form
      $tanggal_awal=$_POST['tanggal_awal'];
      $tanggal_akhir=$_POST['tanggal_akhir'];
      if(empty($tanggal_awal) || empty($tanggal_akhir)){
      //jika data tanggal kosong
      ?>
      <script language="JavaScript" required>
        alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
        document.location='laporancalonsiswa.php';
      </script>
      <?php
      }else{
      ?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo date('d M Y', strtotime($_POST['tanggal_awal']));?></b> s/d <b><?php echo date('d M Y', strtotime($_POST['tanggal_akhir']));?></b></i>
      <br/><i><b><font color="red">*</font>JK</b>: Jenis Kelamin</i>
      <br/><i><b><font color="red">*</font>TTL</b>: Tempat Tanggal Lahir</i>
      <?php
      $query=mysql_query("SELECT * FROM calon_siswa where tgl_daftar BETWEEN '$tanggal_awal' and '$tanggal_akhir'");
      $no=1;
      }
    ?>
    </p>
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr align="center">
      	<td>No</td>
        <td>NISN</td>
        <td>Nama</td>
        <td>TTL</td>
        <td>JK</td>
        <td>Alamat</td>
        <td>Agama</td>
        <td>No Telepon</td>
      </tr>
      <?php
      //menampilkan pencarian data
      while($row=mysql_fetch_array($query)){
      	
      ?>
      <tr align="center">
      	<td><?php echo $no; ?></td>
        <td><?php echo $row['nisn']; ?></td>
        <td><?php echo $row['nama']; ?></td>
        <td><?php echo $row['tempat_lahir'];?>, <?php echo date('d M Y', strtotime($row['tgl_lahir']));?></td>
        <td><?php echo $row['jkel'];?></td>
        <td><?php echo $row['alamat'];?></td>
        <td><?php echo $row['agama'];?></td>
        <td><?php echo $row['telepon'];?></td>
      </tr>
      <?php $no++;
      }
      ?>  
      <tr>
        <td colspan="4" align="center"> 
        <?php
        //jika pencarian data tidak ditemukan
        if(mysql_num_rows($query)==0){
          echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
        }
        ?>
        </td>
      </tr> 
    </table>
    <form role="form" action="cetaksiswa.php" method="POST" target="_blank">
              <table border="0" align="center">
                  <tr><td>&nbsp;</td></tr>
                  <tr><td><button type="submit" class="btn btn-danger">
                  <i class="glyphicon glyphicon-print"></i> Simpan ke PDF</button></td></tr>
                  <input type="hidden" class="form-control" id="tglawal" name="tglawal"  value= "<?php echo $_POST['tanggal_awal']?>">
                  <input type="hidden" class="form-control" id="tglakhir" name="tglakhir"  value= "<?php echo $_POST['tanggal_akhir']?>">
               </table>
              </form>
    <?php
    }
    else{
      unset($_POST['pencarian']);
    }
    ?>
<?php include "footer.php"; ?>