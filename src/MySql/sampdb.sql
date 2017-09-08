-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-09-08 12:08:54
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampdb`
--

-- --------------------------------------------------------

--
-- 表的结构 `absence`
--

CREATE TABLE `absence` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `absence`
--

INSERT INTO `absence` (`student_id`, `event_id`, `date`) VALUES
(1, 1, '2017-09-03'),
(2, 2, '2017-09-03'),
(3, 3, '2017-09-04'),
(4, 4, '2017-09-04'),
(5, 5, '2017-09-05'),
(6, 6, '2017-09-05'),
(7, 7, '2017-09-06'),
(9, 13, '2017-09-23');

-- --------------------------------------------------------

--
-- 表的结构 `grade_event`
--

CREATE TABLE `grade_event` (
  `date` date NOT NULL,
  `category` enum('T','Q') NOT NULL,
  `course` varchar(20) NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `grade_event`
--

INSERT INTO `grade_event` (`date`, `category`, `course`, `event_id`) VALUES
('2017-09-03', 'T', '语文', 1),
('2017-09-03', 'T', '数学', 2),
('2017-09-04', 'T', '英语', 3),
('2017-09-04', 'T', '政治', 4),
('2017-09-05', 'T', '物理', 5),
('2017-09-05', 'T', '化学', 6),
('2017-09-06', 'T', '生物', 7),
('2017-09-20', 'Q', '语文', 8),
('2017-09-20', 'Q', '数学', 9),
('2017-09-21', 'Q', '英语', 10),
('2017-09-21', 'Q', '政治', 11),
('2017-09-22', 'Q', '物理', 12),
('2017-09-22', 'Q', '化学', 13),
('2017-09-23', 'Q', '生物', 14);

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE `member` (
  `member_id` int(10) UNSIGNED NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `suffix` varchar(5) DEFAULT NULL,
  `expiration` date DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `interests` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`member_id`, `last_name`, `first_name`, `suffix`, `expiration`, `email`, `street`, `city`, `state`, `zip`, `phone`, `interests`) VALUES
(1, 'Solow', 'Jeanne', NULL, '2008-11-15', 'jeanne_s@earth.com', '16 Ludden Dr.', 'Austin', 'TX', '33347', '964-665-8735', 'Great Depression,Spanish-American War,Westward movement,Civil Rights,Sports'),
(2, 'Lundsten', 'August', NULL, '2010-08-11', 'august.lundsten@pluto.com', '13 O''Malley St.', 'Bogalusa', 'LA', '96127', '196-481-0897', 'Korean War,World War I,Civil Rights'),
(3, 'Erdmann', 'Kay', NULL, '2008-01-14', NULL, '42 Fremont Av.', 'Grenada', 'MI', '44953', '493-610-3215', 'Education,Roosevelt,Presidential politics'),
(4, 'Arbogast', 'Ruth', NULL, '2010-02-10', 'arbogast.ruth@mars.net', '95 Carnwood Rd.', 'Paris', 'IL', '31483', '539-907-5225', 'Colonial period,Social Security,Constitution,Lincoln,Gold rush'),
(5, 'Dorfman', 'Carol', NULL, '2011-09-15', 'c.dorfman@uranus.net', '21 Winnemac Av.', 'Trenton', 'MO', '99887', '597-290-3955', 'Revolutionary War,Cold War,immigration'),
(6, 'Eliason', 'Jessica', NULL, '2008-12-27', 'jessica.eliason@pluto.com', '60 Century Av.', 'Osborne', 'KS', '63198', '896-268-0569', 'World War I,Korean War'),
(7, 'Sawyer', 'Dennis', NULL, '2009-11-21', 's_dennis@jupiter.com', '48 Jenifer St.', 'Denver', 'CO', '23728', '775-983-4182', 'Industrial revolution,Great Depression,Armed services,Education'),
(8, 'Phillips', 'Donald', 'III', '2008-03-05', 'd_phillips@neptune.org', '13 Lake St.', 'San Antonio', 'TX', '87154', '898-166-9341', 'Revolutionary War,Abolition,Armed services,Lincoln,Gold rush'),
(9, 'Anderson', 'Marcia', NULL, '2009-02-10', NULL, '31 Bigelow Rd.', 'Cedar Rapids', 'IA', '45150', '445-539-3384', 'Armed services,immigration,Gold rush,Cold War,Education'),
(10, 'Kilgore', 'Leonard', NULL, '2011-05-09', NULL, '19 Pagelow Ln.', 'Beloit', 'WI', '16235', '963-699-2715', 'Spanish-American War,Founding fathers,World War I,Presidential politics'),
(11, 'Lederman', 'Judith', NULL, '2012-07-09', 'judith_lederman@mercury.net', '218 N. Sherman Av.', 'Appleton', 'WI', '63330', '380-077-6632', 'World War II,Great Depression,War of 1812,Spanish-American War,Vietnam War'),
(12, 'Bodell', 'Bonnie', NULL, '2010-02-10', NULL, '674 Marledge St.', 'Geneva', 'IL', '34619', '790-449-4910', 'War of 1812,Spanish-American War,Korean War,World War I,Constitution'),
(13, 'Reusch', 'Diane', NULL, '2008-03-14', 'reusch_d@venus.org', '111 Dogwood Pl.', 'Burlington', 'IL', '03211', '964-681-8054', 'Vietnam War,Roosevelt'),
(14, 'Hilby', 'Bernard', NULL, '2009-06-04', 'bernard.hilby@saturn.org', '111 West St.', 'Clinton', 'IA', '46161', '333-263-2057', 'Westward movement,Cold War'),
(15, 'Propper', 'Harvey', NULL, '2009-04-03', 'harvey_propper@pluto.com', '853 Van Hise Av.', 'Lansing', 'MI', '39980', '184-832-6901', 'Industrial revolution,Founding fathers,Great Depression,Constitution,Presidential politics'),
(16, 'Michaels', 'Amanda', NULL, '2010-10-01', NULL, '805 Chase Blvd.', 'South Bend', 'IN', '58751', '295-458-1334', 'Abolition,Roosevelt,Vietnam War,Social Security'),
(17, 'Hagler', 'Carolyn', NULL, '2011-10-13', 'hagler.c@mars.net', '834 Woods Edge Rd.', 'Fort Wayne', 'IN', '65594', '828-991-7354', 'Lincoln,Civil Rights,Gold rush,Revolutionary War,Civil War'),
(18, 'York', 'Mark', 'II', '2007-08-24', 'york_mark@earth.com', '449 Meyer Av.', 'Peoria', 'IL', '90108', '845-137-2175', 'Cold War,immigration'),
(19, 'Feit', 'Daniel', NULL, '2009-05-04', 'daniel.feit@pluto.com', '181 E. Washington Av.', 'Stockton', 'CA', '90255', '167-064-7158', 'Colonial period,Vietnam War,Korean War,Presidential politics'),
(20, 'Overland', 'Roland', NULL, NULL, NULL, '949 Mineral Point Rd.', 'Minot', 'ND', '45600', '232-732-1438', 'Gold rush,immigration,Spanish-American War'),
(21, 'Lacke', 'Bruce', NULL, '2007-10-10', NULL, '617 West Lawn Av.', 'Aberdeen', 'SD', '97919', '171-132-0360', 'Vietnam War,Education'),
(22, 'Hurst', 'Sally', NULL, '2008-12-31', 'hurst.s@mars.net', '201 Laurel Ln.', 'Warren', 'MN', '37373', '553-257-4344', 'Spanish-American War'),
(23, 'Pitas', 'Clifton', NULL, '2011-02-22', 'clifton_p@saturn.org', '713 Quincy Av.', 'Duluth', 'MN', '84708', '857-652-7766', 'Industrial revolution,Great Depression,Armed services'),
(24, 'Wheeler', 'Mae', NULL, '2009-05-26', 'mae.wheeler@venus.org', '238 Mendota Ct.', 'Atlanta', 'GA', '78446', '636-995-4174', 'Education,Cold War,Lincoln,Social Security'),
(25, 'Nelson', 'Anthony', NULL, '2012-06-10', 'nelson.anthony@venus.org', '739 Hayes Rd.', 'Akron', 'OH', '21256', '844-967-6564', 'Lincoln,Roosevelt,Spanish-American War,World War II'),
(26, 'Jones', 'Richard', NULL, '2008-01-27', NULL, '206 Colladay Point Dr.', 'Syracuse', 'NY', '01227', '839-320-5769', 'Roosevelt,Abolition,Social Security'),
(27, 'Moorhead', 'Susan', NULL, '2008-05-31', 'susan.m@venus.org', '462 Raymond Rd.', 'New York', 'NY', '82057', '256-439-4270', 'Revolutionary War,Spanish-American War,World War I,Founding fathers,Gold rush'),
(28, 'Lugaro', 'Ken', NULL, '2011-06-15', 'ken_l@venus.org', '100 W. Gorham', 'Caribou', 'ME', '72410', '312-149-2847', 'Industrial revolution'),
(29, 'Hennessy', 'Jim', NULL, '2009-01-08', NULL, '222 Miami Pass', 'Brattleboro', 'NH', '60633', '665-455-5472', 'Founding fathers'),
(30, 'Pernetti', 'Jeffrey', NULL, '2010-05-24', 'jeffrey_pernetti@saturn.org', '627 Laramie Ct.', 'Montpelier', 'VT', '20537', '603-395-5806', 'Revolutionary War'),
(31, 'Colby', 'Amy', NULL, '2012-03-01', 'colby_a@saturn.org', '275 Big Sky Dr.', 'Pottsville', 'PA', '24191', '983-484-0425', 'World War I,immigration,Vietnam War,Constitution'),
(32, 'Vincent', 'Edward', NULL, NULL, 'v.edward@saturn.org', '960 Brody Dr.', 'Elkins', 'WV', '99473', '631-122-4209', 'Spanish-American War,Founding fathers'),
(33, 'Nemke', 'Joel', NULL, '2010-12-19', 'joel.nemke@uranus.net', '243 Windsor Rd.', 'Greensbora', 'NC', '24400', '801-878-6704', 'Great Depression,Civil War'),
(34, 'Gjertson', 'Herbert', NULL, '2011-01-07', 'herbert_gjertson@mars.net', '279 Clark St.', 'Lake City', 'SC', '59674', '477-095-3642', 'Founding fathers'),
(35, 'Clift', 'Melissa', NULL, '2010-12-02', 'clift.m@uranus.net', '279 Vernon Av.', 'Waycross', 'GA', '38817', '172-030-9435', 'Spanish-American War'),
(36, 'Neumeyer', 'Rick', NULL, '2012-05-01', 'n_rick@uranus.net', '664 Sunrise Tr.', 'Fort Myers', 'FL', '25372', '399-169-0661', 'World War I,Education'),
(37, 'Hughes', 'Max', 'Jr.', '2011-09-16', NULL, '814 Ridge Rd.', 'Huntsville', 'AL', '84310', '374-364-4212', 'Vietnam War,World War II'),
(38, 'Haug', 'Linda', NULL, '2012-01-22', 'linda.haug@pluto.com', '746 White Aspen Rd.', 'Red Bank', 'TN', '22540', '948-014-3619', 'Revolutionary War,Sports,Civil War'),
(39, 'Mitchell', 'Eugene', NULL, '2012-04-08', 'mitchell_e@saturn.org', '38 Rustling Oaks Ln.', 'Hazard', 'KY', '66948', '299-337-0004', 'Presidential politics,World War II,Great Depression,Lincoln,Roosevelt'),
(40, 'Brower', 'Paul', NULL, '2011-10-04', 'paul_brower@saturn.org', '238 Barber Dr.', 'Ocean City', 'MD', '55179', '821-905-7597', 'Armed services,Gold rush,Civil Rights'),
(41, 'Welch', 'Jacob', NULL, NULL, 'welch.jacob@jupiter.com', '512 Madison St.', 'Wilmington', 'NJ', '10507', '913-715-6335', 'Westward movement'),
(42, 'Schenk', 'Cindy', NULL, '2008-03-22', NULL, '542 W. Hudson Rd.', 'Waterbury', 'CT', '98847', '681-415-6637', 'Founding fathers,Education,Great Depression,Armed services'),
(43, 'Brown', 'Gary', NULL, '2011-11-17', 'gary_brown@pluto.com', '342 Marathon Dr.', 'Providence', 'RI', '14536', '612-355-2509', 'Cold War,Founding fathers,Civil Rights'),
(44, 'Williams', 'Darrell', NULL, '2010-03-31', 'w_darrell@uranus.net', '228 E. Johnson St.', 'Springfield', 'MA', '90181', '878-397-4390', 'Spanish-American War,Revolutionary War,Presidential politics,Sports'),
(45, 'Block', 'Christopher', NULL, '2010-07-03', 'christopher_b@mercury.net', '606 Cumberland Ln.', 'Bruneau', 'ID', '58790', '015-680-8696', 'Colonial period,Spanish-American War,Civil Rights,Education,Presidential politics'),
(46, 'Thompson', 'Joan', NULL, '2010-04-26', 'joan_thompson@venus.org', '182 Spaight St.', 'Roy', 'NM', '25129', '798-188-9411', 'Colonial period,Presidential politics,Abolition,Civil War,Roosevelt'),
(47, 'Bookstaff', 'Barbara', NULL, '2009-10-07', 'bookstaff.b@earth.com', '289 Lancashier Ct.', 'Durango', 'CO', '17762', '175-857-5726', 'Civil War,Industrial revolution'),
(48, 'Kirby', 'Timothy', NULL, NULL, NULL, '298 Hollister Av.', 'Kayenta', 'AZ', '82432', '844-673-6051', 'Colonial period,immigration,Civil War'),
(49, 'Simmons', 'David', NULL, '2011-08-31', 'simmons.david@mercury.net', '793 S. Henry St.', 'Trona', 'CA', '35986', '645-327-1588', 'Civil War,Colonial period'),
(50, 'Renko', 'Jan', NULL, '2012-04-27', 'jan_r@earth.com', '296 Dunn Av.', 'Fallon', 'NV', '04507', '344-923-2885', 'Lincoln,Founding fathers,War of 1812'),
(51, 'Godfriaux', 'Harlan', NULL, '2007-12-20', 'godfriaux_harlan@earth.com', '1100 State Rd.', 'Provo', 'UT', '04896', '077-406-7491', 'World War I,Social Security'),
(52, 'Little', 'Margaret', NULL, '2007-10-16', NULL, '8702 Gannon Rd.', 'Worland', 'WY', '46326', '817-461-1949', 'World War I,Civil Rights,Armed services'),
(53, 'Weiss', 'Nicole', NULL, '2010-11-20', 'nicole.w@mars.net', '4488 E. Harmony Dr.', 'Burns', 'OR', '92532', '898-181-7231', 'World War II,Sports,Spanish-American War,World War I,Civil Rights'),
(54, 'Olson', 'Maureen', NULL, '2009-06-07', 'maureen_olson@venus.org', '8388 W. Holt Rd.', 'Moses Lake', 'WA', '32534', '936-060-5258', 'War of 1812,Roosevelt,Great Depression,Education'),
(55, 'Cutrell', 'Michelle', NULL, '2009-02-20', NULL, '1702 Lynne Tr.', 'Crow Agency', 'MT', '26764', '454-457-6125', 'Great Depression,Roosevelt,Korean War,Social Security'),
(56, 'Matthews', 'Bill', 'Sr.', '2010-09-15', 'matthews.b@saturn.org', '9902 Mound St.', 'Fairbanks', 'AK', '54214', '743-150-3797', 'Colonial period,Revolutionary War'),
(57, 'Desmond', 'Clifford', NULL, '2010-06-21', 'clifford.d@mars.net', '4939 Clemons Av.', 'Kalaheo', 'HI', '26295', '776-381-1029', 'Revolutionary War,World War II,Sports'),
(58, 'Karn', 'Simon', NULL, '2011-06-25', 'k.simon@mars.net', '5664 Northridge Ter.', 'Detroit', 'MI', '34483', '712-898-0397', 'Social Security,Armed services'),
(59, 'Puntillo', 'Cheryl', NULL, '2011-12-08', 'puntillo.c@saturn.org', '1270 Kupfer Rd.', 'Los Angeles', 'CA', '66350', '057-300-6645', 'Education,Cold War,Lincoln,Great Depression,Civil War'),
(60, 'Camosy', 'Alan', NULL, '2010-08-23', 'alan.camosy@pluto.com', '15 Kenwood Cir.', 'Dallas', 'TX', '49786', '443-837-6502', 'Colonial period,Armed services'),
(61, 'Fassbinder', 'Valerie', NULL, '2008-07-16', NULL, '5364 Kingston Dr.', 'Chicago', 'IL', '92813', '316-294-6204', 'Social Security'),
(62, 'Mcbride', 'Zachary', NULL, '2010-05-28', 'mcbride.zachary@venus.org', '7849 Martinsville Rd.', 'Philadelphia', 'PA', '44712', '041-786-7072', 'Sports,Founding fathers,Civil Rights,Great Depression'),
(63, 'Artel', 'Mike', NULL, '2011-04-16', 'mike_artel@venus.org', '4264 Lovering Rd.', 'Miami', 'FL', '12777', '075-961-0712', 'Civil Rights,Education,Revolutionary War'),
(64, 'Grum', 'Brenda', NULL, '2012-02-28', 'brenda.g@neptune.org', '8835 School Rd.', 'New Orleans', 'LA', '88929', '119-173-2910', 'Social Security,Korean War,Civil War,Presidential politics,Roosevelt'),
(65, 'Schauer', 'Alma', NULL, '2008-04-25', 'alma_schauer@venus.org', '9625 Topeka Tr.', 'Mobile', 'AL', '87779', '520-883-0715', 'Cold War,Industrial revolution,Gold rush,Colonial period'),
(66, 'Kohn', 'Jane', NULL, '2011-04-03', 'kohn.j@mercury.net', '4961 Pertzborn Dr.', 'Milwaukee', 'WI', '56155', '248-993-0148', 'War of 1812'),
(67, 'Page', 'Sarah', NULL, '2010-02-06', 'p_sarah@saturn.org', '34 Harvest Ln.', 'St. Paul', 'MN', '02590', '520-343-3572', 'Vietnam War,immigration,Industrial revolution'),
(68, 'Popham', 'Robert', NULL, '2010-06-11', NULL, '26 Arizona Cir.', 'Portland', 'OR', '60820', '896-249-4929', 'Westward movement,Constitution,Armed services,Civil Rights,Abolition'),
(69, 'Segovia', 'Brian', NULL, '2012-06-15', 'brian_s@mars.net', '7814 Indian Mound Dr.', 'Seattle', 'WA', '31340', '198-008-3769', 'Constitution,Industrial revolution,Vietnam War,Colonial period,Sports'),
(70, 'Freeman', 'Vincent', NULL, '2009-07-07', 'freeman.vincent@venus.org', '7 Nightingale Ct.', 'Cody', 'WY', '45797', '820-681-3578', 'World War II,Presidential politics'),
(71, 'Vines', 'Toby', NULL, '2008-04-18', 't.vines@pluto.com', '2750 Oakview Dr.', 'Coral Gables', 'FL', '20248', '718-155-2528', 'Abolition,Gold rush,World War II'),
(72, 'Walton', 'Philp', NULL, '2010-10-09', NULL, '8527 Manitowoc Pkwy.', 'Lincoln', 'NE', '68799', '112-725-0105', 'Social Security,Founding fathers'),
(73, 'Abbs', 'Ron', NULL, '2011-10-25', 'ron.abbs@neptune.org', '77 Beech Ct.', 'Harrisburg', 'PA', '61511', '502-098-0216', 'Revolutionary War,Spanish-American War,Colonial period,Gold rush,Lincoln'),
(74, 'Grogan', 'Vladimir', NULL, '2007-10-25', 'vladimir_grogan@earth.com', '3263 Gilbert Rd.', 'Ithaca', 'NY', '99357', '332-511-5038', 'Great Depression,Spanish-American War'),
(75, 'Elgar', 'Clarence', 'Jr.', '2011-03-22', 'clarence.elgar@mercury.net', '4162 Lakewood Blvd.', 'Lewiston', 'ME', '48157', '992-123-4497', 'Sports,Armed services'),
(76, 'Johnson', 'Robin', NULL, '2012-06-08', 'robin_j@neptune.org', '5606 McKenna Blvd.', 'Lynchburg', 'VA', '22514', '518-780-8914', 'Constitution,Civil War,Cold War,immigration,Civil Rights'),
(77, 'Damron', 'Sandra', NULL, '2008-07-05', 's.damron@saturn.org', '5024 Craig Av.', 'Lima', 'OH', '10716', '132-700-4450', 'Sports'),
(78, 'Dahl', 'Andrew', NULL, '2011-12-27', 'andrew.dahl@venus.org', '9658 Lynchburg Tr.', 'Fort Wayne', 'IN', '49606', '169-982-0224', 'War of 1812'),
(79, 'Albright', 'Warren', NULL, NULL, NULL, '3740 Privett Rd.', 'Dodge City', 'KS', '08952', '364-454-4966', 'Social Security,Revolutionary War,Colonial period,Vietnam War'),
(80, 'Beckett', 'Luther', NULL, '2009-06-06', 'luther.b@mars.net', '148 Greenbriar Dr.', 'Sonora', 'TX', '52841', '778-028-6040', 'Spanish-American War'),
(81, 'Brooks', 'Carl', NULL, '2010-09-12', 'brooks_carl@jupiter.com', '8755 Dapin Rd.', 'Sarasota', 'FL', '19735', '514-906-3111', 'War of 1812,Vietnam War,Civil Rights,World War II,Gold rush'),
(82, 'Edwards', 'John', NULL, '2007-09-12', 'john_edwards@venus.org', '2218 Heath Av.', 'Dothan', 'AL', '98158', '442-861-2459', 'Founding fathers,Spanish-American War,Korean War,Vietnam War'),
(83, 'Brophy', 'Vickie', NULL, '2011-07-13', 'vickie_b@uranus.net', '1919 Jay Dr.', 'Alexandria', 'LA', '28794', '596-490-7991', 'War of 1812,Vietnam War,Korean War,Founding fathers'),
(84, 'Aronson', 'Nancy', NULL, '2012-06-16', 'nancy.a@mercury.net', '1254 Stagecoach Tr.', 'Ashland', 'KY', '43979', '414-089-0344', 'War of 1812,Civil War'),
(85, 'Fiorelli', 'Neil', NULL, '2010-11-07', 'fiorelli.neil@mercury.net', '5599 Constitution Dr.', 'Ashland', 'WI', '85083', '379-922-7719', 'Social Security,Spanish-American War,Cold War,World War I'),
(86, 'Robson', 'Chris', NULL, '2007-10-28', 'chris_r@venus.org', '8229 Ravenswood Rd.', 'Chicago', 'IL', '73252', '052-949-4117', 'Korean War,World War I'),
(87, 'Morris', 'Andrea', NULL, '2010-03-23', NULL, '530 W. Wilson St.', 'New York', 'NY', '45606', '158-240-4142', 'World War II'),
(88, 'Pierson', 'Stanley', NULL, NULL, 'pierson.s@jupiter.com', '3810 Northbrook Dr.', 'Los Angeles', 'CA', '51336', '157-304-8749', 'World War I,Sports'),
(89, 'Garner', 'Steve', NULL, '2007-08-03', 'g.steve@pluto.com', '48 Walworth Ct.', 'Denver', 'CO', '96363', '765-848-4515', 'Gold rush'),
(90, 'Stehle', 'Joseph', NULL, '2010-11-13', 's.joseph@venus.org', '3688 N. Franklin St.', 'San Antonio', 'TX', '92419', '217-542-0789', 'Industrial revolution,Lincoln,Gold rush,Civil War'),
(91, 'Downing', 'Fred', NULL, '2011-05-23', 'fred_downing@mercury.net', '54 Klamer Rd.', 'Austin', 'TX', '81042', '601-143-5252', 'Great Depression'),
(92, 'Gladden', 'Jerome', NULL, '2011-06-19', NULL, '62 Gust Rd.', 'Detroit', 'MI', '74586', '083-144-0721', 'Korean War,Cold War,Abolition,Spanish-American War'),
(93, 'Forman', 'Kevin', NULL, '2008-08-25', 'kevin.forman@neptune.org', '60 Drake St.', 'Miami', 'FL', '92344', '259-329-7863', 'Presidential politics'),
(94, 'Harrington', 'James', NULL, '2012-07-19', 'james.harrington@earth.com', '155 Admiral Dr.', 'Atlanta', 'GA', '75541', '677-105-5966', 'Roosevelt,Civil War,Lincoln,Civil Rights,immigration'),
(95, 'Alvis', 'Michael', 'IV', '2009-04-17', 'alvis_michael@mars.net', '176 Sand Hill Rd.', 'Philadelphia', 'PA', '38728', '203-319-3633', 'Education,War of 1812,World War II,Armed services'),
(96, 'Caputo', 'Eileen', NULL, '2009-01-30', 'caputo_e@uranus.net', '151 Westport Rd.', 'Seattle', 'WA', '50175', '781-213-8580', 'World War II,Westward movement'),
(97, 'Harrison', 'Marita', NULL, '2009-11-07', 'marita_harrison@earth.com', '64 Delaware Dr.', 'Portland', 'OR', '57577', '927-099-6116', 'Great Depression,Founding fathers,Gold rush,Korean War'),
(98, 'Smith', 'Laura', NULL, '2011-05-27', 's.laura@neptune.org', '5 Post Rd.', 'San Francisco', 'CA', '75247', '724-664-7207', 'Armed services,immigration,Civil Rights,Great Depression,Vietnam War'),
(99, 'Sprague', 'Earl', NULL, '2009-04-18', NULL, '145 N. Thompson Dr.', 'Oakland', 'CA', '12801', '678-463-3510', 'Lincoln,Korean War,Westward movement'),
(100, 'Worthington', 'Ralph', NULL, '2010-05-01', 'ralph_worthington@jupiter.com', '25 Upman St.', 'Laramie', 'WY', '49984', '126-109-9886', 'Civil Rights,War of 1812,Korean War,Sports,Colonial period'),
(101, 'Corning', 'Sonya', NULL, '2011-09-16', 'sonya.c@jupiter.com', '14 Crown Rd.', 'Lincoln', 'NE', '76293', '835-693-7968', 'Civil War,Sports,Armed services,Spanish-American War,Social Security'),
(102, 'Clark', 'Dale', NULL, '2012-08-23', NULL, '958 Sigmont Blvd.', 'Fort Worth', 'TX', '83720', '365-784-5634', 'Vietnam War,Civil Rights,Roosevelt,Lincoln');

-- --------------------------------------------------------

--
-- 表的结构 `president`
--

CREATE TABLE `president` (
  `last_name` varchar(15) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `suffix` varchar(5) DEFAULT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(2) NOT NULL,
  `birth` date NOT NULL,
  `death` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `president`
--

INSERT INTO `president` (`last_name`, `first_name`, `suffix`, `city`, `state`, `birth`, `death`) VALUES
('Washington', 'George', NULL, 'Wakefield', 'VA', '1732-02-22', '1799-12-14'),
('Adams', 'John', NULL, 'Braintree', 'MA', '1735-10-30', '1826-07-04'),
('Jefferson', 'Thomas', NULL, 'Albemarle County', 'VA', '1743-04-13', '1826-07-04'),
('Madison', 'James', NULL, 'Port Conway', 'VA', '1751-03-16', '1836-06-28'),
('Monroe', 'James', NULL, 'Westmoreland County', 'VA', '1758-04-28', '1831-07-04'),
('Adams', 'John Quincy', NULL, 'Braintree', 'MA', '1767-07-11', '1848-02-23'),
('Jackson', 'Andrew', NULL, 'Waxhaw settlement', 'SC', '1767-03-15', '1845-06-08'),
('Van Buren', 'Martin', NULL, 'Kinderhook', 'NY', '1782-12-05', '1862-07-24'),
('Harrison', 'William H.', NULL, 'Berkeley', 'VA', '1773-02-09', '1841-04-04'),
('Tyler', 'John', NULL, 'Greenway', 'VA', '1790-03-29', '1862-01-18'),
('Polk', 'James K.', NULL, 'Pineville', 'NC', '1795-11-02', '1849-06-15'),
('Taylor', 'Zachary', NULL, 'Orange County', 'VA', '1784-11-24', '1850-07-09'),
('Fillmore', 'Millard', NULL, 'Locke', 'NY', '1800-01-07', '1874-03-08'),
('Pierce', 'Franklin', NULL, 'Hillsboro', 'NH', '1804-11-23', '1869-10-08'),
('Buchanan', 'James', NULL, 'Mercersburg', 'PA', '1791-04-23', '1868-06-01'),
('Lincoln', 'Abraham', NULL, 'Hodgenville', 'KY', '1809-02-12', '1865-04-15'),
('Johnson', 'Andrew', NULL, 'Raleigh', 'NC', '1808-12-29', '1875-07-31'),
('Grant', 'Ulysses S.', NULL, 'Point Pleasant', 'OH', '1822-04-27', '1885-07-23'),
('Hayes', 'Rutherford B.', NULL, 'Delaware', 'OH', '1822-10-04', '1893-01-17'),
('Garfield', 'James A.', NULL, 'Orange', 'OH', '1831-11-19', '1881-09-19'),
('Arthur', 'Chester A.', NULL, 'Fairfield', 'VT', '1829-10-05', '1886-11-18'),
('Cleveland', 'Grover', NULL, 'Caldwell', 'NJ', '1837-03-18', '1908-06-24'),
('Harrison', 'Benjamin', NULL, 'North Bend', 'OH', '1833-08-20', '1901-03-13'),
('McKinley', 'William', NULL, 'Niles', 'OH', '1843-01-29', '1901-09-14'),
('Roosevelt', 'Theodore', NULL, 'New York', 'NY', '1858-10-27', '1919-01-06'),
('Taft', 'William H.', NULL, 'Cincinnati', 'OH', '1857-09-15', '1930-03-08'),
('Wilson', 'Woodrow', NULL, 'Staunton', 'VA', '1856-12-19', '1924-02-03'),
('Harding', 'Warren G.', NULL, 'Blooming Grove', 'OH', '1865-11-02', '1923-08-02'),
('Coolidge', 'Calvin', NULL, 'Plymouth Notch', 'VT', '1872-07-04', '1933-01-05'),
('Hoover', 'Herbert C.', NULL, 'West Branch', 'IA', '1874-08-10', '1964-10-20'),
('Roosevelt', 'Franklin D.', NULL, 'Hyde Park', 'NY', '1882-01-30', '1945-04-12'),
('Truman', 'Harry S', NULL, 'Lamar', 'MO', '1884-05-08', '1972-12-26'),
('Eisenhower', 'Dwight D.', NULL, 'Denison', 'TX', '1890-10-14', '1969-03-28'),
('Kennedy', 'John F.', NULL, 'Brookline', 'MA', '1917-05-29', '1963-11-22'),
('Johnson', 'Lyndon B.', NULL, 'Stonewall', 'TX', '1908-08-27', '1973-01-22'),
('Nixon', 'Richard M.', NULL, 'Yorba Linda', 'CA', '1913-01-09', '1994-04-22'),
('Ford', 'Gerald R.', NULL, 'Omaha', 'NE', '1913-07-14', '2006-12-26'),
('Carter', 'James E.', 'Jr.', 'Plains', 'GA', '1924-10-01', NULL),
('Reagan', 'Ronald W.', NULL, 'Tampico', 'IL', '1911-02-06', '2004-06-05'),
('Bush', 'George H.W.', NULL, 'Milton', 'MA', '1924-06-12', NULL),
('Clinton', 'William J.', NULL, 'Hope', 'AR', '1946-08-19', NULL),
('Bush', 'George W.', NULL, 'New Haven', 'CT', '1946-07-06', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `score`
--

CREATE TABLE `score` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `score`
--

INSERT INTO `score` (`student_id`, `event_id`, `score`) VALUES
(2, 1, 70),
(3, 1, 80),
(4, 1, 90),
(5, 1, 100),
(6, 1, 50),
(7, 1, 40),
(8, 1, 30),
(9, 1, 20),
(1, 2, 20),
(3, 2, 30),
(4, 2, 40),
(5, 2, 50),
(6, 2, 70),
(7, 2, 80),
(8, 2, 90),
(9, 2, 100),
(1, 3, 70),
(2, 3, 80),
(4, 3, 90),
(5, 3, 100),
(6, 3, 50),
(7, 3, 40),
(8, 3, 30),
(9, 3, 20),
(1, 4, 20),
(2, 4, 30),
(3, 4, 40),
(5, 4, 50),
(6, 4, 70),
(7, 4, 80),
(8, 4, 90),
(9, 4, 100),
(1, 5, 70),
(2, 5, 80),
(3, 5, 90),
(4, 5, 100),
(6, 5, 50),
(7, 5, 40),
(8, 5, 30),
(9, 5, 20),
(1, 6, 20),
(2, 6, 30),
(3, 6, 40),
(4, 6, 50),
(5, 6, 70),
(7, 6, 80),
(8, 6, 90),
(9, 6, 100),
(1, 7, 70),
(2, 7, 80),
(3, 7, 90),
(4, 7, 100),
(5, 7, 50),
(6, 7, 40),
(8, 7, 30),
(9, 7, 20),
(1, 8, 60),
(2, 8, 70),
(3, 8, 80),
(4, 8, 90),
(5, 8, 100),
(6, 8, 50),
(7, 8, 40),
(8, 8, 30),
(9, 8, 20),
(1, 9, 20),
(2, 9, 30),
(3, 9, 40),
(4, 9, 50),
(5, 9, 60),
(6, 9, 70),
(7, 9, 80),
(8, 9, 90),
(9, 9, 10),
(1, 10, 60),
(2, 10, 70),
(3, 10, 80),
(4, 10, 90),
(5, 10, 100),
(6, 10, 50),
(7, 10, 40),
(8, 10, 30),
(9, 10, 20),
(1, 11, 20),
(2, 11, 30),
(3, 11, 40),
(4, 11, 50),
(5, 11, 60),
(6, 11, 70),
(7, 11, 80),
(8, 11, 90),
(9, 11, 10),
(1, 12, 60),
(2, 12, 70),
(3, 12, 80),
(4, 12, 90),
(5, 12, 100),
(6, 12, 50),
(7, 12, 40),
(8, 12, 30),
(9, 12, 20),
(1, 13, 20),
(2, 13, 30),
(3, 13, 40),
(4, 13, 50),
(5, 13, 60),
(6, 13, 70),
(7, 13, 80),
(8, 13, 90);

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `name` varchar(20) NOT NULL,
  `sex` enum('F','M') NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`name`, `sex`, `student_id`) VALUES
('张1', 'F', 1),
('李1', 'M', 2),
('王1', 'F', 3),
('张2', 'F', 4),
('李2', 'M', 5),
('王2', 'F', 6),
('张3', 'F', 7),
('李3', 'M', 8),
('王3', 'F', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`student_id`,`event_id`,`date`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `grade_event`
--
ALTER TABLE `grade_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`event_id`,`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `grade_event`
--
ALTER TABLE `grade_event`
  MODIFY `event_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- 使用表AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- 使用表AUTO_INCREMENT `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 限制导出的表
--

--
-- 限制表 `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `absence_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `grade_event` (`event_id`);

--
-- 限制表 `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `grade_event` (`event_id`),
  ADD CONSTRAINT `score_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
