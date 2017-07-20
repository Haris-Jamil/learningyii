-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2017 at 07:18 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialnetwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `com_text` varchar(60) NOT NULL,
  `com_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `post_id`, `com_text`, `com_time`) VALUES
(1, 1, 10, 'this is a comment', '2017-07-19 21:02:46'),
(2, 2, 10, 'This is another comment by haris', '2017-07-19 22:01:30'),
(3, 2, 8, 'this is harry\'s comment', '2017-07-19 22:09:33');

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `birth_date` varchar(10) NOT NULL,
  `birth_month` varchar(30) NOT NULL,
  `birth_year` varchar(10) NOT NULL,
  `education` varchar(255) NOT NULL,
  `work` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `user_id`, `birth_date`, `birth_month`, `birth_year`, `education`, `work`, `phone`) VALUES
(1, 1, '6', 'July', '1995', 'UBIT', 'TII', '0313-235144'),
(2, 2, '4', 'April', '1999', 'Hogswart', 'don\'t work', '555-555-55'),
(3, 3, '1', 'January', '1994', 'Some Where', 'Some Where', '555-555-555');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` int(10) NOT NULL,
  `follower_id` int(10) NOT NULL,
  `following_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `follower_id`, `following_id`) VALUES
(2, 1, 2),
(3, 1, 3),
(4, 2, 3),
(5, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_data` text NOT NULL,
  `post_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `post_data`, `post_time`) VALUES
(1, 1, 'haris : 1st post', '2017-07-13 18:36:13'),
(2, 1, 'Haris : 2nd POST', '2017-07-16 12:08:33'),
(5, 1, 'Haris : 3rd post', '2017-07-16 12:08:49'),
(6, 2, 'This is Harry\'s first post!!!', '2017-07-18 18:23:58'),
(7, 2, 'another post by harrry!!', '2017-07-18 18:24:08'),
(8, 3, 'This is Goku\'s new and first post!', '2017-07-19 18:09:09'),
(9, 2, 'This is harry\'s third post <3', '2017-07-19 18:10:35'),
(10, 3, 'This is goku\'s 2nd post', '2017-07-19 19:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `auth_key` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT 'default-dp.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `email`, `auth_key`, `password`, `picture`) VALUES
(1, 'Haris ', 'Jamil', 'haris123', 'harismark1@gmail.com', 'ZwyOXiT3Mbd_5lRV6ZdkSWEVoziIPxRN', 'a724fe728a2b49d3f41a0c2120eb7780', 'Haris .jpg'),
(2, 'Harry', 'Potter', 'harry123', 'harry@potter.com', 's-I1kqmfhoQXkkmfzcW_BJWTdEi2BMQN', 'd0d2b883ffe11676af7e678cf45a36fa', 'Harry.jpg'),
(3, 'Son', 'Goku', 'goku123', 'goku@dbz.com', 'U40uZ7E2uPezazJZJ-Hcg2YMLL6JSlXZ', '827ccb0eea8a706c4c34a16891f84e7b', 'Son.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
