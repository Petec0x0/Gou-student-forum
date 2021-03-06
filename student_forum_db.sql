-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2021 at 09:51 AM
-- Server version: 10.3.28-MariaDB-log-cll-lve
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trisjtsv_student_forum_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin@email.com', '$2y$10$W.vGQR7T4G5pYow596Gs3OrFGWBLBAf5IUsAIY35VQ4MG7DFvIRBm');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `assignment` text NOT NULL,
  `target_level` int(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`id`, `creator_id`, `title`, `assignment`, `target_level`, `created_at`) VALUES
(1, 1622414402, 'Hosting Subscriptions', '&lt;h1&gt;Hosting Subscriptions&lt;/h1&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;table&gt;\r\n	&lt;thead&gt;\r\n		&lt;tr&gt;\r\n			&lt;th&gt;&lt;a href=&quot;https://ap.www.namecheap.com/ProductList/HostingSubscriptions&quot;&gt;Subscription&lt;/a&gt;&lt;/th&gt;\r\n			&lt;th&gt;&lt;a href=&quot;https://ap.www.namecheap.com/ProductList/HostingSubscriptions&quot;&gt;Plan&lt;/a&gt;&lt;/th&gt;\r\n			&lt;th&gt;&lt;a href=&quot;https://ap.www.namecheap.com/ProductList/HostingSubscriptions&quot;&gt;Status&lt;/a&gt;&lt;/th&gt;\r\n			&lt;th&gt;Auto-Renew&lt;/th&gt;\r\n			&lt;th&gt;&lt;a href=&quot;https://ap.www.namecheap.com/ProductList/HostingSubscriptions&quot;&gt;Expiration&lt;/a&gt;&lt;/th&gt;\r\n			&lt;th&gt;&amp;nbsp;&lt;/th&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/thead&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;&lt;strong&gt;triskelioncoin.com&lt;/strong&gt;&lt;/td&gt;\r\n			&lt;td&gt;&lt;strong&gt;Stellar Plus&lt;/strong&gt;&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;ACTIVE&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;&lt;strong&gt;Aug 23, 2021 &lt;/strong&gt;&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;table&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;&lt;strong&gt;fxafia.com&lt;/strong&gt;&lt;/td&gt;\r\n			&lt;td&gt;&lt;strong&gt;Stellar Plus&lt;/strong&gt;&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;ACTIVE&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;&lt;strong&gt;Oct 6, 2021 &lt;/strong&gt;&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;table&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;&lt;strong&gt;trusttron.org&lt;/strong&gt;&lt;/td&gt;\r\n			&lt;td&gt;&lt;strong&gt;Stellar Plus&lt;/strong&gt;&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;ACTIVE&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;&lt;strong&gt;Dec 19, 2021 &lt;/strong&gt;&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;', 100, '2021-05-31 02:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'General', 'Discuss anything that doesn\'t fit into the other categories.'),
(2, 'News', 'Lorem Ispum'),
(3, 'Learning', 'Lorem Ispum'),
(4, 'Development', 'Lorem Ispum');

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` varchar(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`id`, `title`, `slug`, `message`, `category_id`, `author_id`, `created_at`, `updated_at`) VALUES
(3, 'Awful Taste But Great Execution', 'discussionL4ewO1622106010', '<h2>And keeping the old (Charter). Hello, Marat Sans and Noe.</h2>\r\n\r\n<p>We&rsquo;d like to introduce you to a couple of new friends of ours here at Medium. You may have seen them lounging about.</p>\r\n\r\n<p><a href=\"https://www.schick-toikka.com/noe-display\">Noe</a>&nbsp;is our new Medium brand typeface. Noe made its first appearance in August, when we launched our&nbsp;<a href=\"https://medium.design/rebooting-the-medium-identity-6fb8d5a47fc1\">new brand identity</a>. Noe Display Bold is the face we used as the basis for the Medium wordmark. We&rsquo;re using Noe Display&nbsp;<em>Medium</em>&nbsp;as the voice of Medium on&nbsp;<a href=\"https://medium.com/about\">marketing</a>&nbsp;<a href=\"https://medium.com/membership\">pages</a>&nbsp;and in places where we encourage users to sign in and upgrade.</p>\r\n\r\n<p>Medium started about 8 years ago. What this means is that we&rsquo;ve accrued years of complexity as features have layered on through development cycles. This complexity increases the cost of innovating our story page, the heart of Medium.</p>\r\n\r\n<h1>Enter PPPP ??</h1>\r\n\r\n<p>It stands for&nbsp;<strong>Patronus Post Page Project</strong>, aka the code name for migrating our story page from a legacy stack to a new web stack in order to take advantage of modern open source frameworks (React). The ultimate goal of PPPP was to position and power our platform for swift iteration, developer productivity, and a space to innovate.</p>\r\n', 1, '5', '2021-05-27 02:00:10', '2021-05-27 02:00:10'),
(4, 'What fonts are used by Medium?', 'discussionw772b1622106534', '<p>Medium published in an article discussing the fonts used by them with the name of the cast of characters, it was published under the &ldquo;Medium Design&rdquo; publication. The two new typefaces are;</p>\r\n\r\n<ol>\r\n	<li>Charter (serif)</li>\r\n	<li>Kievit (sans serif)</li>\r\n</ol>\r\n\r\n<p>They introduced these two typefaces or typography in Oct-8 2015, since then a lot of things have been changed on Medium but one thing that makes Medium the most attractive platform for writers is its editor and the fonts they use.</p>\r\n\r\n<p><a href=\"https://medium.com/menlo-office/building-your-brand-on-medium-and-blogging-2d7e8ea1cfc6\" target=\"_blank\">Building Your Brand On Medium And Blogging</a>&nbsp;Medium did this job very well.</p>\r\n\r\n<p>You can also follow me On Medium here:&nbsp;<a href=\"https://aamirokamal.medium.com/\" target=\"_blank\">Aamir Kamal ??? &ndash; Medium</a></p>\r\n\r\n<p>I hope this will helps you.</p>\r\n\r\n<p>Interestingly, you say Medium is for reading. For over 20 years researchers like Jakob Nielsen have said that people don&rsquo;t read online. See&nbsp;<a href=\"https://www.nngroup.com/articles/how-people-read-online/\" target=\"_blank\">How People Read Online: New and Old Findings</a></p>\r\n\r\n<p>Most fonts will support multiple languages but it&rsquo;s a tradeoff between the size of the font, the number of languages it support and the font features it makes available. Looking at Kievit with&nbsp;<a href=\"https://wakamaifondue.com/\" target=\"_blank\">Wakamai Fondue</a>&nbsp;it shows support for 25 languages that use the Latin alphabet.</p>\r\n\r\n<p>Languages that use other alphabets usually have other default fonts available to browsers and they may or may not do a good job of it&hellip; I write in English and Spanish only so I wouldn&rsquo;t know.</p>\r\n\r\n<p>The Medium platform doesn&rsquo;t support multilingual content. See&nbsp;<a href=\"https://medium.com/inside-blogging/multilingual-publishing-on-medium-837d0bbfa60b\" target=\"_blank\">Multilingual Publishing on Medium</a>&nbsp;for a more complete analysis of why this is so, but it&rsquo;s not because of the fonts they use</p>\r\n', 1, '5', '2021-05-27 02:08:54', '2021-05-27 02:08:54'),
(5, 'OUR NEW EDGENET DEVELOPER EVANGELIST', 'discussiongvu5E1622106664', '<p>Hey Everyone,<br />\r\nPlease join me in welcoming&nbsp;<a href=\"https://www.topcoder.com/members/Pena\">@Pena</a>&nbsp;as our EdgeNet Developer Evangelist/Advocate.</p>\r\n\r\n<p><a href=\"https://www.topcoder.com/members/Pena\">@Pena</a>&nbsp;a Topcoder Member since 2013 has experience in software development and competitive programming. He is passionate about helping and sharing interesting things with the community.</p>\r\n\r\n<p>He&rsquo;ll be helping&nbsp;and inspiring you all on all things EdgeNet as well as provide fresh, new ideas on how you can do better on EdgeNet Skill Builder Challenges and in general Edge based challenges as well!</p>\r\n\r\n<p>Over the next few weeks you will see him creating:</p>\r\n\r\n<ul>\r\n	<li>Getting Started Guides,</li>\r\n	<li>Help Articles,</li>\r\n	<li>Starter Packs,</li>\r\n	<li>Quick Start Code Snippets,</li>\r\n	<li>Video tutorials,</li>\r\n	<li>Webinars,</li>\r\n	<li>Interesting Challenges, and</li>\r\n	<li><strong><em>Whatever</em></strong>&nbsp;you think will help you get better at EdgeNet Challenges!</li>\r\n</ul>\r\n\r\n<p>Feel free to reach out to him for any help or anywhere you are getting stuck! He is very active on slack and forums and would love to help you!</p>\r\n\r\n<p>PS: There is a&nbsp;<a href=\"https://www.topcoder.com/challenges/30179995\" target=\"_blank\">Learning Getting Started Challenge</a>&nbsp;running right now, which will award you a Uber Cool EdgeNet+Topcoder T-shirt for creating your developer account on EdgeNet Portal</p>\r\n\r\n<p>Happy Competing!<br />\r\nHarshit</p>\r\n', 1, '5', '2021-05-27 02:11:04', '2021-05-27 02:11:04'),
(6, '&quot;TUTORIAL DISCUSSIONS&quot; AS THEY HAPPEN', 'discussionZFB5w1622154093', '<p>Hey&nbsp;<a href=\"https://www.topcoder.com/members/WeirdThinker15\">@WeirdThinker15</a>,</p>\r\n\r\n<p>Good question.</p>\r\n\r\n<p>The Topcoder community is full of incredible talent and so when gigs go live it&#39;s worth applying for the positions that align with your experience.</p>\r\n\r\n<p>If you feel like you&#39;re missing a few core skills for some gigs then I&#39;d recommend going to compete in some of our challenges to build that experience. You can add those experiences onto your CV and Topcoder profile when you&#39;re done.</p>\r\n\r\n<p>So if you&#39;re applying: go hard on the gigs that you feel like you have the best chance to be successful in.</p>\r\n\r\n<p>If you want me to take a look at your CV and recommend some gigs then you can ping me a copy: nathan.jefferson@copilots.topcoder.com</p>\r\n\r\n<p>The process is usually pretty slick. When you apply you&#39;ll receive an update within 24 hours. If it&#39;s negative then we&#39;ll recommend some next steps. If it&#39;s positive then you&#39;ll meet with a colleague in recruitment for a video chat (you pick a time that works for you).</p>\r\n\r\n<p>At that stage, if you&#39;re happy with the gig and we feel like it&#39;s a good fit then we&#39;ll present you to the client. They&#39;ll then pick up the process with either a standard interview, a technical interview or a combination of both.</p>\r\n\r\n<p>Usually, from application, we&#39;re pushing for 10 days. We can&#39;t always commit to that timeframe as a lot depends on the clients side, but we&#39;ll always work to update you quickly.</p>\r\n\r\n<p>Hope that&#39;s useful.</p>\r\n', 3, '5', '2021-05-27 15:21:33', '2021-05-27 15:21:33'),
(7, 'SKILL BUILDING FOR ALGORITHM', 'discussion0IeD51622154317', '<p>I encountered a problem on Codesignal (it requires coins to unlock, it&#39;s countSmallerToTheRight problem in Interview Practice, Common Techniques Advanced section -- apparently not common enough.. I did 89 of the 110 problems available before hitting this brick wall)</p>\r\n\r\n<p>Every solution I&#39;ve thought of is n^2 and times out. Basically I need to calculate how many items to the right of each index in the array are a value less than the current value</p>\r\n\r\n<p>Was hoping someone could point me in the right direction</p>\r\n', 4, '5', '2021-05-27 15:25:17', '2021-05-27 15:25:17'),
(8, 'How to find string length in PHP', 'discussion8eldO1622419022', '<h2>Answer: Use the PHP&nbsp;<code>strlen()</code>&nbsp;function</h2>\r\n\r\n<p>You can simply use the PHP&nbsp;<code>strlen()</code>&nbsp;function to get the length of a string. The&nbsp;<code>strlen()</code>&nbsp;function return the length of the string on success, and 0 if the string is empty.</p>\r\n\r\n<p>Let&#39;s take a look at the following example to understand how it actually works:</p>\r\n\r\n<p>Example</p>\r\n\r\n<p><a href=\"https://www.tutorialrepublic.com/codelab.php?topic=php&amp;file=get-string-length\" target=\"_blank\">Try this code&nbsp;&raquo;</a></p>\r\n\r\n<pre>\r\n<code>&lt;?php\r\n$str1 = &#39;Hello world!&#39;;\r\necho strlen($str1); // Outputs: 12\r\necho &quot;&lt;br&gt;&quot;;\r\n \r\n$str2 = &#39; Hello    world! &#39;;\r\necho strlen($str2); // Outputs: 17\r\n?&gt;</code></pre>\r\n\r\n<hr />\r\n<h2>Related FAQ</h2>\r\n\r\n<p>Here are some more FAQ related to this topic:</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://www.tutorialrepublic.com/faq/how-to-find-number-of-characters-in-a-string-in-php.php\">How to find number of characters in a string in PHP</a></li>\r\n	<li><a href=\"https://www.tutorialrepublic.com/faq/how-to-find-number-of-words-in-a-string-in-php.php\">How to find number of words in a string in PHP</a></li>\r\n	<li><a href=\"https://www.tutorialrepublic.com/faq/how-to-count-all-elements-in-an-array-in-php.php\">How to count all elements in an array in PHP</a></li>\r\n</ul>\r\n\r\n<p><a href=\"https://www.tutorialrepublic.com/faq/how-to-create-a-new-line-in-php.php\">PREVIOUS PAGE</a></p>\r\n', 1, '1622414402', '2021-05-30 19:57:02', '2021-05-30 19:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id`, `image`, `firstname`, `lastname`, `email`, `phone`, `password`) VALUES
('1622414264', 'assets/image_gou/index.png', 'Chike', 'Obi', 'email.email@email.com', '098765423234', '$2y$10$434AVBaUpWB50qxnPgOzw.vc8x/h4C7FX5jI65OlQGfxaSc4QCeHq'),
('1622414402', 'uploads/1622414402obi.png', 'Dike', 'David', 'dike@email.com', '098765423234', '$2y$10$GlkjSczYjWaq2pUgjQqMyO4VoAz1b5a8uRU9WkfaMq0z9Vgvx8fQy'),
('1622414934', 'uploads/1622414934gavin.jpg', 'Gavin', 'Delta', 'udehonyedikachi01@gmail.com', '098765423234', '$2y$10$q2UpVKp2FGD2cpnsL5u8K.fyigD7/xfSOW9OQWlQr2k.yRI54aal2');

