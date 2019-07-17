
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 06 Septembre 2018 à 07:33
-- Version du serveur: 10.1.22-MariaDB
-- Version de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `u146666742_resum`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext NOT NULL,
  `officeNumber` varchar(1200) DEFAULT NULL,
  `labNumber` varchar(1200) DEFAULT NULL,
  `firstEmail` varchar(1200) DEFAULT NULL,
  `secondEmail` varchar(1200) DEFAULT NULL,
  `skype` varchar(1200) DEFAULT NULL,
  `twitter` varchar(1200) DEFAULT NULL,
  `linkedin` varchar(1200) DEFAULT NULL,
  `descriptionOffice` longtext NOT NULL,
  `descriptionWork` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id`, `description`, `officeNumber`, `labNumber`, `firstEmail`, `secondEmail`, `skype`, `twitter`, `linkedin`, `descriptionOffice`, `descriptionWork`) VALUES
(1, 'I would be happy to talk to you.', '2122 MK2', 'LMA', 'clemence.lenoir@ensae.fr', '', 'clemence lenoir', '', 'https://fr.linkedin.com/in/cl%C3%A9mence-lenoir-60a7673a', 'Second floor mk2', '');

-- --------------------------------------------------------

--
-- Structure de la table `description`
--

CREATE TABLE IF NOT EXISTS `description` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` longtext NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `description`
--

INSERT INTO `description` (`id`, `description`, `status`) VALUES
(1, 'My research interests are firms dynamics and the study of consequences of firms micro-funded phenomenon on macroeconomic aggregate : trade, growth, unemployment, etc.', 1),
(2, 'I wort at CREST', 2),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 3),
(4, 'Most of my teaching experiences are in ENSAE in statistics and economics.', 4);

-- --------------------------------------------------------

