-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2019 at 06:19 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `qd_id` int(11) NOT NULL,
  `solution` varchar(999) NOT NULL,
  `correct` varchar(999) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `student_id`, `q_id`, `qd_id`, `solution`, `correct`, `mark`) VALUES
(1, 1, 2, 2, 'byte patterns', 'characters', 5),
(2, 1, 3, 2, 'Text', 'Video', 5),
(3, 1, 4, 2, 'simplex mode', 'Full duplex mode', 5),
(4, 1, 5, 2, 'Code', 'Code', 5),
(5, 1, 6, 2, 'Transmission medium', 'Transmission medium', 5),
(6, 4, 7, 3, 'Duplex Device', 'Simplex Mode', 4),
(7, 4, 8, 3, 'Protocol', 'Transmission Medium', 5),
(8, 4, 9, 3, 'No node', 'whole system', 5),
(9, 4, 10, 3, 'None of Above', 'Communication', 5),
(10, 4, 11, 3, 'Timelessness', 'Jitter', 5);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `submit_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`submit_id`, `student_id`, `module_id`, `title`) VALUES
(1, 1, 8, '');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `level` varchar(2) NOT NULL,
  `credit` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `title`, `level`, `credit`) VALUES
(18, 'BSc (Hons) Computing', '4', '300'),
(19, 'BBA', '4', '280'),
(20, 'BSc. CSIT', '4', '300'),
(21, 'BBS', '4', '290');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `mark_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `qd_id` int(11) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`mark_id`, `student_id`, `qd_id`, `marks`) VALUES
(1, 1, 2, 10),
(2, 4, 3, 0),
(3, 1, 3, 14);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `module_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `module_name` varchar(150) NOT NULL,
  `module_code` varchar(15) NOT NULL,
  `credit` int(11) NOT NULL,
  `level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `course_id`, `module_name`, `module_code`, `credit`, `level`) VALUES
(8, 18, 'Computer Communication', 'CSY1017', 20, '4'),
(9, 18, 'Computer System', 'CSY1014', 20, '4'),
(10, 18, 'Web Programming', 'CSY1018', 20, '4'),
(11, 18, 'Problem Solving And Programming', 'CSY1020', 20, '4'),
(12, 18, 'Database 1', 'CSY1026', 20, '4'),
(13, 19, 'Foundations of Marketing', 'MKT1001', 20, '4'),
(14, 19, 'Introductory Finance and Accounting', 'ACC1003', 20, '4'),
(15, 19, 'Business Environment', 'BUS1001', 20, '4'),
(16, 19, 'Business in Society', 'BUS1009', 20, '4'),
(17, 19, 'Enterprise and Opportunity', 'MKT1003', 20, '4'),
(18, 19, 'Managing People', 'HRM1004', 20, '4');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(11) NOT NULL,
  `qd_id` int(11) NOT NULL,
  `type` varchar(5) NOT NULL,
  `question` varchar(9999) NOT NULL,
  `mark` varchar(3) NOT NULL,
  `opt1` varchar(500) NOT NULL,
  `opt2` varchar(500) NOT NULL,
  `opt3` varchar(500) NOT NULL,
  `opt4` varchar(500) NOT NULL,
  `correct` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`q_id`, `qd_id`, `type`, `question`, `mark`, `opt1`, `opt2`, `opt3`, `opt4`, `correct`) VALUES
