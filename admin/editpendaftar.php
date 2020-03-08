<?php include "header.php"; ?>
<div class="container">
</div>
<?php
include("../koneksi.php");
$tampil="SELECT * FROM pendaftaran WHERE no_psb='".$_GET['no_psb']."'";
$qry=mysql_query($tampil)or die("gagal".mysql_error());
$row=mysql_fetch_array($qry);
$a=$row['no_psb'];
$b=$row['nisn'];
$c=$row['nama'];
$d=$row['tempat_lahir'];
$e=$row['jkel'];
$f=$row['gol_drh'];
$g=$row['alamat'];
$h=$row['agama'];
$i=$row['warga_negara'];
$j=$row['no_ijazah'];
$k=$row['wali'];
$l=$row['alamat_wali'];
$m=$row['telepon'];
$n=$row['pekerjaan_wali'];
$o=$row['pendidikan_wali'];
$p=$row['foto'];
$q=$row['tgl_lahir'];
?>   
   <br><br>
   <form id="form1" name="form1" method="post" action="updatependaftar.php?no_psb=<?=$a;?>" enctype="multipart/form-data">
   <center>
   <h2>Edit Data Pendaftar</h2><b><i class="glyphicon glyphicon-user"></i> Data Calon Siswa</b></center>
   <table width="53%" border="0" align="center">
   <tr><td colspan="7" align="center"><h2 style="font:Tahoma, Geneva, sans-serif; color: #30F;"></h2></td></tr>
    
    <tr><td>No PSB</td>
    <td><input type="text" name="no_psb" id="no_psb" value="<?php echo $a; ?>" class="form-control" readonly /></td>
    </tr>
    
    <tr><td>NISN</td>
    <td><input type="" name="nisn" id="nisn" value="<?php echo $b; ?>" class="form-control" readonly/></td>
    </tr>

    <tr><td>Nama</td>
    <td><input type="text" name="nama" id="nama" value="<?php echo $c;?>" class="form-control" required/></td>
    </tr>

    <tr><td>Tempat Lahir</td>
    <td><input type="text" name="tempat_lahir" id="tempat_lahir" value="<?php echo $d;?>" class="form-control" required/></td>
    </tr>

    <tr>
    <td>Tanggal Lahir </td>
    <td><input type="date" name="tgl_lahir" id="tgl_lahir" value="<?php echo $q; ?>" class="form-control" required/>
    </td>
    </tr>

    <tr><td>Jenis Kelamin</td>
    <td><?php
    if($e == "L"){
      echo "<input type='radio' name='jkel' value='L' checked='checked'>Laki-laki ";
      echo "<input type='radio' name='jkel' value='P'>Perempuan ";
    }else
    {
      echo "<input type='radio' name='jkel' value='L'>Laki-laki ";
      echo "<input type='radio' name='jkel' value='P' checked='checked'>Perempuan ";
    }
    ?></td>
    </tr>

    <tr><td>Gol Darah</td>
    <td><?php
    if($f == "A"){
      echo "<input type='radio' name='gol_drh' value='A' checked='checked'>A ";
      echo "<input type='radio' name='gol_drh' value='B'>B ";
      echo "<input type='radio' name='gol_drh' value='AB'>AB ";
      echo "<input type='radio' name='gol_drh' value='O'>O ";
      echo "<input type='radio' name='gol_drh' value='-'>Tidak Tahu ";
    }
    elseif($f == "B")
    {
      echo "<input type='radio' name='gol_drh' value='A'>A ";
      echo "<input type='radio' name='gol_drh' value='B' checked='checked'>B ";
      echo "<input type='radio' name='gol_drh' value='AB'>AB ";
      echo "<input type='radio' name='gol_drh' value='O'>O ";
      echo "<input type='radio' name='gol_drh' value='-'>Tidak Tahu ";
    }
    elseif($f == "AB")
    {
      echo "<input type='radio' name='gol_drh' value='A'>A ";
      echo "<input type='radio' name='gol_drh' value='B'>B ";
      echo "<input type='radio' name='gol_drh' value='AB' checked='checked'>AB ";
      echo "<input type='radio' name='gol_drh' value='O'>O ";
      echo "<input type='radio' name='gol_drh' value='-'>Tidak Tahu ";
    }
    elseif($f == "O")
    {
      echo "<input type='radio' name='gol_drh' value='A'>A ";
      echo "<input type='radio' name='gol_drh' value='B'>B ";
      echo "<input type='radio' name='gol_drh' value='AB'>AB ";
      echo "<input type='radio' name='gol_drh' value='O' checked='checked'>O ";
      echo "<input type='radio' name='gol_drh' value='-'>Tidak Tahu ";
    }
        else
    {
      echo "<input type='radio' name='gol_drh' value='A'>A ";
      echo "<input type='radio' name='gol_drh' value='B'>B ";
      echo "<input type='radio' name='gol_drh' value='AB'>AB ";
      echo "<input type='radio' name='gol_drh' value='O'>O ";
      echo "<input type='radio' name='gol_drh' value='-' checked='checked'>Tidak Tahu ";
    }
    ?>
    </td>
    </tr>

    <tr><td>Alamat Lengkap</td>
    <td><textarea name="alamat" cols="45" rows="3" class="form-control" required><?php echo $g;?></textarea></td></tr>

    <tr><td>Agama</td>
    <td><select name="agama" class="form-control" required>
                <option value="">Pilih Agama</option>
                <option value="Islam"<?php if($h=='Islam'){echo 'selected';}?>>Islam</option>
                <option value="Protestan"<?php if($h=='Protestan'){echo 'selected';}?>>Protestan</option>
                <option value="Katolik"<?php if($h=='Katolik'){echo 'selected';}?>>Katolik</option>
                <option value="Hindu"<?php if($h=='Hindu'){echo 'selected';}?>>Hindu</option>
                <option value="Budha"<?php if($h=='Budha'){echo 'selected';}?>>Budha</option>
                <option value="Kong Hu Cu"<?php if($h=='Kong Hu Cu'){echo 'selected';}?>>Kong Hu Cu</option>
    </select></td></tr>

    <tr><td>Warga Negara</td>
    <td><?php
    if($i == "WNI"){
      echo "<input type='radio' name='warga_negara' value='WNI' checked='checked'>WNI ";
      echo "<input type='radio' name='warga_negara' value='WNA'>WNA ";
    }else
    {
      echo "<input type='radio' name='warga_negara' value='WNI'>WNI ";
      echo "<input type='radio' name='warga_negara' value='WNA' checked='checked'>WNA ";
    }
    ?></td>
    </tr>

