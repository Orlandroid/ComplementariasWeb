-- MySQL Script generated by MySQL Workbench
-- Sun Feb 14 17:52:42 2021
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema complementarias2
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema complementarias2
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `complementarias2` DEFAULT CHARACTER SET utf8 ;
USE `complementarias2` ;

-- -----------------------------------------------------
-- Table `complementarias2`.`carrera`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `complementarias2`.`carrera` (
  `idcarrera` INT(11) NOT NULL AUTO_INCREMENT,
  `carrera` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idcarrera`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `complementarias2`.`instructor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `complementarias2`.`instructor` (
  `idinstructor` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `sexo` VARCHAR(45) NOT NULL,
  `a_paterno` VARCHAR(45) NOT NULL,
  `a_materno` VARCHAR(45) NOT NULL,
  `activo` TINYINT(1) NOT NULL DEFAULT '1',
  `idcarrera` INT(11) NOT NULL,
  PRIMARY KEY (`idinstructor`),
  INDEX `fkry_instructor_semestre_idx` (`idcarrera` ASC) VISIBLE,
  CONSTRAINT `fkey_instructor_carrera`
    FOREIGN KEY (`idcarrera`)
    REFERENCES `complementarias2`.`carrera` (`idcarrera`))
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `complementarias2`.`actividad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `complementarias2`.`actividad` (
  `idactividad` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(1000) NOT NULL,
  `imagen` VARCHAR(2000) NULL,
  `cupo_limite` INT(11) NOT NULL,
  `fecha` DATE NOT NULL,
  `activo` TINYINT(1) NOT NULL DEFAULT '1',
  `id_instructor` INT(11) NOT NULL,
  PRIMARY KEY (`idactividad`),
  INDEX `fkey_activida_instructor_idx` (`id_instructor` ASC) VISIBLE,
  CONSTRAINT `fkey_activida_instructor`
    FOREIGN KEY (`id_instructor`)
    REFERENCES `complementarias2`.`instructor` (`idinstructor`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `complementarias2`.`alumnos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `complementarias2`.`alumnos` (
  `idalumnos` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `sexo` VARCHAR(20) NOT NULL,
  `apellido_materno` VARCHAR(45) NOT NULL,
  `apellido_paterno` VARCHAR(45) NOT NULL,
  `numero_control` VARCHAR(45) NOT NULL,
  `activo` TINYINT(1) NOT NULL DEFAULT '1',
  `id_carrera` INT(11) NOT NULL,
  PRIMARY KEY (`idalumnos`),
  INDEX `fk_alumnos_carrera1_idx` (`id_carrera` ASC) VISIBLE,
  CONSTRAINT `fk_alumnos_carrera1`
    FOREIGN KEY (`id_carrera`)
    REFERENCES `complementarias2`.`carrera` (`idcarrera`))
ENGINE = InnoDB
AUTO_INCREMENT = 25
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `complementarias2`.`historial_actividades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `complementarias2`.`historial_actividades` (
  `idcredito` INT(11) NOT NULL AUTO_INCREMENT,
  `credito` TINYINT(4) NOT NULL,
  `fecha_reguistro` DATE NOT NULL,
  `acreditado` TINYINT(4) NOT NULL DEFAULT 0,
  `semestre` VARCHAR(45) NOT NULL,
  `id_alumno` INT(11) NOT NULL,
  `id_actividad` INT(11) NOT NULL,
  PRIMARY KEY (`idcredito`),
  INDEX `fkey_credito_alumnos_idx` (`id_alumno` ASC) VISIBLE,
  INDEX `fkey_credito_actividad_idx` (`id_actividad` ASC) VISIBLE,
  CONSTRAINT `fkey_credito_actividad`
    FOREIGN KEY (`id_actividad`)
    REFERENCES `complementarias2`.`actividad` (`idactividad`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fkey_credito_alumnos`
    FOREIGN KEY (`id_alumno`)
    REFERENCES `complementarias2`.`alumnos` (`idalumnos`))
ENGINE = InnoDB
AUTO_INCREMENT = 10
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `complementarias2`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `complementarias2`.`usuarios` (
  `idusuarios` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(45) NOT NULL,
  `contraseña` VARCHAR(45) NOT NULL,
  `tipo` VARCHAR(45) NOT NULL,
  `activo` TINYINT(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idusuarios`),
  UNIQUE INDEX `usuario_UNIQUE` (`usuario` ASC) VISIBLE,
  UNIQUE INDEX `contraseña_UNIQUE` (`contraseña` ASC) VISIBLE)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
