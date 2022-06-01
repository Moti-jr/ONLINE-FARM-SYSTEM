-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 12:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(255) NOT NULL,
  `Customer Name` varchar(100) NOT NULL,
  `Customer Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Phone Number` varchar(100) NOT NULL,
  `Date Of Birth` varchar(100) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `File` varchar(100) NOT NULL,
  `Date Ragistered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Customer Name`, `Customer Username`, `Email`, `Address`, `Phone Number`, `Date Of Birth`, `Password`, `File`, `Date Ragistered`) VALUES
(7, 'Tanui kipngetich Sila', 'Silatanui', 'silatanuikipngetich@gmail.com', 'Kutus', '0742178644', '1999-10-20', '1234', 'profile picture.jpg', '2022-03-23 13:26:15'),
(8, 'Mercy Muchiri', 'Mercy', 'mercymuchiri@gmail.com', 'Kutus', '0742178644', '2000-02-02', '1234', 'PICTURE8.jpg', '2022-03-23 15:37:02'),
(9, 'Martha Wangui', 'Martha', 'martha@gmail.com', 'Kutus', '0734343434', '2000-07-03', '1234', 'PICTURE1.jpg', '2022-03-26 15:24:10'),
(10, 'RACHAEL MUEMA ', 'Rachael', 'rachaelmuema@gmail.com', 'Kutus', '0734343434', '1998-12-12', '1234', 'PICTURE8.jpg', '2022-03-28 05:18:03'),
(11, 'ELIYA KIBET KAPEL', 'Eliya', 'e@gmail.com', 'Kutus', '0742178644', '2002-02-02', '1234', 'PICTURE1.jpg', '2022-03-28 08:04:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
