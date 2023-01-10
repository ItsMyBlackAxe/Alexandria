-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 10, 2022 at 04:01 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alexandria`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminuser`
--

DROP TABLE IF EXISTS `adminuser`;
CREATE TABLE IF NOT EXISTS `adminuser` (
  `USERNAME` varchar(30) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(15) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `DESIGNATION` varchar(12) DEFAULT NULL,
  `NIC` varchar(12) NOT NULL,
  `CONTACTNO` varchar(10) NOT NULL,
  `ADDRESS` varchar(50) NOT NULL,
  PRIMARY KEY (`USERNAME`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminuser`
--

INSERT INTO `adminuser` (`USERNAME`, `NAME`, `PASSWORD`, `EMAIL`, `DESIGNATION`, `NIC`, `CONTACTNO`, `ADDRESS`) VALUES
('Yuneth Wijenayake', 'Yuneth Wijenayake', 'abcd1234', 'yunethcwij@gmail.com', 'LIBRARIAN', '200016802860', '0774745577', 'Kotte'),
('ThxlxlNawas', 'Thalal Nadir Nawas', 'Th2345@Sen', 'thalalnawas@gmail.com', 'ADMIN', '200176543829', '0772364754', 'Kalubowila'),
('_Mayukha_', 'Mayukha Siriwardena', 'Mk788dou', 'mayukhasiriwardena@gmail.com', 'ADMIN', '200076453987', '0712536785', 'Piliyandala'),
('AbdullaKais', 'Abdulla Kais', 'int69', 'abdullakais@gmail.com', 'LIBRARIAN', '200043567829', '0728736456', 'Nugegoda'),
('SayuuR', 'Sayuni Ranawaka', 'SY@566', 'sayuniranawaka@gmail.com', 'LIBRARIAN', '200145362789', '0712736543', 'Borella'),
('Dunzzyy', 'Dunithi Leuwanduwa', 'Djj2016', 'dunithileuwanduwa@gmail.com', 'LIBRARIAN', '200177566739', '0774546864', 'Kaduwela');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `ISBN` varchar(30) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `AUTHOR` varchar(30) NOT NULL,
  `CATEGORY` varchar(30) DEFAULT NULL,
  `ARRIVALDATE` date DEFAULT NULL,
  `AVAILABILITY` varchar(3) NOT NULL,
  PRIMARY KEY (`ISBN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `TITLE`, `AUTHOR`, `CATEGORY`, `ARRIVALDATE`, `AVAILABILITY`) VALUES
('978-93-5163-389-0', 'Client Server Computing', 'Lalit Kumar', 'Educatinal', '2021-10-01', 'YES'),
('978-93-5163-389-1', 'Data Structure Using C', 'Sharad Kumar Verma', 'Educatinal', '2021-10-01', 'YES'),
('978-93-8067-432-2', 'Client Server Computing', 'Sharad Kumar Verma', 'Educatinal', '2021-10-01', 'YES'),
('978-1-933624-76-1', 'ABC Danny', 'Mary Ruth', 'Kids', '2021-10-01', 'YES'),
('978-1-62544-118-8', 'Adventures of Super Danny and Bat-Bee, The', 'Mary Ruth', 'Kids', '2021-10-01', 'YES'),
('978-1-62544-177-5', 'Alive or Not Alive, Danny?', 'Mary Ruth', 'Kids', '2021-10-01', 'YES'),
('978-0-9720295-3-7', 'All About Danny', 'Mary Ruth', 'Kids', '2021-10-01', 'YES'),
('978-1-62544-167-6', 'All About Danny Lap Book', 'Mary Ruth', 'Kids', '2021-10-01', 'YES'),
('978-1-62544-276-5', 'All My Friends', 'Mary Ruth', 'Kids', '2021-10-01', 'YES'),
('978-1-62544-274-1', 'Aquarium, The', 'Mary Ruth', 'Kids', '2021-10-01', 'YES'),
('978-1-933624-46-4', 'Baby Elephant Goes for a Swim', 'Mary Ruth', 'Kids', '2021-10-01', 'YES'),
('978-1-933624-95-2', 'Bats in Danny?s House', 'Mary Ruth', 'Kids', '2021-10-01', 'YES'),
('978-1-933624-51-8', 'Baby Elephant Runs Away Lap Book', 'Mary Ruth', 'Kids', '2021-10-01', 'YES'),
('9780316229296', 'The Fifth Season', 'K Jesmin', 'Fantasy', '2021-10-01', 'YES'),
('9780756406691', 'Who Fears Death', 'Nnedi Okorafor', 'Science Fiction', '2021-10-01', 'YES'),
('9780307474278', 'Da Vinci Code', 'Dan Brown', 'Crime', '2021-10-01', 'YES'),
('9780545010221', 'Harry Potter and the Deathly Hallows', 'J. K. Rowling', 'Children\'s Fiction', '2021-10-01', 'YES'),
('9781526602381', 'Harry Potter and the Philosopher\'s Stone', 'J. K. Rowling', 'Children\'s Fiction', '2021-10-01', 'YES'),
('9780439358071', 'Harry Potter and the Order of the Phoenix', 'J. K. Rowling', 'Children\'s Fiction', '2021-10-01', 'YES'),
('9780345804044', 'Fifty Shades of Grey', 'E.L James', 'Romance', '2021-10-01', 'YES'),
('9780545791427', 'Harry Potter and the Goblet of Fire', 'J. K. Rowling', 'Children\'s Fiction', '2021-10-01', 'YES'),
('9781338716535', 'Harry Potter and the Chamber of Secrets', 'J. K. Rowling', 'Children\'s Fiction', '2021-10-01', 'YES'),
('9781526606167', 'Harry Potter and the Prisoner of Azkaban', 'J. K. Rowling', 'Children\'s Fiction', '2021-10-01', 'YES'),
('9780743493468', 'Angels and Demons', 'Dan Brown', 'Thriller', '2021-10-01', 'YES'),
('9780345803498', 'Fifty Shades Darker', 'E.L James', 'Romance', '2021-10-01', 'YES'),
('9780316027656', 'Eclipse', 'Stephenie Meyer ', 'Young Adult Fiction', '2021-10-01', 'YES'),
('9781400032716', 'The Curious Incident of the Dog in the Night-time', 'Mark Haddon', 'Literary Fiction', '2021-10-01', 'YES'),
('9780140569322', 'Very Hungry Caterpillar,The:The Very Hungry Caterpillar', 'Eric Carle', 'Picture Books', '2021-10-01', 'YES'),
('9780001056367', 'Angela\'s Ashes:A Memoir of a Childhood', 'Frank McCourt', 'Autobiography', '2021-10-01', 'YES'),
('9781580058070', 'Birdsong', 'Sebastian Faulks', 'General ', '2021-10-01', 'YES'),
('9781407105475', 'Northern Lights:His Dark Materials S.', 'Philip Pullman', 'Young Adult Fiction', '2021-10-01', 'YES'),
('9781839824234', 'Labyrinth', 'Kate Mosse ', 'Literary Fiction', '2021-10-01', 'YES'),
('9781526618245', 'Harry Potter and the Half-blood Prince', 'J.K. Rowling', 'Science Fiction & Fantasy', '2021-10-01', 'YES'),
('9780425232200', 'The Help', 'Stockett  Kathryn', 'Literary Fiction', '2021-10-01', 'YES'),
('9780802416575', 'Man and Boy', 'Parsons  Tony', 'Literary Fiction', '2021-10-01', 'YES'),
('780679781585', 'Memoirs of a Geisha', 'Golden  Arthur', 'Literary Fiction', '2021-10-01', 'YES'),
('9780804169912', 'No.1 Ladies\' Detective Agency,The:No.1 Ladies\' Detective Agency S.', 'McCall Smith  Alexander', 'Thriller ', '2021-10-01', 'YES'),
('9781984820631', 'The Island', 'Hislop  Victoria', 'Literary Fiction', '2021-10-01', 'YES'),
('9780306873669', 'PS, I Love You', 'Ahern  Cecelia', 'Literary Fiction', '2021-10-01', 'YES'),
('9780452287174', 'You are What You Eat:The Plan That Will Change Your Life', 'McKeith  Gillian', 'Fitness ', '2021-10-01', 'YES'),
('9780143034902', 'The Shadow of the Wind', 'Zafon  Carlos Ruiz', 'Literary Fiction', '2021-10-01', 'YES'),
('9781338125689', 'The Tales of Beedle the Bard', 'J.K. Rowling', 'Children\'s Fiction', '2021-10-01', 'YES'),
('9780345532008', 'The Broker', 'Grisham  John', 'Adventure', '2021-10-01', 'YES'),
('9780375823367', 'Dr. Atkins\' New Diet Revolution:The No-hunger, Luxurious Weight Loss P', 'Atkins  Robert C.', 'Fitness ', '2021-10-01', 'YES'),
('9780789319036', 'Eats, Shoots and Leaves:The Zero Tolerance Approach to Punctuation', 'Truss  Lynne', 'Writing Guides', '2021-10-01', 'YES'),
('9780563384311', 'Delia\'s How to Cook:(Bk.1)', 'Smith  Delia', 'Food ', '2021-10-01', 'YES'),
('9780140282030', 'Chocolat', 'Harris  Joanne', 'Literary Fiction', '2021-10-01', 'YES'),
('9780385751537', 'The Boy in the Striped Pyjamas', 'Boyne  John', 'Young Adult Fiction', '2021-10-01', 'YES'),
('9780743454537', 'My Sister\'s Keeper', 'Picoult  Jodi', 'General ', '2021-10-01', 'YES'),
('9780060935467', 'To Kill a Mockingbird', 'Lee  Harper', 'General ', '2021-10-01', 'YES'),
('9781558329997', 'Men are from Mars, Women are from Venus:A Practical Guide for Improvin', 'Gray  John', 'Popular Culture & Media', '2021-10-01', 'YES'),
('9780099519478', 'Dear Fatty', 'French  Dawn', 'Autobiography', '2021-10-01', 'YES'),
('9780143036746', 'Short History of Tractors in Ukrainian,A', 'Lewycka  Marina', 'Literary Fiction', '2021-10-01', 'YES'),
('9781643138718', 'Hannibal', 'Harris  Thomas', 'Thriller ', '2021-10-01', 'YES'),
('9780358653035', 'The Lord of the Rings', 'Tolkien  J. R. R.', 'Science Fiction ', '2021-10-01', 'YES'),
('9780007182367', 'Stupid White Men:...and Other Sorry Excuses for the State of the Natio', 'Moore  Michael', 'Current Affairs', '2021-10-01', 'YES'),
('9780312427054', 'The Interpretation of Murder', 'Rubenfeld  Jed', 'Adventure', '2021-10-01', 'YES'),
('9780821280140', 'Sharon Osbourne Extreme:My Autobiography', 'Osbourne  Sharon', 'Autobiography', '2021-10-01', 'YES'),
('9780062502667', 'Alchemist,The:A Fable About Following Your Dream', 'Coelho  Paulo', 'General ', '2021-10-01', 'YES'),
('9780553819489', 'At My Mother\'s Knee ...:and Other Low Joints', 'O\'Grady  Paul', 'Autobiography', '2021-10-01', 'YES'),
('9780380727506', 'Notes from a Small Island', 'Bryson  Bill', 'Travel Writing', '2021-10-01', 'YES'),
('9781405933520', 'The Return of the Naked Chef', 'Jamie Oliver', 'Food', '2021-10-01', 'YES'),
('9780140298475', 'Bridget Jones: The Edge of Reason', 'Fielding  Helen', 'General ', '2021-10-01', 'YES'),
('9781401301958', 'Jamie\'s Italy', 'Jamie Oliver', 'National & Regional Cuisine', '2021-10-01', 'YES'),
('9781402765711', 'I Can Make You Thin', 'McKenna  Paul', 'Fitness', '2021-10-01', 'YES'),
('9780060723514', 'Down Under', 'Bryson  Bill', 'Travel Writing', '2021-10-01', 'YES'),
('9780345531988', 'The Summons', 'Grisham  John', 'Adventure', '2021-10-01', 'YES'),
('9780312429522', 'Small Island', 'Levy  Andrea', 'Literary Fiction', '2021-10-01', 'YES'),
('9781401322434', 'Nigella Express', 'Lawson  Nigella', 'Food ', '2021-10-01', 'YES'),
('9781910566503', 'Brick Lane', 'Ali  Monica', 'Literary Fiction', '2021-10-01', 'YES'),
('9780142501122', 'Room on the Broom', 'Donaldson  Julia', 'Picture Books', '2021-10-01', 'YES'),
('1', 'test', 'test', 'test', '2022-03-09', 'YES'),
('9780061730412', 'My Booky Wook', 'Brand  Russell', 'Autobiography', '2021-10-01', 'YES'),
('9780618918249', 'The God Delusion', 'Dawkins  Richard', 'Popular Science', '2021-10-01', 'YES'),
('9782808019415', 'White Teeth', 'Smith  Delia', 'Literary Fiction', '2021-10-01', 'YES'),
('9788466331050', 'The House at Riverton', 'Kate Morton', 'Literary Fiction', '2021-10-01', 'YES'),
('9780375842207', 'The Book Thief', 'Markus Zusak', 'Literary Fiction', '2021-10-01', 'YES'),
('9780451214461', 'Nights of Rain and Stars', 'Maeve Binchy', 'Literary Fiction', '2021-10-01', 'YES'),
('9780593319857', 'The Ghost', 'Robert Harris', 'Literary Fiction', '2021-10-01', 'YES'),
('9780786868520', 'Happy Days with the Naked Chef', 'Jamie Oliver', 'Food', '2021-10-01', 'YES'),
('9789124135874', 'Hunger Games,The:Hunger Games Trilogy', 'Suzanne Collins', 'Young Adult Fiction', '2021-10-01', 'YES'),
('9781558745155', 'Lost Boy,The:A Foster Child\'s Search for the Love of a Family', 'Dave Pelzer', 'Biography', '2021-10-01', 'YES'),
('9780718148621', 'Jamie\'s Ministry of Food:Anyone Can Learn to Cook in 24 Hours', 'Jamie Oliver', 'Food ', '2021-10-01', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

DROP TABLE IF EXISTS `borrow`;
CREATE TABLE IF NOT EXISTS `borrow` (
  `MEMBERID` varchar(10) NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `ISSUEDDATE` date NOT NULL,
  `DUEDATE` date NOT NULL,
  `RETURNDATE` date DEFAULT NULL,
  PRIMARY KEY (`MEMBERID`,`ISBN`,`ISSUEDDATE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`MEMBERID`, `ISBN`, `ISSUEDDATE`, `DUEDATE`, `RETURNDATE`) VALUES
('MI001', '9780316229296', '2022-03-10', '2022-03-17', '2022-03-10'),
('MI001', '9780345804044', '2022-03-10', '2022-03-17', '2022-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `handle`
--

DROP TABLE IF EXISTS `handle`;
CREATE TABLE IF NOT EXISTS `handle` (
  `USERNAME` varchar(15) NOT NULL,
  `ISBN` varchar(10) NOT NULL,
  `ACTION` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`USERNAME`,`ISBN`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `MEMBERID` varchar(5) NOT NULL,
  `FNAME` varchar(30) NOT NULL,
  `LNAME` varchar(30) NOT NULL,
  `NIC` varchar(15) NOT NULL,
  `CONTACT` varchar(12) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `POSTALCODE` varchar(10) NOT NULL,
  `ADDRESSLINE1` varchar(100) NOT NULL,
  `ADDRESSLINE2` varchar(50) DEFAULT NULL,
  `CITY` varchar(30) NOT NULL,
  `CATEGORY` varchar(10) NOT NULL,
  `SALUTATION` varchar(5) NOT NULL,
  `GENDER` varchar(15) NOT NULL,
  `DOB` date NOT NULL,
  PRIMARY KEY (`MEMBERID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MEMBERID`, `FNAME`, `LNAME`, `NIC`, `CONTACT`, `EMAIL`, `POSTALCODE`, `ADDRESSLINE1`, `ADDRESSLINE2`, `CITY`, `CATEGORY`, `SALUTATION`, `GENDER`, `DOB`) VALUES
('MI001', 'Senaadi', 'Best', '200110304832', '+94771344559', 'thalal.naathir.nawas@gmail.com', '10350', '62/3B, Sri Mahavihara Road, Kalubowila', NULL, 'Dehiwala', 'Student', 'Ms', 'Female', '2001-03-10'),
('MI002', 'Yuneth', 'Wijenayake', '200016802860', '+94774745577', 'yunethcwij@gmail.com', '10100', '20/19, Epitamulla Road, Pitakotte', '', 'Sri Jayawardenapura Kotte', 'Student', 'Mr', 'Male', '2000-06-16');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
