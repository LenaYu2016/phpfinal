-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2016 at 09:50 PM
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
-- Table structure for table `moviefeature`
--

CREATE TABLE `moviefeature` (
  `film_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `language` text NOT NULL,
  `releaseDate` date NOT NULL,
  `director` text NOT NULL,
  `cast` text NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `moviefeature`
--

INSERT INTO `moviefeature` (`film_id`, `title`, `language`, `releaseDate`, `director`, `cast`, `img`) VALUES
(26, 'KUNG FU PANDA 3', '', '2016-04-23', 'Jennifier Yuh Nelson', '  Jack Black', '/Assets/image/HomePage/thumb_kongfupanda.jpg'),
(27, 'STAR WARS ', '', '2016-04-21', 'J.J.Abrams', '  Daisy Ridley', '/Assets/image/HomePage/thumb_starwar.jpg'),
(28, 'THE REVENANT', '', '2016-04-17', 'Alejandro Gonzlez Irritu', '  Leonordo DiCaprio', '/Assets/image/HomePage/thumb_TheRevenant.jpg'),
(29, 'Steve Jobs', '', '2015-02-28', 'Danny Boyle', '   Michael Fassbender ', '/Assets/image/HomePage/thumb_stevejobs.jpg'),
(30, 'mr.six', '', '2016-04-18', 'Guan Hu', '  Feng Xiaogang', '/Assets/image/HomePage/thumb_mrsix.jpg'),
(31, 'Deadpool', '', '2014-01-20', 'Tim Miller', '  Ryan Reynolds', '/Assets/image/HomePage/thumb_deadpool.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `moviefeature`
--
ALTER TABLE `moviefeature`
  ADD PRIMARY KEY (`film_id`),
  ADD UNIQUE KEY `Id` (`film_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `moviefeature`
--
ALTER TABLE `moviefeature`
  MODIFY `film_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
