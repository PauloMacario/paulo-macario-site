/* -- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema routine_tasks
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema routine_tasks
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `routine_tasks` DEFAULT CHARACTER SET latin1 ;
USE `routine_tasks` ;

-- -----------------------------------------------------
-- Table `routine_tasks`.`categories`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `routine_tasks`.`categories` (
  `id` INT(11) NOT NULL,
  `description` VARCHAR(45) NOT NULL,
  `color` VARCHAR(7) NULL DEFAULT '#000000',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `routine_tasks`.`markets`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `routine_tasks`.`markets` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) NOT NULL,
  `color` VARCHAR(7) NOT NULL,
  `img_name` VARCHAR(64) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `routine_tasks`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `routine_tasks`.`products` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categories_id` INT(11) NOT NULL,
  `item` VARCHAR(64) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_products_categories1_idx` (`categories_id` ASC) ,
  CONSTRAINT `fk_products_categories1`
    FOREIGN KEY (`categories_id`)
    REFERENCES `routine_tasks`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 32
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- -----------------------------------------------------
-- Table `routine_tasks`.`market_products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `routine_tasks`.`market_products` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `market_id` BIGINT(20) UNSIGNED NOT NULL,
  `product_id` BIGINT(20) UNSIGNED NOT NULL,
  `price` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `quantity` INT(11) NOT NULL DEFAULT '1',
  `total` DECIMAL(10,2) NOT NULL DEFAULT '0.00',
  `buy` ENUM('S', 'N') NOT NULL DEFAULT 'N',
  `checked` ENUM('1', '0') NOT NULL DEFAULT '0',
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `market_products_market_id_foreign` (`market_id` ASC) ,
  INDEX `market_products_product_id_foreign` (`product_id` ASC) ,
  CONSTRAINT `market_products_market_id_foreign`
    FOREIGN KEY (`market_id`)
    REFERENCES `routine_tasks`.`markets` (`id`),
  CONSTRAINT `market_products_product_id_foreign`
    FOREIGN KEY (`product_id`)
    REFERENCES `routine_tasks`.`products` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
 */


 /*
 
DB_APPINVEST_HOST
DB_APPINVEST_PORT
DB_APPINVEST_DATABASE
DB_APPINVEST_USERNAME
DB_APPINVEST_PASSWORD
DB_APPINVEST_SOCKET

CREATE TABLE `type_investments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `acronym` varchar(5) NOT NULL,
  `color` varchar(7) NOT NULL,
  `order` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `investments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_investment_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `color` varchar(7) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_investment_type_investment1_idx` (`type_investment_id`),
  CONSTRAINT `fk_investment_type_investment1` FOREIGN KEY (`type_investment_id`) REFERENCES `type_investments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `negotiations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `investment_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `type_negotiation` enum('C','V') NOT NULL COMMENT 'C-> compra | V-> Venda',
  `quantity` decimal(10,2) DEFAULT NULL,
  `value` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_negotiation_investment_idx` (`investment_id`),
  CONSTRAINT `fk_negotiation_investment` FOREIGN KEY (`investment_id`) REFERENCES `investments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
 */