


INSERT INTO `users` (`user_id`, `session_id`, `user_name`, `user_age`, `user_gender`, `user_slug`, `user_password_hash`, `user_email`, `user_active`, `user_deleted`, `user_account_type`, `user_has_avatar`, `user_remember_me_token`, `user_suspension_timestamp`, `user_last_login_timestamp`, `user_failed_logins`, `user_last_failed_login`, `user_activation_hash`, `user_profile`, `user_password_reset_hash`, `user_password_reset_timestamp`, `updated_at`, `created_at`) VALUES
('58208e831f706', NULL, 'JeanTourloupe', 0, 'Non Specified', '', '$2y$10$0Fv05VqaVt4wBQsHPwsJauNZvF0kqu1HRkf.ypUc.b8hTlZVe/8aO', 'bernard@ladrigotte.onche', 0, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, '2016-11-07 12:24:25', '2016-11-07 13:24:25'),
('58209d4064b77', 'ltjmb7iu8132osh36j7cadi0j6', 'Bernard', 30, 'Male', '', '$2y$10$Rg/uJqJygI96fnxxSo0eeeT4tAOOZlKS9lbzu96fftDccEn4Jlr6q', 'bernard@ladrigotte.ponche', 0, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, '2016-11-11 13:37:16', '2016-11-10 12:39:09'),
('58220576c9787', NULL, 'JeanFlibuste', 31, 'Non Specified', '', '$2y$10$cuylZQ7ElcdK1FNnmVThHuGg2H4zz/sOddU/AlOS8RmC5ZaOtFfBm', 'ilapas@ditbonjour.vald', 0, 0, 0, 0, NULL, NULL, NULL, 0, NULL, NULL, 1, NULL, NULL, '2016-11-09 15:46:55', '2016-11-09 16:46:55');


INSERT INTO `kebabs` (`kebab_id`, `user_id`, `kebab_description`, `kebab_tasty_points`, `kebab_image_path`, `kebab_image_extension`, `updated_at`, `created_at`) VALUES
('581cf0ccec0aa', '58209d4064b77', 'Ca fait longtemps que j\'en ai pas mangé,humm un bon kebab', 5, '581cf0ccec0b0', 'jpg', '2016-11-08 15:59:34', '2016-11-08 15:59:34'),
('581d05e46f9c5', '58209d4064b77', 'AU TOP la soirée avec les potes à manger celui-ci', 1, '581d05e46f9c9', 'jpg', '2016-11-11 13:37:52', '2016-11-08 15:59:23'),
('581f61f03b542', '58209d4064b77', 'Un jour de printemps, un grand philosophe eut la sympathie de m\'octroyer un délicieux kebab', 0, '581f61f03b549', 'png', '2016-11-11 13:38:21', '2016-11-08 15:59:16'),
('582095fbd6b5f', '58209d4064b77', 'Kebab tomate oignon salade.', 0, '582095fbd6b66', 'jpg', '2016-11-08 15:59:05', '2016-11-08 15:59:05'),
('5820b209251d1', '58209d4064b77', 'Fidèle à la maison depuis bientôt 8 ans pour rien au monde on irait ailleurs.', 0, '5820b209251d8', 'jpg', '2016-11-07 14:55:37', '2016-11-07 14:55:37'),
('582206f9be983', '58220576c9787', 'Super Kebab', 1, '582206f9be989', 'jpg', '2016-11-11 13:41:59', '2016-11-08 15:10:17');

INSERT INTO `adresses` (`adresse_id`, `shop_name`, `country`, `city`, `street_number`, `kebab_id`, `street`, `updated_at`, `created_at`) VALUES
('581cf0cd4ac3f', 'Kebabia', 'Pologne', 'Rydułtowy', 55, '581cf0ccec0aa', 'ul. Ofiar Terroru', '2016-11-04 17:34:21', '2016-11-04 17:34:21'),
('581d05e4978dd', 'LeePong et fils', 'Espagne', 'Castelao', 32, '581d05e46f9c5', 'Rue de la MLG', '2016-11-04 19:04:20', '2016-11-04 19:04:20'),
('581f61f0dea89', 'JPC Kebab', 'France', 'SAINT-ANDRÉ', 20, '581f61f03b542', 'rue de l\'Epeule', '2016-11-06 14:01:36', '2016-11-06 14:01:36'),
('582095fbf224b', 'JPC Kebab', 'Deutschland', 'Mindelstetten', 450, '582095fbd6b5f', 'AlleestraBe', '2016-11-07 12:55:55', '2016-11-07 12:55:55'),
('5820b2094d68f', 'Norvegia Kebab', 'Norvege', 'Mühloz', 8, '5820b209251d1', 'Gamelevegen', '2016-11-07 14:55:37', '2016-11-07 14:55:37'),
('582206fa3bf77', 'Simon Kebab', 'Danemark', 'Bredsten', 9001, '582206f9be983', 'Serup Skowej', '2016-11-08 15:10:18', '2016-11-08 15:10:18');

