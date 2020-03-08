<?php
session_start();
if (!isset($_SESSION['idn'])){
header("Location:./index.php?pesan=belum_login");
}
ob_start();
include("../koneksi.php");
$sql="SELECT * FROM pendaftaran WHERE nisn='".$_GET['nisn']."'";
$qry=mysql_query($sql)or die("gagal".mysql_error());
$d=mysql_fetch_array($qry);
$p=$d['no_psb'];
    $a=$_POST['nama'];
    $b=$_POST['tempat_lahir'];
    $c=$_POST['tgl_lahir'];
    $d=$_POST['jkel'];
    $e=$_POST['gol_drh'];
    $f=$_POST['alamat'];
    $g=$_POST['agama'];
    $h=$_POST['warga_negara'];
    $i=$_POST['wali'];
    $j=$_POST['alamat_wali'];
    $k=$_POST['telepon'];
    $l=$_POST['pekerjaan_wali'];
    $m=$_POST['pendidikan_wali'];
    $n=$_POST['no_ijazah'];
    $foto=$_FILES['foto']['name'];
    $tmp=$_FILES['foto']['tmp_name'];
    $o=date('dmYHis').$foto;
    $path="../assets/img/pendaftar/".$o;
 if (!empty($a)) {
    echo "";
}
else {
    die ("<script>alert('Nama Harus di Isi!');history.go(-1);</script>");
}

if (!empty($b)) {
    echo "";
}
else {
    die ("<script>alert('Tempat Lahir Harus di Isi!');history.go(-1);</script>");
}

if (!empty($c)) {
    echo "";
}
else {
    die ("<script>alert('Tanggal Lahir Harus di Isi!');history.go(-1);</script>");
}

if (!empty($d)) {
    echo "";
}
else {
    die ("<script>alert('Jenis Kelamin Harus di Isi!');history.go(-1);</script>");
}

if (!empty($e)) {
    echo "";
}
else {
    die ("<script>alert('Golongan Darah Harus di Isi!');history.go(-1);</script>");
}

if (!empty($f)) {
    echo "";
}
else {
    die ("<script>alert('Alamat Harus di Isi!');history.go(-1);</script>");
}

if (!empty($g)) {
    echo "";
}
else {
    die ("<script>alert('Agama Harus di Isi!');history.go(-1);</script>");
}

if (!empty($h)) {
    echo "";
}
else {
    die ("<script>alert('Warga Negara Harus di Isi!');history.go(-1);</script>");
}

if (!empty($i)) {
    echo "";
}
else {
    die ("<script>alert('Nama Wali Harus di Isi!');history.go(-1);</script>");
}

if (!empty($j)) {
    echo "";
}
else {
    die ("<script>alert('Alamat Wali Harus di Isi!');history.go(-1);</script>");
}

if (!empty($k)) {
    echo "";
}
else {
    die ("<script>alert('No Telepon Harus di Isi!');history.go(-1);</script>");
}

if (!empty($l)) {
    echo "";
}
else {
    die ("<script>alert('Pekerjaan Wali Harus di Isi!');history.go(-1);</script>");
}

if (!empty($m)) {
    echo "";
}
else {
    die ("<script>alert('Pendidikan Wali Or Harus di Isi!');history.go(-1);</script>");
}

if (!empty($n)) {
    echo "";
}
else {
    die ("<script>alert('No Ijazah Harus di Isi!');history.go(-1);</script>");
}

if (!empty($o)) {
    echo "";
}
else {
    die ("<script>alert('Foto Harus di Isi!');history.go(-1);</script>");
}

if(move_uploaded_file($tmp, $path)){
		$query = "SELECT * FROM calon_siswa where nisn='".$_GET['nisn']."'";
		$sql = mysql_query($query,$koneksi); // Eksekusi/Jalankan query dari variabel $query
		$data = mysql_fetch_array($sql);

if(is_file("../assets/img/pendaftar".$data['foto'])) 
unlink("../assets/img/pendaftar".$data['foto']);

$ubah="UPDATE calon_siswa set nama='$a',tempat_lahir='$b',tgl_lahir='$c',jkel='$d',gol_drh='$e',alamat='$f',agama='$g',warga_negara='$h',wali='$i',alamat_wali='$j',telepon='$k',pekerjaan_wali='$l',pendidikan_wali='$m',no_ijazah='$n',foto='$o' where nisn='".$_GET['nisn']."'";
$update=mysql_query($ubah,$koneksi);
$qDaftar="UPDATE pendaftaran set nama='$a',tempat_lahir='$b',tgl_lahir='$c',jkel='$d',gol_drh='$e',alamat='$f',agama='$g',warga_negara='$h',wali='$i',alamat_wali='$j',telepon='$k',pekerjaan_wali='$l',pendidikan_wali='$m',no_ijazah='$n',foto='$o' where no_psb='$p'";
$sqlDaftar=mysql_query($qDaftar,$koneksi);
if($update) {
        echo "<script>alert('Data Anda Berhasil Tersimpan!');location.href='datasiswa.php';</script>";
}
else {
    echo "<script>alert('Maaf Data Gagal Tersimpan!');history.go(-1);</script>";
}
}
else {
	$qry="UPDATE calon_siswa set nama='$a',tempat_lahir='$b',tgl_lahir='$c',jkel='$d',gol_drh='$e',alamat='$f',agama='$g',warga_negara='$h',wali='$i',alamat_wali='$j',telepon='$k',pekerjaan_wali='$l',pendidikan_wali='$m',no_ijazah='$n' where nisn='".$_GET['nisn']."'";
	$sql=mysql_query($qry,$koneksi);
	$qDaftar2="UPDATE pendaftaran set nama='$a',tempat_lahir='$b',tgl_lahir='$c',jkel='$d',gol_drh='$e',alamat='$f',agama='$g',warga_negara='$h',wali='$i',alamat_wali='$j',telepon='$k',pekerjaan_wali='$l',pendidikan_wali='$m',no_ijazah='$n' where no_psb='$p'";
$sqlDaftar2=mysql_query($qDaftar2,$koneksi);
	
	if($sql) {
        echo "<script>alert('Data Anda Berhasil Tersimpan!');location.href='datasiswa.php';</script>";
}
else {
    echo "<script>alert('Maaf Data Gagal Tersimpan!');history.go(-1);</script>";
}
}
ob_flush();
?>