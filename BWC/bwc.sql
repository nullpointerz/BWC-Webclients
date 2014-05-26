-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Tid vid skapande: 18 maj 2014 kl 13:15
-- Serverversion: 5.6.12-log
-- PHP-version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `bwc`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `bwc_positions`
--

CREATE TABLE IF NOT EXISTS `bwc_positions` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Position` varchar(255) NOT NULL,
  `Date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumpning av Data i tabell `bwc_positions`
--

INSERT INTO `bwc_positions` (`ID`, `Position`, `Date_added`) VALUES
(2, 'Gothenburg', '2014-03-17 18:31:44'),
(3, 'Stockholm', '2014-03-17 18:31:44');

-- --------------------------------------------------------

--
-- Tabellstruktur `bwc_users`
--

CREATE TABLE IF NOT EXISTS `bwc_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumpning av Data i tabell `bwc_users`
--

INSERT INTO `bwc_users` (`ID`, `Username`, `Password`) VALUES
(1, 'William', 'Bergendahl');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
