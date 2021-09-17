
<?php   
require '../login/fungsi_login.php';
$auth = new fungsi_login();
$auth->verifikasi($_SESSION['level']);

$id_peminjaman= $_POST['id_peminjaman'];
$kode         = $_POST['id_barang'];
$nama_barang  = $_POST['nama_barang'];
$harga        = $_POST['harga'];
$qty          = $_POST['qty'];
$denda        = $_POST['denda'];
$total        = $harga + $denda;
$cash         = $_POST['cash'];
$nama         = $_POST['nama'];
$alamat       = $_POST['alamat'];
$no_telp      = $_POST['no_telp'];
$Kembalian    = $cash-$total;
$tgl=date('l, d-m-Y');
$status = "Kembali";

if($total > $cash){
  echo "<script>alert('Jumlah uang yang diinput kurang!')</script>";
      echo "<script>url:location='list_peminjaman.php'</script>";
}else{

require_once 'fungsi_pengembalian.php';
$lib = new fungsi_pengembalian();//buat objek
 
  $proses = $lib->kembali($status, $denda, $id_peminjaman, $kode, $qty); //panggil fungsi tambah


?>

<html>
<head>
  <title>Invoice Penyewaan Barang</title>
  <style>
    #tabel
    {
      font-size:20px;
      border-collapse:collapse;
    }
    #tabel  td
    {
      padding-left:5px;
      border: 1px solid black;
    }
  </style>
</head>
<body style='font-family:tahoma; font-size:8pt;'>
  <center>
    <table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
      <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
        <span style='font-size:12pt'><b>FABA Shop</b></span></br>
      Jl. Warung Jati Barat No.39, RT.1/RW.5, Jati Padang, Kec. Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta</br>
      Telp : 021297008
    </td>
    <td style='vertical-align:top' width='30%' align='left'>
      <b><span style='font-size:12pt'>INVOICE</span></b><br>
    Tanggal : <?php echo $tgl; ?></br>
  </td>
</table>
<table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
  <td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
  Nama Penyewa : <?php echo $nama; ?> </br>
  Alamat Penyewa : <?php echo $alamat; ?>
</td>
<td style='vertical-align:top' width='30%' align='left'>
  No Telp Penyewa : <?php echo $no_telp; ?>
</td>
</table>
<table cellspacing='0' style='width:550px; font-size:8pt; font-family:calibri;  border-collapse: collapse;' border='1'>

  <tr align='center'>
    <td width='10%'>Kode Buku</td>
    <td width='20%'>Nama Buku</td>
    <td width='13%'>Harga</td>
    <td width='4%'>Qty</td>
    <td width='7%'>Denda</td>
    <td width='13%'>Total Harga</td>
    <tr>
      <td><?php echo $kode; ?></td>
      <td><?php echo $nama_barang; ?></td>
      <td>Rp<?php echo $harga; ?>,00</td>
      <td><?php echo $qty; ?></td>
      <td>Rp<?php echo $denda; ?>,00</td>
      <td style='text-align:right'>Rp<?php echo $total; ?>,00</td>
      <tr>
        <td colspan = '5'><div style='text-align:right'>Total Yang Harus Di Bayar Adalah : </div></td>
        <td style='text-align:right'>Rp<?php echo $total; ?>,00</td>
      </tr>
<!--      <tr>
        <td colspan = '6'><div style='text-align:right'>Terbilang : Dua Juta Empat Ratus Enam Puluh  Ribu  Rupiah</div></td>
      </tr> -->
      <tr>
        <td colspan = '5'><div style='text-align:right'>Cash : </div></td>
        <td style='text-align:right'>Rp<?php echo $cash; ?>,00</td>
      </tr>
      <tr>
        <td colspan = '5'><div style='text-align:right'>Kembalian : </div></td><td style='text-align:right'>Rp<?php echo $Kembalian; ?>,00</td>
      </tr>
      <tr>
        <td colspan = '5'><div style='text-align:right'>DP : </div></td>
        <td style='text-align:right'>Rp0,00</td>
      </tr>
      <tr>
        <td colspan = '5'><div style='text-align:right'>Sisa : </div></td>
        <td style='text-align:right'>Rp0,00</td></tr>
      </table>

      <table style='width:650; font-size:7pt;' cellspacing='2'>
        <tr>
          <td align='center'>Diterima Oleh,</br></br><u>(............)</u></td>
          <td style='border:1px solid black; padding:5px; text-align:left; width:30%'></td>
          <td align='center'>TTD,</br></br><u>(...........)</u></td>
        </tr>
      </table>
    </center>
    <br><br><br><br><button class="btn" onclick="window.location.href='list_pengembalian.php'">List Pengembalian</button>
  </body>
  </html>

  <?php } ?>