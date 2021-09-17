-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 07:59 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_buku` varchar(5) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `Penulis` varchar(100) NOT NULL,
  `sipnosis` varchar(1500) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_buku`, `nama_buku`, `Penulis`, `sipnosis`, `stok`) VALUES
('B01', 'Detective conan ch.88', 'Aoyama Gosho', 'Manga Detective Conan yang dibuat oleh komikus bernama Aoyama Gosho ini bercerita tentang Shinichi Kudo adalah seorang detektif sekolah menengah yang terkadang bekerja dengan polisi untuk menyelesaikan kasus. Selama penyelidikan, dia diserang oleh anggota sindikat kejahatan yang dikenal sebagai Organisasi Hitam. Mereka memaksanya untuk menelan racun eksperimental, tetapi bukannya membunuhnya, racun itu mengubahnya menjadi seorang anak. Mengadopsi nama samaran Conan Edogawa dan merahasiakan identitas aslinya, Kudo tinggal bersama teman masa kecilnya Ran dan ayahnya Kogoro, yang merupakan seorang detektif swasta.', 10),
('B02', 'Harry Potter and the Goblet of fire', 'J.K Rowling', '1-Page Summary of Harry Potter and the Goblet of Fire The book starts with Harry witnessing the murder of a Muggle named Frank Bryce in his dream. He wakes up from this nightmare in pain, and discovers that he has a scar on his forehead. The next day, the Weasleys take him to the Quidditch World Cup using a magical object called Portkey.', 15),
('B03', 'The chronicles of narnia', 'C.S Lewis', 'The Chronicles of Narnia by C. S. Lewis is an allegorical series of seven novels that chronicles the story of the magical land of Narnia and its residents, as well as select humans that have the opportunity to visit and interact with the world.', 20);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` varchar(5) NOT NULL,
  `id_buku` varchar(5) NOT NULL,
  `nama_peminjam` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL,
  `status` enum('Dipinjam','Kembali','','') NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `harga` varchar(50) NOT NULL,
  `denda` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `nama_peminjam`, `no_telp`, `alamat`, `jumlah_pinjam`, `status`, `tanggal_pinjam`, `tanggal_kembali`, `harga`, `denda`) VALUES
('P01', 'B03', 'Farah adelia Putri', '081383231104', 'pondok ungu permai D18', 1, 'Kembali', '2021-06-14', '2021-06-15', '20000', '10000'),
('P02', 'B02', 'Farah adelia Putri', '081383231104', 'pondok ungu permai D18', 1, 'Dipinjam', '2021-06-16', '2021-06-16', '20000', NULL),
('P03', 'B01', 'Farah Adelia Putri', '081383231104', 'Pondok Ungu Permai D18', 1, 'Dipinjam', '2021-06-17', '2021-06-18', '15000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`) VALUES
('Admin', 'Admin', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_barang` (`id_buku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `barang` (`id_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
