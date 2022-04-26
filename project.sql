-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:8889
-- 產生時間： 2022 年 04 月 26 日 19:23
-- 伺服器版本： 5.7.34
-- PHP 版本： 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `project`
--

-- --------------------------------------------------------

--
-- 資料表結構 `coupon`
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

-- --------------------------------------------------------

--
-- 資料表結構 `dish`
--

CREATE TABLE `dish` (
  `dish_id` int(30) NOT NULL,
  `dish_name` varchar(100) NOT NULL,
  `dish_image` varchar(100) DEFAULT NULL,
  `dish_description` text NOT NULL,
  `shop_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `dish`
--

INSERT INTO `dish` (`dish_id`, `dish_name`, `dish_image`, `dish_description`, `shop_id`) VALUES
(2, '義大利麵', 'pasta.png', '爆多的蒜末爆炒\r\n再搭上完美的白酒提味\r\n', 2),
(3, '炸雞', 'chicken.png', '多汁、酥脆、滑嫩、鹹香', 2),
(5, '披薩', 'pizza.png', '薄皮酥脆餡料豐盛搭配餡料豐盛搭配夏威夷風味', 2);

-- --------------------------------------------------------

--
-- 資料表結構 `established`
--

CREATE TABLE `established` (
  `id` int(10) UNSIGNED NOT NULL,
  `established` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '否'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `groups`
--

CREATE TABLE `groups` (
  `groups_id` int(5) UNSIGNED NOT NULL,
  `groups_start_time` date NOT NULL,
  `groups_end_time` date NOT NULL,
  `eating_date` date NOT NULL,
  `eating_time` time NOT NULL,
  `least_num` int(30) NOT NULL,
  `goal_num` int(30) DEFAULT '0',
  `price` int(6) UNSIGNED NOT NULL,
  `shop_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `groups`
--

INSERT INTO `groups` (`groups_id`, `groups_start_time`, `groups_end_time`, `eating_date`, `eating_time`, `least_num`, `goal_num`, `price`, `shop_id`) VALUES
(1, '2022-04-01', '2022-04-10', '2022-04-15', '20:00:00', 2, 0, 350, 2),
(2, '2022-04-02', '2022-04-15', '2022-04-19', '09:22:40', 3, 6, 200, 2),
(3, '2022-04-20', '2022-04-20', '2022-04-30', '09:25:03', 7, 6, 100, 3),
(4, '2022-04-11', '2022-04-16', '2022-04-19', '09:27:47', 4, 10, 1500, 4),
(5, '2022-04-01', '2022-04-11', '2022-05-12', '09:28:46', 4, 6, 600, 2),
(6, '2022-04-04', '2022-04-08', '2022-05-23', '15:00:00', 4, 5, 50, 6),
(7, '2022-03-30', '2022-04-05', '2022-05-21', '15:00:00', 2, 8, 400, 7),
(8, '2022-04-21', '2022-04-23', '2022-04-27', '20:17:00', 2, 3, 200, 2),
(9, '2022-04-22', '2022-04-27', '2022-04-29', '17:45:00', 5, 2, 250, 1),
(11, '2022-04-23', '2022-04-30', '2022-05-05', '18:00:00', 6, 3, 250, 1),
(12, '2022-04-13', '2022-04-16', '2022-04-19', '17:30:00', 10, 15, 200, 2),
(13, '2022-04-22', '2022-04-27', '2022-04-30', '17:53:00', 2, 10, 200, 2),
(14, '2022-04-22', '2022-04-28', '2022-04-30', '21:01:00', 4, 10, 300, 2),
(15, '2022-04-22', '2022-04-27', '2022-04-28', '15:06:00', 3, 2, 200, 2),
(17, '2022-04-12', '2022-04-15', '2022-04-19', '17:34:59', 4, 3, 200, 5),
(18, '2022-04-22', '2022-04-28', '2022-04-30', '18:34:50', 3, 7, 150, 5),
(19, '2022-04-15', '2022-04-22', '2022-04-25', '18:00:00', 4, 5, 200, 8),
(20, '2022-04-16', '2022-04-19', '2022-04-23', '18:37:36', 3, 5, 250, 9),
(21, '2022-04-23', '2022-04-28', '2022-04-30', '18:37:36', 5, 2, 200, 9),
(22, '2022-04-06', '2022-04-16', '2022-04-19', '18:38:41', 3, 7, 250, 1),
(23, '2022-04-21', '2022-04-28', '2022-04-30', '18:38:41', 3, 9, 350, 1),
(24, '2022-04-21', '2022-04-24', '2022-04-25', '12:15:00', 3, 2, 350, 14),
(25, '2022-04-22', '2022-04-27', '2022-04-28', '11:15:00', 3, 2, 200, 11),
(26, '2022-04-23', '2022-04-28', '2022-04-30', '10:00:00', 5, 2, 200, 14),
(27, '2022-04-13', '2022-04-16', '2022-04-19', '17:30:00', 10, 3, 200, 10),
(28, '2022-04-19', '2022-04-20', '2022-04-30', '09:25:03', 7, 6, 100, 12);

-- --------------------------------------------------------

--
-- 資料表結構 `groups_and_dish`
--

CREATE TABLE `groups_and_dish` (
  `GD_combined_id` int(30) NOT NULL,
  `groups_id` int(30) NOT NULL,
  `dish_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `groups_and_dish`
--

INSERT INTO `groups_and_dish` (`GD_combined_id`, `groups_id`, `dish_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4);

-- --------------------------------------------------------

--
-- 資料表結構 `level_name`
--

CREATE TABLE `level_name` (
  `id` int(2) UNSIGNED NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `level_name`
--

INSERT INTO `level_name` (`id`, `name`) VALUES
(1, '綠寶石'),
(2, '藍寶石'),
(3, '紅寶石'),
(4, '鑽石');

-- --------------------------------------------------------

--
-- 資料表結構 `manager`
--

CREATE TABLE `manager` (
  `manager_id` int(3) NOT NULL,
  `manager_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_account` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager_password` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `manager`
--

INSERT INTO `manager` (`manager_id`, `manager_name`, `manager_account`, `manager_password`) VALUES
(1, 'yj', '123', '123'),
(2, 'alan', '345', '345'),
(3, 'yirong', '456', '456'),
(4, 'kai', '567', '567'),
(5, 'how', '678', '678');

-- --------------------------------------------------------

--
-- 資料表結構 `project_users`
--

CREATE TABLE `project_users` (
  `id` int(4) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `project_users`
--

INSERT INTO `project_users` (`id`, `name`, `account`, `password`, `phone`, `create_time`) VALUES
(1, NULL, 'jay@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', NULL, '2022-04-16 20:35:14'),
(2, NULL, 'joe@gmail.com', 'b6d767d2f8ed5d21a44b0e5886680cb9', NULL, '2022-04-17 04:33:33');

-- --------------------------------------------------------

--
-- 資料表結構 `qa`
--

CREATE TABLE `qa` (
  `id` int(30) NOT NULL,
  `shop_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `QA_type` varchar(30) NOT NULL,
  `QA_content_create_time` datetime NOT NULL,
  `valid` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `qa`
--

INSERT INTO `qa` (`id`, `shop_id`, `user_id`, `QA_type`, `QA_content_create_time`, `valid`) VALUES
(1, 0, 4, '000', '2022-04-19 17:01:11', 1),
(2, 0, 7, '000', '2022-04-19 17:01:11', 1),
(3, 0, 10, '000', '2022-04-19 17:01:28', 1),
(4, 0, 12, '000', '2022-04-19 17:01:28', 1),
(5, 0, 3, '000', '2022-04-19 17:01:43', 1),
(6, 0, 7, '000', '2022-04-19 17:01:43', 1),
(7, 0, 4, '000', '2022-04-19 17:01:11', 1),
(8, 0, 7, '000', '2022-04-19 17:01:11', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `qa_content`
--

CREATE TABLE `qa_content` (
  `QA_content_id` int(30) NOT NULL,
  `QA_id` int(30) NOT NULL,
  `QA_content_text` varchar(100) NOT NULL,
  `QA_content_from_who` varchar(30) NOT NULL,
  `QA_content_who_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `qa_content`
--

INSERT INTO `qa_content` (`QA_content_id`, `QA_id`, `QA_content_text`, `QA_content_from_who`, `QA_content_who_id`) VALUES
(1, 1, '信用卡無法付款', '000', 4),
(40, 2, '真難用', '000', 7),
(42, 3, '可以使用現金付款嗎?', '000', 10),
(49, 4, '可以使用現金付款嗎?', '000', 12),
(52, 7, '真難用', '000', 7),
(67, 5, '可以使用現金付款嗎?', '000', 3),
(68, 6, '信用卡無法付款', '000', 7),
(70, 8, '可以使用現金付款嗎?', '000', 10);

-- --------------------------------------------------------

--
-- 資料表結構 `qa_reply`
--

CREATE TABLE `qa_reply` (
  `id` int(30) NOT NULL,
  `QA_content_id` int(30) NOT NULL,
  `QA_reply` text NOT NULL,
  `QA_reply_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `qa_reply`
--

INSERT INTO `qa_reply` (`id`, `QA_content_id`, `QA_reply`, `QA_reply_time`) VALUES
(1, 1, '付款逾期', '2022-04-22 15:41:37'),
(4, 40, '000', '2022-04-25 09:52:20');

-- --------------------------------------------------------

--
-- 資料表結構 `shop`
--

CREATE TABLE `shop` (
  `shop_id` int(3) NOT NULL,
  `shop_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_account` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_phone` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shop_create_time` date NOT NULL,
  `valid` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `shop`
--

INSERT INTO `shop` (`shop_id`, `shop_name`, `shop_account`, `shop_password`, `shop_phone`, `shop_address`, `shop_description`, `img`, `type_id`, `service_id`, `shop_create_time`, `valid`) VALUES
(1, '村民食堂', 'villager@test.com', '111', '03-339-868', '桃園市桃園區中正路1078號', '無距離享受與自然和諧共處，讓每個人在繁忙之餘，也能擁有輕鬆的步調，與家人朋友相聚用餐，共享歡樂！', 'Villager.jpg', '2', '1', '2022-04-22', 1),
(2, 'NINI 尼尼義大利餐廳', 'NINI@test.com', '222', '03-222-3271', '桃園市蘆竹區南崁路一段112號', 'NINI《NATURAL自然、INITIAL獨創、NEAT純淨、IMPRESSIVE感動》我們相信用好的食材與料理方式，就能對自我和環境產生正向的改變；透過好的用餐環境，讓顧客們和我們一樣愛上這樣的生活方式。', 'NINI.jpg', '3', '1', '2022-04-21', 1),
(3, '梳子．Salud', 'Salud@test.com', '333', '02-2711-8832', '330桃園市桃園區新埔六街89', '由川門子團隊帶來，西班牙式的Tapas碰上川式料理蹦出！精緻美味小餐點！搭配無毒生菜、德國有機農莊，希望提供給您一個全新體驗的蔬食。自然的用餐環境，讓您留下美好的身影：）', 'Salud.jpg', '1', '1', '2022-04-23', 1),
(4, '點水樓', 'DianShuiLou@test.com', '444', '03-222-7979', '338桃園市蘆竹區中正路1號5樓', '主打江南料理、點心，菜系遼闊又精緻，\r\n包含了杭幫、蘇幫、揚幫、滬幫、甬幫等菜\r\n式名餚。 目前已有多家分店。 南京店、\r\n懷寧店的空間尤其值得稱道，名家書畫、\r\n骨董藝品、木雕窗花和室內裝潢造景，都頗有品味。', 'DianShuiLou.jpg', '5', '2', '2022-04-22', 1),
(5, '陶板屋', 'kangyaolife@test.com', '555', '03-280-7070', '320桃園市中壢區中山路111號2', '保留日本料理的精緻文化，和風洋食融合精神\r\n，色味俱佳的創作料理上桌，一場融合視覺、味覺的全新饗宴，', 'Kangyaolife.jpg', '2', '2', '2022-04-21', 1),
(6, '藝奇新日本料理', 'Yichi@test.com', '666', '03-339-8680', '330桃園市桃園區南華街60號', '汲取，日本專注細節。講究，當旬新鮮食材。\r\n添加，職人手藝創意。以靈感、巧思加持 \r\n激盪東京時尚料理新風貌', 'Yichi.jpg', '6', '1', '2022-04-23', 1),
(7, '王品牛排', 'wowprime@test.com', '777', '03-356-1887', '330桃園市桃園區同德五街69號3F', '台灣經典牛排，最多華人肯定牛排餐廳，\r\n一頭牛，僅供6客王品牛小排，\r\n新鮮蔬果與特殊佐料醃浸2天2夜，\r\n經歷250℃高溫，慢火烘烤1.5小時，\r\n完美展現經典牛排的香嫩風華', 'Wowprime.jpg', '1', '2', '2022-04-20', 1),
(8, '添好運', 'timhowan@test.com', '888', '03-468-0678', '320桃園市中壢區中園路二段501號', '麥桂培師傅於港式點心領域有近四十年的經歷，\r\n為了提供一般民眾可負擔的「美味平民點心」，\r\n希望讓大眾都能品嚐到平價且美味的點心，於2009年成立添好運點心專門店，\r\n不但迅速獲得米其林一星的肯定，並成為各國饕客到香港必定朝聖的美味名店！', 'Timhowan.jpg', '6', '1', '2022-04-23', 1),
(9, '品田牧場', 'pinnada@test.com', '999', '03-455-3881', '桃園市中壢區中華路二段501號2樓', '台灣最多人吃的日式豬排，現點現炸，\r\n獨創全台使用雙油槽，先低溫後高溫油炸法，\r\n鎖住肉汁美味，同時保留麵衣的酥脆站立感，\r\n皮肉外酥內嫩的完美結合，滿足全台每年超過\r\n250萬饕客味蕾(平均每10人就有1人吃過)。\r\n提供五大風味菜系，讓您品嚐豬排料理的匠心美味。', 'Pinnada.jpg', '4', '2', '2022-04-20', 1),
(10, '一風堂拉麵', 'ippudo@test.com', '1010', ' 03-261-3220', '320桃園市中壢區高鐵北路一段6號', '一風堂源自日本九州豚骨拉麵之都福岡博多，\r\n由享譽國際的神級拉麵大王河原成美所創立，\r\n台灣一風堂創立於2012年，至今在台灣北、中\r\n、南各地已設立超過10家店舖，除了一般拉麵\r\n餐廳業態外，亦設立快速、便利的一風堂EXPRESS\r\n業態，以及極具特色的拉麵居酒屋業態。', 'ippudo.jpg', '3', '2', '2022-04-19', 1),
(11, '漢來海港', 'Harbour@test.com', '1111', '07-412-8068', '338桃園市蘆竹區南崁路一段112號6樓', '995年漢來美食在南台灣高雄隆重誕生，\r\n擁有專業的廚師與服務團隊、深厚的國際\r\n飯店及美食集團經營管理，堅持在地與優\r\n質進口食材，提供多元美食料理，以及最\r\n佳品質的專業服務。', 'Harbour.jpg', '8', '2', '2022-04-15', 1),
(12, '饗泰多', 'siammore@test.com', '1212', '03-337-1808', '330桃園市桃園區中正路61號統領廣場號6樓', '饗泰多就是我們長期接觸現代泰國文化後，\r\n 為了提供台灣朋友與曼谷文化接軌的實踐，\r\n 希望藉由最多人相聚歡。', 'siammore.jpg', '3', '1', '2022-04-16', 1),
(13, '麥當勞桃園', 'mcdonaldr@test.com', '1313', '03-339-868', '330桃園市桃園區中正路50號', '老字號的經典連鎖速食店，以漢堡和薯條聞名。', 'McDonald.jpg', '4', '1', '2022-04-17', 1),
(14, '肯德基 桃園中山二餐廳', 'kfcclub@test.com', '1515', '03-336-0860', '330桃園市桃園區中山路444號446號', '肯德基是源自美國的速食連鎖店， 總部設於肯塔基州路易維爾市，以炸雞為主力產品。', 'kfc.jpg', '8', '1', '2022-04-26', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `shop_service`
--

CREATE TABLE `shop_service` (
  `service_id` int(3) NOT NULL,
  `service_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `shop_service`
--

INSERT INTO `shop_service` (`service_id`, `service_name`) VALUES
(1, '免服務費'),
(2, '服務費10%');

-- --------------------------------------------------------

--
-- 資料表結構 `shop_type`
--

CREATE TABLE `shop_type` (
  `type_id` int(3) NOT NULL,
  `type_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `shop_type`
--

INSERT INTO `shop_type` (`type_id`, `type_name`) VALUES
(1, '中式'),
(2, '台式'),
(3, '港澳'),
(4, '日式'),
(5, '韓式'),
(6, '東南'),
(7, '南洋'),
(8, '美式'),
(9, '英式'),
(10, '歐式');

-- --------------------------------------------------------

--
-- 資料表結構 `test`
--

CREATE TABLE `test` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `test`
--

INSERT INTO `test` (`id`, `name`) VALUES
(1, '1,2,3,4'),
(2, '1,2,4'),
(3, '1');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_id` int(30) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `identity_card` varchar(20) NOT NULL,
  `user_password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nick_name` varchar(100) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_bir` date NOT NULL,
  `user_mail` varchar(30) NOT NULL,
  `user_level` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `user_create_time` datetime NOT NULL,
  `valid` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `identity_card`, `user_password`, `nick_name`, `user_phone`, `user_bir`, `user_mail`, `user_level`, `user_create_time`, `valid`) VALUES
(1, '野比大雄', 'F124596125', '827ccb0eea8a706c4c34a16891f84e', '大雄', '0975136088', '1998-04-14', 'nobita1@doraemon.com', 3, '2022-04-18 20:50:51', 1),
(2, '野原新之助', 'H142578953', '827ccb0eea8a706c4c34a16891f84e', '小新', '0978153644', '1978-07-08', 'shin@shin-chan.com', 2, '2022-04-19 09:01:05', 1),
(3, '野原美冴', 'A221047856', '827ccb0eea8a706c4c34a16891f84e', '大屁股麻馬', '0932156744', '1980-05-15', 'misae@shin-chan.com', 4, '2022-04-19 13:41:39', 1),
(4, '哆啦A夢', 'H154789356', '827ccb0eea8a706c4c34a16891f84e', '小叮噹', '0936157428', '1995-10-23', 'doraemon@doraemon.com', 1, '2022-04-19 13:43:32', 1),
(5, '野原廣志', 'Y154769853', '827ccb0eea8a706c4c34a16891f84e', '臭腳丫把拔', '0914758963', '1986-12-25', 'hiroshi@shin-chan.com', 2, '2022-04-19 13:44:42', 1),
(6, '源靜香', 'N221698743', '827ccb0eea8a706c4c34a16891f84e', '靜香', '0963258419', '1996-02-18', 'shizuka@doraemon.com', 4, '2022-04-19 13:47:04', 1),
(7, '剛田武', 'L126957413', '827ccb0eea8a706c4c34a16891f84e', '胖虎', '0985136489', '1995-06-15', 'takeshi@doraemon.com', 3, '2022-04-19 13:49:06', 1),
(8, 'MiuPig', 'H126357489', '827ccb0eea8a706c4c34a16891f84e', '11111', '097514645', '1954-12-31', 'miu@pig.com', 2, '2022-04-19 16:43:36', 0),
(9, 'MiuPig', 'F125984653', '827ccb0eea8a706c4c34a16891f84e', '1111111', '097514855', '1985-05-27', 'miu@pig.com', 2, '2022-04-19 16:46:08', 0),
(10, 'magggie', 'F125846951', '827ccb0eea8a706c4c34a16891f84e', 'maggie', '0974156388', '1998-06-14', 'miu@pig.com', 2, '2022-04-19 16:50:58', 0),
(11, '12345', 'H147523698', '827ccb0eea8a706c4c34a16891f84e', '123', '091456789', '1995-08-08', 'akosakposkapo@gmail.com', 2, '2022-04-20 12:47:25', 0),
(12, '12345', 'H124596315', '827ccb0eea8a706c4c34a16891f84e', '12345', '097513544', '1999-01-01', 'miu', 2, '2022-04-20 13:31:08', 0),
(13, '陶1S', 'H224591756', '827ccb0eea8a706c4c34a16891f84e', '陶樂比', '0975148566', '1993-09-07', 'taolebe@dreamland.com', 1, '2022-04-21 17:36:12', 1),
(14, 'MiuMiu', 'H124695123', '827ccb0eea8a706c4c34a16891f84e', '12345', '0975148522', '1994-05-09', 'miu@pig.com', 1, '2022-04-21 17:56:36', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `user_and_coupon`
--

CREATE TABLE `user_and_coupon` (
  `user_and_coupon_id` int(30) NOT NULL,
  `coupon_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `valid` tinyint(2) NOT NULL DEFAULT '1'
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

-- --------------------------------------------------------

--
-- 資料表結構 `user_and_groups`
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
(4, 2, 6, '不愛'),
(5, 2, 1, '愛了愛了'),
(6, 2, 7, '普普通通'),
(7, 5, 3, '啥阿這個 '),
(8, 5, 6, '不喜翻啦'),
(9, 5, 5, '討厭討厭'),
(10, 8, 1, '什麼鬼'),
(11, 8, 2, '這啥阿 可以吃嗎'),
(12, 8, 6, '真心推薦喔'),
(13, 8, 7, '我是胖虎我推薦'),
(14, 8, 3, '嘿嘿嘿BJ4'),
(15, 8, 12, '嗯嗯嗯嗯嗯嗯 好讚'),
(16, 10, 3, '什麼鬼 不滿意'),
(17, 10, 6, '好吃好吃好吃啊~'),
(18, 10, 3, 'J個我喜歡'),
(19, 11, 4, '哭哭 想要天天吃'),
(20, 11, 1, '店家小驚喜 喜歡喜歡'),
(21, 5, 1, '愛了愛了'),
(22, 5, 2, '絕不去第二次'),
(23, 5, 7, '想再去第三次'),
(24, 12, 11, '讚啦讚讚'),
(25, 12, 9, '還好還好'),
(26, 6, 8, '讚讚讚最棒'),
(27, 6, 5, '還好'),
(28, 7, 10, '很棒喔'),
(29, 7, 14, '很棒'),
(30, 7, 6, '讚讚'),
(31, 7, 4, ''),
(32, 11, 14, '很棒喔'),
(33, 11, 9, '下次會再去'),
(34, 11, 8, '超難吃'),
(35, 11, 7, '普普通通啦'),
(36, 12, 3, '最讚最讚'),
(37, 12, 14, '還有進步空間'),
(38, 12, 3, '絕對不再去'),
(39, 12, 1, '值得回訪 五星好商家'),
(40, 13, 6, '店貓可愛 店員可怕'),
(41, 13, 2, '店員臉很臭'),
(42, 13, 11, '有加香菜就給負評'),
(43, 13, 6, '唉 無話可說'),
(44, 14, 2, '最棒的餐廳 會再來的'),
(45, 14, 3, 'J間我喜歡'),
(46, 14, 7, '唉唉唉 不去 氣死我了'),
(47, 15, 9, '推薦'),
(48, 15, 3, '便宜划算又大碗'),
(49, 15, 7, '推推推推推薦喔'),
(50, 15, 1, '喜歡喜歡喜歡'),
(51, 18, 4, '給負評一顆星');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`dish_id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- 資料表索引 `established`
--
ALTER TABLE `established`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`groups_id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- 資料表索引 `groups_and_dish`
--
ALTER TABLE `groups_and_dish`
  ADD PRIMARY KEY (`GD_combined_id`),
  ADD KEY `groups_id` (`groups_id`),
  ADD KEY `dish_id` (`dish_id`);

--
-- 資料表索引 `level_name`
--
ALTER TABLE `level_name`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`manager_id`);

--
-- 資料表索引 `project_users`
--
ALTER TABLE `project_users`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `qa`
--
ALTER TABLE `qa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_id` (`shop_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 資料表索引 `qa_content`
--
ALTER TABLE `qa_content`
  ADD PRIMARY KEY (`QA_content_id`);

--
-- 資料表索引 `qa_reply`
--
ALTER TABLE `qa_reply`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- 資料表索引 `shop_service`
--
ALTER TABLE `shop_service`
  ADD PRIMARY KEY (`service_id`);

--
-- 資料表索引 `shop_type`
--
ALTER TABLE `shop_type`
  ADD PRIMARY KEY (`type_id`);

--
-- 資料表索引 `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- 資料表索引 `user_and_coupon`
--
ALTER TABLE `user_and_coupon`
  ADD PRIMARY KEY (`user_and_coupon_id`),
  ADD KEY `coupon_id` (`coupon_id`),
  ADD KEY `user_id` (`user_id`);

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
-- 使用資料表自動遞增(AUTO_INCREMENT) `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(30) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `dish`
--
ALTER TABLE `dish`
  MODIFY `dish_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `established`
--
ALTER TABLE `established`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `groups`
--
ALTER TABLE `groups`
  MODIFY `groups_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `groups_and_dish`
--
ALTER TABLE `groups_and_dish`
  MODIFY `GD_combined_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `level_name`
--
ALTER TABLE `level_name`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `manager`
--
ALTER TABLE `manager`
  MODIFY `manager_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `project_users`
--
ALTER TABLE `project_users`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `qa`
--
ALTER TABLE `qa`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `qa_content`
--
ALTER TABLE `qa_content`
  MODIFY `QA_content_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `qa_reply`
--
ALTER TABLE `qa_reply`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shop_service`
--
ALTER TABLE `shop_service`
  MODIFY `service_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shop_type`
--
ALTER TABLE `shop_type`
  MODIFY `type_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `test`
--
ALTER TABLE `test`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_and_coupon`
--
ALTER TABLE `user_and_coupon`
  MODIFY `user_and_coupon_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user_and_groups`
--
ALTER TABLE `user_and_groups`
  MODIFY `user_and_groups_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
