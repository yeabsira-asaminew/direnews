-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 06:43 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news1`
--

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `name`) VALUES
(1, 'Eng'),
(2, 'አማ'),
(3, 'Oro'),
(4, 'Som');

-- --------------------------------------------------------

--
-- Table structure for table `tbladdnews`
--

CREATE TABLE `tbladdnews` (
  `id` int(11) NOT NULL,
  `newtitle` varchar(200) DEFAULT NULL,
  `Category` int(11) DEFAULT NULL,
  `Sub_category` int(11) DEFAULT NULL,
  `Upload_Image` varchar(200) DEFAULT NULL,
  `Description` mediumtext DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT current_timestamp(),
  `lang_id` int(11) DEFAULT NULL,
  `posted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladdnews`
--

INSERT INTO `tbladdnews` (`id`, `newtitle`, `Category`, `Sub_category`, `Upload_Image`, `Description`, `create_date`, `lang_id`, `posted_by`) VALUES
(1, 'Wareegii 13aad ee Booliska magaalada Diridhaba ayaa maanta tababar u soo xiray 238 askari Xalfad.', 3, 8, '20231013221022-90814.jpg', ' Duqa magaalada Diridhaba, Mudane Kedir Juhar oo ka qeyb galay xaflada ayaa dhanbaalkiisa ka jeediyay oo ku sheegay in ciidamada booliska Diridhaba isbadalka qaranka kadib ay si hufan u hirgaliyeen isbadalka hay’adaha dowlada, islamarkaana ay ka qeyb qaadanayaan dadka deegaanka, isla markaana shaqada wadajirka ah ay suuragelineyso nabadda iyo amniga Diridhaba in lagu dhiso aasaas la isku halayn karo.\r\n Dadaalada lagu doonayo in si wanaagsan looga jawaabo dalabaadka dadka deegaanka ee ku aaddan nabadda, Cadaaladda iyo mamulka suuban, ayuu maayarku ugu baaqay ardayda ka qalinjabisay Booliska inay si daacad ah ugu adeegaan bulshadooda si ay ugu adeegaan anshaxa booliska.', '2023-10-13 20:16:22', 4, 3),
(3, 'Munaasabada Ciidul Adxaa/Carafa ee 1444-aad salaada si weyn looga xusay magaalada Diridhaba.', 42, 9, '20231013221051-420200.jpg', 'Dhambaal uu ka jeediyay xalfada ciida  duqa magaalada Kedir Juhar ku sheegay in xuska loo baahan yahay in la xoojiyo qiyamka iscaawinta iyo is garabsiga.', '2023-10-13 20:20:51', 4, 3),
(4, 'Xayyaarri Keeniyaa sababa yaaddoo nageenyan bakka biraa akka qubatuuf humni qiileensaa UK dirqisiise', 3, 8, '20231013221019-726556.jpg', 'Xiyyaarrii Keenyaa magaalaa guddoo irraa gara buufata xiyyaara idil-addunyaa Heeziroo kan UKtti argamuutti balalii’aa ture ‘‘sababii nageenyaatiif jedhamuun’’ bakka qubannaa akka jijjiru diriqisiifame.\r\n\r\nXiyyaarichis loltoota humna qilleensaa UKtiin eddo qubannaa isaa jijjiruun magaala Iseeksii kan baha Biriteeniitti argamtu keessatti buufata xiyyaaraa Istaansteed akka qubatuuf dirqisiifameera.\r\n\r\nDubbii Himaan Landan Istaandsteed, xiyyaarri Booying 787 qabeenyummaansaa kan Daandii Qilleensa Keeniyaa ta’e bakka poolisoonni Iseeksii argamaniitti ngaan qubachuu ibse.', '2023-10-13 20:24:19', 3, 4),
(5, 'Manni Marii Bulchinsa Dirree Dhawaa Karoora Hojii Bara 2016 rraatti Dhaabbilee Raawwachiiftota Bulchinsaa Waliin Waliigaltee Sanadaa Mallatteesse. ', 3, 8, '20231013221038-920481.jpg', 'Waliigalteen Sanadichaa Bulchinsatti  hojiilee misoomaa karoorfaman bu\'aqabeessa taasisuufi gaaffileefi rakkoolee  misoomaafi bulchinsa gaarii bakka bu\'mmaa ba\'uu keessatti jiraattotarraa ka\'aa turan bu\'urarraa furuuf qabatamaan hojitti jijjiiruurratti kan xiyyeeffatu ta\'uufi akkaataa sanadichaatiin  raawwii karoora hojiilee kanneeniif hordoffiifi to\'annoo gaggeessuuf sanadichi mana marii bulchinsaatiin  mirkanaa\'ee jiraachuus Afa-yaa-iin Mana Marii Bulchinsa Dirree Dhawaa Kabajamtuu Aadde Fathiyaa Aden ibsaniiru. ', '2023-10-13 20:29:38', 3, 4),
(6, 'አዲስ ድሬ የድሬዳዋ 2ኛ ዲቪዝዮን አሸናፊ ሆነ ', 1, 1, '20231013221047-525869.jpg', ' የድሬዳዋ 2ኛ ዲቪዝዮን ውድድር አዲስ ድሬ ሀፈት ኢሳን በመለያ ምት በማሸነፍ የ2ኛ ዲቪዝዮን የዋንጫ ባለቤት መሆኑን አረጋግጧል፡፡  አዲስ ድሬን ተከትለው ሀፈተ ኢሳ ፣ ሳቢያን ህብረት እና  ሐረር ቡና ወደ 1ኛ ዲቪዝዮን ማለፋቸውን አረጋግተዋል፡፡', '2023-10-13 20:31:47', 2, 5),
(7, 'የድሬዳዋ ፖሊስ 13 ኛ ዙር ያሰለጠናቸውን 238  ያህል እጩ ፖሊሶች ዛሬ አስመረቀ ', 3, 8, '20231013221026-434099.jpg', 'በስነስርዓቱ ላይ የተገኙት የድሬዳዋ አስተዳደር ከንቲባ አቶ ከድር ጁሀር ባስተላለፉት መልዕክት እንዳሉት የድሬዳዋ ፖሊስ ሀገራዊ ለውጡን ተከትሎ ተቋማዊ የለውጥ ስራዎችን በአግባቡ በመተግበር ነዋሪውን በማሳተፍ በጋራ የሰራው ስራ የድሬዳዋን ሰላምና ደህንነት አስተማማኝ መሰረት ላይ እንዲገነባ እያስቻለ መሆኑን ተናግረዋል።\r\nየአስተዳደሩን ነዋሪ የሰላም ፣የፍትህና የመልካም አስተዳደር ጥያቄዎች በሚገባ ምላሽ ለመስጠት በሚደረገው ጥረት ተመራቂ ፖሊሶች በፖሊሳዊ ስነምግባር ህብረተሰባቸውን በታማኝነት ያገለግሉ ዘንድ ከንቲባ ከድር ጥሪ አቅርበዋል ።', '2023-10-13 20:32:26', 2, 5),
(8, 'Addis Dire became the champion of Dire Dawa highest division ', 1, 1, '20231013221032-567925.jpg', 'Addis Dire won the competition by defeating Sabiyan Hibret by total result 1:0 at FT.', '2023-10-13 20:35:32', 1, 5),
(10, 'aabab', 3, 8, '20240207070220-892948.jpg', 'edjkefhkd', '2024-02-07 06:45:20', 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT current_timestamp(),
  `role` enum('admin','sub_admin','journalist','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `first_name`, `middle_name`, `last_name`, `name`, `email`, `password`, `create_date`, `role`) VALUES
(1, 'Yeabsira', 'Asaminew', 'Tesfahun', 'yea', 'yeabmek32@gmail.com', '12345678', '2023-10-13 20:01:08', 'admin'),
(2, 'Neima', 'Mohammed', NULL, 'neima', 'neima@gmail.com', '12345678', '2023-10-13 20:01:48', 'sub_admin'),
(3, 'Abdulahi', 'Mohamud', 'Mohamed', 'abd', 'abdulahimahamud778@gmail.com', '12345678', '2023-10-13 20:02:36', 'journalist'),
(4, 'Ubeyi', 'Mustefa', 'Ahmed', 'ube', 'ubeyimustefa33@gmail.com', '12345678', '2023-10-13 20:04:46', 'journalist'),
(5, 'Hamza', 'Ahmed', '', 'ham', 'hamza@gmail.com', '12345678', '2023-10-13 20:05:12', 'journalist'),
(6, 'Amed', 'Mohammed', 'Ahmed', 'amula', 'amula33443558@gmail.com', '7hZTbGqL', '2024-02-07 06:29:30', 'admin'),
(7, 'Hamza', 'Ahmed', 'ksi', 'asd', 'admin@admin.com', '6n47ishN', '2024-02-26 16:43:06', 'sub_admin');

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`id`, `name`) VALUES
(1, 'sports'),
(2, 'Entertainment'),
(3, 'Politics'),
(4, 'Technology'),
(42, 'Religious');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomment`
--

