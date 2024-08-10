-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th8 10, 2024 lúc 03:48 PM
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
-- Cơ sở dữ liệu: `store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `ghichu` varchar(255) DEFAULT NULL,
  `hide` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `img`, `ghichu`, `hide`, `created_at`, `updated_at`) VALUES
(2, 'uploads/1721655435.jpg', 'banner phụ', '1', '2024-07-22 06:04:37', '2024-08-08 00:21:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `img` varchar(255) NOT NULL DEFAULT '0',
  `size` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `home` tinyint(4) NOT NULL DEFAULT 0,
  `img` varchar(255) DEFAULT NULL,
  `ghichu` varchar(255) DEFAULT NULL,
  `hidden` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `home`, `img`, `ghichu`, `hidden`, `created_at`, `updated_at`) VALUES
(12, 'Giày thể thao Nữ', 2, 'uploads/1721824171.jpeg', 'tổng hợp tất cả loại giày nam và nữ năm 2024', 0, '2024-07-24 03:59:01', '2024-07-24 05:29:31'),
(13, 'Giày đi chơi', 3, 'uploads/1721824210.jpeg', 'tổng hợp tất cả loại giày đi chơi  năm 2024', 0, '2024-07-24 03:59:46', '2024-07-24 05:30:10'),
(14, 'Phụ kiện giày', 4, 'uploads/1721824196.webp', 'tổng hợp tất cả loại phụ kiện giày nam và nữ năm 2024', 0, '2024-07-24 04:00:04', '2024-07-24 05:29:56'),
(15, 'Giày đi làm', 0, 'uploads/1721823908.jpeg', 'tổng hợp tất cả loại giày nam và nữ đi làm năm 2024', 1, '2024-07-24 04:00:33', '2024-07-24 04:18:31'),
(16, 'Giày Thể Thao Nam', 1, 'uploads/1721824181.jpeg', 'tổng hợp tất cả loại giày nam và nữ năm 2024', 0, '2024-07-24 05:25:08', '2024-07-24 05:29:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `hiden` int(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `rating`, `comment`, `hiden`, `created_at`, `updated_at`) VALUES
(2, 23, 27, 5, 'quá tuyệt luôn cửa hàng ơi', 1, '2024-08-08 05:33:45', '2024-08-08 05:33:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(19, 22, 27, '2024-07-24 21:56:03', '2024-07-24 21:56:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_05_22_081548_create_categories_table', 1),
(3, '2024_05_22_081556_create_products_table', 1),
(4, '2024_05_22_081600_create_users_table', 1),
(5, '2024_05_22_081601_create_orders_table', 1),
(6, '2024_05_22_081603_create_carts_table', 1),
(7, '2024_05_22_081628_create_banner_table', 1),
(8, '2024_05_22_081640_create_news_table', 1),
(9, '2024_05_25_093903_add_hidden_to_categories_table', 2),
(10, '2024_05_27_081741_create_favorites_table', 3),
(11, '2024_05_29_142432_add_user_id_to_carts_table', 4),
(12, '2024_05_29_142557_add_product_id_to_carts_table', 5),
(13, '2024_05_29_165135_add_quantity_and_price_to_carts_table', 6),
(14, '2024_05_29_171901_add_quantity_and_price_to_carts_table', 7),
(15, '2024_05_29_172259_add_quantity_and_price_to_carts_table', 8),
(16, '2024_05_29_172628_add_quantity_and_price_to_carts_table', 9),
(17, '2024_05_30_093018_create_bill_items_table', 10),
(18, '2024_05_30_093137_create_order_items_table', 10),
(19, '2024_05_30_100757_add_discount_to_bills_table', 11),
(20, '2024_06_02_184107_create_vouchers_table', 12),
(21, '2024_08_08_115014_create_comments_table', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `ngaynhap` date DEFAULT NULL,
  `hienthi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `img`, `title`, `mota`, `ngaynhap`, `hienthi`, `created_at`, `updated_at`) VALUES
