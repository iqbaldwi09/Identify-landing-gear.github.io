-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql112.byetcluster.com
-- Generation Time: Jun 09, 2023 at 09:35 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezyro_33733978_iqbal`
--

-- --------------------------------------------------------

--
-- Table structure for table `simpan_hasil`
--

CREATE TABLE `simpan_hasil` (
  `Id` int(11) NOT NULL,
  `DocId` int(11) NOT NULL,
  `Hasil_Bobot_Akhir` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `simpan_hasil`
--

INSERT INTO `simpan_hasil` (`Id`, `DocId`, `Hasil_Bobot_Akhir`) VALUES
(1, 1595, 0.189498),
(2, 1596, 1.1304),
(3, 1597, 0.176132),
(4, 1598, 0.163101),
(5, 1599, 0.166163),
(6, 1600, 0.171962),
(7, 1601, 0.144638),
(8, 1602, 0.101646),
(9, 1603, 0.148938),
(10, 1604, 0.145802),
(11, 1606, 0.150163),
(12, 1607, 0.163101),
(13, 1608, 0.166163),
(14, 1609, 0.171962),
(15, 1610, 0.196066),
(16, 1611, 0.231249),
(17, 1613, 0.144277),
(18, 1614, 0.160109),
(19, 1615, 0.171962),
(20, 1616, 0.231249),
(21, 1617, 1.47642),
(22, 1618, 0.16657),
(23, 1619, 0.16657),
(24, 1620, 0.219024),
(25, 1643, 0.267418),
(26, 1645, 0.267418);

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE `tbadmin` (
  `user` varchar(30) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`user`, `pass`) VALUES
('sahrul', '1234'),
('admin', 'admin'),
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbberita`
--

