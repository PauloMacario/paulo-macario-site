-- -----------------------------------------------------
-- Table `control_finance`.`type_investments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_finance`.`type_investments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(128) NOT NULL,
  `color` VARCHAR(7) NOT NULL,
  `order` VARCHAR(128) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `control_finance`.`investments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_finance`.`investments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type_investment_id` INT NOT NULL,
  `name` VARCHAR(128) NOT NULL,
  `color` VARCHAR(7) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_investment_type_investment1_idx` (`type_investment_id` ASC) ,
  CONSTRAINT `fk_investment_type_investment1`
    FOREIGN KEY (`type_investment_id`)
    REFERENCES `control_finance`.`type_investments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `control_finance`.`negotiations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_finance`.`negotiations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `investment_id` INT NOT NULL,
  `date` DATE NOT NULL,
  `type_negotiation` ENUM('B', 'S') NOT NULL COMMENT 'b-> buy | S-> sale',
  `quantity` DECIMAL(10,2) NULL DEFAULT NULL,
  `value` DECIMAL(10,2) NOT NULL,
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_negotiation_investment_idx` (`investment_id` ASC) ,
  CONSTRAINT `fk_negotiation_investment`
    FOREIGN KEY (`investment_id`)
    REFERENCES `control_finance`.`investments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
