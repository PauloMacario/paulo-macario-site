CREATE TABLE IF NOT EXISTS `control_finance`.`shopper_user` (
  `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT(20) UNSIGNED NOT NULL,
  `shopper_id` INT(11) NOT NULL,
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_shopper_user_shoppers1_idx` (`shopper_id` ASC) VISIBLE,
  INDEX `fk_shopper_user_users1_idx` (`user_id` ASC) VISIBLE,
  CONSTRAINT `fk_shopper_user_shoppers1`
    FOREIGN KEY (`shopper_id`)
    REFERENCES `control_finance`.`shoppers` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_shopper_user_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `control_finance`.`users` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci

/*######*/

INSERT INTO `control_finance`.`shopper_user` (`id`, `users_id`, `shoppers_id`, `created_at`, `updated_at`) VALUES ('1', '1', '1', NOW(), NOW());
INSERT INTO `control_finance`.`shopper_user` (`id`, `users_id`, `shoppers_id`, `created_at`, `updated_at`) VALUES ('2', '1', '2', NOW(), NOW());
INSERT INTO `control_finance`.`shopper_user` (`id`, `users_id`, `shoppers_id`, `created_at`, `updated_at`) VALUES ('3', '2', '2', NOW(), NOW());