INSERT INTO `tags` (`tag_id`, `kebab_id`, `tag_text`, `updated_at`, `created_at`) VALUES
('581cf0cd45c04', '581cf0ccec0aa', 'tag1', '2016-11-04 17:34:21', '2016-11-04 17:34:21'),
('581d05e47f655', '581d05e46f9c5', 'tag2', '2016-11-04 19:04:20', '2016-11-04 19:04:20'),
('581d05e4842df', '581d05e46f9c5', 'tag3', '2016-11-04 19:04:20', '2016-11-04 19:04:20'),
('581d05e48c6af', '581d05e46f9c5', 'tag4', '2016-11-04 19:04:20', '2016-11-04 19:04:20'),
('581f61f078797', '581f61f03b542', 'tag5', '2016-11-06 14:01:36', '2016-11-06 14:01:36'),
('581f61f095dfa', '581f61f03b542', 'tag6', '2016-11-06 14:01:36', '2016-11-06 14:01:36'),
('581f61f0b64cb', '581f61f03b542', 'tag7', '2016-11-06 14:01:36', '2016-11-06 14:01:36'),
('581f61f0cded6', '581f61f03b542', 'tag8', '2016-11-06 14:01:36', '2016-11-06 14:01:36'),
('581f61f0d8bbe', '581f61f03b542', 'tag9', '2016-11-06 14:01:36', '2016-11-06 14:01:36'),
('582095fbe1c7d', '582095fbd6b5f', 'tag10', '2016-11-07 12:55:55', '2016-11-07 12:55:55'),
('582095fbea4c8', '582095fbd6b5f', 'tag11', '2016-11-07 12:55:55', '2016-11-07 12:55:55'),
('5820b2093594a', '5820b209251d1', 'tag12', '2016-11-07 14:55:37', '2016-11-07 14:55:37'),
('5820b2093f342', '5820b209251d1', 'tag13', '2016-11-07 14:55:37', '2016-11-07 14:55:37'),
('5820b20945565', '5820b209251d1', 'tag14', '2016-11-07 14:55:37', '2016-11-07 14:55:37'),
('582206f9ee4ba', '582206f9be983', 'tag15', '2016-11-08 15:10:17', '2016-11-08 15:10:17'),
('582206fa25c7b', '582206f9be983', 'tag16', '2016-11-08 15:10:18', '2016-11-08 15:10:18'),
('582206fa2d110', '582206f9be983', 'tag17', '2016-11-08 15:10:18', '2016-11-08 15:10:18');

INSERT INTO `vote` (`id`, `kebab_id`, `user_id`, `updated_at`, `created_at`) VALUES
('5824eb145236c', '58246ff2995ea', '582082313cabe', '2016-11-10 20:48:04', '2016-11-10 20:48:04'),
('5824eb2eb84b8', '581f61f03b542', '582082313cabe', '2016-11-10 20:48:30', '2016-11-10 20:48:30'),
('5824eb5faab07', '581f61f03b542', '5824e7f5e92ff', '2016-11-10 20:49:19', '2016-11-10 20:49:19'),
('5824eb6707ce8', '58246ff2995ea', '5824e7f5e92ff', '2016-11-10 20:49:27', '2016-11-10 20:49:27'),
('5824eb6b03fb5', '581cf0ccec0aa', '5824e7f5e92ff', '2016-11-10 20:49:31', '2016-11-10 20:49:31'),
('5824eb7cf39a6', '581cf0ccec0aa', '582082313cabe', '2016-11-10 20:49:48', '2016-11-10 20:49:48'),
('5824eb817ab39', '581d05e46f9c5', '582082313cabe', '2016-11-10 20:49:53', '2016-11-10 20:49:53'),
('5825d7bf72fca', '581d05e46f9c5', '58209d4064b77', '2016-11-11 13:37:51', '2016-11-11 13:37:51'),
('5825d7dba2e78', '581f61f03b542', '58209d4064b77', '2016-11-11 13:38:19', '2016-11-11 13:38:19'),
('5825d7dd4e75a', '581f61f03b542', '58209d4064b77', '2016-11-11 13:38:21', '2016-11-11 13:38:21'),
('5825d8b7cc521', '582206f9be983', '58209d4064b77', '2016-11-11 13:41:59', '2016-11-11 13:41:59');

INSERT INTO `comments` (`comment_id`, `user_id`, `kebab_id`, `texte`, `updated_at`, `created_at`) VALUES
('582604fa40dc2', '58209d4064b77', '581d05e46f9c5', 'c\'est trop croustillant', '2016-11-11 16:50:50', '2016-11-11 16:50:50'),
('58260d11ba363', '58209d4064b77', '581f61f03b542', 'Ca donne faim !', '2016-11-11 17:25:21', '2016-11-11 17:25:21');
