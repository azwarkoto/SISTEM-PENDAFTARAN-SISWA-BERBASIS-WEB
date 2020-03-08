<?php
// sesuai kan root file mPDF anda
date_default_timezone_set('Asia/Jakarta');
// sesuai kan root file mPDF anda
$nama_dokumen='Laporan Data Pembayaran'; //Beri nama file PDF hasil.
include_once("../assets/mpdf60/mpdf.php"); //includekan ke file mpdf

//Beginning Buffer to save PHP variables and HTML tags
ob_start();
error_reporting(0);
include "../koneksi.php";
include "../fungsi_indotgl.php";

$tglawal = $_POST['tglawal'];
$tglakhir = $_POST['tglakhir'];
$header=include 'isi.php';
?>
<!--sekarang Tinggal Codeing seperti biasanya. HTML, CSS, PHP tidak
masalah.-->
<!--CONTOH Code START-->
<table border='0' cellpadding='3' cellspacing='1' width='700' style='font-family: "time news roman"; font-size: 12px; background: #ffffff;'>
    
    <!-- kop -->
    <tr>
        <td colspan='3' align='center'>LAPORAN DATA PEMBAYARAN SMA BUDAYA</td></tr>
        </table>
        <div class="page-break"></div>
<table border='1' cellpadding='0' cellspacing='0' width='100%'>
                        
                          <tr align="center">
                            <th>No</th>
                            <th>No PSB</th>
                            <th>Atas Nama</th>
                            <th>Tanggal Bayar</th>
                            <th>Status Pembayaran</th>
                            
                            </tr>
                        
                        <?php
                        $tampil=mysql_query("SELECT * FROM pembayaran WHERE
                        tgl_bayar BETWEEN  '$_POST[tglawal]' AND  '$_POST[tglakhir]' ORDER BY no_psb ASC");
                        $no = 1;
                          while ($r=mysql_fetch_array($tampil)){
                        ?>
                            <tr>
                            <td align="center"><?php echo "$no"?></td>
                             <td align="center"><?php echo "$r[no_psb]"?></td>
                            <td align="left"><?php echo "$r[atas_nama]"?></td>
                            <td align="center"><?php echo date('d M Y', strtotime($r['tgl_bayar']));?></td>
                            <?php 
                            if ($r['status']==1) {echo "<td align='center'>Lunas</td>";}
     	elseif ($r['status']==2){echo "<td align='center'>Di Tolak</td>";}
     	else {
     		echo "<td align='center'>Dalam Proses</td>";
     }?>

                         
                            </tr>

                        <?php
                        $no++;
                        }
                        ?>
                        
                      </table>
                      </div>
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
    $mpdf->SetTitle("Cetak Laporan Pembayaran");
    $mpdf->setHTMLFooter($footer);
    $mpdf->WriteHTML($content);
    $mpdf->Output($nama_dokumen.".pdf" ,'I');
} catch(Exception $e) {
    echo $e;
exit;
}
?>