--
-- Structure de la table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lvl` varchar(520) NOT NULL,
  `obtaining` varchar(520) NOT NULL,
  `titleEducation` varchar(520) NOT NULL,
  `descriptionEducation` longtext NOT NULL,
  `myOrder` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `education`
--

INSERT INTO `education` (`id`, `lvl`, `obtaining`, `titleEducation`, `descriptionEducation`, `myOrder`) VALUES
(5, 'Ph.D', 'present', 'Ph.D Candidate in Economics', 'CREST', 0),
(6, 'Master', '2015', 'ENSAE Engineer diploma', 'Major in Data science', 2),
(10, 'License', '2010', 'Bachelor of Economics and Management', 'Ecole Normale Supérieure de Cachan', 3),
(8, 'Master ', '2015', 'Master Economic Analysis and Policy', 'Paris School of Economics, summa cum laude', 1);

-- --------------------------------------------------------

--
-- Structure de la table `experiment`
--

CREATE TABLE IF NOT EXISTS `experiment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateStart` varchar(520) NOT NULL,
  `dateEnd` varchar(520) NOT NULL,
  `titleExperiment` varchar(520) NOT NULL,
  `descriptionExperiment` longtext NOT NULL,
  `myOrder` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `experiment`
--

INSERT INTO `experiment` (`id`, `dateStart`, `dateEnd`, `titleExperiment`, `descriptionExperiment`, `myOrder`) VALUES
(21, '2016', 'present', 'Young Researcher ', 'CREST', 0),
(22, '2017', '2017', 'Visiting Student', 'Yale', 1);

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `picture` varchar(1200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `gallery`
--

INSERT INTO `gallery` (`id`, `picture`) VALUES
(5, 'calite.jpeg'),
(6, 'canard.jpeg'),
(7, 'loup2.jpg'),
(8, 'tigre4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `honor`
--

CREATE TABLE IF NOT EXISTS `honor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateObt` varchar(520) NOT NULL,
  `title` varchar(520) NOT NULL,
  `description` longtext NOT NULL,
  `myOrder` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `honor`
--

INSERT INTO `honor` (`id`, `dateObt`, `title`, `description`, `myOrder`) VALUES
(9, 'SCP 2014', 'Distinguished Scientific Achievement Award', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas dapibus lectus non dignissim. Pellentesque auctor ornare urna, volutpat condimentum quam porttitor at. Vestibulum tincidunt diam in eros aliquam luctus. Donec sagittis a purus a porttitor. Sed non feugiat enim. Donec eget metus erat. Vivamus sed consequat orci. Aenean commodo lectus sed purus auctor ullamcorper.', 0),
(10, ' 2012-2013', 'Ormond Family Faculty Fellow', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas dapibus lectus non dignissim. Pellentesque auctor ornare urna, volutpat condimentum quam porttitor at. Vestibulum tincidunt diam in eros aliquam luctus. Donec sagittis a purus a porttitor. Sed non feugiat enim. Donec eget metus erat. Vivamus sed consequat orci. Aenean commodo lectus sed purus auctor ullamcorper.', 1),
(11, 'June 2011', 'Nautilus Silver Award for Dragonfly Effect', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas dapibus lectus non dignissim. Pellentesque auctor ornare urna, volutpat condimentum quam porttitor at. Vestibulum tincidunt diam in eros aliquam luctus. Donec sagittis a purus a porttitor. Sed non feugiat enim. Donec eget metus erat. Vivamus sed consequat orci. Aenean commodo lectus sed purus auctor ullamcorper.', 2),
(12, '2000 - 2003', 'Hong Kong Science International Research Grant', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas dapibus lectus non dignissim. Pellentesque auctor ornare urna, volutpat condimentum quam porttitor at. Vestibulum tincidunt diam in eros aliquam luctus. Donec sagittis a purus a porttitor. Sed non feugiat enim. Donec eget metus erat. Vivamus sed consequat orci. Aenean commodo lectus sed purus auctor ullamcorper.', 3),
(13, '1999', 'Citibank Best Teacher Award (school-wide award, UCLA)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed egestas dapibus lectus non dignissim. Pellentesque auctor ornare urna, volutpat condimentum quam porttitor at. Vestibulum tincidunt diam in eros aliquam luctus. Donec sagittis a purus a porttitor. Sed non feugiat enim. Donec eget metus erat. Vivamus sed consequat orci. Aenean commodo lectus sed purus auctor ullamcorper.', 4);

-- --------------------------------------------------------

--
-- Structure de la table `interest`
--

CREATE TABLE IF NOT EXISTS `interest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(520) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Contenu de la table `interest`
--

INSERT INTO `interest` (`id`, `content`) VALUES
(32, 'Firms dynamics'),
(31, 'International Economics'),
(30, ' Trade');

-- --------------------------------------------------------

--
-- Structure de la table `laboratory`
--

