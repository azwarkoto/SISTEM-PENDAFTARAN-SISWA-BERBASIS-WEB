<?php include "header.php"; ?>
           <div class="container">
<center><h3>&nbsp;</h3>
  <h3><b>Data Siswa</b></h3>
</center>
<p>&nbsp;  </p>

  <?php
ob_start();
include("../koneksi.php");
?>
<form action="searchsiswa.php" method="get">
  <input type="text" name="cari" maxlength="10" placeholder="Masukan NISN Anda!" minlength="1" required>
  <input type="submit" value="Cari">
</form>
<?php
$halaman = 10;
$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
$mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$tampil= mysql_query("SELECT * FROM calon_siswa order By nisn DESC");
$jumlah=mysql_num_rows($tampil);
$pages = ceil($jumlah/$halaman);
$qry=mysql_query("SELECT * FROM calon_siswa order By nisn DESC LIMIT $mulai, $halaman") or die ("gagal".mysql_error());
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
  <td><b>No</b> </td> 
  <td><b>NIS</b></td> 
  <td><b>Nama</b></td>
  <td><b>Tempat Tanggal Lahir</b></td>
  <td><b>Status</b> </td>
  <td colspan="3"><b>Proses</b></td>
  </tr>

   <?php
   while ($row=mysql_fetch_array($qry))
  {
    $a=$row['nisn'];
    $b=$row['nama'];
    $c=$row['tempat_lahir'];
    $d=$row['wali'];
    $qStatus="SELECT * FROM pembayaran WHERE atas_nama='$d'";
$Stat=mysql_query($qStatus)or die("gagal".mysql_error());
$res=mysql_fetch_array($Stat);
$d=$res['status'];

  ?>
  <tr>
    <td align="center"><?php echo $no++;?></td>
    <td align="center"><?php echo $a;?></td>
    <td><?php echo $b;?></td>
    <td align="center"><?php echo $c;?>, <?php echo date('d M Y', strtotime($row['tgl_lahir'])); ?></td>
    <?php
    if ($d==1) {echo "<td align='center'><a href='#' class='btn btn-success'>Diterima</a></td>";}
     	elseif ($d==2){echo "<td align='center'><a href='#' class='btn btn-danger'>Ditolak</a></td>";}
     	else {
     		echo "<td align='center'><a href='#' class='btn btn-warning'>Dalam Proses</a></td>";
     }?>
    </td>
    <td align="center" width="23%">
    <button class="btn btn-success" onclick="window.open('detailsiswa.php?nisn=<?php echo $a; ?>','popupwindow','scrollbars=yes, width=750,height=600');"><i class="glyphicon glyphicon-open"></i> Detail</button>
    <a href="editsiswa.php?nisn=<?=$a;?>" class="btn btn-small btn-info"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
    <a href="hapussiswa.php?nisn=<?=$a;?>" onclick="return confirm('Anda Yakin Ingin Mengapus Item Ini?');" class="btn btn-small btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</a> 
    </td>
    </tr>

    <?php
    } ?>
    </table>
    <nav aria-label="Page navigation example">
  <ul class="pager">
<?php
if($page == 1){ ?>
<li class="page-item disabled"><a class="page-link" href="#">Pertama</a></li>
<li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
<?php
}else{ 
  $link_prev = ($page > 1)? $page - 1 : 2;
  ?>
<li class="page-item"><a class="page-link" href="datasiswa.php?halaman=1">Pertama</a></li>
<li class="page-item"><a class="page-link" href="datasiswa.php?halaman=<?php echo $link_prev; ?>"> &laquo;</a></li>
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
            <li class="page-item"><a class="page-link" href="datasiswa.php?halaman=<?php echo $link_next; ?>">&raquo;</a></li>
            <li class="page-item"><a class="page-link" href="datasiswa.php?halaman=<?php echo $pages; ?>">Terakhir</a></li>
            <?php } ?>
</div>
        </div>
<?php include "footer.php"; ?>