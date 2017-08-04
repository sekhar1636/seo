-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2017 at 05:27 PM
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
(1, 'Laudantium nemo distinctio deserunt.', 'Cum facilis laborum voluptatem velit. Corrupti autem et quod explicabo. Id unde molestiae perspiciatis.', 'Members', '2017-08-03 06:50:26', '2017-08-03 06:50:26'),
(2, 'Rem officia consequuntur neque aspernatur.', 'Eum delectus quia sunt recusandae rerum officiis quidem quo. Quas voluptates corporis voluptates. Et eaque earum et.', 'Audition', '2017-08-03 06:50:26', '2017-08-03 06:50:26'),
(3, 'Modi nemo et nulla ea neque.', 'Qui sit sint maiores quos consequatur. Vel maxime omnis ut doloremque nesciunt. Autem porro hic enim repellat commodi modi optio.', 'Selection', '2017-08-03 06:50:26', '2017-08-03 06:50:26'),
(4, 'Accusamus eligendi et eum similique.', 'Assumenda qui vitae fugiat qui porro. Iste dignissimos atque perspiciatis unde. Tenetur laborum molestias dolore quam ea. Quam autem deleniti sed molestiae modi assumenda magnam.', 'Selection', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(5, 'Nulla necessitatibus asperiores velit vero voluptatem.', 'Numquam enim cumque velit est ea assumenda molestiae. Et deserunt quam nisi provident. Repellendus quisquam recusandae est a et. Fugiat consequatur vitae ipsum id porro eveniet.', 'Application', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(6, 'Placeat quia reiciendis ab quaerat ipsam et aliquid.', 'Qui veniam voluptate praesentium est consequatur in non. Praesentium consectetur doloremque necessitatibus in delectus quis. Nesciunt ab ut iure voluptatum possimus commodi placeat.', 'Application', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(7, 'Minima non sit voluptatum.', 'Facere est nam et qui impedit vitae. Commodi beatae hic voluptatem hic.', 'Selection', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(8, 'Vero aperiam eligendi omnis adipisci.', 'Sapiente perspiciatis laboriosam nihil. Doloremque et accusamus hic voluptatem iure in nesciunt. Atque nostrum temporibus quod facere impedit.', 'Application', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(9, 'Quia dolor a unde quibusdam.', 'Amet quia ducimus aut explicabo beatae autem et. Illo quia sunt laboriosam aut eaque consequatur. Et iste harum qui voluptatem neque animi.', 'Audition', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(10, 'Et delectus ut sit architecto consectetur reprehenderit quo.', 'Nihil et voluptatum et reiciendis. Qui quo omnis nulla quis velit qui adipisci veniam. Ut commodi porro blanditiis quam voluptate numquam. Quo voluptatum officiis distinctio blanditiis minima.', 'Members', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(11, 'Recusandae enim accusamus ut iure consequatur.', 'Veritatis aut consequatur placeat ut quas. Sunt recusandae aut maiores officia sunt quia autem. Et eveniet est sed nihil rem. Inventore quia odio doloremque qui.', 'Application', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(12, 'Veniam qui ipsam ullam nulla.', 'Quasi debitis numquam deserunt qui voluptas et voluptatem. Rerum voluptatem suscipit quis et praesentium. Non omnis qui et consequatur. Sint dicta quibusdam quisquam velit.', 'Members', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(13, 'Excepturi consequatur ex modi et mollitia amet distinctio.', 'Impedit quos quis porro quo. Vero repudiandae saepe fugit et mollitia sunt repudiandae. Illum corporis quae aspernatur eaque quia architecto recusandae.', 'Members', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(14, 'Voluptas harum illo et vero ut nostrum delectus.', 'Laudantium non quasi id sit quod earum. Ipsam nihil ut qui. Dolorem non natus laborum amet ea ullam quam.', 'Application', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(15, 'Nobis exercitationem aut qui facere dolore est consequatur.', 'Quisquam sed ut quidem maiores excepturi sed qui. Non non fugiat eos non ut. Rerum quae et occaecati alias. Harum dolores iure qui molestiae fugiat velit assumenda. Labore nostrum neque sunt consequatur neque sed.', 'Members', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(16, 'Aut quae inventore deleniti architecto doloribus dolorem.', 'Consectetur qui exercitationem eum quae repudiandae. Et omnis sed a quis molestiae facere.', 'Selection', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(17, 'Cupiditate et non eos aspernatur.', 'Atque dolore ut dolores saepe earum voluptas ut. Porro recusandae ratione dicta velit et. Perspiciatis aut ut vitae rerum explicabo ut doloremque.', 'Application', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(18, 'Et sunt repellendus eveniet commodi consectetur natus deleniti est.', 'Et inventore itaque consequatur soluta totam totam esse iusto. Velit repellat aut ad consequatur distinctio. Occaecati repellendus praesentium est deserunt debitis.', 'Selection', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(19, 'Quia et occaecati sed harum tempora placeat.', 'Ab corrupti ut eius eum et odit. Ea vitae enim non ab modi. Eos non dolore sed.', 'Selection', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(20, 'Ut accusantium itaque hic repellat qui dolor.', 'Provident non tenetur voluptatem. Officia omnis excepturi recusandae voluptas animi. Ut et cum earum aut.', 'Audition', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(21, 'Ducimus aperiam cupiditate similique.', 'Pariatur voluptate quia velit voluptas maiores. Inventore repellendus animi laboriosam. Cumque quia voluptatem tenetur nisi.', 'Members', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(22, 'Distinctio ut quo commodi odit cum.', 'Rerum veniam minus adipisci sapiente vitae. Eos sed est consequatur sed nesciunt dolorem et. Quia iure dicta eum voluptatem nisi. Quo sint dolorum accusamus voluptate quia esse.', 'Members', '2017-08-03 06:50:27', '2017-08-03 06:50:27'),
(23, 'Quisquam odio dolorem commodi tempore.', 'Illo et ut omnis ex. Repellat quidem quos perferendis commodi nobis asperiores fugiat. Similique molestiae amet sint ea. Ea et voluptas eligendi eius itaque. Dolor aperiam nulla quos dolor porro molestias est.', 'Selection', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(24, 'Rerum commodi sed optio architecto suscipit rem.', 'Eligendi voluptatem consequuntur assumenda illo rerum eveniet magni. Eligendi occaecati reiciendis excepturi ea doloremque. Cum delectus sit voluptatem non.', 'Audition', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(25, 'Nulla mollitia illum et sunt.', 'Aut vel earum enim esse voluptate quia. Vel necessitatibus pariatur officia mollitia ex ut aspernatur. Temporibus odit voluptatum debitis. Sequi quia quod est qui culpa minus exercitationem assumenda.', 'Audition', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(26, 'Accusamus id saepe et voluptatem qui.', 'Rerum magni nihil veritatis dolor sit et sequi. Est exercitationem accusamus praesentium adipisci corporis fugiat.', 'Members', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(27, 'Veniam ad aspernatur officia repellendus at eos illum.', 'Et nisi eum quae necessitatibus. Accusamus quos placeat provident fugit et ex. Nulla culpa praesentium itaque.', 'Members', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(28, 'Repellendus sit soluta inventore dolores veniam eum.', 'Eos qui eius possimus sint et blanditiis sint amet. Ut repudiandae et et sed. Dolor nesciunt nulla officia sed eveniet dolor quis iure. Nobis eius veritatis aut labore sit eos.', 'Application', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(29, 'Quaerat vero earum provident.', 'Amet sit inventore labore qui assumenda error quam. At esse molestiae amet hic laboriosam blanditiis voluptas.', 'Audition', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(30, 'Voluptatibus beatae eius eum qui soluta esse.', 'Explicabo corporis alias nulla ipsum reprehenderit nisi voluptatem. Et magni ea pariatur nemo nulla et repellendus enim. Quia commodi nostrum molestiae occaecati accusantium autem illo. Doloribus dolore quo qui reprehenderit quis hic.', 'Audition', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(31, 'Ipsum dicta magni aut autem dicta adipisci.', 'Alias repudiandae temporibus facilis aut dolorem. Quibusdam sunt praesentium quo sit. Amet nam maxime aut aliquam ut. Qui et culpa provident nulla cupiditate. Unde dolores accusamus excepturi quam consectetur explicabo.', 'Application', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(32, 'Et laborum consequatur iste pariatur incidunt velit odit.', 'Provident voluptatem eos omnis omnis nemo. Velit iste ut provident. Sapiente laborum cum quia eius.', 'Selection', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(33, 'Aut sequi hic in aut.', 'Illum molestiae iure iste sunt. Reprehenderit quam voluptas doloremque. Culpa quia error vel saepe in.', 'Audition', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(34, 'Hic eos est nulla perspiciatis suscipit perferendis aperiam.', 'Nihil aut nisi sunt esse omnis accusantium. Et aut reprehenderit facilis facere ab. Error et omnis rerum placeat dolorum atque.', 'Selection', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(35, 'Et qui quos et sint fugiat ipsa.', 'Distinctio qui dicta quia doloremque numquam. Nemo ab ratione officiis. Et eum ut voluptatum repellat molestias similique. Ut pariatur corrupti quis quidem sed.', 'Audition', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(36, 'Ullam nobis repudiandae aut quia cupiditate error.', 'Quisquam quae soluta blanditiis velit rem in. Delectus sequi perferendis harum ut commodi quaerat culpa. Totam voluptatem cum voluptas unde non officia.', 'Selection', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(37, 'Doloremque accusamus quaerat exercitationem expedita cupiditate.', 'Ut similique et fuga doloribus aperiam. At velit qui sit dolore officia labore. Molestiae perferendis mollitia harum quis. Mollitia accusamus non voluptatem velit sapiente non consequatur quam.', 'Members', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(38, 'Molestiae id quas molestiae similique ipsum ut iste.', 'Voluptas consequatur cupiditate qui ad ullam quo. Voluptate tempore debitis sed non quia odio qui debitis. Est voluptas alias ea qui est quidem cupiditate.', 'Selection', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(39, 'Nemo est commodi quam ea mollitia est autem.', 'Deserunt omnis dolores nesciunt maxime. Ad praesentium optio iure fugit. Aut id laudantium modi dolores sunt.', 'Selection', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(40, 'Incidunt consequatur libero omnis suscipit reprehenderit omnis expedita.', 'Magnam iure in eligendi modi dolorum beatae distinctio. Qui quia dolores perspiciatis tempore. Optio corrupti dolor officia reiciendis sunt saepe.', 'Selection', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(41, 'Et voluptas dolores quae non.', 'Nihil corporis nisi dicta reiciendis magnam. Nisi modi non ut molestiae maxime maiores ipsa. Officiis blanditiis unde quis repellendus nostrum assumenda sint. Ut voluptatem distinctio doloremque.', 'Application', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(42, 'Saepe sed fugit voluptatum minima.', 'Quo harum fugiat ut nam. Vel est voluptatibus atque commodi mollitia accusamus quidem hic. Dolor illo sed aliquam quia. Ut sit aliquam ex temporibus ut.', 'Selection', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(43, 'Exercitationem natus quidem iure eligendi eveniet libero fuga.', 'Atque sequi quis ad delectus corporis sit iste. Voluptas asperiores tempora asperiores quis. Nam reprehenderit qui tempora blanditiis voluptatibus minus aspernatur earum.', 'Audition', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(44, 'Soluta at eum nobis veritatis.', 'Sapiente autem nostrum alias. Sed laborum unde reprehenderit totam nobis enim est neque. Reiciendis velit non vitae eum et. Doloribus quia totam sed facere officiis magni.', 'Application', '2017-08-03 06:50:28', '2017-08-03 06:50:28'),
(45, 'Rerum quia dolor repudiandae reprehenderit.', 'Consequatur ea reprehenderit maxime velit. Aperiam exercitationem ut qui asperiores aut. Qui est et accusantium repudiandae quasi et.', 'Members', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(46, 'Ducimus tempora minus sint qui.', 'Et nulla qui ut ex minus ducimus asperiores. In ut amet debitis totam natus temporibus. Ipsam cum voluptas asperiores.', 'Selection', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(47, 'Tenetur adipisci quo accusamus ipsam quo.', 'Aperiam et quia sint quia saepe voluptate qui. Non quas fugit dolorum repellat tempora aut enim voluptatem.', 'Members', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(48, 'Dolor aut officiis repellat mollitia est dolor.', 'Aut cum aut aut quod quae dolor molestiae temporibus. Natus voluptate doloribus aperiam mollitia. Sint dolorem impedit unde et voluptate.', 'Selection', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(49, 'Doloribus minus voluptas qui mollitia fugit blanditiis tenetur nulla.', 'Corrupti excepturi aspernatur enim nobis maiores non odio molestiae. Et natus qui minus voluptates. Architecto culpa est cumque dicta voluptatibus est. Eveniet nemo saepe culpa nulla molestias qui.', 'Selection', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(50, 'Atque voluptas omnis autem facilis aspernatur.', 'Quaerat repudiandae dolores sed est quo. Non et minus quae atque debitis fuga delectus. Repudiandae accusantium quia dolor aut.', 'Selection', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(51, 'Et ad et quidem.', 'Non adipisci consequatur et quae ipsa ad. Ut dolores perferendis officiis rerum aut. Quas itaque voluptas assumenda. Laborum iusto aliquam dolorum ut placeat repellat excepturi.', 'Members', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(52, 'Quas velit molestias tempora iusto.', 'Culpa nihil ullam autem. Eius provident explicabo ut quia. Molestiae explicabo voluptatem et magnam. Quibusdam nisi reiciendis vel dolorum qui.', 'Members', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(53, 'Amet eligendi fuga iusto eum consequuntur.', 'Tempore id eos qui quis consequatur. Porro aperiam optio amet optio quisquam. Est rerum est qui repellendus.', 'Members', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(54, 'Aut repellendus nesciunt expedita aperiam.', 'Dolores et voluptatem pariatur sit porro alias ut. Animi voluptas voluptatum fuga praesentium architecto ducimus qui consequuntur. Ut ducimus beatae dignissimos tempore eum blanditiis.', 'Members', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(55, 'Quisquam illum earum voluptatem.', 'Ad nihil rem esse dolores. Odit suscipit ab ut in. Eum voluptatem est qui aut quia. Aliquid sed rerum possimus vel velit. Incidunt eum neque totam rerum aut.', 'Audition', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(56, 'Qui nisi et fugit.', 'Provident inventore aspernatur maxime sed. Corporis qui voluptates voluptas quaerat vero dolorum distinctio quisquam. Architecto provident ipsum id suscipit. Tempora explicabo distinctio unde voluptas id nulla accusantium. Ut fuga qui mollitia delectus non dolor voluptatem.', 'Audition', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(57, 'Autem deleniti nihil sed quod deserunt error.', 'Ex unde praesentium qui laboriosam soluta. Sequi iste dignissimos aut placeat et autem. Doloremque ut aut amet.', 'Application', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(58, 'Sit rerum omnis at quis.', 'Omnis deleniti molestias doloribus quisquam magnam dolores aperiam. Sed quae repellendus repellendus laborum nam. Alias fuga nobis ut minus quisquam.', 'Application', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(59, 'Sunt vitae esse et nihil perspiciatis laboriosam.', 'Expedita molestiae sint consectetur cum nam beatae autem magnam. Praesentium perspiciatis et omnis vel aliquam quis alias porro. Reprehenderit reprehenderit sequi consequatur est.', 'Application', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(60, 'Quis adipisci unde velit nihil blanditiis.', 'Omnis enim qui sapiente porro quam ullam. Nostrum laudantium ipsum aut maxime quisquam sit quis ex. Nostrum saepe sed quis enim quibusdam magni. Iusto omnis vel dolore sit dolor. Quidem quas vel dolorem dolorem ut.', 'Audition', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(61, 'Quia quia cum vero illo commodi.', 'Illum enim rerum sit veniam aut fugit cupiditate et. Id corrupti est laudantium rerum non. Iusto aut exercitationem earum est. Est sed nihil debitis aperiam quos cum laudantium ad.', 'Selection', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(62, 'Rem eos reprehenderit unde fugiat.', 'Mollitia esse et molestiae sit. Illum placeat nostrum eligendi voluptatem earum. Et fugiat temporibus libero quibusdam autem debitis corrupti.', 'Selection', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(63, 'Minus soluta beatae rerum aliquid excepturi voluptates quo optio.', 'Ducimus dolores laboriosam placeat ipsa. Laudantium deleniti doloremque consequatur aut consequatur. Aperiam quae dolorem vel veniam aut. Sed nobis deleniti corrupti temporibus alias aut.', 'Selection', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(64, 'Deserunt nesciunt impedit iste temporibus blanditiis.', 'Et corporis aut atque sed quos voluptatem quis. Id atque vero iusto laudantium modi optio officia. Et perspiciatis facere harum quia iure porro sint. Quis quos impedit est error et in corporis qui.', 'Audition', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(65, 'Animi aspernatur quo id ex et a.', 'Ea sunt tenetur molestias non voluptatem saepe occaecati cumque. Rem totam animi cum omnis similique necessitatibus. A qui nemo iusto et minima voluptatem adipisci.', 'Selection', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(66, 'Totam saepe aperiam odio inventore tenetur autem rem ut.', 'Quis enim voluptas quia incidunt quis voluptates nobis. Et qui eligendi possimus suscipit. Eius ab temporibus tenetur est deleniti expedita.', 'Application', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(67, 'Cum et hic et aliquid exercitationem laboriosam.', 'Ipsum unde ratione esse nobis. Odit nulla quisquam voluptatem qui. Modi autem libero dolores commodi ex autem aliquid.', 'Members', '2017-08-03 06:50:29', '2017-08-03 06:50:29'),
(68, 'Iste accusamus ex aut doloribus atque corrupti.', 'Quisquam qui odit illum consequatur quis aperiam. Vero est sit dicta. Quis optio dicta omnis nobis. Facilis est quaerat optio corporis.', 'Application', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(69, 'Voluptatibus totam omnis aut at voluptatem facere.', 'Corrupti cumque quam modi optio dolorem. Odio ratione voluptatem sit ipsam officiis non hic. Rem rerum expedita aut illo non porro.', 'Selection', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(70, 'Dolorum omnis ad et nihil nemo ipsa ipsum.', 'Qui enim reiciendis pariatur ut. Voluptatum reprehenderit dolorem ea blanditiis ipsam.', 'Application', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(71, 'Adipisci numquam magnam consectetur amet veniam dolor ab.', 'Repellendus reprehenderit nostrum repellendus delectus. Rerum at et rerum autem vel quisquam qui. Magni est velit rerum necessitatibus veritatis. Saepe explicabo accusantium vel hic quia repellat.', 'Members', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(72, 'Praesentium quidem accusantium voluptates eum.', 'Ipsa aliquid nostrum quis ratione in voluptates sed. Doloremque ut consequuntur occaecati et. Dolorem ipsa et suscipit molestiae accusamus. Molestiae dolorem numquam harum officiis excepturi sit.', 'Audition', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(73, 'Rerum delectus et nam voluptates officiis voluptate qui corporis.', 'Voluptas reprehenderit necessitatibus minus molestiae. Cum sunt culpa qui aut ut non. Aut iste deleniti rem qui provident at. Sed et labore sed eum vero.', 'Selection', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(74, 'Sit labore error nam harum.', 'Vel quia commodi maxime praesentium magni voluptatem. Dolorem saepe eligendi ab voluptatum. Aliquam ut illo ipsam sequi consequuntur. Veniam aliquid debitis tempore quos perferendis quia quod.', 'Members', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(75, 'Odit a et debitis odio laborum voluptatem laudantium.', 'Incidunt facere sequi minus quaerat. Optio eum doloremque nobis nihil dignissimos. Repellendus facilis dolores est numquam molestiae laudantium. Voluptas id iste amet sint qui fuga.', 'Members', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(76, 'Ullam aspernatur provident nisi maiores ratione sed.', 'Omnis facilis repellat suscipit magnam vero quam recusandae. Exercitationem ad ut vitae neque eum alias dolores. Autem cumque quidem quos tempora deleniti et. Unde recusandae ut quam debitis. In rerum voluptatum itaque laborum et.', 'Members', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(77, 'Neque aperiam ex ut dolor.', 'At nam harum possimus sunt excepturi. Nulla commodi facilis sed tempore quam. Laudantium est praesentium provident.', 'Selection', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(78, 'Neque quia enim qui esse accusantium.', 'Autem ex omnis illo tenetur. Blanditiis rerum dolore aut nostrum deserunt soluta laborum. Voluptatem laudantium doloremque quia a dolorum laudantium voluptatem.', 'Members', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(79, 'Error nulla vel possimus.', 'Vel ex quibusdam debitis ea. Quo nisi ex vitae occaecati exercitationem voluptatem sed tempore. Ipsam fugiat et doloribus ab officia ex. Assumenda ut labore libero odit.', 'Application', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(80, 'Tenetur est neque eum quos.', 'Velit cumque fuga ab ipsam. Vero repellendus est atque omnis necessitatibus molestias. Et veritatis sed voluptas ut non sunt totam voluptas. Illum et natus id ea corporis.', 'Selection', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(81, 'Provident magnam nemo dolor ea.', 'Dolor molestiae commodi at sed nobis aspernatur necessitatibus. Eaque in asperiores ut officia modi voluptates. Quos ut officia modi rerum.', 'Application', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(82, 'Voluptas ea aut vel alias molestiae dolorum officia ea.', 'Quibusdam error est optio atque. Enim enim tempore et nemo dolor non. Qui quia quae perspiciatis enim magnam. Non vel numquam impedit atque molestiae et aut.', 'Audition', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(83, 'Facere est et non consequuntur qui omnis.', 'Qui accusantium dolore facilis aspernatur odit non quod sunt. Voluptatem et eos nesciunt repellat earum suscipit. Voluptatem beatae corrupti qui ut qui tenetur corporis. Suscipit est omnis itaque vel numquam sit.', 'Audition', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(84, 'Vitae rerum esse alias ducimus blanditiis vel commodi aut.', 'Alias corrupti ullam qui ullam. Ipsa harum aut quisquam necessitatibus. Voluptatibus deleniti ut asperiores est aut qui sit nihil.', 'Audition', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(85, 'Voluptas amet suscipit molestiae incidunt repudiandae neque eius necessitatibus.', 'Ut fugit officiis quia inventore tempore repellendus doloremque. Itaque et quis iure sed a. Quis repellat ut ut iste sed.', 'Members', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(86, 'Et consequuntur aut voluptatem debitis dignissimos minus ipsam officia.', 'A excepturi error quo occaecati vel ad minus. Sunt voluptates voluptatem iure provident quam quia. Illum qui est enim id non sapiente. Qui modi ex autem et vel in laudantium.', 'Selection', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(87, 'Et a porro amet doloribus.', 'In aliquam voluptatem sunt tempora. Earum ratione quia eligendi ducimus eos facere. Quo minus consequatur modi expedita dolorum quae id.', 'Members', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(88, 'Reiciendis libero sint minima voluptatibus occaecati.', 'In reiciendis aut blanditiis distinctio natus beatae optio. Omnis asperiores maiores et omnis quae aut rerum. Enim omnis beatae earum consequuntur neque. Ipsam fugiat voluptas hic voluptatem.', 'Audition', '2017-08-03 06:50:30', '2017-08-03 06:50:30'),
(89, 'Libero omnis sequi aut minus ad est explicabo.', 'Voluptas saepe eius et accusantium consectetur sed consectetur. Voluptas aut dolorum dolorem distinctio ut maiores. Officiis maiores fugiat nemo assumenda. Et iure vero rerum rem consequuntur amet.', 'Application', '2017-08-03 06:50:31', '2017-08-03 06:50:31'),
(90, 'Explicabo aspernatur occaecati fugiat molestias voluptatem odio id.', 'Repellat molestiae dolore soluta optio molestiae. Non nam quae ipsam. Excepturi quia quod illo iste quo labore impedit.', 'Audition', '2017-08-03 06:50:31', '2017-08-03 06:50:31'),
(91, 'Debitis nihil perferendis voluptas natus consectetur.', 'Consequatur sequi maiores aut adipisci rem nihil. Ut dolores voluptatibus omnis ipsum aliquam ex.', 'Selection', '2017-08-03 06:50:31', '2017-08-03 06:50:31'),
(92, 'Aliquam laudantium ad et fugiat nam labore sunt voluptatibus.', 'Qui voluptatem sit aut minus. Laboriosam illo laudantium iure deleniti. Quisquam tempora voluptatem alias vero animi animi sed. Neque quibusdam dolor accusamus.', 'Selection', '2017-08-03 06:50:31', '2017-08-03 06:50:31'),
(93, 'Est vero sint dolorum aut et.', 'Corrupti autem at dolores recusandae autem. Perspiciatis dicta eligendi qui ad ut et. Accusantium ad officia dolor omnis non reiciendis accusamus velit. Veritatis quis facilis aut magni eos consequatur qui.', 'Selection', '2017-08-03 06:50:31', '2017-08-03 06:50:31'),
(94, 'Omnis magni consequatur neque expedita voluptatibus et accusantium natus.', 'Enim saepe in quia vitae. Vel incidunt officia aut dolor fugit est. Dolores qui et et voluptatem quas voluptate dolores. Culpa itaque dolorem quo quia voluptas deleniti ratione.', 'Application', '2017-08-03 06:50:31', '2017-08-03 06:50:31'),
(95, 'Cumque nobis laudantium dolores aut atque.', 'Quos consequuntur et optio sunt. Accusamus iure nisi assumenda. Ut placeat optio aliquam ducimus quia aut architecto.', 'Audition', '2017-08-03 06:50:31', '2017-08-03 06:50:31'),
(96, 'Quae odio laboriosam est cumque omnis accusamus.', 'Inventore aut repudiandae veritatis sit ea ut sed. Odit quia incidunt explicabo magni ut. Corrupti distinctio et est ut. Vitae corporis voluptatem excepturi labore.', 'Application', '2017-08-03 06:50:31', '2017-08-03 06:50:31'),
(97, 'Ab id accusantium porro deleniti necessitatibus reiciendis sed.', 'Assumenda quae quia fugiat modi asperiores enim. Labore illo et rerum. Sapiente natus temporibus quo et commodi. Quisquam fugit nisi vitae omnis.', 'Audition', '2017-08-03 06:50:31', '2017-08-03 06:50:31'),
(98, 'Quia dignissimos nulla est explicabo exercitationem nulla inventore quia.', 'Incidunt ipsum ea et. Corporis est rem eos assumenda corporis voluptatem possimus. Eos veniam maiores vitae ex iste.', 'Members', '2017-08-03 06:50:31', '2017-08-03 06:50:31'),
(99, 'Et et dolor quia animi et.', 'Autem cumque exercitationem perferendis illo aliquam. Incidunt sit rerum magnam quo aliquam dolorum rerum. Sed omnis voluptatum corrupti. Ut iste ut id.', 'Application', '2017-08-03 06:50:31', '2017-08-03 06:50:31'),
(100, 'Sapiente modi sit aut veniam repudiandae mollitia minus perferendis.', 'Esse porro ipsa consequuntur id sunt ipsam. Similique aut nemo ad cum nostrum consectetur. Ab nisi eum id nemo veniam magni nesciunt. Quos qui possimus quo nesciunt cupiditate quia consectetur.', 'Application', '2017-08-03 06:50:31', '2017-08-03 06:50:31');

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
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2017_06_15_080356_create_actors_table', 1),
(31, '2017_07_21_132605_create_faqs_table', 1),
(32, '2017_07_26_070347_create_slideshows_table', 1),
(33, '2017_07_26_072609_create_slides_table', 1),
(34, '2017_07_28_100856_create_content_pages_table', 1),
(35, '2017_08_03_114630_create_subscriptions_table', 1);

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
(1, 'actor', 'actor@actor.com', '$2y$10$7xv81W5DJG2MVGYeEo6D8.4DclJBGV2E/.VUM3S6QaWBUejZqo.Xa', 'actor', NULL, NULL, NULL, NULL, 1, 0, 'SaCGIAubXK2sZM4Vo2G583CjBsZmoWOshNozZeZuCiv7B2ZWdZdGP9lRWxL4', '2017-08-03 06:49:51', '2017-08-04 07:38:26'),
(2, 'actor', 'staff@staff.com', '$2y$10$EPgiz2L6PaFGr1IYJaLyCO5ipyZaf9yDOpeikXbFigE4N7TCH.b86', 'staff', NULL, NULL, NULL, NULL, 1, 0, NULL, '2017-08-03 06:49:51', '2017-08-03 06:49:51'),
(3, 'theater', 'theater@theater.com', '$2y$10$mFT0VYdNo8QONBgIWBk0duNTcRuIQ47DjntMO20pbaci5nizO28p2', 'theater', NULL, NULL, NULL, NULL, 1, 0, NULL, '2017-08-03 06:49:51', '2017-08-03 06:49:51'),
(4, 'Administrator', 'admin@admin.com', '$2y$10$8Y1832AqXt.svg7LbuGvseETZA6eIb9/LwAELYY4Tgyf6S4zu4gdO', 'admin', NULL, NULL, NULL, NULL, 1, 0, 'hhgolIdSriS8SZkQGIyfLhNpa675aOsnLcLeo0F5YfwF0HQ0mYPOCnFmnITq', '2017-08-03 06:49:51', '2017-08-03 06:49:51'),
(5, 'Jany Auer', 'flesch@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'UhWdqxvUIz', '2017-08-03 06:49:51', '2017-08-03 06:49:51'),
(6, 'Tiffany Goldner', 'francisca82@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'IXCkOHt5tk', '2017-08-03 06:49:51', '2017-08-03 06:49:51'),
(7, 'Dennis Crona', 'judy06@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'NRlCR4arCq', '2017-08-03 06:49:51', '2017-08-03 06:49:51'),
(8, 'Mr. Michel Sporer', 'alford54@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'itxbcBAezG', '2017-08-03 06:49:51', '2017-08-03 06:49:51'),
(9, 'Loraine O\'Kon', 'mayra13@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'O9Wki881Qv', '2017-08-03 06:49:51', '2017-08-03 06:49:51'),
(10, 'Elyssa Cormier', 'predovic.romaine@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '8Cl3nL4rXy', '2017-08-03 06:49:51', '2017-08-03 06:49:51'),
(11, 'Ana Nikolaus', 'earline.gulgowski@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'Ly0sFqUWCO', '2017-08-03 06:49:51', '2017-08-03 06:49:51'),
(12, 'Prof. Penelope Emmerich', 'marques.zieme@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '7nfTBx0NNA', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(13, 'Maeve Lakin', 'xwiza@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '6LgAYpeIMv', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(14, 'Nyah Bogan', 'haylee25@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'bcUpReSxX4', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(15, 'Dr. Crawford Lowe IV', 'hester.hermann@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'H8snuVzODG', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(16, 'Arlie Lynch', 'hmurray@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '85vQ5Cq3zn', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(17, 'Daija McLaughlin', 'beaulah81@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'AyCnKp0cKV', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(18, 'Tatum Hagenes', 'bo.vonrueden@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'EVbiwcnbdW', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(19, 'Clifford Little', 'brown.boyle@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '1VXjDr5u6N', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(20, 'Luis Paucek', 'zelma67@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'Y5aPdxjSYq', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(21, 'Rico Reinger', 'clint.carroll@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'vATPzwwUqk', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(22, 'Stephen O\'Kon', 'xupton@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '4vgoMQRgbS', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(23, 'Dr. Teresa Schroeder II', 'mills.sigurd@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '7wUkrLj3Hi', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(24, 'Keara Rowe', 'janie89@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'X1u64fbtXV', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(25, 'Cathrine Durgan', 'nya78@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'JRQ1LuwVR9', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(26, 'Lauren Marks Jr.', 'grady.gibson@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'uIVJk61kh5', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(27, 'Deangelo Pollich', 'wdeckow@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'jcNTu5q2Im', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(28, 'Mariane Runte', 'zberge@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'luUNShE7uz', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(29, 'Wendell Deckow', 'fay.finn@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'ubGeRryldW', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(30, 'Camylle Thompson', 'leda00@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'JHYpvlJKE4', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(31, 'Roy VonRueden', 'hugh88@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'tvVZoYJndJ', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(32, 'Clarissa Heathcote', 'ireynolds@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'X70MUOaSCK', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(33, 'Mattie Terry', 'king.shaniya@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'PemDalIz7n', '2017-08-03 06:49:52', '2017-08-03 06:49:52'),
(34, 'Mr. Rupert Will DVM', 'khalil.pagac@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '6whtF5tjyK', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(35, 'Neva Dietrich', 'nromaguera@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'DewKaLgfov', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(36, 'Dewitt Ebert', 'ikemmer@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'EbLjmuBEYJ', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(37, 'Alene Littel', 'prosacco.ally@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'VQgwmbphLr', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(38, 'Dr. Daron Zemlak', 'rutherford.jude@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'P8TKHGkxFD', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(39, 'Prof. Kyra Hudson III', 'xziemann@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'v82V6OQfyJ', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(40, 'Loma Thiel', 'lorna.wilderman@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'sXyXPtteMq', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(41, 'Jessica Hyatt', 'cummings.jerry@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '5llvynoBRi', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(42, 'Ross Zulauf', 'alverta71@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '3BgliyT02E', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(43, 'Filomena Davis Sr.', 'frankie97@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'vR9WpH6bpx', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(44, 'Dr. Dean Miller', 'abshire.gaylord@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '2E2K4FhbeK', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(45, 'Milton Fay', 'llang@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'tDIdOa3HCx', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(46, 'Dr. Natalia Mills', 'trevion.schmitt@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '7RtKdVd8ap', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(47, 'Ines Rempel', 'reilly.melvin@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'sScTxsHxAI', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(48, 'Rhea Connelly', 'arvel.larson@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'sw1j3qRTBl', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(49, 'Flavie Kunze DVM', 'jayden.hickle@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'xaDWZtviE6', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(50, 'Fleta Willms', 'frami.frieda@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'SKm2ObfJKN', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(51, 'Aiden Lang', 'kuhn.zachery@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'IeJ8HsLvYb', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(52, 'Mrs. Mallie Schiller', 'aida48@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'SvyYRCcYgG', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(53, 'Nicklaus Becker', 'cruickshank.lorna@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'NHjN5DfuHf', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(54, 'Waino Kessler', 'hintz.jammie@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'mCiIJ8iW0f', '2017-08-03 06:49:53', '2017-08-03 06:49:53'),
(55, 'Hardy Runte', 'xzavier54@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'OT90IT64wp', '2017-08-03 06:49:54', '2017-08-03 06:49:54'),
(56, 'Samantha Veum', 'hailey42@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'oyldBE0tEQ', '2017-08-03 06:49:54', '2017-08-03 06:49:54'),
(57, 'Colten Crona', 'bashirian.delbert@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'kt4KZgoHpW', '2017-08-03 06:49:54', '2017-08-03 06:49:54'),
(58, 'Mr. Buck Kilback PhD', 'schneider.rae@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '6mDAnHuXOv', '2017-08-03 06:49:54', '2017-08-03 06:49:54'),
(59, 'Lauretta Dach', 'auer.arne@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'eNpelXZBOU', '2017-08-03 06:49:54', '2017-08-03 06:49:54'),
(60, 'Audreanne Ritchie DVM', 'nikolaus.kali@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'IPiPEUBKD9', '2017-08-03 06:49:54', '2017-08-03 06:49:54'),
(61, 'Amie Wolf', 'johnpaul33@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'mz07zEsesQ', '2017-08-03 06:49:54', '2017-08-03 06:49:54'),
(62, 'Destiney Buckridge DDS', 'ullrich.estel@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'D87563O0qL', '2017-08-03 06:49:54', '2017-08-03 06:49:54'),
(63, 'Justina Graham', 'ghettinger@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'FqKIje4yz0', '2017-08-03 06:49:54', '2017-08-03 06:49:54'),
(64, 'Meredith Monahan', 'ndooley@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'g6l7nYu2Pu', '2017-08-03 06:49:54', '2017-08-03 06:49:54'),
(65, 'Michale Schaefer', 'samir.schmitt@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '5ViIhWafQs', '2017-08-03 06:49:54', '2017-08-03 06:49:54'),
(66, 'Ms. Laurianne O\'Hara', 'gerhard.hammes@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'HlTKD2jc6D', '2017-08-03 06:49:54', '2017-08-03 06:49:54'),
(67, 'Prof. Devonte Smitham PhD', 'mcglynn.mittie@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '1aHFUt0XnQ', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(68, 'Britney Price', 'srodriguez@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'MpNkoRmrKr', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(69, 'Bud Kuhic', 'ohyatt@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'hcQnbI2U5B', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(70, 'Viola Schroeder', 'megane91@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'xap5OMw5cr', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(71, 'Eleanora Jacobi PhD', 'jstroman@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'gDIJlS6ss1', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(72, 'Dominique Greenholt DDS', 'klemke@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'qXj0No4Nxd', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(73, 'Ahmed Hayes', 'amaya34@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'ij31kTc6IA', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(74, 'Prof. Winfield Barrows Sr.', 'jgutkowski@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'jRu8eIjx9e', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(75, 'Mazie Koelpin', 'senger.hortense@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '1iwZ44d2E5', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(76, 'Dariana Smitham', 'emily93@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'X0oPfhRD0S', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(77, 'Marjory Conn', 'cassandra29@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'KemjMLtRMK', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(78, 'Amalia Johns', 'veum.monserrate@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'Mvu00jlYv7', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(79, 'Alessandro Kemmer', 'lkoelpin@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '3F23zRtQsF', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(80, 'Mrs. Bridgette Becker DVM', 'iohara@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'V7K4oXP0xp', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(81, 'Araceli Keeling', 'tboehm@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'yzGMse5Ml9', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(82, 'Prof. Aletha Lindgren', 'tatyana.gaylord@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'NI5YsaDB2q', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(83, 'Ms. Sydnee Eichmann II', 'nestor76@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'EazOiR4Qgp', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(84, 'Taryn Kuhic', 'amorissette@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'lttaShack0', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(85, 'Virginia Cartwright', 'yhilll@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'IRc3FUy6d0', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(86, 'Kraig Jerde IV', 'pnolan@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'rJadITJmPs', '2017-08-03 06:49:55', '2017-08-03 06:49:55'),
(87, 'Prof. Cody D\'Amore IV', 'tromp.florida@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'xwncurrKB5', '2017-08-03 06:49:56', '2017-08-03 06:49:56'),
(88, 'Darius Stroman', 'jaqueline13@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'bOPWmy5Cpu', '2017-08-03 06:49:56', '2017-08-03 06:49:56'),
(89, 'Zackary Gorczany', 'ernie26@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'FfLTXv7TvL', '2017-08-03 06:49:56', '2017-08-03 06:49:56'),
(90, 'Prof. Urban Murphy V', 'sipes.rico@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 't2weUDygEA', '2017-08-03 06:49:56', '2017-08-03 06:49:56'),
(91, 'Watson Marquardt III', 'dameon.mohr@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'xkO3p8hqEW', '2017-08-03 06:49:56', '2017-08-03 06:49:56'),
(92, 'Miss Daniela Boyle DVM', 'terry.emilia@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '0Sm49FvNDn', '2017-08-03 06:49:56', '2017-08-03 06:49:56'),
(93, 'Bernadine Watsica', 'zstark@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'a9Tg3UhS07', '2017-08-03 06:49:56', '2017-08-03 06:49:56'),
(94, 'Clemens Little', 'herman.jacklyn@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '85IYHLaszp', '2017-08-03 06:49:56', '2017-08-03 06:49:56'),
(95, 'Dr. Pasquale Kihn', 'vernie.hermiston@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'iIY5SxAMM8', '2017-08-03 06:49:56', '2017-08-03 06:49:56'),
(96, 'Claudine Prosacco', 'laney.borer@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'E4ULl15S6Q', '2017-08-03 06:49:56', '2017-08-03 06:49:56'),
(97, 'Miss Drew Smitham DDS', 'tobin.funk@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'XM0oNXlsfn', '2017-08-03 06:49:56', '2017-08-03 06:49:56'),
(98, 'Loraine Wolff', 'lzulauf@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'XZuOpx9QCw', '2017-08-03 06:49:56', '2017-08-03 06:49:56'),
(99, 'Prof. Lucious Walter Sr.', 'rogahn.tara@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'TAdJuUdPPi', '2017-08-03 06:49:56', '2017-08-03 06:49:56'),
(100, 'Devante Lehner', 'briana.schimmel@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'RImlWzwKpQ', '2017-08-03 06:49:56', '2017-08-03 06:49:56'),
(101, 'Kurtis Jerde', 'bahringer.clarissa@example.com', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'lZ9BvGerHI', '2017-08-03 06:49:56', '2017-08-03 06:49:56'),
(102, 'Prof. Rickie Bartoletti I', 'brando.boyle@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'QjU9H1a7gH', '2017-08-03 06:49:56', '2017-08-03 06:49:56'),
(103, 'Dr. Ava Heller V', 'jlowe@example.net', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, '12SPlBYzW8', '2017-08-03 06:49:56', '2017-08-03 06:49:56'),
(104, 'Mr. Carmine Hintz', 'stroman.sonya@example.org', '$2y$10$qWD1M6oXAKrKWQFmpmyILuQsnh8dZGxVZ0wqs/MJe9qHCXkeUZvdG', 'actor', NULL, NULL, NULL, NULL, 1, 1, 'Tx5p6uENyb', '2017-08-03 06:49:56', '2017-08-03 06:49:56');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `content_pages`
--
ALTER TABLE `content_pages`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slideshows`
--
ALTER TABLE `slideshows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
-- Constraints for table `content_pages`
--
ALTER TABLE `content_pages`
  ADD CONSTRAINT `content_pages_slideshow_id_foreign` FOREIGN KEY (`slideshow_id`) REFERENCES `slideshows` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `slides`
--
ALTER TABLE `slides`
  ADD CONSTRAINT `slides_slideshow_id_foreign` FOREIGN KEY (`slideshow_id`) REFERENCES `slideshows` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
