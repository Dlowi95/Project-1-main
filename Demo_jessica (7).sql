-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th7 04, 2024 lúc 06:50 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `Demo_jessica`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `soluong` int(11) NOT NULL,
  `price` double NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `name`, `img`, `soluong`, `price`, `email`, `status`) VALUES
(10, 'Sữa tắm', 'uploads/images/product/product-2.jpg', 1, 15, 'loisadnhan@gmail.com', 1),
(17, 'Kem nền Dlow', 'uploads/images/product/product-14.jpg', 1, 20, 'loisadnhan@gmail.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalog`
--

CREATE TABLE `catalog` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `img` varchar(100) DEFAULT NULL,
  `sx` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `img`, `sx`) VALUES
(18, 'Son môi', NULL, 5),
(19, 'Dưỡng da', NULL, 0),
(20, 'Cọ', NULL, 0),
(21, 'Nước hoa', NULL, 0),
(24, 'Gel', NULL, 0),
(28, 'Kem nền', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `order_date`, `payment_method`, `total_price`) VALUES
(1, 'Võ Hoàng Đại Lợi', '2024-07-04', 'Check Payment', 35.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `quantity`, `price`) VALUES
(1, 1, 17, 'Kem nền Dlow', 1, 20.00),
(2, 1, 10, 'Sữa tắm', 1, 15.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(5) NOT NULL,
  `idcatalog` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `price2` double(10,2) DEFAULT 0.00,
  `img` varchar(100) DEFAULT NULL,
  `mota` varchar(255) DEFAULT NULL,
  `chitiet` text DEFAULT NULL,
  `new` tinyint(1) DEFAULT 0,
  `promotion` int(3) DEFAULT 0,
  `view` int(6) DEFAULT 0,
  `product_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `idcatalog`, `name`, `price`, `price2`, `img`, `mota`, `chitiet`, `new`, `promotion`, `view`, `product_code`) VALUES
(9, 18, 'Son dưỡng', 10.00, 0.00, 'product-1.jpg', 'đẹp vcl', 'tại vì sao cảm xúc kia quay về', 0, 0, 0, '1'),
(10, 19, 'Sữa tắm', 15.00, 0.00, 'product-2.jpg', 'thơm mịn da', NULL, 1, 10, 0, '2'),
(11, 20, 'Cọ phấn', 5.00, 0.00, 'product-3.jpg', 'thơm', NULL, 1, 0, 0, '3'),
(12, 21, 'Nước hoa Dlowww', 75.00, 0.00, 'product-6.jpg', 'hương dịu , thơm', NULL, 0, 50, 0, '4'),
(16, 24, 'Gel rửa mặt trị mụn ', 100.00, 0.00, 'product-9.jpg', 'mịn da thông thoáng', 'thật sự vì nàng xóa tan đi buồn đau cạnh em đã muôn màu, xóa tan đi u sầu nụ cười ta có nhau', 0, 0, 0, '5'),
(17, 28, 'Kem nền Dlow', 20.00, 0.00, 'product-14.jpg', 'mịn da trong trẻo vcl', NULL, 0, 10, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `user` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(1) NOT NULL DEFAULT '0',
  `reset_token` varchar(255) DEFAULT NULL,
  `creat_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `pass2` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `img` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 0,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `status`, `reset_token`, `creat_at`, `pass2`, `phone`, `img`, `role`, `email`, `address`) VALUES
(15, 'admin', '123', '0', NULL, '2024-06-14 05:22:32', '0905', NULL, NULL, 1, 'loideptrai@gmail.com', NULL),
(20, 'Võ Hoàng Đại Lợi', '$2y$10$3dvbaktT5Ud2vyT6wbDPqOqLiddW3ExCrI./gURs.A6YrtJZHB7jG', '1', NULL, '2024-06-19 03:43:06', NULL, '0399379268', NULL, 0, 'loisadnhan@gmail.com', 'cmm'),
(21, 'loile', '$2y$10$lhy1Pqei9p/KOvQM5m6pGeVHvnnOc7nmbSkIKOZgzti0Oo10ocS.y', '1', NULL, '2024-06-21 14:27:55', NULL, NULL, NULL, 0, 'code11toi@gmail.com', NULL),
(22, 'Lợi đẹp trai', '$2y$10$V2nyDVIyGlew4JWOVDaziu4SqApXkuDsbR765Ncs1qCoDRPpKbk9K', '1', NULL, '2024-06-25 03:52:02', NULL, '0336066639', NULL, 0, 'dailoivo23@gmail.com', '257D, Ngô Quyền, xã Bàu Trâm ,  TP.Long Khánh'),
(25, 'Anh Thi', '$2y$10$1yg/QqxNNgw14N7PjEF.Hud9.JcBLORlGnf.wXOUZfSn341WOqZii', '1', NULL, '2024-07-04 03:21:27', NULL, '011198567', NULL, 0, 'code21toi@gmail.com', 'Vũng Tàu');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_catalog` (`idcatalog`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_catalog` FOREIGN KEY (`idcatalog`) REFERENCES `catalog` (`id`);

--
-- Các ràng buộc cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
