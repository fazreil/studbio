-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2011 at 05:32 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bio_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bio_main`
--

CREATE TABLE IF NOT EXISTS `bio_main` (
  `course_name` varchar(30) NOT NULL,
  `course_start` varchar(30) NOT NULL,
  `course_end` varchar(30) NOT NULL,
  `ic_no` bigint(30) NOT NULL,
  `rank` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `unit_from` varchar(30) NOT NULL,
  `squadron` varchar(30) NOT NULL,
  `service_start` date NOT NULL,
  `service_type` varchar(30) NOT NULL,
  `service_end` date NOT NULL,
  `birth_date` date NOT NULL,
  `marital_status` varchar(30) NOT NULL,
  `first_parent_name` varchar(30) NOT NULL,
  `first_relate_type` varchar(30) NOT NULL,
  `first_address` varchar(50) NOT NULL,
  `first_phone` bigint(30) NOT NULL,
  `first_near_cop` varchar(30) NOT NULL,
  `sec_parent_name` varchar(30) NOT NULL,
  `sec_relate` varchar(30) NOT NULL,
  `sec_address` varchar(50) NOT NULL,
  `sec_phone` bigint(30) NOT NULL,
  `sec_near_cop` varchar(30) NOT NULL,
  `first_sex` varchar(30) NOT NULL,
  `sec_sex` varchar(30) NOT NULL,
  `third_sex` varchar(30) NOT NULL,
  `fourth_sex` varchar(30) NOT NULL,
  `fifth_sex` varchar(30) NOT NULL,
  `sixth_sex` varchar(30) NOT NULL,
  `first_age` varchar(30) NOT NULL,
  `sec_age` varchar(30) NOT NULL,
  `third_age` varchar(30) NOT NULL,
  `forth_age` varchar(30) NOT NULL,
  `fifth_age` varchar(30) NOT NULL,
  `sixth_age` varchar(30) NOT NULL,
  `school` varchar(30) NOT NULL,
  `old_srp_year` int(10) NOT NULL,
  `old_spm_year` int(10) NOT NULL,
  `old_stpm_year` int(10) NOT NULL,
  `first_srp_grade` varchar(10) NOT NULL,
  `sec_srp_grade` varchar(10) NOT NULL,
  `third_srp_grade` varchar(10) NOT NULL,
  `fourth_srp_grade` varchar(10) NOT NULL,
  `first_spm_grade` varchar(10) NOT NULL,
  `sec_spm_grade` varchar(10) NOT NULL,
  `third_spm_grade` varchar(10) NOT NULL,
  `forth_spm_grade` varchar(10) NOT NULL,
  `first_stpm_grade` varchar(10) NOT NULL,
  `sec_stpm_grade` varchar(10) NOT NULL,
  `third_stpm_grade` varchar(10) NOT NULL,
  `forth_stpm_grade` varchar(10) NOT NULL,
  `new_srp_year` int(10) NOT NULL,
  `new_spm_year` int(10) NOT NULL,
  `new_stpm_year` int(10) NOT NULL,
  `bm_srp` varchar(10) NOT NULL,
  `bm_spm` varchar(10) NOT NULL,
  `bm_stpm` varchar(10) NOT NULL,
  `bi_srp` varchar(10) NOT NULL,
  `bi_spm` varchar(10) NOT NULL,
  `bi_stpm` varchar(10) NOT NULL,
  `math_srp` varchar(10) NOT NULL,
  `math_spm` varchar(10) NOT NULL,
  `math_stpm` varchar(10) NOT NULL,
  `sci_srp` varchar(10) NOT NULL,
  `sci_spm` varchar(10) NOT NULL,
  `sci_stpm` varchar(10) NOT NULL,
  `hist_srp` varchar(10) NOT NULL,
  `hist_spm` varchar(10) NOT NULL,
  `hist_stpm` varchar(10) NOT NULL,
  `geo_srp` varchar(10) NOT NULL,
  `geo_spm` varchar(10) NOT NULL,
  `geo_stpm` varchar(10) NOT NULL,
  `pi_srp` varchar(10) NOT NULL,
  `pi_spm` varchar(10) NOT NULL,
  `pi_stpm` varchar(10) NOT NULL,
  `draw_srp` varchar(10) NOT NULL,
  `draw_spm` varchar(10) NOT NULL,
  `draw_stpm` varchar(10) NOT NULL,
  `lite_srp` varchar(10) NOT NULL,
  `lite_spm` varchar(10) NOT NULL,
  `lite_stpm` varchar(10) NOT NULL,
  `eco_srp` varchar(10) NOT NULL,
  `eco_spm` varchar(10) NOT NULL,
  `eco_stpm` varchar(10) NOT NULL,
  `wri_bm` varchar(30) NOT NULL,
  `spe_bm` varchar(30) NOT NULL,
  `wri_eng` varchar(30) NOT NULL,
  `spe_eng` varchar(30) NOT NULL,
  `first_ins_no` varchar(30) NOT NULL,
  `first_ins_name` varchar(30) NOT NULL,
  `first_unit_amount` int(10) NOT NULL,
  `sec_ins_no` varchar(30) NOT NULL,
  `sec_ins_name` varchar(30) NOT NULL,
  `sec_unit_amout` int(10) NOT NULL,
  `third_ins_no` varchar(30) NOT NULL,
  `third_ins_name` varchar(30) NOT NULL,
  `third_ins_amount` int(10) NOT NULL,
  `first_job_post` varchar(30) NOT NULL,
  `first_job_dept` varchar(30) NOT NULL,
  `sec_job_post` varchar(30) NOT NULL,
  `sec_job_dept` varchar(30) NOT NULL,
  `first_course_name` varchar(30) NOT NULL,
  `first_course_place` varchar(30) NOT NULL,
  `first_course_end` date NOT NULL,
  `sec_course_name` varchar(30) NOT NULL,
  `sec_course_place` varchar(30) NOT NULL,
  `sec_course_end` date NOT NULL,
  `third_course_name` varchar(30) NOT NULL,
  `third_course_place` varchar(30) NOT NULL,
  `third_course_end` date NOT NULL,
  `fourth_course_name` varchar(30) NOT NULL,
  `fourth_course_place` varchar(30) NOT NULL,
  `fourth_course_end` date NOT NULL,
  `fifth_course_name` varchar(30) NOT NULL,
  `fifth_course_place` varchar(30) NOT NULL,
  `fifth_course_end` date NOT NULL,
  `first_unit_from` date NOT NULL,
  `first_unit_till` date NOT NULL,
  `first_unit_rank` varchar(30) NOT NULL,
  `first_unit_post` varchar(30) NOT NULL,
  `first_unit_unit` varchar(30) NOT NULL,
  `sec_unit_from` date NOT NULL,
  `sec_unit_till` date NOT NULL,
  `sec_unit_rank` varchar(30) NOT NULL,
  `sec_unit_post` varchar(30) NOT NULL,
  `sec_unit_unit` varchar(30) NOT NULL,
  `third_unit_from` date NOT NULL,
  `third_unit_till` date NOT NULL,
  `third_unit_rank` varchar(30) NOT NULL,
  `third_unit_post` varchar(30) NOT NULL,
  `third_unit_unit` varchar(30) NOT NULL,
  `fourth_unit_from` date NOT NULL,
  `fourth_unit_till` date NOT NULL,
  `fourth_unit_rank` varchar(30) NOT NULL,
  `fourth_unit_post` varchar(30) NOT NULL,
  `fourth_unit_unit` varchar(30) NOT NULL,
  `fifth_unit_from` date NOT NULL,
  `fifth_unit_till` date NOT NULL,
  `fifth_unit_rank` varchar(30) NOT NULL,
  `fifth_unit_post` varchar(30) NOT NULL,
  `fifth_unit_unit` varchar(30) NOT NULL,
  `first_place_choose` varchar(30) NOT NULL,
  `sec_place_choose` varchar(30) NOT NULL,
  `sport` varchar(30) NOT NULL,
  `hobby` varchar(30) NOT NULL,
  `confirm_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bio_main`
--