(2, 2, 'r', 'Information can be represented as a sequence of ', '5', 'byte patterns', 'characters', 'byte patterns', 'images', 'characters'),
(3, 2, 'r', 'Parameter that refers to recording and broadcasting of picture is', '5', 'Text', 'Audio', 'Text', 'Video', 'Video'),
(4, 2, 'r', 'Both station can transmit and receive data simultaneously in', '5', 'simplex mode', 'Half duplex mode', 'simplex mode', 'None of Above', 'Full duplex mode'),
(5, 2, 'r', 'In representation of text symbols, each set of bit pattern is called', '5', 'Code', 'Unicode', 'Code', 'Sequence', 'Code'),
(6, 2, 'r', 'Data communications are transfer of data through some', '5', 'Transmission medium', 'Linear medium', 'Transmission medium', 'Protocals', 'Transmission medium'),
(7, 3, 'r', 'Keyboard and traditional monitors are examples of', '4', 'Simplex Mode', 'Duplex Device', 'Simplex Mode', 'Full Duplex Device', 'Simplex Mode'),
(8, 3, 'r', 'Term that is used for physical path by which a message travels from sender to receiver is', '5', 'Jitter', 'Protocol', 'Jitter', 'Information', 'Transmission Medium'),
(9, 3, 'r', 'In star topology if central hub goes down, it effects', '5', 'One node', 'No node', 'One node', 'Don\'t know', 'whole system'),
(10, 3, 'r', 'Protocols are, set of rules to govern', '5', 'Communication', 'Standards', 'Communication', 'None of Above', 'Communication'),
(11, 3, 'r', 'Parameter that refers to uneven delay of data packets in delivery is', '5', 'Jitter', 'Timelessness', 'Jitter', 'Transmission medium', 'Jitter'),
(12, 4, 'r', 'In monopolistic competition', '5', 'Firms face a perfectly elastic demand curve', 'All products are homogeneous', 'Firms face a perfectly elastic demand curve', 'There are barriers to entry to prevent entry', 'Firms make normal profits in the long run'),
(13, 4, 'r', 'In monopolistic competition:', '5', 'Demand is perfectly elastic ', 'Products are homogeneous', 'Demand is perfectly elastic ', ' The marginal revenue is below the demand curve and diverges ', ' The marginal revenue is below the demand curve and diverges '),
(14, 4, 'r', 'In monopolistic competition firms profit maximize where', '5', 'Marginal revenue = Average revenue ', 'Marginal revenue = Marginal cost ', 'Marginal revenue = Average revenue ', 'Marginal revenue = Total cost ', 'Marginal revenue = Marginal cost '),
(15, 4, 'r', 'Which of the following is not one of the four Ps in marketing?', '5', 'Product', 'Price', 'Product', 'Presence', 'Presence'),
(16, 4, 'r', 'Effective branding will tend to mak', '5', 'Demand more price inelastic', 'Supply more price inelastic', 'Demand more price inelastic', 'Supply more income elastic', 'Demand more income elastic '),
(17, 5, 'r', 'What is HTML?', '5', 'Hyper Text Markup Language', 'Hyper Text Media Language', 'Hyper Text Markup Language', 'High Text Markup Language', 'Hyper Text Markup Language');

-- --------------------------------------------------------

--
-- Table structure for table `question_detail`
--

