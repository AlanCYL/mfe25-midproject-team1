-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:8889
-- 產生時間： 2022 年 04 月 25 日 17:56
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
(2, 'NINI 尼尼義大利餐廳', 'NINI@test.com', '222', '03-222-3272', '桃園市蘆竹區南崁路一段112號', 'NINI《NATURAL自然、INITIAL獨創、NEAT純淨、IMPRESSIVE感動》我們相信用好的食材與料理方式，就能對自我和環境產生正向的改變；透過好的用餐環境，讓顧客們和我們一樣愛上這樣的生活方式。', 'NINI.jpg', '3', '1', '2022-04-21', 0),
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
(14, '肯德基 桃園中山二餐廳', 'kfcclub@test.com', '1414', '03-336-0860', '330桃園市桃園區中山路444號446號', '肯德基是源自美國的速食連鎖店，\r\n總部設於肯塔基州路易維爾市，以炸雞為主力產品。', 'kfc.jpg', '6', '1', '2022-04-18', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`shop_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `shop`
--
ALTER TABLE `shop`
  MODIFY `shop_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
