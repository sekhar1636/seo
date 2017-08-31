-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2017 at 01:17 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webinfo_webapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feet` int(11) DEFAULT NULL,
  `inch` int(11) DEFAULT NULL,
  `hair` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eyes` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `school` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` date DEFAULT NULL,
  `to` date DEFAULT NULL,
  `auditionType` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vocalRange` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jobType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `technical` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ethnicity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instrument` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `misc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_path` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precrop_path` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precrop_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume_path` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `user_id`, `first_name`, `last_name`, `age`, `gender`, `feet`, `inch`, `hair`, `eyes`, `weight`, `school`, `from`, `to`, `auditionType`, `vocalRange`, `jobType`, `dance`, `technical`, `ethnicity`, `instrument`, `misc`, `photo_path`, `photo_url`, `precrop_path`, `precrop_url`, `resume_path`, `created_at`, `updated_at`) VALUES
(1, 204, 'Cary', 'Eichmann', 29, 'Male', 5, 8, 'Black', 'Black', 75, 'Test School', '2017-09-09', '2019-09-09', 'Monologue Only', 'Soprano', 'Intern', 'Ballroom', 'Lights', 'Asian', 'Sax', 'Improv', NULL, NULL, NULL, NULL, NULL, '2017-08-16 06:15:32', '2017-08-16 06:24:16'),
(2, 203, 'Easter', 'Carroll', 17, 'Male', 6, 1, 'Brown', 'Black', 75, 'Test School', '2017-09-09', '2019-09-09', 'Monologue Only', 'Mezzo', 'Intern', 'Ballroom,Swing', 'Costume', 'White_Caucasian', 'Banjo,Drums', 'Improv,Standup', 'assets/photos/Easter Carroll52955.jpg', 'assets/photos/Easter Carroll52955.jpg', 'assets/photos/Easter Carroll77944.JPG', 'assets/photos/Easter Carroll77944.JPG', NULL, '2017-08-16 06:25:43', '2017-08-16 07:12:39'),
(4, 205, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'assets/photos/Yasir Test55294.jpg', 'assets/photos/Yasir Test55294.jpg', 'assets/photos/Yasir Test38707.JPG', 'assets/photos/Yasir Test38707.JPG', NULL, '2017-08-31 06:04:58', '2017-08-31 06:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `content_pages`
--

CREATE TABLE `content_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slideshow_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_pages`
--

INSERT INTO `content_pages` (`id`, `title`, `description`, `slideshow_id`, `created_at`, `updated_at`) VALUES
(1, 'Sample page 1 title', 'Laravel includes a simple method of seeding your database with test data using seed classes. All seed classes are stored in the database/seeds directory. Seed classes may have any name you wish, but probably should follow some sensible convention, such as UsersTableSeeder, etc. By default, a  DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding order.', NULL, '2017-08-08 05:23:35', '2017-08-08 05:23:35'),
(2, 'Sample page 2 title', 'Laravel includes a simple method of seeding your database with test data using seed classes. All seed classes are stored in the database/seeds directory. Seed classes may have any name you wish, but probably should follow some sensible convention, such as UsersTableSeeder, etc. By default, a  DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding order.', NULL, '2017-08-08 05:23:35', '2017-08-08 05:23:35'),
(3, 'Sample page 3 title', 'Laravel includes a simple method of seeding your database with test data using seed classes. All seed classes are stored in the database/seeds directory. Seed classes may have any name you wish, but probably should follow some sensible convention, such as UsersTableSeeder, etc. By default, a  DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding order.', NULL, '2017-08-08 05:23:35', '2017-08-08 05:23:35'),
(4, 'Sample page 4 title', 'Laravel includes a simple method of seeding your database with test data using seed classes. All seed classes are stored in the database/seeds directory. Seed classes may have any name you wish, but probably should follow some sensible convention, such as UsersTableSeeder, etc. By default, a  DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding order.', NULL, '2017-08-08 05:23:35', '2017-08-08 05:23:35'),
(5, 'Sample page 5 title', 'Laravel includes a simple method of seeding your database with test data using seed classes. All seed classes are stored in the database/seeds directory. Seed classes may have any name you wish, but probably should follow some sensible convention, such as UsersTableSeeder, etc. By default, a  DatabaseSeeder class is defined for you. From this class, you may use the call method to run other seed classes, allowing you to control the seeding order.', NULL, '2017-08-08 05:23:36', '2017-08-22 07:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `_type` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `_type`, `created_at`, `updated_at`) VALUES
(1, 'What is the deadline for actor applications?', '<strong>Application deadline is February 1st.</strong> This means that ALL materials – email and hard copy – must be delivered to our office by <strong>NOON</strong> of that day. If you are using a courier, be sure they can confirm delivery on that day. Better yet, apply early!', 'Application', '2017-08-30 05:40:30', '2017-08-30 05:45:29'),
(2, 'What theatres/companies have attended the StrawHats in the past?', 'StrawHat Auditions have been assisting performers and theatre companies for over 30 years. <a href=\"http://localhost/strawhart/public/younger\">Click here for a list of past participating theatres</a><br>', 'Application', '2017-08-30 05:42:05', '2017-08-30 05:44:59'),
(3, 'How old do I have to be to audition?', 'Applicants must be 18 years or older at the time they start work. <a href=\"http://localhost/strawhart/public/younger\">Click Here for some theatre programs for younger actors.</a><br>', 'Application', '2017-08-30 05:44:05', '2017-08-30 05:44:05'),
(4, 'What are the different types of auditions?', 'There are 4 types of auditions: Song and Monologue, Monologue Only, \r\nDancers Who Sing, and a set number of Stand-By appointments for each \r\nday. <a href=\"http://localhost/strawhart/public/pdf/aud_type.pdf\">Click here for AUDITION TYPES.</a><br>', 'Application', '2017-08-30 05:46:29', '2017-08-30 05:46:29'),
(5, 'Can I apply for two different types of audition?', 'No, you should apply for the category where you can present yourself at your best.', 'Application', '2017-08-30 05:47:44', '2017-08-30 05:47:44'),
(6, 'What is a self-addressed stamped #10 envelope?', 'A business-size envelope fits a standard piece of paper folded in thirds\r\n and requires only a single USPS Forever Stamp for delivery. These \r\nenvelopes are used for our correspondence to you, so they do not have to\r\n be any larger. <a href=\"http://localhost/strawhart/public/pdf/envelope.pdf\">Click here for an illustration.</a>', 'Application', '2017-08-30 05:48:52', '2017-08-30 05:48:52'),
(7, 'Why should the picture I use be of professional quality? Is it OK to send laser copies?', 'Every actor who registers for StrawHat has an online profile that \r\nincludes picture and resume. Those profile pages are used to create the \r\naudition directories that the producers use during the audition. Your \r\npicture is your calling card and it should be of good quality to present\r\n you at your best. Plain paper laser copies should only be used as a \r\nlast resort. Your submission should be as professional as possible. Read\r\n our advice on head shots in the Actor Application section.', 'Application', '2017-08-30 05:49:35', '2017-08-30 05:49:35'),
(8, 'What happens if I send you just a picture and resume?', 'Nothing. We only accept complete applications.', 'Application', '2017-08-30 05:50:32', '2017-08-30 05:50:32'),
(9, 'Can I submit my application by email?', 'There are three steps to a complete application. You must follow all \r\nthree steps and submit ALL the required materials before the deadline \r\ndate to be considered for an audition .<a href=\"http://localhost/strawhart/public/pdf/application_structure.pdf\">(see APPLICATION INSTRUCTIONS)</a>', 'Application', '2017-08-30 05:51:23', '2017-08-30 05:51:23'),
(10, 'I forgot my User Name/Password. What do I do?', 'Performers: Go to the actor application page and use the <strong>ACTOR Reset Username/Password link</strong>. \r\n                          Staff Tech Design: Go to the Staff Tech application page and use the <strong>STAFF TECH Reset Username/Password link. </strong>', 'Application', '2017-08-30 05:52:15', '2017-08-30 05:52:15'),
(11, 'Where do I find my User ID Number?', '<p>Your User ID Number is located in the last line of the header on your application print out. <br></p>', 'Application', '2017-08-30 05:52:55', '2017-08-30 05:52:55'),
(12, 'How do I access my application to complete it/make changes?', 'On the home page, click on Performers and in the next screen you will \r\nsee a menu item called Change Actor Application. Follow the prompts to \r\naccess your page.', 'Application', '2017-08-30 05:53:45', '2017-08-30 05:53:45'),
(13, 'How do I print out the application?', 'On the home page, click on Performers and in the next screen you will \r\nsee a menu item called Change Actor Application. Follow the prompts to \r\naccess your page. Select Print Application, and use Ctrl+P to print. \r\nStaff Tech Design applicants do not have to print out their application.', 'Application', '2017-08-30 05:54:28', '2017-08-30 05:54:28'),
(14, 'How can I be sure StrawHat has received my application materials?', 'Once we activate your online profile, every time you log into the \r\nMembers Area you will be greeted with a screen that states your name and\r\n your status: i.e. \"Your registration was accepted on (date of \r\nactivation)\" and once selected to audition, your greeting screen will \r\ntell you that, too. You will also receive a confirmation letter in the \r\nmail via the first of the two self-addressed, stamped envelopes you \r\nprovided with your application, and an email via Mail Chimp', 'Application', '2017-08-30 05:55:12', '2017-08-30 05:55:12'),
(15, 'How long before I hear about my application/audition status?', '<p>Typically, it takes 2 to 4 weeks to activate your Member registration \r\nand make a determination on your application for an audition. However, \r\nwith the volume of mail we receive, it can take longer. Every \r\napplication is given consideration, and there are times when we are \r\nunwilling to make an immediate decision either for or against a \r\ncandidate: in those cases, a second and even third assessment are made.<br></p>', 'Application', '2017-08-30 05:55:54', '2017-08-30 05:55:54'),
(16, 'I can\'t access the Members Area. What do I do?', 'You do not have access to the Members Area until we have received your \r\ncomplete application and we activate your account. You will receive \r\nnotification via email and snail mail to confirm your registration \r\nstatus.<strong> If you are attempting to access your application to complete it or make changes, please refer to the previous FAQ section. </strong>', 'Members', '2017-08-30 05:56:48', '2017-08-30 05:56:48'),
(17, 'How long does it take for my OnLine profile to be activated?', 'If your emailed picture and resume (Step 1) are already in our inbox \r\nwhen we receive your hardcopy materials, it should take no more than 2 \r\nweeks to activate your account, but mail volume can slow processing.', 'Members', '2017-08-30 05:57:33', '2017-08-30 05:57:33'),
(18, 'How do I find my profile?', 'Click on Actor Search in the menu at the top of the page, then click on Search Actors by Last Name and follow the prompts.', 'Members', '2017-08-30 05:58:17', '2017-08-30 05:58:17'),
(19, 'My picture/resume isn\'t showing up on my profile page. What do I do?', 'Email us at <a href=\"mailto:info@strawhat-auditions.com\">info@strawhat-auditions.com</a> and \r\n                      resubmit the electronic file. Remember: photos must be .jpg files and resumes must be \r\n                      one-page .pdf files. <b>NOTE:</b> Your name and StrawHat ID number must appear in the \r\n                      subject line of your email.', 'Members', '2017-08-30 05:59:09', '2017-08-30 05:59:09'),
(20, 'How do I make corrections to my OnLine profile?', '<p>On the home page, click on Performers and in the next screen you will \r\nsee a menu item called Change Actor Application. Follow the prompts to \r\naccess your page. You can update your page as often as you like, BUT be \r\naware that we use your originally submitted application print out for \r\nthe audition selection process. <br></p>', 'Members', '2017-08-30 05:59:54', '2017-08-30 05:59:54'),
(21, 'How do I replace my picture/resume on line?', '<p>Email us at <a href=\"mailto:info@strawhat-auditions.com\">info@strawhat-auditions.com</a> and \r\n                      submit the new electronic file. Remember: photos must be .jpg files and resumes must be \r\n                      one-page .pdf files. The subject line of your email should read: Last Name, First Name, \r\n                      ID Number, REPLACEMENT PHOTO (or resume).<br></p>', 'Members', '2017-08-30 06:00:51', '2017-08-30 06:00:51'),
(22, 'Is StrawHat First Come, First Served? How do you choose performers for the auditions?', 'We have a selection process to insure that theatre and casting \r\nrepresentatives are seeing the best group of candidates possible. Click <a href=\"http://localhost/strawhart/public/pdf/criteria.pdf\">HERE</a> for Selection Criteria.', 'Selection', '2017-08-30 06:01:45', '2017-08-30 06:01:45'),
(23, 'How long does it take for me to find out if I get an audition?', 'We do or very best to make a determination on all applications within 4 \r\nweeks of activating registration. However, sometimes there are delays, \r\nusually due to mail volume. Apply early for faster processing.', 'Selection', '2017-08-30 06:02:25', '2017-08-30 06:02:25'),
(24, 'How do I find out my audition day and time?', 'When you are scheduled for an appointment, we email you a notice and \r\nmail you a confirmation sheet with all the pertinent information using \r\nthe second self-addressed stamped envelope you provided. We also post an\r\n alphabetical list of scheduled actors in the Members Area of the web \r\nsite once the schedule is set. You can use this list to confirm your \r\nappointment day and time.', 'Selection', '2017-08-30 06:03:10', '2017-08-30 06:03:10'),
(25, 'Can I change my scheduled audition time?', 'Email us at <a href=\"mailto:info@strawhat-auditions.com\">info@strawhat-auditions.com</a> Provide <b><i>both</i></b> your scheduled day and time and the day you would like to change to. <b><i>IF</i></b> we can accommodate you, we will email you the new details. There is a $25 \r\n                      service fee for appointment changes.', 'Audition', '2017-08-30 06:03:58', '2017-08-30 06:03:58'),
(26, 'How do I cancel my audition?', 'To cancel your audition, simply email us with your name, ID number and \r\naudition day and time. We will confirm receipt of your cancellation by \r\nemail.', 'Audition', '2017-08-30 06:04:50', '2017-08-30 06:04:50'),
(27, 'I have to cancel. Can I give my appointment to a friend?', '<b>No</b>. All actors that get an audition are pre-screened. Your \r\naudition time is yours alone and cannot be transferred to another actor.', 'Audition', '2017-08-30 06:05:38', '2017-08-30 06:05:38'),
(28, 'I have to cancel. Can I get a refund?', 'If you are not selected to audition, we return your fee, but if you are \r\nscheduled for an appointment and choose not to attend, there are no \r\nrefunds.', 'Audition', '2017-08-30 06:06:17', '2017-08-30 06:06:17'),
(29, 'How do Standby\'s work? Can I walk in or stand by on the day of the audition without an appointment?', 'For details on Stand-By auditions, please refer to the Application \r\nQuestion What are the different types of auditions? in the first section\r\n of these FAQs. There are no walk-ins at StrawHat – all auditioning \r\nactors are selected in advance.', 'Audition', '2017-08-30 06:07:01', '2017-08-30 06:07:01'),
(30, 'How long is the audition day?', '<p>First audition is at 10:00 am every morning, and general auditions end \r\nat 6:00. After that is the dance teaching and dance call, then \r\nindividual theatre callbacks can run as late as 11:00 pm. On the last \r\nday of the event only, Dancers Who Sing learn their dance call at 1:00 \r\npm, then their auditions start at 2:00 pm for the hour. <br></p>', 'Audition', '2017-08-30 06:07:39', '2017-08-30 06:07:39'),
(31, 'Do I have to be there for the whole weekend?', 'Nope! Your whole audition is completed in a single day. If you get a lot\r\n of callbacks, it’s a really long day, but it’s all done in a single \r\nday.', 'Audition', '2017-08-30 06:08:18', '2017-08-30 06:08:18'),
(32, 'If I drive, can I park near the auditions?', '<p>If you are from out of town and you have to drive, okay. But if you can \r\navoid it, do. The auditions are easy to get to by subway, 10 minutes \r\nfrom Mid-town, and city driving is a hassle. If you do drive, we \r\nrecommend parking in a garage, but be sure to confirm their operating \r\nhours, since our nights can go pretty late <br></p>', 'Audition', '2017-08-30 06:08:56', '2017-08-30 06:08:56'),
(33, 'How do I contact StrawHat during the week of the auditions? I lost my directions or have some other emergency!', 'If you need to reach us the week of the auditions, please use our email address <a href=\"mailto:info@strawhat-auditions.com\">info@strawhat-auditions.com</a>. <i>Please <b>do not</b> contact Pace University for information about auditions or \r\n                      accommodations. </i>', 'Audition', '2017-08-30 06:09:43', '2017-08-30 06:09:43'),
(34, 'Why shouldn\'t we wear black?', 'We suggest you wear clothes that have some color and show you to your best advantage. For details on full audition preparation, visit Final Prep for Auditioning Actors in the Articles section of the Members Area.', 'Audition', '2017-08-30 06:10:55', '2017-08-30 06:10:55'),
(35, 'How do we time your audition?', '<p>We time your audition from the first word of your monologue or the first\r\n note of the piano, but you should time your entire presentation \r\n(introduction and pieces) to take under 90 seconds. Visit I Got an \r\nAudition Now What in the Articles section of the Members Area. <br></p>', 'Audition', '2017-08-30 06:11:47', '2017-08-30 06:11:47'),
(36, 'Why a list of what NOT to do?', 'Many of the songs and monologues cited on the Dreaded List (visit the \r\nArticles section of the Members Area) are so popular that lots of people\r\n do them. The same day, sometimes the same hour. Choosing over-used \r\nmaterial puts you at a disadvantage. Take the opportunity to do a little\r\n research and come up with material that will be your own. But, we \r\nSTRONGLY recommend you stay away from obscene or graphic material. We \r\npromise you, it’s a turn-off.', 'Audition', '2017-08-30 06:12:28', '2017-08-30 06:12:28'),
(37, 'Can I sing two songs instead of doing a song and monologue?', 'The jury is out on this, as it affects the reaction of some casting reps and not others. Click <a href=\"http://localhost/strawhart/public/pdf/two_songs.pdf\">HERE for the official StrawHat stance.</a>', 'Audition', '2017-08-30 06:13:18', '2017-08-30 06:13:18'),
(38, 'Should I do a Shakespeare monologue?', 'Are you trained in classical theatre? If you are auditioning with two \r\ncontrasting monologues, you can choose to contrast with \r\nclassic/contemporary or with comedy/drama. It’s up to you to select \r\npieces that show you at your best. For musical theatre auditions, you \r\ncan do Shakespeare for your speech but it may be more appropriate for \r\nyou to do a speech from a contemporary play – chances are that companies\r\n doing musicals are more likely to have a Neil Simon play in their \r\nseason rather than Hamlet.', 'Audition', '2017-08-30 06:14:04', '2017-08-30 06:14:04'),
(39, 'Who are the StrawHat accompanists?', 'Our accompanists are professional accompanist/vocal coach/musical \r\ndirectors who specialize in musical theatre. You are in good hands, as \r\nlong as you come ready to communicate and with your music prepared as \r\nsuggested in our preparation advice.', 'Audition', '2017-08-30 06:14:42', '2017-08-30 06:14:42'),
(40, 'Can I bring my own accompanist?', 'Of course! But save yourself any anxiety and be sure he/she has \r\ndirections, arrives on time to meet you (meaning well ahead of your \r\nscheduled appointment time) and stays with you through the audition. You\r\n have enough to think about without worrying if your accompanist is \r\ngoing to show up.', 'Audition', '2017-08-30 06:15:26', '2017-08-30 06:15:26'),
(41, 'A thought to make you feel good', '<b>If you received an audition time,</b> you were accepted from over a \r\nthousand other applications. You\'ll audition for a whole lot of \r\ntheaters, make new theater contacts, be called back and perhaps get a \r\njob, all in one day! StrawHat is an event that attracts lots of theater \r\nproducers, directors, casting directors, etc. – and sometimes even a few\r\n who are not formally registered. Every one of us watching the auditions\r\n is eager to discover exciting new talent for the upcoming season. Have a\r\n great audition – we’re glad to have you with us!', 'Audition', '2017-08-30 06:16:06', '2017-08-30 06:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` int(10) UNSIGNED NOT NULL,
  `membership_period_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `membership_period_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2017-08-21 03:29:49', '2017-08-21 03:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `membership_periods`
