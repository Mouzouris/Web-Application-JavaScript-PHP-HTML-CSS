-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2017 at 11:58 PM
-- Server version: 5.1.73-log
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b5026874_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ContactUS`
--

CREATE TABLE IF NOT EXISTS `ContactUS` (
  `ContactsID` int(11) NOT NULL AUTO_INCREMENT,
  `FName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `LName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Telephone` int(11) NOT NULL,
  `Gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `Comments` text COLLATE utf8_unicode_ci NOT NULL,
  `Maillist` tinyint(1) NOT NULL,
  `Hearabout` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ContactsID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `ContactUS`
--

INSERT INTO `ContactUS` (`ContactsID`, `FName`, `LName`, `Email`, `Telephone`, `Gender`, `Comments`, `Maillist`, `Hearabout`) VALUES
(1, 'the', 'mouz', 'ahdjshjdhsf@hotmail.', 98789, 'male', 'hey', 1, 'Friend'),
(2, 'the', 'mouz', 'ahdjshjdhsf@hotmail.', 98789, 'male', 'hey', 1, 'Friend'),
(3, 'the', 'mouz', 'ahdjshjdhsf@hotmail.', 98789, 'male', 'hey', 1, 'Friend'),
(4, 'the', 'mouz', 'ahdjshjdhsf@hotmail.', 98789, 'male', 'heywevf', 1, 'Friend'),
(5, 'the', 'mouz', 'ahdjshjdhsf@hotmail.', 98789, 'male', 'heywevf', 1, 'Friend'),
(6, 'the', 'mouz', 'ahdjshjdhsf@hotmail.', 98789, 'male', 'heywevf', 1, 'Friend'),
(7, 'the', 'mouz', 'ahdjshjdhsf@hotmail.', 98789, 'male', 'heywevf', 1, 'Friend'),
(8, 'the', 'mouz', 'ahdjshjdhsf@hotmail.', 98789, 'male', 'heywevf', 1, 'Friend'),
(9, 'the', 'mouz', 'ahdjshjdhsf@hotmail.', 98789, 'male', 'heywevf', 1, 'Friend'),
(10, 'the', 'mouz', 'ahdjshjdhsf@hotmail.', 98789, 'male', 'heywevf', 0, 'Friend'),
(11, 'the', 'mouz', 'ahdjshjdhsf@hotmail.', 98789, 'male', 'heywevf', 0, 'Friend'),
(12, 'the', 'mouz', 'ahdjshjdhsf@hotmail.', 98789, 'male', 'heywevf', 0, 'Friend'),
(13, 'the', 'mouz', 'ahdjshjdhsf@hotmail.', 98789, 'male', 'heywevf', 0, 'Friend');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
