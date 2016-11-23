-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2016 at 01:54 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`name`, `email`, `password`, `phone`, `status`) VALUES
('', '', '', 0, 0),
('mayur', 'akshat123@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 7897897891, 0),
('akshat', 'akshat@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 987654321, 0),
('hfskfhskjf', 'lkfjslkjfsl@gmail.com', '4c05e68c876ccd404564bf9b1596abcb', 7878787787, 0),
('mannnu', 'manu@gmail.com', 'adf32923e2c67d4798b8bf33f0312c41', 8989898989, 0),
('pradhan', 'n2013@gmail.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 9898989898, 0),
('Nakshtra Pradhan', 'nakshatrapradhan2013@gmail.com', '56f8cc97bb86c0dfa3524909e8e94a78', 9451024428, 1),
('sdsd', 'sds@gmail.com', '56f8cc97bb86c0dfa3524909e8e94a78', 8989898989, 0),
('nakshatra', 'sfdfdsfsf@gmail.com', '38efa81bff9cf0e220479caa3912d021', 7887878787, 0),
('edsdds', 'sfsf2@gmail.com', '8aa514a4b88ddbcc2a6b59a444e70f1b', 7787878787, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
