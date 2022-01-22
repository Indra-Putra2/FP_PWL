-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2022 at 02:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `adminName` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `adminName`, `password`, `email`) VALUES
('fathurmr', 'Muhammad Fathur Rizqi', 'b2e80a192e236226f1a7935ff14ac28d', 'Fathur22@gmail.com'),
('indra', 'Indra Putra Gemilang', '827ccb0eea8a706c4c34a16891f84e7b', 'Indra21905@gmail.com'),
('khiasnas', 'Khias Nurlatif Ari Subekti', '9bfa521d4547427fcadf9e689c5ba1bb', 'Khias42@gmail.com'),
('Putra', 'Putra', '202cb962ac59075b964b07152d234b70', 'Indra215@gmail.com'),
('triash', 'Trias Handayani', 'eb2636990736136c00ed04dd85dcc9d7', 'Trias72@gmail.com'),
('yofiizm', 'Immanuel Yofi Zakarias Manafe', 'faf15ec1f7f53d6fa9ee8982fc2d9257', 'Yofi32@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author` varchar(60) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`author`) VALUES
('Antoine de Saint-Exupéry'),
('C. S. Lewis'),
('H Rider Haggard'),
('Hajime Isayama'),
('J. K. Rowling'),
('J. R. R. Tolkien'),
('Koyoharu Gotouge'),
('Masashi Kishimoto'),
('Robin Nixon');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookId` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `bookTitle` varchar(255) NOT NULL,
  `author` varchar(60) DEFAULT NULL,
  `sinopsis` varchar(2000) DEFAULT NULL,
  `page` int(11) DEFAULT NULL,
  `ISBN` varchar(30) NOT NULL,
  `bookCopies` int(11) NOT NULL,
  `publisherName` varchar(50) DEFAULT NULL,
  `publication` date DEFAULT NULL,
  `available` varchar(10) NOT NULL,
  `categories` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookId`, `picture`, `bookTitle`, `author`, `sinopsis`, `page`, `ISBN`, `bookCopies`, `publisherName`, `publication`, `available`, `categories`) VALUES
