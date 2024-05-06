-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 21 avr. 2024 à 23:09
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `koulibrary`
--
CREATE DATABASE IF NOT EXISTS `koulibrary` DEFAULT CHARACTER SET latin5 COLLATE latin5_turkish_ci;
USE `koulibrary`;

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `isbn` varchar(100) NOT NULL,
  `title` varchar(150) NOT NULL,
  `category_id` int(11) NOT NULL,
  `editor` varchar(50) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `book_img` varchar(200) NOT NULL,
  `place_at` int(11) NOT NULL,
  `description` text NOT NULL,
  `page` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `pub_date` date NOT NULL,
  `add_on` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`isbn`, `title`, `category_id`, `editor`, `state`, `book_img`, `place_at`, `description`, `page`, `language_id`, `quantity`, `view`, `pub_date`, `add_on`) VALUES
('978-0446509367', 'Rich Dad\'s Increase Your Financial IQ: Getting Smarter with Your Mone', 2, 'Business Plus', 1, 'book_images/978-0446509367.jpg', 5, '\r\nFor years, Robert Kiyosaki has firmly believed that the best investment one can ever make is in taking the time to truly understand how one\'s finances work. Too many people are much more interested in the quick-hitting scheme, or trying to find a short-cut to real wealth. As Kiyosaki has preached over and over again, one has to truly under the process of how money works before one can start out on trying to escape the daily financial Rat Race.\r\n\r\nNow, in this latest book in the popular Rich Dad Poor Dad series, Kiyosaki lays out his 5 key principles of Financial Intelligence for all to understand. In INCREASE YOUR FINANCIAL IQ, Kiyosaki provides real insights on these key steps to wealth:\r\n\r\no How to increase your money -- how to assess what you\'re really worth now, what your prospects are, and how to start mapping out your financial future.\r\n', 197, 2, 25, 6500, '2008-01-01', '2024-04-03 21:28:23'),
('978-1440429897', 'The Secret Door To Success', 3, 'Unknown', 1, 'book_images/978-1440429897.jpg', 13, 'Let Florence Scovel Shinn\'s classic book show you how to find and unlock the door to the secret knowledge of success. Success can and will be yours! Everyone has the potential to be successful, but this success is often obscured behind a wall-a wall we may well have built ourselves in the first place. This book explains how to find and open the door through that wall.', 144, 2, 47, 150, '2008-09-27', '2024-04-05 11:29:28'),
('978-1469202044', 'Rich Dad\'s Cashflow Quadrant: Guide to Financial Freedom', 2, 'Brilliance Audio', 1, 'book_images/978-1469202044.jpg', 5, 'Rich Dad\'ın CASHFLOW Quadrant, finansal özgürlük için bir rehberdir. Zengin Baba Serisinin ikinci kitabı ve bazı insanların nasıl daha az çalıştığını ortaya koyuyor, daha fazla kazan, vergilerde daha az ödemek, ve finansal olarak özgür olmayı öğren.\r\n\r\nCASHFLOW Quadrant, iş güvenliğinin ötesine geçmeye ve finansal özgürlük dünyasına girmeye hazır olanlar için yazılmıştır. Hayatlarında önemli değişiklikler yapmak ve finansal geleceklerini kontrol altına almak isteyenler içindir.\r\n\r\nRobert, çoğu insanın finansal olarak mücadele etmesinin nedeninin, yıllarca okulda geçirilmiş olmaları ancak hiçbir zaman para hakkında öğretilmemiş olmaları olduğuna inanıyor. Robert\'ın zengin babası ona, bu finansal eğitim eksikliğinin, bu kadar çok insanın para için nasıl para kazanacağını öğrenmek yerine, hayatları boyunca para için bu kadar çok çalışmasının nedeni olduğunu öğretti.\r\n', 400, 2, 25, 7000, '2012-06-03', '2024-04-03 21:28:34'),
('978-1604591491', 'Your Word Is Your Wand', 2, 'Unkwon', 1, 'book_images/978-1604591491.jpg', 12, 'Your Word is Your Wand is a book of affirmations. \r\nThese affirmations will help you invite the things that you want into your life and to banish those things you do not want. There is power in words, and this book helps you unlock that power.', 56, 2, 100, 150, '2009-03-26', '2024-04-05 11:24:27'),
('978-1612680194', 'Rich Dad Poor Dad: What the Rich Teach Their Kids About Money That the Poor and Middle Class Do Not!', 2, 'Plata Publishing', 1, 'book_images/978-1612680194.jpg', 4, 'Özellikle teknolojinin, robotların ve global bir ekonominin kuralları değiştirdiği bir dünyada, zengin olmak için yüksek gelirinizin olması gerektiği efsanesini çürütür.\r\n\r\nAktif yatırımlar edinmenin ve oluşturmanın neden yüklü bir maaştan daha önemli olabileceğini, işletme sahiplerinin ve yatırımcıların keyfini sürdüğü vergi avantajlarını öğretir. Evinizin aktif bir yatırım olduğuna karşı meydan okur; emlak balonu patladığında ve yüksek faizli mortgage fiyaskosu şiddetlendiği zaman milyonlarca insanın doğrudan öğrendiği gibi.\r\n\r\nBize okul sistemlerinin parayla ilgili öğrettiklerine neden güvenmememiz gerektiğini hatırlatır ve bu önemli yeteneğin neden bugün hiç olmadığı kadar önemli olduğunu açıklar.Çocuklarınıza paraya dair neler öğretmeniz gerektiğini açıklar, böylece onlar da günümüz dünyasının zorluklarına ve fırsatlarına kendilerini hazırlayabilir ve hak ettikleri zengin yaşamı sürebilir.', 336, 2, 20, 2500, '2017-04-11', '2024-04-02 04:14:14'),
('978-1614270799', 'The Game of Life and How to Play It', 2, 'Jira Ed.', 1, 'book_images/978-1614270799.jpg', 14, '2011 Reprint of 1941 Second Edition. Full facsimile of the original edition, not reproduced with Optical Recognition Software. One secret of Shinn\'s success was that she was always herself . . . colloquial, informal, friendly, and humorous. She herself was very spiritual . . . and taught by familiar, practical, and everyday examples. --Emmet Fox By studying and practicing the principles laid down in this book, one may find prosperity, solve problems, have better health, achieve personal relations-in a word, win the game of life. --Norman Vincent Peale &quot;The Game of Life and How to Play It&quot;, by Florence Scovel Shinn, helped me crystallize my own thinking and moved me forward on the path to where I am today. --Louise Hay The world\'s most celebrated &quot;success&quot; book and guide on how to &quot;WIN&quot; in life through positive attitudes and affirmations. First published in 1925, this book has inspired thousands of people around the world to find a sense of purpose and belonging. It asserts that life is not a battle but a game of giving and receiving, and that whatever we send out into the world will eventually be returned to us. This little book will help you discover how your mind and its imaging faculties play leading roles in the game of life. With her classic book, THE GAME OF LIFE AND HOW TO PLAY IT, Florence Scovel Shinn established herself as one of the most down-to-earth, practical, and helpful prosperity writers of her era. With a timeless message and the ability to explain success principles and how they work in an entertaining style, her writings are still considered the leaders in prosperity literature today.', 80, 2, 39, 150, '2011-06-15', '2024-04-11 23:29:04'),
('978-6051859064', 'Üç İstanbul', 1, 'Everest Yayınları', 1, 'book_images/978-6051859064.jpg', 3, 'II. Abdülhamit, Meşrutiyet ve Mütareke dönemlerinin toplumsal ve kültürel dönüşümlerini konak, yalı ve köşklerin içinden yansıtan Üç İstanbul romanı, geniş kişi repertuvarıyla 20. yüzyıl klasiklerimiz arasında benzersiz bir yere sahiptir. Mithat Cemal Kuntay, imparatorluk dağılırken değişen hayatların yeni yapılar karşısındaki direnç ve zaaflarını en üst düzey bürokratlardan başlayarak toplumun her kesiminden örneklerle kuşatıcı bir şekilde, büyük bir ustalıkla anlatır. Şehrin üç farklı dönemini ise İstanbul\'u odağa alarak aktarır. İstanbul sadece yaşanılan bir yer değil, dönüşen bütün değerlerin simgesidir Üç İstanbul\'da', 640, 3, 20, 540, '2023-01-09', '2024-04-01 07:20:17'),
('978-6256839472', 'Huzur', 1, 'Dergah Yayınları', 1, 'book_images/978-6256839472.jpg', 3, 'Huzur, bir günün bin yıl gibi yaşandığı ihtişamlı bir aşkın anlatısı mı? Artık çoktan göçmüş, ihtişamlı bir medeniyetin ardında bıraktığı huzursuzluğun anlatısı mı? 1948 tarihli tefrika duyurusundaki ifadeyle, \"Harbin başladığı günün hudutlardan, siyasi muhitlerden, muharebe meydanlarından uzak hikayesi\" mi?\r\n\r\nBütün bu soruların birbirlerinin yerine geçerek bütünleştiği, bir olduğu; aynı anda hepsinden uzak, aynı anda hepsine yakın müphem bir içselliğin, müstesna bir varoluş sembolizmiyle İstanbul\'un hafızası ve müziğin yükselip alçalan ritmi içinde; aşkı ve medeniyeti, sanatla hayatın yan yana aktığı zarif bir dille soylulaştıran\r\n\r\nHuzur, gerçekte bizim iç hikayemizdir.\r\n\r\nHuzur, Türk romanının ihtişamıdır.', 380, 3, 20, 2000, '1999-01-01', '2024-04-03 04:10:00'),
('978-9750757457', 'Zamansız', 1, 'Can Sanat Yayınları', 1, 'book_images/978-9750757457.jpg', 4, 'Anlat bana sevgilim, imgeler ülkesine doğru giden bir arabadayız, direksiyon çok hafif, her an savrulabiliriz göğün içine, anlat, yan koltukta zamanı aşmış çılgın bir dinleyicin var, bırak direksiyonu, uçsun arabamız.\r\n\r\nÇağdaş edebiyatın büyük yazarlarından Latife Tekin karantina sürecinde yazmaya başladığı bu sürpriz kitabında zamansız, zeminsiz, tanımsız ve insan varoluşunun ötesinde her türden dönüşüme, başkalaşıma açık kadim bir aşk duygusunun izinden gidiyor.', 120, 3, 8, 1000, '2022-05-10', '2024-04-05 12:46:15'),
('978-9750807145', 'İnce Memed 1', 1, 'Yapı Kredi Yayınları', 1, 'book_images/978-9750807145.jpg', 3, 'Otuz iki yıllık bir zaman diliminde yazılan İnce Memed dörtlüsü, düzene başkaldıran Memed\'in ve insan ilişkileri, doğası ve renkleriyle Çukurova\'nın öyküsüdür. Yaşar Kemal\'in söyleyişiyle \"içinde başkaldırma kurduyla doğmuş\" bir insanın, \"mecbur adam\"ın romanı.', 432, 3, 8, 220, '2004-01-01', '2024-04-03 18:32:19');

