-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2020 at 09:00 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `catId` int(3) NOT NULL,
  `catTitle` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`catId`, `catTitle`) VALUES
(1, 'bootstrap'),
(3, 'test'),
(4, 'ddd'),
(5, 'sssxxx'),
(6, 'dd');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` int(3) NOT NULL,
  `commentPostId` int(3) NOT NULL,
  `commentAuthor` varchar(255) NOT NULL,
  `commentEmail` varchar(255) NOT NULL,
  `commentContent` text NOT NULL,
  `commentStatus` varchar(255) NOT NULL,
  `commentDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `commentPostId`, `commentAuthor`, `commentEmail`, `commentContent`, `commentStatus`, `commentDate`) VALUES
(1, 4, 'Mahfuz', 'dd@gmail.com', 'this is comment', 'Denied', '2020-04-02'),
(2, 4, 'john', 'cc@gg.com', 'this is comment', 'Approved', '2020-04-02'),
(3, 4, 'author', 'author@author.com', 'check chek', 'Approved', '2020-04-02'),
(4, 4, 'author', 'author@author.com', 'check chek', 'Approved', '2020-04-02'),
(5, 4, 'comment count check', 'dd@gmail.com', 'comment count check', 'Denied', '2020-04-02'),
(6, 4, 'Mahfuz', 'cc@gg.com', 'check again', 'Denied', '2020-04-02');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postId` int(3) NOT NULL,
  `postCatagoryId` int(3) NOT NULL,
  `postTitle` varchar(255) NOT NULL,
  `postAuthor` varchar(255) NOT NULL,
  `postDate` date NOT NULL,
  `postImage` text NOT NULL,
  `postContent` text NOT NULL,
  `postTags` varchar(255) NOT NULL,
  `postCommentCount` int(11) NOT NULL,
  `postStatus` varchar(255) NOT NULL DEFAULT 'draft',
  `postViewsCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `postCatagoryId`, `postTitle`, `postAuthor`, `postDate`, `postImage`, `postContent`, `postTags`, `postCommentCount`, `postStatus`, `postViewsCount`) VALUES
