-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2019 at 06:15 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id10307640_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `id` int(11) NOT NULL,
  `collection_name` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`id`, `collection_name`, `user_id`) VALUES
(2, 'Environment', 1),
(3, 'Sport', 1),
(4, 'Technology', 1),
(7, 'Other', 1),
(9, 'Politic', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `author` varchar(256) DEFAULT NULL,
  `description` text,
  `published_at` varchar(50) DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `url` varchar(256) DEFAULT NULL,
  `urlToImagele` varchar(256) DEFAULT NULL,
  `source` varchar(30) DEFAULT NULL,
  `user_comment` text,
  `collection_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `author`, `description`, `published_at`, `title`, `url`, `urlToImagele`, `source`, `user_comment`, `collection_id`) VALUES
(1, 'Austin Camoens', 'PETALING JAYA: A Kuala Kubu Baru Sessions Court judge has been detained by the Malaysian Anti-Corruption Commission (MACC here over alleged corruption involving the release of illegal immigrants.', '2019-07-22 01:51:00', 'MACC arrests judge for alleged corruption involving illegal immigrants - Nation - The Star Online', 'https://www.thestar.com.my/news/nation/2019/07/22/macc-arrests-judge-for-alleged-corruption-involving-illegal-immigrants/', 'https://www.thestar.com.my/~/media/online/2019/06/22/06/33/macc-2.ashx/?w=620&h=413&crop=1&hash=1A2F36C008FC334C65FDACD1876D45F95B07C90A', 'Thestar.com.my', 'comment ', 2),
(4, 'ilmare42', 'X1 has now officially picked their leader! On July 22, the new “Produce X 101” project group held their first live broadcast together as X1 on V Live. The 11 members of the new group took turns introducing themselves to fans and promising to show even more of…', '2019-07-22 03:41:41', '“Produce X 101” Group X1 Chooses Their Leader - soompi', 'https://www.soompi.com/article/1340443wpp/produce-x-101-group-x1-chooses-their-leader', 'https://6.viki.io/image/a507f3ad3a1a49d9861d9b21ace3b530.jpeg?s=900x600&e=t', 'Soompi.com', 'this is cool', 2),
(5, 'Gerard Lye', 'If you’re looking forward to the arrival of the all-new A90 Toyota GR Supra, good news! The reborn sports car is set to make its local debut in September', '2019-07-24 02:13:54', 'A90 Toyota GR Supra - Malaysian launch in September - Paul Tan\'s Automotive News', 'https://paultan.org/2019/07/24/a90-toyota-gr-supra-malaysian-launch-in-september/', 'https://s3.paultan.org/image/2019/07/2019-Toyota-Supra-September-launch-announcement-1-1200x628.jpg', 'Paultan.org', 'fuyo', 3),
(6, '', 'A colossal cosmic collision roughly 10 billion years ago saw our galaxy\'s mass expand by a quarter after merging with a smaller one, say scientists. … READ M...', '2019-07-24 01:57:31', 'Milky Way merged with dwarf galaxy 10 billion years ago, say scientists - euronews (in English)', 'https://www.youtube.com/watch?v=IEOOv50WZ8I', 'https://i.ytimg.com/vi/IEOOv50WZ8I/hqdefault.jpg', 'Youtube.com', '', 7),
(18, '', 'English News and Press Release on South Africa about HIV/Aids, Children and Women; published on 25 Jul 2019 by The Conversation', '2019-07-25 03:12:08', 'ARV breakthrough: trial in South Africa confirms effectiveness of new drug - South Africa - ReliefWeb', 'https://reliefweb.int/report/south-africa/arv-breakthrough-trial-south-africa-confirms-effectiveness-new-drug', 'https://reliefweb.int/profiles/reliefweb/themes/kobe/images/rw-logo-social-media.png', 'Reliefweb.int', '', 4),
(19, 'https://www.facebook.com/MalaysiaKini/', 'Hilman comments amid speculations that the PKR deputy president is planning a move to another party.&nbsp;', '2019-07-25 03:12:00', 'Aide: \'People who always lose to Azmin\' behind quit rumour - Malaysiakini', 'https://www.malaysiakini.com/news/485450', 'https://i.ncdn.xyz/publisher-c1a3f893382d2b2f8a9aa22a654d9c97/2019/07/e62c69168496f15fcbe1040892fd82e3.jpg', 'Malaysiakini.com', '', 4),
(22, 'https://www.facebook.com/MalaysiaKini/', 'The candy produces a smoke-like vapour and is mostly sold near school areas.', '2019-07-25 02:23:00', 'Stop selling \'ghost smoke\' candy, minister Saifuddin warns retailers - Malaysiakini', 'https://www.malaysiakini.com/news/485443', 'https://i.ncdn.xyz/publisher-c1a3f893382d2b2f8a9aa22a654d9c97/2019/07/91fc7498a6da41b4f6687710277b8b5d.jpg', 'Malaysiakini.com', '', 4),
(23, 'John Law', 'A month after the official launch of the Nova 5, Huawei has officially launched the Nova 5i Pro in China. Like all \"i\" variants of the Nova series, the phone is essentially a toned-down variant', '2019-07-27 03:00:00', 'Huawei Nova 5i Pro Now Official; Features 810 SoC And Quad-Camera Setup - Lowyat.NET', 'https://www.lowyat.net/2019/190567/huawei-nova-5i-pro-now-official-features-810-soc-and-quad-camera-setup/', 'https://www.lowyat.net/wp-content/uploads/2019/07/fd9e061f-nova-5i-pro-800.jpg', 'Lowyat.net', 'Hello this is the commment from user it may take some time to cover the writtting, and tesing how the wording is corerect or not blah blah blah nad this is the how how how how how i make it long.', 2),
(24, 'Jeremy Ng', 'Enjoy price drops on flagship HUAWEI devices!', '2019-07-27 03:18:31', 'Buy The New Y9 Prime 2019 At RM899 And Win Prizes Worth RM1 Million At The HUAWEI Carnival - SAYS', 'https://says.com/my/tech/huawei-carnival-rm1-million-in-prizes', 'https://images.says.com/uploads/story/cover_image/39704/2d21.png', 'Says.com', 'On a much lighter note, freelance extraordinaire Chris Hardwick tests three productivity methods on his own life to try and find some sanity. The results are less than encouraging.\n\nHe reviews Getting Things Done by David Allen, Never Check E-mail in the Morning by Julie Morgenstern and The 4-Hour Workweek by Tim Ferriss. Before the experiment he compares his days to “eBay shipments: a few tangible things and a whole lot of packing peanuts.”\n\nThe article is written in a Hunter S. Thompson meta style, as in “I’m writing an article about writing an article about productivity tools.” It’s less review and more storytelling, which actually gets the reader more involved in the story. (Yes, I was an English Major).\n\nBasically it’s fun writing about a boring topic from a comedian. What’s not to love?\n\nAny other great suggestions for reading?', 2),
(25, 'Fatimah Zainal', 'PETALING JAYA: As Hong Kongers take their protest for democracy to their international gateway at the airport, Malaysia Airlines say their flights to and from the territory remain as scheduled.', '2019-07-27 01:31:43', 'Malaysians told to be cautious in Hong Kong - Nation - The Star Online', 'https://www.thestar.com.my/news/nation/2019/07/27/msians-told-to-be-cautious-in-hk/', 'https://www.thestar.com.my/~/media/online/2019/07/26/18/03/180921.ashx/?w=620&h=413&crop=1&hash=0790B4100D3025D796422F5D70B03AE3D02C8FCE', 'Thestar.com.my', 'Middle Ages\nMain article: Tract (literature)\nThe distribution of tracts pre-dates the development of the printing press, with the term being applied by scholars to religious and political works at least as early as the 13th century. They were used to disseminate the teachings of John Wycliffe in the 14th century. As a political tool, tracts proliferated throughout Europe during the 17th century. They were printed as persuasive religious material from the time of Gutenberg\'s invention.\n\nRenaissance\nMain article: Treatise\nA treatise is a formal and systematic written discourse on some subject, generally longer and treating it in greater depth than an essay, and more concerned with investigating or exposing the principles of the subject. Some noteworthy Treatises include The Prince, The Wealth of Nations, A Treatise of Human Nature and Two Treatises of Government.', 2),
(26, '<a target=\'_blank\' href=\'https://www.businessinsider.com/author/dave-mosher/?IR=T\'>Dave Mosher</a>, <a target=\'_blank\' href=\'http://www.businessinsider.com/?IR=T\'>Business Insider US</a>', 'The fires started by Starhopper, a prototype Mars rocket, initially seemed to be extinguished, but the flames rekindled and spread overnight.', '2019-07-27 12:51:00', 'SpaceX’s launch of an experimental rocket ship set fire to about 100 acres of wildlife refuge in south Texas - Business Insider', 'https://www.businessinsider.my/spacex-starhopper-rocket-launch-wildfires-texas-2019-7/', 'https://static.businessinsider.my/sites/3/2019/07/5d3b4796100a246ad22dc407.png', 'Businessinsider.my', '', 2),
(28, 'Kevin Burwick', 'The team pays its respects to Tony Stark on the battlefield in latest Avengers: Endgame deleted scene.', '2019-07-26 10:12:57', 'Emotional Endgame Deleted Scene Has Avengers Kneeling to Fallen Tony Stark - MovieWeb', 'https://movieweb.com/avengers-endgame-deleted-scene-pepper-potts-tony-stark/', 'https://cdn3.movieweb.com/i/article/g6goG9t6GBiLmW9iEs2AC0JKSSIwHm/1200:100/Avengers-Endgame-Deleted-Scene-Pepper-Potts-Tony-Stark.jpg', 'Movieweb.com', 'hello', 9),
(29, 'https://www.facebook.com/chapree', 'Following the recent revelation by the Minister of Communications and Multimedia, TM today has submitted its plan to address the issues faced by Streamyx customers. Among the steps that the company will put into action', '2019-07-27 06:30:00', 'TM Reduces The Price of Streamyx To As Low As RM 69 - Lowyat.NET', 'https://www.lowyat.net/2019/190575/tm-reduce-streamyx-price-rm69/', 'https://www.lowyat.net/wp-content/uploads/2018/07/streamyx-01.jpg', 'Lowyat.net', '', 7),
(30, 'Jo Timbuong', 'PETALING JAYA: A new bill should be proposed to control the use of electronic cigarettes, vape and shisha, says social activist Tan Sri Lee Lam Thye.', '2019-07-27 06:10:00', 'New law needed to control e-cigarettes, vape, shisha, says social activist - Nation - The Star Online', 'https://www.thestar.com.my/news/nation/2019/07/27/new-law-needed-to-control-ecigarettes-vape-shisha-says-social-activist/', 'https://www.thestar.com.my/~/media/online/2019/07/27/04/11/erthrt.ashx/?w=620&h=413&crop=1&hash=764CAC3A1B72841E0A9E4B75DCEFE195AA9265A0', 'Thestar.com.my', '', 7),
(31, 'Peter Hall', 'EAST RUTHERFORD, New Jersey (Reuters) - Diego Costa scored four goals as Real Madrid were embarrassed 7-3 by rivals Atletico Madrid in the final match of their United States tour in New Jersey on Friday.', '2019-07-27 06:06:00', 'Football: Costa hits four as Atletico smash Real Madrid 7-3 - The Star Online', 'https://www.thestar.com.my/sport/football/2019/07/27/costa-hits-hattrick-as-atletico-embarrass-rivals-real/', 'https://www.thestar.com.my/~/media/online/2019/07/27/02/41/20190727t023800z_1_lynxnpef6q00s_rtroptp_3_soccericc.ashx/?w=620&h=413&crop=1&hash=D4A7391C456FBED72BD2100C2A0EA5D7A167DE2C', 'Thestar.com.my', '', 7),
(32, 'https://www.facebook.com/MalaysiaKini/', 'PAS president says Bersatu must be defended as Harapan is being dominated by non-Muslims.', '2019-07-27 05:26:33', 'Umno and PAS will work to keep Dr M as PM for full-term - Hadi - Malaysiakini', 'https://www.malaysiakini.com/news/485612', 'https://i.ncdn.xyz/publisher-c1a3f893382d2b2f8a9aa22a654d9c97/2019/06/c2edec7f9e0faf8af0cd3ed7dbf5940f.jpg', 'Malaysiakini.com', '', 4),
(33, 'The Star Online', 'The Huawei Carnival is in town today!', '2019-07-27 03:43:00', 'Win a Mercedes and score prizes at the Huawei Carnival - Tech News - The Star Online', 'https://www.thestar.com.my/tech/tech-news/2019/07/27/win-a-mercedes-and-score-prizes-at-the-huawei-carnival/', 'https://www.thestar.com.my/~/media/online/2019/07/27/02/01/y9-prime-social.ashx/?w=620&h=413&crop=1&hash=06F4DCD72E11D9B49F269EDDE50604DF5665379B', 'Thestar.com.my', '', 4),
(34, 'Zakiah Koya', 'PETALING JAYA: Our loyalty to PKR President Datuk Seri Anwar Ibrahim is not just scribbles on a piece of paper but is proven by long years of commitment and determination, says PKR vice-president Tian Chua, warning those trying to drive a wedge between Anwar …', '2019-07-27 03:29:00', 'Stop dividing the house, start being a party, says Tian Chua - Nation - The Star Online', 'https://www.thestar.com.my/news/nation/2019/07/27/stop-dividing-the-house-start-being-a-party-says-tian-chua/', 'https://www.thestar.com.my/~/media/online/2019/07/27/01/40/tian-chua.ashx/?w=620&h=413&crop=1&hash=EE78F151DF4E9451561F331A46E5DB31208CAE39', 'Thestar.com.my', '', 4),
(35, 'Donna Fuscaldo', 'Scientists at UCLA studied a star for more than two decades and concluded Einstein\'s theory of general relativity still holds up.', '2019-07-27 03:07:42', 'Einstein\'s Theory of General Relativity Holds Up for Now - Interesting Engineering', 'https://interestingengineering.com/einsteins-theory-of-general-relativity-holds-up-for-now', 'https://inteng-storage.s3.amazonaws.com/img/iea/Ne6N1QpqG5/sizes/einstein-gravity-ie_md.jpg', 'Interestingengineering.com', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `usersinfo`
--

CREATE TABLE `usersinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `session` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='id';

--
-- Dumping data for table `usersinfo`
--

INSERT INTO `usersinfo` (`id`, `name`, `email`, `password`, `session`) VALUES
(1, 'User 0', 'user0@gmail.com', '4297f44b13955235245b2497399d7a93', '3781d747438bc6f3ef21b2a889bf7c36'),
(2, 'User 3', 'user3@gmail.com', '4297f44b13955235245b2497399d7a93', ''),
(3, 'User 2', 'user2@gmail.com', '4297f44b13955235245b2497399d7a93', ''),
(4, 'User 1', 'user1@gmail.com', '4297f44b13955235245b2497399d7a93', ''),
(5, 'user4', 'user4@gmail.com', '4297f44b13955235245b2497399d7a93', ''),
(6, 'user5', 'user5@gmail.com', '4297f44b13955235245b2497399d7a93', ''),
(7, 'user6', 'user6@gmail.com', '4297f44b13955235245b2497399d7a93', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collection_id` (`collection_id`);

--
-- Indexes for table `usersinfo`
--
ALTER TABLE `usersinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `usersinfo`
--
ALTER TABLE `usersinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `usersinfo` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `collection_id` FOREIGN KEY (`collection_id`) REFERENCES `collection` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
