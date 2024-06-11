-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 08:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wisatastadionbangkalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` varchar(30) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `no_rek` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `no_rek`) VALUES
('01', 'BCA', 88765),
('02', 'JCB', 28310938),
('03', 'Shinhan', 1027987324);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `id_pembeli` varchar(256) NOT NULL,
  `nama_pembeli` text NOT NULL,
  `email_pembeli` varchar(320) NOT NULL,
  `nohp_pembeli` varchar(15) NOT NULL,
  `alamat` varchar(999) NOT NULL,
  `kota` char(163) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`id_pembeli`, `nama_pembeli`, `email_pembeli`, `nohp_pembeli`, `alamat`, `kota`) VALUES
('1', 'ayuna', 'kjashdlkjash@gmail.com', '086512312434', 'alkjshdkjhakljsfdasdf', 'mojokerto'),
('10', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('11', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('12', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('13', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('14', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('15', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('16', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('17', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('18', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('19', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('2', 'umar much', 'arczt3@gmail.com', '09898989123', 'adasfsdafasdf', 'SURABAYA'),
('20', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('21', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('22', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('23', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('24', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('25', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('26', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('27', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('28', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('29', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('3', 'umar much', 'arczt3@gmail.com', '09898989123', 'adasfsdafasdf', 'SURABAYA'),
('30', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('31', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('32', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('33', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('34', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('35', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('36', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('37', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('38', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('39', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('4', 'umar much', 'arczt3@gmail.com', '09898989123', 'adasfsdafasdf', 'SURABAYA'),
('40', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('41', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('42', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('43', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('44', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('45', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('46', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('47', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('48', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('49', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('5', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('50', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('51', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('52', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('53', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('54', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('55', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdlhfhjkasdf', 'SURABAYA'),
('56', 'umar much', 'sajdah@gmail.com', '09898989123', 'dfghjk', 'SURABAYA'),
('57', 'asdasdasd', 'adafsdf@gmail.com', '9081092388', 'gjhkdlmasdasd', 'surabaya'),
('58', 'asdjhgjhasdasd', 'ahjgsdkjdgas@gmail.com', '901820398123', 'jhgdaljhsdfsdf', 'asfhskdjlfsadf'),
('59', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfgfdsg', 'SURABAYA'),
('6', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('60', 'asdasfdsadf', 'asdfasdf@gmail.com', '0891238013', 'jashkdgfkjashdfasdf', 'surabaya'),
('61', 'andai', 'sajdah@gmail.com', '09898989123', 'agsdfghjgadl', 'SURABAYA'),
('62', 'andai', 'sajdah@gmail.com', '09898989123', 'agsdfghjgadl', 'SURABAYA'),
('63', 'andai', 'sajdah@gmail.com', '09898989123', 'ajksdhfkjdhaflksdff', 'SURABAYA'),
('64', 'andai', 'sajdah@gmail.com', '09898989123', 'ajksdhfkjdhaflksdff', 'SURABAYA'),
('65', 'andai', 'sajdah@gmail.com', '09898989123', 'ajksdhfkjdhaflksdff', 'SURABAYA'),
('66', 'andai', 'sajdah@gmail.com', '09898989123', 'ajksdhfkjdhaflksdff', 'SURABAYA'),
('67', 'andai', 'sajdah@gmail.com', '09898989123', 'ajksdhfkjdhaflksdff', 'SURABAYA'),
('68', 'andai', 'sajdah@gmail.com', '09898989123', 'ajksdhfkjdhaflksdff', 'SURABAYA'),
('69', 'andai', 'sajdah@gmail.com', '09898989123', 'ajksdhfkjdhaflksdff', 'SURABAYA'),
('7', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('70', 'andai', 'sajdah@gmail.com', '09898989123', 'ajksdhfkjdhaflksdff', 'SURABAYA'),
('71', 'andai', 'sajdah@gmail.com', '09898989123', 'ajksdhfkjdhaflksdff', 'SURABAYA'),
('72', 'andai', 'sajdah@gmail.com', '09898989123', 'ajksdhfkjdhaflksdff', 'SURABAYA'),
('73', 'andai', 'sajdah@gmail.com', '09898989123', 'ajksdhfkjdhaflksdff', 'SURABAYA'),
('74', 'andai', 'sajdah@gmail.com', '09898989123', 'ajksdhfkjdhaflksdff', 'SURABAYA'),
('75', 'andai', 'sajdah@gmail.com', '09898989123', 'ajksdhfkjdhaflksdff', 'SURABAYA'),
('76', 'andai', 'sajdah@gmail.com', '09898989123', 'ajksdhfkjdhaflksdff', 'SURABAYA'),
('77', 'ag', 'ag@gmail.com', '081230188640', 'jl satu tujuan', 'Surabaya'),
('78', 'guest satu', 'guestsatu@guest.com', '098123876234', 'jl guest satu', 'sidoarjo'),
('8', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA'),
('9', 'umar much', 'sajdah@gmail.com', '09898989123', 'asdfasfdasdf', 'SURABAYA');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_ticketd`
--

