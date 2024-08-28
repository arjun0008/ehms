-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 28, 2024 at 03:11 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'Administrator', 'admin@mail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `appointment_id` int NOT NULL AUTO_INCREMENT,
  `doc_id` int NOT NULL,
  `pat_id` int NOT NULL,
  `date` date NOT NULL,
  `slot` int NOT NULL,
  `booked` varchar(255) NOT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `doc_id`, `pat_id`, `date`, `slot`, `booked`, `status`) VALUES
(95, 1, 31, '2023-05-17', 3, '', ''),
(102, 1, 40, '2023-05-24', 2, '2023-05-19 17:36:23', ''),
(103, 2, 40, '2023-05-20', 1, '2023-05-19 17:42:38', ''),
(104, 2, 31, '2023-05-20', 2, '2023-05-19 17:59:52', ''),
(105, 1, 31, '2023-05-31', 2, '2023-05-26 09:29:10', 'canceled'),
(106, 1, 51, '2024-08-30', 1, '2024-08-28 14:41:26', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `doc_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `dp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default.png',
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `hospital_id` int NOT NULL,
  `working_days` varchar(255) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doc_id`, `name`, `gender`, `dob`, `phone_no`, `email`, `address`, `specialization`, `dp`, `username`, `password`, `hospital_id`, `working_days`) VALUES
(1, 'Dr.Roy Mathews', 'Male', '1980-01-01', '1234567890', 'roymathews@email.com', '123 Main  Elamakara', 'Surgeon', 'default.png', 'dr.roymathews', 'password125', 1, '3,4,5'),
(2, 'Dr.shalini ', 'Female', '1985-05-05', '0987654321', 'Shalini.2017@email.com', '456 Elm St, Anytown', 'Gynaecology', 'default.png', 'dr.shalini', 'shalini2342', 1, '1,2,3,4,5,6,7'),
(3, 'Dr.Ravi Tharakan', 'Male', '1975-12-31', '5555555555', 'ravitharakan.2002@email.com', '789 Gandinagar street', 'Physiotherapist', 'default.png', 'Dr.Ravi', 'Tharakan1253', 1, '1,2,3,4,5,6,7'),
(4, 'Dr.Angelina David', 'Female', '1990-03-15', '2223334444', 'angelina David.90@email.com', '321 Washington street ', 'Dermatology', 'default.png', 'Dr.Angelina', 'Angelina@354', 3, '5,6,7'),
(5, 'Dr.Bhargavan pillai', 'Male', '1982-07-07', '9998887777', 'bhargavanpillai.2012@email.com', 'Madathil House', 'Gastroenterologist', 'default.png', 'Dr.Bhargavan', 'Bhargavanpillai@125', 1, '1,2,3,4,5,6,7'),
(6, 'Dr.Annie John', 'Female', '1988-11-22', '1112223333', 'anniejohn.2022@email.com', '987 Cedar ', 'Pediatrician', 'default.png', 'Dr.Annie', 'AnnieJohn*123', 3, '1,2,3'),
(7, 'Dr.sebatti James', 'Male', '1970-06-10', '4445556666', 'sebattijames.70@email.com', 'Balaramapuram House', 'Cardiologist', 'default.png', 'Dr.sebatti', 'sebatti James$354', 1, '4,5'),
(8, 'Dr. Vandhana Chandran', 'Female', '1984-09-03', '7778889999', 'vandhanachandran@email.com', 'Puthezhatu House ', 'Neurology', 'default.png', 'Dr.Vandhana', 'Vandhana@785', 1, '4,5,6'),
(9, 'Dr. Maran', 'Male', '1974-06-22', '9266461288', 'dr.maran@mail.com', 'Casuarina Drive Street, Neelankarai, Chennai', 'Surgeon, General Medicine', 'default.png', 'dr.maran', 'password', 2, '1,2,3,4,5,6,7'),
(12, 'Annamma', 'Female', '2001-02-07', '9446898290', 'Annamma@mail.com', 'Blah Blah Blah Blah', 'Neurology', 'p2.jpg', 'Annamma@mail.com', 'password', 1, '1,2,3');

-- --------------------------------------------------------

--
-- Table structure for table `donor_camp`
--

DROP TABLE IF EXISTS `donor_camp`;
CREATE TABLE IF NOT EXISTS `donor_camp` (
  `d_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donor_camp`
--

INSERT INTO `donor_camp` (`d_id`, `name`, `gender`, `blood_group`, `dob`, `phone_no`, `email`, `address`) VALUES
(1, 'Arjun', 'Male', 'AB+', '2001-07-07', '9446898290', 'arjunalaiju.cse20@mbits.ac.in', 'BLAH BLAH BLAH'),
(2, 'Jobin', 'Male', 'B+', '2002-06-07', '9446898290', 'jobinsaji2002@gmail.com', 'Blah Blah Blah Blah'),
(3, 'Agin', 'Male', 'O+', '2002-05-13', '9446898290', 'aginjames2002@gmail.com', 'Blah Blah Blah'),
(4, 'Anwin', 'Male', 'A+', '2002-09-09', '9446898290', 'anwinbaby2002@gmail.com', 'Blah Blah Blah Blah Blah'),
(5, 'Donna', 'Female', 'AB+', '2001-06-22', '0944689829', 'donnababu123@gmail.com', 'House 123\r\nABC street \r\nTrivandrum');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(45) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `phone_no`, `email`, `subject`, `message`, `status`, `date`) VALUES
(3, 'Arjun', '9446898290', 'arjunalaiju.cse20@mbits.ac.in', 'TestMsg1', 'This is test message 1 for feedback', 'read', '2023-05-24'),
(4, 'Jobin', '9446898290', 'jobinsaji2002@gmail.com', 'TestMsg2', 'This is test message 2 for feedback', 'read', '2023-05-24'),
(5, 'Donna', '', 'donnababu123@gmail.com', 'Feedback', 'Excellent Service', 'read', '2024-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

DROP TABLE IF EXISTS `hospitals`;
CREATE TABLE IF NOT EXISTS `hospitals` (
  `hospital_id` int NOT NULL AUTO_INCREMENT,
  `hospital_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `hos_dp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`hospital_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`hospital_id`, `hospital_name`, `address`, `hos_dp`) VALUES
