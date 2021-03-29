-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2021 at 08:18 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `body`, `created_date_time`, `updated_date_time`) VALUES
(1, 1, 2, '          Good idea.', '2021-03-17 10:42:16', '2021-03-18 10:57:56'),
(2, 1, 2, '          DFSDFDSFF', '2021-03-17 11:13:45', '2021-03-18 10:57:56'),
(5, 1, 2, '          DFSDFDSFF', '2021-03-17 11:21:21', '2021-03-18 10:57:56'),
(6, 1, 2, '          DFSDFDSFF', '2021-03-17 11:48:34', '2021-03-18 10:57:56'),
(11, 1, 1, '         abc', '2021-03-17 13:44:25', '2021-03-18 10:57:56'),
(12, 1, 1, '          def', '2021-03-17 13:49:17', '2021-03-18 10:57:56'),
(13, 1, 1, '         aaa', '2021-03-17 13:50:30', '2021-03-18 10:57:56'),
(14, 1, 1, '         bb', '2021-03-17 13:50:47', '2021-03-18 10:57:56'),
(15, 1, 1, '          ', '2021-03-17 13:51:56', '2021-03-18 10:57:56'),
(56, 8, 1, 'nice idea', '2021-03-18 02:50:43', '2021-03-18 10:57:56'),
(57, 8, 1, 'nice idea', '2021-03-18 02:51:27', '2021-03-18 10:57:56'),
(58, 8, 1, 'nice idea', '2021-03-18 02:53:06', '2021-03-18 10:57:56'),
(59, 4, 6, 'good', '2021-03-18 03:20:34', '2021-03-18 10:57:56'),
(65, 4, 6, 'hi', '2021-03-19 07:56:32', '2021-03-19 07:56:32'),
(66, 7, 2, 'great', '2021-03-21 13:51:27', '2021-03-21 13:51:27'),
(67, 14, 2, 'good', '2021-03-21 14:06:27', '2021-03-21 14:06:27'),
(68, 14, 11, 'great', '2021-03-21 14:07:00', '2021-03-21 14:07:00'),
(69, 13, 14, 'good idea', '2021-03-22 03:27:01', '2021-03-22 03:27:01'),
(70, 12, 14, 'nice', '2021-03-22 03:27:13', '2021-03-22 03:27:13'),
(71, 15, 6, 'great', '2021-03-22 03:33:43', '2021-03-22 03:33:43'),
(72, 16, 6, 'excellent', '2021-03-22 03:33:57', '2021-03-22 03:33:57'),
(73, 16, 4, 'gg', '2021-03-24 07:10:44', '2021-03-24 07:10:44'),
(74, 17, 4, 'gg', '2021-03-24 07:11:06', '2021-03-24 07:11:06'),
(75, 17, 0, 'gg', '2021-03-24 07:14:23', '2021-03-24 07:14:23'),
(77, 17, 1, 'afddsfdsfsdfsdf', '2021-03-24 07:20:49', '2021-03-24 07:20:49'),
(78, 12, 6, 'hi', '2021-03-25 02:03:36', '2021-03-25 02:03:36'),
(79, 16, 1, 'hi', '2021-03-25 02:57:06', '2021-03-25 02:57:06'),
(80, 15, 11, 'good idea', '2021-03-28 21:15:58', '2021-03-28 21:15:58'),
(81, 17, 11, 'great', '2021-03-28 21:16:09', '2021-03-28 21:16:09'),
(82, 16, 11, 'aa', '2021-03-28 21:27:53', '2021-03-28 21:27:53'),
(83, 9, 1, 'great', '2021-03-29 11:05:53', '2021-03-29 11:05:53'),
(86, 22, 11, 'great', '2021-03-29 18:08:37', '2021-03-29 18:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `updated_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_date_time`, `user_id`, `updated_date_time`) VALUES
(1, 'Why I Love Italy', 'I love Italy, it’s become my favourite country to visit over the years and while travel has been on hold I’ve been waiting out for when we can return to Italy again. The food, the art, the architecture, the nature, the people – the reasons I’ve fallen in ', '2021-03-17 05:25:32', 1, '2021-03-21 14:20:41'),
(4, 'TANZANIA ', 'IN PHOTOS - A safari in Serengeti National Park, Tanzania\r\n‘Shouldn’t we close our windows?!? ‘ … Silence… This moment is what we came for. The two lions are standing so close to the jeep we could touch them, but we sense there’s no need to be scared. We ', '2021-03-17 17:35:39', 6, '2021-03-21 14:25:30'),
(7, '\r\nHIGHLIGHTS OF MY HOME COUNTRY - Ghent, Belgium', 'If you ended up in Ghent as a tourist 20 years ago, you’d probably taken a wrong turn somewhere halfway between Brussels and Bruges, or gotten off the train at the wrong station. But today, Ghent is THE place to be in Belgium, and easily my favorite city!', '2021-03-17 17:39:25', 6, '2021-03-21 14:26:50'),
(8, 'A safari in Lake Manyara National Park, Tanzania', 'With its 330 km², Lake Manyara National Park is one of the smaller Tanzanian parks. It’s often skipped and replaced by a visit to Tarangire National Park, but definitely worth a visit. Let\'s go spot some elephants, zebra\'s, giraffes and if we\'re lucky we ', '2021-03-18 02:50:29', 1, '2021-03-21 14:27:19'),
(9, 'THE COOLEST THINGS TO DO IN CUBA', 'Smoking hand-made cigars, drink rhum, or drive around in a car that has 999.999 kms on the counter... because THAT\'s where it stopped turning. Get ready to fall in love with Cuba!', '2021-03-20 19:02:55', 1, '2021-03-21 14:27:45'),
(12, 'ROAD TRIP ITINERARY - 3 weeks in the Balkans', 'The perfect itinerary for your road trip through Bosnia and Herzegovina, Montenegro and Albania. Let\'s hit the road!', '2021-03-20 19:09:15', 1, '2021-03-21 14:28:38'),
(13, 'A journey inside an active volcano at Kawah Ijen, Indonesia', '“Just breath slowly in and out and you’ll be fine”. Chong was holding my hand in the pitch black night as I tried to control my breathing. Our dim torches were the only source of light but they were enough to see that his eyes weren’t letting go of mine f', '2021-03-20 19:10:09', 1, '2021-03-21 14:29:11'),
(14, 'WHY I love Italy – my favorite Italy experiences and places', 'When it comes to travelling, there is no other country that has captured my heart like Italy. She has dazzling cities crammed with art and architecture, mesmerising mountains with epic lakes and hikes, breath-taking blue hues along the southern coast, and', '2021-03-21 13:56:51', 2, '2021-03-29 15:27:45'),
(15, '7 Days Samoa Island Itinerary', 'Samoa has been on my bucketlist for quite some time now, and I’m beyond fulfilled after finally traveling there! Chances are if you’re reading this you already know where it is and what’s mostly there, but for generality, I’ll start from the top! For star', '2021-03-22 03:29:17', 14, '2021-03-25 02:32:18'),
(16, 'How to Plan a Trip to The Great Barrier Reef', 'Not going to lie, I have been extremely aggressive and obnoxious lately when it comes to ticking off items on my never-ending bucketlist! This time, it was diving the Great Barrier Reef, which I decided to do just two weeks after hiking Mt. Kilimanjaro, a', '2021-03-22 03:30:28', 14, '2021-03-22 03:30:28'),
(17, '50 Tips for Climbing Kilimanjaro', 'Recently I climbed Mt. Kilimanjaro in Tanzania for International Women’s Day with Whoa Travel, and I have to say it was one of the most epic moments of my life! I’m by no means a professional hiker, but I honestly can say I didn’t find many difficulties w', '2021-03-22 03:33:18', 6, '2021-03-22 03:33:18'),
(20, 'Pick one clear angle.', 'You’ve got a topic. Awesome! Now, what’s your angle? Avoid a broad approach—get specific. You’ll get overwhelmed if you pick a huge subject like organic vegetable gardening and try to cover it all. Instead, go with “10 Budget-Friendly Ways to Start an Org', '2021-03-29 17:52:28', 9, '2021-03-29 18:06:27'),
(21, 'Choose your blog post topic', 'I know quite a few writers whose abandoned personal blogs are languishing in some dark corner of the Internet. These writers launched their blogs with joy and enthusiasm, but their momentum fizzled because they found it too hard to keep coming up with ins', '2021-03-29 17:54:50', 2, '2021-03-29 18:01:27'),
(22, 'How to Write a Blog Post ', 'You sit down. You stare at your screen. The cursor blinks. So do you. Anxiety sets in. Where do you begin when you want to create an article that will earn you clicks, comments, and social shares? This simple formula will show you how to write a blog post', '2021-03-29 18:00:54', 2, '2021-03-29 18:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_date_time`, `updated_date_time`) VALUES
(1, 'YMMA', 'yoon@gmail.com', 'yoon', '2021-03-15 10:03:08', '2021-03-29 18:14:19'),
(2, 'Kaung Kaung', 'kmt@gmail.com', 'kmt', '2021-03-15 10:03:16', '2021-03-29 18:13:33'),
(6, 'Good Girl', 'gg@gmail.com', 'gg', '2021-03-16 09:44:20', '2021-03-29 18:13:45'),
(9, 'YOON YOON', 'yy@gmail.com', 'yy', '2021-03-16 09:50:55', '2021-03-29 18:13:53'),
(11, 'admin', 'admin@admin.com', 'secret', '2021-03-17 17:55:33', '2021-03-21 14:04:05'),
(13, 'LISA', 'lisa@gmail.com', 'lisa', '2021-03-18 09:22:32', '2021-03-29 18:14:05'),
(14, 'ROSE', 'rose@gmail.com', 'rose', '2021-03-20 19:28:36', '2021-03-29 18:14:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
