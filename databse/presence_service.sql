-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2020 at 04:29 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `navigus_page`
--

-- --------------------------------------------------------

--
-- Table structure for table `unregistered`
--

CREATE TABLE IF NOT EXISTS `unregistered` (
  `u_email` varchar(100) NOT NULL,
  `admit_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_name` varchar(50) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_pass` varchar(10) NOT NULL,
  `log_status` tinyint(1) NOT NULL DEFAULT '0',
  `u_verify` tinyint(1) NOT NULL DEFAULT '0',
  `p_admit` tinyint(1) NOT NULL DEFAULT '0',
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_name`, `u_email`, `u_pass`, `log_status`, `u_verify`, `p_admit`, `log_time`) VALUES
('Akram Sharieff', 'akramsharieff.m2019@vitstudent.ac.in', 'akram22', 1, 0, 1, '2020-06-13 08:09:35'),
('Akram', 'akramsharieff.m@gmail.com', 'akram', 0, 1, 0, '2020-06-13 08:02:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `unregistered`
--
ALTER TABLE `unregistered`
  ADD PRIMARY KEY (`u_email`), ADD KEY `admit_by` (`admit_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `unregistered`
--
ALTER TABLE `unregistered`
ADD CONSTRAINT `unregistered_ibfk_1` FOREIGN KEY (`admit_by`) REFERENCES `users` (`u_email`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
