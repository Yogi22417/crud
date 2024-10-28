-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 02:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`, `satuan`, `id_pengguna`) VALUES
(1, 'Kipas Mini', 'Kipas mini ini adalah ....', 'pcs', 4),
(2, 'Beanbag', 'Beanbag ini adalah ....', 'pcs', 4),
(3, 'Kursi', 'Kipas mini ini adalah ....', 'pcs', 5),
(4, 'Sofa', 'Kipas mini ini adalah ....', 'pcs', 4),
(5, 'Lemari', 'Kipas mini ini adalah ....', 'pcs', 5),
(6, 'Meja', 'Kipas mini ini adalah ....', 'pcs', 5),
(7, 'Kasur', 'Kipas mini ini adalah ....', 'pcs', 4),
(8, 'Gelang', 'Kipas mini ini adalah ....', 'pcs', 6),
(9, 'Aquarium', 'Kipas mini ini adalah ....', 'pcs', 5),
(10, 'Cincin', 'Kipas mini ini adalah ....', 'pcs', 6);

-- --------------------------------------------------------

--
-- Table structure for table `hakakses`
--

CREATE TABLE `hakakses` (
  `id_akses` int(11) NOT NULL,
  `nama_akses` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hakakses`
--

INSERT INTO `hakakses` (`id_akses`, `nama_akses`, `keterangan`) VALUES
(1, 'Super Admin', 'Dapat Melakukan Semua Hal Pada Database'),
(2, 'Admin', 'Dapat melakukan akses CRUD'),
(3, 'Database Administrator', 'Role yang digunakan oleh DBA'),
(4, 'Data Analyst', 'Role yang digunakan oleh Data Analyst'),
(5, 'System Analyst', 'Role yang digunakan oleh System Analyst'),
(6, 'Manager', 'Role yang digunakan oleh Manager'),
(7, 'Penjaga Toko', 'Role yang digunakan oleh Penjaga Toko'),
(8, 'Staff', 'Role yang digunakan oleh Staff'),
(9, 'Penjual', 'Role yang digunakan untuk melakukan penjualan'),
(10, 'Pembeli', 'Role yang digunakan untuk melakukan pembelian');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `jumlah_pembelian` int(11) DEFAULT NULL,
  `harga_beli` int(25) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `jumlah_pembelian`, `harga_beli`, `id_pengguna`, `id_barang`, `id_supplier`) VALUES
(1, 10, 20000, 4, 1, NULL),
(2, 10, 30000, 4, 2, NULL),
(3, 15, 25000, 5, 3, NULL),
(4, 15, 20000, 4, 4, NULL),
(5, 15, 40000, 5, 5, NULL),
(6, 5, 50000, 5, 6, NULL),
(7, 5, 70000, 4, 7, NULL),
(8, 50, 5000, 6, 8, NULL),
(9, 20, 15000, 5, 9, NULL),
(10, 50, 3000, 6, 10, NULL),
(11, 5, 20000, 4, 1, NULL),
(12, 15, 30000, 4, 2, NULL),
(13, 5, 25000, 5, 3, NULL),
(14, 5, 20000, 4, 4, NULL),
(15, 3, 40000, 5, 5, NULL),
(16, 10, 50000, 5, 6, NULL),
(17, 4, 70000, 4, 7, NULL),
(18, 25, 5000, 6, 8, NULL),
(19, 15, 15000, 5, 9, NULL),
(20, 30, 3000, 6, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama_depan` varchar(255) DEFAULT NULL,
  `nama_belakang` varchar(255) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `id_akses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `password`, `nama_depan`, `nama_belakang`, `no_hp`, `alamat`, `id_akses`) VALUES
(2, 'Yogi', 'reza', 'Reza', 'Pramana', '08215555555555', 'Jl. Sekian RT.06 RW.05', 2),
(3, 'Zamrudin Soleh', 'zamrudin', 'Zamrudin', 'Soleh', '082155512242', 'Jl. Begitu RT.06', 7),
(4, 'Soleh Solehin', 'soleh', 'Soleh', 'Solehin', '082152467242', 'Jl. Gini RT.06', 9),
(5, 'Salmaludin Malik', 'salmaludin', 'Salmaludin', 'Malik', '082152344242', 'Jl. Sekian RT.01', 9),
(6, 'Yeni Puspita', 'yeni', 'Yeni', 'Puspita', '082423344242', 'Jl. Pinggir RT.02', 9),
(7, 'Salsabilla Zahra', 'salsabilla', 'Salsabilla', 'Zahra', '082152324242', 'Jl. Buntu RT.01', 10),
(8, 'Rio Djaja', 'Rio', 'Rio', 'Djaja', '082152441242', 'Jl. Adaja RT.06', 10),
(9, 'Clarissa Putri', 'clarissa', 'Clarissa', 'Putri', '082152345242', 'Jl. Putra RT.11', 10),
(10, 'Rahmayanti Putri', 'rahmayanti', 'Rahmayanti', 'Putri', '082152345566', 'Jl. Mana RT.06', 10);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `jumlah_penjualan` int(11) DEFAULT NULL,
  `harga_jual` int(25) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `jumlah_penjualan`, `harga_jual`, `id_pengguna`, `id_barang`, `id_pelanggan`) VALUES