-- --------------------------------------------------------

--
-- Structure de la table `borrow`
--

DROP TABLE IF EXISTS `borrow`;
CREATE TABLE `borrow` (
  `id` int(11) NOT NULL,
  `student_no` int(11) UNSIGNED NOT NULL,
  `book_isbn` varchar(100) NOT NULL,
  `borrow_at` datetime NOT NULL,
  `be_back_at` datetime NOT NULL,
  `back_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Déchargement des données de la table `borrow`
--

INSERT INTO `borrow` (`id`, `student_no`, `book_isbn`, `borrow_at`, `be_back_at`, `back_at`) VALUES
(1, 211307100, '978-0446509367', '2024-04-03 13:00:00', '2024-04-12 13:00:00', '2024-04-14 12:44:02'),
(2, 211307099, '978-1612680194', '2022-12-02 09:00:00', '2023-01-02 10:00:00', '2024-04-14 12:48:39'),
(3, 211307100, '978-6051859064', '2024-04-03 13:00:00', '2024-04-17 13:00:00', '2024-04-14 12:43:55'),
(5, 211307101, '978-1614270799', '2024-04-11 22:38:55', '2024-04-16 22:38:55', '2024-04-14 11:25:51'),
(7, 211307100, '978-1469202044', '2024-04-11 23:32:35', '2024-05-23 23:32:35', '2024-04-14 12:44:10');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `num_book` int(11) NOT NULL,
  `num_borrow` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `num_book`, `num_borrow`) VALUES
(1, 'novel', 5, 2),
(2, 'personal development', 5, 2),
(3, 'spirituality', 5, 2),
(4, 'science', 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ceza`
--

DROP TABLE IF EXISTS `ceza`;
CREATE TABLE `ceza` (
  `id` int(11) NOT NULL,
  `student_no` int(11) UNSIGNED NOT NULL,
  `started_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Déchargement des données de la table `ceza`
--

INSERT INTO `ceza` (`id`, `student_no`, `started_date`, `end_date`) VALUES
(2, 211307100, '2024-04-14 11:42:20', '2024-05-24 11:42:20'),
(3, 211307099, '2024-04-14 12:48:39', '2024-04-29 12:48:39');

-- --------------------------------------------------------

--
-- Structure de la table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `language` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Déchargement des données de la table `language`
--

INSERT INTO `language` (`id`, `language`) VALUES
(1, 'French'),
(2, 'English'),
(3, 'Turkish'),
(4, 'German');

-- --------------------------------------------------------

--
-- Structure de la table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `student_no` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birth_date` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `registered_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Déchargement des données de la table `student`
--

INSERT INTO `student` (`student_no`, `first_name`, `last_name`, `email`, `birth_date`, `address`, `registered_at`) VALUES
(211307099, 'Khadim', ' Dieye', 'khadimdieye@gmail.com', '2024-03-19', '  Kabaoğlu, Prof. Baki Komşuoğlu Blv. CADDESİ No:518, 41000 İzmit/Kocaeli', '2024-04-01 19:14:21'),
(211307100, 'Francky Ronsard', 'SAAH', 'francky877832@gmail.com', '2024-03-07', ' Kabaoğlu, Prof. Baki Komşuoğlu Blv. CADDESİ No:518, 41000 İzmit/Kocaeli', '2024-04-01 19:14:21'),
(211307101, 'Juliana', 'Romialison', 'julianaromialispon@gmail.com', '2024-03-12', ' Kabaoğlu, Prof. Baki Komşuoğlu Blv. CADDESİ No:518, 41000 İzmit/Kocaeli', '2024-04-01 19:16:35'),
(211307102, 'Hadeel', 'Taqui', 'hadeeltaqi@gmail.com', '2024-03-19', ' Kabaoğlu, Prof. Baki Komşuoğlu Blv. CADDESİ No:518, 41000 İzmit/Kocaeli', '2024-04-01 19:16:35');

-- --------------------------------------------------------

--
-- Structure de la table `writer`
--

DROP TABLE IF EXISTS `writer`;
CREATE TABLE `writer` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Déchargement des données de la table `writer`
--

INSERT INTO `writer` (`id`, `first_name`, `last_name`, `image`) VALUES
(1, 'Robert T.', 'Kiyosaki', 'writer_images/1.jpg'),
(2, 'Florence', 'Scovel Shinn', 'writer_images/2.jpg'),
(3, 'Yaşar', 'Kemal', 'writer_images/3.jpeg'),
(4, 'Latife', 'Tekin', 'writer_images/4.jpeg'),
(5, 'Mithat', 'Cemal Kuntay', 'writer_images/5.jpeg'),
(6, 'Ahmet', 'Hamdi Tanpınar', 'writer_images/6.jpeg');

-- --------------------------------------------------------

--
-- Structure de la table `write_`
--

DROP TABLE IF EXISTS `write_`;
CREATE TABLE `write_` (
  `id` int(11) NOT NULL,
  `writer_id` int(11) UNSIGNED NOT NULL,
  `book_isbn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

--
-- Déchargement des données de la table `write_`
--

INSERT INTO `write_` (`id`, `writer_id`, `book_isbn`) VALUES
(1, 5, '978-6051859064'),
(2, 6, '978-6256839472'),
(3, 4, '978-9750757457'),
(4, 3, '978-9750807145'),
(5, 1, '978-0446509367'),
(6, 1, '978-1469202044'),
(7, 1, '978-1612680194'),
(8, 2, '978-1604591491'),
(9, 2, '978-1440429897'),
(10, 2, '978-1614270799');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `category_id` (`category_id`,`language_id`),
  ADD KEY `language_id` (`language_id`),
  ADD KEY `title` (`title`);

--
-- Index pour la table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_no_2` (`student_no`,`book_isbn`),
  ADD KEY `book_isbn` (`book_isbn`),
  ADD KEY `student_no` (`student_no`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ceza`
--
ALTER TABLE `ceza`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_no` (`student_no`);

--
-- Index pour la table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_no`),
  ADD KEY `registered_at` (`registered_at`);

--
-- Index pour la table `writer`
--
ALTER TABLE `writer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `first_name` (`first_name`,`last_name`);

--
-- Index pour la table `write_`
--
ALTER TABLE `write_`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_isbn` (`book_isbn`),
  ADD KEY `writer_id` (`writer_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `ceza`
--
ALTER TABLE `ceza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `writer`
--
ALTER TABLE `writer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `write_`
--
ALTER TABLE `write_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`book_isbn`) REFERENCES `book` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`student_no`) REFERENCES `student` (`student_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ceza`
--
ALTER TABLE `ceza`
  ADD CONSTRAINT `ceza_ibfk_1` FOREIGN KEY (`student_no`) REFERENCES `student` (`student_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `write_`
--
ALTER TABLE `write_`
  ADD CONSTRAINT `write__ibfk_1` FOREIGN KEY (`book_isbn`) REFERENCES `book` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `write__ibfk_2` FOREIGN KEY (`writer_id`) REFERENCES `writer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
