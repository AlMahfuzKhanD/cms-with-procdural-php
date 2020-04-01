-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 10:12 AM
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
  `postStatus` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `postCatagoryId`, `postTitle`, `postAuthor`, `postDate`, `postImage`, `postContent`, `postTags`, `postCommentCount`, `postStatus`) VALUES
(1, 1, 'Edwin cms course is awesome', 'Mahfuz', '2020-03-29', 'Desert.jpg', 'this is a good post', 'edwin, mahfuz', 1, 'draft'),
(2, 4, 'titleedited', 'authoredited', '2020-04-01', 'Hydrangeas.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncove', 'java', 4, 'draft'),
(3, 1, 'new post', 'me', '2020-04-01', 'Jellyfish.jpg', 'It is a long established fact jljlzjk jljlj jjljccl lc xlzjckklz clzx clzjczljczl c zcjzlkcjzl czc zlcjzlc zlcjzlcjzl czlc zlcjzczclzc jlzxclzc zlc jzlcjzlcjzlczljzlzjlcljlzjclz lzzlzl j zl It is a long established fact jljlzjk jljlj jjljccl lc xlzjckklz clzx clzjczljczl c zcjzlkcjzl czc zlcjzlc zlcjzlcjzl czlc zlcjzczclzc jlzxclzc zlc jzlcjzlcjzlczljzlzjlcljlzjclz lzzlzl j zl\r\nIt is a long established fact jljlzjk jljlj jjljccl lc xlzjckklz clzx clzjczljczl c zcjzlkcjzl czc zlcjzlc zlcjzlcjzl czlc zlcjzczclzc jlzxclzc zlc jzlcjzlcjzlczljzlzjlcljlzjclz lzzlzl j zl\r\nIt is a long established fact jljlzjk jljlj jjljccl lc xlzjckklz clzx clzjczljczl c zcjzlkcjzl czc zlcjzlc zlcjzlcjzl czlc zlcjzczclzc jlzxclzc zlc jzlcjzlcjzlczljzlzjlcljlzjclz lzzlzl j zl It is a long established fact jljlzjk jljlj jjljccl lc xlzjckklz clzx clzjczljczl c zcjzlkcjzl czc zlcjzlc zlcjzlcjzl czlc zlcjzczclzc jlzxclzc zlc jzlcjzlcjzlczljzlzjlcljlzjclz lzzlzl j zl It is a long established fact jljlzjk jljlj jjljccl lc xlzjckklz clzx clzjczljczl c zcjzlkcjzl czc zlcjzlc zlcjzlcjzl czlc zlcjzczclzc jlzxclzc zlc jzlcjzlcjzlczljzlzjlcljlzjclz lzzlzl j zl It is a long established fact jljlzjk jljlj jjljccl lc xlzjckklz clzx clzjczljczl c zcjzlkcjzl czc zlcjzlc zlcjzlcjzl czlc zlcjzczclzc jlzxclzc zlc jzlcjzlcjzlczljzlzjlcljlzjclz lzzlzl j zl It is a long established fact jljlzjk jljlj jjljccl lc xlzjckklz clzx clzjczljczl c zcjzlkcjzl czc zlcjzlc zlcjzlcjzl czlc zlcjzczclzc jlzxclzc zlc jzlcjzlcjzlczljzlzjlcljlzjclz lzzlzl j zl It is a long established fact jljlzjk jljlj jjljccl lc xlzjckklz clzx clzjczljczl c zcjzlkcjzl czc zlcjzlc zlcjzlcjzl czlc zlcjzczclzc jlzxclzc zlc jzlcjzlcjzlczljzlzjlcljlzjclz lzzlzl j zl It is a long established fact jljlzjk jljlj jjljccl lc xlzjckklz clzx clzjczljczl c zcjzlkcjzl czc zlcjzlc zlcjzlcjzl czlc zlcjzczclzc jlzxclzc zlc jzlcjzlcjzlczljzlzjlcljlzjclz lzzlzl j zlIt is a long established fact .that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a moreorless normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for lorem ipsum will uncover many web sites still in their infancy. Various versions have evolved', 'tags', 4, 'draft');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `catId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
