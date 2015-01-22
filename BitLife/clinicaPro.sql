SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Cita`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Cita` (
  `idCita` INT NOT NULL ,
  `Doctor` VARCHAR(45) NOT NULL ,
  `Hora` TIME NOT NULL ,
  `Usuario` VARCHAR(45) NOT NULL ,
  `Fecha` DATE NOT NULL ,
  `Servicio` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idCita`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Usuario` (
  `Curp` INT NOT NULL ,
  `Nombre` VARCHAR(45) NOT NULL ,
  `ApPat` VARCHAR(45) NOT NULL ,
  `ApMat` VARCHAR(45) NOT NULL ,
  `Correo` VARCHAR(45) NOT NULL ,
  `Password` VARCHAR(45) NOT NULL ,
  `Cita_idCita` INT NOT NULL ,
  PRIMARY KEY (`Curp`) ,
  INDEX `fk_Usuario_Cita1_idx` (`Cita_idCita` ASC) ,
  CONSTRAINT `fk_Usuario_Cita1`
    FOREIGN KEY (`Cita_idCita` )
    REFERENCES `mydb`.`Cita` (`idCita` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Consulta`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Consulta` (
  `idConsulta` INT NOT NULL ,
  `General` VARCHAR(45) NOT NULL ,
  `Odontologia` VARCHAR(45) NOT NULL ,
  `Certificado` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`idConsulta`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Doctor`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Doctor` (
  `CedPro` INT NOT NULL ,
  `Nombre` VARCHAR(45) NOT NULL ,
  `Especialidad` VARCHAR(45) NOT NULL ,
  `Horario` TIME NOT NULL ,
  `Consulta_idConsulta` INT NOT NULL ,
  PRIMARY KEY (`CedPro`) ,
  INDEX `fk_Doctor_Consulta1_idx` (`Consulta_idConsulta` ASC) ,
  CONSTRAINT `fk_Doctor_Consulta1`
    FOREIGN KEY (`Consulta_idConsulta` )
    REFERENCES `mydb`.`Consulta` (`idConsulta` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Analisis`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Analisis` (
  `idAnalisis` INT NOT NULL ,
  `RayosX` VARCHAR(45) NOT NULL ,
  `Sangre` VARCHAR(45) NOT NULL ,
  `Electro` VARCHAR(45) NOT NULL ,
  `Orina` VARCHAR(45) NOT NULL ,
  `Analisiscol` VARCHAR(45) NULL ,
  PRIMARY KEY (`idAnalisis`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Laboratorista`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Laboratorista` (
  `idLaboratorista` INT NOT NULL ,
  `Nombre` VARCHAR(45) NOT NULL ,
  `Horario` TIME NOT NULL ,
  `Fecha` DATE NOT NULL ,
  `Analisis_idAnalisis` INT NOT NULL ,
  PRIMARY KEY (`idLaboratorista`) ,
  INDEX `fk_Laboratorista_Analisis1_idx` (`Analisis_idAnalisis` ASC) ,
  CONSTRAINT `fk_Laboratorista_Analisis1`
    FOREIGN KEY (`Analisis_idAnalisis` )
    REFERENCES `mydb`.`Analisis` (`idAnalisis` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Doctor_has_Usuario`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Doctor_has_Usuario` (
  `Doctor_CedPro` INT NOT NULL ,
  `Usuario_Curp` INT NOT NULL ,
  PRIMARY KEY (`Doctor_CedPro`, `Usuario_Curp`) ,
  INDEX `fk_Doctor_has_Usuario_Usuario1_idx` (`Usuario_Curp` ASC) ,
  INDEX `fk_Doctor_has_Usuario_Doctor_idx` (`Doctor_CedPro` ASC) ,
  CONSTRAINT `fk_Doctor_has_Usuario_Doctor`
    FOREIGN KEY (`Doctor_CedPro` )
    REFERENCES `mydb`.`Doctor` (`CedPro` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Doctor_has_Usuario_Usuario1`
    FOREIGN KEY (`Usuario_Curp` )
    REFERENCES `mydb`.`Usuario` (`Curp` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuario_has_Laboratorista`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`Usuario_has_Laboratorista` (
  `Usuario_Curp` INT NOT NULL ,
  `Laboratorista_idLaboratorista` INT NOT NULL ,
  PRIMARY KEY (`Usuario_Curp`, `Laboratorista_idLaboratorista`) ,
  INDEX `fk_Usuario_has_Laboratorista_Laboratorista1_idx` (`Laboratorista_idLaboratorista` ASC) ,
  INDEX `fk_Usuario_has_Laboratorista_Usuario1_idx` (`Usuario_Curp` ASC) ,
  CONSTRAINT `fk_Usuario_has_Laboratorista_Usuario1`
    FOREIGN KEY (`Usuario_Curp` )
    REFERENCES `mydb`.`Usuario` (`Curp` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_has_Laboratorista_Laboratorista1`
    FOREIGN KEY (`Laboratorista_idLaboratorista` )
    REFERENCES `mydb`.`Laboratorista` (`idLaboratorista` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `mydb` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
