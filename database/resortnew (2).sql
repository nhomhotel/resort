-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2016 at 01:08 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resortnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `address_id` int(11) NOT NULL,
  `address_detail` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address_detail_ascii` varchar(500) NOT NULL,
  `lat` decimal(12,9) DEFAULT NULL,
  `lng` decimal(12,9) DEFAULT NULL,
  `address_street` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `address_2` varchar(500) CHARACTER SET utf8 NOT NULL,
  `address_street_ascii` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `district` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `district_ascii` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `provincial` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `provincial_ascii` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `zip_code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `country_ascii` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `area_id` int(11) NOT NULL,
  `area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`address_id`, `address_detail`, `address_detail_ascii`, `lat`, `lng`, `address_street`, `address_2`, `address_street_ascii`, `district`, `district_ascii`, `provincial`, `provincial_ascii`, `zip_code`, `country`, `country_ascii`, `area_id`, `area`) VALUES
(1, 'Vĩnh Phúc, Viet Nam', 'Vinh Phuc, Viet Nam', '21.360880500', '105.547437300', 'Ngọc Thanh, Thị xã Phúc Yên, Vĩnh Phúc', '', 'Ngoc Thanh, Thi xa Phuc Yen, Vinh Phuc', 'Phúc Yên', 'Phuc Yen', 'Vinh Phuc Province', 'Vinh Phuc Province', '1000', 'Vietnam', 'Vietnam', -1, ''),
(2, 'Vĩnh Phúc, Viet Nam', 'Vinh Phuc, Viet Nam', '21.360880500', '105.547437300', 'Ngọc Thanh, Thị xã Phúc Yên, Vĩnh Phúc', '', 'Ngoc Thanh, Thi xa Phuc Yen, Vinh Phuc', 'Phúc Yên', 'Phuc Yen', 'Vinh Phuc Province', 'Vinh Phuc Province', '10000', 'Vietnam', 'Vietnam', -1, ''),
(3, 'Vĩnh Phúc, Viet Nam', 'Vinh Phuc, Viet Nam', '21.360880500', '105.547437300', 'Ngọc Thanh, Thị xã Phúc Yên, Vĩnh Phúc', '', 'Ngoc Thanh, Thi xa Phuc Yen, Vinh Phuc', 'Phúc Yên', 'Phuc Yen', 'Vinh Phuc Province', 'Vinh Phuc Province', '1000', 'Vietnam', 'Vietnam', -1, ''),
(4, 'Vĩnh Phúc, Viet Nam', 'Vinh Phuc, Viet Nam', '21.360880500', '105.547437300', 'Ngọc Thanh, Thị xã Phúc Yên, Vĩnh Phúc', '', 'Ngoc Thanh, Thi xa Phuc Yen, Vinh Phuc', 'Phúc Yên', 'Phuc Yen', 'Vinh Phuc Province', 'Vinh Phuc Province', '10000', 'Vietnam', 'Vietnam', -1, ''),
(5, 'Quang Nam Province, Vietnam', 'Quang Nam Province, Vietnam', '15.539353800', '108.019102000', 'đường hải dương', '', 'duong hai duong', 'quang anm', 'quang anm', 'Quang Nam Province', 'Quang Nam Province', '1000', 'Vietnam', 'Vietnam', -1, ''),
(6, 'Quang Nam Province, Vietnam', 'Quang Nam Province, Vietnam', '15.539353800', '108.019102000', 'đường hải dương 2', '', 'duong hai duong 2', 'quang ama', 'quang ama', 'Quang Nam Province', 'Quang Nam Province', '100000', 'Vietnam', 'Vietnam', -1, ''),
(7, 'Quang Nam Province, Vietnam', 'Quang Nam Province, Vietnam', '15.539353800', '108.019102000', 'dương hai duong 3', '', 'duong hai duong 3', '10000', '10000', 'Quang Nam Province', 'Quang Nam Province', '1000', 'Vietnam', 'Vietnam', -1, ''),
(8, 'Vĩnh Phúc, Viet Nam', 'Vinh Phuc, Viet Nam', '21.360880500', '105.547437300', 'Ngọc Thanh, Thị xã Phúc Yên, Vĩnh Phúc', '', 'Ngoc Thanh, Thi xa Phuc Yen, Vinh Phuc', 'Phúc Yên', 'Phuc Yen', 'Vinh Phuc Province', 'Vinh Phuc Province', '10000', 'Vietnam', 'Vietnam', -1, ''),
(9, 'Vĩnh Phúc, Viet Nam', 'Vinh Phuc, Viet Nam', '21.360880500', '105.547437300', 'Ngọc Thanh, Thị xã Phúc Yên, Vĩnh Phúc', '', 'Ngoc Thanh, Thi xa Phuc Yen, Vinh Phuc', 'Phúc Yên', 'Phuc Yen', 'Vinh Phuc Province', 'Vinh Phuc Province', '10000', 'Vietnam', 'Vietnam', -1, ''),
(10, 'Vĩnh Phúc, Viet Nam', 'Vinh Phuc, Viet Nam', '21.360880500', '105.547437300', 'Ngọc Thanh, Thị xã Phúc Yên, Vĩnh Phúc', '', 'Ngoc Thanh, Thi xa Phuc Yen, Vinh Phuc', 'Phúc Yên', 'Phuc Yen', 'Vinh Phuc Province', 'Vinh Phuc Province', '10000', 'Vietnam', 'Vietnam', -1, ''),
(11, 'Vĩnh Phúc, Viet Nam', 'Vinh Phuc, Viet Nam', '21.360880500', '105.547437300', 'Ngọc Thanh, Thị xã Phúc Yên, Vĩnh Phúc', '', 'Ngoc Thanh, Thi xa Phuc Yen, Vinh Phuc', 'Phúc Yên', 'Phuc Yen', 'Vinh Phuc Province', 'Vinh Phuc Province', '1000', 'Vietnam', 'Vietnam', -1, ''),
(12, 'Vĩnh Phúc, Vietnam', 'Vinh Phuc, Vietnam', '21.360880500', '105.547437300', 'Ngọc Thanh, Thị xã Phúc Yên, Vĩnh Phúc', '', 'Ngoc Thanh, Thi xa Phuc Yen, Vinh Phuc', 'Phúc Yên', 'Phuc Yen', 'Vinh Phuc Province', 'Vinh Phuc Province', '1000', 'Vietnam', 'Vietnam', -1, ''),
(13, '21 Cầu Giấy, Hanoi, Vietnam', '21 Cau Giay, Hanoi, Vietnam', '21.029611000', '105.802821000', '21 Cầu Giấy', '', '21 Cau Giay', 'Ba Đình', 'Ba Dinh', 'Hà Nội', 'Ha Noi', '1000', 'Vietnam', 'Vietnam', -1, ''),
(14, '21 Cầu Giấy, Dịch Vọng, Hà Nội, Vietnam', '21 Cau Giay, Dich Vong, Ha Noi, Vietnam', '21.034556600', '105.795771000', '21 Cầu Giấy', '', '21 Cau Giay', 'Cầu Giấy', 'Cau Giay', 'Hà Nội', 'Ha Noi', '1000', 'Vietnam', 'Vietnam', -1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_amenities`
--

