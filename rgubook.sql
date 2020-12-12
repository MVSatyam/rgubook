-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2020 at 06:49 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rgubook`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `chat_msg_id` int(11) NOT NULL,
  `from_user` varchar(200) NOT NULL,
  `to_user` varchar(200) NOT NULL,
  `chat_msg` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`chat_msg_id`, `from_user`, `to_user`, `chat_msg`, `timestamp`) VALUES
(1, 'N150628', 'N150789', 'hi, how are you?', '2020-03-09 17:35:41'),
(2, 'N150789', 'N150628', 'i ma fine. what about you?', '2020-03-09 18:08:53'),
(3, 'N150628', 'N150789', 'what r u dng?', '2020-03-09 18:30:53'),
(4, 'N150789', 'N150628', 'Nothing.....', '2020-03-10 05:40:50'),
(5, 'N150789', 'N150628', 'wt r u doing?', '2020-03-10 05:41:46'),
(6, 'N150628', 'N150789', 'me too, nothing', '2020-03-10 10:47:43'),
(7, 'N150628', 'N150789', 'kuch kariye', '2020-03-10 11:00:59'),
(8, 'N150628', 'N150789', 'hi', '2020-03-10 17:45:19'),
(9, 'N150628', 'N150789', 'hi', '2020-03-10 17:45:42'),
(10, 'N150628', 'N150789', 'how are you?', '2020-03-10 17:49:12'),
(11, 'N150628', 'N150789', 'hi', '2020-03-10 17:50:23'),
(12, 'N150789', 'N150628', 'hi wt r u dng?', '2020-03-10 18:31:22'),
(13, 'N150628', 'N150789', 'nothing', '2020-03-10 18:35:27'),
(14, 'N150789', 'N150628', 'sub teek', '2020-03-10 18:37:15'),
(15, 'N150628', 'N150789', 'yeah', '2020-03-10 18:38:51'),
(16, 'N150628', 'N150789', 'what about you?', '2020-03-10 18:41:50'),
(17, 'N150789', 'N150628', 'same here', '2020-03-10 18:42:22'),
(18, 'N150789', 'N150628', 'hi', '2020-03-10 18:47:06'),
(19, 'N150789', 'N150628', 'how are you?', '2020-03-10 18:54:05'),
(20, 'N150628', 'N150789', 'fine', '2020-03-10 18:54:19'),
(21, 'N150789', 'N150628', 'em chesthunnav?', '2020-03-10 18:54:47'),
(22, 'N150789', 'N150633', 'hi', '2020-03-10 18:55:43'),
(23, 'N150789', 'N150628', 'hi', '2020-03-10 19:14:40'),
(24, 'N150789', 'N150628', 'dfdjfkdjflksjdlkf', '2020-03-10 19:16:09'),
(25, 'N150628', 'N150789', 'fuck off', '2020-03-10 19:17:25'),
(26, 'N150789', 'N150628', 'you fuck', '2020-03-10 19:19:03'),
(27, 'N150789', 'N150628', 'let me do this', '2020-03-10 19:19:57'),
(28, 'N150628', 'N150789', 'ok done', '2020-03-10 19:20:13'),
(29, 'N150628', 'N150789', 'hi', '2020-03-10 19:22:56'),
(30, 'N150628', 'N150789', 'hi', '2020-03-10 19:23:26'),
(31, 'N150789', 'N150628', 'ji', '2020-03-10 19:24:08'),
(32, 'N150628', 'N150789', 'jell', '2020-03-10 19:24:25'),
(33, 'N150789', 'N150628', 'jell', '2020-03-10 19:24:36'),
(34, 'N150628', 'N150789', 'fuck', '2020-03-10 19:25:01'),
(35, 'N150789', 'N150628', 'fuck', '2020-03-10 19:25:10'),
(36, 'N150628', 'N150789', 'cuck', '2020-03-10 19:25:36'),
(37, 'N150789', 'N150628', 'cuck', '2020-03-10 19:25:44'),
(38, 'N150628', 'N150789', 'duck', '2020-03-10 19:26:00'),
(39, 'N150628', 'N150789', 'suck', '2020-03-11 04:20:46'),
(40, 'N150633', 'N150628', 'hi', '2020-03-11 06:14:52'),
(41, 'N150628', 'N150633', 'hi', '2020-03-11 06:16:29'),
(42, 'N150628', 'N150633', 'how are you?', '2020-03-11 06:16:59'),
(43, 'N150633', 'N150628', 'i am fine. what about you?', '2020-03-11 06:17:21'),
(44, 'N150628', 'N150633', 'me too', '2020-03-11 06:18:08'),
(45, 'N150628', 'N150633', 'any latest updates?', '2020-03-11 06:18:56'),
(46, 'N150633', 'N150628', 'nahi', '2020-03-11 06:19:10'),
(47, 'N150633', 'N150628', 'do you have any updates?', '2020-03-11 06:19:39'),
(48, 'N150628', 'N150633', 'yes, I have', '2020-03-11 06:20:00'),
(49, 'N150628', 'N150633', 'madam told that tommorrow we are going to have ans assignment', '2020-03-11 06:22:44'),
(50, 'N150633', 'N150628', 'on what topic?', '2020-03-11 06:24:10'),
(51, 'N150628', 'N150633', 'on fucking?', '2020-03-11 06:26:42'),
(52, 'N150633', 'N150789', 'hi', '2020-03-11 06:27:28'),
(53, 'N150628', 'N150633', 'what?', '2020-03-11 12:24:25'),
(54, 'N150789', 'N150200', 'hi', '2020-03-12 09:14:05'),
(55, 'N150789', 'N150628', 'rey', '2020-03-14 06:40:59'),
(56, 'N150789', 'N150628', 'hi ra', '2020-03-14 13:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(100) NOT NULL,
  `post_id` int(100) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `comment`) VALUES
(116, 2, 'N150628', 'hi i love you'),
(117, 2, 'N150628', 'fusak'),
(118, 1, 'N150628', 'superb'),
(119, 4, 'N150628', 'virat!! virat!!'),
(120, 5, 'N150628', 'we love you virat'),
(121, 7, 'N150633', 'hi'),
(122, 7, 'N150633', 'hi'),
(123, 7, 'N150789', 'hi'),
(124, 6, 'N150628', 'nice wallpaper'),
(125, 6, 'N150789', 'superb'),
(126, 3, 'N150789', 'bokka ra'),
(127, 9, 'N150628', 'super bayya'),
(128, 9, 'N150628', 'nice pic'),
(129, 8, 'N150628', 'superb'),
(130, 9, 'N150789', 'abbabbaaaaaah............'),
(131, 8, 'N150628', 'exellent'),
(132, 10, 'N150789', 'love you virat'),
(133, 10, 'N150628', 'thanks for uploading photo'),
(134, 10, 'N150789', 'hi'),
(135, 9, 'N150789', 'viraat viratt'),
(136, 9, 'N150628', 'hello'),
(137, 10, 'N150789', 'dfdfdfd'),
(138, 8, 'N150789', 'how long your wait continues');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `post_id` int(100) NOT NULL,
  `user_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`post_id`, `user_id`) VALUES
