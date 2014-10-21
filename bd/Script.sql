SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`tbl_usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tbl_usuario` (
  `idtbl_usuario` INT NOT NULL ,
  `nome` VARCHAR(45) NULL ,
  `senha` VARCHAR(20) NULL ,
  `email` VARCHAR(45) NULL ,
  `foto` VARCHAR(45) NULL ,
  `sexo` VARCHAR(45) NULL ,
  `cidade` VARCHAR(45) NULL ,
  `estado` VARCHAR(45) NULL ,
  `endereco` VARCHAR(45) NULL ,
  `cep` VARCHAR(45) NULL ,
  PRIMARY KEY (`idtbl_usuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tbl_artigo`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tbl_artigo` (
  `idtbl_artigo` INT NOT NULL ,
  `titulo` VARCHAR(45) NULL ,
  `corpo` TEXT NULL ,
  `data` DATETIME NULL ,
  `idusuario` INT NOT NULL ,
  PRIMARY KEY (`idtbl_artigo`) ,
  INDEX `fk_tbl_artigo_tbl_usuario1` (`idusuario` ASC) ,
  CONSTRAINT `fk_tbl_artigo_tbl_usuario1`
    FOREIGN KEY (`idusuario` )
    REFERENCES `mydb`.`tbl_usuario` (`idtbl_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tbl_fotos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tbl_fotos` (
  `idtbl_fotos` INT NOT NULL ,
  `foto` VARCHAR(45) NULL ,
  `idartigo` INT NOT NULL ,
  PRIMARY KEY (`idtbl_fotos`) ,
  INDEX `fk_tbl_fotos_tbl_artigo1` (`idartigo` ASC) ,
  CONSTRAINT `fk_tbl_fotos_tbl_artigo1`
    FOREIGN KEY (`idartigo` )
    REFERENCES `mydb`.`tbl_artigo` (`idtbl_artigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tbl_categorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tbl_categorias` (
  `idtbl_categorias` INT NOT NULL ,
  `categoria` VARCHAR(45) NULL ,
  `descricao` VARCHAR(100) NULL ,
  PRIMARY KEY (`idtbl_categorias`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`artigo_has_categoria`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`artigo_has_categoria` (
  `tbl_artigo_idtbl_artigo` INT NOT NULL ,
  `tbl_categorias_idtbl_categorias` INT NOT NULL ,
  PRIMARY KEY (`tbl_artigo_idtbl_artigo`, `tbl_categorias_idtbl_categorias`) ,
  INDEX `fk_tbl_artigo_has_tbl_categorias_tbl_categorias1` (`tbl_categorias_idtbl_categorias` ASC) ,
  INDEX `fk_tbl_artigo_has_tbl_categorias_tbl_artigo1` (`tbl_artigo_idtbl_artigo` ASC) ,
  CONSTRAINT `fk_tbl_artigo_has_tbl_categorias_tbl_artigo1`
    FOREIGN KEY (`tbl_artigo_idtbl_artigo` )
    REFERENCES `mydb`.`tbl_artigo` (`idtbl_artigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_artigo_has_tbl_categorias_tbl_categorias1`
    FOREIGN KEY (`tbl_categorias_idtbl_categorias` )
    REFERENCES `mydb`.`tbl_categorias` (`idtbl_categorias` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tbl_comentario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`tbl_comentario` (
  `idusuario` INT NOT NULL ,
  `idartigo` INT NOT NULL ,
  `corpo` VARCHAR(200) NULL ,
  `data` DATETIME NULL ,
  INDEX `fk_tbl_usuario_has_tbl_artigo_tbl_artigo1` (`idartigo` ASC) ,
  INDEX `fk_tbl_usuario_has_tbl_artigo_tbl_usuario1` (`idusuario` ASC) ,
  CONSTRAINT `fk_tbl_usuario_has_tbl_artigo_tbl_usuario1`
    FOREIGN KEY (`idusuario` )
    REFERENCES `mydb`.`tbl_usuario` (`idtbl_usuario` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tbl_usuario_has_tbl_artigo_tbl_artigo1`
    FOREIGN KEY (`idartigo` )
    REFERENCES `mydb`.`tbl_artigo` (`idtbl_artigo` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
