-- MySQL Script generated by MySQL Workbench
-- Wed Sep 16 15:48:56 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema controledeestoque
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema controledeestoque
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `controledeestoque` DEFAULT CHARACTER SET utf8 ;
USE `controledeestoque` ;

-- -----------------------------------------------------
-- Table `controledeestoque`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledeestoque`.`User` ;

CREATE TABLE IF NOT EXISTS `controledeestoque`.`User` (
  `idUser` INT NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(45) NOT NULL,
  `Email` VARCHAR(75) NOT NULL,
  `Password` VARCHAR(75) NOT NULL,
  `Dataregistro` DATE NOT NULL,
  `Permissao` TINYINT NOT NULL,
  PRIMARY KEY (`idUser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledeestoque`.`Produto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledeestoque`.`Produto` ;

CREATE TABLE IF NOT EXISTS `controledeestoque`.`Produto` (
  `CodRefProduto` INT NOT NULL AUTO_INCREMENT,
  `NomeProduto` VARCHAR(75) NOT NULL,
  `User_idUser` INT NOT NULL,
  PRIMARY KEY (`CodRefProduto`),
  INDEX `fk_Produto_User_idx` (`User_idUser` ASC),
  CONSTRAINT `fk_Produto_User`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `controledeestoque`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledeestoque`.`Fabricante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledeestoque`.`Fabricante` ;

