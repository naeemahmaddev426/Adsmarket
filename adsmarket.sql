-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2026 at 09:05 AM
-- Server version: 10.6.23-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adsmarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_name` varchar(255) NOT NULL DEFAULT 'default_value',
  `sub_category_name_type` varchar(255) DEFAULT NULL,
  `sub_category_name` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `condition` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `device` varchar(255) DEFAULT NULL,
  `make_car` varchar(255) DEFAULT NULL,
  `year_update` varchar(255) DEFAULT NULL,
  `kms_driven_no` varchar(255) DEFAULT NULL,
  `feature` varchar(255) DEFAULT NULL,
  `area_square` varchar(255) DEFAULT NULL,
  `area_unit` varchar(255) DEFAULT NULL,
  `furnished` varchar(255) DEFAULT NULL,
  `pro_rent_house_bedroom` varchar(255) DEFAULT NULL,
  `pro_sale_house_bedroom` int(255) DEFAULT NULL,
  `pro_sale_appart_bedroom` varchar(255) DEFAULT NULL,
  `pro_rent_house_bathroom` varchar(255) DEFAULT NULL,
  `pro_sale_house_bathroom` int(255) DEFAULT NULL,
  `pro_sale_appart_bathroom` varchar(255) DEFAULT NULL,
  `pro_rent_appart_bedroom` varchar(255) DEFAULT NULL,
  `pro_rent_apart_bathroom` varchar(255) DEFAULT NULL,
  `construction_state_new` varchar(255) DEFAULT NULL,
  `construction_state_new_rent_house` varchar(255) DEFAULT NULL,
  `pro_sale_appart_floor_level` varchar(255) DEFAULT NULL,
  `pro_sale_shope_floor_level` varchar(255) DEFAULT NULL,
  `pro_sale_portion_bedroom` varchar(255) DEFAULT NULL,
  `pro_sale_portion_bathroom` varchar(255) DEFAULT NULL,
  `pro_sale_portion_floor_level` varchar(255) DEFAULT NULL,
  `no_storeys` varchar(255) DEFAULT NULL,
  `pro_rent_appart_floor` varchar(255) DEFAULT NULL,
  `bedroom2` varchar(255) DEFAULT NULL,
  `bathroom2` varchar(255) DEFAULT NULL,
  `floor_level2` varchar(255) DEFAULT NULL,
  `floor_level_shope_rent` varchar(255) DEFAULT NULL,
  `rent_shope_bathroom` varchar(255) DEFAULT NULL,
  `bedroom_vacation_rent` varchar(255) DEFAULT NULL,
  `bathroom_vacation_rent` varchar(255) DEFAULT NULL,
  `make_bike` varchar(255) DEFAULT NULL,
  `make_bike2` varchar(255) DEFAULT NULL,
  `model_bike` varchar(255) DEFAULT NULL,
  `engine_type` varchar(255) DEFAULT NULL,
  `engine_capacity` varchar(255) DEFAULT NULL,
  `ignition_type` varchar(255) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `registration_city` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `review_name` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `ad_status` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deliverable` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `users_id`, `title`, `description`, `category_name`, `sub_category_name_type`, `sub_category_name`, `brand`, `condition`, `type`, `device`, `make_car`, `year_update`, `kms_driven_no`, `feature`, `area_square`, `area_unit`, `furnished`, `pro_rent_house_bedroom`, `pro_sale_house_bedroom`, `pro_sale_appart_bedroom`, `pro_rent_house_bathroom`, `pro_sale_house_bathroom`, `pro_sale_appart_bathroom`, `pro_rent_appart_bedroom`, `pro_rent_apart_bathroom`, `construction_state_new`, `construction_state_new_rent_house`, `pro_sale_appart_floor_level`, `pro_sale_shope_floor_level`, `pro_sale_portion_bedroom`, `pro_sale_portion_bathroom`, `pro_sale_portion_floor_level`, `no_storeys`, `pro_rent_appart_floor`, `bedroom2`, `bathroom2`, `floor_level2`, `floor_level_shope_rent`, `rent_shope_bathroom`, `bedroom_vacation_rent`, `bathroom_vacation_rent`, `make_bike`, `make_bike2`, `model_bike`, `engine_type`, `engine_capacity`, `ignition_type`, `origin`, `registration_city`, `product`, `price`, `photo`, `location`, `review_name`, `phone_no`, `ad_status`, `created_at`, `updated_at`, `category_id`, `deliverable`, `user_id`) VALUES
