-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 04, 2016 at 04:33 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Player`
--

-- --------------------------------------------------------

--
-- Table structure for table `Songs`
--

CREATE TABLE `Songs` (
  `Id_s` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Artist` varchar(100) NOT NULL,
  `Genre` varchar(50) NOT NULL,
  `Thumbnail` varchar(100) NOT NULL,
  `Albumname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Songs`
--

INSERT INTO `Songs` (`Id_s`, `Name`, `Artist`, `Genre`, `Thumbnail`, `Albumname`) VALUES
(1, 'Darkhast.mp3', 'Arijit Singh', 'Romantic', 'Shivaay.jpg', 'Shivaay'),
(2, 'Channa Mereya.mp3', 'Arijit Singh', 'Sad', 'adhm.jpg', 'Ae Dil Hai Mushkil'),
(3, 'Bulleya', 'Arijit Singh', 'Rock', 'adhm.jpg', 'Ae Dil Hai Mushkil');

-- --------------------------------------------------------

--
-- Table structure for table `UserSongs`
--

CREATE TABLE `UserSongs` (
  `Id_u` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `phone` int(12) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Id_s` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Songs`
--
ALTER TABLE `Songs`
  ADD PRIMARY KEY (`Id_s`);

--
-- Indexes for table `UserSongs`
--
ALTER TABLE `UserSongs`
  ADD PRIMARY KEY (`Id_u`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Songs`
--
ALTER TABLE `Songs`
  MODIFY `Id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `UserSongs`
--
ALTER TABLE `UserSongs`
  MODIFY `Id_u` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
