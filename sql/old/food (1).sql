-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2016 at 06:06 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Food_id` int(8) NOT NULL,
  `Food_Catagory` varchar(50) NOT NULL,
  `Food_Price` decimal(10,2) NOT NULL,
  `Food_Instock` int(8) NOT NULL,
  `Food_description` varchar(500) NOT NULL,
  `Food_mark` decimal(2,1) NOT NULL,
  `Food_Name` varchar(50) NOT NULL,
  `Food_Image` varchar(50) NOT NULL,
  `Discount_price` decimal(10,2) NOT NULL,
  `Viewed_times` int(8) NOT NULL,
  `Sales_volume` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Food_id`, `Food_Catagory`, `Food_Price`, `Food_Instock`, `Food_description`, `Food_mark`, `Food_Name`, `Food_Image`, `Discount_price`, `Viewed_times`, `Sales_volume`) VALUES
(1, 'special', '1.00', 2, 'good food', '5.0', 'Salmon', 'food1.jpg', '0.40', 0, 1),
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Food_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `Food_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