(1, '2022-Jan-Tue 00-24-47-9.jpg', 'The Hobbit: Illustrated Edition', 'J. R. R. Tolkien', 'A beautiful gift edition of J.R.R. Tolkien\'s enchanting tale, fully illustrated by Jemima Catlin.\r\n \r\nBilbo Baggins enjoys a comfortable, unambitious life, rarely traveling farther than the pantry of his hobbit-hole in Bag End. But his contentment is disturbed when the wizard Gandalf and a company of thirteen dwarves arrive on his doorstep to whisk him away on a journey to raid the treasure hoard of Smaug the Magnificent, a large and very dangerous dragon. . .', 384, '0544174224', 123, 'Mariner Books', '2013-10-01', 'YES', 'Fantasy'),
(2, '2021-Dec-Tue 09-54-01-2.jpg', 'Demon Slayer: Kimetsu no Yaiba, Vol. 1', 'Koyoharu Gotouge', 'In Taisho-era Japan, kindhearted Tanjiro Kamado makes a living selling charcoal. But his peaceful life is shattered when a demon slaughters his entire family. His little sister Nezuko is the only survivor, but she has been transformed into a demon herself! Tanjiro sets out on a dangerous journey to find a way to return his sister to normal and destroy the demon who ruined his life.\r\n\r\nLearning to destroy demons won’t be easy, and Tanjiro barely knows where to start. The surprise appearance of another boy named Giyu, who seems to know what’s going on, might provide some answers—but only if Tanjiro can stop Giyu from killing his sister first!', 192, '1974700526', 53, 'VIZ Media LLC', '2018-07-03', 'YES', 'Manga'),
(3, '2021-Dec-Tue 09-53-35-3.jpg', 'Harry Potter and the Sorcerer\'s Stone: The Illustrated Edition (Harry Potter, Book 1)', 'J. K. Rowling', 'The beloved first book of the Harry Potter series, now fully illustrated by award-winning artist Jim Kay.\r\nFor the first time, J.K. Rowling\'s beloved Harry Potter books will be presented in lavishly illustrated full-color editions. Award-winning artist Jim Kay has created over 100 stunning illustrations, making this deluxe format a perfect gift for a child being introduced to the series and for dedicated fans.Harry Potter has never been the star of a Quidditch team, scoring points while riding a broom far above the ground. He knows no spells, has never helped to hatch a dragon, and has never worn a cloak of invisibility.All he knows is a miserable life with the Dursleys, his horrible aunt and uncle, and their abominable son, Dudley - a great big swollen spoiled bully. Harry\'s room is a tiny closet at the foot of the stairs, and he hasn\'t had a birthday party in eleven years.But all that is about to change when a mysterious letter arrives by owl messenger: a letter with an invitation to an incredible place that Harry - and anyone who reads about him - will find unforgettable.', 256, '0545790352', 32, 'Arthur A. Levine Books', '2015-10-06', 'YES', 'Fantasy'),
(4, '2021-Dec-Tue 09-54-13-4.jpg', 'Attack on Titan Omnibus 1 (Vol. 1-3)', 'Hajime Isayama', 'For eons, humans ruled the natural world. But a century ago, everything changed when the Titans appeared. Giant, grotesque parodies of the human form, these sexless monsters consumed all but a few thousand human beings, who took refuge behind giant walls. Today, the threat of the Titans is a distant memory, and a boy named Eren yearns to explore the world beyond the wall. But what began as a childish dream will become an all-too-real nightmare when a Titan finally knocks a hole in the wall, and humanity is once again on the brink of extinction…', 592, '1646513746', 35, 'Kodansha Comics', '2021-10-19', 'YES', 'Fantasy'),
(5, '2021-Dec-Tue 09-54-20-5.jpg', 'The Little Prince', 'Antoine de Saint-Exupéry', 'A pilot crashes in the Sahara Desert and encounters a strange young boy who calls himself the Little Prince. The Little Prince has traveled there from his home on a lonely, distant asteroid with a single rose. The story that follows is a beautiful and at times heartbreaking meditation on human nature.\r\n\r\nThe Little Prince is one of the best-selling and most translated books of all time, universally cherished by children and adults alike, and Richard Howard\'s translation of the beloved classic beautifully reflects Saint-Exupéry\'s unique and gifted style, bringing the English text as close as possible to the French in language, style, and spirit. In this special edition, the artwork has been restored to match in detail and in color Saint-Exupéry\'s original artwork.\r\n\r\nThis definitive English-language edition of The Little Prince will capture the hearts of readers of all ages.', 96, '0156012197', 32, 'Mariner Books', '2000-06-29', 'YES', 'Novella'),
(6, '2021-Dec-Tue 09-53-19-6.jpg', 'The Lion, the Witch and the Wardrobe', 'C. S. Lewis', 'The four Pevensie children are sent to live in a large house in the country, a house with many rooms, which are filled with many things. But one of the rooms is absolutely empty, except for a single piece of furniture: a large wardrobe. It is a wardrobe, the children discover, which has magical properties.', 92, '1514280124', 75, 'HarperCollins', '2020-10-08', 'YES', 'Fantasy'),
(7, '2021-Dec-Tue 09-52-58-7.jpg', 'She: a History of Adventure - a Book That Inspired Tolkien: With Original Illustrations', 'H Rider Haggard', 'This new edition of \"She\" is richer than all previous editions, because it is the first to contain illustrations from not one but *four* artists who were contemporaries of JRR Tolkien, and whose works he admired. \"She\" was first published in book form in 1887. The story is an enduring classic, more than a century old. It\'s a fantasy adventure packed with action, mystery, wonder, supernatural marvels and beauty, along with violence and darkness. While it bears some of the now-discredited hallmarks of the era in which it was written, it remains an enthralling page-turner. Refreshingly, considering 19th century social attitudes, it features a strong woman with a complex personality as the central character. When he was growing up, JRR Tolkien greatly enjoyed reading all the works of H. Rider Haggard, the author of \"She\". In particular, he stated in a 1966 interview, \"I suppose as a boy \'She\' interested me as much as anything. . .\" Many interesting parallels can be drawn between \"The Lord of the Rings\" and \"She\". Readers will find echoes of Galadriel and her mirror here, and arguably, even the literary progenitors of Frodo and The One Ring. This edition contains more than 40 original illustrations as enjoyed by JRR Tolkien.', 336, '1925110133', 35, 'Leaves of Gold Press', '2020-07-25', 'YES', 'Adventure'),
(8, '2022-Jan-Tue 08-11-34-8.jpg', 'Learning PHP, MySQL & JavaScript: A Step-by-Step Guide to Creating Dynamic Websites', 'Robin Nixon', 'Build interactive, data-driven websites with the potent combination of open source technologies and web standards, even if you have only basic HTML knowledge. With the latest edition of this popular hands-on guide, you\'ll tackle dynamic web programming using the most recent versions of today\'s core technologies: PHP, MySQL, JavaScript, CSS, HTML5, jQuery, and the powerful React library.\r\n\r\nWeb designers will learn how to use these technologies together while picking up valuable web programming practices along the way, including how to optimize websites for mobile devices. You\'ll put everything together to build a fully functional social networking site suitable for both desktop and mobile browsers.\r\n\r\nExplore MySQL from database structure to complex queries\r\nUse the MySQL PDO extension, PHP\'s improved MySQL interface\r\nCreate dynamic PHP web pages that tailor themselves to the user\r\nManage cookies and sessions and maintain a high level of security\r\nEnhance JavaScript with the React library\r\nUse Ajax calls for background browser-server communication\r\nStyle your web pages by acquiring CSS skills\r\nImplement HTML5 features, including geolocation, audio, video, and the canvas element\r\nReformat your websites into mobile web apps\r\n', 826, '1492093823', 34, 'O\'Reilly Media', '2021-08-17', 'YES', 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrowId` int(11) NOT NULL,
  `Nim` varchar(255) NOT NULL,
  `bookId` int(2) NOT NULL,
  `bookName` varchar(255) NOT NULL,
  `borrowDate` date NOT NULL,
  `returnDate` date NOT NULL,
  `borrowStatus` int(2) NOT NULL,
  `fine` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrowId`, `Nim`, `bookId`, `bookName`, `borrowDate`, `returnDate`, `borrowStatus`, `fine`) VALUES
