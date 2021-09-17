<?php  

require 'fungsi_login.php';
$auth = new fungsi_login(); //buat objek
$keluar = $auth->keluar(); //panggil fungsi keluar
if($keluar){ // //jika berhasil keluar
 	echo "<script>url:location='../user/index.html'</script>";
} else{
 	echo "<script>alert('Maaf, Terjadi Kesalahan')</script>";
 	echo "<script>url:location='index.html'</script>";
}

?>