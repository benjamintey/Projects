-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 15 fév. 2020 à 21:14
-- Version du serveur :  10.1.37-MariaDB
-- Version de PHP :  7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestionstock`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `Libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`ID`, `Libelle`) VALUES
(1, 'PC'),
(2, 'Imprimante'),
(3, 'Scanner');

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `Mailutilisateur` varchar(50) NOT NULL,
  `IDproduit` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Prix` double NOT NULL,
  `ID` int(11) NOT NULL,
  `Quantite` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commandes`
--

INSERT INTO `commandes` (`Mailutilisateur`, `IDproduit`, `Date`, `Prix`, `ID`, `Quantite`) VALUES
('admin@admin.fr', 1, '2019-12-12', 10000, 1, 10),
('admin@admin.fr', 1, '2019-12-12', 10000, 2, 10),
('admin@admin.fr', 3, '2019-12-12', 200, 3, 10),
('admin@admin.fr', 1, '2019-12-12', 10000, 4, 10),
('admin@admin.fr', 1, '2019-12-12', 1000, 5, 1),
('admin@admin.fr', 1, '2019-12-12', 2000, 6, 2);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `ID` int(11) NOT NULL,
  `commentaire` varchar(100) NOT NULL,
  `IDutilisateur` int(11) NOT NULL,
  `reponse` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

CREATE TABLE `marques` (
  `ID` int(11) NOT NULL,
  `Libelle` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`ID`, `Libelle`) VALUES
(1, 'Asus'),
(2, 'MSI'),
(3, 'Sony'),
(4, 'HP');

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `Reference` int(11) NOT NULL,
  `Libelle` varchar(50) NOT NULL,
  `Categorie` int(11) NOT NULL,
  `Marque` int(11) DEFAULT NULL,
  `Quantite` double NOT NULL,
  `Prix` double NOT NULL,
  `TVA` int(11) NOT NULL,
  `Description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produits`
--

INSERT INTO `produits` (`Reference`, `Libelle`, `Categorie`, `Marque`, `Quantite`, `Prix`, `TVA`, `Description`) VALUES
(1, 'asus vq1231', 1, 1, 467, 1000, 1, 'ecran 200hz gtx2080'),
(3, 'test', 1, 1, 90, 20, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `tva`
--

CREATE TABLE `tva` (
  `ID` int(11) NOT NULL,
  `Taux` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tva`
--

INSERT INTO `tva` (`ID`, `Taux`) VALUES
(1, 20),
(2, 10),
(3, 5.5),
(4, 2.1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Telephone` varchar(15) NOT NULL,
  `Adresse` varchar(50) NOT NULL,
  `Mdp` varchar(50) NOT NULL,
  `Sexe` varchar(50) DEFAULT NULL,
  `Situation` varchar(50) DEFAULT NULL,
  `DateNaissance` date DEFAULT NULL,
  `ID` int(11) NOT NULL,
  `Manager` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Nom`, `Prenom`, `Mail`, `Telephone`, `Adresse`, `Mdp`, `Sexe`, `Situation`, `DateNaissance`, `ID`, `Manager`) VALUES
('teyssier', 'wewe', 'admin@admin.fr', '0123456789', 'lolz', 'BenjaminTe', '', '', '0000-00-00', 3, 0),
('Teyssier', 'Benjamin', 'benji.tey@gmail.com', '0123456789', '29 rue léo et maurice trouilhet, 1er etage a droit', 'BenjaminTe', '', '', '0000-00-00', 2, 0),
('Grey', 'Benny', 'Swag@benny.fr', '0123456789', 'rue des genies', 'BenjaminTe', 'Homme', 'seul', '1998-03-17', 1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDproduit` (`IDproduit`),
  ADD KEY `Mailutilisateur` (`Mailutilisateur`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDutilisateur` (`IDutilisateur`);

--
-- Index pour la table `marques`
--
ALTER TABLE `marques`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`Reference`),
  ADD KEY `TVA` (`TVA`),
  ADD KEY `Categorie` (`Categorie`),
  ADD KEY `Marque` (`Marque`);

--
-- Index pour la table `tva`
--
ALTER TABLE `tva`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`Mail`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `Reference` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD CONSTRAINT `commandes_ibfk_1` FOREIGN KEY (`IDproduit`) REFERENCES `produits` (`Reference`),
  ADD CONSTRAINT `commandes_ibfk_2` FOREIGN KEY (`Mailutilisateur`) REFERENCES `utilisateurs` (`Mail`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_ibfk_1` FOREIGN KEY (`IDutilisateur`) REFERENCES `utilisateurs` (`ID`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`TVA`) REFERENCES `tva` (`ID`),
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`Categorie`) REFERENCES `categories` (`ID`),
  ADD CONSTRAINT `produits_ibfk_3` FOREIGN KEY (`Marque`) REFERENCES `marques` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
