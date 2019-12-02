-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 02, 2019 lúc 03:13 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `data`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exam`
--

CREATE TABLE `exam` (
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `exam_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exam_describe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `exam`
--

INSERT INTO `exam` (`exam_id`, `exam_name`, `exam_describe`, `id`, `created_at`, `updated_at`) VALUES
(5, 'Trắc nghiệm Lịch Sử 6', 'Sơ lược về môn lịch sử', 2, '2019-11-30 17:00:00', NULL),
(6, 'Trắc nghiệm Lịch Sử 6', 'Cách tính thời gian trong lịch sử', 4, '2019-12-01 03:17:13', NULL),
(7, 'Trắc nghiệm Vật Lí 7', 'Nguồn sáng - Vật sáng - Định luật truyền thẳng - Định luật phản xạ ánh sáng', 4, '2019-12-01 03:27:19', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Cấu trúc bảng cho bảng `quest`
--

CREATE TABLE `quest` (
  `quest_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rightAnswer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quest`
--

INSERT INTO `quest` (`quest_id`, `exam_id`, `question`, `answer`, `rightAnswer`) VALUES
(9, 5, 'Yếu tố quan trọng của một sự kiện lịch sử là gì?', 'Không gian***Thời gian và không gian***Thời gian***Kết quả của sự kiện', 'B'),
(10, 5, 'Lịch sử loài người mà chúng ta nghiên cứu, học tập có nội dung gì?', 'Là quá khứ của loài người***Là toàn bộ hoạt động của loài người từ khi xuất hiện đến nay***Là những gì đã xảy ra và đang xảy ra của loài người***Là những gì xảy ra và sẽ xảy ra của loài người  Hiển thị đáp án', 'B'),
(11, 5, 'Ai là chủ thể sáng tạo ra lịch sử?', 'Con người***Thượng đế***Vạn vật***Chúa trời', 'A'),
(12, 6, 'Một thế kỉ có bao nhiêu năm?', '100***1000***10***200', 'A'),
(13, 6, 'Người xưa đã tính thời gian như thế nào?', 'Dựa vào sự lên xuống của thủy triều***Dựa vào đường chim bay***Dựa vào thời gian mọc, lặn, di chuyển của Mặt Trời và Mặt Trăng***Dựa vào quan sát các sao trên trời', 'C'),
(14, 7, 'Em hãy nhận ra câu sai trong những câu sau:', 'Ta nhìn thấy một vật khi có ánh sáng truyền từ vật đó đến mắt ta***Ta nhận biết được ánh sáng khi có ánh sáng truyền vào mắt ta***Nguồn sáng là vật tự nó phát ra ánh sáng***Vật sáng cũng là nguồn sáng', 'D'),
(15, 7, 'Vì sao ta nhìn thấy một vật?', 'Vì ta mở mắt hướng về phía vật***Vì mắt ta phát ra các tia sáng chiếu lên vật***Vì có ánh sáng từ vật truyền vào mắt ta***Vì vật được chiếu sáng', 'C'),
(16, 7, 'Chọn phát biểu sai', 'Nguồn sáng là vật tự phát ánh sáng hoặc là vật được chiếu sáng***Vật được chiếu sáng gọi là vật sáng***Vật sáng bao gồm cả nguồn sáng và vật được chiếu sáng***B và C đều đúng', 'A');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'asimo', 'asimo@gmail.com', NULL, '$2y$10$pPL/kQ5dxZxOpSIARwM4reUiDMcxIwG17u8pJCFdQy8BikDQd6dV6', 'o2cYeudo3dVfp6LeLscJ6f4wQhmTdPt6yU0GvBzTdQf02oz4p83XkjdM9yrF', '2019-11-12 19:42:49', '2019-11-12 19:42:49'),
(3, 'user', 'user@gmail.com', NULL, '$2y$10$gLmxHi7qUXrvrlwoglWmE.Bqv9QnvwmVY3fV9jIMwube3oahV6Juy', NULL, '2019-11-14 09:00:31', '2019-11-14 09:00:31'),
(4, 'test', 'test@gmail.com', NULL, '$2y$10$DFUmUV4p2nHgmewMqyQ2iuPSVIuktA9sBXuWMetuboCZNYQPp.Jvq', NULL, '2019-11-21 06:01:20', '2019-11-21 06:01:20');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `quest`
--
ALTER TABLE `quest`
  ADD PRIMARY KEY (`quest_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `quest`
--
ALTER TABLE `quest`
  MODIFY `quest_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
