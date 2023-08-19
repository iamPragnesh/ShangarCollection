-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 10:52 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shangar_collection`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `about_id` int(5) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`about_id`, `data`) VALUES
(10, '<p>SHANGAR COLLECTION has established itself as one of the leading brand in women ethnic wear available online. With strong presence at all major retailers, Shangar Collection has become the first choice of customers looking for Indian Ethnic Wear. With Shangarcollection.com, We aim to reach our customers worldwide providing the latest and the best of Sarees, Salwar Kameez, Lehengas and more.</p>\r\n\r\n<p>About Customization : Customization is our forte. You can relish the best hand craftsmanship with styles and designs you desire. &quot;TAILOR-MADE&quot;is our service provided to our fashion conscious divas for Blouse neck, Sleeves Designs ,Cuts &amp; Styles.</p>\r\n\r\n<p>About Customer Relationship: We Endeavor to build our customer relationship by giving more of what they want.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(11, '<p>- Low Prices</p>\r\n\r\n<p>- Vast Selection</p>\r\n\r\n<p>- Fast and Reliable Delivery</p>\r\n\r\n<p>- Trusted and Convenient Experience</p>\r\n\r\n<p>- We Provide a World Class E-Commerce Platform.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_login`
--

CREATE TABLE `tbl_admin_login` (
  `admin_id` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `profile_pic` varchar(150) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin_login`
--

INSERT INTO `tbl_admin_login` (`admin_id`, `email`, `password`, `profile_pic`, `last_login`) VALUES
(1, 'shangarcollection@gmail.com', '8f36536c453e2c9495105d2acb2c5bbcbd68082c66f38f6c14fbe6c4ca8adb59431989f960b4e6defc52997becf12d965ce5f22f7593c51c6c5e3408b83c4635KwAaHfO7mCrK6yRp9rxs2ima7EjPBbrSdIkKGFZUa3A=', 'admin_assets/img/e29d767fa59324897931190281523d58.jpg', '2022-04-16 10:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `banner_id` int(5) NOT NULL,
  `title` varchar(500) NOT NULL,
  `subtitle` varchar(500) NOT NULL,
  `path` varchar(150) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`banner_id`, `title`, `subtitle`, `path`, `status`) VALUES
(2, '', '', 'assets/banner/914049beb79ff4c89213f15bc3fadfd0.jpg', 1),
(3, '', '', 'assets/banner/5e9d70f525e89f85a9c58941a68c9b00.jpg', 1),
(4, 'Exclusives', 'Finely designed, one of a kind merchandise', 'assets/banner/d48f686e969a2617f53f1dda569dd368.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bill`
--

CREATE TABLE `tbl_bill` (
  `bill_id` int(5) NOT NULL,
  `register_id` int(5) NOT NULL,
  `shipment_id` int(5) NOT NULL,
  `promocode_id` int(5) NOT NULL,
  `bill_date` date NOT NULL,
  `amount` int(5) NOT NULL,
  `pay_type` varchar(20) NOT NULL,
  `payment_id` varchar(200) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bill`
--

INSERT INTO `tbl_bill` (`bill_id`, `register_id`, `shipment_id`, `promocode_id`, `bill_date`, `amount`, `pay_type`, `payment_id`, `order_id`, `status`) VALUES
(1, 1, 1, 0, '2022-04-15', 19000, 'cod', '', 'Sha_2022-04-151650006274', 1),
(2, 1, 2, 0, '2022-04-15', 8000, 'online', 'pay_JJXpLKag5F9Ikv', 'Sha_2022-04-151650006613', 1),
(3, 2, 3, 4, '2022-04-15', 20500, 'online', 'pay_JJZxozKAyo4ZRK', 'Sha_2022-04-151650014144', 1),
(4, 2, 3, 4, '2022-04-15', 12000, 'online', 'pay_JJZzt5bpu2iFCi', 'Sha_2022-04-151650014265', 1),
(5, 1, 1, 3, '2022-04-15', 12000, 'online', 'pay_JJhpac9GrM9sH8', 'Sha_2022-04-151650041848', 1),
(6, 5, 6, 3, '2022-04-16', 9000, 'online', 'pay_JJvNQZJMDhFYXP', 'Sha_2022-04-161650089552', 1),
(7, 3, 4, 4, '2022-04-16', 14150, 'online', 'pay_JJvXiM2OcRKAck', 'Sha_2022-04-161650090142', 1),
(8, 5, 6, 4, '2022-04-16', 21800, 'cod', '', 'Sha_2022-04-161650090274', 2),
(9, 6, 7, 4, '2022-04-16', 32775, 'online', 'pay_JJxMyhZPm3REoC', 'Sha_2022-04-161650096578', 1),
(10, 2, 3, 6, '2022-04-16', 4500, 'cod', '', 'Sha_2022-04-161650099067', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(5) NOT NULL,
  `register_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `image_id` int(5) NOT NULL,
  `gross_price` int(5) NOT NULL,
  `discount` int(5) NOT NULL,
  `net_price` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `total_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `register_id`, `product_id`, `image_id`, `gross_price`, `discount`, `net_price`, `qty`, `total_price`) VALUES
(10, 6, 12, 27, 4500, 0, 4500, 1, 4500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent_id` int(5) NOT NULL,
  `label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `name`, `parent_id`, `label`) VALUES
(2, 'Style', 1, 'subcategory'),
(3, 'See All Salwar Kameez', 2, 'petacategory'),
(4, 'Ready to Ship', 2, 'petacategory'),
(5, 'Sharara Suits', 2, 'petacategory'),
(6, 'Anarkali Suits', 2, 'petacategory'),
(7, 'Palazzo Suits', 2, 'petacategory'),
(8, 'Designer Salwar Kameez', 2, 'petacategory'),
(9, 'Kurta Set With Dupatta', 2, 'petacategory'),
(10, 'JumpSuits', 2, 'petacategory'),
(11, 'Dhoti Suits', 2, 'petacategory'),
(12, 'Straight Cut Salwar Kameez', 2, 'petacategory'),
(13, 'Crop Top Suits', 2, 'petacategory'),
(14, 'Indowestern Anarkali', 2, 'petacategory'),
(15, 'Patiala Suits', 2, 'petacategory'),
(16, 'Unstitched Salwar Kameez', 2, 'petacategory'),
(18, 'Occasion', 1, 'subcategory'),
(19, 'Wedding Salwar Kameez', 18, 'petacategory'),
(20, 'Party Wear Salwar Kameez', 18, 'petacategory'),
(21, 'Engagement Salwar Kameez', 18, 'petacategory'),
(22, 'Festive Salwar Kameez', 18, 'petacategory'),
(23, 'Fabric', 1, 'subcategory'),
(24, 'Salwar kamiz', 0, 'maincategory'),
(26, 'See All Salwar Kameez', 25, 'petacategory'),
(27, 'Ready to Ship', 25, 'petacategory'),
(28, 'Sharara Suits', 25, 'petacategory'),
(29, 'Anarkali Suits', 25, 'petacategory'),
(30, 'Palazzo Suits', 25, 'petacategory'),
(31, 'Designer Salwar Kameez', 25, 'petacategory'),
(32, 'Kurta Set With Dupatta', 25, 'petacategory'),
(33, 'JumpSuits', 25, 'petacategory'),
(34, 'Dhoti Suits', 25, 'petacategory'),
(35, 'Straight Cut Salwar Kameez', 25, 'petacategory'),
(36, 'Crop Top Suits', 25, 'petacategory'),
(37, 'Indowestern Anarkali', 25, 'petacategory'),
(38, 'Patiala Suits', 25, 'petacategory'),
(39, 'Unstitched Salwar Kameez', 25, 'petacategory'),
(40, 'Occasion', 24, 'subcategory'),
(42, 'Wedding Salwar Kameez', 40, 'petacategory'),
(43, 'Party Wear Salwar Kameez', 40, 'petacategory'),
(44, 'Engagement Salwar Kameez', 40, 'petacategory'),
(45, 'Festive Salwar Kameez', 40, 'petacategory'),
(46, 'Fabric', 24, 'subcategory'),
(47, 'Silk Salwar Kameez', 46, 'petacategory'),
(48, 'Georgette Salwar Kameez', 46, 'petacategory'),
(49, 'Cotton Salwar Kameez', 46, 'petacategory'),
(50, 'Bandhani Salwar Kameez', 46, 'petacategory'),
(51, 'Printed Salwar Kameez', 46, 'petacategory'),
(52, 'Saree', 0, 'maincategory'),
(54, 'See All Sarees', 53, 'petacategory'),
(55, 'Ready to Ship Saree', 53, 'petacategory'),
(56, 'Embroidered Sarees', 53, 'petacategory'),
(57, 'Designer Sarees', 53, 'petacategory'),
(58, 'Sequence Saree', 53, 'petacategory'),
(59, 'Ready Pleated Sarees', 53, 'petacategory'),
(60, 'Plain Sarees with Designer Blouses', 53, 'petacategory'),
(61, 'Plain Saree', 53, 'petacategory'),
(62, 'Printed Saree', 53, 'petacategory'),
(63, 'Occasion', 52, 'subcategory'),
(64, 'Bridal Saree', 63, 'petacategory'),
(65, 'Party Wear Saree', 63, 'petacategory'),
(66, 'Wedding Saree', 63, 'petacategory'),
(67, 'Festive Saree', 63, 'petacategory'),
(68, 'Fabric', 52, 'subcategory'),
(69, 'Organza Sarees', 68, 'petacategory'),
(70, 'Banarasi Sarees', 68, 'petacategory'),
(71, 'Silk Saree', 68, 'petacategory'),
(72, 'Chiffon Saree', 68, 'petacategory'),
(73, 'Georgette Saree', 68, 'petacategory'),
(74, 'Net Saree', 68, 'petacategory'),
(75, 'Satin Sarees', 68, 'petacategory'),
(76, 'Cotton Saree', 68, 'petacategory'),
(77, 'Saree blouse', 0, 'maincategory'),
(78, 'Style', 77, 'subcategory'),
(79, 'See All Saree Blouses', 78, 'petacategory'),
(80, 'Ready to Ship', 78, 'petacategory'),
(81, 'Designer Saree Blouse', 78, 'petacategory'),
(82, 'Plus size Saree Blouses', 78, 'petacategory'),
(83, 'Designer Backless Blouses', 78, 'petacategory'),
(84, 'Embroidered Blouses', 78, 'petacategory'),
(85, 'Plain Blouses', 78, 'petacategory'),
(86, 'Fabric', 77, 'subcategory'),
(87, 'Velvet Blouse', 86, 'petacategory'),
(88, 'Raw Silk Blouse', 86, 'petacategory'),
(89, 'Silk Blouse', 86, 'petacategory'),
(90, 'Sequin Blouse', 86, 'petacategory'),
(91, 'Lehenga', 0, 'maincategory'),
(93, 'See All Lehengas', 92, 'petacategory'),
(94, 'Ready to Ship Lehengas', 92, 'petacategory'),
(95, 'Bridal Lehengas', 92, 'petacategory'),
(96, 'Bridesmaid Lehenga', 92, 'petacategory'),
(97, 'Crop Top and Skirt Lehengas', 92, 'petacategory'),
(98, 'Printed Lehengas', 92, 'petacategory'),
(99, 'Jacket Lehengas', 92, 'petacategory'),
(100, 'Drape Lehengas', 92, 'petacategory'),
(101, 'Designer Lehenga Choli', 92, 'petacategory'),
(102, 'Occasion', 91, 'subcategory'),
(103, ' Day wedding Lehengas', 102, 'petacategory'),
(104, 'Mehendi Lehengas', 102, 'petacategory'),
(105, 'Sangeet Lehengas', 102, 'petacategory'),
(106, 'Engagement Lehengas', 102, 'petacategory'),
(107, 'Wedding Lehengas', 102, 'petacategory'),
(108, 'Reception Lehengas', 102, 'petacategory'),
(109, 'Party Wear Lehengas', 102, 'petacategory'),
(110, 'Intimate Wedding collection', 102, 'petacategory'),
(111, 'Gowns', 0, 'maincategory'),
(113, 'See All Gown', 112, 'petacategory'),
(114, 'Ready to Ship', 112, 'petacategory'),
(115, 'Designer Gown', 112, 'petacategory'),
(116, 'Evening Gowns', 112, 'petacategory'),
(117, 'Indowestern Gowns', 112, 'petacategory'),
(118, 'Drape Gowns', 112, 'petacategory'),
(119, 'Dresses', 112, 'petacategory'),
(120, 'Occasion', 111, 'subcategory'),
(121, 'Party wear Gowns', 120, 'petacategory'),
(122, 'Gowns for Reception', 120, 'petacategory'),
(123, 'Gowns for Sangeet', 120, 'petacategory'),
(124, 'Bridal Gowns', 120, 'petacategory'),
(125, 'Kurti', 0, 'maincategory'),
(126, 'Style', 125, 'subcategory'),
(127, 'See All Kurtis', 126, 'petacategory'),
(128, 'Ready to Ship', 126, 'petacategory'),
(129, 'Long Kurti', 126, 'petacategory'),
(130, 'Kurta Set', 126, 'petacategory'),
(131, 'Tunics', 126, 'petacategory'),
(132, 'Designer Kurtis', 126, 'petacategory'),
(133, 'Melange Kurtis', 126, 'petacategory'),
(134, 'Occasion', 125, 'subcategory'),
(135, 'Festival Wear Kurtis', 134, 'petacategory'),
(136, 'Casual Wear Kurtis', 134, 'petacategory'),
(137, 'Party Wear Kurtis', 134, 'petacategory'),
(138, 'Fabric', 125, 'subcategory'),
(139, 'Cotton Kurtis', 138, 'petacategory'),
(140, 'Georgette Kurtis', 138, 'petacategory'),
(141, 'Add On', 125, 'subcategory'),
(142, 'Dupatta', 141, 'petacategory'),
(143, 'Man', 0, 'maincategory'),
(144, 'Nehru Jackets for Men', 143, 'subcategory'),
(145, 'Sherwanis', 143, 'subcategory'),
(146, 'Kurtas for Men', 143, 'subcategory'),
(147, 'Kurtas Jacket Set', 143, 'subcategory'),
(148, 'Kids', 0, 'maincategory'),
(149, 'Boys', 148, 'subcategory'),
(150, 'See All', 149, 'petacategory'),
(151, 'Kurtas Set', 149, 'petacategory'),
(152, 'Nehru Jacket Sets', 149, 'petacategory'),
(153, 'Girls', 148, 'subcategory'),
(154, 'See All', 153, 'petacategory'),
(155, 'Lehengas', 153, 'petacategory'),
(156, 'Gowns', 153, 'petacategory'),
(157, 'Salwar Kameez', 153, 'petacategory'),
(158, 'Bridal', 0, 'maincategory'),
(159, 'Collection', 0, 'maincategory'),
(160, 'Shangar Couture', 159, 'subcategory'),
(178, 'Festive Collection', 159, 'subcategory'),
(179, 'Bridesmaid Collection', 159, 'subcategory'),
(180, 'Engagement Collection', 159, 'subcategory'),
(181, 'Sangeet Collection', 159, 'subcategory'),
(182, 'Mehendi Collection', 159, 'subcategory'),
(184, 'Maternity Wear', 159, 'subcategory'),
(192, 'aaa', 191, 'subcategory'),
(193, 'Printed Kurtas', 146, 'petacategory'),
(194, 'Mehendi Mania', 158, 'subcategory'),
(195, 'Haldi Shades', 158, 'subcategory'),
(196, 'Saree', 194, 'petacategory'),
(197, 'Crop Top', 194, 'petacategory'),
(199, 'BFF Closet', 158, 'subcategory'),
(200, 'Lehengha', 195, 'petacategory'),
(201, 'Crop Top', 195, 'petacategory'),
(202, 'Suit', 195, 'petacategory'),
(203, 'Saree', 199, 'petacategory'),
(204, 'Crop Top', 199, 'petacategory'),
(205, 'Suit', 199, 'petacategory'),
(206, 'Designer Jackets', 144, 'petacategory'),
(207, 'Designer Kurta Jackets', 147, 'petacategory'),
(208, 'Suit', 178, 'petacategory'),
(209, 'Lehengha', 180, 'petacategory'),
(210, 'Lehengha', 182, 'petacategory'),
(211, 'Crop Top', 182, 'petacategory'),
(212, 'Crop Top', 160, 'petacategory'),
(213, 'Lehengha', 160, 'petacategory');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE `tbl_contact_us` (
  `contact_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_us`
--

INSERT INTO `tbl_contact_us` (`contact_id`, `name`, `email`, `mobile`, `subject`, `message`) VALUES
(5, 'Ravi Patil', 'ravipatil22@gmail.com', '8460292657', 'Purchase Bulk Order', 'I am the owner of the the wedding shop. I have buy bulk order for the seal your designer product.'),
(6, 'Raj Mehta', 'rajmehta77@gmail.com', '9265790810', 'For Job Requirment', 'I am the fashion designer. I have make many design\'s of Lehenga, Gown And Kurtis. Please contact me and see my design.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_email_subscriber`
--

CREATE TABLE `tbl_email_subscriber` (
  `subscriber_id` int(5) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_email_subscriber`
--

INSERT INTO `tbl_email_subscriber` (`subscriber_id`, `email`) VALUES
(1, 'vaghasiya@gmail.com'),
(2, 'ravi@gmail.com'),
(3, 'vaghasiyamihir712@gmail.com'),
(4, 'ajayvaja2222@gmail.com'),
(5, 'jynsavaliya@gmail.com'),
(6, 'kuldipsolanki307@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faqs`
--

CREATE TABLE `tbl_faqs` (
  `faqs_id` int(5) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_faqs`
--

INSERT INTO `tbl_faqs` (`faqs_id`, `question`, `answer`) VALUES
(3, 'Does Shangar Collection Offer Cash on Delivery (COD)?', 'COD is available for selected locations/Pin codes in India only. COD limit is up to 9900 INR.     Please Note - For COD orders, the style will come in standard measurements as mentioned in the size chart. Customisation is not available for COD orders.'),
(4, 'Delivery was attempted but I was unavailable. What next?', 'Do not worry, our courier will try to reattempt to deliver in next 2 days. In case parcel is still not delivered you can call or email us so you can submit your delivery request to the courier.'),
(5, 'Will I Receive a Quality Product by Shangar Collecition?', 'As an international brand, we adhere to strict quality and design benchmarks. Every Shangar product goes through a 5 step Quality Control process to ensure that you receive the best. '),
(6, 'What is the process for Refund/Replace?', 'Please follow the below process  Please login to your account, Go to \"My Return\" Select the Order and Product you want to Return/Replace Share the Item Condition and Photo with the detailed reason for Refund/Replace Our Return team will consult and accordingly our fitting expert team will get in touch with you with a quick response.  The day we receive the outfit back, we perform a thorough quality check. After the outfit passes the quality check, We will gladly exchange or refund you the amount'),
(7, 'For Bulk Inquires?', 'All you need is to provide us the item code/codes and the required numbers through an email so that we can check and inform you about the prices and availability.'),
(8, 'Are there Custom charges?', 'For Indian Customers : Product Prices displayed are inclusive of all taxes and duties.  For International Customers : VAT / Custom, Taxes, and Import Duties are not included in our ordering process but may be charged to you by your government. They are entirely your responsibility.'),
(9, 'Are there any Reserve pick-up charges?', 'For Indian Customers: Pick-up is free within India. For International Customers: US - Reverse pick up charges - $40 Per Item Rest of the countries - Customers will be responsible to ship the product back to us with tracking details at info@kalkifashion.com. The customer will be liable to pay the return shipping and customs charges which are non-refundable.'),
(10, 'If there are any size issues then can I return it?', 'Yes, in case of any sizing issue you can either get it exchanged or go for a refund.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `name`, `message`) VALUES
(1, 'Aditi Patel', 'I completely love this site, found it on EBay at first now I just order directly through them...I am always complemented on my outfits I will be back for more...Thank you for having cute trendy clothes that fit and look good.'),
(2, 'Rajvi Sharma', 'I just received my Lehengas in TWO days I am incredibly happy with your quickness and the beautiful clothes! I will be shopping through you again in the very near future and will recommend you to everyone I know! So very happy I found your website after hours of searching for something stylish and festive for the holidays Thank you again Super Happy :)'),
(3, 'Vansvi Kanani', 'Just received my order & am thrilled with everything I purchased! and the shipping was awesome it took 3 days best yet! i will shop again thanks you.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `location_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `parent_id` int(5) NOT NULL,
  `label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`location_id`, `name`, `parent_id`, `label`) VALUES
(1, 'India', 0, 'country'),
(2, 'Gujarat', 1, 'state'),
(8, 'Surat', 2, 'city'),
(9, 'Vadodara', 2, 'city'),
(10, 'Tripura', 1, 'state'),
(11, 'Uttar Pradesh', 1, 'state'),
(12, 'Rajasthan', 1, 'state'),
(13, 'Kerala', 1, 'state'),
(14, 'Maharashtra', 1, 'state'),
(15, 'Haryana', 1, 'state'),
(16, 'Madhya Pradesh', 1, 'state'),
(17, 'Punjab', 1, 'state'),
(18, 'Himachal Pradesh', 1, 'state'),
(19, 'Karnataka', 1, 'state'),
(20, 'Bihar', 1, 'state'),
(21, 'Tamil Nadu', 1, 'state'),
(22, 'Goa', 1, 'state'),
(23, 'Jharkhand', 1, 'state'),
(24, 'Delhi', 1, 'state'),
(25, 'Ahmedabad', 2, 'city'),
(26, 'Anand', 2, 'city'),
(27, 'Ankleshwar', 2, 'city'),
(28, 'Bharuch', 2, 'city'),
(29, 'Bhavnagar', 2, 'city'),
(30, 'Rajkot', 2, 'city'),
(31, 'Bhuj', 2, 'city'),
(32, 'Dwarka', 2, 'city'),
(33, 'Gandhinagar', 2, 'city'),
(34, 'Jamnagar', 2, 'city'),
(35, 'Junagadh', 2, 'city'),
(36, 'Mandvi', 2, 'city'),
(37, 'Morbi', 2, 'city'),
(38, 'Palanpur', 2, 'city'),
(39, 'Palitana', 2, 'city'),
(40, 'Porbandar', 2, 'city'),
(41, 'Saputara', 2, 'city'),
(42, 'Sasan Gir', 2, 'city'),
(43, 'Vapi', 2, 'city'),
(44, 'Agartala', 10, 'city'),
(45, 'Agra', 11, 'city'),
(46, 'Allahabad', 11, 'city'),
(47, 'Bareilly', 11, 'city'),
(48, 'Dehradun', 11, 'city'),
(49, 'Haridwar', 11, 'city'),
(50, 'Kanpur', 11, 'city'),
(51, 'Lucknow', 11, 'city'),
(52, 'Mathura', 11, 'city'),
(53, 'Rishikesh', 11, 'city'),
(54, 'Varanasi', 11, 'city'),
(55, 'Ajmer', 12, 'city'),
(56, 'Bikaner', 12, 'city'),
(57, 'Chittorgarh', 12, 'city'),
(58, 'Jaipur', 12, 'city'),
(59, 'Jodhpur', 12, 'city'),
(60, 'Kota', 12, 'city'),
(61, 'Mount Abu', 12, 'city'),
(62, 'Udaipur', 12, 'city'),
(63, 'Canannore', 13, 'city'),
(64, 'Calicut', 13, 'city'),
(65, 'Kochin', 13, 'city'),
(66, 'Munnar', 13, 'city'),
(67, 'Dapoli', 14, 'city'),
(68, 'Jawhar', 14, 'city'),
(69, 'Khandala', 14, 'city'),
(70, 'Lonavala', 14, 'city'),
(71, 'Mahabaleshwar', 14, 'city'),
(72, 'Matheran', 14, 'city'),
(73, 'Mumbai', 14, 'city'),
(74, 'Nasik', 14, 'city'),
(75, 'Panchgani', 14, 'city'),
(76, 'Panvel', 14, 'city'),
(77, 'Pune', 14, 'city'),
(78, 'Thane', 14, 'city'),
(79, 'Ambala', 15, 'city'),
(80, 'Faridabad', 15, 'city'),
(81, 'Manesar', 15, 'city'),
(82, 'Panchkula', 15, 'city'),
(83, 'Bhopal', 16, 'city'),
(84, 'Chitrakoot', 16, 'city'),
(85, 'Gwalior', 16, 'city'),
(86, 'Indore', 16, 'city'),
(87, 'Jabalpur', 16, 'city'),
(88, 'Ujjain', 16, 'city'),
(89, 'Amritsar', 17, 'city'),
(90, 'Chandigarh', 17, 'city'),
(91, 'Jalandhar', 17, 'city'),
(92, 'Ludhiana', 17, 'city'),
(93, 'Patiala', 17, 'city'),
(94, 'Dalhousie', 18, 'city'),
(95, 'Manali', 18, 'city'),
(96, 'Palampur', 18, 'city'),
(97, 'Shimla', 18, 'city'),
(98, 'Solan', 18, 'city'),
(99, 'Bangalore', 19, 'city'),
(100, 'Mangalore', 19, 'city'),
(101, 'Mysore', 19, 'city'),
(102, 'Bodhgaya', 20, 'city'),
(103, 'Patna', 20, 'city'),
(104, 'Rajgir', 20, 'city'),
(105, 'Chennai', 21, 'city'),
(106, 'Kanchipuram', 21, 'city'),
(107, 'Madurai', 21, 'city'),
(108, 'Ooty', 21, 'city'),
(109, 'Pondicherry', 21, 'city'),
(110, 'Rameshwaram', 21, 'city'),
(111, 'Tanjore', 21, 'city'),
(112, 'Goa', 22, 'city'),
(113, 'Jamshedpur', 23, 'city'),
(114, 'Ranchi', 23, 'city'),
(115, 'Ghaziabad', 24, 'city'),
(116, 'New Delhi', 24, 'city');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_offer`
--

CREATE TABLE `tbl_offer` (
  `offer_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `rate` int(5) NOT NULL,
  `min_price` int(5) NOT NULL,
  `max_price` int(5) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `category_id` int(5) NOT NULL,
  `label` varchar(20) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_offer`
--

INSERT INTO `tbl_offer` (`offer_id`, `name`, `rate`, `min_price`, `max_price`, `start_date`, `end_date`, `category_id`, `label`, `status`) VALUES
(1, 'Holi Special', 12, 10000, 15000, '2022-03-11', '2022-03-20', 0, 'all', 0),
(2, 'April Dhamaka', 15, 8000, 20000, '2022-04-01', '2022-04-30', 52, 'main', 1),
(3, 'Megical May', 10, 5000, 15000, '2022-05-02', '2022-05-20', 68, 'sub', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privacy_policy`
--

CREATE TABLE `tbl_privacy_policy` (
  `policy_id` int(5) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_privacy_policy`
--

INSERT INTO `tbl_privacy_policy` (`policy_id`, `data`) VALUES
(3, '<p>Shangar Collection knows that you care about how your personal information is used and shared and we will make sure that it is taken care of and protected. Please read the following to learn more about our privacy policy. By visiting the Shangar Collection website and domain name, and any other linked pages, features, content, or application services offered from time to time by Company in connection therewith (collectively, the &quot;Website&quot;), or using any of our services, you acknowledge that you accept the practices and policies outlined in this Privacy Policy.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(4, '<p><strong>What does this Privacy Policy cover?</strong></p>\r\n\r\n<p>This Privacy Policy covers Company&#39;s treatment of personally identifiable information (&quot;Personal Information&quot;) that Company gathers when you are accessing Company&#39;s Website and when you use Company services. This policy does not apply to the practices of companies that Company does not own or control, or to individuals that Company does not employ or manage.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(5, '<p><strong>How does Shangar Collection Gather and Use Information?</strong></p>\r\n\r\n<p>The information we gather from customers enables us to personalize and improve our services, and to allow our users to set up a user account and make purchases via the Website. We collect the following types of information from our customers.</p>\r\n\r\n<p>Shangar Collection keeps track of your information to offer you the best possible shopping experience. When you register (log in), you supply your email address and a password. This allows us to access to your account every time you visit our Website. Before completing your first purchase, we also ask you for your name, phone number, email, billing and shipping addresses. This information, along with your credit card number, is necessary to fulfill your order. This information may be disclosed to specific members of our staff and to select third parties (such as our credit card processor and shipping provider) involved in the completion of your transaction and delivery of your order. We may also need your email address or phone number to contact you if we have questions about your order. We may also use your email address to notify you about new services or special promotional programs, or send you offers or information if you have opted-in. Emails are sent only to Shangar Collection members who have chosen to receive them (opted-in) or who have made a purchase on our website. At any time, you can notify us that you wish to stop receiving these emails. In addition, we keep a record of your past purchases, returns, and credits. We may also ask you for information regarding your personal preferences and demographics to help us better meet your needs.&nbsp;</p>\r\n\r\n<p><strong>Cookies:</strong>&nbsp;Cookies are alphanumeric identifiers that we transfer to your computer&#39;s hard drive through your browser to enable our systems to recognize your browser and tell us how and when pages in our site are visited and by how many people. Company cookies do not collect Personal Information, and we do not combine the general information collected through cookies with other Personal Information to tell us who you are or what your screen name or email address is.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(6, '<p><strong>Server statistics</strong></p>\r\n\r\n<p>Shangar Collection uses reporting software that allows us to analyze the amount and type of member traffic we get on our Website. We use this data to make improvements to your shopping experience and to ensure that we have enough capacity to properly serve all of our members. The software provides aggregate reporting information to Shangar Collection only. No personal or personally identifiable information is gathered or used for this process.</p>\r\n\r\n<p>In an effort to make our Website as effective and enjoyable as possible, the computers that operate it collect certain information each time you visit. We store these statistics in server logs. Once again, these statistics do not identify you personally, but provide us information regarding the type of user who is accessing our Website and certain browsing activities of that user. This data may include: the IP address of the user accessing our Website (i.e. the unique I.D. number of the user&#39;s computer), the type of browser (Internet Explorer, Firefox, etc.) and the operating system (Windows, Mac OS, etc.), the Website the user last visited before linking to our Website, how long the user accessed our Website in any given session, and the date and time of access. We may make extensive use of this data at an aggregated level in order to understand how our Website is being used</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(7, '<p><strong>What Security Procedures Does Shangar Collection Use To Protect Personal Information?</strong></p>\r\n\r\n<p>Shangar Collection is committed to protecting all the information you share with us. We follow stringent procedures to help protect the confidentiality, security, and integrity of data stored on our systems The Site encrypts your credit card number and other personal information using secure socket layer (SSL) technology to provide for the secure transmission of the information from your PC to our servers.&nbsp;.Only those employees who need access to your information in order to perform their duties are allowed such access. Any employee who violates our privacy and/or security policies is subject to disciplinary action, including possible termination and civil and/or criminal prosecution.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(8, '<p><strong>Service Providers</strong></p>\r\n\r\n<p>Shangar Collection may use various outside agencies (third party service providers) to operate the website. For example, we may use third parties to host our Website, operate various features made available on our Website, send emails, analyze data, provide search results and links, and assist in fulfilling your orders. Some of these third parties may need access to your information in order to make the services provided through our Website work. Information will only be disclosed to these service providers on a need-to-know basis, and they will only be permitted to use such information for the purpose of providing the particular services provided by such entities in connection with our Website.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(9, '<p><strong>Exceptions</strong></p>\r\n\r\n<p>Shangar Collection may be forced to disclose information in order to comply with a subpoena, court order, administrative or governmental order, or any other requirement of law, or Shangar Collection, in its sole discretion, deems it necessary in order to protect our rights or the rights of others, to prevent harm to persons or property, to fight fraud and credit risk, or to enforce or apply our Website terms of use. Personally identifiable information may be transferred as an asset in connection with a merger or sale (including any transfers made as part of an insolvency or bankruptcy proceeding) involving all or part of our business or as part of a corporate reorganization, stock sale, or other change in control.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(10, '<p><strong>Children&#39;s Privacy and Parental Controls</strong></p>\r\n\r\n<p>We do not solicit any personal information from children. If you are not 18 or older, you are not authorized to use the Site. Parents should be aware that there are parental control tools available online that you can use to prevent your children from submitting information online without parental permission or from accessing material that is harmful to minors.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(11, '<p><strong>Modification and notification of changes</strong></p>\r\n\r\n<p>You acknowledge that this Privacy Policy is part of the Terms of Use and you unconditionally agree that using this Website signifies your assent to Shangar Collection Privacy Policy. If you do not agree with this Privacy Policy, please do not use our Website. Your visit and any dispute over privacy is subject to this policy and our Terms of Use, including limitations on damages</p>\r\n\r\n<p>Shangar Collection reserves the right to change the terms of use and this Privacy Policy, at any time. We will post any changes so that you are always aware of our policy. Unless stated otherwise, our current Privacy Policy applies to all information that we have about you and your account. We stand behind the promises we make, however, and will never materially change our policies and practices to make them less protective of customer information collected in the past without the consent of affected customers.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(12, '<p><strong>Questions and Concerns</strong></p>\r\n\r\n<p>If you have any questions or concerns regarding privacy at Company site, please send us an email to shangarcollection@gmail.com and we will make every effort to resolve your concerns. You may also phone us at +91 908-102-4535</p>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(5) NOT NULL,
  `main_id` int(5) NOT NULL,
  `sub_id` int(5) NOT NULL,
  `peta_id` int(5) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` int(5) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `specification` varchar(2000) NOT NULL,
  `status` int(5) NOT NULL,
  `offer_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `main_id`, `sub_id`, `peta_id`, `code`, `name`, `price`, `description`, `specification`, `status`, `offer_id`) VALUES
(2, 111, 120, 121, 'SG67415', 'Wine Purple Gown Embellished In Sequins With Cowl Neckline And Peasant Sleeves', 15000, '<ul>\r\n	<li>Purple gown&nbsp;embellished in sequins&nbsp;with plunging V neckline.</li>\r\n	<li>It has a ruched belt and gathers in the front.</li>\r\n	<li>Crafted with full sleeves and side zip closure.</li>\r\n	<li>WASH CARE INSTRUCTION: Dry clean only.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Purple</li>\r\n	<li>Fabric: Sequins</li>\r\n	<li>Work: Embellished, Sequins</li>\r\n	<li>Sleeves: Full Sleeves</li>\r\n</ul>\r\n', 1, 0),
(3, 77, 86, 87, 'SG38769', 'Blouse In Velvet With A Trapeze Neck And Ruffle Sleeves', 4200, '<ul>\r\n	<li>Blouse in velvet with a trapeze neck and ruffle sleeves.</li>\r\n	<li>Back comes with a geometric cut back and a side zip closure.</li>\r\n	<li>The length of the blouse is 15 inches.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Fabric: Velvet</li>\r\n	<li>Closure: Side Zip</li>\r\n	<li>Neck Line: Symetric</li>\r\n	<li>Sleeves: Cap Sleeves</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(5, 24, 40, 42, 'SG78283', 'Anarkali Suit In Chiffon With Abla Embroidered Neckline And Tiered Hemline', 8000, '<ul>\r\n	<li>Anarkali suit in chiffon with abla embroidered tier at the hemline.</li>\r\n	<li>The neckline is adorned with mirror embroidery.</li>\r\n	<li>It is designed with full sleeves, round neckline and side zip closure.</li>\r\n	<li>Topped with a matching dupatta with abla embroidered buttis and border along with tassels on the corner.</li>\r\n	<li>This piece does not come with bottoms.</li>\r\n	<li>It comes with cancan for extra flare.</li>\r\n	<li>Model height - 5&#39;10 bust - 32 inches wearing size Small.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Henna Green , Wine Purple</li>\r\n	<li>Fabric: Chiffon</li>\r\n	<li>Work: Embroidery, Mirror</li>\r\n	<li>Sleeves: Full Sleeves</li>\r\n</ul>\r\n', 1, 0),
(6, 52, 68, 70, 'SG74573', 'Banarasi Saree With Heavy Embroidered Blouse', 6500, '<ul>\r\n	<li>Overwhelm the beholder wearing this gorgeous heavy border saree in banarasi silk.</li>\r\n	<li>Beautified with accentuate zari, sequins, and thread embroidery embellishments, graced by tassels.</li>\r\n	<li>Paired with an old lavender color similarly embroidered heavy blouse in silk. The unstitched blouse can be customised up to 42 inches.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Blue,Green</li>\r\n	<li>Fabric: Silk</li>\r\n	<li>Work: Zari, Sequins, and Thread Embroidery Embellishments</li>\r\n</ul>\r\n', 1, 0),
(7, 91, 102, 104, 'SG78135', 'Cream Tie Dye Printed Skirt And Crop Top Set With Mirror Abla Embroidery And Net Cape Jacket', 8000, '<ul>\r\n	<li>Choli in raw silk with colorful resham embroidered mirror abla work along with zari and gotta lace embroidered floral design.</li>\r\n	<li>It is paired with an off white tiered skirt in chiffon with multi colored tie dye design.</li>\r\n	<li>The crop top is crafted sleeveless with sweetheart neckline and back hook closure.</li>\r\n	<li>It is topped with a net cape jacket with sequin buttis and abla embroidered border.</li>\r\n	<li>This piece comes with padding and cancan.</li>\r\n	<li>Model height - 5&#39;10 bust - 32 inches wearing size Small.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Canary Yellow, Hot Pink, Pool Blue</li>\r\n	<li>Fabric: Chiffon</li>\r\n	<li>Work: Embroidery, Mirror, Print</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n</ul>\r\n', 1, 0),
(8, 125, 134, 135, 'SG44642', 'Kurti Set With Bandhani Foil Printed Chevron Design And Off White Skirt', 3200, '<ul>\r\n	<li>Straight cut kurti in cotton with bandhani foil printed chevron design.</li>\r\n	<li>Crafted with front placket and 3/4th sleeves.</li>\r\n	<li>It is paired with an off white skirt in cotton with foil printed border.</li>\r\n	<li>This piece comes in a standard length of 41 inches for the kurti and 40 inches for the skirt.&nbsp;</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Maroon , Navy Blue</li>\r\n	<li>Fabric: Silk</li>\r\n	<li>Work: Print</li>\r\n	<li>Sleeves: 3/4th Sleeve</li>\r\n</ul>\r\n', 1, 0),
(9, 143, 146, 193, 'SG94157', 'Kurta Set In Satin Silk With 3D Printed Buttis', 4500, '<ul>\r\n	<li>Kurta in satin silk with 3D printed buttis.</li>\r\n	<li>The placket is adorned with potli buttons.</li>\r\n	<li>Crafted with full sleeves.</li>\r\n	<li>Paired with ivory cotton churidar pants.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Dark Blue, Teal Green</li>\r\n	<li>Fabric: Satin, Silk</li>\r\n	<li>Work: Print</li>\r\n</ul>\r\n', 1, 0),
(10, 148, 149, 151, 'SG87653', 'Kurta And Salwar Set With Phulkari Inspired Fish Motifs By Tiber Taber', 1500, '<ul>\r\n	<li>This embroidered kurta-salwar set is the desi twist every occasion needs! It&#39;s easy silhouette and intricately embroidered fish motifs make it stand out! A tribute to the indigenous art of Phulkari from Punjab, this kurta set is the perfect choice for the upcoming festivities! Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Yellow, Green, Orange</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Embroidery</li>\r\n</ul>\r\n', 1, 0),
(11, 158, 194, 197, 'SG47540', 'Floral Satin Skirt Set With An Embellished Crop Top Green and Burgundy', 15000, '<ul>\r\n	<li>floral printed satin lehenga with gathers at the waist.</li>\r\n	<li>Comes with a matching high neck crepe blouse with a cut out at the neck and a tie up at the back.</li>\r\n	<li>The upper half of the blouse is embellished with heavy sequin and cut dana detailing.</li>\r\n	<li>The length of the blouse is 13&quot;.</li>\r\n	<li>WASH CARE INSTRUCTION: Dry clean only.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Dark Green,&nbsp;Burgundy</li>\r\n	<li>Fabric: Satin Blend</li>\r\n	<li>Work: Cut Dana, Embellished, Print</li>\r\n	<li>Closure: Back Hook-Eye</li>\r\n	<li>Neck Line: Keyhole Neckline</li>\r\n	<li>Sleeves: Cap Sleeves</li>\r\n</ul>\r\n', 1, 0),
(12, 24, 46, 49, 'SG78327', 'Black A Line Suit In Cotton With Pin Tucks Detailing And A Zari Embroidered Organza Dupatta', 4500, '<ul>\r\n	<li>Black A line suit in cotton with pin tucks detailing on the yoke.</li>\r\n	<li>It is designed with gathering at the waist, mandarin collar neckline and 3/4th sleeves.</li>\r\n	<li>It comes with matching straight cut pants in cotton.</li>\r\n	<li>Topped with a matching organza dupatta with zari embroidered floral design on the scalloped border.</li>\r\n	<li>Note - This piece will come in standard measurements as mentioned in the size chart.</li>\r\n	<li>Customisation is not available.</li>\r\n	<li>Model height - 5&#39;10 bust - 32 inches wearing size Small.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Black</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Embroidery, Zari</li>\r\n	<li>Sleeves: 3/4th Sleeve</li>\r\n</ul>\r\n', 1, 0),
(13, 24, 46, 49, 'SG78322', 'Boysenberry Purple A Line Suit In Cotton With Pin Tucks Detailing And A Zari Embroidered Organza Dupatta', 4500, '<ul>\r\n	<li>Boysenberry purple A line suit in cotton with pin tucks detailing on the yoke.</li>\r\n	<li>It is designed with gathering at the waist, mandarin collar neckline and 3/4th sleeves.</li>\r\n	<li>It comes with matching straight cut pants in cotton.</li>\r\n	<li>Topped with a matching organza dupatta with zari embroidered floral design on the scalloped border.</li>\r\n	<li>Note - This piece will come in standard measurements as mentioned in the size chart.</li>\r\n	<li>Customisation is not available.</li>\r\n	<li>Model height - 5&#39;10 bust - 32 inches wearing size Small.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Purple</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Embroidery, Zari</li>\r\n	<li>Sleeves: 3/4th Sleeve</li>\r\n</ul>\r\n', 1, 0),
(14, 24, 40, 42, 'SG43168', 'Rani Pink, Teal Green Anarkali Suit In Georgette With Zardozi And Zari Embroidery Work', 12000, '<ul>\r\n	<li>Anarkali suit in plain georgette with heavy embroidered yoke, sleeve cuffs and border.</li>\r\n	<li>The suit has zardozi, sequins and zari embroidered floral motifs.</li>\r\n	<li>It is crafted with full sleeves and mandarin collar neckline with front hooks.</li>\r\n	<li>It comes with an alluring embroidered georgette dupatta with zari buttis and unstitched cotton bottoms.</li>\r\n	<li>WASH CARE INSTRUCTION: Dry clean only.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Rani Pink, Teal Green</li>\r\n	<li>Fabric: Georgette</li>\r\n	<li>Work: Embroidery, Floral, Zardosi, Zari</li>\r\n	<li>Closure: Front Hook-Eye</li>\r\n	<li>Sleeves: Full Sleeves</li>\r\n</ul>\r\n', 1, 0),
(15, 52, 63, 67, 'SG61698', 'Heavy Border Embroidered Banarasi Saree In Yellow', 9000, '<ul>\r\n	<li>Show off the elegance hidden inside wearing this fully embellished mustard yellow color saree in banarasi silk.</li>\r\n	<li>This heavy border traditional saree is augmented with accentuate zari, sequins, and thread embroidery embellishments.</li>\r\n	<li>Complemented by tassels, also features a maroon color heavy silk blouse with similar embroidery and beads work detailing.</li>\r\n	<li>The unstitched blouse can be customised up to 42 inches.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Yellow</li>\r\n	<li>Work: Embroidery, Sequins, Zari</li>\r\n</ul>\r\n', 1, 2),
(16, 52, 63, 65, 'SG43185', 'Blue At Silk Saree With Embellished Blouse', 4500, '<ul>\r\n	<li>Featuring a gorgeous blue saree in art silk designed with rich resham, thread embroidery work around the borders enhanced by sequins and stone embellishment.</li>\r\n	<li>Accompanied by a similarly embroidered art silk and net blouse in blue color. The unstitched blouse can be customised up to 44 inches.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Blue</li>\r\n	<li>Fabric: Georgette</li>\r\n	<li>Work: Embroidery, Beads</li>\r\n</ul>\r\n', 1, 0),
(17, 52, 63, 65, 'SG61166', 'Midnight Blue Ready Pleated Saree Embellished In Sequins With A Matching Velvet Blouse Embellished In Sequins On The Straps', 11500, '<ul>\r\n	<li>Navy blue saree&nbsp;embellished in sequins in striped design.</li>\r\n	<li>Paired with a matching velvet blouse with cut dana work in linear design.</li>\r\n	<li>It is crafted with double spaghetti straps, V neckline and side zip closure.</li>\r\n	<li>This piece comes with padding.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please Dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Navy blue</li>\r\n	<li>Fabric: Sequins</li>\r\n	<li>Work: Embellished, Sequins</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 2),
(18, 77, 86, 87, 'SG38926', 'Navy Blue Blouse In Velvet With Spaghetti Straps On The Shoulders ', 2600, '<ul>\r\n	<li>Navy blue blouse in velvet with spaghetti straps on the shoulders and subtle sweetheart neckline.</li>\r\n	<li>It is crafted with side zip closure.</li>\r\n	<li>The length of the blouse is 13 inches.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Dark Blue</li>\r\n	<li>Fabric: Velvet</li>\r\n	<li>Closure: Side Zip</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n</ul>\r\n', 1, 0),
(19, 77, 86, 89, 'SG48311', 'Corn Yellow Sleeveless Blouse In Raw Silk With Sweetheart Neckline And Curved Hem', 1700, '<ul>\r\n	<li>Corn Yellow sleeveless blouse in raw silk with sweetheart neckline.</li>\r\n	<li>It comes with a curved hem and a square cut back with hook closure.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Yellow</li>\r\n	<li>Fabric: Silk</li>\r\n	<li>Closure: Back Hook-Eye</li>\r\n	<li>Neck Line: Sweetheart Neckline</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n</ul>\r\n', 1, 0),
(20, 91, 102, 103, 'SG69251', 'Orchid Purple Shaded Lehenga In Silk With Floral Printed Buttis And Ethnic Border Design', 23000, '<ul>\r\n	<li>Orchid purple shaded lehenga in silk with floral printed buttis and an intricate ethnic printed border.</li>\r\n	<li>Accented with cut dana, zari and gotta patti work.</li>\r\n	<li>Paired with a matching unstitched blouse and printed dupata with scalloped border.</li>\r\n	<li>This piece comes with cancan.</li>\r\n	<li>Model height - 5&#39;10 bust - 32 inches wearing size Small.</li>\r\n	<li>This piece comes in a standard length of 44 inches.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Purple</li>\r\n	<li>Fabric: Silk</li>\r\n	<li>Work: Print</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n</ul>\r\n', 1, 0),
(21, 91, 92, 95, 'SG76282', 'Pink Sangria Velvet Lehenga Choli With Mughal Inspired Hand Embroidered Kalis Using Multi Colored Accents', 70000, '<ul>\r\n	<li>Sangria lehenga in lush velvet with hand embroidery detailing in mughal inspired motifs and intricately detailed flowers.</li>\r\n	<li>It is adorned using multi colored sequins and threads, white moti along with gold toned cut dana, zardosi and gotta patti.</li>\r\n	<li>Paired with a matching choli in velvet with intricate hand embroidery detailing.</li>\r\n	<li>It is crafted with half sleeves, scallop cut sweetheart neckline and V cut back with tassel dori.</li>\r\n	<li>It has a side zip closure and padding.</li>\r\n	<li>It is teamed with a matching net dupatta with a cutwork scallop border adorned in hand embroidery along with moti and sequin embroidered buttis.</li>\r\n	<li>This piece comes with heavy cancan.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Pink</li>\r\n	<li>Fabric: Velvet</li>\r\n	<li>Work: Embroidery, Handwork, Moti, Sequins</li>\r\n	<li>Sleeves: Half Sleeve</li>\r\n</ul>\r\n', 1, 0),
(22, 91, 102, 106, 'SG29948', 'Navy Blue Lehenga Choli With Foil Print In Framed Floral Motif And Heritage Pattern', 13000, '<ul>\r\n	<li>Navy blue lehenga choli in silk with foil print in framed floral motif along with heritage pattern and floral buttis.</li>\r\n	<li>Adorned with sequins, cut dana and zari work.</li>\r\n	<li>Paired with a matching unstitched blouse with printed buttis.</li>\r\n	<li>Topped with a yellow net dupatta with embroidered and printed border along with cut dana buttis.</li>\r\n	<li>This piece comes with cancan.</li>\r\n	<li>Note - The border and blouse design may vary.</li>\r\n	<li>The maximum length of the lehenga will be 44 inches.</li>\r\n	<li>WASH CARE INSTRUCTION: Dry clean only.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Navy blue</li>\r\n	<li>Fabric: Silk</li>\r\n	<li>Work: Embroidery, Print, Zari</li>\r\n</ul>\r\n', 1, 0),
(23, 111, 120, 121, 'SG66849', 'Wine Purple, Navy Blue  Gown Embellished In Sequins With Cowl Neckline And Peasant Sleeves', 6500, '<ul>\r\n	<li>Wine purple, navy&nbsp; blue gown&nbsp;embellished in sequins&nbsp;with cowl drape on the bodice.</li>\r\n	<li>Crafted with V neckline and peasant sleeves.</li>\r\n	<li>Designed with a an overlapping slit and a short inner lining.</li>\r\n	<li>It has a deep keyhole back and a side zip closure.</li>\r\n	<li>This piece does not come with padding.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please Dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Wine, Navy Blue</li>\r\n	<li>Fabric: Sequins</li>\r\n	<li>Work: Embellished, Sequins</li>\r\n	<li>Neck Line: Cowl Neckline,Cowl Draped Overlapping Slit&nbsp;</li>\r\n</ul>\r\n\r\n<p>Sleeves: Full Sleeves</p>\r\n', 1, 0),
(24, 111, 120, 123, 'SG39545', 'Champagne Strapless Gown With Embroidered Bodice And Fancy Cape Attached To A Choker', 8000, '<ul>\r\n	<li>Champagne gown in strapless crushed shimmer fabric with sequins embellished net top layer and frill on the hem.</li>\r\n	<li>The bodice is accentuated with cut dana, zardosi and moti embroidered floral and geometric design.</li>\r\n	<li>Crated with corset neckline in a It comes with an embellished choker with attached crushed shimmer drape on one shoulder.</li>\r\n	<li>This piece comes with cancan.</li>\r\n	<li>WASH CARE INSTRUCTION: Dry clean only.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n</ul>\r\n\r\n<p>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</p>\r\n', '<ul>\r\n	<li>Color: Champagne</li>\r\n	<li>Fabric: Sequins</li>\r\n	<li>Work: Embroidery, Cut Dana, Floral, Moti</li>\r\n	<li>Closure: Side Zip</li>\r\n</ul>\r\n', 1, 0),
(25, 143, 147, 207, 'SG94173', 'Wine Nehru Jacket Set In Raw Silk With Resham And Mirror Embroidered Geometric Jaal And Aligarh Pants', 7000, '<ul>\r\n	<li>Wine nehru jacket set in raw silk with resham and mirror abla embrodiered geometric jaal.</li>\r\n	<li>The placket is trimmed with golden buttons.</li>\r\n	<li>Paired with a wine raw silk kurta with full sleeves and resham embroidered placket.</li>\r\n	<li>It is paired with white cotton aligarh pants.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Wine</li>\r\n	<li>Fabric: Raw silk</li>\r\n	<li>Work: Embroidery, Mirror, Resham</li>\r\n</ul>\r\n', 1, 0),
(26, 148, 153, 155, 'SG86448', 'Pink Layered Kurta And Lehenga Set With Foil Print And Asymmetric Hem By Mini Chic', 4900, '<ul>\r\n	<li>Long Pink Foil work Girl&#39;s Kurta with asymmetric hem and Skirt from Mini Chic.</li>\r\n	<li>Crafted in chanderi silk with foil print.</li>\r\n	<li>This Lehenga and kurta set makes a comfortable wear for a long event.</li>\r\n	<li>Team it with shiny sandals and a maang tikka for an adorable look.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Pink</li>\r\n	<li>Fabric: Silk</li>\r\n	<li>Work: Print</li>\r\n</ul>\r\n', 1, 0),
(27, 148, 153, 157, 'SG90093', 'Royal Blue Suit In Velvet With Peach Palazzo Adorned In Gotta Lace ', 2250, '<ul>\r\n	<li>Royal blue suit in velvet with zari patchwork on the neckline.</li>\r\n	<li>Crafted with round neckline and 3/4th ruffle sleeves.</li>\r\n	<li>Paired with peach sharara pants in net with gotta lace embroidered hemline.</li>\r\n	<li>Topped with a peach net dupatta with velvet border.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Blue</li>\r\n	<li>Fabric: Velvet</li>\r\n	<li>Work: gotta lace</li>\r\n</ul>\r\n', 1, 0),
(28, 158, 195, 200, 'SG30146', 'Off White And Sun Yellow Ombre Jacket Lehenga With Abla Embellished Crop Top `', 9800, '<ul>\r\n	<li>Off white and sun yellow ombre lehenga in georgette.</li>\r\n	<li>Matched with a sun yellow sleeveless crop top in raw silk with mirror abla, zari and resham embroidered jaal.</li>\r\n	<li>Designed with sweetheart neckline and back.</li>\r\n	<li>Set together with a matching sun yellow jacket in net with sequins embroidered buttis and abla embroidered border.</li>\r\n	<li>The length of the blouse is 14 inches.</li>\r\n	<li>This piece comes with cancan.</li>\r\n	<li>Note - This piece will come in standard measurements as mentioned in the size chart. Customisation is not available.</li>\r\n	<li>The maximum length of the lehenga will be 44 inches.</li>\r\n	<li>Slight variation in color is possible&nbsp;due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: White, Yellow</li>\r\n	<li>Fabric: Georgette</li>\r\n	<li>Work: Embroidery, Mirror, Zari</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n</ul>\r\n', 1, 0),
(29, 158, 195, 202, 'SG83662', 'Lime Yellow Palazzo Suit Set In Cotton With Bandhani Print All Over ', 3650, '<ul>\r\n	<li>Lime yellow palazzo suit set in cotton with bandhani print all over.</li>\r\n	<li>Crafted with notched necklne and 3/4th sleeves.</li>\r\n	<li>Paired with plain cotton palazzo pants and a chiffon bandhani printed dupatta.</li>\r\n	<li>Model height - 5&#39;10 bust - 32 inches wearing size Small.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Lime Yellow</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Print</li>\r\n</ul>\r\n', 1, 0),
(30, 158, 199, 205, 'SG53944', 'Off White Anarkali Suit With Halter Neckline And Adorned In Multicolored Hand Embroidered Floral Design On The Bodice', 22000, '<ul>\r\n	<li>Off white and peach ombre anarkali suit in crushed georgette with raw silk bodice.</li>\r\n	<li>It is hand embroidered with multi colored resham, sequins, zardosi and cut dana work in floral jaal design on the bodice.</li>\r\n	<li>Crafted with halter sleeves, round neckline with hook opening and side zip closure.</li>\r\n	<li>It is topped with a powder pink net dupatta with scalloped border adorned in hand embroidery along with butti design.</li>\r\n	<li>This piece comes with padding.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please Dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: White</li>\r\n	<li>Fabric: Georgette</li>\r\n	<li>Neck Line: Halter Neckline</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n</ul>\r\n', 1, 0),
(31, 159, 178, 208, 'SG57041', 'Midnight Blue Anarkali Suit In Brocade Silk With Woven Chevron Design And Red Bandhani Dupatta', 11700, '<ul>\r\n	<li>Midnight blue anarkali suit in brocade silk with woven chevron design and embroidered tassel dori on the keyhole neckline.</li>\r\n	<li>Trimmed with mirror lace on the sleeve.</li>\r\n	<li>It is crafted with full sleeves, U ut back with tassel dori and back zip closure.</li>\r\n	<li>Topped with a contrasting red bandhani dupatta in satin with brocade border and zari trim.</li>\r\n	<li>Paired with midnight blue lycra leggings.</li>\r\n	<li>This piece comes with padding and cancan.</li>\r\n	<li>Model height - 5&#39;10 bust - 32 inches wearing size Small.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Dark Blue</li>\r\n	<li>Fabric: Brocade</li>\r\n	<li>Work: Print, Weave</li>\r\n</ul>\r\n', 1, 0),
(32, 159, 180, 209, 'SG59558', 'Light Green-Citrus Lime Lehenga In Brocade Silk With Golden And Silver Woven Moroccan Kalis And Contrasting Grey Dupatta', 16500, '<ul>\r\n	<li>Citrus lime lehenga in brocade silk with golden and silver woven moroccan floral kalis.</li>\r\n	<li>The contrasting grey waistline and hemline is enhanced with zari and sequins work.</li>\r\n	<li>Note - The border design may vary.&nbsp;</li>\r\n	<li>Teamed with a matching citrus lime unstitched blouse in brocade silk.</li>\r\n	<li>It comes with a contrasting grey dupatta with brocade buttis, scalloped border and tassels.</li>\r\n	<li>This piece comes with cancan.</li>\r\n	<li>This piece comes in a standard length of 44 inches for the lehenga.&nbsp;</li>\r\n	<li>WASH CARE INSTRUCTION: Dry clean only.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Light Green</li>\r\n	<li>Fabric: Brocade, Silk</li>\r\n	<li>Work: Weave</li>\r\n</ul>\r\n', 1, 0),
(33, 159, 182, 210, 'SG61573', 'Liberty Purple Lehenga Choli In Brocade Silk With Woven Moroccan And Floral Motifs', 16000, '<ul>\r\n	<li>Liberty purple lehenga in silk with brocade woven moroccan and floral motifs all over.</li>\r\n	<li>The border is trimmed with a contrasting pink zari lace.</li>\r\n	<li>Paired with a matching unstitched blouse.</li>\r\n	<li>The set is topped with a contrasting pink brocade dupatta with butti design and zari lace on the border.</li>\r\n	<li>This piece comes with cancan.</li>\r\n	<li>This piece comes in a standard length of 44 inches for the lehenga and 14 inches for the blouse.&nbsp;</li>\r\n	<li>Model height - 5&#39;10 bust - 32 inches wearing size Small.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Purple</li>\r\n	<li>Fabric: Silk</li>\r\n	<li>Work: Weave</li>\r\n	<li>Sleeves: Half Sleeve</li>\r\n</ul>\r\n', 1, 0),
(34, 159, 182, 211, 'SG33780', 'Tuscan Sun Yellow Skirt And Crop Top Set With Heavy Hand Embroidery Work Using Flower And Leaf Shaped Mirrors', 27000, '<ul>\r\n	<li>Tuscan sun yellow skirt and crop top set designed in net with gathered flair and golden organza frill on the hemline.</li>\r\n	<li>The crop top is made in raw silk with fancy flower and leaf shaped mirrors along with french knots and zardosi detailing.</li>\r\n	<li>It is crafted with spaghetti straps on the shoulders, tube neckline and side zip closure.</li>\r\n	<li>Topped with a matching net dupatta with organza frill on the border and cut dana and mirror detailing.</li>\r\n	<li>This piece comes with cancan.</li>\r\n	<li>WASH CARE INSTRUCTION: Dry clean only.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Yellow</li>\r\n	<li>Fabric: Net</li>\r\n	<li>Work: Mirror, Zardosi</li>\r\n	<li>Closure: Side Zip</li>\r\n	<li>Neck Line: Symetric</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n</ul>\r\n', 1, 0),
(35, 159, 160, 212, 'SG68250', 'Melon Peach Skirt And Crop Top With Deep V Neckline And Adorned In 3D Flowers And Multicolored Hand Embroidery', 24000, '<ul>\r\n	<li>Melon peach skirt in crepe with frill detailing on the hemline and embroidered waist.</li>\r\n	<li>It is paired with a matching choli in raw silk with 3D flowers, multi colored beads and cut dana embroidered floral jaal.</li>\r\n	<li>Designed sleeveless with V neckline and back hook closure along with tassel dori.</li>\r\n	<li>Topped with a matching net dupatta with cut dana embroidered border and butti design.</li>\r\n	<li>This piece comes with padding.</li>\r\n	<li>It does not have cancan.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please Dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Peach</li>\r\n	<li>Fabric: Crepe</li>\r\n	<li>Work: 3D flower, Cut Dana, French Knot, Sequins</li>\r\n	<li>Neck Line: V-Neckline</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n</ul>\r\n', 1, 0),
(36, 159, 160, 213, 'SG53968', 'Ivory White Lehenga Choli In Raw Silk With Colorful Resham And Cut Dana Embroidered Summertime Flowers And Heritage Motifs', 165000, '<ul>\r\n	<li>Ivory white lehenga choli made in luxurious raw silk and intricate embroideries is a must have for the bride.</li>\r\n	<li>The lehenga is adorned with colorful resham, cut dana, sequins and multicolor beads in summertime flowers and heritage motifs.</li>\r\n	<li>It is paired with a heavily embroidered sleeveless choli in raw silk with a sweetheart neckline and curved hem.</li>\r\n	<li>The lehenga choli is set together with a mint net dupatta with delicately embroidered buttis and border.</li>\r\n	<li>This piece comes with cancan.</li>\r\n	<li>WASH CARE INSTRUCTION: Dry clean only.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: White</li>\r\n	<li>Fabric: Raw silk</li>\r\n	<li>Work: Embroidery, Cut Dana, Floral, Handwork</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n</ul>\r\n', 1, 0),
(37, 111, 120, 122, 'SG19492', 'Dark Maroon Off Shoulder Gown Adorned In Embossed Thread And Sequin Embroidery', 10800, '<ul>\r\n	<li>Featuring off shoulder gown in dark maroon net.</li>\r\n	<li>Its embellished in embossed thread embroidery all over further embellished in sequin work all over.</li>\r\n	<li>It comes with 3/4 sleeve length.</li>\r\n	<li>Note - This piece will come in standard measurements as mentioned in the size chart. Customisation is not available.&nbsp;</li>\r\n	<li>Slight variation in color is possible due to digital photography</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:300px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>Color:</td>\r\n			<td>Maroon</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fabric:</td>\r\n			<td>Net</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Work:</td>\r\n			<td>Embroidery, Sequins, Thread/Resham</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Closure:</td>\r\n			<td>Side Zip</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Neck Line:</td>\r\n			<td>Off-Shoulder</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Sleeves:</td>\r\n			<td>Half Sleeve</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 1, 0),
(38, 111, 120, 121, 'SG68296', 'Sea Fog Purple Gown In Shimmer Crush With Cut Dana Embroidered Bodice And Belt', 20000, '<ul>\r\n	<li>Sea fog purple gown in shimmer crush fabric with cut dana embroidery in geometric design on the bodice.</li>\r\n	<li>The waist is highlighted with a cut dana embroidered belt.</li>\r\n	<li>Crafted sleeveless with a cut out back and side zip closure.</li>\r\n	<li>This piece comes with padding and cancan.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Purple</li>\r\n	<li>Fabric: Crushed</li>\r\n	<li>Work: Embroidery, Cut Dana</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(39, 111, 120, 121, 'SG58562', 'Burgundy Gown In Sequins Embellished Net With Attached Cape And Cut Dana Accented Front Cut Bodice', 20500, '<ul>\r\n	<li>Burgundy gown in net with sequins embellished striped design and velvet bodice.</li>\r\n	<li>It is adorned with fancy cut sequins, cut dna and kundan work on the bodice.</li>\r\n	<li>It is crafted sleeveless with front cut out, sweetheart neckline and back zip closure.</li>\r\n	<li>Designed with attached cape dupattas on the shoulders in striped sequin embellished net.</li>\r\n	<li>This piece comes with cancan.</li>\r\n	<li>WASH CARE INSTRUCTION: Dry clean only.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Burgundy</li>\r\n	<li>Fabric: Net</li>\r\n	<li>Work: Cut Dana, Embellished, Sequins</li>\r\n	<li>Closure: Back Zip</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(40, 111, 120, 121, 'SG83032', 'Shadow Green Gown With Ruched Bodice And Fancy Ruffled Layers', 17000, '<ul>\r\n	<li>Shadow green Gown in satin silk with ruched bodice and fancy layers.</li>\r\n	<li>It is embellished with cut dana, pearls and beads.</li>\r\n	<li>Crafted sleeveless with round neckline, sheer net cut outs on the waist and back and side zip closure.</li>\r\n	<li>This piece comes with padding and cancan.</li>\r\n	<li>The layers are edged with wires to give it a lovely ruffle fall.</li>\r\n	<li>Model height - 5&#39;10 bust - 32 inches wearing size Small.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Green</li>\r\n	<li>Fabric: Satin, Silk</li>\r\n	<li>Work: Embroidery, Bead</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(41, 111, 120, 124, 'SG23242', 'Eve Champagne Gown In Hand Embellished Net With Geometric Motifs', 18000, '<ul>\r\n	<li>Eve Champagne gown in hand embellished net with cut dana and sequins cut in different shapes in a gradient pattern and geometric motifs.</li>\r\n	<li>Crafted with embellished straps and tube neckline.</li>\r\n	<li>It comes with layered net under layer.</li>\r\n	<li>Topped with an embellished choker with three layered body chain tassels on the shoulder.</li>\r\n	<li>This piece comes with cancan.</li>\r\n	<li>WASH CARE INSTRUCTION: Dry clean only.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Champagne</li>\r\n	<li>Fabric: Net</li>\r\n	<li>Work: Embroidery, Cut Dana, Handwork, Sequins</li>\r\n	<li>Closure: Side Zip</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(42, 111, 112, 118, 'SG39428', 'Champagne Tiered Gown With An Embellished Plunging V Cut Bodice And Shimmer Underlayer', 18500, '<ul>\r\n	<li>Champagne tiered gown in net with a front slit that reveals a gorgeous crushed shimmer underlayer.</li>\r\n	<li>Adorned with cut dana, sequins and zardozi work in floral pattern on the bodice.</li>\r\n	<li>Crafted sleeveless with plunging V neckline and deep cut back.</li>\r\n	<li>Set together with a matching net dupatta with embroidered choker and sequins buttis.</li>\r\n	<li>This piece comes with cancan.</li>\r\n	<li>WASH CARE INSTRUCTION: Dry clean only.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Champagne</li>\r\n	<li>Fabric: Sequins</li>\r\n	<li>Work: Embroidery, Cut Dana, Floral, Zardosi</li>\r\n	<li>Closure: Side Zip</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(43, 111, 120, 123, 'SG53462', 'Pale Turquoise Gown With Front Cut Out On The Hand Embroidered Bodice And Topped With Matching Cape Jacket', 25000, '<ul>\r\n	<li>Pale Turquoise gown in crushed crepe with gathers at the waist and raw silk bodice.</li>\r\n	<li>The bodice is adorned with cut dana and sequins in honeycomb motifs.</li>\r\n	<li>It is designed sleeveless with front cut out, sweetheart neckline and side zip closure.</li>\r\n	<li>The piece is topped with a matching net cape style jacket with tassels on the border.</li>\r\n	<li>This piece comes with cancan.</li>\r\n	<li>WASH CARE INSTRUCTION: Dry clean only.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Turq</li>\r\n	<li>Fabric: Raw silk</li>\r\n	<li>Work: Cut Dana, Sequins</li>\r\n	<li>Closure: Side Zip</li>\r\n	<li>Inclusive of all taxes</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n</ul>\r\n', 1, 0),
(44, 77, 86, 88, 'SG92242', 'Nautical Blue Blouse In Raw Silk With Plunging V Neckline And Side Cut Outs', 2000, '<ul>\r\n	<li>Nautical blue blouse in raw silk with plunging V neckline and cut out on the waist.</li>\r\n	<li>Crafted with V cut back with hook closure and tassel dori tie up.</li>\r\n	<li>It comes with padding.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Blue</li>\r\n	<li>Fabric: Raw silk</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(46, 52, 53, 55, 'SG73173', 'Lime Green Saree In Georgette With Elaborate Ruffle Sleeved Crop Top And Heavy Stone Embroidered Belt', 15000, '<ul>\r\n	<li>Lime green saree in georgette crepe with an organza ruffle frill on the pallu.</li>\r\n	<li>The highlight of the piece is the heavy embroidered belt with green stones, cut dana, sequins and moti work along with tassel detailing.</li>\r\n	<li>It is paired with a raw silk blouse with elaborate layered ruffle sleeves.</li>\r\n	<li>Crafted with a plunging neckline, side zip closure and cut out back with tassel dori.</li>\r\n	<li>This piece comes with padding.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable .</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Green</li>\r\n	<li>Fabric: Georgette</li>\r\n	<li>Work: Embroidery, Cut Dana, Stone</li>\r\n	<li>Sleeves: Fancy Sleeves</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 2),
(47, 52, 53, 59, 'SG28505', 'Powder Blue Saree In Georgette With Ready Pleated Ruffle Pallu', 20000, '<ul>\r\n	<li>Powder blue saree in georgette with ready pleated ruffle pallu.</li>\r\n	<li>Adorned with cut dana, zari and sequin discs on the border.</li>\r\n	<li>Hemline adorned with ruffle layers.</li>\r\n	<li>Teamed with a matching heavy embellished blouse with cut dana, beads and sequins discs in scallop pattern.</li>\r\n	<li>Trimmed with cut dana fringes on the hem.</li>\r\n	<li>Designed sleeveless with sweetheart neckline and scallop cut hemline.</li>\r\n	<li>WASH CARE INSTRUCTION: Dry clean only.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Blue</li>\r\n	<li>Fabric: Georgette</li>\r\n	<li>Work: Embroidery, Cut Dana, Embellished, Handwork, Sequins</li>\r\n	<li>Closure: Side Zip</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 2),
(48, 52, 68, 73, 'SG26412', 'Tejaswini Pandit In Kalki Bottle Green Ready Pleated Saree In Georgette With Ruffled Pallu', 35000, '<ul>\r\n	<li>&zwnj;Look fabulous as adorn your self in this stunning bottle green ready pleated georgette saree.</li>\r\n	<li>It has pre-stitched pleats with embellished waist along with ruffled hem and pallo.</li>\r\n	<li>It comes with a matching halter neck raw silk blouse with back zip opening.</li>\r\n	<li>Embellished in multicolor floral resham embroidery along with cut dana, sequins, resham, moti, pot and zari detailing.</li>\r\n	<li>Celebrity - Tejaswini Pandit.</li>\r\n	<li>WASH CARE INSTRUCTION: Dry clean only.</li>\r\n	<li>Slight variation in color is possible.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Dark Green</li>\r\n	<li>Fabric: Georgette</li>\r\n	<li>Work: Embroidery, Floral, Thread/Resham, Zardosi</li>\r\n	<li>Neck Line: Halter Neckline</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(49, 52, 53, 56, 'SG73389', 'Powder White Saree In Organza With 3D Flower Embroidered Border And Buttis Featuring Multi Colored Moti And Sequins', 45000, '<ul>\r\n	<li>Powder white saree in organza with 3D flower embroidered border and buttis adorned in multi colored moti, sequins and cut dana work.</li>\r\n	<li>Paired with an unstitched blouse piece.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: White</li>\r\n	<li>Fabric: Organza</li>\r\n	<li>Work: Embroidery, Moti, Sequins</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(50, 52, 63, 65, 'SG63149', 'Baby Pink Saree In Organza With Floral Print All Over And Scalloped Resham Border Along With Unstitched Blouse', 5000, '<ul>\r\n	<li>Baby pink saree in organza with floral print and scattered moti work.</li>\r\n	<li>The border is adorned with resham work in scallop design.</li>\r\n	<li>Note - The border color may vary.</li>\r\n	<li>It is paired with a matching pink unstitched blouse in silk.</li>\r\n	<li>Please note that the blouse worn by the model is for styling purpose only.&nbsp;</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Pink</li>\r\n	<li>Fabric: Organza</li>\r\n	<li>Work: Embroidery, Border,</li>\r\n	<li>Printnclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(52, 52, 63, 65, 'SG53182', ' Embellished In Sequins With Fringes On The Pallu And Unstitched Blouse', 17000, '<ul>\r\n	<li>embellished in sequins&nbsp;with fringes on the pallu and unstitched blouse piece.</li>\r\n	<li>The border is enhanced with sequins and cut dana work.</li>\r\n	<li>The unstitched blouse is fabricated in satin with sequins and cut dana work.</li>\r\n	<li>The length of the blouse is 1.15 meters.</li>\r\n	<li>WASH CARE INSTRUCTION: Dry clean only.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: white</li>\r\n	<li>Fabric: Sequins</li>\r\n	<li>Work: Embellished, Sequins</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 2),
(53, 148, 149, 151, 'SG52514', 'Yellow Dhoti And Kurta Set In Angrakha Style With Woven Buttis By Tiber Taber', 2000, '<ul>\r\n	<li>The breezy and vibrant yellow Dhoti-Kurta, made in classic traditional colours is perfect for your tiny prince this festive season.</li>\r\n	<li>Made in premium South cotton, the fabric is comfortable and breathable.</li>\r\n	<li>Crafted in angrakha style with round neckline and full sleeves.</li>\r\n	<li>The kurta is enhanced with woven buttis.</li>\r\n	<li>The orange dhoti pants have a yellow piping on the edges.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Yellow</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Weave</li>\r\n	<li>Neck Line: Round</li>\r\n	<li>Sleeves: Full Sleeves</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(54, 148, 149, 151, 'SG54493', 'White Kurta And Dhoti Set In Chanderi Cotton Silk With Zari Embroidered Floral Butti Work By Tiber Taber', 2500, '<ul>\r\n	<li>Quintessential traditional outfit for any ceremony or celebrations, this heirloom look can never go out of style.</li>\r\n	<li>2 Pc Dhoti Kurta set is crafted in luxurious cotton silk chanderi and embellished with subtle floral embroidery.</li>\r\n	<li>Especially constructed for infants, this shall guarantee long hours of comfort and style.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: White</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Zari</li>\r\n	<li>Sleeves: Full Sleeves</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0);
INSERT INTO `tbl_product` (`product_id`, `main_id`, `sub_id`, `peta_id`, `code`, `name`, `price`, `description`, `specification`, `status`, `offer_id`) VALUES
(55, 148, 149, 151, 'SG61440', 'Blue Kurta And Dhoti Set In Hand-woven Cotton Silk With Delicate Embroidery On The Yoke By Tiber Taber', 1750, '<ul>\r\n	<li>Tiber Taber signature line of classic ethnic looks are perfect for any celebration.</li>\r\n	<li>Featuring luxurious hand-woven silk blends, rich color palette and delicate embroidery.</li>\r\n	<li>The collection is meticulously crafted to ensure best fits and maximum comforts for the little one.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Blue</li>\r\n	<li>Fabric: Cotton silk</li>\r\n	<li>Work: Embroidery</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(56, 148, 149, 151, 'SG61431', 'Maroon Kurta Set In Hand-woven Cotton Silk With Delicate Embroidery On The Yoke By Tiber Taber', 3000, '<ul>\r\n	<li>Tiber Taber signature line of classic ethnic looks are perfect for any celebration.</li>\r\n	<li>Featuring luxurious hand-woven silk blends, rich color palette and delicate embroidery.</li>\r\n	<li>The collection is meticulously crafted to ensure best fits and maximum comforts for the little one.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Maroon</li>\r\n	<li>Fabric: Cotton silk</li>\r\n	<li>Work: Embroidery</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(57, 148, 149, 151, 'SG68193', 'Blue Kurta And Salwar Set Featuring Printed Buttis In Bee And Beehive Motifs By Fayon Kids', 2400, '<ul>\r\n	<li>Looking for a funky yet elegant wear for your boy? Look at this lovely Kurta-Salwar set with blue kurta and off-white pants.</li>\r\n	<li>It has beehive and bee imprint on the kurta in fresh blue color.</li>\r\n	<li>The Kurta is made of cotton and the pants is crepe.</li>\r\n	<li>The Kurta is with a collar, cuffed sleeves and slap pockets.</li>\r\n	<li>It has carefully sewed wooden button in the front.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Blue</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Print</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(58, 148, 149, 151, 'SG68197', 'Black Bandhgala Set In Suiting Fabric With Mirror Embroidered Buttons By Fayon Kids', 5350, '<ul>\r\n	<li>Deciding on an outfit for your champ for the upcoming special ceremony? Take a pick with this amazing Bandhgala set which comes in suiting fabric carefully crafted to every detail to give your child the best fit and comfort.</li>\r\n	<li>It has mirror work button embroidered to it and has soft lining.</li>\r\n	<li>Black is surly a color of the majestic&#39;s.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Black</li>\r\n	<li>Fabric: Suiting</li>\r\n	<li>Work: Embroidery, Mirror</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(59, 148, 149, 152, 'SG54483', 'White Kurta Set With Embroidered Buttis And Black Nehru Jacket With Ornate Embroidered Motif By Tiber Taber', 3550, '<ul>\r\n	<li>Go regal in the classic way with 3 Pc Bundi set from Tiber Taber.</li>\r\n	<li>The Quintessential color palette of black and white, the set is finely tailored in premium cotton fabrics.</li>\r\n	<li>It comprises of an nehru jacket featuring intricate ornate embroidery.</li>\r\n	<li>White Kurta set also features subtle embroidery.</li>\r\n	<li>This look shall never go out of style! Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Black</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Zari</li>\r\n	<li>Sleeves: Full Sleeves</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(60, 148, 149, 152, 'SG68192', 'Off White Embroidered Nehru Jacket With Mustard Yellow Kurta And Churidar By Fayon Kids', 5650, '<ul>\r\n	<li>Ethnic Wear is incomplete without Nehru Jackets.</li>\r\n	<li>This beautiful Nehru jacket set that comes with silk kurta-churidar and along with embroidered mustard jacket is an outfit your munchkin would look super handsome and occasion ready in.</li>\r\n	<li>The Kurta has intricate embroidery on the neckline and self button in the front.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: White</li>\r\n	<li>Fabric: Cotton silk</li>\r\n	<li>Work: Embroidery</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(61, 148, 149, 152, 'SG89417', 'Blue And Black Ajkan With Embroidery Detailing And Black Pant By Fayon Kids', 7200, '<ul>\r\n	<li>Blue and Black Embroidery Ajkan with Black Pant Set.</li>\r\n	<li>Fabricated in cotton with embroidery detailing.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Blue</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Embroidery</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(62, 148, 149, 152, 'SG88305', 'Black Bundi And Olive Kurta Set With Printed Buttis By Tiber Taber', 3400, '<ul>\r\n	<li>The traditional ethnic ensemble is redefined with printed floral kurta set and embroidered Nehru jacket.</li>\r\n	<li>The finely crafted 3 pc set is a perfect combination of modern subtlety and traditional charm.</li>\r\n	<li>All over Printed Floral kurta set in olive green is paired with black Nehru jacket.</li>\r\n	<li>Made in 100% cotton, it can be layered with warm layers for winters and worn as is for breezy summers.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Black</li>\r\n	<li>Inclusive of all taxes</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Print</li>\r\n</ul>\r\n', 1, 0),
(63, 148, 149, 152, 'SG54470', 'Teal Kurta Set With Elephant Motifs And Green Nehru Jacket With Kantha Work By Tiber Taber', 3600, '<ul>\r\n	<li>The classic ethnic ensemble promises a dapper look with a pastel green jacket and a rich hued teal kurta set.</li>\r\n	<li>It comprises of a kantha stich silk nehru jacket, finely tailored and finished with ornate metal buttons.</li>\r\n	<li>The teal silk kurta set has cute elephant motifs embellished subtly using thread and zari.</li>\r\n	<li>A versatile garment, it looks equally appealing with or without the Nehru jacket.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Green, Teal</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Zari</li>\r\n	<li>Sleeves: Full Sleeves</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(64, 148, 153, 155, 'SG80217', 'Khaki Lehenga And Blue Choli Set In Polyster With Floral Yoke Design By Mini Chic', 5600, '<ul>\r\n	<li>This celebration season, we are all about making your adorable little one look like an absolute trendsetter with this stunning blue choli set paired with contrasting khaki lehenga and a matching dupatta to complete the look.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Blue</li>\r\n	<li>Fabric: Polyester</li>\r\n	<li>Work: Floral</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(65, 148, 153, 155, 'SG86455', 'Beige Tuffle Top And Contrasting Lehenga Set With Sequins Embroidery In Geometric Motifs By Mini Chic', 6500, '<ul>\r\n	<li>Brighten up your lil girl&#39;s wardrobe with something stylish this season with this Beige lehenga set from Mini Chic.</li>\r\n	<li>Designed with sequin work, your princess will stand in grace and beauty by teaming ethnic footwear with this trendy outfit.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Beige</li>\r\n	<li>Fabric: Net, Organza</li>\r\n	<li>Work: Embroidery, Sequins</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(66, 148, 153, 155, 'SG80313', 'Red Crop Top And Lehenga Set With Embroidered Buttis By Mini Chic', 4200, '<ul>\r\n	<li>Imagine how dapper your little munchkin would look draped in this ethnic ensemble that represents the robust hues of this celebration season.</li>\r\n	<li>Presenting a stunning red lehenga and choli set complete with a matching dupatta.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Red</li>\r\n	<li>Fabric: Polyester</li>\r\n	<li>Work: Embroidery</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(67, 148, 153, 155, 'SG40760', 'Light Blue Lehenga In Brocade Silk With Weaved Floral Jaal And Off White Choli By Fayon Kids', 5350, '<ul>\r\n	<li>Light Blue lehenga in Brocade Silk with Weaved floral jaal and Gotta Lace on the border.</li>\r\n	<li>Teamed with an Off White choli with Sequins embroidered buttis.</li>\r\n	<li>Designed with curved V neckline, cut out back and cap sleeves.</li>\r\n	<li>Topped with a contrasting Peach Net dupatta with embellished buttis and Lace border.</li>\r\n	<li>WASH CARE INSTRUCTION: Dry clean only.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Blue</li>\r\n	<li>Fabric: Brocade</li>\r\n	<li>Work: gotta lace, Sequins, Weave</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(68, 148, 153, 155, 'SG88481', 'Magenta And Ivory Lehenga Choli In Jacquard With Color Blocking And Gotta Embroidery', 5600, '<ul>\r\n	<li>Regal opulent jacquard lehenga colour-blocked in hue of magenta &amp; ivory panels.</li>\r\n	<li>Lehenga adorned with border detailing, trims &amp; latkan.</li>\r\n	<li>Top highlighted with yoke &amp; gota trims.</li>\r\n	<li>Dupatta accentuated with beautiful trims.</li>\r\n	<li>Fabricated in Jacquard silk, net, cotton, santon &amp; can-can.</li>\r\n	<li>It comes with Hooks in the back and Elasticized waistband at the back of lehenga.</li>\r\n	<li>It has a Pre-washed cotton lining in top &amp; bottom.</li>\r\n	<li>Wash care is Dry clean only.</li>\r\n	<li>This is a non-returnable product Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>&nbsp;</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color:&nbsp; Pink</li>\r\n	<li>Fabric: Jacquard</li>\r\n	<li>Work: Embroidery, Gotta Patti, Weave</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(69, 148, 153, 155, 'SG77912', 'Peach Lehenga And Ruffled Top With Puffed Sleeves And Floral Print Free Sparrow', 4700, '<ul>\r\n	<li>Floral fun loving lehenga teamed with an embellished ruffled top &amp; puffed sleeves.</li>\r\n	<li>Chic embellished top with ruffles.</li>\r\n	<li>Material: Georgette, can-can.</li>\r\n	<li>Color: Peach.</li>\r\n	<li>Closure: Hooks in the back.</li>\r\n	<li>Waist: Elasticized waistband at the back of lehenga.</li>\r\n	<li>Lining: Pre-washed cotton in top &amp; bottom.</li>\r\n	<li>Wash care: Dry clean only.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Peach</li>\r\n	<li>Fabric: Georgette</li>\r\n	<li>Work: Print</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(70, 148, 153, 155, 'SG77896', 'Blue And White Lehenga And Crop Top With Chevron Print And Layered Jacket Free Sparrow', 4250, '<ul>\r\n	<li>Flouncy lehenga with chevron print teamed with contrast bustier &amp; tiered jacket.</li>\r\n	<li>Lehenga highlighted with beautiful crochet trims.</li>\r\n	<li>Tiered jacket featured with beautiful trims.</li>\r\n	<li>Material: Georgette, dupion silk, cotton, santon &amp; can-can.</li>\r\n	<li>Color: Blue and white.</li>\r\n	<li>Closure: Hooks in the back.</li>\r\n	<li>Waist: Elasticized waistband at the back of lehenga.</li>\r\n	<li>Lining: Pre-washed cotton in top &amp; bottom.</li>\r\n	<li>Wash care: Dry clean only.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Blue</li>\r\n	<li>Fabric: Georgette</li>\r\n	<li>Work: Print</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(71, 148, 153, 155, 'SG68170', 'Off White Lehenga Choli With Thread And Gotta Patti Embroidery And Contrasting Mustard Frill By Fayon Kids', 7200, '<ul>\r\n	<li>This elegant off-white and mustard Lehenga Choli set is a lovely outfit to add to your angel&#39;s wardrobe.</li>\r\n	<li>It comes with embroidered choli with cape sleeves, has finishing lace and tassels on the back.</li>\r\n	<li>It has a detachable belt which also has matching tassels on the side.</li>\r\n	<li>The Lehenga has a lovely mustard colored net frill on the bottom edging all around it and has comfortable cotton lining.</li>\r\n	<li>This outfit comes with matching net dupatta, made of fine quality.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Off-white</li>\r\n	<li>Fabric: Net</li>\r\n	<li>Work: Embroidery, Gotta Patti</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(72, 148, 153, 156, 'SG90074', 'Peach Gown In Net With Sequin Fringes And Puff Sleeves', 2850, '<ul>\r\n	<li>Peach gown in net with sequin fringes and resham embroidery on the bodice.</li>\r\n	<li>It is crafted with short puff sleeves, illusion neckline and back zip closure.</li>\r\n	<li>This piece comes with cancan.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Peach</li>\r\n	<li>Fabric: Net</li>\r\n	<li>Work: Embroidery, Sequins</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(73, 148, 153, 156, 'SG88817', 'Burgundy Layered Gown In Net With Ruffle Layers And Iridescent Crystals', 8000, '<ul>\r\n	<li>An alluring burgundy gown customized in tulle with flouncy ruffled tiers &amp; beautiful crystals.</li>\r\n	<li>Bodice accentuated with tucks &amp; iridescent crystals on a translucent mesh.</li>\r\n	<li>Sleeves accentuated with crystals.</li>\r\n	<li>It comes with a matching hair accessory.</li>\r\n	<li>Fabricated in Net, dupion silk &amp; cotton.</li>\r\n	<li>It has a Concealed zip in the back and Pre-washed cotton lining.</li>\r\n	<li>Wash care is Dry clean only.</li>\r\n	<li>This is a non-returnable product.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Burgundy</li>\r\n	<li>Fabric: Net</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(74, 148, 153, 156, 'SG90035', 'Candy Pink Gown With Net Frill Layers And Sequins Embroidered Floral Design', 5350, '<ul>\r\n	<li>Candy pink gown in net with frill layers.</li>\r\n	<li>Enhanced with resham and sequins embroidered floral design on the bodice.</li>\r\n	<li>Crafted sleeveless with illusion neckline and back zip.</li>\r\n	<li>This piece comes with cancan.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Baby Pink</li>\r\n	<li>Fabric: Net</li>\r\n	<li>Work: Embroidery, Sequins</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(75, 148, 153, 156, 'SG88833', 'Blue Layered Gown In Net With Ruffle Layers And Iridescent Crystals', 8100, '<ul>\r\n	<li>An alluring blue gown customized in tulle with flouncy ruffled tiers &amp; beautiful crystals.</li>\r\n	<li>Bodice accentuated with tucks &amp; iridescent crystals on a translucent mesh.</li>\r\n	<li>Sleeves accentuated with crystals.</li>\r\n	<li>It comes with a matching hair accessory.</li>\r\n	<li>Fabricated in Net, dupion silk &amp; cotton.</li>\r\n	<li>It has a Concealed zip in the back and Pre-washed cotton lining.</li>\r\n	<li>Wash care is Dry clean only.</li>\r\n	<li>This is a non-returnable product.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Blue</li>\r\n	<li>Fabric: Net</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(76, 148, 153, 156, 'SG68198', 'Wine Dress In Lycra With Ruffle Detailing And Golden Sequins Bow By Fayon Kids', 7900, '<ul>\r\n	<li>This pretty neoprene dress in red wine color is a must-have in your angel&#39;s wardrobe.</li>\r\n	<li>It is crafted with care for the perfect gentle flair and has golden sequined bow embedded on the front.</li>\r\n	<li>It is a perfect spring and winter dress.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Wine</li>\r\n	<li>Fabric: Lycra</li>\r\n	<li>Work: Sequins</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(77, 148, 153, 156, 'SG80193', 'Red Gown In Net With Butti Detailing By Mini Chic', 7500, '<ul>\r\n	<li>Your baby girl deserves a robust burst of lively hues this festive season and what better color to drape than this chic red party gown with sleeves to complement the festive ambience.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Red</li>\r\n	<li>Fabric: Net</li>\r\n	<li>Work: Booti Work</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(78, 148, 153, 157, 'SG90016', 'Rose Pink Sharara And Peplum Suit In Cotton With Floral Print And Ruffle Sleeves', 6700, '<ul>\r\n	<li>Rose pink suit peplum suit in cotton with floral print and zari lace.</li>\r\n	<li>Crafted with round neckline and 3/4th ruffle sleeves.</li>\r\n	<li>Paired with purple sharara pants with lace detailing.</li>\r\n	<li>Topped with a purple dupatta in butti net with tassels on the corner.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Rose Pink</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Lace, Print</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(79, 148, 153, 157, 'SG73139', 'Lime Green Layered Sharara And Bell Sleeved One Shoulder Crop Top Set With Mirror Work By Mini Chic', 3400, '<ul>\r\n	<li>Staying minty fresh this season just got easier for your little princess with this 100% cotton one shoulder bell sleeved top and sharara set in intricate mirror work, complete with a dupatta.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please Dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Green</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Embroidery, Mirror</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', 1, 0),
(80, 148, 153, 157, 'SG90093', 'Royal Blue Suit In Velvet With Peach Palazzo Adorned In Gotta Lace', 7200, '<ul>\r\n	<li>Royal blue suit in velvet with zari patchwork on the neckline.</li>\r\n	<li>Crafted with round neckline and 3/4th ruffle sleeves.</li>\r\n	<li>Paired with peach sharara pants in net with gotta lace embroidered hemline.</li>\r\n	<li>Topped with a peach net dupatta with velvet border.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Blue</li>\r\n	<li>Fabric: Velvet</li>\r\n	<li>Work: gotta lace</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(81, 148, 153, 157, 'SG77789', 'Blue Sharara Suit And Peplum Kurti With Attached Jacket And Floral Zari Work Free Sparrow', 5350, '<ul>\r\n	<li>Alluring sharara &amp; peplum highlighted with attached jacket &amp; floral zari work.</li>\r\n	<li>Peplum top styled with attached jacket &amp; trims.</li>\r\n	<li>Trendy sleeves with slit &amp; trims.</li>\r\n	<li>Tiered sharara &amp; dupatta embellished with beautiful trims.</li>\r\n	<li>Material: Dupion silk,santon &amp; net.</li>\r\n	<li>Color: Hue of blue.</li>\r\n	<li>Closure: Concealed zip in the back.</li>\r\n	<li>Waist: Elasticized waistband at the back of sharara.</li>\r\n	<li>Lining: Pre-washed cotton in peplum &amp; santon in sharara.</li>\r\n	<li>Wash care: Dry clean only.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Blue</li>\r\n	<li>Fabric: Dupion, Silk</li>\r\n	<li>Work: Embroidery, Zari</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(82, 148, 153, 157, 'SG68163', 'Pista Green Anarkali With Pink Frill And Gotta Embroidery By Fayon Kids', 4700, '<ul>\r\n	<li>Getting ready for a big fat Indian wedding and looking for that perfect outfit for your princess? Take a pick with this elegant Anarkali set which is intricately crafted with detailing to every thread.</li>\r\n	<li>The lovely pastel pistachio and contrasting frill on the edges is a perfect combo to set a style statement.</li>\r\n	<li>It comes with full sleeves, without lining and has a detachable belt with elegant tassels.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Green</li>\r\n	<li>Fabric: Georgette</li>\r\n	<li>Work: Embroidery, Gotta Patti</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(83, 148, 153, 157, 'SG91010', 'Off White A Line Kurta Set With Holi Embroidery And Tassels', 3450, '<ul>\r\n	<li>My 1st Holi Embroidered kurta.</li>\r\n	<li>Double layered Kurta with A- line cut.</li>\r\n	<li>It comes with titch button opening on the shoulders.</li>\r\n	<li>Adorned with colorful tassel finishings.</li>\r\n	<li>Pyjama with lace finishings and Elasticated waist.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Off-white</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Color: Off-white</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(84, 148, 153, 157, 'SG88266', 'Yellow Salwar Suit In Cotton With Bandhani Print By Tiber Taber', 5350, '<ul>\r\n	<li>This vibrant Bandhani suit set and its contemporary silhouette is perfect for any festive occasion.</li>\r\n	<li>Made in 100% cotton, its unique trims and tassles paired with a dupatta creates the perfect neo-ethnic look .</li>\r\n	<li>Wear it as a set for any desi festivities or like a dress for a fun play date.</li>\r\n	<li>The adjustable size and natural material ensure utmost comfort for the little one, so the best smile is always on.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Yellow</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Lace, Print</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(85, 148, 153, 157, 'SG80273', 'Grey Crop Top And Pink Dhoti Set With Embroidery Detailing By Mini Chic', 2500, '<ul>\r\n	<li>This celebration season we are bringing some fresh fashion trends to your little princess&rsquo;s ethnic wardrobe just like this stunning combination of grey and pink dhoti set complete with a matching dupatta for your little one to flaunt.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Grey</li>\r\n	<li>Work: Embroidery</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(86, 148, 153, 157, 'SG88401', 'Peach Palazzo And Crop Top Set With Floral Print And Ruffles', 4800, '<ul>\r\n	<li>Floral fun loving peach palazzo teamed with an elegant ruffled top &amp; puffed sleeves.</li>\r\n	<li>Chic embellished top with ruffles.</li>\r\n	<li>Fabricated in Georgette.</li>\r\n	<li>It comes with Hooks in the back.</li>\r\n	<li>It has a Pre-washed cotton lining in top &amp; santon in bottom.</li>\r\n	<li>Wash care is Dry clean only.</li>\r\n	<li>This is a non-returnable product.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Peach</li>\r\n	<li>Fabric: Georgette</li>\r\n	<li>Work: Print</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(87, 148, 153, 157, 'SG65090', 'Yellow Backless Crop Top And Culottes Set In Cotton With Tie - Dye Print By Tiber Taber', 5800, '<ul>\r\n	<li>This bright yellow top set uses the indigenous tie and dye technique to create the perfect blend of desi and urban sensibilities.</li>\r\n	<li>The backless top, paired with culottes ensures maximum comfort with no compromise on style.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Yellow</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Print</li>\r\n	<li>Sleeves: Cap Sleeves</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(88, 148, 153, 157, 'SG88721', 'Pink And Fuchsia Anarkali Suit In Cotton With Jaipuri Print And Lace DetailingPink And Fuchsia Anarkali Suit In Cotton With Jaipuri Print And Lace Det', 5950, '<ul>\r\n	<li>Contemporary Anarkali ensemble customised in beautiful Jaipuri print teamed with tulle dupatta.</li>\r\n	<li>Pink and fuchsia Anarkali accentuated with contrast ricrac lace &amp; trims.</li>\r\n	<li>Fuchsia Dupatta accentuated with beautiful trims.</li>\r\n	<li>Fabricated in Cotton &amp; net.</li>\r\n	<li>It has a Concealed zip in the back and a Pre-washed cotton lining.</li>\r\n	<li>Wash care is Dry clean only.</li>\r\n	<li>This is a non-returnable product Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Pink</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Embroidery, Lace, Print</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(89, 148, 153, 157, 'SG65081', 'Indigo Blue Ombre Salwar Suit Set In Cotton With Shibori Tie - Dye Print And Flower Tassels By Tiber Taber', 1600, '<ul>\r\n	<li>This statement indigo top set and its contemporary design redefines festive dressing.</li>\r\n	<li>Crafted in 100% cotton, it is tie-dyed using the shibori technique to add a desi touch.</li>\r\n	<li>Wear it as a set for a neo-ethnic look or like a dress for a play date, the versatility of this look is sure to make it her favorite.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the websitc.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Dark Blue</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(90, 148, 149, 152, 'SG89402', 'Aqua Nehru Jacket And Shaded Kurta Set With Embroidery Detailing By Fayon Kids', 6420, '<ul>\r\n	<li>The best contrast colour is here for the season, with white and blue.</li>\r\n	<li>Aqua embroidered jacket with shaded kurta and pant set.</li>\r\n	<li>Designed with full sleeves and broach on the pocket.</li>\r\n	<li>Faded aqua blue and off-white colour style.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Light Blue</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Embroidery</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(91, 148, 149, 151, 'SG65033', 'Orange Ombre Kurta In Cotton With Shibori Tie - Dye Print By Tiber Taber', 1200, '<ul>\r\n	<li>This vibrant kurta is the desi touch your child&#39;s wardrobe needs.</li>\r\n	<li>The kurta is tie-dyed by hand to create unique patterns using twists, turns and folding.</li>\r\n	<li>It can be paired with jeans or pajamas to create equally promising casual or festive looks.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Orange</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Print</li>\r\n	<li>Sleeves: Full Sleeves</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(92, 148, 149, 151, 'SG84296', 'Dark blue kurta set with embroidered checks by fayon kids', 5300, '<ul>\r\n	<li>This Dark Blue kurta with off white churidar set is an ideal outfit choice for your little boy.</li>\r\n	<li>This simple embroidery checks with buttons gives perfect traditional vibes.</li>\r\n	<li>Further the cotton lining under kurta ensures the comfort of your baby.</li>\r\n	<li>Also it can be worn to a wedding function or for any Indian festival.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Dark Blue</li>\r\n	<li>Fabric: Silk</li>\r\n	<li>Work: Embroidery</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(93, 148, 153, 157, 'SG54456', 'Yellow Kurta And White Dhoti Set In Cotton With Thread And Zari Embroidered Swan Motifs By Tiber Taber', 4250, '<ul>\r\n	<li>Sunshine bright colours, detailed embellishments, the comfort of cotton is infused with a perfect ethnic aesthetic.</li>\r\n	<li>Inspired from the miniature paintings of Rajasthan, the graceful and enigmatic swan has been crafted intricately using thread and zari work.</li>\r\n	<li>2 Pc Yellow Kurta and White Dhoti set, specially crafted for infants shall ensure comfortable and luxurious wear.</li>\r\n	<li>It is designed in angrakha style with round neckline and full sleeves.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Yellow</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Zari</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(94, 143, 144, 206, 'SG35860', 'Multicolour Nehru Jacket In Leaf Weave Pashmina', 12000, '<ul>\r\n	<li>Featuring a Multicolour Leaf Weave Pashmina Nehru Jacket.</li>\r\n	<li>The beautiful pashmina jacket has an all over leaf weaving in multicolour.</li>\r\n	<li>FABRIC SPECIFICATION: The jacket is made up of pashmina fabric.</li>\r\n	<li>Please note that this piece does not come with a pocket square.</li>\r\n	<li>WASH CARE INSTRUCTIONS: Dry clean only.</li>\r\n	<li>Steam iron only.</li>\r\n	<li>Do not wash.</li>\r\n	<li>This piece consists of a nehru jacket.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: maroon</li>\r\n	<li>Fabric: Jacquard</li>\r\n	<li>Work: Weave</li>\r\n	<li>Neck Line: Mandarin Collar</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(95, 143, 144, 206, 'SG68484', 'Mint Green Nehru Jacket With Resham Embroidered Leaf Design And Stitch Lines By Smriti Apparels', 13500, '<ul>\r\n	<li>Mint Green Bandi Jacket in silk with stitch lines and leaf pattern embroidery with centre button silhouette.</li>\r\n	<li>This piece does not come with the pocket square.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Green</li>\r\n	<li>Fabric: Silk</li>\r\n	<li>Work: Embroidery</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(96, 143, 144, 206, 'SG68703', 'Navy Blue Nehru Jacket With Mughal Inspired Aari Embroidery And Cut Work Technique By Smriti Apparels', 11400, '<ul>\r\n	<li>Navy Blue Kora Nehru with Mughal inspired embroidery using aari and cutwork technique.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Dark Blue</li>\r\n	<li>Fabric: Silk</li>\r\n	<li>Work: Embroidery</li>\r\n	<li>Inclusive of all taxes</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(97, 143, 144, 206, 'SG39785', 'Pink Bandi In Raw Silk With French Knot Work And Zardozi Embroidery', 12500, '<ul>\r\n	<li>Featuring a Pearl Pink Bandi with Jaal border and motif embroidery in French knots and Zardozi.</li>\r\n	<li>The Nehru jacket is made out of raw silk fabric.</li>\r\n	<li>WASH CARE INSTRUCTIONS: Dry clean only.</li>\r\n	<li>Steam iron only.</li>\r\n	<li>Do not wash.</li>\r\n	<li>This piece consists of a Nehru jacket.</li>\r\n	<li>*Buttons may vary*.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Pink</li>\r\n	<li>Fabric: Raw silk</li>\r\n	<li>Work: French Knot, Zardosi</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(98, 143, 144, 206, 'SG39783', 'Grey Bandi In Textured Fabric With Tricolour Panel Detail.', 14700, '<ul>\r\n	<li>Featuring a Textured Grey Bandi with three panels in different colours.</li>\r\n	<li>The Nehru jacket is made out of terrycot fabric.</li>\r\n	<li>Note - This piece does not come with the pocket brooch.</li>\r\n	<li>WASH CARE INSTRUCTIONS: Dry clean only.</li>\r\n	<li>Steam iron only.</li>\r\n	<li>Do not wash.</li>\r\n	<li>This piece consists of a Nehru jacket jacket.</li>\r\n	<li>*Buttons may vary*.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Grey</li>\r\n	<li>Fabric: Suiting</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(99, 143, 144, 206, 'SG39793', 'Blue Aztec Hand Embroidered Nehru Jacket Jacket', 17200, '<ul>\r\n	<li>Featuring a Blue Aztec Hand Embroidered Nehru jacket Jacket.</li>\r\n	<li>The jacket is made of bam silk .</li>\r\n	<li>WASH CARE INSTRUCTIONS: Dry clean only.</li>\r\n	<li>Steam iron only.</li>\r\n	<li>Do not wash.</li>\r\n	<li>This piece consists of a jacket.</li>\r\n	<li>*Buttons may vary*.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Blue</li>\r\n	<li>Fabric: Silk</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(100, 143, 144, 206, 'SG78645', 'Blue Sherwani Set In Georgette With Thread And Kundan Embroidered Jaal Design And Matching Dupatta', 25900, '<ul>\r\n	<li>Midnight blue sherwani in georgette with thread and kundan embroidered jaal design.</li>\r\n	<li>Embellished with cut dana detailing on the collar.</li>\r\n	<li>Topped with a georgette dupatta with resham embroidered buttis and border design.</li>\r\n	<li>Paired with matching churidar pants.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Dark Blue</li>\r\n	<li>Fabric: Georgette</li>\r\n	<li>Work: Embroidery</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(103, 143, 146, 193, 'SG93396', 'Maroon Kurta Set With Black Resham Aari Embroidered Ethnic Buttis', 4570, '<ul>\r\n	<li>Maroon kurta set in terry rayon fabric with white resham aari embroidered ethnic buttis.</li>\r\n	<li>It is designed with full sleeves and hook closure.</li>\r\n	<li>Paired with off white cotton churidar pants.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Maroon</li>\r\n	<li>Fabric: Rayon</li>\r\n	<li>Work: Aari</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(104, 143, 146, 193, 'SG93998', 'Sugar Brown Kurta Set In Raw Silk With Rust Printed Floral Buttis', 5200, '<ul>\r\n	<li>Sugar brown kurta set in raw silk with rust floral buttis.</li>\r\n	<li>The placket is trimmed with wooden buttons and resham work.</li>\r\n	<li>Crafted with full sleeves.</li>\r\n	<li>Paired with rust cotton churidar pants.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Brown</li>\r\n	<li>Fabric: Raw silk</li>\r\n	<li>Work: Print</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(105, 143, 146, 193, 'SG94073', 'Candlelight Peach Kurta Set With Lucknowi Thread And Sequins Embroidered Jaal And Centre Placket', 8300, '<ul>\r\n	<li>Candlelight peach kurta set in silk with lucknowi thread and sequins jaal all over.</li>\r\n	<li>It is crafted with a centre placket trimmed in golden buttons and full sleeves.</li>\r\n	<li>Paired with off white aligarh pants.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Peach</li>\r\n	<li>Fabric: Silk</li>\r\n	<li>Work: Embro</li>\r\n	<li>Inclusive of all taxes</li>\r\n	<li>idery, Lucknowi, Sequins, Thread</li>\r\n</ul>\r\n', 1, 0),
(106, 143, 146, 193, 'SG68479', 'Black Kurta Set In Silk With Bullion Leaf Embroidery By Smriti Apparels', 9500, '<ul>\r\n	<li>Black Kurta in silk with bullion leaf embroidery.</li>\r\n	<li>It comes with matching malai cotton pant pajama.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Black</li>\r\n	<li>Fabric: Silk</li>\r\n	<li>Work: Embroidery, Handwork</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(107, 143, 146, 193, 'SG51130', 'Moss Green Kurta With Cowl Drape And Churidar Pants', 6800, '<ul>\r\n	<li>Featuring a Moss Green cowl draped kurta with churidar pant.</li>\r\n	<li>The kurta has pin tucks stitch on the yoke.</li>\r\n	<li>The kurta has a high collar.</li>\r\n	<li>Fabric specification: The kurta is made of pure art silk and the churidar pant is made of cotton silk.</li>\r\n	<li>Full length of the kurta is 48&quot;.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Green</li>\r\n	<li>Fabric: Art Silk, Cotton silk</li>\r\n	<li>Neck Line: Mandarin Collar</li>\r\n	<li>Sleeves: 3/4th Sleeve</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(108, 143, 146, 193, 'SG77180', 'Royal Yellow Kurta Set In Cotton With Thread And Abla Embroidered Yoke Design And Buttis', 5350, '<ul>\r\n	<li>Royal yellow kurta set in cotton with thread and abla embroidered yoke design and buttis.</li>\r\n	<li>It is designed with mandarin collar neckline, full sleeves and front hook closure.</li>\r\n	<li>Paired with cream patiala pants.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Yellow</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Embroidery, Mirror</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(109, 143, 146, 193, 'SG90474', 'Pastel Lavender Kurta Set In Cotton With Lucknowi Thread Embroidered Moroccan Jaal', 5450, '<ul>\r\n	<li>Pastel wine kurta set in cotton with lucknowi thread embroidered moroccan jaal.</li>\r\n	<li>Crafted with buttons on the placket and full sleeves.</li>\r\n	<li>Paired with cream churidar pants in cotton.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: wine</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(110, 143, 147, 207, 'SG76955', 'Navy Blue Bandi Jacket With Block Printed Floral Buttis, Off Centre Placket And Bandhani Printed Cowl Kurta Set', 11500, '<ul>\r\n	<li>Navy blue bandi jacket in cotton suiting fabric with block printed floral buttis and an off centre placket edged with potli buttons.</li>\r\n	<li>Paired with a matching cotton kurta with bandhani print and cowl drape.</li>\r\n	<li>It is designed with mandarin collar neckline, full sleeves and front button closure.</li>\r\n	<li>Paired with matching silk churidar pants.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Dark Blue</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Print</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(111, 143, 147, 207, 'SG93316', 'Stone Blue Nehru Jacket Set In Raw Silk With Self Resham embroidered Geometric Jaal Design', 9800, '<ul>\r\n	<li>Stone blue nehru jacket set in raw silk with self resham embroidered geometric jaal design.</li>\r\n	<li>Enhanced with buttons near the neckline.</li>\r\n	<li>Paired with a matching kurta with hook closure and full sleeves.</li>\r\n	<li>Paired with off white cotton pants.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Light Blue</li>\r\n	<li>Fabric: Raw silk</li>\r\n	<li>Work: Jaal</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(112, 143, 147, 207, 'SG79212', 'Carnation Pink Nehru Jacket And Kurta Set With Resham And Mirror Embroidered Checks', 9850, '<ul>\r\n	<li>Carnation pink nehru jacket in raw silk with resham and mirror embroidered checks.</li>\r\n	<li>It is paired with a plain kurta in raw silk with mandarin collar neckline, full sleeves and and front hook closure.</li>\r\n	<li>The set comes with white churidar pants.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Pink</li>\r\n	<li>Fabric: Raw silk</li>\r\n	<li>Work: Embroidery, Mirror</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(113, 143, 147, 207, 'SG76976', 'Maroon Nehru Jacket With Block Printed Floral Buttis And Geometric Printed Kurta Set', 11200, '<ul>\r\n	<li>Maroon nehru jacket in cotton suiting fabric with block printed floral buttis.</li>\r\n	<li>Paired with a matching cotton kurta with geometric print.</li>\r\n	<li>It is designed with mandarin collar neckline, full sleeves and front button closure.</li>\r\n	<li>Paired with matching silk churidar pants.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Maroon</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Print</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(114, 143, 147, 207, 'SG93375', 'Black Nehru Jacket Set In Linen With Multi Colored Resham Embroidered Floral Motifs', 1050, '<ul>\r\n	<li>Black nehru jacket set in linen with multi color resham embroidered floral motifs.</li>\r\n	<li>Paired with a matching linen kurta with embroidery detailing on one sleeve.</li>\r\n	<li>It is designed with full sleeves and hook closure.</li>\r\n	<li>Paired with black churidar pants.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Black</li>\r\n	<li>Fabric: Linen</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0);
INSERT INTO `tbl_product` (`product_id`, `main_id`, `sub_id`, `peta_id`, `code`, `name`, `price`, `description`, `specification`, `status`, `offer_id`) VALUES
(115, 143, 147, 207, 'SG93273', 'White Nehru Jacket Set With Black Resham Aari Embroidered Ethnic Buttis', 8500, '<ul>\r\n	<li>White nehru jacket set in terry rayon fabric with black resham aari embroidered ethnic buttis.</li>\r\n	<li>Paired with a matching kurta with embroidered buttis.</li>\r\n	<li>It is designed with full sleeves and hook closure.</li>\r\n	<li>Paired with white cotton pants.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: White</li>\r\n	<li>Fabric: Rayon</li>\r\n	<li>Work: Aar</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(116, 143, 147, 207, 'SG93367', 'Grey Nehru Jacket Set With Black Resham Aari Embroidered Ethnic Buttis', 10000, '<ul>\r\n	<li>Grey nehru jacket set in cotton terry rayon fabric with black resham aari embroidered ethnic buttis.</li>\r\n	<li>Paired with a matching cotton terry rayon kurta with embroidered buttis.</li>\r\n	<li>It is designed with full sleeves and hook closure.</li>\r\n	<li>Paired with black cotton churidar pants.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Grey</li>\r\n	<li>Fabric: Rayon</li>\r\n	<li>Work: Aari</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(117, 143, 147, 207, 'SG76968', 'Navy Blue Nehru Jacket With Block Printed Floral Buttis And Geometric Printed Kurta Set', 10400, '<ul>\r\n	<li>Navy blue nehru jacket in cotton suiting fabric with block printed floral buttis.</li>\r\n	<li>Paired with a matching cotton kurta with geometric print.</li>\r\n	<li>It is designed with mandarin collar neckline, full sleeves and front button closure.</li>\r\n	<li>Paired with matching silk churidar pants.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Dark Blue</li>\r\n	<li>Fabric: Cotton</li>\r\n	<li>Work: Print</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(118, 52, 53, 56, 'SG81911', 'Dandelion Yellow Saree In Dupion Silk With Woven Diagonal Stripes And Gotta Embroidered Border', 10200, '<ul>\r\n	<li>Dandelion yellow saree in dupion silk with brocade diagonal stripes.</li>\r\n	<li>The border is adorned with gotta patti, zari cord and moti work.</li>\r\n	<li>Trimmed with tassels on the pallu.</li>\r\n	<li>Paired with a matching unstitched blouse.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Yellow</li>\r\n	<li>Fabric: Dupion, Silk</li>\r\n	<li>Work: Embroidery, Gotta Patti, Weave</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 2),
(119, 52, 53, 56, 'SG82658', 'Rani Pink Patola Saree In Soft Silk With Grey And White Stripes And Stick On Kundan Work', 5700, '<ul>\r\n	<li>Rani pink patola saree in soft silk with grey and white diagonal striped design</li>\r\n	<li>The border is adorned with foil print and stick on kundan work</li>\r\n	<li>Trimmed with tassels on the pallu</li>\r\n	<li>Paired with a rani pink unstitched blouse.</li>\r\n	<li>Note - The blouse design may vary.</li>\r\n	<li>Slight variation in color is possible due to digital photography</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Rani pink</li>\r\n	<li>Fabric: Silk</li>\r\n	<li>Work: Kundan, Print</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(120, 52, 53, 56, 'SG81098', 'Metal Grey Saree In Organza With Woven Scallop Jaal', 6200, '<ul>\r\n	<li>Metal grey saree in organza with woven scalloped jaal.</li>\r\n	<li>Trimmed with tassels on the pallu.</li>\r\n	<li>Paired with a matching unstitched blouse.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Grey</li>\r\n	<li>Fabric: Organza</li>\r\n	<li>Work: Weave</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(121, 52, 53, 56, 'SG69130', 'Reddish Peach Saree In Crepe Georgette With Printed Rose Motifs And Unstitched Blouse', 8350, '<ul>\r\n	<li>Reddish peach saree in crepe georgette with printed rose motifs.</li>\r\n	<li>It is paired with an unstitched blouse.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please Dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Peach</li>\r\n	<li>Fabric: Georgette</li>\r\n	<li>Work: Print</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 2),
(122, 52, 68, 70, 'SG46009', 'Navy Blue Banarasi Saree In Silk Blend With Woven Mesh Jaal', 7200, '<ul>\r\n	<li>Navy blue banarasi saree in silk blend with woven floral motifs in mesh jaal design.</li>\r\n	<li>The saree has a contrasting red border and pallu with woven floral and bandhani design along with tassels.</li>\r\n	<li>It comes with a red silk unstitched blouse piece with woven floral buttis.</li>\r\n	<li>The length of the blouse is 1.18 meters.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Dark Blue</li>\r\n	<li>Fabric: Silk</li>\r\n	<li>Work: Jaal, Tassel, Weave</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(123, 77, 86, 88, 'SG48308', 'Off White Blouse In Raw Silk With Fancy Puffed Organza Sleeves And Sweetheart Neckline', 3800, '<ul>\r\n	<li>Off white blouse in raw silk with fancy puffed organza sleeves.</li>\r\n	<li>It is crafted with plunging sweetheart neckline and curved hem.</li>\r\n	<li>The back has a deep leaf cut and hook closure.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: White</li>\r\n	<li>Fabric: Raw silk</li>\r\n	<li>Closure: Back Hook-Eye</li>\r\n	<li>Neck Line: Sweetheart Neckline</li>\r\n	<li>Sleeves: Full Sleeves, Fancy Sleeves</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(124, 77, 86, 88, 'SG77302', 'Off White Sleeveless Blouse In Raw Silk With Corset Neckline And Straps On The Shoulder', 2500, '<ul>\r\n	<li>Off White sleeveless blouse in raw silk with corset neckline and straps on the shoulder.</li>\r\n	<li>It comes with a back hook closure and padding.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: White</li>\r\n	<li>Fabric: Raw silk</li>\r\n	<li>Closure: Back Hook-Eye</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(125, 77, 86, 87, 'SG61798', 'Black Sleeveless Blouse In Velvet With Scooped Neckline And Tassel Dori On The Back', 2400, '<ul>\r\n	<li>Black sleeveless blouse in velvet with scooped neckline.</li>\r\n	<li>It is designed with scooped back with tassel dori and side zip closure.</li>\r\n	<li>The length of the blouse is 13 inches.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Black</li>\r\n	<li>Fabric: Velvet</li>\r\n	<li>Closure: Side Zip</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(126, 77, 86, 88, 'SG29487', 'Forest Green Sleeveless Blouse In Raw Silk With Scoop Neckline', 2100, '<ul>\r\n	<li>Forest green sleeveless blouse in raw silk with scoop neckline.</li>\r\n	<li>Crafted with U cut back and side zip closure.</li>\r\n	<li>The length of the blouse is 13 inches.</li>\r\n	<li>Slight variation in color is possible.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Dark Green</li>\r\n	<li>Fabric: Raw silk</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(127, 77, 86, 88, 'SG48318', 'Maroon Sleeveless Blouse In Raw Silk With Square Neckline', 2350, '<ul>\r\n	<li>Maroon sleeveless blouse in raw silk.</li>\r\n	<li>It is designed with square neckline and a square cut deep back with hook closure.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Maroon</li>\r\n	<li>Fabric: Raw silk</li>\r\n	<li>Closure: Back Hook-Eye</li>\r\n	<li>Neck Line: Square</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n</ul>\r\n', 1, 0),
(128, 77, 86, 88, 'SG48315', 'Black Sleeveless Blouse In Raw Silk With Wrap-Around Tie Up And Plunging Neckline', 3100, '<ul>\r\n	<li>Black blouse in raw silk with wrap around tie up.</li>\r\n	<li>Crafted with plunging neckline and cap sleeves.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Black</li>\r\n	<li>Fabric: Raw silk</li>\r\n	<li>Neck Line: Fancy Neckline</li>\r\n	<li>Sleeves: Cap Sleeves</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(129, 77, 86, 88, 'SG43180', 'Taupe Brown Sleeveless Crop Top Hand Embellished With Zardosi And Cut Dana Work', 3400, '<ul>\r\n	<li>Taupe brown sleeveless crop top in net heavily hand embellished with zardosi, sequins and cut dana work in geometric and floral pattern all over.</li>\r\n	<li>Designed sleeveless with sweetheart neckline.</li>\r\n	<li>The length of the crop top is 15 inches.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Brown</li>\r\n	<li>Fabric: Net</li>\r\n	<li>Work: Beads, Cut Dana, Embellished, Geometric, Handwork, Zardosi</li>\r\n	<li>Closure: Side Zip</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(130, 77, 86, 88, 'SG92522', 'Lipstick Red Blouse In Raw Silk With Puff Shoulders And Half Sleeves', 3150, '<ul>\r\n	<li>Lipstick red blouse in raw silk with puffed shoulders and half sleeves with pleated frill on the cuffs.</li>\r\n	<li>Crafted with scooped neckline and padding.</li>\r\n	<li>The back is designed with tassel dori tie up and back hook closure.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Red</li>\r\n	<li>Fabric: Raw silk</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(131, 77, 86, 88, 'SG91843', 'Emerald Green Blouse In Raw Silk With Overlapping Sweetheart Neckline And Cut Out Back', 4110, '<ul>\r\n	<li>Emerald green sleeveless blouse in raw silk with overlapping sweetheart neckline.</li>\r\n	<li>It is crafted with a cut out back, padding and side zip closure.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Green</li>\r\n	<li>Fabric: Raw silk</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(132, 77, 86, 88, 'SG92246', 'Teal Green Blouse In Raw Silk With Three Quarter Sleeves And Sweetheart Neckline', 3900, '<ul>\r\n	<li>Teal green blouse in raw silk with three quarter balloon sleeves and plunging sweetheart neckline.</li>\r\n	<li>Crafted with curved hemline and a cut out back with hook closure and tassel dori tie up.</li>\r\n	<li>It comes with padding.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Teal</li>\r\n	<li>Fabric: Raw silk</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(133, 77, 86, 87, 'SG43188', 'Wine Purple Blouse In Velvet With Plunging V Neckline, Cut Out Detail And Cut Dana Work', 5350, '<ul>\r\n	<li>Wine purple sleeveless blouse in velvet with a plunging V neckline and cut out pattern.</li>\r\n	<li>Embellished with sequins, cut dana and kundan on the neck.</li>\r\n	<li>Designed with a curved cut back.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Purple</li>\r\n	<li>Fabric: Velvet</li>\r\n	<li>Work: Cut Dana, Embellished, Handwork, Sequins</li>\r\n	<li>Closure: Side Zip</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(134, 77, 86, 88, 'SG92688', 'Sacramento Green Blouse In Satin With Plunging V Neckline And Back Zip Closure', 4100, '<ul>\r\n	<li>Sacramento green blouse in satin with plunging V neckline and back zip closure.</li>\r\n	<li>It is crafted sleeveless with princess cut and padding.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Green</li>\r\n	<li>Fabric: Raw Silk Blouse</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(135, 77, 86, 88, 'SG93792', 'Maroon Blouse In Satin With One Shoulder Neckline And Tie Up Bow', 4500, '<ul>\r\n	<li>Maroon blouse in satin with one shoulder neckline and tie up bow on the waistline.</li>\r\n	<li>Crafted with padding and side hook closure.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Maroon</li>\r\n	<li>Fabric: Row Silk Blouse</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(136, 77, 86, 88, 'SG77301', 'Coral Sleeveless Blouse In Raw Silk With Corset Neckline And Straps On The Shoulder', 3700, '<ul>\r\n	<li>Coral sleeveless blouse in raw silk with corset neckline and straps on the shoulder.</li>\r\n	<li>It comes with a back hook closure and padding.</li>\r\n	<li>WASH CARE INSTRUCTIONS - Please dry clean only when it is applicable</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Peach</li>\r\n	<li>Fabric: Raw silk</li>\r\n	<li>Closure: Back Hook-Eye</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(137, 77, 86, 87, 'SG33338', 'Red Blouse In Velvet With Trapeze Neckline', 4200, '<ul>\r\n	<li>Red blouse in velvet with trapeze neckline.</li>\r\n	<li>Designed with cap sleeves, deep trapeze cut back and side zip opening.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Red</li>\r\n	<li>Fabric: Velvet</li>\r\n	<li>Sleeves: Cap Sleeves</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(138, 77, 78, 84, 'SG53182', 'Black Blouse With Sweet Heart Neck And Sequins And Moti Work', 7200, '<ul>\r\n	<li>Black raw silk blouse embellished in self sequins and moti work.</li>\r\n	<li>It has a sweet heart neckline and a fancy back with tie up.</li>\r\n	<li>Model is wearing an outfit that&#39;s &quot;US size 0&quot; (XS). height is 5.9&quot;, Bust - 32&quot;, Waist - 26&quot; and Hip - 39&quot;.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Black</li>\r\n	<li>Work: Embroidery, Self work, Sequins</li>\r\n	<li>Neck Line: Sweetheart Neckline</li>\r\n	<li>Sleeves: Sleeveless</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0),
(139, 77, 78, 84, 'SG43195', 'Indigo Crop Top In Silk Blend With Sequins And Beads Work In Gradient Pattern And Full Sleeves', 6200, '<ul>\r\n	<li>Indigo crop top in silk blend with sequins and beads work in gradient pattern.</li>\r\n	<li>Crafted with round neckline, full sleeves and V cut hemline.</li>\r\n	<li>The length of the top is 16 inches.</li>\r\n	<li>Slight variation in color is possible due to digital photography.</li>\r\n	<li>Being rewarded as the most trusted brand our customers too believe we deliver same styles as promised on the website.</li>\r\n</ul>\r\n', '<ul>\r\n	<li>Color: Dark Blue</li>\r\n	<li>Fabric: Silk</li>\r\n	<li>Work: Embroidery, Beads, Embellished, Handwork, Sequins</li>\r\n	<li>Closure: Side Zip</li>\r\n	<li>Sleeves: Full Sleeves</li>\r\n	<li>Inclusive of all taxes</li>\r\n</ul>\r\n', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_image`
--

CREATE TABLE `tbl_product_image` (
  `image_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `color` varchar(50) NOT NULL,
  `path` varchar(2000) NOT NULL,
  `qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_image`
--

INSERT INTO `tbl_product_image` (`image_id`, `product_id`, `color`, `path`, `qty`) VALUES
(1, 2, 'Purple', 'assets/products/f10d3fd7ad584959f091071372ed33d2.jpg,assets/products/8f6881888685ba42641553628b04d8dc.jpg,assets/products/aa744582099e60f9e2fa0ffcad647577.jpg,assets/products/0c0941029ff06c450d2285117eed86f6.jpg', 12),
(2, 2, 'Blue', 'assets/products/36217ca6f07b20252fe465a122efe843.jpg,assets/products/d90855b0f8fc5840574aabff63eea1fc.jpg,assets/products/9c9a1a8adeb222c2fd10e9e9a6ac3bd4.jpg,assets/products/f0ac32bb056be2b7a1659ebb3bb4e839.jpg', 18),
(3, 2, 'Blue', 'assets/products/5c1bd8f5687fb86082ff48d6ef84e2c9.jpg,assets/products/3e78c748bde67579a8a4edeee2c42719.jpg,assets/products/2e5f61eb4062465713b42bf1b96802ed.jpg,assets/products/784d3fd0896c4ec8424710db11be14b2.jpg', 25),
(4, 3, 'Blue', 'assets/products/4056cde944c4e81b6c28372dbc176f80.jpg,assets/products/b9593f40028da08c371ef9a97dc07e67.jpg', 12),
(5, 3, 'Green', 'assets/products/6e9ad541df50bbf94308e2247aff84d2.jpg,assets/products/faae6a2cbf49d8f443b50ef1046fca7f.jpg', 16),
(6, 3, 'Red', 'assets/products/e72255f41f12a6b287848e70fcc33b71.jpg,assets/products/27fb4e31c36ec221624e6aca30c3067a.jpg', 10),
(11, 5, 'Green', 'assets/products/20f43c836ce7d128edc165ae29ecf6d6.jpg,assets/products/2327afb5c18abd3c4a1c869b62ce4911.jpg,assets/products/25e4ffe4483b33e22e90704da717c2d4.jpg,assets/products/386e8342c5babec485829dbcc6d1ba29.jpg', 10),
(12, 5, 'Purple', 'assets/products/da81deb173265edf2a7ab1d74e18107b.jpg,assets/products/c2cd1f452b4715e8042c277a714cea31.jpg,assets/products/2b0acf4d4797bc9286e0cc657dc03b49.jpg,assets/products/a5d989c192b3208922593595e5c3ef38.jpg', 26),
(13, 6, 'Blue', 'assets/products/7491971d931007a8138f8014a0a6ca67.jpg,assets/products/69fc4b44010eb72fc5f6f9a87f75f9a5.jpg,assets/products/b62196e9a6d820dcba78bd4490206441.jpg', 10),
(14, 6, 'Green', 'assets/products/0f267f6093f6761f60fcca476f4e2f7f.jpg,assets/products/eaedfd1c6f9a4b4ea58a322667920e47.jpg,assets/products/0157f16ddc8fde859074bab3ffd4ad58.jpg', 10),
(15, 7, 'Yellow', 'assets/products/6f54dd507bcded942178d9aa54c68a7d.jpg,assets/products/9a72b9f1c3462267420ef17b94ff1568.jpg,assets/products/3f37ecee4646223fbd47902d54b90243.jpg', 9),
(16, 7, 'Pink', 'assets/products/a7bedd18e35b0a40e3768c4821de9ac7.jpg,assets/products/fec94f6fa73acc5d73bc04a76e7b8983.jpg,assets/products/cb096a112be622e75e6003cb34125307.jpg', 11),
(17, 7, 'Blue', 'assets/products/00974ff0071ec8384e0ff071fdf567ee.jpg,assets/products/bbd9422f8741e52e6b3b8e0d9d1b3241.jpg,assets/products/25c4c782395a4eedd686ee4a73b57166.jpg', 13),
(18, 8, 'Maroon', 'assets/products/9d6e7a36ae0f6e509a3df67d4f21ae0f.jpg,assets/products/29349adda6adfddfe89a260117e9ef6b.jpg,assets/products/718ffa8b20afaa4d1407879e91d7af5e.jpg,assets/products/a985e5de3398ffdaa77e3d08a2b4eacd.jpg', 23),
(19, 8, 'Blue', 'assets/products/90e34544da65dbf3b331c42ef0b6c889.jpg,assets/products/3d91e297eee14e9a75b865abea5ac782.jpg,assets/products/25aaa46c9b354f224b47e7b58b3270f6.jpg,assets/products/67263f8430511d5179293d586740828d.jpg,assets/products/b56bf9431fa1b0cc6ff67e6704308d89.jpg', 22),
(20, 9, 'Blue', 'assets/products/61eceeb763b068baa4756124ec52bc02.jpg,assets/products/3bbff5f54feb5a06e6f23552ec671ece.jpg,assets/products/309c4e30ae75d71ea3476263f69544f1.jpg', 2),
(21, 9, 'Green', 'assets/products/8a5321cc8a7bb57b3d1bb536653cb154.jpg,assets/products/285a9767d59b91689e6d08a3d77ed08f.jpg,assets/products/c462fd1d70044425ac0bd3f9066414bf.jpg', 3),
(22, 10, 'Yellow', 'assets/products/6ab5de5f9e460fd31582e30acba46660.jpg,assets/products/b52079418b7ec32ae2d696a69d717319.jpg', 3),
(23, 10, 'Green', 'assets/products/53f7fb368327dd2168ebd8c205fba5fe.jpg,assets/products/f39cf0a918ce8b5f2c48595db45f63b9.jpg', 3),
(24, 10, 'Orange', 'assets/products/197f2d5503757b97ceedea411a4ada41.jpg,assets/products/668f660ca772d3034cc6d47bb1acd6d5.jpg', 3),
(25, 11, 'Green', 'assets/products/c7cf4587dce10ccf5d6346f95d210bad.jpg,assets/products/cb2e805379d1bf800f2f7720242e243d.jpg,assets/products/23a26bbf7b8b621f2831d729afaac0fc.jpg,assets/products/02b9e01f46b9ce2cec34b5b6479d79de.jpg', 3),
(26, 11, 'Burgundy', 'assets/products/a283bd9f4fd3cf27f4db517eceb233bb.jpg,assets/products/4a6fdd570d78918911c2a398c81afff9.jpg,assets/products/f16816b1e558011493cfa46b40129602.jpg,assets/products/38c064f86c41f507bc981402e792a359.jpg', 3),
(27, 12, 'Black', 'assets/products/cf7f789810c7e64b4dece8020e8f7ae1.jpg,assets/products/3d4e7a87aadefb5dca487077453dd420.jpg,assets/products/ba0f644295a2dbace2632040c216ea63.jpg,assets/products/a3a02bc0bb77d45e663e8e3c458ac161.jpg', 0),
(28, 13, 'Purple', 'assets/products/106bb7b17a43250e14fe0e213a255de6.jpg,assets/products/2947b3a49a645863719fcb23690e5ef2.jpg,assets/products/911d0af5adf8a812dae2d26db3a1c89b.jpg,assets/products/f87467357fdfb7fd2cd49a2fea019c2b.jpg', 3),
(29, 14, 'Pink', 'assets/products/14c46be9b33737bd272b7d49be7b11d7.jpg,assets/products/56cd46ffbc40c2d759401cd71d470480.jpg,assets/products/c5b24fb25f4a4733d3ba4d83e4073f69.jpg,assets/products/7f6aa3e2d5448a138ab12b40ead0fe1c.jpg,assets/products/03afea60466142157faab884872376c0.jpg', 1),
(30, 14, 'Green', 'assets/products/30c2d6a6daf5c3469524c90b425a51f5.jpg,assets/products/a7f411cf9041bef94e818ed21ba3319d.jpg,assets/products/0b8dc4e21fe0678868319378b45b31b1.jpg,assets/products/cd4f6d6155cd189a9d154699de1549e3.jpg,assets/products/57412ebddb517fe6ed945683f249aaf6.jpg,assets/products/216affa19e10e5f6e24e279ccc64eacc.jpg', 3),
(31, 15, 'Yellow', 'assets/products/f74036ba4d0421d2fac489ef48d8e86f.jpg,assets/products/41b171a0c73515811dfdd9d597465c21.jpg,assets/products/de39d5b091e22593c703cf6bdda7c803.jpg', 0),
(32, 16, 'Blue', 'assets/products/1739ed360cee583f17751c8088e600b1.jpg,assets/products/89982c281ab57dc9c67ff8c5133e9f43.jpg', 3),
(33, 17, 'Dark Blue', 'assets/products/b9fa730b16493d27b8b225a6768e2235.jpg,assets/products/6cf3a973cde4a2ba9157da773b465dce.jpg,assets/products/1f747e0e5c673dc548e54446566ec13e.jpg,assets/products/a66ea07bf5b03d7f264de64a1c7cd2c1.jpg,assets/products/5f8e5d779cf1c815cf854604ac5ccd47.jpg', 2),
(34, 18, 'Blue', 'assets/products/72d93cd89857771af8c615df99852d60.jpg,assets/products/4e7820c2e82907483a6d353576948453.jpg,assets/products/3639f38fc8a8c951b7de4ef0bf2ed294.jpg', 3),
(35, 19, 'Yellow', 'assets/products/106bf807a02ec1bd9c94bdee0c7febd7.jpg,assets/products/4d4ca83bb4ffb760c3b6c4d5cd4ccd0e.jpg', 3),
(36, 20, 'Purple', 'assets/products/8b2002a643f20f30f5b08009a3a06d94.jpg,assets/products/25e978bb001f86bcea063c7601b13b1c.jpg,assets/products/a9a8af28af371b156d3178ce36acd7c7.jpg,assets/products/70e15bc9780171ba9a4d6ec5e9b5b5b1.jpg,assets/products/5de1b9d2e4428477eced68d7dc8f18b2.jpg', 2),
(37, 21, 'Pink', 'assets/products/5830543a440d0b49ef94680c05219fb0.jpg,assets/products/4920609ed9827a2d290ed7c7525b123f.jpg,assets/products/382793ab4de12b4f40df8a60a0561662.jpg,assets/products/5abd7f2222603f8f739c6e0b6ba59072.jpg,assets/products/5f159f2d2193d0203e74e68e8e389c85.jpg,assets/products/6f9167b490e42a8dce4ebf30cfa594fc.jpg', 3),
(38, 22, 'Dark Blue', 'assets/products/b70919d515f94dad3fc66178d1c8cf5b.jpg,assets/products/66b38fbbdb5ff58311f7bd7f9df538bf.jpg,assets/products/7e8ff194c20c00f2bb6978e194b3dc4d.jpg,assets/products/ce9631a146f1e728de49021ee28b8377.jpg', 3),
(39, 23, 'Purple', 'assets/products/d9097c2abb7bb50c05849486eebbf334.jpg,assets/products/cdcf0d556a127ab8b80da62301bbb009.jpg,assets/products/9ac83d553446571f53abd91696aa913a.jpg,assets/products/b585eb8dbe48986ef05448edffc0083f.jpg', 3),
(40, 23, 'Dark Blue', 'assets/products/b6fbf081d0abe69c95d8918ffcce4772.jpg,assets/products/ac1afa805748afd7f4f3af1903d08ecd.jpg,assets/products/33f6bdbfc327622b04f780c4ab9da622.jpg,assets/products/335e9dc81f4d5df951cf423fc93faab4.jpg', 3),
(41, 24, 'Champagne', 'assets/products/96fa0d73a9c40b1ef30d26b81e557669.jpg,assets/products/8619d89b76f636d48704c19079264ecb.jpg,assets/products/b21dc97e9598e80b12d004af93ad0416.jpg,assets/products/b612853a0d3c89b277ef74798e377653.jpg,assets/products/563c5c75a88273d9fb2a4e96edb07bba.jpg,assets/products/8a923d83642bdf477cc9e9b1ce75f25c.jpg,assets/products/507a05594cf44afd28b657b8d0efdcbd.jpg', 3),
(42, 25, 'Purple', 'assets/products/182edb8b949d260749ba31fd96070d94.jpg,assets/products/876239b4ed739bd208d8603a0f33f2ac.jpg,assets/products/96f054c0b8b3f9900ca3ecbae80c4d78.jpg,assets/products/212cc24d827f9695475fc407e0378165.jpg', 3),
(43, 26, 'Pink', 'assets/products/f3a082aafed738c893365d76a467fce6.jpg,assets/products/baad348c6a978bfcf53980d79a4cde44.jpg,assets/products/fdd1ba598ec2f3ba7d93ceefb5ce80aa.jpg,assets/products/f193e168c05a6431c56ae4409737c077.jpg,assets/products/674af0bb6696e7a1b9cfc0f648622645.jpg', 3),
(44, 27, 'Blue', 'assets/products/49414d8073ea53eae3bc32ccd5a3e4d4.jpg,assets/products/8e2364bc3e0460c1391e7dc13d9b05c8.jpg,assets/products/38b88d01c2e67948a7425677cf17690a.jpg,assets/products/fcd17ec776307244d61bbe7a0d928396.jpg', 3),
(45, 28, 'Yellow', 'assets/products/5947c65e584aaadc1fcda0ba0736b680.jpg,assets/products/ce7c23c448aa86d03fa9ca55ea7a430e.jpg', 3),
(46, 29, 'Yellow', 'assets/products/ee2155251645a4d41554e429cb83bd6a.jpg,assets/products/bf0a524ce0854fc7ff11fe4d0fa8c67c.jpg,assets/products/44b8542faa7ecb0c01d6c43dca44a4d9.jpg,assets/products/a7c8f320c912373909b3137330c323e8.jpg', 3),
(47, 30, 'White', 'assets/products/7178a8435e126d3fe338ce1c845484eb.jpg,assets/products/9bb5afdd85532aa40b13c96cea785942.jpg,assets/products/1aea2d2874863c1b6f7692eb2c2ee644.jpg,assets/products/77afde568641e13ab990eb7867d483f2.jpg', 3),
(48, 31, 'Blue', 'assets/products/449889504ede03ed3b6f701cc0f80a75.jpg,assets/products/9589f9a8fe3a49e6e93e832c9caf0c26.jpg,assets/products/1e3b4a742e3c97a2f33087444d314c99.jpg,assets/products/c8bb276e04139a2fecd35b39f55e6d15.jpg,assets/products/d190bd9f28c900bc1f2c2e45f45764c2.jpg', 3),
(49, 32, 'Light Green', 'assets/products/d894407b24a674509cbc404265315c3c.jpg,assets/products/bf8d64a1307805dc57f3faf1a226095e.jpg,assets/products/8907f6a0a125a8006941dd293b6d50bf.jpg,assets/products/3cef7362071a567a044139f7fd801b65.jpg,assets/products/ec8bde8572f131bec25801e5f5afeede.jpg', 3),
(50, 33, 'Purple', 'assets/products/6610dffd5335b532d2755b673def2b57.jpg,assets/products/146dbd111fcb883175aee5d24b96bb6e.jpg,assets/products/617976ee0cb227ca59953f6d00a2f2a9.jpg,assets/products/adbd180932c24e9289bfee188b7ab735.jpg,assets/products/378cbda850bd841f2540887365672eed.jpg', 3),
(51, 34, 'Yellow', 'assets/products/626be8ac16f029da5e8afb3dc0b24f24.jpg,assets/products/9c86103e5b302adccaa5061d80d208a4.jpg,assets/products/d90465dad45353cdbd0d3219f9599503.jpg,assets/products/cff7c29aefa296dc034b3fb6b15d355f.jpg,assets/products/520f1671f9674684316b9b2f9236747a.jpg,assets/products/f30a21d5ada55c4b23dda97d2744352d.jpg,assets/products/c8612de1bd5af4d7c4471392cfce2b9c.jpg,assets/products/ffb7bdfdc7f3060b50767f3ea10d0d5b.jpg', 3),
(52, 35, 'Peach', 'assets/products/9d6cd209eb66546bb7cd5641e567a7cf.jpg,assets/products/0266202f02914048ff13e76396212e0c.jpg,assets/products/eca1e48ceb18317d4bad4d5067e3aa80.jpg,assets/products/ba672dc665ac2001b56d5b1012230351.jpg,assets/products/e3c421200c412b5c79f604ee7c68356f.jpg', 3),
(53, 36, 'White', 'assets/products/b1160276676f78ade75aa6c0caed9e76.jpg,assets/products/0c91aaf1abd72a17897d7ef3ee497bfd.jpg,assets/products/702fb6a201c2b19211988e1ff01ec14c.jpg', 3),
(54, 37, 'Maroon', 'assets/products/015940792fa62c7922c766baed86d1db.jpg,assets/products/aa2e56c32bd09e866b02be3af6fc7086.jpg,assets/products/84bfe90838d3e219b0df00ccaef72947.jpg,assets/products/102163aac7e04bebe78b84517925ad34.jpg,assets/products/a328ae7f0e8e5e3f06cd827317980911.jpg', 3),
(55, 38, 'Purple', 'assets/products/e8ec7dbbe630b1900a5d940e60576818.jpg,assets/products/0b0b202752cb71d032ebeda4f4c9fad1.jpg,assets/products/80d43d85a4edf536485de4ad8e3dc9a1.jpg,assets/products/a484a551c525de69c3642d4ae4c548be.jpg', 3),
(56, 39, 'Burgundy', 'assets/products/c30c8e56935917232b026981fcf656f2.jpg,assets/products/830a5cd517f9f582ce0b675f805a4b9d.jpg,assets/products/bf4e780b673ee885cd1cd74be3356801.jpg,assets/products/cfec22cdd79d36d0b5149c576405a2cc.jpg', 3),
(57, 40, 'Green', 'assets/products/5303262ebfb0d860d6d014af0b3b571d.jpg,assets/products/9452d186aba4610d04e3d7de00abba62.jpg,assets/products/284c23778fa67dbb021b52783bff3774.jpg,assets/products/1601a4b48b20112b77cf3f848375ae84.jpg', 3),
(58, 41, 'Champagne', 'assets/products/86a6d79937c4ce3c999a64b323a25c49.jpg,assets/products/31894e45e4440b47522c19bc52b6ed9a.jpg,assets/products/98d158f0e4a0a1dfd1c0bd116bbacdbe.jpg,assets/products/637b478f156c0e2d66a1ba585c7fdd7b.jpg,assets/products/cf32e41a52bc8481b899a798d20c72d5.jpg', 3),
(59, 42, 'Champagne', 'assets/products/ac5f8fba28cd254f57b3a1fe16d630af.jpg,assets/products/714127ad9f79fe1ab228dc457e0b4d1c.jpg,assets/products/59f6d04541e0af21cfd019621df06767.jpg,assets/products/36588a3b0631058e45312b286af86d9e.jpg,assets/products/c58500ce7da4ba967f070709f2a4227b.jpg', 3),
(60, 43, 'Light Blue', 'assets/products/3a59f6245eaec99cb52fee9dd16e89c4.jpg,assets/products/5fe48a19c194b211e6b968eab96645fe.jpg', 3),
(61, 44, 'Blue', 'assets/products/e97cf14510c701d2bccab2999f20d62b.jpg,assets/products/94541b3b63f01a9e89f9668ba673a7e7.jpg,assets/products/3db78d1e81a1afbdede235e9ea82f6bb.jpg,assets/products/00554e4be04491d5f047b705bde9a7bf.jpg', 2),
(62, 46, 'Green', 'assets/products/bfb364b59b6e2a1a751dadad8272ab4e.jpg,assets/products/d46eb3edd1065cfddc58efa8135b6fb4.jpg,assets/products/c412f8005d6ad770dbdf9efbc765cfec.jpg,assets/products/b597b3a5cf74536d4f6e9d6aa9366f9f.jpg', 3),
(63, 47, 'Blue', 'assets/products/faa3a758100b009f8cb39f97dc29b75c.jpg,assets/products/8183435a45069b7650068310bc05041a.jpg', 2),
(64, 48, 'Light Green', 'assets/products/3bfcb61376a5ac6582098a43289559c7.jpg,assets/products/10130495a99c07bc33afcaa1ae294f91.jpg,assets/products/cc796a4e18ac5d71bbfeda3a63fd9ac9.jpg,assets/products/d9d8200efd8a5c165c1bda14ae20d03a.jpg', 3),
(65, 49, 'White', 'assets/products/6121267be46e4d0040a06d88425d4ceb.jpg,assets/products/794f200c650e164765d726c5bcd9b634.jpg,assets/products/99d9021fecab60e9e8a9fe1743e3bab6.jpg,assets/products/5a36a6d16d91e148a2525caacef2761f.jpg', 3),
(66, 50, 'Pink', 'assets/products/dff5d7290d6810bc85e1fa5fc78c215e.jpg,assets/products/0b5666ba58756995d48e314a31449b0e.jpg,assets/products/24d6208ef1a27fbe6adc7d84de2cf442.jpg,assets/products/ef0ddbace0ef2e2658b5c35ca5eb581f.jpg', 3),
(67, 52, 'White', 'assets/products/b89f87cf9f9d8f92dc0951074cc2ba1e.jpg,assets/products/0a89be7d4c96a8ce19dcabc4baf1f8b2.jpg', 3),
(68, 53, 'Yellow', 'assets/products/780f4a44f61cbd8b9e3ea7d8ac6c49a9.jpg,assets/products/b787804c7c640d9bab58244e081dbe03.jpg,assets/products/64d09b83de40d9865cab1fff3611252b.jpg,assets/products/d9b3da2794ce680b4ced8bcf49735788.jpg,assets/products/dabc9d8415bf7e4c84c9252462787ec3.jpg', 3),
(69, 54, 'White', 'assets/products/9fe1d1a749b5b2c0448749c5428f5c0d.jpg,assets/products/d29a6dc84d245d9ecf8eb0657ea83d10.jpg,assets/products/ab43404ec74de733f03fe68c20eb51a7.jpg,assets/products/857593977e19cee6e12d6cc57de5c82c.jpg,assets/products/bd374ac5fd53fcf43cf88f5c27f69fb4.jpg,assets/products/5eac2c5eb65fda4ef9a0c219b43f9527.jpg', 3),
(70, 55, 'Blue', 'assets/products/50bdb4aab344dd0a97dbd4fd63956951.jpg,assets/products/b2386920aa77f1ea24e9f7148d03e0e2.jpg,assets/products/b9efc7e9da8485c43211b6ff727f2a3c.jpg,assets/products/3ae689c1559855a525eadf6b15f05cc4.jpg,assets/products/4ffb0a969488848ae2e4eaa497ee469b.jpg', 3),
(71, 56, 'Maroon', 'assets/products/e8e6e2cd9f92e9d5c04b816b5fc92428.jpg,assets/products/446ceecd142eeed2a6fd57dc74a3a399.jpg,assets/products/3f10c6a161abfcdc7ff3ab98f1c81fe5.jpg,assets/products/9b71c7b0a49100ed5da96a8d7b146ab3.jpg,assets/products/5e0a4f4fefd8e1b3258615e93fee1179.jpg,assets/products/814ca6bf523788b925f0ce5e896f4e34.jpg', 3),
(72, 57, 'Blue', 'assets/products/67c4ed1ed0de1f6b0ebdd62e0bdd715e.jpg,assets/products/ce3684d1bd88cbe336f0c9ca8b1b7a1b.jpg,assets/products/de64806ec45e6cc8d99c50bf5345c28d.jpg,assets/products/deb37fd100662468d797ef2394b63961.jpg', 3),
(73, 58, 'Black', 'assets/products/45dcc65135e5dcc1b7bdf1fc963b5f89.jpg,assets/products/b4c3a622b4a3b4de6b1a4681d5efb8a1.jpg,assets/products/e095a77c12b324479e148c3cacc9a454.jpg,assets/products/aa10fa7228f1496e2bba15812195d095.jpg,assets/products/4333b7b98176bfe74fb486d8f91de59c.jpg', 3),
(74, 59, 'Black', 'assets/products/17e7de6c1c2f84f70d22cba47f97c06e.jpg,assets/products/8185cd6c0fe04ab9fdb4708f1cf27728.jpg,assets/products/161c9fca33d5f2b7e5afab2fc5207b72.jpg,assets/products/b09c85991294182484af752b31d8dda4.jpg,assets/products/6f8c866b02e50bb1cee303e5a536b9cc.jpg,assets/products/b03332812e8135b19f851d601a59a969.jpg,assets/products/4a2e35e1c1718a8b671ed0caeff01b41.jpg', 3),
(75, 60, 'White', 'assets/products/e0ba92a73fa251fc79d953d055b332e1.jpg,assets/products/72d0494642d668ab4c146f0058e2cb62.jpg,assets/products/2ad3083f8256fee921b146f077ea8681.jpg,assets/products/57af9c3c08eef9dd397dc83bf1e9b388.jpg,assets/products/16c816b3eb685e80c1cf46de4961f819.jpg', 3),
(76, 61, 'Blue', 'assets/products/6193658382fccc36417035a66235a8e9.jpg,assets/products/9a578861b654a085b2a142872191cbcc.jpg,assets/products/0fbe0a5d98be735e31d37e81dc299633.jpg,assets/products/d8f8065d92cab2173d60b654cdf71fb3.jpg,assets/products/7bf08d9886e8ea0906b9fb6b869cf931.jpg', 3),
(77, 62, 'Black', 'assets/products/41e27ec22f65c66982904a0a8122b417.jpg,assets/products/b341757b52d05fa340b55f9a95cee354.jpg,assets/products/80894b68ccd7ca5ce1441822016bf019.jpg,assets/products/ed2cdd5d23b59f865c10bff07dc0a0ff.jpg', 3),
(78, 63, 'Green', 'assets/products/99a9c640130dfdbaa4ae30ccf1e39f1c.jpg,assets/products/48efa3010775037b66a442787bd9b063.jpg,assets/products/36d89b200a054d8159988a1f476e694e.jpg,assets/products/7216be767ff5e0c8afc64c9f51db9979.jpg,assets/products/ee915aaadcaf3157c8aa038f4c472acc.jpg,assets/products/539f89ed4c5e175d9b7a7ad8d815b1bd.jpg', 3),
(79, 64, 'Blue', 'assets/products/678b1f1f625386be0047fca903b4bc47.jpg,assets/products/ef994d6bfc89d54982223d61f864551a.jpg,assets/products/f95c77229f18e4719bd0edbcdb9eec05.jpg,assets/products/33cbd7ee174c6bd34ee936ec599ed287.jpg,assets/products/843797f59462dd2b5aa9ae23518702e5.jpg', 3),
(80, 65, 'Gray', 'assets/products/1e1fb8ec0f3615ef60a385dbfbf4f84c.jpg,assets/products/16ce238f5d6c0a86569b08c508817cb2.jpg,assets/products/7cf5d9119bd81eaf8f58708497c628c4.jpg,assets/products/256a9d8b72bcb69d1b51f754419955fd.jpg,assets/products/b7ed6c569202d046dfe8168beafef9c0.jpg', 3),
(81, 66, 'Red', 'assets/products/63d2c5bcf664efcdfde077375892d156.jpg,assets/products/edae9900681a233299fd54f4e811e02b.jpg,assets/products/94aed68d9fc91d16679d8648d9b7fdf3.jpg,assets/products/d805ad1a0aee7394a65fcc0dc29ea72e.jpg,assets/products/4c4a3b57614ec30d4e19ee7eca6773c3.jpg', 3),
(82, 67, 'White', 'assets/products/b69b5d68495518d9a689a33b6a298db3.jpg,assets/products/d7cd343374d49445cfc93b87ed860320.jpg,assets/products/436cdc7a671be1d22969fb4271423b0e.jpg', 3),
(83, 68, 'Pink', 'assets/products/e741eac39a97aac512b8ebdaaeeb858f.jpg,assets/products/610b8d45762941eefef1e9106c1a2b35.jpg,assets/products/ab269fed5e3584b0509899cd91b304bb.jpg,assets/products/bced64b341e7c72eac781904c4f163a9.jpg', 3),
(84, 69, 'Peach', 'assets/products/b09df869e92c07a074815814cd96c122.jpg,assets/products/960d881d9753f26169fb80185c5cf5dd.jpg,assets/products/b083da357a12be0f7ca0f7249fe0e19d.jpg,assets/products/ba361326ae2fd791629dfbe0a0a41673.jpg', 3),
(85, 70, 'Light Blue', 'assets/products/9b78e2be13928e219e747347f052cb80.jpg,assets/products/8d7cdffb45bb795c28c102f8d68c8e30.jpg,assets/products/cca40e6e56e058f1de7a391d382ae194.jpg', 3),
(86, 71, 'White', 'assets/products/157860e646c97ec8e421ba2c534b0445.jpg,assets/products/a4b274a8ce0f2cc32b5e358bc82b859a.jpg,assets/products/39eb018f9859211073a563443f71c900.jpg,assets/products/070afb7ec97c0668907c5e2fb3bb50ea.jpg,assets/products/99480d422ddd7c7145b05e5421e4fb23.jpg', 3),
(87, 72, 'Peach', 'assets/products/e6bf939c1fa067ab62c41c7c432061ca.jpg,assets/products/0ddfea8c034b7c6b24c5e137e135fdb7.jpg,assets/products/6d4b5012f7cf4d01f5c12bad79029e3e.jpg,assets/products/94f354386242e28c1d9d1514f0998a6f.jpg', 3),
(88, 73, 'Burgundy', 'assets/products/0b972ca558356ea26c2ec94ab302ced1.jpg,assets/products/6b8680891c773b96836e0dcf9dba8a88.jpg', 3),
(89, 74, 'Pink', 'assets/products/546efa047b8bb12a3dbc03bdf136070b.jpg,assets/products/81703b60a1521acb70e1838eb0f54c25.jpg,assets/products/4be29ee429dc7623505be46f961d7a9c.jpg', 3),
(90, 75, 'Blue', 'assets/products/ac5c3345fe2fcf2df7b053dd62047834.jpg,assets/products/ec09a2921a529c353da935ba25c8f646.jpg,assets/products/5a4d42792b8420a24229fdd158bb294c.jpg', 3),
(91, 76, 'Purple', 'assets/products/1bcc0994da5ee9e83e59a49a20763340.jpg,assets/products/bf2e60c6209177e0d19be8cdb88eed74.jpg,assets/products/22e309a6a67214d1d52a27db55a1ce3a.jpg,assets/products/ed3b3d8fa0e733b7ea4521547801114e.jpg', 3),
(92, 77, 'Red', 'assets/products/832c2f31b79510938441bd099698e6d8.jpg,assets/products/5d5fdbbe08d8068432461901c5f2f545.jpg,assets/products/64951b7f8a7126eaa663c256f26bff0c.jpg,assets/products/4ee0d633464b34e8a84a92bd0ef68232.jpg,assets/products/501084a741d1be7bd5af5df6308dd543.jpg', 3),
(93, 78, 'Pink', 'assets/products/765b26c38a2efcf90c91f9bbb586b804.jpg,assets/products/c8a50c786735043283d067e80eba922a.jpg,assets/products/0aa646dd1641846506ef51dc1831fd53.jpg,assets/products/384be379be4650a856c13bef4a91df6d.jpg', 3),
(94, 79, 'Green', 'assets/products/48cfbeb9a4ca2d3b6f35772e91d61d46.jpg,assets/products/e710cb5123267768e8b0a592079192a8.jpg,assets/products/e59db8ce0c3514ac6224c33aaac7aaf1.jpg,assets/products/6cad1ba11b6dc1429833c3c734a2205f.jpg,assets/products/655742748634f8c2f6704873a50cbe19.jpg,assets/products/38cdf56ea72eb5ea9aa93b708b42518c.jpg', 3),
(95, 80, 'Light Blue', 'assets/products/f6a8bbd66f83c6f4324391b84aa1919c.jpg,assets/products/1c1bee30ec42d9f402a5459d88ded457.jpg,assets/products/639aca533734e36e7d5ddce8932a4c52.jpg,assets/products/d0bd7477d79d26b3e888c63a982cb4fb.jpg', 3),
(96, 81, 'Blue', 'assets/products/562d9f6db8b8a26d2db31e3bcc5c1a5f.jpg,assets/products/f70a991990c5e1e4f0e5c677dcf089ca.jpg,assets/products/6964f35852721910c523c49c919b8a3e.jpg,assets/products/d47c45fbb07693aba4dad6d660e7d0b1.jpg', 3),
(97, 82, 'Light Green', 'assets/products/864ef6a60ab5710cd21970183c52f111.jpg,assets/products/0d532a717e9f0979a45ababa4fcc5d0f.jpg,assets/products/d31b6b875aef4c9f56ec351e610ed1a3.jpg,assets/products/908d6efc539cdb464e0a1d2460826ee4.jpg', 3),
(98, 83, 'White', 'assets/products/f5f4f5ed655dad235e4d6e8141abb789.jpg,assets/products/206b046f42b163e6440516db48dc0a06.jpg,assets/products/fc706720e754ae7615c60fd132c5b9bf.jpg,assets/products/04557c3b56ab97ceac09f7317b0d25af.jpg', 3),
(99, 84, 'Yellow', 'assets/products/cd0f40cdcbd249340c297ce3fd51b067.jpg,assets/products/083e07be1e1fb9beaaa6ebe244187e04.jpg,assets/products/60c1df2aa5f96db6581e582d5283b023.jpg,assets/products/060c653d0a8863d4040e707e76270588.jpg', 3),
(100, 85, 'Gray', 'assets/products/6a14bc3a2ccbf2d415dffd71b835aa43.jpg,assets/products/0fca55f696a6bf36b5c18c236c68a3ae.jpg,assets/products/d8f435e7b2d9ea4152210a7ce954e723.jpg,assets/products/1b56c3a9b9beba80cc6e60d0c66e0a02.jpg,assets/products/4431575f01d82bdee2d92328dafb61c8.jpg', 3),
(101, 86, 'Peach', 'assets/products/fc9424c9e9c2101c2f2056802308a3ac.jpg,assets/products/09717d64b9f98451d8453327a184fbca.jpg,assets/products/d0ba3c544d29be05bd9d00ed50a6340e.jpg,assets/products/42a20db0167415cbbd7b806421ec0b51.jpg', 3),
(102, 87, 'Yellow', 'assets/products/301df83f77b5a27a5b260eae7517318d.jpg,assets/products/cd2dc83b199458e30a47c7e758fd8ff5.jpg,assets/products/676f76fefa78cb79ffdb320fb9c98404.jpg,assets/products/8f16da7a7d831ffb1a9189a1877bd1e6.jpg,assets/products/439c98a032f214dab5fbd6c46a633ee4.jpg,assets/products/399162c1d0517a6abd2b8d0fa2cd6da7.jpg', 3),
(103, 88, 'Pink', 'assets/products/c5da213c63ce3dc409648d6eec6942fa.jpg,assets/products/001ae68b7b8f9ff3e95d47dd7c1c2e9f.jpg,assets/products/5042d5b198f6f4d073bfe6a3f07c0c28.jpg,assets/products/82b7ad280136e9ebf9768c96f641485f.jpg', 3),
(104, 89, 'Light Blue', 'assets/products/3be8c34e3d69b84ce17f59e14d1a64e7.jpg,assets/products/7b302c70b41da2a42c4dd82d4531f54a.jpg,assets/products/9742c71ec621dfd0e94b6fb8986bc181.jpg,assets/products/ad7bee37a9198c9315edda11ab29f11e.jpg,assets/products/b6247c7e651bfae362396ff1380631d3.jpg,assets/products/ca3335b986aef8747cb343c639241744.jpg,assets/products/abd9387bd74fa8619fac159a8fdaf323.jpg', 3),
(105, 90, 'Light Blue', 'assets/products/ebcb58300609eb42e92377a433e595cd.jpg,assets/products/f59bd622703a578bfc4583954978dbb7.jpg,assets/products/445cc05a351e31fbd84041a40420fdaa.jpg,assets/products/f5e0300449a55fbb1f7666d34258a796.jpg,assets/products/babde11876097c1335c3880add60fbbb.jpg,assets/products/fadfe86291a42535b865ab2abb6e523d.jpg', 3),
(106, 91, 'Orange', 'assets/products/8084b39155c783a2f319b3ef6c0a1396.jpg,assets/products/e66086dd5558a9b0d98b49cb386eddce.jpg', 3),
(107, 92, 'Dark Blue', 'assets/products/1e30ca91552a72081ec57bb809b23567.jpg,assets/products/1dc12c77ecfc945971b17b8be363eb1e.jpg', 3),
(108, 93, 'Yellow', 'assets/products/847e8231553d0bf059c88fe25f11bf39.jpg,assets/products/7fb018220ce2bae7a5057121a591e850.jpg,assets/products/0010cb4dd7e0bf6d21bc38a373ad516a.jpg,assets/products/06a92cb9c6d95f451e4e914e0d3c5fec.jpg,assets/products/967abde4039d685d7f3d0571d032c935.jpg,assets/products/440bfb506823dfa481559b812f09ffa7.jpg', 3),
(109, 94, 'Maroon', 'assets/products/741d204d2f5a6fe5273647e99ca54273.jpg,assets/products/65d1fb4afb9b51ca10d759c0c25f1072.jpg,assets/products/a43ae89efd90ee12c113fd1834ed2173.jpg', 3),
(110, 95, 'Green', 'assets/products/dbf296d73ca78b949f41dac4c4d04870.jpg,assets/products/ce1c408c12c92aba5d17dc14c7e0e28a.jpg,assets/products/449832484f5c06e676ac1d7e78db1c77.jpg,assets/products/fadb5ed07da96725562911e901193956.jpg', 3),
(111, 96, 'Dark Blue', 'assets/products/684e094db73f4fae34f6bc74f45bf548.jpg,assets/products/2e41a974044c0c11813690897310ae5c.jpg,assets/products/fc24382d1bab4356ba30c15b1df72151.jpg,assets/products/4befb7668c20fd84e845bbb0262230a6.jpg', 3),
(112, 97, 'Pink', 'assets/products/aaf6a45c08ad8677c54305546ebdf8ae.jpg,assets/products/393200f4fefeb553e73a517d3a236fd4.jpg,assets/products/6f59917df921e93aa6ef0f7ca9749db6.jpg,assets/products/f0001892286e7c59125886f3dd32255e.jpg', 3),
(113, 98, 'Gray', 'assets/products/8a7b5bf163064bb43c3cf4a53b9cb7ca.jpg,assets/products/0543fb7f7baba586e88f6d53150acb97.jpg,assets/products/0dcd6c81d3f9595f6385f7a178292056.jpg,assets/products/4375d43f8f37109971820a048ad956f6.jpg', 3),
(114, 99, 'Blue', 'assets/products/a3b22c43866ec7b95d1481e52b4661c7.jpg,assets/products/3150b3c3460ff1f5975422ee8e2ad0f2.jpg', 3),
(115, 100, 'Dark Blue', 'assets/products/a3e0c823c9d33636274c5da3391663f2.jpg,assets/products/50fe88006404ef7dcf789ee5178fcbed.jpg,assets/products/2eebf238dc05da284271f132a8fb60d6.jpg,assets/products/b9fe5edf1596914f81b5afc65ec29635.jpg,assets/products/a480e47b798ce65ce6aefd667530a9a8.jpg', 3),
(116, 101, 'Dark Blue', 'assets/products/8c6407a042a4888e077d72afd8b41748.jpg,assets/products/ba1b48b7b67b7349aaba6d252c1a8db8.jpg,assets/products/c2519eb425a4d55f07d9d8af54112d9d.jpg,assets/products/d598190ef6cbfcd14c9d31d922fe6914.jpg', 3),
(117, 102, 'Green', 'assets/products/a20d57b22111bdf2214332ce0be02ec2.jpg,assets/products/48009a0da189fd7cca2ba13652dbe17a.jpg,assets/products/52f5a4c2a977c750c1bb28187f93e3fa.jpg,assets/products/e31fa9136459508cabbf37d8ec72f655.jpg,assets/products/3821dda2c25162e0ed2b27e3ae8a1b96.jpg,assets/products/16b20d6dc1f8d3fa19a40fd4067e7fe9.jpg', 3),
(118, 103, 'Maroon', 'assets/products/f2e659043d6dab692fbe21d960b39e68.jpg,assets/products/371dd13f94de1e97d642be9a6ff03c68.jpg,assets/products/5177d919cb609c5eb1837cce82b5e3d1.jpg', 3),
(119, 104, 'Brown', 'assets/products/08fc69619775cdec09454d58b7fc1abe.jpg,assets/products/0c0800e8dcbe802f4e7e70a18a8fc2c6.jpg,assets/products/77de90ce1edd53d45477b995e5a7e094.jpg,assets/products/4e0cbd16ecda907f290a402006bfd1a6.jpg,assets/products/9f41b9812e3860073181d0704294fdc2.jpg', 3),
(120, 105, 'Peach', 'assets/products/13024d11557b6fada81c37eb69bd02be.jpg,assets/products/21fd31918e2cc27f9b86f19a057d8a48.jpg,assets/products/92da822d2804dd61aa73e60673602de3.jpg,assets/products/61268927330b2460de10f53756f951eb.jpg,assets/products/3f9b6023e4053347b99dfef4b9160163.jpg', 3),
(121, 106, 'Black', 'assets/products/96362d474ffb7a1b301c41c37ad90520.jpg,assets/products/069ec1d07c9864f3a02aac0e2c811e6b.jpg,assets/products/289a4ff95e93a834b1cdfc4f287360b8.jpg,assets/products/6b65d0647fd8cea929852e1b12679f17.jpg', 3),
(122, 107, 'Green', 'assets/products/0031008db9111475706fc68a4ec2f246.jpg,assets/products/401a89c6cad7fb39b5e0e3a0507ec461.jpg,assets/products/40f18d8ccfe7f2995d98bbfa68f39a3d.jpg', 3),
(123, 108, 'Yellow', 'assets/products/0bd0eaa9e17b28ea01ebffcc23145d15.jpg,assets/products/45857b6eb2fd495dac0788ff25c8f938.jpg,assets/products/eef1a1b26cdab63d2f6978b97fae3aaa.jpg,assets/products/29919dde1e36eec5e06a469c2b34ab59.jpg', 3),
(124, 109, 'Purple', 'assets/products/1c36660d99d3949795e6b3b0a870626a.jpg,assets/products/bcde6931ba70fe8320287e5ca9cfc416.jpg,assets/products/46a2b1cdb6cf6aecd0345214ecc4bc34.jpg,assets/products/15db22a26ed2ae5af4bf7479c05b9caa.jpg,assets/products/de394533bcf9ac4f1625a7c71cbf6687.jpg', 3),
(125, 110, 'Dark Blue', 'assets/products/bdaaf375caf08e2a44b990b351b456c1.jpg,assets/products/050bb585e0bade61df4a272975a14497.jpg,assets/products/b96a7356711f42840761b3d3901d7639.jpg,assets/products/1246e0622f310dfb08638eaa4f3b7058.jpg,assets/products/51d1eaea2c8307cf7ec585a977136918.jpg', 3),
(126, 111, 'Blue', 'assets/products/e99e752306b9c1950c448e68e9c21e02.jpg,assets/products/71f1209aa608ce35f237484a2a5cba74.jpg,assets/products/dfbd0e94fbfe55959e9054d30c856b0e.jpg,assets/products/ce56272e574d375d91225974b2321804.jpg,assets/products/9e455dd30a364068fb24b1bbd6310adf.jpg,assets/products/8df91207da047e41f11bc8f72d90a875.jpg', 3),
(127, 112, 'Pink', 'assets/products/5d1a7fe66166194b52c2177c70e17fdc.jpg,assets/products/357f7ce26cbc32da36dad836e37fc44a.jpg,assets/products/fe5e2a78b5e630158df1e1610fb7162b.jpg,assets/products/db65236f8f4043ace9ecb6498b77a8e1.jpg,assets/products/4455cee4389ebed51d83e11149ba9103.jpg', 3),
(128, 113, 'Maroon', 'assets/products/5b932b5c8a6fb4ab453cb32161e73bbf.jpg,assets/products/e57f22557a1fa28127a0340de8c7f90f.jpg,assets/products/7a0bdc072c272d8ec9e53c4dfa4c449b.jpg,assets/products/d0e81a8dbafea178a01dc59de7efdc1c.jpg,assets/products/23649564757f126697dae20e4778819b.jpg,assets/products/689d3db29a72111cf2405a4fab37ae34.jpg,assets/products/81e18f0740182fd973111a145cd27a25.jpg', 3),
(129, 114, 'Black', 'assets/products/387bca7171804397e2226be55f11de16.jpg,assets/products/679c9a1593897f55c5a84b83af182216.jpg,assets/products/a746c37cfb20bd35952ecaee7b7fdec1.jpg,assets/products/025757c9c73bc230a99f1354de1c094c.jpg,assets/products/d44f7e655781f618b5d3a49e05371d20.jpg,assets/products/6a831a58b4b1da967e9b346d44a50bba.jpg', 3),
(130, 115, 'White', 'assets/products/06c2e2820435b0d356dddd6b29a0ffd5.jpg,assets/products/38ac63638177b0219fc8d7d9b38c5d62.jpg,assets/products/f8641f48e9a4d2c91e647ba4be464a5f.jpg,assets/products/1389d93078037746f34ffc80dab1b644.jpg,assets/products/40eeb65603c7c9c641c586738b151f30.jpg,assets/products/506e11f076491196e853bfc5ee2d51ce.jpg', 3),
(131, 116, 'Gray', 'assets/products/a0b55aac34887760f1bebe71c85e0dd7.jpg,assets/products/b49facd8a2c087e7b673d23a78a5500c.jpg,assets/products/0b40b3a158b7a6b2d8a955b1bbd2f6c8.jpg,assets/products/dded1ff1e4d05685e270e397abed71a3.jpg', 3),
(132, 117, 'Dark Blue', 'assets/products/cc21a86f92ecc9e433fb5f8c9db8a54e.jpg,assets/products/cd96ca1aa0ccb12da2483d1d060ae831.jpg,assets/products/8cec53e18f61686e4f0034acf15af810.jpg,assets/products/c1ceab055d06c4b284e8e243b5d7d53a.jpg,assets/products/cd37d838f5888af06158053875e60bfa.jpg,assets/products/ba7e382e4404ff2fc0c194d25bb60e33.jpg', 3),
(133, 118, 'Yellow', 'assets/products/cba3bfcec019d3959334d5fdbb96821f.jpg,assets/products/592209d4f0e430b6345426d208f1ea5e.jpg,assets/products/eacdb9ed75956532803eda7960b558ed.jpg,assets/products/7183c01f3967e424b6f4ca8571950a9e.jpg', 3),
(134, 119, 'Pink', 'assets/products/5de4a0ce52e6774af4c62580da334fce.jpg,assets/products/5e23d462618baa903029eb739ddaaaef.jpg,assets/products/8a8bd84c79282c774f55b0ba4329498e.jpg,assets/products/e35365cb46081e3a7038497df6728ceb.jpg', 3),
(135, 120, 'Gray', 'assets/products/3630c29b2044e2660d4f4a7bc3b6a355.jpg,assets/products/67e9a8f633b353c99219d36714650819.jpg,assets/products/6f63f9a1708c07613a1db4ede8a24e07.jpg,assets/products/c571e593818eed2faecb7941f1c1eb7a.jpg,assets/products/8d955fc76576c2982ab13a9d114b71c9.jpg', 3),
(136, 121, 'Peach', 'assets/products/743d68e0c3a22718afe01f9633f8e323.jpg,assets/products/09089a45e1afa03d5d64cf9be333c2d5.jpg,assets/products/e5d290833e717976e1ac69919278b725.jpg,assets/products/537a2e2357aeafe2d9c6bcc687b3736e.jpg,assets/products/642b7a5bf84bb559f9c134c397c112f5.jpg', 3),
(137, 122, 'Dark Blue', 'assets/products/aa0abb7b155d27c313e08cd684b75b36.jpg,assets/products/d8202147be177551a8727c8aa695eb77.jpg,assets/products/9d2b88d9b60c69951e7abbec72e76ead.jpg', 3),
(138, 123, 'White', 'assets/products/b7e89123b7101579ecc28053fd42e4b2.jpg,assets/products/b1636d7c0750f9d9861e8c315b045a40.jpg', 3),
(139, 124, 'White', 'assets/products/67cbbd0720506110c1e654b34e89bf66.jpg,assets/products/caa55db1c412dc49408a5021fca593c4.jpg,assets/products/4401945788e907d532e3c120923dc438.jpg', 0),
(140, 125, 'Black', 'assets/products/c1fce7fdbb78a4d22132253e86e266a5.jpg,assets/products/dfd61dc481ce820a5a133219e5d3c26f.jpg', 3),
(141, 126, 'Green', 'assets/products/33d384bbcc11c2e60148b2d7ae5f142a.jpg,assets/products/e1c15a6a27cffabe363a5714f5e400d1.jpg', 3),
(142, 127, 'Maroon', 'assets/products/c4587be12bad3b5056b62288d3fbf18a.jpg,assets/products/448e0df7503249cd915e3a4ceb70f368.jpg', 3),
(143, 128, 'Black', 'assets/products/ede3859d34880b5ca801266b0d808553.jpg,assets/products/83532436d53c1609ae9ce8d2d7443071.jpg', 3),
(144, 129, 'Brown', 'assets/products/13bd8c1343b08b14cc72e6ca0139f31b.jpg,assets/products/fe4d65154e1e52c314077ec916cd8560.jpg', 4),
(145, 130, 'Red', 'assets/products/404e38ca879fb9fa2127e1ce9e0c11ed.jpg,assets/products/20c1f93320240d839cc960d31791cb63.jpg', 0),
(146, 131, 'Green', 'assets/products/8774a2154f0af7ab255be4834b7a78a0.jpg,assets/products/7152c94dd77c2e0228f09b2b8decfc38.jpg,assets/products/0db83721d214df93a3aace983c5719ee.jpg,assets/products/629468d85301fa4419314dd617aedbfe.jpg', 10),
(147, 132, 'Green', 'assets/products/01280b851136bcc74da8c5411e16ea6a.jpg,assets/products/baf95195e8b6e6196a6589887455cfd8.jpg,assets/products/7f050724b7799cbbadd3bcfbcf34793a.jpg,assets/products/007e313cecd14382ecd8c5fc67e82e67.jpg', 8),
(148, 133, 'Purple', 'assets/products/b29dcd666bc891817afa23b595038bc9.jpg,assets/products/6545a4a2a2c758f9e7cb9ef520808277.jpg', 16),
(149, 134, 'Green', 'assets/products/e4f35ed2fb28d79d67a03a9d53b03afb.jpg,assets/products/7a3d7b151a8c81d1372a17d7bfca445f.jpg,assets/products/94e09d9755264a885644be5925e8e651.jpg,assets/products/1d58650934ff85158ba027138c90868a.jpg', 6),
(150, 135, 'Maroon', 'assets/products/6c42757cc47019e17e254f386d2de395.jpg,assets/products/c180cfdc052330a328ee7cf1ad64c075.jpg,assets/products/6b61206628daf4b86369723a12a748b1.jpg,assets/products/012436c0744d50391ec078408c69289c.jpg,assets/products/8a03e4455248cb9d2bf8bab1e03d42ce.jpg', 15),
(151, 136, 'Peach', 'assets/products/16bcab969c1b1a98b9060101d7036414.jpg,assets/products/7ac7055429f03a8cf855406971fa6a2c.jpg,assets/products/09388d74479277627381e2c07db0cd3c.jpg', 12),
(152, 137, 'Purple', 'assets/products/ac5f913907edbbacfb433244619a8058.jpg,assets/products/74db375a97e8bfcc7abd72ccc254be6e.jpg,assets/products/8f07d844d13f638d5d3407cd19298dad.jpg,assets/products/5c210b5afcaf53c6b0a0ddb5f390466f.jpg', 17),
(153, 137, 'Red', 'assets/products/7d10a3c6a585e93836c89372e6fbb206.jpg,assets/products/2f0f85e8f666e5141c99f5b4e1ea8011.jpg,assets/products/e4d4cbb5bcd16b50fae5739e3742cef9.jpg,assets/products/794d9a8de51cecf8d25f6fe12171513a.jpg', 17),
(154, 138, 'Black', 'assets/products/ac388768d5321d0ca48e96e1dfee9b3b.jpg,assets/products/e9fee1d336a9e2de574a2b05b759e95c.jpg,assets/products/e01ea53fb6cbb118bbce463ea34a6921.jpg,assets/products/d510173e79c010d3c4eaf35d3d4032a0.jpg', 6),
(155, 139, 'Dark Blue', 'assets/products/61c1313db0b770f7fc13caf74cfb15e4.jpg,assets/products/0f043c5027ae0fdaeefa3f744694e1ce.jpg,assets/products/f59484c76f0732bb295e7225b7a7fa98.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promocode`
--

CREATE TABLE `tbl_promocode` (
  `promocode_id` int(5) NOT NULL,
  `code` varchar(20) NOT NULL,
  `amount` int(5) NOT NULL,
  `min_bill_price` int(5) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_promocode`
--

INSERT INTO `tbl_promocode` (`promocode_id`, `code`, `amount`, `min_bill_price`, `status`) VALUES
(1, 'AKB045', 2000, 25000, 0),
(2, 'AB45MK', 1000, 15000, 1),
(3, 'RV099', 1200, 8000, 1),
(4, 'SUNNY04', 1300, 10000, 1),
(5, 'HOLI20', 800, 4000, 0),
(6, 'PRI60', 850, 4500, 1),
(7, 'FREE150', 150, 3000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recent_view`
--

CREATE TABLE `tbl_recent_view` (
  `view_id` int(5) NOT NULL,
  `register_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_recent_view`
--

INSERT INTO `tbl_recent_view` (`view_id`, `register_id`, `product_id`) VALUES
(1, 1, 47),
(2, 1, 44),
(3, 1, 7),
(4, 1, 121),
(5, 1, 6),
(6, 2, 6),
(7, 2, 115),
(8, 1, 14),
(9, 1, 5),
(10, 5, 23),
(11, 5, 2),
(12, 5, 14),
(13, 5, 137),
(14, 5, 12),
(15, 6, 17),
(16, 6, 20);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `register_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `profile_pic` varchar(150) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `birth_date` date NOT NULL,
  `join_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`register_id`, `name`, `email`, `mobile`, `profile_pic`, `password`, `gender`, `birth_date`, `join_date`, `last_login`, `status`) VALUES
(1, 'Darshak Akbari', 'darshakakbari0@gmail.com', '9925584489', 'assets/profile/a60e96c1ba54e569508565716c604841.jpg', 'ab45d6fdc0097a1a56283b33384c0658dfe0349056ac4c95de0303cb9967a14424c2147d759b3579132aefa30bddd124e883df2ffb3d59c5336683dd7c1854f65ujOcJLYQyKk/bC5YNmbxsUPp2kUMoEhaYpFxK2XMQ8=', 'Male', '1997-03-11', '2022-04-15', '2022-04-15 10:23:48', 1),
(2, 'Mihir vaghasiya', 'vaghasiyamihir712@gmail.com', '9265778295', 'assets/profile/a73056e72f7e560bec99a5ca4bf3cddb.jpg', '2c00bc7945accc5b8ad48e313ac540631930e52fc4bb8d0cb1a7e19d7d0f0a60945efe9a6f45cd70a27fabeb98d78d90ad8c5d02ed6eb638394e97ec95638698WfLNI2hGa2bh0x/EGrcyKSY3vVT89LdHZ2IaDc6h6Ks=', 'Male', '2001-12-07', '2022-04-15', '2022-04-16 10:55:46', 1),
(3, 'Nirali Dhorajiya', 'nirupatel7498@gmail.com', '9081024535', 'assets/profile/eb13fb9e4cb1eff6716e4f11f99b1b36.jpg', '42814148fbf93380086a88708d2c11099a8a123ced7f7f1c01256b2e21f96c9a71af713b62a0ff3071ea4815ecc4780f7c70d7aa36d3298d0acc1123f4e028dfZvepVhCJZXKzoU06ktqTWUwWEIVZAJn/FZTQb9SVREg=', 'Female', '1998-06-28', '2022-04-16', '2022-04-16 11:51:02', 1),
(4, 'Devendra Sheladiya', 'dvsheladiya004@gmail.com', '7878793279', 'assets/profile/a746a41aa210e8013b54560eda413b27.jpg', '52086f358ba8d1946532207e8030e087eb1fed2191e8f5b61f3045a0afdd4daacf0256a729d53c2ed922216dc8d93134833766e8d948ffd073028119edf3bf3eY2bA9C6zZMgK57NelXPFRyGrFcywYHxA+pXp2pQEouU=', 'Male', '1998-06-17', '2022-04-16', '2022-04-16 10:51:41', 1),
(5, 'Priya Patel', 'appwizdom1@gmail.com', '8460213944', 'assets/profile/5162980adbbc92f683516a827187347f.jpg', '4f6071a6629c99e577f71400ffc2186c26e974bd4eb8c2812be7d91c824284188f4f0394ce8b1103f67d165fd1633b6ecad7968a40663950d6db5aae4404c04eHnG6wQ15tY+T1kZO003W77oIoKg33PHBH+PBs96vmYg=', 'Female', '1997-10-26', '2022-04-16', '2022-04-16 11:52:55', 1),
(6, 'Shrenika Dhanani', 'dhananishrenika@gmail.com', '9081024536', 'assets/profile/8eef49042500cca8a65d470b1726aa23.jpg', '93025d7a972dc34f05b2ee3ea695bde99529b814c33d0d29373df0c22dea6699e88b261254e6e99b52b5a60b266fe51341530026e331a3a59911f7a1b08a546ajzOorRHsSMJmSzqvvCZTfUueO52SDlYUwE7MD5D/W9o=', 'Female', '1999-11-18', '2022-04-16', '2022-04-16 01:35:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_return_policy`
--

CREATE TABLE `tbl_return_policy` (
  `return_id` int(5) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_return_policy`
--

INSERT INTO `tbl_return_policy` (`return_id`, `data`) VALUES
(1, '<p><strong>What can I return?</strong></p>\r\n\r\n<p>&bull; You may return any item purchased from Shangar Collection that is unused, in new condition or any item that was damaged upon receipt.<br />\r\n&bull; Customised styles, kids wear, jutties, blouses &amp; accessories are non-returnable.<br />\r\n&nbsp;</p>\r\n'),
(2, '<p><strong>Who pays for shipping and what are the return charges?</strong></p>\r\n\r\n<p>&bull; Shipping is free within and outside India.<br />\r\n&bull;&nbsp;<strong>For orders delivered within India</strong>&nbsp;- FREE Returns<br />\r\n&bull;&nbsp;<strong>For orders delivered in US - Reverse pick up charges</strong>&nbsp;- $40 Per Item<br />\r\n&bull;&nbsp;<strong>For orders delivered in rest of the countries</strong>&nbsp;- Customers will be responsible to ship the product back to us with tracking details at shangarcollection@gmail.com. Customer will be liable to pay the return shipping and customs charges which is non-refundable.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(3, '<p><strong>Are there any duties and taxes?</strong></p>\r\n\r\n<p>&bull;&nbsp;<strong>For customers within India,</strong>&nbsp;all prices specified on the website are inclusive of GST.<br />\r\n&bull;&nbsp;<strong>For customers outside India,</strong>&nbsp;duties are not included in the price. Customers are responsible for paying any import duties, custom fees or local/VAT taxes. Shangar Collection will not reimburse these expenses. It is necessary to pay these in order to release your order from customs.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(4, '<p><strong>When will I get my refund?</strong></p>\r\n\r\n<p>&bull; We will initiate a refund once the product is received back in our warehouse</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(5, '<p><strong>How can I claim my return?</strong></p>\r\n\r\n<p>&bull; We will accept returns whithin 15 days<br />\r\n&bull; For returns/exchanges requests kindly login to your account, click &quot;My Returns/ Exchanges&quot; and select the order number and place a request (check steps to claim at the bottom). Our Service Manager will revert back to you within 24 hours&rsquo; time.<br />\r\n&bull; You can also return/exchange at our Shangar stores in Surat, India.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(6, '<p><strong>How much time the refund takes?</strong></p>\r\n\r\n<p>&bull; Refund is processed once the product is delivered back to our warehouse and quality check is done.<br />\r\n&bull; Refunds usually take 8-10 working days.<br />\r\n&bull; Refund can also be provided in the form of store credit on Demand</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(7, '<p><strong>Can I return in store and get it exchange?</strong></p>\r\n\r\n<p>&bull; Yes, you can return in store and get it exchange. You will need to raise a return/exchange request on the website (steps mentioned at the bottom). Just mention in comment section which store you will be returning it to.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(8, '<p><strong>Product purchased online can be picked up in store?</strong></p>\r\n\r\n<p>&bull; Yes, products purchased online can be picked up at any nearest Shangar Collection store located in Surat. One should intimate us (shangarcollection@gmail.com) the exact date when they need to pick up, so accordingly we can arrange in store.</p>\r\n\r\n<p>&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(5) NOT NULL,
  `register_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `rating` int(5) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `register_id`, `product_id`, `rating`, `message`, `date`, `status`) VALUES
(1, 1, 47, 5, 'I would say outstanding..What a fab saree I would say . Its a really awsm one.The colour of saree is Awesome too..Fabric Quality and design is also best and beautiful.The Purchase of saree also better from amazon.I am personally using it and loved the way it fits into me ..The smoothness of the saree is fab .. Great packaging and timely delivery too..I am fan of this one.. What to tell u guys...jst go for it..', '2022-04-15 09:18:50', 1),
(2, 1, 121, 5, 'What a fab one i will say .. Jst out of the world..Good quality...affordable and very nice.. This a fabulous product and very nice..\nNice color.looking gorgious.Quality is very good.Good color combination...\n... Awesome saree...Great design . personally loved it..', '2022-04-15 09:54:05', 0),
(3, 1, 6, 5, 'Good looking, color is same as shown in the picture. Soft material, easy to wear.\nThis is a really pretty color, and the weaving is pretty. It flows nicely and is fun to wear..\nBeautifully made. Exactly what I needed. Prompt delivery. Was delivered earlier than expected...', '2022-04-15 09:54:24', 0),
(4, 2, 115, 5, 'I am so happy that I did my shopping for men’s accessories on Shangar Collection. I got the nice jacket, delivery was before the time and I also liked the packaging. Once again thanks Shangar Collection!!', '2022-04-15 11:39:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipment`
--

CREATE TABLE `tbl_shipment` (
  `shipment_id` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `register_id` int(5) NOT NULL,
  `location_id` int(5) NOT NULL,
  `address` varchar(300) NOT NULL,
  `address_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shipment`
--

INSERT INTO `tbl_shipment` (`shipment_id`, `name`, `register_id`, `location_id`, `address`, `address_type`) VALUES
(1, 'Darshak Akbari', 1, 34, 'Owal-4 , Air force Road, Jamnagar', 'home'),
(2, 'Darshak Akbari', 1, 8, '110,111,Royal Arcade, Sharthana Jakatnaka', 'office'),
(3, 'Ravi vaghasiya', 2, 8, 'C-4 Avanti soc. , Labheshwer Chowk, L.H.Road,Surat', 'home'),
(4, 'Nirali Dhorajiya', 3, 8, 'B-102 Pramukh Park society, Canel Road , surat', 'home'),
(5, 'Devendra Sheladiya', 4, 9, 'C-58, Ramnagar soc. Oop Ms university ,Vadodara', 'home'),
(6, 'Priya Patel', 5, 30, 'B-44, Raj Complex ,Near Gondal Chowkdi,Rajkot ', 'home'),
(7, 'Shrenika Dhanani', 6, 8, '2,3,4 Neelkamal Park soc.L.H.Road', 'home');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_terms_condition`
--

CREATE TABLE `tbl_terms_condition` (
  `term_id` int(5) NOT NULL,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_terms_condition`
--

INSERT INTO `tbl_terms_condition` (`term_id`, `data`) VALUES
(3, '<h3><strong><strong>Introduction</strong></strong></h3>\r\n\r\n<p><strong>&nbsp;</strong></p>\r\n\r\n<p>Welcome to the&nbsp;<strong>Shangar Collection</strong>. In using the service of&nbsp;Shangar Collection. you are deemed to have accepted the terms and conditions listed herein.</p>\r\n\r\n<p>PLEASE READ THESE TERMS OF USE (&quot;AGREEMENT&quot; OR &quot;TERMS OF USE&quot;) CAREFULLY BEFORE USING THE WEBSITE AND SERVICES OFFERED BY SUARABHAKTI GOODS PVT. LTD. (&quot;SHANGAR &quot;). THIS AGREEMENT SETS FORTH THE LEGALLY BINDING TERMS AND CONDITIONS FOR YOUR USE OF THE WEBSITE AT www.shangarcollection.com (THE &quot;SITE&quot;) AND ALL SERVICES PROVIDED BY SHANGAR ON THE SITE. shangarcollection.com IS NOT AFFILIATED WITH ANY OTHER WEBSITE.</p>\r\n\r\n<p>All products/services and information displayed on&nbsp;Shangar Collection&nbsp;constitute an &quot;invitation to offer&quot;. Your order for purchase constitutes your &quot;offer&quot; which shall be subject to the terms and conditions as listed below.&nbsp;Shangar Collection&nbsp;reserves the right to accept or reject your offer. If you have supplied us with your valid email address, we will notify you by email as soon as possible to confirm receipt of your order and email you again to confirm details and therefore process the order. Our acceptance of your order will take place upon dispatch of the product(s) ordered. No act or omission of&nbsp;Shangar Collection&nbsp;prior to the actual dispatch of the product(s) ordered will constitute acceptance of your offer.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(4, '<p><strong>Eligibility for Membership</strong></p>\r\n\r\n<p>Use of the Site is available only to persons who can form legally binding contracts under applicable law. Persons who are &quot;incompetent to contract&quot; within the meaning of the Indian Contract Act, 1872 including un-discharged insolvents etc. are not eligible to use the Site. If you are a minor i.e. under the age of 18 years but at least 13 years of age, you may use this Site only under the supervision of a parent or legal guardian who agrees to be bound by these Terms of Use. If your age is below that of 18 years your parents or legal guardians can transact on behalf of you if they are registered users. You are prohibited from purchasing any material which is for adult consumption, the sale or purchase of which to/by minors are strictly prohibited.<br />\r\n<br />\r\nShangar Collection&nbsp;reserves the right to terminate your membership and refuse to provide you with access to the Site if&nbsp;Shangar Collection&nbsp;discovers that you are under the age of 18 years. The Site is not available to persons whose membership has been suspended or terminated by&nbsp;Shangar Collection&nbsp;for any reason whatsoever. If you are registering as a business entity, you represent that you have the authority to bind the entity to this User Agreement.&nbsp;<br />\r\nExcept where additional terms and conditions are provided which are product specific, these terms and conditions supersede all previous representations, understandings, or agreements and shall prevail notwithstanding any variance with any other terms of any order submitted. By using the services of&nbsp;Shangar Collection&nbsp;you agree to be bound by the Terms and Conditions.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(5, '<p><strong>Account and Registration Obligations</strong></p>\r\n\r\n<p>&quot;Your Information&quot; is defined as any information you provide to us in the registration, buying or listing process, in the feedback area or through any email feature. We will protect Your Information in accordance with our Privacy Policy. If you use the Site, you are responsible for maintaining the confidentiality of Your Account and Password and for restricting access to your computer, and you agree to accept responsibility for all activities that occur under Your Account or Password. Shangar Collection&nbsp;shall not be liable to any person for any loss or damage which may arise as a result of any failure by you to protect your password or account. If you know or suspect that someone else knows your password, you should notify us by contacting us immediately through the address provided below. If&nbsp;Shangar Collection&nbsp;has reason to believe that there is likely to be a breach of security or misuse of the&nbsp;Shangar Collection&nbsp;Site, we may require you to change your password or we may suspend your account without any liability to&nbsp;Shangar Collection.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n'),
(6, '<p><strong>You also agrees to:</strong></p>\r\n\r\n<p>Provide true, accurate, current and complete information about yourself in&nbsp;Shangar Collection&nbsp;&#39;s registration form (such information being the &quot;Registration Data&quot;).</p>\r\n\r\n<p>Maintain and promptly update the Registration Data to keep it true, accurate, current and complete. If you provide any information that is untrue, inaccurate, incomplete, or not current or if&nbsp;Shangar Collection&nbsp;has reasonable grounds to suspect that such information is untrue, inaccurate, not current or not in accordance with the User Agreement,&nbsp;Shangar Collection&nbsp;has the right to indefinitely suspend or terminate your membership and refuse to provide you with access to the Site.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(7, '<p><strong>Pricing Information</strong></p>\r\n\r\n<p>While&nbsp;Shangar Collection&nbsp;strives to provide accurate product and pricing information, pricing or typographical errors may occur.&nbsp;Shangar Collection&nbsp;cannot confirm the price of a product until after you order. In the event that a product is listed at an incorrect price or with incorrect information due to an error in pricing or product information,&nbsp;Shangar Collection&nbsp;shall have the right, at our sole discretion, to refuse or cancel any orders placed for that product, unless the product has already been dispatched. In the event that an item is mis-priced,&nbsp;Shangar Collection&nbsp;may, at its discretion, either contact you for instructions or cancel your order and notify you of such cancellation. Unless the product ordered by you has been dispatched, your offer will not be deemed accepted and&nbsp;Shangar Collection&nbsp;will have the right to modify the price of the product and contact you for further instructions using the e-mail address provided by you during the time of registration, or cancel the order and notify you of such cancellation. In the event that&nbsp;Shangar Collection&nbsp;accepts your order the same shall be debited to your credit card account and duly notified to you by email that the payment has been processed. The payment may be processed prior to&nbsp;Shangar Collection&nbsp;dispatch of the product that you have ordered. If we have to cancel the order after we have processed the payment, the said amount will be reversed back to your credit card account.<br />\r\n<br />\r\nWe strive to provide you with the best prices. However, sometimes a price online does not match the price in a store. In our effort to be the lowest price provider in your particular geographic region, store pricing may sometimes differ from online prices. Prices and availability are subject to change without notice.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(8, '<p><strong>Cancellation by&nbsp;Shangar Collection</strong></p>\r\n\r\n<p>Please note that there may be certain orders that we are unable to accept and must cancel. We reserve the right, at our sole discretion, to refuse or cancel any order for any reason. Some situations that may result in your order being canceled include limitations on quantities available for purchase, inaccuracies or errors in product or pricing information, or problems identified by our credit and fraud avoidance department. We may also require additional verifications or information before accepting any order. We will contact you if all or any portion of your order is canceled or if additional information is required to accept your order. If your order is cancelled after your credit card has been charged, the said amount will be reversed back in your Card Account.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(9, '<p><strong>Credit Card Details</strong></p>\r\n\r\n<p>You agree, understand and confirm that the credit card details provided by you for availing of services on&nbsp;Shangar Collection&nbsp;will be correct and accurate and you shall not use the credit card which is not lawfully owned by you, i.e. in a credit card transaction, you must use your own credit card. You further agree and undertake to provide the correct and valid credit card details when making payment on&nbsp;Shangar Collection. Your credit card information never reaches&nbsp;Shangar Collection, we just get pass, hold or fail message from our payment gateways. The said information will not be utilised and shared by our payment gateways or&nbsp;Shangar Collection&nbsp;with any of the third parties unless required for fraud verifications or by law, regulation or court order.&nbsp;Shangar Collection&nbsp;will not be liable for any credit card fraud. The liability for use of a card fraudulently will be on you and the onus to &#39;prove otherwise&#39; shall be exclusively on you.</p>\r\n\r\n<p>If you face any issues with the payment, you can inform us within 48 hours of the payment via call at : + 919265778295 24/7 or email us at : shangarcollection@gmail.com for quick chat now even you can whatsapp us at +919081024535</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(10, '<p><strong>Fraudulent /Declined Transactions</strong></p>\r\n\r\n<p>Shangar Collection&nbsp;reserves the right to recover the cost of goods, collection charges and lawyers fees from persons using the Site fraudulently.&nbsp;Shangar Collection&nbsp;reserves the right to initiate legal proceedings against such persons for fraudulent use of the Site and any other unlawful acts or acts or omissions in breach of these terms and conditions.</p>\r\n\r\n<p>We as a merchant shall be under no liability whatsoever in respect of any loss or damage arising directly or indirectly out of the decline of authorization for any Transaction, on Account of the Cardholder having exceeded the preset limit mutually agreed by us with our acquiring bank from time to time.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(11, '<p><strong>Electronic Communications</strong></p>\r\n\r\n<p>When you visit the Site or send emails to us, you are communicating with us electronically. You consent to receive communications from us electronically. We will communicate with you by email or by posting notices on the Site. You agree that all agreements, notices, disclosures and other communications that we provide to you electronically satisfy any legal requirement that such communications be in writing.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(12, '<p><strong>Conditions for Customer Support Chat</strong></p>\r\n\r\n<p>Shangar Collection&nbsp;may suspend&nbsp;Shangar Collection&nbsp;live support service at any time without notice.</p>\r\n\r\n<p>Shangar Collection&nbsp;or its executives are not responsible for any delay caused in attending to or replying to the queries via chat.&nbsp;<br />\r\nAny communication through chat may be stored by&nbsp;Shangar Collection&nbsp;for&nbsp;Shangar Collection&nbsp;reference; customer would not have the right to access this information at a later date.</p>\r\n\r\n<p>While chatting you may not put on any objectionable information i.e. unlawful, threatening, abusive, defamatory, obscene information.&nbsp;<br />\r\nThe chat room will not be used for selling of any products or advising on business opportunity or any other form of solicitation.<br />\r\nYou may proceed further, and chat with our online customer care executive only if you agree to the above terms and conditions.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(13, '<p><strong>You Agree and Confirm</strong></p>\r\n\r\n<p>That in the event that a non-delivery occurs on account of a mistake by you (i.e. wrong name or address or any other wrong information) any extra cost incurred by&nbsp;Shangar Collection&nbsp;for redelivery shall be claimed from you.&nbsp;</p>\r\n\r\n<p>That you will use the services provided by&nbsp;Shangar Collection, its affiliates and contracted companies, for lawful purposes only and comply with all applicable laws and regulations while using the Site and transacting on the Site.&nbsp;</p>\r\n\r\n<p>You will provide authentic and true information in all instances where such information is requested of you.&nbsp;Shangar Collection&nbsp;reserves the right to confirm and validate the information and other details provided by you at any point of time. If upon confirmation your details are found not to be true (wholly or partly),&nbsp;Shangar Collection&nbsp;has the right in its sole discretion to reject the registration and debar you from using the Services of&nbsp;Shangar Collection&nbsp;and / or other affiliated websites without prior intimation whatsoever.</p>\r\n\r\n<p>That you are accessing the services available on this Site and transacting at your sole risk and are using your best and prudent judgment before entering into any transaction through this Site.</p>\r\n\r\n<p>That the address at which delivery of the product ordered by you is to be made will be correct and proper in all respects.&nbsp;<br />\r\nThat before placing an order you will check the product description carefully. By placing an order for a product you agree to be bound by the conditions of sale included in the item&#39;s description.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(14, '<p><strong>You may not use the Site for any of the following purposes:</strong></p>\r\n\r\n<p>Disseminating any unlawful, harassing, libelous, abusive, threatening, harmful, vulgar, obscene, or otherwise objectionable material.&nbsp;<br />\r\nTransmitting material that encourages conduct that constitutes a criminal offence, results in civil liability or otherwise breaches any relevant laws, regulations or code of practice.</p>\r\n\r\n<p>Gaining unauthorized access to other computer systems. Interfering with any other person&#39;s use or enjoyment of the Site.&nbsp;</p>\r\n\r\n<p>Breaching any applicable laws;&nbsp;</p>\r\n\r\n<p>Interfering or disrupting networks or web sites connected to the Site.&nbsp;</p>\r\n\r\n<p>Making, transmitting or storing electronic copies of materials protected by copyright without the permission of the owner.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(15, '<p><strong>Modification of Terms &amp; Conditions of Service</strong></p>\r\n\r\n<p>Shangar Collection&nbsp;may at any time modify the Terms &amp; Conditions of Use of the site without any prior notification to you. You can access the latest version of the User Agreement at any given time on&nbsp;Shangar Collection. You should regularly review the Terms &amp; Conditions on&nbsp;Shangar Collection. In the event the modified Terms &amp; Conditions is not acceptable to you, you should discontinue using the service. However, if you continue to use the service you shall be deemed to have agreed to accept and abide by the modified Terms &amp; Conditions of Use of this site.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(16, '<p><strong>Governing Law and Jurisdiction</strong></p>\r\n\r\n<p>This User Agreement shall be construed in accord with the applicable laws of India. The Courts at Mumbai shall have exclusive jurisdiction in any proceedings arising out of this agreement.</p>\r\n\r\n<p>Any dispute or difference either in interpretation or otherwise, of any terms of this User Agreement between the parties hereto, the same shall be referred to an independent arbitrator who will be appointed by&nbsp;Shangar Collection&nbsp;and his decision shall be final and binding on the parties hereto. The above arbitration shall be in accordance with the Arbitration and Conciliation Act, 1996 as amended time to time. The arbitration shall be held in Mumbai. The High Court of judicature at Mumbai alone shall have the jurisdiction and the Laws of India shall apply.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(17, '<p><strong>Reviews, Feedback, Submissions</strong></p>\r\n\r\n<p>All reviews, comments, feedback, postcards, suggestions, ideas, and other submissions disclosed, submitted or offered to&nbsp;Shangar Collection&nbsp;on or by this Site or otherwise disclosed, submitted or offered in connection with your use of this Site (collectively, the &quot;Comments&quot;) shall be and remain&nbsp;Shangar Collection&nbsp;property. Such disclosure, submission or offer of any Comments shall constitute an assignment to&nbsp;Shangar Collection&nbsp;of all worldwide rights, titles and interests in all copyrights and other intellectual properties in the Comments. Thus,&nbsp;Shangar Collection&nbsp;owns exclusively all such rights, titles and interests and shall not be limited in any way in its use, commercial or otherwise, of any Comments.&nbsp;Shangar Collection&nbsp;will be entitled to use, reproduce, disclose, modify, adapt, create derivative works from, publish, display and distribute any Comments you submit for any purpose whatsoever, without restriction and without compensating you in any way.&nbsp;Shangar Collection&nbsp;is and shall be under no obligation (1) to maintain any Comments in confidence; (2) to pay you any compensation for any Comments; or (3) to respond to any Comments. You agree that any Comments submitted by you to the Site will not violate this policy or any right of any third party, including copyright, trademark, privacy or other personal or proprietary right(s), and will not cause injury to any person or entity. You further agree that no Comments submitted by you to the Site will be or contain libelous or otherwise unlawful, threatening, abusive or obscene material, or contain software viruses, political campaigning, commercial solicitation, chain letters, mass mailings or any form of &quot;spam&quot;.</p>\r\n\r\n<p><br />\r\nShangar Collection&nbsp;does not regularly review posted Comments, but does reserve the right (but not the obligation) to monitor and edit or remove any Comments submitted to the Site. You grant&nbsp;Shangar Collection&nbsp;the right to use the name that you submit in connection with any Comments. You agree not to use a false email address, impersonate any person or entity, or otherwise mislead as to the origin of any Comments you submit. You are and shall remain solely responsible for the content of any Comments you make and you agree to indemnify&nbsp;Shangar Collection&nbsp;and its affiliates for all claims resulting from any Comments you submit.&nbsp;Shangar Collection&nbsp;and its affiliates take no responsibility and assume no liability for any Comments submitted by you or any third party.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(18, '<p><strong>Force Majeure</strong></p>\r\n\r\n<p>&nbsp;Shangar cannot be held liable for failure to fulfill one of its commitments to the Customer, if this failure is due to a case of force majeure such as war, strike (in-house or at one of its service providers), lock-out, accident, fire, ice, flood, bad weather, interruption or suspension of means of communication and/or transport, blockade, blockage of exports, prohibited import or export, cessation of production or delivery, regulatory decision of an administrative supervisory body, etc.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(19, '<p><strong>Copyright &amp; Trademark</strong></p>\r\n\r\n<p>Shangar Collection&nbsp;and its suppliers and licensors expressly reserve all intellectual property rights in all text, programs, products, processes, technology, content and other materials, which appear on this Site. Access to this Site does not confer and shall not be considered as conferring upon anyone any license under any of&nbsp;Shangar Collection&nbsp;or any third party&#39;s intellectual property rights. All rights, including copyright, in this website are owned by or licensed to&nbsp;Shangar Collection&nbsp;or third party suppliers. Any use of this website or its contents, including copying or storing it or them in whole or part, other than for your own personal, non-commercial use is prohibited without the permission of&nbsp;Shangar Collection. You can not modify, distribute or re-post anything on this website for any purpose.</p>\r\n\r\n<p><br />\r\nThe&nbsp;Shangar Collection&nbsp;names and logos and all related product and service and Shangar slogans are the trademarks or service marks of&nbsp;Shangar Collection. All other marks are the property of their respective companies. No trademark or service mark license is granted in connection with the materials contained on this Site. Access to this Site does not authorize anyone to use any name, logo or mark in any manner.<br />\r\n<br />\r\nAll materials, including images, text, illustrations, designs, icons, photographs, programs, music clips or downloads, video clips and written and other materials that are part of this Site (collectively, the &quot;Contents&quot;) are intended solely for personal, non-commercial use. You may download or copy the Contents and other downloadable materials displayed on the Site for your personal use only. No right, title or interest in any downloaded materials or software is transferred to you as a result of any such downloading or copying. You may not reproduce (except as noted above), publish, transmit, distribute, display, modify, create derivative works from, sell or participate in any sale of or exploit in any way, in whole or in part, any of the Contents, the Site or any related software. All software used on this Site is the property of&nbsp;Shangar Collection&nbsp;or its suppliers and protected by Indian and international copyright laws. The Contents and software on this Site may be used only as a shopping resource. Any other use, including the reproduction, modification, distribution, transmission, republication, display, or performance, of the Contents on this Site is strictly prohibited. Unless otherwise noted, all Contents are copyrights, trademarks and/or other intellectual property owned, controlled or licensed by&nbsp;Shangar Collection&nbsp;,one of its affiliates or by third parties who have licensed their materials to&nbsp;Shangar Collection&nbsp;and are protected by Indian and international copyright laws. The compilation (meaning the collection, arrangement, and assembly) of all Contents on this Site is the exclusive property of&nbsp;Shangar Collection&nbsp;and is also protected by Indian and international copyright laws.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(20, '<p><strong>Objectionable Material</strong></p>\r\n\r\n<p>You understand that by using this Site or any services provided on the Site, you may encounter Content that may be deemed by some to be offensive, indecent, or objectionable, which Content may or may not be identified as such. You agree to use the Site and any service at your sole risk and that to the fullest extent permitted under applicable law,&nbsp;Shangar Collection&nbsp;and its affiliates shall have no liability to you for Content that may be deemed offensive, indecent, or objectionable to you.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(21, '<p><strong>Indemnity</strong></p>\r\n\r\n<p>You agree to defend, indemnify and hold harmless&nbsp;Shangar Collection, its employees, directors, officers, agents and their successors and assigns from and against any and all claims, liabilities, damages, losses, costs and expenses, including attorney&#39;s fees, caused by or arising out of claims based upon your actions or inactions, which may result in any loss or liability to&nbsp;Shangar Collection&nbsp;or any third party including but not limited to breach of any warranties, representations or undertakings or in relation to the non-fulfillment of any of your obligations under this User Agreement or arising out of the your violation of any applicable laws, regulations including but not limited to Intellectual Property Rights, payment of statutory dues and taxes, claim of libel, defamation, violation of rights of privacy or publicity, loss of service by other subscribers and infringement of intellectual property or other rights. This clause shall survive the expiry or termination of this User Agreement.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(22, '<p><strong>Termination</strong></p>\r\n\r\n<p>This User Agreement is effective unless and until terminated by either you or&nbsp;Shangar Collection. You may terminate this User Agreement at any time, provided that you discontinue any further use of this Site.&nbsp;Shangar Collection&nbsp;may terminate this User Agreement at any time and may do so immediately without notice, and accordingly deny you access to the Site, Such termination will be without any liability to&nbsp;Shangar Collection. Upon any termination of the User Agreement by either you or&nbsp;Shangar Collection, you must promptly destroy all materials downloaded or otherwise obtained from this Site, as well as all copies of such materials, whether made under the User Agreement or otherwise.&nbsp;Shangar Collection&nbsp;&#39;s right to any Comments shall survive any termination of this User Agreement. Any such termination of the User Agreement shall not cancel your obligation to pay for the product already ordered from the Site or affect any liability that may have arisen under the User Agreement.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(23, '<p><strong>Limitation of Liability and Disclaimers</strong></p>\r\n\r\n<p>The Site is provided without any warranties or guarantees and in an &quot;As Is&quot; condition. You must bear the risks associated with the use of the Site.<br />\r\nThe Site provides content from other Internet sites or resources and while&nbsp;Shangar Collection&nbsp;tries to ensure that material included on the Site is correct, reputable and of high quality, it cannot accept responsibility if this is not the case.&nbsp;Shangar Collection&nbsp;will not be responsible for any errors or omissions or for the results obtained from the use of such information or for any technical problems you may experience with the Site. This disclaimer does not apply to any product warranty offered by the manufacturer of the product as specified in the product specifications. This disclaimer constitutes an essential part of this User Agreement. To the fullest extent permitted under applicable law,&nbsp;Shangar Collection&nbsp;or its suppliers shall not be liable for any indirect, incidental, special, consequential or exemplary damages, including but not limited to, damages for loss of profits, goodwill, use, data or other intangible losses arising out of or in connection with the Site, its services or this User Agreement. Without prejudice to the generality of the section above, the total liability of&nbsp;Shangar Collection&nbsp;to you for all liabilities arising out of this User Agreement be it in tort or contract is limited to the value of the product ordered by you.&nbsp;Shangar Collection, its associates and technology partners make no representations or warranties about the accuracy, reliability, completeness, correctness and/or timeliness of any content, information, software, text, graphics, links or communications provided on or through the use of the Site or that the operation of the Site will be error free and/or uninterrupted. Consequently,&nbsp;Shangar Collection&nbsp;assumes no liability whatsoever for any monetary or other damage suffered by you on account of the delay, failure, interruption, or corruption of any data or other information transmitted in connection with use of the Site; and/or any interruption or errors in the operation of the Site.</p>\r\n\r\n<p>&nbsp;</p>\r\n'),
(24, '<p><strong>Site Security</strong></p>\r\n\r\n<p>You are prohibited from violating or attempting to violate the security of the Site, including, without limitation, (a) accessing data not intended for you or logging onto a server or an account which you are not authorized to access; (b) attempting to probe, scan or test the vulnerability of a system or network or to breach security or authentication measures without proper authorization; (c) attempting to interfere with service to any other user, host or network, including, without limitation, via means of submitting a virus to the Site, overloading, &quot;flooding,&quot; &quot;spamming,&quot; &quot;mailbombing&quot; or &quot;crashing;&quot; (d) sending unsolicited email, including promotions and/or advertising of products or services; or (e) forging any TCP/IP packet header or any part of the header information in any email or newsgroup posting. Violations of system or network security may result in civil or criminal liability.&nbsp;Shangar Collection&nbsp;will investigate occurrences that may involve such violations and may involve, and cooperate with, law enforcement authorities in prosecuting users who are involved in such violations. You agree not to use any device, software or routine to interfere or attempt to interfere with the proper working of this Site or any activity being conducted on this Site. You agree, further, not to use or attempt to use any engine, software, tool, agent or other device or mechanism (including without limitation browsers, spiders, robots, avatars or intelligent agents) to navigate or search this Site other than the search engine and search agents available from&nbsp;Shangar Collection&nbsp;on this Site and other than generally available third party web browsers (e.g., Netscape Navigator, Microsoft Explorer).&nbsp;</p>\r\n'),
(25, '<p><strong>Entire Agreement</strong></p>\r\n\r\n<p>If any part of this agreement is determined to be invalid or unenforceable pursuant to applicable law including, but not limited to, the warranty disclaimers and liability limitations set forth above, then the invalid or unenforceable provision will be deemed to be superseded by a valid, enforceable provision that most closely matches the intent of the original provision and the remainder of the agreement shall continue in effect. Unless otherwise specified herein, this agreement constitutes the entire agreement between you and&nbsp;Shangar Collection&nbsp;with respect to the&nbsp;Shangar Collection&nbsp;sites/services and it supersedes all prior or contemporaneous communications and proposals, whether electronic, oral or written, between you and&nbsp;Shangar Collection&nbsp;with respect to the&nbsp;Shangar Collection&nbsp;sites/services.&nbsp;Shangar Collection&#39;s failure to act with respect to a breach by you or others does not waive its right to act with respect to subsequent or similar breaches.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `transaction_id` int(5) NOT NULL,
  `bill_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL,
  `image_id` int(5) NOT NULL,
  `gross_price` int(5) NOT NULL,
  `discount` int(5) NOT NULL,
  `net_price` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `total_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`transaction_id`, `bill_id`, `product_id`, `image_id`, `gross_price`, `discount`, `net_price`, `qty`, `total_price`) VALUES
(1, 1, 47, 63, 20000, 3000, 17000, 1, 17000),
(2, 1, 44, 61, 2000, 0, 2000, 1, 2000),
(3, 2, 7, 15, 8000, 0, 8000, 1, 8000),
(4, 3, 12, 27, 4500, 0, 4500, 1, 4500),
(5, 3, 5, 11, 8000, 0, 8000, 2, 16000),
(6, 4, 14, 29, 12000, 0, 12000, 1, 12000),
(7, 5, 14, 29, 12000, 0, 12000, 1, 12000),
(8, 6, 9, 20, 4500, 0, 4500, 1, 4500),
(9, 6, 12, 27, 4500, 0, 4500, 1, 4500),
(10, 7, 6, 13, 6500, 0, 6500, 1, 6500),
(11, 7, 15, 31, 9000, 1350, 7650, 1, 7650),
(12, 8, 6, 13, 6500, 0, 6500, 1, 6500),
(13, 8, 15, 31, 9000, 1350, 7650, 2, 15300),
(14, 9, 17, 33, 11500, 1725, 9775, 1, 9775),
(15, 9, 20, 36, 23000, 0, 23000, 1, 23000),
(16, 10, 12, 27, 4500, 0, 4500, 1, 4500);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wish_id` int(5) NOT NULL,
  `register_id` int(5) NOT NULL,
  `product_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`wish_id`, `register_id`, `product_id`) VALUES
(1, 1, 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `tbl_bill`
--
ALTER TABLE `tbl_bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_email_subscriber`
--
ALTER TABLE `tbl_email_subscriber`
  ADD PRIMARY KEY (`subscriber_id`);

--
-- Indexes for table `tbl_faqs`
--
ALTER TABLE `tbl_faqs`
  ADD PRIMARY KEY (`faqs_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `tbl_privacy_policy`
--
ALTER TABLE `tbl_privacy_policy`
  ADD PRIMARY KEY (`policy_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  ADD PRIMARY KEY (`promocode_id`);

--
-- Indexes for table `tbl_recent_view`
--
ALTER TABLE `tbl_recent_view`
  ADD PRIMARY KEY (`view_id`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`register_id`);

--
-- Indexes for table `tbl_return_policy`
--
ALTER TABLE `tbl_return_policy`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_shipment`
--
ALTER TABLE `tbl_shipment`
  ADD PRIMARY KEY (`shipment_id`);

--
-- Indexes for table `tbl_terms_condition`
--
ALTER TABLE `tbl_terms_condition`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wish_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `about_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_admin_login`
--
ALTER TABLE `tbl_admin_login`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `banner_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_bill`
--
ALTER TABLE `tbl_bill`
  MODIFY `bill_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  MODIFY `contact_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_email_subscriber`
--
ALTER TABLE `tbl_email_subscriber`
  MODIFY `subscriber_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_faqs`
--
ALTER TABLE `tbl_faqs`
  MODIFY `faqs_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `location_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `tbl_offer`
--
ALTER TABLE `tbl_offer`
  MODIFY `offer_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_privacy_policy`
--
ALTER TABLE `tbl_privacy_policy`
  MODIFY `policy_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  MODIFY `image_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `tbl_promocode`
--
ALTER TABLE `tbl_promocode`
  MODIFY `promocode_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_recent_view`
--
ALTER TABLE `tbl_recent_view`
  MODIFY `view_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `register_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_return_policy`
--
ALTER TABLE `tbl_return_policy`
  MODIFY `return_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_shipment`
--
ALTER TABLE `tbl_shipment`
  MODIFY `shipment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_terms_condition`
--
ALTER TABLE `tbl_terms_condition`
  MODIFY `term_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `transaction_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wish_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
