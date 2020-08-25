-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 25 août 2020 à 20:14
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_ecole07082020`
--
CREATE DATABASE IF NOT EXISTS `gestion_ecole07082020` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `gestion_ecole07082020`;

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_admin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_admin` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`id`, `nom_admin`, `prenom_admin`, `username`, `password`, `profil_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'admin', '$2y$10$WFbEr3k5u.YM1QxprYhIm.nGVm73JKWxCiPW7MjXucBfq.Mo2m6WG', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categorie_niveau_scolaires`
--

CREATE TABLE `categorie_niveau_scolaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_categorie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categorie_niveau_scolaires`
--

INSERT INTO `categorie_niveau_scolaires` (`id`, `nom_categorie`, `created_at`, `updated_at`) VALUES
(1, 'Préscolaire', NULL, NULL),
(2, 'Primaire', NULL, NULL),
(3, 'Collège', NULL, NULL),
(4, 'Secondaire', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_classe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classes`
--

INSERT INTO `classes` (`id`, `nom_classe`, `admin_id`, `created_at`, `updated_at`) VALUES
(3, 'CE1-1', 1, NULL, NULL),
(4, 'CE1-2', 1, NULL, NULL),
(5, 'CE2-1', 1, NULL, NULL),
(6, 'CE2-2', 1, NULL, NULL),
(10, 'Arabe', 1, '2020-08-25 01:09:09', '2020-08-25 01:09:09'),
(11, 'ce2 good', 1, '2020-08-25 01:11:52', '2020-08-25 01:11:52'),
(12, 'Some shit to learn', 1, '2020-08-25 01:13:09', '2020-08-25 01:13:09');

-- --------------------------------------------------------

--
-- Structure de la table `classe_niveau_cycles`
--

CREATE TABLE `classe_niveau_cycles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classe_id` bigint(20) UNSIGNED NOT NULL,
  `cycle_scolaire_id` bigint(20) UNSIGNED NOT NULL,
  `niveau_scolaire_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `classe_niveau_cycles`
--

INSERT INTO `classe_niveau_cycles` (`id`, `classe_id`, `cycle_scolaire_id`, `niveau_scolaire_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 2, 1, NULL, NULL),
(2, 5, 2, 3, 1, NULL, NULL),
(3, 4, 3, 3, 1, NULL, NULL),
(5, 10, 2, 1, 1, '2020-08-25 01:09:10', '2020-08-25 01:09:10'),
(6, 11, 2, 3, 1, '2020-08-25 01:11:54', '2020-08-25 01:11:54'),
(7, 12, 2, 1, 1, '2020-08-25 01:13:10', '2020-08-25 01:13:10');

-- --------------------------------------------------------

--
-- Structure de la table `controle_matieres`
--

CREATE TABLE `controle_matieres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_controle` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_controle` datetime NOT NULL,
  `prof_id` bigint(20) UNSIGNED NOT NULL,
  `classe_niveau_cycle_id` bigint(20) UNSIGNED NOT NULL,
  `type_controle_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cycle_scolaires`
--

CREATE TABLE `cycle_scolaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cycle_scolaires`
--

INSERT INTO `cycle_scolaires` (`id`, `date_debut`, `date_fin`, `admin_id`, `created_at`, `updated_at`) VALUES
(2, '2020-08-20', '2021-08-18', 1, '2020-08-20 22:02:10', '2020-08-20 22:02:10'),
(3, '2019-09-10', '2020-08-19', 1, '2020-08-20 22:02:58', '2020-08-20 22:02:58'),
(4, '2018-08-22', '2019-10-29', 1, '2020-08-20 22:03:54', '2020-08-20 22:03:54'),
(5, '2017-08-08', '2018-07-18', 1, '2020-08-20 22:04:20', '2020-08-20 22:04:20');

-- --------------------------------------------------------

--
-- Structure de la table `degre_parentes`
--

CREATE TABLE `degre_parentes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_degre_parente` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `degre_parentes`
--

INSERT INTO `degre_parentes` (`id`, `nom_degre_parente`, `created_at`, `updated_at`) VALUES
(1, 'Père', NULL, NULL),
(2, 'Mère', NULL, NULL),
(3, 'Autre', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `etudiants`
--

CREATE TABLE `etudiants` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom_etudiant` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_etudiant` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_etudiant` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance_etudiant` date NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `genre_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `fiche_etudiants`
--

CREATE TABLE `fiche_etudiants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etudiant_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classe_niveau_cycle_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_genre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `genres`
--

INSERT INTO `genres` (`id`, `nom_genre`, `created_at`, `updated_at`) VALUES
(1, 'Masculin', NULL, NULL),
(2, 'Féminin', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `matieres`
--

CREATE TABLE `matieres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_matiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `matieres`
--

INSERT INTO `matieres` (`id`, `nom_matiere`, `admin_id`, `created_at`, `updated_at`) VALUES
(346, 'PYSIQUES', 1, '2020-08-25 16:47:04', '2020-08-25 16:47:04'),
(347, 'Anglais1', 1, '2020-08-25 16:49:23', '2020-08-25 16:49:23'),
(348, 'Anglais2', 1, '2020-08-25 16:49:23', '2020-08-25 16:49:23'),
(349, 'Anglais3', 1, '2020-08-25 16:49:23', '2020-08-25 16:49:23'),
(350, 'Anglais4', 1, '2020-08-25 16:49:23', '2020-08-25 16:49:23'),
(351, 'Anglais5', 1, '2020-08-25 16:49:23', '2020-08-25 16:49:23'),
(352, 'Anglais6', 1, '2020-08-25 16:49:23', '2020-08-25 16:49:23'),
(353, 'Anglais7', 1, '2020-08-25 16:49:23', '2020-08-25 16:49:23'),
(354, 'Anglais8', 1, '2020-08-25 16:49:23', '2020-08-25 16:49:23'),
(355, 'Anglais9', 1, '2020-08-25 16:49:23', '2020-08-25 16:49:23'),
(356, 'Anglais10', 1, '2020-08-25 16:49:23', '2020-08-25 16:49:23'),
(357, 'Anglais11', 1, '2020-08-25 16:49:23', '2020-08-25 16:49:23'),
(358, 'Anglais12', 1, '2020-08-25 16:49:23', '2020-08-25 16:49:23');

-- --------------------------------------------------------

--
-- Structure de la table `matiere_prof_classes`
--

CREATE TABLE `matiere_prof_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `matiere_id` bigint(20) UNSIGNED NOT NULL,
  `classe_id` bigint(20) UNSIGNED NOT NULL,
  `prof_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `niveau_scolaires`
--

CREATE TABLE `niveau_scolaires` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_niveau_scolaire` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_niveau` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `niveau_scolaires`
--

INSERT INTO `niveau_scolaires` (`id`, `nom_niveau_scolaire`, `categorie_niveau`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Baccalauréat', 4, 1, '2020-08-19 00:52:56', '2020-08-19 01:18:33'),
(2, 'CE1', 2, 1, NULL, NULL),
(3, 'CE2', 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `note` double(8,2) NOT NULL,
  `prof_id` bigint(20) UNSIGNED NOT NULL,
  `fiche_etudiant_id` bigint(20) UNSIGNED NOT NULL,
  `controle_matiere_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `profils`
--

CREATE TABLE `profils` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_profil` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profils`
--

INSERT INTO `profils` (`id`, `nom_profil`, `created_at`, `updated_at`) VALUES
(1, 'Administrateur', NULL, NULL),
(2, 'Gestionnaire', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `profs`
--

CREATE TABLE `profs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_prof` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_prof` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_prof` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_prof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_prof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance_prof` date NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `profs`
--

INSERT INTO `profs` (`id`, `nom_prof`, `prenom_prof`, `adresse_prof`, `telephone_prof`, `email_prof`, `date_naissance_prof`, `username`, `password`, `remember_token`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Prof', 'prof', 'Adresse prof', '9XQF7QablN', 'AaA2H@gmail.com', '1980-10-11', 'prof', '$2y$10$z/AQc7ggaVU7oUhYDHONpe02zrbTPBv8f6Dvgw30mpIIkwGhABPym', NULL, 1, NULL, '2020-08-22 22:31:08'),
(9, 'flinstone', 'FRED', 'RABAT', '0674561926', 'seth_solomon@hotmail.fr', '2020-08-19', 'fred.flinstone', '$2y$10$IP8g2AcBv4CE3COubFMwLuMj8y1f19.1tlkHpAT4U1rMpLevFXnGK', NULL, 1, '2020-08-25 16:52:04', '2020-08-25 16:52:04'),
(10, 'Maghribi', 'Mohammed', 'Av x rue1 Rabat ', '6587452', 'maghribi@gmail.com', '1980-12-10', 'mohammed.maghribi', '$2y$10$vYTcZJ61/.HrwKAlPWM0se7UEn/9mtm1ZfqPxZRmRS3dcTlZNQB7m', NULL, 1, '2020-08-25 16:53:55', '2020-08-25 16:53:55');

-- --------------------------------------------------------

--
-- Structure de la table `type_controles`
--

CREATE TABLE `type_controles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_type_controle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_parent` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_parent` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse_parent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_parent` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_parent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_naissance_parent` date NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `degre_parente_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom_parent`, `prenom_parent`, `adresse_parent`, `telephone_parent`, `email_parent`, `date_naissance_parent`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `degre_parente_id`, `admin_id`) VALUES
(1, 'DToCSpC2uU', 'puUXQPx1la', 's1OKku1gmuW7HSfg27aAB5VZEWsTZh', '8bX9ETRCUO', 'x04dK@gmail.com', '1975-03-05', 'parent', '$2y$10$ipDVhWeqFKVuYNwj6d14bepgN.jInEELNDyvlcVT3SyyZz538ijDG', NULL, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user_etudiant`
--

CREATE TABLE `user_etudiant` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `etudiant_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD KEY `admins_profil_id_foreign` (`profil_id`);

--
-- Index pour la table `categorie_niveau_scolaires`
--
ALTER TABLE `categorie_niveau_scolaires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classes_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `classe_niveau_cycles`
--
ALTER TABLE `classe_niveau_cycles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classe_niveau_cycles_classe_id_foreign` (`classe_id`),
  ADD KEY `classe_niveau_cycles_cycle_scolaire_id_foreign` (`cycle_scolaire_id`),
  ADD KEY `classe_niveau_cycles_niveau_scolaire_id_foreign` (`niveau_scolaire_id`),
  ADD KEY `classe_niveau_cycles_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `controle_matieres`
--
ALTER TABLE `controle_matieres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `controle_matieres_prof_id_foreign` (`prof_id`),
  ADD KEY `controle_matieres_classe_niveau_cycle_id_foreign` (`classe_niveau_cycle_id`),
  ADD KEY `controle_matieres_type_controle_id_foreign` (`type_controle_id`);

--
-- Index pour la table `cycle_scolaires`
--
ALTER TABLE `cycle_scolaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cycle_scolaires_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `degre_parentes`
--
ALTER TABLE `degre_parentes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `etudiants_admin_id_foreign` (`admin_id`),
  ADD KEY `etudiants_genre_id_foreign` (`genre_id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fiche_etudiants`
--
ALTER TABLE `fiche_etudiants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fiche_etudiants_classe_niveau_cycle_id_foreign` (`classe_niveau_cycle_id`),
  ADD KEY `fiche_etudiants_admin_id_foreign` (`admin_id`),
  ADD KEY `fiche_etudiants_etudiant_id_foreign` (`etudiant_id`);

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matieres_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `matiere_prof_classes`
--
ALTER TABLE `matiere_prof_classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matiere_prof_classes_matiere_id_foreign` (`matiere_id`),
  ADD KEY `matiere_prof_classes_classe_id_foreign` (`classe_id`),
  ADD KEY `matiere_prof_classes_prof_id_foreign` (`prof_id`),
  ADD KEY `matiere_prof_classes_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niveau_scolaires`
--
ALTER TABLE `niveau_scolaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `niveau_scolaires_categorie_niveau_scolaire_id_foreign` (`categorie_niveau`),
  ADD KEY `niveau_scolaires_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_prof_id_foreign` (`prof_id`),
  ADD KEY `notes_fiche_etudiant_id_foreign` (`fiche_etudiant_id`),
  ADD KEY `notes_controle_matiere_id_foreign` (`controle_matiere_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `profils`
--
ALTER TABLE `profils`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `profs`
--
ALTER TABLE `profs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profs_username_unique` (`username`),
  ADD KEY `profs_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `type_controles`
--
ALTER TABLE `type_controles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_degre_parente_id_foreign` (`degre_parente_id`),
  ADD KEY `users_admin_id_foreign` (`admin_id`);

--
-- Index pour la table `user_etudiant`
--
ALTER TABLE `user_etudiant`
  ADD PRIMARY KEY (`user_id`,`etudiant_id`),
  ADD KEY `user_etudiant_etudiant_id_foreign` (`etudiant_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `categorie_niveau_scolaires`
--
ALTER TABLE `categorie_niveau_scolaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `classe_niveau_cycles`
--
ALTER TABLE `classe_niveau_cycles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `controle_matieres`
--
ALTER TABLE `controle_matieres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cycle_scolaires`
--
ALTER TABLE `cycle_scolaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `degre_parentes`
--
ALTER TABLE `degre_parentes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fiche_etudiants`
--
ALTER TABLE `fiche_etudiants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=359;

--
-- AUTO_INCREMENT pour la table `matiere_prof_classes`
--
ALTER TABLE `matiere_prof_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `niveau_scolaires`
--
ALTER TABLE `niveau_scolaires`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `profils`
--
ALTER TABLE `profils`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `profs`
--
ALTER TABLE `profs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `type_controles`
--
ALTER TABLE `type_controles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_profil_id_foreign` FOREIGN KEY (`profil_id`) REFERENCES `profils` (`id`);

--
-- Contraintes pour la table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Contraintes pour la table `classe_niveau_cycles`
--
ALTER TABLE `classe_niveau_cycles`
  ADD CONSTRAINT `classe_niveau_cycles_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `classe_niveau_cycles_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classe_niveau_cycles_cycle_scolaire_id_foreign` FOREIGN KEY (`cycle_scolaire_id`) REFERENCES `cycle_scolaires` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `classe_niveau_cycles_niveau_scolaire_id_foreign` FOREIGN KEY (`niveau_scolaire_id`) REFERENCES `niveau_scolaires` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `controle_matieres`
--
ALTER TABLE `controle_matieres`
  ADD CONSTRAINT `controle_matieres_classe_niveau_cycle_id_foreign` FOREIGN KEY (`classe_niveau_cycle_id`) REFERENCES `classe_niveau_cycles` (`id`),
  ADD CONSTRAINT `controle_matieres_prof_id_foreign` FOREIGN KEY (`prof_id`) REFERENCES `profs` (`id`),
  ADD CONSTRAINT `controle_matieres_type_controle_id_foreign` FOREIGN KEY (`type_controle_id`) REFERENCES `type_controles` (`id`);

--
-- Contraintes pour la table `cycle_scolaires`
--
ALTER TABLE `cycle_scolaires`
  ADD CONSTRAINT `cycle_scolaires_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Contraintes pour la table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `etudiants_genre_id_foreign` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`);

--
-- Contraintes pour la table `fiche_etudiants`
--
ALTER TABLE `fiche_etudiants`
  ADD CONSTRAINT `fiche_etudiants_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `fiche_etudiants_classe_niveau_cycle_id_foreign` FOREIGN KEY (`classe_niveau_cycle_id`) REFERENCES `classe_niveau_cycles` (`id`),
  ADD CONSTRAINT `fiche_etudiants_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `matieres`
--
ALTER TABLE `matieres`
  ADD CONSTRAINT `matieres_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Contraintes pour la table `matiere_prof_classes`
--
ALTER TABLE `matiere_prof_classes`
  ADD CONSTRAINT `matiere_prof_classes_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `matiere_prof_classes_classe_id_foreign` FOREIGN KEY (`classe_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matiere_prof_classes_matiere_id_foreign` FOREIGN KEY (`matiere_id`) REFERENCES `matieres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matiere_prof_classes_prof_id_foreign` FOREIGN KEY (`prof_id`) REFERENCES `profs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `niveau_scolaires`
--
ALTER TABLE `niveau_scolaires`
  ADD CONSTRAINT `niveau_scolaires_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `niveau_scolaires_categorie_niveau_scolaire_id_foreign` FOREIGN KEY (`categorie_niveau`) REFERENCES `categorie_niveau_scolaires` (`id`);

--
-- Contraintes pour la table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_controle_matiere_id_foreign` FOREIGN KEY (`controle_matiere_id`) REFERENCES `controle_matieres` (`id`),
  ADD CONSTRAINT `notes_fiche_etudiant_id_foreign` FOREIGN KEY (`fiche_etudiant_id`) REFERENCES `fiche_etudiants` (`id`),
  ADD CONSTRAINT `notes_prof_id_foreign` FOREIGN KEY (`prof_id`) REFERENCES `profs` (`id`);

--
-- Contraintes pour la table `profs`
--
ALTER TABLE `profs`
  ADD CONSTRAINT `profs_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `users_degre_parente_id_foreign` FOREIGN KEY (`degre_parente_id`) REFERENCES `degre_parentes` (`id`);

--
-- Contraintes pour la table `user_etudiant`
--
ALTER TABLE `user_etudiant`
  ADD CONSTRAINT `user_etudiant_etudiant_id_foreign` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_etudiant_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
