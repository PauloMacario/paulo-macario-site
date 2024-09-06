-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema app_invest
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema app_invest
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `app_invest` DEFAULT CHARACTER SET utf8 ;
USE `app_invest` ;

-- -----------------------------------------------------
-- Table `app_invest`.`types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_invest`.`types` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(128) NULL,
  `color` VARCHAR(7) NULL DEFAULT '#000000',
  `order` INT NULL DEFAULT 99,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `app_invest`.`investiments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_invest`.`investiments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `types_id` INT NOT NULL,
  `name` VARCHAR(128) NOT NULL,
  `color` VARCHAR(7) NOT NULL DEFAULT '#000000',
  `order` INT NULL DEFAULT 99,
  PRIMARY KEY (`id`),
  INDEX `fk_investiments_types1_idx` (`types_id` ASC) VISIBLE,
  CONSTRAINT `fk_investiments_types1`
    FOREIGN KEY (`types_id`)
    REFERENCES `app_invest`.`types` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `app_invest`.`negotiations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `app_invest`.`negotiations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `investiments_id` INT NOT NULL,
  `date` DATE NOT NULL,
  `type` ENUM('B', 'S') NOT NULL COMMENT 'B-> buy | S-> sale',
  `value` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_negotiations_investiments_idx` (`investiments_id` ASC) VISIBLE,
  CONSTRAINT `fk_negotiations_investiments`
    FOREIGN KEY (`investiments_id`)
    REFERENCES `app_invest`.`investiments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
