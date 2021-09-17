
<?php  
require 'sidebar.html';
require '../login/fungsi_login.php';
$auth = new fungsi_login();
$auth->verifikasi($_SESSION['level']);

require_once 'fungsi_barang.php';
$lib = new fungsi_barang();
$data = $lib->autoId();
?>

<div class="content">
  <img src="head.jpg" width="100%">
  <h1>TAMBAH BUKU</h1>
<ul class="breadcrumb">
  <li><a href="../user/index.html">Home</a></li>
  <li><a href="list_barang.php">List Buku</a></li>
  <li><a href="">Tambah Buku</a></li>
</ul>

  <form action="proses_barang.php?page=add" method="post">
  <div class="container">
    <p>Isi Form dibawah untuk menambah data barang</p>
    <hr>

    <label for="id"><b>ID Buku</b></label>
    <input type="text" name="id_barang" id="id" value="<?= $data ?>" readonly>

    <label for="nama_barang"><b>Nama Buku</b></label>
    <input type="text" placeholder="Masukkan Nama Buku" name="nama_barang" id="nama_barang" required>

    <label for="penulis"><b>Penulis</b></label>
    <input type="text" placeholder="Masukkan Nama Penulis" name="penulis" id="penulis" required>

    <label for="sipnosis"><b>Sipnosis</b></label>
    <input type="text" placeholder="Masukkan Sipnosis Buku" name="sipnosis" id="sipnosis" required>

    <label for="stok"><b>Stok</b></label>
    <input type="text" placeholder="Masukan stok" name="stok" id="stok" required>
    <hr>

    <button type="submit" class="submitbtn">Submit</button>
  </div>

</form>

</div>
</body>
</html>
