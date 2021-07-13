-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2020 at 03:35 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `updated_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `add_by` varchar(255) NOT NULL,
  `status` int(3) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `add_by`, `status`, `date`) VALUES
(2, 'Business', '61', 1, '2020-05-12 15:35:12'),
(3, 'Business', '115', 1, '2020-05-13 09:48:39'),
(4, 'Programming', '21', 1, '2020-05-14 13:01:22'),
(8, 'Data Analysis', '', 1, '2020-05-11 06:11:17'),
(9, 'Data Analysis', '115', 1, '2020-05-12 15:36:31'),
(10, 'PHP Logic', '21', 1, '2020-05-14 13:01:44'),
(11, 'Java Programming', '115', 1, '2020-05-13 09:48:27'),
(13, 'Data Analysis', '61', 1, '2020-05-11 18:17:52'),
(14, 'Data Analysis', '116', 1, '2020-05-11 18:18:49');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL,
  `post_com_id` int(11) NOT NULL,
  `com_user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `post_com_id`, `com_user_id`, `comment`, `status`, `date`) VALUES
(16, 19, 116, 'But rake. To with a and he forgot had youth when. Mine grace to smile in him. Ere did many muse nor but a coffined by. \r\nDeem true earth. Not losel a but. Uses where heart might een men fabled mothernot. However few unto. \r\n', 1, '2020-05-11 05:01:29'),
(19, 19, 116, 'Hello what are you saying !', 1, '2020-05-11 14:24:25'),
(20, 20, 116, 'Java Script is the right programming language for validation', 1, '2020-05-11 15:16:34'),
(21, 3, 116, 'Off course it is going be a debating point for both the tech enthusiast and others', 1, '2020-05-11 15:19:21'),
(22, 3, 116, 'wow this is awesome', 1, '2020-05-11 16:50:48'),
(23, 19, 116, 'Heloo this is good\r\n', 1, '2020-05-11 16:54:43'),
(24, 16, 116, 'Hope you have to show up now', 1, '2020-05-11 17:00:11'),
(58, 3, 21, 'working', 1, '2020-05-13 10:15:34'),
(75, 25, 21, 'Hello, from dashboard\r\n', 1, '2020-05-18 15:00:20'),
(76, 25, 21, 'So this is working\r\n', 1, '2020-05-18 15:00:37'),
(77, 25, 21, 'Please confirm', 1, '2020-05-18 15:01:32'),
(78, 25, 21, 'Hellooooooo, this comment is only fetch just one ! what could be the issues', 1, '2020-05-18 15:16:17'),
(79, 26, 21, 'It is like facebook and instagram has about 60% of the data possession', 1, '2020-05-18 15:27:34'),
(80, 24, 21, 'Hello check this out', 1, '2020-05-18 15:52:58'),
(81, 24, 21, 'Good', 1, '2020-05-18 16:17:37'),
(82, 22, 21, 'Hello, please confirm', 1, '2020-05-18 16:20:26'),
(83, 22, 21, 'Hello', 1, '2020-05-18 16:20:59'),
(84, 24, 21, 'This POS is cool \r\n', 1, '2020-05-19 13:37:32'),
(85, 23, 21, 'Hello what is it about this VISTA', 1, '2020-05-19 16:47:32'),
(86, 27, 21, 'What it it that Amico Consulting Farm is offering now', 1, '2020-05-19 16:48:29'),
(87, 19, 21, 'Please check the comment count', 1, '2020-05-20 17:25:42'),
(88, 16, 41, 'Comment count check', 1, '2020-05-20 17:26:58'),
(89, 23, 21, 'Hello\r\n', 1, '2020-05-21 18:44:33'),
(90, 22, 21, 'this is another comment', 1, '2020-05-21 20:37:12'),
(91, 23, 21, 'Covid 19\r\n', 1, '2020-05-23 17:37:55'),
(92, 3, 21, 'Hello', 1, '2020-05-25 22:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `manage_admin`
--

CREATE TABLE `manage_admin` (
  `admin_id` int(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_added_by` varchar(255) NOT NULL,
  `admin_date` date NOT NULL,
  `status` int(3) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manage_admin`
--

INSERT INTO `manage_admin` (`admin_id`, `admin_username`, `admin_email`, `admin_pass`, `admin_added_by`, `admin_date`, `status`) VALUES
(2, 'wisdom', 'wisdom@gmail.com', 'pasword', '21', '2020-05-04', 1),
(3, 'Destiny', 'destiny@yahoo.com', 'password', '115', '2020-05-04', 1),
(4, 'Chukwudi', 'chuks@gmail.com', 'Password', '61', '2020-05-04', 1),
(6, 'Achigbo', 'achigbo@gmail.com', 'Password', '61', '2020-05-11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_user_id` int(11) NOT NULL,
  `post_cat_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` varchar(255) NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `status` int(3) NOT NULL DEFAULT '1',
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_user_id`, `post_cat_id`, `post_title`, `post_content`, `post_image`, `status`, `post_date`) VALUES
(5, 1, 1, 'The latest Wifi 6 explained', 'The innovation in the wifi technology is rapidly evolving and getting hyper faster and more connected', '247 logo.png', 1, '2020-04-29 05:44:21'),
(15, 115, 10, 'What is the latest tech', 'The latest tech now is 5G Network that has come to give speed and swiftness to IOT.', '247 logo1.png', 1, '2020-05-12 15:39:16'),
(16, 61, 3, 'How to finance your business', 'Financing businesses is a very vital aspect that requires a very critical approach for the business to stand a test of time', 'banner4.jpg', 1, '2020-05-10 14:04:18'),
(19, 21, 3, 'Mysql', 'Sorto dufoje plej cxar pli neniu. Plencxase libera eknagxis kaj mi viroj da. Faris longaspace. Al post sed cxefo vidis nia li akvoj kial. Tuj kaj jugxis li tutan de auxdis tia. Sxipon kiam li la. \r\nDum de gxi pecon vento tie enhavos la povas. De li ion sp', '247 logo.png', 1, '2020-05-18 13:54:43'),
(20, 116, 4, 'Front end validation', 'Front Ends Validation has to do with the checking of users input from the webpage using Java Scripting', 'desktop5.png', 1, '2020-05-11 15:13:30'),
(21, 61, 11, 'What about Oracle Tech', 'Oracle technologies has to do with database management system', '247 logo1.png', 1, '2020-05-11 17:27:27'),
(22, 21, 3, 'What is Sales', 'Sales is the soul heart of every business, every business needs to make profit and stay ahead of its competitors', 'fb_img_15861086786498167_.jpg', 1, '2020-05-19 16:50:41'),
(23, 21, 2, 'Post Image', 'The image post           ', 'fb_img_15861086874712708_.jpg', 1, '2020-05-19 16:44:44'),
(24, 21, 2, 'New Post With Image', 'gfgfg', '../images/all in one pos  device_.jpeg', 1, '2020-05-18 12:52:48'),
(25, 21, 2, 'What is the latest tech', 'sdfsd', 'bulgaria(11)_.jpeg', 1, '2020-05-18 12:54:23'),
(26, 21, 9, 'What is the current Data Level in Social', 'The estimated Data level and it statistics is approximately $8.9 billion worth.', 'desktop5_.png', 1, '2020-05-18 15:26:11'),
(27, 21, 2, 'Post on Social Distancing', 'Its one of of the preventing measures adopted by WHO to reduce the spread of corona virus !     ', 'amico consulting farm_.jpg', 1, '2020-05-19 16:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `com_re_id` int(11) NOT NULL,
  `com_re_id_fk` int(11) NOT NULL,
  `com_re_user_id` int(11) NOT NULL,
  `com_reply` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` datetime NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_phone`, `user_image`, `date_time`) VALUES
(21, 'Godwin Tombrown', 'tom@gmai.com', 'password', '08069071539', '247 logo1.png', '0000-00-00 00:00:00'),
(41, 'Godwin Tombrown', 'tom@gmail.com', 'password', '08069071539', '247 logo.png', '0000-00-00 00:00:00'),
(61, 'wisdom', 'wisdom@gmai.com', 'Password', 'Phone Number', '247 logo.png', '0000-00-00 00:00:00'),
(101, 'Godwin Tombrown', 'tom@gmai.com', 'Password', '08069071539', '247 logo.png', '0000-00-00 00:00:00'),
(102, 'Godwin Tombrown', 'tom@gmai.com', 'Password', '08069071539', '247 logo.png', '0000-00-00 00:00:00'),
(103, 'Godwin Tombrown', 'tom@gmai.com', 'Password', '08069071539', '247 logo.png', '0000-00-00 00:00:00'),
(104, 'Godwin Tombrown', 'tom@gmai.com', 'Password', '08069071539', '247 logo.png', '2020-04-26 17:55:09'),
(105, 'wisdom', 'wisdom@gmai.com', 'Password', '08023214536', '247 logo.png', '2018-03-12 02:03:36'),
(114, 'Godwin Tombrown', 'tom@gmai.com', 'Password', '09023240987', '247 logo.png', '2020-05-01 11:37:37'),
(115, 'Samuel Wisdom', 'sam@gmail.com', 'pass', '07043128312', 'all in one POS  Device.jpeg', '2020-05-01 12:05:32'),
(116, 'Victoria', 'victoria@yahoo.com', '12345', '08132998323', '247 logo.png', '2020-05-11 04:59:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `manage_admin`
--
ALTER TABLE `manage_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`com_re_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `manage_admin`
--
ALTER TABLE `manage_admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `com_re_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