CREATE TABLE `pemesanan_ticketd` (
  `kode_booking` varchar(256) NOT NULL,
  `id_permainan` varchar(256) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan_ticketd`
--

INSERT INTO `pemesanan_ticketd` (`kode_booking`, `id_permainan`, `jumlah`, `subtotal`) VALUES
('SGB202406012807', 'FISHING01', 1, 15000),
('SGB2024060241048', 'FISHING01', 1, 15000),
('SGB2024060241048', 'ML02', 1, 15000),
('SGB2024060241048', 'IB01', 1, 15000),
('SGB2024060241048', 'MBBM01', 1, 15000),
('SGB2024060233107', 'FISHING01', 1, 15000),
('SGB2024060233107', 'ML02', 1, 15000),
('SGB2024060233107', 'IB01', 1, 15000),
('SGB2024060233107', 'MBBM01', 1, 15000),
('SGB2024060230713', 'FISHING01', 1, 15000),
('SGB2024060230713', 'ML02', 1, 15000),
('SGB2024060230713', 'IB01', 1, 15000),
('SGB2024060230713', 'MBBM01', 1, 15000),
('SGB2024060242322', 'FISHING01', 1, 15000),
('SGB2024060242322', 'ML02', 1, 15000),
('SGB2024060242322', 'IB01', 1, 15000),
('SGB2024060242322', 'MBBM01', 1, 15000),
('SGB2024060223283', 'FISHING01', 1, 15000),
('SGB2024060223283', 'ML02', 1, 15000),
('SGB2024060223283', 'IB01', 1, 15000),
('SGB2024060223283', 'MBBM01', 1, 15000),
('SGB2024060234702', 'FISHING01', 1, 15000),
('SGB2024060234702', 'ML02', 1, 15000),
('SGB2024060234702', 'IB01', 1, 15000),
('SGB2024060234702', 'MBBM01', 1, 15000),
('SGB2024060260606', 'FISHING01', 1, 15000),
('SGB2024060260606', 'ML02', 1, 15000),
('SGB2024060260606', 'IB01', 1, 15000),
('SGB2024060260606', 'MBBM01', 1, 15000),
('SGB2024060259021', 'FISHING01', 1, 15000),
('SGB2024060259021', 'ML02', 1, 15000),
('SGB2024060259021', 'IB01', 1, 15000),
('SGB2024060259021', 'MBBM01', 1, 15000),
('SGB2024060254462', 'FISHING01', 1, 15000),
('SGB2024060254462', 'ML02', 1, 15000),
('SGB2024060254462', 'IB01', 1, 15000),
('SGB2024060254462', 'MBBM01', 1, 15000),
('SGB2024060212640', 'FISHING01', 1, 15000),
('SGB2024060212640', 'ML02', 1, 15000),
('SGB2024060212640', 'IB01', 1, 15000),
('SGB2024060212640', 'MBBM01', 1, 15000),
('SGB2024060231234', 'FISHING01', 1, 15000),
('SGB2024060231234', 'ML02', 1, 15000),
('SGB2024060231234', 'IB01', 1, 15000),
('SGB2024060231234', 'MBBM01', 1, 15000),
('SGB2024060237227', 'FISHING01', 1, 15000),
('SGB2024060237227', 'ML02', 1, 15000),
('SGB2024060237227', 'IB01', 1, 15000),
('SGB2024060237227', 'MBBM01', 1, 15000),
('SGB2024060281463', 'FISHING01', 1, 15000),
('SGB2024060281463', 'ML02', 1, 15000),
('SGB2024060281463', 'IB01', 1, 15000),
('SGB2024060281463', 'MBBM01', 1, 15000),
('SGB2024060244464', 'FISHING01', 1, 15000),
('SGB2024060244464', 'ML02', 1, 15000),
('SGB2024060244464', 'IB01', 1, 15000),
('SGB2024060244464', 'MBBM01', 1, 15000),
('SGB2024060329793', 'FISHING01', 1, 15000),
('SGB2024060423959', 'MBBM01', 2, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_ticketh`
--

CREATE TABLE `pemesanan_ticketh` (
  `kode_booking` varchar(256) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pembeli` varchar(256) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_tagihan` int(11) NOT NULL,
  `id_bank` varchar(30) NOT NULL,
  `status` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan_ticketh`
--

INSERT INTO `pemesanan_ticketh` (`kode_booking`, `tanggal`, `id_pembeli`, `jenis`, `jumlah`, `total_tagihan`, `id_bank`, `status`) VALUES
('SGB2024053192818', '2024-06-01', '9', 'Ticket_Masuk', 1, 5000, '01', '0'),
('SGB202406012807', '2024-06-01', '60', 'Ticket_Masuk', 1, 20000, '01', '1'),
('SGB202406014169', '2024-06-01', '59', 'Ticket_Masuk', 1, 5000, '01', '1'),
('SGB2024060212640', '2024-06-02', '72', 'Ticket_Masuk', 1, 65000, '01', '0'),
('SGB2024060223283', '2024-06-02', '67', 'Ticket_Masuk', 1, 65000, '01', '0'),
('SGB2024060227930', '2024-06-03', '61', 'Ticket_Masuk', 1, 5000, '01', '0'),
('SGB2024060230713', '2024-06-02', '65', 'Ticket_Masuk', 1, 65000, '01', '0'),
('SGB2024060231234', '2024-06-02', '73', 'Ticket_Masuk', 1, 65000, '01', '0'),
('SGB2024060233107', '2024-06-02', '64', 'Ticket_Masuk', 1, 65000, '01', '0'),
('SGB2024060234702', '2024-06-02', '68', 'Ticket_Masuk', 1, 65000, '01', '0'),
('SGB2024060237227', '2024-06-02', '74', 'Ticket_Masuk', 1, 65000, '01', '0'),
('SGB2024060241048', '2024-06-02', '63', 'Ticket_Masuk', 1, 65000, '01', '0'),
('SGB2024060242322', '2024-06-02', '66', 'Ticket_Masuk', 1, 65000, '01', '0'),
('SGB2024060244464', '2024-06-02', '76', 'Ticket_Masuk', 1, 65000, '01', '1'),
('SGB2024060254462', '2024-06-02', '71', 'Ticket_Masuk', 1, 65000, '01', '0'),
('SGB2024060259021', '2024-06-02', '70', 'Ticket_Masuk', 1, 65000, '01', '0'),
('SGB2024060260606', '2024-06-02', '69', 'Ticket_Masuk', 1, 65000, '01', '0'),
('SGB2024060272991', '2024-06-03', '62', 'Ticket_Masuk', 1, 5000, '01', '0'),
('SGB2024060281463', '2024-06-02', '75', 'Ticket_Masuk', 1, 65000, '01', '1'),
('SGB2024060329793', '2024-06-03', '77', 'Ticket_Masuk', 1, 20000, '01', '1'),
('SGB2024060423959', '2024-07-01', '78', 'Ticket_Masuk', 1, 35000, '01', '1');

-- --------------------------------------------------------

--
-- Table structure for table `permainan`
--

CREATE TABLE `permainan` (
  `id_permainan` varchar(256) NOT NULL,
  `nama_permainan` varchar(30) NOT NULL,
  `durasi` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permainan`
--

INSERT INTO `permainan` (`id_permainan`, `nama_permainan`, `durasi`, `harga`) VALUES
('ML02', 'MOBIL LISTRIK (AKI)', 15, 15000),
('DRAW01', 'MELUKIS ANAK-ANAK', 60, 10000),
('IB01', 'ISTANA BALON', 60, 10000),
('FISHING01', 'MANCING MANIA', 15, 10000),
('OD01', 'ODONG ODONG (3 putaran)', 15, 15000),
('MBBM01', 'KERETA PANGGUNG', 10, 15000)
;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_masuk`
--

CREATE TABLE `ticket_masuk` (
  `jenis` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket_masuk`
--

INSERT INTO `ticket_masuk` (`jenis`, `harga`) VALUES
('Ticket_Masuk', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'andi', 'andigan@admin.com', 'andi123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id_pembeli`);

--
-- Indexes for table `pemesanan_ticketd`
--
ALTER TABLE `pemesanan_ticketd`
  ADD KEY `kode_booking` (`kode_booking`,`id_permainan`),
  ADD KEY `id_permainan` (`id_permainan`);

--
-- Indexes for table `pemesanan_ticketh`
--
ALTER TABLE `pemesanan_ticketh`
  ADD PRIMARY KEY (`kode_booking`),
  ADD KEY `id_pembeli` (`id_pembeli`,`jenis`,`id_bank`),
  ADD KEY `jenis` (`jenis`),
  ADD KEY `id_bank` (`id_bank`);

--
-- Indexes for table `permainan`
--
ALTER TABLE `permainan`
  ADD PRIMARY KEY (`id_permainan`);

--
-- Indexes for table `ticket_masuk`
--
ALTER TABLE `ticket_masuk`
  ADD PRIMARY KEY (`jenis`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan_ticketd`
--
ALTER TABLE `pemesanan_ticketd`
  ADD CONSTRAINT `pemesanan_ticketd_ibfk_1` FOREIGN KEY (`kode_booking`) REFERENCES `pemesanan_ticketh` (`kode_booking`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ticketd_ibfk_2` FOREIGN KEY (`id_permainan`) REFERENCES `permainan` (`id_permainan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan_ticketh`
--
ALTER TABLE `pemesanan_ticketh`
  ADD CONSTRAINT `pemesanan_ticketh_ibfk_1` FOREIGN KEY (`id_pembeli`) REFERENCES `pembeli` (`id_pembeli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ticketh_ibfk_2` FOREIGN KEY (`jenis`) REFERENCES `ticket_masuk` (`jenis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ticketh_ibfk_3` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
