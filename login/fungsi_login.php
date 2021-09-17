<?php 

class fungsi_login{
	public $koneksi;
	function __construct(){
		require_once('../config/koneksi.php');
		$this->koneksi = new Koneksi();
		session_start();
	}

	function masuk($user, $pass){
		try{
			$sql = "SELECT * FROM user WHERE username = ? AND password = ?"; // mengambil semua data user dan argumen pertama bind
			$query = $this->koneksi->db->prepare($sql); // menyimpan data query pada variable $query
			$query->bindparam(1, $user); // mengirim data
			$query->bindparam(2, $pass); 
			$query->execute(); // mengeksekusi perintah
			$data = $query->fetch(PDO::FETCH_OBJ); //untuk mengambil data 
			$_SESSION['user'] = $data->username; // sesi user berdasarkan data di database
			$_SESSION['level'] = $data->level; // sesi level bedasarkan data di database
			return true; 
		} catch(PDOException $e){
			return false;
		}
	}

	function verifikasi($level){
		if(!isset($_SESSION['user'])){ // data jika tidak kosong
			header('location:../login/login.html'); // 
		} elseif($_SESSION['level'] != $level){
			header('location:../login/login.html');
		}
	}

	function keluar(){
		try{
			session_destroy();
			return true;
		} catch(PDOException $e){
			return false;
		}
	}
}

?>