(9, 'uploads/1723102676.jpg', 'Cách chọn giày chạy bộ', 'Thể thaoCác môn khácThứ năm, 28/11/2019, 12:00 (GMT+7)\r\nCách chọn giày chạy bộ\r\nKhi chọn giày, bên cạnh vẻ ngoài bắt mắt, bạn nên chú ý các tính năng của giày để phù hợp với mục tiêu chạy, địa hình, đặc điểm chân.\r\n\r\nGiày thể thao là một trong những vật dụng quan trọng nhất với người chạy bộ. Những yếu tố dưới đây giúp bạn lựa chọn đôi giày phù hợp cho mục tiêu luyện tập.\r\n\r\nXác định địa hình\r\n\r\nTrước hết, bạn cần xác định mục tiêu chinh phục và địa hình sẽ chạy là đường nhựa, đường núi dốc hay trên máy tập. Với mỗi địa hình, các nhà sản xuất sẽ lựa chọn chất liệu khác nhau.\r\n\r\nCụ thể, giày chạy đường nhựa (road-running) là những loại giày được thiết kế chạy trên đường bằng, vỉa hè và một số địa hình mức độ gồ ghề nhẹ. Loại giày này thường rất nhẹ, linh hoạt, được làm bởi những miếng đệm hoặc miếng ổn định bàn chân khi chạy trên các bề mặt cứng. \r\n\r\nTrong khi đó, giày chạy địa hình (trail running) có những miếng cao su dày dưới đế, tăng cường độ bám dính và bảo vệ bàn chân, giúp người chạy không bị đau khi chạy trên bề mặt lồi lõm, nhiều đá, rễ cây và chướng ngại vật. \r\n\r\nLoại giày cross training được thiết kế chuyên trong phòng tập thể dục, tập gym hay máy tập chạy.', NULL, 0, '2024-07-21 09:18:10', '2024-08-08 00:37:56'),
(10, 'uploads/1723102449.jpg', 'Giày hiệu dán nhãn chỉ số khí thải carbon', 'Allbirds thông báo trở thành thương hiệu thời trang đầu tiên dán nhãn chỉ số khí thải carbon (carbon footprint) trên mọi sản phẩm.\r\n\r\nTừ năm nay, mọi sản phẩm của hãng sẽ đính kèm chỉ số đại diện cho lượng CO2 sản sinh trong quá trình sản xuất. Theo Forbes, 7,6 kg CO2 là mức trung bình cho mỗi sản phẩm giày dép Allbirds. Trong khi lượng khí thải carbon của một túi nhựa khoảng 1,6 kg, chiếc quần jean tầm 29,6 kg và xe đạp khoảng 240 kg.\r\n\r\nAllbirds cùng các chuyên gia khí thải carbon phát triển công cụ đo cường độ CO2, chú trọng từ chất liệu, sự phát triển, sản xuất, cho đến khâu đóng gói và vận chuyển. Sáng kiến này được đưa ra nhằm tiếp nối Quỹ Carbon được hãng giới thiệu vào năm ngoái.', NULL, 1, '2024-07-24 06:32:59', '2024-08-08 00:34:09'),
(11, 'uploads/1723102363.jpg', 'Trung Quốc phát triển giày phân hủy sinh học', '7\r\nKhoa họcTin tứcThứ sáu, 19/8/2022, 14:10 (GMT+7)\r\nTrung Quốc phát triển giày phân hủy sinh học\r\nĐại học Công nghệ Hóa học Bắc Kinh ra mắt lô giày sinh học đầu tiên có thể sử dụng hàng ngày và phân hủy trong điều kiện ủ phân.\r\n\r\nLô giày sinh học đầu tiên có thể phân hủy hoàn toàn. Ảnh: BUCT\r\nLô giày sinh học đầu tiên có thể phân hủy hoàn toàn. Ảnh: BUCT\r\n\r\nTổng cộng hơn 500 đôi giày đã được Đại học Công nghệ Hóa học Bắc Kinh (BUCT) trao tặng cho các giảng viên và sinh viên tại buổi lễ phát hành lô giày phân hủy hoàn toàn dựa trên sinh học đầu tiên vào hôm 16/8.\r\n\r\nTheo Science Net, phần đế giày sử dụng chất liệu cao su polyester có nguồn gốc sinh học do BUCT phát triển độc lập, trong khi các bộ phận khác được làm từ sợi gai dầu, sợi tre và vật liệu mủ thân cây ngô. Chúng đủ ổn định để sử dụng hàng ngày và phân hủy nhanh chóng trong điều kiện ủ phân.\r\n\r\nNhóm nghiên cứu do Viện sĩ Zhang Liqun tại Học viện Kỹ thuật Trung Quốc và Giáo sư Wang Zhao tại BUCT dẫn đầu đã hoàn thành sản xuất thử nghiệm quy mô 1.000 tấn cao su polyester. Loại cao su này cũng có thể dùng để sản xuất lốp xe, vòng đệm chống dầu, axit polylactic và chất lưu hóa dẻo nhiệt.', NULL, 2, '2024-07-24 06:33:10', '2024-08-08 00:32:43'),
(12, 'uploads/1723102312.jpg', 'Giày đi bộ nhanh nhất thế giới', 'Được phát triển bởi một nhóm kỹ sư robot, những người từng làm việc tại Đại học Carnegie Mellon của Mỹ trước khi thành lập công ty khởi nghiệp có tên Shift Robotics, Moonwalker có thể trông giống như những đôi giày trượt patin, nhưng được hỗ trợ bởi thuật toán trí tuệ nhân tạo (AI) giúp người mang đi lại bình thường mà không cần bất kỳ điều khiển nào.\r\n\r\n\"Moonwalker không phải là giày trượt. Bạn không trượt trên chúng mà sẽ đi bộ. Bạn cũng không cần phải học cách sử dụng. Những đôi giày này học hỏi từ bạn\", Xunjie Zang, nhà sáng lập kiêm Giám đốc điều hành Shift Robotics, nhấn mạnh.\r\n\r\nThiết kế có dây đeo cho phép Moonwalker được dùng kết hợp với hầu hết mọi đôi giày. Nó có 8 bánh xe bằng polyurethane, giống như giày trượt. Tuy nhiên, những bánh xe này nhỏ hơn nhiều và không nằm trên một đường thẳng. Chúng được cấp năng lượng bởi một động cơ điện 300 watt.', NULL, 1, '2024-07-24 06:33:21', '2024-08-08 00:31:52'),
(13, 'uploads/1723102144.jpg', 'Nike - hãng giày ra đời từ bài luận trong trường đại học', 'Phil Knight nảy ra ý tưởng về Nike nhờ tham gia đội tuyển điền kinh của trường và trải nghiệm trong các lớp học về kinh doanh.\r\n\r\nHành trình của Nike bắt đầu vào năm 1962. Khi đó, đồng sáng lập Phil Knight vừa hoàn thành chương trình MBA (thạc sĩ quản trị kinh doanh) tại Đại học Stanford. Trước đó, ông đã tốt nghiệp cử nhân tại Đại học Oregon. Theo The Street, đây được coi là hai trải nghiệm quan trọng định hình cho sự nghiệp của Knight sau này.\r\n\r\nỞ trường Oregon, ông tham gia vào đội tuyển điền kinh của huấn luyện viên Bill Bowerman – đồng sáng lập Nike sau này. Bowerman luôn quan tâm đến việc tối ưu hóa giày cho học trò. Ông thường xuyên sửa giày cho họ sau khi học hỏi từ một thợ giày địa phương. Chính điều này đã khiến Knight ấn tượng.\r\n\r\nTrong cuốn tự truyện \"Shoe Dog\" sau này, Phil Knight tiết lộ ông nảy ra ý tưởng về Nike nhờ \"các đường chạy tại Oregon và các lớp học ở Stanford\". Tại Stanford, Knight còn từng viết một bài luận về lý do giày chạy nên dời địa điểm sản xuất truyền thống từ Đức sang Nhật Bản – nơi có giá nhân công rẻ hơn. Ý tưởng này được coi là điên rồ ở thời điểm đó.', NULL, 1, '2024-07-24 06:33:32', '2024-08-08 00:29:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `madth` varchar(255) NOT NULL,
  `iduser` bigint(20) UNSIGNED DEFAULT NULL,
  `nguoidat_ten` varchar(255) NOT NULL,
  `nguoidat_email` varchar(255) NOT NULL,
  `nguoidat_tl` varchar(255) NOT NULL,
  `nguoidat_diachi` varchar(255) NOT NULL,
  `nguoinhan_ten` varchar(255) DEFAULT NULL,
  `nguoinhan_diachi` varchar(255) DEFAULT NULL,
  `nguoinhan_tel` varchar(255) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `ship` int(11) NOT NULL,
  `voucher` varchar(255) DEFAULT NULL,
  `tongthanhtoan` int(11) NOT NULL,
  `pttt` tinyint(4) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `madth`, `iduser`, `nguoidat_ten`, `nguoidat_email`, `nguoidat_tl`, `nguoidat_diachi`, `nguoinhan_ten`, `nguoinhan_diachi`, `nguoinhan_tel`, `total`, `ship`, `voucher`, `tongthanhtoan`, `pttt`, `status`, `created_at`, `updated_at`) VALUES
