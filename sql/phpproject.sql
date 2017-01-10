-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost:3306
-- 生成日期: 2016-04-28 01:47:23
-- 服务器版本: 5.5.49-MariaDB
-- PHP 版本: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `aircmiao_yi_phpproject`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `password` char(20) NOT NULL,
  `qq` char(20) NOT NULL,
  `tel` char(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `qq`, `tel`) VALUES
(2, 'admin', 'admin', '21342352', '23453453');

-- --------------------------------------------------------

--
-- 表的结构 `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `answer_id` int(11) NOT NULL DEFAULT '0',
  `question_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `answer`
--

INSERT INTO `answer` (`answer_id`, `question_id`, `title`) VALUES
(1, 1, 'The file is in C:My Documents'),
(2, 1, '0'),
(3, 1, 'Forbidden'),
(4, 1, 'is case-sensitive'),
(5, 2, '0'),
(6, 2, '1'),
(7, 2, '3'),
(8, 2, '5'),
(9, 3, 'search_preg'),
(10, 3, 'match_preg'),
(11, 3, 'preg_match'),
(12, 3, 'preg_search'),
(13, 4, 'a random value between 0 and 1'),
(14, 4, 'a reference to the $coin variable'),
(15, 4, 'a value of either 0 or 1'),
(16, 4, 'a value of either “heads” or “tails”'),
(17, 5, 'NOT FOUND'),
(18, 5, 'unknown status'),
(19, 5, 'forbidden'),
(20, 5, 'ok'),
(21, 6, 'in case-sensitive'),
(22, 6, 'can start with a leter,a dight,or two underscores'),
(23, 6, 'can contain special characters'),
(24, 6, 'can be a PHP reserved word');

-- --------------------------------------------------------

--
-- 表的结构 `cinemas`
--

