-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2017 at 03:52 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netbanking`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountmaster`
--

CREATE TABLE `accountmaster` (
  `accounttype` varchar(25) NOT NULL,
  `prefix` varchar(11) NOT NULL,
  `minbalance` double(12,2) NOT NULL,
  `interest` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountmaster`
--

INSERT INTO `accountmaster` (`accounttype`, `prefix`, `minbalance`, `interest`) VALUES
('CURRENT', 'CUR', 6000.00, 6.00),
('DFD', 'DFD', 100.00, 5.00),
('SALARY', 'SAL', 0.00, 10.00),
('SAVING', 'SAV', 200.00, 10.00);

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accno` varchar(25) NOT NULL,
  `customerid` int(10) NOT NULL,
  `accstatus` varchar(25) NOT NULL,
  `primaryacc` varchar(10) NOT NULL,
  `accopendate` date NOT NULL,
  `accounttype` varchar(25) NOT NULL,
  `accountbalance` double(10,2) NOT NULL,
  `unclearbalance` double(10,2) NOT NULL,
  `accuredinterest` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accno`, `customerid`, `accstatus`, `primaryacc`, `accopendate`, `accounttype`, `accountbalance`, `unclearbalance`, `accuredinterest`) VALUES
('4660', 98680, 'ACTIVE', '40000', '2013-02-11', 'SAV', 100000.00, 100.00, 100.00),
('4661', 98681, 'ACTIVE', '4000', '2017-02-10', 'CUR', 3900.00, 150.00, 100.00),
('4662', 98682, 'ACTIVE', '500', '2017-02-10', 'SAL', 92000.00, 99600.00, 100.00),
('4663', 98683, 'ACTIVE', '1000', '2017-02-10', 'DFD', 10000.00, 20.00, 100.00),
('78965', 98680, 'active', 'YES', '2017-02-11', 'CUR', 10000.00, 500.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `ifsccode` varchar(25) NOT NULL,
  `branchname` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  `branchaddress` text NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`ifsccode`, `branchname`, `city`, `branchaddress`, `state`, `country`) VALUES
('ifs98680', 'The Albion Centre', 'Toronto', 'The Albion Centre, 1530 Albion Rd, Etobicoke, ON M9V 1B4', 'Ontario', 'Canada'),
('ifs98681', '2200 Martin Grove', 'Toronto', '2200 Martin Grove Rd, Etobicoke, ON M9V 5H9', 'Ontario', 'Canada'),
('ifs98682', '1735 Kipling Ave', 'Toronto', '1735 Kipling Ave, Etobicoke, ON M9R 2Y8', 'Ontario', 'Canada'),
('ifs98683', '2574 Finch Ave W', 'Toronto', '2574 Finch Ave W, North York, ON M9M 2G3', 'Ontario', 'Canada'),
('ifs98684', '150 Ferrand Drive', 'Toronto', '150 Ferrand Drive, Suite 700, Toronto, ON M3C 3E5', 'Ontario', 'Canada');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customerid` int(10) NOT NULL,
  `ifsccode` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `accpassword` varchar(50) NOT NULL,
  `transpassword` varchar(50) NOT NULL,
  `accstatus` varchar(25) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `accopendate` date NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerid`, `ifsccode`, `firstname`, `lastname`, `loginid`, `accpassword`, `transpassword`, `accstatus`, `city`, `state`, `country`, `accopendate`, `lastlogin`) VALUES
(98680, 'ifs98680', 'Fahad', 'Shaikh', 'fahad', 'fahad', 'fahad', 'ACTIVE', 'Toronto', 'Ontario', 'Canada', '2017-02-02', '2017-02-23 06:33:37'),
(98681, 'ifs98681', 'Sagar', 'Patel', 'sagar', 'sagar', 'sagar', 'ACTIVE', 'Toronto', 'Ontario', 'Canada', '2017-02-07', '2017-02-24 03:32:32'),
(98682, 'ifs98682', 'Nikunj', 'Radadiya', 'nikunj', 'nikunj', 'nikunj', 'ACTIVE', 'Toronto', 'Ontario', 'Canada', '2013-02-02', '2017-02-24 03:38:45'),
(98683, 'ifs98683', 'Jay', 'Patel', 'jay', 'jay', 'jay', 'ACTIVE', 'Toronto', 'Ontario', 'Canada', '2013-02-09', '2013-02-16 05:25:20');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `empid` int(10) NOT NULL,
  `employee_name` varchar(25) NOT NULL,
  `loginid` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `emailid` varchar(30) NOT NULL,
  `contactno` varchar(30) NOT NULL,
  `createdat` date NOT NULL,
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`empid`, `employee_name`, `loginid`, `password`, `emailid`, `contactno`, `createdat`, `lastlogin`) VALUES
(313786, 'Aakash', 'aakash', 'aakash', 'aakash292@gmail.com', '9535543313', '2012-12-15', '2017-02-24 03:40:52'),
(313787, 'Rahul', 'rahul', 'rahul', 'rahul.mandaliya.it26@gmail.com', '98478872783', '2017-02-08', '2017-02-10 00:00:00'),
(313788, 'Vishvesh', 'vishvesh', 'vishvesh', 'vishvesh_5p@yahoo.in', '95425422424', '2013-01-02', '2017-02-16 02:14:13'),
(313791, 'admin', 'admin', 'admin', 'admin@gmail.com', '4166027067', '2013-01-12', '2013-01-12 00:00:00'),
(313798, 'Amit', 'amit', 'amit', 'radadiya.amit@gmail.com', '4166027069', '2013-02-02', '2017-02-16 14:13:35'),
(313799, 'Dolly', 'dolly', 'dolly', 'dollya1993@gmail.com', '987456321', '2013-02-09', '2017-02-09 12:46:46');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loanid` int(10) NOT NULL,
  `customerid` int(10) NOT NULL,
  `loantype` varchar(25) NOT NULL,
  `loanamt` varchar(25) NOT NULL,
  `period` varchar(25) NOT NULL,
  `interest` float(10,2) NOT NULL,
  `startdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`loanid`, `customerid`, `loantype`, `loanamt`, `period`, `interest`, `startdate`) VALUES
(2147483641, 98682, 'educationloan', '500000', 'yearly', 2.00, '2017-02-03'),
(2147483642, 98683, 'carloan', '20000', 'yearly', 10.00, '2017-02-08'),
(2147483647, 98682, 'homeloan', '300000', 'monthly', 6.00, '2012-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `loanpayment`
--

CREATE TABLE `loanpayment` (
  `paymentid` bigint(10) NOT NULL,
  `loanid` int(10) NOT NULL,
  `customerid` int(10) NOT NULL,
  `date` date NOT NULL,
  `paidamt` float(10,2) NOT NULL,
  `principleamt` float(10,2) NOT NULL,
  `interestamt` float(10,2) NOT NULL,
  `balance` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loanpayment`
--

INSERT INTO `loanpayment` (`paymentid`, `loanid`, `customerid`, `date`, `paidamt`, `principleamt`, `interestamt`, `balance`) VALUES
(2147483647, 2147483640, 98682, '2012-01-03', 50000.00, 25000.00, 2500.50, 250000.00),
(2147483648, 2147483641, 98682, '2017-02-14', 500.00, 50000.00, 100.00, 2000.00),
(2147483649, 2147483641, 98682, '2017-02-14', 200.00, 200.00, 200.00, 200.00),
(2147483650, 2147483641, 98682, '2017-02-14', 500.00, 2.00, 500000.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `loantype`
--

CREATE TABLE `loantype` (
  `loantype` varchar(25) NOT NULL,
  `prefix` varchar(25) NOT NULL,
  `maximumamt` float(10,2) NOT NULL,
  `minimumamt` float(10,2) NOT NULL,
  `interest` float(10,2) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loantype`
--

INSERT INTO `loantype` (`loantype`, `prefix`, `maximumamt`, `minimumamt`, `interest`, `status`) VALUES
('carloan', 'CL', 7000.00, 5000.00, 400.00, 'active'),
('educationloan', 'EL', 70000.00, 50000.00, 3000.00, 'active'),
('homeloan', 'HL', 1000000.00, 50000.00, 65.09, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `mailid` int(10) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `mdatetime` datetime NOT NULL,
  `senderid` varchar(25) NOT NULL,
  `reciverid` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`mailid`, `subject`, `message`, `mdatetime`, `senderid`, `reciverid`) VALUES
(10, 'Congratulation!!', 'Hi Customer,\r\n\r\nYour monthly interest has been added in your checking balance.\r\n\r\nThanks', '2013-01-19 05:05:58', 'aakash', 'fahad'),
(13, 'Congratulations!!', 'Hi Customer,\r\n\r\nYour monthly interest has been added in your checking balance.\r\n\r\nThanks', '2013-02-02 05:33:00', 'admin', 'sagar'),
(14, 'Congratulation!!', 'Hi Customer,\r\n\r\nYour monthly interest has been added in your checking balance.\r\n\r\nThanks', '2013-02-02 05:36:16', 'admin', 'jay'),
(16, 'Concern About Pending Transaction', 'Hi Sir,\r\n\r\nCan you please complete my pending transaction as soon as possible.', '2017-02-16 07:34:13', 'nikunj', 'admin'),
(17, 'Transaction details-2147483654', 'Hi,\r\n\r\nI am writing to obtain status of my transaction with Txn no. 2147483654. Please update me ASAP.', '2017-02-23 07:58:00', 'nikunj', 'admin'),
(18, 'Transaction details-2147483654', 'Your transaction is complete.', '2017-02-22 09:22:00', 'admin', 'jay');

-- --------------------------------------------------------

--
-- Table structure for table `registered_payee`
--

CREATE TABLE `registered_payee` (
  `payeeid` int(11) NOT NULL,
  `customerid` int(10) NOT NULL,
  `payeename` varchar(25) NOT NULL,
  `accountnumber` varchar(25) NOT NULL,
  `accounttype` varchar(25) NOT NULL,
  `bankname` varchar(25) NOT NULL,
  `ifsccode` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `registered_payee`
--

INSERT INTO `registered_payee` (`payeeid`, `customerid`, `payeename`, `accountnumber`, `accounttype`, `bankname`, `ifsccode`) VALUES
(104, 98682, 'Nikunj', '8789', 'SALARY', 'Scotia Bank', 'scotia5679'),
(105, 98682, 'Anil', '787878', 'CURRENT', 'BMO', 'BMO788'),
(106, 98681, 'jay', 'BOC123456', 'CURRENT', 'Bank Of Canada', 'IFC998872');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionid` bigint(15) NOT NULL,
  `customerid` int(10) NOT NULL,
  `accountnumber` varchar(25) NOT NULL,
  `transactiondate` datetime NOT NULL,
  `payeeid` int(25) NOT NULL,
  `payeename` varchar(25) NOT NULL,
  `receiveid` int(10) NOT NULL,
  `receivename` varchar(25) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `paymentstat` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionid`, `customerid`, `accountnumber`, `transactiondate`, `payeeid`, `payeename`, `receiveid`, `receivename`, `amount`, `paymentstat`) VALUES
(2147483647, 98682, '4662', '2012-12-13 00:00:00', 8789, 'Nikunj', 0, '', 100000.00, 'Approved'),
(2147483648, 98682, '4662', '2017-02-12 05:52:57', 787878, 'Anil', 0, '', 500.00, 'Pending'),
(2147483651, 98681, '4661', '2017-02-23 03:55:51', 106, 'jay', 0, '', 50.00, 'Approved'),
(2147483652, 98682, '4662', '2017-02-23 05:13:14', 105, 'Anil', 0, '', 100.00, 'Pending'),
(2147483653, 98682, '4662', '2017-02-23 05:16:38', 105, 'Anil', 0, '', 100.00, 'Pending'),
(2147483654, 98682, '4662', '2017-02-24 03:35:11', 106, 'jay', 0, '', 100.00, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountmaster`
--
ALTER TABLE `accountmaster`
  ADD PRIMARY KEY (`accounttype`);

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accno`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`ifsccode`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerid`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`loanid`);

--
-- Indexes for table `loanpayment`
--
ALTER TABLE `loanpayment`
  ADD PRIMARY KEY (`paymentid`);

--
-- Indexes for table `loantype`
--
ALTER TABLE `loantype`
  ADD UNIQUE KEY `loantype` (`loantype`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`mailid`);

--
-- Indexes for table `registered_payee`
--
ALTER TABLE `registered_payee`
  ADD PRIMARY KEY (`payeeid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customerid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98684;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `empid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313800;
--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `loanid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
--
-- AUTO_INCREMENT for table `loanpayment`
--
ALTER TABLE `loanpayment`
  MODIFY `paymentid` bigint(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `mailid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `registered_payee`
--
ALTER TABLE `registered_payee`
  MODIFY `payeeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionid` bigint(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
