-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 09:12 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `address_book`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `del_email_p` (IN `my_var` VARCHAR(255))  BEGIN
   SELECT d.id, d.first_name, d.last_name, d.email, d.phone
   FROM deleted AS d 
   WHERE d.email LIKE CONCAT('%',my_var,'%');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_fn_p` (IN `my_var` VARCHAR(255))  BEGIN
   SELECT d.id, d.first_name, d.last_name, d.email, d.phone
   FROM deleted AS d 
   WHERE d.first_name LIKE CONCAT('%',my_var,'%');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_ln_p` (IN `my_var` VARCHAR(255))  BEGIN
   SELECT d.id, d.first_name, d.last_name, d.email, d.phone
   FROM deleted AS d 
   WHERE d.last_name LIKE CONCAT('%',my_var,'%');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_phone_p` (IN `my_var` VARCHAR(255))  BEGIN
   SELECT d.id, d.first_name, d.last_name, d.email, d.phone
   FROM deleted AS d
   WHERE INSTR(d.phone, phone) > 0;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_email` (IN `email` VARCHAR(255))  BEGIN
   SELECT c.id, c.first_name, c.last_name, c.email, c.phone
   FROM contacts AS c 
   WHERE c.email LIKE CONCAT('%',email,'%');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_firstname` (IN `fn` VARCHAR(255))  BEGIN
   SELECT c.id, c.first_name, c.last_name, c.email, c.phone
   FROM contacts AS c 
   WHERE c.first_name LIKE CONCAT('%',fn,'%');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_lastname` (IN `ln` VARCHAR(255))  BEGIN
   SELECT c.id, c.first_name, c.last_name, c.email, c.phone
   FROM contacts AS c 
   WHERE c.last_name LIKE CONCAT('%',ln,'%');
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `p_phone` (IN `phone` VARCHAR(255))  BEGIN
   SELECT c.id, c.first_name, c.last_name, c.email, c.phone
   FROM contacts AS c
   WHERE INSTR(c.phone, phone) > 0;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `phone`, `email`) VALUES
(8, 'Bojana', 'Petrovic', '065/3423354', 'nikolic_bojana99@gmail.com'),
(9, 'Jovana', 'Perisic', '065/7234421', 'joka221@gmail.com'),
(10, 'Momcilo', 'Krstic', '064/0724406', 'krstic.m.027@gmai.com'),
(12, 'Nikola', 'Arandjelovic', '065/7234421', 'test123@gmail.com'),
(18, 'Ana', 'Krstic', '061/4855164', 'ana_krstic94@gmail.com'),
(20, 'Lazar', 'Stanojevic', '065/77815423', 'laki97@hotmail.com'),
(22, 'Svetlana', 'Gaucho', '066/44555632', 'cecaakrstic@gmail.com');

--
-- Triggers `contacts`
--
DELIMITER $$
CREATE TRIGGER `deleted` BEFORE DELETE ON `contacts` FOR EACH ROW BEGIN
INSERT INTO deleted SET first_name=old.first_name, last_name=old.last_name, phone=old.phone, email=old.email; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `deleted`
--

CREATE TABLE `deleted` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deleted`
--

INSERT INTO `deleted` (`id`, `first_name`, `last_name`, `phone`, `email`) VALUES
(2, 'Kum', 'Vasic', '0601526485', 'vasagodfather@hotmail.com'),
(3, 'Stefan', 'Vukadinovic', '066/44555632', 'nemammail@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deleted`
--
ALTER TABLE `deleted`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `deleted`
--
ALTER TABLE `deleted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
