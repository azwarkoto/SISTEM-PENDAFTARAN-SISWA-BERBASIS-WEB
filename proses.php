<?php
ob_start();
include("koneksi.php");
    $a=$_POST['no_psb'];
    $b=$_POST['nisn'];
    $pass=mysql_real_escape_string($_POST['password']);
    $c=md5($pass);
    $d=$_POST['nama'];
    $e=$_POST['tempat_lahir'];
    $f=$_POST['tgl_lahir'];
    $g=$_POST['jkel'];
    $h=$_POST['gol_drh'];
    $i=$_POST['alamat'];
    $j=$_POST['agama'];
    $k=$_POST['warga_negara'];
    $l=$_POST['wali'];
    $m=$_POST['alamat_wali'];
    $n=$_POST['telepon'];
    $o=$_POST['pekerjaan_wali'];
    $p=$_POST['pendidikan_wali'];
    $q=$_POST['no_ijazah'];
    $foto=$_FILES['foto']['name'];
    $tmp=$_FILES['foto']['tmp_name'];
    $r=date('dmYHis').$foto;
    $s=$_POST['tgl_daftar'];
    $path = "assets/img/pendaftar/".$r;
    ?>
    <!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIPENSI</title>
    <link rel="shortcut icon" href="../assets/img/baru.jpg">

    <script>
    function tab(){
      window.open("tampil.php?no_psb=<?=$a;?>","_blank");
    }
</script>
</head>
<body>
<?php
if (!empty($a)) {
    echo "";
}
else {
    die ("<script>alert('No PSB Harus di Isi!');history.go(-1);</script>");
}

if (!empty($b)) {
    echo "";
}
else {
    die ("<script>alert('NISN Harus di Isi!');history.go(-1);</script>");
}

if (!empty($c)) {
    echo "";
}
else {
    die ("<script>alert('Password Harus di Isi!');history.go(-1);</script>");
}

if (!empty($d)) {
    echo "";
}
else {
    die ("<script>alert('Nama Harus di Isi!');history.go(-1);</script>");
}

if (!empty($e)) {
    echo "";
}
else {
    die ("<script>alert('Tempat Lahir Harus di Isi!');history.go(-1);</script>");
}

if (!empty($f)) {
    echo "";
}
else {
    die ("<script>alert('Tanggal Lahir Harus di Isi!');history.go(-1);</script>");
}

if (!empty($g)) {
    echo "";
}
else {
    die ("<script>alert('Jenis Kelamin Harus di Isi!');history.go(-1);</script>");
}

if (!empty($h)) {
    echo "";
}
else {
    die ("<script>alert('Golongan Darah Harus di Isi!');history.go(-1);</script>");
}

if (!empty($i)) {
    echo "";
}
else {
    die ("<script>alert('Alamat Harus di Isi!');history.go(-1);</script>");
}

if (!empty($j)) {
    echo "";
}
else {
    die ("<script>alert('Agama Harus di Isi!');history.go(-1);</script>");
}

if (!empty($k)) {
    echo "";
}
else {
    die ("<script>alert('Warga Negara Harus di Isi!');history.go(-1);</script>");
}

if (!empty($l)) {
    echo "";
}
else {
    die ("<script>alert('Nama Wali Harus di Isi!');history.go(-1);</script>");
}

if (!empty($m)) {
    echo "";
}
else {
    die ("<script>alert('Alamat Wali Harus di Isi!');history.go(-1);</script>");
}

if (!empty($n)) {
    echo "";
}
else {
    die ("<script>alert('No Telepon Harus di Isi!');history.go(-1);</script>");
}

if (!empty($o)) {
    echo "";
}
else {
    die ("<script>alert('Pekerjaan Wali Harus di Isi!');history.go(-1);</script>");
}

if (!empty($p)) {
    echo "";
}
else {
    die ("<script>alert('Pendidikan Wali Or Harus di Isi!');history.go(-1);</script>");
}

if (!empty($q)) {
    echo "";
}
else {
    die ("<script>alert('No Ijazah Harus di Isi!');history.go(-1);</script>");
}

if (!empty($r)) {
    echo "";
}
else {
    die ("<script>alert('Foto Harus di Isi!');history.go(-1);</script>");
}

if(move_uploaded_file($tmp, $path)){
$sql1="INSERT INTO calon_siswa values('$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s')";
$sql2="INSERT INTO pendaftaran values('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o','$p','$q','$r','$s')";
$qry1=mysql_query($sql1,$koneksi);
$qry2=mysql_query($sql2,$koneksi);
if($qry1) {
       echo "<script>alert('Berhasil terdaftar silahkan login dengan NISN dan Password yang telah Anda buat di menu login');location.href='login.php';</script>";
}
}
else {
    echo "<script>alert('Maaf Data Gagal Tersimpan!');history.go(-1);</script>";
}
ob_flush();
?>
</body>
</html>