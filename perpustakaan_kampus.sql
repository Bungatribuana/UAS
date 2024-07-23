-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 17, 2024 at 07:51 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_kampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `kodeanggota` varchar(5) NOT NULL,
  `namaanggota` varchar(50) NOT NULL,
  `jeniskelamin` varchar(15) NOT NULL,
  `alamatanggota` varchar(60) NOT NULL,
  `telpanggota` varchar(15) NOT NULL,
  `tempatlahir` varchar(20) NOT NULL,
  `tanggallahir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`kodeanggota`, `namaanggota`, `jeniskelamin`, `alamatanggota`, `telpanggota`, `tempatlahir`, `tanggallahir`) VALUES
('10j', 'ratu', 'perempuan', 'lobar', '081 991', 'praya', '2005-07-18'),
('11k', 'yanto', 'laki-laki', 'loteng', '081 121', 'lelong', '2001-07-31'),
('12l', 'yanti', 'perempuan', 'loteng', '081 111', 'serewe', '2000-06-10'),
('13m', 'sukma', 'perempuan', 'loteng', '081 777', 'prako', '2004-06-12'),
('14n', 'messi', 'laki-laki', 'loteng', '081 765', 'saba', '2004-06-23'),
('15o', 'arrijal', 'laki-laki', 'lobar', '081 333', 'epic', '2001-05-14'),
('1a1', 'baba', 'laki-laki', 'praya', '081 123', 'praya', '2005-07-01'),
('2b2', 'mumu', 'perempuan', 'lobar', '081 124', 'cakra', '2006-07-02'),
('3c3', 'cece', 'perempuan', 'janapria', '081 125', 'lekor', '2007-07-03'),
('4d4', 'jeje', 'laki-laki', 'kopang', '081 126', 'leneng', '2008-07-04'),
('5e5', 'sasa', 'perempuan', 'lobar', '081 127', 'mantang', '2009-07-05'),
('6f6', 'mei mei', 'perempuan', 'loteng', '081 908', 'bagu', '2002-07-07'),
('7g7', 'jaya', 'laki-laki', 'loteng', '081 221', 'perum', '2003-07-08'),
('8h8', 'raden', 'laki-laki', 'lobar', '081 222', 'dukun', '2001-07-09'),
('9i9', 'nona', 'laki-laki', 'loteng', '081 999', 'praya', '2000-07-17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `kodebuku` varchar(5) NOT NULL,
  `judulbuku` varchar(70) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `kodepenulis` varchar(3) NOT NULL,
  `kodepenerbit` varchar(3) NOT NULL,
  `kodekategori` varchar(2) NOT NULL,
  `tglterbit` date NOT NULL,
  `jlhhalaman` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`kodebuku`, `judulbuku`, `isbn`, `kodepenulis`, `kodepenerbit`, `kodekategori`, `tglterbit`, `jlhhalaman`) VALUES
('101i', 'rumah hati', '2332', '5a', 'c45', 'z', '2024-07-14', 19),
('1ab', 'negeri 5 menara', '111', '1c', 'c45', 'j', '2024-04-07', 20),
('22cc', 'ipar adalah maut', '444', '3z', 'b22', 'j', '2024-07-05', 33),
('2ab', 'Bumi Manusia', '222', '3z', 'a11', 'q', '2024-06-09', 34),
('44dd', 'arwah gentayangan', '331', '2d', 'a11', 'w', '2024-07-18', 22),
('45dd', 'bunga janda', '8870', '3z', 'a11', 'w', '2024-07-01', 32),
('55cr', 'hutan bambu', '8790', '2d', 'b22', 'q', '2024-07-07', 45),
('66gg', 'motor ajaib', '8787', '4a', 'a11', 'q', '2024-07-28', 50),
('66tt', 'pelangi yang indah', '8899', '1c', 'a11', 'u', '2024-07-15', 23),
('99kk', 'abracadabra', '9900', '4a', 'b22', 'w', '2024-07-24', 22),
('dd31', 'bulan bintang', '7787', '3z', 'a11', 'j', '2024-07-25', 44);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detiltransaksi`
--

