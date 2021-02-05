-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 2 月 05 日 18:21
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
-- テーブルの構造 `kanri_table`
--

CREATE TABLE `kanri_table` (
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
-- テーブルのデータのダンプ `kanri_table`
--

INSERT INTO `kanri_table` (`id`, `username`, `mail`, `position`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'tehon', 'hoshimotoyasunori@yahoo.co.jp', 'HO', '111', 0, 0, '2021-02-06 01:46:47', '2021-02-06 01:46:47'),
(3, 'chikara', 'chikara@gmail.com', 'WTB', '111', 0, 0, '2021-02-06 02:03:52', '2021-02-06 02:03:52');

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
(40, 'upload/tacklefw20210204153854eaadf5b6b1497e34b73f83626fd7e599.jpg', '2021-02-25 00:00:00', 'tackle', 'fw', '2021-02-04 23:38:54', '2021-02-04 23:38:54'),
(41, 'upload/scrumfw20210204162841600115297ace357e2c75a75f8d1e5c7d.png', '2021-02-10 00:00:00', 'scrum', 'fw', '2021-02-05 00:28:41', '2021-02-05 00:28:41'),
(42, 'upload/traningfw202102041628546ac67cbd02a2daf8380fc7eb9f64739a.jpg', '2021-02-22 00:00:00', 'traning', 'fw', '2021-02-05 00:28:54', '2021-02-05 00:28:54'),
(43, 'upload/scrumfw202102041629081af4f5c16622100c23e565c6ac144669.png', '2021-03-03 00:00:00', 'scrum', 'fw', '2021-02-05 00:29:08', '2021-02-05 00:29:08'),
(44, 'upload/tacklefw202102041629338c13208152ee21535cec13b6642e4e06.png', '2021-02-17 00:00:00', 'tackle', 'fw', '2021-02-05 00:29:33', '2021-02-05 00:29:33'),
(45, 'upload/gamefw20210204162952d066f59f4ff8cb273df634064d6065a5.png', '2021-02-03 00:00:00', 'game', 'fw', '2021-02-05 00:29:52', '2021-02-05 00:29:52'),
(46, 'upload/lineoutfw202102041632483745fa3a306e7218a6c530ce52720a7c.jpg', '2021-02-09 00:00:00', 'lineout', 'fw', '2021-02-05 00:32:48', '2021-02-05 00:32:48'),
(47, 'upload/traningbk202102041633067e3a78f4a53f1eb3be709466bf97a7d0.png', '2021-02-26 00:00:00', 'traning', 'bk', '2021-02-05 00:33:06', '2021-02-05 00:33:06'),
(48, 'upload/lineout2021-01-01bk12f006e5cb2a6629a107ff00b17db57a.jpg', '2021-01-01 00:00:00', 'lineout', 'bk', '2021-02-05 00:40:07', '2021-02-05 00:40:07'),
(49, 'upload/scrum2021-03-05bk.png', '2021-03-05 00:00:00', 'scrum', 'bk', '2021-02-05 00:41:12', '2021-02-05 00:41:12'),
(50, 'upload/2021-02-22tackle-bk.jpeg', '2021-02-22 00:00:00', 'tackle', 'bk', '2021-02-05 00:42:47', '2021-02-05 00:42:47'),
(51, 'upload/2021-02-02kick-team.jpg', '2021-02-02 00:00:00', 'kick', 'team', '2021-02-05 00:43:33', '2021-02-05 00:43:33'),
(52, 'upload/2021-02-24kick-bk.png', '2021-02-24 00:00:00', 'kick', 'bk', '2021-02-05 00:46:52', '2021-02-05 00:46:52');

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
(2, 'bin', 'bin@gmail.com', 'WTB', '111', 0, 0, '2021-02-01 11:47:24', '2021-02-01 11:47:24'),
(3, 'tashi', 'tashi@gmail.com', 'SO', '111', 0, 0, '2021-02-06 01:53:41', '2021-02-06 01:53:41'),
(4, 'kouki', 'kouki@gmail.com', 'PR', '111', 0, 0, '2021-02-06 01:59:16', '2021-02-06 01:59:16'),
(5, 'suzuki', 'suzuki@gmail.com', 'staff', '111', 0, 0, '2021-02-06 02:01:26', '2021-02-06 02:01:26'),
(6, 'chikara', 'chikara@gmail.com', 'WTB', '111', 0, 0, '2021-02-06 02:03:52', '2021-02-06 02:03:52');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `kanri_table`
--
ALTER TABLE `kanri_table`
  ADD PRIMARY KEY (`id`);

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
-- テーブルの AUTO_INCREMENT `kanri_table`
--
ALTER TABLE `kanri_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
