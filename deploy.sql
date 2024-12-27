
CREATE DATABASE `routine_tasks`;

USE `routine_tasks` ;


CREATE TABLE IF NOT EXISTS `shopping_lists` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `image` VARCHAR(256) NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(45) NOT NULL,
  `color` VARCHAR(7) NULL DEFAULT '#000000',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `markets` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(64) NOT NULL,
  `color` VARCHAR(7) NOT NULL,
  `img_name` VARCHAR(64) NULL DEFAULT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE IF NOT EXISTS `products` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` BIGINT(20) UNSIGNED NOT NULL,
  `item` VARCHAR(64) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_products_categories1_idx` (`category_id` ASC) ,  
  CONSTRAINT `products_category_id`
    FOREIGN KEY (`category_id`)
    REFERENCES `routine_tasks`.`categories` (`id`)
);

CREATE TABLE IF NOT EXISTS `routine_tasks`.`market_products` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `shopping_list_id` BIGINT(20) UNSIGNED NOT NULL,
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
  INDEX `market_products_market_id_foreign` (`market_id` ASC),
  INDEX `market_products_product_id_foreign` (`product_id` ASC),
  INDEX `market_products_shopping_list_id_foreign` (`shopping_list_id` ASC),  
  CONSTRAINT `market_products_market_id_foreign`
    FOREIGN KEY (`market_id`)
    REFERENCES `routine_tasks`.`markets` (`id`),
  CONSTRAINT `market_products_product_id_foreign`
    FOREIGN KEY (`product_id`)
    REFERENCES `routine_tasks`.`products` (`id`),
  CONSTRAINT `market_products_shopping_list_id_foreign`
    FOREIGN KEY (`shopping_list_id`)
    REFERENCES `routine_tasks`.`shopping_lists` (`id`)
);