(2, 'N150789'),
(3, 'N150789'),
(1, 'N150789'),
(3, 'N150633'),
(2, 'N150633'),
(1, 'N150633'),
(4, 'N150633'),
(4, 'N150789'),
(4, 'N150722'),
(3, 'N150722'),
(1, 'N150722'),
(2, 'N150722'),
(7, 'N150722'),
(6, 'N150722'),
(5, 'N150722'),
(6, 'N150789'),
(7, 'N150633'),
(6, 'N150633'),
(7, 'N150623'),
(6, 'N150623'),
(5, 'N150623'),
(3, 'N150623'),
(1, 'N150623'),
(2, 'N150623'),
(4, 'N150623'),
(5, 'N150633'),
(7, 'N150360'),
(6, 'N150360'),
(5, 'N150360'),
(4, 'N150360'),
(3, 'N150360'),
(1, 'N150360'),
(2, 'N150360'),
(7, 'N150525'),
(1, 'N150525'),
(2, 'N150525'),
(3, 'N150525'),
(4, 'N150525'),
(5, 'N150525'),
(6, 'N150525'),
(7, 'N150678'),
(6, 'N150678'),
(5, 'N150678'),
(4, 'N150678'),
(3, 'N150678'),
(2, 'N150678'),
(1, 'N150678'),
(7, 'N150200'),
(6, 'N150200'),
(5, 'N150200'),
(4, 'N150200'),
(3, 'N150200'),
(2, 'N150200'),
(1, 'N150200'),
(7, 'N150238'),
(3, 'N150238'),
(2, 'N150238'),
(6, 'N150238'),
(1, 'N150238'),
(5, 'N150238'),
(1, 'N150628'),
(3, 'N150628'),
(5, 'N150628'),
(4, 'N150628'),
(2, 'N150628'),
(9, 'N150789'),
(8, 'N150628'),
(9, 'N150628'),
(10, 'N150789'),
(8, 'N150789'),
(7, 'N150628'),
(7, 'N150789'),
(5, 'N150789'),
(10, 'N150628');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `login_detail_id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`login_detail_id`, `user_id`, `last_activity`) VALUES
(6, 'N150628', '2020-03-16 05:27:13'),
(7, 'N150628', '2020-03-16 05:27:13'),
(8, 'N150628', '2020-03-16 05:27:13'),
(9, 'N150789', '2020-03-14 17:07:43'),
(10, 'N150633', '2020-03-15 13:34:24'),
(11, 'N150628', '2020-03-16 05:27:13'),
(12, 'N150789', '2020-03-14 17:07:43'),
(13, 'N150628', '2020-03-16 05:27:13'),
(14, 'N150789', '2020-03-14 17:07:43'),
(15, 'N150628', '2020-03-16 05:27:13'),
(16, 'n150628', '2020-03-16 05:27:13'),
(17, 'N150525', '2020-03-10 11:11:37'),
(18, 'N150678', '2020-03-04 08:30:40'),
(19, 'N150200', '2020-03-15 13:35:46'),
(20, 'N150238', '2020-03-04 10:51:11'),
(21, 'N150628', '2020-03-16 05:27:13'),
(22, 'N150789', '2020-03-14 17:07:43'),
(23, 'N150628', '2020-03-16 05:27:13'),
(24, 'N150628', '2020-03-16 05:27:13'),
(25, 'N150628', '2020-03-16 05:27:13'),
(26, 'N150628', '2020-03-16 05:27:13'),
(27, 'N150628', '2020-03-16 05:27:13'),
(28, 'N150628', '2020-03-16 05:27:13'),
(29, 'N150628', '2020-03-16 05:27:13'),
(30, 'N150628', '2020-03-16 05:27:13'),
(31, 'N150628', '2020-03-16 05:27:13'),
(32, 'N150628', '2020-03-16 05:27:13'),
(33, 'N150789', '2020-03-14 17:07:43'),
(34, 'N150628', '2020-03-16 05:27:13'),
(35, 'N150628', '2020-03-16 05:27:13'),
(36, 'N150789', '2020-03-14 17:07:43'),
(37, 'N150789', '2020-03-14 17:07:43'),
(38, 'N150633', '2020-03-15 13:34:24'),
(39, 'N150628', '2020-03-16 05:27:13'),
(40, 'n150789', '2020-03-14 17:07:43'),
(41, 'n150789', '2020-03-14 17:07:43'),
(42, 'N150789', '2020-03-14 17:07:43'),
(43, 'N150789', '2020-03-14 17:07:43'),
(44, 'N150628', '2020-03-16 05:27:13'),
(45, 'N150628', '2020-03-16 05:27:13'),
(46, 'N150628', '2020-03-16 05:27:13'),
(47, 'N150628', '2020-03-16 05:27:13'),
(48, 'N150628', '2020-03-16 05:27:13'),
(49, 'N150789', '2020-03-14 17:07:43'),
(50, 'N150628', '2020-03-16 05:27:13'),
(51, 'N150628', '2020-03-16 05:27:13'),
(52, 'N150789', '2020-03-14 17:07:43'),
(53, 'N150525', '2020-03-10 11:11:37'),
(54, 'N150628', '2020-03-16 05:27:13'),
(55, 'N150789', '2020-03-14 17:07:43'),
(56, 'N150628', '2020-03-16 05:27:13'),
(57, 'N150789', '2020-03-14 17:07:43'),
(58, 'N150628', '2020-03-16 05:27:13'),
(59, 'N150628', '2020-03-16 05:27:13'),
(60, 'N150789', '2020-03-14 17:07:43'),
(61, 'N150633', '2020-03-15 13:34:24'),
(62, 'N150628', '2020-03-16 05:27:13'),
(63, 'N150633', '2020-03-15 13:34:24'),
(64, 'N150628', '2020-03-16 05:27:13'),
(65, 'N150789', '2020-03-14 17:07:43'),
(66, 'N150628', '2020-03-16 05:27:13'),
(67, 'N150789', '2020-03-14 17:07:43'),
(68, 'N150789', '2020-03-14 17:07:43'),
(69, 'N150789', '2020-03-14 17:07:43'),
(70, 'N150789', '2020-03-14 17:07:43'),
(71, 'N150789', '2020-03-14 17:07:43'),
(72, 'N150628', '2020-03-16 05:27:13'),
(73, 'N150789', '2020-03-14 17:07:43'),
(74, 'N150789', '2020-03-14 17:07:43'),
(75, 'N150628', '2020-03-16 05:27:13'),
(76, 'N150633', '2020-03-15 13:34:24'),
(77, 'N150628', '2020-03-16 05:27:13'),
(78, 'N150628', '2020-03-16 05:27:13'),
(79, 'N150628', '2020-03-16 05:27:13'),
(80, 'N150633', '2020-03-15 13:34:24'),
(81, 'N150628', '2020-03-16 05:27:13'),
(82, 'N150633', '2020-03-15 13:34:24'),
(83, 'N150200', '2020-03-15 13:35:46'),
(84, 'N150360', '2020-03-15 13:38:29'),
(85, 'N150628', '2020-03-16 05:27:13'),
(86, 'N150628', '2020-03-16 05:27:13'),
(87, 'N150628', '2020-03-16 05:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `from_user` varchar(250) NOT NULL,
  `to_user` varchar(250) NOT NULL,
  `notification` varchar(250) NOT NULL,
  `isviewed` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seentime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isboth_friends` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `from_user`, `to_user`, `notification`, `isviewed`, `timestamp`, `seentime`, `isboth_friends`) VALUES
