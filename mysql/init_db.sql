/*Create database*/
CREATE DATABASE IF NOT EXISTS `datawarehouse_db`;

/*Add passowrd to root user*/
ALTER USER 'root'@'%' IDENTIFIED BY 'root';

/*Allow remote access for root user*/
UPDATE mysql.user SET host='%' WHERE user='root';

/*Grant all privileges to root user*/
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;

/*Add read user and grant only select privilege*/
CREATE USER IF NOT EXISTS 'read_user'@'localhost' IDENTIFIED BY 'read_user';
GRANT SELECT ON `datawarehouse_db`.* TO 'read_user'@'localhost';

/*Refresh user privileges*/
FLUSH PRIVILEGES;

/*Use datawarehouse database*/
USE `datawarehouse_db`;

/*Create etl patient table*/
CREATE TABLE IF NOT EXISTS `etl_art_master_list` (
  `Facility` varchar(34) CHARACTER SET utf8 DEFAULT NULL,
  `patient_id` int(11) NOT NULL,
  `unique_patient_no` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `patient_clinic_number` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `age` decimal(23,1) DEFAULT NULL,
  `Gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `ward` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sub_location` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `village` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `education_level` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `marital_status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `hiv_test_date` date DEFAULT NULL,
  `date_first_enrolled_in_care` date DEFAULT NULL,
  `Enrollment_Date` date DEFAULT NULL,
  `Enrolled_in_pmtct` varchar(3) CHARACTER SET utf8mb4 DEFAULT NULL,
  `pmtct_date_enrolled` date,
  `pmtct_date_completed` date DEFAULT NULL,
  `Enrolled_in_otz` varchar(3) CHARACTER SET utf8mb4 DEFAULT NULL,
  `otz_date_enrolled` date,
  `otz_date_completed` date DEFAULT NULL,
  `Enrolled_in_ovc` varchar(3) CHARACTER SET utf8mb4 DEFAULT NULL,
  `ovc_date_enrolled` date,
  `ovc_date_completed` date DEFAULT NULL,
  `Start_regimen` varchar(21) CHARACTER SET utf8mb4 DEFAULT NULL,
  `Start_regimen_date` datetime DEFAULT NULL,
  `current_regimen` varchar(21) CHARACTER SET utf8mb4 DEFAULT NULL,
  `current_regimen_date` datetime DEFAULT NULL,
  `baseline_cd4` double DEFAULT NULL,
  `baseline_cd4_date` datetime DEFAULT NULL,
  `Pending_VL_order_date` date DEFAULT NULL,
  `VL_latest` double DEFAULT NULL,
  `VL_latest_date` date DEFAULT NULL,
  `VL2` double DEFAULT NULL,
  `VL2_date` date DEFAULT NULL,
  `VL3` double DEFAULT NULL,
  `VL3_date` date DEFAULT NULL,
  `VL4` double DEFAULT NULL,
  `VL4_date` date DEFAULT NULL,
  `arv_adherence` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `tb_screening_result` varchar(21) CHARACTER SET utf8 DEFAULT NULL,
  `tb_screening_date` date DEFAULT NULL,
  `on_anti_tb_drugs` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `tb_date_enrolled` date,
  `tb_date_completed` date DEFAULT NULL,
  `ever_on_ipt` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `on_ipt` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `ipt_date_enrolled` date,
  `ipt_date_completed` date DEFAULT NULL,
  `Last_Visit_date` date DEFAULT NULL,
  `Appointment_date` date DEFAULT NULL,
  `duration_in_days` bigint(21) DEFAULT NULL,
  `ART_Status` varchar(8) CHARACTER SET utf8mb4 DEFAULT NULL,
  `days_missed` bigint(21) DEFAULT NULL,
  `stable` varchar(14) CHARACTER SET utf8 DEFAULT NULL,
  `dc_model` varchar(37) CHARACTER SET utf8 DEFAULT NULL,
  `cacx_screening` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  `family_planning_status` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `family_planning_method` varchar(29) CHARACTER SET utf8 DEFAULT NULL,
  `reason_not_using_family_planning` varchar(25) CHARACTER SET utf8 DEFAULT NULL,
  `Discontinuation_date` datetime DEFAULT NULL,
  `discontinuation_reason` varchar(23) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;