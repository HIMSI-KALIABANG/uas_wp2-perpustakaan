<?php 

if(!isset($_GET['page'])){
	header('location:list_peminjaman.php');
} else{//ambil data dari form
	$id_peminjaman = $_POST['id_peminjaman'];
	$id_barang = $_POST['id_barang'];
	$nama_peminjam = $_POST['nama_peminjam'];
	$no_telp = $_POST['no_telp'];
	$alamat = $_POST['alamat'];
	$jumlah_pinjam = $_POST['jumlah'];
	$harga = $_POST['harga'];
	$tgl = date('Y-m-d');
	$status = "Dipinjam";
	$tanggal = $_POST['tanggal'];
}

require_once 'fungsi_peminjaman.php';
$lib1 = new fungsi_peminjaman();
$stok = $lib1->getStok($id_barang);

if($jumlah_pinjam > $stok){
	header("location:tambah_peminjaman.php?stok=validasi");
}else{
		require_once 'fungsi_peminjaman.php';
		$lib = new fungsi_peminjaman();//buat objek
		if($_GET['page'] == 'add'){ 
			$proses = $lib->add($id_peminjaman, $id_barang, $nama_peminjam, $no_telp, $alamat, $jumlah_pinjam, $status, $tgl, $harga, $tanggal); //panggil fungsi tambah
			if($proses){
				echo "<script>alert('Peminjaman Berhasil')</script>";
				echo "<script>url:location='list_peminjaman.php'</script>";
			} else{
				echo "<script>alert('Peminjaman Gagal')</script>";
				echo "<script>url:location='list_peminjaman.php.php'</script>";
			}
		}

}

?>