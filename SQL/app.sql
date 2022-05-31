-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 04, 2021 lúc 06:00 AM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `app`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `pass` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anh`
--

CREATE TABLE `anh` (
  `id` int(11) NOT NULL,
  `anh` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `idchap` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `anh`
--

INSERT INTO `anh` (`id`, `anh`, `idchap`) VALUES
(37, 'http://192.168.43.231/appandroid/wrb/anh/126/59/37aa.png', 59),
(38, 'http://192.168.43.231/appandroid/wrb/anh/126/59/38a.png', 59),
(42, 'http://192.168.43.231/appandroid/wrb/anh/126/61/42.png', 61),
(43, 'http://192.168.43.231/appandroid/wrb/anh/126/61/43.png', 61),
(44, 'http://192.168.43.231/appandroid/wrb/anh/126/56/44a.png', 56),
(45, 'http://192.168.43.231/appandroid/wrb/anh/126/56/45.png', 56),
(47, 'http://192.168.43.231/appandroid/wrb/anh/127/62/47a.png', 62),
(48, 'http://192.168.43.231/appandroid/wrb/anh/126/63/48.png', 63),
(50, 'http://192.168.43.231/appandroid/wrb/anh/126/63/50.png', 63),
(51, 'http://192.168.43.231/appandroid/wrb/anh/126/63/51.png', 63),
(52, 'http://192.168.43.231/appandroid/wrb/anh/126/63/52.png', 63),
(53, 'http://192.168.43.231/appandroid/wrb/anh/133/64/53.png', 64),
(54, 'http://192.168.43.231/appandroid/wrb/anh/133/64/54.png', 64),
(55, 'http://192.168.43.231/appandroid/wrb/anh/133/64/55.png', 64),
(56, 'http://192.168.43.231/appandroid/wrb/anh/133/64/56.png', 64),
(57, 'http://192.168.43.231/appandroid/wrb/anh/133/64/57.png', 64),
(58, 'http://192.168.43.231/appandroid/wrb/anh/133/64/58.png', 64),
(59, 'http://192.168.43.231/appandroid/wrb/anh/133/64/59.png', 64),
(60, 'http://192.168.43.231/appandroid/wrb/anh/133/64/60.png', 64),
(61, 'http://192.168.43.231/appandroid/wrb/anh/133/64/61.png', 64),
(67, 'http://192.168.43.231/appandroid/wrb/anh/133/65/67.png', 65),
(68, 'http://192.168.43.231/appandroid/wrb/anh/133/65/68.png', 65),
(69, 'http://192.168.43.231/appandroid/wrb/anh/133/65/69.png', 65),
(70, 'http://192.168.43.231/appandroid/wrb/anh/133/65/70.png', 65),
(71, 'http://192.168.43.231/appandroid/wrb/anh/133/65/71.png', 65),
(72, 'http://192.168.43.231/appandroid/wrb/anh/127/62/72.png', 62),
(73, 'http://192.168.43.231/appandroid/wrb/anh/131/66/73.png', 66),
(74, 'http://192.168.43.231/appandroid/wrb/anh/131/66/74.png', 66),
(75, 'http://192.168.43.231/appandroid/wrb/anh/131/66/75.png', 66),
(76, 'http://192.168.43.231/appandroid/wrb/anh/131/66/76.png', 66),
(77, 'http://192.168.43.231/appandroid/wrb/anh/131/66/77.png', 66),
(78, 'http://192.168.43.231/appandroid/wrb/anh/131/66/78.png', 66),
(79, 'http://192.168.43.231/appandroid/wrb/anh/131/66/79.png', 66),
(80, 'http://192.168.43.231/appandroid/wrb/anh/131/66/80.png', 66),
(81, 'http://192.168.43.231/appandroid/wrb/anh/131/66/81.png', 66),
(82, 'http://192.168.43.231/appandroid/wrb/anh/131/66/82.png', 66),
(83, 'http://192.168.43.231/appandroid/wrb/anh/131/67/83.png', 67),
(84, 'http://192.168.43.231/appandroid/wrb/anh/131/67/84.png', 67),
(85, 'http://192.168.43.231/appandroid/wrb/anh/131/67/85.png', 67),
(86, 'http://192.168.43.231/appandroid/wrb/anh/131/67/86.png', 67),
(87, 'http://192.168.43.231/appandroid/wrb/anh/131/67/87.png', 67),
(88, 'http://192.168.43.231/appandroid/wrb/anh/131/67/88.png', 67),
(89, 'http://192.168.43.231/appandroid/wrb/anh/131/67/89.png', 67),
(90, 'http://192.168.43.231/appandroid/wrb/anh/131/67/90.png', 67),
(91, 'http://192.168.43.231/appandroid/wrb/anh/131/67/91.png', 67),
(92, 'http://192.168.43.231/appandroid/wrb/anh/131/67/92.png', 67),
(93, 'http://192.168.43.231/appandroid/wrb/anh/131/68/93.png', 68),
(94, 'http://192.168.43.231/appandroid/wrb/anh/131/68/94.png', 68),
(95, 'http://192.168.43.231/appandroid/wrb/anh/131/68/95.png', 68),
(96, 'http://192.168.43.231/appandroid/wrb/anh/131/68/96.png', 68),
(97, 'http://192.168.43.231/appandroid/wrb/anh/131/68/97.png', 68),
(98, 'http://192.168.43.231/appandroid/wrb/anh/131/68/98.png', 68),
(99, 'http://192.168.43.231/appandroid/wrb/anh/131/68/99.png', 68),
(100, 'http://192.168.43.231/appandroid/wrb/anh/131/68/100.png', 68),
(101, 'http://192.168.43.231/appandroid/wrb/anh/131/68/101.png', 68),
(102, 'http://192.168.43.231/appandroid/wrb/anh/131/68/102.png', 68),
(108, 'http://192.168.43.231/appandroid/wrb/anh/134/71/108.png', 71),
(115, 'http://192.168.43.231/appandroid/wrb/anh/144/75/109.png', 75),
(116, 'http://192.168.43.231/appandroid/wrb/anh/144/75/116.png', 75),
(121, 'http://192.168.43.231/appandroid/wrb/anh/126/59/121.png', 59),
(126, 'http://192.168.43.231/appandroid/wrb/anh/126/61/126.png', 61),
(130, 'http://192.168.43.231/appandroid/wrb/anh/126/56/130.png', 56),
(136, 'http://192.168.43.231/appandroid/wrb/anh/126/63/136.png', 63),
(137, 'http://192.168.43.231/appandroid/wrb/anh/126/63/137.png', 63),
(138, 'http://192.168.43.231/appandroid/wrb/anh/126/59/138.png', 59),
(139, 'http://192.168.43.231/appandroid/wrb/anh/126/61/139.png', 61),
(140, 'http://192.168.43.231/appandroid/wrb/anh/126/59/140.png', 59),
(143, 'http://192.168.43.231/appandroid/wrb/anh/126/63/143.png', 63),
(144, 'http://192.168.43.231/appandroid/wrb/anh/126/63/144.png', 63),
(148, 'http://192.168.43.231/appandroid/wrb/anh/126/61/148.png', 61),
(149, 'http://192.168.43.231/appandroid/wrb/anh/126/61/149.png', 61),
(151, 'http://192.168.43.231/appandroid/wrb/anh/126/61/151.png', 61),
(152, 'http://192.168.43.231/appandroid/wrb/anh/126/59/152.png', 59),
(153, 'http://192.168.43.231/appandroid/wrb/anh/127/62/153.png', 62),
(154, 'http://192.168.43.231/appandroid/wrb/anh/127/91/154.png', 91),
(155, 'http://192.168.43.231/appandroid/wrb/anh/130/92/155.png', 92),
(156, 'http://192.168.43.231/appandroid/wrb/anh/127/62/156.png', 62),
(157, 'http://192.168.43.231/appandroid/wrb/anh/156/93/157.png', 93);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chap`
--

