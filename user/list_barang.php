
<?php  
require_once '../Admin/fungsi_barang.php';
$lib = new fungsi_barang();
$data = $lib->list();
?>

<html>
<head>
  <title>FABA</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {margin: 0;}
.container {
  position: relative;
  text-align: left;
  padding: 16px;
}


#judul{
  font-size: 35px;
  font-weight: bold;
  font-family: serif;
  text-align: center;
  font-family:"Helvetica";
  color:rgb(70,90,101);
  margin-top: 60px;
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 16px;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

.btn {
  background-color: rgb(69,90,100) ;
  border: none;
  color: white;
  padding: 12px 16px;
  font-size: 16px;
  cursor: pointer;
}

.btn:hover {
  background-color: rgb(104,136,151);
}   

ul.topnav {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: rgb(70,90,101);
}

ul.topnav li {float: left;}

ul.topnav li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

ul.topnav li a:hover:not(.active) {background-color: #111;}

ul.topnav li a.active {background-color: rgb(50,64,71);}

ul.topnav li.right {float: right;}

@media screen and (max-width: 600px) {
  ul.topnav li.right, 
  ul.topnav li {float: none;}
}
</style>
</head>
<body>

<ul class="topnav">
  <li><a class="active" href="index.html">Home</a></li>
  <li><a href="list_barang.php">List Buku</a></li>
  <li class="right"><a href="../login/login.html">Login</a></li>
</ul>

  <div class="container">

    <p id="judul">List Buku</p>
    <table>
  <tr>
    <th width="15%">Nama Buku</th>
    <th width="15%">Nama Penulis</th>
    <th width="40%">Sipnosis</th>
    <th width="15%">Stok</th>
  </tr>
        <?php 
        foreach($data as $d){
         ?>
         <tr>        
          <td><?= $d->nama_buku ?></td>
          <td><?= $d->Penulis ?></td>
          <td><?= $d->sipnosis ?></td>
          <td><?= $d->stok ?></td>
        </tr> 
        
<?php } ?>
</table>
<br>
<button class="btn" onclick="window.location.href='../login/login.html'">Sewa Buku</button>
<button class="btn" onclick="window.location.href='../login/login.html'">Tambah Buku</button>
  </div>
</div>
</body>
</html>
