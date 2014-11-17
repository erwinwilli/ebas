-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2014 at 02:32 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ebas`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anmeldungen_2014_2`
--

CREATE TABLE IF NOT EXISTS `tbl_anmeldungen_2014_2` (
`anmeldung_id` int(11) NOT NULL,
  `kurs` int(11) NOT NULL,
  `gutschein` varchar(150) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `vorname` varchar(150) NOT NULL,
  `adresse` varchar(150) NOT NULL,
  `plz` varchar(10) NOT NULL,
  `ort` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `sprache` char(2) NOT NULL,
  `zeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_anmeldungen_2014_2`
--

INSERT INTO `tbl_anmeldungen_2014_2` (`anmeldung_id`, `kurs`, `gutschein`, `name`, `vorname`, `adresse`, `plz`, `ort`, `email`, `sprache`, `zeit`) VALUES
(3, 1, NULL, 'Willi', 'Hans', 'Musterstrasse', '7000', 'Chur', 'Hans.willi@hotmail.com', 'de', '2014-11-10 12:41:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_interessenten_2014_2`
--

CREATE TABLE IF NOT EXISTS `tbl_interessenten_2014_2` (
`interessent_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `vorname` varchar(150) NOT NULL,
  `adresse` varchar(150) DEFAULT NULL,
  `plz` varchar(10) DEFAULT NULL,
  `ort` varchar(150) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `kursort` varchar(150) NOT NULL,
  `sprache` char(2) NOT NULL,
  `zeit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurse_2014_2`
--

CREATE TABLE IF NOT EXISTS `tbl_kurse_2014_2` (
`kurs_id` int(11) NOT NULL,
  `bezeichnung_de` varchar(150) NOT NULL,
  `bezeichnung_fr` varchar(150) NOT NULL,
  `bezeichnung_it` varchar(150) NOT NULL,
  `bezeichnung_en` varchar(150) NOT NULL,
  `sortierung` tinyint(4) NOT NULL,
  `sprache` char(2) NOT NULL,
  `max_teilnehmer` tinyint(4) NOT NULL,
  `max_teilnehmer_PF` tinyint(4) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tbl_kurse_2014_2`
--

INSERT INTO `tbl_kurse_2014_2` (`kurs_id`, `bezeichnung_de`, `bezeichnung_fr`, `bezeichnung_it`, `bezeichnung_en`, `sortierung`, `sprache`, `max_teilnehmer`, `max_teilnehmer_PF`) VALUES
(1, 'Zürich: Do, 23.10.14, 17:00 - 19:15 Uhr', 'Zürich (allemand): Jeu, 23.10.14, 17h00 - 19h15', 'Zürich (tedesco): Gio, 23.10.14, ore 17.00 - 19.15', 'Zürich (German): Thu, 23.10.14, 17:00 - 19:15', 3, 'de', 16, 10),
(2, 'Basel: Di, 28.10.14, 17:00 - 19:15 Uhr', 'Basel (allemand): Mar, 28.10.14, 17h00 - 19h15', 'Basel (tedesco): Mar, 28.10.14, ore 17.00 - 19.15', 'Basel (German): Tue, 28.10.14, 17:00 - 19:15', 4, 'de', 18, 15),
(3, 'Luzern: Mi, 29.10.14, 17:00 - 19:15 Uhr', 'Luzern (allemand): Mer, 29.10.14, 17h00 - 19h15', 'Luzern (tedesco): Mer, 29.10.14, ore 17.00 - 19.15', 'Luzern (German): Wed, 29.10.14, 17:00 - 19:15', 6, 'de', 25, 10),
(4, 'Aarau: Do, 30.10.14, 17:00 - 19:15 Uhr', 'Aarau (allemand): Jeu, 30.10.14, 17h00 - 19h15', 'Aarau (tedesco): Gio, 30.10.14, ore 17.00 - 19.15', 'Aarau (German): Thu, 30.10.14, 17:00 - 19:15', 7, 'de', 18, 10),
(5, 'Bern: Di, 04.11.14, 17:00 - 19:15 Uhr', 'Bern (allemand): Mar, 04.11.14, 17h00 - 19h15', 'Bern (tedesco): Mar, 04.11.14, ore 17.00 - 19.15', 'Bern (German): Tue, 04.11.14, 17:00 - 19:15', 8, 'de', 20, 10),
(6, 'Chur: Mi, 05.11.14, 17:00 - 19:15 Uhr', 'Chur (allemand): Mer, 05.11.14, 17h00 - 19h15', 'Chur (tedesco): Mer, 05.11.14, ore 17.00 - 19.15', 'Chur (German): Wed, 05.11.14, 17:00 - 19:15', 9, 'de', 17, 10),
(7, 'St. Gallen: Do, 06.11.14, 17:00 - 19:15 Uhr', 'St. Gallen (allemand): Jeu, 06.11.14, 17h00 - 19h15', 'St. Gallen (tedesco): Gio, 06.11.14, ore 17.00 - 19.15', 'St. Gallen (German): Thu, 06.11.14, 17:00 - 19:15', 10, 'de', 18, 10),
(8, 'Olten: Montag, 17.11.14, 17:00 - 19:15 Uhr', 'Olten (allemand): Lun, 17.11.14, 17h00 - 19h15', 'Olten (tedesco): Lun, 17.11.14, ore 17.00 - 19.15', 'Olten (German): Mon, 17.11.14, 17:00 - 19:15', 12, 'de', 8, 10),
(9, 'Zürich: Di, 11.11.14, 17:00 - 19:15 Uhr', 'Zürich (allemand): Mar, 11.11.14, 17h00 - 19h15', 'Zürich (tedesco): Mar, 11.11.14, ore 17.00 - 19.15', 'Zürich (German): Tue, 11.11.14, 17:00 - 19:15', 11, 'de', 16, 10),
(10, 'Zürich: Mi, 26.11.14, 17:00 - 19:15 Uhr', 'Zürich (allemand): Mer, 26.11.14, 17h00 - 19h15', 'Zürich (tedesco) : Mer, 26.11.14, ore 17.00 - 19.15', 'Zürich (German): Wed, 26.11.14, 17:00 - 19:15', 14, 'de', 16, 10),
(11, 'Luzern: Do, 27.11.14, 17:00 - 19:15 Uhr', 'Luzern (allemand): Jeu, 27.11.14, 17h00 - 19h15', 'Luzern (tedesco): Gio, 27.11.14, ore 17.00 - 19.15', 'Luzern (German): Thu, 27.11.14, 17:00 - 19:15', 15, 'de', 25, 10),
(12, 'Solothurn: Di, 25.11.14, 17:00 - 19:15 Uhr', 'Solothurn (allemand): Mar, 25.11.14, 17h00 - 19h15', 'Solothurn (tedesco): Mar, 25.11.14, ore 17.00 - 19.15', 'Solothurn (German): Tue, 25.11.14, 17:00 - 19:15', 13, 'de', 8, 10),
(13, 'Basel: Mo, 01.12.14, 17:00 - 19:15 Uhr', 'Basel (allemand): Lun, 01.12.14, 17h00 - 19h15', 'Basel (tedesco): Lun, 01.12.14, ore 17.00 - 19.15', 'Basel (German): Mon, 01.12.14, 17:00 - 19:15', 16, 'de', 25, 10),
(14, 'Winterthur: Di, 02.12.14, 17:00 - 19:15 Uhr', 'Winterthur (allemand): Mar, 02.12.14, 17h00 - 19h15', 'Winterthur (tedesco): Mar, 02.12.14, ore 17.00 - 19.15', 'Winterthur (German): Tue, 02.12.14, 17:00 - 19:15', 17, 'de', 16, 10),
(15, 'Zürich: Mi, 03.12.14, 17:00 - 19:15 Uhr', 'Zürich (allemand): Mer, 03.12.14, 17h00 - 19h15', 'Zürich (tedesco): Mer, 03.12.14, ore 17.00 - 19.15', 'Zürich (German): Wed, 03.12.14, 17:00 - 19:15', 18, 'de', 16, 10),
(16, 'Bern: Do, 04.12.14, 17:00 - 19:15 Uhr', 'Bern (allemand): Jeu, 04.12.14, 17h00 - 19h15', 'Bern (tedesco): Gio, 04.12.14, ore 17.00 - 19.15', 'Bern (German): Thu, 04.12.14, 17:00 - 19:15', 19, 'de', 20, 10),
(17, 'Bern: Di, 09.12.14, 17:00 - 19:15 Uhr', 'Bern (allemand): Mar, 09.12.14, 17h00 - 19h15', 'Bern (tedesco): Mar, 09.12.14, ore 17.00 - 19.15', 'Bern (German): Tue, 09.12.14, 17:00 - 19:15', 20, 'de', 20, 10),
(18, 'Sion (Franz.): Mi, 15.10.14, 17:00 - 19:15 Uhr', 'Sion: Mer, 15.10.14, 17h00 - 19h15', 'Sion (francese): Mer, 15.10.14, ore 17.00 - 19.15', 'Sion (French): Wed, 15.10.14, 17:00 - 19:15', 1, 'fr', 17, 10),
(19, 'Lausanne (Franz.): Di, 28.10.14, 18:00 - 20:15 Uhr', 'Lausanne: Mar, 28.10.14, 18h00 - 20h15', 'Lausanne (francese): Mar, 28.10.14, ore 18.00 - 20.15', 'Lausanne (French): Tue, 28.10.14, 18:00 - 20:15', 5, 'fr', 25, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login_2014_2`
--

CREATE TABLE IF NOT EXISTS `tbl_login_2014_2` (
`username_id` int(10) unsigned NOT NULL,
  `username` char(25) NOT NULL,
  `password` char(25) NOT NULL,
  `isadmin` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_login_2014_2`
--

INSERT INTO `tbl_login_2014_2` (`username_id`, `username`, `password`, `isadmin`) VALUES
(1, 'admin', 'b08e98044c375cb2b05efcd21', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_session_2014_2`
--

CREATE TABLE IF NOT EXISTS `tbl_session_2014_2` (
`session_id` int(11) NOT NULL,
  `session_value` varchar(255) NOT NULL,
  `session_active` tinyint(4) NOT NULL,
  `session_expire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_anmeldungen_2014_2`
--
ALTER TABLE `tbl_anmeldungen_2014_2`
 ADD PRIMARY KEY (`anmeldung_id`), ADD KEY `kurs` (`kurs`);

--
-- Indexes for table `tbl_interessenten_2014_2`
--
ALTER TABLE `tbl_interessenten_2014_2`
 ADD PRIMARY KEY (`interessent_id`);

--
-- Indexes for table `tbl_kurse_2014_2`
--
ALTER TABLE `tbl_kurse_2014_2`
 ADD PRIMARY KEY (`kurs_id`);

--
-- Indexes for table `tbl_login_2014_2`
--
ALTER TABLE `tbl_login_2014_2`
 ADD PRIMARY KEY (`username_id`);

--
-- Indexes for table `tbl_session_2014_2`
--
ALTER TABLE `tbl_session_2014_2`
 ADD PRIMARY KEY (`session_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_anmeldungen_2014_2`
--
ALTER TABLE `tbl_anmeldungen_2014_2`
MODIFY `anmeldung_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_interessenten_2014_2`
--
ALTER TABLE `tbl_interessenten_2014_2`
MODIFY `interessent_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_kurse_2014_2`
--
ALTER TABLE `tbl_kurse_2014_2`
MODIFY `kurs_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_login_2014_2`
--
ALTER TABLE `tbl_login_2014_2`
MODIFY `username_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_session_2014_2`
--
ALTER TABLE `tbl_session_2014_2`
MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_anmeldungen_2014_2`
--
ALTER TABLE `tbl_anmeldungen_2014_2`
ADD CONSTRAINT `kurs_fk` FOREIGN KEY (`kurs`) REFERENCES `tbl_kurse_2014_2` (`kurs_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;