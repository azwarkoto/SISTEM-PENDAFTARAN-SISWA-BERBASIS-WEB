<?php include "header.php"; ?>
    <br><br><br>
    <p align="center">Selamat Datang Saudara: <?php echo $_SESSION['idn']; ?> mohon dikelola dengan bijak aplikasinya.</p>
     <center>
 <div id="slider_container_2">
   <div id="SliderName_2" class="SliderName_2">
    <img src="../assets/slide/images/slider.jpg" width="1000px" height="236px" alt="Selamat Datang" title="Selamat Datang"/>
     <div class="SliderName_2Description">Featured model: <strong>Charlize Theron</strong></div>
    <img src="../assets/slide/images/slider14.jpg" width="1000px" height="236px" alt="Selamat Datang" title="Selamat Datang" />
     <div class="SliderName_2Description">Featured model: <strong>Charlize Theron</strong></div>
    <img src="../assets/slide/images/slider15.jpg" width="700" height="450" alt="Selamat Datang" title="Selamat Datang" />
     <div class="SliderName_2Description">Featured model: <strong>Charlize Theron</strong></div>
     <img src="../assets/slide/images/slider16.jpg" width="700" height="450" alt="Selamat Datang" title="Selamat Datang" />
     <div class="SliderName_2Description">Featured model: <strong>Charlize Theron</strong></div>
     <img src="../assets/slide/images/slider12.jpg" width="700" height="450" alt="Selamat Datang" title="Selamat Datang" />
     <div class="SliderName_2Description">Featured model: <strong>Charlize Theron</strong></div>
     <img src="../assets/slide/images/slider5.jpg" width="700" height="450" alt="Selamat Datang" title="Selamat Datang" />
     <div class="SliderName_2Description">Featured model: <strong>Charlize Theron</strong></div>
  </div>
 <script type="text/javascript">
    effectsSlide = 'rain,stairs,fade,blinds';
    var gezzSlider = Slidergezz.slider({container: 'SliderName_2', width: 1000, height: 236, effects: effectsSlide,
     display: {
      autoplay: 3000,
      loading: {background: '#ffffff', opacity: 0.1, image: 'vendor/images/loading-slide.gif'},
      buttons: {hide: true, opacity: 1, prev: {className: 'SliderNamePrev_2', label: ''}, next: {className: 'SliderNameNext_2', label: ''}}
      }
    });
    </script></center>
<br>
            
            <p align="center"><b>Rekap Data Saat Ini</b></p>

            <p align="center"><img src='../assets/img/murid.png'/ width="40" height="49"><b> Jumlah Data Pendaftar:</b> <?php
            include("../koneksi.php");
            $tampil= mysql_query("SELECT * FROM pendaftaran order By no_psb DESC");
            $jumlah=mysql_num_rows($tampil);
            ?>
            <a class="btn btn-info" <i class="icon-list icon-white"></i><b><?php echo $jumlah; ?> Record</b></a> </p>

            <p align="center"><img src='../assets/img/money.png'/ width="40" height="49"><b> Jumlah Data Konfirmasi Pembayaran :</b> <?php
            include("../koneksi.php");
            $tampil= mysql_query("SELECT * FROM pembayaran order By no_psb DESC");
            $jumlah=mysql_num_rows($tampil);
            ?>
            <a class="btn btn-info" <i class="icon-list icon-white"></i><b><?php echo $jumlah; ?> Record</b></a> </p>

            <p align="center"><img src='../assets/img/diterima.png'/ width="40" height="49"><b> Jumlah Data Siswa Diterima:</b> <?php
            include("../koneksi.php");
            $tampil= mysql_query("SELECT * FROM pembayaran where status=1");
            $jumlah=mysql_num_rows($tampil);
            ?>
            <a class="btn btn-info" <i class="icon-list icon-white"></i><b><?php echo $jumlah; ?> Record</b></a> </p>
<?php include "footer.php"; ?>