CREATE TABLE `chap` (
  `id` int(11) NOT NULL,
  `tentruyen` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngaydang` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `idtruyen` int(11) NOT NULL,
  `numbert` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chap`
--

INSERT INTO `chap` (`id`, `tentruyen`, `ngaydang`, `idtruyen`, `numbert`) VALUES
(56, 'Chap 1.1', '21-06-2020', 126, 1.1),
(59, 'Chap 3.0', '21-06-2020', 126, 3),
(61, 'Chap 5.0', '03-07-2020', 126, 5),
(62, 'Chap 1.0', '04-07-2020', 127, 1),
(63, 'Chap 4.0', '04-07-2020', 126, 4),
(64, 'Chap 1.0', '10-07-2020', 133, 1),
(65, 'Chap 1.5', '10-07-2020', 133, 1.5),
(66, 'Chap 1.0', '22-07-2020', 131, 1),
(67, 'Chap 1.5', '22-07-2020', 131, 1.5),
(68, 'Chap 1.9', '22-07-2020', 131, 1.9),
(71, 'Chap 9.1', '29-08-2020', 134, 9.1),
(91, 'Chap 0', '10-09-2020', 127, 0),
(92, 'Chap 6.0', '12-09-2020', 130, 6),
(93, 'Chap 1.0', '12-09-2020', 156, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `comment_sender_name` varchar(200) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `idsp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`, `idsp`) VALUES
(2, 1, 'ok', '1', '2021-11-24 14:13:50', 64),
(3, 2, 'a', '1', '2021-11-24 14:24:41', 64),
(7, 2, 'yeah', '6', '2021-11-24 14:35:21', 64),
(9, 8, 'Äá»‰nh', '6', '2021-11-24 14:42:19', 65),
(10, 0, 'Halo', '6', '2021-11-24 15:09:37', 65),
(11, 10, 'Ok', '6', '2021-11-24 15:09:41', 65),
(12, 0, 'ok', '28', '2021-11-24 15:53:01', 71),
(13, 0, 'truyá»‡n hay', '1', '2021-11-25 13:27:49', 64),
(14, 13, 'Ä‘Ãºng váº­y', '1', '2021-11-25 13:28:16', 64),
(15, 0, 'Hay láº¯m', '1', '2021-11-25 13:34:08', 64),
(16, 15, 'Ä‘Ãºng rá»“i', '1', '2021-11-25 13:34:46', 64);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truyen`
--

CREATE TABLE `truyen` (
  `id` int(11) NOT NULL,
  `ten` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `chap` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `anh` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `luotxem` bigint(20) NOT NULL,
  `likene` bigint(20) NOT NULL,
  `unlike` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `truyen`
--

INSERT INTO `truyen` (`id`, `ten`, `chap`, `anh`, `noidung`, `luotxem`, `likene`, `unlike`) VALUES
(126, 'Người chơi lỗi', 'Chap 5.0', 'http://192.168.43.231/appandroid/wrb/anh/126/126aa.png', 'Kể về thằng chúa tể béo chuyển sinh với những lỗi bug cực mạnh!', 100026, 6, 78),
(127, 'KẺ MẠNH NHẤT - TONG EDGE', 'Chap 1.0', 'http://192.168.43.231/appandroid/wrb/anh/127/127a.png', 'Sau sự kiện trong TONG, ha jonghwa thu nhận ryu heesoo làm người kế nhiệm trong câu chuyện mới đầy những cảnh hành động máu lạnh và lòng trung thành không đổi', 5240, 27, 1001),
(128, 'TÔI THĂNG CẤP MỘT MÌNH', 'Chap 0', 'http://192.168.43.231/appandroid/wrb/anh/128/128a.png', 'Theo chân Sung JinWoo trên hành trình từ \"thợ săn kém cỏi\" đến \"thợ săn hạng S mạnh nhất thế giới\". (có 1 tí Saitama với 1 tí The gamer, bạn nào thích 2 bộ này xin mời nhảy hố=))', 1, 0, 0),
(129, 'CUỘC CHIẾN TRONG TÒA THÁP', 'Chap 0', 'http://192.168.43.231/appandroid/wrb/anh/129/129a.png', 'Tower of God kể về cuộc đấu tranh để leo lên đỉnh tòa tháp của nhiều con người với các mục đích khác nhau, nơi mà mọi mong muốn của bạn: tiền, quyền lực, sức mạnh, hay bất cứ một điều gì khác đều có thể được đáp ứng. Tại đây, mỗi người đều phải trổ hết tài năng của mình để leo lên từng tầng, mà mỗi tầng của tháp lại có vô vàn những thử thách khó khăn đang chờ họ, để đạt tới mục tiêu của mình. Thất bại đôi khi sẽ phải trả giá bằng chính mạng sống của mỗi người. Đây là nơi các thế lực minh tranh ám đấu, từ các cá nhân với năng lực siêu phàm được xưng tụng là God, các đại gia tộc thế lực hùng mạnh, đến những tổ chức phản loạn nguy hiểm khiến người chơi có thể dễ dàng biến thành con cờ trong tay họ. Tòa tháp cũng là nơi thử thách cho tình bạn, tình đồng đội khi ngay cả người thân nhất cũng sẵn sàng bán đứng bạn vì tham vọng của mình. Nhân vật chính trong Tower of God là một cậu bé nhỏ con, không có tài năng gì nổi bật ngoài sự dũng cảm và niềm tin mãnh liệt vào tình bạn mang tên Twenty Fifth Baam – kẻ vô tình bị cuốn vào tòa tháp đầy sự cám dỗ. Chính Baam là người mang hi vọng sẽ có đủ sức mạnh để thay đổi toàn bộ tòa tháp, thậm chí đánh đổ cả vị Thần đứng đầu thế giới… Liệu điều gì đang chờ đợi cậu phía trước?', 1, 0, 0),
(130, 'DỊ TỘC TRÙNG SINH', 'Chap 6.0', 'http://192.168.43.231/appandroid/wrb/anh/130/130aa.png', 'Năm 2023, linh khí thức tỉnh, mọi ngóc ngách trên thế giới đều bị bao bọc bởi linh khí nồng đậm,  Một vương tử của dị hoàng tộc bị giam lỏng trong cung điện của mình, bất ngờ tai nạn xảy ra,sau khi hắn chết đi đã được chuyển sinh sang cơ thể của một nhân loại, điều đáng nói là chủ nhân cơ thể này là một tên phế vật. Vị vương tử với tính cách ngáo ngơ này sẽ tạo lên những sóng gió gì trong thời đại linh khí... hãy cùng tìm câu trả lờiLoài người thức tỉnh bắt đầu có được năng lượng mạnh mẽ, những sinh vật khác bị ảnh hưởng bởi linh khí cũng tiến hóa thần tốc. các sinh vật cũng không tránh khỏi bị ảnh hưởng. ', 2, 0, 0),
(131, 'THANH GƯƠM DIỆT QUỶ', 'Chap 1.9', 'http://192.168.43.231/appandroid/wrb/anh/131/131a.png', 'Kimetsu no Yaiba – Tanjirou là con cả của gia đình vừa mất cha. Một ngày nọ, Tanjirou đến thăm thị trấn khác để bán than, khi đêm về cậu ở nghỉ tại nhà người khác thay vì về nhà vì lời đồn thổi về ác quỷ luôn rình mò gần núi vào buổi tối. Khi cậu về nhà vào ngày hôm sau, bị kịch đang đợi chờ cậu…', 12, 24575, 2217),
(132, 'KẺ KHỦNG BỐ', 'Chap 0', 'http://192.168.43.231/appandroid/wrb/anh/132/132a.png', 'Min Jungwoo sở hữu năng lực thấy trước được những hiểm hoạ, với năng lực của mình, Jungwoo quyết định cứu giúp thường dân trước khi những hiểm hoạ xảy ra, và con đường này đẩy Jungwoo trở thành một kẻ khủng bố bị mọi người khiếp sợ. Câu chuyện là nỗi lòng thầm kín khi phải vật lộn giữa hạnh phúc và khổ sở của người hùng khác thường này.', 0, 0, 0),
(133, 'SỰ TRỞ LẠI CỦA PHÁP SƯ VĨ ĐẠI SAU 4000 NĂM', 'Chap 1.5', 'http://192.168.43.231/appandroid/wrb/anh/133/133.png', 'Đại phù thủy Lucas Traumen - người mạnh nhất thế giới. Trong một lần đi tiêu diệt quái vật đã khiến thần nổi giận và phạm tội khinh thường Chúa, anh ta bị phong ấn trong địa ngục suốt 4000 năm. Đến khi tỉnh lại thì anh ta đã nhập vào thân xác của Frey Blake - thanh niên yếu nhất thế giới vừa tự sát, và bắt đầu hành trình khôi phục lại sức mạnh để diệt thần.', 6, 2026, 42),
(134, 'DEAD TUBE', 'Chap 9.1', 'http://192.168.43.231/appandroid/wrb/anh/134/134.png', 'Câu truyện bắt đầu bằng một trò chơi giết người đẫm máu, tràn ngập trong nỗi kinh hoàng đầy biến thái và bạo lực. Truyện với những hình ảnh 18+, đề nghị bạn đọc cân nhắc trước khi xem.', 3, 0, 0),
(156, 'Cao thủ', 'Chap 1.0', 'http://192.168.1.5/appandroid/wrb/anh/156/156aa.png', 'Loading', 4, 0, 0),
(157, 'Cao thủ siêu cuồng phong', 'Chap 0', 'http://192.168.1.5/appandroid/wrb/anh/157/157.png', 'Loading', 0, 0, 0),
(158, 'Bá đạo', 'Chap 0', 'http://192.168.43.231/appandroid/wrb/anh/158/158.png', 'Loading', 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(99) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(99) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(99) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `anh` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `idadmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `anh`, `idadmin`) VALUES
(1, 'Luo', 'liem@yahoo.com', 'hai', 'http://192.168.43.231/appandroid/image/1aaaaaaaaaaaaaaa.png', 0),
(5, 'Lie', 'lei@yahoo.com', 'mothai', 'http://192.168.43.231/appandroid/image/5aaaa.png', 0),
(6, 'add', 'no@yahoo.com', 'camthach', 'http://192.168.43.231/appandroid/image/6aa.png', 0),
(7, 'non', 'non@yahoo.com', 'mot', 'http://192.168.1.11/appandroid/image/7a.png', 0),
(8, 'ko', 'nonw@yahoo.com', 'baomat', 'http://192.168.1.11/appandroid/image/8aa.png', 0),
(9, 'lolde', 'nonws@yahoo.com', 'baomat', 'http://192.168.1.11/appandroid/image/9.png', 0),
(10, 'haiz', 'haicon@yahoo.com', 'baomat', 'http://192.168.1.11/appandroid/image/10.png', 0),
(11, 'lolde', 'nonswws@yahoo.com', 'baomat', 'http://192.168.1.11/appandroid/image/11a.png', 0),
(12, 'nope', 'noob@yahoo.com', 'mot', 'http://192.168.1.5/appandroid/image/12a.png', 0),
(13, 'nope', 'widn@yahoo.com', 'mot', 'http://192.168.1.11/appandroid/image/13.png', 0),
(14, 'nope', 'widen@yahoo.com', 'mot', 'http://192.168.1.11/appandroid/image/14a.png', 0),
(15, 'dauce', 'macke@yahoo.com', 'mothai', 'http://192.168.1.11/appandroid/image/15.png', 0),
(16, 'wtfmen', 'okemen@yahoo.com', 'hobao', 'http://192.168.1.11/appandroid/image/16.png', 0),
(17, 'lauqua', 'qualau@yahoo.com', 'chamthoi', 'http://192.168.1.11/appandroid/image/17.png', 0),
(18, 'superffas', 'don@yahoo.com', 'stop', 'http://192.168.1.11/appandroid/image/18.png', 0),
(19, 'mothau', 'nos@yahoo.com', 'lol', 'http://192.168.1.11/appandroid/image/19.png', 0),
(20, 'nono', 'ohmenok@yahoo.com', 'nottoday', 'http://192.168.1.11/appandroid/image/20.png', 0),
(21, 'Suooot', 'liemsuot@yahoo.com', 'not', 'http://192.168.43.231/appandroid/image/21aaa.png', 0),
(22, 'Jack', 'Jackon@yahoo.com', 'mot23', 'http://192.168.1.11/appandroid/image/22.png', 0),
(23, 'NÔ', 'hol@abc.com', 'mot123', 'http://192.168.43.231/appandroid/image/23aa.png', 0),
(24, 'prety', 'lak@yahoo.com', 'mungvip1', 'http://192.168.43.231/appandroid/image/24a.png', 0),
(25, 'tesst', 't@yahoo.com', '123', 'http://192.168.43.231/appandroid/image/25a.png', 0),
(26, 'té', 'te2yahoocom', 'mot', 'http://192.168.1.11/appandroid/image/26.png', 0),
(27, 'tr', 'tea@yahoo.com', 'mot', 'http://192.168.43.231/appandroid/image/27a.png', 0),
(28, 'dato', 'hocmo@yahoo.com', 'hoc', 'http://192.168.1.5/appandroid/image/28aa.png', 1),
(29, 'kha', 'khakha@gmail.com', 'hai', 'http://192.168.1.11/appandroid/image/29.png', 0),
(30, 'love', 'lls@yahoo.com', 'mungvip1', 'http://192.168.1.11/appandroid/image/30.png', 0),
(31, 'oo', 'oooo@yahoo.com', '123', 'http://192.168.1.11/appandroid/image/31.png', 0),
(32, 'test', 'testt@gmail.com', 'hai', 'http://192.168.1.11/appandroid/image/32.png', 0),
(33, 'dat2', 'dato2@yahoo.com', 'mot', 'http://192.168.43.231/appandroid/image/33a.png', 0),
(34, 'mooon', 'lkk@yahoo.com', 'hai', 'http://192.168.1.11/appandroid/image/34.png', 0),
(35, 'dat', 'ab@gmail.com', 'mot', 'http://192.168.43.231/appandroid/image/35a.png', 0),
(36, 'mung', 'liemsssssssss@yahoo.com', 'mungvip', '', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `anh`
--
ALTER TABLE `anh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chap`
--
ALTER TABLE `chap`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `truyen`
--
ALTER TABLE `truyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `anh`
--
ALTER TABLE `anh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT cho bảng `chap`
--
ALTER TABLE `chap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `truyen`
--
ALTER TABLE `truyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