-- --------------------------------------------------------

--
-- Table structure for table `personal_chat`
--

CREATE TABLE `personal_chat` (
  `id` int(11) NOT NULL,
  `sender_userid` int(11) NOT NULL,
  `reciever_userid` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_chat`
--

INSERT INTO `personal_chat` (`id`, `sender_userid`, `reciever_userid`, `message`, `timestamp`) VALUES
(3, 6, 5, 'mysqli_stmt_executenot doing anything', '2021-05-29 23:20:56'),
(4, 5, 6, '&lt;span class=&quot;spell_orig&quot;&gt;No results found for &lt;/span&gt;', '2021-05-29 23:24:11'),
(5, 5, 6, '&lt;div class=&quot;container&quot;&gt;&lt;div id=&quot;content&quot; class=&quot;snippet-hidden&quot;&gt;&lt;div itemprop=&quot;mainEntity&quot; itemscope=&quot;&quot; itemtype=&quot;https://schema.org/Question&quot;&gt;&lt;div class=&quot;inner-content clearfix&quot;&gt;&lt;div id=&quot;mainbar&quot; role=&quot;main&quot; aria-label=&quot;question and answers&quot;&gt;&lt;div id=&quot;answers&quot;&gt;&lt;div id=&quot;answer-7188188&quot; class=&quot;answer&quot; data-answerid=&quot;7188188&quot; data-ownerid=&quot;645186&quot; data-score=&quot;103&quot; itemprop=&quot;suggestedAnswer&quot; itemscope=&quot;&quot; itemtype=&quot;https://schema.org/Answer&quot;&gt;&lt;div class=&quot;post-layout&quot;&gt;&lt;div class=&quot;answercell post-layout--right&quot;&gt;&lt;div class=&quot;s-prose js-post-body&quot; itemprop=&quot;text&quot;&gt;&lt;p&gt;Do a &quot;recursive&quot; &lt;code&gt;setTimeout&lt;/code&gt; of your function, and it will keep being executed every amount of time defined:&lt;/p&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;&lt;/div&gt;', '2021-05-29 23:40:22'),
(6, 6, 5, '&lt;a class=&quot;mx-2&quot;&gt; Welcome, Black&lt;/a&gt;', '2021-05-29 23:51:58'),
(7, 6, 5, 'I am a software developer and Machine Learning enthusiast. Computer Science Student @ GOUNI. I am passionate about technology and constant learning.', '2021-05-30 00:16:52'),
(8, 5, 6, 'A &quot;computer base test&quot; application written with python\'s tkinter library', '2021-05-30 00:19:40'),
(9, 1622414402, 6, 'Hello Black Cat&lt;div&gt;&lt;br&gt;&lt;/div&gt;', '2021-05-31 00:07:21'),
(10, 1622414402, 6, 'How are you doing?', '2021-05-31 00:07:33'),
(11, 6, 1622414402, 'Oh! Sorry for replying late.', '2021-05-31 00:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `discussion_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `discussion_id`, `message`, `author_id`, `created_at`) VALUES
(1, 5, '<p>Feel free to reach out to him for any help or anywhere you are getting stuck! He is very active on slack and forums and would love to help you!</p>\r\n', 5, '2021-05-27 12:56:42'),
(2, 5, '<p>Over the next few weeks you will see him creating:</p>\r\n\r\n<ul>\r\n</ul>\r\n', 5, '2021-05-27 13:50:35'),
(3, 6, '<p>So if you&#39;re applying: go hard on the gigs that you feel like you have the best chance to be successful in.</p>\r\n', 5, '2021-05-27 15:30:18'),
(4, 7, '<p>Was hoping someone could point me in the right direction</p>\r\n\r\n<p>&nbsp;</p>\r\n', 5, '2021-05-27 15:32:07'),
(5, 7, '<p>I encountered a problem on Codesignal (it requires coins to unlock, it&#39;s countSmallerToTheRight problem in Interview Practice, Common Techniques Advanced section -- apparently not common enough.. I did 89 of the 110 problems available before hitting this brick wall)</p>\r\n', 5, '2021-05-27 15:32:14'),
(6, 4, '<p>hi thanks, this is really helping, the errors is finally showing itsel</p>\r\n', 6, '2021-05-29 19:00:55'),
(7, 8, '<p>Let&#39;s take a look at the following example to understand how it actually works:</p>\r\n', 1622414402, '2021-05-30 20:05:09'),
(8, 3, '<p>The ultimate goal of PPPP was to position and power our platform for swift iteration, developer</p>\r\n', 1622414402, '2021-05-30 20:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `day_id` int(11) NOT NULL,
  `time` time NOT NULL,
  `repeat_status` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`id`, `owner_id`, `purpose`, `day_id`, `time`, `repeat_status`, `status`) VALUES
