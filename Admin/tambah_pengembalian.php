
<?php  
require 'sidebar.html';
require '../login/fungsi_login.php';
$auth = new fungsi_login();
$auth->verifikasi($_SESSION['level']);

require_once 'fungsi_pengembalian.php';
$lib = new fungsi_pengembalian();
$data = $lib->edit($_GET['id']);

?>

<div class="content">
  <img src="head.jpg" width="100%">
  <h1>PENGEMBALIAN DAN PEMBAYARAN</h1>
<ul class="breadcrumb">
  <li><a href="../user/index.html">Home</a></li>
  <li><a href="list_peminjaman.php">List Peminjaman</a></li>
  <li><a href="">Tambah Pengembalian</a></li>
</ul>

  <form action="invoice.php" method="post">
  <div class="container">
    <p>Isi Form dibawah untuk melakukan pengembalian</p>
    <hr>
    <?php 
      foreach($data as $d){

         $t = date_create($d->tanggal_kembali);
         $n = date_create(date('Y-m-d'));
         if ($n>$t) {
           # code...
                   $terlambat = $t->diff($n);
                   $hari = $terlambat->format("%a");
                   $denda = $hari * 10000;
         } else{
            $denda = '0';
            $hari = '0';
         }
 
     ?>
    <label for="id"><b>ID Peminjaman</b></label>
    <input type="text" name="id_peminjaman" id="id" value="<?= $d->id_peminjaman ?>" readonly>

    <label for="nama"><b>Nama</b></label>
    <input type="text" placeholder="Masukkan Nama Penyewa" name="nama" id="nama" required>

    <label for="alamat"><b>Alamat</b></label>
    <input type="text" placeholder="Masukkan Alamat" name="alamat" id="alamat" required>

    <label for="no_telp"><b>No.Telp</b></label>
    <input type="text" placeholder="Masukkan no.telp" name="no_telp" id="no_telp" required>

    <label for="id"><b>Kode Buku</b></label>
    <input type="text" value="<?= $d->id_buku ?>" name="id_barang" id="id" readonly>

    <label for="nama_barang"><b>Nama Buku</b></label>
    <input type="text" name="nama_barang" value="<?= $d->nama ?>" id="nama_barang" readonly>

    <label for="qty"><b>Qty</b></label>
    <input type="text" value="<?= $d->jumlah_pinjam ?>" name="qty" id="qty" readonly>

    <label for="harga"><b>Harga</b></label>
    <input type="text" value="<?= $d->harga ?>" name="harga" id="harga" readonly>

    <label for="hari"><b>Ketelambatan</b></label>
    <input type="text" value="<?php echo $hari ?> Hari"   name="hari" id="hari" readonly>

    <label for="denda"><b>Denda (1 hari = 10.000)</b></label>
    <input type="text" value="<?php echo $denda ?>"   name="denda" id="denda" readonly>

    <label for="cash"><b>Uang Dibayarkan</b></label>
    <input type="text" placeholder="Masukkan Nama Barang" name="cash" id="cash" required>
    <button type="submit" class="submitbtn">Submit</button>
  </div>
<?php } ?>
</form>

</div>
</body>
</html>
