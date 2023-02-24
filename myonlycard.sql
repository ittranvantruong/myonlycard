-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 24, 2023 lúc 09:33 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `myonlycard`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abbreviation_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banks`
--

INSERT INTO `banks` (`id`, `name`, `abbreviation_name`, `logo`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Ngân hàng TMCP Ngoại Thương', 'VCB', '/public/assets/images/bank/vietcombank.png', 1, NULL, NULL),
(2, 'Ngân hàng công thương Việt Nam', 'Vietinbank', '/public/assets/images/bank/vietinbank.png', 2, NULL, NULL),
(3, 'Ngân hàng Kỹ thương Việt Nam', 'TCB', '/public/assets/images/bank/techcombank.png', 3, NULL, NULL),
(4, 'Ngân hàng Tiên Phong', 'Tpbank', '/public/assets/images/bank/tpbank.png', 4, NULL, NULL),
(5, 'Ngân hàng An Bình', 'Abbank', '/public/assets/images/bank/abbank.png', 5, NULL, NULL),
(6, 'Ngân hàng Á Châu', 'ACB', '/public/assets/images/bank/acb.png', 6, NULL, NULL),
(7, 'Ngân hàng đầu tư và phát triển Việt Nam', 'BIDV', '/public/assets/images/bank/bidv.png', 7, NULL, NULL),
(8, 'Ngân hàng xuất nhập khẩu Việt Nam', 'Eximbank', '/public/assets/images/bank/eximbank.png', 8, NULL, NULL),
(9, 'Ngân hàng phát triển TP HCM', 'HDBank', '/public/assets/images/bank/hdbank.png', 9, NULL, NULL),
(10, 'Ngân hàng quân đội', 'MB', '/public/assets/images/bank/mbbank.png', 10, NULL, NULL),
(11, 'Ngân hàng hàng hải Việt Nam', 'MSB', '/public/assets/images/bank/msb.png', 11, NULL, NULL),
(12, 'Ngân hàng Phương Đông', 'OCB', '/public/assets/images/bank/ocb.png', 12, NULL, NULL),
(13, 'Ngân hàng Sài Gòn Thương Tín', 'Sacombank', '/public/assets/images/bank/sacombank.png', 13, NULL, NULL),
(14, 'Ngân hàng Sài Gòn - Hà Nội', 'SHB', '/public/assets/images/bank/shb.png', 14, NULL, NULL),
(15, 'Ngân hàng quốc tế', 'VIB', '/public/assets/images/bank/vib.png', 15, NULL, NULL),
(16, 'Ngân hàng TMCP Việt Nam thịnh vượng', 'VPBank', '/public/assets/images/bank/vpbank.png', 16, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `social_network_id` bigint(20) UNSIGNED NOT NULL,
  `plain_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_17_025447_create_social_network_table', 1),
(6, '2023_02_18_180616_create_links_table', 1),
(7, '2023_02_20_221048_create_personalize_table', 1),
(8, '2023_02_22_154831_create_banks_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personalize`
--

CREATE TABLE `personalize` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `background_color` char(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#FFFFFF',
  `background_image_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_color` char(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#000000',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `personalize`
--

INSERT INTO `personalize` (`id`, `user_id`, `background_color`, `background_image_url`, `name_color`, `created_at`, `updated_at`) VALUES
(1, 1, '#FFFFFF', NULL, '#000000', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_network`
--

CREATE TABLE `social_network` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefix_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `social_network`
--

INSERT INTO `social_network` (`id`, `type`, `name`, `logo`, `prefix_link`, `position`, `created_at`, `updated_at`) VALUES
(1, 1, 'Số điện thoại', '/public/assets/images/socials/phone.png', 'tel:', 1, NULL, NULL),
(2, 1, 'Email', '/public/assets/images/socials/gmail.png', 'mailto:', 2, NULL, NULL),
(3, 4, 'Văn bản', '/public/assets/images/socials/text.png', NULL, 3, NULL, NULL),
(4, 1, 'Facebook', '/public/assets/images/socials/facebook.png', NULL, 4, NULL, NULL),
(5, 1, 'Instagram', '/public/assets/images/socials/instagram.png', NULL, 5, NULL, NULL),
(6, 1, 'Twitter', '/public/assets/images/socials/twitter.png', NULL, 6, NULL, NULL),
(7, 1, 'Pinterest', '/public/assets/images/socials/pinterest.png', NULL, 7, NULL, NULL),
(8, 1, 'Wechat', '/public/assets/images/socials/wechat.png', NULL, 8, NULL, NULL),
(9, 1, 'Whatapp', '/public/assets/images/socials/whats-app.png', 'https://wa.me/', 9, NULL, NULL),
(10, 1, 'Tiktok', '/public/assets/images/socials/tik-tok.png', NULL, 10, NULL, NULL),
(11, 1, 'Youtube', '/public/assets/images/socials/youtube.png', NULL, 11, NULL, NULL),
(12, 1, 'Tinder', '/public/assets/images/socials/tinder.png', NULL, 12, NULL, NULL),
(13, 1, 'Momo', '/public/assets/images/socials/momo.png', 'https://nhantien.momo.vn/', 13, NULL, NULL),
(14, 1, 'Zalopay', '/public/assets/images/socials/zalopay.png', NULL, 14, NULL, NULL),
(15, 1, 'Zalo', '/public/assets/images/socials/zalo.png', 'https://zalo.me/', 15, NULL, NULL),
(16, 1, 'Viber', '/public/assets/images/socials/viber.png', 'viber://add?number=', 16, NULL, NULL),
(17, 1, 'Skype', '/public/assets/images/socials/skype.png', NULL, 17, NULL, NULL),
(18, 1, 'Shopee', '/public/assets/images/socials/shopee.png', NULL, 18, NULL, NULL),
(19, 1, 'Lazada', '/public/assets/images/socials/lazada.png', NULL, 19, NULL, NULL),
(20, 1, 'Spotify', '/public/assets/images/socials/spotify.png', NULL, 20, NULL, NULL),
(21, 1, 'Snapchat', '/public/assets/images/socials/snapchat.png', NULL, 21, NULL, NULL),
(22, 1, 'Telegram', '/public/assets/images/socials/telegram.png', 'https://t.me/', 22, NULL, NULL),
(23, 2, 'Đường link khác', '/public/assets/images/socials/link.png', NULL, 23, NULL, NULL),
(24, 3, 'Tài khoản ngân hàng', '/public/assets/images/socials/bank.png', NULL, 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_card` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT 1,
  `roles` tinyint(4) NOT NULL,
  `token_get_password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `code_card`, `slug`, `fullname`, `email`, `avatar`, `description`, `email_verified_at`, `password`, `status`, `publish`, `roles`, `token_get_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin1677227562', '1677227562', 'Admin', 'admin@gmail.com', NULL, NULL, NULL, '$2y$10$M/JUyAIn236EIK7jJXMzJueNxKPIAPm7byDzZq4oEVHGROZriehk6', 1, 1, 2, NULL, NULL, '2023-02-24 08:32:42', '2023-02-24 08:32:42');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `links_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personalize`
--
ALTER TABLE `personalize`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personalize_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `social_network`
--
ALTER TABLE `social_network`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_slug_unique` (`slug`),
  ADD UNIQUE KEY `users_code_card_unique` (`code_card`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `personalize`
--
ALTER TABLE `personalize`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `social_network`
--
ALTER TABLE `social_network`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `links`
--
ALTER TABLE `links`
  ADD CONSTRAINT `links_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `personalize`
--
ALTER TABLE `personalize`
  ADD CONSTRAINT `personalize_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
