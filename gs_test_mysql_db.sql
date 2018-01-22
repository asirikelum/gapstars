-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 22, 2018 at 09:55 PM
-- Server version: 10.1.24-MariaDB-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asirikdigitalgla_gs_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) NOT NULL,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('u0h8p2fr3ao1okgi53d3ups8bct3i450', '123.231.11.149', 1516612623, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363631323332343b69647c693a313b),
('p3gsqg145v6c1pa23es5ftbq74r9d9v5', '123.231.11.149', 1516612713, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363631323635333b69647c693a313b),
('o5gbc94b7r7pjh713gnb1hnnt4kau0rh', '123.231.11.149', 1516613472, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363631333232373b69647c693a313b),
('f5kikkv7gqjj62vssajirfa92kfnjih9', '123.231.11.149', 1516613820, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363631333533393b69647c693a313b),
('4gu7m14vvukffc8o7s1sqoegpmu5t8gj', '123.231.11.149', 1516614103, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363631333838373b69647c693a313b);

-- --------------------------------------------------------

--
-- Table structure for table `instagram_data`
--

CREATE TABLE `instagram_data` (
  `id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `insta_key` text NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instagram_data`
--
ALTER TABLE `instagram_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `instagram_data`
--
ALTER TABLE `instagram_data`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
