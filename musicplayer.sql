-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2017 at 08:16 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicplayer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('akshatsrivastava2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `playlistsong`
--

CREATE TABLE `playlistsong` (
  `playlistid` int(11) NOT NULL,
  `songid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `playlistsong`
--

INSERT INTO `playlistsong` (`playlistid`, `songid`) VALUES
(42, 2),
(51, 2),
(52, 2),
(42, 1),
(51, 1),
(52, 1),
(42, 3),
(51, 3),
(52, 3),
(54, 1),
(54, 2),
(53, 2);

-- --------------------------------------------------------

--
-- Table structure for table `recommendation`
--

CREATE TABLE `recommendation` (
  `recommendid` int(11) NOT NULL,
  `fromuser` varchar(50) NOT NULL,
  `touser` varchar(50) NOT NULL,
  `songid` int(11) NOT NULL,
  `accept_reject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommendation`
--

INSERT INTO `recommendation` (`recommendid`, `fromuser`, `touser`, `songid`, `accept_reject`) VALUES
(1, '5', '4', 2, 1),
(2, '5', '4', 3, 1),
(3, '4', '3', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `songid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `album` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`songid`, `title`, `artist`, `genre`, `thumbnail`, `album`) VALUES
(1, 'Darkhaast.mp3', 'Arijit_Singh', 'romantic', 'shivaay.jpg', 'Shivaay'),
(2, 'Channa_Mereya.mp3', 'Arijit_Singh', 'sad', 'adhm.jpg', 'Ae_Dil_Hai_Mushkil'),
(3, 'Tum_Hi_Ho.mp3', 'Arijit_Singh', 'romantic', 'tumhiho.jpg', 'Aashiqui_2'),
(19, 'Tere_Liye.mp3', 'Akshat', 'Romantic', 'Romantic.jpg', 'lksdnv');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`) VALUES
(1, 'Saurabh Verma', '0b0cfc07fca81c956ab9181d8576f4a8', 'imtemptedguy@gmail.com'),
(2, 'akshat', '0b0cfc07fca81c956ab9181d8576f4a8', 'imtemptedguy2@gmail.com'),
(3, 'Saurabh', 'dad3a37aa9d50688b5157698acfd7aee', 'xxx@gmail.com'),
(5, 'admin', 'dad3a37aa9d50688b5157698acfd7aee', 'admin1234@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userplaylist`
--

CREATE TABLE `userplaylist` (
  `playlistid` int(11) NOT NULL,
  `playlistname` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userplaylist`
--

INSERT INTO `userplaylist` (`playlistid`, `playlistname`, `userid`) VALUES
(1, '', 3),
(2, '', 3),
(3, '', 3),
(4, 'playlist', 3),
(5, 'playlist', 3),
(6, 'playlist', 3),
(7, 'playlist', 3),
(8, 'playlist', 3),
(9, 'playlist', 3),
(10, 'playlist', 3),
(11, 'playlist', 3),
(12, 'playlist2', 3),
(13, 'playlist3', 3),
(14, 'playlist4', 3),
(15, 'playlist5', 3),
(16, 'playlist6', 3),
(17, 'playlist7', 3),
(18, 'playlist8', 3),
(19, 'playlist9', 3),
(20, 'playlist10', 3),
(21, 'playlist11', 3),
(22, 'playlist12', 3),
(23, 'playlist13', 3),
(24, 'playlist14', 3),
(25, 'playlist87', 3),
(26, 'playlisterty', 3),
(27, 'playlistwertyujkh', 3),
(28, 'playlistghnjjj', 3),
(29, 'playlisthgf', 3),
(30, 'playlistuuftgyu', 3),
(31, 'playlistjhgbhj', 3),
(32, 'playlistascdsvefv', 3),
(33, 'playlistotgyu9ji', 3),
(34, 'playlist09', 3),
(35, 'playlist876', 3),
(36, 'playlistouyg', 3),
(37, 'playlistoiuhyghjkl', 3),
(38, 'playlistdfgfhjkl', 3),
(39, 'playlist9565', 3),
(40, 'playlistloihyghui9oj', 3),
(41, 'playlistoihuhiuhbujik', 3),
(42, 'playlist', 4),
(43, 'playlist', 5),
(44, 'playlist1', 5),
(45, 'playlist2', 5),
(46, 'playlist3', 5),
(47, 'playlist4', 5),
(48, 'playlist5', 5),
(49, 'playlist6', 5),
(50, 'playlistsg', 5),
(51, 'playlist2', 4),
(52, 'playlist23', 4),
(53, 'playlistdf', 4),
(54, 'playlist 2', 4),
(55, 'playlistyut', 4),
(56, 'playlistkjh', 4),
(57, 'playlistliuyg', 4),
(58, 'playlisttgyuhygg', 4),
(59, 'playli', 4),
(60, 'playlistdfgh', 4),
(61, 'playlistdsfghjk', 4),
(62, 'playlisthghuh', 4);

-- --------------------------------------------------------

--
-- Table structure for table `usersong`
--

CREATE TABLE `usersong` (
  `userid` int(11) NOT NULL,
  `songid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usersong`
--

INSERT INTO `usersong` (`userid`, `songid`) VALUES
(4, 1),
(4, 2),
(4, 3),
(5, 2),
(5, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `playlistsong`
--
ALTER TABLE `playlistsong`
  ADD KEY `playlistid` (`playlistid`),
  ADD KEY `songid` (`songid`);

--
-- Indexes for table `recommendation`
--
ALTER TABLE `recommendation`
  ADD PRIMARY KEY (`recommendid`),
  ADD KEY `songid` (`songid`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`songid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `userplaylist`
--
ALTER TABLE `userplaylist`
  ADD PRIMARY KEY (`playlistid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `userid_2` (`userid`);

--
-- Indexes for table `usersong`
--
ALTER TABLE `usersong`
  ADD KEY `userid` (`userid`),
  ADD KEY `songid` (`songid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recommendation`
--
ALTER TABLE `recommendation`
  MODIFY `recommendid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `songid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `userplaylist`
--
ALTER TABLE `userplaylist`
  MODIFY `playlistid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
