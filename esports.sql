-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017 m. Sau 16 d. 15:32
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

--
-- Sukurta duomenų kopija lentelei `dalyvis`
--

INSERT INTO `dalyvis` (`turnyro_id`, `komanda1`, `komanda2`, `komanda3`, `komanda4`, `komanda5`, `komanda6`, `komanda7`, `komanda8`) VALUES
(7, 4, 2, 3, 2, 1, 4, 1, 2);

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

--
-- Sukurta duomenų kopija lentelei `komanda`
--

INSERT INTO `komanda` (`id`, `pavadinimas`, `regionas`, `zaidimas`, `reitingas_regione`, `reitingas_pasaulyje`, `svetaine`, `nariu_sk`) VALUES
(0, 'asdasd', 'as', 1, 2, 2, 'xd', 5),
(1, 'komanda1', 'eu', 1, 1, 1, 'www.www.com', 5),
(2, 'komanda2', 'eu', 1, 1, 1, 'www.www.com', 5),
(3, 'komandaaa', 'eu', 2, 1, 1, 'www.www.com', 5),
(4, 'komandadas', 'eu', 1, 1, 1, 'www.www.com', 5),
(5, '', '', 0, 0, 0, '', 0),
(6, '', '', 0, 0, 0, '', 0),
(7, '', '', 0, 0, 0, '', 0),
(8, 'asd', '', 0, 0, 0, '', 0),
(9, 'asd', '', 0, 0, 0, '', 0),
(10, 'a', 'asd', 0, 0, 0, '', 0),
(11, 'test', 'test', 1, 1, 1, 'https://www.facebook.com/', 5);

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

--
-- Sukurta duomenų kopija lentelei `organizatorius`
--

INSERT INTO `organizatorius` (`login`, `vardas`, `pavarde`, `gimimo_data`, `email`, `tel_nr`, `pass`) VALUES
('login', 'aaaa', 'bbbb', '1995-01-10', 'asd@asd.com', '868686355', 'xdlol');

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `turnyras`
--

CREATE TABLE `turnyras` (
  `id` int(11) NOT NULL,
  `pavadinimas` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `sporto_saka` int(11) NOT NULL,
  `miestas` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `salis` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `prizinis_fondas` int(11) NOT NULL,
  `pradzia` date NOT NULL,
  `pabaiga` date NOT NULL,
  `busena` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `organizatorius` varchar(16) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Sukurta duomenų kopija lentelei `turnyras`
--

INSERT INTO `turnyras` (`id`, `pavadinimas`, `sporto_saka`, `miestas`, `salis`, `prizinis_fondas`, `pradzia`, `pabaiga`, `busena`, `organizatorius`) VALUES
(2, 'TurnyrasA', 2, 'MiestasA', 'SalisA', 1552, '2016-09-19', '2019-10-20', '1', 'login'),
(3, 'TurnyrasB', 1, 'MiestasB', 'SalisB', 123000, '2015-06-06', '2016-06-06', '1', 'login'),
(4, 'TurnyrasC', 2, 'MiestasC', 'MiestasC', 100000, '2016-09-19', '2019-10-20', '1', 'login'),
(7, 'Turnyras D', 2, 'MiestasD', 'Salis D', 50000, '2016-09-19', '2019-10-20', 'asd', 'login');

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
-- Sukurta duomenų kopija lentelei `zaidimas`
--

INSERT INTO `zaidimas` (`id`, `pavadinimas`, `zanras`, `isleidimo_metai`, `leidejas`, `platforma`) VALUES
(1, 'Žaidimas1', 'Žanras1', 2015, 'Leidėjas1', 'PC'),
(2, 'Žaidimas2', 'Žanras2', 2015, 'Leidėjas2', 'PS3');

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
