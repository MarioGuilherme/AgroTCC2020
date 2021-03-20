-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema sistema_agro_peps
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sistema_agro_peps
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sistema_agro_peps` DEFAULT CHARACTER SET utf8 ;
USE `sistema_agro_peps` ;

-- -----------------------------------------------------
-- Table `sistema_agro_peps`.`masters`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_agro_peps`.`masters` (
  `id_master` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_master`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_agro_peps`.`racao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_agro_peps`.`racao` (
  `id_racao` INT NOT NULL AUTO_INCREMENT,
  `quantidadeKG` INT(11) NOT NULL,
  `pacotes` INT(11) NOT NULL,
  PRIMARY KEY (`id_racao`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_agro_peps`.`alunos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_agro_peps`.`alunos` (
  `id_aluno` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(80) NOT NULL,
  `rm` INT(5) NOT NULL,
  `senha` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id_aluno`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_agro_peps`.`entradas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_agro_peps`.`entradas` (
  `id_entrada` INT NOT NULL AUTO_INCREMENT,
  `responsavel` VARCHAR(50) NOT NULL,
  `data_entrada` DATE NOT NULL,
  `quantidade` INT(11) NOT NULL,
  `custo` INT(11) NOT NULL,
  `pacotes` INT(11) NOT NULL,
  PRIMARY KEY (`id_entrada`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_agro_peps`.`saidas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_agro_peps`.`saidas` (
  `id_saida` INT NOT NULL AUTO_INCREMENT,
  `responsavel` VARCHAR(50) NOT NULL,
  `data_saida` DATE NOT NULL,
  `quantidade` INT(11) NOT NULL,
  `pacotes` INT(11) NOT NULL,
  PRIMARY KEY (`id_saida`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;