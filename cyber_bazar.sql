-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 11, 2024 at 12:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyber_bazar`
--

-- --------------------------------------------------------

--
-- Table structure for table `produkty`
--

CREATE TABLE `produkty` (
  `idp` int(8) NOT NULL,
  `nazwa` varchar(128) NOT NULL,
  `cena` float(10,2) NOT NULL,
  `kategoria` enum('ubrania','jedzenie','elektronika','meble') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`idp`, `nazwa`, `cena`, `kategoria`) VALUES
(1, 'kozaki czarne', 289.99, 'ubrania'),
(3, 'słuchawki bezprzewodowe', 149.99, 'elektronika'),
(4, 'fotel skórzany', 649.99, 'meble'),
(6, 'kanapa zielona', 459.99, 'meble'),
(7, 'tort urodzinowy', 49.99, 'jedzenie'),
(8, 'kurtka jeansowa', 215.99, 'ubrania'),
(9, 'myszka bezprzewodowa', 89.99, 'elektronika'),
(10, 'klawiatura podświetlana', 125.99, 'elektronika');

-- --------------------------------------------------------

--
-- Table structure for table `sklepy`
--

CREATE TABLE `sklepy` (
  `ids` int(8) NOT NULL,
  `adres` varchar(128) NOT NULL,
  `miasto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `sklepy`
--

INSERT INTO `sklepy` (`ids`, `adres`, `miasto`) VALUES
(1, 'Centrum Handlowe Solaris', 'Opole'),
(2, 'Galeria Wileńska', 'Warszawa'),
(3, 'Galeria Posnania', 'Poznań'),
(4, 'Galeria Dominikańska', 'Wrocław'),
(5, 'Galeria Krakowska', 'Kraków'),
(6, 'Wroclavia', 'Wrocław');

-- --------------------------------------------------------

--
-- Table structure for table `sklepy_produkty`
--

CREATE TABLE `sklepy_produkty` (
  `id` int(8) NOT NULL,
  `p_id` int(8) NOT NULL,
  `s_id` int(8) NOT NULL,
  `ilosc` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `sklepy_produkty`
--

INSERT INTO `sklepy_produkty` (`id`, `p_id`, `s_id`, `ilosc`) VALUES
(5, 4, 2, 10),
(6, 6, 5, 6),
(7, 4, 4, 9),
(8, 7, 3, 10),
(9, 1, 1, 13),
(10, 8, 1, 14),
(11, 8, 4, 17);

-- --------------------------------------------------------

--
-- Table structure for table `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `idu` int(8) NOT NULL,
  `imie` varchar(64) NOT NULL,
  `nazwisko` varchar(64) NOT NULL,
  `adres` varchar(128) NOT NULL,
  `miasto` varchar(128) NOT NULL,
  `rola` enum('admin','klient') NOT NULL,
  `haslo` varchar(64) NOT NULL,
  `login` varchar(64) NOT NULL,
  `telefon` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`idu`, `imie`, `nazwisko`, `adres`, `miasto`, `rola`, `haslo`, `login`, `telefon`) VALUES
(1, 'Artur', 'Zygmuntowicz', 'ul. Klepackiego Witolda 79', 'Lublin', 'klient', '123', 'artur97', '78 598 30 13'),
(2, 'Łukasz', 'Włodarek', 'ul. Podlaska 27', 'Warszawa', 'admin', 'admin', 'admin', '78 470 89 38'),
(3, 'Laura', 'Słupecka', 'ul. Tokarskiego 95', 'Rzeszów', 'klient', 'xyz098', 'laura330', '88 628 02 55'),
(4, 'Joanna', 'Szulik', 'ul. Lencewicza Stanisława 23', 'Warszawa', 'klient', 'xyz123', 'joanna13', '78 618 51 62'),
(5, 'Zdzisław', 'Bednarski', 'ul. Spacerowa 125', 'Olsztyn', 'klient', 'zdzislaw123', 'zdzislaw88', '67 356 31 55');

-- --------------------------------------------------------

--
-- Table structure for table `zamowienia`
--

CREATE TABLE `zamowienia` (
  `idz` int(8) NOT NULL,
  `data` date NOT NULL,
  `u_id` int(8) DEFAULT NULL,
  `p_id` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `zamowienia`
--

INSERT INTO `zamowienia` (`idz`, `data`, `u_id`, `p_id`) VALUES
(1, '2024-05-07', 1, NULL),
(2, '2024-05-01', 5, 3),
(3, '2024-05-05', 3, 4),
(4, '2024-05-08', 4, 10),
(17, '2024-06-10', NULL, 1),
(22, '2024-06-10', 1, 4),
(23, '2024-06-10', NULL, 6),
(25, '2024-06-10', NULL, 10),
(26, '2024-06-10', 1, 8),
(27, '2024-06-11', 1, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`idp`);

--
-- Indexes for table `sklepy`
--
ALTER TABLE `sklepy`
  ADD PRIMARY KEY (`ids`);

--
-- Indexes for table `sklepy_produkty`
--
ALTER TABLE `sklepy_produkty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sklepy_produkty_ibfk_1` (`p_id`),
  ADD KEY `sklepy_produkty_ibfk_2` (`s_id`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`idu`);

--
-- Indexes for table `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD PRIMARY KEY (`idz`),
  ADD KEY `zamowienia_ibfk_1` (`p_id`),
  ADD KEY `zamowienia_ibfk_2` (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `idp` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sklepy`
--
ALTER TABLE `sklepy`
  MODIFY `ids` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sklepy_produkty`
--
ALTER TABLE `sklepy_produkty`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `idu` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `zamowienia`
--
ALTER TABLE `zamowienia`
  MODIFY `idz` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sklepy_produkty`
--
ALTER TABLE `sklepy_produkty`
  ADD CONSTRAINT `sklepy_produkty_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `produkty` (`idp`) ON DELETE CASCADE,
  ADD CONSTRAINT `sklepy_produkty_ibfk_2` FOREIGN KEY (`s_id`) REFERENCES `sklepy` (`ids`) ON DELETE CASCADE;

--
-- Constraints for table `zamowienia`
--
ALTER TABLE `zamowienia`
  ADD CONSTRAINT `zamowienia_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `produkty` (`idp`) ON DELETE SET NULL,
  ADD CONSTRAINT `zamowienia_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `uzytkownicy` (`idu`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
