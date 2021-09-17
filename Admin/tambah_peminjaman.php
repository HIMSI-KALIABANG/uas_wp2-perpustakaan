
<?php  
require 'sidebar.html';
require '../login/fungsi_login.php';
$auth = new fungsi_login();
$auth->verifikasi($_SESSION['level']);

require_once 'fungsi_peminjaman.php';
$lib = new fungsi_peminjaman();
$data = $lib->autoId();

?>

<div class="content">
  <img src="head.jpg" width="100%">
  <h1>TAMBAH PEMINJAMAN</h1>
<ul class="breadcrumb">
  <li><a href="../user/index.html">Home</a></li>
  <li><a href="list_peminjaman.php">List peminjaman</a></li>
  <li><a href="tambah_peminjaman.php">Tambah peminjaman</a></li>
</ul>

  <form action="proses_peminjaman.php?page=add" method="post">
  <div class="container">
    <p>Isi Form dibawah untuk menambah data peminjaman</p>
    <hr>

    <label for="id"><b>ID Peminjaman</b></label>
    <input type="text" name="id_peminjaman" id="id" value="<?= $data ?>" readonly>

    <label for="stok"><b>Nama Buku</b></label>
    <br>
    <select class="box" name="id_barang">
        <?php 
            foreach($lib->getBarang() as $b){
              //var_dump($j);
              ?>

               <option value="<?= $b->id_buku ?>"><?= $b->nama_buku ?></option>
           
            <?php
            }
             ?> 
 </select>
 <br><br>
    <label for="nama_peminjam"><b>Nama Peminjam</b></label>
    <input type="text" placeholder="Masukkan Nama Peminjam" name="nama_peminjam" id="nama_peminjam" required>


    <label for="no_telp"><b>No Telepon</b></label>
    <input type="text" placeholder="Masukkan Nomor Telepon" name="no_telp" id="no_telp" required>

    <label for="alamat"><b>Alamat</b></label>
    <input type="text" placeholder="Masukan alamat" name="alamat" id="alamat" required>

    <label for="harga"><b>Harga</b></label>
    <input type="text" placeholder="Masukan harga" name="harga" id="harga" required>

    <label for="tanggal"><b>Tanggal Kembali</b></label><br> 
    <input type="date" name="tanggal" id="tanggal" required><br> <br> 

    <label for="jumlah"><b>Jumlah Pinjam</b></label>
    <input type="text" placeholder="Masukkan jumlah pinjam" name="jumlah" id="jumlah" required>
    <?php   
          if(isset($_GET['stok'])){
            if($_GET['stok'] == "validasi"){
      echo "<h4 style='color:red'>Jumlah yang di pinjam melebihi stok!</h4>";
    }
  }

     ?>
    <hr>
    <button type="submit" class="submitbtn">Submit</button>
  </div>

</form>

</div>
</body>
</html>