CREATE TABLE IF NOT EXISTS `controledeestoque`.`Fabricante` (
  `idFabricante` INT NOT NULL AUTO_INCREMENT,
  `NomeFabricante` VARCHAR(75) NOT NULL,
  `CNPJFabricante` VARCHAR(75) NOT NULL,
  `EmailFabricante` VARCHAR(75) NOT NULL,
  `EnderecoFabricante` VARCHAR(75) NOT NULL,
  `TelefoneFabricante` VARCHAR(45) NOT NULL,
  `User_idUser` INT NOT NULL,
  PRIMARY KEY (`idFabricante`),
  INDEX `fk_Fabricante_User1_idx` (`User_idUser` ASC),
  CONSTRAINT `fk_Fabricante_User1`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `controledeestoque`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledeestoque`.`Representante`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledeestoque`.`Representante` ;

CREATE TABLE IF NOT EXISTS `controledeestoque`.`Representante` (
  `idRepresentante` INT NOT NULL AUTO_INCREMENT,
  `NomeRepresentante` VARCHAR(75) NOT NULL,
  `TelefoneRepresentante` VARCHAR(45) NOT NULL,
  `EmailRepresentante` VARCHAR(45) NOT NULL,
  `Fabricante_idFabricante` INT NOT NULL,
  `User_idUser` INT NOT NULL,
  PRIMARY KEY (`idRepresentante`),
  INDEX `fk_Representante_Fabricante1_idx` (`Fabricante_idFabricante` ASC),
  INDEX `fk_Representante_User1_idx` (`User_idUser` ASC),
  CONSTRAINT `fk_Representante_Fabricante1`
    FOREIGN KEY (`Fabricante_idFabricante`)
    REFERENCES `controledeestoque`.`Fabricante` (`idFabricante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Representante_User1`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `controledeestoque`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledeestoque`.`Itens`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledeestoque`.`Itens` ;

CREATE TABLE IF NOT EXISTS `controledeestoque`.`Itens` (
  `idItens` INT NOT NULL AUTO_INCREMENT,
  `QuantItens` INT NOT NULL,
  `QuantItensVend` INT NOT NULL,
  `ValCompItens` DECIMAL NOT NULL,
  `ValVendItens` DECIMAL NOT NULL,
  `DataCompraItens` DATETIME NOT NULL,
  `DataVenci_Itens` DATETIME NULL,
  `Ativo` TINYINT NOT NULL,
  `Produto_CodRefProduto` INT NOT NULL,
  `Fabricante_idFabricante` INT NOT NULL,
  `User_idUser` INT NOT NULL,
  PRIMARY KEY (`idItens`),
  INDEX `fk_Itens_Produto1_idx` (`Produto_CodRefProduto` ASC),
  INDEX `fk_Itens_Fabricante1_idx` (`Fabricante_idFabricante` ASC),
  INDEX `fk_Itens_User1_idx` (`User_idUser` ASC),
  CONSTRAINT `fk_Itens_Produto1`
    FOREIGN KEY (`Produto_CodRefProduto`)
    REFERENCES `controledeestoque`.`Produto` (`CodRefProduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Itens_Fabricante1`
    FOREIGN KEY (`Fabricante_idFabricante`)
    REFERENCES `controledeestoque`.`Fabricante` (`idFabricante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Itens_User1`
    FOREIGN KEY (`User_idUser`)
    REFERENCES `controledeestoque`.`User` (`idUser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledeestoque`.`escopo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledeestoque`.`escopo` ;

CREATE TABLE IF NOT EXISTS `controledeestoque`.`escopo` (
  `esccod` INT NOT NULL AUTO_INCREMENT,
  `escnome` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`esccod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledeestoque`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledeestoque`.`usuario` ;

CREATE TABLE IF NOT EXISTS `controledeestoque`.`usuario` (
  `usucod` INT NOT NULL AUTO_INCREMENT,
  `usunome` VARCHAR(50) NOT NULL,
  `usuemail` VARCHAR(50) NOT NULL,
  `ususenha` VARCHAR(50) NOT NULL,
  `usufone` VARCHAR(20) NOT NULL,
  `escopo_esccod` INT NOT NULL,
  `usupermissao` INT NOT NULL,
  PRIMARY KEY (`usucod`),
  INDEX `fk_usuario_escopo1_idx` (`escopo_esccod` ASC),
  CONSTRAINT `fk_usuario_escopo1`
    FOREIGN KEY (`escopo_esccod`)
    REFERENCES `controledeestoque`.`escopo` (`esccod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledeestoque`.`motorista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledeestoque`.`motorista` ;

CREATE TABLE IF NOT EXISTS `controledeestoque`.`motorista` (
  `motcod` INT NOT NULL,
  `motnome` VARCHAR(45) NULL,
  `motrua` VARCHAR(45) NULL,
  `motbairro` VARCHAR(45) NULL,
  `motcidade` VARCHAR(45) NULL,
  `motestado` VARCHAR(45) NULL,
  `motemail` VARCHAR(45) NULL,
  `motsenha` VARCHAR(45) NULL,
  `motfone` VARCHAR(45) NULL,
  `motcpf` VARCHAR(45) NULL,
  `motrg` VARCHAR(45) NULL,
  `motcnh` VARCHAR(45) NULL,
  `motdtadmissao` VARCHAR(45) NULL,
  `motdtafast` VARCHAR(45) NULL,
  `motsituacao` VARCHAR(45) NULL,
  PRIMARY KEY (`motcod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledeestoque`.`jorinter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledeestoque`.`jorinter` ;

CREATE TABLE IF NOT EXISTS `controledeestoque`.`jorinter` (
  `jorintercod` INT NOT NULL AUTO_INCREMENT,
  `jorinterinicial` DATETIME NULL,
  `jorinterfinal` DATETIME NULL,
  PRIMARY KEY (`jorintercod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledeestoque`.`jorref`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledeestoque`.`jorref` ;

CREATE TABLE IF NOT EXISTS `controledeestoque`.`jorref` (
  `jorrefcod` INT NOT NULL AUTO_INCREMENT,
  `jorrefinicial` DATETIME NULL,
  `jorreffinal` DATETIME NULL,
  PRIMARY KEY (`jorrefcod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledeestoque`.`joresp`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledeestoque`.`joresp` ;

CREATE TABLE IF NOT EXISTS `controledeestoque`.`joresp` (
  `jorespcod` INT NOT NULL AUTO_INCREMENT,
  `jorespinicial` DATETIME NULL,
  `jorespfinal` DATETIME NULL,
  PRIMARY KEY (`jorespcod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledeestoque`.`estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledeestoque`.`estado` ;

CREATE TABLE IF NOT EXISTS `controledeestoque`.`estado` (
  `estcod` INT NOT NULL AUTO_INCREMENT,
  `estnome` VARCHAR(50) NOT NULL,
  `estsigla` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`estcod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledeestoque`.`cidade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledeestoque`.`cidade` ;

CREATE TABLE IF NOT EXISTS `controledeestoque`.`cidade` (
  `cidcod` INT NOT NULL AUTO_INCREMENT,
  `cidnome` VARCHAR(50) NOT NULL,
  `estado_estcod` INT NOT NULL,
  PRIMARY KEY (`cidcod`),
  INDEX `fk_cidade_estado1_idx` (`estado_estcod` ASC),
  CONSTRAINT `fk_cidade_estado1`
    FOREIGN KEY (`estado_estcod`)
    REFERENCES `controledeestoque`.`estado` (`estcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledeestoque`.`tpveiculo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledeestoque`.`tpveiculo` ;

CREATE TABLE IF NOT EXISTS `controledeestoque`.`tpveiculo` (
  `tpvcod` INT NOT NULL,
  `tpvnome` VARCHAR(45) NULL,
  PRIMARY KEY (`tpvcod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledeestoque`.`veiculo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledeestoque`.`veiculo` ;

CREATE TABLE IF NOT EXISTS `controledeestoque`.`veiculo` (
  `veicod` INT NOT NULL AUTO_INCREMENT,
  `veiplaca` VARCHAR(10) NULL,
  `veiano` VARCHAR(45) NULL,
  `veimodelo` VARCHAR(45) NULL,
  `tpveiculo_tpvcod` INT NOT NULL,
  PRIMARY KEY (`veicod`),
  INDEX `fk_veiculo_tpveiculo1_idx` (`tpveiculo_tpvcod` ASC),
  CONSTRAINT `fk_veiculo_tpveiculo1`
    FOREIGN KEY (`tpveiculo_tpvcod`)
    REFERENCES `controledeestoque`.`tpveiculo` (`tpvcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledeestoque`.`jornada`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledeestoque`.`jornada` ;

CREATE TABLE IF NOT EXISTS `controledeestoque`.`jornada` (
  `jorcod` INT NOT NULL,
  `jortitulo` VARCHAR(45) NULL,
  `jordia` VARCHAR(45) NULL,
  `jorhorainicio` VARCHAR(45) NULL,
  `jorhorafinal` VARCHAR(45) NULL,
  `jorhoraext` VARCHAR(45) NULL,
  `jordescanso` VARCHAR(45) NULL,
  `motorista_motcod` INT NOT NULL,
  `usuario_usucod` INT NOT NULL,
  `jorinter_jorintercod` INT NOT NULL,
  `jorref_jorrefcod` INT NOT NULL,
  `joresp_jorespcod` INT NOT NULL,
  `cidade_cidcod` INT NOT NULL,
  `veiculo_veicod` INT NOT NULL,
  PRIMARY KEY (`jorcod`),
  INDEX `fk_jornada_motorista1_idx` (`motorista_motcod` ASC),
  INDEX `fk_jornada_usuario1_idx` (`usuario_usucod` ASC),
  INDEX `fk_jornada_jorinter1_idx` (`jorinter_jorintercod` ASC),
  INDEX `fk_jornada_jorref1_idx` (`jorref_jorrefcod` ASC),
  INDEX `fk_jornada_joresp1_idx` (`joresp_jorespcod` ASC),
  INDEX `fk_jornada_cidade1_idx` (`cidade_cidcod` ASC),
  INDEX `fk_jornada_veiculo1_idx` (`veiculo_veicod` ASC),
  CONSTRAINT `fk_jornada_motorista1`
    FOREIGN KEY (`motorista_motcod`)
    REFERENCES `controledeestoque`.`motorista` (`motcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jornada_usuario1`
    FOREIGN KEY (`usuario_usucod`)
    REFERENCES `controledeestoque`.`usuario` (`usucod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jornada_jorinter1`
    FOREIGN KEY (`jorinter_jorintercod`)
    REFERENCES `controledeestoque`.`jorinter` (`jorintercod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jornada_jorref1`
    FOREIGN KEY (`jorref_jorrefcod`)
    REFERENCES `controledeestoque`.`jorref` (`jorrefcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jornada_joresp1`
    FOREIGN KEY (`joresp_jorespcod`)
    REFERENCES `controledeestoque`.`joresp` (`jorespcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jornada_cidade1`
    FOREIGN KEY (`cidade_cidcod`)
    REFERENCES `controledeestoque`.`cidade` (`cidcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jornada_veiculo1`
    FOREIGN KEY (`veiculo_veicod`)
    REFERENCES `controledeestoque`.`veiculo` (`veicod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledeestoque`.`regrasjornada`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledeestoque`.`regrasjornada` ;

CREATE TABLE IF NOT EXISTS `controledeestoque`.`regrasjornada` (
  `rjocod` INT NOT NULL,
  `rjotrabinint` VARCHAR(45) NULL,
  `rjodesc` VARCHAR(45) NULL,
  `rjodescinint` VARCHAR(45) NULL,
  `rjorefeicao` VARCHAR(45) NULL,
  `rjomaxdia` VARCHAR(45) NULL,
  `rjoextra` VARCHAR(45) NULL,
  `rjoesprep` VARCHAR(45) NULL,
  `rjodescinter` VARCHAR(45) NULL,
  `tpveiculo_tpvcod` INT NOT NULL,
  `jornada_jorcod` INT NOT NULL,
  PRIMARY KEY (`rjocod`),
  INDEX `fk_regrasjornada_tpveiculo1_idx` (`tpveiculo_tpvcod` ASC),
  INDEX `fk_regrasjornada_jornada1_idx` (`jornada_jorcod` ASC),
  CONSTRAINT `fk_regrasjornada_tpveiculo1`
    FOREIGN KEY (`tpveiculo_tpvcod`)
    REFERENCES `controledeestoque`.`tpveiculo` (`tpvcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_regrasjornada_jornada1`
    FOREIGN KEY (`jornada_jorcod`)
    REFERENCES `controledeestoque`.`jornada` (`jorcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