CREATE TABLE IF NOT EXISTS `laboratory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(520) NOT NULL,
  `fonction` varchar(520) NOT NULL,
  `pic` varchar(520) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(520) NOT NULL,
  `profession` varchar(520) NOT NULL,
  `titleBio` varchar(520) NOT NULL,
  `bio` longtext NOT NULL,
  `avatar` varchar(520) NOT NULL,
  `resume` varchar(1200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `profil`
--

INSERT INTO `profil` (`id`, `name`, `profession`, `titleBio`, `bio`, `avatar`, `resume`) VALUES
(1, 'Clémence Lenoir', 'CREST PhD Candidate', 'Clémence Lenoir', '&lt;p&gt;I am a young researcher &amp;nbsp;in International Economics at &lt;a rel=&quot;noopener noreferrer&quot; href=&quot;http://www.crest.fr/&quot; target=&quot;_blank&quot;&gt;CREST&lt;/a&gt;, the research department of Economics of &lt;a rel=&quot;noopener noreferrer&quot; href=&quot;http://www.ensae.fr/ensae/en/&quot; target=&quot;_blank&quot;&gt;ENSAE&lt;/a&gt; and Ecole Polytechnique and write my PhD under the supervision of &lt;a rel=&quot;noopener noreferrer&quot; href=&quot;http://www.isabellemejean.com/&quot; target=&quot;_blank&quot;&gt;Isabelle M&amp;eacute;jean&lt;/a&gt; and &lt;a rel=&quot;noopener noreferrer&quot; href=&quot;http://www.crest.fr/ses.php?user=68&quot; target=&quot;_blank&quot;&gt;Francis Kramarz&lt;/a&gt;. Prior to joining CREST, I was a student at &lt;a rel=&quot;noopener noreferrer&quot; href=&quot;http://www.ens-cachan.fr/en&quot; target=&quot;_blank&quot;&gt;ENS Cachan&lt;/a&gt;, Paris School of Economics and ENSAE with a focus on Economics and Statistics.&lt;/p&gt;', 'labonnetrue.jpg', 'CV-Lenoir.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(520) NOT NULL,
  `description` varchar(520) NOT NULL,
  `content` longtext NOT NULL,
  `pic` varchar(520) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `project`
--

INSERT INTO `project` (`id`, `title`, `description`, `content`, `pic`) VALUES
(19, 'Exporters Dynamics', '   ', '&lt;p&gt;Abstract coming soon&lt;/p&gt;', ''),
(16, 'Seller-Buyer Matching in International Good Markets', 'Joint with Isabelle Mejean and Julien Martin', '&lt;p&gt;We develop a model of matching frictions in international good markets and study its implications for individual and aggregate trade flows. The model is an extension of the Eaton and Kortum (2002) framework to matching frictions. In each market, a finite number of buyers meet with a random number of sellers located domestically or abroad. Conditional on their random choice set, buyers choose the lowest cost supplier they have met. At the aggregate level, matching frictions have a monotonic and negative impact on bilateral trade flows, and thus do not differ from other sources of trade frictions. However, matching frictions affect individual exporters in an ambiguous way. Namely, small exporters do not benefit from less matching frictions since the randomness is what allows them to serve buyers that they would not be able to reach in a frictionless market, due to a lack of price competitiveness. Instead, highly productive firms always benefit from meeting with a larger share of each market. We use firm-to-firm trade data in the European Union to estimate the magnitude of such matching frictions. We discuss how this model helps understand the strong heterogeneity in the geography of firms&#039; exports.&lt;/p&gt;', 'matchingOK.png');

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE IF NOT EXISTS `publication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1200) NOT NULL,
  `author` varchar(1200) NOT NULL,
  `myRelease` varchar(1200) NOT NULL,
  `type` varchar(1200) NOT NULL,
  `file` varchar(1200) DEFAULT NULL,
  `link` varchar(1200) DEFAULT NULL,
  `content` longtext NOT NULL,
  `dateYear` varchar(1200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `publication`
--

INSERT INTO `publication` (`id`, `title`, `author`, `myRelease`, `type`, `file`, `link`, `content`, `dateYear`) VALUES
(4, 'Cultivating admiration in brands: Warmth, competence, and landing in the “golden quadrant”', 'Jennifer Doe, Emily N. Garbinsky, Kathleen D. Vohs', 'Journal of Consumer Psychology, Volume 22, Issue 2, April 2012, Pages 191-194', 'cpaper', NULL, 'http://www.sciencedirect.com/science/article/pii/S1057740812000290', 'Abstract\r\n\r\nAlthough a substantial amount of research has examined the constructs of warmth and competence, far less has examined how these constructs develop and what benefits may accrue when warmth and competence are cultivated. Yet there are positive consequences, both emotional and behavioral, that are likely to occur when brands hold perceptions of both. In this paper, we shed light on when and how warmth and competence are jointly promoted in brands, and why these reputations matter.', '2017-03-01'),
(5, 'Cultivating admiration in brands: Warmth, competence, and landing in the “golden quadrant”', 'Jennifer Doe, Emily N. Garbinsky, Kathleen D. Vohs', 'Journal of Consumer Psychology, Volume 22, Issue 2, April 2012, Pages 191-194', 'cpaper', NULL, 'http://www.sciencedirect.com/science/article/pii/S1057740812000290', 'Abstract\r\n\r\nAlthough a substantial amount of research has examined the constructs of warmth and competence, far less has examined how these constructs develop and what benefits may accrue when warmth and competence are cultivated. Yet there are positive consequences, both emotional and behavioral, that are likely to occur when brands hold perceptions of both. In this paper, we shed light on when and how warmth and competence are jointly promoted in brands, and why these reputations matter.', '2017-03-01'),
(6, 'Cultivating admiration in brands: Warmth, competence, and landing in the “golden quadrant”', 'Jennifer Doe, Emily N. Garbinsky, Kathleen D. Vohs', 'Journal of Consumer Psychology, Volume 22, Issue 2, April 2012, Pages 191-194', 'cpaper', NULL, 'http://www.sciencedirect.com/science/article/pii/S1057740812000290', 'Abstract\r\n\r\nAlthough a substantial amount of research has examined the constructs of warmth and competence, far less has examined how these constructs develop and what benefits may accrue when warmth and competence are cultivated. Yet there are positive consequences, both emotional and behavioral, that are likely to occur when brands hold perceptions of both. In this paper, we shed light on when and how warmth and competence are jointly promoted in brands, and why these reputations matter.', '2017-03-01'),
(7, 'Cultivating admiration in brands: Warmth, competence, and landing in the “golden quadrant”', 'Jennifer Doe, Emily N. Garbinsky, Kathleen D. Vohs', 'Journal of Consumer Psychology, Volume 22, Issue 2, April 2012, Pages 191-194', 'book', NULL, 'http://www.sciencedirect.com/science/article/pii/S1057740812000290', 'Abstract\r\n\r\nAlthough a substantial amount of research has examined the constructs of warmth and competence, far less has examined how these constructs develop and what benefits may accrue when warmth and competence are cultivated. Yet there are positive consequences, both emotional and behavioral, that are likely to occur when brands hold perceptions of both. In this paper, we shed light on when and how warmth and competence are jointly promoted in brands, and why these reputations matter.', '2017-03-01'),
(8, 'Cultivating admiration in brands: Warmth, competence, and landing in the “golden quadrant”', 'Jennifer Doe, Emily N. Garbinsky, Kathleen D. Vohs', 'Journal of Consumer Psychology, Volume 22, Issue 2, April 2012, Pages 191-194', 'bookchapter', NULL, 'http://www.sciencedirect.com/science/article/pii/S1057740812000290', 'Abstract\r\n\r\nAlthough a substantial amount of research has examined the constructs of warmth and competence, far less has examined how these constructs develop and what benefits may accrue when warmth and competence are cultivated. Yet there are positive consequences, both emotional and behavioral, that are likely to occur when brands hold perceptions of both. In this paper, we shed light on when and how warmth and competence are jointly promoted in brands, and why these reputations matter.', '2017-03-01'),
(9, 'Cultivating admiration in brands: Warmth, competence, and landing in the “golden quadrant”', 'Jennifer Doe, Emily N. Garbinsky, Kathleen D. Vohs', 'Journal of Consumer Psychology, Volume 22, Issue 2, April 2012, Pages 191-194', 'cpaper', NULL, 'http://www.sciencedirect.com/science/article/pii/S1057740812000290', 'Abstract\r\n\r\nAlthough a substantial amount of research has examined the constructs of warmth and competence, far less has examined how these constructs develop and what benefits may accrue when warmth and competence are cultivated. Yet there are positive consequences, both emotional and behavioral, that are likely to occur when brands hold perceptions of both. In this paper, we shed light on when and how warmth and competence are jointly promoted in brands, and why these reputations matter.', '2017-03-01'),
(10, 'Cultivating admiration in brands: Warmth, competence, and landing in the “golden quadrant”', 'Jennifer Doe, Emily N. Garbinsky, Kathleen D. Vohs', 'Journal of Consumer Psychology, Volume 22, Issue 2, April 2012, Pages 191-194', 'jpaper', NULL, 'http://www.sciencedirect.com/science/article/pii/S1057740812000290', 'Abstract\r\n\r\nAlthough a substantial amount of research has examined the constructs of warmth and competence, far less has examined how these constructs develop and what benefits may accrue when warmth and competence are cultivated. Yet there are positive consequences, both emotional and behavioral, that are likely to occur when brands hold perceptions of both. In this paper, we shed light on when and how warmth and competence are jointly promoted in brands, and why these reputations matter.', '2017-03-01'),
(11, 'Cultivating admiration in brands: Warmth, competence, and landing in the “golden quadrant”', 'Jennifer Doe, Emily N. Garbinsky, Kathleen D. Vohs', 'Journal of Consumer Psychology, Volume 22, Issue 2, April 2012, Pages 191-194', 'book', NULL, 'http://www.sciencedirect.com/science/article/pii/S1057740812000290', 'Abstract\r\n\r\nAlthough a substantial amount of research has examined the constructs of warmth and competence, far less has examined how these constructs develop and what benefits may accrue when warmth and competence are cultivated. Yet there are positive consequences, both emotional and behavioral, that are likely to occur when brands hold perceptions of both. In this paper, we shed light on when and how warmth and competence are jointly promoted in brands, and why these reputations matter.', '2017-03-01'),
(12, 'Cultivating admiration in brands: Warmth, competence, and landing in the “golden quadrant”', 'Jennifer Doe, Emily N. Garbinsky, Kathleen D. Vohs', 'Journal of Consumer Psychology, Volume 22, Issue 2, April 2012, Pages 191-194', 'bookchapter', NULL, 'http://www.sciencedirect.com/science/article/pii/S1057740812000290', 'Abstract\r\n\r\nAlthough a substantial amount of research has examined the constructs of warmth and competence, far less has examined how these constructs develop and what benefits may accrue when warmth and competence are cultivated. Yet there are positive consequences, both emotional and behavioral, that are likely to occur when brands hold perceptions of both. In this paper, we shed light on when and how warmth and competence are jointly promoted in brands, and why these reputations matter.', '2017-03-01');

-- --------------------------------------------------------

--
-- Structure de la table `teaching`
--

CREATE TABLE IF NOT EXISTS `teaching` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1200) NOT NULL,
  `content` longtext NOT NULL,
  `dateStart` varchar(1200) NOT NULL,
  `dateEnd` varchar(1200) NOT NULL,
  `status` int(11) NOT NULL,
  `myOrder` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Contenu de la table `teaching`
