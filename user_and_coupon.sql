-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 04 月 25 日 03:31
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- 資料庫: `project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `user_and_coupon`
--
-- 建立時間： 2022 年 04 月 24 日 14:23
-- 最後更新： 2022 年 04 月 24 日 14:26
--

CREATE TABLE `user_and_coupon` (
  `user_and_coupon_id` int(30) NOT NULL,
  `coupon_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `valid` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `user_and_coupon`
--

INSERT INTO `user_and_coupon` (`user_and_coupon_id`, `coupon_id`, `user_id`, `valid`) VALUES
(1, 1, 3, 1),
(2, 2, 2, 1),
(3, 2, 10, 1),
(4, 2, 13, 1),
(5, 2, 14, 1),
(6, 2, 15, 1),
(7, 3, 1, 1),
(8, 4, 3, 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `user_and_coupon`
--
ALTER TABLE `user_and_coupon`
  ADD PRIMARY KEY (`user_and_coupon_id`),
  ADD KEY `coupon_id` (`coupon_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_and_coupon`
--
ALTER TABLE `user_and_coupon`
  MODIFY `user_and_coupon_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;
