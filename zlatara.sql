-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2024 at 11:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zlatara`
--

-- --------------------------------------------------------

--
-- Table structure for table `dobavljaci`
--

CREATE TABLE `dobavljaci` (
  `id_dobavljaca` int(11) NOT NULL,
  `naziv_dobavljaca` text NOT NULL,
  `kontakt` int(255) NOT NULL,
  `adresa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faktura`
--

CREATE TABLE `faktura` (
  `id_fakture` int(11) NOT NULL,
  `datum_fakture` date NOT NULL,
  `id_porudzbine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `isporuka_porudzbine`
--

CREATE TABLE `isporuka_porudzbine` (
  `id_isporuke` int(11) NOT NULL,
  `datum_isporuke` date NOT NULL,
  `jmbg` int(255) NOT NULL,
  `id_porudzbine` int(11) NOT NULL,
  `id_sluzbe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `izdavanje_racuna`
--

CREATE TABLE `izdavanje_racuna` (
  `id_fakture` int(11) NOT NULL,
  `id_zaposlenog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kupci`
--

CREATE TABLE `kupci` (
  `jmbg` int(255) NOT NULL,
  `ime_prezime` varchar(30) NOT NULL,
  `adresa` varchar(30) NOT NULL,
  `mejl` varchar(255) NOT NULL,
  `telefon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kupci`
--

INSERT INTO `kupci` (`jmbg`, `ime_prezime`, `adresa`, `mejl`, `telefon`) VALUES
(123455678, 'Aleksandar Vasiljevic', 'Malog Radojice 16', 'alexander81@gmail.com', 609115674),
(123456789, 'Nina Linkovska', 'Madjarska 390', 'nina234@gmail.com', 610007865),
(1223456789, 'Aleksandra Vasiljevic', 'Radi molimte 23', 'avasiljevic23@gmail.com', 609876545),
(1234567890, 'Aleksandra Mitrovic', 'Aleksa Davic 12', 'aleksandra@gmail.com', 0),
(1345678987, 'Lina Soskic', 'Lude godine 45', 'linam213@gmail.com', 61234657),
(2147483647, 'Vesna Vasiljevic', 'Tri sesira 34', 'vesna25@gmail.com', 63245652);

-- --------------------------------------------------------

--
-- Table structure for table `kurirska_sluzba`
--

CREATE TABLE `kurirska_sluzba` (
  `id_sluzbe` int(11) NOT NULL,
  `naziv_sluzbe` text NOT NULL,
  `kontakt_sluzbe` int(11) NOT NULL,
  `adresa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `narudzbenica`
--

CREATE TABLE `narudzbenica` (
  `sifra_narudzbenice` int(11) NOT NULL,
  `datum_narucivanja` date NOT NULL,
  `id_dobavljaca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `narudzbenica_zaposleni`
--

CREATE TABLE `narudzbenica_zaposleni` (
  `id_zaposlenog` int(11) NOT NULL,
  `sifra_narudzbenice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opis_proizvoda`
--

CREATE TABLE `opis_proizvoda` (
  `sifra_proizvoda` int(11) NOT NULL,
  `vrsta_zlata` enum('belo','roze','zuto') DEFAULT NULL,
  `finoca_zlata` varchar(255) DEFAULT NULL,
  `vrsta_kamena` varchar(255) DEFAULT NULL,
  `gramaza_materijala` decimal(10,2) DEFAULT NULL,
  `naziv_proizvoda` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `opis_proizvoda`
--

INSERT INTO `opis_proizvoda` (`sifra_proizvoda`, `vrsta_zlata`, `finoca_zlata`, `vrsta_kamena`, `gramaza_materijala`, `naziv_proizvoda`) VALUES
(1, 'belo', '750', 'rubin', 2.10, 'Desire'),
(2, 'roze', '770', 'safir', 3.90, 'Elegance '),
(3, 'zuto', '750', 'ametist', 3.90, 'Classic'),
(4, 'belo', '750', 'rubin', 3.50, 'Ruby'),
(5, 'roze', '750', 'rozen', 3.90, 'Royal'),
(6, 'zuto', '750', 'biser', 3.90, 'Modern'),
(7, 'belo', '585', 'safir', 3.00, 'Love'),
(8, 'roze', '585', 'dijamant', 2.80, 'Diamond'),
(9, 'zuto', '585', 'peridot', 2.32, 'Summer'),
(10, 'belo', '450', 'topaz', 3.70, 'Kusadasi'),
(11, 'roze', '585', 'brilijant', 1.60, 'Sparkle');

-- --------------------------------------------------------

--
-- Table structure for table `otpremnica`
--

CREATE TABLE `otpremnica` (
  `sifra_otpremnice` int(11) NOT NULL,
  `datum_slanja` date NOT NULL,
  `datum_prijema` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otpremnica_dobavljac`
--

CREATE TABLE `otpremnica_dobavljac` (
  `id_dobavljaca` int(11) NOT NULL,
  `sifra_otpremnice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `porudzbina`
--

CREATE TABLE `porudzbina` (
  `id_porudzbine` int(11) NOT NULL,
  `datum_porudzbine` date NOT NULL,
  `status_porudzbine` text NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poruzbina_kupci`
--

CREATE TABLE `poruzbina_kupci` (
  `id_porudzbine` int(11) NOT NULL,
  `jmbg` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proizvod`
--

CREATE TABLE `proizvod` (
  `sifra_proizvoda` int(11) NOT NULL,
  `tip_nakita` enum('narukvica','ogrlica','prsten','mindjuse') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proizvod`
--

INSERT INTO `proizvod` (`sifra_proizvoda`, `tip_nakita`) VALUES
(1, 'narukvica'),
(2, 'narukvica'),
(3, 'narukvica'),
(4, 'ogrlica'),
(5, 'ogrlica'),
(6, 'ogrlica'),
(7, 'prsten'),
(8, 'prsten'),
(9, 'prsten'),
(10, 'mindjuse'),
(11, 'mindjuse'),
(12, 'mindjuse');

-- --------------------------------------------------------

--
-- Table structure for table `reklamacije`
--

CREATE TABLE `reklamacije` (
  `id_reklamacije` int(11) NOT NULL,
  `datum_reklamacije` date NOT NULL,
  `opis_problema` text NOT NULL,
  `jmbg` int(255) NOT NULL,
  `id_porudzbine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sadrzaj_narudzbenice`
--

CREATE TABLE `sadrzaj_narudzbenice` (
  `sifra_narudzbenice` int(11) NOT NULL,
  `sifra_proizvoda` int(11) NOT NULL,
  `kolicina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zaposleni`
--

CREATE TABLE `zaposleni` (
  `id_zaposlenog` int(11) NOT NULL,
  `ime_prezime` text NOT NULL,
  `adresa` varchar(255) NOT NULL,
  `mejl` varchar(255) NOT NULL,
  `telefon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dobavljaci`
--
ALTER TABLE `dobavljaci`
  ADD PRIMARY KEY (`id_dobavljaca`);

--
-- Indexes for table `faktura`
--
ALTER TABLE `faktura`
  ADD PRIMARY KEY (`id_fakture`),
  ADD KEY `id_porudzbine` (`id_porudzbine`);

--
-- Indexes for table `isporuka_porudzbine`
--
ALTER TABLE `isporuka_porudzbine`
  ADD PRIMARY KEY (`id_isporuke`),
  ADD KEY `jmbg` (`jmbg`),
  ADD KEY `id_porudzbine` (`id_porudzbine`),
  ADD KEY `id_sluzbe` (`id_sluzbe`);

--
-- Indexes for table `izdavanje_racuna`
--
ALTER TABLE `izdavanje_racuna`
  ADD KEY `id_fakture` (`id_fakture`),
  ADD KEY `id_zaposlenog` (`id_zaposlenog`);

--
-- Indexes for table `kupci`
--
ALTER TABLE `kupci`
  ADD PRIMARY KEY (`jmbg`);

--
-- Indexes for table `kurirska_sluzba`
--
ALTER TABLE `kurirska_sluzba`
  ADD PRIMARY KEY (`id_sluzbe`);

--
-- Indexes for table `narudzbenica`
--
ALTER TABLE `narudzbenica`
  ADD PRIMARY KEY (`sifra_narudzbenice`),
  ADD KEY `id_dobavljaca` (`id_dobavljaca`);

--
-- Indexes for table `narudzbenica_zaposleni`
--
ALTER TABLE `narudzbenica_zaposleni`
  ADD KEY `id_zaposlenog` (`id_zaposlenog`),
  ADD KEY `sifra_narudzbenice` (`sifra_narudzbenice`);

--
-- Indexes for table `opis_proizvoda`
--
ALTER TABLE `opis_proizvoda`
  ADD PRIMARY KEY (`sifra_proizvoda`),
  ADD UNIQUE KEY `sifra_proizvoda` (`sifra_proizvoda`,`vrsta_zlata`,`finoca_zlata`,`vrsta_kamena`,`gramaza_materijala`);

--
-- Indexes for table `otpremnica`
--
ALTER TABLE `otpremnica`
  ADD PRIMARY KEY (`sifra_otpremnice`);

--
-- Indexes for table `otpremnica_dobavljac`
--
ALTER TABLE `otpremnica_dobavljac`
  ADD KEY `id_dobavljaca` (`id_dobavljaca`),
  ADD KEY `sifra_otpremnice` (`sifra_otpremnice`);

--
-- Indexes for table `porudzbina`
--
ALTER TABLE `porudzbina`
  ADD PRIMARY KEY (`id_porudzbine`);

--
-- Indexes for table `poruzbina_kupci`
--
ALTER TABLE `poruzbina_kupci`
  ADD KEY `id_porudzbine` (`id_porudzbine`),
  ADD KEY `jmbg` (`jmbg`);

--
-- Indexes for table `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`sifra_proizvoda`);

--
-- Indexes for table `reklamacije`
--
ALTER TABLE `reklamacije`
  ADD PRIMARY KEY (`id_reklamacije`),
  ADD KEY `jmbg` (`jmbg`),
  ADD KEY `id_porudzbine` (`id_porudzbine`);

--
-- Indexes for table `sadrzaj_narudzbenice`
--
ALTER TABLE `sadrzaj_narudzbenice`
  ADD KEY `sifra_narudzbenice` (`sifra_narudzbenice`),
  ADD KEY `sifra_proizvoda` (`sifra_proizvoda`);

--
-- Indexes for table `zaposleni`
--
ALTER TABLE `zaposleni`
  ADD PRIMARY KEY (`id_zaposlenog`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dobavljaci`
--
ALTER TABLE `dobavljaci`
  MODIFY `id_dobavljaca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faktura`
--
ALTER TABLE `faktura`
  MODIFY `id_fakture` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `isporuka_porudzbine`
--
ALTER TABLE `isporuka_porudzbine`
  MODIFY `id_isporuke` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kupci`
--
ALTER TABLE `kupci`
  MODIFY `jmbg` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `kurirska_sluzba`
--
ALTER TABLE `kurirska_sluzba`
  MODIFY `id_sluzbe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `narudzbenica`
--
ALTER TABLE `narudzbenica`
  MODIFY `sifra_narudzbenice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otpremnica`
--
ALTER TABLE `otpremnica`
  MODIFY `sifra_otpremnice` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `porudzbina`
--
ALTER TABLE `porudzbina`
  MODIFY `id_porudzbine` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `sifra_proizvoda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reklamacije`
--
ALTER TABLE `reklamacije`
  MODIFY `id_reklamacije` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zaposleni`
--
ALTER TABLE `zaposleni`
  MODIFY `id_zaposlenog` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faktura`
--
ALTER TABLE `faktura`
  ADD CONSTRAINT `faktura_ibfk_1` FOREIGN KEY (`id_porudzbine`) REFERENCES `porudzbina` (`id_porudzbine`);

--
-- Constraints for table `isporuka_porudzbine`
--
ALTER TABLE `isporuka_porudzbine`
  ADD CONSTRAINT `isporuka_porudzbine_ibfk_1` FOREIGN KEY (`id_sluzbe`) REFERENCES `kurirska_sluzba` (`id_sluzbe`),
  ADD CONSTRAINT `isporuka_porudzbine_ibfk_2` FOREIGN KEY (`jmbg`) REFERENCES `kupci` (`jmbg`),
  ADD CONSTRAINT `isporuka_porudzbine_ibfk_3` FOREIGN KEY (`id_porudzbine`) REFERENCES `porudzbina` (`id_porudzbine`);

--
-- Constraints for table `izdavanje_racuna`
--
ALTER TABLE `izdavanje_racuna`
  ADD CONSTRAINT `izdavanje_racuna_ibfk_1` FOREIGN KEY (`id_zaposlenog`) REFERENCES `zaposleni` (`id_zaposlenog`),
  ADD CONSTRAINT `izdavanje_racuna_ibfk_2` FOREIGN KEY (`id_fakture`) REFERENCES `faktura` (`id_fakture`);

--
-- Constraints for table `narudzbenica`
--
ALTER TABLE `narudzbenica`
  ADD CONSTRAINT `narudzbenica_ibfk_1` FOREIGN KEY (`id_dobavljaca`) REFERENCES `dobavljaci` (`id_dobavljaca`);

--
-- Constraints for table `narudzbenica_zaposleni`
--
ALTER TABLE `narudzbenica_zaposleni`
  ADD CONSTRAINT `narudzbenica_zaposleni_ibfk_1` FOREIGN KEY (`id_zaposlenog`) REFERENCES `zaposleni` (`id_zaposlenog`),
  ADD CONSTRAINT `narudzbenica_zaposleni_ibfk_2` FOREIGN KEY (`sifra_narudzbenice`) REFERENCES `narudzbenica` (`sifra_narudzbenice`);

--
-- Constraints for table `opis_proizvoda`
--
ALTER TABLE `opis_proizvoda`
  ADD CONSTRAINT `opis_proizvoda_ibfk_1` FOREIGN KEY (`sifra_proizvoda`) REFERENCES `proizvod` (`sifra_proizvoda`);

--
-- Constraints for table `otpremnica_dobavljac`
--
ALTER TABLE `otpremnica_dobavljac`
  ADD CONSTRAINT `otpremnica_dobavljac_ibfk_1` FOREIGN KEY (`sifra_otpremnice`) REFERENCES `otpremnica` (`sifra_otpremnice`),
  ADD CONSTRAINT `otpremnica_dobavljac_ibfk_2` FOREIGN KEY (`id_dobavljaca`) REFERENCES `dobavljaci` (`id_dobavljaca`);

--
-- Constraints for table `poruzbina_kupci`
--
ALTER TABLE `poruzbina_kupci`
  ADD CONSTRAINT `poruzbina_kupci_ibfk_1` FOREIGN KEY (`jmbg`) REFERENCES `kupci` (`jmbg`),
  ADD CONSTRAINT `poruzbina_kupci_ibfk_2` FOREIGN KEY (`id_porudzbine`) REFERENCES `porudzbina` (`id_porudzbine`);

--
-- Constraints for table `reklamacije`
--
ALTER TABLE `reklamacije`
  ADD CONSTRAINT `reklamacije_ibfk_1` FOREIGN KEY (`jmbg`) REFERENCES `kupci` (`jmbg`),
  ADD CONSTRAINT `reklamacije_ibfk_2` FOREIGN KEY (`id_porudzbine`) REFERENCES `porudzbina` (`id_porudzbine`);

--
-- Constraints for table `sadrzaj_narudzbenice`
--
ALTER TABLE `sadrzaj_narudzbenice`
  ADD CONSTRAINT `sadrzaj_narudzbenice_ibfk_1` FOREIGN KEY (`sifra_narudzbenice`) REFERENCES `narudzbenica` (`sifra_narudzbenice`),
  ADD CONSTRAINT `sadrzaj_narudzbenice_ibfk_2` FOREIGN KEY (`sifra_proizvoda`) REFERENCES `proizvod` (`sifra_proizvoda`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
