CREATE DATABASE cheap_beer;

USE cheap_beer;

CREATE TABLE `beers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `beers` (`id`,`name`,`img`,`color`,`created_at`,`updated_at`) VALUES (1,'Spaten','spaten.png','#1f4a2d','2025-08-07 20:34:40','2025-08-07 20:34:40');
INSERT INTO `beers` (`id`,`name`,`img`,`color`,`created_at`,`updated_at`) VALUES (2,'Brahma','brahma.png','#890819','2025-08-07 20:34:40','2025-08-07 20:34:40');
INSERT INTO `beers` (`id`,`name`,`img`,`color`,`created_at`,`updated_at`) VALUES (3,'Amstel','amstel.png','#cb954e','2025-08-07 20:34:40','2025-08-07 20:34:40');
INSERT INTO `beers` (`id`,`name`,`img`,`color`,`created_at`,`updated_at`) VALUES (4,'Eisenbahn','eisenbahn.png','#ffda39','2025-08-07 20:34:40','2025-08-07 20:34:40');
INSERT INTO `beers` (`id`,`name`,`img`,`color`,`created_at`,`updated_at`) VALUES (5,'Império','imperio.png','#000000','2025-08-07 20:34:40','2025-08-07 20:34:40');
INSERT INTO `beers` (`id`,`name`,`img`,`color`,`created_at`,`updated_at`) VALUES (6,'Petra','petra.png','#fe4815','2025-08-07 20:34:40','2025-08-07 20:34:40');
INSERT INTO `beers` (`id`,`name`,`img`,`color`,`created_at`,`updated_at`) VALUES (7,'Original','original.png','#003084','2025-08-07 20:34:40','2025-08-07 20:34:40');


CREATE TABLE `places` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `places` (`id`,`name`,`address`,`img`,`color`,`created_at`,`updated_at`) VALUES (1,'Atacadão','Suzano','atacadao.png','#f63','2025-08-07 20:34:40','2025-08-07 20:34:40');
INSERT INTO `places` (`id`,`name`,`address`,`img`,`color`,`created_at`,`updated_at`) VALUES (2,'Assaí','Suzano','assai.png','#1e3a80','2025-08-07 20:34:40','2025-08-07 20:34:40');
INSERT INTO `places` (`id`,`name`,`address`,`img`,`color`,`created_at`,`updated_at`) VALUES (3,'Nagumo','Vila Mazza','nagumo.png',NULL,'2025-08-07 20:34:40','2025-08-07 20:34:40');
INSERT INTO `places` (`id`,`name`,`address`,`img`,`color`,`created_at`,`updated_at`) VALUES (4,'Primos','Vila Urupês','primos.png','#000060','2025-08-07 20:34:40','2025-08-07 20:34:40');
INSERT INTO `places` (`id`,`name`,`address`,`img`,`color`,`created_at`,`updated_at`) VALUES (5,'Semar','Centro Suzano','semar.png','#e20e20','2025-08-07 20:34:40','2025-08-07 20:34:40');



CREATE TABLE `beer_places` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `beer_id` bigint unsigned NOT NULL,
  `place_id` bigint unsigned NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `collected_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `beer_places_beer_id_foreign` (`beer_id`),
  KEY `beer_places_place_id_foreign` (`place_id`),
  CONSTRAINT `beer_places_beer_id_foreign` FOREIGN KEY (`beer_id`) REFERENCES `beers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `beer_places_place_id_foreign` FOREIGN KEY (`place_id`) REFERENCES `places` (`id`) ON DELETE CASCADE
); 