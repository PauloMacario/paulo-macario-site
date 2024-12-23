SET foreign_key_checks = 0;

ALTER TABLE `control_finance`.`shoppers` ADD COLUMN `user_id` BIGINT(20) UNSIGNED NOT NULL AFTER `id`;
UPDATE `control_finance`.`shoppers` SET `user_id` = '1';

ALTER TABLE `control_finance`.`payment_types` ADD COLUMN `user_id` BIGINT(20) UNSIGNED NOT NULL AFTER `id`;
UPDATE `control_finance`.`payment_types` SET `user_id` = '1';

ALTER TABLE `control_finance`.`categories` ADD COLUMN `user_id` BIGINT(20) UNSIGNED NOT NULL AFTER `id`;
UPDATE `control_finance`.`categories` SET `user_id` = '1';


ALTER TABLE shoppers ADD CONSTRAINT `FK_shopperUsers` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE payment_types ADD CONSTRAINT `FK_paymentTypesUsers` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE categories ADD CONSTRAINT `FK_categoriesUsers` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

SET foreign_key_checks = 1;