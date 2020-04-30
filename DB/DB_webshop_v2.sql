-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: 30 เม.ย. 2020 เมื่อ 02:58 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webshop2`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `gift_code`
--

CREATE TABLE `gift_code` (
  `id` int(11) NOT NULL,
  `reward_code` varchar(32) NOT NULL,
  `reward_point` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `gift_code`
--

INSERT INTO `gift_code` (`id`, `reward_code`, `reward_point`) VALUES
(17, 'baa3f6e8837d95c1e1392871033de844', 1);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `news`
--

CREATE TABLE `news` (
  `p_id` int(9) NOT NULL,
  `p_head` longtext NOT NULL,
  `p_detail` longtext NOT NULL,
  `p_img` varchar(100) NOT NULL,
  `p_type` int(1) NOT NULL,
  `p_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `news`
--

INSERT INTO `news` (`p_id`, `p_head`, `p_detail`, `p_img`, `p_type`, `p_date`) VALUES
(22, 'ตัวอย่างข่าวสาร NAVySIEGn', 'ตัวอย่างข่าวสาร NAVySIEGn', '054a534523b172c9d647f257279467c0_post.jpg', 1, '30/04/2020 19:53');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `pay_setting`
--

CREATE TABLE `pay_setting` (
  `id` int(11) NOT NULL,
  `wallet_phone` varchar(10) NOT NULL,
  `bonus` int(11) NOT NULL DEFAULT 1,
  `pay_50` float NOT NULL DEFAULT 0,
  `pay_90` float NOT NULL DEFAULT 0,
  `pay_150` float NOT NULL DEFAULT 0,
  `pay_300` float NOT NULL DEFAULT 0,
  `pay_500` float NOT NULL DEFAULT 0,
  `pay_1000` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `pay_setting`
--

INSERT INTO `pay_setting` (`id`, `wallet_phone`, `bonus`, `pay_50`, `pay_90`, `pay_150`, `pay_300`, `pay_500`, `pay_1000`) VALUES
(1, '0812345678', 1, 50, 90, 150, 300, 500, 1000);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `reward_item`
--

CREATE TABLE `reward_item` (
  `item_id` int(11) NOT NULL,
  `item_title` varchar(1000) NOT NULL,
  `item_detail` text NOT NULL,
  `item_price` bigint(9) NOT NULL DEFAULT 0,
  `item_img` varchar(1000) NOT NULL,
  `item_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `reward_item`
--

INSERT INTO `reward_item` (`item_id`, `item_title`, `item_detail`, `item_price`, `item_img`, `item_type`) VALUES
(39, 'Example Reward NAVySIEGn', 'ตัวอย่างรางวัล NAVySIEGn', 1, '763a56ab561b3813fb34b9a44a3c3400_reward.jpg', 'type_1');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `shop_item`
--

CREATE TABLE `shop_item` (
  `item_id` int(11) NOT NULL,
  `item_title` varchar(1000) NOT NULL,
  `item_detail` text NOT NULL,
  `item_price` bigint(9) NOT NULL DEFAULT 0,
  `item_img` varchar(1000) NOT NULL,
  `item_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `shop_item`
--

INSERT INTO `shop_item` (`item_id`, `item_title`, `item_detail`, `item_price`, `item_img`, `item_type`) VALUES
(53, 'Example Item NAVySIEGn', 'ตัวอย่างสินค้า NAVySIEGn', 1, 'add89394ba6796c8e414f83ff50ec225_item.jpg', 'type_1');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `level` int(1) NOT NULL,
  `u_status` int(1) NOT NULL DEFAULT 0,
  `u_name` text NOT NULL,
  `p_word` varchar(1000) NOT NULL,
  `e_mail` text NOT NULL,
  `U_SID` varchar(1000) NOT NULL,
  `user_img` varchar(100) DEFAULT NULL,
  `point` float DEFAULT 0,
  `reward` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `user_profile`
--

INSERT INTO `user_profile` (`id`, `level`, `u_status`, `u_name`, `p_word`, `e_mail`, `U_SID`, `user_img`, `point`, `reward`) VALUES
(0, 7, 1, 'navydesign', 'bmF2eWRlc2lnbnBhZ2U=', 'navydesign@design.com', 'ZTk2MzUzZGU3ODIxZGU2OGU2NTcxODFiNjNmOTQ4Mjc=', NULL, 0, 0);

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `web_setting`
--

CREATE TABLE `web_setting` (
  `id` int(11) NOT NULL,
  `web_name` varchar(100) NOT NULL,
  `web_domain` varchar(100) NOT NULL,
  `web_version` varchar(100) NOT NULL,
  `fp_facebook` varchar(100) NOT NULL,
  `fanpagefb_name` varchar(100) NOT NULL,
  `youtube_clip` varchar(100) NOT NULL,
  `youtube_name` varchar(100) NOT NULL,
  `youtube_ch` varchar(1000) NOT NULL,
  `discord_name` varchar(100) NOT NULL,
  `discord_link` varchar(1000) NOT NULL,
  `web_logo` varchar(100) NOT NULL,
  `login_banner` varchar(100) NOT NULL,
  `regis_banner` varchar(100) NOT NULL,
  `promote_banner` varchar(1000) NOT NULL,
  `web_bg` varchar(100) NOT NULL,
  `slide_1` varchar(100) NOT NULL,
  `slide_2` varchar(100) NOT NULL,
  `slide_3` varchar(100) NOT NULL,
  `slide_4` varchar(100) NOT NULL,
  `slide_5` varchar(100) NOT NULL,
  `web_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `web_setting`
--

INSERT INTO `web_setting` (`id`, `web_name`, `web_domain`, `web_version`, `fp_facebook`, `fanpagefb_name`, `youtube_clip`, `youtube_name`, `youtube_ch`, `discord_name`, `discord_link`, `web_logo`, `login_banner`, `regis_banner`, `promote_banner`, `web_bg`, `slide_1`, `slide_2`, `slide_3`, `slide_4`, `slide_5`, `web_status`) VALUES
(1, 'NAVyDESIGnSITe', 'navydesignsite.com', '2.0.0 (Beta)', 'nanydesignpage', 'NAVy DESIGn', 'cwbsxXC8Xu4', 'SharpAddRoot', 'https://www.youtube.com/channel/UCKxpCwMEj8qNC-3_A5gGd9w', 'NAVyDisCord', 'https://discordapp.com/invite/2XPANRC', '022c98d2_logo.png', 'ace10588_login.jpg', '59367896_regis.jpg', '08c1ee96_promote.jpg', 'background.jpg', '37f6133f_slide1.jpg', 'fe6431b1_slide2.jpg', '01b54fe9_slide3.jpg', '2e9b0da7_slide4.jpg', '68588d81_slide5.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gift_code`
--
ALTER TABLE `gift_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `pay_setting`
--
ALTER TABLE `pay_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reward_item`
--
ALTER TABLE `reward_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `shop_item`
--
ALTER TABLE `shop_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_setting`
--
ALTER TABLE `web_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gift_code`
--
ALTER TABLE `gift_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `p_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pay_setting`
--
ALTER TABLE `pay_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reward_item`
--
ALTER TABLE `reward_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `shop_item`
--
ALTER TABLE `shop_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `web_setting`
--
ALTER TABLE `web_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