CREATE TABLE `tblcomment` (
  `id` int(11) NOT NULL,
  `postid` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `emailid` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT current_timestamp(),
  `approved_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcomment`
--

INSERT INTO `tblcomment` (`id`, `postid`, `name`, `emailid`, `comment`, `status`, `create_date`, `approved_by`) VALUES
(1, 8, 'Meskelegna F.C.', 'meskelegnafc@gmail.com', 'Congratulations!', '1', '2023-10-14 04:38:47', 2),
(2, 10, 'hjshk', 'asjh@gmail.com', 'asjhdbcksdnjnc', '0', '2024-02-07 06:46:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblsub_category`
--

CREATE TABLE `tblsub_category` (
  `id` int(11) NOT NULL,
  `category_name` int(11) DEFAULT NULL,
  `subcategory_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsub_category`
--

INSERT INTO `tblsub_category` (`id`, `category_name`, `subcategory_name`) VALUES
(1, 1, 'Foot Ball'),
(3, 1, 'Basket Ball'),
(4, 1, 'Atletics'),
(5, 2, 'Dire Cinema'),
(6, 4, 'AI'),
(7, 4, 'Big Data'),
(8, 3, 'Dire Politics'),
(9, 42, 'Holiday');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladdnews`
--
ALTER TABLE `tbladdnews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posted_by` (`posted_by`),
  ADD KEY `lang_idd` (`lang_id`),
  ADD KEY `category` (`Category`),
  ADD KEY `Sub_category` (`Sub_category`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `approved_by` (`approved_by`),
  ADD KEY `postid` (`postid`);

--
-- Indexes for table `tblsub_category`
--
ALTER TABLE `tblsub_category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbladdnews`
--
ALTER TABLE `tbladdnews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tblcomment`
--
ALTER TABLE `tblcomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblsub_category`
--
ALTER TABLE `tblsub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbladdnews`
--
ALTER TABLE `tbladdnews`
  ADD CONSTRAINT `Sub_category` FOREIGN KEY (`Sub_category`) REFERENCES `tblsub_category` (`id`),
  ADD CONSTRAINT `lang_idd` FOREIGN KEY (`lang_id`) REFERENCES `language` (`id`),
  ADD CONSTRAINT `posted_by` FOREIGN KEY (`posted_by`) REFERENCES `tbladmin` (`id`);

--
-- Constraints for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD CONSTRAINT `approved_by` FOREIGN KEY (`approved_by`) REFERENCES `tbladmin` (`id`),
  ADD CONSTRAINT `postid` FOREIGN KEY (`postid`) REFERENCES `tbladdnews` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
