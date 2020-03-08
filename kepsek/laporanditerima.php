<?php include "header.php"; ?>
       <div class="container">
<center><h3>&nbsp;</h3>
  <h3><b> Laporan  Data Siswa</b></h3>
</center>
<p>&nbsp;</p>
    <div style="border:1px solid #B0C4DE; padding:10px; overflow:auto; width:1113px; height:500px;">
<?php  include '../koneksi.php';
$query=mysql_query("SELECT * FROM pendaftaran INNER JOIN pembayaran ON pembayaran.no_psb=pendaftaran.no_psb WHERE pembayaran.status=1");
$no=1;
    ?>
    <p align="center">Laporan Data Siswa yang di Terima di SMA Budaya</p>
    <i><b><font color="red">*</font>JK</b>: Jenis Kelamin</i>
    <br/><i><b><font color="red">*</font>TTL</b>: Tempat Tanggal Lahir</i><br><br/>
    <table width="100%" border="1" cellpadding="0" cellspacing="0">
      <tr align="center">
      	<td>No</td>
        <td>NISN</td>
        <td>Nama</td>
        <td>TTL</td>
        <td>JK</td>
        <td>Alamat</td>
        <td>Agama</td>
        <td>No Telepon</td>
        <td>Status</td>
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
        <?php
    	if ($row['status'] == 1) {echo "<td>Diterima</td>";}
     	elseif ($row['status']==2){echo "<td>Di Tolak</td>";}
     	else {
     		echo "<td>Dalam Proses</td>";
     	}
     	?>
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
    <form role="form" action="cetakditerima.php" method="POST" target="_blank">
              <table border="0" align="center">
                  <tr><td>&nbsp;</td></tr>
                  <tr><td><button type="submit" class="btn btn-danger">
                  <i class="glyphicon glyphicon-print"></i> Simpan ke PDF</button></td></tr>
               </table>
              </form>
<?php include "footer.php"; ?>