(403, '56', 'One bed room apartment available for rent in bahria town', 'Only for families\r\n\r\n* Wi-Fi facility available \r\n\r\n*Two Heat & Cool Invertor Air conditioners \r\n\r\n*Fully furnished one Bedroom Flat at Hamza Tower \r\n\r\n*Separate TV Lounge/Dining Area \r\n\r\n*Fully automatic Front-loaded washing Machine \r\n\r\n* Leather Sofas \r\n\r\n*32\" Brand New Digital LED TV \r\n\r\n* 24/7 on site security guard \r\n\r\n*Fire Alarm System \r\n\r\n*All Communal areas are covered by 23 CCTV Cameras \r\n\r\n*Main Boulevard Location \r\n\r\n*Walking distance from Eiffel Tower and Bahria Grand Mosque \r\n\r\n*On-site parking Area \r\n\r\n*24/7 fully operational Lift / Elevator \r\n\r\n*Three Month Equivalent to Rent as security Deposit plus one-month advance Rent \r\n\r\n*Cutlery and crockery included. \r\n\r\n* 0% dealer Commission \r\n\r\n*Rent Options\r\n\r\nThree Months or more = Rs 40,000/month \r\nLess than three months Rs 50,000/month\r\nDaily basis for short stay = Rs 7000/day \r\nFlat can be rented out on daily monthly or yearly basis Rs 7000/day (All bills included only if taken on a daily rate of Rs 7000/day) Renting a flat for less than three months will be charged on higher rate basis equivalent to Rs 50,000 per month plus electricity gas and maintenance charges (Maintenance Charges are Rs 4000/Month it includes Water bill Elevator maintenance Communal lights cleaning of Communal Areas of the building Cable TV channels Address: 33 A side Main Boulevard Iqbal Block Commercial Area Sector E Bahria Town Lahore (Directions: - Near Clock Tower Roundabout Service Lane of Main Boulevard Bahria Town)', 'Property_for_rent', NULL, 'Apartments_&_Flats_Rent', NULL, NULL, NULL, NULL, NULL, '', '', 'Kitchen,Lounge or Sitting Room', '590', 'Square Feet', 'Furnished', NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '40000', NULL, 'Lahore', NULL, '3014939544', 'active', '2024-11-19 10:26:42', '2024-11-19 10:26:42', NULL, NULL, NULL),
(404, '58', 'Samsung Tablet Tab E 8&amp;amp;amp;amp;#039;inchs Display 2GB Ram 16GB Rom', 'WELCOME TO TOP\r\nBRAND OF ONLINE TABLETS \r\nLAP TABMART. PK\r\n\r\nSPECIFICATIONS : \r\n*Samsung Galaxy Tab E*\r\n8inch Ips Display\r\n2gb Ram\r\n16Storage\r\nData Sim Supported\r\n5000 Mah Battery\r\nAndroid 8\r\n100% Org Glass \r\nBrand New Condition With Box\r\nAvailable At LapnTabmart. pk\r\nBrand New Boxpack*', 'Mobiles', NULL, 'Tablets', 'Samsung', 'Open Box', NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11900', NULL, 'Lahore', NULL, '3022146536', 'active', '2024-11-19 11:39:04', '2024-12-18 16:57:45', NULL, 'Yes', NULL),
(405, '58', 'Sony Ericsson Data Cable', 'ony Ericsson Data Cable (DCU-65)\r\nItem Used\r\nCOMPATIBILITY\r\nSony Ericsson C510, C702i, C901, C902, C903, C905, D750i, F305, G502, G700, G705, G900, J110i,\r\nJ120i, J132, K200i, K220i, K310i, K320i, K330, K510i, K530i, K550i, K610i, K630i, K660i, K750i,\r\nK770i, K790i, K800i, K810i, K850i, M600i, Naite, P1i, P990i, R300, R306, S302, S312, Satio,\r\nSE S500i, SE Z320i, T303, T650i, T700, T707, T715, V630, V640i, W200i, W205, W300i, W302,', 'Mobiles', 'Charging_Cables', 'Accessories', NULL, 'New', 'Others', NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '497', NULL, 'Lahore', NULL, NULL, 'active', '2024-11-19 16:34:57', '2024-11-19 16:35:56', NULL, 'Yes', NULL),
(406, '56', '8 Marla Commercial Plot for Sale In Bahira Town Lahore', '8 Marla Commercial Plot for Sale In Bahira Town Lahore \r\nMain Boulavared  \r\nMost Hot Location Of Bahira Town \r\nNear To Jasmine Mall 2\r\nNear To  99 Mall\r\nAttach with kawait Mall\r\n40\' Fet Wide Parking \r\nAll Utilitys Paid', 'Property_for_sale', NULL, 'Land_&_Plots', NULL, NULL, 'Commercial Plots', NULL, NULL, '', '', '', '8', 'Marla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1400000000', NULL, 'Lahore', NULL, NULL, 'active', '2024-11-20 08:58:43', '2024-11-20 08:58:43', NULL, NULL, NULL),
(407, '58', 'MS Jaguar E-125 2025 | Red Colour Electric Bike', '* Special Discount For Students And Teacher \r\n\r\n* E-125 \r\n\r\n* Lithium Iron Phosphate Battery (Life PO4)\r\n\r\n* Fire Proof Battery (5 Year Battery Life)\r\n\r\n* Contact: \r\n\r\n(/9/2/3/0/3/4/3/4/8/1/8/4/) Arshad Mehmood', 'Bikes', 'Electric_Bikes', 'Motorcycles', NULL, 'New', NULL, NULL, NULL, '2024', '9999', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4 Stroke', '100cc - 149cc', 'Kickstarter', 'Local', 'Lahore', NULL, '255500', NULL, 'Lahore', NULL, NULL, 'active', '2024-11-21 15:10:36', '2024-11-21 15:10:36', NULL, NULL, NULL),
(408, '58', 'sofa bed', 'I am Selling My Sofa Combed, Condition is 10/8. Everything Is ok. Price can be negotiable  for further Details.', 'Furniture_Home_Decor', 'Sofa_Beds', 'Sofa_Chairs', NULL, 'Used', NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20000', NULL, 'Arifwala', NULL, NULL, 'active', '2024-11-27 09:45:04', '2024-11-27 09:52:52', NULL, NULL, NULL),
(409, '58', 'Remington CB4N Flex brush Steam', 'The Flex brush Steam is back with capability of achieving quick flicks, volume and curl and now thanks to its ease of use and versatility, it is at the zeitgeist of fashion forward styles once more. This makes it the perfect tool for taming fringes, working glamorous vintage waves and achieving sculptural shape in flat hair', 'Fashion_Beauty', 'Hair_Care', 'Skin_Hair', NULL, 'New', NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Dryers & Stylers', '3499', NULL, 'Lahore', NULL, NULL, 'active', '2024-12-02 10:15:47', '2024-12-02 10:15:47', NULL, NULL, NULL),
(410, '58', 'Get Your Dream House and 5 Marla house ground floor portion', 'Ground floor portion. \r\nElectricity available, car porch available \r\nNiaz town near gangly chowk/Bilal chowk Multan', 'Property_for_rent', NULL, 'Houses_for_Rent', NULL, NULL, NULL, NULL, NULL, '', '', 'Servant Quarters,Drawing Room,Dining Room,Kitchen,Gym,Store Room', '5', 'Square Feet', 'Furnished', '3', NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, 'Finished', NULL, NULL, NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '45000', NULL, 'Lahore', NULL, NULL, 'active', '2024-12-05 11:18:13', '2024-12-17 13:51:13', NULL, NULL, NULL),
(412, '62', '10 Marla Facing Park', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Property_for_sale', NULL, 'Land_&_Plots', NULL, NULL, 'Plot Form', NULL, NULL, '', '', 'Corner Plot,Park Facing,Electricity,Water Supply,Gas Supply,Boundary Wall', '10', 'Marla', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6500000', NULL, 'Chichawatni', NULL, NULL, 'active', '2025-07-03 06:51:50', '2025-07-03 06:51:50', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `adsbusinesses`
--

CREATE TABLE `adsbusinesses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `interests` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`interests`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adsbusinesses`
--

INSERT INTO `adsbusinesses` (`id`, `name`, `phone_no`, `category_name`, `interests`, `created_at`, `updated_at`) VALUES
(25, 'Naeem Ahmad', '03045566789', 'Mobiles', '\"more_ads\"', '2024-12-19 14:54:57', '2024-12-19 14:54:57'),
(26, 'usamn', '03274272494', 'Property_for_rent', '\"other_upgrades\"', '2024-12-20 06:49:23', '2024-12-20 06:49:23'),
(27, 'Testing', '03040400034', 'Mobiles', '\"more_ads\"', '2024-12-20 08:48:25', '2024-12-20 08:48:25'),
(28, 'usamn', '03040400034', 'Vehicles', '\"other_upgrades\"', '2024-12-19 12:31:08', '2024-12-19 12:31:08'),
(29, 'Testing', '03040400033', 'Vehicles', '\"other_upgrades\"', '2024-12-19 12:36:14', '2024-12-19 12:36:14'),
(30, 'ahmad', '03040400034', 'Mobiles', '\"other_upgrades\"', '2024-12-19 12:37:43', '2024-12-19 12:37:43');

-- --------------------------------------------------------

--
-- Table structure for table `adsimages`
--

CREATE TABLE `adsimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adsimages`
--

INSERT INTO `adsimages` (`id`, `ad_id`, `image_path`, `created_at`, `updated_at`) VALUES
(662, 403, 'assets/images/56/1732012003-IMG-20241119-WA0265.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(663, 403, 'assets/images/56/1732012003-IMG-20241119-WA0263.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(664, 403, 'assets/images/56/1732012003-IMG-20241119-WA0253.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(665, 403, 'assets/images/56/1732012003-IMG-20241119-WA0258.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(666, 403, 'assets/images/56/1732012003-IMG-20241119-WA0251.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(667, 403, 'assets/images/56/1732012003-IMG-20241119-WA0249.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(668, 403, 'assets/images/56/1732012003-IMG-20241119-WA0254.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(669, 403, 'assets/images/56/1732012003-IMG-20241119-WA0255.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(670, 403, 'assets/images/56/1732012003-IMG-20241119-WA0256.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(671, 403, 'assets/images/56/1732012003-IMG-20241119-WA0259.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(672, 403, 'assets/images/56/1732012003-IMG-20241119-WA0252.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(673, 403, 'assets/images/56/1732012003-IMG-20241119-WA0250.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(674, 403, 'assets/images/56/1732012003-IMG-20241119-WA0260.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(675, 403, 'assets/images/56/1732012003-IMG-20241119-WA0261.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(676, 403, 'assets/images/56/1732012003-IMG-20241119-WA0262.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(677, 403, 'assets/images/56/1732012003-IMG-20241119-WA0247.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(678, 403, 'assets/images/56/1732012003-IMG-20241119-WA0264.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(679, 403, 'assets/images/56/1732012003-IMG-20241119-WA0257.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(680, 403, 'assets/images/56/1732012003-IMG-20241119-WA0268.jpg', '2024-11-19 10:26:43', '2024-11-19 10:26:43'),
(681, 404, 'assets/images/58/1732016344-498797369-800x600.webp', '2024-11-19 11:39:04', '2024-11-19 11:39:04'),
(682, 404, 'assets/images/58/1732016344-498797372-800x600.webp', '2024-11-19 11:39:04', '2024-11-19 11:39:04'),
(683, 404, 'assets/images/58/1732016344-498797371-800x600.webp', '2024-11-19 11:39:04', '2024-11-19 11:39:04'),
(684, 404, 'assets/images/58/1732016344-498797370-800x600.webp', '2024-11-19 11:39:04', '2024-11-19 11:39:04'),
(685, 404, 'assets/images/58/1732016344-498797373-800x600.webp', '2024-11-19 11:39:04', '2024-11-19 11:39:04'),
(686, 405, 'assets/images/58/1732034097-500511508-800x600.webp', '2024-11-19 16:34:57', '2024-11-19 16:34:57'),
(687, 405, 'assets/images/58/1732034097-500511503-800x600.webp', '2024-11-19 16:34:57', '2024-11-19 16:34:57'),
(688, 405, 'assets/images/58/1732034097-500511501-800x600.webp', '2024-11-19 16:34:57', '2024-11-19 16:34:57'),
(689, 405, 'assets/images/58/1732034097-500083544-800x600.webp', '2024-11-19 16:34:57', '2024-11-19 16:34:57'),
(690, 405, 'assets/images/58/1732034097-500083545-800x600.webp', '2024-11-19 16:34:57', '2024-11-19 16:34:57'),
(691, 406, 'assets/images/56/1732093123-WhatsApp Image 2024-11-20 at 00.58.02_224094f5.jpg', '2024-11-20 08:58:43', '2024-11-20 08:58:43'),
(692, 407, 'assets/images/58/1732201836-441215180-800x600.jfif', '2024-11-21 15:10:36', '2024-11-21 15:10:36'),
(693, 407, 'assets/images/58/1732201836-441215179-800x600.jfif', '2024-11-21 15:10:36', '2024-11-21 15:10:36'),
(694, 407, 'assets/images/58/1732201836-441215178-800x600.jfif', '2024-11-21 15:10:36', '2024-11-21 15:10:36'),
(695, 407, 'assets/images/58/1732201836-441215177-800x600.jfif', '2024-11-21 15:10:36', '2024-11-21 15:10:36'),
(696, 407, 'assets/images/58/1732201836-441215176-800x600.jfif', '2024-11-21 15:10:36', '2024-11-21 15:10:36'),
(697, 407, 'assets/images/58/1732201836-441215175-800x600.jfif', '2024-11-21 15:10:36', '2024-11-21 15:10:36'),
(698, 407, 'assets/images/58/1732201836-441215174-800x600.jfif', '2024-11-21 15:10:36', '2024-11-21 15:10:36'),
(699, 407, 'assets/images/58/1732201836-441215173-800x600.jfif', '2024-11-21 15:10:36', '2024-11-21 15:10:36'),
(700, 407, 'assets/images/58/1732201836-441215172-800x600.jfif', '2024-11-21 15:10:36', '2024-11-21 15:10:36'),
(701, 407, 'assets/images/58/1732201836-441215171-800x600.jfif', '2024-11-21 15:10:36', '2024-11-21 15:10:36'),
(702, 407, 'assets/images/58/1732201836-441215170-800x600.jfif', '2024-11-21 15:10:36', '2024-11-21 15:10:36'),
(703, 407, 'assets/images/58/1732201836-441215169-800x600.jfif', '2024-11-21 15:10:36', '2024-11-21 15:10:36'),
(704, 408, 'assets/images/58/1732700704-503752142-800x600.webp', '2024-11-27 09:45:04', '2024-11-27 09:45:04'),
(705, 408, 'assets/images/58/1732700704-503752141-800x600.webp', '2024-11-27 09:45:04', '2024-11-27 09:45:04'),
(706, 408, 'assets/images/58/1732700704-503752140-800x600.webp', '2024-11-27 09:45:04', '2024-11-27 09:45:04'),
(707, 408, 'assets/images/58/1732700704-503752139-800x600.webp', '2024-11-27 09:45:04', '2024-11-27 09:45:04'),
(708, 409, 'assets/images/58/1733134547-482108808-800x600.webp', '2024-12-02 10:15:47', '2024-12-02 10:15:47'),
(709, 409, 'assets/images/58/1733134547-482108807-800x600.webp', '2024-12-02 10:15:47', '2024-12-02 10:15:47'),
(710, 409, 'assets/images/58/1733134547-482108806-800x600.webp', '2024-12-02 10:15:47', '2024-12-02 10:15:47'),
(711, 409, 'assets/images/58/1733134547-482108805-800x600.webp', '2024-12-02 10:15:47', '2024-12-02 10:15:47'),
(712, 409, 'assets/images/58/1733134547-482108804-800x600.webp', '2024-12-02 10:15:47', '2024-12-02 10:15:47'),
(713, 410, 'assets/images/58/1733397493-505130249-800x600.webp', '2024-12-05 11:18:13', '2024-12-05 11:18:13'),
(714, 410, 'assets/images/58/1733397493-505130248-800x600.webp', '2024-12-05 11:18:13', '2024-12-05 11:18:13'),
(715, 410, 'assets/images/58/1733397493-505130247-800x600.webp', '2024-12-05 11:18:13', '2024-12-05 11:18:13'),
(716, 410, 'assets/images/58/1733397493-505130239-800x600.webp', '2024-12-05 11:18:13', '2024-12-05 11:18:13'),
(717, 411, 'assets/images/58/1734515085-495108964-800x600.webp', '2024-12-18 09:44:45', '2024-12-18 09:44:45'),
(718, 412, 'assets/images/62/1751529110-pf8.jpeg', '2025-07-03 06:51:50', '2025-07-03 06:51:50'),
(719, 412, 'assets/images/62/1751529110-pf9.jpeg', '2025-07-03 06:51:50', '2025-07-03 06:51:50'),
(720, 412, 'assets/images/62/1751529110-pf5.jpeg', '2025-07-03 06:51:50', '2025-07-03 06:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `ads_images`
--

CREATE TABLE `ads_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `path` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `path`, `type`, `created_at`, `updated_at`) VALUES
(1, 'banners/SYaF86ssDkYxDxOB3PjWEcfVxihJgKX77AnpwvdW.png', 'home', '2024-08-01 10:45:13', '2024-08-01 10:45:13'),
(2, 'banners/KOfb414YAewRgVDSKZe4p1YscO5RCNORSy4If6Et.png', 'product', '2024-08-01 10:54:52', '2024-08-01 10:54:52'),
(3, 'banners/FaK78XE7i4IclbSrjnO3NNfjx22IKwYVtVAKihch.png', 'product_detail', '2024-08-01 10:56:42', '2024-08-01 10:56:42'),
(4, 'banners/AQhHFYpil6XHwSDKf67bP32M44IF4JFnseYWMgYx.png', 'contact', '2024-08-01 10:58:18', '2024-08-01 10:58:18');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('054772bc2295597066886d8ff53f2426', 'i:1;', 1739291890),
('054772bc2295597066886d8ff53f2426:timer', 'i:1739291890;', 1739291890),
('10c4086eebe92ff049c1020341b7eea4', 'i:1;', 1733303863),
('10c4086eebe92ff049c1020341b7eea4:timer', 'i:1733303863;', 1733303863),
('20bbbb155984ff17d7ea4c9e8c29983e', 'i:1;', 1733302203),
('20bbbb155984ff17d7ea4c9e8c29983e:timer', 'i:1733302203;', 1733302203),
('234e723a85b0c2db204f490eb6cd9089', 'i:1;', 1735150206),
('234e723a85b0c2db204f490eb6cd9089:timer', 'i:1735150206;', 1735150206),
('23ada42ebea5250b8e3ee737d84af653', 'i:1;', 1756817230),
('23ada42ebea5250b8e3ee737d84af653:timer', 'i:1756817230;', 1756817230),
('677fc90c9bcebba732c14e4438434112', 'i:3;', 1734342936),
('677fc90c9bcebba732c14e4438434112:timer', 'i:1734342936;', 1734342936),
('827bfc458708f0b442009c9c9836f7e4b65557fb', 'i:6;', 1731566081),
('827bfc458708f0b442009c9c9836f7e4b65557fb:timer', 'i:1731566081;', 1731566081),
('8a5572a709bdd8db5b26d1ebf0000911', 'i:1;', 1732125120),
('8a5572a709bdd8db5b26d1ebf0000911:timer', 'i:1732125120;', 1732125120),
('978e9b6927f04ba1629afd832782c5ac', 'i:1;', 1731566161),
('978e9b6927f04ba1629afd832782c5ac:timer', 'i:1731566161;', 1731566161),
('a9334987ece78b6fe8bf130ef00b74847c1d3da6', 'i:1;', 1731621876),
('a9334987ece78b6fe8bf130ef00b74847c1d3da6:timer', 'i:1731621876;', 1731621876),
('ahmad@gmail.com|119.155.33.244', 'i:3;', 1734342936),
('ahmad@gmail.com|119.155.33.244:timer', 'i:1734342936;', 1734342936),
('ahmad@gmail.com|182.185.141.70', 'i:1;', 1733302203),
('ahmad@gmail.com|182.185.141.70:timer', 'i:1733302203;', 1733302203),
('ali9876@gmail.com|182.185.141.70', 'i:2;', 1733302310),
('ali9876@gmail.com|182.185.141.70:timer', 'i:1733302310;', 1733302310),
('b9f66f8d5264fc963f10af538e8cdf84', 'i:2;', 1733302310),
('b9f66f8d5264fc963f10af538e8cdf84:timer', 'i:1733302310;', 1733302310),
('bd2f80c4c429cd455190b97dfc6a1e9b', 'i:1;', 1734343093),
('bd2f80c4c429cd455190b97dfc6a1e9b:timer', 'i:1734343093;', 1734343093),
('c309a830577d8c5d5fbfa3a1db60159b', 'i:1;', 1731589741),
('c309a830577d8c5d5fbfa3a1db60159b:timer', 'i:1731589741;', 1731589741),
('c78d4c43f6c68a47c29b77d0acc310e2', 'i:1;', 1732270383),
('c78d4c43f6c68a47c29b77d0acc310e2:timer', 'i:1732270383;', 1732270383),
('cd6bb57e6b4b4dddacaf0894384eaf4d', 'i:1;', 1731589553),
('cd6bb57e6b4b4dddacaf0894384eaf4d:timer', 'i:1731589553;', 1731589553),
('e1822db470e60d090affd0956d743cb0e7cdf113', 'i:1;', 1731567521),
('e1822db470e60d090affd0956d743cb0e7cdf113:timer', 'i:1731567521;', 1731567521),
('fb5788156588b25ccaee35b181111466', 'i:1;', 1751529320),
('fb5788156588b25ccaee35b181111466:timer', 'i:1751529320;', 1751529320),
('fe2ef495a1152561572949784c16bf23abb28057', 'i:2;', 1731565568),
('fe2ef495a1152561572949784c16bf23abb28057:timer', 'i:1731565568;', 1731565568),
('naeemahmadg7@gmail.com|119.155.33.244', 'i:1;', 1734343093),
('naeemahmadg7@gmail.com|119.155.33.244:timer', 'i:1734343093;', 1734343093),
('naeemahmadg7@gmail.com|127.0.0.1', 'i:1;', 1731566161),
('naeemahmadg7@gmail.com|127.0.0.1:timer', 'i:1731566161;', 1731566161),
('naeemahmadg7@gmail.com|182.185.141.70', 'i:1;', 1733303863),
('naeemahmadg7@gmail.com|182.185.141.70:timer', 'i:1733303863;', 1733303863),
('naeemahmadg7@gmail.com|182.185.148.99', 'i:1;', 1735150207),
('naeemahmadg7@gmail.com|182.185.148.99:timer', 'i:1735150207;', 1735150207),
('naeemahmadg7@gmail.com|182.185.177.35', 'i:1;', 1751529320),
('naeemahmadg7@gmail.com|182.185.177.35:timer', 'i:1751529320;', 1751529320),
('naeemahmadg7@gmail.com|182.185.182.48', 'i:1;', 1739291890),
('naeemahmadg7@gmail.com|182.185.182.48:timer', 'i:1739291890;', 1739291890),
('naeemahmadg7@gmail.com|39.37.151.242', 'i:1;', 1732270384),
('naeemahmadg7@gmail.com|39.37.151.242:timer', 'i:1732270384;', 1732270384),
('naeemahmadg7@gmail.com|39.37.175.102', 'i:1;', 1756817231),
('naeemahmadg7@gmail.com|39.37.175.102:timer', 'i:1756817231;', 1756817231),
('naeemahmadg7@gmail.com|39.49.157.68', 'i:1;', 1732125121),
('naeemahmadg7@gmail.com|39.49.157.68:timer', 'i:1732125121;', 1732125121);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `sub_category_name` varchar(255) DEFAULT NULL,
  `extra_sub_category_name` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `sub_category_name`, `extra_sub_category_name`, `category_image`, `created_at`, `updated_at`) VALUES
(1, 'Mobiles', 'tablets', NULL, 'assets/images/1723250772_mobile.png', '2024-07-05 11:03:34', '2024-08-10 07:46:12'),
(2, 'Vehicles', NULL, NULL, 'assets/images/1723250783_car.png', '2024-07-05 11:04:14', '2024-08-10 07:46:23'),
(3, 'Property_for_sale', NULL, NULL, 'assets/images/1723250794_1721951311_property_sale.png', '2024-07-05 11:04:54', '2024-08-10 07:46:34'),
(4, 'Property_for_rent', NULL, NULL, 'assets/images/1723250820_rent.png', '2024-07-05 11:05:09', '2024-08-10 07:47:00'),
(5, 'Bikes', NULL, NULL, 'assets/images/1723250830_1721951344_bike.png', '2024-07-05 11:05:22', '2024-08-10 07:47:10'),
(6, 'Furniture_Home_Decor', NULL, NULL, 'assets/images/1723250845_1721951361_chairs.png', '2024-07-05 11:05:50', '2024-08-10 07:47:25'),
(7, 'Fashion_Beauty', NULL, NULL, 'assets/images/1723250864_fashion.png', '2024-07-05 11:06:04', '2024-08-10 07:47:44');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(32, 'Naeem Ahmad', 'naeemahmadm98765@gmail.com', 'adsmarkit', 'hello', '2024-07-25 11:46:26', '2024-07-25 11:46:26'),
(33, 'Naeem Ahmad', 'naeemahmadm98765@gmail.com', 'adsmarkit', 'this is the best of the world website good job for this his make the designer', '2024-07-26 03:42:52', '2024-07-26 03:42:52'),
(34, 'Naeem Ahmad', 'naeemahmadm98765@gmail.com', 'adsmarkit', 'this is the best of the world website good job for this his make the designer', '2024-07-26 03:48:24', '2024-07-26 03:48:24'),
(35, 'Naeem Ahmad', 'naeemahmadm98765@gmail.com', 'adsmarkit', 'this is the best of the world website good job for this his make the designer', '2024-07-26 03:51:13', '2024-07-26 03:51:13'),
(36, 'Testing', 'ali9876@gmail.com', 'designer web', 'this is the best of the world web site', '2024-07-26 04:16:15', '2024-07-26 04:16:15'),
(37, 'Testing', 'ali9876@gmail.com', 'adsmarkit', 'this is the best of the world', '2024-07-26 04:18:52', '2024-07-26 04:18:52'),
(38, 'Naeem Ahmad', 'ali9876@gmail.com', 'test subject', 'test email', '2024-07-26 05:54:15', '2024-07-26 05:54:15'),
(39, 'Testing', 'ali9876@gmail.com', 'adsmarkit', 'this is good', '2024-10-26 05:58:10', '2024-10-26 05:58:10'),
(40, 'usamn', 'ali9876@gmail.com', 'hi', 'this so good', '2024-11-09 07:38:03', '2024-11-09 07:38:03'),
(41, 'Naeem Ahmad', 'naeemahmadg7@gmail.com', 'most beautiful things', 'this the most beautiful girl in the world please but than now you are creazy', '2024-11-14 06:06:23', '2024-11-14 06:06:23'),
(42, 'usamn', 'naeemahmadn123@gmail.com', 'tablets', 'this  it he', '2024-11-14 11:33:00', '2024-11-14 11:33:00'),
(43, 'Matt Bacak', 'mattbacak2025@gmail.com', '⚡ This AI Link Could Stack $250/Day From Your Phone', 'Hey,\r\n\r\n\r\nIn less than 24 hours, Fast Money Bot opens to the public — and it’s about to flip everything we thought we knew about phone income.\r\nThere’s no tech.\r\n No selling.\r\n No content creation.\r\nJust one AI-powered link — and a place to paste it.\r\n Once you do:\r\n ✅ 10+ income streams activate\r\n ✅ Your setup is done\r\n ✅ Daily payouts could start stacking automatically\r\n\r\n\r\nFor more click here : https://jvz6.com/c/688203/428277/', '2025-11-28 17:05:48', '2025-11-28 17:05:48'),
(44, 'Bradley Barreiro', 'bradley.barreiro@gmail.com', 'Rate|Daily Operations Made Easier With a $250 VA|A Full-Time VA Without Full-Time', 'Hello there,\r\n\r\nFull-time Digital Marketing Assistant for $250/month, first month\r\nfree.\r\nCovers SEO, ads, email, social media, and daily marketing tasks.\r\nFill out the form to get started.\r\n\r\nDirect Google link: https://docs.google.com/forms/d/e/1FAIpQLSdfVsEbHZ8ONCILtiWxC8Nz4dMDX4XytsWbDm9ZehvJq0dshA/viewform\r\n\r\nGLE Link to Google Forms: https://forms.gle/hUcK6pGk3DeYNonL7\r\n\r\nShort link: https://shorturl.at/sIc0l', '2026-01-02 17:10:36', '2026-01-02 17:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `email_verifications`
--

CREATE TABLE `email_verifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorite_view`
--

CREATE TABLE `favorite_view` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ad_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `view` tinyint(1) NOT NULL DEFAULT 0,
  `like` tinyint(1) NOT NULL DEFAULT 0,
  `phone_view` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorite_view`
--

INSERT INTO `favorite_view` (`id`, `ad_id`, `users_id`, `view`, `like`, `phone_view`, `created_at`, `updated_at`) VALUES
(22, 403, 58, 7, 1, 1, '2024-11-19 13:51:51', '2024-12-06 10:47:30'),
(23, 406, 58, 2, 0, 0, '2024-11-20 11:07:58', '2024-11-21 13:24:42'),
(24, 406, 59, 1, 0, 0, '2024-11-21 09:56:58', '2024-11-21 09:56:58'),
(25, 405, 59, 1, 0, 0, '2024-11-21 09:57:36', '2024-11-21 09:57:36'),
(26, 404, 59, 1, 0, 1, '2025-01-17 09:11:39', '2025-01-17 09:11:57'),
(27, 412, 59, 0, 1, 0, '2025-07-03 06:54:28', '2025-07-03 06:54:28'),
(28, 412, 58, 1, 0, 0, '2025-07-03 06:54:35', '2025-07-03 06:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '0001_01_01_000000_create_users_table', 1),
(9, '0001_01_01_000001_create_cache_table', 1),
(10, '0001_01_01_000002_create_jobs_table', 1),
(11, '2024_05_28_102220_add_two_factor_columns_to_users_table', 1),
(12, '2024_05_28_102247_create_personal_access_tokens_table', 1),
(13, '2024_05_29_164804_add_phone_no_to_users_table', 1),
(14, '2024_05_29_165007_add_role_to_users_table', 1),
(16, '2024_05_30_081346_add_phone_no_and_role_to_users_table', 2),
(17, '2024_06_06_114055_create_ads_table', 3),
(18, '2024_06_13_010445_add_user_id_to_ads_table', 3),
(19, '2024_06_13_014745_make_category_name_nullable_in_ads_table', 3),
(20, '2024_06_13_014845_add_default_value_to_category_name_in_ads_table', 3),
(21, '2024_06_13_015257_make_sub_category_name_nullable_in_ads_table', 3),
(22, '2024_06_13_020730_add_photos_to_ads_table', 3),
(23, '2024_06_14_021409_rename_photos_column_in_ads_table', 3),
(24, '2024_06_19_211448_modify_user_id_in_ads_table', 3),
(25, '2024_06_21_002042_create_adsimages_table', 3),
(26, '2024_07_03_212543_create_categories_table', 4),
(27, '2024_07_03_223008_remove_user_id_from_categories_table', 5),
(28, '2024_07_03_230909_modify_image_path_nullable_in_categories_table', 6),
(29, '2024_07_03_231839_revert_modify_image_path_nullable_in_categories_table', 7),
(30, '2024_07_11_043747_contact', 8),
(31, '2024_07_16_200326_create_sub_categories_table', 9),
(33, '2024_07_16_205236_create_sub_category_name_type_table', 3),
(34, '2024_07_26_200905_create_ads_images_table', 10),
(35, '2024_08_01_030018_create_banners_table', 10),
(36, '2024_08_06_235813_add_phone_verified_to_users_table', 11),
(37, '2024_08_08_010302_add_google_id_to_users_table', 12),
(38, '2024_08_09_212259_add_category_id_to_ads_table', 13),
(39, '2024_09_13_194740_add_deliverable_column_to_ad_table', 14),
(41, '2024_10_10_024427_add_make_bike2_to_ads_table', 15),
(44, '2024_10_16_205832_add_make_bike2_to_ads_table', 16),
(45, '2024_10_23_213231_create_favorite_view_table', 17),
(46, '2024_10_25_043331_create_notifications_table', 18),
(47, '2024_11_14_024010_create_email_verifications_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('05fbc010-e1ed-4406-9a4d-b7f346563598', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 20, '{\"ad_id\":402,\"message\":\"Your ad is live created\"}', '2024-11-12 12:45:38', '2024-11-12 12:43:56', '2024-11-12 12:45:38'),
('06595bd8-dfb9-493b-8138-ff288f80e88c', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":410,\"message\":\"Your ad is live created\"}', '2024-12-05 11:18:17', '2024-12-05 11:18:13', '2024-12-05 11:18:17'),
('06d2c320-7fdc-485f-bfb9-9716bf8922fb', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":391,\"message\":\"Your ad is live created\"}', '2024-10-30 05:12:50', '2024-10-30 05:12:36', '2024-10-30 05:12:50'),
('12f01793-d567-40b6-a3dd-17412de67b23', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":395,\"message\":\"Your ad is live created\"}', '2024-10-30 06:57:38', '2024-10-30 06:57:19', '2024-10-30 06:57:38'),
('13962304-d35f-49c5-bdb9-3c7d10f1656a', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":408,\"message\":\"Your ad is live created\"}', '2024-11-27 09:45:14', '2024-11-27 09:45:04', '2024-11-27 09:45:14'),
('142658b3-be70-411e-a072-78445169c0f3', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":390,\"message\":\"Your ad is live created\"}', '2024-10-29 06:57:12', '2024-10-29 06:57:04', '2024-10-29 06:57:12'),
('19781cc5-00b5-4f04-ad1b-f8790bb8129d', 'App\\Notifications\\AdsbusinessNotification', 'App\\Models\\User', 37, '{\"id\":28,\"message\":\"Adsmarket for business has Contact for usamn\"}', NULL, '2024-12-19 12:31:08', '2024-12-19 12:31:08'),
('2dc54257-8692-4045-9ed0-70ab9d8ecbfb', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":388,\"message\":\"Your ad has been created\"}', '2024-10-26 10:55:49', '2024-10-25 11:51:30', '2024-10-26 10:55:49'),
('37dbc605-92ec-4703-81dc-268e8b44ba16', 'App\\Notifications\\AdsbusinessNotification', 'App\\Models\\User', 60, '{\"id\":28,\"message\":\"Adsmarket for business has Contact for usamn\"}', '2024-12-19 12:32:05', '2024-12-19 12:31:08', '2024-12-19 12:32:05'),
('396eaf23-4a3d-46c8-95b0-8a21975a6e7e', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":396,\"message\":\"Your ad is live created\"}', '2024-10-31 06:34:46', '2024-10-31 06:31:07', '2024-10-31 06:34:46'),
('3a2df443-0161-483b-a889-8bd052b3d365', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":405,\"message\":\"Your ad is live updated\"}', '2024-11-19 16:36:02', '2024-11-19 16:35:56', '2024-11-19 16:36:02'),
('3bfffd89-267f-4728-86a7-3304be1cae1f', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":404,\"message\":\"Your ad is live created\"}', '2024-11-19 11:44:46', '2024-11-19 11:39:04', '2024-11-19 11:44:46'),
('3c428641-ec0b-4f12-889d-397cd897efd0', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":393,\"message\":\"Your ad is live created\"}', '2024-10-30 05:37:19', '2024-10-30 05:30:35', '2024-10-30 05:37:19'),
('3f7c3656-e348-4633-a2bd-2390f575574f', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":411,\"message\":\"Your ad is live created\"}', '2024-12-18 09:44:50', '2024-12-18 09:44:45', '2024-12-18 09:44:50'),
('40305446-d8c2-4ac4-a7cc-3a359175c535', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":172,\"message\":\"Your ad has been updated\"}', '2024-10-29 04:41:12', '2024-10-29 04:40:44', '2024-10-29 04:41:12'),
('4746f4a6-fc4d-4ab1-9819-a6aa2f1dee0e', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":409,\"message\":\"Your ad is live created\"}', '2024-12-02 10:15:55', '2024-12-02 10:15:47', '2024-12-02 10:15:55'),
('52910eeb-09b5-49ff-83bc-a370b4a0a085', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":164,\"message\":\"Your ad is live updated\"}', '2024-10-31 04:46:31', '2024-10-31 04:46:21', '2024-10-31 04:46:31'),
('5611f7cc-8006-4013-b2a2-e2f8d96f74c3', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":405,\"message\":\"Your ad is live created\"}', '2024-11-19 16:35:04', '2024-11-19 16:34:57', '2024-11-19 16:35:04'),
('5dcb720c-cc70-47c6-bf1e-5b3f0058e1c1', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":410,\"message\":\"Your ad is live updated\"}', '2024-12-17 13:50:42', '2024-12-17 13:50:38', '2024-12-17 13:50:42'),
('5e3ef47c-acc6-4f20-a4e0-b17eb071bc14', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":389,\"message\":\"Your ad has been created\"}', '2024-10-29 03:35:23', '2024-10-26 11:44:15', '2024-10-29 03:35:23'),
('5e537ec0-409c-4147-bf2b-206ce20eeeda', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":407,\"message\":\"Your ad is live created\"}', '2024-11-21 15:10:45', '2024-11-21 15:10:36', '2024-11-21 15:10:45'),
('607856b0-05ba-4727-866f-416d99bc01e2', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":410,\"message\":\"Your ad is live updated\"}', '2024-12-17 13:53:09', '2024-12-17 13:53:06', '2024-12-17 13:53:09'),
('6a824331-5451-4cb5-923e-cba8eef2b89c', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":404,\"message\":\"Your ad is live updated\"}', '2024-11-19 14:16:25', '2024-11-19 14:16:19', '2024-11-19 14:16:25'),
('6c220dd9-6bdc-475f-a5e1-29e55cbb780b', 'App\\Notifications\\AdsbusinessNotification', 'App\\Models\\User', 37, '{\"id\":30,\"message\":\"Adsmarket for business has Contact for ahmad\"}', NULL, '2024-12-19 12:37:43', '2024-12-19 12:37:43'),
('7e780e92-c492-48bd-8d49-920806879ba2', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 20, '{\"ad_id\":400,\"message\":\"Your ad is live created\"}', '2024-11-12 12:45:40', '2024-11-12 12:13:10', '2024-11-12 12:45:40'),
('8a811824-f01e-4a02-9f73-cf285e641537', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":165,\"message\":\"Your ad has been updated\"}', '2024-10-26 10:55:48', '2024-10-26 04:31:24', '2024-10-26 10:55:48'),
('8f0d7e0e-46f0-4d19-82c0-64ef4fe111b7', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":404,\"message\":\"Your ad is live updated\"}', '2024-12-18 14:59:46', '2024-12-18 14:56:58', '2024-12-18 14:59:46'),
('93474aea-12ea-4f56-8b2a-e8d720af2d81', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":164,\"message\":\"Your ad is live updated\"}', '2024-10-31 04:42:05', '2024-10-31 04:41:43', '2024-10-31 04:42:05'),
('93983062-5cbf-4989-bff0-ba2699ef8a2c', 'App\\Notifications\\AdsbusinessNotification', 'App\\Models\\User', 60, '{\"id\":30,\"message\":\"Adsmarket for business has Contact for ahmad\"}', '2024-12-19 12:39:45', '2024-12-19 12:37:43', '2024-12-19 12:39:45'),
('975c3faa-dff9-4869-aa35-65c7e594a475', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":394,\"message\":\"Your ad is live created\"}', '2024-10-30 05:51:08', '2024-10-30 05:36:31', '2024-10-30 05:51:08'),
('99f4ec76-1777-4dc2-a9b1-c11bd4114aa1', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 20, '{\"ad_id\":398,\"message\":\"Your ad is live created\"}', '2024-11-12 12:45:43', '2024-11-12 11:54:44', '2024-11-12 12:45:43'),
('a2d2f388-f03a-4431-b6eb-d81e942fbb4a', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":392,\"message\":\"Your ad is live created\"}', '2024-10-30 05:29:10', '2024-10-30 05:28:45', '2024-10-30 05:29:10'),
('a2e9a0bb-0067-4aaf-ac4e-a6ba6edaefef', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 20, '{\"ad_id\":401,\"message\":\"Your ad is live created\"}', '2024-11-12 12:45:39', '2024-11-12 12:35:37', '2024-11-12 12:45:39'),
('a6b04b42-ad0d-43cd-91b6-899c37d02de3', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":404,\"message\":\"Your ad is live updated\"}', '2024-12-17 10:51:44', '2024-12-17 10:05:47', '2024-12-17 10:51:44'),
('a7a16c26-2b42-4cf8-8a16-5de12dbc3362', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 56, '{\"ad_id\":406,\"message\":\"Your ad is live created\"}', NULL, '2024-11-20 08:58:43', '2024-11-20 08:58:43'),
('a7d8dcc3-f740-4d84-a351-9d3daa6d2f7b', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":410,\"message\":\"Your ad is live updated\"}', '2024-12-17 13:52:19', '2024-12-17 13:51:13', '2024-12-17 13:52:19'),
('ab78244e-7bc0-4b2d-b32a-068ade4ecef2', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":197,\"message\":\"Your ad is live updated\"}', '2024-10-29 06:07:42', '2024-10-29 06:07:36', '2024-10-29 06:07:42'),
('b4ce739e-f271-46c5-8c79-4d18eb09cd60', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":197,\"message\":\"Your ad is live updated\"}', '2024-10-29 06:07:21', '2024-10-29 06:02:50', '2024-10-29 06:07:21'),
('b6b7df22-8686-4b27-ac49-2156662f5c8d', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 56, '{\"ad_id\":403,\"message\":\"Your ad is live created\"}', '2024-11-19 10:27:43', '2024-11-19 10:26:43', '2024-11-19 10:27:43'),
('ca2edb23-99ee-45eb-8672-e9889d5cc11a', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":408,\"message\":\"Your ad is live updated\"}', '2024-11-27 09:51:24', '2024-11-27 09:50:51', '2024-11-27 09:51:24'),
('d2a65da9-7812-46a5-8e0e-5e6f63a603c7', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":405,\"message\":\"Your ad is live updated\"}', '2024-12-09 17:24:40', '2024-12-09 17:24:36', '2024-12-09 17:24:40'),
('dc0ec37e-a545-4b54-9858-d0bc630adfcd', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":397,\"message\":\"Your ad is live created\"}', '2024-11-09 08:16:43', '2024-11-09 08:04:15', '2024-11-09 08:16:43'),
('dcba54c5-c069-4092-8a54-a0bc12eba06d', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 20, '{\"ad_id\":399,\"message\":\"Your ad is live created\"}', '2024-11-12 12:45:41', '2024-11-12 12:01:39', '2024-11-12 12:45:41'),
('ddad788e-f69c-4baf-a347-543a8ce218e8', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":408,\"message\":\"Your ad is live updated\"}', '2024-11-27 09:53:01', '2024-11-27 09:52:52', '2024-11-27 09:53:01'),
('e577c774-f836-4406-a619-64bc8556b2da', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":404,\"message\":\"Your ad is live updated\"}', '2024-11-19 14:16:26', '2024-11-19 14:14:30', '2024-11-19 14:16:26'),
('eb38728b-ab6a-417c-b196-00d3b8637a92', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 58, '{\"ad_id\":404,\"message\":\"Your ad is live updated\"}', '2024-12-18 16:57:48', '2024-12-18 16:57:45', '2024-12-18 16:57:48'),
('ee0998d5-2ab8-4ba8-b5e7-f8450340f84b', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":172,\"message\":\"Your ad has been updated\"}', '2024-10-29 04:40:23', '2024-10-29 04:40:13', '2024-10-29 04:40:23'),
('f0599879-5463-495f-b054-3375924fa323', 'App\\Notifications\\AdsbusinessNotification', 'App\\Models\\User', 60, '{\"id\":29,\"message\":\"Adsmarket for business has Contact for Testing\"}', '2024-12-19 12:39:51', '2024-12-19 12:36:14', '2024-12-19 12:39:51'),
('f2a38307-6c72-46a3-bd2b-eaa3677694a7', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 62, '{\"ad_id\":412,\"message\":\"Your ad is live created\"}', '2025-07-03 06:51:58', '2025-07-03 06:51:50', '2025-07-03 06:51:58'),
('fbc50abf-5c1f-4dc4-977d-f63abcdb5372', 'App\\Notifications\\AdsbusinessNotification', 'App\\Models\\User', 37, '{\"id\":29,\"message\":\"Adsmarket for business has Contact for Testing\"}', NULL, '2024-12-19 12:36:14', '2024-12-19 12:36:14'),
('fc1cfa39-3a79-4bfd-83de-0470666f1f4e', 'App\\Notifications\\AdUpdatedOrCreated', 'App\\Models\\User', 10, '{\"ad_id\":391,\"message\":\"Your ad is live updated\"}', '2024-10-30 07:41:12', '2024-10-30 07:38:30', '2024-10-30 07:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('ahmad@gmail.com', '$2y$12$NsREKDAcOBl4xXmVFsx/IeU/q5TJOHl9jnSlI4/aCkTT./dDWLKyK', '2024-11-02 05:24:00');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('0dP4ICel1bfRbVaxOfwcHLFpM5wDww2XHsyvLN7T', NULL, '71.6.134.231', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM2pCRTdCb3RZMGJ3WVAya3prRjZTaDkzcjg3bUdWWmhHbmtTWEVrTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768707821),
('0DYYcRQ98pozeUYijDXKKeIev4QK9awJ1buSJ2Xp', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQVY2MW5pa0twY2V5WnpYRGNCQjVjUDAydjZxdko4bWFYdnd2ZU54QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9CaWtlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438781),
('2e8A2LS0LEsNqhhQmJoZpoOQ1SARNcyC6bO3BcEh', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZFV2THJTVzR3MVZibmRZbGJSdWpxa0NjcmNOSzl1am9Wc2NzSGJleiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438772),
('2KpYjcfTdTcIE6VasoNbqr20MKrX8KOYUudPqoSR', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTktnU3JpZHRDNEpramh5MVhrQkRueEFRSGVZVkh1MUJFWkVsNkYwSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438777),
('4jY6CkEcmsx8l7BZ2jpwOt92F5gOhzz5ZSU7Jra7', NULL, '51.68.247.193', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicEdtR2VrOThQWmdWTFA1cFJzN1p1U013bTBkeXZIWEIxWVNwSTZNdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbFpEVFhoNk5rTnVabEF3YnlzMGIzaFBUV2d5YkZFOVBTSXNJblpoYkhWbElqb2lLME42VFhOTlRERnRVVTQyZEV4MWNGRkhlRE5FZHowOUlpd2liV0ZqSWpvaVkyRmxPV1JqWVRWaVpUVTNNR1V4TWpjMlpHSXpNR0U0WTJSak1EQmlOVEl4T1dSaU9EVXdNbVEzWmpnMU9UQTBOamMwTTJaalpUTTRabUUyWlRZek9DSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768473947),
('4M4w8YUACv71ULPhnv5airCgFwLonWRIA9JL3zTu', NULL, '54.37.118.72', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVVZaaDRzcTRRaml2Y1oxOFhOV2llUHVPTWpBUEFNVWQ4Y1Y5QWE4RCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJak12UjBNdk5XRXhaRzlIZUhsVEwxbFhkM0oxWTJjOVBTSXNJblpoYkhWbElqb2liVFJRV1hoNVNDdHVMMVJzUkRoR00zRkNhWFUyWnowOUlpd2liV0ZqSWpvaVpHSmpPRGsxWlRVeU5UUXpOalJoWWpBMllUZzNOREJoWVRNMFkyTXhOR0prTnpNeFpqYzJOakEzT0RCa1pHTmtaVFl4T1RaaU9EWmpaREEyTmpSa01TSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768459971),
('4Qeux8b5yNFkDxSDgAe565UWLZDARXelkdxBZR4q', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMkhSanRGQ3czUm1jd3ZTbDRNWFV1TzBGelBrbHZEMlh6VEs3b3ZFRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Nzk6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9Qcm9wZXJ0eV9mb3JfcmVudC9zdWJjYXRlZ29yeS9Ib3VzZXNfZm9yX1JlbnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768438791),
('5By0is2VrT9tpXJTbeLZhaGttXGjHe4cTXUgkwwJ', NULL, '5.39.1.249', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUWNweDNVQ01tUmYzZE80cURDUk5rdE1JZE4zTk9qWHZ5MHlUcU9SRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJa2RVZDFsMFVqVXZUMGN3VG0wd1RqWkdaa1V2YkZFOVBTSXNJblpoYkhWbElqb2lWR0ZQWmxkUVFqUjRWWFIxWmxOc05YVjFjR2RuWnowOUlpd2liV0ZqSWpvaVpERXpabUk1TnpSa05qbG1ObVU0TkRsaU16aG1ZMlJpTXpKbE1ETXlOak0yWm1OaE1EbGxZamsyTkdJMU1HRTJOR1JtWVRVM05EaGxZekkwTXpjM01pSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768454595),
('5GnGsXU1ETSHzAfIsxR6kCXg53OXp2Ribe1K2lif', NULL, '54.37.118.66', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMTc5NXFhTVpyRE1lUW5PUnFKUkIzNFZCbldJd2xDNnJCdHpndmQ5MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbEphUmxoMVVVUk5RMHN5VDJOVFpteDZRMEoyZW5jOVBTSXNJblpoYkhWbElqb2lUbXRNYzBrM0wzVkRjM1ZPTjJWMlRFRXlSMU5zVVQwOUlpd2liV0ZqSWpvaU16QTFOR0UwWkRRME4yRmhNelZtWVROa01qRXdaR1k0T0dOa1pEVXlZbVJpTlRGaE1HRmtZMk5rTVRZNU4yUXdZekF6WkdGbU1tWXhNak01TlRZMk55SXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768440065),
('6oi4aR2qiI4QzKOtoJ6S1mEOS56dtF794fXGiLzp', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiODRBSU92WEVKSDJRQ1E5UVhTdEFUYkZiSWJrd2x5aGVqaHNYbWVMOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Nzg6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9GdXJuaXR1cmVfSG9tZV9EZWNvci9zdWJjYXRlZ29yeS9Tb2ZhX0NoYWlycyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438789),
('72vddFJrqlZKj7jED3ZvmYoD9omjV6R9yAtB375j', NULL, '51.75.236.137', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSER6czY3TmIyMzA1cnJmbGFFZHhlSG1vVE1rdGhranM3MXpUS2E5UCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbVZ0WTJOcFlYUkhNSEZsWmtGcVQzVm1ZbXRJVG1jOVBTSXNJblpoYkhWbElqb2lVMkYxZVZoV1JEaGtaRGwyYkRrMGNXaDRiSEU1VVQwOUlpd2liV0ZqSWpvaU5qRXdNakkwTmprd09HUmpNR013TUdZNU9UVTFNV1ZsWVdabFl6SXhNak13WVRWaFltUmpPR0U1TURJMk9HVmtaak5pTnpjMk5qaGhOakkwWTJRNFpDSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768456039),
('7I03uwoGtLOvLu8xBIPNe7htkPP0jfenBA29kOlv', NULL, '54.37.118.69', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT25BOG9pQ3BDYkhoYWJwOVNiRWxFc2ZKUFdSeXFjUHVBcnJlT2lHMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9GdXJuaXR1cmVfSG9tZV9EZWNvciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768446079),
('7xCc5F6fEe8h8dy1TQlPVN5RaBQ6Mau2fb4Jawcg', NULL, '51.75.236.157', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUZNaTJ0dWcwdVpTVXU4dk5MeVVLS0FXN1hSNVVsTHpwaGNPQkRmRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbkpVVEVGak9WbHdkMWMxV0RnMVJIaHNlbTVwWjFFOVBTSXNJblpoYkhWbElqb2liVXRZV1V0clJYWnZZMlpoVURCYVV6UkZSVlZLWnowOUlpd2liV0ZqSWpvaVlXUmtaR1poTmpabE1UVXpNV1pqTnpReE16ZzNaalExWmpNeE1UZGtNelZoWTJRNU1HUmhPV0ZoTUdVM09XRmtZVGRtTmpNelpqWXpOelJqTURRMVlTSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768458713),
('85o9IOIl9hMIAATzFxobxAvcE0vs5mnQLNtULxs3', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWXE3TjgwRWZnUDlEY01ZOG9McU5tR25PWk4yWHlLMlNwUjNVcjVWViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjU6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9Nb2JpbGVzL3N1YmNhdGVnb3J5L0FjY2Vzc29yaWVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768438784),
('986jr3H2MUUPRpH9mcd1kdhcNjHfFRq6KS9ePEZJ', NULL, '51.75.236.158', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQUxiNUt6UXlBaFA2RTF2Z0lwOHd5cXMxNjRkeGFhc1I5V3FiOEloMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJalJzUm1OMWNXZEZPVFl5T0U5TE1USkdkV0ZyVjNjOVBTSXNJblpoYkhWbElqb2lXVUp3VmxobGNrbE1kMVZ6YW1VMVduWlNabWhXUVQwOUlpd2liV0ZqSWpvaU1HVmhNVGxrTkRnNU5EQm1OelppTXpZd056WTJabVV5WmpOaU5URTRNekV4WW1SaU5HWmpNR1V3TnpZNE9EWmtNMkV6TVRZd09ETmtOalV3Tm1aaU1DSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768453497),
('A4EuabKlP7VNj2GYGyJyEVVWjq6KIiwnjd6Bzxh0', NULL, '92.222.104.197', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRnl0OXpyMXV5bEllQlRHdGQySVBERmZ3SjhvbmU4VXpYWGJRMURFbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbWg0ZVdKQ1pEVlBPVTEzVFhkVmJWQk9RamRqZUdjOVBTSXNJblpoYkhWbElqb2lNVkJ5TlZBNVlrNDFNbUl6TTNOUFRGTjZiMmNyZHowOUlpd2liV0ZqSWpvaU1qZ3daRFkyWXprelptWTBOalF5TTJNNE9UQTNOR0psWTJNMlpUbG1aRFE0TldZeE1ESmxZV0ZsWXpKbVpXTXhNRFUxWXpCbE5qWXdaREUwTnpjeU5pSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768446767),
('AcU3RKpf63q4GzW47ob6OF2eLKevyNbCDq0eHt9C', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY1JtRndFR3pRaVphZXI3eHZ4dlM2eWtIVGhNRmNGalRNdHRybjZqciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9wcml2YWN5LXBvbGljeSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438797),
('ahJ9itLHONgqn8pU6S8Z7dQQfTJ9cgfvUMabUkEG', NULL, '51.75.236.139', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWlNwMmZjU2ZHNGpPR3BwaEFaa3NCNTl4ZncxR09QRkNLZjZhUXlUdCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJa2hPU2paaFJsbFNaM3B5VlVJMFVEVkpkM2hWYUhjOVBTSXNJblpoYkhWbElqb2lLMUpzUTBKNFIxbFdaWE4yVFVSVFdsazBNMngzWnowOUlpd2liV0ZqSWpvaU5HTmhaV0UzTlRRM1ltRTFNR0kzTTJKbVlXRTRZV1kyT1RNeU5USXpNakV6Tm1aak5qSXdNV1kyWW1KaFpqWmtaRGhoT0RFek5ERTRNMlF5Tm1Gak55SXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768465145),
('AlnL2EmDJn2EUSUK1JKYJozhKXQ6rTn1x498djru', NULL, '92.222.104.199', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTFpOVUZYRzBvb3o4b3hwMktBSE5LQkpxTDg5b2ZiVkxweWhYazVhRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbVk0WVVwTloxSk5ObXhqYkhCV1MyUXdkVEY0V2tFOVBTSXNJblpoYkhWbElqb2lhekZvWjNJeVUyWmpibGQxV2taeVFubHZOMHRGVVQwOUlpd2liV0ZqSWpvaVpXUTFaalUyT1RnMk1XTmhNVFppTkdNMFkyUTJOMkppTldFelptVTRaR1UzT0dFd1ltSTBOV0UyTlRVd1ltUmtOVEpqWXpjeU56UXlaVFpoTURZMk1DSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768436611),
('avp0gil1KAgu7vJLkIOmNZQrEzhmgJk4SiAPNrvj', NULL, '5.39.109.164', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMVJEYTJuUHMzV2VuY3FZdTZ3WG1YZ29OaGZDT1VuMG56N2NVSWhDciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbk5JTlUxMllVa3dNR1U1ZFRSUGNrZHFTbU5vZEVFOVBTSXNJblpoYkhWbElqb2lUekJsV1VOd1Iza3JkM3A2V25kMldFZFpVbVJZVVQwOUlpd2liV0ZqSWpvaU4yTTFNV0kwWkdOaVlqa3lNakJrTURZMVl6Z3hOV1ZrT1RCaU1XVTFNbVE0T0dSbU9XUXpOalF5TVRRMVlqWmlOR1JrTldZNE5UVmlZemszWldGbFlpSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768437319),
('C207V0cWNw8scZo6ND9242gzXq7zj60OQprq4T08', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiblhkZ3lZNWlWSkdjTzJJSzA5dUZlb0ZMdEQ5cnBZdTZFSmZ5OFc3OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438774),
('cZIeSakMkng8pzFVHftWSITfYzRVwhay03UtYTDB', NULL, '176.31.139.9', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVZydjVLRUtXSmxlMnRHNnVhbW5hdDdQZzd4NjF0ZWN6dVBQWkJDQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJa2hYYzI0d2FYZHJiVEV5U1dkNU1qRnZUVXhwTUhjOVBTSXNJblpoYkhWbElqb2lWbTVxUnpaV2RuQXpkbnBKZWpOWGNWUmlkeTkxUVQwOUlpd2liV0ZqSWpvaU1UZG1NVGc0TTJabE1qQTNNREV4TVRRMVlqQTNaV0ZtT1RnelkyRTNaRGxtT1dNMU1XSXdPRFE1WVRFMVlXRXhZVGcxWm1ZM01tSXhOMlpoTVRka09TSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768469306),
('DHmzSRPPGdxZIxXsBQd0rQGlBGCeYSU7lIJXJKJl', NULL, '51.75.236.130', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ3VyckQ5TU5GVDR4eHp5NDRNSWl4YzlFdFpya0I2Q01tMGcyVjU5QiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJa1J1UjJVd1IwSTROMUIyZEdKalFrZExaVW8zWkZFOVBTSXNJblpoYkhWbElqb2lTSGhwYmxOTllpODFWVkJHY1ZCRWRXZDFXVUpqZHowOUlpd2liV0ZqSWpvaU1USTBPR1k1WkRGa01EUTJPR0ZqWmpCak5qZ3hNMll6TkRJd1ptVmhPREJsTTJJMk1EYzNabVk0WkdKbU1UazBNVFpoTmpabFpUY3pZems1TUdZMFpTSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768441559),
('DJqSWqZYSOBnYWuRBOHI8zrOdCUWkjjI6Fqr4a4i', NULL, '54.37.118.76', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic29UMm1Ha0JkeFk4QzhVSXdXQXI0TTJpNXM0aGFPeTRza3NWVjlrNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJamxRUTNFNFN6Tm9MM2QxUW1kbFVIRXhVelZGYm5jOVBTSXNJblpoYkhWbElqb2lWMWM0Umk5SlpGWkZUVUl6UWt0bVlWZGFOa1JPZHowOUlpd2liV0ZqSWpvaVpXSTVaVEZqWmprMlpEVmxNV1ptT0ROaU5tWmxOMk5oTldKaU1XWXdOVEEzT1RrM1ltVXpaREZpWkRNMU5qY3daRE5pTW1SbE1HTm1NMkl6TW1Fd1l5SXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768447463),
('ekIE7I3n3GTwVsS9EPCbG6ItH0MFrWccIgxj8drb', NULL, '37.59.204.155', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidTVxTURpNW1uUEZvZG5XbzRJRWpvaGRQSEd5bmZjOUhNZExHemtNNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbWhaVVdzM1VtOVZhR3REUVVSQ1NHNDBOM2hhT1djOVBTSXNJblpoYkhWbElqb2lZMnRyY1RVeE0xbHNWRTU1UzJkV1FuWmhiSFEyUVQwOUlpd2liV0ZqSWpvaVpUYzFPREprWWpsbU9HRm1NVGN4WmpabVpHWXlZamhpWmpWbU56SXpZek5rWm1VMk56Y3pOamsxTXpCbU4yVm1PR1k1WmpFMk1HUTNNMlV3TkdJME15SXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768479446),
('ekzFLg8n4suscdv1MVLdwVa3amReIC1x4Xq9uoAD', NULL, '205.210.31.219', 'Hello from Palo Alto Networks, find out more about our scans in https://docs-cortex.paloaltonetworks.com/r/1/Cortex-Xpanse/Scanning-activity', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaDdBNWs1VzZpaEJNOEx6S3c0VEszQTBGaGRCbjB2TDUzN0IyajRONCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768506964),
('fLynJl6oz3OlUclBlfXvKU37e66mjvh32olHVvwj', NULL, '51.68.247.203', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ1hMT2VxdzlXSWRKeFllM1FGS3J4VG90cmhSTUFVNWQ4S2FvdmdyZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJakkwT0ZSd1NsUXZaMlo0UVd0eFYzVTVTVWxwWmxFOVBTSXNJblpoYkhWbElqb2laWGxzWWxaRFVXOHdORnBFWW5sSldETkZhbTUxWnowOUlpd2liV0ZqSWpvaVpqZzVaVEU0TkRjME5EZG1Zak0yT0dJNE9HUXlOR00zT1RsaU56Rm1OalZqTmpnME9XTTFaV05rWlRGaFkySXdNalUzTjJGbU4yVmtZamc1TnpRNE5pSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768477130),
('fqdvnARu72aclkAWqWfhMvSycVpdcqoKkQ47x7GR', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYUdOc2RmZGlJUjNsTEVjS21rYXhoa2Iyczh0dUZJMHEycVN6V0dmZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9Nb2JpbGVzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768438776),
('FXr3j8vzDhyvqQmyBGoKY1mBysIaNLYMF20YXYXl', NULL, '54.37.118.72', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR05tOVl0aXdvdER6SkNnaWN1c25ldlFkcmlXaEtzQmo1cTRrbUs4ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJaXQ2SzAxaFRWUmxNMGN4VkZJNVVVVllRMU5zUldjOVBTSXNJblpoYkhWbElqb2libVUxUzFwRFYyMUVPVTV5YzA0eFlYUjBNMmR4ZHowOUlpd2liV0ZqSWpvaU1EVTFOamt4T0RkaU1qTTBNbUkzT1dJM1pXUmxZVGMyTWpjM05XTmlaRGsxWkdGallUWm1NRGt5TlRNME1HTXpPVGt5TWpJNE1EaGhOVE5tTVdGaFlTSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768445433),
('GDkdGPUVIFeUBptRFc8VyRNII2yAsTVNpD5AgenI', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoickZ2N05Ea3FESGhNT2hkdmJEeERxeG01VGs2cDJFZUpEOXlSZGVtZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzA6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9GYXNoaW9uX0JlYXV0eS9zdWJjYXRlZ29yeS9Ta2luX0hhaXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768438788),
('GG0HzwTrnitmeqbFiZHfeWuEppzd2zrmMatL1g9O', NULL, '176.31.139.14', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZjA4ejNNV2pwMjAyQ3N4dzdCTVdBVnVCME5ET3dNcVFQRlVveGRZTSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9GdXJuaXR1cmVfSG9tZV9EZWNvciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768446137),
('GGQzFPEpqLeHrKUITALKwJWhVQXLhQYafOx8KLBK', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUnBtS0JuVzJ0UmFDSEMzUzVNbmthcmhybWZFU2s3UWhQWTlqUlY4dyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438773),
('GY3U7098LIGd6f9O4HcO56VDbmSCjrDCagd6Fss9', NULL, '51.75.236.158', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRmZOVVl0VUEyOEdXZUZaOEJLak56VkpFVnhJWXhSaDVKREdmSFVLcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJa3RRUkUxeVZVVlZjMEkyVmpkaE56aEVRbXN5TjJjOVBTSXNJblpoYkhWbElqb2lkbUl5Tm10WWRWVTNibFZpTmtSYVdYQjBjM3BHUVQwOUlpd2liV0ZqSWpvaU9HVXlZV0UwTnpnd01URTRaakV6WWpVd01HWXdNRGt3TVRsaE1tRTRNbUUyWVRJM01HSXpOalkxT0dFMU0yTmlOemcyTkRFelptWmlNR00xWkdJeFppSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768448104),
('hCxzt5wjEmeUcEnEbpVEzZkMdEysaVTpdhWHTHTY', NULL, '92.222.104.209', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYjlVUHpuTGd6MTZ6TE45SFFnU1hsMG9xeWhEUG5NZjhwT1IxWTBkcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbGd4VkVkMVdtcFdkR292VGtGUmVGaFVjRkpSUTBFOVBTSXNJblpoYkhWbElqb2lSbXAwTXpBeWEzSTBaV0l5Y0d0dGJsUlRMMnh3VVQwOUlpd2liV0ZqSWpvaU56RTBOamN5WkdVNE1EazJaVFJsTUdRMU9UWmtOR1ZtTlRRMk9UTmlZV1U0TTJZek5HTXlZMkV5WTJVMU5XWXdOV0prWWpVMk9EY3dNVEEzTjJVellpSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768435181),
('HY678zwBcKk74XgI8BuW6uhhO2zYO5W7I3v3QjNz', NULL, '92.222.104.202', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTDlhQVFZbzBCUkZRaGJwMVVIMWRjWmhrT0VLYk51eEdVTTRRZkNsViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9CaWtlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768450114),
('IJExRVaVNyNT72QhiemwpB3SGfpvW9ZmmF9lVJJo', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkVEcXNFQVJ3b3BuSVF4REZobndkNTk0Y2FNTW9Jb3VNaUFQbGlqaSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NzY6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9Qcm9wZXJ0eV9mb3Jfc2FsZS9zdWJjYXRlZ29yeS9MYW5kXyZfUGxvdHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768438792),
('iluJqik6KFSVD9WfsUvS2cFNNGrMs3VGW6GXUAaJ', NULL, '5.39.1.239', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUWQ0OFRkUmExQk1UaEJYRHhCMmpjZUgxSjRrSFp3QWFHR2pGT3lISCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJakF2VjNjNWFHUklNakJ6Y1ZOaVYxUXJTVmd3WmxFOVBTSXNJblpoYkhWbElqb2ljVFYzWVRSRFJ5OVZkbE14ZUVaQmNIVm5TR3RpUVQwOUlpd2liV0ZqSWpvaVlqUXhNall4TURRd05ETmxPREptWkRjNE5qWmxNVGRtWlRKaE1EYzBaak15WVdaaU0yWXhPVE0wWW1ObU56ZG1NVEpsTXpJelpURm1ZVEJrTjJSaE5DSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768472890),
('j3OykU76VunejFYI9Kcn2ta4A3eNVF05h6x2mFmn', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRlRMZkppM0Rkam9rTTBJeTBBU2JvVXRzTW84S1pWTUVHaEdNQmVGayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9WZWhpY2xlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438793),
('JHcTjM4Z7u31Spjvq06TKuuoys0BFNuvq1k5oKvi', NULL, '51.75.236.146', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUZSY2I1MHY3RnJpYU1Cb3BnTHMyQWVVSVltSWFvRlR1MEp0TVNmUyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJazVDZEZsblpVNW1LMmhxUTNvMVp6VmtkazgyYUdjOVBTSXNJblpoYkhWbElqb2lLMGxoY0VObmFEQklOemt3VFZZNVF5dFdaM3B1UVQwOUlpd2liV0ZqSWpvaVpHRm1ZV0kxTldGaE1tUXhabUppTWpnM09XSXhOamxtWVdJM1pUbG1NVGc1TlRjMFlqRXlNMkZsWVRsaU1EUm1NRGN4TlRNd01HWXhNVGhrT0dSaFlTSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768451279),
('jsgTpu2oL8eCuIVgQhaQ5yyBbD5dwpm0mAEXoBfJ', NULL, '5.39.1.226', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNkVZeUt1emJnMHNxNzl2Q2ZKWmpqbFpKR2ZlWDhub25xQXAwWHk5SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbWhyZW5SSVp6RTNUWGg2V2xKRlowVnRUbUlyVTBFOVBTSXNJblpoYkhWbElqb2lWblI0U0VrNVVVZEhlbTUxTkhOSFFtUmFZV05VVVQwOUlpd2liV0ZqSWpvaVkyRTRPVEJtWkdVd05URXdOalZtTWpVNVptUTFOVFl6WXpJd05XUXlNR1pqTVdVMU5Ua3laVFExWTJSaVlqazNNR1k1WmpjMU5UWmpOakptWkdNeU5TSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768449116),
('JurDPFXUYp8dPoiKDH9rig6ErU1vCXfRJkmUplsU', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0Y1VEhLT1IzOEpQcU9oampOakxMMGZBdldvVlNoWFd1Z1o5aFZRYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjM6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9CaWtlcy9zdWJjYXRlZ29yeS9Nb3RvcmN5Y2xlcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438786),
('jXkbiO8gk82r7F4yCtVVEbjRc0eSRUdkCQsklTB6', NULL, '37.59.204.154', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnJMYzJjRWFobU9qSVp4R2kxVDB1OHRtM3lySXlVY3U0c0NZVFBCYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJa1UwYUVSbGNTczFRM0EwWW5SalVVRnliM3A1TWtFOVBTSXNJblpoYkhWbElqb2ljazFtTW5GS2RXeGtiSGhwWmpOYVdGaE5VVWxxUVQwOUlpd2liV0ZqSWpvaU1qbGxZakZqT0RRd1lqVTBaalkyTVRobE1tVmpZamcwWkRJeE1HSmxPR1JqTkRaak5USmpOekl3WmprMU1EazFPVGhtWmpVMll6RmpaR0pqWm1WbE5DSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768463876),
('k2g5cCMMoXxzp4X9Hgbhri4b1IWWh4VL9moA8utu', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMlhjTzRJSnFWUFZsYkFKUFBMbzVLSmxKZ0NkRU5SMVRGUGF5NERpOCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9GYXNoaW9uX0JlYXV0eSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438783),
('KOdtpVb8l1BbU5SXd3wvQX5OGFE3b3SchOMhq13w', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQXQ5c3oxU0RIZ2NLdzJVcVdJUkVXYnlkTTNkNzhQR0pSczVFTllJcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438770),
('LFD7Yl9H9E4ZWpGkiDwDCvLek1lev9uBlHEeMgqC', NULL, '5.39.1.224', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZzRRTTNMcE0yVDh3ZkNiTjd1MTBXWFo2M2tSbnNxNk55UzZ1Q25FQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbU51TVU1RVdVODBVbkptU1V0Qk0ybE5jMk5MY25jOVBTSXNJblpoYkhWbElqb2liVUUyTmxsVmVtdHlVblV4YVdkSmFVNWFVVTlWZHowOUlpd2liV0ZqSWpvaVpEWm1aakUzTURZNFpUQXlOakE1TkRNeU1EZGxNVGs0WVdOa016QmhOVEl6WmpSa05HVmpZelUwTUdVd05tVTJORGM0WlRkaE1qa3dNMlEwTWpnNVpTSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768471830),
('M8cjAjEzvhlnuIxHFhQyOoYlo4CVuxbORURl4cYy', NULL, '51.75.236.131', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWWZTbW92RExaVnpQWEN1dm5NU0FmNDBNYWsyWHZTNXRPaFFhZFNSOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9GYXNoaW9uX0JlYXV0eSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768478284),
('miQAFF2zH5uiSqKNdyNGGHmsoXvOtuPjggwPstSE', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiem44azB0RTVVbzMycm43SWFSRHVPSUNvUVZCNlFOMUVQSlRYclN5SiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way90ZXJtc19zZXJ2aWNlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768438795),
('n3jmKVXy32hFtKHFceyHaF4ST0vpbBtGnOhYsHbH', NULL, '37.59.204.133', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiemJTZlBvc0pnOWlCd1Exc1dYcW5leVNmQ0kzcmo2SUNGdDcxcVJrSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbEYwUzBWblRHUjZWV1p3ZDNnNFVscE1VV3BGSzNjOVBTSXNJblpoYkhWbElqb2ljbWxoZUV4VlUyWTNUMVpuYUdwcmRYaEhWMFJ2VVQwOUlpd2liV0ZqSWpvaVlUazBPVE0wTkRnNU1EZ3dZV1V3WWpobE56aGxPV1l6WkRBM09EWm1ORGMzTWpSaVl6aGlaRFZrTm1Sak9ERXpORGxsTXpBMlptSmpaakUxTldVeE5TSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768470678),
('NU4W7RwijcZEwpiqIp770HaOOHx6JStTL6jR1lOb', NULL, '51.68.247.206', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQzZxWWIzTkhpOEZyc3BXeXR2OVBudHR4UGVidnpIdjdVM2hBWGJKcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJa3MyU2pRNWRYQnRORlZFUzFaQ0t6Vm1VR2RIUVVFOVBTSXNJblpoYkhWbElqb2ljRFZYTUdsUWREUjRNbVZYVDNKTVlURjRZMGxKVVQwOUlpd2liV0ZqSWpvaU1XWmxNVE0zTWpZME16RmtOR0kzTVRkbE9EWmhPRFJoT0dZMk1ERTNOVGRqTnpkbVpqRmhOems0TmpJNU1HSTRZVEU0T1RjNFlUZ3dPREF6WW1NMk9DSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768468028),
('nXo2lFa4ytT7SAJFvab1qMv3RXt1qVwRMJPhqI7u', NULL, '203.55.131.4', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZVdSSlBEVDlwQXU5SDNDd3oyeDhmU3RPcWJnS0JaN05LdWN2M2RPVSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1772667547),
('NY7rsxQhdycRmK5VTeZADm8Ns5ilDKA8sc1Dge01', NULL, '74.7.242.9', 'Mozilla/5.0 AppleWebKit/537.36 (KHTML, like Gecko; compatible; GPTBot/1.3; +https://openai.com/gptbot)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWlpPeWo0djJNbG9HY2M1RVZoZUtTenFaOFJlNWtKYVYwcWVzdzViaCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768911037),
('nyBE4Pzmq8TiZoYVLjyIUpvG1ZJOBJ60vbgaLAhk', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicGVsbkc4R3kxOE90MEtPUG1XQTVncURuQTA3TXV1Z251RDVYVHJ6ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9hZHNfZm9yX2J1c3NpbmVzcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438794),
('oMGhU8NgfVnwyDYmR2XAS2y6PVLsCQXIwKU9ZQQI', NULL, '5.39.109.185', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQWZSMGVXOUhGd2YwUjhqc256RENaUEcxTzVzUWdiamVTamRQSTFhTyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbFJOYTNORWMwNVdNRGxSTUhsMlFrVjBhVVJ3Y0ZFOVBTSXNJblpoYkhWbElqb2liREJqU2xaT2RFTjBWV1pZUmk5cGFEQnlRMlJyVVQwOUlpd2liV0ZqSWpvaVpUVm1aRFU0T1Rrek9UUTBabUUyT0RWaE1qSXlOell3WldSbE4yRTRNR1l6TnpOaU0yRmtNVEppTkRrMk1qbGlOelpsTldFNU9UQm1aVEpsTmpVNE1DSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768481565),
('OYorlFRcUkX5oQriLYYQL0FmQbTDX2bBRZvHEZAq', NULL, '37.59.204.152', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiem1WMGpxOTl3Y0s0SHljc0F2WUN3aG1BQ2RGNm5wdnVuaG5VR1JCeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJalJzTUhndmQydzJRMlpvVFZoNmJsWm5kMGxVV2xFOVBTSXNJblpoYkhWbElqb2lXR0ZpUTFCbGN6TXJhVVpUTlZGelNVWm9TbFpTWnowOUlpd2liV0ZqSWpvaU5XSTROVEF4TUdWaU5EVmxNMlV5WWpJM05tTTJaamt6TWprNFl6RmxNRGxqTVdZNVlqSXhNek0xWXpkbU5XRTRZVGN6WlRVNU16YzNZekpsTW1abU5DSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768440756),
('pdmfBjR3dzmkvfBYzxXHb0l8vrM75BOcBjTw6uOf', NULL, '93.123.109.125', 'Mozilla/5.0 (X11; Linux x86_64; rv:144.0) Gecko/20100101 Firefox/144.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaWpIZlhVdE1MR21lTnVZSTFNQTF0Y2VXemxrVnlVVjhqMWVHTm9LSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1769797798),
('posUOCVgNeyfQcThNF8uzzs31ojqP7NGkhOAm6Ur', NULL, '92.222.104.195', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia3pid1RyS1lWQ21pWkFFcjhyeWlyWHZkVGEzRGhvY3NnSUV0RXNmeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJak12UjBNdk5XRXhaRzlIZUhsVEwxbFhkM0oxWTJjOVBTSXNJblpoYkhWbElqb2liVFJRV1hoNVNDdHVMMVJzUkRoR00zRkNhWFUyWnowOUlpd2liV0ZqSWpvaVpHSmpPRGsxWlRVeU5UUXpOalJoWWpBMllUZzNOREJoWVRNMFkyTXhOR0prTnpNeFpqYzJOakEzT0RCa1pHTmtaVFl4T1RaaU9EWmpaREEyTmpSa01TSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768459939),
('pUsfl6Iw7U1dtfnd2VYIUXkTrMNtq4hnZQQqeHGb', NULL, '198.235.24.193', 'Hello from Palo Alto Networks, find out more about our scans in https://docs-cortex.paloaltonetworks.com/r/1/Cortex-Xpanse/Scanning-activity', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT2JjcTRFSnlkWGp5T3UyWG54S3FtWVdvS0pUVlRaN3A2S2F3SEhkcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1769022441),
('PvEfM3NwCs9dtf2GyMca9cD5YK5qdoMIgPdW1Skf', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic1pITDRKRzM5YlhTUjJleWVRTWdMZlpHOXgwVnhqZTVBNXQzQ01xQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438769),
('pXBd2pSwQL5xnEQlAVBYxCgBQDHhNwixg2tTisER', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia1lwUTB3TXNwVXY5VVEzTWJIa0ZSczhoTEN5N2hRMUlsSVZSU1U4ZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9Qcm9wZXJ0eV9mb3Jfc2FsZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438779),
('QGEpJDGm9W1LGI0mpt1drbHdICdvF4N5TTMukEyO', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNUFESjVQS1FvY1RMV0hIdXF0SWhGTDdhQWt2M3lyT1A0aWw2czhUWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NjE6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9Nb2JpbGVzL3N1YmNhdGVnb3J5L1RhYmxldHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768438785),
('Qrt4ZJnKNwu8QY7GOtb6qKsa6vXXEMdo0U80EmgD', NULL, '92.222.104.207', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUnRDS29DSlZQY2Z2ckRpR0lWT0hkZVVBekcxUWNQM0wycG5DZUNHNSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJalJ3VWswMWN5OXpLM0ZXVUZZeVlXNXJWWGRaSzBFOVBTSXNJblpoYkhWbElqb2lLMVZHWTAwd2FWZEJjbEJCYVRCWmVrUXlhVnBSZHowOUlpd2liV0ZqSWpvaU56a3lNREl6TjJSbE9XRTBaalU1WXpVNFpUUXlPR1ExT0dFeU1EUmpPVGM0T1dSaVlXSmtOelU1WkRNMVl6Rm1OekE1WVdWbE56UmxPRGxrTldGaU1TSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768452417),
('R62qUVPNqnEZfo1pStmbK9B6YXoqUAcXYo12UIri', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibHBuOVB5ejRIRDQxVlFma3VuajA5ZDd0dW9vVXdJaTkxU1kxWmtSdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODc6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9Qcm9wZXJ0eV9mb3JfcmVudC9zdWJjYXRlZ29yeS9BcGFydG1lbnRzXyZfRmxhdHNfUmVudCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438790),
('rA3f2CmbnbhHgLg8eMaMvUml3H8NEQTas140m0Ng', NULL, '5.39.109.165', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoianBUNkRRenl0c1VsQmFDN1dGdFdhREdqaEdzRjFucjNZUHB3UExMWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbGRqZEN0Q2MzcHNSWEJPUlc1R2RYcHNZVEJoUkdjOVBTSXNJblpoYkhWbElqb2lhVXc0VkVOQlIwOVpRVVJOVFZaSVNGVkdlVFZMWnowOUlpd2liV0ZqSWpvaVlXRTJaR1ZtWW1JNVpEQm1aak5oTTJKaU1tSmhaamt5TW1Gak1qTmxPV1UzT0RneE1HSmxaalF4Wm1Jek4ySm1OMkV5T0dZMlpqZzBNV1V3TkdJeVl5SXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768442405),
('rn6aVYsIVsxhG22O1xr222Ef4NQNRSJeiCguQ8f3', NULL, '54.37.118.77', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiblhXWmVTMG9uZlppZ3R5dDc0UDdvUVMxdHhqYTBNMHhzVnVtSDB3SSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbWN5VUZOemIzaHpWbVUyUkhsV1UzZzFWbkEzUW1jOVBTSXNJblpoYkhWbElqb2lXRmhEY0dkSE5qY3hSbVV5YzI4M1NrWmtVVnA2UVQwOUlpd2liV0ZqSWpvaVpqRTNNMk01TURSaE0yVmhNVEEyWVRFeVpqTmtPV1l4WXpKak16TmpaV000TTJKa05ESTBaVFF5TnpVMVpUTmlaVGt6TnpGaE5USXdZekkzWVdFNVppSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768461092),
('roeqPWvaeTUBdNmorsMCp8hmBZ3uVrpoJhkheJwz', NULL, '71.6.134.232', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibjdYeGFVY0RLV2h4am5QdzNMeWtFQXNVZVgwSUN4cFpwcHJtdlpYdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1772544132),
('RYhBf8L6sOKWqb9prKLrHfPQA7rZnJcxhVZwSGhL', NULL, '5.39.109.186', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTHlFbWpmNzROeE9sUzduRXhNcTlSR3RuaGM1MUd6OXVJMUhhamhPRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbEJZU2xBd2MybFllRWRTYTI5dEwxcHRhbEE0VUdjOVBTSXNJblpoYkhWbElqb2lXVkJVUlVKbE0xZzFkbFJaWmxKeVJXNXJaSEpvUVQwOUlpd2liV0ZqSWpvaVkyVTFNR014TnpReE5qUTNNVEF5WkdJeFlUTXhNVGd5T0dJNU5UQTVOekl4TW1VMk9UVmpNVFl4Wm1Vek5HVXhaakpsTkRnd1kyTmhNamRsWVdFMFlpSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768462282),
('S6kYvznXg7Lc7WBscn7L2wwJXm3URWRARLaoZPgX', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibE9vc0xHeXFaeW5NUzlJSE5xRFpRN0tLV3JhaUJBSW1ibDd0RzUwQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438767),
('s8XEcQmmNSrFwdOCKmjvYo2oPVFrSS5bvxlxI0ac', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYmNBMTN4TUdSenR2ZWVra3RNUTR5bGZFb0diZ2pHM2tqZHRueFIwaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438775),
('S9qdIoSblBO3RQ69y3ZIWkUUI8iTu0gB0Ju01J5n', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoid1I0V0NlTVJicUsxd1lvdnB6aFV6VTBCZG9aQVVvczZNVWxXWlRINSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jb250YWN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768438768),
('SeSaqrJB38WztPVDJPVCyaNLeVzm7PrFKccW2196', NULL, '51.75.236.132', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidkpFWWlGWjlPQ2NiVDJsWFNnSGNTSFg3RE9majZPZFg5YXViZWw5TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJa1UwYUVSbGNTczFRM0EwWW5SalVVRnliM3A1TWtFOVBTSXNJblpoYkhWbElqb2ljazFtTW5GS2RXeGtiSGhwWmpOYVdGaE5VVWxxUVQwOUlpd2liV0ZqSWpvaU1qbGxZakZqT0RRd1lqVTBaalkyTVRobE1tVmpZamcwWkRJeE1HSmxPR1JqTkRaak5USmpOekl3WmprMU1EazFPVGhtWmpVMll6RmpaR0pqWm1WbE5DSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768463678),
('SxdMyv3aruPd6EqfUap8CBYcUMMaUgKRSRin9Hyk', NULL, '92.222.108.97', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ3pzVDJ5UXprT1Fta3dRazBGckZOS0NxU0lPRWVDYTRLYnVsc2FSbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbXhXTVRReWVGTXZhV0k0VmxsaGVrRkNURGxEU2tFOVBTSXNJblpoYkhWbElqb2lSVkZKVUVSNE5YRlhTelYzT0ZaTFExZHlZekYyWnowOUlpd2liV0ZqSWpvaU1EazNPV1ZoTmpZeVl6Um1ZekppWkRZd1pEZGhNbUUyTW1NMU1XRmtaRGc1WkRZMU1tUmhNbUV4TlRVMU5EYzROek0xWm1ZeFpUbGtaRFF6Wmpsak1TSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768439369),
('to6FtrDfWVuFdpdEwy7o5h8c4FSxbSnqtS9yxf0U', NULL, '51.68.247.199', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWUNIQ1c5ZVBNM2t1Y1JqeENaOXhDM25DbENqb3IwbkNrTlZSVUZXdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJa2gzYWxkSmEweDJOREIyVmtaVlVGWlBORk41UW1jOVBTSXNJblpoYkhWbElqb2lkVUYyV0U5Rk4zUlNSbkJRVEVsMEwyUjFjR3haWnowOUlpd2liV0ZqSWpvaU1EVTNZelF4TWpjNVptSXlObU5rWXpJeU9HVmpZakV4T1dSaVpHWXlNbUpsTkROa1l6ZzRabVEyTnpSbU56VmtNR000T1dRMVpqQTNZMlV6TkRneU5TSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768444720),
('UBUFtdMvZJNUFby4IHYg20Dr2Z3HpDyy3jTEueB6', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTVp1eVNadkFCRkFCbThSOWg4WkZOdTVPQURXZ1dDNEt6SkpLTUt6VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9GdXJuaXR1cmVfSG9tZV9EZWNvciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438782),
('UfEZs8167uNzCSOMqXShEZ6T7aY1ErnYiAuCtEGT', NULL, '51.68.247.202', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibmU0cEYzMkkzQTBKeUM3WnZ2aThndnI4UFRXV1Foa0F4Z01qMEdzRyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9hZHNfZm9yX2J1c3NpbmVzcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768475080),
('uL3tdUozYQfv5FVmrR1mfo24TkHcYCfDD8sru6e7', NULL, '71.6.134.232', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicERiWTFzcnJacGF6U2ZCT3pkUUY5eGR6aHIzczVYanpVZE1sSFFsQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768810409),
('uzhwpQj2leDM0lwp2RoK7fu9B4hthWmlV5QIfHdp', NULL, '176.31.139.2', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiazZQZzkyeXZWT3BtR2NSVXB6ZVl2SGYxWDl2VmFSZ3k2WnhZYXQ3SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbGswVm5GQ2IyTkhhMlpuYkVsWmRHWnFXbmwxZWxFOVBTSXNJblpoYkhWbElqb2lUakpRVW0xbFQyOHhLeXRLYTFCVWQwOTFlRmRDVVQwOUlpd2liV0ZqSWpvaU1UZGtOREpoT0dOaFlqUmlPVFJrTlRRNU4yTTROalV4WXpJMU5tVmhZalZqT0RBMVltUTVNakZoTW1ObE1HVXhaR1E0WkRNNU5UazRabUl3TmpNellTSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768435898),
('uzwC9dLmfk8OvUTsbCaB7gn42Knnd3HAy5BANCIA', NULL, '51.75.236.131', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWdxT3ZhMFdFZ0xaVG45bmFwTk1HaEx3TFNCOGg1V0RjZlJSaHNGNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJak0yVGk5clJXOXhUa1IyYzJ0U1dYSkJVblk1VW1jOVBTSXNJblpoYkhWbElqb2lLMlJPY3pGTmJ6ZHBhRmxPY1VWdU9ERmFRbVV6ZHowOUlpd2liV0ZqSWpvaVpqYzFNekUzTkRsaE16azNZbVUwTXpSa1l6WTVNemRsWWpVeU56UXlZMll5TnpNd1lXUmtaamt5WlRZek5EaGlOakV6WVdRMVpUaGlZMlptTWpJeVlTSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768438660),
('vGZjJz2mr2zqVMNX4TvEnkXCXfFAZY65zmn2MzYY', NULL, '3.82.194.84', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:50.0) Gecko/20100101 Firefox/50.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTXZWZEhoZ3hRSktKMDhSWmtvdXpiVmpiZEVkMHRoZmhWOEZmbVdPMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTE6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5way9jYXRlZ29yeS9Qcm9wZXJ0eV9mb3JfcmVudCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768438780),
('vHADwZCTW9Hc425ERVytZqW6HyKSQd2HgOIOkCEu', NULL, '37.59.204.154', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTmlZalBIcFdjNFFrOXNaeUFPQ2xNeFl1bFFYa2xiVHUzOXJGN3l0cCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJa3AyYlN0Uk1ucEpLMll4VW5Gc1JUQkJaMUpMSzBFOVBTSXNJblpoYkhWbElqb2lPSEE0V0hOVGNITkxRbGRLYkhwUk1WUk1abmhuUVQwOUlpd2liV0ZqSWpvaU5tWTFObVpqWkRaallUWTVNREUwTm1NM05qSXdNVEF4TURjMk5UUTVNV0ZqTmpkbFpUbGhZMlV5WldFek56UXlPVGMxTnpSbVlqYzFOamczTkRSaFpTSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768466689),
('vQNCu83Jsdl7QdA8CTuwbs5RqvLbcMX8pd2anToI', NULL, '51.68.247.196', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTkFqblZndjc4MHJWdjc3b3pNMEhOdWhEY2xseXFrUE9UMjFvcWIxZyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbFZ0VjFGTVNtVlNPRU0zTXpFMlZsVjZhVWdyYjJjOVBTSXNJblpoYkhWbElqb2lNV3d3VmxJdmVtTm1jM3BvV0VoSGJXaE1NWGRHVVQwOUlpd2liV0ZqSWpvaU5ESTNNRFZsTmpNNE1EVm1ZekJqTkdZek9ERmxaREV5WkdWbU5UazVZamsxWXpObU5tRXhNVE14TnpreVkyVXpZakUxWlRCbU5EYzVOR1ZrTnpkaVlpSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768443245),
('WKs1iQdYgoqrpvaiWrPC7548i47H7PfcveDaaTFw', NULL, '51.75.236.143', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRmxwM21xUUtSaTQ4OGpHZ3g0akdCakNycm1sb2h2TWZSMTFwNndXSiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJazlETkdKNU5UaEdiMjVxZUV4UGJsUXlaVlZsU2tFOVBTSXNJblpoYkhWbElqb2lWaXRCYXpCRVJURmpMMlZPY1hVdlIwOUtiSGd4WnowOUlpd2liV0ZqSWpvaVpESmtNVEV4TTJaalpEWXdOalF5TlRRd09UazJNbVU0TnpKbE5qQmhOemhqT1dFNU5qVXdZakZsWXpNMFpqVm1OR1ZsTm1RM09HRTBabUptWVRZNE55SXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768480492),
('wKSSNXIzxEGW0snuc7ipaXoVeYMdIqXPB0X0gV90', NULL, '5.39.1.254', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZUFEVlp3c1pUNGhBUTVYVFRORWFZTEsyczRLYThwcGllMXBkWmVyYyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbTlMUm5ORFRHZElOMk5MSzFWRU5ubERiMk55ZWxFOVBTSXNJblpoYkhWbElqb2ljRzR5V0VsRFkybGljVWxUWldwMVZXOXliRVo0ZHowOUlpd2liV0ZqSWpvaU16VTFNek5tTVRreU1HSXhOamcwTnpCbVlUUXdOMkUzTWpsaFl6UTROamszWm1RM05XRTVOek5qTTJOaFpUUXhZMlkwTlRFek4yUmlNR0V4TXpNeU1TSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768437981),
('WmUBLxsCysLxuRbsy72aiznt5Eljo1oJFQ2JQ7tf', NULL, '176.31.139.28', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWXNhV05nSGtoNlBvQzc2N0k0SmdURmhNOHlBcjJNWFZPWGVvakt6TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbVZ0WTJOcFlYUkhNSEZsWmtGcVQzVm1ZbXRJVG1jOVBTSXNJblpoYkhWbElqb2lVMkYxZVZoV1JEaGtaRGwyYkRrMGNXaDRiSEU1VVQwOUlpd2liV0ZqSWpvaU5qRXdNakkwTmprd09HUmpNR013TUdZNU9UVTFNV1ZsWVdabFl6SXhNak13WVRWaFltUmpPR0U1TURJMk9HVmtaak5pTnpjMk5qaGhOakkwWTJRNFpDSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768455883),
('x0dDjjTYSFfMKRESeZHoEVhpGNufpoOgq0kEebk0', NULL, '54.37.118.71', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMndvMHZIYzg1YTBCTUthN2lMY21SalJSU0l0OXRJT0cxM1JNcXhnayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbG95UVZwUFpGUldObTFVWjFoemJrWmpURFJGTlVFOVBTSXNJblpoYkhWbElqb2lNamhDYmpBeVRVVlhjRmsyY2xVMmRuUkdlVmhXZHowOUlpd2liV0ZqSWpvaU1tWTNNVFptWVdVd1pUbGhObVE1Wm1RM1pXRmpOVFF5T0RVMk1UUmlOMlF6TkRNM1pqVmhZelV5TmpWak9UZzBaV00yWm1NMk1tVmlOemt6TVdKbU9TSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768443993),
('X1ZurXB0z530s28H1CS20W2RSgXK6RU7NxYg7a3F', NULL, '37.59.204.139', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTUx1SkpLSkI3UkR0RkZBMDhuQXVnYWM0WkNRR2xWTnZvQlhqQU9OWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJbWhyZW5SSVp6RTNUWGg2V2xKRlowVnRUbUlyVTBFOVBTSXNJblpoYkhWbElqb2lWblI0U0VrNVVVZEhlbTUxTkhOSFFtUmFZV05VVVQwOUlpd2liV0ZqSWpvaVkyRTRPVEJtWkdVd05URXdOalZtTWpVNVptUTFOVFl6WXpJd05XUXlNR1pqTVdVMU5Ua3laVFExWTJSaVlqazNNR1k1WmpjMU5UWmpOakptWkdNeU5TSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768448892),
('xar8ZzF9RN38lBD6OEOkKTnTf19iE46PSnvcINlg', NULL, '205.210.31.43', '', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiM2pUZ2tPcExJRzB2MU5BUHd0b25HR3p2a3ZaRHYwdllraFhNdVBoNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768829990),
('xz95IcWfGevtuxypE4l5Jeci20qFN75AClmPdwdY', NULL, '176.31.139.9', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicmVneGQ4dUxLNGl3Y1BxczJINUhJOENaQ1R5OE9JZGJrSlFUelFNQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJa2xwTTJ4dU5FcHVaR1pVTVZGVWIyRk5VWGRUWlVFOVBTSXNJblpoYkhWbElqb2lUbXROV0ZsdmNUZDNTa1ZVVlM4MGFWWjZZbm8yVVQwOUlpd2liV0ZqSWpvaU9UTmpNall3TWpaaE1HTTNPREZsWVdVNU5XVTVZVGszT1dJd1pUZzJNemM1TUROaE56STFZamhtTXpZNVlUa3dZbU5tWVdFeU1UaG1NRGxtTnpWaE5TSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768457366),
('z9fg11OaaCOG4zybinRjM3seT2O1eTFSWVQIMViI', NULL, '71.6.134.232', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoialY4SkZ3VzU2WlNhMmJCQWFGNlBTYk9tNEVxUmNaMkJ5blJHVTl5ayI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHBzOi8vYWRzbWFya2V0LmNvbS5wayI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1771272767);
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('za4QVcG86L1rJE1f4X2ti8k3fE4j5dgSICvrN7og', NULL, '51.68.247.192', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRWRJMVNhYjdETDg2S3c5SFloTzdIaUFRR0ZZWmFDRlI2RHRuWUg5OSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQwOiJodHRwczovL2Fkc21hcmtldC5jb20ucGsvcHJvZHVjdF9kZXRhaWwvZXlKcGRpSTZJa051VUc1T1YzQndVVGs1V1dFdk5EQjFSemd4UTJjOVBTSXNJblpoYkhWbElqb2lkWGRQSzBaMlVsa3piSGwyVVZORlRrZEZVMFl4UVQwOUlpd2liV0ZqSWpvaU1XVXdaakk0TnpjeVpEVTJNVGRrTURneVpqYzVOalU0TURVMk5UTXdNekV3TUdRMk5tWXhNalZrWldabFpqbGlNemRsWXprNFlUZzBaREV4WkRFMU5TSXNJblJoWnlJNklpSjkiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1768476140);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_category_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tablets', '2024-07-17 03:13:48', '2024-07-17 03:50:23'),
(2, 1, 'Accessories', '2024-07-17 03:15:29', '2024-07-17 03:15:29'),
(3, 1, 'Smart_watch', '2024-07-17 03:16:05', '2024-07-17 03:50:35'),
(4, 1, 'Mobiles_phones', '2024-07-17 03:16:19', '2024-07-17 03:50:42'),
(5, 2, 'Car', '2024-07-17 03:17:08', '2024-07-17 03:50:49'),
(6, 2, 'Cars_on_Installments', '2024-07-17 03:17:32', '2024-07-17 10:36:20'),
(7, 2, 'Cars_Accessories', '2024-07-17 10:36:38', '2024-07-17 10:36:38'),
(8, 2, 'Spare_Parts', '2024-07-17 10:37:18', '2024-07-17 10:37:18'),
(9, 2, 'Buses_Vans_Trucks', '2024-07-17 10:38:47', '2024-07-17 10:38:47'),
(10, 2, 'Rickshaw_Chingchi', '2024-07-17 10:39:48', '2024-07-17 10:39:48'),
(11, 2, 'Boats', '2024-07-17 10:40:59', '2024-07-17 10:40:59'),
(12, 2, 'Tractors_Trailers', '2024-07-17 10:41:16', '2024-07-17 10:41:16'),
(13, 3, 'Land_&_Plots', '2024-07-17 10:41:43', '2024-08-23 11:13:21'),
(14, 3, 'Houses', '2024-07-17 10:44:10', '2024-07-17 10:44:10'),
(15, 3, 'Apartments_&_Flats', '2024-07-17 10:44:26', '2024-08-23 11:13:43'),
(16, 3, 'Shops_Offices_Commercial_Space', '2024-07-17 10:44:43', '2024-07-17 10:44:43'),
(17, 3, 'Portions_&_Floors', '2024-07-17 10:45:05', '2024-08-23 11:14:04'),
(18, 4, 'Houses_for_Rent', '2024-07-17 10:45:25', '2024-08-20 06:57:02'),
(19, 4, 'Apartments_&_Flats_Rent', '2024-07-17 10:46:01', '2024-08-23 11:14:33'),
(20, 4, 'Portions_&_Floors_Rent', '2024-07-17 10:46:17', '2024-08-23 11:14:59'),
(21, 4, 'Shops_Offices_Commercial_Space_Rent', '2024-07-17 10:46:40', '2024-08-20 06:59:16'),
(22, 4, 'Rooms', '2024-07-17 10:47:00', '2024-07-17 10:47:00'),
(23, 4, 'Roommates_Paying_Guests', '2024-07-17 10:47:21', '2024-07-17 10:47:21'),
(24, 4, 'Vacation_Rentals_Guest_Houses', '2024-07-17 10:47:49', '2024-07-17 10:47:49'),
(25, 4, 'Land_&_Plots_Rent', '2024-07-17 10:48:14', '2024-08-23 11:15:24'),
(26, 5, 'Motorcycles', '2024-07-17 10:56:16', '2024-07-17 10:56:16'),
(28, 5, 'Bike_Spare_Parts', '2024-07-18 06:54:52', '2024-07-18 06:54:52'),
(29, 6, 'Sofa_Chairs', '2024-07-17 11:01:58', '2024-07-17 11:01:58'),
(30, 6, 'Office_Furniture', '2024-07-17 11:02:59', '2024-07-17 11:02:59'),
(31, 7, 'Fashion_Accessories', '2024-07-17 11:04:43', '2024-07-17 11:04:43'),
(32, 7, 'Makeup', '2024-07-17 11:04:58', '2024-07-17 11:04:58'),
(33, 7, 'Skin_Hair', '2024-07-17 11:05:10', '2024-07-17 11:05:10'),
(34, 7, 'Wedding', '2024-07-17 11:05:24', '2024-07-17 11:05:24'),
(37, 5, 'Bicycles', '2024-07-18 10:48:45', '2024-07-18 10:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_name_type`
--

CREATE TABLE `sub_category_name_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_name_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_category_name_type`
--

INSERT INTO `sub_category_name_type` (`id`, `category_id`, `sub_category_id`, `sub_category_name_type`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Charging_Cables', '2024-07-17 06:36:31', '2024-07-17 06:36:31'),
(2, 1, 2, 'Converters', '2024-07-17 07:18:13', '2024-07-17 07:18:13'),
(3, 1, 2, 'Chargers', '2024-07-17 07:46:45', '2024-07-17 07:46:45'),
(4, 1, 2, 'Screen', '2024-07-17 11:26:26', '2024-07-17 11:26:26'),
(5, 5, 26, 'Electric_Bikes', '2024-07-17 10:57:52', '2024-07-17 10:57:52'),
(6, 5, 26, 'Sports_Heavy_Bikes', '2024-07-17 10:58:11', '2024-07-17 10:58:11'),
(7, 5, 28, 'Air_Filters', '2024-07-17 11:00:37', '2024-07-18 11:02:20'),
(8, 5, 28, 'Carburetors', '2024-07-17 11:01:02', '2024-07-18 11:02:42'),
(9, 5, 28, 'Bearings', '2024-07-17 11:01:27', '2024-07-18 11:03:00'),
(16, 6, 29, 'Sofas', '2024-07-17 11:02:24', '2024-07-17 11:02:24'),
(17, 6, 29, 'Sofa_Beds', '2024-07-17 11:02:39', '2024-07-17 11:02:39'),
(18, 6, 30, 'Office_Chairs', '2024-07-17 11:03:20', '2024-07-17 11:03:20'),
(19, 6, 30, 'Office_Sofas', '2024-07-17 11:03:37', '2024-07-17 11:03:37'),
(20, 6, 30, 'Office_Tables', '2024-07-17 11:04:04', '2024-07-17 11:04:04'),
(21, 7, 31, 'Caps', '2024-07-17 11:05:44', '2024-07-17 11:05:44'),
(22, 7, 31, 'Scarves', '2024-07-17 11:06:14', '2024-07-17 11:06:14'),
(23, 7, 31, 'Gloves', '2024-07-17 11:06:31', '2024-07-17 11:06:31'),
(24, 7, 32, 'Eyes', '2024-07-17 11:07:12', '2024-07-17 11:07:12'),
(25, 7, 32, 'Brushes', '2024-07-17 11:06:54', '2024-07-17 11:06:54'),
(26, 7, 32, 'Face', '2024-07-17 11:07:29', '2024-07-17 11:07:29'),
(27, 7, 33, 'Hair_Care', '2024-07-17 11:07:47', '2024-07-17 11:07:47'),
(28, 7, 33, 'Skin_Care', '2024-07-17 11:08:05', '2024-07-17 11:08:05'),
(29, 7, 34, 'Bridals', '2024-07-17 11:08:22', '2024-07-17 11:08:22'),
(30, 7, 34, 'Grooms', '2024-07-17 11:08:39', '2024-07-17 11:08:39'),
(58, 5, 37, 'Road_Bikes', '2024-07-18 10:51:30', '2024-07-18 11:09:14'),
(59, 5, 37, 'Mountain_Bikes', '2024-07-18 10:51:51', '2024-07-18 11:09:37'),
(60, 5, 37, 'Electric_Bicycles', '2024-07-18 10:52:06', '2024-07-18 11:10:01'),
(61, 5, 28, 'Side_Mirrors', '2024-07-18 11:04:48', '2024-07-18 11:04:48'),
(62, 5, 28, 'Motorcycle_Batteries', '2024-07-18 11:05:41', '2024-07-18 11:05:41'),
(63, 5, 28, 'Switches', '2024-07-18 11:07:54', '2024-07-18 11:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT current_timestamp(),
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `phone_verified` tinyint(1) NOT NULL DEFAULT 0,
  `verification_code` varchar(255) DEFAULT NULL,
  `google_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `phone_no`, `role`, `profile_image`, `phone_verified`, `verification_code`, `google_id`) VALUES
(37, 'ahmad', 'ahmad@gmail.com', NULL, '$2y$12$WCMhACQ/KN7HEbKI1jsi9eZC2O.Qm8mwO4R3AXWQt8F/cZ6tNzvJ2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-11-14 07:37:43', '2024-11-14 07:37:43', '+923034567890', 'admin', NULL, 0, NULL, NULL),
(56, 'irfan aslam', 'irfanaslam199721@gmail.com', '2024-11-19 08:50:36', '$2y$12$6QEk2Bv//nfkHd/Ea.Cdzu3X.A7yWxBAX6yRmSLE5VTrPxqMN6Pqq', NULL, NULL, NULL, 'TPbbsatX1yxqhSgmmbpDfIbkv95edNaPxYZ6VGPMPsiP6mgXXUbZ8Gy4QeGb', NULL, NULL, '2024-11-19 08:50:36', '2024-11-19 10:26:42', '+923014939544', 'user', NULL, 0, NULL, '111755985046439444954'),
(58, 'Naeem Ahmad', 'naeemahmadg7@gmail.com', '2024-11-19 11:09:47', '$2y$12$M8QMZlmlICJqVSQgEzihSO5pDYcWXM1xh4/8G.rVvITZjNQgFTlv6', NULL, NULL, NULL, 'MHzOa3XDkbj9zyEdSTteq98B2V3fkGjOuBGVk1amVkXRysj37aGpbOrFbP5c', NULL, NULL, '2024-11-19 11:09:47', '2024-11-19 11:39:04', '+923022146536', 'admin', NULL, 0, NULL, '115203135338036954655'),
(59, 'murtaza ahmad', 'murtazalinks76@gmail.com', '2024-11-20 08:50:43', '$2y$12$ZSlOGLu2jMN2MIRvK1T9XuXYsM/eQ/dI3XISQCNAKQz4naefCG9xW', NULL, NULL, NULL, 'o5c49ptPnUlu4I69tjatguNX97IV4JkegB7d4F1gBsL13r3jevosMoEHc95Q', NULL, NULL, '2024-11-20 08:50:43', '2024-11-20 08:50:43', NULL, 'user', NULL, 0, NULL, '113187538532405203315'),
(60, 'Naeem Ahmad', 'naeemahmadn123@gmail.com', '2024-12-16 08:57:44', '$2y$12$RMZyCnoqJ3NTMCNiYZj7aOBW/WNi5UfbXoZ4wbH3/4a3aswCaS5AW', NULL, NULL, NULL, 'KxBc4mUUezhk1J71gyFOzMFUNwPTafHYpRw0tKoGP4kh2K889dPjxvT2t1X8', NULL, NULL, '2024-12-16 08:57:44', '2024-12-16 08:57:44', NULL, 'admin', NULL, 0, NULL, '100773147524332008344'),
(61, 'naeem ahmad', 'naeemahmadm98765@gmail.com', '2025-04-08 12:41:44', '$2y$12$1PVzZGdgseyoolN8EuowcequBA0eFv0PYGupOOhi7mhnp9N6BL8qS', NULL, NULL, NULL, 'IKwWCvVA2rN7EIUYkCpAiiMpQgwQ4HZyPR7uNMAvfEYNpF8BRbK2V2sRdtz5', NULL, NULL, '2025-04-08 11:41:44', '2025-04-08 11:41:44', NULL, 'user', NULL, 0, NULL, '103149725882423338886'),
(62, 'Accommodation Links', 'accommodationlinks.co.uk@gmail.com', '2025-07-03 07:48:05', '$2y$12$VlZ4nsQXgmVGrXcVJlzPPOyT9vkrMCpQ0jrI/2GHYTSZE877F6n3q', NULL, NULL, NULL, 'E1lwoDgjCLnoj8iHJHANAfJhMxvm8v3wJQiiZO4Os5CMtyr6NXsfAvqbYMrJ', NULL, NULL, '2025-07-03 06:48:05', '2025-07-03 06:51:50', '+9203064982567', 'user', NULL, 0, NULL, '116872762131950064757');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_category_id_foreign` (`category_id`);

--
-- Indexes for table `adsbusinesses`
--
ALTER TABLE `adsbusinesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adsimages`
--
ALTER TABLE `adsimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adsimages_ad_id_foreign` (`ad_id`);

--
-- Indexes for table `ads_images`
--
ALTER TABLE `ads_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ads_images_ad_id_foreign` (`ad_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_verifications`
--
ALTER TABLE `email_verifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_verifications_email_unique` (`email`),
  ADD UNIQUE KEY `email_verifications_token_unique` (`token`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorite_view`
--
ALTER TABLE `favorite_view`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_view_ad_id_foreign` (`ad_id`),
  ADD KEY `favorite_view_users_id_foreign` (`users_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `sub_category_name_type`
--
ALTER TABLE `sub_category_name_type`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_category_name_type_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=413;

--
-- AUTO_INCREMENT for table `adsbusinesses`
--
ALTER TABLE `adsbusinesses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `adsimages`
--
ALTER TABLE `adsimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=721;

--
-- AUTO_INCREMENT for table `ads_images`
--
ALTER TABLE `ads_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `email_verifications`
--
ALTER TABLE `email_verifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite_view`
--
ALTER TABLE `favorite_view`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `sub_category_name_type`
--
ALTER TABLE `sub_category_name_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `ads_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ads_images`
--
ALTER TABLE `ads_images`
  ADD CONSTRAINT `ads_images_ad_id_foreign` FOREIGN KEY (`ad_id`) REFERENCES `ads` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
