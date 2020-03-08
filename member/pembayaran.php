<?php include "header.php"; ?>
<?php
include "../koneksi.php";
$sql="SELECT * FROM pendaftaran WHERE nisn='".$_SESSION['id']."'";
$qry=mysql_query($sql)or die("gagal".mysql_error());
$d=mysql_fetch_array($qry);
$no_psb=$d['no_psb'];
?>
<?php
  $cekdata="SELECT no_psb from pembayaran WHERE no_psb='$no_psb'";
  $ada=mysql_query($cekdata) or die(mysql_error());
  if(mysql_num_rows($ada)==0)
  { 
     die("<script>alert('Silahkan upload bukti pembayaran Anda!');location.href='konfirmasi.php';</script>"); 
  }
  else{ echo "";
  }
?>
<?php
$tampil="SELECT * FROM pembayaran WHERE no_psb='$no_psb'";
$query=mysql_query($tampil)or die("Gagal".mysql_error());
$row=mysql_fetch_array($query);
$a=$row['no_psb'];
$b=$row['atas_nama'];
$c=$row['tgl_bayar'];
$d=$row['nominal'];
$e=$row['bukti_pembayaran'];
$f=$row['status'];
function rupiah($angka){
  $hasil_rupiah="Rp " . number_format($angka,2,',',',');
  return $hasil_rupiah;
}
?>
<br><br><br/>
    <p align="center">Selamat Datang Saudara: <?php echo $_SESSION['member']; ?> Berikut Data Pembayaran Anda</p>

<table width="70%" border="1" align="center">
  <tr>
    <td width="19%" rowspan="4"><a href="../assets/img/pembayaran/<?php echo $e; ?>" target="_blank" class "perbesar"><img src="../assets/img/pembayaran/<?php echo $e; ?>" width="200"/></a></td>
    <td width="19%">No PSB</td>
    <td><?php echo $a; ?></td>
    </tr>
  <tr>
    <td>Atas Nama</td>
    <td><?php echo $b; ?></td>
    </tr>
  <tr>
    <td>Tanggal Bayar</td>
    <td><?php echo date('d M Y', strtotime($row['tgl_bayar'])); ?></td>
    </tr>
  <tr>
    <td>Nominal yang dibayarkan</td>
    <td><?php echo rupiah($d); ?></td>
    </tr>
  <tr>
    <td colspan="3" align="center">Status pendaftaran Anda :  <?php
    if ($f == 1) {echo "<a class='btn btn-success'<i class='icon-list icon-white'></i><b>Diterima</b></a>";} 
    elseif ($f == 2){ echo "<a class='btn btn-danger' <i class='icon-list icon-white'></i><b>Di Tolak</b</a>";}
    else {
    	echo "<a class='btn btn-warning'<i class='icon-list icon-white'></i><b>Menunggu</b></a>";
    }?>

       </td>
    </tr>
    <tr>
    <td colspan="3" align="center">Silahkan cetak form konfirmasi pembayaran Anda <a href="#" onclick="window.open('cetakpembayaran.php?print=ya&no_psb=<?php echo $a; ?>','popupwindow','scrollbars=yes, width=750,height=600');">Disini</a></td>
    </tr>
    </table>
<?php include "footer.php"; ?>