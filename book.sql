-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 05, 2021 lúc 01:17 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `book`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `classify` varchar(20) NOT NULL,
  `author` varchar(30) NOT NULL,
  `publication_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `inventory`
--

INSERT INTO `inventory` (`id`, `isbn`, `title`, `classify`, `author`, `publication_date`) VALUES
(1, '0003700046', 'Academic writing course : collins study skills in English', 'Grammar', 'Jordan, R R.', '1980-11-10'),
(2, '0073385484', 'After the fact. Volume I : the art of historical detection', 'History', 'Davidson, James West.', '2009-09-22'),
(3, '0133260224', 'The Java language specification : Java SE', 'Programming', 'Gosling, James,', '2013-02-24'),
(4, '0198708904', 'Foreign policy : theories, actors, cases', 'History', 'Smith, Steve.', '2016-08-11'),
(5, '9780194370035', 'Fundamental considerations in languege testing', 'Research', 'Bachman, Lyle. F', '1990-04-19'),
(6, '047176244X', 'Professional management of housekeeping operations', 'Research', 'Jones, Thomas J. A.', '2007-10-26'),
(7, '000088200', 'Emotion expressing Idioms in English and Vietnames', 'Thesis', 'Nguyễn, Văn Trào.', '2009-10-01'),
(8, '000084253', 'Community-based Tourism and Development in the periphery', 'Thesis', 'Lê, Tuấn Anh', '2016-01-01'),
(9, '0137007302', 'Raise the issues : an integrated approach to critical thinking', 'Textbook', 'Numrich, Carol', '2009-06-19'),
(10, '0195541855', 'In your own words 3 : Developing English Skills', 'Grammar', 'Cahir, Sandy', '1998-01-01'),
(11, '1133310680', 'An introduction to language', 'Language', 'Fromkin, Victoria', '2013-01-01'),
(12, '9780451531049', 'One day in the life of Ivan Denisovich', 'Novel', 'Solzheni, Aleksandr.', '2008-08-06'),
(13, '0743477111', 'Romeo and Juliet', 'Drama', 'Shakespeare, William,', '2004-01-01'),
(14, '0909752575', 'Discussing Literature', 'Literature', 'Edwards, Hazel.', '1983-01-01'),
(15, '1259680932', 'College writing skills', 'Grammar', 'Langan, John,', '2018-01-11'),
(16, '0878359508', 'Advanced structured COBOL', 'Programming', 'Khan, M. B.', '1994-01-01'),
(17, '1119232686', 'Adventures in coding', 'Programming', 'Holland, Eva', '2016-03-03'),
(18, '0804172854', 'If You Could See Me Now', 'Novel', 'Straub, Peter', '2015-05-19'),
(19, '0141012285', 'Antony and Cleopatra', 'Drama', 'Shakespeare, William,', '2005-04-26'),
(20, '000117118', 'Nine Things Successful People Do Differently', 'Business', 'Halvorson, Heidi Grant-,', '2011-10-24'),
(21, '0312939019', '\"C\" Is for Corpse', 'Fiction', 'Grafton, Sue.', '2005-11-29'),
(22, '9780312939021', '\"D\" is for deadbeat', 'Fiction', 'Grafton, Sue.', '2005-11-29'),
(23, '0545178037', 'Ghost beach', 'Fantasy', 'Stine, R. L.', '2010-06-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `create_datetime`) VALUES
(1, 'vinhtran', 'eyepatchvvv@gmail.com', 'c8758b517083196f05ac29810b924aca', '2021-11-29 11:39:43'),
(2, 'vinhtran2011', 'eyepatchvvv@gmail.com', 'c8758b517083196f05ac29810b924aca', '2021-12-05 12:32:49');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
