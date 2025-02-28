CREATE TABLE `goals` (
	`id` bigint NOT NULL AUTO_INCREMENT,
    `objective` varchar(128) NOT NULL,
    `start` date NOT NULL,
    `end` date NOT NULL,
    `completed` enum('Y','N','O') NOT NULL DEFAULT 'O' COMMENT "Y->yes | N->no | O-> open",
    `created_at` timestamp NOT NULL,
    `updated_at` timestamp NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `goal_tasks` (
	`id` bigint NOT NULL AUTO_INCREMENT,
    `goal_id` bigint NOT NULL,
    `description` varchar(128) NULL,
    `date` timestamp NOT NULL,
    `week` int NOT NULL,
    `completed` enum('Y','N','O') NOT NULL DEFAULT 'O' COMMENT "Y->yes | N->no | O-> open",
    `created_at` timestamp NOT NULL,
    `updated_at` timestamp NOT NULL,
    PRIMARY KEY (`id`),
    KEY `fk_goal_tasks_goals_idx` (`goal_id`),
    CONSTRAINT `fk_goal_tasks_goals_idx` FOREIGN KEY (`goal_id`) REFERENCES `goals` (`id`)
);