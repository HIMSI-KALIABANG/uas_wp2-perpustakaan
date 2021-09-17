<?php  

class fungsi_Peminjaman{
	public $connect;
	function __construct(){
		require_once '../config/koneksi.php'; //menyertakan file koneksi
		$this->connect = new koneksi();
	}

	function list(){ //mengambil semua data dari tabel peminjamam
		try{
			//$sql = "SELECT * FROM peminjaman WHERE status = 'Dipinjam'";
			$sql= "SELECT p.id_peminjaman, b.nama_buku as nama, p.nama_peminjam, p.no_telp, p.jumlah_pinjam, p.tanggal_kembali FROM peminjaman p, barang b WHERE b.id_buku = p.id_buku AND p.status = 'Dipinjam' order by id_peminjaman";
			$qry = $this->connect->db->prepare($sql);
			$qry->execute();
			$data = $qry->fetchAll(PDO::FETCH_OBJ);
			return $data;
		} catch(PDOException $e){
			die("Error : ".$e->getMessage());
		}
	}


	function autoId(){ //bikin kode baru secara 'otomatis' untuk id_peminjaman
		try{
			$sql = "SELECT max(id_peminjaman) as maxId FROM peminjaman";
			$qry = $this->connect->db->prepare($sql);
			$qry->execute();
			$data = $qry->fetch(PDO::FETCH_OBJ);
			$oldId = $data->maxId;
			$createId = (int)substr($oldId, 1);
			$createId++;
			$char = "P";
			$newId = $char.sprintf('%02s', $createId);
			return $newId;
		} catch(PDOException $e){
			die("Error : ".$e->getMessage());
		}
	}

		function getBarang(){ //ambil data barang sebagai opsi select
		try{
			$sql = "SELECT * FROM barang";
			$qry = $this->connect->db->prepare($sql);
			$qry->execute();
			$data = $qry->fetchAll(PDO::FETCH_OBJ);
			return $data;
		} catch(PDOException $e){
			die("Error : ".$e->getMessage());
		}
	}

		function getStok($id_barang){ //ambil data stok
		try{
			$sql = "SELECT id_buku, stok FROM barang WHERE id_buku = ?";
			$qry = $this->connect->db->prepare($sql);
			$qry->bindparam(1, $id_barang);
			$qry->execute();
			$data = $qry->fetchAll(PDO::FETCH_OBJ);
			$stok = (int)$data[0]->stok;
			return $stok;
		} catch(PDOException $e){
			die("Error : ".$e->getMessage());
		}
	}

	function add($id_peminjaman, $id_barang, $nama_peminjam, $no_telp, $alamat, $jumlah_pinjam, $status, $tgl, $harga, $tanggal){ //tambah data peminjaman
		try{

			$sql2 = "SELECT id_buku, stok FROM barang WHERE id_buku = ?";
			$qry2 = $this->connect->db->prepare($sql2);
			$qry2->bindparam(1, $id_barang);
			$qry2->execute();
			$data2 = $qry2->fetch(PDO::FETCH_OBJ);

			$sql = "INSERT INTO peminjaman(id_peminjaman, id_buku, nama_peminjam, no_telp, alamat, jumlah_pinjam, status, tanggal_pinjam, harga, tanggal_kembali) VALUES(?,?,?,?,?,?,?,?,?,?)";
			$qry = $this->connect->db->prepare($sql);
			$qry->bindparam(1, $id_peminjaman);
			$qry->bindparam(2, $id_barang);
			$qry->bindparam(3, $nama_peminjam);
			$qry->bindparam(4, $no_telp);
			$qry->bindparam(5, $alamat);
			$qry->bindparam(6, $jumlah_pinjam);
			$qry->bindparam(7, $status);
			$qry->bindparam(8, $tgl);
			$qry->bindparam(9, $harga);
			$qry->bindparam(10, $tanggal);
			$qry->execute();

			$oldStock = (int)$data2->stok; 
			$newStock = $oldStock-$jumlah_pinjam;//menghitung jumlah stok 

			$sql6 = "UPDATE barang SET stok = ? WHERE id_buku= ?"; //update jumlah stok 
			$qry6 = $this->connect->db->prepare($sql6);
			$qry6->bindparam(1, $newStock);
			$qry6->bindparam(2, $data2->id_buku);
			$qry6->execute();

			return true; 
		} catch(PDOException $e){
			die("Error : ".$e->getMessage());
		}
	}
}

	