--

INSERT INTO `teaching` (`id`, `title`, `content`, `dateStart`, `dateEnd`, `status`, `myOrder`) VALUES
(22, 'Lecturer - Introduction to Economics', 'ENSAE\r\nLectures for first year students of ENSAE\r\n', '2016', 'present', 1, 0),
(23, 'T.A - Macroeconomics - Growth', 'ENSAE, Professor Olivier Loisel, First year of graduate studies (2nd year students of ENSAE)', '2016', 'present', 1, 0),
(21, 'T.A - Microeconomics', 'Université Paris-Descartes, Professor Marie-Cécile Fagart, Last year of undergraduate studies', '2013', '2014', 0, 2),
(20, 'T.A - Mathematics for Economists', 'Université Paris-Descartes, Professor Jeanneret-Cretez, First year of undergraduate studies', '2013', '2014', 0, 3),
(18, 'T.A - Measure Theory', 'ENSAE, Professor Arnak Dadalyan, Probability theory and measure theory for first year students of ENSAE', '2015', '2016', 0, 1),
(19, 'T.A - Advanced Statistics', 'ENSAE, Professor Alexandre Tsybakov, Graduate level course for  second year students of ENSAE', '2015', '2016', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(520) NOT NULL,
  `password` varchar(520) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'test.test@test.com', '$2y$10$Sw.N3Ue2FwbT7fifU0/9te0uWHNOlTcz6ffmwYIyk5X81.devv7ZK');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
