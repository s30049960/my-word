-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-01-01 16:49:13
-- 伺服器版本： 10.4.27-MariaDB
-- PHP 版本： 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `library_sever`
--

-- --------------------------------------------------------

--
-- 資料表結構 `library_book`
--

CREATE TABLE `library_book` (
  `bookid` int(8) NOT NULL,
  `book` varchar(30) NOT NULL,
  `author` varchar(20) NOT NULL,
  `publishing_house` varchar(20) NOT NULL,
  `Publication_date` date NOT NULL,
  `book_img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `library_book`
--

INSERT INTO `library_book` (`bookid`, `book`, `author`, `publishing_house`, `Publication_date`, `book_img`) VALUES
(23330001, '變形記', '法蘭茲．卡夫卡', '野人', '2019-11-06', 'die_verwandlung.png'),
(23330002, '審判', '法蘭茲．卡夫卡', '桂冠', '1994-05-10', 'franz_kafka_the_trial.png'),
(23330003, '原子習慣：細微改變帶來巨大成就的實證法則', 'James Clear', '方智', '2019-06-01', 'atomic_habits.png'),
(23330004, '底層邏輯：看清這個世界的底牌', '劉潤', '時報出版', '2022-03-29', 'the_undelying_logic_of_the_world.png');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `userid` varchar(20) NOT NULL,
  `userpassword` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`userid`, `userpassword`, `email`, `gender`) VALUES
('sirsir', 's30049960', 's30049960@gmail.com', '女');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `library_book`
--
ALTER TABLE `library_book`
  ADD PRIMARY KEY (`bookid`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
