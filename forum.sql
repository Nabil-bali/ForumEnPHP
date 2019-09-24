-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 24 sep. 2019 à 09:29
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auteur` varchar(225) NOT NULL,
  `titre` varchar(225) NOT NULL,
  `contenu` text NOT NULL,
  `date_crea` date NOT NULL,
  `tag` varchar(225) NOT NULL,
  `img` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `auteur`, `titre`, `contenu`, `date_crea`, `tag`, `img`) VALUES
(1, 'Nabil', 'Le PHP, qu\'est ce que c\'est ?', 'PHP: Hypertext Preprocessor5, plus connu sous son sigle PHP (sigle auto-référentiel), est un langage de programmation libre6, principalement utilisé pour produire des pages Web dynamiques via un serveur HTTP5, mais pouvant également fonctionner comme n\'importe quel langage interprété de façon locale. PHP est un langage impératif orienté objet.\r\n\r\nPHP a permis de créer un grand nombre de sites web célèbres, comme Facebook, Wikipédia, etc.7 Il est considéré comme une des bases de la création de sites web dits dynamiques mais également des applications web.', '2019-09-18', 'Back-end', 'images\\php7.jpg'),
(2, 'Nabil ', 'Obtenez Une Certification Html5 Gratuitement Avec Microsoft', 'Le W3c l’avait annoncé lors d’un communiqué officiel, la finalisation du langage HTML5 avec une version Candidate Recommendation (pré-finale). Vous souhaitez créer des applications en utilisant HTML5, Microsoft offre gratuitement des cours virtuels sur l’HTML5 désignées « Développer les applications en HTML5 avec JavaScript et CSS3 ». Microsoft ne s’arrête pas là, il propose également un certification Html5 gratuitement', '2019-09-18', 'Front-end', 'images\\html5.jpg'),
(3, 'Nabil', 'Les Effets De L’html5 Sur Le Référencement Naturel Seo', 'L’Html5 offre une flexibilité pour les développeurs web et les concepteurs. Combiné avec le Css3, l’Html5 peut créer de la magie dans le développement web. Il peut remplacer les animations Flash dans une large mesure.\r\n\r\nEn effet, l’utilisation des techniques de Gradient, Transitions, Canvas dans l’Html5 influe le développement web. Mais, qu’en est-il du SEO ? En général, les gens perçoivent l’Hml5 comme une menace pour le référencement en raison de ses nouveaux éléments sémantiques, craignant que cela détermine la position dans le référencement pour les moteurs de recherche.\r\n\r\nEst-ce que cette anxiété est vraiment viable ? Non, ce n’est plus une fausse déclaration ou présomptueux que l’Html5 va changer entièrement le référencement naturel SEO. Le référencement naturel est un effort pour stimuler le trafic des sites web par le biais notamment de soumissions d’article, le renforcement des liens et sociale ainsi que de la campagne médiatique. À n’importe quel moment, selon des sources fiables, l’Html5 ne sera une menace pour le référencement. Le classement des pages d’un site web sera plus dépendante des contenus pertinents et des liens de retour de qualité. Les éléments sémantiques de l’Html5 ne peuvent pas nuire à ce scénario.', '2019-09-10', 'SEO', 'images\\seo.jpg'),
(4, 'Nabil', 'CSS3 Grid Layout, vous allez enfin aimer CSS', 'Les possibilités accordées par Grid Layout à nous autres webdesigners sont sans conteste à mille lieues de ce que l\'on était capable de produire avant. Le prix à payer en est que les spécifications du modèle Grid Layout comptent également sans conteste parmi les plus fournies et indigestes du langage CSS.\r\n\r\nLe livre \"CSS3 Grid Layout, vous allez enfin aimer CSS\" consacré au modèle Grid Layout se veut pratique et complémentaire à celui dédié à Flexbox. L\'un et l\'autre vont explorer différentes méthodes de conception de gabarits et de composants web à l\'aide de cas d\'usages très concrets rencontrés lors de nos intégrations dans l\'agence web Alsacréations.\r\n\r\nCet ouvrage, publié le 28 février 2019, vous permettra de découvrir et de tirer parti de toutes les nouveautés apportées par cette [spécification CSS3 du W3C](https://www.w3.org/TR/css-grid-1/), notamment à travers : 144 pages en couleurs, 8 travaux pratiques décortiqués, et une centaine d\'illustrations et codes consultables en ligne.', '2019-09-12', 'Front-end', 'images\\pc.jpg'),
(5, 'Nabil', 'Votre éditeur de code favori en 2019 ?', 'Le choix d\'un éditeur de code avec lequel on est à l\'aise est crucial pour maîtriser ses outils et gagner du temps. Cependant, on sait aussi qu\'il est difficile de changer ses habitudes et de remettre en cause ses préférences au fil des évolutions, de plus en plus rapides, des outils de conception.\r\n\r\nEt vous, quel éditeur de code a comblé vos attentes ?\r\n\r\nPeut-être utilisez-vous le vôtre depuis plusieurs années, que vous venez d\'en tester un tout neuf qui vous a rendu accro, ou encore que vous cherchez la perle rare sans parvenir à mettre la souris dessus... Dans ce cas, pourquoi ne pas jeter un coup d\'oeil du côté de vos voisins ?\r\n\r\nAlors, dites-nous tout ! \r\n\r\n1) Visual Studio code\r\n\r\n2) Sublime text\r\n\r\n3) PHP Storm', '2019-09-20', 'Général', 'images\\code.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_billet` int(11) NOT NULL,
  `auteur` varchar(225) NOT NULL,
  `commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id`, `id_billet`, `auteur`, `commentaire`, `date_commentaire`) VALUES
