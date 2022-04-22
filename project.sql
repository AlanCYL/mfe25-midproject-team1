-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 04 月 22 日 20:19
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
-- 資料表結構 `user_and_groups`
--
-- 建立時間： 2022 年 04 月 22 日 15:10
--

CREATE TABLE `user_and_groups` (
  `user_and_groups_id` int(30) NOT NULL,
  `groups_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `compliment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `user_and_groups`
--

INSERT INTO `user_and_groups` (`user_and_groups_id`, `groups_id`, `user_id`, `compliment`) VALUES
(1, 1, 3, '很棒'),
(2, 1, 1, '愛吃愛吃愛吃'),
(3, 1, 4, '棒棒棒好吃好吃'),
(4, 1, 6, '不愛'),
(5, 2, 1, '愛了愛了'),
(6, 2, 7, '普普通通'),
(7, 2, 3, '啥阿這個 '),
(8, 2, 6, '不喜翻啦'),
(9, 3, 5, '討厭討厭'),
(10, 3, 1, '什麼鬼'),
(11, 3, 2, '這啥阿 可以吃嗎'),
(12, 3, 6, '真心推薦喔'),
(13, 3, 7, '我是胖虎我推薦'),
(14, 4, 1, '嘿嘿嘿BJ4'),
(15, 4, 12, '嗯嗯嗯嗯嗯嗯 好讚'),
(16, 4, 3, '什麼鬼 不滿意'),
(17, 4, 6, '好吃好吃好吃啊~'),
(18, 5, 3, 'J個我喜歡'),
(19, 5, 4, '哭哭 想要天天吃'),
(20, 5, 1, '店家小驚喜 喜歡喜歡'),
(21, 5, 3, '愛了愛了'),
(22, 5, 5, '絕不去第二次'),
(23, 5, 7, '想再去第三次'),
(24, 6, 11, '讚啦讚讚'),
(25, 6, 9, '還好還好'),
(26, 6, 8, '讚讚讚最棒'),
(27, 6, 5, '還好'),
(28, 7, 10, '很棒喔'),
(29, 7, 14, '很棒'),
(30, 7, 6, '讚讚'),
(31, 7, 4, '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `user_and_groups`
--
ALTER TABLE `user_and_groups`
  ADD PRIMARY KEY (`user_and_groups_id`),
  ADD KEY `groups_id` (`groups_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_and_groups`
--
ALTER TABLE `user_and_groups`
  MODIFY `user_and_groups_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;
