<?php  
require 'fungsi_login.php';// menguhubungkan file fungsi login
$auth = new fungsi_Login();// membuat objek

$user = $_POST['username'];// mengambil data dari inputan sebelumnya
$pass = $_POST['password'];

$login = $auth->masuk($user, $pass); // mendeklarasi fungsi masuk dan menjalankanya
if($login && $_SESSION['level'] == 'Admin'){ // membuat kondisi dimana login berhasil dan sesi sesuai
	header('location:../Admin/tambah_barang.php'); // Alamat yang akan di akses jika if berhasil
} else{
	header('location:login.html');
}
?>