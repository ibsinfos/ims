-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 31, 2017 at 10:18 PM
-- Server version: 5.6.28-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_allocation`
--

CREATE TABLE IF NOT EXISTS `tbl_allocation` (
  `allocation_id` int(10) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `class_id` int(10) NOT NULL,
  `resource_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignments`
--

CREATE TABLE IF NOT EXISTS `tbl_assignments` (
  `assignment_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `uploaded_date` date NOT NULL,
  `due_date` date NOT NULL,
  `content` varchar(1000) NOT NULL,
  `course_id` int(11) NOT NULL,
  `file` varchar(300) NOT NULL,
  `uploaded by` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignment_marks`
--

CREATE TABLE IF NOT EXISTS `tbl_assignment_marks` (
  `Assignment_mark_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `Marks` varchar(25) NOT NULL,
  `checked_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classroom`
--

CREATE TABLE IF NOT EXISTS `tbl_classroom` (
  `classroom_id` int(10) NOT NULL,
  `class_name` varchar(10) NOT NULL,
  `classroom_type` varchar(25) NOT NULL,
  `size` varchar(10) NOT NULL,
  `floor` varchar(10) NOT NULL,
  `location` varchar(20) NOT NULL,
  `availability` int(2) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE IF NOT EXISTS `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_category` int(11) NOT NULL,
  `course_name` varchar(40) NOT NULL,
  `teacher` varchar(80) NOT NULL,
  `fee` varchar(10) NOT NULL,
  `description` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_category`
--

CREATE TABLE IF NOT EXISTS `tbl_course_category` (
  `course_category_id` int(11) NOT NULL,
  `course_category_name` varchar(40) NOT NULL,
  `description` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_drops`
--

CREATE TABLE IF NOT EXISTS `tbl_course_drops` (
  `course_drop_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `drop_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_evaluation`
--

CREATE TABLE IF NOT EXISTS `tbl_course_evaluation` (
  `course_evaluation_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `question_one` int(11) NOT NULL,
  `question_two` int(11) NOT NULL,
  `question_three` int(11) NOT NULL,
  `question_four` int(11) NOT NULL,
  `question_five` int(11) NOT NULL,
  `question_six` varchar(300) NOT NULL,
  `feedback_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_payments`
--

CREATE TABLE IF NOT EXISTS `tbl_course_payments` (
  `course_payment_id` int(11) NOT NULL,
  `recip_id` varchar(15) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(10) NOT NULL,
  `remark` varchar(40) NOT NULL,
  `late_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_payment_scheme`
--

CREATE TABLE IF NOT EXISTS `tbl_course_payment_scheme` (
  `payment_scheme_id` int(11) NOT NULL,
  `payment` varchar(25) NOT NULL,
  `amount` varchar(40) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employees`
--

CREATE TABLE IF NOT EXISTS `tbl_employees` (
  `employee_id` int(11) NOT NULL,
  `title` varchar(5) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(8) NOT NULL,
  `prof_image` varchar(300) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(80) NOT NULL,
  `nic` varchar(11) NOT NULL,
  `login_acc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faq`
--

CREATE TABLE IF NOT EXISTS `tbl_faq` (
  `id_faq` int(11) NOT NULL,
  `problem` varchar(80) NOT NULL,
  `answer` varchar(200) DEFAULT NULL,
  `done` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_late_payments`
--

CREATE TABLE IF NOT EXISTS `tbl_late_payments` (
  `late_payment_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `amount` varchar(10) NOT NULL,
  `remark` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lecturer_increments`
--

CREATE TABLE IF NOT EXISTS `tbl_lecturer_increments` (
  `increment_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `new_amount` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lecture_evaluation`
--

CREATE TABLE IF NOT EXISTS `tbl_lecture_evaluation` (
  `lecture_evaluation_Id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `question_one` int(11) NOT NULL,
  `question_two` int(11) NOT NULL,
  `question_three` int(11) NOT NULL,
  `question_four` int(11) NOT NULL,
  `question_five` int(11) NOT NULL,
  `question_six` varchar(20) NOT NULL,
  `feedback_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lecture_hours`
--

CREATE TABLE IF NOT EXISTS `tbl_lecture_hours` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `act_start` time NOT NULL,
  `act_end` time NOT NULL,
  `total_hours` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lessons`
--

CREATE TABLE IF NOT EXISTS `tbl_lessons` (
  `tbl_lesson_id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `date` date NOT NULL,
  `content` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE IF NOT EXISTS `tbl_notifications` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `notification_type` varchar(45) NOT NULL,
  `sent_to` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parents`
--

CREATE TABLE IF NOT EXISTS `tbl_parents` (
  `parent_id` int(11) NOT NULL,
  `parent_name` varchar(30) NOT NULL,
  `relation` varchar(15) NOT NULL,
  `occupation` varchar(20) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `parent_contact` varchar(15) NOT NULL,
  `parent_email` varchar(20) NOT NULL,
  `student_id` int(10) NOT NULL,
  `login_acc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parent_student_relation`
--

CREATE TABLE IF NOT EXISTS `tbl_parent_student_relation` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE IF NOT EXISTS `tbl_payments` (
  `payment_id` int(11) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `payment_date` date NOT NULL,
  `amount` varchar(20) NOT NULL,
  `student_id` int(11) NOT NULL,
  `remark` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment_dates`
--

CREATE TABLE IF NOT EXISTS `tbl_payment_dates` (
  `id` int(11) NOT NULL,
  `payment_date` varchar(11) NOT NULL,
  `set_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resources`
--

CREATE TABLE IF NOT EXISTS `tbl_resources` (
  `resource_id` int(10) NOT NULL,
  `category` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `price` varchar(25) NOT NULL,
  `purchase_date` date NOT NULL,
  `availability` int(2) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_resource_category`
--

CREATE TABLE IF NOT EXISTS `tbl_resource_category` (
  `resource_category_id` int(10) NOT NULL,
  `resource_category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE IF NOT EXISTS `tbl_schedule` (
  `schedule_id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE IF NOT EXISTS `tbl_students` (
  `student_id` int(10) NOT NULL,
  `stu_admission_no` varchar(20) NOT NULL,
  `stu_admission_date` date NOT NULL,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `name_initials` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `gender` text NOT NULL,
  `prof_image` varchar(300) NOT NULL,
  `school` varchar(50) NOT NULL,
  `course` varchar(30) NOT NULL,
  `address` varchar(80) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `home_phone` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `login_account_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_attendance`
--

CREATE TABLE IF NOT EXISTS `tbl_student_attendance` (
  `student_attendance_id` int(11) NOT NULL,
  `attendance` varchar(75) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stu_payment_schemes`
--

CREATE TABLE IF NOT EXISTS `tbl_stu_payment_schemes` (
  `payment_scheme_id` int(11) NOT NULL,
  `stu_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `payment_method` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teachers`
--

CREATE TABLE IF NOT EXISTS `tbl_teachers` (
  `teacher_id` int(11) NOT NULL,
  `title` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(8) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `nic` varchar(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `subjects` varchar(100) NOT NULL,
  `achievements` varchar(150) NOT NULL,
  `prof_image` varchar(200) NOT NULL,
  `pay_rate` varchar(15) NOT NULL,
  `login_account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_payrates`
--

CREATE TABLE IF NOT EXISTS `tbl_teacher_payrates` (
  `pay_rate_id` int(11) NOT NULL,
  `teacher_level` varchar(30) NOT NULL,
  `rate` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transcripts`
--

CREATE TABLE IF NOT EXISTS `tbl_transcripts` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course` int(11) NOT NULL,
  `requested_on` datetime NOT NULL,
  `status` varchar(11) NOT NULL,
  `issued_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_login_account`
--

CREATE TABLE IF NOT EXISTS `tbl_user_login_account` (
  `login_acc_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_role` int(10) NOT NULL,
  `email` varchar(25) NOT NULL DEFAULT ' ',
  `log_in_time` datetime NOT NULL,
  `log_out_time` datetime NOT NULL,
  `log_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `user_role_id` int(11) NOT NULL,
  `user_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_allocation`
--
ALTER TABLE `tbl_allocation`
  ADD PRIMARY KEY (`allocation_id`);

--
-- Indexes for table `tbl_assignments`
--
ALTER TABLE `tbl_assignments`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `tbl_assignment_marks`
--
ALTER TABLE `tbl_assignment_marks`
  ADD PRIMARY KEY (`Assignment_mark_id`);

--
-- Indexes for table `tbl_classroom`
--
ALTER TABLE `tbl_classroom`
  ADD PRIMARY KEY (`classroom_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_course_category`
--
ALTER TABLE `tbl_course_category`
  ADD PRIMARY KEY (`course_category_id`);

--
-- Indexes for table `tbl_course_drops`
--
ALTER TABLE `tbl_course_drops`
  ADD PRIMARY KEY (`course_drop_id`);

--
-- Indexes for table `tbl_course_evaluation`
--
ALTER TABLE `tbl_course_evaluation`
  ADD PRIMARY KEY (`course_evaluation_id`);

--
-- Indexes for table `tbl_course_payments`
--
ALTER TABLE `tbl_course_payments`
  ADD PRIMARY KEY (`course_payment_id`);

--
-- Indexes for table `tbl_course_payment_scheme`
--
ALTER TABLE `tbl_course_payment_scheme`
  ADD PRIMARY KEY (`payment_scheme_id`);

--
-- Indexes for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indexes for table `tbl_late_payments`
--
ALTER TABLE `tbl_late_payments`
  ADD PRIMARY KEY (`late_payment_id`);

--
-- Indexes for table `tbl_lecturer_increments`
--
ALTER TABLE `tbl_lecturer_increments`
  ADD PRIMARY KEY (`increment_id`);

--
-- Indexes for table `tbl_lecture_evaluation`
--
ALTER TABLE `tbl_lecture_evaluation`
  ADD PRIMARY KEY (`lecture_evaluation_Id`);

--
-- Indexes for table `tbl_lecture_hours`
--
ALTER TABLE `tbl_lecture_hours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_lessons`
--
ALTER TABLE `tbl_lessons`
  ADD PRIMARY KEY (`tbl_lesson_id`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_parents`
--
ALTER TABLE `tbl_parents`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `tbl_parent_student_relation`
--
ALTER TABLE `tbl_parent_student_relation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_payment_dates`
--
ALTER TABLE `tbl_payment_dates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_resources`
--
ALTER TABLE `tbl_resources`
  ADD PRIMARY KEY (`resource_id`);

--
-- Indexes for table `tbl_resource_category`
--
ALTER TABLE `tbl_resource_category`
  ADD PRIMARY KEY (`resource_category_id`);

--
-- Indexes for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_student_attendance`
--
ALTER TABLE `tbl_student_attendance`
  ADD PRIMARY KEY (`student_attendance_id`);

--
-- Indexes for table `tbl_stu_payment_schemes`
--
ALTER TABLE `tbl_stu_payment_schemes`
  ADD PRIMARY KEY (`payment_scheme_id`);

--
-- Indexes for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `tbl_teacher_payrates`
--
ALTER TABLE `tbl_teacher_payrates`
  ADD PRIMARY KEY (`pay_rate_id`);

--
-- Indexes for table `tbl_transcripts`
--
ALTER TABLE `tbl_transcripts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_login_account`
--
ALTER TABLE `tbl_user_login_account`
  ADD PRIMARY KEY (`login_acc_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_name_2` (`user_name`),
  ADD UNIQUE KEY `user_name_3` (`user_name`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_allocation`
--
ALTER TABLE `tbl_allocation`
  MODIFY `allocation_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_assignments`
--
ALTER TABLE `tbl_assignments`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_assignment_marks`
--
ALTER TABLE `tbl_assignment_marks`
  MODIFY `Assignment_mark_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_classroom`
--
ALTER TABLE `tbl_classroom`
  MODIFY `classroom_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_course_category`
--
ALTER TABLE `tbl_course_category`
  MODIFY `course_category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_course_drops`
--
ALTER TABLE `tbl_course_drops`
  MODIFY `course_drop_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_course_evaluation`
--
ALTER TABLE `tbl_course_evaluation`
  MODIFY `course_evaluation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_course_payments`
--
ALTER TABLE `tbl_course_payments`
  MODIFY `course_payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_course_payment_scheme`
--
ALTER TABLE `tbl_course_payment_scheme`
  MODIFY `payment_scheme_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_employees`
--
ALTER TABLE `tbl_employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_faq`
--
ALTER TABLE `tbl_faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_late_payments`
--
ALTER TABLE `tbl_late_payments`
  MODIFY `late_payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_lecturer_increments`
--
ALTER TABLE `tbl_lecturer_increments`
  MODIFY `increment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_lecture_evaluation`
--
ALTER TABLE `tbl_lecture_evaluation`
  MODIFY `lecture_evaluation_Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_lecture_hours`
--
ALTER TABLE `tbl_lecture_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_lessons`
--
ALTER TABLE `tbl_lessons`
  MODIFY `tbl_lesson_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_parents`
--
ALTER TABLE `tbl_parents`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_parent_student_relation`
--
ALTER TABLE `tbl_parent_student_relation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_payment_dates`
--
ALTER TABLE `tbl_payment_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_resources`
--
ALTER TABLE `tbl_resources`
  MODIFY `resource_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_resource_category`
--
ALTER TABLE `tbl_resource_category`
  MODIFY `resource_category_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_schedule`
--
ALTER TABLE `tbl_schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `student_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_student_attendance`
--
ALTER TABLE `tbl_student_attendance`
  MODIFY `student_attendance_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_stu_payment_schemes`
--
ALTER TABLE `tbl_stu_payment_schemes`
  MODIFY `payment_scheme_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_teacher_payrates`
--
ALTER TABLE `tbl_teacher_payrates`
  MODIFY `pay_rate_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_transcripts`
--
ALTER TABLE `tbl_transcripts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user_login_account`
--
ALTER TABLE `tbl_user_login_account`
  MODIFY `login_acc_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