(2, 'N150678', 'N150789', 'friend request from N150678', 1, '2020-03-11 16:24:15', '2020-03-14 16:43:41', 1),
(3, 'N150525', 'N150789', 'friend request from N150525', 1, '2020-03-11 17:54:24', '2020-03-14 14:50:21', 1),
(4, 'N150789', 'N150628', 'friend request from N150789', 1, '2020-03-14 17:33:41', '2020-03-14 17:33:41', 1),
(6, 'N150789', 'N150633', 'friend request from N150789', 1, '2020-03-14 17:37:27', '2020-03-14 17:37:27', 1),
(7, 'N150789', 'N150722', 'friend request from N150789', 0, '2020-03-14 17:37:52', '2020-03-14 17:37:52', 0),
(8, 'N150789', 'N150623', 'friend request from N150789', 0, '2020-03-14 17:37:53', '2020-03-14 17:37:53', 0),
(9, 'N150789', 'N150360', 'friend request from N150789', 0, '2020-03-14 17:37:54', '2020-03-14 17:37:54', 0),
(10, 'N150789', 'N150525', 'friend request from N150789', 0, '2020-03-14 17:37:56', '2020-03-14 17:37:56', 0),
(11, 'N150628', 'N150633', 'friend request from N150628', 1, '2020-03-14 17:38:15', '2020-03-14 17:38:15', 1),
(12, 'N150628', 'N150722', 'friend request from N150628', 0, '2020-03-14 17:38:16', '2020-03-14 17:38:16', 0),
(13, 'N150628', 'N150623', 'friend request from N150628', 0, '2020-03-14 17:38:19', '2020-03-14 17:38:19', 0),
(14, 'N150628', 'N150360', 'friend request from N150628', 1, '2020-03-14 17:38:19', '2020-03-14 17:38:19', 1),
(15, 'N150628', 'N150525', 'friend request from N150628', 0, '2020-03-14 17:38:22', '2020-03-14 17:38:22', 0),
(17, 'N150633', 'N150789', 'friend request from N150633', 0, '2020-03-14 17:38:41', '2020-03-14 17:38:41', 0),
(18, 'N150633', 'N150722', 'friend request from N150633', 0, '2020-03-14 17:38:41', '2020-03-14 17:38:41', 0),
(19, 'N150633', 'N150623', 'friend request from N150633', 0, '2020-03-14 17:38:47', '2020-03-14 17:38:47', 0),
(20, 'N150633', 'N150360', 'friend request from N150633', 0, '2020-03-14 17:38:48', '2020-03-14 17:38:48', 0),
(21, 'N150633', 'N150525', 'friend request from N150633', 0, '2020-03-14 17:38:50', '2020-03-14 17:38:50', 0),
(30, 'N150628', 'N150789', 'friend request from N150628', 0, '2020-03-16 05:29:27', '2020-03-16 05:29:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(100) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `text_post` varchar(250) NOT NULL,
  `image_post` varchar(250) NOT NULL,
  `likes` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `text_post`, `image_post`, `likes`) VALUES
