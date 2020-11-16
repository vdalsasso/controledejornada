-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Nov-2020 às 05:42
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

--
-- Extraindo dados da tabela `cidade`
--

INSERT INTO `cidade` (`cidcod`, `cidnome`, `estado_estcod`) VALUES
(1, 'Pato Branco', 1),
(2, 'Curitiba', 1);

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
(1, 'Administrador'),
(2, 'escopooo'),
(3, 'Operacional'),
(4, 'Gerente'),
(5, 'aaa'),
(6, 'asdasd'),
(7, 'Gerente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estado`
--

CREATE TABLE `estado` (
  `estcod` int(11) NOT NULL,
  `estnome` varchar(50) NOT NULL,
  `estsigla` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estado`
--

INSERT INTO `estado` (`estcod`, `estnome`, `estsigla`) VALUES
(1, 'Paraná', 'PR'),
(2, 'Santa Catarina', 'SC');

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
  `jorhorainicial` time DEFAULT NULL,
  `jorhorafinal` time DEFAULT NULL,
  `jorrefinicial` time DEFAULT NULL,
  `jorreffinal` time DEFAULT NULL,
  `jorhoraext` varchar(45) DEFAULT NULL,
  `jordescanso` varchar(45) DEFAULT NULL,
  `jorinterinicial` time DEFAULT NULL,
  `jorinterfinal` time DEFAULT NULL,
  `jorespinicial` time DEFAULT NULL,
  `jorespfinal` time DEFAULT NULL,
  `motorista_motcod` int(11) NOT NULL,
  `cidade_cidcodinicial` int(11) NOT NULL,
  `cidade_cidcodfinal` int(11) DEFAULT NULL,
  `veiculo_veicod` int(11) NOT NULL
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `motorista`
--

INSERT INTO `motorista` (`motcod`, `motnome`, `motrua`, `motbairro`, `motcidade`, `motestado`, `motemail`, `motsenha`, `motfone`, `motcpf`, `motrg`, `motcnh`, `motdtadmissao`, `motdtafast`, `motsituacao`, `regrasjornada_rjocod`) VALUES
(4, 'Teste Motorista', 'Rua Testes', 'Centro', 'Pato Branco', 'SC', 'vin.dalsasso@gmail.com', '123456', '46 000000003', '2343243243243', '342343242', '121234214', '10/10/2000', '10/10/2005', '1', 2),
(5, 'Vinicius', 'Rua Abcde', 'Centro', 'Pato Branco', 'Paraná', 'vinicius@teste.com', '123456', '46 000000000', '1234567889', '122343543546', '3221432', '10/10/2000', '', '1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `regrasjornada`
--

CREATE TABLE `regrasjornada` (
  `rjocod` int(11) NOT NULL,
  `rjonome` varchar(30) DEFAULT NULL,
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
(1, 'Caminhoneiro - 2020', '01:00:00', '02:00:00', '03:00:00', '04:00:00', '05:00:00', '06:00:00', '07:00:00', '08:00:00'),
(2, 'Teste 2', '01:00:00', '02:00:00', '03:00:00', '04:00:00', '05:00:00', '06:00:00', '07:00:00', '08:00:00');

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
(3, 'admin', 'administrador', 'teste@teste.com', 'e10adc3949ba59abbe56e057f20f883e', 'ewrewr', 'ewrewrewr', 0, 0, 1),
(4, 'operacional', 'Gerenteoperacional', 'operacional@jornadas.com', '', NULL, '', 0, 0, 1),
(5, 'joao', 'João da Silva', 'joao@silva.com', 'dsfdsf', 'ddsfdsf', 'dsfdsf', 1, 1, 1),
(8, 'jose', 'José Teste', 'jose@teste.com', 'sadsad', 'sadsadsad', 'sdsad', 0, 1, 1);

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
(1, 'ABCDE12345', '2013', 'dfdsfs', 0),
(2, 'FGHJIK700', '2015', 'dA', 0),
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
  ADD UNIQUE KEY `fk_jornada_cidadefinal1_idx` (`cidade_cidcodfinal`),
  ADD KEY `fk_jornada_veiculo1_idx` (`veiculo_veicod`),
  ADD KEY `fk_jornada_motorista1` (`motorista_motcod`),
  ADD KEY `fk_jornada_cidadeinicial1_idx` (`cidade_cidcodinicial`) USING BTREE;

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
  MODIFY `cidcod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `escopo`
--
ALTER TABLE `escopo`
  MODIFY `esccod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `estado`
--
ALTER TABLE `estado`
  MODIFY `estcod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT de tabela `motorista`
--
ALTER TABLE `motorista`
  MODIFY `motcod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `regrasjornada`
--
ALTER TABLE `regrasjornada`
  MODIFY `rjocod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `fk_jornada_cidadefinal1` FOREIGN KEY (`cidade_cidcodfinal`) REFERENCES `cidade` (`cidcod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jornada_cidadeinicial1` FOREIGN KEY (`cidade_cidcodinicial`) REFERENCES `cidade` (`cidcod`) ON DELETE NO ACTION ON UPDATE NO ACTION,
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
