USE `routine_tasks` ;

-- -----------------------------------------------------
-- Table `routine_tasks`.`goals`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `routine_tasks`.`goals` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `objective` VARCHAR(128) NOT NULL,
  `start` DATE NOT NULL,
  `end` DATE NOT NULL,
  `completed` ENUM('Y', 'N', 'O') NOT NULL DEFAULT 'O',
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `routine_tasks`.`goal_tasks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `routine_tasks`.`goal_tasks` (
  `id` BIGINT NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(128) NULL,
  `goal_id` BIGINT NOT NULL,
  `year` INT NOT NULL,
  `month` INT NOT NULL,
  `check_day` INT NOT NULL,
  `week` INT NOT NULL,
  `completed` ENUM('Y', 'N', 'O') NOT NULL DEFAULT 'O',
  `created_at` TIMESTAMP NOT NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_goal_tasks_goals_idx` (`goal_id` ASC),
  CONSTRAINT `fk_goal_tasks_goals`
    FOREIGN KEY (`goal_id`)
    REFERENCES `routine_tasks`.`goals` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;