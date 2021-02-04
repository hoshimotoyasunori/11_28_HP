-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 2 月 04 日 16:11
-- サーバのバージョン： 10.4.17-MariaDB
-- PHP のバージョン: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `8pos_lab`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `filename` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename0` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `media`
--

INSERT INTO `media` (`id`, `image`, `date`, `filename`, `filename0`, `created_at`, `updated_at`) VALUES
(22, 'upload/gamebk20210204062807ef81ca305a5a8cab5b93e3a6d9d5c7e5.JPG', '2021-01-01 00:00:00', 'game', 'bk', '2021-02-04 14:28:07', '2021-02-04 14:28:07'),
(23, 'upload/traningbk202102040628413878f7926253d48073c268df40dca273.jpg', '2021-01-02 00:00:00', 'traning', 'bk', '2021-02-04 14:28:41', '2021-02-04 14:28:41'),
(24, 'upload/lineoutbk20210204062928a1cbcd7514e7f3c809e2c2a0dd0223d6.png', '2021-01-03 00:00:00', 'lineout', 'bk', '2021-02-04 14:29:28', '2021-02-04 14:29:28'),
(25, 'upload/scrumbk202102040631506974c1d52ece5c433d34fd00f90c2c47.png', '2021-01-04 00:00:00', 'scrum', 'bk', '2021-02-04 14:31:50', '2021-02-04 14:31:50'),
(26, 'upload/kickbk2021020406325151841ad57469b0b746138e47ef60bafd.png', '2021-01-05 00:00:00', 'kick', 'bk', '2021-02-04 14:32:51', '2021-02-04 14:32:51'),
(27, 'upload/tacklebk2021020406330744316e315a64957fce6ef21a8231e22c.png', '2021-01-06 00:00:00', 'tackle', 'bk', '2021-02-04 14:33:07', '2021-02-04 14:33:07'),
(28, 'upload/gamebk20210204063323a4552ab7e68e3624a002edd69ea3f44d.png', '2021-01-07 00:00:00', 'game', 'bk', '2021-02-04 14:33:23', '2021-02-04 14:33:23'),
(29, 'upload/traningbk20210204063940d905ea0ac7595aeccd25951a2bb82ae3.png', '2021-02-08 00:00:00', 'traning', 'bk', '2021-02-04 14:39:40', '2021-02-04 14:39:40'),
(30, 'upload/lineoutbk202102040640001e046934cdd46bbbf2e3ba66b232e624.png', '2021-02-09 00:00:00', 'lineout', 'bk', '2021-02-04 14:40:00', '2021-02-04 14:40:00'),
(31, 'upload/kickbk202102040640120802dd14deab78935e575109da4d208b.png', '2021-02-10 00:00:00', 'kick', 'bk', '2021-02-04 14:40:12', '2021-02-04 14:40:12'),
(32, 'upload/game202102040640276f58b9be2d4f2cf3079e3737641f1670.jpg', '2021-02-11 00:00:00', 'game', '0', '2021-02-04 14:40:27', '2021-02-04 14:40:27'),
(34, 'upload/game20210204064054066e6d39bc86e08b6962248c3907b31e.jpg', '2021-02-13 00:00:00', 'game', '0', '2021-02-04 14:40:54', '2021-02-04 14:40:54'),
(35, 'upload/traning202102040641122a3df14e12eab6d24f00d647ba53213c.png', '2021-01-14 00:00:00', 'traning', '0', '2021-02-04 14:41:12', '2021-02-04 14:41:12'),
(36, 'upload/game202102040641231b62c76b1923f0332ded5e617fd33407.png', '2021-02-15 00:00:00', 'game', '0', '2021-02-04 14:41:23', '2021-02-04 14:41:23'),
(37, 'upload/game2021020406413236175ae374890ccabee69f6b8354fa81.png', '2021-02-16 00:00:00', 'game', '0', '2021-02-04 14:41:32', '2021-02-04 14:41:32'),
(38, 'upload/kick202102040641567d5e954e505be3f529779acbadbe392d.png', '2021-02-17 00:00:00', 'kick', '0', '2021-02-04 14:41:56', '2021-02-04 14:41:56'),
(39, 'upload/tackle20210204064208741b599f675887fb59de366f985cbfb5.jpg', '2021-02-18 00:00:00', 'tackle', '0', '2021-02-04 14:42:08', '2021-02-04 14:42:08'),
(40, 'upload/tacklefw20210204153854eaadf5b6b1497e34b73f83626fd7e599.jpg', '2021-02-25 00:00:00', 'tackle', 'fw', '2021-02-04 23:38:54', '2021-02-04 23:38:54');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `mail`, `position`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'tehon', 'hoshimotoyasunori@yahoo.co.jp', 'HO', '111', 0, 0, '2021-01-31 23:51:19', '2021-01-31 23:51:19'),
(2, 'bin', 'bin@gmail.com', 'WTB', '111', 0, 0, '2021-02-01 11:47:24', '2021-02-01 11:47:24');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