<tr><td>No Ijazah</td>
<td><input type="text" name="no_ijazah" id="no_ijazah" class="form-control" value="<?php echo $j;?>" maxlength="15" required/></td></tr>

<tr><td>Upload Ijazah / SKL</td>
<td colspan="2"><a href="../assets/img/pendaftar/<?php echo $p; ?>" class "perbesar"><img src='../assets/img/pendaftar/<?php echo $p; ?>' width='100' height='100'></a>
<input type="file" name="foto"></td></tr>

<tr><td colspan="3"><br><p align="center"><b><i class="glyphicon glyphicon-user"></i> Data Orang Tua / Wali</b></p></td></tr>

<tr><td>Nama Wali</td>
<td><input type="text" name="wali" id="wali" value="<?php echo $k;?>" class="form-control" required/></td></tr>

<tr>
<td>Alamat Lengkap</td>
<td><textarea name="alamat_wali" id="alamat_wali" cols="45" rows="3" class="form-control" required><?php echo $l;?></textarea></td>
</tr>

<tr><td>No Telepon</td>
    <td><input type="text" name="telepon" id="telepon" value="<?php echo $m;?>" class="form-control" required/></td></tr>

<tr>
<td>Pekerjaan Orang Tua</td>
<td><input type="text" name="pekerjaan_wali" id="pekerjaan_wali" class="form-control" value="<?php echo $n;?>" required/></td></tr>

<tr><td>Pendidikan Orang Tua</td>
<td><select name="pendidikan_wali" class="form-control" required>
                <option value="">Pilih Pendidikan</option>
                <option value="Tidak Sekolah">Tidak Sekolah</option>
                <option value="SD"<?php if($o=='SD'){echo 'selected';}?>>SD</option>
                <option value="SMP"<?php if($o=='SMP'){echo 'selected';}?>>SMP</option>
                <option value="SMA"<?php if($o=='SMA'){echo 'selected';}?>>SMA</option>
                <option value="D1"<?php if($o=='D1'){echo 'selected';}?>>D1</option>
                <option value="D2"<?php if($o=='D2'){echo 'selected';}?>>D2</option>
                <option value="D3"<?php if($o=='D3'){echo 'selected';}?>>D3</option>
                <option value="S1"<?php if($o=='S1'){echo 'selected';}?>>S1</option>
                <option value="S2"<?php if($o=='S2'){echo 'selected';}?>>S2</option>
                <option value="S3"<?php if($o=='S3'){echo 'selected';}?>>S3</option>
</select></td></tr>

<tr><td height="23">&nbsp;</td>
<td><input type="hidden" name="update" value="">
<button type="submit" class="btn btn-primary">Update</button>
<a href="datapendaftar.php" class="btn btn-default">Cancel</a></td></tr>

</table>
</form>
<?php include "footer.php"; ?>