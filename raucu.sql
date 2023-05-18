-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 04:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `raucu`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaHD` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `MaSP` int(11) NOT NULL,
  `MaND` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SoSao` int(11) NOT NULL,
  `BinhLuan` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NgayLap` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `danhgia` (`MaSP`, `MaND`, `SoSao`, `BinhLuan`, `NgayLap`) VALUES
(1, '2', 5, 'Definitely enjoyed those and will buy again', '2023-02-16 19:28:13'),
(1, '2', 5, 'As described. Delicious.', '2023-01-16 19:29:30'),
(2, '2', 4, 'okey', '2023-05-01 19:31:48'),
(4, '2', 5, 'Perfect', '2022-02-03 19:32:58'),
(5, '4', 4, 'These were lovely and sweet.', '2023-03-01 19:38:03'),
(7, '4', 5, 'Sooooo great', '2023-04-02 19:47:56'),
(9, '4', 5, 'These were so fresh to use and eat and I really loved them.', '2023-04-04 19:48:46'),
(11, '4', 5, 'Tasty fully recommended', '2023-01-16 19:49:20'),
(13, '4', 5, 'Gorgeous flavor ', '2023-02-20 19:49:44'),
(14, '4', 4, 'So delicious!', '2023-04-30 19:52:14');
-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `MaND` int(11) NOT NULL,
  `NgayLap` datetime NOT NULL,
  `NguoiNhan` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PhuongThucTT` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TongTien` float NOT NULL,
  `TrangThai` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `hoadon` (`MaHD`, `MaND`, `NgayLap`, `NguoiNhan`, `SDT`, `DiaChi`, `PhuongThucTT`, `TongTien`, `TrangThai`) VALUES
(1, 2, '2019-08-20 13:20:56', 'Nguyen Danh', '0123456789', 'Hà Nội', 'Trực tiếp khi nhận h', 2000000, '1');
-- --------------------------------------------------------

--
-- Table structure for table `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKM` int(11) NOT NULL,
  `TenKM` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `LoaiKM` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `GiaTriKM` float NOT NULL,
  `NgayBD` datetime NOT NULL,
  `NgayKT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKM`, `TenKM`, `LoaiKM`, `GiaTriKM`, `NgayBD`, `NgayKT`) VALUES
(1, 'Không khuyến mãi', 'Nothing', 0, '2019-04-08 00:00:00', '2022-04-17 00:00:00'),
(2, 'Giảm giá', 'GiamGia', 25000, '2019-05-01 00:00:00', '2019-05-31 00:00:00'),
(3, 'Giá rẻ online', 'GiaReOnline', 10000, '2019-05-01 00:00:00', '2019-05-31 00:00:00'),
(4, 'Săn sale', 'SanSale', 0, '2019-05-01 00:00:00', '2019-05-31 00:00:00'),
(5, 'Mới nhập về', 'MoiNhap', 0, '2019-05-01 00:00:00', '2019-05-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MaLSP` int(11) NOT NULL,
  `TenLSP` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `HinhAnh` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Mota` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLSP`, `TenLSP`, `HinhAnh`, `Mota`) VALUES
(1, 'DryFruit', '5.png', 'Products of DryFruit'),
(2, 'Vegatable', '4.png', 'Products of Vegatable'),
(3, 'Fruit', '6.png', 'Products of Fruit');

-- --------------------------------------------------------

--
-- Table structure for table `nguoidung`
--

