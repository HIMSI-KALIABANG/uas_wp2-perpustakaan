
<?php  
require 'sidebar.html';
require '../login/fungsi_login.php';
$auth = new fungsi_login();
$auth->verifikasi($_SESSION['level']);

require_once 'fungsi_pengembalian.php';
$lib = new fungsi_pengembalian();
$data = $lib->listA();
?>

<div class="content">
  <img src="head.jpg" width="100%">
  <h1>LIST PENGEMBALIAN</h1>
<ul class="breadcrumb">
  <li><a href="../user/index.html">Home</a></li>
  <li><a href="list_pengembalian.php">List Pengembalian</a></li>
</ul>
  <div class="container">
    <table>
  <tr >
    <th width="10%">ID</th>
    <th width="16%">Nama Buku</th>
    <th width="20%">Nama Peminjam</th>
    <th width="10%">Qty</th>
    <th width="20%">Tanggal Pinjam</th>
    <th width="20%">Tanggal Kembali</th>
    <th width="16%">Harga</th>
    <th width="16%">Denda</th>
  </tr>
        <?php 
        foreach($data as $d){
         ?>
         <tr>        
          <td><?= $d->id_peminjaman ?></td>
          <td><?= $d->nama?></td>
          <td><?= $d->nama_peminjam ?></td>
          <td><?= $d->jumlah_pinjam ?></td>
          <td><?= $d->tanggal_pinjam ?></td>
          <td><?= $d->tanggal_kembali ?></td>
          <td>Rp.<?= $d->harga ?>,00</td>
          <td>Rp.<?= $d->denda ?>,00</td>
        </tr> 
        
<?php } ?>
</table>
  </div>
</div>
</body>
</html>
