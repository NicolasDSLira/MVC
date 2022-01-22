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

CREATE DATABASE `project_one`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `table_one`
--

CREATE TABLE `table_one` (
  `id_table` int(11) NOT NULL,
  `name_table` varchar(50) NOT NULL,
  `col_table` text NOT NULL,
  `pass_table` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `table_two`
--

CREATE TABLE `table_two` (
  `id_table` int(11) NOT NULL,
  `name_table` varchar(50) NOT NULL,
  `col` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_table`
--

CREATE TABLE `user_table` (
  `idUser` int(11) NOT NULL,
  `nameUser` varchar(80) DEFAULT NULL,
  `emailUser` varchar(80) NOT NULL,
  `passUser` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user_table`
--

INSERT INTO `user_table` (`idUser`, `nameUser`, `emailUser`, `passUser`) VALUES
(1, 'root', 'root@admin.io', '147369'),
(2, 'admin', 'admin@admin.io', '369147852');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_one`
--
ALTER TABLE `table_one`
  ADD PRIMARY KEY (`id_table`);

--
-- Indexes for table `table_two`
--
ALTER TABLE `table_two`
  ADD PRIMARY KEY (`id_table`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_one`
--
ALTER TABLE `table_one`
  MODIFY `id_table` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
