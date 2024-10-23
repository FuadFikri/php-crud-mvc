-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2024 at 04:21 PM
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
-- Database: `db_newsport`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hakakses`
--

CREATE TABLE `hakakses` (
  `id_akses` int(11) NOT NULL,
  `nama_akses` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `alamat_pelanggan` text DEFAULT NULL,
  `no_telp_pelanggan` varchar(15) DEFAULT NULL,
  `email_pelanggan` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `jumlah_pembelian` int(11) DEFAULT NULL,
  `harga_beli` decimal(10,2) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_depan` varchar(100) DEFAULT NULL,
  `nama_belakang` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `id_akses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `jumlah_penjualan` int(11) DEFAULT NULL,
  `harga_jual` decimal(10,2) DEFAULT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `alamat_supplier` text DEFAULT NULL,
  `no_telp_supplier` varchar(15) DEFAULT NULL,
  `email_supplier` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  ADD KEY `fk_pembelian_supplier` (`id_supplier`);

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
  ADD KEY `fk_penjualan_pelanggan` (`id_pelanggan`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hakakses`
--
ALTER TABLE `hakakses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `fk_pembelian_supplier` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `hakakses` (`id_akses`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_penjualan_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


INSERT INTO `tugas4`.`hakakses` (`id_akses`, `nama_akses`) VALUES ('1', 'admin');

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `password`, `nama_depan`, `nama_belakang`, `no_hp`, `alamat`, `id_akses`) 
VALUES (1, 'andi_pratama', 'password123', 'Andi', 'Pratama', '081234567890', 'Jl. Merdeka No. 123, Jakarta', 1);

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `password`, `nama_depan`, `nama_belakang`, `no_hp`, `alamat`, `id_akses`) 
VALUES (2, 'siti_rahmawati', 'passw0rd', 'Siti', 'Rahmawati', '085678901234', 'Jl. Kenanga No. 45, Bandung', 1);

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `password`, `nama_depan`, `nama_belakang`, `no_hp`, `alamat`, `id_akses`) 
VALUES (3, 'budi_santoso', 'budi2024', 'Budi', 'Santoso', '082345678901', 'Jl. Mangga No. 67, Surabaya', 1);

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `password`, `nama_depan`, `nama_belakang`, `no_hp`, `alamat`, `id_akses`) 
VALUES (4, 'rina_oktaviani', 'rinaok123', 'Rina', 'Oktaviani', '083456789012', 'Jl. Melati No. 89, Yogyakarta', 1);

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `password`, `nama_depan`, `nama_belakang`, `no_hp`, `alamat`, `id_akses`) 
VALUES (5, 'doni_setiawan', 'doni12345', 'Doni', 'Setiawan', '081234567891', 'Jl. Anggrek No. 12, Medan', 1);




INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `no_telp_supplier`, `email_supplier`, `keterangan`) 
VALUES (1, 'PT Bina Sukses', 'Jl. Jendral Sudirman No. 88, Jakarta', '0213456789', 'contact@binasukses.com', 'Supplier alat tulis kantor');

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `no_telp_supplier`, `email_supplier`, `keterangan`) 
VALUES (2, 'CV Sumber Makmur', 'Jl. Raya Bogor KM. 12, Bogor', '02517456789', 'info@sumbermakmur.co.id', 'Supplier peralatan industri');

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `no_telp_supplier`, `email_supplier`, `keterangan`) 
VALUES (3, 'PT Sentosa Abadi', 'Jl. Pahlawan No. 45, Surabaya', '03112345678', 'sentosa.abadi@email.com', 'Supplier bahan bangunan');

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `no_telp_supplier`, `email_supplier`, `keterangan`) 
VALUES (4, 'CV Karya Jaya', 'Jl. Gatot Subroto No. 10, Bandung', '02278901234', 'karyajaya@email.com', 'Supplier kebutuhan elektronik');

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `no_telp_supplier`, `email_supplier`, `keterangan`) 
VALUES (5, 'PT Maju Terus', 'Jl. Anggrek No. 22, Yogyakarta', '02741234567', 'majuterus@company.co.id', 'Supplier produk makanan');


INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `no_telp_pelanggan`, `email_pelanggan`, `keterangan`) 
VALUES (1, 'Andi Pratama', 'Jl. Merdeka No. 123, Jakarta', '081234567890', 'andi.pratama@email.com', 'Pelanggan tetap sejak 2021');

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `no_telp_pelanggan`, `email_pelanggan`, `keterangan`) 
VALUES (2, 'Siti Rahmawati', 'Jl. Kenanga No. 45, Bandung', '085678901234', 'siti.rahmawati@email.com', 'Sering membeli produk elektronik');

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `no_telp_pelanggan`, `email_pelanggan`, `keterangan`) 
VALUES (3, 'Budi Santoso', 'Jl. Mangga No. 67, Surabaya', '082345678901', 'budi.santoso@email.com', 'Pelanggan baru, tertarik pada promo diskon');

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `no_telp_pelanggan`, `email_pelanggan`, `keterangan`) 
VALUES (4, 'Rina Oktaviani', 'Jl. Melati No. 89, Yogyakarta', '083456789012', 'rina.oktaviani@email.com', 'Pernah mengikuti program loyalitas');

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `no_telp_pelanggan`, `email_pelanggan`, `keterangan`) 
VALUES (5, 'Doni Setiawan', 'Jl. Anggrek No. 12, Medan', '081234567891', 'doni.setiawan@email.com', 'Memiliki preferensi produk pakaian');


INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`, `satuan`, `id_pengguna`) 
VALUES (1, 'Buku Tulis', 'Buku tulis 40 lembar', 'Pcs', null);

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`, `satuan`, `id_pengguna`) 
VALUES (2, 'Pulpen', 'Pulpen tinta hitam', 'Pcs', null);

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`, `satuan`, `id_pengguna`) 
VALUES (3, 'Penggaris', 'Penggaris 30 cm plastik', 'Pcs', null);

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`, `satuan`, `id_pengguna`) 
VALUES (4, 'Penghapus', 'Penghapus karet putih', 'Pcs', null);

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`, `satuan`, `id_pengguna`) 
VALUES (5, 'Pensil', 'Pensil 2B kayu', 'Pcs', null);

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`, `satuan`, `id_pengguna`) 
VALUES (6, 'Spidol', 'Spidol papan tulis warna hitam', 'Pcs', null);

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`, `satuan`, `id_pengguna`) 
VALUES (7, 'Stapler', 'Stapler ukuran kecil', 'Pcs', null);

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`, `satuan`, `id_pengguna`) 
VALUES (8, 'Kertas HVS', 'Kertas HVS A4 70 gsm', 'Rim', null);

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`, `satuan`, `id_pengguna`) 
VALUES (9, 'Amplop', 'Amplop coklat besar', 'Pcs', null);

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`, `satuan`, `id_pengguna`) 
VALUES (10, 'Binder Clip', 'Binder clip 25 mm', 'Pcs', null);



INSERT INTO `pembelian` (`id_pembelian`, `jumlah_pembelian`, `harga_beli`, `id_pengguna`, `id_barang`, `id_supplier`) 
VALUES (1, 100, 5000.00, 1, 1, 1);

INSERT INTO `pembelian` (`id_pembelian`, `jumlah_pembelian`, `harga_beli`, `id_pengguna`, `id_barang`, `id_supplier`) 
VALUES (2, 50, 2500.00, 2, 2, 2);

INSERT INTO `pembelian` (`id_pembelian`, `jumlah_pembelian`, `harga_beli`, `id_pengguna`, `id_barang`, `id_supplier`) 
VALUES (3, 200, 3000.00, 3, 3, 3);

INSERT INTO `pembelian` (`id_pembelian`, `jumlah_pembelian`, `harga_beli`, `id_pengguna`, `id_barang`, `id_supplier`) 
VALUES (4, 150, 1500.00, 4, 4, 4);

INSERT INTO `pembelian` (`id_pembelian`, `jumlah_pembelian`, `harga_beli`, `id_pengguna`, `id_barang`, `id_supplier`) 
VALUES (5, 75, 7500.00, 5, 5, 5);


