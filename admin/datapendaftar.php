<?php include "header.php"; ?>
<div class="container">
<center><h3>&nbsp;</h3>
  <h3><b>Data Pendaftar</b></h3>
</center>
<p>&nbsp;  </p>
  <?php
ob_start();
include("../koneksi.php");
?>
<form action="searchpendaftar.php" method="get">
  <input type="text" name="cari" maxlength="6" minlength="1" placeholder="Masukan No PSB!" required>
  <input type="submit" value="Cari">
</form>
<?php
$halaman = 10;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$tampil= mysql_query("SELECT * FROM pendaftaran order By no_psb DESC");
$jumlah=mysql_num_rows($tampil);
$pages = ceil($jumlah/$halaman);
$qry=mysql_query("SELECT * FROM pendaftaran order By no_psb DESC LIMIT $mulai, $halaman") or die ("gagal".mysql_error());
$no =$mulai+1;
?>
    <div class="row-fluid">
    <div class="span12">    
    <div class="well">
    <a class="btn btn-info" <i class="icon-list icon-white"></i> Total Data: <?php echo $jumlah; ?> Record</a>            
    </div>
    </div>
    </div>

<table class="table table-bordered">  
  <tr align="center">
  <td><b>No</b></td>
  <td><b>No PSB</b></td> 
  <td><b>NISN</b></td>
  <td><b>Nama</b></td>
  <td><b>Tempat Tanggal Lahir</b></td>
  <td><b>Status</b></td>
  <td colspan="3"><b>Proses</b></td>
  </tr>

   <?php
    while ($row=mysql_fetch_assoc($qry))
  {
    $a=$row['no_psb'];
    $b=$row['nisn'];
    $c=$row['nama'];
    $d=$row['tempat_lahir'];
    $qStatus="SELECT * FROM pembayaran WHERE no_psb='$a'";
$Stat=mysql_query($qStatus)or die("gagal".mysql_error());
$res=mysql_fetch_array($Stat);
$e=$res['status'];
  ?>
  <tr>
    <td align="center"><?php echo $no++;?></td>
    <td align="center"><?php echo $a;?></td>
    <td align="center"><?php echo $b;?></td>
    <td><?php echo $c;?></td>
    <td align="center"><?php echo $d; ?>, <?php echo date('d M Y', strtotime($row['tgl_lahir']));?></td>
    <?php
    if ($e==1) {echo "<td align='center'><a href='#' class='btn btn-success'>Diterima</a></td>";}
     	elseif ($e==2){echo "<td align='center'><a href='#' class='btn btn-danger'>Di Tolak</a></td>";}
     	else {
     		echo "<td align='center'><a href='#' class='btn btn-warning'>Dalam Proses</a></td>";
     }?>
    </td>
    <td align="center">
    <button class="btn btn-success" onclick="window.open('detailpendaftar.php?no_psb=<?php echo $a; ?>','popupwindow','scrollbars=yes, width=750,height=600');"><i class="glyphicon glyphicon-open"></i> Detail</button>
    <a href="editpendaftar.php?no_psb=<?=$a;?>" class="btn btn-small btn-info"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
    <a href="hapuspendaftar.php?no_psb=<?=$a;?>" onclick="return confirm('Anda Yakin Ingin Mengapus Item Ini?');" class="btn btn-small btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a> 
    </td>
    </tr>

    <?php } ?>
    </table>

<nav aria-label="Page navigation">
  <ul class="pager">	
<?php
if($page == 1){ ?>
<li class="page-item disabled"><a class="page-link" href="#">Pertama</a></li>
<li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
<?php
}else{ 
  $link_prev = ($page > 1)? $page - 1 : 2;
  ?>
<li class="page-item"><a class="page-link" href="datapendaftar.php?halaman=1">Pertama</a></li>
<li class="page-item"><a class="page-link" href="datapendaftar.php?halaman=<?php echo $link_prev; ?>"> &laquo;</a></li>
<?php } ?>
<?php for ($i=1; $i<=$pages ; $i++){ ?>
  <li class="page-item"><a class="page-link" href="?halaman=<?php echo $i; ?>"> <?php echo $i; ?></a></li>
 
  <?php } ?>
          <?php 
          if($page == $pages){ ?>
          <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
          <li class="page-item disabled"><a class="page-link" href="#">Terakhir</a></li>
          <?php        }else{
            $link_next = ($page < $pages)? $page + 1 : $pages; ?>
            <li class="page-item"><a class="page-link" href="datapendaftar.php?halaman=<?php echo $link_next; ?>">&raquo;</a></li>
            <li class="page-item"><a class="page-link" href="datapendaftar.php?halaman=<?php echo $pages; ?>">Terakhir</a></li>
            <?php } ?>
</div>
<?php include "footer.php"; ?>