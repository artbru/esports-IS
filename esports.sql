-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017 m. Sau 14 d. 11:03
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esports`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `dalyvis`
--

CREATE TABLE `dalyvis` (
  `turnyro_id` int(11) NOT NULL,
  `komanda1` int(11) NOT NULL,
  `komanda2` int(11) NOT NULL,
  `komanda3` int(11) NOT NULL,
  `komanda4` int(11) NOT NULL,
  `komanda5` int(11) NOT NULL,
  `komanda6` int(11) NOT NULL,
  `komanda7` int(11) NOT NULL,
  `komanda8` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `klientas`
--

CREATE TABLE `klientas` (
  `id` int(11) NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `komanda`
--

CREATE TABLE `komanda` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `regionas` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `zaidimas` int(11) NOT NULL,
  `reitingas_regione` int(11) NOT NULL,
  `reitingas_pasaulyje` int(11) NOT NULL,
  `svetaine` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `nariu_sk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `komandos_uzimtumas`
--

CREATE TABLE `komandos_uzimtumas` (
  `komandos_id` int(11) NOT NULL,
  `turnyro_pradzia` date NOT NULL,
  `turnyro_pabaiga` date NOT NULL,
  `turnyro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `organizatorius`
--

CREATE TABLE `organizatorius` (
  `login` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `vardas` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `pavarde` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `gimimo_data` date NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `tel_nr` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(16) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `turnyras`
--

CREATE TABLE `turnyras` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `sporto_saka` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `miestas` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `salis` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `prizinis_fondas` int(11) NOT NULL,
  `pradzia` date NOT NULL,
  `pabaiga` date NOT NULL,
  `busena` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `organizatorius` varchar(16) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `turnyro_busena`
--

CREATE TABLE `turnyro_busena` (
  `ivyko` int(11) NOT NULL,
  `vyksta` int(11) NOT NULL,
  `neprasidejo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `zaidejas`
--

CREATE TABLE `zaidejas` (
  `id` int(11) NOT NULL,
  `vardas` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `pavarde` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `ign` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `gimimo_data` date NOT NULL,
  `tautybe` varchar(16) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `zaidimas`
--

CREATE TABLE `zaidimas` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `zanras` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `isleidimo_metai` int(11) NOT NULL,
  `leidejas` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `platforma` varchar(16) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klientas`
--
ALTER TABLE `klientas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komanda`
--
ALTER TABLE `komanda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komandos_uzimtumas`
--
ALTER TABLE `komandos_uzimtumas`
  ADD PRIMARY KEY (`komandos_id`);

--
-- Indexes for table `organizatorius`
--
ALTER TABLE `organizatorius`
  ADD PRIMARY KEY (`login`);

--
-- Indexes for table `turnyras`
--
ALTER TABLE `turnyras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zaidejas`
--
ALTER TABLE `zaidejas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zaidimas`
--
ALTER TABLE `zaidimas`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
