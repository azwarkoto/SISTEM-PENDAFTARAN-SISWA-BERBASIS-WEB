<?php include "header.php"; ?>
<?php
date_default_timezone_set('Asia/Jakarta');
$tgl=date("Y-m-d");
include "../koneksi.php";
$sql="SELECT * FROM pendaftaran WHERE nisn='".$_SESSION['id']."'";
$qry=mysql_query($sql)or die("gagal".mysql_error());
$d=mysql_fetch_array($qry);
$no_psb=$d['no_psb'];
?>  
<?php 
  $cekdata="SELECT no_psb FROM pembayaran WHERE no_psb='$no_psb'";
  $ada=mysql_query($cekdata) or die(mysql_error());
  if(mysql_num_rows($ada)>0)
  { 
     die("<script>alert('Anda sudah melakukan pembayaran');location.href='pembayaran.php';</script>");
  }
  else
  {
     echo "";
  }
?>
<?php
$tampil="SELECT * FROM pendaftaran WHERE nisn='".$_SESSION['id']."'";
$query=mysql_query($tampil)or die("gagal".mysql_error());
$row=mysql_fetch_array($query);
$a=$row['no_psb'];
$b=$row['nisn'];
$c=$row['wali'];
?>
<br><br>
<h2 align="center">Konfirmasi Pembayaran</h2><p align="center">Silahkan upload bukti pembayaran Anda pada form dibawah ini.</p>
<form id="form1" name="form1" method="post" action="simpan.php" enctype="multipart/form-data">

<table width="53%" border="0" align="center">

<tr>
<td>No PSB</td>
<td><input type="text" name="no_psb" id="no_psb" maxlength="6" class="form-control" value="<?php echo $a; ?>" readonly	/></td>
</tr>

<tr>
<td>Nisn</td>
<td><input type="text" name="nisn" id="nisn" maxlength="5" class="form-control" value="<?php echo $b; ?>" readonly/></td>
</tr>

<tr>
<td>Atas Nama</td>
<td><input type="text" name="atas_nama" id="atas_nama" class="form-control" value="<?php echo $c; ?>" readonly/></td>
</tr>

<tr>
<td>Nominal yang di Bayarkan</td>
<td><input type="text" name="nominal" id="nominal" class="form-control" value="450000" readonly/></td>
</tr>

<tr>
<td>Bukti Pembayaran</td>
<td><input type="file" name="bukti" required></td>
</tr>



<tr>
<td>&nbsp;</td>
<td>
<input type="hidden" name="save" value="">
<button type="submit" class="btn btn-primary" onclick="return confirm('Simpan Data?')">Simpan</button>
<a href="./index.php" class="btn btn-default">Kembali</button></td>
</tr>

</table>

<input type="hidden" name="tgl_bayar" value="<?php echo $tgl;?>"/>
<input type="hidden" name="status" value="0">

</form>
<?php include "footer.php"; ?>