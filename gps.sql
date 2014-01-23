-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Jeu 23 Janvier 2014 à 12:30
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `gps`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE IF NOT EXISTS `appartenir` (
  `id_utilisateur` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`,`id_groupe`),
  KEY `id_groupe` (`id_groupe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `appartenir`
--

INSERT INTO `appartenir` (`id_utilisateur`, `id_groupe`) VALUES
(6, 1),
(7, 2);

-- --------------------------------------------------------

--
-- Structure de la table `avatar`
--

CREATE TABLE IF NOT EXISTS `avatar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  `avatar` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `batiment`
--

CREATE TABLE IF NOT EXISTS `batiment` (
  `id` int(11) NOT NULL,
  `posX` int(11) NOT NULL,
  `posY` int(11) NOT NULL,
  `id_type_etablissement` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_etablissement` (`id_type_etablissement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `detenir`
--

CREATE TABLE IF NOT EXISTS `detenir` (
  `id_etablissement` int(11) NOT NULL DEFAULT '0',
  `id_type_etablissement` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_etablissement`,`id_type_etablissement`),
  KEY `id_type_etablissement` (`id_type_etablissement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `disposer`
--

CREATE TABLE IF NOT EXISTS `disposer` (
  `id_formation` int(11) NOT NULL DEFAULT '0',
  `id_type_etablissement` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_formation`,`id_type_etablissement`),
  KEY `id_type_etablissement` (`id_type_etablissement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  `lien` text NOT NULL,
  `id_metier` int(11) DEFAULT NULL,
  `id_formation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_metier` (`id_metier`,`id_formation`),
  KEY `id_formation` (`id_formation`),
  KEY `id_formation_2` (`id_formation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  `id_secteur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_secteur` (`id_secteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`id`, `libelle`, `id_secteur`) VALUES
(1, 'informatique', 3);

-- --------------------------------------------------------

--
-- Structure de la table `donner`
--

CREATE TABLE IF NOT EXISTS `donner` (
  `id_groupe` int(11) NOT NULL,
  `id_droit` int(11) NOT NULL,
  PRIMARY KEY (`id_groupe`,`id_droit`),
  KEY `id_droit` (`id_droit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `donner`
--

INSERT INTO `donner` (`id_groupe`, `id_droit`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `droit`
--

CREATE TABLE IF NOT EXISTS `droit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `droit`
--

INSERT INTO `droit` (`id`, `nom`) VALUES
(1, 'utilisateur::list'),
(2, 'utilisateur::new'),
(3, 'utilisateur::edit'),
(4, 'utilisateur::delete');

-- --------------------------------------------------------

--
-- Structure de la table `etablissement`
--

CREATE TABLE IF NOT EXISTS `etablissement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  `adresse` varchar(40) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `cp` varchar(6) NOT NULL,
  `id_offrir` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_offrir` (`id_offrir`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `etablissement`
--

INSERT INTO `etablissement` (`id`, `libelle`, `adresse`, `ville`, `cp`, `id_offrir`) VALUES
(1, 'Henri Wallon', '16 place de la République', 'Valenciennes', '59300', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(20) NOT NULL,
  `libelle` varchar(20) NOT NULL,
  `descriptif` text NOT NULL,
  `nb_annee` int(1) NOT NULL,
  `serie` varchar(20) NOT NULL,
  `nom_diplome` varchar(20) NOT NULL,
  `niveau_diplome` varchar(10) NOT NULL,
  `id_avatar` int(11) DEFAULT NULL,
  `id_offrir` int(11) DEFAULT NULL,
  `id_formation` int(11) DEFAULT NULL,
  `id_type_formation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_palier` (`id_avatar`,`id_offrir`,`id_formation`),
  KEY `id_formation` (`id_formation`),
  KEY `id_offrir` (`id_offrir`),
  KEY `id_niveau` (`id_avatar`),
  KEY `id_niveau_2` (`id_avatar`),
  KEY `id_type_formation` (`id_type_formation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `format_document`
--

CREATE TABLE IF NOT EXISTS `format_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  `id_document` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_document` (`id_document`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `libelle`) VALUES
(1, 'admin'),
(2, 'cop');

-- --------------------------------------------------------

--
-- Structure de la table `metier`
--

CREATE TABLE IF NOT EXISTS `metier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  `id_secteur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_secteur` (`id_secteur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `offrir`
--

CREATE TABLE IF NOT EXISTS `offrir` (
  `id_formation` int(11) NOT NULL DEFAULT '0',
  `id_etablissement` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_formation`,`id_etablissement`),
  KEY `id_etablissement` (`id_etablissement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `option`
--

CREATE TABLE IF NOT EXISTS `option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  `id_formation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_formation` (`id_formation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `permettre`
--

CREATE TABLE IF NOT EXISTS `permettre` (
  `id_metier` int(11) NOT NULL,
  `id_specialite` int(11) NOT NULL,
  PRIMARY KEY (`id_metier`,`id_specialite`),
  KEY `id_specialite` (`id_specialite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `preparer`
--

CREATE TABLE IF NOT EXISTS `preparer` (
  `id_metier` int(11) NOT NULL DEFAULT '0',
  `id_formation` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_metier`,`id_formation`),
  KEY `id_formation` (`id_formation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_question` text NOT NULL,
  `reponse1` text NOT NULL,
  `reponse2` text NOT NULL,
  `reponse3` text NOT NULL,
  `reponse4` text NOT NULL,
  `num_bonne_rep` int(1) NOT NULL,
  `num_page_indice` int(2) NOT NULL,
  `id_document` int(11) NOT NULL,
  `id_formation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_formation` (`id_formation`),
  KEY `id_document` (`id_document`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `secteur`
--

CREATE TABLE IF NOT EXISTS `secteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `secteur`
--

INSERT INTO `secteur` (`id`, `libelle`) VALUES
(1, 'Primaire '),
(2, 'Secondaire '),
(3, 'Tertiaire');

-- --------------------------------------------------------

--
-- Structure de la table `specialite`
--

CREATE TABLE IF NOT EXISTS `specialite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(25) NOT NULL,
  `id_formation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_formation` (`id_formation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type_document`
--

CREATE TABLE IF NOT EXISTS `type_document` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  `id_document` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_document` (`id_document`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type_etablissement`
--

CREATE TABLE IF NOT EXISTS `type_etablissement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type_formation`
--

CREATE TABLE IF NOT EXISTS `type_formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `add_mail` varchar(25) NOT NULL,
  `id_etablissement` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_etablissement` (`id_etablissement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `login`, `mdp`, `nom`, `prenom`, `add_mail`, `id_etablissement`) VALUES
(6, 'admin', 'admin', 'David', 'Riehl', 'data.riehl@gmail.com', NULL),
(7, 'cop', 'cop', 'qfrkltgnsefk,gfd', 'Yep', 'yoyo', NULL);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `appartenir_ibfk_1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`),
  ADD CONSTRAINT `appartenir_ibfk_2` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id`);

--
-- Contraintes pour la table `batiment`
--
ALTER TABLE `batiment`
  ADD CONSTRAINT `batiment_ibfk_1` FOREIGN KEY (`id_type_etablissement`) REFERENCES `type_etablissement` (`id`);

--
-- Contraintes pour la table `detenir`
--
ALTER TABLE `detenir`
  ADD CONSTRAINT `detenir_ibfk_2` FOREIGN KEY (`id_type_etablissement`) REFERENCES `type_etablissement` (`id`),
  ADD CONSTRAINT `detenir_ibfk_1` FOREIGN KEY (`id_etablissement`) REFERENCES `etablissement` (`id`);

--
-- Contraintes pour la table `disposer`
--
ALTER TABLE `disposer`
  ADD CONSTRAINT `disposer_ibfk_2` FOREIGN KEY (`id_type_etablissement`) REFERENCES `type_etablissement` (`id`),
  ADD CONSTRAINT `disposer_ibfk_1` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id`);

--
-- Contraintes pour la table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `document_ibfk_1` FOREIGN KEY (`id_metier`) REFERENCES `metier` (`id`),
  ADD CONSTRAINT `document_ibfk_2` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id`);

--
-- Contraintes pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD CONSTRAINT `domaine_ibfk_1` FOREIGN KEY (`id_secteur`) REFERENCES `secteur` (`id`);

--
-- Contraintes pour la table `donner`
--
ALTER TABLE `donner`
  ADD CONSTRAINT `donner_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES `groupe` (`id`),
  ADD CONSTRAINT `donner_ibfk_2` FOREIGN KEY (`id_droit`) REFERENCES `droit` (`id`);

--
-- Contraintes pour la table `etablissement`
--
ALTER TABLE `etablissement`
  ADD CONSTRAINT `etablissement_ibfk_1` FOREIGN KEY (`id_offrir`) REFERENCES `offrir` (`id_etablissement`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `formation_ibfk_2` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `formation_ibfk_4` FOREIGN KEY (`id_offrir`) REFERENCES `offrir` (`id_formation`),
  ADD CONSTRAINT `formation_ibfk_5` FOREIGN KEY (`id_avatar`) REFERENCES `avatar` (`id`),
  ADD CONSTRAINT `formation_ibfk_6` FOREIGN KEY (`id_type_formation`) REFERENCES `type_formation` (`id`);

--
-- Contraintes pour la table `format_document`
--
ALTER TABLE `format_document`
  ADD CONSTRAINT `format_document_ibfk_1` FOREIGN KEY (`id_document`) REFERENCES `document` (`id`);

--
-- Contraintes pour la table `metier`
--
ALTER TABLE `metier`
  ADD CONSTRAINT `metier_ibfk_1` FOREIGN KEY (`id_secteur`) REFERENCES `domaine` (`id`);

--
-- Contraintes pour la table `option`
--
ALTER TABLE `option`
  ADD CONSTRAINT `option_ibfk_1` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id`);

--
-- Contraintes pour la table `permettre`
--
ALTER TABLE `permettre`
  ADD CONSTRAINT `permettre_ibfk_2` FOREIGN KEY (`id_specialite`) REFERENCES `specialite` (`id`),
  ADD CONSTRAINT `permettre_ibfk_1` FOREIGN KEY (`id_metier`) REFERENCES `metier` (`id`);

--
-- Contraintes pour la table `preparer`
--
ALTER TABLE `preparer`
  ADD CONSTRAINT `preparer_ibfk_2` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `preparer_ibfk_1` FOREIGN KEY (`id_metier`) REFERENCES `metier` (`id`);

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`id_document`) REFERENCES `document` (`id`),
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id`);

--
-- Contraintes pour la table `specialite`
--
ALTER TABLE `specialite`
  ADD CONSTRAINT `specialite_ibfk_1` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id`);

--
-- Contraintes pour la table `type_document`
--
ALTER TABLE `type_document`
  ADD CONSTRAINT `type_document_ibfk_1` FOREIGN KEY (`id_document`) REFERENCES `document` (`id`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_2` FOREIGN KEY (`id_etablissement`) REFERENCES `etablissement` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
