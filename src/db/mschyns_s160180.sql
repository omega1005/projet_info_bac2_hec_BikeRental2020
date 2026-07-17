-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 07 Mai 2020 à 09:46
-- Version du serveur :  5.5.60-MariaDB
-- Version de PHP :  7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mschyns_s160180`
--

-- --------------------------------------------------------

--
-- Structure de la table `Client`
--

CREATE TABLE IF NOT EXISTS `Client` (
  `id_client` varchar(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `date_naissance` date NOT NULL,
  `id_ville` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Client`
--

INSERT INTO `Client` (`id_client`, `nom`, `prenom`, `email`, `telephone`, `date_naissance`, `id_ville`) VALUES
('Bordeaux-0722 ', 'Bordeaux', 'Angelique', 'AngeliqueBordeaux28@live.fr', '+32472976334', '1953-07-22', 'Bastogne-6600'),
('Brousseau-0811', 'Brousseau', 'Cerise', 'CeriseBrousseau@gmail.com', '+32493141554', '1958-08-11', 'Ans-4430'),
('Champagne-0504', 'Champagne', 'Andre', 'AndreChampagne@skynet.com', '+32496938232', '1949-05-04', 'Gant-9000'),
('Charbonneau-0903', 'Charbonneau', 'Marshall', 'MarshallCharbonneau@hotmail.fr', '+32499495838', '1949-09-03', 'Arlon-6700'),
('Duchateau-2506', 'Duchateau', 'Pascal', 'pascalduch10@gmail.com', '+32497637898', '1990-06-25', 'Coxyde-8670'),
('Dupont-0313', 'Dupont', 'Afrodille', 'AfrodilleDupont@hotmail.com', '+32481413446', '1941-03-13', 'Barchon-4671'),
('Gabriaux-1206', 'Gabriaux', 'Javier', 'JavierGabriaux15@gmail.com', '+32484649377', '1943-06-12', 'Esneux-4130'),
('Gervais-0217', 'Gervais', 'Bartlett', 'BartlettGervais@hotmail.fr', '+32481458647', '1980-02-17', 'Couvin-5660'),
('Goulet-0506', 'Goulet', 'Ray', 'RayGoulet1992@teleworm.com', '+32492687684', '1992-06-05', 'Liege-4000'),
('Grenier-0305', 'Grenier', 'Nicholas', 'NicholasGrenier@fleckens.hu', '+32484177455', '2000-05-03', 'Angleur-4031'),
('Guernon-2704', 'Guernon', 'Amber', 'AmberGuernon@superrito.com', '+32489438453', '1995-04-27', 'Barchon-4671'),
('Jacques-0307', 'Jacques', 'Alaine', 'AlaineJacques@cuvox.de', '+32476778734', '1989-07-03', 'Mons-7000'),
('Jacques-0802', 'Jacques', 'Corette', 'CoretteJacques@gmail.com', '+32483546299', '2000-02-08', 'Wavre-1300'),
('Laboissonniere-1511', 'Laboissonniere', 'Percy', 'PercyLaboissonniere@cuvox.de', '+32489572841', '1981-11-15', 'Arlon-6700'),
('Lacasse-0101', 'Lacasse', 'Ophelia', 'OpheliaLacasse@gmail.com', '+32489133198', '1979-01-01', 'Bruxelles-1000'),
('Lazure-0707', 'Lazure', 'Denis', 'DenisLazure@gustr.com', '+32480433148 ', '1946-07-07', 'Huy-4500'),
('Lepage-1108', 'Lepage', 'Celine', 'CelineLepage@gmail.com', '+32477294582', '1972-08-11', 'Namur-5000'),
('Lucas-0503', 'Lucas', 'Denis', 'modexstore@gmail.com', '+32497637864', '1990-03-05', 'Liege-4000'),
('Marcoux-1902', 'Marcoux', 'Pierre', 'PierreMarcoux@teleworm.us', '+32491356969', '1973-02-19', 'Spa-4900'),
('Paradis-3010', 'Paradis', 'Amelie', 'AmelieParadis@dayrep.com', '+32497466705', '1947-10-30', 'Huy-4500'),
('Pelletier-2210', 'Pelletier', 'Maslin', 'PaulPoissonnier@live.fr', '+32495951527', '1998-10-22', 'Angleur-4031'),
('Poisson-2502', 'Poisson', 'Nathalie', 'NathaliePoisson@outlook.com', '+32483943462', '1952-02-25', 'Gant-9000'),
('Pouchard-2803', 'Pouchard', 'Marc', 'MarcPouchard@yopmail.com', '+32497637861', '1963-03-28', 'Gembloux-5030'),
('Quirion-1407', 'Quirion', 'Jeanne', 'JeanneQuirion@cuvox.de', '+32481287193', '1978-07-14', 'Namur-5000'),
('Raymond-0409', 'Raymond', 'Marmion', 'MarmionRaymond@hotmail.com', '+32479953831', '1988-09-04', 'Ans-4430'),
('Remy-2409', 'Remy', 'Marc', 'marcremy100@outook.fr', '+32497637874', '1960-09-24', 'Ans-4430'),
('Ricard-2205', 'Ricard', 'Travis', 'TravisRicard@hotmail.fr', '+32497637860', '1958-05-22', 'Amay-4540'),
('Sabourin-0511', 'Sabourin', 'Isabelle', 'IsabelleSabourin@gustr.com', '+32492105495', '1976-11-05', 'Angleur-4031'),
('Saucier-1901', 'Saucier', 'Celine', 'CelineSaucier@teleworm.us', '+32491203272', '1974-01-19', 'Namur-5000'),
('Vadnais-1607', 'Vadnais', 'Gerard', 'GerardVadnais@teleworm.us', '+32497637868', '1976-07-16', 'Namur-5000');

