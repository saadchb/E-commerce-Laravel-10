-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 05 mai 2024 à 01:55
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `e-commerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `regle` tinyint(1) NOT NULL,
  `mode_reglement_id` bigint(20) UNSIGNED DEFAULT NULL,
  `etat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`id`, `date`, `heure`, `regle`, `mode_reglement_id`, `etat_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2024-04-10', '21:37:08', 1, NULL, NULL, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `detail_commandes`
--

CREATE TABLE `detail_commandes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantite` varchar(255) NOT NULL,
  `prix_ht` varchar(255) NOT NULL,
  `tva` varchar(255) NOT NULL,
  `commande_id` bigint(20) UNSIGNED NOT NULL,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `etats`
--

CREATE TABLE `etats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `etat` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `familles`
--

CREATE TABLE `familles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `familles`
--

INSERT INTO `familles` (`id`, `libelle`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Alimentation', 'images/WPMwgb2g9Cn9EIA4zOM7GGxUJnrvusO9SbKoT1td.jpg', 1, '2024-04-27 09:43:03', '2024-05-02 15:34:58'),
(3, 'Elctronique', 'images/4V7k0xWTY1zokwnEZbBrJqQ9EXbskW3vEX7tPjU8.jpg', 1, '2024-05-02 11:04:02', '2024-05-02 15:25:33');

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `marque` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id`, `marque`, `image`, `active`, `created_at`, `updated_at`) VALUES
(2, 'EXPLORE', 'images/Ke1gNcI5zjmK5HxV9lTeKTubhzImDVZKl297ZuJK.jpg', 1, '2024-05-02 13:47:46', '2024-05-02 13:47:46'),
(3, 'ECOTEAS', 'images/EKfpOesiJ11NrQLEDKZPQ7sI7I5AoqVgRRpjUCYD.jpg', 1, '2024-05-02 13:54:10', '2024-05-02 14:25:49'),
(4, 'ORAGANIC', 'images/WhmmCl0puUkpy08Q2WbKr8iuBb6FObddWe2Ek0Nw.jpg', 0, '2024-05-02 13:54:42', '2024-05-02 13:54:42');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_16_083512_create_etats_table', 1),
(6, '2024_04_16_083544_create_mode_reglements_table', 1),
(7, '2024_04_16_083642_create_commandes_table', 1),
(8, '2024_04_17_082908_create_familles_table', 1),
(9, '2024_04_17_082910_create_sous_familles_table', 1),
(10, '2024_04_17_083346_create_marques_table', 1),
(11, '2024_04_17_083403_create_unites_table', 1),
(12, '2024_04_17_083439_create_produits_table', 1),
(13, '2024_04_17_083440_create_detail_commandes_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `mode_reglements`
--

CREATE TABLE `mode_reglements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mode_reglement` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codebarre` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `prix_ht` double DEFAULT NULL,
  `prix_vente` double NOT NULL,
  `description` text NOT NULL,
  `tva` double DEFAULT 0.2,
  `image` varchar(255) DEFAULT NULL,
  `sous_famille_id` bigint(20) UNSIGNED NOT NULL,
  `marque_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unite_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Structure de la table `review`
--

CREATE TABLE `review` (
  `rating` double DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `produit_id` bigint(33) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `siteweb` varchar(44) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comments` longtext DEFAULT NULL,
  `rating` double(8,2) NOT NULL DEFAULT 0.50,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `siteweb` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produit_id` bigint(20) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `sous_familles`
--

CREATE TABLE `sous_familles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `libelle` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `famille_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sous_familles`
--

INSERT INTO `sous_familles` (`id`, `libelle`, `active`, `image`, `famille_id`, `created_at`, `updated_at`) VALUES
(1, 'Vegetables', 1, 'images/8TvOgKNz0V3K4gSS3rwc3HKaTL6AmeWDEdBIwDig.jpg', 1, '2024-04-27 09:44:10', '2024-04-27 09:44:10'),
(2, 'Fresh Fuits', 1, 'images/wdHSifykY2Cc3n3V5oaqGq8Dcb0XBIsAyWaoapyW.jpg', 1, '2024-04-27 09:45:11', '2024-04-27 09:45:11'),
(3, 'Fresh Berries', 1, 'images/c82gZMVY7pGZrIZSTepc3CmrWw326uxaMnKjvvrm.jpg', 1, '2024-04-27 09:52:29', '2024-05-02 11:21:42'),
(5, 'accesoire', 0, 'images/w7JXlWhX1fjApXSkobUAuf8iXepuWcKznDdf8884.jpg', 3, '2024-05-02 11:05:39', '2024-05-02 22:03:05');

-- --------------------------------------------------------

--
-- Structure de la table `unites`
--

CREATE TABLE `unites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unite` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `unites`
--

INSERT INTO `unites` (`id`, `unite`, `created_at`, `updated_at`) VALUES
(1, 'Piece', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(2, 'Dozen', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(3, 'Gram', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(4, 'Kilogram', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(5, 'Liter', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(6, 'Milliliter', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(7, 'Meter', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(8, 'Centimeter', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(9, 'Square Meter', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(10, 'Cubic Meter', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(11, 'Foot', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(12, 'Inch', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(13, 'Gallon', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(14, 'Ounce', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(15, 'Pound', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(16, 'Ton', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(17, 'Box', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(18, 'Bag', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(19, 'Packet', '2024-04-27 09:32:50', '2024-04-27 09:32:50'),
(20, 'Bottle', '2024-04-27 09:32:50', '2024-04-27 09:32:50');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `adresse`, `ville`, `tel`, `image`, `isAdmin`, `email`, `email_verified_at`, `password`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'normal', 'user', 'fes', 'Fes', '0644759877', 'images/gPnHXYF3WNXJsH4xzeXslhbA8TrdZHSQiUsijLvX.jpg', 0, 'NomralUser@gmail.com', NULL, '$2y$12$R6S5LhWcyEbvVZVpN2Twl.nQZQMGIIDtsnqEfd.qB0BlE.t03AtAS', NULL, NULL, '2024-04-28 16:51:55', '2024-05-01 14:33:35'),
(6, 'commercial', 'account', 'fes', 'Fes', '0644759877', NULL, 2, 'commercial@gmail.com', NULL, '$2y$12$vQtWoQChNr1EzM4h4EYp3ODX76zNOZ/k9Vrd.53zFDFZUsK2I2R.q', NULL, NULL, '2024-04-28 20:18:14', '2024-04-28 20:18:14'),
(12, 'saad', 'chaib', 'Riad', 'Fes', '0644759877', 'images/f0UilBC1Mbeo8LdAxKqSCoXFZ9O0Jiw8pxOgjyfZ.jpg', 1, 'chbsaad111@gmail.com', NULL, '$2y$12$MhoxNaTgaBFU/5MIvxUMi.HJIaz31suZzaC9LBxdOvX980vfPuRrC', NULL, NULL, '2024-04-30 20:55:52', '2024-05-01 14:25:30'),
(14, 'fahd', 'fahd', 'sssssssssssssssssssssssss', 'newyork', '05584884', NULL, 0, 'fhd@gmail.com', NULL, '$2y$12$8syi.10JIFBfXRPx01CDgei4P5McFY32M04oP8y2oi7foGqO839Zq', '2024-05-01 14:59:35', NULL, '2024-05-01 14:58:34', '2024-05-01 14:59:35'),
(15, 'fahd', 'fahd', 'sssssssssssssssssssssssss', 'newyork', '05584884', NULL, -1, 'fhdd@gmail.com', NULL, '$2y$12$1qIQ4bWknL1UgcDwJFpEwe7kRlFLckED7AbALlZbvY1.1IgXmbfoi', '2024-05-01 15:08:44', NULL, '2024-05-01 15:08:21', '2024-05-01 15:08:44');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commandes_mode_reglement_id_foreign` (`mode_reglement_id`),
  ADD KEY `commandes_etat_id_foreign` (`etat_id`),
  ADD KEY `commandes_user_id_foreign` (`user_id`);

--
-- Index pour la table `detail_commandes`
--
ALTER TABLE `detail_commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_commandes_commande_id_foreign` (`commande_id`),
  ADD KEY `detail_commandes_produit_id_foreign` (`produit_id`);

--
-- Index pour la table `etats`
--
ALTER TABLE `etats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `familles`
--
ALTER TABLE `familles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mode_reglements`
--
ALTER TABLE `mode_reglements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produits_sous_famille_id_foreign` (`sous_famille_id`),
  ADD KEY `produits_marque_id_foreign` (`marque_id`),
  ADD KEY `produits_unite_id_foreign` (`unite_id`);

--
-- Index pour la table `review`
--
ALTER TABLE `review`
  ADD KEY `user_id` (`user_id`,`produit_id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `sous_familles`
--
ALTER TABLE `sous_familles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sous_familles_famille_id_foreign` (`famille_id`);

--
-- Index pour la table `unites`
--
ALTER TABLE `unites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `detail_commandes`
--
ALTER TABLE `detail_commandes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `etats`
--
ALTER TABLE `etats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `familles`
--
ALTER TABLE `familles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `marques`
--
ALTER TABLE `marques`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `mode_reglements`
--
ALTER TABLE `mode_reglements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `sous_familles`
--
ALTER TABLE `sous_familles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `unites`
--
ALTER TABLE `unites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_etat_id_foreign` FOREIGN KEY (`etat_id`) REFERENCES `etats` (`id`),
  ADD CONSTRAINT `commandes_mode_reglement_id_foreign` FOREIGN KEY (`mode_reglement_id`) REFERENCES `mode_reglements` (`id`),
  ADD CONSTRAINT `commandes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `detail_commandes`
--
ALTER TABLE `detail_commandes`
  ADD CONSTRAINT `detail_commandes_commande_id_foreign` FOREIGN KEY (`commande_id`) REFERENCES `commandes` (`id`),
  ADD CONSTRAINT `detail_commandes_produit_id_foreign` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_marque_id_foreign` FOREIGN KEY (`marque_id`) REFERENCES `marques` (`id`),
  ADD CONSTRAINT `produits_sous_famille_id_foreign` FOREIGN KEY (`sous_famille_id`) REFERENCES `sous_familles` (`id`),
  ADD CONSTRAINT `produits_unite_id_foreign` FOREIGN KEY (`unite_id`) REFERENCES `unites` (`id`);

--
-- Contraintes pour la table `sous_familles`
--
ALTER TABLE `sous_familles`
  ADD CONSTRAINT `sous_familles_famille_id_foreign` FOREIGN KEY (`famille_id`) REFERENCES `familles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
