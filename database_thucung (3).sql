-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 10, 2021 lúc 01:59 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `database_thucung`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL COMMENT 'id category',
  `name_category` varchar(150) NOT NULL COMMENT 'tên loại',
  `id_nav` int(11) NOT NULL,
  `slug` varchar(150) DEFAULT NULL COMMENT 'slug',
  `hidden` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'ẩn hiện'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name_category`, `id_nav`, `slug`, `hidden`) VALUES
(1, 'Chó Pug', 1, 'Cho-pug', 1),
(2, 'Chó Poodle', 1, 'cho-poodle', 1),
(3, 'Chó husky', 1, 'cho-husky', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `information_post`
--

CREATE TABLE `information_post` (
  `id` int(11) NOT NULL COMMENT 'id bài post',
  `type_post` int(11) DEFAULT NULL COMMENT 'tin đăng',
  `title` varchar(100) NOT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `id_menu` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `age` varchar(150) DEFAULT NULL COMMENT 'giới tính',
  `status` varchar(150) DEFAULT NULL COMMENT 'tình trạng sức khỏe',
  `render` varchar(150) DEFAULT NULL COMMENT 'tuổi',
  `price` int(11) NOT NULL COMMENT 'giá',
  `discount` int(100) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` varchar(250) NOT NULL COMMENT 'mô tả',
  `time` int(11) NOT NULL COMMENT 'thời gian đăng bài',
  `image` varchar(250) NOT NULL COMMENT 'hình thú',
  `brand` varchar(150) DEFAULT NULL,
  `view` int(11) NOT NULL COMMENT 'lượt xem',
  `id_user` int(11) NOT NULL COMMENT 'người đăng',
  `id_trang_thai` int(11) NOT NULL,
  `hidden` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'ẩn hiện'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `information_post`
--

