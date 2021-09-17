<?php 

if(!isset($_GET['page'])){
	header('location:list_barang.php');
} else if($_GET['page'] == 'add' || $_GET['page'] == 'update'){//ambil data dari form
	$kode = $_POST['id_barang'];
	$nama = $_POST['nama_barang'];
	$penulis = $_POST['penulis'];
	$sipnosis = $_POST['sipnosis'];
	$stok =  $_POST['stok'];
}

require_once 'fungsi_barang.php';
$lib = new fungsi_barang();//buat objek
if($_GET['page'] == 'add'){ 
	$proses = $lib->add($kode, $nama, $penulis, $sipnosis, $stok); //panggil fungsi tambah
	if($proses){
		echo "<script>alert('Tambah Berhasil')</script>";
		echo "<script>url:location='list_barang.php'</script>";
	} else{
		echo "<script>alert('Tambah Gagal')</script>";
		echo "<script>url:location='tambah_barang.php.php'</script>";
	}
}

elseif($_GET['page'] == 'update' && isset($_GET['id'])){
	$proses = $lib->update($nama, $penulis, $sipnosis, $stok, $_GET['id']);//panggil fungsi update
	if($proses){
		echo "<script>alert('Edit Berhasil')</script>";
		echo "<script>url:location='list_barang.php'</script>";
		//echo $_GET['id'];
	} else{
		echo "<script>alert('Edit Gagal')</script>";
		echo "<script>url:location='list_barang.php.php'</script>";
	}
}

elseif($_GET['page'] == 'delete' && isset($_GET['id'])){ //panggil fungsi hapus
	$proses = $lib->delete($_GET['id']);
	if($proses){
		echo "<script>alert('Hapus Berhasil')</script>";
		echo "<script>url:location='list_barang.php'</script>";
	} else{
		echo "<script>alert('Hapus Gagal')</script>";
		echo "<script>url:location='list_barang.php.php'</script>";
	}
}

?>