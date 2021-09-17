<?php  

class fungsi_barang{
	public $connect;
	function __construct(){
		require_once '../config/koneksi.php'; //menyertakan file koneksi
		$this->connect = new koneksi();
	}

	function list(){ //mengambil semua data dari tabel jenis
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

	function autoId(){ //bikin kode baru secara 'otomatis' untuk jeni
		try{
			$sql = "SELECT max(id_buku) as maxId FROM barang";
			$qry = $this->connect->db->prepare($sql);
			$qry->execute();
			$data = $qry->fetch(PDO::FETCH_OBJ);
			$oldId = $data->maxId;
			$createId = (int)substr($oldId, 1);
			$createId++;
			$char = "B";
			$newId = $char.sprintf('%02s', $createId);
			return $newId;
		} catch(PDOException $e){
			die("Error : ".$e->getMessage());
		}
	}

	function add($id_barang, $nama_barang, $penulis, $sipnosis, $stok){ //tambah data jenis
		try{
			$sql = "INSERT INTO barang(id_buku, nama_buku, Penulis, sipnosis, stok) VALUES(?,?,?,?,?)";
			$qry = $this->connect->db->prepare($sql);
			$qry->bindparam(1, $id_barang);
			$qry->bindparam(2, $nama_barang);
			$qry->bindparam(3, $penulis);
			$qry->bindparam(4, $sipnosis);
			$qry->bindparam(5, $stok);
			$qry->execute();
			return true;
		} catch(PDOException $e){
			die("Error : ".$e->getMessage());
		}
	}

	function edit($id){ ///untuk mengambil data sesuai parameter untuk ditampilkan di halaman edit
		try{
			$sql = "SELECT * FROM barang WHERE id_buku = ?;";
			$qry = $this->connect->db->prepare($sql);
			$qry->bindparam(1, $id);
			$qry->execute();
			while($fetch = $qry->fetch(PDO::FETCH_OBJ)){
				$data[] = $fetch;
			}
			return $data;
		} catch(PDOException $e){
			die("Error : ".$e->getMessage());
		}
	}

	function update($nama, $penulis, $sipnosis, $stok, $id){ //untuk update data sesuai parameter
		try{
			$sql = "UPDATE barang SET  nama_buku = ?, Penulis = ?, sipnosis = ?, stok = ? WHERE id_buku = ?";
			$qry = $this->connect->db->prepare($sql);
			$qry->bindparam(1, $nama);
			$qry->bindparam(2, $penulis);
			$qry->bindparam(3, $sipnosis);
			$qry->bindparam(4, $stok);
			$qry->bindparam(5, $id);
			$qry->execute();
			return true;
		} catch(PDOException $e){
			die("Error : ".$e->getMessage());
		}
	}

	function delete($id){ //untuk hapus data sesuai parameter
		try{
			$sql = "DELETE FROM barang WHERE id_buku = ?";
			$qry = $this->connect->db->prepare($sql);
			$qry->bindparam(1, $id);
			$qry->execute();
			return true;
		} catch(PDOException $e){
			die("Error : ".$e->getMessage());
		}
	}
}

?>