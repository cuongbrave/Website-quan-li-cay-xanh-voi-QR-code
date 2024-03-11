-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2023 lúc 06:38 AM
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
-- Cơ sở dữ liệu: `dbcx`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cayxanh`
--

CREATE TABLE `cayxanh` (
  `cayxanh_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `grow_time` date NOT NULL,
  `grower` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `chitiet_cayxanh` varchar(300) NOT NULL,
  `danhmuc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cayxanh`
--

INSERT INTO `cayxanh` (`cayxanh_id`, `name`, `location`, `grow_time`, `grower`, `img`, `chitiet_cayxanh`, `danhmuc_id`) VALUES
(18, 'Cẩm Lai', 'Bên trái hội trường rùa', '2021-05-08', 'Thủ tướng Phạm Minh Chính', './upload/CamLai_PhamMinhChinh.jpg', 'Cây Cẩm Lai, còn được gọi là Dalbergia cochinchinensis, là một loại cây gỗ quý hiếm thuộc họ Đậu (Fabaceae). Đây là loại cây gỗ cứng có giá trị cao về mặt thương mại và được sử dụng rộng rãi trong ngành công nghiệp đồ gỗ, đặc biệt là trong sản xuất đồ nội thất và đồ trang sức cao cấp.', 1),
(19, 'Cẩm Lai', 'bên trái Hội Trường rùa', '2016-05-07', 'Chủ tịch quốc hội Nguyễn Thị Kim Ngân', './upload/Cẩm Lai_ Nguyễn Thị Kim Ngân.jpg', 'Cây Cẩm Lai, còn được gọi là Dalbergia cochinchinensis, là một loại cây gỗ quý hiếm thuộc họ Đậu (Fabaceae). Đây là loại cây gỗ cứng có giá trị cao về mặt thương mại và được sử dụng rộng rãi trong ngành công nghiệp đồ gỗ, đặc biệt là trong sản xuất đồ nội thất và đồ trang sức cao cấp.', 1),
(20, 'Cây Sưa', 'Bên trái hội trường rùa', '2016-08-10', 'thủ tướng Nguyễn Xuân Phúc', './upload/Sưa_ Nguyễn Xuân Phúc.jpg', 'Cây Sưa là một loại cây thân gỗ thuộc họ Simaroubaceae và có tên khoa học là Dalbergia tonkinensis. Đây là loài cây phổ biến ở khu vực Đông Nam Á, đặc biệt là ở Việt Nam. Cây sưa có thể cao từ 10-25 mét, với thân cây có đường kính lớn và thường có vẻ mạnh mẽ, cứng cáp.', 1),
(21, 'Giáng Hương', 'Bên Trái hội trường rùa', '2012-03-20', 'Thủ tướng Nguyễn Tấn Dũng', './upload/Giáng Hương_Nguyễn Tấn Dũng.jpg', 'Cây Giáng Hương còn được gọi là cây đinh hương, cây dáng hương,... có nguồn gốc từ Ấn Độ và được du nhập sang các nước Đông Nam Á. Đây là một loài cây thân gỗ thuộc họ Đậu (Fabaceae), có tên khoa học là Pterocarpus macrocarpus.', 1),
(22, 'Lim', 'Bên trái hội trường rùa', '2017-02-06', 'Bộ trưởng bộ GD & ĐT Phùng Xuân Nhạ', './upload/Lim_Phùng Xuân Nhạ.jpg', 'Cây Lim, hay còn gọi là Lim xanh (scientific name: Citrus aurantiifolia), là loại cây thuộc họ Cam (Rutaceae) và được trồng rộng rãi ở nhiều nơi trên thế giới, bao gồm cả Việt Nam. Đây là một loại cây thân gỗ, thường có chiều cao từ 2 đến 5 mét. ', 1),
(23, 'Sưa', 'Bên trái hội trường rùa', '2016-03-31', 'Phó thủ tướng Vũ Đức Đam', './upload/Sưa_Vũ Đức Đam.jpg', 'Cây Sưa là một loại cây thân gỗ thuộc họ Simaroubaceae và có tên khoa học là Dalbergia tonkinensis. Đây là loài cây phổ biến ở khu vực Đông Nam Á, đặc biệt là ở Việt Nam. Cây sưa có thể cao từ 10-25 mét, với thân cây có đường kính lớn và thường có vẻ mạnh mẽ, cứng cáp.', 1),
(24, 'Cẩm Lai', 'Bên trái hội trường rùa', '2018-05-19', 'Chủ tịch UBND Thành phố Cần Thơ Võ Thành Thống', './upload/Cẩm Lai _Võ Thành Thống.jpg', 'Cây Cẩm Lai, còn được gọi là Dalbergia cochinchinensis, là một loại cây gỗ quý hiếm thuộc họ Đậu (Fabaceae). Đây là loại cây gỗ cứng có giá trị cao về mặt thương mại và được sử dụng rộng rãi trong ngành công nghiệp đồ gỗ, đặc biệt là trong sản xuất đồ nội thất và đồ trang sức cao cấp.', 1),
(25, 'Cẩm Lai', 'Bên phải hội trường rùa', '2018-05-19', 'Bí thư thành ủy TPCT Trần Quốc Trung', './upload/Cẩm Lai _Trần Quốc Trung.jpg', 'Cây Cẩm Lai, còn được gọi là Dalbergia cochinchinensis, là một loại cây gỗ quý hiếm thuộc họ Đậu (Fabaceae). Đây là loại cây gỗ cứng có giá trị cao về mặt thương mại và được sử dụng rộng rãi trong ngành công nghiệp đồ gỗ, đặc biệt là trong sản xuất đồ nội thất và đồ trang sức cao cấp.', 1),
(26, 'Cẩm Lai', 'Bên phải hội trường rùa', '2018-05-19', 'Bí thư BCHTU Đảng CSVN, chủ tịch UBTU MTTQ VN Trần Thanh Mẫn', './upload/Cẩm Lai_Trần Thanh Mẫn.jpg', 'Cây Cẩm Lai, còn được gọi là Dalbergia cochinchinensis, là một loại cây gỗ quý hiếm thuộc họ Đậu (Fabaceae). Đây là loại cây gỗ cứng có giá trị cao về mặt thương mại và được sử dụng rộng rãi trong ngành công nghiệp đồ gỗ, đặc biệt là trong sản xuất đồ nội thất và đồ trang sức cao cấp.', 1),
(27, 'Giáng Hương', 'Bên phải hội trường rùa', '2023-04-23', 'Bí thư TW Đảng, Chủ tịch UBTW MTTQ VN Đỗ Văn chiến', './upload/Giáng hương_ Đỗ Văn Chiến.jpg', 'Cây Giáng Hương còn được gọi là cây đinh hương, cây dáng hương,... có nguồn gốc từ Ấn Độ và được du nhập sang các nước Đông Nam Á. Đây là một loài cây thân gỗ thuộc họ Đậu (Fabaceae), có tên khoa học là Pterocarpus macrocarpus.', 1),
(28, 'Giáng Hương', 'Bên phải hội trường rùa', '2023-04-23', 'Ủy viên BCHTW Đảng, bí thư thành ủy TPCT Lê Quang Mạnh', './upload/Giáng Hương_ lê Quang Mạnh.jpg', 'Cây Giáng Hương còn được gọi là cây đinh hương, cây dáng hương,... có nguồn gốc từ Ấn Độ và được du nhập sang các nước Đông Nam Á. Đây là một loài cây thân gỗ thuộc họ Đậu (Fabaceae), có tên khoa học là Pterocarpus macrocarpus.', 1),
(29, 'Sưa', 'Bên trái hội trường rùa', '2023-04-23', 'Chủ tịch nước Võ Văn Thưởng', './upload/Sưa_Võ Văn thưởng.jpg', 'Cây Sưa là một loại cây thân gỗ thuộc họ Simaroubaceae và có tên khoa học là Dalbergia tonkinensis. Đây là loài cây phổ biến ở khu vực Đông Nam Á, đặc biệt là ở Việt Nam. Cây sưa có thể cao từ 10-25 mét, với thân cây có đường kính lớn và thường có vẻ mạnh mẽ, cứng cáp.', 1),
(38, 'Cây cỏ Đậu Phộng', 'Trường CNTT & TT ', '2015-10-16', 'Trường CNTT & TT ', './upload/CoDauPhong.jpg', 'Cỏ đậu phộng (Arachis pintoi) thuộc cây họ Đậu Fabaceae, hay còn gọi là cỏ lạc dại, cỏ đậu, cỏ đậu hoa vàng, lạc tiên…, có nguồn gốc từ Nam Mỹ, trồng phổ biến tại Việt Nam.', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc_cayxanh`
--

CREATE TABLE `danhmuc_cayxanh` (
  `danhmuc_id` int(11) NOT NULL,
  `loai` varchar(100) NOT NULL,
  `chitiet` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc_cayxanh`
--

INSERT INTO `danhmuc_cayxanh` (`danhmuc_id`, `loai`, `chitiet`) VALUES
(1, 'Cây thân gỗ', 'Cây thân gỗ có thân chắc chắn, hệ thống rễ mạnh mẽ và vỏ bảo vệ. Chúng phát triển thành cành và cây con, cung cấp nguồn gỗ và không gian sống cho sinh vật. Cây thân gỗ có khu vực phân bố rộng khắp trên toàn thế giới, từ vùng cận cực đến vùng nhiệt đới. Chúng thích ứng với nhiều loại đất và khí hậu.'),
(2, 'Cây leo', 'Cây leo không có thân gỗ cứng, thay vào đó chúng có thân mềm và linh hoạt. Cây leo  thường có thân dẻo, mềm, không có khả năng tự đứng thẳng mà phải bám vào các cấu trúc khác như cây, tường, hàng rào, hay các cấu trúc khác để trèo lên.'),
(3, 'Cây thuỷ sinh', 'Cây thủy sinh: Đây là các cây phát triển trong môi trường nước, có thể sống trong nước ngọt hoặc nước mặn. Ví dụ: cây cỏ nước, cây rong biển, cây cỏ lụa.'),
(4, 'Cây hoa', 'Đây là các cây được trồng chủ yếu vì hoa đẹp và mùi hương thơm. Ví dụ: hoa hồng, hoa phong lan, hoa cúc.'),
(7, 'Cây cỏ', 'Cây cỏ thường có thân mềm, linh hoạt và không có thân gỗ. Chúng thường phát triển thành bụi hoặc cỏ cây. Ví dụ: cỏ Bermuda, cỏ cỏ, cỏ lúa mì.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`) VALUES
(1, 'admin', 'pass'),
(16, 'B2013507', 'B2013507'),
(19, 'B2004772', 'B2004772');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cayxanh`
--
ALTER TABLE `cayxanh`
  ADD PRIMARY KEY (`cayxanh_id`),
  ADD KEY `fk_cayxanh&danhmuc` (`danhmuc_id`);

--
-- Chỉ mục cho bảng `danhmuc_cayxanh`
--
ALTER TABLE `danhmuc_cayxanh`
  ADD PRIMARY KEY (`danhmuc_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cayxanh`
--
ALTER TABLE `cayxanh`
  MODIFY `cayxanh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `danhmuc_cayxanh`
--
ALTER TABLE `danhmuc_cayxanh`
  MODIFY `danhmuc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cayxanh`
--
ALTER TABLE `cayxanh`
  ADD CONSTRAINT `fk_cayxanh&danhmuc` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc_cayxanh` (`danhmuc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
