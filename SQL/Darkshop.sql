-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for test
CREATE DATABASE IF NOT EXISTS `akaitunsp33_kaitunsp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `akaitunsp33_kaitunsp`;

-- Dumping structure for table test.accounts
CREATE TABLE IF NOT EXISTS `accounts` (
  `ac_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(512) NOT NULL,
  `salt` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `points` float NOT NULL DEFAULT 0,
  `sid` varchar(256) NOT NULL,
  `role` int(3) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table test.accounts: ~0 rows (approximately)
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;

-- Dumping structure for table test.card_image
CREATE TABLE IF NOT EXISTS `card_image` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` int(11) NOT NULL,
  `image_name` text NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8;

-- Dumping data for table test.card_image: ~11 rows (approximately)
/*!40000 ALTER TABLE `card_image` DISABLE KEYS */;
INSERT INTO `card_image` (`image_id`, `card_id`, `image_name`) VALUES
	(141, 119, '57a161431a2c247316d6b832699474c3_item.jpg'),
	(142, 120, '87da32d686bb9abed6f611a48e0f09ea_item.jpg'),
	(143, 121, 'cc54484932d62602f01920358e67015d_item.jpg'),
	(144, 122, '22acf76c2246a1b14dee88c2d94f2d87_item.jpg'),
	(145, 123, '2d1c8e9ec2ffa85a669d09502c281e3f_item.jpg'),
	(146, 124, '1b468be69eda2135a75c8ae1c94af628_item.jpg'),
	(147, 125, 'ec03240e0efdb0bb31ea8d54ba4c2402_item.jpg'),
	(148, 126, '063a4e01371ebd414203112c5c344dc5_item.jpg'),
	(149, 127, 'd17746b38f5bc1111588498eba3d9ff9_item.jpg'),
	(152, 129, '5c36f0e013fd89eef738bd54d8f68927_item.jpg'),
	(153, 130, 'd6be0ea9bb43d18d0118bcc9b8655cb1_item.jpg');
/*!40000 ALTER TABLE `card_image` ENABLE KEYS */;

-- Dumping structure for table test.data_selled
CREATE TABLE IF NOT EXISTS `data_selled` (
  `selled_id` int(11) NOT NULL AUTO_INCREMENT,
  `data_id` int(11) NOT NULL,
  `ac_id` int(11) NOT NULL,
  `selled_date` datetime NOT NULL,
  PRIMARY KEY (`selled_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table test.data_selled: ~0 rows (approximately)
/*!40000 ALTER TABLE `data_selled` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_selled` ENABLE KEYS */;

-- Dumping structure for table test.game_card
CREATE TABLE IF NOT EXISTS `game_card` (
  `card_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `card_title` text NOT NULL,
  `card_price` double NOT NULL,
  `card_detail` text NOT NULL,
  PRIMARY KEY (`card_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table test.game_card: ~0 rows (approximately)
/*!40000 ALTER TABLE `game_card` DISABLE KEYS */;
/*!40000 ALTER TABLE `game_card` ENABLE KEYS */;

-- Dumping structure for table test.game_data
CREATE TABLE IF NOT EXISTS `game_data` (
  `data_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `card_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `detail` text NOT NULL,
  `selled` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table test.game_data: ~0 rows (approximately)
/*!40000 ALTER TABLE `game_data` DISABLE KEYS */;
/*!40000 ALTER TABLE `game_data` ENABLE KEYS */;

-- Dumping structure for table test.game_type
CREATE TABLE IF NOT EXISTS `game_type` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_name` text NOT NULL,
  `game_image` text NOT NULL,
  PRIMARY KEY (`game_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- Dumping data for table test.game_type: ~0 rows (approximately)
/*!40000 ALTER TABLE `game_type` DISABLE KEYS */;
INSERT INTO `game_type` (`game_id`, `game_name`, `game_image`) VALUES
	(14, 'ROBLOX', '4bececf7193ed3e0e8d546e3822a2992_game.jpg');
/*!40000 ALTER TABLE `game_type` ENABLE KEYS */;

-- Dumping structure for table test.history_pay
CREATE TABLE IF NOT EXISTS `history_pay` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `link` text NOT NULL,
  `amount` float NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table test.history_pay: ~0 rows (approximately)
/*!40000 ALTER TABLE `history_pay` DISABLE KEYS */;
/*!40000 ALTER TABLE `history_pay` ENABLE KEYS */;

-- Dumping structure for table test.image_slide
CREATE TABLE IF NOT EXISTS `image_slide` (
  `slide_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` text NOT NULL,
  PRIMARY KEY (`slide_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- Dumping data for table test.image_slide: ~2 rows (approximately)
/*!40000 ALTER TABLE `image_slide` DISABLE KEYS */;
INSERT INTO `image_slide` (`slide_id`, `image_name`) VALUES
	(18, '9a876c17fcc0cb6dcd736532e595ab1b_slide.jpg'),
	(19, '0fb1dc36c61b91ee79b022353d82d7a8_slide.jpg');
/*!40000 ALTER TABLE `image_slide` ENABLE KEYS */;

-- Dumping structure for table test.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `buyer_id` int(11) NOT NULL,
  `data_item` text NOT NULL,
  `user` text NOT NULL,
  `pass` text NOT NULL,
  `order_status` text NOT NULL,
  `order_ression` text NOT NULL,
  `refund_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table test.orders: ~0 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table test.stock_item
CREATE TABLE IF NOT EXISTS `stock_item` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_name` text NOT NULL,
  `item_img` text NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_amount` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table test.stock_item: ~0 rows (approximately)
/*!40000 ALTER TABLE `stock_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_item` ENABLE KEYS */;

-- Dumping structure for table test.web_config
CREATE TABLE IF NOT EXISTS `web_config` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `facebook` text NOT NULL,
  `detail` text NOT NULL,
  `image` text NOT NULL,
  `opened` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table test.web_config: ~0 rows (approximately)
/*!40000 ALTER TABLE `web_config` DISABLE KEYS */;
INSERT INTO `web_config` (`con_id`, `name`, `facebook`, `detail`, `image`, `opened`) VALUES
	(1, 'DARK SHOP', '101002951490510', 'à¸šà¸£à¸´à¸à¸²à¸£ à¸ˆà¸³à¸«à¸™à¹ˆà¸²à¸¢à¸‚à¸­à¸‡à¹ƒà¸™à¹€à¹€à¸¡à¸ž BLOX FRUITS\nà¸šà¸£à¸´à¸à¸²à¸£à¸à¸”à¹€à¸à¸¡à¸žà¸¥à¸²à¸ª - à¸ˆà¸³à¸«à¸™à¹ˆà¸²à¸¢à¹„à¸à¹ˆà¸•à¸±à¸™\n', 'cfbaa07678f955cc9f8ef0a4ebfb11ff_logo.png', 1);
/*!40000 ALTER TABLE `web_config` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