(1, 1, 'Untell', 'Merci pour cet article, très instructif !', '2019-09-19 20:33:11'),
(2, 1, 'Untell', 'Merci pour cet article, très instructif !', '2019-09-19 20:34:14'),
(3, 1, 'Untell', 'Merci pour cet article, très instructif !', '2019-09-19 20:40:42'),
(4, 5, 'Untell', 'Merci pour l\'article', '2019-09-19 20:41:54'),
(5, 5, 'Untell', 'Merci pour l\'article', '2019-09-19 20:45:58'),
(6, 5, 'Untell', 'Merci pour l\'article', '2019-09-19 20:48:10');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

DROP TABLE IF EXISTS `membres`;
CREATE TABLE IF NOT EXISTS `membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(225) NOT NULL,
  `pass` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `date_inscription` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(1, 'Sami', '$2y$10$LExL2KhZusfdyBlrmwHLYuZtww0NKaIlZsHFfDiYuBl4Ur8ft1Y6S', 'toto@laposte.net', '2019-09-04'),
(3, 'glt55', '$2y$10$1elgQYIGB6njfgN6GReEE.bcDLKf3gFYy2kyl1ff8cb0Vq9xk/aP6', 'gtl@yahoo.fr', '2019-09-04'),
(4, 'pseudo88', '$2y$10$/EQwFfsXReuNQAK5oZW/lu.CxlotwTCgdZea1krUaXgh1rJjsqYvO', 'ps56@gmail.com', '2019-09-04'),
(5, 'pseudo88', '$2y$10$8nnr46iTerlAJjwkwldD3O.opuSoQhe.kdxfoTbhPi8nk25ycn1tS', 'nabil.goual@laposte.net', '2019-09-04'),
(6, 'jj', '$2y$10$e7Y0dUUeFZEhnenuFN9QsOxWO8T9n6Ul5btfmuXWwhE1LueHm0Jw6', 'fsd@gmail.com', '2019-09-05'),
(7, 'Other//56', '$2y$10$sSzzhK3fEDIsb76YMDg7ZeUdEsbWngjUkv7VG/3J3EFRCJ.2QQE0K', 'other@gmail.com', '2019-09-12'),
(8, 'Sami', '$2y$10$l3vw94q7A7Slv82IpBpN1.meM0HNWdHd44xM0f/cIo0cmHAyhCg1i', 'nabil.gkkkkoual@laposte.net', '2019-09-12'),
(9, 'Untell', '$2y$10$wrVd2NLVO2KO6l2WKSief.tSZO7jbuDa6A.u9GRQYTTJYD5Wjt3Ge', 'ntl@hotmail.fr', '2019-09-12'),
(10, 'test1', '$2y$10$eeDSSHWAF9ryEi0YqwaPQOOmPXzuN/K.MCbjz00CpJhuvAfz83NXm', 'test@gmail.com', '2019-09-12'),
(11, 'fsd', '$2y$10$jzNjYbfxD.7/G696Kyp15eIHGObUBJkoFjj14G3RouSyUezaoFxC.', 'fgj@gmail.com', '2019-09-16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
