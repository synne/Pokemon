-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 30. Mar, 2016 20:57 PM
-- Server-versjon: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pokemon_tournament`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Admin`
--

CREATE TABLE IF NOT EXISTS `Admin` (
  `Brukernavn` varchar(50) NOT NULL,
  `Passord` varchar(400) NOT NULL,
  `Salt` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `Admin`
--

INSERT INTO `Admin` (`Brukernavn`, `Passord`, `Salt`) VALUES
('tournament@pokemon.com', '90e7cde636f8f9ea21d60f1d4c3f5f7c58be63860518d7a0934e60b5bb31e697', '45gyut');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Kamp`
--

CREATE TABLE IF NOT EXISTS `Kamp` (
  `kampID` int(3) NOT NULL,
  `trener1` varchar(3) NOT NULL,
  `trener2` varchar(3) NOT NULL,
  `dato` text NOT NULL,
  `vinner` int(3) NOT NULL,
  `Adresse` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `Kamp`
--

INSERT INTO `Kamp` (`kampID`, `trener1`, `trener2`, `dato`, `vinner`, `Adresse`) VALUES
(1, '0', '0', '22', 0, ''),
(2, '0', '0', '22.07.2016', 0, ''),
(3, '0', '0', '22.07.2016', 0, ''),
(4, '0', '0', '22.07.2016', 0, ''),
(5, '0', '0', '22.07.2016', 0, ''),
(6, '0', '0', '22.07.2016', 0, ''),
(7, '0', '0', '22.07.2016', 0, ''),
(8, '0', '0', '22.07.2016', 0, ''),
(9, '2', '3', '22.07.2016', 0, ''),
(10, '3', '2', '22.07.2016', 0, ''),
(11, '2', '1', '22.07.2016', 0, 'Frogner'),
(12, '1', '2', '22.07.2016', 0, 'Frognerbadet');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Pokemonnavn`
--

CREATE TABLE IF NOT EXISTS `Pokemonnavn` (
  `Navn` varchar(30) NOT NULL,
  `Type` varchar(30) NOT NULL,
  `Nummer` int(4) NOT NULL,
  `Telefon` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `Pokemonnavn`
--

INSERT INTO `Pokemonnavn` (`Navn`, `Type`, `Nummer`, `Telefon`) VALUES
('', 'normal', 0, 0),
('dfgh', 'gress', 123, 456),
('a', 'spÃ¸kelse', 2, 3456),
('s', 'gress', 1, 5678),
('lÃ¸', 'luft', 90, 3456789);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Stage`
--

CREATE TABLE IF NOT EXISTS `Stage` (
  `Bane` varchar(30) NOT NULL,
  `Adresse` varchar(30) NOT NULL,
  `Plasser` int(10) NOT NULL,
  `Telefon` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `Stage`
--

INSERT INTO `Stage` (`Bane`, `Adresse`, `Plasser`, `Telefon`) VALUES
('ild', 'Bislett', 3000, 1234567),
('gress', 'Ekeberg', 40000, 6786543),
('vann', 'Frognerbadet', 1500, 45678432),
('is', 'Frogner', 10000, 76932742);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `Trener`
--

CREATE TABLE IF NOT EXISTS `Trener` (
  `Fornavn` varchar(20) NOT NULL,
  `Etternavn` varchar(20) NOT NULL,
  `Telefon` int(8) NOT NULL,
  `Alder` int(3) NOT NULL,
  `Hjemby` varchar(30) NOT NULL,
  `trener_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `Trener`
--

INSERT INTO `Trener` (`Fornavn`, `Etternavn`, `Telefon`, `Alder`, `Hjemby`, `trener_id`) VALUES
('Synne ', 'Ellefsen', 12345678, 22, 'Oslo', 1),
('Ash', 'Ketchum', 99876543, 17, 'Poke', 2),
('Venicia', 'P', 8536436, 21, 'Oslo', 3),
('Keren', 'D', 234567, 23, 'Tana', 4),
('Simen', 'Sunlight', 345678, 26, 'TromsÃ¸', 5),
('Tom', 'Hardy', 2345678, 29, 'Flower', 6),
('Flower', 'Power', 11111111, 12, 'Floris', 7),
('Stone', 'Age', 12345678, 54, 'GÃ¸teborg', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin`
--
ALTER TABLE `Admin`
  ADD PRIMARY KEY (`Brukernavn`);

--
-- Indexes for table `Kamp`
--
ALTER TABLE `Kamp`
  ADD PRIMARY KEY (`kampID`);

--
-- Indexes for table `Pokemonnavn`
--
ALTER TABLE `Pokemonnavn`
  ADD PRIMARY KEY (`Telefon`);

--
-- Indexes for table `Stage`
--
ALTER TABLE `Stage`
  ADD PRIMARY KEY (`Telefon`);

--
-- Indexes for table `Trener`
--
ALTER TABLE `Trener`
  ADD PRIMARY KEY (`trener_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Kamp`
--
ALTER TABLE `Kamp`
  MODIFY `kampID` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
