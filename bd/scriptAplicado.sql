SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `sitap` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `sitap` ;

-- -----------------------------------------------------
-- Table `sitap`.`tbl_usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sitap`.`tbl_usuario` ;

CREATE  TABLE IF NOT EXISTS `sitap`.`tbl_usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT ,
  `nome` VARCHAR(45) NULL ,
  `senha` VARCHAR(20) NULL ,
  `email` VARCHAR(45) NULL ,
  `foto` VARCHAR(45) NULL ,
  `sexo` VARCHAR(45) NULL ,
  `cidade` VARCHAR(45) NULL ,
  `estado` VARCHAR(45) NULL ,
  `endereco` VARCHAR(45) NULL ,
  `cep` VARCHAR(45) NULL ,
  PRIMARY KEY (`idusuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`tbl_artigo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sitap`.`tbl_artigo` ;

CREATE  TABLE IF NOT EXISTS `sitap`.`tbl_artigo` (
  `idtbl_artigo` INT NOT NULL ,
  `titulo` VARCHAR(45) NULL ,
  `corpo` TEXT NULL ,
  `data` DATETIME NULL ,
  `idusuario` INT NOT NULL ,
  PRIMARY KEY (`idtbl_artigo`) ,
  INDEX `fk_tbl_artigo_tbl_usuario1` (`idusuario` ASC) ,
  CONSTRAINT `fk_tbl_artigo_tbl_usuario1`
    FOREIGN KEY (`idusuario` )
    REFERENCES `sitap`.`tbl_usuario` (`idusuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`tbl_fotos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sitap`.`tbl_fotos` ;

CREATE  TABLE IF NOT EXISTS `sitap`.`tbl_fotos` (
  `idtbl_fotos` INT NOT NULL ,
  `foto` VARCHAR(45) NULL ,
  `idartigo` INT NOT NULL ,
  PRIMARY KEY (`idtbl_fotos`) ,
  INDEX `fk_tbl_fotos_tbl_artigo1` (`idartigo` ASC) ,
  CONSTRAINT `fk_tbl_fotos_tbl_artigo1`
    FOREIGN KEY (`idartigo` )
    REFERENCES `sitap`.`tbl_artigo` (`idtbl_artigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`tbl_categorias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sitap`.`tbl_categorias` ;

CREATE  TABLE IF NOT EXISTS `sitap`.`tbl_categorias` (
  `idtbl_categorias` INT NOT NULL ,
  `categoria` VARCHAR(45) NULL ,
  `descricao` VARCHAR(100) NULL ,
  PRIMARY KEY (`idtbl_categorias`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`artigo_has_categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sitap`.`artigo_has_categoria` ;

CREATE  TABLE IF NOT EXISTS `sitap`.`artigo_has_categoria` (
  `tbl_artigo_idtbl_artigo` INT NOT NULL ,
  `tbl_categorias_idtbl_categorias` INT NOT NULL ,
  PRIMARY KEY (`tbl_artigo_idtbl_artigo`, `tbl_categorias_idtbl_categorias`) ,
  INDEX `fk_tbl_artigo_has_tbl_categorias_tbl_categorias1` (`tbl_categorias_idtbl_categorias` ASC) ,
  INDEX `fk_tbl_artigo_has_tbl_categorias_tbl_artigo1` (`tbl_artigo_idtbl_artigo` ASC) ,
  CONSTRAINT `fk_tbl_artigo_has_tbl_categorias_tbl_artigo1`
    FOREIGN KEY (`tbl_artigo_idtbl_artigo` )
    REFERENCES `sitap`.`tbl_artigo` (`idtbl_artigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_artigo_has_tbl_categorias_tbl_categorias1`
    FOREIGN KEY (`tbl_categorias_idtbl_categorias` )
    REFERENCES `sitap`.`tbl_categorias` (`idtbl_categorias` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sitap`.`tbl_comentario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sitap`.`tbl_comentario` ;

CREATE  TABLE IF NOT EXISTS `sitap`.`tbl_comentario` (
  `idusuario` INT NOT NULL ,
  `idartigo` INT NOT NULL ,
  `corpo` VARCHAR(200) NULL ,
  `data` DATETIME NULL ,
  INDEX `fk_tbl_usuario_has_tbl_artigo_tbl_artigo1` (`idartigo` ASC) ,
  INDEX `fk_tbl_usuario_has_tbl_artigo_tbl_usuario1` (`idusuario` ASC) ,
  CONSTRAINT `fk_tbl_usuario_has_tbl_artigo_tbl_usuario1`
    FOREIGN KEY (`idusuario` )
    REFERENCES `sitap`.`tbl_usuario` (`idusuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_usuario_has_tbl_artigo_tbl_artigo1`
    FOREIGN KEY (`idartigo` )
    REFERENCES `sitap`.`tbl_artigo` (`idtbl_artigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