(1, 10, 25000, 4, 1, NULL),
(2, 10, 35000, 4, 2, NULL),
(3, 15, 30000, 5, 3, NULL),
(4, 15, 25000, 4, 4, NULL),
(5, 15, 45000, 5, 5, NULL),
(6, 5, 55000, 5, 6, NULL),
(7, 5, 75000, 4, 7, NULL),
(8, 50, 10000, 6, 8, NULL),
(9, 20, 20000, 5, 9, NULL),
(10, 50, 8000, 6, 10, NULL),
(11, 5, 25000, 4, 1, NULL),
(12, 15, 35000, 4, 2, NULL),
(13, 5, 30000, 5, 3, NULL),
(14, 5, 25000, 4, 4, NULL),
(15, 3, 45000, 5, 5, NULL),
(16, 10, 55000, 5, 6, NULL),
(17, 4, 75000, 4, 7, NULL),
(18, 25, 10000, 6, 8, NULL),
(19, 15, 20000, 5, 9, NULL),
(20, 30, 8000, 6, 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `no_telp`) VALUES
(1, 'PT. Sinar Sentosa', 'Jl. Sentosa No.4 Jakarta Barat', '022312524625'),
(2, 'PT. Jaya Makmur', 'Jl. Jayakarta No.10 Jakarta Barat', '022723428811'),
(3, 'PT. Uniliver', 'Jl. Unila No.1 Jakarta Pusat', '022888824523'),
(4, 'Aero Jaya', 'Jl. Sugeng No.20 Jakarta Timur', '022335159653'),
(5, 'Pulmina', 'Jl. Priaman Tangerang', '022888724624'),
(6, 'PT. Indoapril', 'Jl. Jaya Sentosa No.15 Jakarta Selatan', '022378579823'),
(7, 'Timur Tom', 'Jl. Pertimuran No.10 Jakarta Barat', '022878534344'),
(8, 'Barauya', 'Jl. Sempora Kota Bandung', '082094738823'),
(9, 'Abadi Maju', 'Jl. Kemurnian No.5 Jakarta Barat', '021772994824'),
(10, 'Samsudin Tinggi', 'Jl. Samsudin No.87 Tangerang Selatan', '081488289347'),
(11, 'Hamdani Sentosa', 'Jl. Hamdani No.4 Jakarta Pusat', '022719233373'),
(12, 'PT. Ikuzion', 'Jl. Teku Mari No.1 Jakarta Barat', '022789891378'),
(13, 'PT. Jaya Semua', 'Jl. Soekarno No.6 Bandung', '088829191676'),
(14, 'Ahuntar', 'Jl. Aceh No.12 Bandung', '085991128830'),
(15, 'Fanita Serba', 'Jl. Ruhinra No.77 Tangerang', '081939831892'),
(16, 'PT. Alpha Omega', 'Jl. Alpha No.8 Jakarta', '022671990278'),
(17, 'Sinar Sentorsi', 'Jl. Jaya Semedi No.93 Surabaya', '022789123123'),
(18, 'PT. Djoko Tilep', 'Jl. Djoko No.4 Yogyakarta', '022345789021'),
(19, 'Toko Semua Ada', 'Jl. Hadiran No.88 Jakarta Barat', '022678912323'),
(20, 'Tiga Saudara', 'Jl. Tidara No.10 Jakarta Selatan', '082241789023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `hakakses`
--
ALTER TABLE `hakakses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `id_akses` (`id_akses`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hakakses`
--
ALTER TABLE `hakakses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `barang` (`id_pengguna`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `pembelian_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `hakakses` (`id_akses`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `barang` (`id_pengguna`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `penjualan_ibfk_3` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