CREATE TABLE `tb_detiltransaksi` (
  `kodebuku` varchar(5) NOT NULL,
  `tglpinjam` date NOT NULL,
  `tglkembali` date NOT NULL,
  `jumlahbuku` int NOT NULL,
  `status` varchar(10) NOT NULL,
  `kodetransaksi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_detiltransaksi`
--

INSERT INTO `tb_detiltransaksi` (`kodebuku`, `tglpinjam`, `tglkembali`, `jumlahbuku`, `status`, `kodetransaksi`) VALUES
('1ab', '2024-07-01', '2024-07-04', 2, 'selesai', '78hj'),
('2ab', '2024-07-03', '2024-07-06', 1, 'selesai', 'bb12'),
('22cc', '2024-07-07', '2024-07-10', 1, 'proses', 'cc23'),
('44dd', '2024-07-14', '2024-07-18', 2, 'proses', 'dd12'),
('45dd', '2024-07-02', '2024-07-04', 1, 'proses', 'ds67'),
('55cr', '2024-07-03', '2024-07-12', 2, 'selesai', 'gk78'),
('66gg', '2024-07-09', '2024-07-18', 1, 'selesai', 'jk65'),
('66tt', '2024-07-10', '2024-07-18', 1, 'selesai', 'jk78'),
('101i', '2024-07-16', '2024-07-20', 1, 'proses', 'uu88'),
('dd31', '2024-07-21', '2024-07-27', 1, 'selesai', 'we34');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kodekategori` varchar(2) NOT NULL,
  `namakategori` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`kodekategori`, `namakategori`) VALUES
('j', 'sad'),
('q', 'ceria'),
('u', 'happy'),
('w', 'pelangi'),
('z', 'laskar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mastertransaksi`
--

CREATE TABLE `tb_mastertransaksi` (
  `kodetransaksi` varchar(5) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `kodeanggota` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_mastertransaksi`
--

INSERT INTO `tb_mastertransaksi` (`kodetransaksi`, `tgltransaksi`, `kodeanggota`) VALUES
('78hj', '2024-07-25', '9i9'),
('bb12', '2024-07-10', '3c3'),
('cc23', '2024-07-10', '4d4'),
('dd12', '2024-07-19', '10j'),
('ds67', '2024-07-16', '6f6'),
('gk78', '2024-07-14', '15o'),
('jk65', '2024-07-15', '7g7'),
('jk78', '2024-07-12', '2b2'),
('uu88', '2024-07-01', '5e5'),
('we34', '2024-07-14', '6f6');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penerbit`
--

CREATE TABLE `tb_penerbit` (
  `kodepenerbit` varchar(3) NOT NULL,
  `namapenerbit` varchar(50) NOT NULL,
  `alamatpenerbit` varchar(60) NOT NULL,
  `telppenerbit` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_penerbit`
--

INSERT INTO `tb_penerbit` (`kodepenerbit`, `namapenerbit`, `alamatpenerbit`, `telppenerbit`) VALUES
('a11', 'aksara', 'loteng', '081 907'),
('b22', 'alur', 'lotim', '081 906'),
('c45', 'samsul', 'lobar', '081 903');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penulis`
--

CREATE TABLE `tb_penulis` (
  `kodepenulis` varchar(3) NOT NULL,
  `namapenulis` varchar(50) NOT NULL,
  `alamatpenulis` varchar(60) NOT NULL,
  `telppenulis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_penulis`
--

INSERT INTO `tb_penulis` (`kodepenulis`, `namapenulis`, `alamatpenulis`, `telppenulis`) VALUES
('1c', 'bunga', 'janapria', '081 888'),
('2d', 'buah', 'lekor', '081 887'),
('3z', 'aola', 'jango', '081 886'),
('4a', 'nisa', 'praya', '081 805'),
('5a', 'gigih', 'renge', '081 885');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`kodeanggota`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`kodebuku`),
  ADD KEY `fk_kategori` (`kodekategori`),
  ADD KEY `fk_penulis` (`kodepenulis`),
  ADD KEY `fk_penerbit` (`kodepenerbit`);

--
-- Indexes for table `tb_detiltransaksi`
--
ALTER TABLE `tb_detiltransaksi`
  ADD PRIMARY KEY (`kodetransaksi`),
  ADD KEY `fk_buku` (`kodebuku`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kodekategori`);

--
-- Indexes for table `tb_mastertransaksi`
--
ALTER TABLE `tb_mastertransaksi`
  ADD PRIMARY KEY (`kodetransaksi`),
  ADD KEY `fk_anggota` (`kodeanggota`);

--
-- Indexes for table `tb_penerbit`
--
ALTER TABLE `tb_penerbit`
  ADD PRIMARY KEY (`kodepenerbit`);

--
-- Indexes for table `tb_penulis`
--
ALTER TABLE `tb_penulis`
  ADD PRIMARY KEY (`kodepenulis`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`kodekategori`) REFERENCES `tb_kategori` (`kodekategori`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_penerbit` FOREIGN KEY (`kodepenerbit`) REFERENCES `tb_penerbit` (`kodepenerbit`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_penulis` FOREIGN KEY (`kodepenulis`) REFERENCES `tb_penulis` (`kodepenulis`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_detiltransaksi`
--
ALTER TABLE `tb_detiltransaksi`
  ADD CONSTRAINT `fk_buku` FOREIGN KEY (`kodebuku`) REFERENCES `tb_buku` (`kodebuku`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_transaksi` FOREIGN KEY (`kodetransaksi`) REFERENCES `tb_mastertransaksi` (`kodetransaksi`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tb_mastertransaksi`
--
ALTER TABLE `tb_mastertransaksi`
  ADD CONSTRAINT `fk_anggota` FOREIGN KEY (`kodeanggota`) REFERENCES `tb_anggota` (`kodeanggota`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
