SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `php_project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `php_project`;

DROP TABLE IF EXISTS `answer`;
CREATE TABLE IF NOT EXISTS `answer` (
  `answer_id` int(11) NOT NULL DEFAULT '0',
  `question_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `categories` (`categoryID`, `categoryName`) VALUES
(1, 'NowShowing'),
(2, 'ComingSoon');

DROP TABLE IF EXISTS `cinemas`;
CREATE TABLE IF NOT EXISTS `cinemas` (
  `Cinema_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Cinema_Name` varchar(255) NOT NULL,
  `Cinema_Address` varchar(255) NOT NULL,
  PRIMARY KEY (`Cinema_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `cinemas` (`Cinema_ID`, `Cinema_Name`, `Cinema_Address`) VALUES
(1, 'Cinema1', '110 Courtneypark Dr E, Mississauga, ON, L5T 2Y3'),
(2, 'Cinema2', 'Yorkdale Shopping Centre, 3401 Dufferin Street , c/o Yorkdale Shopping Centre, Toronto, ON, M6A 2T9');

DROP TABLE IF EXISTS `contactus`;
CREATE TABLE IF NOT EXISTS `contactus` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Message` text NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

INSERT INTO `contactus` (`contact_id`, `first_name`, `last_name`, `Email`, `Message`) VALUES
(2, 'navaz', 'sheikh', 'navaz@gmail.com', 'Hello world'),
(3, 'amrin', 'sheikh', 'amrin@gmail.com', 'Hello canada'),
(10, 'rayaji', 'patel', 'raj@yahoo.com', '    How are you         '),
(21, 'ankit', 'Desai', 'ankit@yahoo.com', 'how are you'),
(23, 'ankush', 'patel', 'ankush@gmail.com', 'hello'),
(26, 'magan', 'magan', 'magan@ymail.com', 'wjdi'),
(28, 'Dhruv', 'Shah', 'dhruv@ymail.com', 'Hello Toronto            '),
(29, 'abaa', 'sdfsafae', 'sd@gmail.com', '        wegfwgw    '),
(33, 'Abarar', 'Sheikh', 'er.abrar@gmail.com', '    dfwsws        '),
(34, 'wefw', 'qw', 'hy@gmail.com', '         lnlf   '),
(35, 'lflmw', 'w;fw;', 'ti@gmail.com', '   ;fmw;w         '),
(36, 'fadwwf', 'wfwr', 'er.abrar@gmail.com', '         wfsfws   '),
(44, 'adfasdf', 'adfasdf', 'dfdadf@123.com', 'asdfasdf'),
(49, 'adfasdf', 'adfsd', 'sdfsdf@12.com', ''),
(50, 'adfasdf', 'adfsd', 'sdfsdf@12.com', ''),
(51, 'asdfasdf', 'sdfsdf', 'sdfsdf@12.com', 'dfasdf'),
(54, 'adf', 'sdfsdf', 'sdfsdf@12.com', 'sdf'),
(55, 'Yi', 'Zhao', 'zhao1max@gmail.com', '                           asdfsdfsd               sdf                  asdf');

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `questions` varchar(255) DEFAULT NULL,
  `answers` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `faq` (`question_id`, `questions`, `answers`, `category`) VALUES
(1, 'Why Become An Online Member?', 'answer1.txt', 'Membership Question'),
(2, '5 Simple Steps To Buy Tickets Online.', 'answer2.txt', 'Booking Question'),
(3, 'Charges For Booking Tickets Online?', 'answer3.txt', 'Booking Question'),
(4, 'Can I Book Tickets In Advance?', 'answer4.txt', 'Booking Question'),
(5, 'Can I Cancel Tickets Booked Online And Get A Refund?', 'answer5.txt', 'Booking Question');

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `username` varchar(50) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `mobile_tel` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `reply_content` text NOT NULL,
  `reply_time` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `feedback` (`username`, `sex`, `mobile_tel`, `email`, `address`, `content`, `reply_content`, `reply_time`, `create_time`, `update_time`, `id`, `title`) VALUES
('1', 0, '4172446525', '1', '123344556', 'hello,please phoneme', 'hello~~~I am waiting u', 0, 1, 0, 1, 'whyefffefre'),
('bin', 0, '1234456678', 'binhunmber@gmail.com', '18 ft mash1-2', 'Hello i want', 'I am good for this', 1, 1, 1, 123, 'IT'),
('bin', 1, '647346624', 'binhunmber@gmail.com', '18 ft mash1-2', 'I am very like cooking .i can do mu best,I have enough experience', 'I am very like cooking .I can do mu best,I have enough experience', 1, 1, 1, 124, 'cook');

DROP TABLE IF EXISTS `films`;
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO `films` (`Film_Id`, `Film_Time`, `Film_Name`, `Film_Director`, `Film_Actor`, `Film_pic`, `Film_length`, `Price_Full`, `Avaliable`, `film_description`, `LANGUAGE`) VALUES
(1, '2016-02-12', 'Deadpool', 'Tim Miller', 'Ryan Reynolds', 'image/deadpool.jpg', '1h 48m', 14, 'Y', 'film1', 'English'),
(2, '2016-01-29', 'Kung Fu Panda 3', 'Jennifer Yuh Nelson', 'Jack Black', 'image/kongfupanda.jpg', '1h 35m', 15, 'Y', 'film2', 'English'),
(3, '2015-09-05', 'Steve Jobs', 'Danny Boyle', 'Michael Fassbender', 'image/stevejobs.jpg', '2h 02m', 20, 'Y', 'film3', 'English'),
(4, '2015-12-18', 'Star Wars:The Force Awakens', 'J.J. Abrams', 'Daisy Ridley', 'image/starwar.jpg', '2h 16m', 20, 'Y', 'film4', 'English'),
(5, '2016-01-08', 'The Revenant', 'Alejandro González Iñárritu', 'Leonordo DiCaprio', 'image/TheRevenant.jpg', '2h 36m', 15, 'Y', 'film5', 'English'),
(6, '2016-02-16', 'The Mermaid', 'Stephen Chow', 'Deng Chao', 'image/meirenyu.jpg', '1h 40m', 25, 'Y', 'film6', 'CHINESE'),
(7, '2015-09-09', 'Mr. Six', 'Guan Hu', 'Feng Xiaogang', 'image/mrsix.jpg', '2h 16m', 30, 'Y', 'film7', 'CHINESE');

DROP TABLE IF EXISTS `food`;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO `food` (`Food_id`, `Food_Catagory`, `Food_Price`, `Food_Instock`, `Food_description`, `Food_mark`, `Food_Name`, `Food_Image`, `Discount_price`, `Viewed_times`, `Sales_volume`) VALUES
(1, 'special', '1.00', 2, 'good food', '5.0', 'Salmon', 'food1.jpg', '0.40', 0, 1),
(2, 'special', '7.00', 20, 'Good food', '5.0', 'Chicken', 'food2.jpg', '6.00', 0, 2),
(3, 'breakfast', '5.00', 20, 'Good food', '5.0', 'Sandwich', 'food3.jpg', '4.00', 0, 3),
(4, 'breakfast', '7.00', 10, 'Good food', '5.0', 'Pancake Dippers', 'food1.jpg', '7.00', 0, 0),
(5, 'breakfast', '9.00', 30, 'Applewood smoked bacon, country sausage, onions, green peppers and American cheese.', '5.0', 'The Farmer', 'food1.jpg', '9.00', 0, 0),
(6, 'LunchAndDinner', '10.00', 10, 'Dressings: White Balsamic Vinaigrette, Blue Cheese, French, Honey Mustard, Buttermilk Ranch and Thousand Island. (Dressings may vary. Please ask your server.)', '5.0', 'Salads & Soups', 'food1.jpg', '10.00', 0, 0),
(7, 'LunchAndDinner', '12.00', 20, 'Served with choice of fries, tots, garden salad, fruit or cup of soup. Sub Onion Rings for an additional charge. All burgers prepared medium well.', '5.0', 'Between Two Buns', 'food1.jpg', '12.00', 0, 0),
(8, 'Bakery', '8.00', 10, 'We only use 100% real whipped cream. So go ahead, dive fork first into delicious.', '5.0', 'Rich Cream Pies', 'food1.jpg', '8.00', 0, 0),
(9, 'LunchAndDinner', '8.00', 10, 'Chunks of tender, all-white chicken with carrots, onions, celery and peas in a rich cream sauce and served with a garden salad. Baked fresh, so we may run out! Available after 11 a.m. No sides', '5.0', 'Fresh Baked Chicken Pot Pie', 'food9.jpg', '8.00', 0, 0),
(10, 'LunchAndDinner', '11.00', 15, 'Crispy all-white chicken breast strips with Honey Mustard dipping sauce.', '5.0', 'Chicken Strips Dinner', 'food10.jpg', '11.00', 0, 0),
(11, 'LunchAndDinner', '15.00', 10, 'A generous portion of crispy jumbo butterfly shrimp served with zesty cocktail sauce.', '5.0', 'Jumbo Shrimp Dinner', 'food11.jpg', '15.00', 0, 0),
(12, 'LunchAndDinner', '13.00', 15, 'Cajun-seasoned medley of smoked sausage, shrimp and chicken, grilled together with green peppers and onions. Tossed with a spicy Creole sauce and served over thin spaghetti. No sides', '5.0', 'Ragin'' Cajun', 'food12.jpg', '13.00', 0, 0),
(13, 'LunchAndDinner', '15.00', 10, 'Your choice of grilled shrimp, chicken or steak* tips with fresh broccoli, red peppers and onions, drizzled with a zesty sweet chili sauce and served over jasmine rice. No sides\r\nAvailable with Shrimp, Chicken or Steak (prices vary).', '5.0', 'San Francisco Stir Fry', 'food13.jpg', '15.00', 0, 0);

DROP TABLE IF EXISTS `food_comment`;
CREATE TABLE IF NOT EXISTS `food_comment` (
  `Comment_id` int(8) NOT NULL AUTO_INCREMENT,
  `Food_id` int(8) NOT NULL,
  `User_id` int(8) NOT NULL,
  `Comment` varchar(500) NOT NULL,
  `Mark` float(3,2) NOT NULL,
  `Evaluation` int(1) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO `food_comment` (`Comment_id`, `Food_id`, `User_id`, `Comment`, `Mark`, `Evaluation`, `Date`) VALUES
(1, 1, 1, 'good', 5.00, 1, '2016-03-02'),
(2, 1, 3, 'Bad', 3.00, 3, '2016-03-11');

DROP TABLE IF EXISTS `food_order`;
CREATE TABLE IF NOT EXISTS `food_order` (
  `Order_id` int(8) NOT NULL AUTO_INCREMENT,
  `User_id` int(8) NOT NULL,
  `Order_time` date NOT NULL,
  `Total_price` decimal(10,2) NOT NULL,
  `Phone_number` varchar(11) NOT NULL,
  `State` int(1) NOT NULL,
  PRIMARY KEY (`Order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `food_order` (`Order_id`, `User_id`, `Order_time`, `Total_price`, `Phone_number`, `State`) VALUES
(1, 1, '2016-03-02', '9.00', '6477725042', 0);

DROP TABLE IF EXISTS `food_order_item`;
CREATE TABLE IF NOT EXISTS `food_order_item` (
  `Order_item_id` int(8) NOT NULL AUTO_INCREMENT,
  `Food_id` int(8) NOT NULL,
  `Order_id` int(8) NOT NULL,
  `Quantity` int(8) NOT NULL,
  `Size` int(1) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Cinema` varchar(50) NOT NULL,
  PRIMARY KEY (`Order_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `food_order_item` (`Order_item_id`, `Food_id`, `Order_id`, `Quantity`, `Size`, `Date`, `Time`, `Cinema`) VALUES
(1, 1, 1, 2, 0, '0000-00-00', '00:00:00', '');

DROP TABLE IF EXISTS `food_shoppingcart`;
CREATE TABLE IF NOT EXISTS `food_shoppingcart` (
  `Id` int(8) NOT NULL AUTO_INCREMENT,
  `User_id` varchar(8) NOT NULL,
  `Food_id` int(8) NOT NULL,
  `Quantity` int(8) NOT NULL,
  `Size` int(1) NOT NULL,
  `Cinema_Name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO `food_shoppingcart` (`Id`, `User_id`, `Food_id`, `Quantity`, `Size`, `Cinema_Name`, `price`) VALUES
(1, '1', 1, 5, 2, '0', '0.00'),
(13, '7', 1, 2, 1, 'Cinema_Name', '0.40'),
(14, '7', 2, 3, 2, 'Cinema_Name', '6.00');

DROP TABLE IF EXISTS `food_test`;
CREATE TABLE IF NOT EXISTS `food_test` (
  `Test_id` int(8) NOT NULL AUTO_INCREMENT,
  `Score` int(3) NOT NULL,
  `User_id` int(8) NOT NULL,
  PRIMARY KEY (`Test_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `food_test` (`Test_id`, `Score`, `User_id`) VALUES
(1, 60, 1);

DROP TABLE IF EXISTS `food_test_question`;
CREATE TABLE IF NOT EXISTS `food_test_question` (
  `Question_id` int(11) NOT NULL AUTO_INCREMENT,
  `Question` varchar(200) NOT NULL,
  `Option1` varchar(100) NOT NULL,
  `Option2` varchar(100) NOT NULL,
  `Option3` varchar(100) NOT NULL,
  `Option4` varchar(100) NOT NULL,
  `Answer` int(1) NOT NULL,
  PRIMARY KEY (`Question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `food_test_question` (`Question_id`, `Question`, `Option1`, `Option2`, `Option3`, `Option4`, `Answer`) VALUES
(1, '1234567', 'A', 'B', 'C', 'D', 2);

DROP TABLE IF EXISTS `food_user_recording`;
CREATE TABLE IF NOT EXISTS `food_user_recording` (
  `Record_id` int(8) NOT NULL AUTO_INCREMENT,
  `User_id` int(8) NOT NULL,
  `Total_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`Record_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO `food_user_recording` (`Record_id`, `User_id`, `Total_amount`) VALUES
(1, 1, '80.00');

DROP TABLE IF EXISTS `logo`;
CREATE TABLE IF NOT EXISTS `logo` (
  `Logo_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Logo_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Logo_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `logo` (`Logo_Id`, `Logo_image`) VALUES
(1, 'image\\logo\\logo1.png'),
(2, '\\image\\logo\\logo2.png'),
(3, '\\image\\logo\\logo3.jpg'),
(4, '\\image\\logo\\logo4.jpg');

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `name` varchar(20) NOT NULL,
  `menu` text NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `menus` (`name`, `menu`) VALUES
('Main', '[{"name":"test page","link":"\\/page\\/24"},{"name":"Booking","link":"\\/booking"},{"name":"Movies","link":"\\/movies"},{"name":"Food","link":"\\/food"},{"name":"Career","link":"\\/career"}]');

DROP TABLE IF EXISTS `moviefeature`;
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO `moviefeature` (`film_id`, `title`, `language`, `releaseDate`, `director`, `cast`, `img`) VALUES
(16, 'SINGHAM', '', '2010-02-10', 'sgdsg', ' aflnwlflwfw ', '../Assets/image/HomePage/kongfupanda.jpg'),
(21, 'kwnklwn', '', '2015-05-04', ' dwewef', '    skfjsjkfjlsl  ', '/Assets/image/HomePage/starwar.jpg');

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `Order_Id` int(11) NOT NULL AUTO_INCREMENT,
  `Order_DATE` datetime DEFAULT NULL,
  `Customer_Id` int(11) DEFAULT NULL,
  `Total_Price` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Order_Id`),
  KEY `Customer_Id` (`Customer_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `link` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO `pages` (`id`, `name`, `content`, `link`) VALUES
(7, 'test123', '<p>2asdfwefwef</p><p>asdfsdf</p>', '/page/7'),
(8, '123423', '<h1 style="text-align: center;">Welcome</h1><p><img style="display: block; margin-left: 50%; transform: translateX(-50%);" src="data:image/png;base64,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" /></p><p>123123123</p><p>test</p><p>adfasdfasdf</p>', '/page/8'),
(9, 'sdfwef123', '<h1 style="text-align: center;">Welcome</h1><p><img style="display: block; margin-left: 50%; transform: translateX(-50%);" src="data:image/png;base64,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" /></p>', '/page/9');
INSERT INTO `pages` (`id`, `name`, `content`, `link`) VALUES
(10, 'sdfgsdf', '<h1 style="text-align: center;">Welcome</h1><p><img style="display: block; margin-left: 50%; transform: translateX(-50%);" src="data:image/png;base64,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" /></p>', '/page/10'),
(11, 'qweqwe', '<h1 style="text-align: center;">Welcome</h1><p>asdf234123</p><p>asdfadf</p><p>123123</p><p>asdf</p><p><img style="display: block; margin-left: 50%; transform: translateX(-50%);" src="data:image/png;base64,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" /></p>', '/page/11'),
(23, 'test2', '<p>adfsdfwef</p>', '/page/23'),
(24, '321', '<h1 style="text-align: center;">asdfsadfsadf</h1><p>adsfsoiwejf</p><p>Â </p><p>Â </p><p><strong>tesasdfsdfsdfsdfsdf</strong></p><p>Â </p>', '/page/24'),
(25, 'newfasdfasdf', '<table border="1" cellpadding="0" cellspacing="0" style="width: 100%"><tbody><tr><td>Â </td><td>Â </td><td>Â </td></tr><tr><td>Â </td><td>Â </td><td>Â </td></tr><tr><td>Â </td><td>Â </td><td>Â </td></tr></tbody></table><p>Â </p>', '/page/25');

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `answer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `question` (`id`, `title`, `answer_id`) VALUES
(1, 'What is stored in $message by the code that follows?', 1),
(2, 'How many times will the while loop that follows be executed?', 5),
(3, 'Which function searches for a regular expression in a string and returns 1 if the pattern is found?', 11),
(4, 'The function that follows returns\r\nfunction coin_toss() {if (mt_rand(0, 1) == 0) $coin = heads else $coin =  tails return $coin', 16),
(5, 'What does $message contain after the following code executes?', 11),
(6, 'A PHP variable name', 14);

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `rating_id` int(11) NOT NULL AUTO_INCREMENT,
  `rating_Name` varchar(50) NOT NULL,
  `rating_Total` int(11) NOT NULL,
  `rating_Votes` int(11) NOT NULL,
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `rating` (`rating_id`, `rating_Name`, `rating_Total`, `rating_Votes`) VALUES
(1, 'alex', 4, 2),
(2, 'Tom', 5, 1),
(3, 'mike', 6, 4),
(4, 'yi', 7, 4);

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `rating_id` int(10) NOT NULL,
  `total_votes` int(5) NOT NULL DEFAULT '0',
  `total_value` int(5) NOT NULL DEFAULT '0',
  `used_ips` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rating_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `ratings` (`rating_id`, `total_votes`, `total_value`, `used_ips`, `date`) VALUES
(1, 1, 5, 'a:1:{i:0;s:9:"127.0.0.1";}', '2016-04-01 04:00:00');

DROP TABLE IF EXISTS `reservations`;
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `Room_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Room_Name` varchar(255) NOT NULL,
  `Cinema_ID` int(11) NOT NULL,
  `available` char(1) DEFAULT 'Y',
  PRIMARY KEY (`Room_ID`),
  UNIQUE KEY `Room_Name` (`Room_Name`,`Cinema_ID`),
  KEY `Cinema_ID` (`Cinema_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `rooms` (`Room_ID`, `Room_Name`, `Cinema_ID`, `available`) VALUES
(1, 'ROOM1', 1, 'Y'),
(2, 'ROOM2', 1, 'Y'),
(3, 'ROOM1', 2, 'Y'),
(4, 'ROOM2', 2, 'Y');

DROP TABLE IF EXISTS `running_films`;
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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `seats`;
CREATE TABLE IF NOT EXISTS `seats` (
  `Seat_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Room_ID` int(11) NOT NULL,
  `Seat_Name` varchar(255) DEFAULT NULL,
  `available` char(1) DEFAULT 'Y',
  `Run_Time` datetime DEFAULT NULL,
  PRIMARY KEY (`Seat_ID`),
  UNIQUE KEY `uc_seat` (`Room_ID`,`Seat_Name`,`Run_Time`)
) ENGINE=InnoDB AUTO_INCREMENT=211 DEFAULT CHARSET=latin1;

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
(47, 1, 'B2', 'Y', '2016-02-22 09:30:00'),
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

DROP TABLE IF EXISTS `terms`;
CREATE TABLE IF NOT EXISTS `terms` (
  `terms_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`terms_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO `terms` (`terms_id`, `title`, `info`) VALUES
(1, 'Definitions', 'Definitions.txt'),
(2, 'Purchasing tickets online', 'PurchasingOnline.txt'),
(3, 'Booking of Tickets', 'BookingTickets.txt'),
(4, 'Cancellation of tickets', 'CancellationTickets.txt'),
(5, 'General Conditions', 'GeneralCanditions.txt');

DROP TABLE IF EXISTS `tokens`;
CREATE TABLE IF NOT EXISTS `tokens` (
  `id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tokens` (`id`, `user_id`, `token`) VALUES
('070d6be12c0fdd10447bd1d665db0b158459f91b2b704c2ba5f5095131baeeb9', 3, '$2y$10$8rzSfISQtkdKNx24G3ApcuUzrIk7oQL0gN4vG9kKQ2j3yRonEWRSG'),
('2884930a1edab39c0481b7c17a3ac52e156b3fc2b809500a293c51a9e3d7b413', 3, '$2y$10$OKcZDGrzO/8.IP4N0b27Ae34jk2Wer3C4DDNhWoY36DQY9cSJe.w2'),
('2b27ddcb2dcba5a50e0a97f044f2db8896a9a7adf87d69a954628a12bc03f305', 3, '$2y$10$Uc6gZvDriItM1F2nHPn.xuLQBPQKIOYGYjHXWhKc9VVjXRt2ZDEpq'),
('30895ddf93f267f4f3a5ff4ce3c70497c3016ecc257e2635109f93f5c89e72ba', 3, '$2y$10$vVOFBaiVV3OlHH8vuAYyUe0KyOwP/rK9m3vluGi8KltlacQ/cHuby'),
('43e89721678940770a55a46c7661b3c6981b9d06f533aa725dc5611cd33b0a67', 3, '$2y$10$.LBFmMufQfU5ecXxyLrpeOkYwQrv2gwqczGFMe/OZVSuDAbIyUi/q'),
('48cdfa53febb3b056e98b454f08882d19f4ce860f611bd036dfcdeca26aa2e18', 3, '$2y$10$Gv6b6WG//xMrpwppNB8hU.7CAsD5zFNHjmbcLvAsr9HnlamoVRMAy'),
('4a3479a7ef40d860afbcf3a8942e4b63b3e5551bee22d24da840005108d869f8', 3, '$2y$10$saARAf3.bAd1orF9URaZQuTHU7x.ZQgd.rKJo8Ka0ENrfyNNb0jgu'),
('5865f178f04db64fc6d5b50bce1a2ebbdb8ffdd2d9c77e1029a9fec5453bca01', 3, '$2y$10$5u0S5saCHf8nCqYy5DHeP.77.4K15NDew6urVkK19bVHjf5y.ReA6'),
('5e8eee96f286e76150e619ddac5247d5b8481988eeed32c0b4b6a7095caa3a4b', 3, '$2y$10$APRuHHAp/IuOqPDiVXOogOa08mUoTYu.eJeduAGFuXHspFLgwKO5G'),
('659c9888dd8104398434cdd72dc45cc6d398990019d27de06e249fa66d0e6db2', 3, '$2y$10$x/GPTq3v6VvboJM1cXbFHO0b3i15tXZWzxeElIJQ.2o.RV4XYffHm'),
('6ebfb1305fd9eab85a1a89829109d19cb563a6442c080bce3f550bdba0a830b8', 3, '$2y$10$0uWBtQTe3kokXA5hvjFXkuYGw.z02p5j1nFMuwpF256HNkjFIFp.m'),
('af081e7f767d3037c9d48d165bc0c5b942b484b1f352ead3673650a9059f6367', 3, '$2y$10$qKw/lqZR7jZvKB7edr.WzuJYukf7QLpSaXhvh7ufCKM6gbuSovxbi'),
('be23428c8d172c92bc5ae7999243b48b1618df308e34a2adc26363e85d9ba1a4', 3, '$2y$10$9pXlzTJp5LdldaciCTJ87uqZ.jsl8QgOfwvPKarg0EGIXCal/QXG6'),
('c7e77c02c704f95be09d416dacde60c373c42d741d06541cb42221c7c0f42408', 3, '$2y$10$zjVQcif26SFxW43ucEhMnu3GB6R7b5K/PKx4N3AlGqhYMyhYcuwXK'),
('c99a9fffb353474a94e923250dab815d480b7a8aa1255e6bc0723c64941c8992', 3, '$2y$10$3LbdNPzi2MlT9zYnL2pdp.wUIMu2DA.4FxehWh21hRVp3GVHRm/va'),
('cb17a17e58ffe875a4cdc5cf0ededbbd3767bad870d854c2885766f7b8e3979c', 3, '$2y$10$KTYTyCh6TNLDnopS9RjeFOGe4hNlXLSnNfQIg3r0O11fklbmDzfTe'),
('cd9a57644b4d9bdd95b6000cce58b15e78ca133989dfe72397285b2eda363776', 3, '$2y$10$fQQxarksO5KzRWepnYLone2yuYxrA3SXEvtlPS0vgbT9svyJsCz.O'),
('e21c2ead7bd569bb2139793fa0dcf2c91bb23d7776f117ca2e97ae938f928192', 3, '$2y$10$QZU/xMvczPxFPhOETLrGSeLibidZTEAeojyWIf46nZ5SWekbAUwCW'),
('e421621712f5634fa6919d3b5fe0bbd154bd0f8ce6643387db0a7adb250ce3be', 3, '$2y$10$7LaDk7tCByk8vCYtOM7dYe.7o3pk/zuYgxtNfs9zSFLfEjfxcnrQy'),
('fe4e7d87cfa46714e77d66a78432f235e9506dc215ec9c6a47fc05cfb27b376b', 3, '$2y$10$sIxcIXTYojZwZhXlzLy.1.h.0a3T5avK.cZTUOtHTy5n61OCkDpCW'),
('ff6ec307a51edc663b10711eba73da098c2cde5017130202034d9c58cb510ac2', 3, '$2y$10$kzmTqqi5t6rb/M5OVSEuiOXqDJQweKxfrdRlZ9J6rsJVuk5Fw9s0u');

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `items` text NOT NULL,
  `cost` double NOT NULL,
  `is_paid` tinyint(1) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO `transactions` (`id`, `user_id`, `items`, `cost`, `is_paid`, `time`) VALUES
(1, 1, '[{movie: {id: 1, amount: 3}, {id: 2, amount: 1}, food: {id: 2, amount: 2}}]', 20.34, 0, '2016-03-01 00:00:00'),
(2, 0, '{"test":"123","p2":234}', 12, 0, '0000-00-00 00:00:00'),
(3, 0, '{"test":"121233","p2":234}', 12, 0, '0000-00-00 00:00:00'),
(4, 0, '{"test":"121233","p2":234}', 12, 0, '2016-03-21 18:09:05');

DROP TABLE IF EXISTS `users`;
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
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `password`, `role_id`, `email`) VALUES
(1, 'test', 'test', 1, '123'),
(3, 'abc', '$2y$10$oNdeFwyBJdCsQy2e0LYfA.oVe5A65SUVeqPBGZlVqukH2AkgBgEdy', 1, '00'),
(7, '123', '$2y$10$UPpinyXaiv9ehh1uCq9peeGq5rQxUYRqv1K8lalsuMqeAZ9iBC00m', 0, '12'),
(133, '12345', '$2y$10$tl5rNBQ5eIk6rv6IoHGYqeNFHkqYS.nuyTYRqyA5tab.wV/7u370u', 1, '123456@12.com'),
(134, 'github_zhaoyiyi', '$2y$10$fHBaDDqTXtCUt3sXZco1/uv6q5cYS9rekB99Ef2zX830GpPTw4tZS', 1, 'zhao1max@gmail.com'),
(135, '1234', '$2y$10$jkJ4CO6TuoU8LqiWFhfpr.Oq7rRB6fTWFCucxJH5aJiVF81Jo3ne2', 1, '123456%4012.com');

DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `phone` varchar(14) CHARACTER SET utf8 DEFAULT NULL,
  `street` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `city` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `province` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

INSERT INTO `user_profiles` (`id`, `first_name`, `last_name`, `phone`, `street`, `city`, `province`) VALUES
(1, 'Johanna', 'Steele', '(956) 434-2004', '153 Poplar Street', 'Inkerman', 'Puerto Rico'),
(2, 'Kathleen', 'Garner', '(814) 545-2100', '651 Kenmore Court', 'Kidder', 'Arizona'),
(3, 'Cannon', 'Stark', '(956) 439-2216', '941 Lexington Avenue', 'Bradenville', 'Virginia'),
(4, 'Serrano', 'Mcgowan', '(838) 458-3300', '64 Story Street', 'Maury', 'Palau'),
(5, 'Elizabeth', 'Forbes', '(993) 586-3522', '366 Glenmore Avenue', 'Hailesboro', 'Kentucky'),
(6, 'Anderson', 'Singleton', '(972) 403-3026', '705 Furman Street', 'Whitmer', 'California'),
(7, 'Barrera', 'Baker', '(955) 456-3360', '509 Livingston Street', 'Delshire', 'North Carolina'),
(8, 'Richmond', 'Farmer', '(968) 488-2915', '527 Greenpoint Avenue', 'Buxton', 'New York'),
(9, 'Campos', 'Lyons', '(837) 570-2856', '460 Stillwell Avenue', 'Goldfield', 'Vermont'),
(10, 'Sheppard', 'Alston', '(922) 479-3374', '824 Fenimore Street', 'Sabillasville', 'Ohio'),
(11, 'Deidre', 'Briggs', '(943) 476-2364', '451 Polar Street', 'Crown', 'Indiana'),
(12, 'Lynette', 'Hancock', '(903) 511-3905', '450 Sheffield Avenue', 'Bladensburg', 'Connecticut'),
(13, 'Roth', 'Alvarez', '(925) 534-2096', '389 Richards Street', 'Belmont', 'Michigan'),
(14, 'Perez', 'Boyd', '(880) 483-2697', '415 Hoyts Lane', 'Hickory', 'Hawaii'),
(15, 'Lela', 'Fletcher', '(940) 469-2261', '508 Royce Street', 'Caberfae', 'New Hampshire'),
(16, 'Meghan', 'Brewer', '(833) 482-2187', '185 Caton Avenue', 'Garnet', 'Minnesota'),
(17, 'Marcy', 'Logan', '(942) 421-3696', '479 Ralph Avenue', 'Florence', 'Virgin Islands'),
(18, 'Roach', 'Conner', '(829) 528-3685', '17 Stryker Court', 'Devon', 'South Carolina'),
(19, 'Hayden', 'Stanton', '(926) 555-3409', '270 Myrtle Avenue', 'Wawona', 'Rhode Island'),
(20, 'Harris', 'Malone', '(902) 543-3536', '590 Troy Avenue', 'Stevens', 'Alabama'),
(21, 'Lucy', 'Orr', '(800) 451-3618', '823 Colin Place', 'Chaparrito', 'Nevada'),
(22, 'Cochran', 'Morgan', '(855) 530-3221', '797 Caton Place', 'Kersey', 'New Jersey'),
(23, 'Montgomery', 'William', '(824) 482-3449', '799 Eldert Lane', 'Waikele', 'Iowa'),
(24, 'Brewer', 'Farrell', '(897) 490-2631', '632 Montague Street', 'Laurelton', 'Missouri'),
(25, 'Brigitte', 'Nichols', '(955) 539-3689', '395 Seaview Court', 'Datil', 'Illinois'),
(26, 'Myers', 'Soto', '(969) 539-3994', '797 McClancy Place', 'Utting', 'Oregon'),
(27, 'Alfreda', 'Watkins', '(823) 414-3027', '917 George Street', 'Dotsero', 'Pennsylvania'),
(28, 'Paige', 'Rich', '(845) 435-2502', '332 Hanover Place', 'Wells', 'Georgia'),
(29, 'Wade', 'Hayes', '(947) 583-2116', '756 Fair Street', 'Canterwood', 'Idaho'),
(30, 'Moran', 'Bean', '(943) 512-2074', '417 Duffield Street', 'Detroit', 'Guam');

DROP TABLE IF EXISTS `user_resum`;
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

INSERT INTO `user_resum` (`user_resum_id`, `First name`, `Last name`, `phone number`, `Email`, `birthday`, `School name`, `Date of graduation`, `introduction`, `sex`, `ATTACH_FILE`) VALUES
(1, 'bin', 'liu', '6453247285', 'hunbdr@gmail.com', '01-05-1989', 'humber', '01-09-2016', 'To work as an HR Summer Student at Ontario Energy Board where, I am aspiring to contribute my professional education, interpersonal and organizational skills and to add value to Ontario Energy Board and HR team in accomplishing its goals', 'ma', ' '),
(2, 'aleax', 'send', '1234545678', 'liubindr@gmail.com', '01-05-1989', 'humber', '01-03-2016', '•	Familiar with employment law, OHSA and JHSC; skilled decision maker and problem solver by balancing employees’ needs with law and company’s policy', 'fa', ' '),
(3, 'zhao', 'yi', '6453247285', 'lina@gmail.com', '01-05-1989', 'sence', '01-03-2014', '•	Helped to prepare payroll, position evaluations and performance review report\r\n•	Collected and analyzed internal and external compensation statistics, identified trends and proposed recommendations to HR manager\r\n•	Assisted in adjusting salary structures and designing compensation packages based on company’s budget while complying with government laws and regulations\r\n•	Researched for other discount and noncash incentive to existing benefit programs\r\n', 'fa', ' ');


ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`Customer_Id`) REFERENCES `users` (`id`);

ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`Order_Id`) REFERENCES `orders` (`Order_Id`);

ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_ibfk_1` FOREIGN KEY (`Cinema_ID`) REFERENCES `cinemas` (`Cinema_ID`);

ALTER TABLE `running_films`
  ADD CONSTRAINT `fk_films` FOREIGN KEY (`Film_Id`) REFERENCES `films` (`Film_Id`),
  ADD CONSTRAINT `running_films_ibfk_1` FOREIGN KEY (`Room_ID`) REFERENCES `rooms` (`Room_ID`);

ALTER TABLE `seats`
  ADD CONSTRAINT `seats_ibfk_1` FOREIGN KEY (`Room_ID`) REFERENCES `rooms` (`Room_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
