<?php  

class fungsi_Pengembalian{
	public $connect;
	function __construct(){
		require_once '../config/koneksi.php'; //menyertakan file koneksi
		$this->connect = new koneksi();
	}

		function listA(){ //mengambil semua data dari tabel jenis
			try{
			//$sql = "SELECT * FROM peminjaman WHERE status = 'Dipinjam'";
				$sql= "SELECT p.id_peminjaman, b.nama_buku as nama, p.nama_peminjam, p.no_telp, p.jumlah_pinjam, p.tanggal_kembali, p.tanggal_pinjam, p.harga, p.denda FROM peminjaman p, barang b WHERE b.id_buku = p.id_buku AND p.status = 'Kembali' order by id_peminjaman";
				$qry = $this->connect->db->prepare($sql);
				$qry->execute();
				$data = $qry->fetchAll(PDO::FETCH_OBJ);
				return $data;
			} catch(PDOException $e){
				die("Error : ".$e->getMessage());
			}
		}

		function kembali($status, $denda, $id_peminjaman, $kode, $qty){ //untuk update data sesuai parameter
			try{
				$sql = "UPDATE peminjaman SET status = '$status', denda = '$denda' WHERE id_peminjaman = '$id_peminjaman'"; 
				$qry = $this->connect->db->prepare($sql);
				$qry->execute();

				$sql2 = "SELECT id_buku, stok FROM barang WHERE id_buku = ?";
				$qry2 = $this->connect->db->prepare($sql2);
				$qry2->bindparam(1, $kode);
				$qry2->execute();
				$data2 = $qry2->fetch(PDO::FETCH_OBJ);

				$oldStock = (int)$data2->stok; 
				$newStock = $oldStock+$qty;//menghitung jumlah stok 

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
	

	function edit($id){ ///untuk mengambil data sesuai parameter untuk ditampilkan di halaman edit
		try{
			$sql= "SELECT p.id_peminjaman, b.nama_buku as nama, p.nama_peminjam, p.no_telp, p.jumlah_pinjam, b.id_buku, p.tanggal_pinjam, p.harga, p.tanggal_kembali FROM peminjaman p, barang b WHERE b.id_buku = p.id_buku AND p.status = 'Dipinjam' AND id_peminjaman = '$id' order by id_peminjaman";
			$qry = $this->connect->db->prepare($sql);
			$qry->execute();
			$data = $qry->fetchAll(PDO::FETCH_OBJ);
			return $data;
		} catch(PDOException $e){
			die("Error : ".$e->getMessage());
		}
	}
}
	