CREATE TABLE `question_detail` (
  `qd_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `module` int(11) NOT NULL,
  `year` varchar(5) NOT NULL,
  `level` varchar(15) NOT NULL,
  `term` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `question_name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_detail`
--

INSERT INTO `question_detail` (`qd_id`, `tutor_id`, `course`, `module`, `year`, `level`, `term`, `date`, `question_name`) VALUES
(2, 1, 18, 8, '2016', '4', 'term1', '2019-05-03', 'CSY1011-term1'),
(3, 1, 18, 8, '2016', '4', 'term2', '2019-05-03', 'CSY1011-term2'),
(4, 1, 19, 13, '2016', '4', 'term1', '2019-05-03', 'FOM-Term1'),
(5, 3, 18, 10, '2016', '4', 'term1', '2019-05-05', 'CSY2022-term1'),
(6, 3, 18, 8, '2017', '4', 'term1', '2019-05-05', 'xyz');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `course` int(11) NOT NULL,
  `level` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `firstname`, `lastname`, `gender`, `dob`, `contact`, `email`, `course`, `level`, `username`, `password`) VALUES
(1, 'Sandesh', 'Thapa', 'M', '1998-06-27', '9817182121', 'sandesh@gmail.com', 18, '4', 'sandesh', '$2y$10$Ni92rvlpodHSbSL00tNQ4ufRhNjpyvYgGpo0OwCCsBHauhdI3BCNC'),
(2, 'Nabin', 'Shrestha', 'M', '1997-06-02', '9818272391', 'nabin@gmail.com', 18, '4', 'nabin', '$2y$10$f/zXIy98iJG.CIZbwUwMNuwvRhESWRcoEYImd.f2.xU06x261lcZW'),
(3, 'Sandip', 'Yadav', 'M', '1996-07-02', '985615111', 'sandip@gmail.com', 19, '4', 'sandip', '$2y$10$NX88Or4H8pfYe9GjEW58.uoVD/OL7okmb8cJezgcAQZfls0Xg.fSu'),
(4, 'Ganesh', 'khadka', 'M', '1998-06-03', '9816127811', 'ganehkhadka@gmail.com', 18, '4', 'khadka', '$2y$10$ReNlvzoD1mf7B6SSJaZZGeSyZfN10TZBCMOv6s65Jc3xmEWyXQnwq');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `tutor_id` int(11) NOT NULL,
  `firstname` varchar(150) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `contact` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `role` varchar(6) NOT NULL,
  `subject` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`tutor_id`, `firstname`, `lastname`, `gender`, `dob`, `contact`, `email`, `role`, `subject`, `username`, `password`) VALUES
(1, 'Pawan', 'Bhandari', 'M', '1983-06-04', '9817181728', 'pawan@gmail.com', 'P', 8, 'pawan', '$2y$10$vIzAdPaG5/5mHOJ36glJxuLPgBaAmMt5j2QB4XRQdZTgHH71adnsu'),
(2, 'Pushpa', 'Ghimire', 'M', '1979-03-03', '9287282112', 'pushpa@gmail.com', 'N', 9, 'pushpa', '$2y$10$3jwFyD2WUqSCVfW37oSJh.gPKQtsHtlkALzfRdIqJgKYQOBmY6Hbu'),
(3, 'Ganesh', 'Poudel', 'M', '1995-04-02', '9812819912', 'ganesh@gmail.com', 'N', 13, 'ganesh', '$2y$10$kGRI2k5Qa0sJdPyvQumnFOt3KjvQ1u2v5xZw0NsYdvlHkuKhMiz.6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `q_id` (`q_id`),
  ADD KEY `qd_id` (`qd_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`submit_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`mark_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `qd_id` (`qd_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `course_id_2` (`course_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `qd_id` (`qd_id`);

--
-- Indexes for table `question_detail`
--
ALTER TABLE `question_detail`
  ADD PRIMARY KEY (`qd_id`),
  ADD KEY `tutor_id` (`tutor_id`),
  ADD KEY `course` (`course`),
  ADD KEY `module` (`module`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `course` (`course`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`tutor_id`),
  ADD KEY `subject` (`subject`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `submit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `question_detail`
--
ALTER TABLE `question_detail`
  MODIFY `qd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`qd_id`) REFERENCES `question_detail` (`qd_id`),
  ADD CONSTRAINT `answers_ibfk_3` FOREIGN KEY (`q_id`) REFERENCES `question` (`q_id`);

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `assignment_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `modules` (`module_id`);

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`qd_id`) REFERENCES `question_detail` (`qd_id`);

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`qd_id`) REFERENCES `question_detail` (`qd_id`);

--
-- Constraints for table `question_detail`
--
ALTER TABLE `question_detail`
  ADD CONSTRAINT `question_detail_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`tutor_id`),
  ADD CONSTRAINT `question_detail_ibfk_2` FOREIGN KEY (`module`) REFERENCES `modules` (`module_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`course`) REFERENCES `courses` (`course_id`);

--
-- Constraints for table `tutors`
--
ALTER TABLE `tutors`
  ADD CONSTRAINT `tutors_ibfk_1` FOREIGN KEY (`subject`) REFERENCES `modules` (`module_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