(1, '18.11.2367', 7, 'She: a History of Adventure - a Book That Inspired Tolkien: With Original Illustrations', '2021-12-01', '2021-12-17', 1, 'Paid'),
(7, '19.11.2780', 5, 'The Little Prince', '2022-01-11', '2022-01-12', 0, 'Paid'),
(8, '19.11.2780', 1, 'The Hobbit: Illustrated Edition', '2022-01-02', '2022-01-09', 0, '60000');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categories` varchar(30) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categories`) VALUES
('Adventure'),
('Fantasy'),
('Horror'),
('Manga'),
('Mystery thriller'),
('Novella'),
('Programming'),
('Romance');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `Jurusan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`Jurusan`) VALUES
('D3-Manajemen Informatika'),
('D3-Teknik Informatika'),
('S1-Informatika'),
('S1-Sistem Informasi'),
('S1-Teknik Komputer'),
('S1-Teknik Pertanian'),
('S1-Teknologi Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `newsId` int(11) NOT NULL,
  `announcement` text NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`newsId`, `announcement`, `date`) VALUES
(1, 'Dengan adanya PTM terbatas di Universitas Amikom Yogyakarta, Perpustakaan Amikom tetap tutup kecuali untuk mahasiswa yang sedang mengambil skripsi. Tetap lakukan prokes yang baik dan semoga Perpustakaan Amikom segera buka untuk melayani mahasiswa dengan pelayanan yang terbaik. Terima kasih.', '2022-01-09'),
(2, 'Pengambilan dan pengembalian buku masih dapat dilakukan dengan melakukan prokes yang ketat. Dilayani setiap hari Senin-Jumat pukul 09.00-16.00. Terima kasih.', '2022-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisherName` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisherName`) VALUES
('Arthur A. Levine Books'),
('HarperCollins'),
('Kodansha Comics'),
('Leaves of Gold Press'),
('Mariner Books'),
('O\'Reilly Media'),
('VIZ Media LLC');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `Jurusan` varchar(30) NOT NULL,
  `jumlahBuku` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `notelp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`nim`, `nama`, `password`, `email`, `Jurusan`, `jumlahBuku`, `foto`, `notelp`) VALUES
('18.11.2367', 'Ramadhan', 'd41d8cd98f00b204e9800998ecf8427e', 'rama1@students.amikom.ac.id', 'D3-Manajemen Informatika', 0, '0329foto.png', '085765345711'),
('19.11.2780', 'Indra Putra Gemilang', '202cb962ac59075b964b07152d234b70', 'indra.2105@students.amikom.ac.id', 'S1-Informatika', 0, 'foto.png', '089649006615');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookId`),
  ADD KEY `author` (`author`),
  ADD KEY `categories` (`categories`),
  ADD KEY `publisherName` (`publisherName`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrowId`),
  ADD KEY `Nim` (`Nim`),
  ADD KEY `bookId` (`bookId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categories`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`Jurusan`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`newsId`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisherName`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `Jurusan` (`Jurusan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrowId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `newsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `author` FOREIGN KEY (`author`) REFERENCES `authors` (`author`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `categories` FOREIGN KEY (`categories`) REFERENCES `category` (`categories`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `publisherName` FOREIGN KEY (`publisherName`) REFERENCES `publisher` (`publisherName`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `Nim` FOREIGN KEY (`Nim`) REFERENCES `students` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookId` FOREIGN KEY (`bookId`) REFERENCES `books` (`bookId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `Jurusan` FOREIGN KEY (`Jurusan`) REFERENCES `jurusan` (`Jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
