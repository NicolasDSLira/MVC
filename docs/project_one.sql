-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20-Jan-2022 às 11:19
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_one`
--

CREATE DATABASE project_one DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- --------------------------------------------------------

--
-- usar databese: `project_one`
--

USE project_one;

-- --------------------------------------------------------

--
-- Estrutura da tabela `machine`
--

CREATE TABLE `machine` (
  `id` int(11) PRIMARY KEY  AUTO_INCREMENT NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `urlImg` text NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perifericos`
--

CREATE TABLE `perifericos` (
  `id` int(11) PRIMARY KEY  AUTO_INCREMENT NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `urlImg` text NOT NULL,
  `MachineId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_table`
--

CREATE TABLE `user_table` (
  `idUser` int(11) PRIMARY KEY  AUTO_INCREMENT NOT NULL,
  `nameUser` varchar(80) DEFAULT NULL,
  `emailUser` varchar(80) NOT NULL,
  `passUser` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------


--
-- FK_KEY for table `machine`
--

ALTER TABLE machine ADD CONSTRAINT FK_machine_3
    FOREIGN KEY (UserId)
    REFERENCES user_table (idUser);

--
-- FK_KEY for table `periférico`
--

ALTER TABLE perifericos ADD CONSTRAINT FK_perifericos_3
    FOREIGN KEY (MachineId)
    REFERENCES machine (id);

-- --------------------------------------------------------


-- 
-- Adicionado dados teste
-- 

INSERT INTO `user_table` (`idUser`, `nameUser`, `emailUser`, `passUser`) VALUES
(1, 'root', 'root@admin.io', '147369'),
(2, 'admin', 'admin@admin.io', '369147852');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


