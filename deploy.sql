
-- -----------------------------------------------------
-- Table `control_finance`.`investments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_finance`.`type_investments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(128) NULL,
  `color` VARCHAR(7) NULL DEFAULT '#000000',
  `order` INT NULL DEFAULT 99,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_finance`.`investments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_finance`.`investments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `type_investments_id` INT NOT NULL,
  `name` VARCHAR(128) NOT NULL,
  `color` VARCHAR(7) NOT NULL DEFAULT '#000000',
  `order` INT NULL DEFAULT 99,
  PRIMARY KEY (`id`),
  INDEX `fk_investments_type_investments_idx` (`type_investments_id` ASC) VISIBLE,
  CONSTRAINT `fk_investments_type_investments`
    FOREIGN KEY (`type_investments_id`)
    REFERENCES `control_finance`.`type_investments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `control_finance`.`negotiations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `control_finance`.`negotiations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `investments_id` INT NOT NULL,
  `date` DATE NOT NULL,
  `type` ENUM('B', 'S') NOT NULL COMMENT 'B-> buy | S-> sale',
  `value` DECIMAL(10,2) NOT NULL,
 PRIMARY KEY (`id`),
  INDEX `fk_negotiations_investments1_idx` (`investments_id` ASC) VISIBLE,
  CONSTRAINT `fk_negotiations_investments1`
    FOREIGN KEY (`investments_id`)
    REFERENCES `control_finance`.`investments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


INSERT INTO `control_finance`.`type_investments` (`id`,`name`,`color`,`order`) VALUES (1,'Renda fixa ','#ededed',1);
INSERT INTO `control_finance`.`type_investments` (`id`,`name`,`color`,`order`) VALUES (2,'Renda Variável','#cdefaa',2);

INSERT INTO `control_finance`.`investments` (`id`,`type_investment_id`,`name`,`color`,`order`) VALUES (1,1,'CDB Banco Inter','#ababab',1);
INSERT INTO `control_finance`.`investments` (`id`,`type_investment_id`,`name`,`color`,`order`) VALUES (2,1,'Tesouro Selic','#d4d4d4',2);
INSERT INTO `control_finance`.`investments` (`id`,`type_investment_id`,`name`,`color`,`order`) VALUES (3,2,'FIIS -  HGLG','#cfcfcf',3);

INSERT INTO `control_finance`.`negotiations` (`id`,`investment_id`,`date`,`type`,`value`) VALUES (1,1,'2024-01-01','B',2000.00);
INSERT INTO `control_finance`.`negotiations` (`id`,`investment_id`,`date`,`type`,`value`) VALUES (2,2,'2024-02-02','B',5000.00);
INSERT INTO `control_finance`.`negotiations` (`id`,`investment_id`,`date`,`type`,`value`) VALUES (3,3,'2024-08-01','S',1000.00);
