<?php
// sesuai kan root file mPDF anda
date_default_timezone_set('Asia/Jakarta');
// sesuai kan root file mPDF anda
$nama_dokumen='Laporan Data Siswa'; //Beri nama file PDF hasil.
include_once("../assets/mpdf60/mpdf.php"); //includekan ke file mpdf
 // Create new mPDF Document

//Beginning Buffer to save PHP variables and HTML tags
ob_start();
error_reporting(0);
include "../koneksi.php";
include "../fungsi_indotgl.php";
$header = include 'kop.php';
?>
<!--CONTOH Code START-->
<table border='0' cellpadding='3' cellspacing='1' width='700' style='font-family: "time news roman"; font-size: 12px; background: #ffffff;'>
    
    <!-- kop -->
    <tr>
        <td colspan='3' align='center'>LAPORAN DATA SISWA YANG DITERIMA SMA BUDAYA</td></tr>
        </table>
        <table border='1' cellpadding='0' cellspacing='0' width='100%'>

                          <tr align="center">
                            <th>No</th>
                            <th>NISN</th>
                            <th>Nama</th>
                            <th>TTL</th>
                            <th>JK</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Status</th>
                          </tr>
                        
                        <?php
                        $tampil=mysql_query("SELECT * FROM pendaftaran INNER JOIN pembayaran ON pembayaran.no_psb=pendaftaran.no_psb WHERE pembayaran.status=1 ORDER BY nisn ASC");
                        $no = 1;
             
                          while ($r=mysql_fetch_array($tampil)){
                        ?>
                            <tr>
                            <td align="center"><?php echo "$no"?></td>
                            <td align="center"><?php echo "$r[nisn]"?></td>
                            <td align="left"><?php echo "$r[nama]"?></td>
                            <td align="center"><?php echo date('d M Y', strtotime($r['tgl_lahir']));?></td>
                            <td align="center" width="20"><?php echo "$r[jkel]"?></td>
                            <td align="left"><?php echo "$r[alamat]"?></td>
                            <td align="center"><?php echo "$r[telepon]"?></td>
                            <?php if ($r['status'] == 1) {echo "<td align='center'>Diterima</td>";}
     	elseif ($r['status']==2){echo "<td align='center'>Di Tolak</td>";}
     	else {
     		echo "<td align='center'>Dalam Proses</td>";
     	} ?>
                            </tr>

                        <?php
                        $no++;
                        }
                        ?>
                       
                      </table>
                <tr>
                <td colspan='7'>
                     <i><b><font color="red">*</font>TTL</b>: Tempat Tanggal Lahir</i><br/>
                     <i><b><font color="red">*</font>JK</b>: Jenis Kelamin</i>
                </td>
              </tr>

                      <br> <br>
                      <?php 
                      $tanggal =tgl_indo(date('Y-m-d'));
                      ?>
                      <p align="right"> Jakarta, <?php echo "$tanggal"?>
                      <br><br><br><br></p>
                     <p align="right"> Kepala Sekolah </p>

<?php
//Batas file sampe sini
$content = ob_get_clean();


$footer = '<p align="right">
           Dicetak pada: '.date("d-m-Y H:i:s").'</p>';
try {
    $mpdf=new mPDF('utf-8', 'A4', 10, 'times new roman');
    $mpdf->SetTitle("Cetak Laporan Siswa");
    $mpdf->setHTMLFooter($footer);
    $mpdf->WriteHTML($content);
    $mpdf->Output($nama_dokumen.".pdf" ,'I');
} catch(Exception $e) {
    echo $e;
exit;
}
?>        