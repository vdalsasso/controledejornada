-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Nov-2020 às 19:27
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controledejornada`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `regrasjornada`
--

CREATE TABLE `regrasjornada` (
  `rjocod` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `rjonome` varchar(30) DEFAULT NULL,
  `rjotrabinint` varchar(45) DEFAULT NULL,
  `rjodesc` varchar(45) DEFAULT NULL,
  `rjodescinint` varchar(45) DEFAULT NULL,
  `rjorefeicao` varchar(45) DEFAULT NULL,
  `rjomaxdia` varchar(45) DEFAULT NULL,
  `rjoextra` varchar(45) DEFAULT NULL,
  `rjoesprep` varchar(45) DEFAULT NULL,
  `rjodescinter` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `regrasjornada`
--

INSERT INTO `regrasjornada` (`rjocod`, `rjonome`, `rjotrabinint`, `rjodesc`, `rjodescinint`, `rjorefeicao`, `rjomaxdia`, `rjoextra`, `rjoesprep`, `rjodescinter`) VALUES
(1, '', '', '', '', '', '', '', '', ''),
(2, 'Teste 33', '01:20', '02:05', '03:10', '04:15', '05:20', '06:25', '07:30', '08:35');

--
-- Índices para tabelas despejadas
--


--
-- AUTO_INCREMENT de tabelas despejadas
--



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
