-- phpMyAdmin SQL Dump
-- version 3.4.3.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2013 at 08:19 PM
-- Server version: 5.5.22
-- PHP Version: 5.3.15

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `soft_eng`
--

-- --------------------------------------------------------

--
-- Table structure for table `Adress`
--

CREATE TABLE IF NOT EXISTS `Address` (
  `zip_code` int(9) DEFAULT NULL,
  `address_line1` varchar(30) DEFAULT NULL,
  `address_line2` varchar(30) DEFAULT NULL,
  `city` char(19) DEFAULT NULL,
  `state` char(2) DEFAULT NULL,
  `country` char(19) DEFAULT NULL,
  `h_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  PRIMARY KEY (`a_id`),
  KEY `h_id` (`h_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`zip_code`, `address_line1`, `address_line2`, `city`, `country`, `h_id`, `a_id`) VALUES
(1604, '67 Commonwealth', '.', 'MA', 'Worcester', 'USA', 1 , 1);

-- --------------------------------------------------------

--
-- Table structure for table `Feature`
--

CREATE TABLE IF NOT EXISTS `Feature` (
  `description` char(250) NOT NULL,
  `nof_floor` int(3) DEFAULT NULL,
  `garage` blob,
  `garden` blob,
  `backdoor` blob,
  `nof_bathroom` int(3) DEFAULT NULL,
  `nof_room` int(3) DEFAULT NULL,
  `h_id` int(11) NOT NULL,
  PRIMARY KEY (`description`),
  KEY `h_id` (`h_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Feature`
--

INSERT INTO `Feature` (`description`, `nof_floor`, `garage`, `garden`, `backdoor`, `nof_bathroom`, `nof_room`, `h_id`) VALUES
('C', 2, 0x796573, 0x796573, 0x796573, 2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `House`
--

CREATE TABLE IF NOT EXISTS `House` (
  `h_id` int(6) NOT NULL,
  `h_rating` decimal(10,1) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `h_type` char(20) DEFAULT NULL,
  `city` char(19) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `nof_room` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  PRIMARY KEY (`h_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `House`
--

INSERT INTO `House` (`h_id`, `h_rating`, `image`, `h_type`, `city`, `release_date`, `nof_room`, `price`) VALUES
(1, '4.0', 'www.google.com', 'deck', 'Worcester', '0000-00-00', 2, 121917);

-- --------------------------------------------------------

--
-- Table structure for table `Sellers`
--

CREATE TABLE IF NOT EXISTS `Sellers` (
  `seller_id` int(10) NOT NULL,
  `s_phone` int(10) DEFAULT NULL,
  `h_id` int(10) NOT NULL,
  PRIMARY KEY (`seller_id`),
  KEY `h_id` (`h_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Sellers`
--

INSERT INTO `Sellers` (`seller_id`) VALUES
(1234);

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `last_name` varchar(15) DEFAULT NULL,
  `age_range` int(7) DEFAULT NULL,
  `mail` varchar(40) DEFAULT NULL,
  `email` varchar(25) NOT NULL,
  `password` int(6) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `first_name`, `last_name`, `age_range`, `mail`, `email`, `password`) VALUES
(1234, 'ysmn', 'asn', -10, '999 allston st, apt999', 'abc@def.com', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
