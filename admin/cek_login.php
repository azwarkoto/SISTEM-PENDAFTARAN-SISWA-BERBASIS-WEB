<?php
ob_start();
include ("../koneksi.php");
$username=$_POST['username'];
$password=md5($_POST['password']);

$username = stripslashes($username); // menghapus backslash padatampilanphp
$password = stripslashes($password);
$username = mysql_real_escape_string($username); // memfilterkarakterkhususmisal '
$password = mysql_real_escape_string($password);

if (empty($username) || empty($password))
    {
    echo "<script>alert('Username dan Password Tidak Boleh Kosong');history.go(-1);</script>";
    }
else
    {
    $query=mysql_query("SELECT * FROM admin WHERE username='$username' and password='$password'", $koneksi);
    $cek=mysql_num_rows($query);
    $ambil = mysql_fetch_array($query);
    if ($cek==1)
        {
        session_start();
        $_SESSION['idn'] = $ambil['username'];
        $_SESSION['idk'] = $ambil['username'];
        if ($ambil['hak_akses']=="1")
            {
            header ('location:admin.php');
            }
        if ($ambil['hak_akses']=="2")
            {
            header ('location:../kepsek/index.php');
            }
        }
    else
        {
 echo "<center><br><br><br><br><br><br><b>GAGAL MASUK! </b><br> 

        Username atau Password Anda tidak benar.<br>";

        echo "<div><img src='../assets/img/hiks.gif'  height=300 width=300><br><br></a>

             </div>";

  echo "<input type=button class='tombol' value='ULANGI LAGI' onclick=location.href='index.php'></a></center>";
}
}
ob_end_flush();
?> 