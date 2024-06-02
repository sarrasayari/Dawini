-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 juin 2024 à 01:41
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `dawini`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `email`, `mot_passe`) VALUES
(1, 'sarra.sayari@sesame.com.tn', 'sarra123');

-- --------------------------------------------------------

--
-- Structure de la table `doisser_medical`
--

CREATE TABLE `doisser_medical` (
  `id` int(11) NOT NULL,
  `id_prestataire` int(11) NOT NULL,
  `num_doisser` int(11) NOT NULL,
  `prenom_patient` varchar(255) NOT NULL,
  `nom_patient` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `image` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_passe` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `lieu_naissance` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id`, `prenom`, `nom`, `email`, `mot_passe`, `telephone`, `age`, `ville`, `date_naissance`, `lieu_naissance`, `genre`) VALUES
(1, 'sara', 'sayari', 'sarasayari639@gmail.com', 'sara123', '54309794', 22, 'Tunis', '2001-07-04', 'tunis', 'femme');

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

CREATE TABLE `prestataire` (
  `id` int(11) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mot_passe` varchar(255) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `specialite` varchar(255) NOT NULL,
  `etablissement` varchar(255) NOT NULL,
  `consultation` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `prix_consultation` decimal(10,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `prestataire`
--

INSERT INTO `prestataire` (`id`, `prenom`, `nom`, `email`, `mot_passe`, `telephone`, `specialite`, `etablissement`, `consultation`, `genre`, `ville`, `prix_consultation`) VALUES
(5, 'Dr Mouhamed', 'Amine', 'mouhamedamine@gmail.com', 'amine123', '71147852', 'cardiologue ', 'prive', 'cabinet ', 'homme', 'Tunis', 60.000),
(6, 'Dr Sahbi', 'Karoui', 'sahbikaroui@gmail.com', 'sahbi123', '71885952', 'pédiatre', 'prive', 'cabinet', 'homme', 'Tunis', 60.000),
(7, 'DrSami', 'Gueltat', 'gueltat.sami@gmail.com', 'gueltat123', '70724101', 'dermatologue ', 'prive', 'cabinet', 'homme', 'Tunis', 60.000),
(8, 'dr Abdellatif', 'toujani', 'abdellatiftoujani@gmail.com', 'abdellatif123', '78471471', 'généraliste', 'prive', 'cabinet', 'homme', 'beja', 80.000),
(9, 'dr naoufel', 'ben hamouda', 'benhamoudanaoufel@gmail.com', 'naoufel123', '0660-734072', 'généraliste', 'prive', 'cabinet', 'homme', 'bizart', 70.000),
(10, 'dr mouhamed', 'essid', 'mouhamedessid@gmail.com', 'essid123', '21142673', 'généraliste ', 'etatique', 'hôpital ', 'homme', 'nebeul', 60.000),
(11, 'dr fadhel', 'charfi', 'charfifadhel@gmail.com', 'fadhil123', '31507007', 'dermatologue ', 'prive', 'cabinet', 'homme', 'sfax', 70.000),
(12, 'dr najh', 'mohamed', 'mohamednejh@gmail.com', 'mohamed123', '74861401', 'généraliste', 'prive', 'cabinet', 'homme', 'sfax', 60.000),
(13, 'infirmier', 'jm', '', '', '27503765', 'infirmer ', 'privet', 'domicile', '', 'tunis', 0.000),
(14, 'medical', 'jm ', '', '', '27640136', 'infirmier ', 'prive ', 'domicile', '', 'sfax', 0.000),
(15, 'mohamed wael', 'kiari', '', '', '29909584', 'Kinésithérapeute', 'prive', 'domicile', '', 'sfax', 0.000),
(16, 'bassem', 'rekhis', '', '', '70860047', 'Kinésithérapeute', 'prive', 'cabinet', '', 'tunis', 0.000);

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `methode` varchar(255) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_prestataire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `réclamation`
--

CREATE TABLE `réclamation` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `réclamation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `doisser_medical`
--
ALTER TABLE `doisser_medical`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prestataire` (`id_prestataire`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prestataire`
--
ALTER TABLE `prestataire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_patient` (`id_patient`),
  ADD KEY `id_prestataire` (`id_prestataire`);

--
-- Index pour la table `réclamation`
--
ALTER TABLE `réclamation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `administrateur`
--
ALTER TABLE `administrateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `doisser_medical`
--
ALTER TABLE `doisser_medical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `prestataire`
--
ALTER TABLE `prestataire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `réclamation`
--
ALTER TABLE `réclamation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `doisser_medical`
--
ALTER TABLE `doisser_medical`
  ADD CONSTRAINT `doisser_medical_ibfk_1` FOREIGN KEY (`id_prestataire`) REFERENCES `prestataire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `rendez_vous_ibfk_1` FOREIGN KEY (`id_patient`) REFERENCES `patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rendez_vous_ibfk_2` FOREIGN KEY (`id_prestataire`) REFERENCES `prestataire` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
