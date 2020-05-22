-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 10, 2015 at 10:44 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `profad`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE IF NOT EXISTS `businesses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `abriviation` varchar(10) NOT NULL,
  `type` varchar(30) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `title`, `abriviation`, `type`, `note`) VALUES
(1, 'Accounting Services', 'AS', 'Accounting', 'We understand that tax issues may be complex and not the most straight forward thing to do, coupled with the dynamic nature of business world and the huge impact on taxation. Tax authorities are constantly changing things around, by implementing strategies to generate more revenue every financial year, yes we know that might be challenging for you and your business. We can assist you with all areas of your corporation tax to make sure you are on time and accurate, How do we do this! We listen, take all required information, prepare the account for taxation purposes and file your returns. We take into consideration your expenses to reduce your tax liability'),
(2, 'Consultancy Services', 'BCS', 'Consultancy ', 'At <b>Profad</b>, We are delighted at the prospect of you considering to have your next Business Consultancy with us . We will endeavor to provide and make available for you all necessary information and materials on our website for your intended service as we continue to update the site as regularly as possible as new information is made available.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(55) NOT NULL,
  `abriviation` varchar(10) NOT NULL,
  `training` varchar(30) NOT NULL,
  `link` varchar(50) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `abriviation`, `training`, `link`, `note`) VALUES
(1, 'Health and Social Care', 'HSC', 'Vocational', 'health-and-social-care', '<p> These qualification is designed to equip learners with the skills and knowledge needed to care for others in a broad range of health or Social Care settings.</p>\r\n\r\n<p> A Diploma in Health and Social Care is flexible as learners can select a pathway that suits their role - for example, working with people with learning disability, people with Dementia or children and young people.</p>\r\n\r\n<p> This is the main qualification required by the Quality Care Commission in England and the Care Councils in Wales and Northern Ireland.</p>\r\n\r\n<p> At <b>Profad Quality Training</b>, We are delighted at the prospect of you considering to have your next training course(s) with us . We will endeavor to provide and make available for you all necessary information and materials on our website for your intended course(s) as we continue to update the site as regularly as possible as new information is made available.</p>'),
(2, 'Security Training', 'ST', 'Vocational', 'security-training', '<p>In order to obtain an SIA licence you will need to show that you are trained to the right level. This applies to front line staff only</p> \r\n\r\n<p>To get one of the qualifications linked to Security Guard licensing you will need to attend and take three training modules and pass three exams. The duration of the training should be 28 hours. The course may be delivered over four days or during weekends and/or evening sessions.</p>\r\n\r\n\r\n<p> At <b>Profad Quality Training</b>, We are delighted at the prospect of you considering to have your next training course(s) with us . We will endeavor to provide and make available for you all necessary information and materials on our website for your intended course(s) as we continue to update the site as regularly as possible as new information is made available.</p>'),
(3, 'Customer Services', 'CS', 'Vocational', 'customer-service', ''),
(4, 'Management and Business Administration', 'MBA', 'Vocational', 'management-and-business-administration', ''),
(5, 'First Aid at Work', 'FAW', 'Vocational', 'first-aid-at-work', ''),
(6, 'Teaching Qualification', 'TQ', 'Vocational', 'teaching-qualification', ''),
(7, 'Assessors and Verification', 'AV', 'Vocational', 'assessors-and-verification', ''),
(8, 'Accounting Training', 'AT', 'Professional', 'accounting-training', ''),
(9, 'Public Sector Training', 'PST', 'Corporate', 'public-sector-training', ''),
(10, 'People and Management Skills', 'PMS', 'Corporate', 'people-and-management-skills', ''),
(11, 'Accounting and Financial Management', 'AFM', 'Corporate', 'accounting-and-financial-management', '');

-- --------------------------------------------------------

--
-- Table structure for table `international`
--

CREATE TABLE IF NOT EXISTS `international` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `note` text NOT NULL,
  `requirement` text NOT NULL,
  `duration` varchar(100) NOT NULL,
  `cost` varchar(50) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `international`
--

INSERT INTO `international` (`id`, `title`, `note`, `requirement`, `duration`, `cost`, `active`) VALUES
(1, 'International Students', '<p>Learners can obtain a visa, valid for 6 months, when they successfully apply for any of these courses from outside the EU.<p/> ', '<p> Learners are required to have enough money for their upkeep and accommodation that can cover their entire course duration.</p>', '6 months', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `headline` text NOT NULL,
  `date` date NOT NULL,
  `deleted` tinyint(1) NOT NULL,
  `news` text NOT NULL,
  `author` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `headline`, `date`, `deleted`, `news`, `author`) VALUES
(1, 'Business Loans', 'sunt in culpa qui officia deserunt mollit anim id est laborum.', '2015-02-25', 0, 'sunt in culpa qui officia deserunt mollit anim id est laborum.sunt in culpa qui officia deserunt mollit anim id est laborum.sunt in culpa qui officia deserunt mollit anim id est laborum.sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Michael'),
(2, 'Free Health Course', 'sunt in culpa qui officia deserunt mollit anim id est laborum', '2015-02-25', 0, 'sunt in culpa qui officia deserunt mollit anim id est laborum.sunt in culpa qui officia deserunt mollit anim id est laborum.sunt in culpa qui officia deserunt mollit anim id est laborum.sunt in culpa qui officia deserunt mollit anim id est laborum.sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Michael'),
(3, 'A Looking Profad', 'Profad will soon be launching it''s new look website to the world', '2015-03-06', 0, 'Profad will soon be launching it new look website to the world, We have made lots of changes to the design and available contents. Please try it out....<a href="#">New Look Profad</a>', 'Michael'),
(4, 'GCSC', 'New to profad training <b>GCSE Math''s and English</b> Training.', '2015-03-06', 0, 'Propective GCSE student''s can now have their training with profad, starting from the 30-03-2015. We encourage interested applicants to contact our Training team for support.\r\n\r\nThanks.\r\n\r\nProfad.com', 'Michael');

-- --------------------------------------------------------

--
-- Table structure for table `profad_settings`
--

CREATE TABLE IF NOT EXISTS `profad_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page` varchar(50) NOT NULL,
  `title` varchar(150) NOT NULL,
  `image` varchar(30) NOT NULL,
  `heading` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `profad_settings`
--

INSERT INTO `profad_settings` (`id`, `page`, `title`, `image`, `heading`, `note`, `active`) VALUES
(1, 'home', 'Profad | Training &amp; Services', '', 'Welcome To Profad', '<p>Profad is a registered leading provider of quality Training and Services.\r\n						Currently offering Vocational, Professional, and Corporate Training.\r\n						We also provide Accounting and Consultancy Services for Individuals and \r\n						Organizations both Public and Private such as Payroll Management, \r\n						Corporate Tax, Personal Tax and more. </p>\r\n					  <p>Our Vocational courses are Diploma in Health and Social Care, First \r\n					  	aid at work, Teacher Training. Our Professional course are Manual Preparation\r\n					  	of Accounts, Spreadsheet (Excel), Computerized Accounting (Sage) and more. Providing\r\n					  	our Students with the qualification and experience they need to work in these area.</p>\r\n					  <p>We provide specialist services in Business Consultancy, in relation to Company Formation \r\n					  	Registration, Advice on Tax Credits, Tax Refund Assistance, Charity Registration and more.</p>\r\n					  <p>Profad''s mission will always be to provide the best quality training and Services to our customers.</p>\r\n\r\n<h2>Company History</h2>\r\n				        <p>Profad Ltd, trading as <span style="color:red;">Profad Quality Training</span>, was established \r\n				        	in the UK as a private limited liability company in May 2008. It was established to provide Training, Accounting \r\n				        	Services, Management consultancy and other Services.</p>\r\n				        <p>The company came to existence in 2008 amid a time of global depression and economic meltdown, and since then, it \r\n				        	has provided first class services and trained thousands across the globe.</p>\r\n								<h2>Accreditation</h2>\r\n								<p>Profad Quality Training is accredited by the British Accreditation Council (BAC) \r\n									as a short course provider, this accreditation covers courses delivered in UK only.</p>\r\n									', 1),
(2, 'vocational training', 'Vocational Training | Health &amp; Social Care, Security, Customer Service, First Aid at Work &amp; more | Profad', 'vocational', 'Vocational Training with Qualifications', '<h2>Introduction </h2>\r\n<p>These are Work based Qualification, designed to equip learners with Vocational skills and knowledge needed to carry out various tasks, Ranging from Health and Social Care, First Aid at Work, Security, Teaching, Customer Service and more.  </p>\r\n\r\n<p>A Diploma qualification in any of these is an essential requirement for any individual looking to carry out these task in England, Wales and Northern Ireland.</p>\r\n\r\n<p>These are the recognized qualifications for Health and Social Care workers, First Aid workers, Teaching Assistants, Teachers, Customer Service and many more. </p>\r\n\r\n<p> At <b>Profad Quality Training</b>, We are delighted at the prospect of you considering to have your next training course(s) with us . We will endeavor to provide and make available for you all necessary information and materials on our website for your intended course(s) as we continue to update the site as regularly as possible as new information is made available.</p>\r\n\r\n<h2>International Applicants</h2>\r\n<p>Applicants outside the European Union can obtain a 6 months visa in other to study these courses in the  UK.</p>\r\n\r\n<p><h3>Accommodation &amp; Welfare</h3>International Applicants must have and be in a position to show reasonable amount to cover their Accommodation and Welfare needs before arriving in the UK.<p>', 1),
(3, 'professional training', 'Professional Training | Accounting Training | Profad', 'professional', 'Accounting Training and more', '<h2>Introduction</h2>\r\n<p>These Courses are designed to Professionals and Aspiring Professionals in Accounting. The courses ranges from Manual Preparation of Accounts, Spreadsheet, Computerized Accounting, Payroll Management and Consultancy, Auditing and many more.</p>\r\n\r\n<p>At <b>Profad Quality Training</b>, We are delighted at the prospect of you considering to have your next training course(s) with us . We will endeavor to provide and make available for you all necessary information and materials on our website for your intended course(s) as we continue to update the site as regularly as possible as new information is made available. </p>\r\n\r\n\r\n<h2>International Applicants</h2>\r\n<p>Applicants outside the European Union can obtain a 6 months visa in other to study these courses in the  UK.</p>\r\n\r\n<p><h3>Accommodation &amp; Welfare</h3>International Applicants must have and be in a position to show reasonable amount to cover their Accommodation and Welfare needs before arriving in the UK.<p>', 1),
(4, 'corporate training', 'Corporate Training | Public Sector, Private Sector | Profad', 'corporate', 'Public and Private Sector Training', '<h2>Introduction</h2>\r\n<p>These courses are designed for the professional individual, that works or aspire to work in a corporate environment.</p>\r\n<p> Our corporate courses will equip Learners with the skills and knowledge required to perform various tasks as a corporate professional in Public or Private sector environment. With courses ranging from Industrial Relations, Accounting, Treasury Management, Personnel Management, Project Risk Management, Disaster Recovery Planning and many more. </p>\r\n\r\n<p> At <b>Profad Quality Training</b>, We are delighted at the prospect of you considering to have your next training course(s) with us . We will endeavor to provide and make available for you all necessary information and materials on our website for your intended course(s) as we continue to update the site as regularly as possible as new information is made available.</p> \r\n\r\n\r\n<h2>International Applicants</h2>\r\n<p>Applicants outside the European Union can obtain a 6 months visa in other to study these courses in the  UK.</p>\r\n\r\n<p><h3>Accommodation &amp; Welfare</h3>International Applicants must have and be in a position to show reasonable amount to cover their Accommodation and Welfare needs before arriving in the UK.<p>', 1),
(5, 'business services', 'Business Sevices | Accounting Services, Consultancy Services &amp; more | Profad', 'services', 'Accounting and Consultancy Services', '<h2>Introduction</h2>									<p><b>Profad</b> provide services for Business, individual and Corporate Entities, Both in Public and\r\n										Private Sector. We are glad you have looked to us today for your business or personal Accounting \r\n										or Consultancy need.</p>\r\n										\r\n									<p>We have an outstanding Accounting team, ready to deal with any Accounting issue you may have and \r\n										our Accounting Services are tailor made for you or your Business. These services include Personal Tax, Tax Return, \r\n										Corporate Tax, Book keeping, Value After Tax (VAT) and more.</p>\r\n										\r\n									<p>Our Consltance are trained specialist with years of experience in various aspect of consultancy and we\r\n										deal with issues ranging from COMPANY FORMATION REGISTRATION, COMPANY DISSOLUTION, TAX and more. </p>\r\n									<span class=''note''>\r\n										<p>Please choose your required service from our services list to the left of your screen.</p>\r\n									</span>\r\n									<p>We look forward to finding you a better solution...</p>', 1),
(6, 'about profad', 'About Profad | Company History, Our Philosophy, Quality, Mission Statement &amp; more | Profad', 'about', 'About Profad Training and Services', '        				<p>At Profad Quality Training, We are delighted at the prospect of you considering to have your next training \r\n        					course(s) with us . We will endeavour to provide and make available for you all necessary information and \r\n        					materials on our website for your intended course(s) as we continue to update the site as regularly as \r\n        					possible as new information is made available.</p>\r\n      					<p>The information available will at any point give you a very good idea of what courses we''re running presently \r\n      						and the benefit of having your training courses with us. We pride ourselves in the quality of our services \r\n      						as we strive to equip our trainees with the most up to date information and techniques that will not only \r\n      						benefit you, but the knowledge gained will forever add value to you.</p>\r\n        				<p>Our trainers are professionals who have excelled in all their careers and have the gamut of experience to impart \r\n        					on all course participants.</p>\r\n        \r\n\r\n				        <h3><a name="Company"></a>Company History</h3>\r\n				        <p>Profad Ltd, trading as <span style="color:red;">Profad Quality Training</span>, was established \r\n				        	in the UK as a private limited liability company in May 2008. It was established to provide Training, Accounting \r\n				        	Services, Management consultancy and other Services.</p>\r\n				        <p>The company came to existence in 2008 amid a time of global depression and economic meltdown, and since then, it \r\n				        	has provided first class services and trained thousands across the globe.\r\n				        	\r\n				        <h3><a name="OurPhilosophy"></a>Our Philosophy</h3>\r\n				        <p>The fundamental belief that human assets are very important to the survival of any business, underlines the company''s \r\n				        	operation. Our programmes are designed and developed to provide essential skills that are vital for personal &amp; \r\n				        	business survival and growth.</p>\r\n				        <p>Our trainings enhance continuous development of the human assets in other to align their individual objectives to \r\n				        	the corporate objectives through the realization of continuous personal and professional development.</p>\r\n				        <p>We plan our training to support, update an existing knowledge and to impact new skills and ideas through the \r\n				        	creation of skills that are conversely transferable in other to meet the challenges of the 21st century.</p>\r\n				        \r\n				        <h3><a name="Quality"></a>Quality</h3>\r\n				        <p>As our name implies, Profad does not compromise its quality and standards. We pride ourselves in values as we \r\n				        	invest heavily on staff and resources as a mean of achieving and maintaining high standards.</p>\r\n				        <p>We are committed to making use of best available resource persons and up to date technology to realise our \r\n				        	visions.</p>\r\n				        <p>Our strategy of continuous improvement in the quality of our resources persons has contributed to the level \r\n				        	of standard maintain at all time.</p>\r\n				        	\r\n				        <h3><a name="Delivery"></a>Delivery</h3>\r\n				        <p>Our programmes are designed and tailored to suite the specific needs of each learner. Where applicable, we \r\n				        	conduct initial assessment to help us know the Gap between the learner and the proposed course and the \r\n				        	information is then used to create the individual learning plan.</p>\r\n				        	\r\n        				<h3><a name="Mission"></a>Mission Statement</h3>\r\n        				<p>To develop people with skills that will continue to make them indispensable in their lifetime, through quality \r\n        					training delivered by highly motivated and experienced resource persons supported by the state of earth \r\n        					technology.</p>\r\n        				\r\n        				<h3><a name="Courses"></a>Courses</h3>\r\n        				<p>Our courses are designed for local and international clients, bringing together people from different countries \r\n        					under the same roof to impact knowledge and also make international comparism of ideas practicable which also \r\n        					creates ample opportunities for networking.</p>\r\n        \r\n        				<h3><a name="Fees"></a>Fees</h3>\r\n        				<p>Our fees are highly competitive and value for money.</p>', 1),
(7, 'portal', 'Portal Login | Profad', '', 'Portal Login', '', 1),
(8, 'register', 'Portal Registration | Profad', '', 'Portal Registration', '', 1),
(9, 'contact us', 'Contac us | Profad', '', 'Contact Profad', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(55) NOT NULL,
  `department_id` int(10) NOT NULL,
  `business` varchar(30) NOT NULL,
  `cost` varchar(10) NOT NULL,
  `note` text NOT NULL,
  `link` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `department_id`, `business`, `cost`, `note`, `link`) VALUES
(1, 'Corporation Tax (CT)', 1, 'Accounting Services', '', '<p>We will handle all aspects of your returns from Companies house to the tax Authority. We will advise you on the relevant records to keep, for how long to keep it and work with you to set up your record keeping. We will file your Tax returns to the relevant authority and advise you of any tax liability due to <b>HMRC</b>.<p>', 'corporation-tax'),
(2, 'Personal Tax (PAYE)', 1, 'Accounting Services', '', '<p>We also handle your company personal Taxes (PAYE) to free up more time to be invested in your business. We also ensure that your returns are filed to theTax authority on time. We also advise on how to maximise your Tax allowance /Relief that will reduce your tax liability</p>', 'personal-tax'),
(3, 'Tax Returns (TR)', 1, 'Accounting Services', '', '<p>We have a team of dedicated individuals who are not only focused but highly informed and up-to-date on changes to tax system to make sure that your taxes are not overstated. We prepare and file your tax, keep you informed and maximized your allowances and credit to reduce your tax liability. </p>', 'tax-returns'),
(4, 'Payroll (Management & Consultant)', 1, 'Accounting Services', '', '<p>Our payroll expert team are dedicated in providing, better and more value for money payroll administration, they ensures payroll taxes are been properly calculated and deducted from employee and also guide against accounting and payroll error. We also help in remitting all deductions to the revenue and adhere to employment laws in all areas</p>', 'payroll'),
(5, 'Book Keeping', 1, 'Accounting Services', '', '<p>In Profad we help business in handling all their financial transactions, including accounts receivable and payable, we also produce a full set an account in accordance with regulation to ensure you do not miss out any transaction.</p> ', 'book-keeping'),
(6, 'Value After Tax (VAT)', 1, 'Accounting Services', '', '<p>We also help in managing VAT both on inputs, output, registration and assist in solving VAT problems. We do all form of filing including EC statutory filing. </p>', 'value-after-tax'),
(7, 'Charity Account', 1, 'Accounting Services', '', '<p>We prepare your Charity account in line with the SORP, file with the company house, where applicable and with Charity commission and tick all the boxes as required by law. We also help you to claim for your gift aids and submit gift aid spread sheet to the charity commission. </p>', 'charity-account'),
(8, 'Company Formation Registration', 2, 'Consultancy Services', '', '<p>Thinking of setting up your own business! Please talk to us, we advice on all legal requirements, help you do all the necessary formation processes, registration with appropriate authorities and do all the necessary paper work . All you need to do is start running and growing your business </p>', 'company-formation-registration'),
(9, 'Company Dissolution', 2, 'Consultancy Services', '', '<p>You formed a company, and it didn''t work or it’s fulfilled its purpose or its surplus to requirement and thinking of dissolving it. It is very important that you close it down properly and dissolve it. Depending on the circumstances of your company, our experts will help you do the striking off without wasting time. </p>', 'company-dissolution'),
(10, 'Advice On Tax Credits', 2, 'Consultancy Services', '', '<p>We offer quality advice on your entitlements to Tax credit and Relieves. Come and pick the brains of our very successful accountants, and they will leave no stone on turned. At <b>Profad</b>, we are committed to providing excellent advice in the following areas\r\n<ul class=''L''>\r\n<li>\r\nBenefit and Tax for working individual\r\n</li>\r\n<li>\r\nExtra money for people in work\r\n</li>\r\n<li>\r\nWorking out how many hours you can work\r\n</li>\r\n<li>\r\nIf you are working less than 16 hours\r\n</li>\r\n<li>\r\nIf you are working 16 hours or more\r\n</li>\r\n</ul></p>', 'advice-on-tax-credits'),
(11, 'Tax Refund Assistance', 2, 'Consultancy Services', '', '<p>Thinking you may have overpaid tax due to your circumstances, or have paid emergency Tax at some point in the financial year, or you are a student or have become unemployed, stopped working, left the country or work overseas you may be due some Tax refund, Please stop at <b>Profad</b> and talk to us. We will sort you out. The money is better in your pocket! </p>', 'tax-refund-assistance'),
(12, 'Financial Management Consulting', 2, 'Consultancy Services', '', '<p>At Profad we are able to help you and your growing company with the following\r\n<ul class=''L''>\r\n<li>\r\nFinancial Forecasting\r\n</li>\r\n<li>\r\nBusiness Planning and Consultancy\r\n</li>\r\n<li>\r\nPlanning and critically reviewing existing plans\r\n</li>\r\n<li>\r\nFinancial control and system management and business plan management.\r\n</li>\r\n</ul></p>', 'financial-management-consulting'),
(13, 'Money Transfers', 2, 'Consultancy Services', '', '<p>With very little commission you can send money to your loved ones in Africa and in Europe.</p>', 'money-transfers'),
(14, 'Help with Business Loans', 2, 'Consultancy Services', '', '<p>Are you looking to starting your own business and in need of a “start-up loan”? At <b>Profad</b> we will help with the total package from start to finish and monitors the loan providers until the loan is lodged into your account. </p>', 'help-with-business-loans'),
(15, 'Charity Registration', 2, 'Consultancy Services', '', '<p>We also help to register your charity with all necessary bodies and ticking all required boxes. </p>', 'charity-registration'),
(16, 'Help with Gift Aid Registration, Claims and Repayment', 2, 'Consultancy Services', '', '<p>Do your have a charity company that receive gift-Aids you may be due more from the government, lets help you do all the administrative work and see more money roll into your account. </p>', 'help-with-gift-aid-registration');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `course` varchar(50) NOT NULL,
  `training` varchar(100) NOT NULL,
  `duration` varchar(20) NOT NULL,
  `cost` varchar(10) NOT NULL,
  `note` text NOT NULL,
  `location` varchar(30) NOT NULL,
  `link` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `title`, `course`, `training`, `duration`, `cost`, `note`, `location`, `link`) VALUES
(1, 'Level 2 Diploma in Health and Social Care', 'Health and Social Care', 'vocational training', '6-12 Month', '£1,100.00', '', 'London', 'level-2-diploma'),
(2, 'Level 3 Diploma in Health and Social Care', 'Health and Social Care', 'vocational training', '6-12 Month', '£1,350.00', '', 'London', 'level-3-diploma'),
(3, 'Level 5 Ledership And Management', 'Health and Social Care', 'vocational training', '12-18 Months', '£2,500.00', '', 'London', 'level-5-ledership-and-management'),
(4, 'CCTV Operation', 'Security Training', 'vocational training', '5 Days', '£250.00', '', 'London', 'cctv-operation'),
(5, 'Door Supervision', 'Security Training', 'vocational training', '5 Days', '£250.00', '', 'London', 'door-supervision'),
(6, 'Security Guarding', 'Security Training', 'vocational training', '5 Days', '£250.00', '', 'London', 'security-guarding'),
(7, 'Construction Skill Certification Scheme (CSCS)', 'Security Training', 'vocational training', '2 Days', '£280.00', 'This is inclusive with Badge', 'London', 'construction-skill-certification-scheme'),
(8, 'Upskill', 'Security Training', 'vocational training', '1.5 Days', '£120.00', '', 'London', 'upskill'),
(9, 'Close Protection', 'Security Training', 'vocational training', '15 Days', '£1,450.00', 'Full Days (9am - 7pm)', 'London', 'close-protection'),
(10, 'Level 2 Award in Customer Service', 'Customer Services', 'vocational training', '3-9 Months', '£950.00', 'Level 1 £450.00', 'London', 'level-2-award-in-customer-service'),
(11, 'Level 3 Award in Customer Service', 'Customer Services', 'vocational training', '6-12 Months', '£1,100.00', '', 'London', 'level-3-award-in-customer-service'),
(12, 'Level 2 Diploma in Management and Business', 'Management and Business Administration', 'vocational training', '3-9 Months', '£950.00', '', 'London', 'level-2-diploma-in-management-and-business'),
(13, 'Level 3 Diploma in Management and Business', 'Management and Business Administration', 'vocational training', '6-12 Months', '£1,200.00', '', 'London', 'level-3-diploma-in-management-and-business'),
(14, 'Emergency First Aid at Work (EFAW)', 'First Aid at Work', 'vocational training', '1 Day', '£75.00', '', 'London', 'emergency-first-aid-at-work'),
(15, 'Moving and Handling', 'First Aid at Work', 'vocational training', '1 Day', '£75.00', '', 'London', 'moving-and-handling'),
(16, 'Infection Control', 'First Aid at Work', 'vocational training', '1.5 Hours', '£50.00', '', 'London', 'infection-control'),
(17, 'Food Hygiene', 'First Aid at Work', 'vocational training', '1-3 Days', '', '£75.00 - £450.00', 'London', 'food-hygiene'),
(18, 'Safe Medication', 'First Aid at Work', 'vocational training', '3.5 Hours', '£2,000.00', '/Delegate', 'London', 'safe-medication'),
(19, 'Health and Safety', 'First Aid at Work', 'vocational training', '1-2 Days', '£125.00', '', 'London', 'health-and-safety'),
(20, 'Level 3 PTTLS', 'Teaching Qualification', 'vocational training', '5 Days', '£450.00', 'Intensive training', 'London', 'level-3-ptlls'),
(21, 'Level 4 PTLLS', 'Teaching Qualification', 'vocational training', '5 Days', '£450.00', 'Intensive training', 'London', 'level-4-ptlls'),
(22, 'Level 4 CTLLS', 'Teaching Qualification', 'vocational training', '3 Months', '£950.00', '', 'London', 'level-4-ctlls'),
(23, 'Level 5 DTLLS', 'Teaching Qualification', 'vocational training', '23 Months', '£2,500.00', '', 'London', 'level-5-dtlls'),
(24, 'Assessor (A1)', 'Assessors and Verification', 'vocational training', '3-6 Months', '£750.00', '', 'London', 'assessor'),
(25, 'Internal Verification (1V / V1)', 'Assessors and Verification', 'vocational training', '6-9 Months', '£950.00', '', 'London', 'internal-verification'),
(26, 'Manual Preparation of Accounts', 'Accounting Training', 'professional training', '4 Days', '', 'Practical training, Individual £400.00, Company £450 plus(VAT).', 'London', 'manual-preparation-of-accounts'),
(27, 'Spreadsheet (Excel)', 'Accounting Training', 'professional training', '4 Days', '', 'Practical training, Individual £400.00, Company £450 plus(VAT).', 'London', 'spreadsheet'),
(28, 'Computerized Accounting (Sage) ', 'Accounting Training', 'professional training', '4 Days', '', 'Practical training, Individual £400.00, Company £450 plus(VAT).', 'London', 'computerized-accounting'),
(29, 'Payroll Management and Consultancy', 'Accounting Training', 'professional training', '4 Days', '', 'Practical training, Individual £400.00, Company £450 plus(VAT).', 'London', 'payroll-management-and-consultancy'),
(30, 'Auditing', 'Accounting Training', 'professional training', '4 Days', '', 'Practical training, Individual £400.00, Company £450 plus(VAT).', 'London', 'auditing'),
(31, 'Budgeting', 'Accounting Training', 'professional training', '4 Days', '', 'Practical training, Individual £400.00, Company £450 plus(VAT).', 'London', 'budgeting'),
(32, 'Self Assessment', 'Accounting Training', 'professional training', '4 Days', '', 'Practical training, Individual £400.00, Company £450 plus(VAT).', 'London', 'self-assessment'),
(33, 'Incomplete Records', 'Accounting Training', 'professional training', '4 Days', '', 'Practical training, Individual £400.00, Company £450 plus(VAT).', 'London', 'incomplete-records'),
(34, 'Charity Account', 'Accounting Training', 'professional training', '4 Days', '', 'Practical training, Individual £400.00, Company £450 plus(VAT).', 'London', 'charity-account'),
(35, 'Industrial Relation and Labour Matters (IRLM)', 'Public Sector Training', 'corporate training', '3-4 Days', '£2,000.00', '/Delegate', 'London', 'industrial-relation-and-labour-matters'),
(36, 'Industrial Relations and Collective Bargaining (IRCB)', 'Public Sector Training', 'corporate training', '3 Days', '£2,000.00', '/Delegate', 'London', 'industrial-relation-and-collective-bargaining'),
(37, 'Accounting / Treasury Managements (ATM)', 'Public Sector Training', 'corporate training', '4 Days', '2,000.00', '/Delegate', 'London', 'accounting-or-treasury-managements'),
(38, 'Treasury Management in Civil Service (TMCS)', 'Public Sector Training', 'corporate training', '4 Days', '2,000.00', '/Delegate', 'London', 'treasury-management-in-civil-service'),
(39, 'HR / Personnel Management (HRM)', 'Public Sector Training', 'corporate training', '4-5 Days', '£2,000.00', '/Delegate', 'London', 'hr-or-personnel-management'),
(40, 'General Accounting Workshops (GAW)', 'Public Sector Training', 'corporate training', '4 Days', '£2,000.00', '/Delegate', 'London', 'general-accounting-workshops'),
(41, 'Essential Skills for Managers (ESM)', 'People and Management Skills', 'corporate training', '4-5 Days', '£2,500,00', '/Delegate', 'London', 'essential-skills-for-managers'),
(42, 'Business Management Training (BMT)', 'People and Management Skills', 'corporate training', '3-4 Days', '£2,000.00', '/Delegate', 'London', 'business-management-trianing'),
(43, 'Project Risk Management (PRM)', 'People and Management Skills', 'corporate training', '4-5 Days', '£2,500.00', '/Delegate', 'London', 'project-risk-management'),
(44, 'Disaster Recovery Planning (DRP)', 'People and Management Skills', 'corporate training', '3-4 Days', '£2,000.00', '/Delegate', 'London', 'disaster-recovery-planning'),
(45, 'Creating Effective Reports (CER)', 'People and Management Skills', 'corporate training', '3-4 Days', '£2,000.00', '/Delegate', 'London', 'creating-effective-reports'),
(46, 'Rapid Conflict Response (RCP)', 'People and Management Skills', 'corporate training', '3-4 Days', '£2,000.00', '/Delegate', 'London', 'rapid-conflict-response'),
(47, 'Inter-Personal Assertiveness Training for Managers (IATM)', 'People and Management Skills', 'corporate training', '3-4 Days', '£2,000.00', '/Delegate', 'London', 'inter-personal-assertiveness-training-for-managers'),
(48, 'Accounting and Finance for Non Financial Managers (FNF)', 'Accounting and Financial Management', 'corporate training', '3-4 Days', '£2,000.00', '/Delegate', 'London', 'accounting-and-finance-for-non-financial-managers'),
(49, 'Value Added Tax and Its Accounting Process (VAT)', 'Accounting and Financial Management', 'corporate training', '3-4 Days', '£2,000.00', '/Delegate', 'London', 'value-added-tax-and-its-accounting-process'),
(50, 'Making Effective Budgeting (MEB)', 'Accounting and Financial Management', 'corporate training', '4-5 Days', '£2,500.00', '/Delegate', 'London', 'making-effective-budgeting'),
(51, 'Cash Flow and Liquidity Management (CFM)', 'Accounting and Financial Management', 'corporate training', '3-4 Days', '£2,000.00', '/Delegate', 'London', 'cash-flow-and-liquidity-Management'),
(52, 'Working Capital Management (WCM)', 'Accounting and Financial Management', 'corporate training', '3-4 Days', '£2,000.00', '/Delegate', 'London', 'working-capital-Management'),
(53, 'Corporate Social Responsibility (CSR)', 'Accounting and Financial Management', 'corporate training', '3-4 Days', '£2,000.00', '/Delegate', 'London', 'corporate-social-responsibility'),
(54, 'Investments / Project Appraisal (IPA)', 'Accounting and Financial Management', 'corporate training', '4-5 Days', '£2,000.00', '/Delegate', 'London', 'investments-or-projects-appraisal');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE IF NOT EXISTS `training` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `abriviation` varchar(10) NOT NULL,
  `type` varchar(50) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `title`, `abriviation`, `type`, `note`) VALUES
(1, 'Vocational', 'QCF', 'Qualification', 'At <b>Profad</b> Quality Training, We are delighted at the prospect of you considering to have your next training course(s) with us . We will endeavor to provide and make available for you all necessary information and materials on our website for your intended course(s) as we continue to update the site as regularly as possible as new information is made available.'),
(2, 'Professional', 'PQ', 'Training', 'At <b>Profad</b> Quality Training, We are delighted at the prospect of you considering to have your next training course(s) with us . We will endeavour to provide and make available for you all necessary information and materials on our website for your intended course(s) as we continue to update the site as regularly as possible as new information is made available'),
(3, 'Public Sector', 'PSQ', 'Training', 'At <b>Profad</b> Quality Training, We are delighted at the prospect of you considering to have your next training course(s) with us . We will endeavor to provide and make available for you all necessary information and materials on our website for your intended course(s) as we continue to update the site as regularly as possible as new information is made available.'),
(4, 'Private Sector', 'PSQ', 'Training', 'At <b>Profad</b> Quality Training, We are delighted at the prospect of you considering to have your next training course(s) with us . We will endeavor to provide and make available for you all necessary information and materials on our website for your intended course(s) as we continue to update the site as regularly as possible as new information is made available.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