(52, 'DS5iz3h', 23, 'admin', 'admin@gmail.com', '0965751901', 'sss', NULL, NULL, NULL, 400000, 0, '0', 400000, 0, '1', '2024-08-08 05:14:22', '2024-08-08 05:14:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_items`
--

CREATE TABLE `orders_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orders_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_items`
--

INSERT INTO `orders_items` (`id`, `orders_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(47, 52, 27, 1, 400000, '2024-08-08 05:14:22', '2024-08-08 05:14:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `mota` text DEFAULT NULL,
  `gallery` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `dacbiet` tinyint(4) NOT NULL DEFAULT 0,
  `view` int(11) NOT NULL DEFAULT 0,
  `bestseller` tinyint(4) NOT NULL DEFAULT 0,
  `iddm` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `mota`, `gallery`, `price`, `quantity`, `dacbiet`, `view`, `bestseller`, `iddm`, `created_at`, `updated_at`) VALUES
(26, 'Giày Thể Thao Sneaker Xám', 'uploads/1721819210.jpeg', '', NULL, 300000, '0', 1, 1, 0, 16, '2024-07-24 04:06:50', '2024-07-24 06:30:22'),
(27, 'Giày Thể Thao H136', 'uploads/1721819258.jpeg', '', NULL, 400000, '10', 1, 1, 0, 16, '2024-07-24 04:07:38', '2024-07-24 05:26:20'),
(28, 'Giày Thể Thao H134', 'uploads/1721819285.jpeg', '', NULL, 350000, '10', 2, 1, 0, 16, '2024-07-24 04:08:05', '2024-07-24 05:26:05'),
(29, 'Giày Thể Thao Vàng D136', 'uploads/1721819309.jpeg', '', NULL, 200000, '10', 2, 1, 0, 16, '2024-07-24 04:08:29', '2024-07-24 05:25:51'),
(30, 'Giày Thể Thao Z136 Nam', 'uploads/1721819339.jpeg', '', NULL, 1000000, '10', 2, 1, 0, 16, '2024-07-24 04:08:59', '2024-07-24 05:26:33'),
(31, 'Giày Thể Thao H136 nữ', 'uploads/1721819364.jpeg', '', NULL, 1000000, '10', 2, 1, 0, 12, '2024-07-24 04:09:24', '2024-07-24 04:09:24'),
(32, 'Giày Thể Thao D126 Nữ Màu', 'uploads/1721819404.jpeg', '', NULL, 350000, '10', 2, 1, 0, 12, '2024-07-24 04:10:04', '2024-07-24 04:10:04'),
(33, 'Giày Thể Thao H136 nữ', 'uploads/1721819435.jpeg', '', NULL, 400000, '10', 2, 1, 0, 12, '2024-07-24 04:10:35', '2024-07-24 04:10:35'),
(34, 'Giày Thể Thao H136 nữ mới nhất', 'uploads/1721819505.jpeg', '', NULL, 500000, '10', 2, 1, 0, 12, '2024-07-24 04:11:01', '2024-07-24 04:11:45'),
(35, 'Giày Thể Thao H222 Nữ 2024', 'uploads/1721819490.jpeg', '', NULL, 1000000, '10', 2, 1, 0, 12, '2024-07-24 04:11:30', '2024-07-24 04:11:30'),
(36, 'Giày đi chơi  H13627 năm 2024', 'uploads/1721819559.jpeg', '', NULL, 1000000, '10', 2, 1, 0, 13, '2024-07-24 04:12:39', '2024-07-24 04:12:39'),
(37, 'Giày đi chơi  H223', 'uploads/1721819590.jpeg', '', NULL, 200000, '10', 1, 1, 0, 13, '2024-07-24 04:13:10', '2024-07-24 04:13:10'),
(38, 'Giày đi chơi  H136 đen', 'uploads/1721819617.jpeg', '', NULL, 1000000, '10', 1, 1, 0, 13, '2024-07-24 04:13:37', '2024-07-24 04:13:37'),
(39, 'Giày đi chơi  A136', 'uploads/1721819649.jpeg', '', NULL, 2000000, '10', 1, 1, 0, 13, '2024-07-24 04:14:09', '2024-07-24 04:14:09'),
(40, 'Giày Thể Thao C136v 2023', 'uploads/1721819677.jpeg', '', NULL, 200000, '10', 1, 1, 0, 13, '2024-07-24 04:14:37', '2024-07-24 04:14:37'),
(41, 'Bộ Phụ Kiện (Vớ Cao Cấp + Dây Giày)', 'uploads/1721819777.webp', '', NULL, 10000, '20', 1, 1, 0, 14, '2024-07-24 04:16:17', '2024-07-24 04:16:17'),
(42, 'Phụ kiện trang trí giày cao gót khóa giày dệt tay', 'uploads/1721819816.jpeg', '', NULL, 20000, '20', 1, 1, 0, 14, '2024-07-24 04:16:56', '2024-07-24 04:16:56'),
(43, 'TM04 - Phụ kiện ghế gập tủ giày', 'uploads/1721819872.webp', '', NULL, 23000, '10', 1, 1, 0, 14, '2024-07-24 04:17:52', '2024-07-24 04:17:52'),
(44, 'Giày đi làm DC3137 năm 2023', 'uploads/1721819901.jpeg', '', NULL, 1000000, '10', 1, 0, 0, 15, '2024-07-24 04:18:21', '2024-07-24 04:18:21'),
(45, 'tesst', 'uploads/1722327865.jpeg', 'Thương hiệu: TRENDLUXE   Khối lượng: 500g  Thuộc Tính:  Phân loại: Loại, Size    Chất liệu trên: PU  Chiều cao gót: 2-3CM   Chất liệu đế: cao su   Kiểu dáng: Phiên bản Hàn Quốc  Quy trình sản xuất: ép phun   Chất liệu nội thất giày: polyester  Chất liệu đế: da sợi nhỏ  Màu sắc: Đen Trắng  Kích thước: 36,37,38,39,40,41,42,43  Nơi sản xuất: Quảng Châu.  Bảo hành: Đổi trả trong vòng 7 ngày    * HƯỚNG DẪN CHỌN SIZE GIÀY  - Chiều dài bàn chân     ---> size số :   - 22.5cm  đến  23cm      ---> size 36  - 23cm     đến  23.5cm   ---> size 37  - 23.5cm  đến  24cm      ---> size 38  - 24cm     đến  24.5cm   ---> size 39  - 25cm      					   ---> size 40  - 25.5cm                         ---> size 41  - 26cm                            ---> size 42  - 27cm                            ---> size 43    ☑️CAM KẾT : HOÀN TIỀN 100% NẾU SẢN PHẨM KHÔNG ĐÚNG MÔ TẢ .  ☑️ HỖ TRỢ ĐỔI SIZE TRONG 3 NGÀY NẾU KHÔNG ĐI VỪA .  ☑️ĐƯỢC KIỂM TRA HÀNG TRƯỚC KHI THANH TOÁN ( GỌI CHO SHOP THEO HOTLINE NẾU BƯU TA K HỖ TRỢ CHO KIỂM TRA HÀNG )  ☑️SẢN PHẨM TRƯỚC KHI GIAO CHO KHÁCH HÀNG ĐẦY ĐỦ BILL,BOX, TAG...', '[\"4.jpeg\",\"5.jpeg\",\"dc11.jpeg\",\"dc12.jpeg\"]', 200000, '10', 1, 2, 0, 14, '2024-07-30 01:21:21', '2024-07-30 01:32:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `diachi` varchar(255) NOT NULL DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `dienthoai` varchar(255) NOT NULL DEFAULT '0',
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `otp`, `img`, `username`, `password`, `name`, `diachi`, `email`, `dienthoai`, `role`, `created_at`, `updated_at`) VALUES
(22, NULL, NULL, 'duongday', '$2y$12$cZK5qCdkIR5TfgQ4Kk2BduWwUa6Efmswlo73vrw5l69MDhKkVTPwW', '0', '0', 'duong123@gmail.com', '0', 0, '2024-07-24 18:37:51', '2024-07-24 18:37:51'),
(23, NULL, '1723294327.png', 'admin', '$2y$12$DzBYBVsBqXp0xk8Efek8yOh8A5XFg2KzZhoCtXV/kdPV3zHXP74ye', NULL, 'q12.Tô Ngọc Vân', 'admin@gmail.com', '0965751901', 1, '2024-07-24 18:42:03', '2024-08-10 06:10:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `discount` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vouchers`
--

INSERT INTO `vouchers` (`id`, `name`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'C', 10, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_iduser_foreign` (`iduser`);

--
-- Chỉ mục cho bảng `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`orders_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_iddm_foreign` (`iddm`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_iduser_foreign` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `orders_items`
--
ALTER TABLE `orders_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_iddm_foreign` FOREIGN KEY (`iddm`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
