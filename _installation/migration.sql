SET FOREIGN_KEY_CHECKS = 0;
SELECT GROUP_CONCAT(table_schema, '.', table_name) INTO @tables
  FROM information_schema.tables
  WHERE table_schema = 'database'; -- specify DB name here.

SET @tables = CONCAT('DROP TABLE ', @tables);
PREPARE stmt FROM @tables;
EXECUTE stmt;
SET FOREIGN_KEY_CHECKS = 1;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



CREATE TABLE `adresses` (
  `adresse_id` varchar(13) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `street_number` int(9) NOT NULL,
  `kebab_id` varchar(13) NOT NULL,
  `street` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `comments` (
  `user_id` varchar(13) NOT NULL,
  `kebab_id` varchar(13) NOT NULL,
  `texte` varchar(1420) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `kebabs` (
  `kebab_id` varchar(13) NOT NULL,
  `user_id` varchar(13) NOT NULL,
  `kebab_description` varchar(1420) NOT NULL,
  `kebab_tasty_points` int(9) NOT NULL,
  `kebab_image_path` varchar(13) NOT NULL,
  `kebab_image_extension` varchar(4) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tags` (
  `tag_id` varchar(13) NOT NULL,
  `kebab_id` varchar(13) NOT NULL,
  `tag_text` varchar(30) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `user_id` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'auto incrementing user_id of each user, unique index',
  `session_id` varchar(48) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'stores session cookie id to prevent session concurrency',
  `user_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'user''s name, unique',
  `user_age` int(3) NOT NULL,
  `user_gender` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_slug` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'user''s name sluggified, unique',
  `user_password_hash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'user''s password in salted and hashed format',
  `user_email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'user''s email, unique',
  `user_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s activation status',
  `user_deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s deletion status',
  `user_account_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'user''s account type (basic, premium, etc)',
  `user_has_avatar` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1 if user has a local avatar, 0 if not',
  `user_remember_me_token` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'user''s remember-me cookie token',
  `user_suspension_timestamp` bigint(20) DEFAULT NULL COMMENT 'Timestamp till the end of a user suspension',
  `user_last_login_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of user''s last login',
  `user_failed_logins` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'user''s failed login attempts',
  `user_last_failed_login` int(10) DEFAULT NULL COMMENT 'unix timestamp of last failed login attempt',
  `user_activation_hash` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'user''s email verification hash string',
  `user_profile` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Is the profile public, 1 is yes.',
  `user_password_reset_hash` char(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'user''s password reset code',
  `user_password_reset_timestamp` bigint(20) DEFAULT NULL COMMENT 'timestamp of the password reset request',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='user data';

CREATE TABLE `vote` (
  `kebab_id` varchar(13) NOT NULL,
  `user_id` varchar(13) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;












ALTER TABLE `adresses`
  ADD PRIMARY KEY (`adresse_id`);

ALTER TABLE `comments`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `kebab_id` (`kebab_id`);

ALTER TABLE `kebabs`
  ADD PRIMARY KEY (`kebab_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

ALTER TABLE `vote`
  ADD PRIMARY KEY (`kebab_id`),
  ADD KEY `user_id` (`user_id`);






INSERT INTO `users` (`user_id`, `session_id`, `user_name`, `user_age`, `user_gender`, `user_slug`, `user_password_hash`, `user_email`, `user_active`, `user_deleted`, `user_account_type`, `user_has_avatar`, `user_remember_me_token`, `user_suspension_timestamp`, `user_last_login_timestamp`, `user_failed_logins`, `user_last_failed_login`, `user_activation_hash`, `user_profile`, `user_password_reset_hash`, `user_password_reset_timestamp`, `created_at`, `updated_at`) VALUES
('582082313cabe', NULL, 'iryu54', 0, 'Non Specified', '', '$2y$10$Nk/YWAztZWniGOKeJKZIyebYRT6bX9NCwPUtP09DRQ9ERbDN.RkDK', 'lementai@hotmail.fr', 0, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, '2016-11-07 13:31:29', '2016-11-07 13:32:16');


INSERT INTO `kebabs` (`kebab_id`, `user_id`, `kebab_description`, `kebab_tasty_points`, `kebab_image_path`, `kebab_image_extension`, `updated_at`, `created_at`) VALUES
('581cf0ccec0aa', 'Jean-Test', 'ISSOU', 5, '581cf0ccec0b0', 'jpg', '2016-11-06 18:57:24', '2016-11-06 18:57:24'),
('581d05e46f9c5', 'Jean-Test', 'Un kebab asiat parce que c\'est du chien kappa', 0, '581d05e46f9c9', 'jpg', '2016-11-04 21:04:20', '2016-11-04 21:04:20'),
('581f61f03b542', 'Jean-Test', 'Un jour de printemps, un grand philosophe eut la sympathie de m\'octroyer un délicieux kebab, j\'ai juré wallah', 2, '581f61f03b549', 'png', '2016-11-06 18:57:33', '2016-11-06 18:57:33');

INSERT INTO `adresses` (`adresse_id`, `shop_name`, `country`, `city`, `street_number`, `kebab_id`, `street`, `updated_at`, `created_at`) VALUES
('581cf0cd4ac3f', 'OOPOPOO', 'OPOPOPO', 'POPOPO', 7, '581cf0ccec0aa', 'POPOPO', '2016-11-04 19:34:21', '2016-11-04 19:34:21'),
('581d05e4978dd', 'LeePong et fils', 'Chine', 'HongKong', 420, '581d05e46f9c5', 'Rue de la MLG', '2016-11-04 21:04:20', '2016-11-04 21:04:20'),
('581f61f0dea89', 'JPC Kebab', 'France', 'Onche City', 8173, '581f61f03b542', 'If you know what i mean', '2016-11-06 16:01:36', '2016-11-06 16:01:36');

INSERT INTO `tags` (`tag_id`, `kebab_id`, `tag_text`, `updated_at`, `created_at`) VALUES
('581cf0cd45c04', '581cf0ccec0aa', 'ISSOU', '2016-11-04 19:34:21', '2016-11-04 19:34:21'),
('581d05e47f655', '581d05e46f9c5', 'Cliche', '2016-11-04 21:04:20', '2016-11-04 21:04:20'),
('581d05e4842df', '581d05e46f9c5', 'doge', '2016-11-04 21:04:20', '2016-11-04 21:04:20'),
('581d05e48c6af', '581d05e46f9c5', 'onche', '2016-11-04 21:04:20', '2016-11-04 21:04:20'),
('581f61f078797', '581f61f03b542', 'JPC', '2016-11-06 16:01:36', '2016-11-06 16:01:36'),
('581f61f095dfa', '581f61f03b542', 'YTP', '2016-11-06 16:01:36', '2016-11-06 16:01:36'),
('581f61f0b64cb', '581f61f03b542', 'kebab', '2016-11-06 16:01:36', '2016-11-06 16:01:36'),
('581f61f0cded6', '581f61f03b542', 'unboeuf', '2016-11-06 16:01:36', '2016-11-06 16:01:36'),
('581f61f0d8bbe', '581f61f03b542', 'nonprobleme', '2016-11-06 16:01:36', '2016-11-06 16:01:36');