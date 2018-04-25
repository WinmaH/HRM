<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Initial extends CI_Migration {

    public function up(){

        $this->db->query("CREATE TABLE IF NOT EXISTS `person` (
         `FirstName` varchar(20) NOT NULL,
         `MiddleName` varchar(20) NOT NULL,
         `LastName` varchar(20) NOT NULL,
         `Gender` varchar(10) NOT NULL,
         `Birthday` date NOT NULL,
         `NIC` varchar(10) NOT NULL,
         `PostBox` varchar(20) NOT NULL,
         `Street` varchar(20) NOT NULL,
         `City` varchar(20) NOT NULL,
         `TP` int(11) NOT NULL,
         `E_mail` varchar(50) NOT NULL,
         `Nationality` varchar(10) DEFAULT NULL,
         `Religion` varchar(20) DEFAULT NULL,
         `BloodGroup` varchar(3) DEFAULT NULL,
         `User_ID` varchar(10) NOT NULL,
         `Type` varchar(20) DEFAULT NULL,
         `Image` varchar(100) NOT NULL,
         PRIMARY KEY (`User_ID`),
         UNIQUE KEY `TP` (`TP`,`E_mail`)
        )ENGINE=InnoDB DEFAULT CHARSET=latin1;");

        $this->db->query("CREATE TABLE IF NOT EXISTS `designation` (
        `Title` varchar(20) NOT NULL,
        PRIMARY KEY (`Title`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

        $this->db->query("CREATE TABLE IF NOT EXISTS `basic` (
         `Basic_salary` int(11) NOT NULL,
         PRIMARY KEY (`Basic_salary`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1
        ;");

        $this->db->query("CREATE TABLE IF NOT EXISTS `employee` (
         `User_ID` varchar(10) NOT NULL,
         `Designation` varchar(20) DEFAULT NULL,
         `CV` varchar(100) NOT NULL,
         `Salary` int(11) DEFAULT NULL,
         `Register_year` smallint(6) NOT NULL,
         `Register_month` smallint(6) NOT NULL,
         `Register_date` smallint(6) NOT NULL,
         PRIMARY KEY (`User_ID`),
         CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `person` (`User_ID`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

        $this->db->query("CREATE TABLE IF NOT EXISTS `epf` (
         `Rate` float NOT NULL,
         PRIMARY KEY (`Rate`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1
        ;");

        $this->db->query("CREATE TABLE IF NOT EXISTS `etf` (
         `Rate` float NOT NULL,
         PRIMARY KEY (`Rate`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1
        ;");

        $this->db->query("CREATE TABLE IF NOT EXISTS `salary` (
         `Salary_id` int(11) NOT NULL AUTO_INCREMENT,
         `User_ID` varchar(10) NOT NULL,
         `Year` int(11) NOT NULL,
         `Month` varchar(15) NOT NULL,
         `Amount_advances` int(11) DEFAULT NULL,
         `Other_cutoffs` int(11) DEFAULT NULL,
         `Normal_Salary` int(11) NOT NULL,
         `Amount_ETF` float NOT NULL,
         `Amount_EPF` float NOT NULL,
         `Paid` tinyint(1) DEFAULT '0',
         PRIMARY KEY (`Salary_id`),
         UNIQUE KEY `User_ID` (`User_ID`,`Year`,`Month`),
         CONSTRAINT `salary_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `employee` (`User_ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;");

        $this->db->query("CREATE TABLE IF NOT EXISTS `attendance` (
         `User_ID` varchar(10) NOT NULL,
         `Present_Year` smallint(6) NOT NULL,
         `Present_Month` smallint(6) NOT NULL,
         `Present_Date` smallint(6) NOT NULL,
         `present_Hour` smallint(6) NOT NULL,
         `Present_Minute` smallint(6) NOT NULL,
         `Present_Second` smallint(6) NOT NULL,
         `Status` tinyint(1) DEFAULT '1',
         PRIMARY KEY (`User_ID`,`Present_Year`,`Present_Month`,`Present_Date`),
         CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `employee` (`User_ID`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

        $this->db->query("CREATE TABLE  IF NOT EXISTS `leaves` (
         `Leave_ID` varchar(50) NOT NULL,
         `User_ID` varchar(10) NOT NULL,
         `Start_Year` int(11) NOT NULL,
         `Start_Month` int(11) NOT NULL,
         `Start_Date` int(11) NOT NULL,
         `End_Year` int(11) NOT NULL,
         `End_Month` int(11) NOT NULL,
         `End_Date` int(11) NOT NULL,
         `Type` varchar(10) NOT NULL,
         `Reason` varchar(10) NOT NULL,
         `Approved` tinyint(1) DEFAULT '0',
         `Description` varchar(100) DEFAULT NULL,
         PRIMARY KEY (`Leave_ID`),
         KEY `User_ID` (`User_ID`),
         CONSTRAINT `leaves_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `employee` (`User_ID`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

        $this->db->query("CREATE TABLE IF NOT EXISTS`leavedetails`  (
         `ID` int(11) NOT NULL AUTO_INCREMENT,
         `Max_full` int(11) NOT NULL,
         `Max_half` int(11) NOT NULL,
         `Max_Nopay_half` int(11) NOT NULL,
         `Max_Nopay_full` int(11) NOT NULL,
         PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;");



        $this->db->query("CREATE TABLE IF NOT EXISTS `adminnotifications` (
         `ID` int(11) NOT NULL AUTO_INCREMENT,
         `Message` varchar(100) NOT NULL,
         `Checked` tinyint(1) DEFAULT '0',
         PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

        $this->db->query("
        CREATE TABLE IF NOT EXISTS `adminleavenotifications` (
         `ID` int(11) NOT NULL AUTO_INCREMENT,
         `Leave_ID` varchar(50) NOT NULL,
         `Checked` tinyint(1) DEFAULT '0',
         PRIMARY KEY (`ID`),
         KEY `Leave_ID` (`Leave_ID`),
         CONSTRAINT `adminleavenotifications_ibfk_1` FOREIGN KEY (`Leave_ID`) REFERENCES `leaves` (`Leave_ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;");

        $this->db->query("CREATE TABLE IF NOT EXISTS `employeeleavenotifications` (
         `ID` int(11) NOT NULL AUTO_INCREMENT,
         `Leave_ID` varchar(50) DEFAULT NULL,
         `Checked` tinyint(1) DEFAULT '0',
         `Status` tinyint(1) DEFAULT '0',
         PRIMARY KEY (`ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1
        ;");

        $this->db->query("CREATE TABLE IF NOT EXISTS `trainingprogram` (
         `Program_ID` int(11) NOT NULL AUTO_INCREMENT,
         `Title` varchar(50) NOT NULL,
         `Description` varchar(100) NOT NULL,
         `Program_Date` date NOT NULL,
         `Venue` varchar(20) NOT NULL,
         PRIMARY KEY (`Program_ID`)
        ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1
        ;");

        $this->db->query("CREATE TABLE IF NOT EXISTS `participate` (
         `User_ID` varchar(10) NOT NULL,
         `Program_ID` int(11) NOT NULL,
         PRIMARY KEY (`User_ID`,`Program_ID`),
         KEY `Program_ID` (`Program_ID`),
         CONSTRAINT `participate_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `employee` (`User_ID`),
         CONSTRAINT `participate_ibfk_2` FOREIGN KEY (`Program_ID`) REFERENCES `trainingprogram` (`Program_ID`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;");


    }

    public function down(){
        $this->dbforge->drop_table('person');
        $this->dbforge->drop_table('designation');
        $this->dbforge->drop_table('basic');
        $this->dbforge->drop_table('employee');
        $this->dbforge->drop_table('epf');
        $this->dbforge->drop_table('etf');
        $this->dbforge->drop_table('salary');
        $this->dbforge->drop_table('attendance');
        $this->dbforge->drop_table('leaves');
        $this->dbforge->drop_table('leavedetails');
        $this->dbforge->drop_table('adminnotifications');
        $this->dbforge->drop_table('adminleavenotificaions');
        $this->dbforge->drop_table('employeeleavenotifications');
        $this->dbforge->drop_table('trainingprogram');
        $this->dbforge->drop_table('participate');
    }



}

?>