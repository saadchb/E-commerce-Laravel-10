#Data for database Ecommerce
#familles
INSERT INTO `familles` (`id`, `libelle`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Alimentation', 'images/WPMwgb2g9Cn9EIA4zOM7GGxUJnrvusO9SbKoT1td.jpg', 1, '2024-04-27 09:43:03', '2024-05-02 15:34:58'),
(3, 'Elctronique', 'images/4V7k0xWTY1zokwnEZbBrJqQ9EXbskW3vEX7tPjU8.jpg', 1, '2024-05-02 11:04:02', '2024-05-02 15:25:33');

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id`, `marque`, `image`, `active`, `created_at`, `updated_at`) VALUES
(2, 'EXPLORE', 'images/Ke1gNcI5zjmK5HxV9lTeKTubhzImDVZKl297ZuJK.jpg', 1, '2024-05-02 13:47:46', '2024-05-02 13:47:46'),
(3, 'ECOTEAS', 'images/EKfpOesiJ11NrQLEDKZPQ7sI7I5AoqVgRRpjUCYD.jpg', 1, '2024-05-02 13:54:10', '2024-05-02 14:25:49'),
(4, 'ORAGANIC', 'images/WhmmCl0puUkpy08Q2WbKr8iuBb6FObddWe2Ek0Nw.jpg', 0, '2024-05-02 13:54:42', '2024-05-02 13:54:42');

--
-- Déchargement des données de la table `sous-famille`
--

INSERT INTO `sous_familles` (`id`, `libelle`, `active`, `image`, `famille_id`, `created_at`, `updated_at`) VALUES
(1, 'Vegetables', 1, 'images/8TvOgKNz0V3K4gSS3rwc3HKaTL6AmeWDEdBIwDig.jpg', 1, '2024-04-27 09:44:10', '2024-04-27 09:44:10'),
(2, 'Fresh Fuits', 1, 'images/wdHSifykY2Cc3n3V5oaqGq8Dcb0XBIsAyWaoapyW.jpg', 1, '2024-04-27 09:45:11', '2024-04-27 09:45:11'),
(3, 'Fresh Berries', 1, 'images/c82gZMVY7pGZrIZSTepc3CmrWw326uxaMnKjvvrm.jpg', 1, '2024-04-27 09:52:29', '2024-05-02 11:21:42'),
(5, 'accesoire', 0, 'images/w7JXlWhX1fjApXSkobUAuf8iXepuWcKznDdf8884.jpg', 3, '2024-05-02 11:05:39', '2024-05-02 22:03:05');

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`id`, `codebarre`, `designation`, `prix_ht`, `prix_vente`, `description`, `tva`, `image`, `sous_famille_id`, `marque_id`, `unite_id`, `created_at`, `updated_at`) VALUES
(1, '656218565867', 'lemons', 13, 10.99, 'description of lemons', NULL, 'images/TdkTkwKL7YxQjTonFjsDY7t1zXWK0LH9NwRjaA8U.jpg', 2, NULL, 1, '2024-04-27 11:00:23', '2024-04-27 11:02:10'),
(2, '855349803407', 'Pumpkins Fairytale', 10, 8.99, 'Description of  Pumpkins Fairytale', NULL, 'images/jq9VOgNZRaLha3RxHT6sSL7hYf5xKymTib2gpOu1.jpg', 1, NULL, 4, '2024-04-27 11:04:41', '2024-04-27 11:04:41'),
(3, '969880266826', 'Tomato Seeds', 8, 8.88, 'Descripion of toato', NULL, 'images/mZJfetGVRcFyiEbERGu0dRfx9WcuqebjgGbs2CTI.jpg', 1, NULL, 1, '2024-04-27 11:06:34', '2024-04-28 10:49:27'),
(4, '678538082571', 'Peppers Magnetic salt', 7, 5, 'description Peppers Magnetic salt', NULL, 'images/dlANEBwVDcpduTP6pu2TTPWgDVmb9STFgk0aly5L.jpg', 1, NULL, 4, '2024-04-28 22:23:26', '2024-04-28 22:23:26'),
(5, '870785162890', 'Packham\'s Pears', 10, 9, 'description of Packham\'s Pears', NULL, 'images/bvY5fbdyrA0AW0HZ2IgonR0HGRrORA7ZANp1aDhK.jpg', 2, NULL, 4, '2024-04-28 22:24:55', '2024-04-28 22:24:55'),
(6, '947957676660', 'Avocado', 11, 10.5, 'DESCRIPTION OF AVOCADO', NULL, 'images/e4H0VGrBQJe9l6t909LcBFFEWjDPwrIhCRkDUgUJ.jpg', 2, NULL, 4, '2024-04-28 22:27:33', '2024-04-28 22:27:33'),
(7, '947957676660', 'Avocado', 11, 10.5, 'DESCRIPTION OF AVOCADO', NULL, 'images/eQRDFsdC7Q2nX2ocidy8I7oqgynNLVrY8GeaskKY.jpg', 2, NULL, 4, '2024-04-28 22:27:34', '2024-04-28 22:27:34'),
(8, '947957676660', 'Avocado', 11, 10.5, 'DESCRIPTION OF AVOCADO', NULL, 'images/hHVUEJtR2J5rmktpFDv7PrPmqte0FRm8P9IJSlsG.jpg', 2, NULL, 4, '2024-04-28 22:27:34', '2024-04-28 22:27:34'),
(9, '947957676660', 'Avocado', 11, 10.5, 'DESCRIPTION OF AVOCADO', NULL, 'images/MrbwPYnG1DAWrghINw4XrpnGtkvK3Gk9WJN2cK3T.jpg', 2, NULL, 4, '2024-04-28 22:27:35', '2024-04-28 22:27:35'),
(10, '947957676660', 'Avocado', 11, 10.5, 'DESCRIPTION OF AVOCADO', NULL, 'images/F8mNgAqJnVy8R52vcOJFKIrc1Xp2VHF8gsDCcjF6.jpg', 2, NULL, 4, '2024-04-28 22:27:35', '2024-04-28 22:27:35'),
(15, '148169481504', 'Tablet', 3000, 2228.99, 'RAM 4 ,5000 battery', NULL, 'images/07Un1ZMYMVYfOsnc0ca26IMGvrp0zwL5J1VE8sJN.jpg', 5, NULL, 1, '2024-05-02 11:07:18', '2024-05-02 11:07:18'),
(16, '166245392765', 'Berris', 11, 10.99, 'description', NULL, 'images/kzGne9jywBvDIfK7ekncB2ZRYmGmG8kPo2YMKipi.jpg', 3, NULL, 5, '2024-05-02 11:15:52', '2024-05-02 11:15:52'),
(17, '166245392765', 'Berris', 11, 10.99, 'description', NULL, 'images/7rJBXAVpm3NDkakqA1smQRhnFFmhmuMIMZpBomKE.jpg', 3, NULL, 5, '2024-05-02 11:15:53', '2024-05-02 11:15:53'),
(18, '166245392765', 'Green lemon', 8, 5.99, 'descriptiondescription :', NULL, 'images/YLEyKDQcuSIAXacetK6gjGDvqgH5ESdMRonq6P98.jpg', 2, NULL, 4, '2024-05-02 11:15:54', '2024-05-02 11:56:31');

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `adresse`, `ville`, `tel`, `image`, `isAdmin`, `email`, `email_verified_at`, `password`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'normal', 'user', 'fes', 'Fes', '0644759877', 'images/gPnHXYF3WNXJsH4xzeXslhbA8TrdZHSQiUsijLvX.jpg', 0, 'NomralUser@gmail.com', NULL, '$2y$12$R6S5LhWcyEbvVZVpN2Twl.nQZQMGIIDtsnqEfd.qB0BlE.t03AtAS', NULL, NULL, '2024-04-28 16:51:55', '2024-05-01 14:33:35'),
(6, 'commercial', 'account', 'fes', 'Fes', '0644759877', NULL, 2, 'commercial@gmail.com', NULL, '$2y$12$vQtWoQChNr1EzM4h4EYp3ODX76zNOZ/k9Vrd.53zFDFZUsK2I2R.q', NULL, NULL, '2024-04-28 20:18:14', '2024-04-28 20:18:14'),
(12, 'saad', 'chaib', 'Riad', 'Fes', '0644759877', 'images/f0UilBC1Mbeo8LdAxKqSCoXFZ9O0Jiw8pxOgjyfZ.jpg', 1, 'chbsaad111@gmail.com', NULL, '$2y$12$MhoxNaTgaBFU/5MIvxUMi.HJIaz31suZzaC9LBxdOvX980vfPuRrC', NULL, NULL, '2024-04-30 20:55:52', '2024-05-01 14:25:30'),
(14, 'fahd', 'fahd', 'sssssssssssssssssssssssss', 'newyork', '05584884', NULL, 0, 'fhd@gmail.com', NULL, '$2y$12$8syi.10JIFBfXRPx01CDgei4P5McFY32M04oP8y2oi7foGqO839Zq', '2024-05-01 14:59:35', NULL, '2024-05-01 14:58:34', '2024-05-01 14:59:35'),
(15, 'fahd', 'fahd', 'sssssssssssssssssssssssss', 'newyork', '05584884', NULL, -1, 'fhdd@gmail.com', NULL, '$2y$12$1qIQ4bWknL1UgcDwJFpEwe7kRlFLckED7AbALlZbvY1.1IgXmbfoi', '2024-05-01 15:08:44', NULL, '2024-05-01 15:08:21', '2024-05-01 15:08:44');
