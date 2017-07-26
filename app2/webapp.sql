-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2017 at 03:20 PM
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
  `first_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feet` int(11) NOT NULL,
  `inch` int(11) NOT NULL,
  `hair` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `eyes` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` int(11) NOT NULL,
  `school` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` date NOT NULL,
  `to` date NOT NULL,
  `auditionType` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vocalRange` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jobType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `technical` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ethnicity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instrument` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `misc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_path` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precrop_path` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `precrop_url` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume_path` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Magnam at consequatur ratione aliquid aspernatur blanditiis facilis eligendi.', 'Omnis in quo tenetur voluptatum qui error perferendis. Officiis culpa numquam et dolores dolor sint officiis. Possimus qui nam culpa cupiditate. Qui nihil magni qui repudiandae adipisci sed.', 'Audition', '2017-07-26 07:34:54', '2017-07-26 07:34:54'),
(2, 'Voluptas molestias nihil quos itaque vel fugit.', 'Minima sit modi ex. Enim esse velit ut iste.', 'Members', '2017-07-26 07:34:54', '2017-07-26 07:34:54'),
(3, 'Quisquam et dolore mollitia recusandae.', 'Ut officia at inventore repellendus est delectus aut. Ut voluptatem fuga odio non aut itaque quod culpa.', 'Members', '2017-07-26 07:34:54', '2017-07-26 07:34:54'),
(4, 'Repellat corrupti ducimus quidem eum dolorum numquam.', 'Et assumenda rerum numquam suscipit qui officia. Et aut eveniet dolores omnis officiis harum. Et temporibus perspiciatis id aut at qui. Maxime nihil aut omnis iure illo.', 'Audition', '2017-07-26 07:34:54', '2017-07-26 07:34:54'),
(5, 'Quia harum error voluptas dolor.', 'Corporis sed ullam et consequuntur consequatur consequatur. Doloribus necessitatibus earum doloremque.', 'Application', '2017-07-26 07:34:54', '2017-07-26 07:34:54'),
(6, 'Reprehenderit quidem voluptas non soluta recusandae.', 'Perspiciatis blanditiis aut et sed eos. Eum animi perspiciatis et labore accusamus. Eum autem libero hic. Exercitationem dolor quasi distinctio eveniet corrupti quia.', 'Selection', '2017-07-26 07:34:54', '2017-07-26 07:34:54'),
(7, 'Amet maxime labore impedit accusantium.', 'Distinctio dolores dolorum atque assumenda cumque. Consectetur vitae necessitatibus voluptate magnam quidem quasi sit. Quos quaerat qui exercitationem aliquam possimus. Vel voluptatum corrupti quasi dicta nostrum possimus dolor.', 'Selection', '2017-07-26 07:34:54', '2017-07-26 07:34:54'),
(8, 'Aliquid temporibus dicta iusto velit consequuntur facere soluta.', 'Sunt vel natus iste ratione repudiandae accusantium voluptatem. Accusantium at fuga impedit hic hic. Molestiae totam tempora ipsa culpa perspiciatis est. Adipisci est aut facilis molestiae. Laudantium nisi asperiores delectus provident minima.', 'Audition', '2017-07-26 07:34:54', '2017-07-26 07:34:54'),
(9, 'Iusto sint tempora sint maxime consequuntur reiciendis.', 'Est et omnis ex. Ipsum ut optio nam ut totam. Odit aperiam aperiam voluptates aut vel et. Hic itaque facilis provident fugiat numquam eum beatae.', 'Audition', '2017-07-26 07:34:54', '2017-07-26 07:34:54'),
(10, 'Vel distinctio illo nam eius deleniti.', 'Sed ut voluptatum pariatur cum sunt fugiat. Qui molestiae sit adipisci accusantium. Odit ut occaecati id rem delectus voluptatem. Et harum aut ut ratione.', 'Audition', '2017-07-26 07:34:54', '2017-07-26 07:34:54'),
(11, 'Et amet sunt nam sint omnis placeat.', 'Voluptatem officia praesentium quisquam expedita pariatur dolorem officia. Alias fugiat voluptas beatae expedita. Error ex temporibus repudiandae quis voluptatem quos. Libero aut sint perspiciatis ipsum ipsa est molestiae.', 'Audition', '2017-07-26 07:34:54', '2017-07-26 07:34:54'),
(12, 'Perferendis omnis repellat harum doloribus.', 'Qui porro aspernatur minus fugit. Quidem cumque voluptatem laboriosam. Aut sequi iusto soluta quo recusandae natus unde.', 'Application', '2017-07-26 07:34:54', '2017-07-26 07:34:54'),
(13, 'Aut quia fugiat cum ut voluptatem voluptatem natus.', 'Autem debitis alias et ut voluptatem atque rerum. Error maiores voluptates placeat provident doloremque a. Culpa culpa ipsa dolorem tempore ratione reprehenderit et. Inventore aut odio aut aut est accusamus iusto placeat.', 'Selection', '2017-07-26 07:34:55', '2017-07-26 07:34:55'),
(14, 'Error necessitatibus voluptatem labore non eaque repellat aut.', 'Voluptatum voluptatum iste omnis sed quia voluptate autem. Quam id ad sit inventore modi animi dolorum. Amet exercitationem consequatur sed velit aut quidem. Quod et pariatur fugiat quos. Vel optio nisi occaecati minima quia maiores consequatur.', 'Application', '2017-07-26 07:34:55', '2017-07-26 07:34:55'),
(15, 'Molestiae ab non ipsam sint.', 'Assumenda et voluptatem vel nihil. Natus quia eum illo velit atque consequatur rerum. Nemo velit illo magnam et odit quia occaecati.', 'Selection', '2017-07-26 07:34:55', '2017-07-26 07:34:55'),
(16, 'Fuga cum ut suscipit quod nisi unde.', 'Non sunt architecto laudantium alias eligendi minus. Ullam ut quae aut possimus ut impedit. Tenetur autem sequi libero. Enim perferendis laboriosam ut.', 'Selection', '2017-07-26 07:34:55', '2017-07-26 07:34:55'),
(17, 'Ut dolores harum error mollitia.', 'Et omnis libero sunt ipsum non enim sed in. Dignissimos omnis voluptas quasi iusto. In iste excepturi asperiores corrupti adipisci quia officiis.', 'Application', '2017-07-26 07:34:55', '2017-07-26 07:34:55'),
(18, 'Alias deserunt eum voluptas voluptate fugit aperiam dolorem.', 'Distinctio et voluptate id id sed dolores dolor. Laudantium voluptate itaque vel veritatis ut. Et omnis beatae reprehenderit excepturi.', 'Audition', '2017-07-26 07:34:55', '2017-07-26 07:34:55'),
(19, 'Est fugit consequatur accusamus quia tenetur aperiam excepturi necessitatibus.', 'Porro maxime minus dicta aut qui iste. Eos officia alias eaque sint tempore voluptas hic. Dignissimos minima placeat et hic quia qui fuga.', 'Selection', '2017-07-26 07:34:55', '2017-07-26 07:34:55'),
(20, 'Temporibus placeat provident esse id.', 'Dolores quibusdam quis est. Quo nihil ratione qui labore. Pariatur rerum molestias ut sint expedita quas assumenda molestias. Quas doloremque aliquid incidunt provident. Sed sint maiores aliquid tempore enim qui laboriosam.', 'Selection', '2017-07-26 07:34:55', '2017-07-26 07:34:55'),
(21, 'Pariatur et doloremque consequuntur quam rerum quas.', 'Asperiores aut cumque vel non nesciunt eaque consequatur architecto. Aliquam aut minus ipsa earum doloribus unde. Possimus illo eos voluptatum architecto. Ut nihil consequatur aliquam maxime eos voluptates iste.', 'Audition', '2017-07-26 07:34:55', '2017-07-26 07:34:55'),
(22, 'Eligendi quam sunt consequuntur aut maxime.', 'A illo est nihil est sapiente porro. Est ipsa est ea libero. Aperiam possimus fugit ratione nam autem voluptatum iste.', 'Audition', '2017-07-26 07:34:55', '2017-07-26 07:34:55'),
(23, 'Qui dignissimos consequatur reiciendis consequatur fugit.', 'Et ut sed est. Quaerat repellat voluptas et aut dolores illum. Molestiae expedita molestiae enim. Sit voluptatibus cum labore praesentium ut esse et cupiditate.', 'Audition', '2017-07-26 07:34:55', '2017-07-26 07:34:55'),
(24, 'Iusto vel sunt iste tempore.', 'Voluptatem et assumenda doloribus omnis. Sit in rerum aspernatur omnis accusamus quaerat beatae sed. Iure ullam veniam praesentium et voluptatibus sint. Perferendis delectus tempora ipsum consectetur dignissimos distinctio molestias. Eum nulla corrupti doloribus.', 'Selection', '2017-07-26 07:34:55', '2017-07-26 07:34:55'),
(25, 'Ullam necessitatibus ut enim hic aut.', 'Neque dolorem non ea illo modi voluptas. Sunt architecto voluptas debitis molestias. Eum id eos modi facilis possimus aut deleniti ea.', 'Members', '2017-07-26 07:34:55', '2017-07-26 07:34:55'),
(26, 'Et aut iure dolores nisi autem earum dicta minima.', 'Exercitationem esse modi provident. Quia vel natus quo dignissimos sit recusandae maiores. Consequatur impedit sit inventore. Asperiores sint et non omnis expedita omnis. Ut possimus hic ratione.', 'Application', '2017-07-26 07:34:55', '2017-07-26 07:34:55'),
(27, 'Odit officiis perspiciatis praesentium dolorum et sint dicta.', 'Mollitia provident laudantium assumenda suscipit similique tempore et qui. Doloremque voluptas suscipit est veniam nisi quia. Magnam excepturi aut pariatur voluptas tempore sit quibusdam. Debitis qui rerum dolorem voluptas assumenda.', 'Selection', '2017-07-26 07:34:55', '2017-07-26 07:34:55'),
(28, 'Magni aut quae itaque ducimus.', 'Aut modi ea eos voluptatem velit reprehenderit est. Quia distinctio eum impedit enim et. Cum consequuntur provident delectus. Autem doloremque ipsam et ut cumque doloribus accusamus.', 'Members', '2017-07-26 07:34:55', '2017-07-26 07:34:55'),
(29, 'Aut sint commodi magnam nihil nostrum.', 'Animi laudantium cupiditate error sed. Vel facere asperiores provident hic amet ut non. Aut itaque quia voluptatem sed sunt omnis temporibus.', 'Application', '2017-07-26 07:34:55', '2017-07-26 07:34:55'),
(30, 'Voluptates iste et qui sit.', 'Repellendus consequatur et nam pariatur. Eum quasi cumque beatae quis voluptatibus. Quam eum sit quas aut. Aut molestiae mollitia vitae ut aut cupiditate quasi.', 'Audition', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(31, 'Iste iste et voluptatum voluptas.', 'Consequatur quia fugit quibusdam consequatur fugit distinctio consectetur. Iure dolores suscipit laboriosam. Blanditiis eaque aut qui perspiciatis et aliquid quia reprehenderit. Voluptas est tenetur dolor eum et. Qui culpa at officiis voluptas.', 'Audition', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(32, 'Cum amet alias quidem consequuntur.', 'Corrupti aut dignissimos quas rerum rerum ipsam sequi. Est aut nemo perferendis ut aut et impedit. Eum impedit voluptate autem nobis molestias.', 'Application', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(33, 'Perferendis perferendis omnis velit asperiores.', 'Amet veritatis possimus iste aut rerum quod cupiditate. Consequatur et dolore ut laboriosam consequuntur voluptatem. Et quod iure facilis ut.', 'Audition', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(34, 'Sit sint nobis ullam nobis id ullam.', 'Recusandae et necessitatibus beatae sed ut eos illo. Accusamus eveniet provident id recusandae occaecati debitis quas. Dignissimos sit id nihil expedita aspernatur aperiam. Eos sequi tempore necessitatibus qui.', 'Application', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(35, 'Nihil quaerat culpa minima molestiae.', 'Perspiciatis expedita maiores omnis quis. Necessitatibus modi a sed totam libero accusamus. Non sed distinctio neque ut quod. Natus dolores minima porro dolorum eius.', 'Audition', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(36, 'Esse non eaque et.', 'Harum dicta iste quo sint incidunt. Maiores et molestias perspiciatis. Architecto in qui quaerat perferendis consectetur quos voluptatem quod.', 'Selection', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(37, 'Sit non incidunt cum natus distinctio.', 'Et quam corporis quia quas. Debitis qui laborum aut omnis eos. Autem natus ut consectetur quibusdam officia esse. Illum explicabo qui praesentium illum consequatur natus eligendi.', 'Members', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(38, 'Quod dolor totam ullam rerum.', 'Dolore quia rerum minus ut vel laboriosam accusantium. Iure amet quo omnis quia odio. Placeat est qui laborum id architecto id et amet. Ut voluptatem qui et enim mollitia unde.', 'Application', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(39, 'Suscipit distinctio fuga voluptatibus est exercitationem.', 'Eum dolores quia ut sit vel consequatur. Et perspiciatis eum dolor sit enim ea rerum odio. Labore natus optio modi iste ipsa.', 'Application', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(40, 'Consequatur natus qui perspiciatis alias fugit.', 'Eius aut cumque non amet. Quae consequatur hic rerum eius porro. Sit et dignissimos asperiores accusantium numquam. Hic voluptatum pariatur cumque quis aut.', 'Selection', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(41, 'Voluptatem ut minima numquam et aut.', 'Dolorem cum expedita et eaque modi earum. Dolorum repellat est quaerat eos a vero.', 'Application', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(42, 'Et quasi qui omnis aliquam.', 'Voluptate sapiente reiciendis repellendus dolorum eaque ipsa dolorem quae. Minima in fugit optio odit tenetur rerum. Maxime possimus in sint delectus impedit aperiam.', 'Selection', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(43, 'Possimus quia quos atque dolor ut porro nostrum.', 'Qui quibusdam amet velit tempore consequatur beatae assumenda quas. Sunt eligendi nobis ab esse. Ipsa ut vel soluta quisquam explicabo ut.', 'Application', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(44, 'In beatae est optio rerum ad.', 'Ex ut eos maxime minima. Sapiente eum consequatur voluptate corporis ut ut laboriosam ullam. Veritatis corrupti et fuga est mollitia quo.', 'Audition', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(45, 'Saepe aspernatur unde autem commodi nihil repellat occaecati dignissimos.', 'Omnis libero qui voluptates rerum praesentium enim. Fuga asperiores quia aut et quae magnam. Cupiditate omnis quaerat corrupti neque maiores reprehenderit. Quia voluptatem nisi cumque rerum molestias qui.', 'Audition', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(46, 'Aliquam sit rem ut vel.', 'Repellat dolorum deserunt unde error odio. Voluptatem ducimus autem illo. Autem asperiores iure voluptas fuga. Ea eum culpa error unde incidunt aut iste ut.', 'Members', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(47, 'Repellat tenetur aut porro voluptas.', 'Praesentium et soluta dolore ab laudantium repellendus tempore sit. Sed consequatur soluta consequatur dolores sint qui. Placeat sit ipsam blanditiis. Perferendis blanditiis vitae est omnis commodi. Impedit laudantium deleniti voluptates assumenda.', 'Application', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(48, 'Sit ipsam consequuntur iste.', 'Quo commodi et ut. Rerum ratione earum harum dolorem neque in consequatur inventore. Laboriosam ab iste veritatis molestiae doloremque esse quis vero. Numquam praesentium nostrum porro molestias expedita corrupti eos. In hic rerum iusto perferendis officia ex.', 'Application', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(49, 'Voluptatem ipsum nihil dolor dignissimos distinctio sit deserunt.', 'Tenetur voluptates deserunt eveniet id nam dolore dolores. Quibusdam et exercitationem ut cumque. Vel sit soluta quos odit delectus.', 'Selection', '2017-07-26 07:34:56', '2017-07-26 07:34:56'),
(50, 'Voluptatibus aliquam quas consectetur explicabo quam est.', 'Tempore amet quos reiciendis harum ratione dolorem. Rem non aperiam consequatur suscipit aliquam molestias asperiores ut. Magni aut sit sit.', 'Members', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(51, 'Vero possimus voluptas earum dolor non.', 'Rem veritatis optio quas ut. Itaque incidunt architecto accusantium. Voluptatibus ipsam voluptas fugit eaque tempore.', 'Audition', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(52, 'Veritatis quasi omnis pariatur quam porro ut officiis.', 'Ut perspiciatis labore pariatur delectus. Qui excepturi repellendus sequi est sed nobis blanditiis.', 'Selection', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(53, 'Corporis et voluptatibus qui sint quasi saepe.', 'Quisquam cum ut expedita enim. Id voluptatem officiis laboriosam non quaerat. Dolorem et non occaecati iste saepe tenetur. Nostrum perferendis magni a.', 'Selection', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(54, 'Eum voluptatem voluptates unde sapiente unde enim nihil quaerat.', 'A esse libero repellat iure numquam non fugiat. Ipsa nemo est amet praesentium qui voluptas.', 'Audition', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(55, 'Voluptatem unde sit et esse rerum omnis.', 'Consectetur commodi laboriosam molestias quia. Quas ipsa in rerum deleniti. Saepe veritatis sed accusantium quibusdam.', 'Members', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(56, 'Vero debitis cupiditate omnis veniam natus.', 'Saepe eos voluptate qui aut velit quia a. Maxime qui et magnam. Fugit sunt unde laudantium itaque nam. Sequi doloribus quisquam aut repellat earum et reiciendis.', 'Members', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(57, 'Sed et ut ullam sunt possimus consequatur.', 'Voluptas non non quam dolorem. Fugit sit autem qui fuga totam beatae velit. Nostrum reiciendis quisquam totam dolorem dolores rem. Ut ut ex quis ut non.', 'Members', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(58, 'Quis aut adipisci consequatur accusantium aut autem officiis.', 'Aut qui a et. Quo id amet consectetur. Voluptatum beatae possimus ea vitae minima. Et quas natus atque quam. Quasi consectetur in eos facere sint.', 'Members', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(59, 'Facilis modi atque quas esse exercitationem maiores.', 'Sit magnam nam reiciendis quibusdam illo fugiat eos maxime. Soluta fugiat hic omnis aut labore. Dolor excepturi nesciunt enim.', 'Members', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(60, 'Facilis sed et sequi maxime qui similique qui.', 'Alias accusantium illum aut ipsam alias illo vitae. Ipsam nostrum consequatur ut consequatur debitis ratione. Laboriosam id architecto provident adipisci qui commodi. Laborum officia nihil repellat.', 'Audition', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(61, 'Possimus illo ad fugiat.', 'Veritatis quo et neque sed sint quia. Qui dicta et iusto sint reprehenderit. Ratione non nisi et. Aut consequatur atque aut dolorum illum et eum nulla. Ut qui soluta soluta vel corrupti.', 'Application', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(62, 'Cum eos pariatur sit reprehenderit.', 'Vel incidunt enim aliquam tempora. Voluptatem sint et magnam voluptatum sed quia vel. Minus blanditiis corrupti totam nobis aut sit nisi libero. Omnis asperiores occaecati accusamus consequuntur.', 'Application', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(63, 'Quia magnam enim pariatur numquam.', 'Molestiae et mollitia iure non. Qui ea fuga ad consequatur qui. Consequatur est rerum numquam laudantium quo quas et.', 'Audition', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(64, 'Ut aut fugiat non praesentium ex ex.', 'Dignissimos et et ullam ut sequi harum. Non et autem minima voluptatum sit maxime. Perspiciatis accusamus omnis rerum ex velit perspiciatis eius.', 'Application', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(65, 'Fugit itaque ipsam voluptas cum quis atque quae.', 'Est facilis est excepturi earum. Quibusdam optio culpa ut quod. Qui quis reprehenderit dolore molestiae. Omnis dolorem sed mollitia dolores vitae.', 'Audition', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(66, 'Doloremque est ut in aut accusantium.', 'Ratione vero facere consequatur illum et doloribus aliquid. Recusandae tempora minima qui ab eaque fugiat. Officia magnam cum placeat eos et corrupti. Nihil voluptatem numquam omnis similique. Necessitatibus nihil tempora voluptate optio cum impedit optio.', 'Audition', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(67, 'Nisi odio consequatur aut natus ipsam.', 'Minus sed molestiae ut reiciendis dicta et excepturi. Ducimus quibusdam aut hic nihil voluptatem autem.', 'Selection', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(68, 'Praesentium numquam recusandae labore aut sed dolorum eos.', 'Similique aut alias quo aut. Aut soluta impedit dolorem libero ipsa adipisci sit. Accusantium voluptates est in debitis.', 'Application', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(69, 'Voluptates recusandae id fugit temporibus possimus.', 'Sapiente id deleniti cum et minus error inventore. Eos facilis excepturi et. Pariatur et tenetur consectetur consequatur autem neque. Vel fugit temporibus alias repudiandae.', 'Members', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(70, 'Nemo dolores magnam consequatur non earum quis sunt corrupti.', 'Voluptas illum est est aut et et corrupti. Eos beatae veritatis beatae quas. Et eum facilis cum quae atque sint. Provident laboriosam inventore et magnam.', 'Application', '2017-07-26 07:34:57', '2017-07-26 07:34:57'),
(71, 'Accusantium qui quo et perferendis est nisi.', 'Magnam provident voluptatem cupiditate numquam. Voluptatem est libero quia occaecati iure vel eaque. Accusamus et molestias tempore qui qui. Dignissimos quidem quis vero tempore.', 'Members', '2017-07-26 07:34:58', '2017-07-26 07:34:58'),
(72, 'Ut magni quia sit id aspernatur.', 'Nihil non in eaque in unde veritatis. Consectetur inventore eaque quis neque. Nisi reprehenderit sunt ex ut earum eos.', 'Members', '2017-07-26 07:34:58', '2017-07-26 07:34:58'),
(73, 'Quia sit commodi inventore laboriosam voluptates quaerat aspernatur.', 'Nihil at iusto quidem necessitatibus mollitia nemo quod. Sint atque aliquid sit eveniet nihil voluptas a. Tempore voluptas dolor sunt unde.', 'Audition', '2017-07-26 07:34:58', '2017-07-26 07:34:58'),
(74, 'Qui eveniet et et sunt aut eos.', 'Ratione reprehenderit quidem exercitationem porro et cupiditate explicabo. Omnis iusto qui laborum iusto et voluptas aut. Sunt quisquam aut corporis fuga esse dolorem. Voluptatem quo rem reiciendis et consequuntur. Et asperiores sed facere voluptatem in natus.', 'Selection', '2017-07-26 07:34:58', '2017-07-26 07:34:58'),
(75, 'Sed repellat cupiditate voluptas qui veniam et expedita.', 'Harum eius voluptate iure atque. Ducimus neque itaque recusandae totam sed id. Minima et sunt magni id animi.', 'Application', '2017-07-26 07:34:58', '2017-07-26 07:34:58'),
(76, 'Voluptas eos cupiditate dolorem natus necessitatibus.', 'Vitae officiis iusto quas modi laudantium. Voluptatem fugiat minus iusto facilis. Enim optio sed odio quia velit distinctio.', 'Audition', '2017-07-26 07:34:58', '2017-07-26 07:34:58'),
(77, 'Ullam unde sunt a.', 'Omnis et sapiente itaque dolorem non. Officia sit reiciendis adipisci rerum quia eum esse maxime. Et dolorem occaecati ullam. Aut rerum veniam ut.', 'Application', '2017-07-26 07:34:58', '2017-07-26 07:34:58'),
(78, 'Quasi est veritatis odit ut excepturi.', 'Consequuntur ea sit explicabo cupiditate. Sapiente sed deserunt totam quia.', 'Selection', '2017-07-26 07:34:58', '2017-07-26 07:34:58'),
(79, 'Expedita est et deleniti quaerat quas impedit.', 'Quibusdam iure ipsam illo odit. Recusandae sunt quis quasi ea. Iusto et eligendi eius officia autem consequuntur. Quae eius omnis quisquam.', 'Members', '2017-07-26 07:34:58', '2017-07-26 07:34:58'),
(80, 'Natus nemo sit eveniet.', 'Atque ducimus nemo quibusdam eum corporis quia laudantium. Dicta error necessitatibus iste eveniet eveniet. Nihil maiores consequatur excepturi ut officia. Libero quisquam corrupti sit assumenda.', 'Application', '2017-07-26 07:34:58', '2017-07-26 07:34:58'),
(81, 'Incidunt quia vel sequi aut provident.', 'Adipisci sint consequatur deserunt ut modi eum. Natus voluptates quo quam. Velit esse dolor adipisci non doloremque sit dolor. Voluptatem placeat et ab ipsum quod voluptatem dolores tempora.', 'Members', '2017-07-26 07:34:58', '2017-07-26 07:34:58'),
(82, 'Non iure dolorem quam sunt.', 'Ipsam recusandae quasi eos ut qui consequatur. Hic sed fugit et dicta.', 'Application', '2017-07-26 07:34:58', '2017-07-26 07:34:58'),
(83, 'Voluptas saepe facere inventore voluptatem quasi quis.', 'Tempora laboriosam est ratione laudantium et placeat vero. Blanditiis libero sit voluptas nihil ea. Alias totam quod voluptatem voluptas. Error eius ea commodi.', 'Application', '2017-07-26 07:34:58', '2017-07-26 07:34:58'),
(84, 'Et explicabo deserunt ut veniam.', 'Sed et sunt libero molestiae. Consequatur rerum eos eum rem. In labore et est distinctio reiciendis sint voluptatem.', 'Audition', '2017-07-26 07:34:58', '2017-07-26 07:34:58'),
(85, 'Maxime molestiae maiores non asperiores alias quidem.', 'Tempora impedit accusantium explicabo aut quasi consequuntur. Reiciendis dolores sed nostrum aliquam. Beatae id est eveniet voluptas. Eos reprehenderit voluptatibus quibusdam voluptatum dignissimos.', 'Members', '2017-07-26 07:34:59', '2017-07-26 07:34:59'),
(86, 'Sapiente dolorum delectus iusto perspiciatis ipsam laborum natus.', 'Alias veritatis ex quidem. Tempora impedit et occaecati explicabo id sit. Sit quia voluptatem culpa sed. Quia quis reprehenderit ab.', 'Members', '2017-07-26 07:34:59', '2017-07-26 07:34:59'),
(87, 'Dolores consequatur aut voluptatem dolorem.', 'Earum rerum in non et delectus. Voluptates quo ducimus ad ratione. Sed molestiae aut vel iure occaecati est quia.', 'Selection', '2017-07-26 07:34:59', '2017-07-26 07:34:59'),
(88, 'Corrupti dolorem commodi non veritatis repellat totam non.', 'Qui qui magni vitae eum a. Officia et rem nostrum dignissimos ad ipsam. Et animi non ratione qui ea dolorem. Impedit laudantium optio architecto consectetur esse accusantium.', 'Selection', '2017-07-26 07:34:59', '2017-07-26 07:34:59'),
(89, 'Similique sit nihil autem suscipit beatae nobis.', 'A aut cum rem aperiam qui iusto. Et porro eveniet qui ut quam dolorum. Odit sunt deserunt ut quis est iste. Suscipit id voluptas nulla et eius voluptatem quis.', 'Selection', '2017-07-26 07:34:59', '2017-07-26 07:34:59'),
(90, 'Doloribus sed quis quibusdam qui veniam.', 'Cupiditate quis quis laudantium blanditiis accusantium veritatis. Ipsam totam atque culpa fugit amet.', 'Selection', '2017-07-26 07:34:59', '2017-07-26 07:34:59'),
(91, 'Recusandae sit voluptatibus voluptatem.', 'Voluptas id assumenda temporibus voluptatum fugit est autem. Nobis possimus debitis veniam qui. Et aliquam velit odit est consequatur voluptatum. Sint perferendis quis soluta.', 'Members', '2017-07-26 07:34:59', '2017-07-26 07:34:59'),
(92, 'Exercitationem ipsam consequatur consectetur excepturi expedita nulla accusantium.', 'Explicabo quo et voluptatum. Itaque sapiente impedit distinctio beatae quas perspiciatis. A consequuntur ratione quam suscipit error enim. In quis repellendus animi porro.', 'Members', '2017-07-26 07:34:59', '2017-07-26 07:34:59'),
(93, 'Rem dignissimos doloribus ullam.', 'Cum in delectus qui. Impedit nihil eum odit repudiandae tempora ipsum tempore. Aut sint quidem rem aut est.', 'Audition', '2017-07-26 07:34:59', '2017-07-26 07:34:59'),
(94, 'Accusantium veritatis et a id.', 'Autem alias in cupiditate cumque dignissimos aut. Asperiores reiciendis in saepe officiis dolores numquam voluptates. Et ipsa a voluptatem deserunt nulla. Eveniet est eos fugit est laboriosam fuga. Accusamus ipsum animi rem quia et itaque.', 'Members', '2017-07-26 07:34:59', '2017-07-26 07:34:59'),
(95, 'Et dolor non quis architecto id nostrum sunt.', 'Aspernatur praesentium in vel repellat. Tenetur vero accusantium commodi quam necessitatibus.', 'Application', '2017-07-26 07:34:59', '2017-07-26 07:34:59'),
(96, 'Perferendis nihil nulla sed rerum explicabo qui sint.', 'Nulla sit incidunt dolor eos. Similique dolor deserunt maxime sint quia rem. Molestiae aliquam animi ea laborum velit accusamus.', 'Selection', '2017-07-26 07:34:59', '2017-07-26 07:34:59'),
(97, 'Est tempore assumenda facilis quisquam quidem ut.', 'Porro eum amet tenetur qui consequatur saepe ipsam occaecati. Praesentium natus ab distinctio fuga. A qui corporis qui assumenda quis dignissimos pariatur.', 'Selection', '2017-07-26 07:34:59', '2017-07-26 07:34:59'),
(98, 'Qui recusandae enim nihil delectus.', 'Aut dignissimos quo unde. Quibusdam et delectus natus ducimus vel molestiae officiis. Natus illum doloribus molestiae sapiente. Expedita omnis dolore est.', 'Application', '2017-07-26 07:34:59', '2017-07-26 07:34:59'),
(99, 'Dolor dolores qui dicta natus velit qui explicabo.', 'Nobis ad unde tenetur beatae dolorem excepturi. Aut quia ut quas consequatur laboriosam. Voluptatem dignissimos aut similique. Dolor id est nesciunt ipsam autem recusandae.', 'Audition', '2017-07-26 07:34:59', '2017-07-26 07:34:59'),
(100, 'Est aut non nihil aut.', 'Facere debitis quae provident impedit non. Quia veniam ut iure nostrum et recusandae. Ipsum excepturi ex ut eum. Delectus aut vero temporibus sequi nam.', 'Members', '2017-07-26 07:34:59', '2017-07-26 07:34:59');

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
(18, '2014_10_12_000000_create_users_table', 1),
(19, '2017_06_15_080356_create_actors_table', 1),
(20, '2017_07_21_132605_create_faqs_table', 1),
(21, '2017_07_26_070347_create_slideshows_table', 1),
(22, '2017_07_26_072609_create_slides_table', 1);

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
(3, 1, 'Test Slide', 'Test Slide test description', 'slides/slideshow_1_1501072905.png', '2017-07-26 07:41:45', '2017-07-26 07:41:45');

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
(1, 'Home Slideshow', 1, '2017-07-26 07:35:50', '2017-07-26 07:35:50');

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
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `payment_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'actor', 'actor@actor.com', '$2y$10$wqF28Oxq2Rb8WaJsw27Bf.gAapkr4MNDnBe4QlHYCziWMgsUIZQW2', 'actor', 1, 0, NULL, '2017-07-26 07:34:14', '2017-07-26 07:34:14'),
(2, 'actor', 'staff@staff.com', '$2y$10$5WP07frQO09Nn3kA6qbDkuMKVVEZwhZjeSa2Fr9MOfrwO8BTpjXOG', 'staff', 1, 0, NULL, '2017-07-26 07:34:14', '2017-07-26 07:34:14'),
(3, 'theater', 'theater@theater.com', '$2y$10$9S3K0joOqb6RMl26yATHE.zGfjCYFUzV3n1gpVG2RNN/zj6oLJNCe', 'theater', 1, 0, NULL, '2017-07-26 07:34:14', '2017-07-26 07:34:14'),
(4, 'Administrator', 'admin@admin.com', '$2y$10$FkuoOUw.maa6agP5o.xMh.W86Vaa99KNvPtKjj52VtPSK22jOrbKO', 'admin', 1, 0, NULL, '2017-07-26 07:34:14', '2017-07-26 07:34:14'),
(5, 'Beryl Hills', 'brown.asha@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '39d2whLTaL', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(6, 'Elmore Bernhard', 'hartmann.ambrose@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'Ff2uLBcDVt', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(7, 'Constantin Padberg', 'murray.cora@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '93nHKtKR7d', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(8, 'Onie Hoppe', 'spinka.lisette@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'GTgyNeyCaC', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(9, 'Dr. Morgan Schumm', 'miller.joelle@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'cjDDMm12eT', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(10, 'Ms. Ashly Mayer V', 'remington77@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'YMqfDIizRw', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(11, 'Dr. Larue Mertz', 'chelsey.kulas@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'R4hkDZRPuR', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(12, 'Graciela Schaden', 'connie.deckow@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'fELx4iGNfL', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(13, 'Weldon Ferry', 'josiane56@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'WjVdlPDKZm', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(14, 'Dr. Rudy Greenfelder IV', 'syble23@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 's5l6rPPewN', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(15, 'Miss Evangeline Pagac Jr.', 'nico10@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'k32avYIaxZ', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(16, 'Roy Cremin MD', 'leonor.boyle@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '5bypOGf1oz', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(17, 'Prof. Domenica Jones', 'tanner98@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'OlyyQ45obj', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(18, 'Gaylord Wilderman', 'torp.lauretta@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '8IKCr3NexB', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(19, 'Dr. Terrill Kuphal DVM', 'wanda56@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'AnOlwTtYeF', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(20, 'Prof. Rosendo Daugherty II', 'littel.heath@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'WEyKuUXhQJ', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(21, 'Alene Romaguera', 'kstehr@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'znQwhy7rNE', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(22, 'Fay Lehner', 'vbernhard@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'U6GYr5hlbm', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(23, 'Ottilie Prohaska', 'nkoelpin@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '9amF5TZDFh', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(24, 'Nelle Schuster DDS', 'calista.paucek@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '5gYWCuQroY', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(25, 'Shea Harvey', 'eve.trantow@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'SmTXjTURKw', '2017-07-26 07:34:15', '2017-07-26 07:34:15'),
(26, 'Freeman Bosco Sr.', 'morar.jaiden@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'I5md4Q9w7m', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(27, 'Dr. Jaycee D\'Amore Sr.', 'aking@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'NgWNcUlEtN', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(28, 'Mr. Lorenza Stiedemann PhD', 'roel.hickle@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'ILoZlVm8cf', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(29, 'Jordane Mante', 'lewis.goodwin@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'JHz5msb2eB', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(30, 'Zoila Watsica', 'witting.adah@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'Gl9hi21QME', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(31, 'Cicero Smitham', 'camille38@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'ecW8LVWICn', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(32, 'Miss Abigail Dibbert', 'hmclaughlin@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'awqyQJc32P', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(33, 'Saul Effertz', 'macy43@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'BmsGjh4Fp3', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(34, 'Adelia Barrows III', 'gideon96@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'jz7GnK0mRJ', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(35, 'Tavares Toy', 'rwalker@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '1WiAedW3Mp', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(36, 'Mrs. Lina Feeney DVM', 'forrest.reynolds@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'HtREDaGgY0', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(37, 'Ms. Deborah Macejkovic', 'kwillms@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'NGddamWRtL', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(38, 'Mr. Monty Weber', 'hagenes.jesus@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'yuz7DSIVSl', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(39, 'Edythe Schmidt', 'abigayle08@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'JCKwsIvoDW', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(40, 'Cody Bahringer', 'jmante@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'Ba59FSxshp', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(41, 'Miss Brenna Ruecker IV', 'hudson.justina@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'MTaAuw9f1c', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(42, 'Ahmad Zulauf', 'corwin.chelsie@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'YmBq6NBT6q', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(43, 'Christ Mraz', 'kenyatta.conroy@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'AFIXQP9v0m', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(44, 'Dr. Talon Waters', 'schinner.lacey@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'dtrb5BZ0V3', '2017-07-26 07:34:16', '2017-07-26 07:34:16'),
(45, 'Dr. Mafalda Williamson', 'raymundo84@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'twjdmxSup3', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(46, 'Garret Crooks', 'mkunze@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '2iTcvcFa9h', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(47, 'Dr. Eldred Muller', 'ahintz@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'QNMScwFhvC', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(48, 'Josefina McKenzie', 'romaguera.laverna@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'nDh2wjae85', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(49, 'Dr. Daniela Dibbert', 'cmoen@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'bqQ9ewamPK', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(50, 'Prof. Dewitt Kuvalis', 'eokon@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'sgCLj3yebF', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(51, 'Delia Reilly', 'srosenbaum@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'UAysJqyxsx', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(52, 'Dr. Richie Schulist', 'levi10@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'OLk4hBDGQz', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(53, 'Adell Johnston', 'hortense99@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'DztdLrqWvd', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(54, 'Octavia O\'Conner', 'kutch.mandy@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'IBpWVEEXxp', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(55, 'Tiana Emmerich', 'krystina.orn@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'd8tBSk2qKn', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(56, 'Dr. Osvaldo Ernser', 'wharris@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'CrlDgKLWkd', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(57, 'Mr. Ahmed Jacobson PhD', 'dakota.breitenberg@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '4sA9MPYPjU', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(58, 'Easton Blick', 'maximo25@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '1UzvUoE2Fi', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(59, 'Jacinthe Hahn', 'kkuphal@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '0Xvyu0W1fZ', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(60, 'Alvis Nikolaus', 'river.abernathy@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '3oyRyAcsEX', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(61, 'Dr. Brandi Ortiz', 'lukas.connelly@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '7oQnDA06Wb', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(62, 'Miss Izabella Considine', 'huel.jaylin@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'GzdNMQsiOD', '2017-07-26 07:34:17', '2017-07-26 07:34:17'),
(63, 'Brant McDermott', 'zita51@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'VlbQzaUsk5', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(64, 'Forrest Konopelski', 'bechtelar.nellie@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'BFuveOpgQy', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(65, 'Eusebio DuBuque', 'karianne.romaguera@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'N70FR12srq', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(66, 'Elijah Hermiston', 'uzemlak@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '7iV2qHwcLW', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(67, 'Susana Sporer', 'fritsch.jaycee@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'BuPZjOmaR7', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(68, 'Dr. Danielle Treutel V', 'yoshiko.robel@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'FOvSMRLvet', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(69, 'Kari Cole III', 'vivien.kreiger@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'Rla0lYRomN', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(70, 'Miss Alysa Koss', 'jedidiah87@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'TfB1KBu5AM', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(71, 'Ray Weimann', 'hyman95@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'U2bD4DA7DK', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(72, 'Gerhard Von', 'felton78@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'kZHnaBZJeo', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(73, 'Reyna Kunde MD', 'brielle.davis@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'fRS4tZfDBR', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(74, 'Chaya Beahan', 'delpha.halvorson@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'bCtEojU20c', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(75, 'Ewald Glover', 'josefina.leuschke@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'g77xaHzSlw', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(76, 'Cornell Schultz', 'brigitte.raynor@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'j5nIRhvXIq', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(77, 'Daniela Collins', 'cartwright.roselyn@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'q0T7vNwsV9', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(78, 'Ole Pagac', 'amanda27@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'gQT8t6QRD5', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(79, 'Nels Kilback', 'heber.parisian@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'ndO21ETHbx', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(80, 'Johnpaul Stoltenberg', 'little.marjolaine@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'A7ZfvAeESo', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(81, 'Reyna Harber', 'samara64@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '5m4aLeWMpu', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(82, 'Herman Farrell', 'velma62@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'SrDAPGmM7b', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(83, 'Mr. Adolph Friesen', 'ncollier@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'TnCsZabPcr', '2017-07-26 07:34:18', '2017-07-26 07:34:18'),
(84, 'Trace Feil Jr.', 'ytorphy@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '6y4InMUeh7', '2017-07-26 07:34:19', '2017-07-26 07:34:19'),
(85, 'Franz Mosciski', 'raina49@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'l2Lpdwx2Vm', '2017-07-26 07:34:19', '2017-07-26 07:34:19'),
(86, 'Allan O\'Keefe', 'ashly.goyette@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'Nz4Mn0sb35', '2017-07-26 07:34:19', '2017-07-26 07:34:19'),
(87, 'Henderson Kihn', 'walter.ethyl@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'RMn8Ug27kq', '2017-07-26 07:34:19', '2017-07-26 07:34:19'),
(88, 'Carol Schmidt DVM', 'alindgren@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'KLxCxKUZTg', '2017-07-26 07:34:19', '2017-07-26 07:34:19'),
(89, 'Katelynn Ratke', 'carter.abe@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'ODVqWzH3Yf', '2017-07-26 07:34:19', '2017-07-26 07:34:19'),
(90, 'Georgiana Romaguera', 'greenfelder.eva@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'w8PtF99Bkz', '2017-07-26 07:34:19', '2017-07-26 07:34:19'),
(91, 'Chanel Eichmann DVM', 'mclaughlin.lonny@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'wzO00L9YHP', '2017-07-26 07:34:19', '2017-07-26 07:34:19'),
(92, 'Terrence Frami', 'balistreri.jaeden@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'zF1gehNpUR', '2017-07-26 07:34:19', '2017-07-26 07:34:19'),
(93, 'Prof. Juliet Swift PhD', 'mdavis@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'ZI02tTJyuW', '2017-07-26 07:34:19', '2017-07-26 07:34:19'),
(94, 'Prof. Shemar Haag', 'vgoldner@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'wf0WUvECfa', '2017-07-26 07:34:19', '2017-07-26 07:34:19'),
(95, 'Lois Kub IV', 'lemuel03@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '42Z46xB1l0', '2017-07-26 07:34:19', '2017-07-26 07:34:19'),
(96, 'Mrs. Mattie Kutch', 'demond.abshire@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '8kgOFlrSVK', '2017-07-26 07:34:19', '2017-07-26 07:34:19'),
(97, 'Grady Paucek', 'brakus.esther@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'EGjVUfXz8p', '2017-07-26 07:34:20', '2017-07-26 07:34:20'),
(98, 'Graham McLaughlin', 'heidenreich.verlie@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'FE5Cn273JX', '2017-07-26 07:34:20', '2017-07-26 07:34:20'),
(99, 'Kenna Weissnat', 'julie.lynch@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'KG9eewMk6s', '2017-07-26 07:34:20', '2017-07-26 07:34:20'),
(100, 'Aurelio Doyle', 'elton58@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'uu7LSNOyRM', '2017-07-26 07:34:20', '2017-07-26 07:34:20'),
(101, 'Kaitlyn Anderson', 'scarlett.simonis@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, '8HDqqJNR6M', '2017-07-26 07:34:20', '2017-07-26 07:34:20'),
(102, 'Chauncey Lindgren DDS', 'gregoria59@example.net', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'KKCIXzGS9y', '2017-07-26 07:34:20', '2017-07-26 07:34:20'),
(103, 'Miss Marcella Hamill', 'hermann.fidel@example.org', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'RZJcWbXbcu', '2017-07-26 07:34:20', '2017-07-26 07:34:20'),
(104, 'Astrid Ritchie', 'darien.windler@example.com', '$2y$10$K1CPBpg15ms9VbbKzaNsdezmhQHLfer4hhdr5M4sqSWFUg4aanDba', 'actor', 1, 1, 'T6PSq0y1Gy', '2017-07-26 07:34:20', '2017-07-26 07:34:20');

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
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `slideshows`
--
ALTER TABLE `slideshows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `actors`
--
ALTER TABLE `actors`
  ADD CONSTRAINT `actors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slides`
--
ALTER TABLE `slides`
  ADD CONSTRAINT `slides_slideshow_id_foreign` FOREIGN KEY (`slideshow_id`) REFERENCES `slideshows` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
