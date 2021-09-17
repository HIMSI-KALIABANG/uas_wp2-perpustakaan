
<?php  
require 'sidebar.html';
require '../login/fungsi_login.php';
$auth = new fungsi_login();
$auth->verifikasi($_SESSION['level']);

require_once 'fungsi_barang.php';
$lib = new fungsi_barang();
$data = $lib->list();
?>

<div class="content">
  <img src="head.jpg" width="100%">
  <h1>LIST BUKU</h1>
<ul class="breadcrumb">
  <li><a href="../user/index.html">Home</a></li>
  <li><a href="">List Buku</a></li>
</ul>
<button class="btn" onclick="window.location.href='tambah_barang.php?>'" style="margin-left: 950px">Tambah Buku</button>
  <div class="container">
    <table>
  <tr>
    <th width="16%">Nama Buku</th>
    <th width="16%">Nama Penulis</th>
    <th width="32%">Sipnosis</th>
    <th width="5%">Stok</th>
    <th width="15%">Aksi</th>

  </tr>
        <?php 
        foreach($data as $d){
         ?>
         <tr>     
          <td><?= $d->nama_buku ?></td>
          <td><?= $d->Penulis ?></td>
          <td><?= $d->sipnosis ?></td>
          <td><?= $d->stok ?></td>
          <td>
            <button class="btn" onclick="window.location.href='edit_barang.php?id=<?= $d->id_buku ?>'" >Edit</button>
            <button class="btn" onclick="window.location.href='proses_barang.php?page=delete&id=<?= $d->id_buku ?>'">Hapus</button>
          </td>
        </tr> 
        
<?php } ?>
</table>
  </div>
</div>
</body>
</html>
