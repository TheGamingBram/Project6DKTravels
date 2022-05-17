-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2022 at 07:41 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donkeytravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `boekingen`
--

DROP TABLE IF EXISTS `boekingen`;
CREATE TABLE IF NOT EXISTS `boekingen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Startdatum` date NOT NULL,
  `PINCode` int(11) NOT NULL,
  `FKtochtenID` int(11) NOT NULL,
  `FKklantenID` int(11) NOT NULL,
  `FKstatussenID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `herbergen`
--

DROP TABLE IF EXISTS `herbergen`;
CREATE TABLE IF NOT EXISTS `herbergen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(50) NOT NULL,
  `Adres` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefoon` varchar(20) NOT NULL,
  `Coordinaten` varchar(20) NOT NULL,
  `Gewijzigd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `klanten`
--

DROP TABLE IF EXISTS `klanten`;
CREATE TABLE IF NOT EXISTS `klanten` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefoon` varchar(20) NOT NULL,
  `Wachtwoord` varchar(100) NOT NULL,
  `Gewijzigd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `overnachtingen`
--

DROP TABLE IF EXISTS `overnachtingen`;
CREATE TABLE IF NOT EXISTS `overnachtingen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FKboekingenID` int(11) NOT NULL,
  `FKherbergenID` int(11) NOT NULL,
  `FKstatussenID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pauzeplaatsen`
--

DROP TABLE IF EXISTS `pauzeplaatsen`;
CREATE TABLE IF NOT EXISTS `pauzeplaatsen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FKboekingenID` int(11) NOT NULL,
  `FKrestaurantsID` int(11) NOT NULL,
  `FKstatussenID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE IF NOT EXISTS `restaurants` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Naam` varchar(50) NOT NULL,
  `Adres` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Telefoon` varchar(20) NOT NULL,
  `Coordinaten` varchar(20) NOT NULL,
  `Gewijzigd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `statussen`
--

DROP TABLE IF EXISTS `statussen`;
CREATE TABLE IF NOT EXISTS `statussen` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Statuscode` tinyint(4) NOT NULL,
  `Status` varchar(40) NOT NULL,
  `Verwijderbaar` tinyint(4) NOT NULL,
  `PINtoekennen` tinyint(4) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tochten`
--

DROP TABLE IF EXISTS `tochten`;
CREATE TABLE IF NOT EXISTS `tochten` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Omschrijving` varchar(40) NOT NULL,
  `Route` varchar(50) NOT NULL,
  `Aantaldagen` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trackers`
--

DROP TABLE IF EXISTS `trackers`;
CREATE TABLE IF NOT EXISTS `trackers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PINCode` int(11) NOT NULL,
  `Lat` double NOT NULL,
  `Lon` double NOT NULL,
  `Time` bigint(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
