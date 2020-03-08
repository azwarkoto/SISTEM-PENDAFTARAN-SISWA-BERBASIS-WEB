<?php include 'header.php'; ?>
    <div class="container">
</div>
<?php
ob_start();
include("../koneksi.php");
$tampil="SELECT * FROM pembayaran WHERE no_psb='".$_GET['no_psb']."'";
$qry=mysql_query($tampil)or die("gagal".mysql_error());
$row=mysql_fetch_array($qry);
$a=$row['no_psb'];
$b=$row['atas_nama'];
$c=$row['nominal'];
$d=$row['bukti_pembayaran'];
$e=$row['status'];
$qStatus="SELECT idadmin FROM admin WHERE username='".$_SESSION['idn']."'";
$Stat=mysql_query($qStatus)or die("gagal".mysql_error());
$res=mysql_fetch_array($Stat);
$f=$res['idadmin'];

$tgl=date('Y-m-d H:i:s');
function rupiah($angka){
  $hasil_rupiah="Rp " . number_format($angka,2,',',',');
  return $hasil_rupiah;
}
ob_flush();
?>
   
   <form id="form1" name="form1" method="post" action="updatepembayaran.php?no_psb=<?=$a;?>" enctype="multipart/form-data">
   <br><br><h2 align="center">Edit Data Konfirmasi Pembayaran</h2>
   <table width="53%" border="0" align="center">
   <tr><td colspan="7" align="center"><h2 style="font:Tahoma, Geneva, sans-serif; color: #30F;"></h2></td></tr>
    
    <tr><td>No PSB</td>
    <td><input type="text" name="no_psb" id="no_psb" value="<?php echo $a; ?>" class="form-control" readonly/></td>
    </tr>
    
    <tr><td>Atas Nama</td>
    <td><input type="text" name="atas_nama" id="atas_nama" value="<?php echo $b;?>" class="form-control" readonly/></td>
    </tr>

<tr>
<td>Nominal yang di Bayarkan</td>
<td><input type="text" name="nominal" id="nominal" onchange="rupiah()" value="<?php echo $c;?>" class="form-control" readonly/></td>
</tr>
   <tr>
<td>Bukti Pembayaran</td>
<td colspan="2"><a href="../assets/img/pembayaran/<?php echo $d; ?>" class "perbesar"><img src='../assets/img/pembayaran/<?php echo $d; ?>' width='100' height='100'></a>
<input type="file" name="bukti"></td></tr>

<tr><td>Status Data Konfirmasi Pembayaran</td>
      <td><select name="status" id="status" class="form-control">
        <option value="0" <?php if (!(strcmp(0, $e))) {echo "selected=\"selected\"";} ?>>Dalam Proses</option>
        <option value="1" <?php if (!(strcmp(1, $e))) {echo "selected=\"selected\"";} ?>>Lunas</option>
        <option value="2" <?php if (!(strcmp(2, $e))) {echo "selected=\"selected\"";} ?>>Di Tolak</option>
</select></td>
    </tr>
<input type="hidden" name="idadmin" id="idadmin" value="<?php echo $f; ?>"/>

<tr><td height="23">&nbsp;</td>
<td><input type="hidden" name="update" value="">
<button type="submit" class="btn btn-primary">Update</button>
<a href="datapembayaran.php" class="btn btn-default">Cancel</a></td></tr>

</table>
</form>
<?php include 'footer.php'; ?>