--

CREATE TABLE `membership_periods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membership_periods`
--

INSERT INTO `membership_periods` (`id`, `name`, `price`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Plan 1', 20.00, '2017-08-01', '2018-08-12', 1, '2017-08-18 04:45:29', '2017-08-18 05:16:25'),
(2, 'Plan 2', 50.00, '2017-08-24', '2018-02-28', 1, '2017-08-18 05:16:14', '2017-08-18 05:16:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(36, '2014_10_12_000000_create_users_table', 1),
(37, '2017_06_15_080356_create_actors_table', 1),
(38, '2017_07_21_132605_create_faqs_table', 1),
(39, '2017_07_26_070347_create_slideshows_table', 1),
(40, '2017_07_26_072609_create_slides_table', 1),
(41, '2017_07_28_100856_create_content_pages_table', 1),
(42, '2017_08_03_114630_create_subscriptions_table', 1),
(46, '2017_08_08_100349_create_products_table', 2),
(47, '2017_08_08_135034_create_user_products_table', 3),
(51, '2017_08_18_065337_create_membership_periods_table', 4),
(53, '2017_08_18_125347_create_memberships_table', 5),
(54, '2017_08_18_130816_create_payments_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `membership_period_id` int(10) UNSIGNED DEFAULT NULL,
  `price` double(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `transaction_id`, `product_id`, `membership_period_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'tok_1AtBI7I8rOjHEKoJokRTBGyp', NULL, 2, 50.00, '2017-08-21 03:29:49', '2017-08-21 03:29:49'),
(2, 1, 'tok_1AtBI7I8rOjHEKoJokRTBGyp', 4, NULL, 30.00, '2017-08-21 03:29:49', '2017-08-21 03:29:49'),
(3, 1, 'tok_1AtBI7I8rOjHEKoJokRTBGyp', 3, NULL, 30.00, '2017-08-21 03:29:49', '2017-08-21 03:29:49'),
(4, 1, 'tok_1AtBgRI8rOjHEKoJfWZ9opUW', 4, NULL, 30.00, '2017-08-21 03:55:48', '2017-08-21 03:55:48'),
(5, 1, 'tok_1AtBgRI8rOjHEKoJfWZ9opUW', 3, NULL, 30.00, '2017-08-21 03:55:49', '2017-08-21 03:55:49'),
(6, 1, 'tok_1AwpM0I8rOjHEKoJ03n29B2l', 3, NULL, 30.00, '2017-08-31 04:52:55', '2017-08-31 04:52:55'),
(7, 1, 'tok_1AwpaII8rOjHEKoJ61AOzOL8', 4, NULL, 30.00, '2017-08-31 05:07:40', '2017-08-31 05:07:40'),
(8, 1, 'tok_1AwpaII8rOjHEKoJ61AOzOL8', 3, NULL, 30.00, '2017-08-31 05:07:40', '2017-08-31 05:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Test Product 1', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\"><span>&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span><br></p>', 30, 1, '2017-08-08 07:47:33', '2017-08-08 07:47:33'),
(4, 'Test Product 2', '<ul style=\"outline: 0px; margin-top: 10px !important; margin-bottom: 10px !important; padding-left: 30px !important; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; color: rgb(0, 0, 0); font-family: Tahoma, Geneva, sans-serif; font-size: 12.09px; text-align: start; background-color: rgb(255, 255, 255);\"><li style=\"outline: 0px; text-align: left; margin-top: 0px !important; list-style-type: disc;\">Private Callback Room<ul style=\"outline: 0px; margin-top: 0px !important; margin-bottom: 10px !important; padding-left: 30px !important;\"><li style=\"outline: 0px; text-align: left; margin-top: 5px !important; margin-bottom: 5px !important; line-height: 1.1 !important; list-style-type: disc;\">Must specify day-time or evening use, OR all-day access (all day is double the cost)</li></ul></li><li style=\"outline: 0px; text-align: left; list-style-type: disc;\">Electric keyboard rental for callback room</li><li style=\"outline: 0px; text-align: left; list-style-type: disc;\">Additional set(s) of printed audition directories (indicate numbers of sets/per set pricing)</li><li style=\"outline: 0px; text-align: left; margin-bottom: 10px !important; list-style-type: disc;\">Audition DVDs (all three days of audition clips, including dance calls)</li></ul><p><br></p>', 30, 1, '2017-08-08 07:48:52', '2017-08-08 07:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `slideshow_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `path` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `slideshow_id`, `title`, `description`, `path`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, NULL, 'assets/slides/slideshow_2_1502866983.png', '2017-08-16 02:03:03', '2017-08-16 02:03:03'),
(2, 2, NULL, NULL, 'assets/slides/slideshow_2_1502867010.jpg', '2017-08-16 02:03:30', '2017-08-16 02:03:30'),
(3, 2, NULL, NULL, 'assets/slides/slideshow_2_1502867033.jpg', '2017-08-16 02:03:53', '2017-08-16 02:03:53'),
(4, 3, 'this title also updated', 'Description also updated', 'assets/slides/slideshow_3_1502867203.jpg', '2017-08-16 02:06:43', '2017-08-22 06:25:02'),
(5, 3, 'Some Test Title', 'here goes some description for the slide.', 'assets/slides/slideshow_5_1503401063.jpg', '2017-08-16 02:07:06', '2017-08-22 06:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `slideshows`
--

CREATE TABLE `slideshows` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slideshows`
--

INSERT INTO `slideshows` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Younger', 2, '2017-08-16 02:02:17', '2017-08-16 02:02:17'),
(3, 'Contact', 2, '2017-08-16 02:06:21', '2017-08-16 02:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `status`, `payment_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'actor', 'actor@actor.com', '$2y$10$IiJUkma1u1OYXfP6G/RPa.hkKb7UmPqqPGnMbceY47FYzIGsV.fJW', 'actor', NULL, NULL, NULL, NULL, 1, 0, 'ZrnwcAAToGgKtrtkM8p9dCIRP5EvfB7WsYAt6FgBZ1TGpHOEJh6HZiC8cCdU', '2017-08-08 05:06:50', '2017-08-08 07:54:34'),
(2, 'staff', 'staff@staff.com', '$2y$10$yX8BdOUGDljSfwing67RdeP5OtrNKqpp52/GsAwtxaaEQHAEI91i.', 'staff', NULL, NULL, NULL, NULL, 1, 0, NULL, '2017-08-08 05:06:50', '2017-08-08 05:06:50'),
(3, 'theater', 'theater@theater.com', '$2y$10$nWmTu1gLK7/C.6zechXnH.Tq6wxYPBOHpfeW1CPg1VnV1YKFnGyS2', 'theater', NULL, NULL, NULL, NULL, 1, 0, NULL, '2017-08-08 05:06:50', '2017-08-08 05:06:50'),
(4, 'Administrator', 'admin@admin.com', '$2y$10$kvrfmfsxtHqXdu0Z0NKUf.8iqJloPy3wiGK.QZefW/5EetIDdvLaG', 'admin', NULL, NULL, NULL, NULL, 1, 0, 'UVwV7ORRFHQk82CO4GC8JyJxl3KIsRsNExEHGx3RZ2IyyGAzHHv1UMyirDAF', '2017-08-08 05:06:50', '2017-08-08 05:06:50'),
(5, 'Dr. Lamar Ratke Sr.', 'schmeler.jaylon@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'sMbbIDGpvG', '2017-08-08 05:06:50', '2017-08-08 05:06:50'),
(6, 'Mona Goyette DDS', 'ezekiel.morissette@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'NiV3qU9PoF', '2017-08-08 05:06:50', '2017-08-08 05:06:50'),
(7, 'Jorge Schimmel', 'hattie.balistreri@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'LZ0L6LYhGo', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(8, 'Shayne Marquardt', 'corkery.frances@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'MxohsQEp2A', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(9, 'Krystel Lowe', 'mzemlak@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'QGPhhecDhy', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(10, 'Dr. Jed Johnston', 'little.skye@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'FUrjNiIZxx', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(11, 'Euna Senger', 'claudine.dickens@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'RpfjOXSDPO', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(12, 'Jodie Parker', 'novella28@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'A2j60Oh0fn', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(13, 'Dr. Billie Lowe DVM', 'everette.champlin@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'i40QOTWrWS', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(14, 'Lera Kuhic', 'russel.darron@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'o6JTx5uh6n', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(15, 'Rowan Kihn', 'ransom.hauck@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'VjCU3H1zyo', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(16, 'Dr. Deborah Konopelski', 'stephany.keebler@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'BgpZyutU3t', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(17, 'Marlon Windler', 'otilia.russel@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'z2Gaj2Wo4t', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(18, 'Sonny Friesen Jr.', 'kerdman@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'EIj9P4vwcs', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(19, 'Monty Runte', 'kveum@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'KGX9zKXsT3', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(20, 'Mr. Emmett Walker', 'emory98@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'aQWMISlz7N', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(21, 'Edwina Kertzmann', 'epurdy@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'ZNiQS4zglg', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(22, 'Ms. Novella Braun V', 'jarrell83@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'yTGGy3GnqD', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(23, 'Prof. Providenci Cartwright', 'ericka.huel@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'KNDQHtLNkM', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(24, 'Dana Boehm', 'mohammad99@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'vh7GcOpVSj', '2017-08-08 05:06:51', '2017-08-08 05:06:51'),
(25, 'Arnaldo Glover', 'maud88@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'hB6b1RP0ir', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(26, 'Triston Boyer', 'vlabadie@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, '3l4f5XYmPp', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(27, 'Mr. Jordi Hintz III', 'labadie.wilhelm@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'D6OOb0pHjV', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(28, 'Taylor Jerde', 'ebert.maurine@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'uAJLOI92SY', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(29, 'Rex Pollich', 'maggie67@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'Crrhyb6yOG', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(30, 'Camilla White', 'mccullough.kelley@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'VQD5V1O02b', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(31, 'Teagan Moen', 'martin58@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'XsTwb9we0h', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(32, 'Mr. Joan Veum V', 'leila.becker@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, '0EjsXdH9uX', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(33, 'Myrna Muller', 'edwardo.goyette@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'I0pMAQIqBT', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(34, 'Miss Mafalda Shields', 'shanna27@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'zW2CkjAYfI', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(35, 'Ray Barton', 'hermiston.keshaun@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'kuIJUXvOyA', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(36, 'Allene Durgan', 'khills@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, '5qzUnEYT9R', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(37, 'Coleman Dietrich', 'lucious.reilly@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'KftsN8e865', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(38, 'Joanne Simonis', 'jerrold.rohan@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'v2Zrry7TfF', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(39, 'Ara Marvin', 'hsanford@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'okgvwidRdA', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(40, 'Ludie Veum', 'breinger@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'hvrlO241ny', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(41, 'Emelie Kertzmann', 'clemmie.beahan@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, '21loTIfL0W', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(42, 'Prof. Skylar Kris', 'witting.janiya@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'hQHEi35dkl', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(43, 'Sanford Macejkovic', 'celestine46@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'yckWQKO2sQ', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(44, 'Yolanda Heaney', 'anne74@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'WoAGh0buL3', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(45, 'Waldo Becker', 'jovan.hermann@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'TX15hYbyca', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(46, 'Rolando Hodkiewicz', 'bahringer.lizzie@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'O3SH8LCufZ', '2017-08-08 05:06:52', '2017-08-08 05:06:52'),
(47, 'Prof. Ciara McKenzie', 'jarrett21@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'FHG0rCDneH', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(48, 'Miss Jenifer Gerlach III', 'nienow.enrico@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'dISi7fhfEg', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(49, 'Miss Caroline Donnelly', 'aracely.lang@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'LUyRcYrThV', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(50, 'Diamond Schmitt', 'wnikolaus@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'mm2rB9RZKr', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(51, 'Jaden Dare', 'dcartwright@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'H4oftiFKwv', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(52, 'Dr. Brandi Kessler', 'karina33@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'WMaNs7Yeas', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(53, 'Avis Hilpert', 'sabina.gusikowski@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'AB7imqzn9E', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(54, 'Juvenal Aufderhar', 'neal.little@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, '8zwIr6q6co', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(55, 'Chanelle Lueilwitz', 'brown.gertrude@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, '6ECrUaPOIM', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(56, 'Dr. Maximilian Dooley III', 'collins.ruthe@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'JSP0kx5X2M', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(57, 'Ephraim Lesch', 'maribel.murazik@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'Lrf32RtdLu', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(58, 'Doug Prosacco', 'luciano87@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'DGowJgDbE9', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(59, 'Marianna Kilback', 'iwiegand@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'JqE37GIljy', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(60, 'Dr. Hazel Satterfield I', 'ymccullough@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'nSrwHznYke', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(61, 'Jairo Deckow', 'anya14@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'mLrPpjxPUR', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(62, 'Armani Wisozk', 'jcrist@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'NPP0DK6aa2', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(63, 'Name Dickinson', 'olemke@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'DTGlvS4zl3', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(64, 'Miracle Rodriguez', 'cormier.jaqueline@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, '71RwgyRmxA', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(65, 'Meggie Bahringer', 'cory.beer@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'mLYCMzN57P', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(66, 'Sandrine Barrows V', 'ivy75@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'g2IydbwFDG', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(67, 'Mr. Kaley Koelpin MD', 'bella.runolfsdottir@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'AOBdukL5Ge', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(68, 'Trey Stanton', 'ardith80@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'OQFup02EA1', '2017-08-08 05:06:53', '2017-08-08 05:06:53'),
(69, 'Elmore Beer', 'clifton59@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'cXKoVaAdTd', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(70, 'Prof. Lavada Bahringer', 'freda93@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'MU7TybZycF', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(71, 'Kelvin Renner', 'janae73@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'Uod4ZSU0qY', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(72, 'Milan Simonis', 'rskiles@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'kfXX1jveTV', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(73, 'Reyna Stanton', 'verda93@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'g8GOOlGHb6', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(74, 'Ceasar Schowalter', 'rohan.tia@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'BBQKUkaMNQ', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(75, 'Mr. Cary Hoppe III', 'karlee.wunsch@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'GFaUld4yPl', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(76, 'Annie Nitzsche', 'lang.sarai@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'kqeL8YUHaP', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(77, 'Julia Rippin', 'ecasper@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'kiyiUjD9tk', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(78, 'Jamel Gusikowski', 'dhickle@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'WQ2vs1hzdL', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(79, 'Morton Reinger', 'nichole53@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'FBcZrn7Zlh', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(80, 'Thea Waters', 'stanton.ivah@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'sM2ALzqqzs', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(81, 'Alexandro Abshire', 'jhodkiewicz@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'vw9TcKFXiG', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(82, 'Ms. Karina Dicki', 'pagac.angel@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'HckJDDvYNN', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(83, 'Amir Wiegand', 'aufderhar.bernita@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'oqPRawSYbP', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(84, 'Prof. Friedrich Hane Sr.', 'bednar.enrico@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'y9nmwZJxXB', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(85, 'Prof. Kyla Watsica III', 'gbergnaum@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, '7wAil0gR5W', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(86, 'Johanna Bednar', 'vherman@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'mBHeGczyMs', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(87, 'Dr. Raul Zulauf', 'mayert.shanna@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'DUOBnh1mcY', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(88, 'Toy Bosco', 'hilbert38@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'KHtdjzN8RI', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(89, 'Orval Brekke', 'dschneider@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'k1OzayeP7N', '2017-08-08 05:06:54', '2017-08-08 05:06:54'),
(90, 'Ms. Andreanne Bashirian DDS', 'harris.gust@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'zUzhNMztAY', '2017-08-08 05:06:55', '2017-08-08 05:06:55'),
(91, 'Cassandre Kerluke', 'hobart51@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, '64J5W7YQQB', '2017-08-08 05:06:55', '2017-08-08 05:06:55'),
(92, 'Louvenia Hintz', 'vincent.krajcik@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'HPRgWTheaL', '2017-08-08 05:06:55', '2017-08-08 05:06:55'),
(93, 'Tyshawn Crist', 'fermin51@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, '075WFBKgdI', '2017-08-08 05:06:55', '2017-08-08 05:06:55'),
(94, 'Rosalia Smith', 'hollie.tromp@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'xXzJ5R24ML', '2017-08-08 05:06:55', '2017-08-08 05:06:55'),
(95, 'Mr. Abdul Kuhlman II', 'orn.oral@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'BWG5Xygko7', '2017-08-08 05:06:55', '2017-08-08 05:06:55'),
(96, 'Jeffery Gusikowski', 'clemmie.koss@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'AcuGE7bcGe', '2017-08-08 05:06:55', '2017-08-08 05:06:55'),
(97, 'Coty Roob', 'bertram.douglas@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'QM7jbQhJCf', '2017-08-08 05:06:55', '2017-08-08 05:06:55'),
(98, 'Helga Beahan', 'dedrick.bartoletti@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'f6Ajq2L7zJ', '2017-08-08 05:06:55', '2017-08-08 05:06:55'),
(99, 'Alba Rogahn', 'timmy93@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'IBlk5Hq6Wb', '2017-08-08 05:06:55', '2017-08-08 05:06:55'),
(100, 'Maryse Kessler', 'kale.morar@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'VEJ4NrHSZ5', '2017-08-08 05:06:55', '2017-08-08 05:06:55'),
(101, 'Hellen Barrows', 'lueilwitz.corene@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'Rcw5cRenMb', '2017-08-08 05:06:55', '2017-08-08 05:06:55'),
(102, 'Rylan Murray', 'lulu99@example.net', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'W1vb5Fqk9o', '2017-08-08 05:06:55', '2017-08-08 05:06:55'),
(103, 'Priscilla Paucek', 'dale.reichel@example.com', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, '8TbhBN29Cu', '2017-08-08 05:06:55', '2017-08-08 05:06:55'),
(104, 'Ms. Adella Parker MD', 'rwisoky@example.org', '$2y$10$jl5fDFfYKkrIvH0wGU6RJORevUI6iTDJYMf2rYmrv.z3/4NEOW2.C', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'jf7u26KKRp', '2017-08-08 05:06:55', '2017-08-08 05:06:55'),
(105, 'Fredrick Muller Sr.', 'kuhic.willis@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '8fmAibXt2R', '2017-08-08 05:09:06', '2017-08-08 05:09:06'),
(106, 'Gudrun Hagenes', 'nathaniel33@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'EFh1eFnRXb', '2017-08-08 05:09:06', '2017-08-08 05:09:06'),
(107, 'Franco Maggio', 'westley.marquardt@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'Vhddcqg09R', '2017-08-08 05:09:06', '2017-08-08 05:09:06'),
(108, 'Dr. Jasper Dickinson', 'gregorio.price@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '2mLOyD2ply', '2017-08-08 05:09:06', '2017-08-08 05:09:06'),
(109, 'Nedra O\'Reilly', 'ktorphy@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'y7PoaIHNON', '2017-08-08 05:09:06', '2017-08-08 05:09:06'),
(110, 'Alvera Morar', 'queenie48@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'oBXfSHsKbh', '2017-08-08 05:09:06', '2017-08-08 05:09:06'),
(111, 'Mr. Van Schmeler MD', 'toy.mozelle@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'hdtt3SZV4K', '2017-08-08 05:09:06', '2017-08-08 05:09:06'),
(112, 'Terrill Greenfelder', 'dbernhard@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'CO6MC1pXJD', '2017-08-08 05:09:06', '2017-08-08 05:09:06'),
(113, 'Mrs. Ena Bode', 'krystel.murphy@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'LkJnfcrHmd', '2017-08-08 05:09:06', '2017-08-08 05:09:06'),
(114, 'Mr. Ladarius Lehner IV', 'mathilde.flatley@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'Pbr6CQS5M9', '2017-08-08 05:09:06', '2017-08-08 05:09:06'),
(115, 'Barton Stokes', 'qherman@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'dCruwosrOz', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(116, 'Mr. Sigurd Hansen DDS', 'ugibson@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'IIgrh0h0tx', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(117, 'Mr. Anibal Parisian', 'hirthe.hailey@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'yEbqlo3GJO', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(118, 'Francisca Mohr MD', 'leanna.waters@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '9i5phwTL06', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(119, 'Prof. Marcel Hodkiewicz II', 'brian43@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '35CASmez6w', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(120, 'Maida Dibbert', 'klein.jesse@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'UQtfqcBeUP', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(121, 'Leonardo Oberbrunner I', 'orn.brady@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'QCLy8FXXJX', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(122, 'Dr. Mathew Hackett DVM', 'rowe.allen@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'UroQdFHuAp', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(123, 'Prof. Kathlyn Schimmel III', 'mafalda.kessler@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'NMLM7CE1rC', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(124, 'Dr. Braxton Barrows IV', 'susie.durgan@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'Fyssvqmf9u', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(125, 'Kavon Stracke', 'alexanne23@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'dwCtLmuNly', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(126, 'Uriah O\'Conner', 'chyna95@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '2GdBKPvZLW', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(127, 'Annalise Carroll', 'bernhard.devonte@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'ra0OCOFb8v', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(128, 'Rachel Crooks', 'mjast@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'pM2mW50U27', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(129, 'Deondre Kihn IV', 'august.nienow@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '7Gidmopqzr', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(130, 'Dr. Hollis Corkery', 'dhintz@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '5bXJX0MWmm', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(131, 'Dr. Daniela Marks', 'schaden.calista@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '7mrfFpLBxI', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(132, 'Mrs. Augustine Gaylord Jr.', 'toni85@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '6UCwKcjW3p', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(133, 'Miss Alena Harber IV', 'asipes@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'H0mxUr4H7X', '2017-08-08 05:09:07', '2017-08-08 05:09:07'),
(134, 'Mr. Kiley Kuphal V', 'toconner@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'HFjTpvrDKP', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(135, 'Julio Stanton', 'ngusikowski@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '3RKdaXQx32', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(136, 'Madison Littel', 'virgil.oreilly@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'jn7PSgkZNP', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(137, 'Mr. Benton Eichmann', 'ward.jovany@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'frHqLDhTIU', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(138, 'Minerva Shanahan', 'king.stokes@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'JLcLymSEKc', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(139, 'Cornell Toy', 'parker.kelton@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'BgesE7z3ze', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(140, 'Paige Will', 'sgusikowski@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'uBElaeuz1S', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(141, 'Miss Jadyn Satterfield MD', 'dturner@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'uLPq1HSjjk', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(142, 'Bradly Kirlin', 'ipredovic@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'jKrUOos5Pl', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(143, 'Howell Veum', 'michale18@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'ILeAMsbQ7v', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(144, 'Mr. Branson Tromp', 'elna.wisoky@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '65ZH2mRyWo', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(145, 'Dr. Deontae Abbott IV', 'robyn34@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'DWb1uzVuh6', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(146, 'Madeline Harris', 'gardner29@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'bj56M8nbiZ', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(147, 'Nannie Daugherty', 'kbergstrom@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'jh4yxnMRCW', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(148, 'Dannie Kunde', 'lance.toy@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'YH3nJpMpje', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(149, 'Brycen Macejkovic', 'sritchie@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '7QuZwMNcef', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(150, 'Prof. Sidney Skiles', 'coreilly@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '7AyXrXf13t', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(151, 'Alice Schuster', 'moore.esmeralda@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'XTkxQp1enP', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(152, 'Mr. Ulises Tromp', 'kiarra29@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'hgVDozUArm', '2017-08-08 05:09:08', '2017-08-08 05:09:08'),
(153, 'Casper Yost', 'grant.cindy@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'PLagg4OIIQ', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(154, 'Stanley Rowe MD', 'roosevelt.bailey@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'bWxYA1Hequ', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(155, 'Cindy Walter', 'runolfsson.alana@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'g07oxEpoaf', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(156, 'Miss Yoshiko Skiles', 'buster.mclaughlin@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'fXjeQo1SJt', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(157, 'Octavia Williamson', 'eldon46@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'w3HQfZIxDm', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(158, 'Eulalia Mueller', 'fredrick.cruickshank@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'x1KmRtNbja', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(159, 'Dr. Armani Farrell III', 'osinski.sincere@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'xu9Cb3F3BT', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(160, 'Leila Grady', 'scrona@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'Kw2mnvpnDp', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(161, 'Dr. Ben Hansen', 'verlie99@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'Ricoe133lI', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(162, 'Steve Halvorson', 'kessler.vesta@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'KcSZmpOoiL', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(163, 'Candida Lindgren II', 'lurline23@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '3kdd52VVeE', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(164, 'Orland Kreiger', 'rrempel@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '1WGN5JA9pj', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(165, 'Malika Collins', 'sammy34@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'u9TvhwhXku', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(166, 'Demario Bernier', 'marvin.megane@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '5FK76IU5aE', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(167, 'Rosanna Langworth', 'ruecker.timothy@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'RYVcqXif0D', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(168, 'Victor Bashirian', 'marley.haag@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'khfe5zsyba', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(169, 'Eveline McLaughlin DDS', 'dibbert.melisa@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'ye9hEnVWYt', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(170, 'Dahlia Schultz', 'carole63@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '6wNSxsEIV9', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(171, 'Leilani Grimes MD', 'sigmund12@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'OKNuVyVmhl', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(172, 'Anabel Walter', 'rae.torphy@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'QwIqyhTLdT', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(173, 'Brain Heathcote', 'yasmeen31@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'hLu8R6AgpE', '2017-08-08 05:09:09', '2017-08-08 05:09:09'),
(174, 'Crawford Hoeger', 'robel.timmothy@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'x6Z4KaqEEq', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(175, 'Dallas Hudson PhD', 'quitzon.caroline@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'cC3iwMdw8J', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(176, 'Darion Schulist', 'chet29@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'L2AVOngwTm', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(177, 'Josue Hessel', 'robin93@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'mKx2tq1OXl', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(178, 'Sydney Kub', 'goodwin.roy@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'vk3bgPVtqi', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(179, 'Ms. Madie Brekke', 'powlowski.brady@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'Y6R33Vh8eX', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(180, 'Dr. Sonny Kling', 'genesis.okon@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'sALnVfToeo', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(181, 'Juliana Friesen', 'euna.langworth@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'PHoKYwBiGe', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(182, 'Annabel Keebler', 'ftremblay@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'PTYy4Zm7X0', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(183, 'Ms. Dina Doyle', 'kerluke.lauryn@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'sGVSBKSrP0', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(184, 'Shayne Vandervort III', 'evan.boyer@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '5ZYzozu8PT', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(185, 'Dr. Zelda Stanton', 'ulegros@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'BzUGlUVJTY', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(186, 'Quinton Auer III', 'gwen75@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'dnhseIFOyX', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(187, 'Tristian Von', 'marley36@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'B4a5qitX9a', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(188, 'Laverna Streich', 'smayert@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '7gfbJexteD', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(189, 'Mr. Raoul Schmitt', 'vvon@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'pNZVG6MX85', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(190, 'Bernadine Stark', 'geoffrey.reynolds@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, '6I6hlaVGiw', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(191, 'Dr. Brenna Skiles Sr.', 'owolf@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'IwzcwvZs6W', '2017-08-08 05:09:10', '2017-08-08 05:09:10'),
(192, 'Mrs. Mae Schamberger V', 'kboyle@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'ifX71Tu5Yk', '2017-08-08 05:09:11', '2017-08-08 05:09:11'),
(193, 'Winston Beatty', 'krice@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'sJWQsoZqQw', '2017-08-08 05:09:11', '2017-08-08 05:09:11'),
(194, 'Maynard Block', 'abdiel.prohaska@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'u3ELFLmMQI', '2017-08-08 05:09:11', '2017-08-08 05:09:11'),
(195, 'Prof. Ansley Windler PhD', 'scormier@example.org', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'bgKt0GqiyB', '2017-08-08 05:09:11', '2017-08-08 05:09:11'),
(196, 'Jeanne Skiles', 'dmills@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'Js7Ww6QFsK', '2017-08-08 05:09:11', '2017-08-08 05:09:11'),
(197, 'Sarah Schuster', 'dicki.randy@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'pAFD0ltSW9', '2017-08-08 05:09:11', '2017-08-08 05:09:11'),
(198, 'Donnie Runte', 'jkirlin@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'NPXoPXDz3p', '2017-08-08 05:09:11', '2017-08-08 05:09:11'),
(199, 'Katrine Champlin', 'erussel@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'zyLKZTVooW', '2017-08-08 05:09:11', '2017-08-08 05:09:11'),
(200, 'Jaren Pfannerstill', 'charlotte41@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'Mj8gSbgTvN', '2017-08-08 05:09:11', '2017-08-08 05:09:11'),
(201, 'Lindsey Kulas', 'alphonso86@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'QPARnsvRX1', '2017-08-08 05:09:11', '2017-08-08 05:09:11'),
(202, 'Shanie Grant', 'dane61@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'ZhxqE2Rex6', '2017-08-08 05:09:11', '2017-08-08 05:09:11'),
(203, 'Easter Carroll', 'vluettgen@example.net', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'fRY9TNMNCz', '2017-08-08 05:09:11', '2017-08-08 05:09:11'),
(204, 'Cary Eichmann', 'eva92@example.com', '$2y$10$MzJNONJSyGhY1q8bfsMswO33FB7EahzHX8g9709pjG4RiJtfSC5uK', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'm033RVyktv', '2017-08-08 05:09:11', '2017-08-08 05:09:11'),
(205, 'Yasir Test', 'yasir@yopmail.com', '$2y$10$1SV93MSg674VSyJvoBRxUeLfwNHbhPU8r/ZSzOWtuk5FiyA43eFSK', 'actor', NULL, NULL, NULL, NULL, 1, 0, 'mNLLgik2w7iDMKxjmdKzt7g3ATCdz1gEyHGbvtVNTdcaotBcTOd8cOfVWEai', '2017-08-31 05:34:49', '2017-08-31 05:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_products`
--

CREATE TABLE `user_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actors_user_id_foreign` (`user_id`);

--
-- Indexes for table `content_pages`
--
ALTER TABLE `content_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_pages_slideshow_id_foreign` (`slideshow_id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memberships_membership_period_id_foreign` (`membership_period_id`),
  ADD KEY `memberships_user_id_foreign` (`user_id`);

--
-- Indexes for table `membership_periods`
--
ALTER TABLE `membership_periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_user_id_foreign` (`user_id`),
  ADD KEY `payments_product_id_foreign` (`product_id`),
  ADD KEY `payments_membership_period_id_foreign` (`membership_period_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slides_slideshow_id_foreign` (`slideshow_id`);

--
-- Indexes for table `slideshows`
--
ALTER TABLE `slideshows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_products`
--
ALTER TABLE `user_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `content_pages`
--
ALTER TABLE `content_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `membership_periods`
--
ALTER TABLE `membership_periods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `slideshows`
--
ALTER TABLE `slideshows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
--
-- AUTO_INCREMENT for table `user_products`
--
ALTER TABLE `user_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `actors`
--
ALTER TABLE `actors`
  ADD CONSTRAINT `actors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `content_pages`
--
ALTER TABLE `content_pages`
  ADD CONSTRAINT `content_pages_slideshow_id_foreign` FOREIGN KEY (`slideshow_id`) REFERENCES `slideshows` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `memberships`
--
ALTER TABLE `memberships`
  ADD CONSTRAINT `memberships_membership_period_id_foreign` FOREIGN KEY (`membership_period_id`) REFERENCES `membership_periods` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `memberships_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_membership_period_id_foreign` FOREIGN KEY (`membership_period_id`) REFERENCES `membership_periods` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `payments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slides`
--
ALTER TABLE `slides`
  ADD CONSTRAINT `slides_slideshow_id_foreign` FOREIGN KEY (`slideshow_id`) REFERENCES `slideshows` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
