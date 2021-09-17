<?php 

/**
* 
*/
class Koneksi
{
	var $host = "localhost";
	var $user = "root";
	var $pass = "";
	var $db = "db_wp";
	
	function __construct()
	{
		try{
			$this->db = new PDO(
				"mysql:host={$this->host}; 
				dbname={$this->db}",
				$this->user,
				$this->pass
			);
			$this->db->setAttribute(
				PDO::ATTR_ERRMODE,
				PDO::ERRMODE_EXCEPTION
			);
		}

		catch (PDOexception $exception){
			die("connection error: ".$exception->getMessage());
		}
}
}

?>