INSERT INTO `information_post` (`id`, `type_post`, `title`, `slug`, `id_menu`, `id_category`, `age`, `status`, `render`, `price`, `discount`, `quantity`, `description`, `time`, `image`, `brand`, `view`, `id_user`, `id_trang_thai`, `hidden`) VALUES
(1, 2, 'bán chó pug', 'ban-cho-pug', 1, 1, '11 tháng', 'khỏe mạnh', 'giống đực', 1100000, 1000000, 0, 'sản phẩm uy tín chất lượng cao', 2, '123', NULL, 123, 1, 2, 1),
(2, 2, 'bán chó poodle', 'ban-cho-poodle', 1, 2, '11 tháng', 'khỏe mạnh', 'giống đực', 1200000, NULL, 0, 'sản phẩm uy tín chất lượng cao', 2, '123', NULL, 123, 1, 1, 1),
(3, 1, 'bán sản phẩm thực phẩm chức năng cho chó', 'ban-san-pham-thu-pham-chuc-nang-cho-cho', 1, 1, NULL, 'còn hạn sử dụng', NULL, 100000, 90000, 50, 'sản phẩm chất lượng tốt', 2, '1', 'made in việt nam', 123, 2, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nav_menu`
--

CREATE TABLE `nav_menu` (
  `id` int(11) NOT NULL,
  `name_nav` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `hidden` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `nav_menu`
--

INSERT INTO `nav_menu` (`id`, `name_nav`, `slug`, `hidden`) VALUES
(1, 'Chó', 'cho', 1),
(3, 'Cá Cảnh', 'ca-canh', 0),
(4, 'Chim cảnh', 'chim-canh', 1),
(5, 'Thú cưng khác', 'thu-cung-khac', 1),
(6, 'Mèo', 'meo', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name_post` int(11) NOT NULL,
  `slug` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `hidden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_huyen`
--

CREATE TABLE `quan_huyen` (
  `id` int(11) NOT NULL,
  `matp` int(11) NOT NULL,
  `name_quanhuyen` varchar(150) NOT NULL,
  `type` int(11) NOT NULL,
  `hidden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `type_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `name_shop` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `description` text NOT NULL,
  `time` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `hidden` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `hidden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh_thanhpho`
--

CREATE TABLE `tinh_thanhpho` (
  `matp` int(11) NOT NULL,
  `name_thanhpho` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `hidden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trang_thai`
--

CREATE TABLE `trang_thai` (
  `id` int(11) NOT NULL,
  `name_type` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `hidden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `trang_thai`
--

INSERT INTO `trang_thai` (`id`, `name_type`, `slug`, `hidden`) VALUES
(1, 'Thành công', 'thanh-cong', 1),
(2, 'Chưa xét duyệt', 'chua-xet-duyet', 1),
(3, 'Đã hủy', 'da-huy', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_post`
--

CREATE TABLE `type_post` (
  `id` int(11) NOT NULL,
  `name_type` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `hidden` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `type_post`
--

INSERT INTO `type_post` (`id`, `name_type`, `slug`, `hidden`) VALUES
(1, 'Đăng bán sản phẩm', 'dang-ban-san-pham', 1),
(2, 'Đăng bán thú cưng', 'dang-ban-thu-cung', 1),
(3, 'Đăng tin phối giống', 'dang-tin-phoi-giong', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xaphuong_thitran`
--

CREATE TABLE `xaphuong_thitran` (
  `id` int(11) NOT NULL,
  `maqh` int(11) NOT NULL,
  `name_xaphuong` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `hidden` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nav` (`id_nav`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `information_post`
--
ALTER TABLE `information_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_menu` (`id_menu`,`id_category`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_typepost` (`type_post`),
  ADD KEY `id_trangthai` (`id_trang_thai`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nav_menu`
--
ALTER TABLE `nav_menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `quan_huyen`
--
ALTER TABLE `quan_huyen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matp` (`matp`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tinh_thanhpho`
--
ALTER TABLE `tinh_thanhpho`
  ADD PRIMARY KEY (`matp`);

--
-- Chỉ mục cho bảng `trang_thai`
--
ALTER TABLE `trang_thai`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_post`
--
ALTER TABLE `type_post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `role` (`id_role`);

--
-- Chỉ mục cho bảng `xaphuong_thitran`
--
ALTER TABLE `xaphuong_thitran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maqh` (`maqh`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id category', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `information_post`
--
ALTER TABLE `information_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id bài post', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nav_menu`
--
ALTER TABLE `nav_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `quan_huyen`
--
ALTER TABLE `quan_huyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tinh_thanhpho`
--
ALTER TABLE `tinh_thanhpho`
  MODIFY `matp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `trang_thai`
--
ALTER TABLE `trang_thai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `type_post`
--
ALTER TABLE `type_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `xaphuong_thitran`
--
ALTER TABLE `xaphuong_thitran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`id_nav`) REFERENCES `nav_menu` (`id`);

--
-- Các ràng buộc cho bảng `information_post`
--
ALTER TABLE `information_post`
  ADD CONSTRAINT `information_post_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `information_post_ibfk_2` FOREIGN KEY (`id_menu`) REFERENCES `nav_menu` (`id`),
  ADD CONSTRAINT `information_post_ibfk_3` FOREIGN KEY (`type_post`) REFERENCES `type_post` (`id`),
  ADD CONSTRAINT `information_post_ibfk_4` FOREIGN KEY (`id_trang_thai`) REFERENCES `trang_thai` (`id`);

--
-- Các ràng buộc cho bảng `quan_huyen`
--
ALTER TABLE `quan_huyen`
  ADD CONSTRAINT `quan_huyen_ibfk_1` FOREIGN KEY (`matp`) REFERENCES `tinh_thanhpho` (`matp`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`);

--
-- Các ràng buộc cho bảng `xaphuong_thitran`
--
ALTER TABLE `xaphuong_thitran`
  ADD CONSTRAINT `xaphuong_thitran_ibfk_1` FOREIGN KEY (`maqh`) REFERENCES `quan_huyen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
