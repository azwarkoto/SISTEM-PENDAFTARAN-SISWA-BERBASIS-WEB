<?php
include "koneksi.php";
$qry_psb = "SELECT max(no_psb) as maxPsb FROM pendaftaran";
$hsl_psb = mysql_query($qry_psb);
$dt_psb = mysql_fetch_array($hsl_psb);
$kd_psb = $dt_psb['maxPsb'];
$noUrut_psb = (int) substr($kd_psb, 3, 3);
$noUrut_psb++;
$charpsb = "000";
$newIDpsb = $charpsb . sprintf("%03s", $noUrut_psb);

date_default_timezone_set('Asia/Jakarta');
$tgl=date("Y-m-d");
?>
<?php include "header.php"; ?>
    <center><h2>Form Pendaftaran</h2></center>
       <form id="form1" name="form1" method="post" action="proses.php" enctype="multipart/form-data">
     <center><b><i class="glyphicon glyphicon-user"></i> Data Calon Siswa</b></center>
<table width="53%" border="0" align="center">

<tr>
<td colspan="7" align="center"><h2 style="font:Tahoma, Geneva, sans-serif; color: #30F;"></h2></td>
</tr>

<tr>
<td>NISN</td>
<td><input type="text" name="nisn" id="nisn" maxlength="10" class="form-control"></textarea></td>
</tr>

<tr>
<td>Password</td>
<td><input type="password" name="password" id="password" maxlength="32" class="form-control"/></td>
<td>&nbsp;<input type="checkbox" onclick="myFunction()"> Show Password</td>
</tr>
<script>
function myFunction() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>

<tr>
<td>Nama</td>
<td><input type="text" name="nama" id="nama" class="form-control"/></td>
</tr>

<tr>
<td>Tempat Lahir</td>
<td><input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"/></td>
</tr>

<tr>
<td>Tanggal Lahir </td>
<td><input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required/></td>
</tr>

<tr>
<td>Jenis Kelamin</td>
<td><input type="radio" name="jkel" value="L">Laki Laki  <input type="radio" name="jkel" value="P">Perempuan</td>
</tr>

<tr>
<td>Gol Darah</td>
<td><input type="radio" name="gol_drh" value="A">&nbsp;A&nbsp;&nbsp;<input type="radio" name='gol_drh' value="B">&nbsp;B&nbsp;&nbsp;<input type="radio" name="gol_drh" value="AB">&nbsp;AB&nbsp;&nbsp;<input type="radio" name="gol_drh" value="O">&nbsp;O&nbsp;&nbsp;<input type="radio" name="gol_drh" value=""><i>(Tidak Tahu)</i></td>
</tr>

<tr>
<td>Alamat Lengkap</td>
<td><textarea name="alamat" id="alamat" cols="45" rows="3" class="form-control"></textarea></td>
</tr>

<tr>
<td>Agama</td>
<td><select name="agama" class="form-control">
                <option value="">Pilih Agama</option>
                <option value="Islam">Islam</option>
                <option value="Protesta">Protestan</option>
                <option value="Katolik">Katolik</option>
                 <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Kong Hu Cu">Kong Hu Cu</option>
</select></td>
</tr>

<tr>
<td>Warga Negara</td>
<td><input type="radio" name="warga_negara" value="WNI">WNI&nbsp;
<input type="radio" name="warga_negara" value="WNA">WNA</td>
</tr>

<tr>
<td>No Ijazah</td>
<td><input type="text" name="no_ijazah" id="no_ijazah" maxlength="15" class="form-control"></textarea></td>
</tr>

<tr>
<td>Upload Ijazah / SKL</td>
<td><input type="file" name="foto"></td>
</tr>

<tr><td colspan="3"><br><p align="center"><b><i class="glyphicon glyphicon-user"></i> Data Orang Tua / Wali</b></p></td></tr>

<tr>
<td>Nama Wali</td>
<td><input type="text" name="wali" id="wali" class="form-control"/></td>
</tr>

<tr>
<td>Alamat Lengkap</td>
<td><textarea name="alamat_wali" id="alamat_wali" cols="45" rows="3" class="form-control"></textarea></td>
</tr>

<tr>
<td>No Telepon</td>
<td><input type="text" name="telepon" id="telepon" maxlength="13" class="form-control"/></td>
</tr>

<tr>
<td>Pekerjaan Wali</td>
<td><input type="text" name="pekerjaan_wali" id="pekerjaan_wali" class="form-control"/>
                </td>
            </tr>

<tr>
<td>Pendidikan Wali</td>
<td><select name="pendidikan_wali" class="form-control">
                <option value="">Pilih Pendidikan</option>
                <option value="Tidak Sekolah">Tidak Sekolah</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
                <option value="D1">D1</option>
                <option value="D2">D2</option>
                <option value="D3">D3</option>
                <option value="S1">S1</option>
                <option value="S2">S2</option>
                <option value="S3">S3</option>
</select>
</td></tr>

<tr>
<td>&nbsp;</td>
<td>
<input type="hidden" name="save" value="">
<button type="submit" class="btn btn-primary" onclick="return confirm('Simpan Data?')">Simpan</button>
<button type="reset" class="btn btn-default">Ulangi</button>
</td></tr>

</table>

<p>

  <input type="hidden" name="no_psb" value="<?php echo $newIDpsb;?>"/>

  <input type="hidden" name="tgl_daftar" value="<?php echo $tgl;?>"/>

  <input type="hidden" name="status" value="0">

</p>
</form>
<?php include "footer.php"; ?>