
<?php  
require 'sidebar.html';
require '../login/fungsi_login.php';
$auth = new fungsi_login();
$auth->verifikasi($_SESSION['level']);

require_once 'fungsi_peminjaman.php';
$lib = new fungsi_peminjaman();
$data = $lib->list();
?>

<div class="content">
  <img src="head.jpg" width="100%">
  <h1>LIST PEMINJAMAN</h1>
<ul class="breadcrumb">
  <li><a href="../user/index.html">Home</a></li>
  <li><a href="list_peminjaman.php">List Peminjaman</a></li>
</ul>
<button class="btn" onclick="window.location.href='tambah_peminjaman.php?>'" style="margin-left: 900px">Tambah Peminjaman</button>
  <div class="container">
    <table>
  <tr>
    <th width="10%">ID</th>
    <th width="20%">Nama Buku</th>
    <th width="16%">Nama Peminjam</th>
    <th width="16%">No Telp</th>
    <th width="10%">Qty</th>
    <th width="16%">Batas Kembali</th>
    <th width="16%">Aksi</th>
  </tr>
        <?php 
        foreach($data as $d){
         ?>
         <tr>        
          <td><?= $d->id_peminjaman ?></td>
          <td><?= $d->nama?></td>
          <td><?= $d->nama_peminjam ?></td>
          <td><?= $d->no_telp ?></td>
          <td><?= $d->jumlah_pinjam ?></td>
          <td><?= $d->tanggal_kembali ?></td>
          <td>
            <button class="btn" onclick="window.location.href='tambah_pengembalian.php?id=<?= $d->id_peminjaman ?>'">Kembali</button>
          </td>
        </tr> 
        
<?php } ?>
</table>
  </div>
</div>
</body>
</html>