(4, 1, 'title', 'author', '2020-04-05', 'Jellyfish.jpg', 'ddddddddddddddddddddddddd', 'tags', 6, 'published', 0),
(5, 1, 'new post', 'author', '2020-04-05', 'Hydrangeas.jpg', 'new post check', 'java, php', 0, 'published', 0),
(6, 1, 'title', 'me', '2020-04-07', 'image_1.jpg', '<p>ljlaj asjsdlf lk al l ala lallfj a vvvvvvvvvvvvvvvvvvvvvvvvv vvvvvvvvvvvvvvvvvvv dddddddddddddddddddddd ssssssssssssssssss aaaaaaaaaaaaa</p>', 'java', 0, 'published', 0),
(8, 1, 'poststatus checking', 'author', '2020-04-07', 'image_1.jpg', '<p>java is awesome but php is best java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;</p>', 'java', 0, 'published', 0),
(9, 1, 'view post check', 'me', '2020-04-07', 'Penguins.jpg', '<p>dddd view post and view all post checking</p>', 'tags', 0, 'published', 0),
(10, 1, 'view post check', 'me', '2020-04-07', 'Penguins.jpg', '<p>checking checking&nbsp;checking&nbsp;checking&nbsp;checking&nbsp;checking&nbsp;checking&nbsp;checking&nbsp;checking&nbsp;</p>', 'tags', 0, 'published', 0),
(11, 1, 'view all post checking', 'me', '2020-04-07', 'Hydrangeas.jpg', '<p>view all post checking view all post checking&nbsp;view all post checking&nbsp;view all post checking&nbsp;view all post checking&nbsp;</p>', 'tags', 0, 'published', 0),
(12, 1, 'title', 'me', '2020-04-10', 'image_1.jpg', '<p>ljlaj asjsdlf lk al l ala lallfj a vvvvvvvvvvvvvvvvvvvvvvvvv vvvvvvvvvvvvvvvvvvv dddddddddddddddddddddd ssssssssssssssssss aaaaaaaaaaaaa</p>', 'java', 0, 'published', 0),
(13, 1, 'poststatus checking', 'author', '2020-04-10', 'image_1.jpg', '<p>java is awesome but php is best java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;</p>', 'java', 0, 'published', 0),
(14, 1, 'title', 'author', '2020-04-10', 'Jellyfish.jpg', 'ddddddddddddddddddddddddd', 'tags', 0, 'published', 0),
(15, 1, 'title', 'me', '2020-04-10', 'image_1.jpg', '<p>ljlaj asjsdlf lk al l ala lallfj a vvvvvvvvvvvvvvvvvvvvvvvvv vvvvvvvvvvvvvvvvvvv dddddddddddddddddddddd ssssssssssssssssss aaaaaaaaaaaaa</p>', 'java', 0, 'published', 0),
(16, 1, 'new post', 'author', '2020-04-10', 'Hydrangeas.jpg', 'new post check', 'java, php', 0, 'published', 0),
(17, 1, 'view post check', 'me', '2020-04-10', 'Penguins.jpg', '<p>dddd view post and view all post checking</p>', 'tags', 0, 'published', 0),
(18, 1, 'poststatus checking', 'author', '2020-04-10', 'image_1.jpg', '<p>java is awesome but php is best java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;</p>', 'java', 0, 'published', 0),
(19, 1, 'poststatus checking', 'author', '2020-04-11', 'image_1.jpg', '<p>java is awesome but php is best java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;</p>', 'java', 0, 'published', 0),
(20, 1, 'view post check', 'me', '2020-04-11', 'Penguins.jpg', '<p>dddd view post and view all post checking</p>', 'tags', 0, 'published', 0),
(21, 1, 'poststatus checking', 'author', '2020-04-11', 'image_1.jpg', '<p>java is awesome but php is best java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;</p>', 'java', 0, 'published', 0),
(22, 1, 'view post check', 'me', '2020-04-11', 'Penguins.jpg', '<p>dddd view post and view all post checking</p>', 'tags', 0, 'published', 0),
(23, 1, 'poststatus checking', 'author', '2020-04-11', 'image_1.jpg', '<p>java is awesome but php is best java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;java is awesome but php is best&nbsp;</p>', 'java', 0, 'published', 0),
(24, 1, 'view post check', 'me', '2020-04-11', 'Penguins.jpg', '<p>dddd view post and view all post checking</p>', 'tags', 0, 'published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(3) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userFirstName` varchar(255) NOT NULL,
  `userLastName` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userImage` text NOT NULL,
  `userRole` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22',
  `userStatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userPassword`, `userFirstName`, `userLastName`, `userEmail`, `userImage`, `userRole`, `randSalt`, `userStatus`) VALUES
(6, 'edwindiaz', '$1$fcGvkj0J$3mtNmkiqsOwwn469z7lhl1', 'adwin', 'diaz', 'ediwn@edwin.com', '', 'Admin', '', 'Denied'),
(7, 'newUser', '$1$JMTzM3SH$QvUj.rNA.d9TFeUzz2noM0', 'new', 'user', 'ediwn@edwin.com', '', 'Admin', '$2y$10$iusesomecrazystrings22', 'Denied'),
(12, 'demo', '$1$X3Rdfzdk$YKY./vsX.hJFMwF114nuM/', 'demo', 'check', 'demo@demo.com', '', 'Admin', '$2y$10$iusesomecrazystrings22', '');

-- --------------------------------------------------------

--
-- Table structure for table `usersonline`
--

CREATE TABLE `usersonline` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `usersonline`
--
ALTER TABLE `usersonline`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `catId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usersonline`
--
ALTER TABLE `usersonline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
