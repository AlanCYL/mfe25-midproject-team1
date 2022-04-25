-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 04 月 25 日 03:24
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
-- 資料表結構 `coupon`
--
-- 建立時間： 2022 年 04 月 24 日 14:22
-- 最後更新： 2022 年 04 月 24 日 14:25
--

CREATE TABLE `coupon` (
  `id` int(30) UNSIGNED NOT NULL,
  `reason` varchar(50) NOT NULL,
  `price` int(5) NOT NULL,
  `create_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `coupon`
--

INSERT INTO `coupon` (`id`, `reason`, `price`, `create_time`) VALUES
(1, '鑽石會員獨享優惠', 200, '2022-04-24'),
(2, '綠寶石會員，新用戶好禮', 50, '2022-04-24'),
(3, '四月壽星好禮', 300, '2022-04-24'),
(4, '慶祝會員升級好禮', 500, '2022-04-24');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;
