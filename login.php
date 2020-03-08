<!DOCTYPE html>
<html>
<link rel="shortcut icon" href="assets/img/baru.jpg">
<head>
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="assets/css/mystyle.css" />
  </head>
  <body bgcolor="lightblue">
  <font color="green" style="font-family: 'Comic Sans MS'">
  <h2 align="center">Selamat Datang di Pendaftaran Siswa Baru</h2>
  <h2 align="center">SMA BUDAYA JAKARTA</h2> 
  <div class="center">
  <?php 
  if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "logout"){
      echo "<script>alert('Anda telah berhasil logout');location.href='login.php';</script>";
    }else if($_GET['pesan'] == "belum_login"){
      echo "<script>alert('Anda harus login untuk mengakses ruang pendaftar');location.href='login.php';</script>";
    }
  }
  ?>
<form action="cek_login.php" method="POST">
  <div class="imgcontainer">
    <img src="assets/img/baru.jpg" alt="Siswa" class="siswa" width="200" height="200">
  </div>

  <div class="container" align="center">
    <label><b><font color="black">NISN</b></label>
    <input type="text" placeholder="Enter NISN" name="nisn" required>

    <label><b>Kata Sandi</b></label></font>
    <input type="password" placeholder="Enter Kata Sandi" name="password" id="password" required>
    <input type="checkbox" onclick="myFunction()">Show Password
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
        
    <button type="submit" value="login">Masuk</button>
    <button type="reset" onclick="window.location='index.php';">Kembali ke Beranda</button>
</div>
</form>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright text-muted small" align="center">Copyright &copy; Arif Hidayat & Azwar Anas Gusti 2018.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>