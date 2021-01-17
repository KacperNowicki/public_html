-- -------------------------------------------------------------
-- TablePlus 3.11.1(353)
--
-- https://tableplus.com/
--
-- Database: etsiio
-- Generation Time: 2020-11-30 07:41:42.5880
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `waitlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `date_added` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

INSERT INTO `waitlist` (`id`, `email`, `first_name`, `last_name`, `date_added`) VALUES
('1', 'admin@gmail.com', 'fname', 'lname', '2020-11-30 06:52:03'),
('11', 'api@ideal4u.com', 'ddd', 'jsnadj', '2020-11-29 23:43:43'),
('12', 'bidari@gmail.com', 'Bidari', 'Darius', '2020-11-29 23:47:46'),
('13', 'admin@admin.com', 'ddd', 'jsnadj', '2020-11-29 23:54:25'),
('14', 'admin2@admin.com', 'iasjdxn', 'jsnadj', '2020-11-29 23:56:12'),
('15', 'admin23@admin.com', 'iasjdxn', 'jsnadj', '2020-11-29 23:56:55'),
('16', '2admin23@admin.com', 'iasjdxn', 'jsnadj', '2020-11-29 23:57:23'),
('18', 'useruser@mail.com', 'Username', 'Lastname', '2020-11-30 00:45:33'),
('19', 'admin69@admin.com', 'User', 'Lastname', '2020-11-30 07:37:42');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;