(1, 'Kerala', 'Aluva, Kerala, India', 'h.png'),
(2, 'Tamil Nadu', 'Eerode, Tamil Nadu, India', 'default_hos.png\r\n'),
(3, 'United States', 'California, United States', 'default_hos.png');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(45) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quantity` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `name`, `category`, `price`, `description`, `quantity`) VALUES
(1, 'paracetamol', 'medicine', 10.00, 'Paracetamol (acetaminophen or para-hydroxyacetanilide) is a medication used to treat fever and mild to moderate pain. Common brand names include Tylenol and Panadol. At a standard dose, paracetamol only slightly decreases body temperature', 10),
(2, 'Asthaline', 'medicine', 50.00, 'Salbutamol belongs to a group of medicines called fast-acting bronchodilators or “relievers”. It’s used to treat the symptoms of asthma and chronic obstructive pulmonary diseases (COPD) such as coughing, wheezing, and breathlessness.', 10);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `patient_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `phone_no` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `name`, `gender`, `dob`, `phone_no`, `email`, `address`) VALUES
(31, 'Arjun', 'male', '2001-07-07', '9446898290', 'arjunalaiju.cse20@mbits.ac.in', 'ngsdvchjfk,Meloor,Chalakudy,680311'),
(38, 'Sam ', 'male', '2000-01-02', '1234567890', 'sam@gmail.com', '14B, Winchester Street, New York, 123456'),
(40, 'Jobin', 'male', '2002-06-07', '1234567899', 'jobinsaji7564@gmail.com', 'Muniyarackal, Rajakumari  South , Rajakumari , 685619'),
(44, 'Agin', 'Male', '2002-05-13', '9446898290', 'aginjames2002@gmail.com', 'HouseName, PlaceNAME'),
(45, 'Anwin', 'Male', '2002-09-09', '9446898290', 'anwinbaby2002@gmail.com', 'Housename2, Placename2'),
(46, 'Don', 'Male', '2001-07-07', '9446898290', 'arjun123@email.com', 'Housename2, Placename2'),
(47, 'NoName', 'Male', '2001-07-07', '9446898290', 'civos32101@offsala.com', 'Housename23, Placename23'),
(48, 'BigB', 'Male', '2001-07-07', '9446898290', 'tik0ldaus6@coooooool.com', 'Housename24, Placename234'),
(49, 'John Doe', 'Male', '2001-07-07', '9446898290', 'arjunlaiju0@gmail.com', 'Housename2, Placename234'),
(50, 'Jeena', 'Female', '2001-07-07', '9446898290', 'jeenajacob2002@gmail.com', 'Housename233, Placename234'),
(51, 'Donna', 'female', '2001-06-22', '0623858227', 'donnababu123@gmail.com', 'ABC street , Nemam, Trivandrum, 680000');

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

DROP TABLE IF EXISTS `records`;
CREATE TABLE IF NOT EXISTS `records` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pid` int NOT NULL,
  `did` int NOT NULL,
  `disease_info` varchar(255) NOT NULL,
  `prescription` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `datetime`, `pid`, `did`, `disease_info`, `prescription`) VALUES
(1, '2023-05-27 01:44:02', 31, 1, 'Fever', 'paracetamol'),
(2, '2023-05-29 00:00:00', 38, 9, 'cough', 'Asthaline');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