CREATE TABLE IF NOT EXISTS `cinemas` (
  `Cinema_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cinema_Name` varchar(255) NOT NULL,
  `Cinema_Address` varchar(255) NOT NULL,
  PRIMARY KEY (`Cinema_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `cinemas`
--

INSERT INTO `cinemas` (`Cinema_ID`, `Cinema_Name`, `Cinema_Address`) VALUES
(1, 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3'),
(2, 'Cinema2', 'Yorkdale Shopping Centre, 3401 Dufferin Street , c/o Yorkdale Shopping Centre, Toronto, ON, M6A 2T9');

-- --------------------------------------------------------

--
-- 表的结构 `contactus`
--

CREATE TABLE IF NOT EXISTS `contactus` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` text NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- 转存表中的数据 `contactus`
--

INSERT INTO `contactus` (`contact_id`, `first_name`, `last_name`, `Email`, `Message`) VALUES
(2, 'navaz', 'sheikh', 'navaz@gmail.com', 'Hello world'),
(3, 'amrin', 'sheikh', 'amrin@gmail.com', 'Hello canada'),
(10, 'rayaji', 'patel', 'raj@yahoo.com', '    How are you         '),
(21, 'ankit', 'Desai', 'ankit@yahoo.com', 'how are you'),
(23, 'ankush', 'patel', 'ankush@gmail.com', 'hello'),
(26, 'magan', 'magan', 'magan@ymail.com', 'wjdi'),
(28, 'Dhruv', 'Shah', 'dhruv@ymail.com', 'Hello Toronto            '),
(51, 'asdfasdf', 'sdfsdf', 'sdfsdf@12.com', 'dfasdf'),
(59, 'Abarar', 'Sheikh', 'er.abrar@gmail.com', '                 hOW R                                '),
(61, 'Abarar', 'Sheikh', 'er.abrar@gmail.com', '                    Hello                                        '),
(64, 'Abarar', 'Sheikh', 'er.abrar@gmail.com', '                    adfwf                                        '),
(69, 'adf', 'asdf', 'asdf@123.com', '                                                            asdfasdf');

-- --------------------------------------------------------

--
-- 表的结构 `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `questions` varchar(255) DEFAULT NULL,
  `answers` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `faq`
--

INSERT INTO `faq` (`question_id`, `questions`, `answers`, `category`) VALUES
(2, '5 Simple Steps To Buy Tickets Online.', 'answer2.txt', 'Booking Question'),
(3, 'Charges For Booking Tickets Online?', 'answer3.txt', 'Booking Question'),
(4, 'Can I Book Tickets In Advance?', 'answer4.txt', 'Booking Question'),
(5, 'Can I Cancel Tickets Booked Online And Get A Refund?', 'answer5.txt', 'Booking Question');

-- --------------------------------------------------------

--
-- 表的结构 `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `phone` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `phone`, `email`, `address`, `message`) VALUES
(14, 'bin', 647, 's08150br@gmail.com', 'sasasas', 'How was your feeling?\r\n');

-- --------------------------------------------------------

--
-- 表的结构 `films`
--

CREATE TABLE IF NOT EXISTS `films` (
  `Film_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Film_Time` date DEFAULT NULL,
  `Film_Name` varchar(50) DEFAULT NULL,
  `Film_Director` varchar(50) DEFAULT NULL,
  `Film_Actor` varchar(50) DEFAULT NULL,
  `Film_pic` varchar(50) DEFAULT NULL,
  `Film_length` varchar(50) DEFAULT NULL,
  `Price_Full` float DEFAULT NULL,
  `Avaliable` char(1) DEFAULT 'Y',
  `film_description` varchar(255) DEFAULT NULL,
  `LANGUAGE` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`Film_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `films`
--

INSERT INTO `films` (`Film_Id`, `Film_Time`, `Film_Name`, `Film_Director`, `Film_Actor`, `Film_pic`, `Film_length`, `Price_Full`, `Avaliable`, `film_description`, `LANGUAGE`) VALUES
(1, '2016-02-12', 'Deadpool', 'Tim Miller', 'Ryan Reynolds', 'image/deadpool.jpg', '1h 48m', 14, 'Y', 'film1', 'English'),
(2, '2016-01-29', 'Kung Fu Panda 3', 'Jennifer Yuh Nelson', 'Jack Black', 'image/kongfupanda.jpg', '1h 35m', 15, 'Y', 'film2', 'English'),
(3, '2015-09-05', 'Steve Jobs', 'Danny Boyle', 'Michael Fassbender', 'image/stevejobs.jpg', '2h 02m', 20, 'Y', 'film3', 'English'),
(4, '2015-12-18', 'Star Wars:The Force Awakens', 'J.J. Abrams', 'Daisy Ridley', 'image/starwar.jpg', '2h 16m', 20, 'Y', 'film4', 'English'),
(5, '2016-01-08', 'The Revenant', 'Alejandro González Iñárritu', 'Leonordo DiCaprio', 'image/TheRevenant.jpg', '2h 36m', 15, 'Y', 'film5', 'English'),
(6, '2016-02-16', 'The Mermaid', 'Stephen Chow', 'Deng Chao', 'image/meirenyu.jpg', '1h 40m', 25, 'Y', 'film6', 'CHINESE'),
(7, '2015-09-09', 'Mr. Six', 'Guan Hu', 'Feng Xiaogang', 'image/mrsix.jpg', '2h 16m', 30, 'Y', 'film7', 'CHINESE');

-- --------------------------------------------------------

--
-- 表的结构 `food`
--

CREATE TABLE IF NOT EXISTS `food` (
  `Food_id` int(8) NOT NULL AUTO_INCREMENT,
  `Food_Catagory` varchar(50) NOT NULL,
  `Food_Price` decimal(10,2) NOT NULL,
  `Food_Instock` int(8) NOT NULL,
  `Food_description` varchar(500) NOT NULL,
  `Food_mark` decimal(2,1) NOT NULL,
  `Food_Name` varchar(50) NOT NULL,
  `Food_Image` varchar(50) NOT NULL,
  `Discount_price` decimal(10,2) NOT NULL,
  `Viewed_times` int(8) NOT NULL,
  `Sales_volume` int(8) NOT NULL,
  PRIMARY KEY (`Food_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `food`
--

INSERT INTO `food` (`Food_id`, `Food_Catagory`, `Food_Price`, `Food_Instock`, `Food_description`, `Food_mark`, `Food_Name`, `Food_Image`, `Discount_price`, `Viewed_times`, `Sales_volume`) VALUES
(1, 'special', '1.00', 0, 'good food', '5.0', 'Salmon', 'food1.jpg', '0.40', 0, 3),
(2, 'special', '7.00', 20, 'Good food', '5.0', 'Chicken', 'food2.jpg', '6.00', 0, 89),
(3, 'breakfast', '5.00', 20, 'Good food', '5.0', 'Sandwich', 'food3.jpg', '4.00', 0, 3),
(4, 'breakfast', '7.00', 10, 'Good food', '4.0', 'Pancake Dippers', 'food1.jpg', '7.00', 0, 0),
(5, 'breakfast', '9.00', 30, 'Applewood smoked bacon, country sausage, onions, green peppers and American cheese.', '5.0', 'The Farmer', 'food1.jpg', '9.00', 0, 0),
(6, 'LunchAndDinner', '10.00', 10, 'Dressings: White Balsamic Vinaigrette, Blue Cheese, French, Honey Mustard, Buttermilk Ranch and Thousand Island. (Dressings may vary. Please ask your server.)', '5.0', 'Salads & Soups', 'food1.jpg', '10.00', 0, 0),
(7, 'LunchAndDinner', '12.00', 17, 'Served with choice of fries, tots, garden salad, fruit or cup of soup. Sub Onion Rings for an additional charge. All burgers prepared medium well.', '5.0', 'Between Two Buns', 'food1.jpg', '12.00', 0, 2),
(8, 'Bakery', '8.00', 10, 'We only use 100% real whipped cream. So go ahead, dive fork first into delicious.', '5.0', 'Rich Cream Pies', 'food1.jpg', '8.00', 0, 0),
(9, 'LunchAndDinner', '8.00', 8, 'Chunks of tender, all-white chicken with carrots, onions, celery and peas in a rich cream sauce and served with a garden salad. Baked fresh, so we may run out! Available after 11 a.m. No sides', '5.0', 'Fresh Baked Chicken Pot Pie', 'food9.jpg', '8.00', 0, 1),
(10, 'LunchAndDinner', '11.00', 9, 'Crispy all-white chicken breast strips with Honey Mustard dipping sauce.', '5.0', 'Chicken Strips Dinner', 'food10.jpg', '11.00', 0, 4),
(11, 'LunchAndDinner', '15.00', 13, 'A generous portion of crispy jumbo butterfly shrimp served with zesty cocktail sauce.', '4.0', 'Jumbo Shrimp Dinner', 'food11.jpg', '15.00', 0, 7),
(12, 'LunchAndDinner', '13.00', 12, 'Cajun-seasoned medley of smoked sausage, shrimp and chicken, grilled together with green peppers and onions. Tossed with a spicy Creole sauce and served over thin spaghetti. No sides', '5.0', 'Ragin'' Cajun', 'food12.jpg', '13.00', 0, 3),
(13, 'LunchAndDinner', '15.00', 10, 'Your choice of grilled shrimp, chicken or steak* tips with fresh broccoli, red peppers and onions, drizzled with a zesty sweet chili sauce and served over jasmine rice. No sides\r\nAvailable with Shrimp, Chicken or Steak (prices vary).', '5.0', 'San Francisco Stir Fry', 'food13.jpg', '15.00', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `food_comment`
--

CREATE TABLE IF NOT EXISTS `food_comment` (
  `Comment_id` int(8) NOT NULL AUTO_INCREMENT,
  `Food_id` int(8) NOT NULL,
  `User_id` int(8) NOT NULL,
  `Comment` varchar(500) NOT NULL,
  `Mark` float NOT NULL,
  `Evaluation` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `File` varchar(50) NOT NULL,
  `Order_item_id` int(8) NOT NULL,
  PRIMARY KEY (`Comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `food_comment`
--

INSERT INTO `food_comment` (`Comment_id`, `Food_id`, `User_id`, `Comment`, `Mark`, `Evaluation`, `Date`, `File`, `Order_item_id`) VALUES
(1, 1, 1, 'good', 5, '1', '2016-03-02', '', 0),
(2, 1, 3, 'Bad', 3, '3', '2016-03-11', '', 0),
(10, 2, 7, '\n            ', 3, 'good', '2016-04-22', '', 41),
(11, 2, 7, '\n            ', 3, 'good', '2016-04-22', '', 41),
(12, 2, 7, '\n            ', 3, 'good', '2016-04-22', '', 41),
(17, 2, 7, '\n            ', 4, 'good', '2016-04-22', '', 41),
(18, 4, 7, '\n            ', 4, 'good', '2016-04-22', '', 42),
(19, 11, 7, '\n            ', 4, 'good', '2016-04-27', '', 44),
(20, 1, 7, 'good\n            ', 5, 'good', '2016-04-27', '', 45),
(21, 4, 7, 'common\n            ', 3, 'good', '2016-04-27', '', 43);

-- --------------------------------------------------------

--
-- 表的结构 `food_order`
--

CREATE TABLE IF NOT EXISTS `food_order` (
  `Order_id` int(8) NOT NULL AUTO_INCREMENT,
  `User_id` int(8) NOT NULL,
  `Order_time` date NOT NULL,
  `Total_price` decimal(10,2) NOT NULL,
  `Phone_number` varchar(11) NOT NULL,
  `State` int(1) NOT NULL,
  PRIMARY KEY (`Order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- 转存表中的数据 `food_order`
--

INSERT INTO `food_order` (`Order_id`, `User_id`, `Order_time`, `Total_price`, `Phone_number`, `State`) VALUES
(1, 1, '2016-03-02', '27.80', '', 0),
(39, 7, '2016-04-23', '115.00', '6477725042', 1),
(44, 7, '2016-04-28', '45.00', '6477725042', 1),
(45, 7, '2016-04-28', '51.50', '6477725042', 1),
(46, 7, '2016-04-28', '16.00', '6477725042', 1),
(47, 3, '2016-04-28', '54.00', '6477725042', 1),
(51, 3, '2016-04-28', '6.00', '6477725042', 1),
(52, 7, '2016-04-28', '0.60', '1231231234', 1),
(53, 7, '2016-04-28', '0.60', '1231231234', 1);

-- --------------------------------------------------------

--
-- 表的结构 `food_order_item`
--

CREATE TABLE IF NOT EXISTS `food_order_item` (
  `Order_item_id` int(8) NOT NULL AUTO_INCREMENT,
  `Food_id` int(8) NOT NULL,
  `Order_id` int(8) NOT NULL,
  `Quantity` int(8) NOT NULL,
  `Size` int(1) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Cinema` varchar(50) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`Order_item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- 转存表中的数据 `food_order_item`
--

INSERT INTO `food_order_item` (`Order_item_id`, `Food_id`, `Order_id`, `Quantity`, `Size`, `Date`, `Time`, `Cinema`, `Amount`, `Price`) VALUES
(1, 1, 1, 2, 0, '0000-00-00', '00:00:00', '', '0.00', '0.00'),
(43, 4, 39, 5, 3, '2016-04-14', '00:59:00', 'Cinema2', '70.00', '14.00'),
(44, 11, 39, 2, 2, '2016-04-16', '00:59:00', 'Cinema1', '45.00', '22.50'),
(51, 11, 44, 2, 2, '2016-04-13', '01:00:00', 'Cinema1', '45.00', '22.50'),
(52, 12, 45, 1, 1, '2016-04-12', '23:00:00', 'Cinema1', '13.00', '13.00'),
(53, 10, 45, 2, 1, '2016-04-22', '00:59:00', 'Cinema2', '22.00', '11.00'),
(54, 10, 45, 1, 2, '2016-04-15', '00:59:00', 'Cinema1', '16.50', '16.50'),
(55, 9, 46, 2, 1, '2016-04-06', '00:59:00', 'Cinema2', '16.00', '8.00'),
(56, 11, 47, 1, 3, '2016-04-06', '00:59:00', 'Cinema2', '30.00', '30.00'),
(57, 7, 47, 2, 1, '2016-04-08', '00:59:00', 'Cinema1', '24.00', '12.00'),
(62, 2, 51, 1, 1, '2016-04-13', '00:59:00', 'Cinema1', '6.00', '6.00'),
(63, 1, 52, 1, 2, '2016-04-01', '01:02:00', '1', '0.60', '0.60'),
(64, 1, 53, 1, 2, '2016-04-30', '01:02:00', '1', '0.60', '0.60');

-- --------------------------------------------------------

--
-- 表的结构 `food_shoppingcart`
--

CREATE TABLE IF NOT EXISTS `food_shoppingcart` (
  `Id` int(8) NOT NULL AUTO_INCREMENT,
  `User_id` varchar(8) NOT NULL,
  `Food_id` int(8) NOT NULL,
  `Quantity` int(8) NOT NULL,
  `Size` int(1) NOT NULL,
  `Cinema_Name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- 转存表中的数据 `food_shoppingcart`
--

INSERT INTO `food_shoppingcart` (`Id`, `User_id`, `Food_id`, `Quantity`, `Size`, `Cinema_Name`, `price`) VALUES
(1, '1', 1, 5, 2, '0', '0.00'),
(13, '7', 1, 1, 2, '1', '0.40'),
(66, '7', 11, 2, 2, 'Cinema1', '15.00'),
(67, '7', 12, 1, 1, 'Cinema1', '13.00'),
(68, '7', 10, 2, 1, 'Cinema2', '11.00'),
(69, '7', 10, 1, 2, 'Cinema1', '11.00'),
(70, '7', 9, 2, 1, 'Cinema2', '8.00'),
(71, '3', 2, 1, 1, 'Cinema1', '6.00'),
(72, '3', 11, 1, 1, 'Cinema1', '15.00'),
(73, '7', 2, 2, 3, 'Cinema1', '6.00'),
(74, '7', 3, 1, 3, 'Cinema1', '4.00'),
(75, '3', 11, 1, 3, 'Cinema2', '15.00'),
(76, '3', 7, 1, 1, 'Cinema1', '12.00');

-- --------------------------------------------------------

--
-- 表的结构 `hiring`
--

CREATE TABLE IF NOT EXISTS `hiring` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `hiretime` int(100) NOT NULL,
  `hirenumber` int(10) NOT NULL,
  `hirerequirement` varchar(255) NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=92 ;

--
-- 转存表中的数据 `hiring`
--

INSERT INTO `hiring` (`id`, `hiretime`, `hirenumber`, `hirerequirement`, `jobtitle`) VALUES
(1, 0, 12, 'dsads', 'qwewq'),
(2, 1, 12, 'eqweqe', 'asdasd'),
(3, 0, 12, 'wqdqsd', 'qwewq'),
(10, 0, 0, 'qwrwerrr', 'wqeqw'),
(11, 0, 34, 'eqwrw', 'qwe'),
(18, 2147483647, 2147483647, '1111111111111111111111111111111', '22222222222222222'),
(22, 0, 0, 'efef', 'webdev'),
(23, 0, 0, 'efef', 'webdev'),
(36, 0, 2147483647, 'fwef', 'xxxxxxxxxxxxxxxxxxxxxx'),
(37, 0, 2147483647, 'fwef', 'xxxxxxxxxxxxxxxxxxxxxx'),
(38, 0, 0, 'efewf', 'fewfew'),
(39, 0, 0, 'rg', 'bin'),
(40, 0, 0, 'rg', 'bin'),
(41, 0, 0, '', ''),
(42, 0, 0, '', ''),
(43, 0, 0, 'fbd', 'fgbfd'),
(44, 0, 0, 'fbd', 'fgbfd'),
(45, 34, 324, '324', '32444444444444444444444444'),
(46, 34, 324, '324', '32444444444444444444444444'),
(47, 0, 0, '', ''),
(48, 0, 0, '', ''),
(49, 9, 90, '90-', '0-'),
(50, 9, 90, '90-', '0-'),
(51, 0, 0, 'sad', 'cxzd'),
(52, 0, 0, 'sad', 'cxzd'),
(53, 0, 9, '0-', '90-'),
(55, 0, 0, '', ''),
(56, 0, 0, '', ''),
(57, 0, 0, '', ''),
(58, 0, 0, '', ''),
(59, 324, 324, '342', '32444444444444444444444444324'),
(60, 324, 324, '342', '32444444444444444444444444324'),
(61, 0, 0, '', ''),
(62, 0, 0, '', ''),
(63, 0, 0, '', ''),
(64, 0, 0, '', ''),
(65, 0, 0, '', ''),
(66, 0, 0, '', ''),
(67, 0, 0, '', ''),
(68, 0, 0, '', ''),
(69, 0, 0, '', ''),
(70, 0, 0, '', ''),
(83, 0, 4, '	\r\n1.Ensure technical feasibility of UI/UX designs\r\n\r\n2.Strong understanding of communications, marketing, and customer service principles\r\n\r\n3.Digital Advertising experience a major asset\r\n\r\n4.Excellent understanding of web markup', 'Web developer'),
(84, 9, 10, '	\r\nOutstanding customer service and communication skills\r\n\r\nValid Drivers License Class C or E\r\n\r\n$3000+', 'Delverymanï¼ˆFulltimeï¼‰'),
(85, 9, 10, 'Good verbal communication skills in English â€“ additional language skills considered an asset\r\n\r\nA wonderful smile and great attitude working with a team', ' Cashierï¼ˆPart timeï¼‰'),
(86, 9, 2, 'Must maintain knowledge of current digital best practices and technologyã€‚\r\n\r\nExcellent critical thinking, problem solving, and analytic skills are necessary\r\n\r\nStrong organizational skills\r\n\r\nDetail oriented', 'Wen designerï¼ˆFull timeï¼‰'),
(87, 9, 10, 'Must maintain knowledge of current digital best practices and technologyã€‚\r\n\r\nExcellent critical thinking, problem solving, and analytic skills are necessary\r\n\r\nStrong organizational skills\r\n\r\nDetail oriented', 'Cashierï¼ˆPart timeï¼‰'),
(88, 0, 5, 'kind', 'Sever'),
(89, 0, 0, '', ''),
(90, 2, 1, '3', 'cao cesup'),
(91, 0, 1, '1', 'wc');

-- --------------------------------------------------------

--
-- 表的结构 `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `hunfou` varchar(10) NOT NULL,
  `birthday` int(20) NOT NULL,
  `education` varchar(100) NOT NULL,
  `graduation` varchar(100) NOT NULL,
  `biyeschool` varchar(100) NOT NULL,
  `tel` int(20) NOT NULL,
  `xiandxi` varchar(200) NOT NULL,
  `mark` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=140 ;

--
-- 转存表中的数据 `information`
--

INSERT INTO `information` (`id`, `name`, `sex`, `hunfou`, `birthday`, `education`, `graduation`, `biyeschool`, `tel`, `xiandxi`, `mark`) VALUES
(132, 'bbbbbbbbee', 'Male', 'Married', 0, '', '', '', 0, '', 0),
(133, '', 'Male', 'Married', 0, '', '', '', 0, '', 0),
(134, '', 'Male', 'Married', 0, '', '', '', 0, '', 0),
(135, 'asdf', 'Male', 'Married', 0, '', '', '', 0, '', 0),
(136, '123', 'Male', 'Married', 0, '', '', '', 0, '', 0),
(137, 'fda', 'Male', 'Married', 0, '', '', '', 0, '', 0),
(138, 'asdf11', 'Male', 'Married', 0, '', '', '', 0, '', 11),
(139, 'abc', 'Male', 'Married', 0, '', '', '', 0, '', 2);

-- --------------------------------------------------------

--
-- 表的结构 `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `name` varchar(20) NOT NULL,
  `menu` text NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `menus`
--

INSERT INTO `menus` (`name`, `menu`) VALUES
('Main', '[{"name":"Booking","link":"\\/booking"},{"name":"Movies","link":"\\/FilmAdmin_CMS\\/View\\/IndexMovies_UserView.php"},{"name":"Food","link":"\\/Food"},{"name":"About","link":"#"},[{"name":"Movie Calendar","link":"\\/MovieCalender\\/index.php"},{"name":"FAQ","link":"\\/FAQ\\/index.php"},{"name":"Career","link":"\\/Job"},{"name":"Contact Us","link":"\\/contact_us_page\\/View\\/UserView\\/contact.php"},{"name":"Demo page","link":"\\/page\\/26"}]]');

-- --------------------------------------------------------

--
-- 表的结构 `moviefeature`
--

CREATE TABLE IF NOT EXISTS `moviefeature` (
  `film_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `language` text NOT NULL,
  `releaseDate` date NOT NULL,
  `director` text NOT NULL,
  `cast` text NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`film_id`),
  UNIQUE KEY `Id` (`film_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- 转存表中的数据 `moviefeature`
--

INSERT INTO `moviefeature` (`film_id`, `title`, `language`, `releaseDate`, `director`, `cast`, `img`) VALUES
(26, 'KUNG FU PANDA 3', '', '2016-04-23', 'Jennifier Yuh Nelson', '  Jack Black', '/Assets/image/HomePage/thumb_kongfupanda.jpg'),
(27, 'STAR WARS ', '', '2016-04-21', 'J.J.Abrams', '  Daisy Ridley', '/Assets/image/HomePage/thumb_starwar.jpg'),
(28, 'THE REVENANT', '', '2016-04-17', 'Alejandro Gonzlez Irritu', '  Leonordo DiCaprio', '/Assets/image/HomePage/thumb_TheRevenant.jpg'),
(29, 'Steve Jobs', '', '2015-02-28', 'Danny Boyle', '   Michael Fassbender ', '/Assets/image/HomePage/thumb_stevejobs.jpg'),
(30, 'mr.six', '', '2016-04-18', 'Guan Hu', '  Feng Xiaogang', '/Assets/image/HomePage/thumb_mrsix.jpg'),
(31, 'Deadpool', '', '2014-01-20', 'Tim Miller', '  Ryan Reynolds', '/Assets/image/HomePage/thumb_deadpool.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `Order_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Order_DATE` datetime DEFAULT NULL,
  `Customer_Id` int(11) DEFAULT NULL,
  `Total_Price` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Order_Id`),
  KEY `Customer_Id` (`Customer_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`Order_Id`, `Order_DATE`, `Customer_Id`, `Total_Price`) VALUES
(14, '2016-03-24 07:48:27', 7, '45.2'),
(15, '2016-03-24 07:51:12', 7, '45.2'),
(16, '2016-03-24 08:01:07', 7, '45.2'),
(17, '2016-03-24 08:08:01', 7, '96.05'),
(18, '2016-04-13 06:46:07', 7, '76.84'),
(19, '2016-04-13 06:50:42', 7, '16.95'),
(20, '2016-04-13 08:40:27', 7, '31.64'),
(21, '2016-04-13 08:50:04', 7, '33.9'),
(22, '2016-04-15 02:18:38', 7, '0'),
(23, '2016-04-15 02:20:53', 7, '22.6');

-- --------------------------------------------------------

--
-- 表的结构 `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `link` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `pages`
--

INSERT INTO `pages` (`id`, `name`, `content`, `link`) VALUES
(26, 'Demo page', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur sagittis massa tellus, at ultrices ligula venenatis id. Proin et pulvinar turpis. Donec sed finibus nibh. Cras imperdiet imperdiet ex, mollis sollicitudin ligula. Pellentesque in gravida mi. Nulla eget enim sit amet dui congue dictum at ut enim. Sed convallis sem quis lectus convallis ornare. Morbi vestibulum eleifend justo sed porta. Aenean dignissim ullamcorper arcu, id volutpat mauris tincidunt vel. Fusce facilisis a est vitae pellentesque. Donec eget urna sit amet risus consequat posuere. Suspendisse nec varius purus, quis egestas magna. Integer eu quam scelerisque, scelerisque arcu consectetur, accumsan eros. Praesent ut purus nec leo malesuada varius ut eu ligula. Cras diam arcu, vulputate sed hendrerit non, auctor ac quam. Nullam ut mi eget justo sagittis pretium.</p><p>Â </p><p style="text-align: center;">WE ARE NOT</p><p><img style="display: block; margin-left: 50%; transform: translateX(-50%);" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAABICAMAAAB7sTi/AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2hpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpFQjFCQTc1NTRDMjc2ODExODIyQTlBMDQ1RTVENDNCQSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo1QTQ2NzBFNTkxRkQxMUU1QjdFNzk1ODhFREVFNUNDQyIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo1QTQ2NzBFNDkxRkQxMUU1QjdFNzk1ODhFREVFNUNDQyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChNYWNpbnRvc2gpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6RUIxQkE3NTU0QzI3NjgxMTgyMkE5QTA0NUU1RDQzQkEiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6RUIxQkE3NTU0QzI3NjgxMTgyMkE5QTA0NUU1RDQzQkEiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5vGZF7AAAC31BMVEXg4ODBwcFGRUTw8O90dHNlZGM2NjUnJiWEg4OysrH7+/v5+fn8/PwODQz9/f0XFxaTk5KioqIKCQjz8/P29vYrKikLCgni4uIYFxfx8fENDAvs7OwPDg1sbGvW1tbo6OggHx7R0dAdHBuFhYT09PQUExIcGxru7u0fHh36+voSERDn5+cMCwpVVVT19fX39/c/Pj0lJCMaGRkbGhmXlpaDgoLm5ubk5ORNTUy8vLx6eXmmpqabmpp8e3uqqqkmJSRMS0oXFhX4+PjS0dGVlJTMzMsoJyYqKSiLi4qamZmOjo23trZOTk25uLjy8vJgX1/Hx8cjIiGnp6aMjIvU09NwcG/Ly8qwsK/Dw8Pf398xMC87OjoREA9YV1eCgYFoZ2ZEQ0ItLCucm5u1tLSZmJg+PTy0s7OenZ2dnJwVFBOBgICIiIfT0tLX19c3Njbl5eUpKCfFxcXPz86JiYhpaGcZGBhiYWDp6emfn59UVFNnZmXAwMAvLi0iISAkIyJdXFxra2q/v7/b29tJSEeAf394d3eEhIMTEhG7urrr6+ssKypRUVDa2tq+vr4wLy5HRkXW1dVPT06srKtWVVXKysrq6uo9PDxcW1uhoaGoqKcyMjHt7e3j4+NNTEu4t7fExMTc3Nx/fn5APz5XVla2tbU0NDPZ2dlaWVlvb27Y2Nh7enpqamkhIB8uLSxTU1J2dXWlpaU8Ozvh4eGQkI+9vb2Hh4ZCQUBKSUgQDw4WFRSYl5exsbDJyclQUE9SUlEeHRxbWlqfnp67u7s5ODh9fHxIR0YyMTCPj45kY2K6ublubm3Ozs01NTSvr66Uk5NBQD/CwsJmZWRDQkGtraySkpHQ0M86OTnx8PCkpKRLSkmRkZB5eHizsrJ3dnZxcXDNzcxpaWh1dHTV1NR+fX3v7+7d3d2rq6phYGDIyMhjYmFzc3Le3t5tbWxycnFeXV2pqagzMzJfXl6KiokJCAf///9mqJ3uAAAA9XRSTlP/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////AMLtd88AAApGSURBVHja7Jz3f9RGFsDX3XjXu8Zlce8VGzA2OC4YG2NijLEBOyQGYwi9915CKAmEGgg9BAKEEkqAUALpuUuvl1zapV7v/d78AaedGUmjlUaS/Vn/Eu37xXpvZlS+epp582bWNqQvzogCe53d7kB+QcjGL7rY+N7heBBl3NbKB5L8sDTl0xUPgUrcxW1P+WF5SdLkMOBIdO10px+WLIU/5ICeTBzq9MMi0j+8LxjJV2P9sDyyPg7MyKYEP6yCymgwJ/feb3VYaS+AaYl8SXmi1Omb+1sJ1r4aXTwvBGIJFfXxTKQ6vEMw5Cy3DqyDJfq+FESqBUiGMXax6YK5xPKsVWCNGAZdhAWdom/9QrSMtQas3bnQZVgwhZj6SIbxloCVZxwyaMCCkdi0WdLLrQDLeQK6BSu62WP6UNL/ZQVYI6F7sCC3TDA5pE94jQVgLUjsJqy4cA8sNEScNtp/+rCcHdAdWNsvj0W/HvO5xzgZR/5P2iwQOsyGbsAKnZGApgcCbMz2WO+71Pne9QILBKWx6WwCxkYkWBdW9IF2hGYtwvZtlpobzmCRhNKCcB1Yk378O0IVM6ndFWQhWPaBXYM1t/oQQqdekwv+p3+JATZZaBafsdzDrSQEu6KlTDrZ6uYqzYusnvWErETYWCn0Ticpi4mkSaV5CvsOhxLWUOgSrCThb0t1MlNQo7/2ww6fIcTEWMK4lRByed8UQiEAn2tcI2IquJiH8rpzV/Ej+xC/GI9NUqlX/+OuubAmW4Y1umuwBGkapyyZpQsrLWodRfvLrHZiGvLbfJoWu3SMekbUZ5HEFHh7qdiyKryWmI5KJ+sHMDVCfY3eQi1Zixn0G5oUSB5I16eiV30tF9d/Rl7D3bCwsBoXvrlEaXA6eLuWPlbJuLsU9mwRVqG7i7COj/EuedjoYx+MqzUwufv1pOUEptJpbNmrbFkumP7J6I8L+hy1Y3kma4qv7Ql8smKBq+0SCSLP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" /></p>', '/page/26'),
(28, 'new page', '<p>adasdfasdf</p>', '/page/28');

-- --------------------------------------------------------

--
-- 表的结构 `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `answer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `question`
--

INSERT INTO `question` (`id`, `title`, `answer_id`) VALUES
(1, 'What is stored in $message by the code that follows?', 1),
(2, 'How many times will the while loop that follows be executed?', 5),
(3, 'Which function searches for a regular expression in a string and returns 1 if the pattern is found?', 11),
(4, 'The function that follows returns\r\nfunction coin_toss() {if (mt_rand(0, 1) == 0) $coin = heads else $coin =  tails return $coin', 16),
(5, 'What does $message contain after the following code executes?', 11),
(6, 'A PHP variable name', 14);

-- --------------------------------------------------------

--
-- 表的结构 `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `rating_id` int(10) NOT NULL,
  `total_votes` int(5) NOT NULL DEFAULT '0',
  `total_value` int(5) NOT NULL DEFAULT '0',
  `used_ips` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `ratings`
--

INSERT INTO `ratings` (`rating_id`, `total_votes`, `total_value`, `used_ips`, `date`) VALUES
(27, 1, 1, 'a:1:{i:0;s:1:"7";}', '2016-04-28 04:00:00'),
(30, 1, 2, 'a:1:{i:0;s:1:"7";}', '2016-04-28 04:00:00'),
(31, 2, 6, 'a:2:{i:0;s:3:"135";i:1;s:3:"133";}', '2016-04-23 04:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `reservations`
--

CREATE TABLE IF NOT EXISTS `reservations` (
  `Reservation_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Running_films` varchar(255) NOT NULL,
  `Cinema_Name` varchar(255) NOT NULL,
  `Cinema_Address` varchar(255) NOT NULL,
  `Run_Time` datetime NOT NULL,
  `Room_Name` varchar(255) NOT NULL,
  `Room_id` int(11) NOT NULL,
  `Seats_Numbers` varchar(255) NOT NULL,
  `Order_Id` int(11) NOT NULL,
  `Price` float DEFAULT NULL,
  PRIMARY KEY (`Reservation_Id`),
  KEY `reservations_ibfk_2` (`Order_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `reservations`
--

INSERT INTO `reservations` (`Reservation_Id`, `Running_films`, `Cinema_Name`, `Cinema_Address`, `Run_Time`, `Room_Name`, `Room_id`, `Seats_Numbers`, `Order_Id`, `Price`) VALUES
(5, 'Steve Jobs', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-22 12:30:00', 'ROOM1', 1, 'B1', 16, 20),
(6, 'Steve Jobs', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-22 09:30:00', 'ROOM1', 1, 'A4', 16, 20),
(7, 'Steve Jobs', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-22 09:30:00', 'ROOM1', 1, 'A5', 17, 20),
(8, 'Kung Fu Panda 3', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-02-22 09:30:00', 'ROOM1', 1, 'B3', 17, 15),
(9, 'The Mermaid', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-29 09:30:00', 'ROOM1', 1, 'A3 B5', 17, 50),
(10, 'Steve Jobs', 'Cinema2', 'Yorkdale Shopping Centre, 3401 Dufferin Street , c/o Yorkdale Shopping Centre, Toronto, ON, M6A 2T9', '2016-04-29 13:30:00', 'ROOM1', 3, 'B1 B2', 18, 40),
(11, 'Deadpool', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-30 13:30:00', 'ROOM1', 1, 'B1 B2', 18, 28),
(12, 'The Revenant', 'Cinema2', 'Yorkdale Shopping Centre, 3401 Dufferin Street , c/o Yorkdale Shopping Centre, Toronto, ON, M6A 2T9', '2016-04-30 15:30:00', 'ROOM2', 4, 'A5', 19, 15),
(13, 'Deadpool', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-30 13:30:00', 'ROOM1', 1, 'A4 A5', 20, 28),
(14, 'Mr. Six', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-29 09:30:00', 'ROOM2', 2, 'B1', 21, 33.9),
(15, 'Steve Jobs', 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3', '2016-04-22 12:30:00', 'ROOM1', 1, 'B2', 23, 22.6);

-- --------------------------------------------------------

--
-- 表的结构 `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `Room_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Room_Name` varchar(255) NOT NULL,
  `Cinema_ID` int(11) NOT NULL,
  `available` char(1) DEFAULT 'Y',
  PRIMARY KEY (`Room_ID`),
  UNIQUE KEY `Room_Name` (`Room_Name`,`Cinema_ID`),
  KEY `Cinema_ID` (`Cinema_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `rooms`
--

INSERT INTO `rooms` (`Room_ID`, `Room_Name`, `Cinema_ID`, `available`) VALUES
(1, 'ROOM1', 1, 'Y'),
(2, 'ROOM2', 1, 'Y'),
(3, 'ROOM1', 2, 'Y'),
(4, 'ROOM2', 2, 'Y');

-- --------------------------------------------------------

--
-- 表的结构 `running_films`
--

CREATE TABLE IF NOT EXISTS `running_films` (
  `Room_ID` int(11) NOT NULL,
  `Run_Time` datetime NOT NULL,
  `Film_Id` int(11) NOT NULL,
  `RVST` date NOT NULL,
  `RVET` date NOT NULL,
  `RUNATTIME` date DEFAULT NULL,
  `Avaliable` char(1) DEFAULT 'Y',
  `running_films_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`running_films_id`),
  UNIQUE KEY `Room_ID` (`Room_ID`,`Run_Time`),
  KEY `fk_films` (`Film_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `running_films`
--

INSERT INTO `running_films` (`Room_ID`, `Run_Time`, `Film_Id`, `RVST`, `RVET`, `RUNATTIME`, `Avaliable`, `running_films_id`) VALUES
(1, '2016-02-22 09:30:00', 2, '2016-02-11', '2016-02-18', '2016-02-22', 'Y', 1),
(1, '2016-04-30 09:30:00', 1, '2016-02-03', '2016-03-10', '2016-04-30', 'Y', 2),
(2, '2016-04-30 09:30:00', 3, '2016-02-03', '2016-02-10', '2016-02-20', 'Y', 3),
(1, '2016-04-30 13:30:00', 1, '2016-02-01', '2016-02-01', '2016-02-11', 'Y', 4),
(1, '2016-04-30 19:35:00', 1, '2016-02-01', '2016-02-09', '2016-02-02', 'Y', 7),
(2, '2016-04-30 13:30:00', 3, '2016-03-10', '2016-02-09', '2016-04-30', 'Y', 8),
(2, '2016-04-30 19:30:00', 3, '2016-04-11', '2016-04-14', '2016-04-30', 'Y', 10),
(3, '2016-04-30 09:30:00', 4, '2016-04-30', '2016-03-25', '2016-04-30', 'Y', 11),
(3, '2016-04-30 13:30:00', 4, '2016-03-10', '2016-03-24', '2016-04-30', 'Y', 12),
(3, '2016-04-30 19:30:00', 4, '2016-04-22', '2016-04-22', '2016-04-30', 'Y', 13),
(4, '2016-04-30 09:00:00', 5, '2016-03-24', '2016-04-30', '2016-04-30', 'Y', 14),
(4, '2016-04-30 15:30:00', 5, '2016-04-30', '2016-04-30', '2016-04-30', 'Y', 15),
(4, '2016-04-30 19:30:00', 5, '2016-03-31', '2016-04-24', '2016-04-30', 'Y', 16),
(1, '2016-04-22 12:30:00', 3, '2016-04-22', '2016-04-28', '2016-04-22', 'Y', 17),
(1, '2016-04-22 09:30:00', 3, '2016-04-20', '2016-04-22', '2016-04-22', 'Y', 18),
(3, '2016-04-22 09:30:00', 4, '2016-04-10', '2016-04-20', '2016-04-22', 'Y', 19),
(3, '2016-04-22 13:30:00', 4, '2016-04-15', '2016-04-22', '2016-04-22', 'Y', 20),
(3, '2016-04-29 09:30:00', 3, '2016-03-19', '2016-04-15', '2016-04-29', 'Y', 24),
(3, '2016-04-29 13:30:00', 3, '2016-04-14', '2016-03-22', '2016-04-29', 'Y', 25),
(1, '2016-04-29 09:30:00', 6, '2016-04-23', '2016-04-29', '2016-04-29', 'Y', 28),
(2, '2016-04-29 09:30:00', 7, '2016-04-23', '2016-04-29', '2016-04-29', 'Y', 29);

-- --------------------------------------------------------

--
-- 表的结构 `seats`
--

CREATE TABLE IF NOT EXISTS `seats` (
  `Seat_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Room_ID` int(11) NOT NULL,
  `Seat_Name` varchar(255) DEFAULT NULL,
  `available` char(1) DEFAULT 'Y',
  `Run_Time` datetime DEFAULT NULL,
  PRIMARY KEY (`Seat_ID`),
  UNIQUE KEY `uc_seat` (`Room_ID`,`Seat_Name`,`Run_Time`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=211 ;

--
-- 转存表中的数据 `seats`
--

INSERT INTO `seats` (`Seat_ID`, `Room_ID`, `Seat_Name`, `available`, `Run_Time`) VALUES
(1, 1, 'A1', 'Y', '2016-04-30 09:30:00'),
(2, 1, 'A2', 'N', '2016-04-30 09:30:00'),
(3, 2, 'A1', 'Y', '2016-04-30 09:30:00'),
(4, 2, 'A2', 'Y', '2016-04-30 09:30:00'),
(5, 1, 'A3', 'Y', '2016-04-30 09:30:00'),
(6, 1, 'A4', 'N', '2016-04-30 09:30:00'),
(7, 1, 'A5', 'N', '2016-04-30 09:30:00'),
(8, 1, 'B1', 'Y', '2016-04-30 09:30:00'),
(9, 1, 'B2', 'N', '2016-04-30 09:30:00'),
(10, 1, 'B3', 'N', '2016-04-30 09:30:00'),
(11, 1, 'B4', 'N', '2016-04-30 09:30:00'),
(12, 1, 'B5', 'Y', '2016-04-30 09:30:00'),
(13, 2, 'A5', 'Y', '2016-04-30 09:30:00'),
(14, 2, 'B1', 'Y', '2016-04-30 09:30:00'),
(15, 2, 'B2', 'Y', '2016-04-30 09:30:00'),
(16, 2, 'B3', 'Y', '2016-04-30 09:30:00'),
(17, 2, 'B4', 'N', '2016-04-30 09:30:00'),
(18, 2, 'A3', 'Y', '2016-04-30 09:30:00'),
(19, 2, 'A4', 'Y', '2016-04-30 09:30:00'),
(20, 2, 'B5', 'Y', '2016-04-30 09:30:00'),
(21, 3, 'A1', 'N', '2016-04-30 09:30:00'),
(22, 3, 'A2', 'N', '2016-04-30 09:30:00'),
(23, 3, 'A3', 'N', '2016-04-30 09:30:00'),
(24, 3, 'A4', 'N', '2016-04-30 09:30:00'),
(25, 3, 'A5', 'Y', '2016-04-30 09:30:00'),
(26, 3, 'B1', 'Y', '2016-04-30 09:30:00'),
(27, 3, 'B2', 'Y', '2016-04-30 09:30:00'),
(28, 3, 'B3', 'Y', '2016-04-30 09:30:00'),
(29, 3, 'B4', 'Y', '2016-04-30 09:30:00'),
(30, 3, 'B5', 'Y', '2016-04-30 09:30:00'),
(31, 4, 'A1', 'Y', '2016-04-30 09:00:00'),
(32, 4, 'A2', 'N', '2016-04-30 09:00:00'),
(33, 4, 'A3', 'Y', '2016-04-30 09:00:00'),
(34, 4, 'A4', 'Y', '2016-04-30 09:00:00'),
(35, 4, 'A5', 'N', '2016-04-30 09:00:00'),
(36, 4, 'B1', 'Y', '2016-04-30 09:00:00'),
(37, 4, 'B2', 'Y', '2016-04-30 09:00:00'),
(38, 4, 'B3', 'Y', '2016-04-30 09:00:00'),
(39, 4, 'B4', 'Y', '2016-04-30 09:00:00'),
(40, 4, 'B5', 'Y', '2016-04-30 09:00:00'),
(41, 1, 'A1', 'Y', '2016-02-22 09:30:00'),
(42, 1, 'A2', 'N', '2016-02-22 09:30:00'),
(43, 1, 'A3', 'N', '2016-02-22 09:30:00'),
(44, 1, 'A4', 'N', '2016-02-22 09:30:00'),
(45, 1, 'A5', 'N', '2016-02-22 09:30:00'),
(46, 1, 'B1', 'N', '2016-02-22 09:30:00'),
(47, 1, 'B2', 'N', '2016-02-22 09:30:00'),
(48, 1, 'B3', 'N', '2016-02-22 09:30:00'),
(49, 1, 'B4', 'N', '2016-02-22 09:30:00'),
(50, 1, 'B5', 'N', '2016-02-22 09:30:00'),
(51, 1, 'A1', 'N', '2016-04-30 13:30:00'),
(52, 1, 'A2', 'N', '2016-04-30 13:30:00'),
(53, 1, 'A3', 'Y', '2016-04-30 13:30:00'),
(54, 1, 'A4', 'N', '2016-04-30 13:30:00'),
(55, 1, 'A5', 'N', '2016-04-30 13:30:00'),
(56, 1, 'B1', 'N', '2016-04-30 13:30:00'),
(57, 1, 'B2', 'N', '2016-04-30 13:30:00'),
(58, 1, 'B3', 'Y', '2016-04-30 13:30:00'),
(59, 1, 'B4', 'Y', '2016-04-30 13:30:00'),
(60, 1, 'B5', 'Y', '2016-04-30 13:30:00'),
(61, 1, 'A1', 'Y', '2016-04-30 19:35:00'),
(62, 1, 'A2', 'Y', '2016-04-30 19:35:00'),
(63, 1, 'A3', 'Y', '2016-04-30 19:35:00'),
(64, 1, 'A4', 'Y', '2016-04-30 19:35:00'),
(65, 1, 'A5', 'Y', '2016-04-30 19:35:00'),
(66, 1, 'B1', 'Y', '2016-04-30 19:35:00'),
(67, 1, 'B2', 'Y', '2016-04-30 19:35:00'),
(68, 1, 'B3', 'Y', '2016-04-30 19:35:00'),
(69, 1, 'B4', 'Y', '2016-04-30 19:35:00'),
(70, 1, 'B5', 'Y', '2016-04-30 19:35:00'),
(71, 1, 'A1', 'Y', '2016-04-22 12:30:00'),
(72, 1, 'A2', 'N', '2016-04-22 12:30:00'),
(73, 1, 'A3', 'N', '2016-04-22 12:30:00'),
(74, 1, 'A4', 'N', '2016-04-22 12:30:00'),
(75, 1, 'A5', 'N', '2016-04-22 12:30:00'),
(76, 1, 'B1', 'N', '2016-04-22 12:30:00'),
(77, 1, 'B2', 'N', '2016-04-22 12:30:00'),
(78, 1, 'B3', 'N', '2016-04-22 12:30:00'),
(79, 1, 'B4', 'N', '2016-04-22 12:30:00'),
(80, 1, 'B5', 'N', '2016-04-22 12:30:00'),
(81, 1, 'A1', 'Y', '2016-04-22 09:30:00'),
(82, 1, 'A2', 'N', '2016-04-22 09:30:00'),
(83, 1, 'A3', 'N', '2016-04-22 09:30:00'),
(84, 1, 'A4', 'N', '2016-04-22 09:30:00'),
(85, 1, 'A5', 'N', '2016-04-22 09:30:00'),
(86, 1, 'B1', 'N', '2016-04-22 09:30:00'),
(87, 1, 'B2', 'N', '2016-04-22 09:30:00'),
(88, 1, 'B3', 'Y', '2016-04-22 09:30:00'),
(89, 1, 'B4', 'N', '2016-04-22 09:30:00'),
(90, 1, 'B5', 'Y', '2016-04-22 09:30:00'),
(91, 2, 'A1', 'Y', '2016-04-30 13:30:00'),
(92, 2, 'A2', 'Y', '2016-04-30 13:30:00'),
(93, 2, 'A3', 'Y', '2016-04-30 13:30:00'),
(94, 2, 'A4', 'Y', '2016-04-30 13:30:00'),
(95, 2, 'A5', 'Y', '2016-04-30 13:30:00'),
(96, 2, 'B1', 'Y', '2016-04-30 13:30:00'),
(97, 2, 'B2', 'Y', '2016-04-30 13:30:00'),
(98, 2, 'B3', 'Y', '2016-04-30 13:30:00'),
(99, 2, 'B4', 'Y', '2016-04-30 13:30:00'),
(100, 2, 'B5', 'Y', '2016-04-30 13:30:00'),
(101, 2, 'A1', 'Y', '2016-04-30 19:30:00'),
(102, 2, 'A2', 'Y', '2016-04-30 19:30:00'),
(103, 2, 'A3', 'Y', '2016-04-30 19:30:00'),
(104, 2, 'A4', 'Y', '2016-04-30 19:30:00'),
(105, 2, 'A5', 'Y', '2016-04-30 19:30:00'),
(106, 2, 'B1', 'Y', '2016-04-30 19:30:00'),
(107, 2, 'B2', 'Y', '2016-04-30 19:30:00'),
(108, 2, 'B3', 'Y', '2016-04-30 19:30:00'),
(109, 2, 'B4', 'Y', '2016-04-30 19:30:00'),
(110, 2, 'B5', 'Y', '2016-04-30 19:30:00'),
(111, 3, 'A1', 'Y', '2016-04-30 13:30:00'),
(112, 3, 'A2', 'Y', '2016-04-30 13:30:00'),
(113, 3, 'A3', 'Y', '2016-04-30 13:30:00'),
(114, 3, 'A4', 'Y', '2016-04-30 13:30:00'),
(115, 3, 'A5', 'Y', '2016-04-30 13:30:00'),
(116, 3, 'B1', 'Y', '2016-04-30 13:30:00'),
(117, 3, 'B2', 'Y', '2016-04-30 13:30:00'),
(118, 3, 'B3', 'Y', '2016-04-30 13:30:00'),
(119, 3, 'B4', 'Y', '2016-04-30 13:30:00'),
(120, 3, 'B5', 'Y', '2016-04-30 13:30:00'),
(121, 3, 'A1', 'Y', '2016-04-30 19:30:00'),
(122, 3, 'A2', 'Y', '2016-04-30 19:30:00'),
(123, 3, 'A3', 'Y', '2016-04-30 19:30:00'),
(124, 3, 'A4', 'Y', '2016-04-30 19:30:00'),
(125, 3, 'A5', 'Y', '2016-04-30 19:30:00'),
(126, 3, 'B1', 'Y', '2016-04-30 19:30:00'),
(127, 3, 'B2', 'Y', '2016-04-30 19:30:00'),
(128, 3, 'B3', 'Y', '2016-04-30 19:30:00'),
(129, 3, 'B4', 'Y', '2016-04-30 19:30:00'),
(130, 3, 'B5', 'Y', '2016-04-30 19:30:00'),
(131, 3, 'A1', 'Y', '2016-04-22 09:30:00'),
(132, 3, 'A2', 'Y', '2016-04-22 09:30:00'),
(133, 3, 'A3', 'Y', '2016-04-22 09:30:00'),
(134, 3, 'A4', 'Y', '2016-04-22 09:30:00'),
(135, 3, 'A5', 'Y', '2016-04-22 09:30:00'),
(136, 3, 'B1', 'Y', '2016-04-22 09:30:00'),
(137, 3, 'B2', 'Y', '2016-04-22 09:30:00'),
(138, 3, 'B3', 'N', '2016-04-22 09:30:00'),
(139, 3, 'B4', 'N', '2016-04-22 09:30:00'),
(140, 3, 'B5', 'N', '2016-04-22 09:30:00'),
(141, 3, 'A1', 'N', '2016-04-22 13:30:00'),
(142, 3, 'A2', 'Y', '2016-04-22 13:30:00'),
(143, 3, 'A3', 'Y', '2016-04-22 13:30:00'),
(144, 3, 'A4', 'Y', '2016-04-22 13:30:00'),
(145, 3, 'A5', 'Y', '2016-04-22 13:30:00'),
(146, 3, 'B1', 'N', '2016-04-22 13:30:00'),
(147, 3, 'B2', 'N', '2016-04-22 13:30:00'),
(148, 3, 'B3', 'Y', '2016-04-22 13:30:00'),
(149, 3, 'B4', 'Y', '2016-04-22 13:30:00'),
(150, 3, 'B5', 'Y', '2016-04-22 13:30:00'),
(151, 3, 'A1', 'Y', '2016-04-29 09:30:00'),
(152, 3, 'A2', 'N', '2016-04-29 09:30:00'),
(153, 3, 'A3', 'Y', '2016-04-29 09:30:00'),
(154, 3, 'A4', 'Y', '2016-04-29 09:30:00'),
(155, 3, 'A5', 'N', '2016-04-29 09:30:00'),
(156, 3, 'B1', 'Y', '2016-04-29 09:30:00'),
(157, 3, 'B2', 'Y', '2016-04-29 09:30:00'),
(158, 3, 'B3', 'Y', '2016-04-29 09:30:00'),
(159, 3, 'B4', 'Y', '2016-04-29 09:30:00'),
(160, 3, 'B5', 'N', '2016-04-29 09:30:00'),
(161, 3, 'A1', 'Y', '2016-04-29 13:30:00'),
(162, 3, 'A2', 'Y', '2016-04-29 13:30:00'),
(163, 3, 'A3', 'N', '2016-04-29 13:30:00'),
(164, 3, 'A4', 'N', '2016-04-29 13:30:00'),
(165, 3, 'A5', 'Y', '2016-04-29 13:30:00'),
(166, 3, 'B1', 'N', '2016-04-29 13:30:00'),
(167, 3, 'B2', 'N', '2016-04-29 13:30:00'),
(168, 3, 'B3', 'Y', '2016-04-29 13:30:00'),
(169, 3, 'B4', 'N', '2016-04-29 13:30:00'),
(170, 3, 'B5', 'Y', '2016-04-29 13:30:00'),
(171, 4, 'A1', 'Y', '2016-04-30 15:30:00'),
(172, 4, 'A2', 'Y', '2016-04-30 15:30:00'),
(173, 4, 'A3', 'Y', '2016-04-30 15:30:00'),
(174, 4, 'A4', 'Y', '2016-04-30 15:30:00'),
(175, 4, 'A5', 'N', '2016-04-30 15:30:00'),
(176, 4, 'B1', 'Y', '2016-04-30 15:30:00'),
(177, 4, 'B2', 'Y', '2016-04-30 15:30:00'),
(178, 4, 'B3', 'Y', '2016-04-30 15:30:00'),
(179, 4, 'B4', 'Y', '2016-04-30 15:30:00'),
(180, 4, 'B5', 'Y', '2016-04-30 15:30:00'),
(181, 4, 'A1', 'Y', '2016-04-30 19:30:00'),
(182, 4, 'A2', 'Y', '2016-04-30 19:30:00'),
(183, 4, 'A3', 'Y', '2016-04-30 19:30:00'),
(184, 4, 'A4', 'Y', '2016-04-30 19:30:00'),
(185, 4, 'A5', 'Y', '2016-04-30 19:30:00'),
(186, 4, 'B1', 'Y', '2016-04-30 19:30:00'),
(187, 4, 'B2', 'Y', '2016-04-30 19:30:00'),
(188, 4, 'B3', 'Y', '2016-04-30 19:30:00'),
(189, 4, 'B4', 'Y', '2016-04-30 19:30:00'),
(190, 4, 'B5', 'Y', '2016-04-30 19:30:00'),
(191, 1, 'A1', 'N', '2016-04-29 09:30:00'),
(192, 1, 'A2', 'N', '2016-04-29 09:30:00'),
(193, 1, 'A3', 'N', '2016-04-29 09:30:00'),
(194, 1, 'A4', 'N', '2016-04-29 09:30:00'),
(195, 1, 'A5', 'N', '2016-04-29 09:30:00'),
(196, 1, 'B1', 'N', '2016-04-29 09:30:00'),
(197, 1, 'B2', 'N', '2016-04-29 09:30:00'),
(198, 1, 'B3', 'N', '2016-04-29 09:30:00'),
(199, 1, 'B4', 'N', '2016-04-29 09:30:00'),
(200, 1, 'B5', 'N', '2016-04-29 09:30:00'),
(201, 2, 'A1', 'Y', '2016-04-29 09:30:00'),
(202, 2, 'A2', 'Y', '2016-04-29 09:30:00'),
(203, 2, 'A3', 'Y', '2016-04-29 09:30:00'),
(204, 2, 'A4', 'Y', '2016-04-29 09:30:00'),
(205, 2, 'A5', 'Y', '2016-04-29 09:30:00'),
(206, 2, 'B1', 'N', '2016-04-29 09:30:00'),
(207, 2, 'B2', 'Y', '2016-04-29 09:30:00'),
(208, 2, 'B3', 'Y', '2016-04-29 09:30:00'),
(209, 2, 'B4', 'Y', '2016-04-29 09:30:00'),
(210, 2, 'B5', 'Y', '2016-04-29 09:30:00');

-- --------------------------------------------------------

--
-- 表的结构 `terms`
--

CREATE TABLE IF NOT EXISTS `terms` (
  `terms_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`terms_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `terms`
--

INSERT INTO `terms` (`terms_id`, `title`, `info`) VALUES
(1, 'Definitions', 'Definitions.txt'),
(2, 'Purchasing tickets online', 'PurchasingOnline.txt'),
(3, 'Booking of Tickets', 'BookingTickets.txt'),
(4, 'Cancellation of tickets', 'CancellationTickets.txt'),
(5, 'General Conditions', 'GeneralCanditions.txt');

-- --------------------------------------------------------

--
-- 表的结构 `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  `answer3` varchar(255) NOT NULL,
  `answer4` varchar(255) NOT NULL,
  `mark` int(100) NOT NULL,
  `rights` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- 转存表中的数据 `test`
--

INSERT INTO `test` (`id`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `mark`, `rights`, `name`) VALUES
(29, 'test', 'a', 'b', 'c', 'd', 11, 'a', 'aaa'),
(30, 'Which of the following is correct about determine the "truth" of any value not already of the Boolean type?', 'If the value is a number, it is false if exactly equal to zero and true otherwise.', 'If the value is a string, it is false if the string is empty (has zero characters) or is the string "0", and is true otherwise.', 'Values of type NULL are always false.', 'All of the above.', 1, 'd', 'aa'),
(31, 'Which of the following is true about php variables?', 'All variables in PHP are denoted with a leading dollar sign ($).', 'The value of a variable is the value of its most recent assignment.', 'Variables are assigned with the = operator, with the variable on the left-hand side and the expression to be evaluated on the right.', 'All of the above.', 1, 'd', 'aa'),
(32, 'Which of the following is correct about variable naming rules?', 'Variable names must begin with a letter or underscore character.', 'A variable name can consist of numbers, letters, underscores.', 'you cannot use characters like + , - , % , ( , ) . & , etc in a variable name.', 'All of the above.', 1, 'd', 'aa'),
(33, 'Which of the following is correct about NULL?', 'NULL is a special type that only has one value: NULL.', 'The special constant NULL is capitalized by convention, but actually it is case insensitive.', 'Both of the above.', 'None of the above.', 1, 'c', 'aa'),
(34, 'Which of the following function is used to get length of a string?', 'size()', 'strlen()', 'length', 'None of the above.', 1, 'b', 'aa'),
(35, 'Which of the following function can be used to get an array in the reverse order?', 'array_reverse()', 'array_search()', 'array_shift()', 'array_slice()', 1, 'a', 'aa');

-- --------------------------------------------------------

--
-- 表的结构 `tokens`
--

CREATE TABLE IF NOT EXISTS `tokens` (
  `id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `tokens`
--

INSERT INTO `tokens` (`id`, `user_id`, `token`) VALUES
('04740ffddd368a892455606224b9757d3f88cc78ebb205c63c58e28e1d1de19b', 135, '$2y$10$h8QsOeSNYdEEBOWqdQsql.K2CqTlDwwa1R5U/O1P3NPqkgfqpystG'),
('0611124a516db21cfe31b0e9ea9d59fe3aa6bf71932eda6a90a604577d60b3fb', 7, '$2y$10$uWlic/yaRm4xrlPeACfcTOQkZUnOkFa9tTcJ7U6ELcZLWEUYv5tz.'),
('070d6be12c0fdd10447bd1d665db0b158459f91b2b704c2ba5f5095131baeeb9', 3, '$2y$10$8rzSfISQtkdKNx24G3ApcuUzrIk7oQL0gN4vG9kKQ2j3yRonEWRSG'),
('0cca4f0d3d203275a1f37a3fa3bc84fca503d509332c0312a3d945c5e620f25a', 7, '$2y$10$rwh0g6gYp9UXVPNSMgJNUO3SyCJxNr3QPHLijHrrK77XL.JHu6TlW'),
('10e7be7f195e4ee92480293505fd80a9f985f48722af5741a89bd728bdb03898', 135, '$2y$10$Q5TQS6u5CsIpe7WXAa35Wu/2MTjoGXpWebyW36wCSpIBdctbIXq86'),
('1a9d69d3d0fcf6f26378271dd2de6df09853b182a75b5dab11e4ca41d37b364e', 7, '$2y$10$3njxTtwrpDJxREaH6xyZPO.2eWWst8t1d3P3L5DSi/VmpJo41zf7e'),
('235bfab6c3636b4308433400a28e1c3777b8292bec2a40e395fba50a8e21b1db', 7, '$2y$10$yGjVh6pW3zBQQe0tLvDGyu180HXrDcbpSOQ21nZaR9QvpHNlI7Blq'),
('2884930a1edab39c0481b7c17a3ac52e156b3fc2b809500a293c51a9e3d7b413', 3, '$2y$10$OKcZDGrzO/8.IP4N0b27Ae34jk2Wer3C4DDNhWoY36DQY9cSJe.w2'),
('2b27ddcb2dcba5a50e0a97f044f2db8896a9a7adf87d69a954628a12bc03f305', 3, '$2y$10$Uc6gZvDriItM1F2nHPn.xuLQBPQKIOYGYjHXWhKc9VVjXRt2ZDEpq'),
('30895ddf93f267f4f3a5ff4ce3c70497c3016ecc257e2635109f93f5c89e72ba', 3, '$2y$10$vVOFBaiVV3OlHH8vuAYyUe0KyOwP/rK9m3vluGi8KltlacQ/cHuby'),
('354455077c8a1b692e276a9714ed397ab8e45d0944ef77545ca23c4febaea27d', 7, '$2y$10$Dfwe3A516MSZGLPbVI5AceiQD1h1fdv6V3OkyfxyD6CNR.Drt2v0a'),
('38fefc4ab9672b70a7ada05c57233e33a0bb81724f58a278b522c2259087ba32', 7, '$2y$10$jfDK1QkLSWqnI5L9Lboxue1BQxJ23nrq5T1xlby0X6WUK4YanA5vC'),
('3ab478bcbd147f0aaff2043cd2d0aed21f0e4c905917bc36390fbd5e55161524', 7, '$2y$10$NrpHxx.oWZYtKe1U9UoWw.J4HuSHpml2SKHB/7WeHIyt6Ea0o2LL6'),
('3ae6cc05f45a0470bb45f7e7b95ae90d002d5ef580f4cb62e3ceb8bc0972e6a1', 7, '$2y$10$2RHIp3RNizbKJD7akQ8NB.cDSQj0MZbUF6RCpZ/xrWQq.BDlL77lq'),
('3b1621e7307ce91586039848cf7e452b8a16eb0815a260d8f417b30959b447ce', 7, '$2y$10$r2alCyDNX5uTbL1uYTwteeejYkhfr7qX4flp/yNYoPa358RHuIFq6'),
('4032cb7108c73e26a8970bd093cd1f5b2148d7c2d79100c741287f65d26881c2', 7, '$2y$10$D1/04nOXbx11NX9Gx8g2R.HG1if8yPGAQSw5qe8pvkdedvM6Ym01q'),
('43e89721678940770a55a46c7661b3c6981b9d06f533aa725dc5611cd33b0a67', 3, '$2y$10$.LBFmMufQfU5ecXxyLrpeOkYwQrv2gwqczGFMe/OZVSuDAbIyUi/q'),
('48cdfa53febb3b056e98b454f08882d19f4ce860f611bd036dfcdeca26aa2e18', 3, '$2y$10$Gv6b6WG//xMrpwppNB8hU.7CAsD5zFNHjmbcLvAsr9HnlamoVRMAy'),
('4a3479a7ef40d860afbcf3a8942e4b63b3e5551bee22d24da840005108d869f8', 3, '$2y$10$saARAf3.bAd1orF9URaZQuTHU7x.ZQgd.rKJo8Ka0ENrfyNNb0jgu'),
('5865f178f04db64fc6d5b50bce1a2ebbdb8ffdd2d9c77e1029a9fec5453bca01', 3, '$2y$10$5u0S5saCHf8nCqYy5DHeP.77.4K15NDew6urVkK19bVHjf5y.ReA6'),
('5e8eee96f286e76150e619ddac5247d5b8481988eeed32c0b4b6a7095caa3a4b', 3, '$2y$10$APRuHHAp/IuOqPDiVXOogOa08mUoTYu.eJeduAGFuXHspFLgwKO5G'),
('5ed91ac1be2b72489e6e0df3fa0f6ef858b3186890afac7b352d033bbeba8b94', 7, '$2y$10$GDdoZ4tuy9OxxfAZ86unq.Oi42mv4c./wEdQL2l/tDXS9c2QQiYp.'),
('659c9888dd8104398434cdd72dc45cc6d398990019d27de06e249fa66d0e6db2', 3, '$2y$10$x/GPTq3v6VvboJM1cXbFHO0b3i15tXZWzxeElIJQ.2o.RV4XYffHm'),
('66a307f99f2f65c2a188bd0094043a2095efde88450604784b9eda3d96e12ff1', 7, '$2y$10$gIMoFUbPpBeyBtThKIdmpuCLNuhO6eSUvwD2x3mgdLfpyjyKyA6pO'),
('6ebfb1305fd9eab85a1a89829109d19cb563a6442c080bce3f550bdba0a830b8', 3, '$2y$10$0uWBtQTe3kokXA5hvjFXkuYGw.z02p5j1nFMuwpF256HNkjFIFp.m'),
('71ce168b3189f5021a2282de4f31b3a0ed5d1434ac8da45dbff8e453947943a4', 7, '$2y$10$vvPglO1waZoPvIZhkXCFa.b2eXh50preb/OzzsvDQBG9p9qns7aNS'),
('789693433617c5225ee497160999fa2b076e624cd42dec647ab17c5b896892bc', 7, '$2y$10$zRTdUoVf0.IVL0PWMmj3s.JbI7u42//V7bC1eR.ASslLufRMWYHDm'),
('841f1beca18f07e5824e5ef6ced256e970f77498c7b56e60b06173ceafd91758', 7, '$2y$10$hY/mswKzQba6Ez0AckgtoOqMlcRzBMYtFqx.XQSzIICbvm6dw96yK'),
('910b5100aa2f35923464e8060bf6ed2439bc1e44ee3768ebbdae6cea01ae7f68', 7, '$2y$10$XD5/3qknuFHVBc2FsWrvC.1qkiLeri.yeNT6aHXPTAFrtWAs7dEAW'),
('94c2e6d095d12862b3095f7724bd0c9f1ad16cd49506c98be4d31e5de089046d', 135, '$2y$10$VA7XdMrxsAfh2P6KVzBdfusfj3SSGB9kDdh2Maow0Van58oRypY/O'),
('a6e25272fae4ef13e27b7b329344a2356bbb1a49de6f94be0ac9f38cb02f61f1', 7, '$2y$10$.tMXSwscwTidBFV8T9Isq.uIUZtLVvlxXms5VA91KRhm5V5zhXj8i'),
('aa20e465d24f0b508ce2499ddaa3ad6a2a49867f133c9494bd0639d59fe87e22', 7, '$2y$10$KM2f3bm8bHH5G3/kc4aIpuelLWC587R8rtZP5enx123OA1oP//xoW'),
('af081e7f767d3037c9d48d165bc0c5b942b484b1f352ead3673650a9059f6367', 3, '$2y$10$qKw/lqZR7jZvKB7edr.WzuJYukf7QLpSaXhvh7ufCKM6gbuSovxbi'),
('bbc6dc661e5aa20e24ca8e37b6007c38480a82f197c6f73f7abde51f7bcdc7cd', 7, '$2y$10$Ia4ihx7k3oLQfHWi.zsRW.051xfLnMsf9/DJXkJJRQI0uKGVLoPje'),
('bbd9a32192c039241347a29d0c3ea1c456bdecd7d5bd7aeccb3212e4ad7f6bc8', 7, '$2y$10$eKxASITSRkUq9kK.19n5uOd6/tWXh64nk.tlJ42k5M73SmmBRSqz6'),
('be23428c8d172c92bc5ae7999243b48b1618df308e34a2adc26363e85d9ba1a4', 3, '$2y$10$9pXlzTJp5LdldaciCTJ87uqZ.jsl8QgOfwvPKarg0EGIXCal/QXG6'),
('c7e77c02c704f95be09d416dacde60c373c42d741d06541cb42221c7c0f42408', 3, '$2y$10$zjVQcif26SFxW43ucEhMnu3GB6R7b5K/PKx4N3AlGqhYMyhYcuwXK'),
('c99a9fffb353474a94e923250dab815d480b7a8aa1255e6bc0723c64941c8992', 3, '$2y$10$3LbdNPzi2MlT9zYnL2pdp.wUIMu2DA.4FxehWh21hRVp3GVHRm/va'),
('cb17a17e58ffe875a4cdc5cf0ededbbd3767bad870d854c2885766f7b8e3979c', 3, '$2y$10$KTYTyCh6TNLDnopS9RjeFOGe4hNlXLSnNfQIg3r0O11fklbmDzfTe'),
('cd9a57644b4d9bdd95b6000cce58b15e78ca133989dfe72397285b2eda363776', 3, '$2y$10$fQQxarksO5KzRWepnYLone2yuYxrA3SXEvtlPS0vgbT9svyJsCz.O'),
('d9eca4a8d8ccf4d2514ef3e681abd9c7756815561a39fd2042b388453b2c540c', 7, '$2y$10$hELlqjPZUKtodZKISiEkSuQxcN9Gi.ixcgRmMMf2gUGWyQrvwI64m'),
('df0625ceab1ad6c21dd789d2204682d1434a5792cbb4701585ab5ff2bb4b3ac9', 7, '$2y$10$ej4dZGAh11MfvFfx5iUUWu5sLq5EisTPf.ShWsjBj.KjfzsxkZXA2'),
('e17e38843759156f63cf7dce5dad19af832e77bd2e59ffb24d07802c1bdd0b43', 7, '$2y$10$A49nUQwCFaBVAc/CbF0LQeHr95xE4kAIyfwcbOuXsDPzTocgNqKBG'),
('e21c2ead7bd569bb2139793fa0dcf2c91bb23d7776f117ca2e97ae938f928192', 3, '$2y$10$QZU/xMvczPxFPhOETLrGSeLibidZTEAeojyWIf46nZ5SWekbAUwCW'),
('e421621712f5634fa6919d3b5fe0bbd154bd0f8ce6643387db0a7adb250ce3be', 3, '$2y$10$7LaDk7tCByk8vCYtOM7dYe.7o3pk/zuYgxtNfs9zSFLfEjfxcnrQy'),
('e4507e0d5073bd4257717bd47c5cd6708af1e9fb8abd57ab6d0636f7effccafa', 7, '$2y$10$SfY/FWxUtcTK5wBtbfO6XuX1HS8TdDY30tljDOXHq0qyta./SxSGS'),
('e4d554baed3cab00415f617b3b8f35aa498bbb2334cbe6a785e6e032e0470932', 7, '$2y$10$hfdzqkZWxhPTUqWu47xNVOSi5g8OUMHqbgLzOVT0ZEVoem6wy0RIC'),
('e4e56956bd5e73fc1e8c488c14d2174d7558e72db717b0363825f673ad2fc1ac', 7, '$2y$10$WjfLDzLZ1cacxEeb1wcUvudTQGoDAgrHhsW4DaboKBwjlGqxPnpp.'),
('e8d9c6490814312a634d85335af5415de1defc790b4c36726aaad555dec6554d', 7, '$2y$10$9/nJXEMkPwjcxL.N8tF3BurEpofhhQTgVqGpyIMl5/FYPB/YC/aSW'),
('eb892d2ef81030c95f0b180cab350cb71acc150b0e57e1fb07d200213972e680', 7, '$2y$10$kCdpWxGK19szTNq8yS5mfe2Ll5YSnbU6b/01xLFbIV/KSjMCu7cwe'),
('ec6c47fe1c1333527eda3008f6b36674ff67f2d8e37278797486d958a53a4d32', 7, '$2y$10$b4VNkjaNmUt0XIlbTQSA.u6rjdNuLsoY/qLz6.3IgaT5SnOrIZfD2'),
('ecb881530674d63732f75e6429b5ce9d6a21f5d09eb06c1c0e071614f3ef9ff4', 7, '$2y$10$NC0lMVNPs.L0HUQ2I6vWBOU8hJz/.N4A5/VEES7u7O4BsEROLXeoO'),
('f1516ca8e0bf0d0bbb73419e8afa0fb71d740db6a4478aaf53bef5761bfb1824', 7, '$2y$10$Jk12EaAZ9wOUkCIYh8JETOvxa4fd8/9Yf9QKKq1SFnhf847mCK1Se'),
('fd687b20dd1aef7e568eec5290585f3c541a7e61f3749612c157b9cd890ba0c3', 7, '$2y$10$37YZs1Ya7TrRgH57k0zXtOFC1sBWq/RB5.R53VDTewdC8v70fu.Za'),
('fe4e7d87cfa46714e77d66a78432f235e9506dc215ec9c6a47fc05cfb27b376b', 3, '$2y$10$sIxcIXTYojZwZhXlzLy.1.h.0a3T5avK.cZTUOtHTy5n61OCkDpCW'),
('fe72263a81ab5c9850f8b449255b46611f3b054a7c4575684f1ab6c844972dbc', 7, '$2y$10$lQd33qJc/4A8so1gPmBEfOQu1XkwmstUZ0l0pAUWh4GQ.Wxk8lIVa'),
('ff38db0a768996be853d247a9e81abd9e167c082204b04ac345600fd3d78aef0', 7, '$2y$10$B2fJ8nGAwZI4C8DGBlSgIOrcIDG/OZqLnIJ.E7ZSFAax5EEQXrT4W'),
('ff6ec307a51edc663b10711eba73da098c2cde5017130202034d9c58cb510ac2', 3, '$2y$10$kzmTqqi5t6rb/M5OVSEuiOXqDJQweKxfrdRlZ9J6rsJVuk5Fw9s0u');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `email`) VALUES
(7, '123', '$2y$10$UPpinyXaiv9ehh1uCq9peeGq5rQxUYRqv1K8lalsuMqeAZ9iBC00m', 0, '12'),
(133, '12345', '$2y$10$tl5rNBQ5eIk6rv6IoHGYqeNFHkqYS.nuyTYRqyA5tab.wV/7u370u', 1, '123456@12.com'),
(134, 'github_zhaoyiyi', '$2y$10$fHBaDDqTXtCUt3sXZco1/uv6q5cYS9rekB99Ef2zX830GpPTw4tZS', 1, 'zhao1max@gmail.com'),
(135, '1234', '$2y$10$jkJ4CO6TuoU8LqiWFhfpr.Oq7rRB6fTWFCucxJH5aJiVF81Jo3ne2', 1, '123456%4012.com'),
(138, 'test1', '123', 1, ''),
(139, '1234567', '$2y$10$GJ9ObSkCUM2nihHtWAnAyu699cHqC1LTfiHahJc7F5B3r1izXYAuC', 1, 'asdf%40q213.com'),
(140, '321', '$2y$10$5DyGGhAk2QxcIXreL2hLxuzk86Za.xT2m8rB3Bqn2R9.HpAMImhDK', 1, '321%40321.com');

-- --------------------------------------------------------

--
-- 表的结构 `user_resum`
--

CREATE TABLE IF NOT EXISTS `user_resum` (
  `user_resum_id` int(11) NOT NULL,
  `First name` varchar(50) NOT NULL,
  `Last name` varchar(50) NOT NULL,
  `phone number` varchar(50) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `School name` varchar(255) NOT NULL,
  `Date of graduation` text NOT NULL,
  `introduction` text NOT NULL,
  `sex` char(2) NOT NULL,
  `ATTACH_FILE` varchar(100) NOT NULL,
  PRIMARY KEY (`user_resum_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user_resum`
--

INSERT INTO `user_resum` (`user_resum_id`, `First name`, `Last name`, `phone number`, `Email`, `birthday`, `School name`, `Date of graduation`, `introduction`, `sex`, `ATTACH_FILE`) VALUES
(1, 'bin', 'liu', '6453247285', 'hunbdr@gmail.com', '01-05-1989', 'humber', '01-09-2016', 'To work as an HR Summer Student at Ontario Energy Board where, I am aspiring to contribute my professional education, interpersonal and organizational skills and to add value to Ontario Energy Board and HR team in accomplishing its goals', 'ma', ' '),
(2, 'aleax', 'send', '1234545678', 'liubindr@gmail.com', '01-05-1989', 'humber', '01-03-2016', '•	Familiar with employment law, OHSA and JHSC; skilled decision maker and problem solver by balancing employees’ needs with law and company’s policy', 'fa', ' '),
(3, 'zhao', 'yi', '6453247285', 'lina@gmail.com', '01-05-1989', 'sence', '01-03-2014', '•	Helped to prepare payroll, position evaluations and performance review report\r\n•	Collected and analyzed internal and external compensation statistics, identified trends and proposed recommendations to HR manager\r\n•	Assisted in adjusting salary structures and designing compensation packages based on company’s budget while complying with government laws and regulations\r\n•	Researched for other discount and noncash incentive to existing benefit programs\r\n', 'fa', ' ');

--
-- 限制导出的表
--

--
-- 限制表 `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Customer_Id`) REFERENCES `users` (`id`);

--
-- 限制表 `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`Order_Id`) REFERENCES `orders` (`Order_Id`);

--
-- 限制表 `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`Cinema_ID`) REFERENCES `cinemas` (`Cinema_ID`);

--
-- 限制表 `running_films`
--
ALTER TABLE `running_films`
  ADD CONSTRAINT `fk_films` FOREIGN KEY (`Film_Id`) REFERENCES `films` (`Film_Id`),
  ADD CONSTRAINT `running_films_ibfk_1` FOREIGN KEY (`Room_ID`) REFERENCES `rooms` (`Room_ID`);

--
-- 限制表 `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`Room_ID`) REFERENCES `rooms` (`Room_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
