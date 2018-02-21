-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2018 at 11:11 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `journal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `college` varchar(50) NOT NULL,
  `account_type` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `middlename`, `username`, `password`, `college`, `account_type`) VALUES
(1, 'Randy', 'Gamboa', '', 'superadmin', 'superadmin', 'ic', 'Superadmin'),
(2, 'user', 'user', 'user', 'user', 'user', 'ic', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `cas`
--

CREATE TABLE `cas` (
  `id` int(11) NOT NULL,
  `name` varchar(999) NOT NULL,
  `path` varchar(999) NOT NULL,
  `cover` varchar(999) NOT NULL,
  `views` int(255) NOT NULL DEFAULT '0',
  `date_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ce`
--

CREATE TABLE `ce` (
  `id` int(11) NOT NULL,
  `name` varchar(999) NOT NULL,
  `path` varchar(999) NOT NULL,
  `cover` varchar(999) NOT NULL,
  `views` int(255) NOT NULL DEFAULT '0',
  `date_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ced`
--

CREATE TABLE `ced` (
  `id` int(11) NOT NULL,
  `name` varchar(999) NOT NULL,
  `path` varchar(999) NOT NULL,
  `cover` varchar(999) NOT NULL,
  `views` int(255) NOT NULL DEFAULT '0',
  `date_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cgb`
--

CREATE TABLE `cgb` (
  `id` int(11) NOT NULL,
  `name` varchar(999) NOT NULL,
  `path` varchar(999) NOT NULL,
  `cover` varchar(999) NOT NULL,
  `views` int(255) NOT NULL DEFAULT '0',
  `date_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ct`
--

CREATE TABLE `ct` (
  `id` int(11) NOT NULL,
  `name` varchar(999) NOT NULL,
  `path` varchar(999) NOT NULL,
  `cover` varchar(999) NOT NULL,
  `views` int(255) NOT NULL DEFAULT '0',
  `date_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ic`
--

CREATE TABLE `ic` (
  `id` int(50) NOT NULL,
  `name` varchar(500) NOT NULL,
  `path` varchar(500) NOT NULL,
  `cover` varchar(200) NOT NULL,
  `views` int(255) DEFAULT '0',
  `date_upload` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendingacct`
--

CREATE TABLE `pendingacct` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `college` varchar(50) NOT NULL,
  `acct_status` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `req_type` varchar(255) NOT NULL,
  `req_user` varchar(255) NOT NULL,
  `req_file_id` int(255) NOT NULL,
  `req_file_college` varchar(255) NOT NULL,
  `req_status` varchar(255) NOT NULL,
  `req_posted` varchar(255) NOT NULL DEFAULT 'False'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `saec`
--

CREATE TABLE `saec` (
  `id` int(11) NOT NULL,
  `name` varchar(999) NOT NULL,
  `path` varchar(999) NOT NULL,
  `cover` varchar(999) NOT NULL,
  `views` int(255) NOT NULL DEFAULT '0',
  `date_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cas`
--
ALTER TABLE `cas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ce`
--
ALTER TABLE `ce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ced`
--
ALTER TABLE `ced`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cgb`
--
ALTER TABLE `cgb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ct`
--
ALTER TABLE `ct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ic`
--
ALTER TABLE `ic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendingacct`
--
ALTER TABLE `pendingacct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saec`
--
ALTER TABLE `saec`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cas`
--
ALTER TABLE `cas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ce`
--
ALTER TABLE `ce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ced`
--
ALTER TABLE `ced`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cgb`
--
ALTER TABLE `cgb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ct`
--
ALTER TABLE `ct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ic`
--
ALTER TABLE `ic`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pendingacct`
--
ALTER TABLE `pendingacct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saec`
--
ALTER TABLE `saec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
