<?php include "header.php"; ?>
<?php
include "../koneksi.php";
$tampil="SELECT * FROM pendaftaran WHERE nisn='".$_SESSION['id']."'";
$query=mysql_query($tampil)or die("gagal".mysql_error());
$row=mysql_fetch_array($query);
$a=$row['no_psb'];
$b=$row['nisn'];
$c=$row['nama'];
$d=$row['wali'];
$e=$row['jkel'];
$f=$row['agama'];
$g=$row['foto'];
$qStatus="SELECT * FROM pembayaran WHERE no_psb='$a'";
$Stat=mysql_query($qStatus)or die("gagal".mysql_error());
$res=mysql_fetch_array($Stat);
$h=$res['status'];
?>
<br><br><br>
    <p align="center">Selamat Datang Saudara: <?php echo $_SESSION['member']; ?> Berikut Data Diri Anda</p>

<table width="70%" border="1" align="center">
  <tr>
    <td width="19%" rowspan="6"><a href="../assets/img/pendaftar/<?php echo $g; ?>" target="_blank" class "perbesar"><img src="../assets/img/pendaftar/<?php echo $g; ?>" width="200"/></a></td>
    <td width="19%">NISN</td>
    <td><?php echo $b; ?></td>
    </tr>
  <tr>
    <td>Nama Lengkap</td>
    <td><?php echo $c; ?></td>
    </tr>
  <tr>
    <td>Nama Orang Tua/Wali</td>
    <td><?php echo $d; ?></td>
    </tr>
  <tr>
    <td>Jenis Kelamin</td>
    <td><?php echo $e; ?></td>
    </tr>
  <tr>
    <td>Agama</td>
    <td> <?php echo $f;?></td>
    </tr>
  <tr>
    <td>Tanggal Daftar</td>
    <td><?php echo date('d M Y', strtotime($row['tgl_daftar'])); ?></td>
  </tr>
  <tr>
    <td colspan="3" align="center">Status pendaftaran Anda :  <?php
    if ($h == 1) {echo "<a class='btn btn-success'<i class='icon-list icon-white'></i><b>Diterima</b></a>";} 
    elseif ($h == 2){ echo "<a class='btn btn-danger' <i class='icon-list icon-white'></i><b>Di Tolak</b</a>";}
    else {
    	echo "<a class='btn btn-warning'<i class='icon-list icon-white'></i><b>Menunggu</b></a>";
    }?>
        
        </td>
    </tr>
    <tr>
    <td colspan="3" align="center">Silahkan cetak forumlir pendaftaran terlebih dahulu <a href="#" onclick="window.open('cetakformulir.php?print=ya&no_psb=<?php echo $a; ?>','popupwindow','scrollbars=yes, width=750,height=600');">Disini</a></td>
    </tr>
    <tr>
    <td colspan="3" align="center">Upload bukti pembayaran Anda <a href="konfirmasi.php">Disini</a></td>
    </tr>
</table>
    <?php include "footer.php"; ?>