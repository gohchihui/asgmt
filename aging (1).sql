-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2023-12-27 12:25:13
-- 服务器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `aging`
--

-- --------------------------------------------------------

--
-- 表的结构 `diabetes_records`
--

CREATE TABLE `diabetes_records` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `glucose_level` float NOT NULL,
  `entry_date` date NOT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `diabetes_records`
--

INSERT INTO `diabetes_records` (`id`, `user_id`, `glucose_level`, `entry_date`, `notes`) VALUES
(5, 1, 0.2, '2023-11-29', 'wwww'),
(6, 1, 0.2, '2023-12-06', 'eee'),
(9, 2, 12, '2023-12-15', 'testing'),
(10, 3, 0.8, '2023-12-13', '111'),
(11, 3, 2.4, '2023-12-26', '231'),
(12, 3, 1, '2023-12-23', 'as'),
(13, 3, 0.8, '2023-12-21', 'sda');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'jane', '$2y$10$cbziU/Atkl/CZud9Kh6fVO2f5KFENrxrAlN0XXb3kcYgcWUI3eZha'),
(2, 'abc', '$2y$10$XlOKQTvXn6NW93Kbhnso7Ovl/NIsQIgZ6cPqfW6.L/iX/58MUIsU.'),
(3, 'lily', '$2y$10$4kK4an941EvWlStRQXcjquDpCx7wl5nx4pWtYW5b8XTZqVWbsOwNO');

--
-- 转储表的索引
--

--
-- 表的索引 `diabetes_records`
--
ALTER TABLE `diabetes_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `diabetes_records`
--
ALTER TABLE `diabetes_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 限制导出的表
--

--
-- 限制表 `diabetes_records`
--
ALTER TABLE `diabetes_records`
  ADD CONSTRAINT `diabetes_records_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
