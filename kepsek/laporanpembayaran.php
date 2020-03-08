<?php include "header.php"; ?>
       <div class="container">
<center><h3>&nbsp;</h3>
  <h3><b> Laporan Data Konfirmasi Pembayaran</b></h3>
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
    <form action="laporanpembayaran.php" method="post" name="postform">
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
        document.location='laporandatapembayaran.php';
      </script>
      <?php
      }else{
      ?><i><b>Informasi : </b> Hasil pencarian data berdasarkan periode Tanggal <b><?php echo date('d M Y', strtotime($_POST['tanggal_awal']));?></b> s/d <b><?php echo date('d M Y', strtotime($_POST['tanggal_akhir']));?></b></i>
      <?php
      $query=mysql_query("SELECT * FROM pembayaran WHERE tgl_bayar BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
      $no=1;
      }
    ?>
    </p>
    <table align="center" width="100%" border="1" cellpadding="0" cellspacing="0">
      <tr align="center">
      	<td>No</td>
        <td>No PSB</td>&nbsp;
        <td>Atas Nama</td>&nbsp;
        <td>Tanggal Bayar</td>&nbsp;
        <td>Status Pembayaran</td>&nbsp;
      </tr>
      <?php
      //menampilkan pencarian data
      while($row=mysql_fetch_array($query)){
      	
      ?>
      <tr align="center">
      	<td><?php echo $no; ?></td>
        <td><?php echo $row['no_psb']; ?></td>
        <td><?php echo $row['atas_nama']; ?></td>
        <td><?php echo date('d M Y', strtotime($row['tgl_bayar']));?></td>
        <?php
    if ($row['status'] == 1) {echo "<td>Lunas</td>";}
     	elseif ($row['status']==2){echo "<td>Di Tolak</td>";}
     	else {
     		echo "<td>Dalam Proses</td>";
     	}?>
    </td>
      </tr>
      <?php
      $no++;
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
    <form role="form" action="cetakpembayaran.php" method="POST" target="_blank">
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