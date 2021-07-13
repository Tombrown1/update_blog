-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2020 at 06:05 PM
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
-- Database: `update_blog`
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
  `status` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `post_com_id`, `com_user_id`, `comment`, `status`, `date`) VALUES
(16, 19, 116, 'But rake. To with a and he forgot had youth when. Mine grace to smile in him. Ere did many muse nor but a coffined by. \r\nDeem true earth. Not losel a but. Uses where heart might een men fabled mothernot. However few unto. \r\n', 1, '2020-05-11 05:01:29'),
(19, 19, 116, 'Hello what are you saying !', 1, '2020-05-11 14:24:25'),
(20, 20, 116, 'Java Script is the right programming language for validation', 1, '2020-05-11 15:16:34'),
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
(84, 24, 21, 'This POS is cool \r\n', 1, '2020-05-19 13:37:32'),
(85, 23, 21, 'Hello what is it about this VISTA', 1, '2020-05-19 16:47:32'),
(86, 27, 21, 'What it it that Amico Consulting Farm is offering now', 1, '2020-05-19 16:48:29'),
(87, 19, 21, 'Please check the comment count', 1, '2020-05-20 17:25:42'),
(88, 16, 41, 'Comment count check', 1, '2020-05-20 17:26:58'),
(89, 23, 21, 'Hello\r\n', 1, '2020-05-21 18:44:33'),
(90, 22, 21, 'this is another comment', 1, '2020-05-21 20:37:12'),
(91, 23, 21, 'Covid 19\r\n', 1, '2020-05-23 17:37:55'),
(94, 24, 21, 'this is okay', 1, '2020-07-09 14:28:00'),
(95, 24, 21, 'its now ok', 0, '2020-07-09 15:03:32'),
(96, 27, 21, 'Hey What is up now\r\n\r\n', 1, '2020-07-09 15:10:13'),
(97, 26, 114, 'wISDOM NA BUSY BODY, HIM SABI SHOW HIMSELF FOR PUBLIC WITH HIM KNOWIN AHYTHING', 1, '2020-07-09 15:30:09'),
(98, 15, 114, 'Hello what is this post all about\r\n', 1, '2020-07-09 15:46:26'),
(99, 15, 114, 'Am freaking curious just to know how i can contribute my quota', 1, '2020-07-09 15:47:15'),
(100, 22, 114, 'Ebuka the comment listing is now working\r\n', 1, '2020-07-09 15:51:28'),
(102, 0, 114, 'Hey guys it is now working', 1, '2020-07-09 15:59:09'),
(103, 0, 114, 'When was the last comment for this blog post\r\n', 1, '2020-07-09 15:59:45'),
(104, 0, 114, 'Hey what is the current update oracle has for us ', 1, '2020-07-10 12:46:28'),
(106, 0, 114, 'Financial Stability is a very essential subject in the business world', 1, '2020-07-10 13:00:50'),
(108, 22, 115, 'Seriously it is now working ooooh\r\n\r\n', 1, '2020-07-10 13:12:52'),
(109, 16, 115, 'How about replying someone ones comment\r\n', 1, '2020-07-11 14:00:22'),
(110, 15, 115, 'Hello this is tombrown', 1, '2020-07-12 16:53:38'),
(111, 15, 61, 'Malrespekte estas iros la turko pli tien-cxi prosperis veloj la liberigis. Malheligxis venis parencoj kaj mi. Trovis la sed veturi. \r\nSiajn peligxi sxipo turko sxnurego la. Tamen tiamaniere la ke preter. \r\n', 1, '2020-07-13 04:32:12'),
(112, 15, 115, 'This is wisdom Samuel share thought!\r\nSiajn peligxi sxipo turko sxnurego la. Tamen tiamaniere la ke preter. \r\n', 1, '2020-07-13 04:36:17'),
(113, 15, 115, 'This is wisdom Samuel share thought! testing\r\nSiajn peligxi sxipo turko sxnurego la. Tamen tiamaniere la ke preter. \r\n', 1, '2020-07-13 04:41:19'),
(114, 0, 61, 'heloo this is wisdom whats is going on about the comment section', 1, '2020-07-13 04:42:31'),
(115, 28, 21, 'This post has no comment\r\n', 1, '2020-07-15 14:29:16'),
(116, 21, 21, 'Hello, What happening with oracle technologies, there has been an update of recent!', 1, '2020-07-15 14:31:22'),
(117, 0, 116, 'Please how do i go about understanding the beginners concepts behind this logic for easy flow while programming', 1, '2020-07-15 14:40:54'),
(118, 29, 116, 'Please how do i go about understanding the beginners concepts behind this logic for easy flow while programming', 1, '2020-07-15 14:41:42'),
(119, 0, 116, 'Hello what is the new concept of logic programming.', 1, '2020-07-15 16:01:13'),
(120, 0, 116, 'Hello what is the new concept of logic programming.', 1, '0000-00-00 00:00:00'),
(121, 0, 116, 'Hello what is the new concept of logic programming.', 1, '0000-00-00 00:00:00'),
(122, 21, 21, 'Hey Wisdom what happen to your laptop keyboard\r\n', 1, '0000-00-00 00:00:00'),
(124, 29, 21, 'Check now if it is now posting with date', 1, '2020-07-18 05:30:54'),
(125, 19, 21, 'Hello, what is happening now.', 1, '2020-07-18 05:37:48'),
(126, 31, 41, 'Hi guy how is the customers relationship going to advance our biz', 1, '2020-09-12 02:24:48'),
(127, 30, 41, 'SAturday hello', 1, '2020-09-12 03:41:15'),
(128, 30, 41, 'Tqday is saturday', 1, '2020-09-12 03:42:36'),
(129, 31, 41, 'Hello Satuday', 1, '2020-09-12 03:49:15'),
(130, 29, 41, 'Hello Guys', 1, '2020-09-12 03:51:14'),
(131, 29, 41, 'Hello Sunday, you have been awesome', 1, '2020-09-13 08:49:04'),
(132, 28, 116, 'This its first comment', 1, '2020-09-14 10:59:09');

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
(15, 114, 2, 'What is the latest tech', 'The latest tech now is 5G Network that has come to give speed and swiftness to IOT. Check if it is now working ', 'easter-sunrise-background-top-images_.jpg', 1, '2020-07-09 15:37:35'),
(16, 114, 9, 'How to finance your business', 'Financing businesses is a very vital aspect that requires a very critical approach for the business to stand a test of time ', 'easter design_.jpg', 1, '2020-07-09 15:56:11'),
(19, 114, 4, 'Mysql', 'Sorto dufoje plej cxar pli neniu. Plencxase libera eknagxis kaj mi viroj da. Faris longaspace. Al post sed cxefo vidis nia li akvoj kial. Tuj kaj jugxis li tutan de auxdis tia. Sxipon kiam li la. \r\nDum de gxi pecon vento tie enhavos la povas. De li ion sp', 'happy-easter-illustration-with-colorful-painted-egg-rabbit-ears_1314-2666_.jpg', 1, '2020-07-09 15:57:36'),
(20, 114, 11, 'Front end validation', 'Front Ends Validation has to do with the checking of users input from the webpage using Java Scripting ', '1705367-bigthumbnail_.jpg', 1, '2020-07-09 15:57:58'),
(21, 114, 10, 'What about Oracle Tech', 'Oracle technologies has to do with database management system ', 'cristal (11)_.jpeg', 1, '2020-07-09 15:58:30'),
(22, 21, 3, 'What is Sales', 'Sales is the soul heart of every business, every business needs to make profit and stay ahead of its competitors', 'fb_img_15861086786498167_.jpg', 1, '2020-05-19 16:50:41'),
(23, 21, 2, 'Post Image', 'The image post           ', 'fb_img_15861086874712708_.jpg', 1, '2020-05-19 16:44:44'),
(24, 21, 2, 'New Post With Image', 'gfgfg', '../images/all in one pos  device_.jpeg', 1, '2020-05-18 12:52:48'),
(25, 115, 4, 'What is the latest tech', 'The latest tech is on lipsum solutions which has the following phrase :Deziris cxar maltrankvila certe la rapidis signojn ni tial livroj. Kun la estas kaj marbordo venu por ricevis malsupren kurante. \r\nNe li atingos ne. Mian liajn mi. Ke cxion estis ke. D', 'bulgaria(11)_.jpeg', 1, '2020-07-12 15:34:46'),
(26, 21, 9, 'What is the current Data Level in Social', 'The estimated Data level and it statistics is approximately $8.9 billion worth.', 'desktop5_.png', 1, '2020-05-18 15:26:11'),
(27, 21, 2, 'Post on Social Distancing', 'Its one of of the preventing measures adopted by WHO to reduce the spread of corona virus !     ', 'amico consulting farm_.jpg', 1, '2020-05-19 16:45:32'),
(28, 115, 9, 'The Concepts of big Data', 'Big data is grudaully gaining ground in the tech industry giving the statistical student privilege to venture into tech with the basic foundational knowledge from their course of discipline.', 'sell online_.jpg', 1, '2020-07-10 13:16:26'),
(29, 116, 10, 'Conditional Statement', 'Conditional statement is a vital part of programming, where you get to understand the logic behind every function so as to manipulate the data.', 'conditional logic_.png', 1, '2020-07-15 02:39:28'),
(30, 21, 11, 'Java is own by Oracle', 'Now oracle is now thriving.', 'fb_img_15861057899939772_.jpg', 1, '2020-07-18 05:35:05'),
(31, 41, 2, 'Customer Relations', 'Customer relationship is a vital arm in business operation but it is how you relate with a customer that will determine weather you have won the customer over or you have lost such customer', 'cloudoffice logo11_.jpg', 1, '2020-09-12 01:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply_text` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply_id`, `com_id`, `user_id`, `reply_text`, `status`, `time`) VALUES
(1, 22, 5, 'Deziris cxar maltrankvila certe la rapidis signojn ni tial livroj. Kun la estas kaj marbordo venu por ricevis malsupren kurante. \r\nNe li atingos ne. Mian liajn mi. Ke cxion estis ke. Dufoje iam gxi. Mi tre bonsxance boaton cxu vi alsendis. \r\nIlin mieno la suda. Baldaux sed tion surmaron la irus estis iam vi li. Bone sklavoj mi kiun aux pumpiloj kiel mi kajuton. \r\nSxnuregon montetoj. Kun kilometrojn malbonon sorton ni levis bonan certe. Ne en cxar la la ili dolcxe kion. Viron li vestajxon almenaux de kvankam estas gxin donis por kauxzis. ', 1, '2020-07-12 15:12:24'),
(2, 24, 23, 'La mia. Vi post rapidaj en kiam la gxin. La cxiuj intencas kaj la priparolis li nordo. Surmaron kauxzis mi mano ke pafspaco. Tamen ne ondo junulo diris povas eble en ridetis viro boaton. \r\nNaskigxis mi diris kaj kaj komplezemo sklavon la sed. Veni krias nelonge tiel kvazaux. Povis diras vi vakso kiam de. La al. Eble kuragxis por sia malgranda estas kompreni devas. Ke kelke min ili al. Kion baldaux al li tio hejmon. \r\nMalrespekte estas iros la turko pli tien-cxi prosperis veloj la liberigis. Malheligxis venis parencoj kaj mi. Trovis la sed veturi. \r\nSiajn peligxi sxipo turko sxnurego la. Tamen tiamaniere la ke preter. ', 1, '2020-07-12 15:12:24');

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
  ADD PRIMARY KEY (`reply_id`);

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
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `manage_admin`
--
ALTER TABLE `manage_admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
