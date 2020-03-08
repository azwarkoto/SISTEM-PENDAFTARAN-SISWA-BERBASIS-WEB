<?php include 'header.php'; ?>
<div class="container">
</div>
<?php
include("../koneksi.php");
$tampil="SELECT * FROM calon_siswa WHERE nisn='".$_GET['nisn']."'";
$qry=mysql_query($tampil)or die("gagal".mysql_error());
$row=mysql_fetch_array($qry);
$a=$row['nisn'];
$b=$row['nama'];
$c=$row['tempat_lahir'];
$d=$row['tgl_lahir'];
$e=$row['jkel'];
$f=$row['gol_drh'];
$g=$row['alamat'];
$h=$row['agama'];
$i=$row['warga_negara'];
$j=$row['no_ijazah'];
$k=$row['foto'];
$l=$row['wali'];
$m=$row['alamat_wali'];
$n=$row['telepon'];
$o=$row['pekerjaan_wali'];
$p=$row['pendidikan_wali'];
?>
   <br><br><h2 align="center">Edit Data Siswa</h2>
   <form id="form1" name="form1" method="post" action="updatesiswa.php?nisn=<?=$a;?>" enctype="multipart/form-data">
   <table width="53%" border="0" align="center">
   <tr><td colspan="7" align="center"><h2 style="font:Tahoma, Geneva, sans-serif; color: #30F;"></h2></td></tr>
    
    <tr><td>NIS</td>
    <td><input type="text" name="nisn" id="nisn" value="<?php echo $a;?>" class="form-control" readonly/></td>
    </tr>

    <tr><td>Nama</td>
    <td><input type="text" name="nama" id="nama" value="<?php echo $b;?>" class="form-control" required/></td>
    </tr>

    <tr><td>Tempat Lahir</td>
    <td><input type="text" name="tempat_lahir" id="tempat_lahir" value="<?php echo $c;?>" class="form-control" required/></td>
    </tr>

    <tr>
    <td>Tanggal Lahir </td>
    <td><input type="date" name="tgl_lahir" id="tgl_lahir" value="<?php echo $d;?>" class="form-control" required/>
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

<tr><td>Upload Ijazah</td>
<td colspan="2"><a href="../assets/img/pendaftar/<?php echo $k; ?>" class "perbesar"><img src='../assets/img/pendaftar/<?php echo $k; ?>' width='100' height='100'></a>
<input type="file" name="foto"></td></tr> 


<tr><td colspan="3"><br><p align="center"><b>Data Wali</b></p></td></tr>

<tr><td>Nama Wali</td>
<td><input type="text" name="wali" id="wali" value="<?php echo $l;?>" class="form-control" required/></td></tr>

<tr>
<td>Alamat Wali</td>
<td><textarea name="alamat_wali" id="alamat_wali" cols="45" rows="3" class="form-control" required><?php echo $m;?></textarea></td>
</tr>

<tr><td>No Telepon</td>
<td><input type="text" name="telepon" id="telepon" value="<?php echo $n;?>" class="form-control" required/></td></tr>

<tr>
<td>Pekerjaan Wali</td>
<td><input type="text" name="pekerjaan_wali" id="pekerjaan_wali" class="form-control" value="<?php echo $o;?>" required/></td></tr>

<tr><td>Pendidikan Wali</td>
<td><select name="pendidikan_wali" class="form-control" required>
                <option value="">Pilih Pendidikan</option>
                <option value="Tidak Sekolah">Tidak Sekolah</option>
                <option value="SD"<?php if($p=='SD'){echo 'selected';}?>>SD</option>
                <option value="SMP"<?php if($p=='SMP'){echo 'selected';}?>>SMP</option>
                <option value="SMA"<?php if($p=='SMA'){echo 'selected';}?>>SMA</option>
                <option value="D1"<?php if($p=='D1'){echo 'selected';}?>>D1</option>
                <option value="D2"<?php if($p=='D2'){echo 'selected';}?>>D2</option>
                <option value="D3"<?php if($p=='D3'){echo 'selected';}?>>D3</option>
                <option value="S1"<?php if($p=='S1'){echo 'selected';}?>>S1</option>
                <option value="S2"<?php if($p=='S2'){echo 'selected';}?>>S2</option>
                <option value="S3"<?php if($p=='S3'){echo 'selected';}?>>S3</option>
</select></td></tr>

<tr><td height="23">&nbsp;</td>
<td><input type="hidden" name="update" value="">
<button type="submit" class="btn btn-primary">Update</button>
<a href="datasiswa.php" class="btn btn-default">Cancel</a></td></tr>

</table>
</form>
<?php include 'footer.php'; ?>