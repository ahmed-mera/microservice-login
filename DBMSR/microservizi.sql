-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Nov 08, 2020 alle 18:13
-- Versione del server: 10.3.25-MariaDB-0+deb10u1
-- Versione PHP: 7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `microservizi`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `associate`
--

CREATE TABLE `associate` (
  `id_associate` int(11) NOT NULL,
  `id_client_user` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `active` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `client_users`
--

CREATE TABLE `client_users` (
  `id_client_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `associate`
--
ALTER TABLE `associate`
  ADD PRIMARY KEY (`id_associate`),
  ADD KEY `FK_client_user` (`id_client_user`),
  ADD KEY `FK_clients` (`id_client`);

--
-- Indici per le tabelle `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indici per le tabelle `client_users`
--
ALTER TABLE `client_users`
  ADD PRIMARY KEY (`id_client_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `associate`
--
ALTER TABLE `associate`
  MODIFY `id_associate` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `client_users`
--
ALTER TABLE `client_users`
  MODIFY `id_client_user` int(11) NOT NULL AUTO_INCREMENT;
--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `associate`
--
ALTER TABLE `associate`
  ADD CONSTRAINT `FK_client_user` FOREIGN KEY (`id_client_user`) REFERENCES `client_users` (`id_client_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_clients` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
