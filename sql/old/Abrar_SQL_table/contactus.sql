-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2016 at 09:52 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contact_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contact_id`, `first_name`, `last_name`, `Email`, `Message`) VALUES
(2, 'navaz', 'sheikh', 'navaz@gmail.com', 'Hello world'),
(3, 'amrin', 'sheikh', 'amrin@gmail.com', 'Hello canada'),
(10, 'rayaji', 'patel', 'raj@yahoo.com', '    How are you         '),
(21, 'ankit', 'Desai', 'ankit@yahoo.com', 'how are you'),
(23, 'ankush', 'patel', 'ankush@gmail.com', 'hello'),
(26, 'magan', 'magan', 'magan@ymail.com', 'wjdi'),
(28, 'Dhruv', 'Shah', 'dhruv@ymail.com', 'Hello Toronto            '),
(51, 'asdfasdf', 'sdfsdf', 'sdfsdf@12.com', 'dfasdf'),
(59, 'Abarar', 'Sheikh', 'er.abrar@gmail.com', '                 hOW R                                '),
(61, 'Abarar', 'Sheikh', 'er.abrar@gmail.com', '                    Hello                                        '),
(64, 'Abarar', 'Sheikh', 'er.abrar@gmail.com', '                    adfwf                                        ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contact_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
