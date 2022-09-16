-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema phpcko
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema phpcko
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `phpcko` DEFAULT CHARACTER SET utf8 ;
USE `phpcko` ;

-- -----------------------------------------------------
-- Table `phpcko`.`typy_produktu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phpcko`.`typy_produktu` (
  `idtypy_produktu` INT NOT NULL,
  `typ` ENUM("Turbodmychadla", "Čerpadla", "Vstřikovače") NOT NULL,
  PRIMARY KEY (`idtypy_produktu`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phpcko`.`vyrobci`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phpcko`.`vyrobci` (
  `idvyrobci` INT NOT NULL,
  `vyrobci` ENUM("Bosch", "Delphi", "Garte") NOT NULL,
  PRIMARY KEY (`idvyrobci`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `phpcko`.`produkty`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `phpcko`.`produkty` (
  `kod_produktu` VARCHAR(75) NOT NULL,
  `cena` DOUBLE UNSIGNED NOT NULL,
  `popis` TEXT(1000) NULL DEFAULT 'Popis není k dispozici',
  `obrazek` BLOB NOT NULL,
  `typy_produktu_idtypy_produktu` INT NOT NULL,
  `vyrobci_idvyrobci` INT NOT NULL,
  PRIMARY KEY (`kod_produktu`, `typy_produktu_idtypy_produktu`, `vyrobci_idvyrobci`),
  INDEX `popis` (`popis` ASC),
  INDEX `fk_produkty_typy_produktu_idx` (`typy_produktu_idtypy_produktu` ASC),
  INDEX `fk_produkty_vyrobci1_idx` (`vyrobci_idvyrobci` ASC),
  CONSTRAINT `fk_produkty_typy_produktu`
    FOREIGN KEY (`typy_produktu_idtypy_produktu`)
    REFERENCES `phpcko`.`typy_produktu` (`idtypy_produktu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produkty_vyrobci1`
    FOREIGN KEY (`vyrobci_idvyrobci`)
    REFERENCES `phpcko`.`vyrobci` (`idvyrobci`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
