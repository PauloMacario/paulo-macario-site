ALTER TABLE `routine_tasks`.`market_products` ADD COLUMN `checked` ENUM('1', '0') NOT NULL DEFAULT '0' AFTER `buy`;

ALTER TABLE `routine_tasks`.`market_products` CHANGE COLUMN `price` `price` DECIMAL(10,2) NOT NULL DEFAULT '0.00' ;
