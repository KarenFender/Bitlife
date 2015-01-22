SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `bitlife` DEFAULT CHARACTER SET utf8 ;
USE `bitlife` ;

-- -----------------------------------------------------
-- Table `bitlife`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bitlife`.`Usuario` (
  `Curp` VARCHAR(18) NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `ApPat` VARCHAR(45) NOT NULL,
  `ApMat` VARCHAR(45) NOT NULL,
  `Correo` VARCHAR(45) NOT NULL,
  `Password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Curp`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bitlife`.`Consulta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bitlife`.`Consulta` (
  `idConsulta` INT NOT NULL,
  `General` VARCHAR(45) NOT NULL,
  `Odontologia` VARCHAR(45) NOT NULL,
  `Certificado` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idConsulta`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bitlife`.`Doctor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bitlife`.`Doctor` (
  `CedPro` INT NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Especialidad` VARCHAR(45) NOT NULL,
  `Horario` TIME NOT NULL,
  `Consulta_idConsulta` INT NOT NULL,
  PRIMARY KEY (`CedPro`),
  INDEX `fk_Doctor_Consulta1_idx` (`Consulta_idConsulta` ASC),
  CONSTRAINT `fk_Doctor_Consulta1`
    FOREIGN KEY (`Consulta_idConsulta`)
    REFERENCES `bitlife`.`Consulta` (`idConsulta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bitlife`.`Analisis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bitlife`.`Analisis` (
  `idAnalisis` INT NOT NULL,
  `RayosX` VARCHAR(45) NOT NULL,
  `Sangre` VARCHAR(45) NOT NULL,
  `Electro` VARCHAR(45) NOT NULL,
  `Orina` VARCHAR(45) NOT NULL,
  `Analisiscol` VARCHAR(45) NULL,
  PRIMARY KEY (`idAnalisis`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bitlife`.`Laboratorista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bitlife`.`Laboratorista` (
  `idLaboratorista` INT NOT NULL,
  `Nombre` VARCHAR(45) NOT NULL,
  `Horario` TIME NOT NULL,
  `Fecha` DATE NOT NULL,
  `Analisis_idAnalisis` INT NOT NULL,
  PRIMARY KEY (`idLaboratorista`),
  INDEX `fk_Laboratorista_Analisis1_idx` (`Analisis_idAnalisis` ASC),
  CONSTRAINT `fk_Laboratorista_Analisis1`
    FOREIGN KEY (`Analisis_idAnalisis`)
    REFERENCES `bitlife`.`Analisis` (`idAnalisis`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bitlife`.`Cita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bitlife`.`Cita` (
  `idCita` INT NOT NULL,
  `Doctor` VARCHAR(45) NOT NULL,
  `Hora` TIME NOT NULL,
  `Usuario` VARCHAR(45) NOT NULL,
  `Fecha` DATE NOT NULL,
  `Servicio` VARCHAR(45) NOT NULL,
  `Doctor_CedPro` INT NOT NULL,
  `Usuario_Curp` VARCHAR(18) NOT NULL,
  PRIMARY KEY (`idCita`, `Doctor_CedPro`, `Usuario_Curp`),
  INDEX `fk_Cita_Doctor1_idx` (`Doctor_CedPro` ASC),
  INDEX `fk_Cita_Usuario1_idx` (`Usuario_Curp` ASC),
  CONSTRAINT `fk_Cita_Doctor1`
    FOREIGN KEY (`Doctor_CedPro`)
    REFERENCES `bitlife`.`Doctor` (`CedPro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Cita_Usuario1`
    FOREIGN KEY (`Usuario_Curp`)
    REFERENCES `bitlife`.`Usuario` (`Curp`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bitlife`.`Doctor_has_Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bitlife`.`Doctor_has_Usuario` (
  `Doctor_CedPro` INT NOT NULL,
  `Usuario_Curp` VARCHAR(18) NOT NULL,
  PRIMARY KEY (`Doctor_CedPro`, `Usuario_Curp`),
  INDEX `fk_Doctor_has_Usuario_Usuario1_idx` (`Usuario_Curp` ASC),
  INDEX `fk_Doctor_has_Usuario_Doctor_idx` (`Doctor_CedPro` ASC),
  CONSTRAINT `fk_Doctor_has_Usuario_Doctor`
    FOREIGN KEY (`Doctor_CedPro`)
    REFERENCES `bitlife`.`Doctor` (`CedPro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Doctor_has_Usuario_Usuario1`
    FOREIGN KEY (`Usuario_Curp`)
    REFERENCES `bitlife`.`Usuario` (`Curp`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bitlife`.`Usuario_has_Laboratorista`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bitlife`.`Usuario_has_Laboratorista` (
  `Usuario_Curp` VARCHAR(18) NOT NULL,
  `Laboratorista_idLaboratorista` INT NOT NULL,
  PRIMARY KEY (`Usuario_Curp`, `Laboratorista_idLaboratorista`),
  INDEX `fk_Usuario_has_Laboratorista_Laboratorista1_idx` (`Laboratorista_idLaboratorista` ASC),
  INDEX `fk_Usuario_has_Laboratorista_Usuario1_idx` (`Usuario_Curp` ASC),
  CONSTRAINT `fk_Usuario_has_Laboratorista_Usuario1`
    FOREIGN KEY (`Usuario_Curp`)
    REFERENCES `bitlife`.`Usuario` (`Curp`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Laboratorista_Laboratorista1`
    FOREIGN KEY (`Laboratorista_idLaboratorista`)
    REFERENCES `bitlife`.`Laboratorista` (`idLaboratorista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bitlife`.`CitaLab`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bitlife`.`CitaLab` (
  `idCitaLab` INT NOT NULL,
  `Laboratorista` VARCHAR(45) NOT NULL,
  `HoraIn` TIME NOT NULL,
  `HoraOut` TIME NOT NULL,
  `Usuario` VARCHAR(45) NOT NULL,
  `Fecha` DATE NOT NULL,
  `Servicio` VARCHAR(45) NOT NULL,
  `Laboratorista_idLaboratorista` INT NOT NULL,
  `Usuario_Curp` VARCHAR(18) NOT NULL,
  PRIMARY KEY (`idCitaLab`, `Laboratorista_idLaboratorista`, `Usuario_Curp`),
  INDEX `fk_CitaLab_Laboratorista1_idx` (`Laboratorista_idLaboratorista` ASC),
  INDEX `fk_CitaLab_Usuario1_idx` (`Usuario_Curp` ASC),
  CONSTRAINT `fk_CitaLab_Laboratorista1`
    FOREIGN KEY (`Laboratorista_idLaboratorista`)
    REFERENCES `bitlife`.`Laboratorista` (`idLaboratorista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_CitaLab_Usuario1`
    FOREIGN KEY (`Usuario_Curp`)
    REFERENCES `bitlife`.`Usuario` (`Curp`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
