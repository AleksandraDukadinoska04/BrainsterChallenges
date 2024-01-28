-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Jan 28, 2024 at 10:49 PM
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
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `actor`
--

CREATE TABLE `actor` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `agent_code` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actor`
--

INSERT INTO `actor` (`id`, `first_name`, `last_name`, `nickname`, `birth_date`, `agent_code`) VALUES
(1, 'Vera', 'Farmiga', 'Vera', '1973-08-06', '9B3N6'),
(2, 'Patrick', 'Wilson', 'Pat', '1973-07-03', 'H23I4'),
(3, 'Dylan', 'Obrien', 'Dyl', '1991-08-26', 'K3N29'),
(4, 'Thomas', 'Brodie', 'Thom', '1990-05-16', '8ND17'),
(5, 'Kaya', 'Scodelario', 'Kaya', '1992-03-13', '7B0HN'),
(6, 'Vera', 'Farmiga', 'Vera', '1973-08-06', '90B3N6'),
(7, 'Alicia', 'Vikander', 'Alic', '1988-10-03', '1BN01'),
(8, 'Dominic', 'West', 'Dony', '1969-10-15', 'K03BS'),
(9, 'Angelina', 'Jolie', 'Lina', '1975-06-04', '0FW21'),
(10, 'Daniel', 'Craig', 'Dani', '1968-03-02', '24G95'),
(11, 'Elle', 'Fanning', 'Elle', '1998-04-09', 'LO02N'),
(12, 'Tyler', 'Posey', 'Tyler', '1991-10-18', 'U56IN'),
(13, 'Holland', 'Roden', 'Holla', '1986-10-07', '7YW30'),
(14, 'Tyler', 'Hoechlin', 'Gerry', '1987-09-11', '39PH2'),
(15, 'Cillian', 'Murphy', 'Cillian', '1976-05-25', '5AC15'),
(16, 'Joseph', 'Cole', 'John', '1981-11-08', '76GQ2'),
(17, 'Paul', 'Anderson', 'Paul', '1978-11-19', '1DNJ7'),
(18, 'Katheryn', 'Winnick', 'Katy', '1977-12-17', '39DNF'),
(19, 'Travis', 'Fimmel', 'Tarzan', '1979-07-15', '2SND9'),
(20, 'Millie Bobby', 'Brown', 'Millussy', '2004-02-19', 'SAJ93'),
(21, 'Finn', 'Wolfhard', 'Finnie', '2002-11-23', '38DU9'),
(22, 'Jenna', 'Ortega', 'Jenny', '2002-09-27', '9NRF8'),
(23, 'Catherine', 'Zeta-Jones', 'Zeta', '1969-09-25', 'R8FHR'),
(24, 'Anja', 'Taylor', 'Joy', '1996-04-16', '3DR84'),
(25, 'Aidan', 'Gallagher', 'Ai', '2003-08-18', 'ND835'),
(26, 'Elliot', 'Page', 'Elli', '1987-02-21', '91HDU'),
(27, 'Tom', 'Ellis', 'Tomy', '1978-11-17', '8DFH4'),
(28, 'Dylan', 'Minnette', 'Dyl', '1996-12-26', '21JDS'),
(29, 'Cole', 'Sprouse', 'Cole', '1992-08-04', '83NUF'),
(30, 'Lili', 'Reinhart', 'Lili', '1996-09-13', 'JS64B');

-- --------------------------------------------------------

--
-- Table structure for table `actor_critic`
--

CREATE TABLE `actor_critic` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `critic_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `actor_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `film_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `criticism` text DEFAULT NULL,
  `acting1_10` tinyint(4) DEFAULT NULL,
  `expression1_10` tinyint(4) DEFAULT NULL,
  `naturalness1_10` tinyint(4) DEFAULT NULL,
  `devotion1_10` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `actor_critic`
--

