-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 14, 2024 at 09:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `challenge_16`
--

-- --------------------------------------------------------

--
-- Table structure for table `webpage`
--

CREATE TABLE `webpage` (
  `id` int(10) UNSIGNED NOT NULL,
  `coverImage` varchar(255) DEFAULT NULL,
  `mainTitle` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `aboutYou` text DEFAULT NULL,
  `number` int(9) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `services_products` varchar(255) DEFAULT NULL,
  `imageOne` varchar(255) DEFAULT NULL,
  `descriptionOne` text DEFAULT NULL,
  `imageTwo` varchar(255) DEFAULT NULL,
  `descriptionTwo` text DEFAULT NULL,
  `imageThree` varchar(255) DEFAULT NULL,
  `descriptionThree` text DEFAULT NULL,
  `companyDescription` text DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `google` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `webpage`
--

INSERT INTO `webpage` (`id`, `coverImage`, `mainTitle`, `subtitle`, `aboutYou`, `number`, `location`, `services_products`, `imageOne`, `descriptionOne`, `imageTwo`, `descriptionTwo`, `imageThree`, `descriptionThree`, `companyDescription`, `linkedin`, `facebook`, `twitter`, `google`) VALUES
(1, 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'Main title of the Page', 'Subtitle of the Page', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quaerat deserunt exercitationem? Sunt sint quidem illo ab similique dicta tempore corrupti repellendus unde necessitatibus iusto officia harum placeat, quas iste vero aliquid provident sequi obcaecati tempora! Modi ratione dicta corporis iure, temporibus maiores alias quasi voluptate nemo iste, voluptas minus?', 123456789, 'ul.Marsal Tito br.29', 'products', 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat tenetur, saepe neque sunt quo suscipit adipisci ipsam aut temporibus atque ea nulla sed odio repellendus cupiditate eius. Rerum facere voluptates laudantium illo, esse cum quae iste eius, ipsum quas aspernatur facilis itaque! Soluta quae, similique quo cum illum facere, voluptate culpa enim rerum minus consectetur neque, delectus libero provident natus. Esse suscipit, libero id quidem nihil sapiente excepturi accusamus enim?', 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat tenetur, saepe neque sunt quo suscipit adipisci ipsam aut temporibus atque ea nulla sed odio repellendus cupiditate eius. Rerum facere voluptates laudantium illo, esse cum quae iste eius.', 'https://images.unsplash.com/photo-1497215728101-856f4ea42174?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat tenetur, saepe neque sunt quo suscipit adipisci ipsam aut temporibus atque ea nulla sed odio repellendus cupiditate eius. Rerum facere voluptates laudantium illo, esse cum quae iste eius, ipsum quas aspernatur facilis itaque!', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Id quaerat deserunt exercitationem? Sunt sint quidem illo ab similique dicta tempore corrupti repellendus unde necessitatibus iusto officia harum placeat, quas iste vero aliquid provident sequi obcaecati tempora! Modi ratione dicta corporis iure, temporibus maiores alias quasi voluptate nemo iste, voluptas minus?', 'https://www.linkedin.com/in/stefan-shulevski-925530282/?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app', 'https://www.facebook.com/profile.php?id=100008677985848', 'https://twitter.com/pexels', 'https://google.com/answer/2451065?hl=en'),
(2, 'https://images.unsplash.com/photo-1541746972996-4e0b0f43e02a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'This is the Main Title', 'This is subtitle', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum libero, aspernatur saepe quibusdam ullam officiis odio facilis veritatis quia perferendis architecto dolor fugit tempore asperiores quo? Reiciendis, voluptates nobis, non voluptas assumenda perferendis aliquid saepe eligendi est natus inventore voluptatibus?', 986545689, 'ul.Marsal Tito br.29', 'services', 'https://images.unsplash.com/photo-1541746972996-4e0b0f43e02a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, molestiae atque! Impedit quam eius a optio quas debitis corrupti ea eum, repellendus praesentium, itaque molestiae aspernatur ipsum? Rerum tenetur sequi eaque nemo, earum et alias unde excepturi natus deleniti ipsa eius totam dolorem inventore cupiditate numquam quia beatae non ab ad asperiores? Quisquam dignissimos earum perferendis obcaecati quaerat optio ut exercitationem.', 'https://images.unsplash.com/photo-1541746972996-4e0b0f43e02a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, molestiae atque! Impedit quam eius a optio quas debitis corrupti ea eum, repellendus praesentium, itaque molestiae aspernatur ipsum?', 'https://images.unsplash.com/photo-1541746972996-4e0b0f43e02a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex, molestiae atque! Impedit quam eius a optio quas debitis corrupti ea eum, repellendus praesentium, itaque molestiae aspernatur ipsum? Rerum tenetur sequi eaque nemo, earum et alias unde excepturi natus deleniti ipsa eius totam dolorem inventore cupiditate numquam quia beatae non ab ad asperiores? Quisquam dignissimos earum perferendis obcaecati quaerat optio ut exercitationem, ipsam vero, mollitia ipsa architecto asperiores, suscipit vel laboriosam?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum libero, aspernatur saepe quibusdam ullam officiis odio facilis veritatis quia perferendis architecto dolor fugit tempore asperiores quo? Reiciendis, voluptates nobis, non voluptas assumenda perferendis aliquid saepe eligendi est natus inventore voluptatibus?', 'https://www.linkedin.com/in/stefan-shulevski-925530282/?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app', 'https://www.facebook.com/profile.php?id=100008677985848', 'https://twitter.com/pexels', 'https://support.google.com/answer/2451065?hl=en'),
(3, 'https://images.unsplash.com/photo-1510074377623-8cf13fb86c08?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'MAIN TITLE OF THE PAGE', 'subtitle of the Page', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam nisi libero assumenda explicabo illum sed nemo, officia facere voluptates molestiae, dolorem, tempore praesentium fugit deserunt tenetur. Illo nulla dolorem quis vero distinctio voluptate perferendis, laboriosam id reprehenderit quo, molestias sint quos adipisci eligendi eius officiis sit deleniti delectus, animi cum?', 987654321, 'ul.JAHSIJS br.22', 'services', 'https://images.unsplash.com/photo-1510074377623-8cf13fb86c08?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam nisi libero assumenda explicabo illum sed nemo, officia facere voluptates molestiae, dolorem, tempore praesentium fugit deserunt tenetur. Illo nulla dolorem quis vero distinctio voluptate perferendis, laboriosam id reprehenderit quo, molestias sint quos adipisci eligendi eius officiis sit deleniti delectus, animi cum? Veniam ea autem assumenda odit veritatis, ipsa debitis non quis nisi dolores hic id dignissimos? Quis earum nulla doloribus nesciunt.', 'https://images.unsplash.com/photo-1510074377623-8cf13fb86c08?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam nisi libero assumenda explicabo illum sed nemo, officia facere voluptates molestiae, dolorem, tempore praesentium fugit deserunt tenetur. Illo nulla dolorem quis vero distinctio voluptate perferendis, laboriosam id reprehenderit quo, molestias sint quos adipisci eligendi eius officiis sit deleniti delectus, animi cum? Veniam ea autem assumenda odit veritatis, ipsa debitis non quis nisi dolores hic id dignissimos? Quis earum nulla doloribus nesciunt.', 'https://images.unsplash.com/photo-1510074377623-8cf13fb86c08?q=80&w=2072&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam nisi libero assumenda explicabo illum sed nemo, officia facere voluptates molestiae, dolorem, tempore praesentium fugit deserunt tenetur. Illo nulla dolorem quis vero distinctio voluptate perferendis, laboriosam id reprehenderit quo, molestias sint quos adipisci eligendi eius officiis sit deleniti delectus, animi cum? Veniam ea autem assumenda odit veritatis, ipsa debitis non quis nisi dolores hic id dignissimos? Quis earum nulla doloribus nesciunt.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam nisi libero assumenda explicabo illum sed nemo, officia facere voluptates molestiae, dolorem, tempore praesentium fugit deserunt tenetur. Illo nulla dolorem quis vero distinctio voluptate perferendis, laboriosam id reprehenderit quo, molestias sint quos adipisci eligendi eius officiis sit deleniti delectus, animi cum? Veniam ea autem assumenda odit veritatis.', 'https://www.linkedin.com/school/brainster-co/', 'https://www.facebook.com/profile.php?id=100008677985848', 'https://twitter.com/pexels', 'https://support.google.com/answer/2451065?hl=en');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `webpage`
--
ALTER TABLE `webpage`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `webpage`
--
ALTER TABLE `webpage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
