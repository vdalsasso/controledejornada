-- MySQL Script generated by MySQL Workbench
-- Wed Sep 16 15:55:57 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema controledejornada
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema controledejornada
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `controledejornada` DEFAULT CHARACTER SET utf8 ;
USE `controledejornada` ;

-- -----------------------------------------------------
-- Table `controledejornada`.`escopo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledejornada`.`escopo` ;

CREATE TABLE IF NOT EXISTS `controledejornada`.`escopo` (
  `esccod` INT NOT NULL AUTO_INCREMENT,
  `escnome` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`esccod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledejornada`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledejornada`.`usuario` ;

CREATE TABLE IF NOT EXISTS `controledejornada`.`usuario` (
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
    REFERENCES `controledejornada`.`escopo` (`esccod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledejornada`.`motorista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledejornada`.`motorista` ;

CREATE TABLE IF NOT EXISTS `controledejornada`.`motorista` (
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
-- Table `controledejornada`.`jorinter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledejornada`.`jorinter` ;

CREATE TABLE IF NOT EXISTS `controledejornada`.`jorinter` (
  `jorintercod` INT NOT NULL AUTO_INCREMENT,
  `jorinterinicial` DATETIME NULL,
  `jorinterfinal` DATETIME NULL,
  PRIMARY KEY (`jorintercod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledejornada`.`jorref`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledejornada`.`jorref` ;

CREATE TABLE IF NOT EXISTS `controledejornada`.`jorref` (
  `jorrefcod` INT NOT NULL AUTO_INCREMENT,
  `jorrefinicial` DATETIME NULL,
  `jorreffinal` DATETIME NULL,
  PRIMARY KEY (`jorrefcod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledejornada`.`joresp`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledejornada`.`joresp` ;

CREATE TABLE IF NOT EXISTS `controledejornada`.`joresp` (
  `jorespcod` INT NOT NULL AUTO_INCREMENT,
  `jorespinicial` DATETIME NULL,
  `jorespfinal` DATETIME NULL,
  PRIMARY KEY (`jorespcod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledejornada`.`estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledejornada`.`estado` ;

CREATE TABLE IF NOT EXISTS `controledejornada`.`estado` (
  `estcod` INT NOT NULL AUTO_INCREMENT,
  `estnome` VARCHAR(50) NOT NULL,
  `estsigla` VARCHAR(2) NOT NULL,
  PRIMARY KEY (`estcod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledejornada`.`cidade`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledejornada`.`cidade` ;

CREATE TABLE IF NOT EXISTS `controledejornada`.`cidade` (
  `cidcod` INT NOT NULL AUTO_INCREMENT,
  `cidnome` VARCHAR(50) NOT NULL,
  `estado_estcod` INT NOT NULL,
  PRIMARY KEY (`cidcod`),
  INDEX `fk_cidade_estado1_idx` (`estado_estcod` ASC),
  CONSTRAINT `fk_cidade_estado1`
    FOREIGN KEY (`estado_estcod`)
    REFERENCES `controledejornada`.`estado` (`estcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledejornada`.`tpveiculo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledejornada`.`tpveiculo` ;

CREATE TABLE IF NOT EXISTS `controledejornada`.`tpveiculo` (
  `tpvcod` INT NOT NULL,
  `tpvnome` VARCHAR(45) NULL,
  PRIMARY KEY (`tpvcod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledejornada`.`veiculo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledejornada`.`veiculo` ;

CREATE TABLE IF NOT EXISTS `controledejornada`.`veiculo` (
  `veicod` INT NOT NULL AUTO_INCREMENT,
  `veiplaca` VARCHAR(10) NULL,
  `veiano` VARCHAR(45) NULL,
  `veimodelo` VARCHAR(45) NULL,
  `tpveiculo_tpvcod` INT NOT NULL,
  PRIMARY KEY (`veicod`),
  INDEX `fk_veiculo_tpveiculo1_idx` (`tpveiculo_tpvcod` ASC),
  CONSTRAINT `fk_veiculo_tpveiculo1`
    FOREIGN KEY (`tpveiculo_tpvcod`)
    REFERENCES `controledejornada`.`tpveiculo` (`tpvcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledejornada`.`jornada`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledejornada`.`jornada` ;

CREATE TABLE IF NOT EXISTS `controledejornada`.`jornada` (
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
    REFERENCES `controledejornada`.`motorista` (`motcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jornada_usuario1`
    FOREIGN KEY (`usuario_usucod`)
    REFERENCES `controledejornada`.`usuario` (`usucod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jornada_jorinter1`
    FOREIGN KEY (`jorinter_jorintercod`)
    REFERENCES `controledejornada`.`jorinter` (`jorintercod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jornada_jorref1`
    FOREIGN KEY (`jorref_jorrefcod`)
    REFERENCES `controledejornada`.`jorref` (`jorrefcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jornada_joresp1`
    FOREIGN KEY (`joresp_jorespcod`)
    REFERENCES `controledejornada`.`joresp` (`jorespcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jornada_cidade1`
    FOREIGN KEY (`cidade_cidcod`)
    REFERENCES `controledejornada`.`cidade` (`cidcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_jornada_veiculo1`
    FOREIGN KEY (`veiculo_veicod`)
    REFERENCES `controledejornada`.`veiculo` (`veicod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `controledejornada`.`regrasjornada`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `controledejornada`.`regrasjornada` ;

CREATE TABLE IF NOT EXISTS `controledejornada`.`regrasjornada` (
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
    REFERENCES `controledejornada`.`tpveiculo` (`tpvcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_regrasjornada_jornada1`
    FOREIGN KEY (`jornada_jorcod`)
    REFERENCES `controledejornada`.`jornada` (`jorcod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