INSERT INTO `actor_critic` (`id`, `critic_id`, `actor_id`, `film_id`, `criticism`, `acting1_10`, `expression1_10`, `naturalness1_10`, `devotion1_10`) VALUES
(1, 1, 1, 11, 'Vera played the role of Lorraine Warren very well, its good that they chose her for this role.', 10, 9, 9, 10),
(2, 2, 2, 11, 'Well done Eds role, awesome!', 9, 9, 8, 9),
(3, 3, 3, 14, 'Dylan fit the role of Thomas very well, he dominated as always!', 10, 10, 10, 10),
(4, 4, 7, 17, 'Alicia is the perfect actor for the role of Lara, too good!', 10, 9, 9, 10),
(5, 5, 9, 19, 'Angelina Jolie is so wickedly enchanting in the magical, magnificent Maleficent, you may not notice how transporting this female-driven blockbuster really is.', 10, 10, 10, 10),
(6, 6, 9, 18, 'Her acting is good, but I dont think Angelina fits the role of Lara.', 7, 6, 7, 7),
(7, 7, 9, 20, 'Jolies performance so overshadows the rest of the cast that you sometimes feel as if the other characters are just standing around watching her.', 8, 8, 9, 10),
(8, 8, 4, 15, 'I dont like Thomas acting in this movie, he can do much better.', 7, 6, 5, 6),
(9, 9, 1, 13, 'In this part Vera failed a little, the acting is good but not as good as it was in the previous parts.', 8, 8, 8, 8),
(10, 10, 8, 17, 'I honestly dont know what he actually wants in this movie, terrible!', 5, 5, 4, 4),
(11, 6, 5, 16, 'Its not too bad, but I feel like Kaya is more annoying in this part.', 7, 7, 8, 7),
(12, 5, 11, 19, 'Elle did well in the role, well done to her, well done as a first experience.', 8, 7, 8, 7),
(13, 2, 10, 18, 'Im not a fan of Daniel, but he did a good job this time.', 7, 7, 8, 7),
(14, 8, 9, 20, 'I love Angelina, but I dont think she acted the role as well this time compared to the previous part.', 8, 9, 8, 7),
(15, 8, 3, 15, 'I love Dylan, he is such a good actor, he fits the roles perfectly!', 10, 10, 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `critic`
--

CREATE TABLE `critic` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `critic`
--

INSERT INTO `critic` (`id`, `first_name`, `last_name`, `username`, `password`) VALUES
(1, 'James', 'Smith', 'James.Smith', 'jamessmith123'),
(2, 'Liam', 'Johnson', 'Liam.Johnson', 'liamjohnson123'),
(3, 'Noah', 'Williams', 'Noah.Williams', 'noahwilliams123'),
(4, 'Oliver', 'Jones', 'Oliver.Jones', 'oliverjones123'),
(5, 'Lucas', 'Wilson', 'Lucas.Wilson', 'lucaswilson123'),
(6, 'Mary', 'Anderson', 'Mary.Anderson', 'maryanderson123'),
(7, 'Jennifer', 'Robinson', 'Jennifer.Robinson', 'jenniferrobinson123'),
(8, 'Elizabeth', 'Walker', 'Elizabeth.Walker', 'elizabethwalker123'),
(9, 'Sarah', 'Scott', 'Sarah.Scott', 'sarahscott123'),
(10, 'Lisa', 'Hill', 'Lisa.Hill', 'lisahill123');

-- --------------------------------------------------------

--
-- Table structure for table `director`
--

CREATE TABLE `director` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `genre_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `expertise` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `director`
--

INSERT INTO `director` (`id`, `first_name`, `last_name`, `genre_id`, `expertise`) VALUES
(1, 'James', 'Wan', 1, 'ability to deliver engaging ans successful films i'),
(2, 'Michael', 'Chaves', 1, 'creating atmospheric and suspenseful horror experi'),
(3, 'Wes', 'Ball', 2, 'creating visually stunning and thrilling cinematic'),
(4, 'Roar', 'Uthaug', 3, 'delivering engaging and visually compelling storyt'),
(5, 'Simon', 'West', 4, 'crafting high-energy. visually intense, and suspes'),
(6, 'Robert', 'Stromberg', 5, 'visual effects and production design'),
(7, 'Joachim', 'Ronning', 3, 'delivering visually stunning and engaging cinemati');

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `movie_name` varchar(50) DEFAULT NULL,
  `sequel` tinyint(3) UNSIGNED DEFAULT NULL,
  `premiere_city_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `1week_premiere_money` varchar(50) DEFAULT NULL,
  `format_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `director_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `director_salary` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id`, `movie_name`, `sequel`, `premiere_city_id`, `1week_premiere_money`, `format_id`, `director_id`, `director_salary`) VALUES
(11, 'The Conjuring', NULL, 1, '5000000$', 1, 1, '900000$'),
(12, 'The Conjuring 2', 11, 1, '4860000$', 1, 1, '700000$'),
(13, 'The Conjuring 3', 12, 1, '4570000$', 1, 2, '850000$'),
(14, 'The Maze Runner', NULL, 2, '3740000$', 2, 3, '750000$'),
(15, 'Maze Runner: The Scorch Trials', 14, 2, '3920000$', 2, 3, '710000$'),
(16, 'Maze Runner: Thea Death Cure', 15, 2, '4100000$', 2, 3, '810000$'),
(17, 'Tomb Raider', NULL, 3, '5360000$', 1, 4, '830000$'),
(18, 'Lara Croft: Tomb Raider', 17, 2, '5300000$', 1, 5, '850000$'),
(19, 'Maleficient', NULL, 3, '4000000$', 2, 6, '745000$'),
(20, 'Maleficient: Mistress of Evil', 19, 3, '3330000$', 2, 7, '770000$');

-- --------------------------------------------------------

--
-- Table structure for table `film_critic`
--

CREATE TABLE `film_critic` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `film_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `critic_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `criticism` text DEFAULT NULL,
  `rate1_10` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `film_critic`
--

INSERT INTO `film_critic` (`id`, `film_id`, `critic_id`, `criticism`, `rate1_10`) VALUES
(1, 11, 3, 'By far one of the best horror movies Ive seen in a while.', 10),
(2, 11, 2, 'The most thrilling horror film to have come out in recent times.', 9),
(3, 14, 7, 'I found the film to be quite intriguing and exciting.', 8),
(4, 14, 9, 'The ending seems like a cop out for a hoped for sequel unfortunately. And there a few moments that really do fall back into the stereotypical plot design.', 7),
(5, 19, 6, 'Maleficent imparts a feeling of enchantment. Here is a world thats strange and beautiful.', 9),
(6, 19, 5, 'The movie is a mess but its a rich mess. It has weight. It matters.', 10),
(7, 17, 1, 'Tomb Raider reboots the franchise with a more grounded approach and a star whos clearly more than up to the task neither of which are well served by an uninspired origin story.', 9),
(8, 17, 4, 'A fun and often times thrilling action-adventure with a strong, believable female protagonist .', 10),
(9, 18, 8, 'In the movies there is good nonsense and bad nonsense. Lara Croft: Tomb Raider is 100% good nonsense!', 8),
(10, 18, 9, 'A bit silly but good fun with some fine action', 7),
(11, 20, 10, 'High Production Value didnt translate to Great Story', 5),
(12, 20, 5, 'I could not roll my eyes back any further.', 3),
(13, 16, 3, 'Good acting, well written and the special effects are great.', 9),
(14, 16, 1, 'This film was a great finale for the Maze Runner triology series.', 10),
(15, 13, 8, 'Super predictable jump scares, not nearly as scary as the other movies.', 8);

-- --------------------------------------------------------

--
-- Table structure for table `format`
--

CREATE TABLE `format` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `type` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `format`
--

INSERT INTO `format` (`id`, `type`) VALUES
(1, '2D'),
(2, '3D');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `type`) VALUES
(1, 'Horror'),
(2, 'Science-fiction'),
(3, 'Adventure'),
(4, 'Action'),
(5, 'Fantasy'),
(6, 'Thriller'),
(7, 'Crime'),
(8, 'War'),
(9, 'Supernatural'),
(10, 'Drama'),
(11, 'Romance'),
(12, 'Comedy'),
(13, 'Mystery'),
(14, 'Animation'),
(15, 'Documentary');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `premiere_city_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `genre_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `country_of_origin` varchar(50) DEFAULT NULL,
  `production_company` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `name`, `premiere_city_id`, `genre_id`, `country_of_origin`, `production_company`) VALUES
(1, 'The Conjuring', 1, 1, 'US', 'New Line Cinema'),
(2, 'The Conjuring 2', 1, 1, 'US', 'New Line Cinema'),
(3, 'The Conjuring 3', 1, 1, 'US', 'New Line Cinema'),
(4, 'The Maze Runner', 2, 2, 'US', 'Gotham Group'),
(5, 'Maze Runner: The Scorch Trials', 2, 2, 'US', 'Gotham Group'),
(6, 'Maze Runner: Thea Death Cure', 2, 2, 'US', 'Gotham Group'),
(7, 'Tomb Raider', 3, 3, 'US', 'Warner Bros'),
(8, 'Lara Croft: Tomb Raider', 2, 4, 'US', 'Paramount Pictures'),
(9, 'Maleficient', 3, 5, 'UK', 'Walt Disney Pictures'),
(10, 'Maleficient: Mistress of Evil', 3, 5, 'UK', 'Walt Disney Pictures'),
(11, 'Teen Wolf', 1, 6, 'US', 'Adelstein Productions'),
(12, 'Peaky Blinders', 1, 7, 'UK', 'Caryn Mandabach Productions'),
(13, 'Vikings', 3, 8, 'Canada', 'Octagon Films'),
(14, 'Stranger Things', 3, 1, 'US', '21 Laps Entertainment'),
(15, 'Wednesday', 2, 9, 'US', 'Tim Burton Productions'),
(16, 'The Queens Gambit', 1, 10, 'US', 'Flitcraft'),
(17, 'The Umbrella Academy', 3, 5, 'US', 'Borderline Entertainment'),
(18, 'Lucifer', 1, 5, 'US', 'Aggresive Mediocrity'),
(19, '13 Reasons Why', 3, 10, 'US', 'July Moon Anonymous'),
(20, 'Riverdale', 2, 10, 'US', 'Berlanti Productions'),
(21, 'Maleficient', 3, 5, 'UK', 'Walt Disney Pictures');

-- --------------------------------------------------------

--
-- Table structure for table `movie_actor`
--

CREATE TABLE `movie_actor` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `movie_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `actor_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `salary` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_actor`
--

INSERT INTO `movie_actor` (`id`, `movie_id`, `actor_id`, `salary`) VALUES
(1, 1, 1, '3000000$'),
(2, 1, 2, '3000000$'),
(3, 2, 1, '3720000$'),
(4, 2, 2, '3720000$'),
(5, 3, 1, '2400000$'),
(6, 3, 2, '2400000$'),
(7, 4, 3, '4100000$'),
(8, 4, 4, '3900000$'),
(9, 4, 5, '3900000$'),
(10, 5, 3, '4120000$'),
(11, 5, 4, '3870000$'),
(12, 5, 5, '3870000$'),
(13, 6, 3, '3790000$'),
(14, 6, 4, '3360000$'),
(15, 6, 5, '3360000$'),
(16, 7, 7, '2700000$'),
(17, 7, 8, '2750000$'),
(18, 8, 9, '4320000$'),
(19, 8, 10, '3700000$'),
(20, 9, 9, '4500000$'),
(21, 9, 11, '4100000$'),
(22, 10, 9, '4500000$'),
(23, 10, 11, '4100000$'),
(24, 11, 3, '6500000$'),
(25, 11, 12, '6300000$'),
(26, 11, 13, '6400000$'),
(27, 11, 14, '6350000$'),
(28, 12, 15, '7300000$'),
(29, 12, 16, '7000000$'),
(30, 12, 17, '7200000$'),
(31, 13, 18, '7500000$'),
(32, 13, 19, '7500000$'),
(33, 14, 20, '6100000$'),
(34, 14, 21, '5000000$'),
(35, 15, 22, '5400000$'),
(36, 15, 23, '5200000$'),
(37, 16, 24, '5230000$'),
(38, 16, 4, '5140000$'),
(39, 17, 25, '6700000$'),
(40, 17, 26, '6700000$'),
(41, 18, 27, '6890000$'),
(42, 19, 28, '6540000$'),
(43, 20, 29, '7690000$'),
(44, 20, 30, '7690000$');

-- --------------------------------------------------------

--
-- Table structure for table `oscar`
--

CREATE TABLE `oscar` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `actor_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `film_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oscar`
--

INSERT INTO `oscar` (`id`, `actor_id`, `film_id`, `role`, `year`) VALUES
(1, 1, 11, 'Lorraine Warren', '2014'),
(2, 2, 13, 'Ed Warren', '2021'),
(3, 3, 14, 'Thomas', '2015'),
(4, 3, 15, 'Thomas', '2018'),
(5, 9, 19, 'Maleficent', '2015'),
(6, 9, 18, 'Lara Croft', '2002'),
(7, 7, 17, 'Lara Croft', '2001');

-- --------------------------------------------------------

--
-- Table structure for table `premiere_city`
--

CREATE TABLE `premiere_city` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `premiere_city`
--

INSERT INTO `premiere_city` (`id`, `city`) VALUES
(1, 'Los Angeles'),
(2, 'Hollywood'),
(3, 'New York City');

-- --------------------------------------------------------

--
-- Table structure for table `tv_series`
--

CREATE TABLE `tv_series` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `movie_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `tv_channel` varchar(50) DEFAULT NULL,
  `number_of_episodes` int(11) DEFAULT NULL,
  `number_of_seasons` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tv_series`
--

INSERT INTO `tv_series` (`id`, `movie_id`, `tv_channel`, `number_of_episodes`, `number_of_seasons`) VALUES
(1, 11, 'MTV', 100, 6),
(2, 12, 'BBC Two', 36, 6),
(3, 13, 'Amazon Prime Video', 89, 6),
(4, 14, 'Netflix', 34, 4),
(5, 15, 'Netflix', 8, 1),
(6, 16, 'Netflix', 7, 1),
(7, 17, 'Netflix', 20, 2),
(8, 18, 'Fox Network', 77, 6),
(9, 19, 'Netflix', 49, 4),
(10, 20, 'The CW Netwoek', 137, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `actor_critic`
--
ALTER TABLE `actor_critic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actor2_fk` (`actor_id`),
  ADD KEY `film2_fk` (`film_id`),
  ADD KEY `critic1_fk` (`critic_id`);

--
-- Indexes for table `critic`
--
ALTER TABLE `critic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre1_fk` (`genre_id`);

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sequel_fk` (`sequel`),
  ADD KEY `movie_name_fk` (`movie_name`),
  ADD KEY `director_fk` (`director_id`),
  ADD KEY `format_fk` (`format_id`),
  ADD KEY `city1_fk` (`premiere_city_id`);

--
-- Indexes for table `film_critic`
--
ALTER TABLE `film_critic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `film1_fk` (`film_id`),
  ADD KEY `critic_fk` (`critic_id`);

--
-- Indexes for table `format`
--
ALTER TABLE `format`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `city_fk` (`premiere_city_id`),
  ADD KEY `genre_fk` (`genre_id`);

--
-- Indexes for table `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie3_id` (`movie_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- Indexes for table `oscar`
--
ALTER TABLE `oscar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actor1_id` (`actor_id`),
  ADD KEY `film_id` (`film_id`);

--
-- Indexes for table `premiere_city`
--
ALTER TABLE `premiere_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tv_series`
--
ALTER TABLE `tv_series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie_fk` (`movie_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actor`
--
ALTER TABLE `actor`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `actor_critic`
--
ALTER TABLE `actor_critic`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `critic`
--
ALTER TABLE `critic`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `director`
--
ALTER TABLE `director`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `film_critic`
--
ALTER TABLE `film_critic`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `format`
--
ALTER TABLE `format`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `movie_actor`
--
ALTER TABLE `movie_actor`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `oscar`
--
ALTER TABLE `oscar`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `premiere_city`
--
ALTER TABLE `premiere_city`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tv_series`
--
ALTER TABLE `tv_series`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actor_critic`
--
ALTER TABLE `actor_critic`
  ADD CONSTRAINT `actor2_fk` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`id`),
  ADD CONSTRAINT `critic1_fk` FOREIGN KEY (`critic_id`) REFERENCES `critic` (`id`),
  ADD CONSTRAINT `film2_fk` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`);

--
-- Constraints for table `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `genre1_fk` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `city1_fk` FOREIGN KEY (`premiere_city_id`) REFERENCES `premiere_city` (`id`),
  ADD CONSTRAINT `director_fk` FOREIGN KEY (`director_id`) REFERENCES `director` (`id`),
  ADD CONSTRAINT `format_fk` FOREIGN KEY (`format_id`) REFERENCES `format` (`id`),
  ADD CONSTRAINT `movie_name_fk` FOREIGN KEY (`movie_name`) REFERENCES `movie` (`name`),
  ADD CONSTRAINT `sequel_fk` FOREIGN KEY (`sequel`) REFERENCES `film` (`id`);

--
-- Constraints for table `film_critic`
--
ALTER TABLE `film_critic`
  ADD CONSTRAINT `critic_fk` FOREIGN KEY (`critic_id`) REFERENCES `critic` (`id`),
  ADD CONSTRAINT `film1_fk` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`);

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `city_fk` FOREIGN KEY (`premiere_city_id`) REFERENCES `premiere_city` (`id`),
  ADD CONSTRAINT `genre_fk` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);

--
-- Constraints for table `movie_actor`
--
ALTER TABLE `movie_actor`
  ADD CONSTRAINT `actor_id` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`id`),
  ADD CONSTRAINT `movie3_id` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);

--
-- Constraints for table `oscar`
--
ALTER TABLE `oscar`
  ADD CONSTRAINT `actor1_id` FOREIGN KEY (`actor_id`) REFERENCES `actor` (`id`),
  ADD CONSTRAINT `film_id` FOREIGN KEY (`film_id`) REFERENCES `film` (`id`);

--
-- Constraints for table `tv_series`
--
ALTER TABLE `tv_series`
  ADD CONSTRAINT `movie_fk` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