CREATE TABLE `tbberita` (
  `id` int(11) NOT NULL,
  `docu` longtext CHARACTER SET latin1 NOT NULL,
  `jawaban` longtext CHARACTER SET latin1 DEFAULT NULL,
  `ijin` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbberita`
--

INSERT INTO `tbberita` (`id`, `docu`, `jawaban`, `ijin`) VALUES
(1622, 'Kondisi Main Wheel Tire Aus (Worn out)', 'Landing Gear Tire Mengalami Kerusakan', 'Sudah Ada Ijin'),
(1621, 'Kondisi Nose Wheel Tire Aus (Worn Out) ', 'Landing Gear Tire Mengalami Kerusakan', 'Sudah Ada Ijin'),
(1620, 'Brake Pedal Tidak Berfungsi', 'Brake Master Cylinder Spring Mengalami Keausan', 'Sudah Ada Ijin'),
(1619, 'Tekanan Hand Brake rendah', 'Brake Master Cylinder Mengalami Kebocoran', 'Sudah Ada Ijin'),
(1618, 'Tekanan Hand Brake Low ', 'Brake Master Cylinder Mengalami Kebocoran', 'Sudah Ada Ijin'),
(1617, 'Parking Brake Tidak Dapat Dioperasikan', 'Parking Brake Patah', 'Sudah Ada Ijin'),
(1616, 'Brake Piston Mengalami Kebocoran', 'Ditemukan Sobekan Pada O-ring Brake Piston', 'Sudah Ada Ijin'),
(1615, 'Brake Caliper Piston Kanan Mengalami Kebocoran', 'Ditemukan Sobekan Pada O-ring Brake Piston', 'Sudah Ada Ijin'),
(1613, 'Brake Piston  O-ring Mengalami Kebocoran ', 'Ditemukan Sobekan Pada O-ring Brake Piston', 'Sudah Ada Ijin'),
(1614, 'Terjadi kebocoran pada brake Caliper Piston Kiri', 'Ditemukan Sobekan Pada O-ring Brake Piston', 'Sudah Ada Ijin'),
(1611, 'Brake Piston Mengalami Kebocoran', 'Ditemukan Sobekan Pada O-ring Brake Piston', 'Sudah Ada Ijin'),
(1610, 'Brake Caliper Piston Mengalami Kebocoran', 'Ditemukan Sobekan Pada O-ring Brake Piston', 'Sudah Ada Ijin'),
(1609, 'Brake Caliper Piston Kanan Mengalami Kebocoran', 'Ditemukan Sobekan Pada O-ring Brake Piston', 'Sudah Ada Ijin'),
(1608, 'Brake Caliper Piston Kiri Mengalami Kebocoran', 'Ditemukan Sobekan Pada O-ring Brake Piston', 'Sudah Ada Ijin'),
(1607, 'Terdapat Cairan Pada Brake Piston Cylinder', 'Ditemukan Sobekan Pada O-ring Brake Piston', 'Sudah Ada Ijin'),
(1606, 'Brake Pressure Plate Sisi Kanan Mengalami Keausan, dan ada 4 Bolt Brake Assy alami Keausan', ' Brake pressure plate sisi kanan mengalami keausan, 4 bolt brake assy mengalami keausan yang telah melewati batas', 'Sudah Ada Ijin'),
(1605, 'Terdapat Cairan Pada Bake Piston Cylinder Hose', 'Terdapat Kebocoran Cairan Pada Brake Piston Cylinder Hose', 'Sudah Ada Ijin'),
(1604, 'Brake Disc Main Landing Gear Mengalami Keausan', 'Brake Disc Main Landing Gear Mengalami Keausan dan Telah Melewati Batas', 'Sudah Ada Ijin'),
(1603, 'Brake Pad Nose Landing Gear Mengalami Keausan', 'Brake Pad Mengalami Keausan (worn out) Melewati Batas', 'Sudah Ada Ijin'),
(1602, 'Brake Disisi Kanan (Posisi Co-Pilot) Tidak Bekerja Dengan Baik', 'Terdapat Udara Pada Brake Caliper', 'Sudah Ada Ijin'),
(1601, 'Tekanan Hand Brake Low (Rendah)', 'Terdapat Udara Pada Brake Caliper', 'Sudah Ada Ijin'),
(1600, 'Brake Caliper Piston Kanan Mengalami Kebocoran', 'Brake Caliper Mengalami Kebocoran', 'Sudah Ada Ijin'),
(1599, 'Brake Caliper Piston Kiri Mengalami Kebocoran', 'Brake Caliper Mengalami Kebocoran', 'Sudah Ada Ijin'),
(1598, 'Terdapat Cairan Pada Brake Piston Cylinder', 'Brake Caliper Mengalami Kebocoran', 'Sudah Ada Ijin'),
(1597, 'Brake Lining Mengalami Keausan', 'Brake Linning Mengalami Keausan Melewati Batas', 'Sudah Ada Ijin'),
(1596, 'Brake Tidak Dapat Dioperasikan Dalam Kondisi Parking', 'Brake System Tidak Dapat Dioperasikan', 'Sudah Ada Ijin'),
(1595, 'Brake Main Landing Gear Tidak Berfungsi', 'Brake System Tidak Dapat Dioperasikan', 'Sudah Ada Ijin'),
(1594, 'Pilot Melaporkan Adanya Getaran Berlebih Pada Nose Landing Gear Saat Take-off', 'Pin Assy Torque Link , Bolt Assy Torque Mengalami Keausan (Worn Out)', 'Sudah Ada Ijin'),
(1593, 'Nose Landing Gear Bushing Pada Gear Spring  Tidak Terpasang Dengan Benar', 'Yoke Spring Forward Support Bearing', 'Sudah Ada Ijin'),
(1592, 'Nose Yoke Support Assy Bergeser', 'Linner Nose Yoke Support Assy Mengalami Slip', 'Sudah Ada Ijin'),
(1591, 'Nose Gear Spring Support Bushing Bergeser', 'Linner Nose Yoke Support Assy Mengalami Slip', 'Sudah Ada Ijin'),
(1590, 'Getaran Berlebihan Terjadi Saat Take-off dan Landing Pada Nose Landing Gear', 'Torque link Assy Mengalami Kelonggaran (Loosen) Dikarenakan Bolt Mengalami Keausan', 'Sudah Ada Ijin'),
(1589, 'Terjadi Getaran Saat Taxi Pada Rudder Pedal', 'Torque link Assy Mengalami Kelonggaran (Loosen) Dikarenakan Bolt Mengalami Keausan', 'Sudah Ada Ijin'),
(1588, 'Nose Landing Susah Dikemudikan', 'Nose Steering Bungee Mengalami Kerusakan', 'Sudah Ada Ijin'),
(1587, 'Pemeriksaan Nose Gear Steering Bung', 'Nose Steering Bungee Mengalami Kerusakan', 'Sudah Ada Ijin'),
(1586, 'Getaran Berlebihan Terjadi Saat Take-off dan Landing Pada Nose Landing Gear', 'Ditemukan Sobekan Pada Packing Landing Gear', 'Sudah Ada Ijin'),
(1585, 'Nose Gear Shock Strut Mengalami Kebocoran', 'Ditemukan Sobekan Pada Packing Landing Gear', 'Sudah Ada Ijin'),
(1584, 'Kebocoran Cairan Hydraulic Pada Nose Gear Strut', 'Ditemukan Sobekan Pada Packing Landing Gear', 'Sudah Ada Ijin'),
(1583, 'Sering Terjadi Hard Landing Pada Main Landing', 'Kelonggaran pada Trunnion,berputarnya pins,dan Bushing patah', 'Sudah Ada Ijin'),
(1582, 'Nose Gear Spring Support Assy Bergetar', 'Kelonggaran pada Trunnion,berputarnya pins,dan Bushing patah', 'Sudah Ada Ijin'),
(1581, 'Nose Landing Gear Drag Link Bushing Bergeser', 'Kelonggaran pada Trunnion,berputarnya pins,dan Bushing patah', 'Sudah Ada Ijin'),
(1580, 'Hard Landing Pada Main Landing', 'Trunions, Pins, Bushing Landing Gear Mengalami Hard Landing', 'Sudah Ada Ijin'),
(1579, 'Sering Terjadi Hard Landing Pada Main Landing', 'Trunions, Pins, Bushing Landing Gear Mengalami Hard Landing', 'Sudah Ada Ijin'),
(1578, 'Saat Pre-Flight Drag Link Support Liner Bergeser Sedikit Keluar', 'Forward Drag Link Spring Support Pada Nose Landing Gear Liner Bergerak Ke Arah Aftward', 'Sudah Ada Ijin'),
(1577, 'Nose Landing Gear Drag Link Bushing Bergeser', 'Forward Drag Link Spring Support Pada Nose Landing Gear Liner Bergerak Ke Arah Aftward', 'Sudah Ada Ijin'),
(1576, 'Nose Landing Gear Drag Link Spring Support Liner Bergeser', 'Forward Drag Link Spring Support Pada Nose Landing Gear Liner Bergerak Ke Arah Aftward', 'Sudah Ada Ijin'),
(1575, 'Liner Forward Drag Link Spring Bergerak', 'Forward Drag Link Spring Support Pada Nose Landing Gear Liner Bergerak Ke Arah Aftward', 'Sudah Ada Ijin'),
(1574, 'Sering Terjadi Hard Landing Pada Main Landing', 'Terdapat Sobekan O-ring Nose Gear Shock Stru', 'Sudah Ada Ijin'),
(1573, 'Nose Gear Shock Strut Mengalami Kebocoran', 'Terdapat Sobekan O-ring Nose Gear Shock Stru', 'Sudah Ada Ijin'),
(1572, 'Kebocoran Cairan Hydraulic Pada Nose Gear Strut ', 'Terdapat Sobekan O-ring Nose Gear Shock Stru', 'Sudah Ada Ijin'),
(1571, 'Nose Gear Shock Strut Mengalami Kebocoran', 'Terdapat Kebocoran Pada O-Ring  Shock Strut', 'Sudah Ada Ijin'),
(1570, 'Kebocoran Cairan Hydraulic Pada Nose Gear Strut ', 'Terdapat Kebocoran Pada O-Ring  Shock Strut', 'Sudah Ada Ijin'),
(1569, 'Kurangnya Respon Rudder Pedal Saat Di Ground', 'Nose Gear Shock Strut Tidak Beroperasi Dengan Benar', 'Sudah Ada Ijin'),
(1568, 'Rudder Pedal Susah Untuk Digerakkan Sekitar 1 Menit Saat Rolling Landing', 'Nose Gear Shock Strut Tidak Beroperasi Dengan Benar', 'Sudah Ada Ijin'),
(1567, 'Main Landing Fairing Tidak Terpasang Dengan Benar', 'Terdapat Patahan Pada Landing Gear Fairing', 'Sudah Ada Ijin'),
(1566, 'Lampu Landing Gear Tidak Menyala', 'Bulb Landing Gear Mengalami Kerusakan', 'Sudah Ada Ijin'),
(1623, 'Kondisi Nose Wheel Tire Mengalami Sobekan (Deep Cut)', 'Landing Gear Tire Mengalami Kerusakan', 'Sudah Ada Ijin'),
(1624, 'Kondisi  Main Wheel Tire Mengalami Sobekan (Deep Cut)', 'Landing Gear Tire Mengalami Kerusakan', 'Sudah Ada Ijin'),
(1625, 'Main Wheel Tire Mengalami Kebocoran', ' Landing Gear Tire Mengalami Kerusakan', 'Sudah Ada Ijin');

-- --------------------------------------------------------

--
-- Table structure for table `tbcache`
--

CREATE TABLE `tbcache` (
  `Id` int(11) NOT NULL,
  `kuery` varchar(100) NOT NULL,
  `DocId` int(11) NOT NULL,
  `nilai_sim` float(5,1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbcache`
--

INSERT INTO `tbcache` (`Id`, `kuery`, `DocId`, `nilai_sim`) VALUES
(1, 'parking brake  dapat dioperasikan', 1595, 12.8),
(2, 'parking brake  dapat dioperasikan', 1596, 76.6),
(3, 'parking brake  dapat dioperasikan', 1597, 11.9),
(4, 'parking brake  dapat dioperasikan', 1598, 11.0),
(5, 'parking brake  dapat dioperasikan', 1599, 11.3),
(6, 'parking brake  dapat dioperasikan', 1600, 11.6),
(7, 'parking brake  dapat dioperasikan', 1601, 9.8),
(8, 'parking brake  dapat dioperasikan', 1602, 6.9),
(9, 'parking brake  dapat dioperasikan', 1603, 10.1),
(10, 'parking brake  dapat dioperasikan', 1604, 9.9),
(11, 'parking brake  dapat dioperasikan', 1606, 10.2),
(12, 'parking brake  dapat dioperasikan', 1607, 11.0),
(13, 'parking brake  dapat dioperasikan', 1608, 11.3),
(14, 'parking brake  dapat dioperasikan', 1609, 11.6),
(15, 'parking brake  dapat dioperasikan', 1610, 13.3),
(16, 'parking brake  dapat dioperasikan', 1611, 15.7),
(17, 'parking brake  dapat dioperasikan', 1613, 9.8),
(18, 'parking brake  dapat dioperasikan', 1614, 10.8),
(19, 'parking brake  dapat dioperasikan', 1615, 11.6),
(20, 'parking brake  dapat dioperasikan', 1616, 15.7),
(21, 'parking brake  dapat dioperasikan', 1617, 100.0),
(22, 'parking brake  dapat dioperasikan', 1618, 11.3),
(23, 'parking brake  dapat dioperasikan', 1619, 11.3),
(24, 'parking brake  dapat dioperasikan', 1620, 14.8),
(25, 'parking brake  dapat dioperasikan', 1643, 18.1),
(26, 'parking brake  dapat dioperasikan', 1645, 18.1);

-- --------------------------------------------------------

--
-- Table structure for table `tbindex`
--

CREATE TABLE `tbindex` (
  `Id` int(11) NOT NULL,
  `Term` varchar(30) NOT NULL,
  `DocId` int(11) NOT NULL,
  `kount` int(11) NOT NULL,
  `Bobot` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbindex`
--

INSERT INTO `tbindex` (`Id`, `Term`, `DocId`, `kount`, `Bobot`) VALUES
(1, 'lampu', 1566, 1, 2.17609),
(2, 'landing', 1566, 1, 1.57403),
(3, 'gear', 1566, 1, 1.53264),
(4, 'menyala', 1566, 1, 2.57403),
(5, 'main', 1567, 1, 1.87506),
(6, 'landing', 1567, 1, 1.57403),
(7, 'fairing', 1567, 1, 2.87506),
(8, 'terpasang', 1567, 1, 2.57403),
(9, 'benar', 1567, 1, 2.57403),
(10, 'rudder', 1568, 1, 2.39794),
(11, 'pedal', 1568, 1, 2.09691),
(12, 'susah', 1568, 1, 2.57403),
(13, 'untuk', 1568, 1, 2.87506),
(14, 'digerakkan', 1568, 1, 2.87506),
(15, 'sekitar', 1568, 1, 2.87506),
(16, '1', 1568, 1, 2.87506),
(17, 'menit', 1568, 1, 2.87506),
(18, 'saat', 1568, 1, 2.02996),
(19, 'rolling', 1568, 1, 2.87506),
(20, 'landing', 1568, 1, 1.57403),
(21, 'kurangnya', 1569, 1, 2.87506),
(22, 'respon', 1569, 1, 2.87506),
(23, 'rudder', 1569, 1, 2.39794),
(24, 'pedal', 1569, 1, 2.09691),
(25, 'saat', 1569, 1, 2.02996),
(26, 'di', 1569, 1, 2.87506),
(27, 'ground', 1569, 1, 2.87506),
(28, 'kebocoran', 1570, 1, 1.64461),
(29, 'cairan', 1570, 1, 2.09691),
(30, 'hydraulic', 1570, 1, 2.39794),
(31, 'nose', 1570, 1, 1.55284),
(32, 'gear', 1570, 1, 1.53264),
(33, 'strut', 1570, 1, 2.09691),
(34, 'nose', 1571, 1, 1.55284),
(35, 'gear', 1571, 1, 1.53264),
(36, 'shock', 1571, 1, 2.39794),
(37, 'strut', 1571, 1, 2.09691),
(38, 'mengalami', 1571, 1, 1.59631),
(39, 'kebocoran', 1571, 1, 1.64461),
(40, 'kebocoran', 1572, 1, 1.64461),
(41, 'cairan', 1572, 1, 2.09691),
(42, 'hydraulic', 1572, 1, 2.39794),
(43, 'nose', 1572, 1, 1.55284),
(44, 'gear', 1572, 1, 1.53264),
(45, 'strut', 1572, 1, 2.09691),
(46, 'nose', 1573, 1, 1.55284),
(47, 'gear', 1573, 1, 1.53264),
(48, 'shock', 1573, 1, 2.39794),
(49, 'strut', 1573, 1, 2.09691),
(50, 'mengalami', 1573, 1, 1.59631),
(51, 'kebocoran', 1573, 1, 1.64461),
(52, 'sering', 1574, 1, 2.39794),
(53, 'terjadi', 1574, 1, 2.02996),
(54, 'hard', 1574, 1, 2.273),
(55, 'landing', 1574, 2, 3.14806),
(56, 'main', 1574, 1, 1.87506),
(57, 'liner', 1575, 1, 2.39794),
(58, 'forward', 1575, 1, 2.87506),
(59, 'drag', 1575, 1, 2.17609),
(60, 'link', 1575, 1, 2.17609),
(61, 'spring', 1575, 1, 2.17609),
(62, 'bergerak', 1575, 1, 2.87506),
(63, 'nose', 1576, 1, 1.55284),
(64, 'landing', 1576, 1, 1.57403),
(65, 'gear', 1576, 1, 1.53264),
(66, 'drag', 1576, 1, 2.17609),
(67, 'link', 1576, 1, 2.17609),
(68, 'spring', 1576, 1, 2.17609),
(69, 'support', 1576, 1, 2.17609),
(70, 'liner', 1576, 1, 2.39794),
(71, 'bergeser', 1576, 1, 2.09691),
(72, 'nose', 1577, 1, 1.55284),
(73, 'landing', 1577, 1, 1.57403),
(74, 'gear', 1577, 1, 1.53264),
(75, 'drag', 1577, 1, 2.17609),
(76, 'link', 1577, 1, 2.17609),
(77, 'bushing', 1577, 1, 2.273),
(78, 'bergeser', 1577, 1, 2.09691),
(79, 'saat', 1578, 1, 2.02996),
(80, 'pre', 1578, 1, 2.87506),
(81, 'flight', 1578, 1, 2.87506),
(82, 'drag', 1578, 1, 2.17609),
(83, 'link', 1578, 1, 2.17609),
(84, 'support', 1578, 1, 2.17609),
(85, 'liner', 1578, 1, 2.39794),
(86, 'bergeser', 1578, 1, 2.09691),
(87, 'sedikit', 1578, 1, 2.87506),
(88, 'keluar', 1578, 1, 2.87506),
(89, 'sering', 1579, 1, 2.39794),
(90, 'terjadi', 1579, 1, 2.02996),
(91, 'hard', 1579, 1, 2.273),
(92, 'landing', 1579, 2, 3.14806),
(93, 'main', 1579, 1, 1.87506),
(94, 'hard', 1580, 1, 2.273),
(95, 'landing', 1580, 2, 3.14806),
(96, 'main', 1580, 1, 1.87506),
(97, 'nose', 1581, 1, 1.55284),
(98, 'landing', 1581, 1, 1.57403),
(99, 'gear', 1581, 1, 1.53264),
(100, 'drag', 1581, 1, 2.17609),
(101, 'link', 1581, 1, 2.17609),
(102, 'bushing', 1581, 1, 2.273),
(103, 'bergeser', 1581, 1, 2.09691),
(104, 'nose', 1582, 1, 1.55284),
(105, 'gear', 1582, 1, 1.53264),
(106, 'spring', 1582, 1, 2.17609),
(107, 'support', 1582, 1, 2.17609),
(108, 'assy', 1582, 1, 2.39794),
(109, 'bergetar', 1582, 1, 2.87506),
(110, 'sering', 1583, 1, 2.39794),
(111, 'terjadi', 1583, 1, 2.02996),
(112, 'hard', 1583, 1, 2.273),
(113, 'landing', 1583, 2, 3.14806),
(114, 'main', 1583, 1, 1.87506),
(115, 'kebocoran', 1584, 1, 1.64461),
(116, 'cairan', 1584, 1, 2.09691),
(117, 'hydraulic', 1584, 1, 2.39794),
(118, 'nose', 1584, 1, 1.55284),
(119, 'gear', 1584, 1, 1.53264),
(120, 'strut', 1584, 1, 2.09691),
(121, 'nose', 1585, 1, 1.55284),
(122, 'gear', 1585, 1, 1.53264),
(123, 'shock', 1585, 1, 2.39794),
(124, 'strut', 1585, 1, 2.09691),
(125, 'mengalami', 1585, 1, 1.59631),
(126, 'kebocoran', 1585, 1, 1.64461),
(127, 'getaran', 1586, 1, 2.273),
(128, 'berlebihan', 1586, 1, 2.57403),
(129, 'terjadi', 1586, 1, 2.02996),
(130, 'saat', 1586, 1, 2.02996),
(131, 'take', 1586, 1, 2.39794),
(132, 'off', 1586, 1, 2.39794),
(133, 'landing', 1586, 2, 3.14806),
(134, 'nose', 1586, 1, 1.55284),
(135, 'gear', 1586, 1, 1.53264),
(136, 'pemeriksaan', 1587, 1, 2.87506),
(137, 'nose', 1587, 1, 1.55284),
(138, 'gear', 1587, 1, 1.53264),
(139, 'steering', 1587, 1, 2.87506),
(140, 'bung', 1587, 1, 2.87506),
(141, 'nose', 1588, 1, 1.55284),
(142, 'landing', 1588, 1, 1.57403),
(143, 'susah', 1588, 1, 2.57403),
(144, 'dikemudikan', 1588, 1, 2.87506),
(145, 'terjadi', 1589, 1, 2.02996),
(146, 'getaran', 1589, 1, 2.273),
(147, 'saat', 1589, 1, 2.02996),
(148, 'taxi', 1589, 1, 2.87506),
(149, 'rudder', 1589, 1, 2.39794),
(150, 'pedal', 1589, 1, 2.09691),
(151, 'getaran', 1590, 1, 2.273),
(152, 'berlebihan', 1590, 1, 2.57403),
(153, 'terjadi', 1590, 1, 2.02996),
(154, 'saat', 1590, 1, 2.02996),
(155, 'take', 1590, 1, 2.39794),
(156, 'off', 1590, 1, 2.39794),
(157, 'landing', 1590, 2, 3.14806),
(158, 'nose', 1590, 1, 1.55284),
(159, 'gear', 1590, 1, 1.53264),
(160, 'nose', 1591, 1, 1.55284),
(161, 'gear', 1591, 1, 1.53264),
(162, 'spring', 1591, 1, 2.17609),
(163, 'support', 1591, 1, 2.17609),
(164, 'bushing', 1591, 1, 2.273),
(165, 'bergeser', 1591, 1, 2.09691),
(166, 'nose', 1592, 1, 1.55284),
(167, 'yoke', 1592, 1, 2.87506),
(168, 'support', 1592, 1, 2.17609),
(169, 'assy', 1592, 1, 2.39794),
(170, 'bergeser', 1592, 1, 2.09691),
(171, 'nose', 1593, 1, 1.55284),
(172, 'landing', 1593, 1, 1.57403),
(173, 'gear', 1593, 2, 3.06528),
(174, 'bushing', 1593, 1, 2.273),
(175, 'spring', 1593, 1, 2.17609),
(176, 'terpasang', 1593, 1, 2.57403),
(177, 'benar', 1593, 1, 2.57403),
(178, 'pilot', 1594, 1, 2.57403),
(179, 'melaporkan', 1594, 1, 2.87506),
(180, 'aya', 1594, 1, 2.87506),
(181, 'getaran', 1594, 1, 2.273),
(182, 'berlebih', 1594, 1, 2.87506),
(183, 'nose', 1594, 1, 1.55284),
(184, 'landing', 1594, 1, 1.57403),
(185, 'gear', 1594, 1, 1.53264),
(186, 'saat', 1594, 1, 2.02996),
(187, 'take', 1594, 1, 2.39794),
(188, 'off', 1594, 1, 2.39794),
(189, 'brake', 1595, 1, 1.47712),
(190, 'main', 1595, 1, 1.87506),
(191, 'landing', 1595, 1, 1.57403),
(192, 'gear', 1595, 1, 1.53264),
(193, 'berfungsi', 1595, 1, 2.273),
(194, 'brake', 1596, 1, 1.47712),
(195, 'dapat', 1596, 1, 2.17609),
(196, 'dioperasikan', 1596, 1, 2.39794),
(197, 'dalam', 1596, 1, 2.87506),
(198, 'kondisi', 1596, 1, 2.17609),
(199, 'parking', 1596, 1, 2.39794),
(200, 'brake', 1597, 1, 1.47712),
(201, 'lng', 1597, 1, 2.87506),
(202, 'mengalami', 1597, 1, 1.59631),
(203, 'keausan', 1597, 1, 2.273),
(204, 'terdapat', 1598, 1, 2.39794),
(205, 'cairan', 1598, 1, 2.09691),
(206, 'brake', 1598, 1, 1.47712),
(207, 'piston', 1598, 1, 1.76112),
(208, 'cylinder', 1598, 1, 2.39794),
(209, 'brake', 1599, 1, 1.47712),
(210, 'caliper', 1599, 1, 2.02996),
(211, 'piston', 1599, 1, 1.76112),
(212, 'kiri', 1599, 1, 2.39794),
(213, 'mengalami', 1599, 1, 1.59631),
(214, 'kebocoran', 1599, 1, 1.64461),
(215, 'brake', 1600, 1, 1.47712),
(216, 'caliper', 1600, 1, 2.02996),
(217, 'piston', 1600, 1, 1.76112),
(218, 'kanan', 1600, 1, 2.09691),
(219, 'mengalami', 1600, 1, 1.59631),
(220, 'kebocoran', 1600, 1, 1.64461),
(221, 'tekanan', 1601, 1, 2.39794),
(222, 'hand', 1601, 1, 2.39794),
(223, 'brake', 1601, 1, 1.47712),
(224, 'low', 1601, 1, 2.57403),
(225, 'rendah', 1601, 1, 2.57403),
(226, 'brake', 1602, 1, 1.47712),
(227, 'disisi', 1602, 1, 2.87506),
(228, 'kanan', 1602, 1, 2.09691),
(229, 'posisi', 1602, 1, 2.87506),
(230, 'co', 1602, 1, 2.87506),
(231, 'pilot', 1602, 1, 2.57403),
(232, 'bekerja', 1602, 1, 2.87506),
(233, 'baik', 1602, 1, 2.87506),
(234, 'brake', 1603, 1, 1.47712),
(235, 'pad', 1603, 1, 2.87506),
(236, 'nose', 1603, 1, 1.55284),
(237, 'landing', 1603, 1, 1.57403),
(238, 'gear', 1603, 1, 1.53264),
(239, 'mengalami', 1603, 1, 1.59631),
(240, 'keausan', 1603, 1, 2.273),
(241, 'brake', 1604, 1, 1.47712),
(242, 'disc', 1604, 1, 2.87506),
(243, 'main', 1604, 1, 1.87506),
(244, 'landing', 1604, 1, 1.57403),
(245, 'gear', 1604, 1, 1.53264),
(246, 'mengalami', 1604, 1, 1.59631),
(247, 'keausan', 1604, 1, 2.273),
(248, 'terdapat', 1605, 1, 2.39794),
(249, 'cairan', 1605, 1, 2.09691),
(250, 'bake', 1605, 1, 2.87506),
(251, 'piston', 1605, 1, 1.76112),
(252, 'cylinder', 1605, 1, 2.39794),
(253, 'hose', 1605, 1, 2.87506),
(254, 'brake', 1606, 2, 2.95424),
(255, 'pressure', 1606, 1, 2.87506),
(256, 'plate', 1606, 1, 2.87506),
(257, 'sisi', 1606, 1, 2.87506),
(258, 'kanan', 1606, 1, 2.09691),
(259, 'mengalami', 1606, 1, 1.59631),
(260, 'keausan', 1606, 2, 4.546),
(261, 'ada', 1606, 1, 2.87506),
(262, '4', 1606, 1, 2.87506),
(263, 'bolt', 1606, 1, 2.87506),
(264, 'assy', 1606, 1, 2.39794),
(265, 'alami', 1606, 1, 2.87506),
(266, 'terdapat', 1607, 1, 2.39794),
(267, 'cairan', 1607, 1, 2.09691),
(268, 'brake', 1607, 1, 1.47712),
(269, 'piston', 1607, 1, 1.76112),
(270, 'cylinder', 1607, 1, 2.39794),
(271, 'brake', 1608, 1, 1.47712),
(272, 'caliper', 1608, 1, 2.02996),
(273, 'piston', 1608, 1, 1.76112),
(274, 'kiri', 1608, 1, 2.39794),
(275, 'mengalami', 1608, 1, 1.59631),
(276, 'kebocoran', 1608, 1, 1.64461),
(277, 'brake', 1609, 1, 1.47712),
(278, 'caliper', 1609, 1, 2.02996),
(279, 'piston', 1609, 1, 1.76112),
(280, 'kanan', 1609, 1, 2.09691),
(281, 'mengalami', 1609, 1, 1.59631),
(282, 'kebocoran', 1609, 1, 1.64461),
(283, 'brake', 1610, 1, 1.47712),
(284, 'caliper', 1610, 1, 2.02996),
(285, 'piston', 1610, 1, 1.76112),
(286, 'mengalami', 1610, 1, 1.59631),
(287, 'kebocoran', 1610, 1, 1.64461),
(288, 'brake', 1611, 1, 1.47712),
(289, 'piston', 1611, 1, 1.76112),
(290, 'mengalami', 1611, 1, 1.59631),
(291, 'kebocoran', 1611, 1, 1.64461),
(292, 'brake', 1613, 1, 1.47712),
(293, 'piston', 1613, 1, 1.76112),
(294, 'o', 1613, 1, 2.87506),
(295, 'ring', 1613, 1, 2.87506),
(296, 'mengalami', 1613, 1, 1.59631),
(297, 'kebocoran', 1613, 1, 1.64461),
(298, 'terjadi', 1614, 1, 2.02996),
(299, 'kebocoran', 1614, 1, 1.64461),
(300, 'brake', 1614, 1, 1.47712),
(301, 'caliper', 1614, 1, 2.02996),
(302, 'piston', 1614, 1, 1.76112),
(303, 'kiri', 1614, 1, 2.39794),
(304, 'brake', 1615, 1, 1.47712),
(305, 'caliper', 1615, 1, 2.02996),
(306, 'piston', 1615, 1, 1.76112),
(307, 'kanan', 1615, 1, 2.09691),
(308, 'mengalami', 1615, 1, 1.59631),
(309, 'kebocoran', 1615, 1, 1.64461),
(310, 'brake', 1616, 1, 1.47712),
(311, 'piston', 1616, 1, 1.76112),
(312, 'mengalami', 1616, 1, 1.59631),
(313, 'kebocoran', 1616, 1, 1.64461),
(314, 'parking', 1617, 1, 2.39794),
(315, 'brake', 1617, 1, 1.47712),
(316, 'dapat', 1617, 1, 2.17609),
(317, 'dioperasikan', 1617, 1, 2.39794),
(318, 'tekanan', 1618, 1, 2.39794),
(319, 'hand', 1618, 1, 2.39794),
(320, 'brake', 1618, 1, 1.47712),
(321, 'low', 1618, 1, 2.57403),
(322, 'tekanan', 1619, 1, 2.39794),
(323, 'hand', 1619, 1, 2.39794),
(324, 'brake', 1619, 1, 1.47712),
(325, 'rendah', 1619, 1, 2.57403),
(326, 'brake', 1620, 1, 1.47712),
(327, 'pedal', 1620, 1, 2.09691),
(328, 'berfungsi', 1620, 1, 2.273),
(329, 'kondisi', 1621, 1, 2.17609),
(330, 'nose', 1621, 1, 1.55284),
(331, 'wheel', 1621, 1, 2.17609),
(332, 'tire', 1621, 1, 2.17609),
(333, 'aus', 1621, 1, 2.57403),
(334, 'worn', 1621, 1, 2.57403),
(335, 'out', 1621, 1, 2.57403),
(336, 'kondisi', 1622, 1, 2.17609),
(337, 'main', 1622, 1, 1.87506),
(338, 'wheel', 1622, 1, 2.17609),
(339, 'tire', 1622, 1, 2.17609),
(340, 'aus', 1622, 1, 2.57403),
(341, 'worn', 1622, 1, 2.57403),
(342, 'out', 1622, 1, 2.57403),
(343, 'kondisi', 1623, 1, 2.17609),
(344, 'nose', 1623, 1, 1.55284),
(345, 'wheel', 1623, 1, 2.17609),
(346, 'tire', 1623, 1, 2.17609),
(347, 'mengalami', 1623, 1, 1.59631),
(348, 'sobekan', 1623, 1, 2.57403),
(349, 'deep', 1623, 1, 2.57403),
(350, 'cut', 1623, 1, 2.57403),
(351, 'kondisi', 1624, 1, 2.17609),
(352, 'main', 1624, 1, 1.87506),
(353, 'wheel', 1624, 1, 2.17609),
(354, 'tire', 1624, 1, 2.17609),
(355, 'mengalami', 1624, 1, 1.59631),
(356, 'sobekan', 1624, 1, 2.57403),
(357, 'deep', 1624, 1, 2.57403),
(358, 'cut', 1624, 1, 2.57403),
(359, 'main', 1625, 1, 1.87506),
(360, 'wheel', 1625, 1, 2.17609),
(361, 'tire', 1625, 1, 2.17609),
(362, 'mengalami', 1625, 1, 1.59631),
(363, 'kebocoran', 1625, 1, 1.64461),
(364, 'lampu', 1643, 1, 2.17609),
(365, 'landing', 1643, 1, 1.57403),
(366, 'gear', 1643, 1, 1.53264),
(367, 'mati', 1643, 1, 2.57403),
(368, 'break', 1643, 1, 2.57403),
(369, 'pedal', 1643, 1, 2.09691),
(370, 'dapat', 1643, 1, 2.17609),
(371, 'berfungsi', 1643, 1, 2.273),
(372, 'lampu', 1645, 1, 2.17609),
(373, 'landing', 1645, 1, 1.57403),
(374, 'gear', 1645, 1, 1.53264),
(375, 'mati', 1645, 1, 2.57403),
(376, 'break', 1645, 1, 2.57403),
(377, 'pedal', 1645, 1, 2.09691),
(378, 'dapat', 1645, 1, 2.17609),
(379, 'berfungsi', 1645, 1, 2.273),
(380, 'ban', 1646, 1, 2.57403),
(381, 'rusak', 1646, 1, 2.57403),
(382, 'ban', 1647, 1, 2.57403),
(383, 'rusak', 1647, 1, 2.57403),
(384, 'lampu', 1648, 1, 2.17609),
(385, 'kanan', 1648, 1, 2.09691),
(386, 'lampu', 1649, 1, 2.17609),
(387, 'menyala', 1649, 1, 2.57403),
(388, 'iqbal', 1650, 1, 2.273),
(389, 'punya', 1650, 1, 2.57403),
(390, 'masalah', 1650, 1, 2.57403),
(391, 'iqbal', 1651, 1, 2.273),
(392, 'punya', 1651, 1, 2.57403),
(393, 'masalah', 1651, 1, 2.57403),
(394, 'iqbal', 1652, 1, 2.273),
(395, 'temu', 1652, 1, 2.39794),
(396, 'tengok', 1653, 1, 2.87506),
(397, 'iqbal', 1654, 1, 2.273),
(398, 'temu', 1654, 1, 2.39794),
(399, 'temu', 1655, 1, 2.39794),
(400, 'ansdka', 1656, 1, 2.87506),
(401, 'asada', 1657, 1, 2.87506),
(402, 'mela', 1658, 1, 2.87506);

-- --------------------------------------------------------

--
-- Table structure for table `tbkey`
--

CREATE TABLE `tbkey` (
  `Id` int(11) NOT NULL,
  `term` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `kount` int(11) NOT NULL,
  `Bobot` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbkey`
--

INSERT INTO `tbkey` (`Id`, `term`, `kount`, `Bobot`) VALUES
(4685, 'parking', 1, 2.39794),
(4686, 'brake', 1, 1.47712),
(4687, 'dapat', 1, 2.17609),
(4688, 'dioperasikan', 1, 2.39794);

-- --------------------------------------------------------

--
-- Table structure for table `tbstem`
--

CREATE TABLE `tbstem` (
  `Id` int(11) NOT NULL,
  `Term` varchar(30) NOT NULL,
  `Stem` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbstem`
--

INSERT INTO `tbstem` (`Id`, `Term`, `Stem`) VALUES
(1, 'pertemuan', 'temu'),
(2, 'bertemu', 'temu'),
(4, 'kepindahan', 'pindah'),
(5, 'menembus', 'tembus'),
(6, 'menyusut', 'susut');

-- --------------------------------------------------------

--
-- Table structure for table `tbvektor`
--

CREATE TABLE `tbvektor` (
  `DocId` int(11) NOT NULL,
  `Panjang` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbvektor`
--

INSERT INTO `tbvektor` (`DocId`, `Panjang`) VALUES
(1566, 4.02338),
(1567, 5.24506),
(1568, 8.54207),
(1569, 6.87981),
(1570, 4.6914),
(1571, 4.49003),
(1572, 4.6914),
(1573, 4.49003),
(1574, 5.33512),
(1575, 6.04054),
(1576, 6.02715),
(1577, 5.12564),
(1578, 7.84461),
(1579, 5.33512),
(1580, 4.31192),
(1581, 5.12564),
(1582, 5.3148),
(1583, 5.33512),
(1584, 4.6914),
(1585, 4.49003),
(1586, 6.79739),
(1587, 5.43675),
(1588, 4.44753),
(1589, 5.64102),
(1590, 6.79739),
(1591, 4.87797),
(1592, 5.05567),
(1593, 6.11866),
(1594, 7.71031),
(1595, 3.96116),
(1596, 5.60525),
(1597, 4.26176),
(1598, 4.60225),
(1599, 4.51744),
(1600, 4.36511),
(1601, 5.18974),
(1602, 7.38474),
(1603, 5.03989),
(1604, 5.1483),
(1605, 5.96077),
(1606, 9.99754),
(1607, 4.60225),
(1608, 4.51744),
(1609, 4.36511),
(1610, 3.82846),
(1611, 3.24598),
(1613, 5.20272),
(1614, 4.68826),
(1615, 4.36511),
(1616, 3.24598),
(1617, 4.29156),
(1618, 4.50641),
(1619, 4.50641),
(1620, 3.42716),
(1621, 6.04105),
(1622, 6.13179),
(1623, 6.2484),
(1624, 6.33617),
(1625, 4.27078),
(1643, 6.09197),
(1645, 6.09197),
(1646, 3.64023),
(1647, 3.64023),
(1648, 3.02199),
(1649, 3.37061),
(1650, 4.2916),
(1651, 4.2916),
(1652, 3.30403),
(1653, 2.87506),
(1654, 3.30403),
(1655, 2.39794),
(1656, 2.87506),
(1657, 2.87506),
(1658, 2.87506);

-- --------------------------------------------------------

--
-- Table structure for table `tbwdwdi`
--

CREATE TABLE `tbwdwdi` (
  `Id` int(11) NOT NULL,
  `Id_Doc` int(11) NOT NULL,
  `Hasil_p_Bobot` float NOT NULL,
  `term` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbwdwdi`
--

INSERT INTO `tbwdwdi` (`Id`, `Id_Doc`, `Hasil_p_Bobot`, `term`) VALUES
(1, 1596, 5.75012, NULL),
(2, 1617, 5.75012, NULL),
(3, 1595, 2.18188, NULL),
(4, 1596, 2.18188, NULL),
(5, 1597, 2.18188, NULL),
(6, 1598, 2.18188, NULL),
(7, 1599, 2.18188, NULL),
(8, 1600, 2.18188, NULL),
(9, 1601, 2.18188, NULL),
(10, 1602, 2.18188, NULL),
(11, 1603, 2.18188, NULL),
(12, 1604, 2.18188, NULL),
(13, 1606, 4.36377, NULL),
(14, 1607, 2.18188, NULL),
(15, 1608, 2.18188, NULL),
(16, 1609, 2.18188, NULL),
(17, 1610, 2.18188, NULL),
(18, 1611, 2.18188, NULL),
(19, 1613, 2.18188, NULL),
(20, 1614, 2.18188, NULL),
(21, 1615, 2.18188, NULL),
(22, 1616, 2.18188, NULL),
(23, 1617, 2.18188, NULL),
(24, 1618, 2.18188, NULL),
(25, 1619, 2.18188, NULL),
(26, 1620, 2.18188, NULL),
(27, 1596, 4.73537, NULL),
(28, 1617, 4.73537, NULL),
(29, 1643, 4.73537, NULL),
(30, 1645, 4.73537, NULL),
(31, 1596, 5.75012, NULL),
(32, 1617, 5.75012, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `simpan_hasil`
--
ALTER TABLE `simpan_hasil`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbberita`
--
ALTER TABLE `tbberita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbcache`
--
ALTER TABLE `tbcache`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbindex`
--
ALTER TABLE `tbindex`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbkey`
--
ALTER TABLE `tbkey`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbstem`
--
ALTER TABLE `tbstem`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbvektor`
--
ALTER TABLE `tbvektor`
  ADD PRIMARY KEY (`DocId`);

--
-- Indexes for table `tbwdwdi`
--
ALTER TABLE `tbwdwdi`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `simpan_hasil`
--
ALTER TABLE `simpan_hasil`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbberita`
--
ALTER TABLE `tbberita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1660;

--
-- AUTO_INCREMENT for table `tbcache`
--
ALTER TABLE `tbcache`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbindex`
--
ALTER TABLE `tbindex`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT for table `tbkey`
--
ALTER TABLE `tbkey`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4689;

--
-- AUTO_INCREMENT for table `tbstem`
--
ALTER TABLE `tbstem`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbwdwdi`
--
ALTER TABLE `tbwdwdi`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
