-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Nov-2020 às 21:57
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
-- Estrutura da tabela `cidade`
--

CREATE TABLE `cidade` (
  `cidcod` int(11) NOT NULL,
  `cidnome` varchar(50) NOT NULL,
  `estado_estcod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `escopo`
--

CREATE TABLE `escopo` (
  `esccod` int(11) NOT NULL,
  `escnome` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `escopo`
--

INSERT INTO `escopo` (`esccod`, `escnome`) VALUES
(1, 'Admin'),
(2, 'escopooo'),
(3, 'Operacional'),
(4, 'Gerente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `estcod` int(11) NOT NULL,
  `estnome` varchar(50) NOT NULL,
  `estsigla` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `joresp`
--

CREATE TABLE `joresp` (
  `jorespcod` int(11) NOT NULL,
  `jorespinicial` time DEFAULT NULL,
  `jorespfinal` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jorinter`
--

CREATE TABLE `jorinter` (
  `jorintercod` int(11) NOT NULL,
  `jorinterinicial` time DEFAULT NULL,
  `jorinterfinal` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jornada`
--

CREATE TABLE `jornada` (
  `jorcod` int(11) NOT NULL,
  `jortitulo` varchar(45) DEFAULT NULL,
  `jordia` date DEFAULT NULL,
  `jorhorainicio` time DEFAULT NULL,
  `jorhorafinal` time DEFAULT NULL,
  `jorhoraext` varchar(45) DEFAULT NULL,
  `jordescanso` varchar(45) DEFAULT NULL,
  `jorinter_jorintercod` int(11) NOT NULL,
  `motorista_motcod` int(11) NOT NULL,
  `jorref_jorrefcod` int(11) NOT NULL,
  `joresp_jorespcod` int(11) NOT NULL,
  `cidade_cidcod` int(11) NOT NULL,
  `veiculo_veicod` int(11) NOT NULL,
  `gerente_gercod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jorref`
--

CREATE TABLE `jorref` (
  `jorrefcod` int(11) NOT NULL,
  `jorrefinicial` time DEFAULT NULL,
  `jorreffinal` time DEFAULT NULL,
  `jorrefcol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `regrasjornada`
--

CREATE TABLE `regrasjornada` (
  `rjocod` int(11) NOT NULL,
  `rjonome` varchar(45) DEFAULT NULL,
  `rjotrabinint` time DEFAULT NULL,
  `rjodesc` time DEFAULT NULL,
  `rjodescinint` time DEFAULT NULL,
  `rjorefeicao` time DEFAULT NULL,
  `rjomaxdia` time DEFAULT NULL,
  `rjoextra` time DEFAULT NULL,
  `rjoesprep` time DEFAULT NULL,
  `rjodescinter` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `regrasjornada`
--

INSERT INTO `regrasjornada` (`rjocod`, `rjonome`, `rjotrabinint`, `rjodesc`, `rjodescinint`, `rjorefeicao`, `rjomaxdia`, `rjoextra`, `rjoesprep`, `rjodescinter`) VALUES
(1, 'Teste 33', '01:20:00', '02:05:00', '03:10:00', '04:15:00', '05:20:00', '06:25:00', '07:30:00', '08:35:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tpveiculo`
--

CREATE TABLE `tpveiculo` (
  `tpvcod` int(11) NOT NULL,
  `tpvnome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tpveiculo`
--

INSERT INTO `tpveiculo` (`tpvcod`, `tpvnome`) VALUES
(0, 'Ônibus'),
(1, 'Caminhão'),
(3, 'TesteTipo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `usucod` int(11) NOT NULL,
  `usuusername` varchar(50) NOT NULL,
  `usunome` varchar(50) NOT NULL,
  `usuemail` varchar(50) NOT NULL,
  `ususenha` varchar(50) NOT NULL,
  `usuimagem` varchar(100) DEFAULT NULL,
  `usufone` varchar(20) NOT NULL,
  `usupermissao` int(11) NOT NULL,
  `usuativo` tinyint(4) NOT NULL,
  `escopo_esccod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usucod`, `usuusername`, `usunome`, `usuemail`, `ususenha`, `usuimagem`, `usufone`, `usupermissao`, `usuativo`, `escopo_esccod`) VALUES
(1, 'vinicius', 'Vinicius D.', 'viniciusdalsasso@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '46 9950-0000', 1, 0, 1),
(3, 'erewr', '', 'erewr', 'ewrer', 'ewrewr', 'ewrewrewr', 0, 0, 1),
(4, '', '', '', '', NULL, '', 0, 0, 1),
(5, 'dfdsfdsf', '', 'sdfdsf', 'dsfdsf', 'ddsfdsf', 'dsfdsf', 1, 1, 1),
(8, 'sadsad', 'sadsad', 'sdsad', 'sadsad', 'sadsadsad', 'sdsad', 0, 1, 1),
(9, 'viniciusteste', 'bagulho', 'usuario@teste.com', 'e10adc3949ba59abbe56e057f20f883e', '', '4699990000', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculo`
--

CREATE TABLE `veiculo` (
  `veicod` int(11) NOT NULL,
  `veiplaca` varchar(10) DEFAULT NULL,
  `veiano` varchar(45) DEFAULT NULL,
  `veimodelo` varchar(45) DEFAULT NULL,
  `tpveiculo_tpvcod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `veiculo`
--

INSERT INTO `veiculo` (`veicod`, `veiplaca`, `veiano`, `veimodelo`, `tpveiculo_tpvcod`) VALUES
(1, 'ABCDE12345', '2013', '', 0),
(2, 'FGHJIK700', '2015', '', 0),
(3, 'FGHJIK700', '2015', 'Marcopolo XRZ', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cidade`
--
ALTER TABLE `cidade`
  ADD PRIMARY KEY (`cidcod`),
  ADD KEY `fk_cidade_estado1_idx` (`estado_estcod`);

--
-- Índices para tabela `escopo`
--
ALTER TABLE `escopo`
  ADD PRIMARY KEY (`esccod`);

--
-- Índices para tabela `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`estcod`);

--
-- Índices para tabela `joresp`
--
ALTER TABLE `joresp`
  ADD PRIMARY KEY (`jorespcod`);

--
-- Índices para tabela `jorinter`
--
ALTER TABLE `jorinter`
  ADD PRIMARY KEY (`jorintercod`);

--
-- Índices para tabela `jornada`
--
ALTER TABLE `jornada`
  ADD PRIMARY KEY (`jorcod`),
  ADD KEY `fk_jornada_jorinter1_idx` (`jorinter_jorintercod`),
  ADD KEY `fk_jornada_jorref1_idx` (`jorref_jorrefcod`),
  ADD KEY `fk_jornada_joresp1_idx` (`joresp_jorespcod`),
  ADD KEY `fk_jornada_cidade1_idx` (`cidade_cidcod`),
  ADD KEY `fk_jornada_veiculo1_idx` (`veiculo_veicod`),
  ADD KEY `fk_jornada_gerente1_idx` (`gerente_gercod`),
  ADD KEY `fk_jornada_motorista1` (`motorista_motcod`);

--
-- Índices para tabela `jorref`
--
ALTER TABLE `jorref`
  ADD PRIMARY KEY (`jorrefcod`);

--
-- Índices para tabela `motorista`
--
ALTER TABLE `motorista`
  ADD PRIMARY KEY (`motcod`),
  ADD KEY `fk_motorista_regrasjornada1_idx` (`regrasjornada_rjocod`);

--
-- Índices para tabela `regrasjornada`
--
ALTER TABLE `regrasjornada`
  ADD PRIMARY KEY (`rjocod`);

--
-- Índices para tabela `tpveiculo`
--
ALTER TABLE `tpveiculo`
  ADD PRIMARY KEY (`tpvcod`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usucod`),
  ADD KEY `fk_usuario_escopo1_idx` (`escopo_esccod`);

--
-- Índices para tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD PRIMARY KEY (`veicod`),
  ADD KEY `fk_veiculo_tpveiculo1_idx` (`tpveiculo_tpvcod`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cidade`
--
ALTER TABLE `cidade`
  MODIFY `cidcod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `escopo`
--
ALTER TABLE `escopo`
  MODIFY `esccod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `estcod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `joresp`
--
ALTER TABLE `joresp`
  MODIFY `jorespcod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jorinter`
--
ALTER TABLE `jorinter`
  MODIFY `jorintercod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jornada`
--
ALTER TABLE `jornada`
  MODIFY `jorcod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `jorref`
--
ALTER TABLE `jorref`
  MODIFY `jorrefcod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `regrasjornada`
--
ALTER TABLE `regrasjornada`
  MODIFY `rjocod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usucod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `veiculo`
--
ALTER TABLE `veiculo`
  MODIFY `veicod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_cidade_estado1` FOREIGN KEY (`estado_estcod`) REFERENCES `estado` (`estcod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `jornada`
--
ALTER TABLE `jornada`
  ADD CONSTRAINT `fk_jornada_cidade1` FOREIGN KEY (`cidade_cidcod`) REFERENCES `cidade` (`cidcod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jornada_gerente1` FOREIGN KEY (`gerente_gercod`) REFERENCES `usuario` (`usucod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jornada_joresp1` FOREIGN KEY (`joresp_jorespcod`) REFERENCES `joresp` (`jorespcod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jornada_jorinter1` FOREIGN KEY (`jorinter_jorintercod`) REFERENCES `jorinter` (`jorintercod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jornada_jorref1` FOREIGN KEY (`jorref_jorrefcod`) REFERENCES `jorref` (`jorrefcod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jornada_motorista1` FOREIGN KEY (`motorista_motcod`) REFERENCES `motorista` (`motcod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jornada_veiculo1` FOREIGN KEY (`veiculo_veicod`) REFERENCES `veiculo` (`veicod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `motorista`
--
ALTER TABLE `motorista`
  ADD CONSTRAINT `fk_motorista_regrasjornada1` FOREIGN KEY (`regrasjornada_rjocod`) REFERENCES `regrasjornada` (`rjocod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_escopo1` FOREIGN KEY (`escopo_esccod`) REFERENCES `escopo` (`esccod`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `veiculo`
--
ALTER TABLE `veiculo`
  ADD CONSTRAINT `fk_veiculo_tpveiculo1` FOREIGN KEY (`tpveiculo_tpvcod`) REFERENCES `tpveiculo` (`tpvcod`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
