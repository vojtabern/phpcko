<?php 
$typy_produktu = 'CREATE TABLE IF NOT EXISTS `'.DBNAME.'`.`typy_produktu` (`idproduct` INT NOT NULL, `typ` ENUM("Turbodmychadla", "Čerpadla", "Vstřikovače") NOT NULL, PRIMARY KEY (`idproduct`)) ENGINE = InnoDB;';
$vyrobci = 'CREATE TABLE IF NOT EXISTS `'.DBNAME.'`.`vyrobci` (
    `idvyrobci` INT NOT NULL,
    `vyrobci` ENUM("Bosch", "Delphi", "Garte") NOT NULL,
    PRIMARY KEY (`idvyrobci`))
ENGINE = InnoDB;';
$produkty = "CREATE TABLE IF NOT EXISTS ".DBNAME.".`produkty` (
    `id_produktu` INT NOT NULL,
    `kod_produktu` VARCHAR(75) NOT NULL,
    `cena` DOUBLE UNSIGNED NOT NULL,
    `popis` TEXT(1000) NULL DEFAULT 'Popis není k dispozici',
    `product_idproduct` INT NOT NULL,
    `vyrobci_idvyrobci` INT NOT NULL,
    PRIMARY KEY (`id_produktu`, `product_idproduct`, `vyrobci_idvyrobci`),
    CONSTRAINT `fk_product_idproduct`
    FOREIGN KEY (`product_idproduct`)
    REFERENCES ".DBNAME.".`typy_produktu` (`idproduct`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_produkty_vyrobci1`
    FOREIGN KEY (`vyrobci_idvyrobci`)
    REFERENCES `".DBNAME."`.`vyrobci` (`idvyrobci`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;";
?>