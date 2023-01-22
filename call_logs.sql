-- -------------------------------------------------------------
-- TablePlus 4.6.8(424)
--
-- https://tableplus.com/
--
-- Database: call_logs
-- Generation Time: 2023-01-22 17:00:59.0920
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `call_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `callId` int(10) unsigned DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `details` longtext,
  `hours` int(11) DEFAULT NULL,
  `minutes` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`callId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

CREATE TABLE `call_headers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `callId` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `it_person` char(32) DEFAULT NULL,
  `username` char(32) DEFAULT NULL,
  `subject` char(64) DEFAULT NULL,
  `details` longtext,
  `total_hours` int(11) DEFAULT '0',
  `total_minutes` int(11) DEFAULT '0',
  `status` char(15) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_index` (`callId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `call_details` (`id`, `callId`, `date`, `details`, `hours`, `minutes`, `updated_at`, `created_at`, `deleted_at`) VALUES
(12, 3234, '2023-01-22 16:32:00', '            dsdcdss', 0, 20, '2023-01-22 16:32:54', '2023-01-22 16:32:54', '2023-01-22 16:32:54'),
(13, 3235, '2023-01-22 16:33:00', '            TESTING', 0, 32, '2023-01-22 16:34:02', '2023-01-22 16:34:02', '2023-01-22 16:34:02'),
(14, 123, '2023-01-22 16:34:00', '            TESTING AGAIN', 0, 10, '2023-01-22 16:34:35', '2023-01-22 16:34:35', '2023-01-22 16:34:35');

INSERT INTO `call_headers` (`id`, `callId`, `date`, `it_person`, `username`, `subject`, `details`, `total_hours`, `total_minutes`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3234, '2023-01-21 10:50:13', 'Stephen Enikanoselu', 'senikanosleu', 'Medication', 'Change of medication', 0, 20, 'New', '2023-01-22 16:31:08', '2023-01-22 16:31:08', NULL),
(2, 3235, '2023-01-21 10:50:13', 'Pope John', 'senikanosleu', 'Shift Cancelation', '	Client Not Feeling To Well', 0, 32, 'Completed', '2023-01-22 16:31:08', '2023-01-22 16:31:08', NULL),
(3, 123, '2023-01-21 16:28:00', 'Stephen Enikanoselu', 'senikanoselu@gmail.com', 'Mobile App', 'fdsdfvfvdf', 0, 10, 'In Progress', '2023-01-22 16:31:08', '2023-01-22 16:31:08', NULL);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;