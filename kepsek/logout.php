<?php
session_start();
session_destroy();

//kembali/redirect ke halaman login.php
header('location:../admin/index.php?pesan=logout');
?>