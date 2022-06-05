-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2022-06-05 08:50:05
-- サーバのバージョン： 5.7.24
-- PHP のバージョン: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_kadaiphp`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `item_table`
--

CREATE TABLE `item_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `jancode` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `expirydate` date NOT NULL,
  `quantity` int(5) NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `item_table`
--

INSERT INTO `item_table` (`id`, `name`, `jancode`, `expirydate`, `quantity`, `content`, `indate`) VALUES
(14, '2022年新茶入り お～いお茶 緑茶 PET 600ml', '4901085003800', '2022-09-30', 50, 'この時期限定出荷の国産茶葉を100％使用した、香り高く、まろやかで味わい深い緑茶飲料です（無香料・無調味）。', '2022-06-05 17:47:38'),
(15, '江崎グリコ カフェオーレたっぷりミルク 180ml', '4971666409710', '2022-08-31', 20, '香りとコクにこだわり、苦みの少ない 「いいとこだけ抽出」のコーヒーと、 それをひきたてるミルクとのまろやかな一体感が特長です。\r\nちょっと疲れてひといきつきたい時にしみわたる味わい。', '2022-06-05 17:48:39');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `item_table`
--
ALTER TABLE `item_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `item_table`
--
ALTER TABLE `item_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