-- --------------------------------------------------------

--
-- Structure de la table `Localisation`
--

CREATE TABLE IF NOT EXISTS `Localisation` (
  `id_localisation` varchar(20) NOT NULL,
  `nom_loc` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `id_ville` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Localisation`
--

INSERT INTO `Localisation` (`id_localisation`, `nom_loc`, `description`, `id_ville`) VALUES
('Artois-1906', 'Charleroi Airport', 'Aeroport', 'Charleroi-6000'),
('Bernard-0507', 'Gare de Flemalle Haute', 'Gare', 'Flemalle-4400'),
('Blanchard-0809', 'Gare de Gembloux', 'Gare', 'Gembloux-5030'),
('Blondlot-1303', 'Hotel sur la cote belge', 'Hotel', 'Knokke-8300'),
('Bouvier-1806', 'Gare de Louvain la Neuve', 'Gare', 'Ottignies-1340'),
('Calandre-0606', 'Office du tourisme Walibi', 'Office du tourisme', 'Wavre-1300'),
('Dubois-0626', 'Hotel centre de Mons', 'Hotel', 'Mons-7000'),
('Dumoulin-1005', 'Gare de Namur', 'Gare', 'Namur-5000'),
('Dupont-0511', 'Gare des Guillemin', 'Gare', 'Liege-4000'),
('Faubert-1010', 'Office du tourisme Couvin', 'Office du tourisme', 'Couvin-5660'),
('Gilbert-1005', 'Gare de Huy', 'Gare', 'Huy-4500'),
('Lamoureux-2504', 'Office du tourisme Esneux', 'Office du tourisme', 'Esneux-4130'),
('Price-1002', 'Brussels Airport', 'Aeroport', 'Bruxelles-1000'),
('Rouleau-3105', 'Liege airport', 'Aeroport', 'Liege-4000'),
('Vachon-2808', 'Hotel dans Bruges centre', 'Hotel', 'Bruges-8000');

-- --------------------------------------------------------

--
-- Structure de la table `Location`
--

CREATE TABLE IF NOT EXISTS `Location` (
  `id_location` varchar(20) NOT NULL,
  `date_location` date NOT NULL,
  `duree_location` varchar(3) NOT NULL,
  `prix_location` varchar(3) NOT NULL,
  `id_client` varchar(20) NOT NULL,
  `id_velo` varchar(20) NOT NULL,
  `id_responsable` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Location`
--

INSERT INTO `Location` (`id_location`, `date_location`, `duree_location`, `prix_location`, `id_client`, `id_velo`, `id_responsable`) VALUES
('BE-0008', '2020-04-24', '2', '100', 'Gervais-0217', 'VELO-003-50', 'Dupont-0511'),
('BE-0009', '2020-04-25', '3', '90', 'Guernon-2704', 'VELO-007-30', 'Bouvier-1806'),
('BE-0004', '2020-04-28', '1', '30', 'Dupont-0313', 'VELO-027-30', 'Artois-1906'),
('BE-0001', '2020-05-10', '2', '50', 'Ricard-2205', 'VELO-001-25', 'Dumoulin-1005'),
('BE-0011', '2020-05-25', '3', '30', 'Ricard-2205', 'VELO-006-10', 'Blondlot-1303'),
('BE-0002', '2020-05-25', '2', '50', 'Charbonneau-0903', 'VELO-014-25', 'Vachon-2808'),
('BE-0010', '2020-05-30', '2', '40', 'Ricard-2205', 'VELO-018-20', 'Blanchard-0809'),
('BE-0005', '2020-06-06', '2', '20', 'Pouchard-2803', 'VELO-013-10', 'Artois-1906'),
('BE-0006', '2020-06-20', '2', '50', 'Ricard-2205', 'VELO-030-25', 'Vachon-2808'),
('BE-0003', '2020-06-30', '5', '250', 'Poisson-2502', 'VELO-017-50', 'Rouleau-3105'),
('BE-0012', '2020-07-12', '2', '60', 'Bordeaux-0722 ', 'VELO-008-30', 'Bernard-0507'),
('BE-0015', '2020-07-15', '1', '15', 'Ricard-2205', 'VELO-024-15', 'Calandre-0606'),
('BE-0023', '2020-07-23', '2', '100', 'Jacques-0307', 'VELO-004-50', 'Lamoureux-2504'),
('BE-0020', '2020-08-01', '2', '60', 'Saucier-1901', 'VELO-027-30', 'Artois-1906'),
('BE-0007', '2020-08-10', '5', '50', 'Lacasse-0101', 'VELO-016-10', 'Bernard-0507'),
('BE-0013', '2020-08-13', '1', '50', 'Ricard-2205', 'VELO-017-50', 'Rouleau-3105'),
('BE-0017', '2020-08-18', '3', '60', 'Laboissonniere-1511', 'VELO-018-20', 'Blanchard-0809'),
('BE-0019', '2020-08-19', '3', '30', 'Marcoux-1902', 'VELO-013-10', 'Price-1002'),
('BE-0014', '2020-08-20', '1', '30', 'Bordeaux-0722 ', 'VELO-027-30', 'Artois-1906'),
('BE-0015', '2020-08-25', '2', '30', 'Quirion-1407', 'VELO-023-15', 'Dubois-0626'),
('BE-0021', '2020-09-03', '3', '150', 'Jacques-0802', 'VELO-022-50', 'Artois-1906'),
('BE-0016', '2020-09-16', '2', '50', 'Guernon-2704', 'VELO-001-25', 'Dumoulin-1005'),
('BE-0018', '2020-09-18', '2', '20', 'Charbonneau-0903', 'VELO-021-10', 'Blondlot-1303'),
('BE-0022', '2020-09-22', '7', '350', 'Ricard-2205', 'VELO-003-50', 'Dupont-0511'),
('BE-0024', '2020-09-24', '1', '15', 'Goulet-0506', 'VELO-023-15', 'Dubois-0626'),
('BE-0026', '2020-09-26', '1', '25', 'Ricard-2205', 'VELO-009-25', 'Calandre-0606'),
('BE-0027', '2020-09-29', '2', '100', 'Paradis-3010', 'VELO-017-50', 'Rouleau-3105'),
('BE-0033', '2020-10-16', '3', '45', 'Lazure-0707', 'VELO-015-15', 'Dumoulin-1005'),
('BE-0025', '2020-10-25', '10', '250', 'Charbonneau-0903', 'VELO-005-25', 'Lamoureux-2504'),
('BE-0028', '2020-11-28', '3', '45', 'Lepage-1108', 'VELO-015-15', 'Dumoulin-1005'),
('BE-0030', '2020-12-12', '2', '30', 'Laboissonniere-1511', 'VELO-028-15', 'Bouvier-1806'),
('BE-0029', '2020-12-16', '10', '250', 'Ricard-2205', 'VELO-014-25', 'Vachon-2808'),
('BE-0031', '2020-12-31', '6', '300', 'Ricard-2205', 'VELO-022-50', 'Artois-1906');

-- --------------------------------------------------------

--
-- Structure de la table `Responsable`
--

CREATE TABLE IF NOT EXISTS `Responsable` (
  `id_responsable` varchar(20) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `date_naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Responsable`
--

INSERT INTO `Responsable` (`id_responsable`, `nom`, `prenom`, `email`, `telephone`, `date_naissance`) VALUES
('Artois-1906', 'Artois', 'Noemie', 'noemieartois@live.fr', '+3248378335', '1967-06-19'),
('Bernard-0507', 'Bernard', 'Mathilde', 'bern.math@live.fr', '+32472209451', '1980-07-05'),
('Blanchard-0809', 'Blanchard', 'Xavier', 'xavierblanchard100@hotmail.com', '+32493371999', '1988-09-08'),
('Blondlot-1303', 'Blondlot', 'Jacques', 'jacques.blondlot58@gmail.com', '+32496878754', '1959-03-13'),
('Bouvier-1806', 'Bouvier', 'Jean', 'jeanbou1806@gmail.com', '+3246121485', '1963-06-18'),
('Calandre-0606', 'Calandre', 'Gauthier', 'gauthiercalandre0606@outlook.com', '+32489148786', '1978-06-06'),
('Dubois-0626', 'Dubois', 'Nicolas', 'nicolasdubois1036@hotmail.com', '+32496168457', '1998-04-01'),
('Dumoulin-1005', 'Dumoulin', 'Maxime', 'dummax15@gmail.com', '+32497637864', '1998-05-10'),
('Dupont-0511', 'Dupont', 'Pierre', 'pierredupon@outlook.com', '+32497548754', '1990-11-05'),
('Faubert-1010', 'Faubert', 'Patricia', 'patriciafaubert25@outlook.fr', '+32497637869', '1998-10-10'),
('Gilbert-1005', 'Gilbert', 'Denis', 'denisgilbert@gmail.com', '+32496787854', '1960-05-10'),
('Lamoureux-2504', 'Lamoureux', 'Phillipe', 'phillipelamoureux1@gmail.com', '+32497637867', '1982-04-25'),
('Price-1002', 'Price', 'Thomas', 'thomasprice@gmail.com', '+32497648531', '1991-02-10'),
('Rouleau-3105', 'Rouleau', 'Julien', 'julienrouleau105@gmail.com', '+32497541247', '1977-05-31'),
('Vachon-2808', 'Vachon', 'Pauline', 'paupauvachon@gmail.com', '+32497637861', '1990-08-28');

-- --------------------------------------------------------

--
-- Structure de la table `Type_velo`
--

CREATE TABLE IF NOT EXISTS `Type_velo` (
  `id_type_velo` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Type_velo`
--

INSERT INTO `Type_velo` (`id_type_velo`, `type`) VALUES
('BMX', 'TYP-013'),
('Cargo', 'TYP-008'),
('Couche(2roues)', 'TYP-011'),
('Couche(3roues)', 'TYP-012'),
('Course', 'TYP-001'),
('Electrique', 'TYP-005'),
('Enfant', 'TYP-017'),
('Hollandais', 'TYP-006'),
('Pliant', 'TYP-004'),
('Route', 'TYP-010'),
('Sport', 'TYP-003'),
('Tendem(2personnes)', 'TYP-014'),
('Tendem(3personnes)', 'TYP-015'),
('Ville', 'TYP-002'),
('Vintage', 'TYP-016'),
('VTC', 'TYP-007'),
('VTT', 'TYP-009');

-- --------------------------------------------------------

--
-- Structure de la table `Velo`
--

CREATE TABLE IF NOT EXISTS `Velo` (
  `id_velo` varchar(50) NOT NULL,
  `date_achat` date NOT NULL,
  `prix_velo` varchar(20) NOT NULL,
  `description` varchar(250) NOT NULL,
  `prix_location` varchar(20) NOT NULL,
  `id_type_velo` varchar(50) NOT NULL,
  `id_localisation` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Velo`
--

INSERT INTO `Velo` (`id_velo`, `date_achat`, `prix_velo`, `description`, `prix_location`, `id_type_velo`, `id_localisation`) VALUES
('VELO-001-25', '2019-05-20', '1300', 'Velo taille moyenne', '25', 'Couche(2roues)', 'Dumoulin-1005'),
('VELO-002-10', '2017-10-05', '900', 'Velo petite taille', '10', 'Pliant', 'Gilbert-1005'),
('VELO-003-50', '2012-05-26', '2500', 'Velo grande taille', '50', 'Electrique', 'Dupont-0511'),
('VELO-004-50', '2019-03-01', '5000', 'Velo grande taille', '50', 'Course', 'Lamoureux-2504'),
('VELO-005-25', '2018-07-30', '1200', 'Velo grande taille', '25', 'Electrique', 'Lamoureux-2504'),
('VELO-006-10', '2017-11-20', '800', 'Velo petite taille', '10', 'Route', 'Blondlot-1303'),
('VELO-007-30', '2015-07-05', '1600', 'Velo grande taille', '30', 'Sport', 'Bouvier-1806'),
('VELO-008-30', '2016-08-08', '2200', 'Velo grande taille', '30', 'VTT', 'Bernard-0507'),
('VELO-009-25', '2018-09-09', '1200', 'Velo taille moyenne', '25', 'VTC', 'Calandre-0606'),
('VELO-010-50', '2010-10-10', '3500', 'Velo grande taille', '50', 'Electrique', 'Artois-1906'),
('VELO-011-10', '2011-11-11', '500', 'Velo petite taille', '10', 'BMX', 'Bouvier-1806'),
('VELO-012-15', '2012-12-12', '800', 'Velo grande taille', '15', 'Tendem(2personnes)', 'Dupont-0511'),
('VELO-013-10', '2009-10-05', '1200', 'Velo grande taille', '10', 'Hollandais', 'Price-1002'),
('VELO-014-25', '2013-05-14', '3000', 'Velo grande taille', '25', 'Couche(3roues)', 'Vachon-2808'),
('VELO-015-15', '2017-09-15', '1300', 'Velo petite taille', '15', 'Vintage', 'Dumoulin-1005'),
('VELO-016-10', '2016-07-16', '500', 'Velo petite taille', '10', 'Enfant', 'Bernard-0507'),
('VELO-017-50', '2017-06-17', '6000', 'Velo taille moyenne', '50', 'Electrique', 'Rouleau-3105'),
('VELO-018-20', '2018-07-18', '1700', 'Velo grande taille', '20', 'VTT', 'Blanchard-0809'),
('VELO-019-15', '2013-05-19', '650', 'Velo petite taille', '15', 'Route', 'Gilbert-1005'),
('VELO-020-20', '2018-06-20', '2300', 'Velo grande taille', '20', 'Tendem(3personnes)', 'Bernard-0507'),
('VELO-021-10', '2015-03-21', '500', 'Velo petite taille', '10', 'Pliant', 'Blondlot-1303'),
('VELO-022-50', '2017-03-22', '6800', 'Velo grande taille', '50', 'Course', 'Artois-1906'),
('VELO-023-15', '2018-09-23', '800', 'Velo taille moyenne', '15', 'Cargo', 'Dubois-0626'),
('VELO-024-15', '2017-10-24', '1600', 'Velo grande taille', '15', 'Ville', 'Calandre-0606'),
('VELO-025-15', '2016-11-25', '1200', 'Velo grande taille', '15', 'Route', 'Vachon-2808'),
('VELO-027-30', '2019-08-27', '1200', 'Velo petite taille', '30', 'Couche(2roues)', 'Artois-1906'),
('VELO-028-15', '2018-12-28', '1400', 'Velo grande taille', '15', 'VTT', 'Bouvier-1806'),
('VELO-029-20', '2016-06-29', '1500', 'Velo grande taille', '20', 'Route', 'Price-1002'),
('VELO-030-25', '2013-08-30', '2500', 'Velo taille moyenne', '25', 'Electrique', 'Vachon-2808');

-- --------------------------------------------------------

--
-- Structure de la table `Ville`
--

CREATE TABLE IF NOT EXISTS `Ville` (
  `id_ville` varchar(20) NOT NULL,
  `code_postal` varchar(4) NOT NULL,
  `nom_ville` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `Ville`
--

INSERT INTO `Ville` (`id_ville`, `code_postal`, `nom_ville`) VALUES
('Amay-4540', '4540', 'Amay'),
('Andenne-5300', '5300', 'Andenne'),
('Angleur-4031', '4031', 'Angleur'),
('Ans-4430', '4430', 'Ans'),
('Anvers-2000', '2000', 'Anvers'),
('Arlon-6700', '6700', 'Arlon'),
('Barchon-4671', '4671', 'Barchon'),
('Bastogne-6600', '6600', 'Bastogne'),
('Bruges-8000', '8000', 'Bruges'),
('Bruxelles-1000', '1000', 'Bruxelles'),
('Charleroi-6000', '6000', 'Charleroi'),
('Couvin-5660', '5660', 'Couvin'),
('Coxyde-8670', '8670', 'Coxyde'),
('Esneux-4130', '4130', 'Esneux'),
('Eupen-4700', '4700', 'Eupen'),
('Flemalle-4400', '4400', 'Flemalle'),
('Gant-9000', '9000', 'Gant'),
('Gembloux-5030', '5030', 'Gembloux'),
('Hasselt-3500', '3500', 'Hasselt'),
('Herstal-4040', '4040', 'Herstal'),
('Huy-4500', '4500', 'Huy'),
('Knokke-8300', '8300', 'Knokke'),
('Liege-4000', '4000', 'Liege'),
('Mons-7000', '7000', 'Mons'),
('Namur-5000', '5000', 'Namur'),
('Ottignies-1340', '1340', 'Ottignies'),
('Philippeville-5600', '5600', 'Philippeville'),
('Seraing-4100', '4100', 'Seraing'),
('Spa-4900', '4900', 'Spa'),
('Wavre-1300', '1300', 'Wavre');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `id_ville` (`id_ville`);

--
-- Index pour la table `Localisation`
--
ALTER TABLE `Localisation`
  ADD PRIMARY KEY (`id_localisation`),
  ADD KEY `id_ville` (`id_ville`);

--
-- Index pour la table `Location`
--
ALTER TABLE `Location`
  ADD PRIMARY KEY (`date_location`,`id_velo`),
  ADD KEY `id_velo` (`id_velo`);

--
-- Index pour la table `Responsable`
--
ALTER TABLE `Responsable`
  ADD PRIMARY KEY (`id_responsable`);

--
-- Index pour la table `Type_velo`
--
ALTER TABLE `Type_velo`
  ADD PRIMARY KEY (`id_type_velo`);

--
-- Index pour la table `Velo`
--
ALTER TABLE `Velo`
  ADD PRIMARY KEY (`id_velo`),
  ADD KEY `id_type_velo` (`id_type_velo`),
  ADD KEY `id_localisation` (`id_localisation`);

--
-- Index pour la table `Ville`
--
ALTER TABLE `Ville`
  ADD PRIMARY KEY (`id_ville`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Client`
--
ALTER TABLE `Client`
  ADD CONSTRAINT `Client_ibfk_1` FOREIGN KEY (`id_ville`) REFERENCES `Ville` (`id_ville`);

--
-- Contraintes pour la table `Localisation`
--
ALTER TABLE `Localisation`
  ADD CONSTRAINT `Localisation_ibfk_1` FOREIGN KEY (`id_localisation`) REFERENCES `Responsable` (`id_responsable`),
  ADD CONSTRAINT `Localisation_ibfk_2` FOREIGN KEY (`id_ville`) REFERENCES `Ville` (`id_ville`);

--
-- Contraintes pour la table `Location`
--
ALTER TABLE `Location`
  ADD CONSTRAINT `Location_ibfk_1` FOREIGN KEY (`id_velo`) REFERENCES `Velo` (`id_velo`);

--
-- Contraintes pour la table `Velo`
--
ALTER TABLE `Velo`
  ADD CONSTRAINT `Velo_ibfk_1` FOREIGN KEY (`id_type_velo`) REFERENCES `Type_velo` (`id_type_velo`),
  ADD CONSTRAINT `Velo_ibfk_2` FOREIGN KEY (`id_localisation`) REFERENCES `Localisation` (`id_localisation`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
