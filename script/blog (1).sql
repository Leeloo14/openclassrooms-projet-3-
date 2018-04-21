-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 21 avr. 2018 à 16:16
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL,
  `signalement` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `signalement`) VALUES
(4, 4, 'jeff', 'oh lala', '2018-02-26 11:10:29', ''),
(7, 4, 'bibi', 'à quand la suite', '2018-03-15 09:59:34', ''),
(14, 5, 'cc', 'cc', '2018-03-15 11:12:12', ''),
(16, 5, 'bertin', 'salut', '2018-03-20 14:03:06', '');

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_inscription` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`id`, `pseudo`, `pass`, `email`, `date_inscription`) VALUES
(4, 'nnn', 'vv', 'nnn@hotmail.fr', '2018-04-20'),
(5, 'cc', 'll', 'c@hotmail.fr', '2018-04-20'),
(6, 'c', 'l', 'c@hotmail.fr', '2018-04-20'),
(7, 'x', 'll', 'x@hotmail.fr', '2018-04-20');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL,
  `modif_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`, `modif_date`) VALUES
(6, 'Episode 3 : modif', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam mattis facilisis arcu, ut tristique augue mattis sed. Donec sit amet posuere odio. Cras pellentesque turpis ac est varius sagittis. Pellentesque vitae egestas lectus, vitae interdum velit. Nulla posuere augue sed consectetur pharetra. Curabitur venenatis sapien non leo congue ullamcorper. Sed accumsan dolor sed tincidunt ullamcorper. Aliquam nec lobortis leo. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras purus turpis, feugiat et ipsum ut, hendrerit tincidunt nulla. Nulla purus lorem, rhoncus vel ante quis, molestie rutrum nisl. Nullam non sodales velit, vel tincidunt lacus. Proin eget condimentum tortor.\r\n\r\nCras varius justo et tincidunt rhoncus. Nunc facilisis, elit quis vestibulum malesuada, est ex ultrices eros, a imperdiet magna tellus ac felis. Aliquam vel arcu lorem. Nam interdum, quam vel aliquet tincidunt, magna erat imperdiet orci, at gravida nisi urna sit amet lorem. Fusce sit amet pharetra augue, consectetur laoreet arcu. Cras interdum tellus velit, placerat placerat nisi tempor at. Nulla ipsum dui, vulputate vel augue tempus, egestas cursus nisi. Integer turpis tortor, iaculis a efficitur a, aliquet pretium risus. Morbi at molestie tortor, pretium ultrices metus. Etiam ultrices tincidunt mi porta tincidunt. Mauris placerat est quis erat molestie, sollicitudin lobortis ligula tempor.\r\n\r\nIn condimentum pulvinar consequat. Cras venenatis feugiat enim, vitae faucibus justo dictum porttitor. Duis interdum condimentum lacus. Vivamus nec semper mi, eu efficitur felis. Phasellus interdum convallis neque, et tempor dolor ultricies a. Maecenas a quam leo. Aliquam erat volutpat. Maecenas tempus sem at justo tempor mattis. Aenean maximus ex vel suscipit iaculis. Quisque imperdiet velit bibendum arcu euismod, nec interdum nisi fermentum. Morbi consectetur nibh rhoncus, dapibus lorem sit amet, scelerisque ligula. Fusce a turpis efficitur, vehicula velit in, convallis massa. Maecenas eget libero finibus risus pellentesque dignissim. Etiam a porta eros.\r\n\r\nNam vitae nunc quis nisi viverra viverra. Nullam tristique sollicitudin libero, sed maximus mi consequat vel. Sed viverra mi consectetur volutpat eleifend. Donec quis nunc sit amet mauris dapibus pharetra. Aenean ac condimentum lorem. Curabitur erat augue, porttitor sit amet condimentum tristique, tempus nec sem. Suspendisse potenti. Duis placerat felis ante, cursus luctus enim auctor id. Nam aliquam vulputate justo, at efficitur ante faucibus sed. Duis vel mauris vel sapien viverra blandit. Aliquam id vulputate sapien, a placerat erat. Morbi in gravida enim. Aliquam vestibulum mauris id dui dictum sollicitudin. Etiam quis leo eget eros porttitor pellentesque nec id nibh. Fusce rutrum lectus vitae diam vehicula vehicula. Vestibulum ullamcorper venenatis nibh, non posuere diam fermentum eget.\r\n\r\nFusce faucibus lobortis eros nec finibus. Nam semper sapien ut euismod convallis. In sed mollis libero. Vestibulum imperdiet ultrices diam, quis molestie mauris vestibulum ullamcorper. Mauris rhoncus risus sed metus finibus, at volutpat nibh porttitor. Sed eu mi lacus. Quisque mollis eu purus id ultrices. Mauris varius sem eros, ut vulputate arcu scelerisque vitae. Fusce accumsan, dui in luctus pellentesque, tortor sapien vehicula leo, a interdum mauris purus id lacus.\r\n\r\nMaecenas sit amet justo in lacus volutpat euismod. Nulla vitae luctus purus. Praesent orci risus, vestibulum ac dapibus ac, consequat in justo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a urna dignissim, malesuada mi eu, dignissim magna. Ut aliquam laoreet massa, a rutrum enim egestas molestie. Vestibulum nisl augue, eleifend in sagittis et, tincidunt a tortor. Maecenas posuere eros et accumsan accumsan. Nunc in semper urna. Duis congue erat non orci euismod hendrerit. Cras lacus nulla, aliquam eu posuere id, sollicitudin sed sem. Nullam iaculis quam at faucibus pretium. Fusce ac quam enim.\r\n\r\nVivamus vel leo sed ex auctor elementum sed ac ipsum. Vestibulum suscipit erat quis odio rhoncus, a feugiat est imperdiet. Pellentesque laoreet convallis tortor eget pharetra. Nullam nec egestas dui, lobortis tempus lorem. Integer laoreet mauris sed massa venenatis pellentesque ac nec velit. Nam pharetra ante ut augue interdum, nec pharetra purus venenatis. Aliquam dapibus tellus vel magna rutrum egestas. Etiam suscipit quam id dui dictum accumsan. Curabitur ante velit, tempus ac ultricies nec, commodo at dolor. Mauris mattis in nulla vitae ullamcorper. Aliquam vel dui dui. Sed nunc nisi, consectetur interdum ante at, blandit aliquam diam. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec consectetur rhoncus risus, at molestie nisi egestas ut. Cras sed est hendrerit justo placerat gravida at condimentum metus. Mauris egestas, felis dignissim semper fringilla, sem erat luctus lorem, et pulvinar magna augue id dolor.\r\n\r\nAliquam nec leo vitae quam blandit eleifend. Curabitur sed nisi magna. Fusce in tellus et quam tincidunt finibus. Duis a tempus erat, id dignissim nisl. Phasellus vel augue ante. Morbi quis nulla a velit aliquam interdum. Sed commodo felis vel aliquam cursus. Praesent sed congue dui. Etiam imperdiet blandit sem non lobortis. In tempor ante sed ex tempus commodo. Pellentesque vitae faucibus ipsum, et elementum neque. Nullam semper pharetra turpis. Maecenas quis dapibus quam. Pellentesque condimentum dolor in aliquam auctor. Integer pretium ex quis commodo cursus.\r\n\r\nNulla luctus neque vitae ante rutrum tempus. Donec ut ex erat. Nunc justo est, finibus vitae pulvinar eget, rhoncus in dolor. Vivamus convallis placerat ante a cursus. Nullam purus eros, elementum id ultrices sed, finibus scelerisque massa. Integer finibus dapibus enim, sit amet vehicula quam bibendum vitae. Vivamus nec nisi a ipsum volutpat consequat. Sed porttitor magna vitae erat blandit, vulputate eleifend libero bibendum. Aliquam mollis condimentum nibh, id condimentum est elementum vulputate. Sed ante justo, dictum eu viverra et, blandit sed dolor. Sed placerat vestibulum nibh in egestas. Suspendisse eu dui ut justo aliquet dignissim. Pellentesque sed velit justo.\r\n\r\nIn at felis mauris. Vestibulum eget sollicitudin augue, eget interdum velit. Cras laoreet volutpat nisl quis placerat. Morbi eleifend dui ac nisi faucibus, nec luctus mi tempus. Vestibulum sollicitudin at justo et ullamcorper. Nam in sagittis enim. Duis porttitor neque dui, non vehicula leo efficitur placerat. Nam efficitur massa id auctor posuere. Sed dignissim sit amet purus eget venenatis. Nullam eleifend vel ligula eu aliquam. Aenean nulla odio, scelerisque a ante at, vestibulum convallis turpis. Proin sagittis consectetur fermentum. Nulla porta condimentum metus ac pretium. Suspendisse consectetur arcu at convallis posuere. Cras tempor non enim quis interdum.', '2018-02-27 00:00:00', '2018-04-18 21:01:54'),
(9, 'cccc', '<p>cccccccc</p>', '2018-04-18 21:13:20', NULL),
(10, 'test', '<p>vfgg</p>', '2018-04-18 21:13:32', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