(1, 'N150628', 'hi', 'Login.png', 13),
(2, 'N150628', 'this ankitha', 'Ankitha.png', 19),
(3, 'N150789', 'this is mvs', 'Venkat.png', 15),
(4, 'N150633', 'Virat', '3D4omRX4_400x400.jpg', 14),
(5, 'N150628', 'fdfd', 'dc-Cover-qf1kifq9vq6bbheeh5of1qfh70-20160426012322.Medi (2).jpeg', 10),
(6, 'N150628', 'hi', '12113240_maxresdefault.jpg', 9),
(7, 'N150628', 'restaurant', 'IMG_20200124_214606.jpg', 10),
(8, 'N150628', 'Virat Hd Wallpaper', 'virat_kohli.jpg', 2),
(9, 'N150628', 'Virat Hd Wallpaper', 'Virat_KohliWEB__85330.1567259068.png', 2),
(10, 'N150628', 'jdhfjkdh', '67008bdad83dc9b7c08296d389473ab6.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `username` varchar(250) NOT NULL,
  `passcode` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `username`, `passcode`) VALUES
(1, 'N150628', 'n150628@rguktn.ac.in', 'F93GD'),
(2, 'N150789', 'n150789@tguktn.ac.in', 'F93GD'),
(3, 'N150633', 'n150633@rguktn.ac.in', 'H49DI'),
(4, 'N150722', 'n150722@rguktn.ac.in', 'W82FU'),
(5, 'N150623', 'n150633@rguktn.ac.in', 'H65DO'),
(6, 'N150360', 'n150360@rguktn.ac.in', 'E47QY'),
(7, 'N150525', 'n150525@rguktn.ac.in', 'mail1234'),
(8, 'N150678', 'n150678@rguktn.ac.in', 'X18EK'),
(9, 'N150200', 'n150200@rguktn.ac.in', 'E60LE'),
(10, 'N150238', 'n150238@rguktn.ac.in', 'O13XU');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`chat_msg_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`login_detail_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_messages`
--
ALTER TABLE `chat_messages`
  MODIFY `chat_msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `login_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
