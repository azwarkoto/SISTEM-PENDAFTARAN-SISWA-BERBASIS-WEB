<?php include 'header.php'; ?>
       <div class="container">
 
   
<center><h3>&nbsp;</h3>
  <h3><b>Hasil Pencarian</b></h3>
</center>
<p>&nbsp;  </p>   
<?php
include("../koneksi.php");
?>
 <body BGCOLOR="greek">
<form action="searchsiswa.php" method="get">
  <input type="text" name="cari" maxlength="10" minlength="1" placeholder="Masukan NISN!" required>
  <input type="submit" value="Cari">
</form>

 
<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$tampil="SELECT * FROM calon_siswa order By nisn";
$qry=mysql_query($tampil) or die ("gagal".mysql_error());
$jumlah=mysql_num_rows($qry);
?>
     <div class="row-fluid">
    <div class="span12">    
    <div class="well">
    <a class="btn btn-secondary" <i class="icon-list icon-white"></i> Total Data: <?php echo $jumlah; ?> Record</a> 
    </div>
    </div>
    </div>

    <table class="table table-bordered">  
  <tr align="center">
  <td><b>No</b></td>
  <td><b>NISN</b></td>
  <td><b>Nama</b></td> 
  <td><b>Tempat Tanggal Lahir</b></td>
  <td><b>Status</b></td>
  <td colspan="3"><b>Proses</b></td>
  </tr>
  <?php 
  if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $data = mysql_query("select * from calon_siswa where nisn like '%".$cari."%'");       
  }else{
    $data = mysql_query("select * from calon_siswa");   
  }
  $no=1;
  while($d = mysql_fetch_array($data)){
  $a=$d['wali'];
  ?>
  <tr>
    <td align="center"><?php echo $no;?></td>
    <td align="center"><?php echo $d['nisn'];?></td>
    <td><?php echo $d['nama']; ?></td>
    <td align="left"><?php echo $d['tempat_lahir']; ?>, <?php echo date('d M Y', strtotime($d['tgl_lahir']));?></td>
    <?php
    $qStatus="SELECT * FROM pembayaran WHERE atas_nama='$a'";
$Stat=mysql_query($qStatus)or die("gagal".mysql_error());
$res=mysql_fetch_array($Stat);
$x=$res['status'];
    if ($x==1) {echo "<td align='center'><a href='#' class='btn btn-success'>Diterima</a></td>";}
     	elseif ($x==2){echo "<td align='center'><a href='#' class='btn btn-danger'>Ditolak</a></td>";}
     	else {
     		echo "<td align='center'><a href='#' class='btn btn-warning'>Dalam Proses</a></td>";
     }?>
    </td>
    <td>
    <button class="btn btn-success" onclick="window.open('detailsiswa.php?nisn=<?php echo $d['nisn']; ?>','popupwindow','scrollbars=yes, width=750,height=600');"><i class="glyphicon glyphicon-open"></i> Detail</button>
     <a href="editsiswa.php?nisn=<?=$d['nisn'];?>" class="btn btn-small btn-info"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
    <a href="hapussiswa.php?nisn=<?=$d['nisn'];?>" onclick="return confirm('Anda Yakin Ingin Mengapus Item Ini?');" class="btn btn-small btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a> 
    </td>
    </tr>

    <?php $no++;
    } ?>
    </table>
        </div>
<?php include 'footer.php'; ?>