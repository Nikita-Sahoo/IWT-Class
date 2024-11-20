-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 07:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(50) NOT NULL,
  `course` varchar(255) NOT NULL,
  `status` enum('Available','Not Available') NOT NULL,
  `add_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`id`, `user_id`, `book_id`, `bookname`, `author`, `image`, `price`, `course`, `status`, `add_date`) VALUES
(5, 1, 6, 'Concepts of Physics (Part 1 & 2)', 'H.C. Verma', 'phy-1.webp', '₹450 - ₹900 (for both parts)', 'Physics', 'Available', '2024-11-20'),
(6, 1, 1, 'Fundamentals of Computers', 'V. Rajaraman', 'mca-1.jpg', '₹350 - ₹500', 'MCA', 'Available', '2024-11-20'),
(8, 1, 2, 'Introduction to Algorithms', 'Thomas H. Cormen, Charles E. Leiserson, Ronald L. Rivest, and Clifford Stein', 'mca-2.jpg', '₹850 - ₹1,200', 'MCA', 'Available', '2024-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `book_table`
--

CREATE TABLE `book_table` (
  `id` int(11) NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` enum('Available','Not Available') NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_table`
--

INSERT INTO `book_table` (`id`, `bookname`, `image`, `author`, `course`, `price`, `status`, `date`) VALUES
(1, 'Fundamentals of Computers', 'mca-1.jpg', 'V. Rajaraman', 'MCA', '₹350 - ₹500', 'Available', '2024-11-12'),
(2, 'Introduction to Algorithms', 'mca-2.jpg', 'Thomas H. Cormen, Charles E. Leiserson, Ronald L. Rivest, and Clifford Stein', 'MCA', '₹850 - ₹1,200', 'Not Available', '2024-11-19'),
(3, ' Database System Concepts', 'mca-3.jpg', 'Abraham Silberschatz, Henry F. Korth, and S. Sudarshan', 'MCA', '₹650 - ₹1,000', 'Available', '2024-11-12'),
(4, 'Object-Oriented Programming with C++', 'mca-4.webp', 'E. Balagurusamy', 'MCA', '₹350 - ₹600', 'Available', '2024-11-13'),
(5, 'Operating System Concepts', 'mca-5.jpg', 'Abraham Silberschatz, Peter B. Galvin, and Greg Gagne', 'MCA', '₹750 - ₹1,200', 'Available', '2024-11-13'),
(6, 'Concepts of Physics (Part 1 & 2)', 'phy-1.webp', 'H.C. Verma', 'Physics', '₹450 - ₹900 (for both parts)', 'Not Available', '2024-11-19'),
(7, 'Fundamentals of Physics', 'phy-2.jpg', 'David Halliday, Robert Resnick, and Jearl Walker', 'Physics', ' ₹1,000 - ₹1,500', 'Available', '2024-11-07'),
(8, 'Introduction to Classical Mechanics', 'phy-3.jpg', 'David Morin', 'Physics', '₹700 - ₹1,200', 'Available', '2024-11-13'),
(9, 'University Physics with Modern Physics', 'phy-4.jpg', 'Hugh D. Young and Roger A. Freedman', 'Physics', '₹1,200 - ₹2,000', 'Not Available', '2024-11-06'),
(10, 'Principles of Quantum Mechanics', 'phy-5.jpg', 'R. Shankar', 'Physics', '₹1,000 - ₹1,800', 'Available', '2024-11-05'),
(11, 'Organic Chemistry', 'chem-1.jpg', 'Morrison and Boyd', 'Chemistry', '₹800 - ₹1,200', 'Available', '2024-11-06'),
(12, 'Concise Inorganic Chemistry', 'chem-2.jpg', 'J.D. Lee', 'Chemistry', '₹700 - ₹1,200', 'Available', '0000-00-00'),
(13, 'Physical Chemistry', 'chem-3.jpg', 'P. W. Atkins', 'Chemistry', '₹900 - ₹1,500', 'Available', '2024-11-08'),
(14, 'Vogel\'s Textbook of Quantitative Chemical Analysis', 'chem-4.jpg', 'Arthur I. Vogel', 'Chemistry', '₹1,000 - ₹2,000', 'Available', '2024-11-07'),
(15, ' Principles of Modern Chemistry', 'chem-5.jpg', 'David W. Oxtoby, H. P. Gillis, and Alan Campion', 'Chemistry', ' ₹1,200 - ₹2,000', 'Not Available', '2024-11-01'),
(16, 'Higher Engineering Mathematics', 'mth-1.jpg', 'B.S. Grewal', 'Math', '₹600 - ₹1,000', 'Available', '2024-11-14'),
(17, 'Mathematical Methods for Physics and Engineering', 'mth-2.jpg', 'K.F. Riley, M.P. Hobson, and S.J. Bence', 'Math', '₹1,200 - ₹2,000', 'Available', '2024-11-13'),
(18, 'Problems in Calculus of One Variable', 'mth-3.jpg', 'I.A. Maron', 'Math', '₹250 - ₹450', 'Not Available', '2024-11-17'),
(19, 'Discrete Mathematics and Its Applications', 'mth-4.jpg', 'Kenneth H. Rosen', 'Math', '₹800 - ₹1,400', 'Available', '2024-11-11'),
(20, 'Advanced Engineering Mathematics', 'mth-5.jpg', 'Erwin Kreyszig', 'Math', '₹1,200 - ₹2,000', 'Available', '2024-11-16');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `regd_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `name`, `regd_no`, `email`, `pass`, `phone`, `date`) VALUES
(1, 'Nikita Sahoo', '23352045', 'nikita123@gmail.com', '$2y$10$3FgCLZFoVKEej5lACFwdVuFnGwUXgEj4Dtp0rGMuZfFCLxYf4FQOW', '8349451523', '2024-11-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_table`
--
ALTER TABLE `book_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `book_table`
--
ALTER TABLE `book_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