CREATE TABLE `nguoidung` (
  `MaND` int(11) NOT NULL,
  `Ho` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `GioiTinh` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TaiKhoan` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MatKhau` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MaQuyen` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nguoidung`
--

INSERT INTO `nguoidung` (`MaND`, `Ho`, `Ten`, `GioiTinh`, `SDT`, `Email`, `DiaChi`, `TaiKhoan`, `MatKhau`, `MaQuyen`, `TrangThai`) VALUES
(1, 'Tran', 'Hoang', 'Male', '0123456789', 'th@gmail.com', 'HCM', 'Hoang016', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(2, 'Nguyen', 'Danh', 'Male', '0123456789', 'nd@gmail.com', 'HCM', 'Abc', '202cb962ac59075b964b07152d234b70', 1, 1),
(3, 'Trần', 'Hoàng', 'Male', '0102030401', 'th@gmail.com', 'HCM', 'Admin', '202cb962ac59075b964b07152d234b70', 2, 1),
(4, 'Nguyễn', 'Huệ', 'Female', '01207764668', 'nh@gmail.com', 'HCM', 'Hue', '202cb962ac59075b964b07152d234b70', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `phanquyen`
--

CREATE TABLE `phanquyen` (
  `MaQuyen` int(11) NOT NULL,
  `TenQuyen` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ChiTietQuyen` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phanquyen`
--

INSERT INTO `phanquyen` (`MaQuyen`, `TenQuyen`, `ChiTietQuyen`) VALUES
(1, 'Customer', 'Khách hàng có tài khoản'),
(2, 'Admin', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int NOT NULL,
  `MaLSP` int NOT NULL,
  `TenSP` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `DonGia` int NOT NULL,
  `SoLuong` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `HinhAnh` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `MaKM` int NOT NULL,
  `MoTa` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `TrongLuong` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoSao` int(11) NOT NULL,
  `SoDanhGia` int(11) NOT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `MaLSP`, `TenSP`, `DonGia`, `SoLuong`, `HinhAnh`, `MaKM`, `MoTa`, `TrongLuong`, `SoSao`, `SoDanhGia`, `TrangThai`) VALUES
(1, 1, 'Almond', 100000, 10, 'img/DryFruits/almond.jpg', 1, 'The almond is the edible kernel of the fruit of the sweet almond tree. It is a bright white fruit wrapped in a reddish brown cover.', '500 gram', 0, 0, 1),
(2, 1, 'Cashew', 150000, 10, 'img/DryFruits/cashew.jpg', 2, 'The cashew, known botanically as Anacardium occidentale, is the seed of a tropical evergreen shrub related to mango, pistachio and poison ivy. Commercial growers cultivate cashews in warm, humid climates across the globe.', '500 gram', 0, 0, 1),
(3, 1, 'Pistachio', 200000, 10, 'img/DryFruits/pistachio.jpg', 1, 'The pistachio tree is believed to be indigenous to Iran. It is widely cultivated from Afghanistan to the Mediterranean region and in California. The seed kernels can be eaten fresh or roasted and are commonly used in a variety of desserts, including baklava, halvah, and ice cream. They are also used for yellowish green colouring in confections. The seeds are high in protein, fat, dietary fibre, and vitamin B6.', '500 gram', 0, 0, 1),
(4, 1, 'Walnuts', 100000, 10, 'img/DryFruits/walnut.jpg', 1, 'The walnut is a type of tree nut that has a hard, tough shell. The inner meat looks sort of like a tiny brain and has a rich, sweet taste. The walnut is the most widely-consumed nut in the world and has been enjoyed for well over 8,000 years. The majority of commercial walnuts come from California and China.', '500 gram', 0, 0, 1),
(5, 2, 'Potato', 50000, 20, 'img/vegetable/potato.jpg', 2, 'The potato is a starchy food, a tuber of the plant Solanum tuberosum and is a root vegetable native to the Americas. The plant is a perennial in the nightshade family Solanaceae. Potato cultivars appear in a variety of colors, shapes, and sizes.', '1 kg', 0, 0, 1),
(6, 2, 'Carrot', 40000, 20, 'img/vegetable/carrot.jpg', 1, 'A carrot is a long, orange root vegetable. Carrots can be planted as tiny seeds and grown in a backyard garden. Carrots are a popular vegetable to eat raw on their own, or chopped and tossed in a salad. You can also cook carrots, or grate them and make a carrot cake.', '1 kg', 0, 0, 1),
(7, 2, 'Pumpkin', 70000, 20, 'img/vegetable/pumpkin.jpg', 1, 'Pumpkins are often yellowish to orange in colour, and they vary from oblate to globular to oblong; some feature a white rind. The rind is smooth and usually lightly furrowed or ribbed. The fruit stem is hard and woody, ridged, and angled.', '1 kg', 0, 0, 1),
(8, 2, 'Cabbage', 80000, 20, 'img/vegetable/cabbage.jpg', 1, 'Cabbage is a leafy vegetable with a round, compact head or "heart" made up of many layers of thick, sturdy leaves that grow in a tightly packed formation. The outer leaves are usually a darker green, while the inner leaves are lighter in color.', '1 kg', 0, 0, 1),
(9, 2, 'Bellpepper', 40000, 20, 'img/vegetable/bellpepper.jpg', 1, 'Bell peppers are the fruit of a flowering plant in the botanical family Solanaceae. They are shaped like rounded squares formed of three or four lobes, and are mostly hollow, with a bulbous placenta within along with numerous small, flat, white seeds.', '1 kg', 0, 0, 1),
(10, 2, 'Ginger', 50000, 20, 'img/vegetable/ginger.jpg', 1, 'Ginger, (Zingiber officinale), herbaceous perennial plant of the family Zingiberaceae, probably native to southeastern Asia, or its pungent aromatic rhizome (underground stem) used as a spice, flavouring, food, and medicine.', '1 kg', 0, 0, 1),
(11, 2, 'Onion', 30000, 20, 'img/vegetable/onion.jpg', 1, 'The onion is likely native to southwestern Asia but is now grown throughout the world, chiefly in the temperate zones. Onions are low in nutrients but are valued for their flavour and are used widely in cooking. They add flavour to such dishes as stews, roasts, soups, and salads and are also served as a cooked vegetable.', '1 kg', 0, 0, 1),
(12, 2, 'Tomato', 40000, 20, 'img/vegetable/tomato.jpg', 1, 'Labelled as a vegetable for nutritional purposes, tomatoes are a good source of vitamin C and the phytochemical lycopene. The fruits are commonly eaten raw in salads, served as a cooked vegetable, used as an ingredient of various prepared dishes, and pickled. Additionally, a large percentage of the world’s tomato crop is used for processing; products include canned tomatoes, tomato juice, ketchup, puree, paste, and “sun-dried” tomatoes or dehydrated pulp.', '1 kg', 0, 0, 1),
(13, 3, 'Grapes', 200000, 15, 'img/Fruits/grapes.jpg', 1, 'Grapes are fleshy, rounded fruits that grow in clusters made up of many fruits of greenish, yellowish or purple skin. The pulp is juicy and sweet, and it contain several seeds or pips. It is a well-known fruit; it is eaten raw, although it is mainly used for making wine.', '1 kg', 0, 0, 1),
(14, 3, 'Banana', 100000, 15, 'img/Fruits/banana.jpg', 1, 'The banana is a lengthy yellow fruit, found in the market in groups of three to twenty fruits, similar to a triangular cucumber, oblong and normally yellow. Its flavour is more or less sweet, depending on the variety.', '1 kg', 0, 0, 1),
(15, 3, 'Avocado', 100000, 15, 'img/Fruits/avocado.jpg', 3, 'An avocado is a bright green fruit with a large pit and dark leathery skin. They are also known as alligator pears or butter fruit. Avocados are a favorite of the produce section. They are the go-to ingredient for guacamole dips.', '1 kg', 0, 0, 1),
(16, 3, 'Mango', 200000, 15, 'img/Fruits/mango.jpg', 1, 'A mango is a sweet tropical fruit, and it is also the name of the trees on which the fruit grows. Ripe mangoes are juicy, fleshy, and delicious.', '1 kg', 0, 0, 1),
(17, 3, 'Apple', 100000, 15, 'img/Fruits/apple.jpg', 1, 'An apple is a round fruit with red or green skin and a whitish inside. One variety of apple might be sweet, another sour.', '1 kg', 0, 0, 1),
(19, 3, 'Pomegranate', 100000, 15, 'img/Fruits/pomegranate.jpg', 1, 'The juicy arils of the fruit are eaten fresh, and the juice is the source of grenadine syrup, used in flavourings and liqueurs. Pomegranate is high in dietary fibre, folic acid, vitamin C, and vitamin K.', '1 kg', 0, 0, 1),
(20, 3, 'Melon', 200000, 15, 'img/Fruits/melon.jpg', 1, 'Melons are rounded or elongate, of yellow or green rind, sometimes combined depending on the variety. It has an aromatic, juicy and sweet flesh, being an ideal fruit to fight thirst. The melon is a globose, rounded or elongate fruit, 20 to 30cm long, weighing up to 2kg.', '1 kg', 0, 0, 1),
(21, 3, 'Dragonfruit', 150000, 15, 'img/Fruits/dragonfruit.jpg', 3, 'Dragon fruit has a sweet, delicate taste that could be characterized as "tropical". It has been described as a cross between kiwi and pear, or kiwi and watermelon. The texture is somewhat creamy with little seeds, similar to that of kiwifruit.', '1 kg', 0, 0, 1),
(22, 3, 'Plum', 120000, 15, 'img/Fruits/plum.jpg', 1, 'The plum is a stone fruit, rounded or elongated that can be yellow, green, red or purple. In general, it is very nutritious and rich in vitamins, specially vitamin C. It is more or less juicy depending on its water content. Prunes or dehydrated plums are preserved for longer time and are very sweet.', '1 kg', 0, 0, 1),
(23, 1, "Giftbox", 475000, 10, 'img/DryFruits/Giftbox.png', 1, 'Cashew 500gm Almond 500gm.', '1 kg', 0, 0, 1),
(24, 3, "White jewel strawberries", 2065000, 10, 'img/Fruits/whiteStrawberrie.jpg', 1, 'The White Jewel strawberry is often deemed the most expensive strawberry commercially available. During cultivation, the fruits are limited in their exposure to sunlight, preventing the flesh from developing anthocyanin, the pigment responsible for the strawberry’s bright red hue. With this lack of light exposure and through expert breeding techniques, White Jewel strawberries have white, soft, juicy, and tender flesh with a distinct, candy-like tropical flavour similar to pineapple. Despite their fame as a luxury fruit, White Jewel strawberries are also considered rare as they are grown in limited quantities.', '1 kg', 0, 0, 1),
(25, 3, "Yubari King Melon", 4694000, 5, 'img/Fruits/YubariMelon.jpg', 1, 'The pinnacle of Japanese luxury fruit, the Yubari King melon sells for roughly $200 each. The sweet melon, which has become a status symbol, is grown exclusively in the small town of Yubari in Japan’s Hokkaido province.', '1 kg', 0, 0, 1),
(26, 3, "Ruby Roman Grapes", 2115000, 5, 'img/Fruits/ruby.jpg', 1, 'The most pronounced feature of Japanese Ruby Roman grapes is their size. Just one can be four times the size of an average grape and if they meet specific color requirements. There is no other variety in the world that is as large and red as the Ruby Roman. Also, each grape must be at least 30 millimeters in diameter and have over 18% of sugar content.', '1 kg', 0, 0, 1);
--
-- Indexes for dumped tables
--
--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaHD`, `MaSP`, `SoLuong`, `DonGia`) VALUES
(1, 16, 5, 1000000),
(1, 4, 20, 2000000);

ALTER TABLE `chitiethoadon`
  ADD KEY `MaHD` (`MaHD`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `MaKH` (`MaND`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKM`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MaLSP`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`MaND`),
  ADD KEY `MaQuyen` (`MaQuyen`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`MaQuyen`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `LoaiSP` (`MaLSP`),
  ADD KEY `MaKM` (`MaKM`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
--  choAUTO_INCREMENT bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MaKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `MaLSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `MaND` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `MaQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`),
  ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaND`) REFERENCES `nguoidung` (`MaND`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`MaQuyen`) REFERENCES `phanquyen` (`MaQuyen`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaLSP`) REFERENCES `loaisanpham` (`MaLSP`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`MaKM`) REFERENCES `khuyenmai` (`MaKM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;