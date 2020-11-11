-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Nov-2020 às 19:47
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
-- Estrutura da tabela `motorista`
--

CREATE TABLE `motorista` (
  `motcod` int(11) NOT NULL,
  `motnome` varchar(45) DEFAULT NULL,
  `motrua` varchar(45) DEFAULT NULL,
  `motbairro` varchar(45) DEFAULT NULL,
  `motcidade` varchar(45) DEFAULT NULL,
  `motestado` varchar(45) DEFAULT NULL,
  `motemail` varchar(45) DEFAULT NULL,
  `motsenha` varchar(45) DEFAULT NULL,
  `motfone` varchar(45) DEFAULT NULL,
  `motcpf` varchar(45) DEFAULT NULL,
  `motrg` varchar(45) DEFAULT NULL,
  `motcnh` varchar(45) DEFAULT NULL,
  `motdtadmissao` varchar(45) DEFAULT NULL,
  `motdtafast` varchar(45) DEFAULT NULL,
  `motsituacao` varchar(45) DEFAULT NULL,
  `regrasjornada_rjocod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `motorista`
--

INSERT INTO `motorista` (`motcod`, `motnome`, `motrua`, `motbairro`, `motcidade`, `motestado`, `motemail`, `motsenha`, `motfone`, `motcpf`, `motrg`, `motcnh`, `motdtadmissao`, `motdtafast`, `motsituacao`, `regrasjornada_rjocod`) VALUES
(1, 'Joao Teste', 'Rua Abcde', 'Bairro Testando', 'Pato Branco', 'PR', 'viniciusteste@teste.com', '123456', '46 000000000', '06789384901', '45345435', '23434654654', '05/05/2000', '05/07/2010', '1', 0),
(2, 'José Santos', 'Rua AXYZ', 'Bairro Testando 2', 'Francisco Beltrão', 'PR', 'joseteste@teste.com', '1234', '46 000000001', '06789384902', '453454357', '3453454354', '01/05/2000', '05/07/2012', '1', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `motorista`
--
ALTER TABLE `motorista`
  ADD PRIMARY KEY (`motcod`),
  ADD KEY `fk_motorista_regrasjornada1_idx` (`regrasjornada_rjocod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `motorista`
--
ALTER TABLE `motorista`
  MODIFY `motcod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `motorista`
--
ALTER TABLE `motorista`
  ADD CONSTRAINT `fk_motorista_tpveiculo1` FOREIGN KEY (`regrasjornada_rjocod`) REFERENCES `tpveiculo` (`tpvcod`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
