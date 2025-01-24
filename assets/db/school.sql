-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 05:51 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `firstname` varchar(25) DEFAULT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `gender` char(1) NOT NULL,
  `birthdate` date NOT NULL,
  `comments` varchar(250) NOT NULL,
  `saved_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstname`, `lastname`, `email`, `phone`, `gender`, `birthdate`, `comments`, `saved_date`) VALUES
(1, 'Prosper', 'Mbuma', 'prospermbuma@gmail.com', '0716491716', 'M', '1995-05-15', 'Mimi kama mwanafunzi wa Computer Science hapa IFM, ni maombi yangu kwamba chuo kitutengenezee Computer Center sisi kama wanafunzi wa Computing.\r\nNatumai maombi yangu yataafanyiwa kazi vyema.\r\nAsante sana.', '2021-06-17 05:59:48'),
(2, 'Precious', 'Mbuma', 'precious@yahoo.com', '0716491716', 'F', '1995-05-17', 'Mimi kama mwanafunzi wa Computer Science hapa IFM, ni maombi yangu kwamba chuo kitutengenezee Computer Center sisi kama wanafunzi wa Computing.\r\nNatumai maombi yangu yataafanyiwa kazi vyema.\r\nAsante sana.', '2021-06-17 05:59:48'),
(3, 'John', 'Haule', 'haluo@yahoo.com', '0786324231', 'M', '1997-06-10', 'Mimi kama mwanafunzi wa Computer Science hapa IFM, ni maombi yangu kwamba chuo kitutengenezee Computer Center sisi kama wanafunzi wa Computing.\r\nNatumai maombi yangu yataafanyiwa kazi vyema.\r\nAsante sana.', '2021-06-17 05:59:48'),
(4, 'Joyce', 'Haule', 'joy@hotmail.com', '0743422341', 'F', '1998-10-04', 'Mimi kama mwanafunzi wa Computer Science hapa IFM, ni maombi yangu kwamba chuo kitutengenezee Computer Center sisi kama wanafunzi wa Computing.\r\nNatumai maombi yangu yataafanyiwa kazi vyema.\r\nAsante sana.', '2021-06-17 05:59:48'),
(5, 'Victoria', 'Mbuma', 'vicky@hotmail.com', '06532312323', 'F', '1993-03-22', 'Mimi kama mwanafunzi wa Computer Science hapa IFM, ni maombi yangu kwamba chuo kitutengenezee Computer Center sisi kama wanafunzi wa Computing.\r\nNatumai maombi yangu yataafanyiwa kazi vyema.\r\nAsante sana.', '2021-06-17 05:59:48'),
(6, 'GLADNESS', 'Mbuma', 'glady@gmail.com', '06532312323', 'F', '2003-02-17', 'Mimi kama mwanafunzi wa Computer Science hapa IFM, ni maombi yangu kwamba chuo kitutengenezee Computer Center sisi kama wanafunzi wa Computing.\r\nNatumai maombi yangu yataafanyiwa kazi vyema.\r\nAsante sana.', '2021-06-17 05:59:48'),
(7, 'GLADNESS', 'NICHOLAS', 'glady@gmail.com', '0672345523', 'F', '2003-02-17', 'Mimi kama mwanafunzi wa Computer Science hapa IFM, ni maombi yangu kwamba chuo kitutengenezee Computer Center sisi kama wanafunzi wa Computing.\r\nNatumai maombi yangu yataafanyiwa kazi vyema.\r\nAsante sana.', '2021-06-17 05:59:48'),
(8, 'JANE', 'KATUNZI', 'glady@gmail.com', '0672345524', 'F', '2003-02-17', 'Mimi kama mwanafunzi wa Computer Science hapa IFM, ni maombi yangu kwamba chuo kitutengenezee Computer Center sisi kama wanafunzi wa Computing.\r\nNatumai maombi yangu yataafanyiwa kazi vyema.\r\nAsante sana.', '2021-06-17 05:59:48'),
(9, '', '', '', '', 'M', '0000-00-00', '', '2021-06-17 05:59:48'),
(10, 'JOSEPH', 'MBUMA', 'jozype@yahoo.com', '0689436723', 'M', '1999-04-17', 'Mimi kama mwanafunzi wa Computer Science hapa IFM, ni maombi yangu kwamba chuo kitutengenezee Computer Center sisi kama wanafunzi wa Computing.\r\nNatumai maombi yangu yataafanyiwa kazi vyema.\r\nAsante sana.', '2021-06-17 06:05:41'),
(11, 'HARRIS', 'JOTWA', 'jotwa@yahoo.com', '0715378278', 'M', '1994-06-28', 'Mimi kama mwanafunzi wa Computer Science hapa IFM, ni maombi yangu kwamba chuo kitutengenezee Computer Center sisi kama wanafunzi wa Computing.\r\nNatumai maombi yangu yataafanyiwa kazi vyema.\r\nAsante sana.', '2021-06-17 06:30:53'),
(12, 'GRACE', 'FRANCIS', 'grace@gmail.com', '0763431223', 'F', '1997-02-05', 'Mimi kama mwanafunzi wa Computer Science hapa IFM, ni maombi yangu kwamba chuo kitutengenezee Computer Center sisi kama wanafunzi wa Computing.\r\nNatumai maombi yangu yataafanyiwa kazi vyema.\r\nAsante sana.', '2021-06-17 06:50:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