CREATE TABLE `tbl_amenities` (
  `amenities_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `description_en` text CHARACTER SET utf8,
  `status` tinyint(1) DEFAULT NULL,
  `filter` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_amenities`
--

INSERT INTO `tbl_amenities` (`amenities_id`, `name`, `name_en`, `description`, `description_en`, `status`, `filter`, `created`) VALUES
(1, 'Cho phép hút thuốc', 'Smoking Allowed', '', '', 1, 1, '2016-05-10 11:01:09'),
(2, 'TV truyền hình cáp', 'Cable TV', '', '', 1, 1, '2016-05-10 11:01:19'),
(3, 'Mạng internet không dây', 'Wireless Internet', 'Một thiết bị wifi khách có thể dùng 24/7', 'A wireless router that guests can access 24/7', 1, 1, '2016-05-10 11:01:25'),
(4, 'TV', 'TV', '', '', 1, NULL, '2016-05-10 11:01:28'),
(8, 'Lò sưởi trong nhà', 'Indoor Fireplace', '', '', 1, NULL, '2016-05-10 11:01:31'),
(9, 'Bếp', 'Kitchen', 'Bếp có thể cho khách sử dụng', 'Kitchen is available for guests', 1, NULL, '2016-05-27 09:42:49'),
(10, '12', '12', '', '', 0, NULL, '2016-08-09 15:30:22'),
(11, 'test tien nghi', 'test tien nghi', 'tien nghi', 'tien nghi', 1, NULL, '2016-09-05 09:17:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_app_config`
--

CREATE TABLE `tbl_app_config` (
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_app_config`
--

INSERT INTO `tbl_app_config` (`key`, `value`) VALUES
('address_email', 'lehai04.1991@gmail.com'),
('decimal_point', '.'),
('item_per_page_site', '3'),
('item_per_page_system', '20'),
('language', 'vietnamese'),
('language1', 'english'),
('nameCompany', ''),
('name_website', 'Star View'),
('number_of_decimals', '2'),
('pass_email', 'pymzrhbdgpfkuwac'),
('tax', '1'),
('thousands_separator', ',');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `area_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `view_footer` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`area_id`, `name`, `name_en`, `sort`, `view_footer`, `image`) VALUES
(11, 'Singapore', 'Singapore', 8, 7, '/uploads/area/1.jpg'),
(12, 'Hồng Kông', 'Hồng Kông', 1, 1, '/uploads/area/2.jpg'),
(13, 'Sydney', 'Sydney', 1, 15, '/uploads/area/3.jpg'),
(14, 'Bali', 'Bali', 5, 0, '/uploads/area/a01c9f36e6984c1d7e5aa32fc38046d0.jpg'),
(15, 'Phuket', 'Phuket', 0, 1, '/uploads/area/a2a46e266c0789b7f05af01c12ac4350.jpg'),
(16, 'Seoul', 'Seoul', 0, 0, '/uploads/area/babc4682032e3a2a42627e85b68173a9.jpg'),
(17, 'Tokyo', 'Tokyo', 0, 0, '/uploads/area/0e7d3805e66e201e7bc1a483897386df.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill_history`
--

CREATE TABLE `tbl_bill_history` (
  `bill_history_id` int(11) NOT NULL,
  `order_room_id` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_reason` text NOT NULL,
  `money_payment` varchar(255) NOT NULL,
  `create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `category_name_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `category_parent` int(11) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `show_filter` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_name_en`, `category_parent`, `description`, `status`, `show_filter`, `created`) VALUES
(1, 'Loại nhà ở', 'Property Type', 0, NULL, 1, 0, NULL),
(2, 'Loại phòng', 'Room Type', 0, NULL, 1, 1, NULL),
(3, 'Loại giường', 'Bed Type', 0, NULL, 1, 1, NULL),
(4, 'Trải nghiệm', 'Experience', 0, NULL, 1, 1, NULL),
(5, 'Tiện nghi', 'Amenities', 0, NULL, 1, 1, NULL),
(6, 'Căn hộ', 'Apartment', 1, NULL, 1, 0, NULL),
(7, 'Nhà riêng', 'House', 1, NULL, 1, 0, NULL),
(8, 'Nguyên căn', 'Entire Home', 2, NULL, 1, 1, NULL),
(9, 'Phòng riêng', 'Private Room', 2, NULL, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `provincial_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email`
--

CREATE TABLE `tbl_email` (
  `email_id` int(11) NOT NULL,
  `email_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `email_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_email`
--

INSERT INTO `tbl_email` (`email_id`, `email_title`, `description`, `email_type`) VALUES
(3, 'Thông báo đặt phòng gửi đến người quản trị', '<p>Ch&agrave;o bạn __user_name__</p>\r\n\r\n<p>Hệ thống gần đ&acirc;y đ&atilde; ghi nhận __customer_name__ đ&atilde; đặt ph&ograve;ng th&agrave;nh c&ocirc;ng từ website</p>\r\n\r\n<p>Th&ocirc;ng tin ph&ograve;ng</p>\r\n\r\n<ul>\r\n	<li>T&ecirc;n ph&ograve;ng :__room_name__</li>\r\n	<li>T&ecirc;n kh&aacute;ch h&agrave;ng: __customer_name__</li>\r\n	<li>số điện thoại: __phone_number__</li>\r\n	<li>Địa chỉ email: __email_address__</li>\r\n	<li>số kh&aacute;ch: __guest__</li>\r\n	<li>Ng&agrave;y nhận ph&ograve;ng: __check_in__</li>\r\n	<li>Ng&agrave;y trả ph&ograve;ng: __check_out__</li>\r\n	<li>Gi&aacute;: __prices__ VNĐ</li>\r\n</ul>', 1),
(4, 'Thông báo đặt phòng gửi đến đối tác', '<p>Ch&agrave;o bạn __user_name__</p>\r\n\r\n<p>Hệ thống gần đ&acirc;y đ&atilde; ghi nhận __customer_name__ đ&atilde; đặt ph&ograve;ng th&agrave;nh c&ocirc;ng từ website</p>\r\n\r\n<p>Th&ocirc;ng tin ph&ograve;ng</p>\r\n\r\n<ul>\r\n	<li>T&ecirc;n ph&ograve;ng :__room_name__</li>\r\n	<li>T&ecirc;n kh&aacute;ch h&agrave;ng: __customer_name__</li>\r\n	<li>số điện thoại: __phone_number__</li>\r\n	<li>Địa chỉ email: __email_address__</li>\r\n	<li>số kh&aacute;ch: __guest__</li>\r\n	<li>Ng&agrave;y nhận ph&ograve;ng: __check_in__</li>\r\n	<li>Ng&agrave;y trả ph&ograve;ng: __check_out__</li>\r\n	<li>Gi&aacute;: __prices__ VNĐ</li>\r\n</ul>', 2),
(5, 'Thông báo đặt phòng đến người đặt phòng', '<p>Ch&agrave;o bạn __customer_name__</p>\r\n\r\n<p>Hệ thống gần đ&acirc;y đ&atilde; ghi nhận __customer_name__ đ&atilde; đặt ph&ograve;ng th&agrave;nh c&ocirc;ng từ website</p>\r\n\r\n<p>Th&ocirc;ng tin ph&ograve;ng</p>\r\n\r\n<ul>\r\n	<li>T&ecirc;n ph&ograve;ng :__room_name__</li>\r\n	<li>T&ecirc;n kh&aacute;ch h&agrave;ng: __customer_name__</li>\r\n	<li>số điện thoại: __phone_number__</li>\r\n	<li>Địa chỉ email: __email_address__</li>\r\n	<li>số kh&aacute;ch: __guest__</li>\r\n	<li>Ng&agrave;y nhận ph&ograve;ng: __check_in__</li>\r\n	<li>Ng&agrave;y trả ph&ograve;ng: __check_out__</li>\r\n	<li>Gi&aacute;: __prices__ VNĐ</li>\r\n</ul>', 3),
(6, 'Thông báo Hủy phòng', '<p>&nbsp;</p>\r\n\r\n<p>Bạn đ&atilde; đặt ph&ograve;ng th&agrave;nh c&ocirc;ng</p>', 4),
(7, 'Thông báo Xác nhận tài khoản đối tác', '<p>&nbsp;</p>\r\n\r\n<p>Bạn đ&atilde; đặt ph&ograve;ng th&agrave;nh c&ocirc;ng</p>', 5),
(8, 'Email kích hoạt tài khoản người dùng', 'Hệ thống ghi nhận gần đ&acirc;y __user_name__ đ&atilde; đăng k&yacute; t&agrave;i khoản th&agrave;nh c&ocirc;ng<br />\r\nTh&ocirc;ng tin đăng nhập v&agrave;o hệ thống\r\n<ul>\r\n	<li>T&ecirc;n người d&ugrave;ng: __first_name__, __last_name__</li>\r\n	<li>T&ecirc;n đăng nhập:&nbsp; __user_name__</li>\r\n	<li>Mật khẩu: __password__</li>\r\n	<li>email: __email__</li>\r\n</ul>\r\nXin vui l&ograve;ng k&iacute;ch v&agrave;o link b&ecirc;n dưới để x&aacute;c nhận th&ocirc;ng tin tr&ecirc;n<br />\r\n__confirm__user_account__', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_history`
--

CREATE TABLE `tbl_email_history` (
  `email_history_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `time` date NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1: thành công, 0 thất bại',
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_template`
--

CREATE TABLE `tbl_email_template` (
  `email_template_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_email_template`
--

INSERT INTO `tbl_email_template` (`email_template_id`, `name`) VALUES
(1, 'Email thông báo đặt phòng thành công gửi đến người quản trị'),
(2, 'Email thông báo đặt phòng gửi đến đối tác'),
(3, 'Email thông báo đặt phòng gửi đến người đăng ký'),
(4, 'Email hủy đặt phòng'),
(5, 'Email xác nhận quyền đặt phòng'),
(6, 'Email kích hoạt tài khoản người dùng');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_experience`
--

CREATE TABLE `tbl_experience` (
  `experience_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `description_en` text CHARACTER SET utf8,
  `icon` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `filter` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_experience`
--

INSERT INTO `tbl_experience` (`experience_id`, `name`, `name_en`, `description`, `description_en`, `icon`, `status`, `filter`, `created`) VALUES
(1, 'Bãi biển', 'Beach', 'Địa điểm gần biển, có thể đến biển một cách dễ dàng', 'Beachfront property, accessible to a nearby beach', 1, 1, NULL, '2016-05-18 16:43:11'),
(5, 'Cảnh trí', 'Scenic', 'Với quang cảnh đẹp', 'With a view', 3, 1, NULL, '2016-05-18 15:42:03'),
(6, 'Mua sắm', 'Shopping', 'Ở trong hoặc gần khu vực mua sắm phổ biến, chợ đêm hay chợ đường phố', 'In or near popular shopping districts, night markets, street markets', 4, 1, NULL, '2016-05-18 15:42:09'),
(7, 'Truyền thống', 'Traditional', 'Ngôi nhà kiểu truyền thống như nhà sàn, nhà cổ, vv', 'Authentic-styled homes like stilt houses, nipa huts, gladak homes, etc.', 2, 1, NULL, '2016-05-18 15:42:16'),
(8, 'Thành thị', 'Urban', 'Trong thành phố', 'In the city', 14, 1, NULL, '2016-05-18 15:42:23'),
(9, 'Nhóm', 'Group', 'Chứa một nhóm 4 hoặc nhiều hơn', 'Accommodates a group of 4 or more', 9, 1, NULL, '2016-05-30 12:13:38'),
(10, 'Trang trọng', 'Luxury', 'Cung cấp phòng cao cấp, tiện nghi cá nhân', 'Offer high-end accommodations, private amenities', 13, 1, NULL, '2016-05-30 12:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_follow_social`
--

CREATE TABLE `tbl_follow_social` (
  `follow_social_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_follow_social`
--

INSERT INTO `tbl_follow_social` (`follow_social_id`, `name`, `link`) VALUES
(1, 'Facebook2', '#'),
(2, 'Twitter', '#'),
(3, 'Google+', '#');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_glyphicon`
--

CREATE TABLE `tbl_glyphicon` (
  `glyphicon_id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `background` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_glyphicon`
--

INSERT INTO `tbl_glyphicon` (`glyphicon_id`, `class_name`, `background`, `color`, `size`) VALUES
(1, 'glyphicon glyphicon-asterisk', '#398fd1', '#fff', '30px'),
(2, 'glyphicon glyphicon-plus', '#398fd1', '#fff', '30px'),
(3, 'glyphicon glyphicon-euro', '#398fd1', '#fff', '30px'),
(4, 'glyphicon glyphicon-minus', '#398fd1', '#fff', '30px'),
(5, 'glyphicon glyphicon-cloud', '#398fd1', '#fff', '30px'),
(6, 'glyphicon glyphicon-envelope', '#398fd1', '#fff', '30px'),
(7, 'glyphicon glyphicon-pencil', '#398fd1', '#fff', '30px'),
(8, 'glyphicon glyphicon-glass', '#398fd1', '#fff', '30px'),
(9, 'glyphicon glyphicon-music', '#398fd1', '#fff', '30px'),
(10, 'glyphicon glyphicon-search', '#398fd1', '#fff', '30px'),
(11, 'glyphicon glyphicon-heart', '#398fd1', '#fff', '30px'),
(12, 'glyphicon glyphicon-star', '#398fd1', '#fff', '30px'),
(13, 'glyphicon glyphicon-star-empty', '#398fd1', '#fff', '30px'),
(14, 'glyphicon glyphicon-user', '#398fd1', '#fff', '30px'),
(15, 'glyphicon glyphicon-film', '#398fd1', '#fff', '30px'),
(16, 'glyphicon glyphicon-th-large', '#398fd1', '#fff', '30px');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_help`
--

CREATE TABLE `tbl_help` (
  `help_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `content_en` text NOT NULL,
  `tag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_help_post_guide`
--

CREATE TABLE `tbl_help_post_guide` (
  `post_guide_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `content_en` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_help_post_guide`
--

INSERT INTO `tbl_help_post_guide` (`post_guide_id`, `topic_id`, `title`, `title_en`, `content`, `content_en`, `status`, `tags`) VALUES
(1, 3, 'How it works?', 'How it works?', 'It’s time to try vacation rentals and enjoy a richer travel experience!', 'It’s time to try vacation rentals and enjoy a richer travel experience!', 1, '6'),
(2, 3, 'Planning a trip?', 'Planning a trip?', 'Search Whether you want to splurge on a luxurious villa in Bali or looking for an affordable room in Taipei, we''ll help you find the right place.  Contact Send messages to several hosts through the on-site messaging system to find out more about their place.  Book When you find the right place, book it! Make your payment through our secure online payment system.  Share Leave a review for your host. Highlight experiences that made your stay memorable.  Search for the perfect home away from home now.', 'Search Whether you want to splurge on a luxurious villa in Bali or looking for an affordable room in Taipei, we''ll help you find the right place.  Contact Send messages to several hosts through the on-site messaging system to find out more about their place.  Book When you find the right place, book it! Make your payment through our secure online payment system.  Share Leave a review for your host. Highlight experiences that made your stay memorable.  Search for the perfect home away from home now.', 1, '6'),
(3, 2, 'Hosting travellers?', 'Hosting travellers?', 'List Whether you have a yacht, a luxury villa or a spare single room, you can list any space for free.   Contact Talk to potential guests to get to know them better before you welcome them to your home.  Earn Receive your payment 24 hours after your guest checks in via PayPal or bank transfer.  Share Leave a review for your guest. Share your hosting experience with the travelmob community.', 'List Whether you have a yacht, a luxury villa or a spare single room, you can list any space for free.   Contact Talk to potential guests to get to know them better before you welcome them to your home.  Earn Receive your payment 24 hours after your guest checks in via PayPal or bank transfer.  Share Leave a review for your guest. Share your hosting experience with the travelmob community.', 1, '1'),
(4, 1, 'Nói về chúng tôi', 'About travelmob/HomeAway', 'travelmob is now HomeAway.  For the last three years, the 50+ travelmobsters across product, engineering, marketing, sales and operations have been working hard to better serve our community of hosts and guests. We are proud to announce that travelmob has officially transitioned its brand, products, company name, and all of our efforts to HomeAway.   HomeAway, Inc. (Nasdaq: AWAY) is the largest online vacation rental marketplace in the world. When HomeAway acquired travelmob in 2013, both our hosts and guests have benefited from the collective global brand and reach. Hosts on travelmob have enjoyed an increased awareness and bookings on their listings from global travellers across HomeAway’s network. Our guests are also able to discover and book great vacation rentals across the globe. We believe this will not only make the transition complete, but it is a starting point to bigger and better things for our community.   What? Why? How? We know there are lots of questions and we will do our best to answer them all. Here are a few key things that we want to assure our users, but if you have any additional information, please contact us   Why change the brand, logo and name?  The brand and name change will allow us to leverage the extensive network and brand presence that HomeAway has globally. That objective is to create a stronger brand across Asia Pacific - benefiting both our guests and hosts in our collective networks. We want to make sure that you discover the best vacation rentals across the globe with HomeAway.    I’m a travelmob host, what changed? For hosts, your listings will continue to be displayed as is. There is no change to the existing inquiry, booking, service fees and payment process. If you have an existing subscription to HomeAway.com, find out how you can access your HomeAway.com dashboard here.   I was a previous travelmob guest and have an account, what changed? For guests, you can still access your account here.  There is no change to how you make inquiries or bookings on our site. You can still search for the accommodation that match your needs, contact the hosts, then book using our secure payment system. In fact, we have a lot more listings globally that you can now book on HomeAway Asia.   Do I need to setup a new account on HomeAway Asia websites? Absolutely not. You can use your travelmob login account details to access your account on the HomeAway Asia websites.   I just booked an accommodation on travelmob. Will this brand change impact my booking? Not at all. You can access your itinerary using the same login details as in travelmob. Don’t forget to bring a copy of your itinerary on your trip. More importantly, have fun on your holidays and safe travels!   As part of this transition, we''ve also updated our Terms & Conditions. Please take a moment to review them. By continuing to use HomeAway, you agree to comply with the updated terms.', 'travelmob is now HomeAway.  For the last three years, the 50+ travelmobsters across product, engineering, marketing, sales and operations have been working hard to better serve our community of hosts and guests. We are proud to announce that travelmob has officially transitioned its brand, products, company name, and all of our efforts to HomeAway.   HomeAway, Inc. (Nasdaq: AWAY) is the largest online vacation rental marketplace in the world. When HomeAway acquired travelmob in 2013, both our hosts and guests have benefited from the collective global brand and reach. Hosts on travelmob have enjoyed an increased awareness and bookings on their listings from global travellers across HomeAway’s network. Our guests are also able to discover and book great vacation rentals across the globe. We believe this will not only make the transition complete, but it is a starting point to bigger and better things for our community.   What? Why? How? We know there are lots of questions and we will do our best to answer them all. Here are a few key things that we want to assure our users, but if you have any additional information, please contact us   Why change the brand, logo and name?  The brand and name change will allow us to leverage the extensive network and brand presence that HomeAway has globally. That objective is to create a stronger brand across Asia Pacific - benefiting both our guests and hosts in our collective networks. We want to make sure that you discover the best vacation rentals across the globe with HomeAway.    I’m a travelmob host, what changed? For hosts, your listings will continue to be displayed as is. There is no change to the existing inquiry, booking, service fees and payment process. If you have an existing subscription to HomeAway.com, find out how you can access your HomeAway.com dashboard here.   I was a previous travelmob guest and have an account, what changed? For guests, you can still access your account here.  There is no change to how you make inquiries or bookings on our site. You can still search for the accommodation that match your needs, contact the hosts, then book using our secure payment system. In fact, we have a lot more listings globally that you can now book on HomeAway Asia.   Do I need to setup a new account on HomeAway Asia websites? Absolutely not. You can use your travelmob login account details to access your account on the HomeAway Asia websites.   I just booked an accommodation on travelmob. Will this brand change impact my booking? Not at all. You can access your itinerary using the same login details as in travelmob. Don’t forget to bring a copy of your itinerary on your trip. More importantly, have fun on your holidays and safe travels!   As part of this transition, we''ve also updated our Terms & Conditions. Please take a moment to review them. By continuing to use HomeAway, you agree to comply with the updated terms.', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_help_tag`
--

CREATE TABLE `tbl_help_tag` (
  `tag_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_help_tag`
--

INSERT INTO `tbl_help_tag` (`tag_id`, `name`) VALUES
(1, 'tag'),
(3, 'tags'),
(4, 'account'),
(5, 'setting'),
(6, 'work');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_help_topic`
--

CREATE TABLE `tbl_help_topic` (
  `topic_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_help_topic`
--

INSERT INTO `tbl_help_topic` (`topic_id`, `title`, `title_en`, `status`) VALUES
(1, '3', '4', 1),
(2, 'Bắt đầu', 'Getting Started', 1),
(3, 'Tài khoản và cài đặt', 'Account & Settings', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home_slider`
--

CREATE TABLE `tbl_home_slider` (
  `home_slider_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `view_home` tinyint(1) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_home_slider`
--

INSERT INTO `tbl_home_slider` (`home_slider_id`, `image`, `view_home`, `link`) VALUES
(1, '/uploads/homeslider/hom-slider-1.jpg', 1, ''),
(2, '/uploads/homeslider/hom-slider-2.jpg', 1, ''),
(3, '/uploads/homeslider/hom-slider-3.jpg', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_house_type`
--

CREATE TABLE `tbl_house_type` (
  `house_type_id` int(11) NOT NULL,
  `house_type_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `house_type_name_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `description_en` text CHARACTER SET utf8,
  `status` tinyint(4) DEFAULT NULL,
  `filter` tinyint(4) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_house_type`
--

INSERT INTO `tbl_house_type` (`house_type_id`, `house_type_name`, `house_type_name_en`, `description`, `description_en`, `status`, `filter`, `created`) VALUES
(8, 'Nhà riêng', 'House', '', 'aaaaa', 1, NULL, '2016-05-11 10:20:38'),
(9, 'Căn hộ', 'Apartment', '', '', 1, NULL, '2016-05-10 14:40:47'),
(11, 'Resort', 'Resort', '', '', 1, NULL, '2016-05-27 09:52:19'),
(12, 'Khách sạn nhỏ', 'Motel', 'Kiểu loại khách sạn nhỏ có nhiều phòng nhưng không quá 20 phòng. Bao gồm phòng đôi, phòng đơn.... Có phòng tắm tiện nghi, có đầy đủ trang thiết bị như điều hòa , quạt, tivi, Wifi', '', 1, NULL, '2016-08-09 13:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_icon`
--

CREATE TABLE `tbl_icon` (
  `icon_id` tinyint(11) NOT NULL,
  `icon_value` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_icon`
--

INSERT INTO `tbl_icon` (`icon_id`, `icon_value`, `description`, `description_en`) VALUES
(1, 'fa-umbrella', 'Bãi biển', 'Beach'),
(2, 'fa-home', 'Truyền thống', 'Traditional'),
(3, 'fa-camera-retro', 'Cảnh đẹp', 'Views'),
(4, 'fa-shopping-bag', 'Mua sắm', 'Shopping'),
(5, 'fa-arrows', 'Trung tâm thành phố, địa điểm nổi tiếng', 'In the Central Business District, in or around the town centre, in or near famous districts '),
(6, 'fa-pagelines', 'Gần gũi với thiên nhie', 'Natural surroundings '),
(7, 'fa-strikethrough', 'Tiết kiệm', 'Cheap, no-frills accommodations'),
(8, 'fa-heart', 'Lãng mạn', 'Romantic'),
(9, 'fa-users', 'Nhóm', 'Group'),
(10, 'fa-star', 'Đặc biệt', 'Special'),
(11, 'fa-braille', 'Độc đáo', 'Unique'),
(12, 'fa-glass', 'Dạ tiệc', 'Nightlife'),
(13, 'fa-diamond', 'Trang trọng', 'Luxury'),
(14, 'fa-building-o', 'Thành thị', 'City'),
(15, 'fa-area-chart', 'Mạo hiểm', 'Adventure');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_intro_slider`
--

CREATE TABLE `tbl_intro_slider` (
  `intro_slider_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `view_home` tinyint(1) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manager_text`
--

CREATE TABLE `tbl_manager_text` (
  `manager_text_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `title_en` text NOT NULL,
  `content` text NOT NULL,
  `content_en` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_manager_text`
--

INSERT INTO `tbl_manager_text` (`manager_text_id`, `title`, `title_en`, `content`, `content_en`) VALUES
(1, 'Tìm kiếm và Khám phá', 'Search and Explore', 'Tìm chỗ ở phù hợp với ngân sách và phong cách của bạn', 'Find accommodation that suits your budget and style.'),
(2, 'Liên lạc và Đặt chỗ', 'Contact and Book', 'Liên lạc với các chủ nhà tiềm năng, xác nhận ngày du lịch và đặt phòng an toàn.', 'Contact potential hosts, confirm travel dates and book securely.'),
(3, 'Du lịch và Tận hưởng!', 'Travel and Enjoy!', 'Sống như người địa phương ở bất kỳ nơi nào trên thế giới.', 'Live like a local anywhere in the world.'),
(4, 'Tiện nghi & Tiết kiệm hơn', 'Value for money', 'Nghỉ tại nhà ở địa phương thay vì một khách sạn đắt tiền.', 'Stay in a local home instead of an expensive hotel.'),
(5, 'Tận hưởng nhiều không gian hơn', 'Enjoy more space', 'Với chi phí tương đương một phòng khách sạn, bạn có thể thuê toàn bộ căn nhà, đồng nghĩa với việc có thêm nhiều không gian và tiện nghi cho kỳ nghỉ của mình.', 'For the same cost as a hotel room, you can rent an entire home, which means you get access to more space.'),
(6, 'Trải nghiệm như một người bản xứ', 'Live like a local', 'Trải nghiệm cuộc sống bản địa để có một chuyến du lịch đầy màu sắc, chân thực và khó quên.', 'Experience local life for richer, more authentic travels.'),
(7, 'An toàn tuyệt đối', 'We''re secure', 'Với một hệ thống chi trả trực tuyến an toàn, chúng tôi sẽ giúp bạn đảm trách việc thanh toán. Bạn có thể thực hiện giao dịch bằng thẻ tín dụng hoặc thông qua PayPal.', 'We handle all payments for you using a secure online payment system. You can pay via credit card or PayPal.'),
(8, 'Như đang ở nhà', 'Feel at home', 'Sinh hoạt thoải mái như thể bạn đang ở nhà. Chuẩn bị bữa sáng trong nhà bếp của riêng mình, sử dụng tiện nghi giặt ủi hay Wi-Fi mà không phải trả thêm bất kỳ chi phí nào.', 'Enjoy the conveniences of home. Cook breakfast in your own kitchen, use the laundry facilities or Wi-Fi without extra costs.'),
(9, 'Nhiều lựa chọn', 'More choices', 'Từ phòng riêng, căn hộ, biệt thự biệt lập cho đến những căn nhà truyền thống, chúng tôi không ngừng mở rộng danh sách bài đăng của mình.', 'From private rooms to apartments, exotic villas or traditional homes, our list of accommodation is ever growing.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules`
--

CREATE TABLE `tbl_modules` (
  `module_id` varchar(100) NOT NULL,
  `name_lang_key` varchar(100) NOT NULL,
  `sort` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_modules`
--

INSERT INTO `tbl_modules` (`module_id`, `name_lang_key`, `sort`, `active`) VALUES
('Amenities', 'modules_Amenities', 1, 1),
('Area', 'modules_Area', 5, 1),
('Calendar', 'modules_Calendar', 4, 1),
('Config', 'modules_Config', 6, 1),
('Emails', 'modules_Emails', 5, 1),
('Experience', 'modules_Experience', 2, 1),
('Home', 'modules_Home', 8, 1),
('House_type', 'modules_House_type', 3, 1),
('Order_room', 'modules_Order_room', 6, 1),
('Post_room', 'modules_Post_room', 5, 1),
('Report', 'modules_Report', 1, 1),
('Room_type', 'modules_Room_type', 4, 1),
('User', 'modules_User', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modules_actions`
--

CREATE TABLE `tbl_modules_actions` (
  `action_id` varchar(100) NOT NULL,
  `module_id` varchar(100) NOT NULL,
  `action_name_key` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_modules_actions`
--

INSERT INTO `tbl_modules_actions` (`action_id`, `module_id`, `action_name_key`, `sort`) VALUES
('Add', 'Home', 'module_action_add', 3),
('add', 'User', 'module_action_add', 3),
('create', 'Amenities', 'module_action_create', 1),
('create', 'Experience', 'module_action_create', 4),
('create', 'User', 'module_action_add', 3),
('delete', 'Amenities', 'module_action_delete', 3),
('delete', 'Experience', 'module_action_delete', 6),
('delete', 'User', 'module_action_add', 3),
('edit', 'Amenities', 'module_action_edit', 2),
('edit', 'Experience', 'module_action_edit', 5),
('edit', 'User', 'module_action_add', 3),
('search', 'Report', 'module_action_search', 3),
('view', 'Report', 'module_action_view', 3),
('view', 'User', 'module_action_view', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `create` datetime NOT NULL,
  `update` datetime NOT NULL,
  `news_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `title`, `content`, `status`, `create`, `update`, `news_category_id`) VALUES
(1, 'Giới thiệu về chúng tôi', 'Giới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;iGiới thiệu về ch&uacute;ng t&ocirc;i', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 'Tiêu đề 1', 'Ti&ecirc;u đề 1Ti&ecirc;u đề 1Ti&ecirc;u đề 1Ti&ecirc;u đề 1Ti&ecirc;u đề 1', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_category`
--

CREATE TABLE `tbl_news_category` (
  `news_category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `description_en` text NOT NULL,
  `image` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_news_category`
--

INSERT INTO `tbl_news_category` (`news_category_id`, `title`, `title_en`, `description`, `description_en`, `image`, `status`) VALUES
(1, 'Giới thiệu về chúng tôi', 'About us', 'Mô tả 1', 'Tiêu đề 1', '/uploads/news_category/Hydrangeas.jpg', 1),
(2, 'Danh mục 2', 'Danh mục 2', 'Mô tả 2', 'Mô tả 2', '/uploads/news_category/Lighthouse2.jpg', 1),
(3, 'Danh muc 3', 'Danh muc 3', 'Danh muc 3', 'Danh muc 3', '/uploads/news_category/Hydrangeas1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `refer_id` int(11) NOT NULL,
  `post_room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_type` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `guests` int(11) NOT NULL,
  `bill_history_ids` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `refer_id`, `post_room_id`, `user_id`, `payment_type`, `tax`, `payment_status`, `checkin`, `checkout`, `guests`, `bill_history_ids`) VALUES
(29, 14, 14, 8, 9000000, 0, 0, '2016-08-17', '2016-08-20', 4, ''),
(30, 15, 15, 8, 9000000, 0, 0, '2016-08-23', '2016-08-25', 5, ''),
(31, 16, 16, 9, 8580000, 0, 0, '2016-08-31', '2016-09-10', 5, ''),
(32, 0, 14, 9, 8580000, 0, 0, '2016-08-31', '2016-09-10', 5, ''),
(33, 0, 16, 8, 9000000, 0, 0, '2016-08-17', '2016-08-20', 4, ''),
(34, 0, 17, 8, 9000000, 0, 0, '2016-08-23', '2016-08-25', 5, ''),
(91, 0, 19, 5, 40000000, 0, 0, '2016-08-17', '2016-08-20', 3, ''),
(92, 0, 20, 5, 40000000, 0, 0, '2016-08-17', '2016-08-20', 3, ''),
(93, 18, 18, 5, 40000000, 0, 0, '2016-08-17', '2016-08-20', 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permissions`
--

CREATE TABLE `tbl_permissions` (
  `module_id` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_permissions`
--

INSERT INTO `tbl_permissions` (`module_id`, `role_id`) VALUES
('Amenities', 1),
('Area', 1),
('BillHistory', 1),
('Calendar', 1),
('Config', 1),
('emails', 1),
('Experience', 1),
('FollowSocial', 1),
('Helps', 1),
('Home', 1),
('Home', 2),
('HomeSlider', 1),
('House_type', 1),
('IntroSlider', 1),
('ManagerNews', 1),
('ManagerText', 1),
('News', 1),
('News_category', 1),
('Order_room', 1),
('Order_room', 2),
('payments', 1),
('Post_room', 1),
('Post_room', 2),
('Report', 1),
('Report', 2),
('Room_type', 1),
('User', 1),
('User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permissions_actions`
--

CREATE TABLE `tbl_permissions_actions` (
  `module_id` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `action_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_permissions_actions`
--

INSERT INTO `tbl_permissions_actions` (`module_id`, `role_id`, `action_id`) VALUES
('Home', 1, 'add'),
('Home', 2, 'add'),
('HomeSlider', 1, 'edit'),
('Report', 1, 'search'),
('Report', 1, 'view'),
('Report', 2, 'view'),
('User', 1, 'add'),
('User', 1, 'create'),
('User', 1, 'delete'),
('User', 1, 'edit'),
('User', 1, 'view');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_room`
--

CREATE TABLE `tbl_post_room` (
  `post_room_id` int(11) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `address_id` int(11) NOT NULL,
  `post_room_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_room_name_ascii` varchar(255) NOT NULL,
  `post_room_alias` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8,
  `house_type` int(11) NOT NULL,
  `room_type` int(11) NOT NULL,
  `num_guest` int(11) DEFAULT NULL,
  `num_bedroom` int(11) DEFAULT NULL,
  `num_bed` int(11) DEFAULT NULL,
  `type_bed` int(11) DEFAULT NULL,
  `num_bathroom` int(11) DEFAULT NULL,
  `acreage` int(11) DEFAULT NULL,
  `amenities` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `experience` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price_night_vn` decimal(15,0) DEFAULT NULL,
  `price_night_en` decimal(15,0) DEFAULT NULL,
  `price_lastweek_vn` decimal(15,0) DEFAULT NULL,
  `price_lastweek_en` decimal(15,0) DEFAULT NULL,
  `type_last_week` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price_week_vn` decimal(15,0) DEFAULT NULL,
  `price_week_en` decimal(15,0) DEFAULT NULL,
  `price_month_vn` decimal(15,0) DEFAULT NULL,
  `price_month_en` decimal(15,0) DEFAULT NULL,
  `deposit_vn` decimal(15,0) DEFAULT NULL COMMENT 'tiền cọc',
  `deposit_en` decimal(15,0) DEFAULT NULL,
  `price_guest_more_vn` decimal(15,0) DEFAULT NULL,
  `price_guest_more_en` decimal(15,0) DEFAULT NULL,
  `clearning_fee_vn` decimal(15,0) DEFAULT NULL,
  `clearning_fee_en` decimal(15,0) DEFAULT NULL,
  `clearning_type` tinyint(1) DEFAULT NULL COMMENT '1:dọn theo ngày/đêm ,0: dọn 1 lần ở',
  `cancel_police` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `regulations` text CHARACTER SET utf8,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image_list` text CHARACTER SET utf8,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '0:ko hien thi, 1: hien thi'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post_room`
--

INSERT INTO `tbl_post_room` (`post_room_id`, `parent_id`, `address_id`, `post_room_name`, `post_room_name_ascii`, `post_room_alias`, `user_id`, `description`, `house_type`, `room_type`, `num_guest`, `num_bedroom`, `num_bed`, `type_bed`, `num_bathroom`, `acreage`, `amenities`, `experience`, `price_night_vn`, `price_night_en`, `price_lastweek_vn`, `price_lastweek_en`, `type_last_week`, `price_week_vn`, `price_week_en`, `price_month_vn`, `price_month_en`, `deposit_vn`, `deposit_en`, `price_guest_more_vn`, `price_guest_more_en`, `clearning_fee_vn`, `clearning_fee_en`, `clearning_type`, `cancel_police`, `regulations`, `image`, `image_list`, `created`, `updated`, `status`) VALUES
(14, 0, 1, 'BIỆT THỰ HILLTOP', 'BIET THU HILLTOP', NULL, 2, 'Hilltop Villa sẽ mang tới trải nghiệm thực sự thú vị khi từ phòng ngủ du khách có thể phóng tầm nhìn xuống cảnh quan hồ tuyệt đẹp phía trước, phía sau là khuôn viên vườn xanh mát.\r\nQuần thể Biệt thự Hilltop trong không gian tĩnh lặng của rừng thông tạo thành một không gian sống hòa hợp với thiên nhiên.\r\nPhòng ngủ được thiết kế sang trọng, trang nhã phù hợp với nhu cầu nghỉ dưỡng của quý khách.\r\nPhòng tắm được bày trí trang nhã, lịch sự, hiện đại và gần gũi với thiên nhiên.', 11, 1, 8, 6, 4, NULL, 4, 1000, '8,4,3,2,1', NULL, '2200000', '110', '2400000', '115', '7,8', '0', '0', '0', '0', '0', '0', '200000', '10', '0', '0', NULL, '', '', NULL, '["\\/uploads\\/room\\/14.JPG"]', '2016-08-16 00:00:00', '2016-08-22 00:00:00', 1),
(15, 0, 2, 'BIỆT THỰ FOREST', 'BIET THU FOREST', NULL, 2, 'Forest Resort với 42 Villas, khu đón tiếp sang trọng riêng biệt, thư viện rộng lớn, hệ thống nhà hàng, Night club, quầy bar ngoài trời, bể bơi tiêu chuẩn quốc tế là lựa chọn hàng đầu cho những quý khách muốn tận hưởng sự yên tĩnh sang trọng giữa rừng thông tuyệt đẹp của Flamingo Đại Lải Resort.\r\nBiệt thự Forest với 42 căn hướng hồ được thiết kế sang trọng, tiện nghi cho kỳ nghỉ của quý khách', 11, 1, 10, 4, 4, NULL, 4, 1000, '8,2,1', NULL, '3000000', '150', '3300000', '160', '7,8', '0', '0', '0', '0', '0', '0', '500000', '25', '0', '0', NULL, '', '', NULL, '["\\/uploads\\/room\\/13.jpg"]', '2016-08-16 00:00:00', '2016-08-22 00:00:00', 1),
(16, 14, 3, 'BIỆT THỰ HILLTOP phòng 1', 'BIET THU HILLTOP phong 1', NULL, 2, 'Hilltop Villa sẽ mang tới trải nghiệm thực sự thú vị khi từ phòng ngủ du khách có thể phóng tầm nhìn xuống cảnh quan hồ tuyệt đẹp phía trước, phía sau là khuôn viên vườn xanh mát.\r\nQuần thể Biệt thự Hilltop trong không gian tĩnh lặng của rừng thông tạo thành một không gian sống hòa hợp với thiên nhiên.\r\nPhòng ngủ được thiết kế sang trọng, trang nhã phù hợp với nhu cầu nghỉ dưỡng của quý khách.\r\nPhòng tắm được bày trí trang nhã, lịch sự, hiện đại và gần gũi với thiên nhiên.', 11, 5, 2, 2, 2, NULL, 2, 250, '8,4,3,2,1', NULL, '550000', '27', '660000', '30', '7,8', '0', '0', '0', '0', '0', '0', '200000', '10', '0', '0', NULL, '', '', NULL, '["\\/uploads\\/room\\/1_14.jpg"]', '2016-08-16 00:00:00', '2016-08-22 00:00:00', 1),
(17, 15, 4, 'BIỆT THỰ FOREST phòng 1', 'BIET THU FOREST phong 1', NULL, 2, 'Forest Resort với 42 Villas, khu đón tiếp sang trọng riêng biệt, thư viện rộng lớn, hệ thống nhà hàng, Night club, quầy bar ngoài trời, bể bơi tiêu chuẩn quốc tế là lựa chọn hàng đầu cho những quý khách muốn tận hưởng sự yên tĩnh sang trọng giữa rừng thông tuyệt đẹp của Flamingo Đại Lải Resort.\r\nBiệt thự Forest với 42 căn hướng hồ được thiết kế sang trọng, tiện nghi cho kỳ nghỉ của quý khách', 11, 5, 10, 4, 4, NULL, 4, 1000, '8,2,1', NULL, '2000000', '100', '22000000', '110', '8', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '', '', NULL, '["\\/uploads\\/room\\/1_13.jpg"]', '2016-08-16 00:00:00', '2016-08-22 00:00:00', 1),
(18, 0, 5, 'tét upload ảnh', 'tet upload anh', NULL, 2, 'quang Test tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng namTest tỉnh quảng nam', 11, 1, 3, 3, 3, NULL, 3, 100, '8,3,2', NULL, '10000000', '10', '1000000', '10', '8', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '', '', NULL, '["\\/uploads\\/room\\/11.png"]', '2016-08-17 00:00:00', '2016-09-05 00:00:00', 1),
(19, 18, 6, 'test phòng căn nhỏ', 'test phong can nho', NULL, 2, 'test phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏtest phòng căn nhỏ', 9, 5, 2, 2, 2, NULL, 2, 100, '8,4,2', NULL, '11', '11', '22', '22', '8', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '', '', NULL, '["\\/uploads\\/room\\/13.png"]', '2016-08-17 00:00:00', '2016-09-05 00:00:00', 1),
(20, 18, 7, 'test căn nhỏ 3', 'test can nho 3', NULL, 2, 'test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3test căn nhỏ 3', 11, 5, 3, 2, 2, NULL, 2, 11111, '9,8,3,2', NULL, '11', '11', '22', '22', '8', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '', '', NULL, '["\\/uploads\\/room\\/connect_table.png"]', '2016-08-17 00:00:00', '2016-09-05 00:00:00', 1),
(21, 0, 8, 'Biệt thự Lakeview Đại Lại', 'Biet thu Lakeview Dai Lai', NULL, 2, '14 căn biệt thự Lakeview Premium mang đậm không gian nghỉ dưỡng của biệt thự trước hồ với phòng ngủ lớn, bồn tắm đá đặc biệt ngoài trời, thêm vào đó là sân vườn, bể bơi với sàn gỗ và hiên nghỉ rộng rãi.\r\nBiệt thự Lakeview Premium bên hồ Đại Lải tạo không gian nghỉ dưỡng khác biệt, sang trọng, yên tĩnh.\r\nVẻ đẹp tự nhiên xung quanh các căn biệt thự Lakeview Premium với những nhành hoa đầy sắc màu.\r\nLakeview Premium lung linh và yên bình giữa bầu trời đêm Đại Lải.', 11, 1, 10, 10, 2, NULL, 2, 1000, '8,4,2,1', NULL, '2500000', '120', '3000000', '130', '7,8', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '', '', NULL, '["\\/uploads\\/room\\/15.jpg"]', '2016-08-17 00:00:00', '2016-08-22 00:00:00', 1),
(22, 21, 9, 'Biệt thự Lakeview Đại Lại phòng 1', 'Biet thu Lakeview Dai Lai phong 1', NULL, 2, '14 căn biệt thự Lakeview Premium mang đậm không gian nghỉ dưỡng của biệt thự trước hồ với phòng ngủ lớn, bồn tắm đá đặc biệt ngoài trời, thêm vào đó là sân vườn, bể bơi với sàn gỗ và hiên nghỉ rộng rãi.\r\nBiệt thự Lakeview Premium bên hồ Đại Lải tạo không gian nghỉ dưỡng khác biệt, sang trọng, yên tĩnh.\r\nVẻ đẹp tự nhiên xung quanh các căn biệt thự Lakeview Premium với những nhành hoa đầy sắc màu.\r\nLakeview Premium lung linh và yên bình giữa bầu trời đêm Đại Lải.', 11, 5, 2, 3, 2, NULL, 2, 250, '8,4,2,1', NULL, '1474000', '67', '1518000', '69', '8', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '', '', NULL, '["\\/uploads\\/room\\/1_15.jpg"]', '2016-08-17 00:00:00', '2016-08-22 00:00:00', 1),
(23, 21, 10, 'Biệt thự Lakeview Đại Lại phòng 2', 'Biet thu Lakeview Dai Lai phong 2', NULL, 2, '14 căn biệt thự Lakeview Premium mang đậm không gian nghỉ dưỡng của biệt thự trước hồ với phòng ngủ lớn, bồn tắm đá đặc biệt ngoài trời, thêm vào đó là sân vườn, bể bơi với sàn gỗ và hiên nghỉ rộng rãi.\r\nBiệt thự Lakeview Premium bên hồ Đại Lải tạo không gian nghỉ dưỡng khác biệt, sang trọng, yên tĩnh.\r\nVẻ đẹp tự nhiên xung quanh các căn biệt thự Lakeview Premium với những nhành hoa đầy sắc màu.\r\nLakeview Premium lung linh và yên bình giữa bầu trời đêm Đại Lải.', 11, 5, 2, 2, 2, NULL, 2, 240, '8,4,2,1', NULL, '1232000', '56', '1320000', '60', '8', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '', '', NULL, '["\\/uploads\\/room\\/2_15.jpg"]', '2016-08-17 00:00:00', '2016-08-22 00:00:00', 1),
(24, 0, 11, 'Biệt thự Hilltop Deluxe', 'Biet thu Hilltop Deluxe', NULL, 2, 'Nằm biệt lập trên đồi Thiền, Hilltop Deluxe Villa sở hữu hệ thống biệt thự lưu trú với 7 căn, mỗi villa có bể bơi ngoài trời rộng lớn, phòng sauna tiện nghi, quầy bar sang trọng giữa khung cảnh khoáng đạt của rừng thông ngút ngàn như một địa chỉ lãng mạn cho những ai muốn thả mình vào sự trong trẻo của thiên nhiên.\r\n\r\n Biệt thự Hilltop Deluxe với thiết kế độc đáo, bể bơi riêng là lựa chọn lý tưởng cho kỳ nghỉ của quý khách.', 11, 1, 6, 6, 6, NULL, 6, 1000, '8,4,2,1', NULL, '2000000', '100', '2300000', '120', '7,8', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '', '', NULL, '["\\/uploads\\/room\\/1_17.JPG"]', '2016-08-17 00:00:00', '2016-08-22 00:00:00', 1),
(25, 24, 12, 'Biệt thự Hilltop Deluxe phòng 1', 'Biet thu Hilltop Deluxe phong 1', NULL, 2, 'Nằm biệt lập trên đồi Thiền, Hilltop Deluxe Villa sở hữu hệ thống biệt thự lưu trú với 7 căn, mỗi villa có bể bơi ngoài trời rộng lớn, phòng sauna tiện nghi, quầy bar sang trọng giữa khung cảnh khoáng đạt của rừng thông ngút ngàn như một địa chỉ lãng mạn cho những ai muốn thả mình vào sự trong trẻo của thiên nhiên.\r\n\r\n Biệt thự Hilltop Deluxe với thiết kế độc đáo, bể bơi riêng là lựa chọn lý tưởng cho kỳ nghỉ của quý khách.', 11, 5, 2, 2, 2, NULL, 2, 240, '8,4,2', NULL, '1200000', '60', '1280000', '70', '7,8', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '', '', NULL, '["\\/uploads\\/room\\/1_1_17.JPG"]', '2016-08-17 00:00:00', '2016-08-22 00:00:00', 1),
(26, 0, 13, 'Delightful & Cozy Villa Umalas', 'Delightful Cozy Villa Umalas', NULL, 2, 'Villa managed by Optimum Bali. Lowest prices and best services guaranteed. This villa cannot legitimately be offered with better conditions.\r\n\r\nFull time maid and 24H security guard. Mobile phone with local number available.\r\n\r\nPrices included: \r\nFirst morning breakfast \r\nOne way airport transfer min. 5 nights stays \r\nFree return airport transfer min. 10 nights stay \r\n(We can always arrange any kinds of transfers)\r\n\r\nGet discount for staying more than 10 nights stays in Low or High season.* \r\n*Discounts cannot be combined.\r\n\r\nOn request we can arrange: Car & motorbike rental, day tour, cook, baby-sitting, baby cot, high chair, massage spa, laundry & pressing, florist, food delivery etc… Do not hesitate to contact us for any particular request.', 11, 1, 4, 4, 4, NULL, 4, 1000, '8,3,2', NULL, '2000000', '100', '2300000', '120', '7,8', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '', '', NULL, '["\\/uploads\\/room\\/18.jpg"]', '2016-08-17 00:00:00', '2016-08-22 00:00:00', 1),
(27, 26, 14, 'Delightful & Cozy Villa Umalas phòng 1', 'Delightful Cozy Villa Umalas phong 1', NULL, 2, 'Villa managed by Optimum Bali. Lowest prices and best services guaranteed. This villa cannot legitimately be offered with better conditions.\r\n\r\nFull time maid and 24H security guard. Mobile phone with local number available.\r\n\r\nPrices included: \r\nFirst morning breakfast \r\nOne way airport transfer min. 5 nights stays \r\nFree return airport transfer min. 10 nights stay \r\n(We can always arrange any kinds of transfers)\r\n\r\nGet discount for staying more than 10 nights stays in Low or High season.* \r\n*Discounts cannot be combined.\r\n\r\nOn request we can arrange: Car & motorbike rental, day tour, cook, baby-sitting, baby cot, high chair, massage spa, laundry & pressing, florist, food delivery etc… Do not hesitate to contact us for any particular request.', 11, 5, 2, 2, 2, NULL, 2, 250, '8,2', NULL, '1200000', '60', '1280000', '70', '7,8', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', NULL, '', '', NULL, '["\\/uploads\\/room\\/1_18.jpg"]', '2016-08-17 00:00:00', '2016-08-22 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_room_amenities`
--

CREATE TABLE `tbl_post_room_amenities` (
  `post_room_id` int(11) NOT NULL,
  `amenities_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post_room_experience`
--

CREATE TABLE `tbl_post_room_experience` (
  `post_room_id` int(11) NOT NULL,
  `experience_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_provincial`
--

CREATE TABLE `tbl_provincial` (
  `provincial_id` int(11) NOT NULL,
  `provincial_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_provincial`
--

INSERT INTO `tbl_provincial` (`provincial_id`, `provincial_name`, `description`, `created`) VALUES
(1, 'Hà Nội', NULL, NULL),
(2, 'Hải Dương', NULL, NULL),
(3, 'Hải Phòng', NULL, NULL),
(4, 'Hưng Yên', NULL, NULL),
(8, 'Quảng Ninh', '', NULL),
(9, 'Thanh Hóa', '', NULL),
(10, 'TP HCM', '', NULL),
(11, 'An Giang', 'abcádadsad', NULL),
(12, 'Bà Rịa - Vũng Tàu', '', NULL),
(13, 'Bắc Giang', '', NULL),
(14, 'Bắc Kạn', '', NULL),
(15, 'Bạc Liêu', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE `tbl_reset_password` (
  `re_password_id` int(11) NOT NULL,
  `link` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `confirm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text,
  `status` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role_name`, `description`, `status`, `created`, `updated`) VALUES
(1, 'Quản trị viên', NULL, 1, NULL, NULL),
(2, 'Đối tác', NULL, 1, NULL, NULL),
(3, 'Thành viên', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room_type`
--

CREATE TABLE `tbl_room_type` (
  `room_type_id` int(11) NOT NULL,
  `room_type_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `room_type_name_en` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `description_en` text CHARACTER SET utf8,
  `status` tinyint(1) DEFAULT NULL,
  `filter` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_room_type`
--

INSERT INTO `tbl_room_type` (`room_type_id`, `room_type_name`, `room_type_name_en`, `description`, `description_en`, `status`, `filter`, `created`) VALUES
(1, 'Nguyên căn', 'Entire Home', 'aaaaaaaaaaaaaaaaa', 'aaaaaaaaaa', 1, NULL, '2016-05-10 16:49:42'),
(5, 'Phòng riêng', 'Private room', '', '', 1, NULL, '2016-05-10 17:19:17'),
(6, 'Phòng riêng 01', 'Room 01', 'Có đầy đủ tiện nghi , ở tâng 1', '', 0, NULL, '2016-07-27 14:45:07'),
(7, '<>?:"/\\', 'jhghjgj', '', '', 0, NULL, '2016-08-05 08:49:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sidebar`
--

CREATE TABLE `tbl_sidebar` (
  `sidebar_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `name_en` varchar(100) NOT NULL,
  `name_key` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password_old` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ozganzation` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'tochuc-cty',
  `phone` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `gender` tinyint(2) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `avarta` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `provincial_id` int(11) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `workplace` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `country` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '0:block,1:active',
  `role_id` int(1) DEFAULT NULL,
  `profit_rate` float NOT NULL,
  `validate_code` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `last_name`, `first_name`, `user_name`, `email`, `password`, `password_old`, `ozganzation`, `phone`, `gender`, `birthday`, `avarta`, `provincial_id`, `address`, `workplace`, `description`, `country`, `created`, `updated`, `status`, `role_id`, `profit_rate`, `validate_code`) VALUES
(2, 'Bùi Ngọc', 'Hưởng', 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', 'admin', '01678283552', 0, '0000-00-00', '/public/admin/images/1.jpg', 1, '', '', '', 'Việt Nam', '0000-00-00 00:00:00', '2016-08-17 00:00:00', 1, 1, 0, ''),
(3, 'le', 'hai', 'lehai', 'lehai_1991@yahoo.com.vn', 'e10adc3949ba59abbe56e057f20f883e', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-08-16 22:52:52', NULL, 1, 2, 10, ''),
(4, 'Lê xuân', 'Hưng', 'hung01', 'lehai04.1991@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-08-16 22:55:13', NULL, 1, 2, 15, ''),
(5, 'Trần văn', 'Hưng', 'hungtran', 'zefredzocohen@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-08-16 22:56:20', NULL, 1, 2, 17, ''),
(6, 'Lê Văn', 'Lợi', 'leloi01', 'hailv@lifetek.vn', 'e10adc3949ba59abbe56e057f20f883e', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-08-16 22:57:23', NULL, 0, 1, 0, ''),
(7, 'Đoàn Quang', 'Tùng', 'tung01', 'lexuanhung01051994@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-08-16 22:58:41', NULL, 0, 2, 20, ''),
(8, 'Kim Lan', '1', 'Kim_Lan47827', 'kimlan2692@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '01656228578', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 0, ''),
(9, 'lehai', '1', 'lehai70712', 'lehai_19911@yahoo.com.vn', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '012345678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, 0, ''),
(10, 'hoang anh tuan', '1', 'hoang_anh_tuan76922', 'angtt@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, '01656228578', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 3, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  ADD PRIMARY KEY (`amenities_id`);

--
-- Indexes for table `tbl_app_config`
--
ALTER TABLE `tbl_app_config`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `tbl_bill_history`
--
ALTER TABLE `tbl_bill_history`
  ADD PRIMARY KEY (`bill_history_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_email`
--
ALTER TABLE `tbl_email`
  ADD PRIMARY KEY (`email_id`),
  ADD KEY `fk_email_email_email_template` (`email_type`);

--
-- Indexes for table `tbl_email_history`
--
ALTER TABLE `tbl_email_history`
  ADD PRIMARY KEY (`email_history_id`);

--
-- Indexes for table `tbl_email_template`
--
ALTER TABLE `tbl_email_template`
  ADD PRIMARY KEY (`email_template_id`);

--
-- Indexes for table `tbl_experience`
--
ALTER TABLE `tbl_experience`
  ADD PRIMARY KEY (`experience_id`);

--
-- Indexes for table `tbl_follow_social`
--
ALTER TABLE `tbl_follow_social`
  ADD PRIMARY KEY (`follow_social_id`);

--
-- Indexes for table `tbl_glyphicon`
--
ALTER TABLE `tbl_glyphicon`
  ADD PRIMARY KEY (`glyphicon_id`);

--
-- Indexes for table `tbl_help`
--
ALTER TABLE `tbl_help`
  ADD PRIMARY KEY (`help_id`);

--
-- Indexes for table `tbl_help_post_guide`
--
ALTER TABLE `tbl_help_post_guide`
  ADD PRIMARY KEY (`post_guide_id`);

--
-- Indexes for table `tbl_help_tag`
--
ALTER TABLE `tbl_help_tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `tbl_help_topic`
--
ALTER TABLE `tbl_help_topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `tbl_home_slider`
--
ALTER TABLE `tbl_home_slider`
  ADD PRIMARY KEY (`home_slider_id`);

--
-- Indexes for table `tbl_house_type`
--
ALTER TABLE `tbl_house_type`
  ADD PRIMARY KEY (`house_type_id`);

--
-- Indexes for table `tbl_icon`
--
ALTER TABLE `tbl_icon`
  ADD PRIMARY KEY (`icon_id`);

--
-- Indexes for table `tbl_intro_slider`
--
ALTER TABLE `tbl_intro_slider`
  ADD PRIMARY KEY (`intro_slider_id`);

--
-- Indexes for table `tbl_manager_text`
--
ALTER TABLE `tbl_manager_text`
  ADD PRIMARY KEY (`manager_text_id`);

--
-- Indexes for table `tbl_modules`
--
ALTER TABLE `tbl_modules`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `tbl_modules_actions`
--
ALTER TABLE `tbl_modules_actions`
  ADD PRIMARY KEY (`action_id`,`module_id`),
  ADD KEY `fk_modules_actions_modules_1` (`module_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_news_category`
--
ALTER TABLE `tbl_news_category`
  ADD PRIMARY KEY (`news_category_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  ADD PRIMARY KEY (`module_id`,`role_id`),
  ADD KEY `fk_permissions_user` (`role_id`);

--
-- Indexes for table `tbl_permissions_actions`
--
ALTER TABLE `tbl_permissions_actions`
  ADD PRIMARY KEY (`module_id`,`role_id`,`action_id`),
  ADD KEY `fk_permissions_actions_modules_actions` (`action_id`),
  ADD KEY `fk_permissions_actions_modules_user` (`role_id`);

--
-- Indexes for table `tbl_post_room`
--
ALTER TABLE `tbl_post_room`
  ADD PRIMARY KEY (`post_room_id`);

--
-- Indexes for table `tbl_post_room_amenities`
--
ALTER TABLE `tbl_post_room_amenities`
  ADD PRIMARY KEY (`post_room_id`,`amenities_id`);

--
-- Indexes for table `tbl_post_room_experience`
--
ALTER TABLE `tbl_post_room_experience`
  ADD PRIMARY KEY (`post_room_id`,`experience_id`);

--
-- Indexes for table `tbl_provincial`
--
ALTER TABLE `tbl_provincial`
  ADD PRIMARY KEY (`provincial_id`);

--
-- Indexes for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  ADD PRIMARY KEY (`re_password_id`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_room_type`
--
ALTER TABLE `tbl_room_type`
  ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `tbl_sidebar`
--
ALTER TABLE `tbl_sidebar`
  ADD PRIMARY KEY (`sidebar_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_user_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_amenities`
--
ALTER TABLE `tbl_amenities`
  MODIFY `amenities_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_bill_history`
--
ALTER TABLE `tbl_bill_history`
  MODIFY `bill_history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_email`
--
ALTER TABLE `tbl_email`
  MODIFY `email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_email_history`
--
ALTER TABLE `tbl_email_history`
  MODIFY `email_history_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_email_template`
--
ALTER TABLE `tbl_email_template`
  MODIFY `email_template_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_experience`
--
ALTER TABLE `tbl_experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_follow_social`
--
ALTER TABLE `tbl_follow_social`
  MODIFY `follow_social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_glyphicon`
--
ALTER TABLE `tbl_glyphicon`
  MODIFY `glyphicon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_help`
--
ALTER TABLE `tbl_help`
  MODIFY `help_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_help_post_guide`
--
ALTER TABLE `tbl_help_post_guide`
  MODIFY `post_guide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_help_tag`
--
ALTER TABLE `tbl_help_tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_help_topic`
--
ALTER TABLE `tbl_help_topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_home_slider`
--
ALTER TABLE `tbl_home_slider`
  MODIFY `home_slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_house_type`
--
ALTER TABLE `tbl_house_type`
  MODIFY `house_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_icon`
--
ALTER TABLE `tbl_icon`
  MODIFY `icon_id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_intro_slider`
--
ALTER TABLE `tbl_intro_slider`
  MODIFY `intro_slider_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_manager_text`
--
ALTER TABLE `tbl_manager_text`
  MODIFY `manager_text_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_news_category`
--
ALTER TABLE `tbl_news_category`
  MODIFY `news_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `tbl_post_room`
--
ALTER TABLE `tbl_post_room`
  MODIFY `post_room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_provincial`
--
ALTER TABLE `tbl_provincial`
  MODIFY `provincial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  MODIFY `re_password_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_room_type`
--
ALTER TABLE `tbl_room_type`
  MODIFY `room_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_sidebar`
--
ALTER TABLE `tbl_sidebar`
  MODIFY `sidebar_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_email`
--
ALTER TABLE `tbl_email`
  ADD CONSTRAINT `fk_email_email_email_template` FOREIGN KEY (`email_type`) REFERENCES `tbl_email_template` (`email_template_id`);

--
-- Constraints for table `tbl_modules_actions`
--
ALTER TABLE `tbl_modules_actions`
  ADD CONSTRAINT `fk_modules_actions_modules_1` FOREIGN KEY (`module_id`) REFERENCES `tbl_modules` (`module_id`);

--
-- Constraints for table `tbl_permissions`
--
ALTER TABLE `tbl_permissions`
  ADD CONSTRAINT `tbl_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_permissions_actions`
--
ALTER TABLE `tbl_permissions_actions`
  ADD CONSTRAINT `fk_permissions_actions_modules_actions` FOREIGN KEY (`action_id`) REFERENCES `tbl_modules_actions` (`action_id`),
  ADD CONSTRAINT `fk_permissions_actions_role` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`role_id`);

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
