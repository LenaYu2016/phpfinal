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
(2, 'special', '7.00', -67, 'Good food', '5.0', 'Chicken', 'food2.jpg', '6.00', 0, 89),
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
-- Table structure for table `food_comment`
--

CREATE TABLE `food_comment` (
  `Comment_id` int(8) NOT NULL,
  `Food_id` int(8) NOT NULL,
  `User_id` int(8) NOT NULL,
  `Comment` varchar(500) NOT NULL,
  `Mark` float NOT NULL,
  `Evaluation` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `File` varchar(50) NOT NULL,
  `Order_item_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_comment`
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
-- Table structure for table `food_order`
--

CREATE TABLE `food_order` (
  `Order_id` int(8) NOT NULL,
  `User_id` int(8) NOT NULL,
  `Order_time` date NOT NULL,
  `Total_price` decimal(10,2) NOT NULL,
  `Phone_number` varchar(11) NOT NULL,
  `State` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_order`
--

INSERT INTO `food_order` (`Order_id`, `User_id`, `Order_time`, `Total_price`, `Phone_number`, `State`) VALUES
(1, 1, '2016-03-02', '27.80', '', 0),
(39, 7, '2016-04-23', '115.00', '6477725042', 1),
(44, 7, '2016-04-28', '45.00', '6477725042', 1),
(45, 7, '2016-04-28', '51.50', '6477725042', 1),
(46, 7, '2016-04-28', '16.00', '6477725042', 1),
(47, 3, '2016-04-28', '54.00', '6477725042', 1),
(51, 3, '2016-04-28', '6.00', '6477725042', 1);

-- --------------------------------------------------------

--
-- Table structure for table `food_order_item`
--

CREATE TABLE `food_order_item` (
  `Order_item_id` int(8) NOT NULL,
  `Food_id` int(8) NOT NULL,
  `Order_id` int(8) NOT NULL,
  `Quantity` int(8) NOT NULL,
  `Size` int(1) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Cinema` varchar(50) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_order_item`
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
(62, 2, 51, 1, 1, '2016-04-13', '00:59:00', 'Cinema1', '6.00', '6.00');

-- --------------------------------------------------------

--
-- Table structure for table `food_shoppingcart`
--

CREATE TABLE `food_shoppingcart` (
  `Id` int(8) NOT NULL,
  `User_id` varchar(8) NOT NULL,
  `Food_id` int(8) NOT NULL,
  `Quantity` int(8) NOT NULL,
  `Size` int(1) NOT NULL,
  `Cinema_Name` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_shoppingcart`
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Food_id`);

--
-- Indexes for table `food_comment`
--
ALTER TABLE `food_comment`
  ADD PRIMARY KEY (`Comment_id`);

--
-- Indexes for table `food_order`
--
ALTER TABLE `food_order`
  ADD PRIMARY KEY (`Order_id`);

--
-- Indexes for table `food_order_item`
--
ALTER TABLE `food_order_item`
  ADD PRIMARY KEY (`Order_item_id`);

--
-- Indexes for table `food_shoppingcart`
--
ALTER TABLE `food_shoppingcart`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `Food_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `food_comment`
--
ALTER TABLE `food_comment`
  MODIFY `Comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `food_order`
--
ALTER TABLE `food_order`
  MODIFY `Order_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `food_order_item`
--
ALTER TABLE `food_order_item`
  MODIFY `Order_item_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `food_shoppingcart`
--
ALTER TABLE `food_shoppingcart`
  MODIFY `Id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