(2, 6, 'GCCP', 5, '15:30:00', 1, 1),
(3, 1622414402, 'Protest', 2, '08:00:00', 0, 1),
(8, 1622414934, 'Senate Meeting', 1, '14:45:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `email`, `firstname`, `lastname`, `reg_no`, `password`, `address`, `phone_no`, `level`, `gender`, `image`, `created_at`) VALUES
(2, 'fxafia.fxafia@gmail.com', 'Onyi', 'Udeh', 'u17252', '$2y$10$YzLQNs7rihbG9Nkyg9t3ee768m2XGgt.NOOE1qXbAt9iDFdUVFjcS', 'gou', '09087665443', 100, 'male', 'assets/image_gou/index.png', '2021-05-26'),
(4, 'udehonyedikachi01@gmail.com', 'Choco', 'Milo', 'u17254', '$2y$10$tnKItThEzbBZNE5Hryq0reXulm3b2wJmLsvLFce3DJz5Vgmh.Wnou', 'gou', '09087665443', 100, 'male', 'uploads/162163236949640308.jpeg', '2021-05-26'),
(5, 'tega@email.com', 'Tega', 'Delta', 'u8754578', '$2y$10$/OE55aZOQCigR6hJfSDzMurttkEgEJlCPBREQA/YMyHXfOTAd6Bxu', 'gou', '098765423234', 100, 'male', 'uploads/49640308.jpeg', '2021-05-26'),
(6, 'black@gmail.com', 'Black', 'Cat', 'u17/nas/262', '$2y$10$W.vGQR7T4G5pYow596Gs3OrFGWBLBAf5IUsAIY35VQ4MG7DFvIRBm', 'Gou', '0987654323456', 400, 'male', 'uploads/1622306046external-content.duckduckgo.com.jpeg', '2021-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `study_material`
--

CREATE TABLE `study_material` (
  `id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `document_path` varchar(255) NOT NULL,
  `uploaded_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `study_material`
--

INSERT INTO `study_material` (`id`, `owner_id`, `title`, `description`, `document_path`, `uploaded_at`) VALUES
(1, 5, 'Trying something else', 'document_path		document_path', 'uploads/docs/1622164327CSC438 DATABASE DESIGN AND MANAGEMENT 4 UPLOAD.docx', '2021-05-27 18:12:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_chat`
--
ALTER TABLE `personal_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `reg_no` (`reg_no`);

--
-- Indexes for table `study_material`
--
ALTER TABLE `study_material`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_chat`
--
ALTER TABLE `personal_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `study_material`
--
ALTER TABLE `study_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
