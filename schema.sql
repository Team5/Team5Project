SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `courses` (
  `enrolled_max` int(11) NOT NULL DEFAULT '30',
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `rid` int(11) NOT NULL DEFAULT '0',
  `area` varchar(20) NOT NULL DEFAULT 'general',
  `title` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL DEFAULT '2000',
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `enrolled_count` int(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

INSERT INTO `courses` (`enrolled_max`, `cid`, `pid`, `rid`, `area`, `title`, `description`, `price`, `start_date`, `end_date`, `enrolled_count`) VALUES
(30, 1, 4, 2, 'science', 'Course One', 'This is the description for course ONE! \r\nThis is the description for course ONE!\r\nThis is the description for course ONE!\r\nThis is the description for course ONE!\r\nThis is the description for course ONE!\r\nThis is the description for course ONE!\r\nThis is the description for course ONE!\r\nThis is the description for course ONE!\r\nThis is the description for course ONE!', 2000, '2011-02-15', '2011-02-24', 1),
(30, 2, 5, 1, 'arts', 'Course Two for Bleh', 'Course two info! Course two info!\r\nCourse two info!\r\nCourse two info!\r\nCourse two info!\r\nCourse two info!Course two info!Course two info!\r\nCourse two info!', 2000, '2011-02-09', '2011-02-24', 32),
(30, 3, 5, 2, 'arts', 'French', 'Blah blah blah\r\n\r\n\r\nFrench \r\nClass\r\n', 3000, '2011-02-16', '2011-02-24', 20),
(30, 4, 4, 2, 'science', 'Course about sciency stuff', 'This course is about sciency stuff', 1550, '2011-02-01', '2011-02-15', 3),
(30, 5, 5, 1, 'arts', 'Spanish Classes', 'You can learn spanish here, maybe.\r\nYou can learn spanish here, maybe.\r\nYou can learn spanish here, maybe.\r\nYou can learn spanish here, maybe.\r\nYou can learn spanish here, maybe.\r\nYou can learn spanish here, maybe.\r\nYou can learn spanish here, maybe.\r\nYou can learn spanish here, maybe.\r\nYou can learn spanish here, maybe.\r\nMaybe, Maybe, Maybe, Maybe, Maybe.\r\nOooh it lined up', 2000, '2011-02-10', '2011-02-23', 5),
(30, 6, 4, 2, 'science', 'Physics course', 'This course will teach you about gravity and stuff.\r\nThis course will teach you about gravity and stuff.\r\nThis course will teach you about gravity and stuff.\r\n\r\nThis course will teach you about gravity and stuff.\r\nThis course will teach you about gravity and stuff.', 3075, '2011-02-08', '2011-02-22', 23),
(30, 7, 5, 1, 'arts', 'Italian course', 'Learn some Italian.\r\n\r\n', 2000, '2011-02-09', '2011-02-24', 3),
(30, 8, 4, 2, 'science', 'Chemistry', 'Chemestry classes!Chemestry classes!Chemestry classes!\r\n\r\nChemestry classes!\r\nChemestry classes!Chemestry classes!\r\nChemestry classes!Chemestry classes!\r\n\r\nChemestry classes!Chemestry classes!Chemestry classes!', 1530, '2011-02-10', '2011-02-28', 4),
(30, 9, 5, 2, 'arts', 'Chinese class', '\r\n\r\nCome here to learn some Chinese language.\r\nCome here to learn some Chinese language.\r\nCome here to learn some Chinese language.\r\n\r\nCome here to learn some Chinese language.', 2000, '2011-02-06', '2011-02-20', 5),
(30, 10, 5, 2, 'arts', 'Advanced French', 'Yep', 2000, '2011-02-01', '2011-02-08', 4),
(30, 11, 4, 1, 'science', 'Quantum mechanics', 'I don''t know.', 500000, '2011-02-10', '2011-02-28', 5),
(30, 15, 4, 2, 'science', 'New course', 'Course Descriptionasgasgasgasgsa\nasgas\nga\nsgasg\nas\nga\nsg\nasg', 2000, '2011-07-02', '2011-08-02', 0);

CREATE TABLE IF NOT EXISTS `enrollment` (
  `uid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `enrolled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `enrollment` (`uid`, `cid`, `enrolled`) VALUES
(1, 1, 0),
(1, 4, 1),
(1, 11, 1),
(1, 2, 0),
(1, 5, 0),
(1, 15, 1),
(2, 1, 1);

CREATE TABLE IF NOT EXISTS `news` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `article_text` text NOT NULL,
  `publish_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `news` (`article_id`, `provider_id`, `title`, `article_text`, `publish_datetime`) VALUES
(1, 1, 'News about course 1', 'Blahdya asgasg\r\nBlahdya asgasgBlahdya asgasg\r\n\r\nBlahdya asgasg\r\n\r\n\r\n\r\nBlahdya asgasgBlahdya asgasgBlahdya asgasg\r\n\r\nBlahdya asgasgBlahdya asgasgBlahdya asgasg\r\n\r\nBlahdya asgasgBlahdya asgasg', '2011-02-05 16:49:42'),
(2, 2, 'Infor about 24', 'agasg asg asg asg asg \r\nagasg asg asg asg asg agasg asg asg asg asg \r\n\r\n\r\nagasg asg asg asg asg agasg asg asg asg asg \r\n\r\nagasg asg asg asg asg agasg asg asg asg asg agasg asg asg asg asg agasg asg asg asg asg agasg asg asg asg asg ', '2011-02-05 16:50:02');

CREATE TABLE IF NOT EXISTS `rooms` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `building` varchar(64) NOT NULL,
  `computers` int(11) NOT NULL,
  `chairs` int(11) NOT NULL,
  `projector` tinyint(1) NOT NULL,
  `wireless` tinyint(1) NOT NULL,
  `wheelchair` tinyint(1) NOT NULL,
  `printer` int(11) NOT NULL,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `rooms` (`rid`, `name`, `building`, `computers`, `chairs`, `projector`, `wireless`, `wheelchair`, `printer`) VALUES
(1, 'G05', 'Western Gateway Building, UCC, Cork', 1, 40, 1, 0, 1, 1),
(2, 'G13', 'Western Gateway Building, UCC, Cork', 1, 30, 1, 0, 1, 0);

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(8) NOT NULL DEFAULT 'user' COMMENT 'admin | provider | admin',
  `area` varchar(20) NOT NULL DEFAULT 'general' COMMENT 'languages | computing | science | literature',
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `sname` varchar(32) NOT NULL,
  `date_of_birth` date NOT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

INSERT INTO `users` (`uid`, `type`, `area`, `email`, `password`, `fname`, `sname`, `date_of_birth`) VALUES
(1, 'user', 'general', 'u1@k.com', '20a0db53bc1881a7f739cd956b740039', 'User One', '', '2011-02-14'),
(2, 'user', 'general', 'u2@k.com', '1926f73f97bf1985b2b367730cb75071', 'User Two', '', '2011-02-14'),
(3, 'user', 'general', 'u3@k.com', '2a9c9eb70d17fa6bf0e5cc1bc99a339d', 'User 3', '', '2011-02-06'),
(4, 'provider', 'science', 'p1@p.com', 'e35540f334ffc6042ccfff9579e8be20', 'Provider One', '', '2011-02-13'),
(5, 'provider', 'languages', 'p2@p.com', '5cc55c68d8817fe01b7af8aa9871f641', 'Provider Two', '', '2011-02-27'),
(6, 'user', 'general', 'u4@k.com', 'ddc6f7b6b52b7bd1f4b77e31d2ab4213', 'User Four', '', '0000-00-00'),
(7, 'user', 'general', 'john@doe.com', '6579e96f76baa00787a28653876c6127', 'John Doe', '', '0000-00-00'),
(0, 'admin', 'admin', 'admin@sc.ucc.ie', '25e4ee4e9229397b6b17776bfceaf8e7', 'admin', '', '1986-01-01'),
(13, 'user', 'general', 'kevin.kevinleo@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Kevin', 'Leo', '1990-03-18');
