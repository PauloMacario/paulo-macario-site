-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_list
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_list
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_list` DEFAULT CHARACTER SET utf8 ;
USE `db_list` ;

-- -----------------------------------------------------
-- Table `db_list`.`list`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_list`.`list` (
  `id` BIGINT(20) NOT NULL,
  `name` VARCHAR(128) NULL,
  `active` ENUM('Y', 'N') NOT NULL DEFAULT 'Y',
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_list`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_list`.`categories` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_list`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_list`.`products` (
  `id` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `categories_id` BIGINT(20) NOT NULL,
  `name` VARCHAR(128) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_products_categories1_idx` (`categories_id` ASC),
  CONSTRAINT `fk_products_categories1`
    FOREIGN KEY (`categories_id`)
    REFERENCES `db_list`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_list`.`list_products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_list`.`list_products` (
  `list_id` BIGINT(20) NOT NULL,
  `products_id` BIGINT(20) NOT NULL,
  `included` ENUM('Y', 'N') NOT NULL DEFAULT 'Y',
  `purchased` ENUM('Y', 'N') NOT NULL DEFAULT 'N',
  `price` DECIMAL(10,2) NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  INDEX `fk_list_products_list1_idx` (`list_id` ASC),
  INDEX `fk_list_products_products1_idx` (`products_id` ASC),
  CONSTRAINT `fk_list_products_list1`
    FOREIGN KEY (`list_id`)
    REFERENCES `db_list`.`list` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_list_products_products1`
    FOREIGN KEY (`products_id`)
    REFERENCES `db_list`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;