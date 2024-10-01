











CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `markets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_name` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `market_products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `market_id` bigint(20) unsigned NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `buy` enum('S','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `market_products_market_id_foreign` (`market_id`),
  KEY `market_products_product_id_foreign` (`product_id`),
  CONSTRAINT `market_products_market_id_foreign` FOREIGN KEY (`market_id`) REFERENCES `markets` (`id`),
  CONSTRAINT `market_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
);

INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('1', 'Amaciante', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('2', 'Sabão pó', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('3', 'Papel Toalhas', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('4', 'Saco de lixo', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('5', 'Suco tang', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('6', 'Leite', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('7', 'Margarina', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('8', 'Queijo ralado', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('9', 'Desodorante', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('10', 'Papel higiênico', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('11', 'Pasta de dente', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('12', 'Sabonete', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('13', 'Açúcar', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('14', 'Azeite de oliva', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('15', 'Bolacha água e sal', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('16', 'Café', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('17', 'Chá', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('18', 'Filtro de Cafe', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('19', 'Macarrão', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('20', 'Milho em Conserva', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('21', 'Milho para pipoca', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('22', 'Molho de tomate', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('23', 'Óleo de cozinha ', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('24', 'Sal', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('25', 'Suco caixa pequena', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('26', 'Bisnaguinha', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('27', 'Pão de forma', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('28', 'Pão sovado', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('29', 'Torrada', NOW(), NOW());
INSERT INTO `routine_tasks`.`products` (`id`, `item`, `created_at`, `updated_at`) VALUES ('30', 'Detergente', NOW(), NOW());
