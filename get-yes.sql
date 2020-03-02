-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2016 at 10:52 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `get-yes`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `biography` text COLLATE utf8_unicode_ci NOT NULL,
  `about_category_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `about_about_category_id_foreign` (`about_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `name`, `title`, `image`, `biography`, `about_category_id`, `created_at`, `updated_at`) VALUES
(1, 'Elena Gagacheva', 'Freelance Entrepreneurship Trainer', '0715731001468966613.png', 'Some short description about Elena Gagacheva goes here.\r\nElena lives in Bitola, Macedonia. She is 25 years old and currently works as Entrepreneurship Trainer for CEFE Macedonia :)\r\nCheers', 2, '2016-07-19 22:16:53', '2016-07-19 22:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `about_category`
--

CREATE TABLE IF NOT EXISTS `about_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `about_category`
--

INSERT INTO `about_category` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Experts', '2016-07-18 23:12:08', '2016-07-18 23:12:08'),
(2, 'Coordination Team', '2016-07-18 23:12:08', '2016-07-18 23:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `materials_created_by_foreign` (`created_by`),
  KEY `materials_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_11_000000_create_roles_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_07_03_153942_create_subscription_table', 1),
('2016_07_13_225452_create_contact_table', 1),
('2016_07_14_215341_create_partners_table', 2),
('2016_07_19_010352_create_about_category_table', 3),
('2016_07_19_215639_create_about_table', 3),
('2016_07_27_001337_create_news_table', 4),
('2016_08_02_172128_create_research_category_table', 5),
('2016_08_02_172223_create_research_table', 5),
('2016_08_22_201222_create_materials_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url_unique` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `news_created_by_foreign` (`created_by`),
  KEY `news_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `url_unique`, `title`, `image`, `thumbnail`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'fisrt-news-item', 'dijana - First News Item', '0367244001469739030.png', '0367269001469739030.png', '&lt;p&gt;&lt;strong&gt;Lorem ipsum&lt;/strong&gt; dolor sit amet, ubique qualisque inciderint eum ei. Liber urbanitas deterruisset nec te, quis assentior intellegam est at. Magna soleat habemus sit ne, harum verear integre no vel, cum ut recusabo imperdiet pertinacia. No quot eius ignota eum, dicit invidunt electram an nam. Ad epicurei scaevola pri, pri epicuri suscipit placerat eu. Doming fierent maluisset id eos, eu ridens maiorum intellegam mei.&lt;/p&gt;\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n&lt;p&gt;Per facer perpetua gubergren ad, affert iisque dissentiet eum ad. In quo dico civibus, sed ad graecis adipisci molestiae. Pri utamur iracundia in. Facilisis definitionem ad nam, quot illud essent eu per. Eu eum dolorum detraxit definitionem, ridens eleifend consectetuer vix ne, has ei aliquam ocurreret honestatis. &lt;em&gt;Ex per sale iudico recusabo, id velit minimum cum, eu vix quis aliquando accommodare.&lt;/em&gt;&lt;/p&gt;', 1, 1, '2016-08-28 20:50:30', '2016-07-28 20:50:46'),
(2, 'fisrt-news-item-1', 'dijana First News Item 1', '0884148001469739385.png', '0884174001469739385.png', '&lt;p&gt;Ex mea quis quaerendum philosophia, ad ipsum oblique nam. In has dolore nusquam antiopam. Qui prima soluta percipit eu. Sed ad audire mediocrem comprehensam. Inani consectetuer ex sed, nec et porro inermis, at his probo prodesset. Sit unum nemore cu.&lt;/p&gt;\n&lt;p style=&quot;text-align: right;&quot;&gt;Quo quod choro dolor ne, affert suscipit ne has, in scripta eloquentiam est. Mei ex commune gubergren quaerendum. Labores gloriatur percipitur te nam. Perpetua omittantur his et, vel omnesque maiestatis ad, cu sonet partem doming nam.&lt;/p&gt;\n&lt;p style=&quot;text-align: justify;&quot;&gt;&lt;span style=&quot;text-decoration: underline;&quot;&gt;Mucius constituto ad per. Iuvaret feugiat pri ne, vero laboramus efficiendi at duo. Alia pericula iracundia vel ad. His putent civibus id, repudiare adipiscing at vim. Et eam libris mucius suscipit. Quod mollis civibus in sed.&lt;/span&gt;&lt;/p&gt;', 1, 1, '2016-08-28 20:56:25', '2016-07-28 20:57:17'),
(3, 'beautiful-beach-beside-grass', 'Beautiful Beach Beside Grass', '0349340001470143514.jpeg', '0349368001470143514.png', '&lt;h2&gt;&lt;span style=&quot;color: #666666; font-family: Verdana, Geneva, sans-serif; font-size: 10px;&quot;&gt;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi.&lt;/span&gt;&lt;/h2&gt;\r\n&lt;h2&gt;&amp;nbsp;&lt;/h2&gt;\r\n&lt;h2 style=&quot;text-align: center;&quot;&gt;&lt;em&gt;&lt;span style=&quot;color: #666666; font-family: Verdana, Geneva, sans-serif; font-size: 10px;&quot;&gt; Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.&amp;nbsp;&lt;/span&gt;&lt;/em&gt;&lt;/h2&gt;', 1, NULL, '2016-08-02 13:11:54', '2016-08-02 13:11:54'),
(4, 'nature-day', 'Nature Day - dijana', '0382811001470143582.jpeg', '0382836001470143582.png', '&lt;ul&gt;\r\n&lt;li&gt;Lorem ipsum dolor sit amet, sed ipsum tellus amet convallis eget, in ac, aenean tortor eveniet vel purus eros, mauris duis nec eu nulla mauris. Ante vulputate eu, nam convallis auctor lectus nulla tortor condimentum. Non semper integer vitae tellus, mi ornare aliquam cras volutpat, vestibulum habitasse duis, mauris accumsan vivamus imperdiet pellentesque dui, morbi urna sapien mauris massa at morbi. Lacus tincidunt eget, amet quisque mi vel. Sagittis nam, dignissim at scelerisque magna sed quisque, porta placerat mi sagittis.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Dui quis nulla quam ullamcorper. Erat nulla, nulla suspendisse praesent natoque et, vel sed vel ut, curabitur nonummy duis eget in voluptatem. Rutrum et orci risus pede erat sit, condimentum eros et. Lectus lacus auctor, tortor ut augue mollis magna proin fermentum, bibendum dolor, ornare feugiat mi et amet elementum mi, dui quam mauris non est phasellus. Ac et pellentesque tortor eget ut condimentum, quis in vitae accumsan elementum neque aliquam. Vivamus commodo vehicula. Sem aliquet non, vel et libero, integer erat consequatur mollis aliquet dolor, nulla erat pede, pellentesque scelerisque neque mus. Maecenas viverra adipiscing integer quam sem, et neque nisl habitant curabitur, ut vitae, et praesent eget pellentesque amet enim lobortis. Lorem hymenaeos, placerat vitae consectetuer porta nec lectus, vitae dolor est tortor massa. Est lacus consectetuer maecenas dui ac porttitor, sit tellus ut quis vestibulum porta, odio et. Amet modi.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Aliquet fusce nibh tellus, fermentum ipsum eget fringilla pellentesque tortor. Amet libero wisi ut interdum interdum, tempus posuere, libero urna cursus sed, dictum integer, ante wisi dui. Iaculis numquam orci gravida itaque hendrerit, nibh inceptos aenean magnis. Scelerisque est urna viverra vivamus et erat, proin quam lectus, nulla quis feugiat, nam mauris. In ornare ad bibendum semper a cursus, diam accumsan, cras phasellus turpis, sed ipsum ut in mauris vehicula sollicitudin. Arcu consequat, fusce primis sollicitudin lectus sem sociis facilisi, sit sit viverra aut pulvinar tortor velit, dictum sed sed mattis, sollicitudin nulla. Qui vulputate malesuada, quis odio sed mi dui massa, integer donec vel sapien pharetra magna consectetuer, sodales luctus est ipsum iaculis lacus habitant. Et quis viverra ligula aenean suspendisse, eros ipsum vel consequat suspendisse duis consequatur, orci a condimentum nunc id, vulputate sed aliquam ut in.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n&lt;ul&gt;\r\n&lt;li&gt;Quis ac porro sed nec nec, proin id at, velit varius sit morbi. Orci eu netus lacus, non diam congue orci, consectetuer purus sed eu ac integer aptent, ac id ultrices montes amet. Lacinia ac risus lorem a, et ornare wisi erat habitant mattis. Velit cursus pellentesque est, sed tellus neque eu suspendisse, massa quam mi gravida suscipit, dolor fusce, wisi et donec placerat. Imperdiet aenean velit, sit quis elementum, placerat dignissim, massa euismod est aenean placerat. Eros morbi quis sociosqu, urna phasellus, faucibus dictumst egestas pede, integer dui. Nonummy augue urna. Ante consequat nam, etiam dapibus mauris semper in curabitur. Vehicula in vestibulum erat placerat, tellus lorem at velit suspendisse morbi, metus morbi dolor at libero mauris et.&lt;/li&gt;\r\n&lt;/ul&gt;', 1, NULL, '2016-08-02 13:13:02', '2016-08-02 13:13:02'),
(5, 'some-random-news-post', 'Some random news post dijana', '0621293001470143636.jpeg', '0621320001470143636.png', '&lt;p style=&quot;font-size: 12px; font-family: arial, helvetica, sans-serif; margin-bottom: 0px;&quot; align=&quot;justify&quot;&gt;Lorem ipsum dolor sit amet, sed ipsum tellus amet convallis eget, in ac, aenean tortor eveniet vel purus eros, mauris duis nec eu nulla mauris. Ante vulputate eu, nam convallis auctor lectus nulla tortor condimentum. Non semper integer vitae tellus, mi ornare aliquam cras volutpat, vestibulum habitasse duis, mauris accumsan vivamus imperdiet pellentesque dui, morbi urna sapien mauris massa at morbi. Lacus tincidunt eget, amet quisque mi vel. Sagittis nam, dignissim at scelerisque magna sed quisque, porta placerat mi sagittis.&lt;/p&gt;\r\n&lt;ol&gt;\r\n&lt;li&gt;Dui quis nulla quam ullamcorper. Erat nulla, nulla suspendisse praesent natoque et, vel sed vel ut, curabitur nonummy duis eget in voluptatem. Rutrum et orci risus pede erat sit, condimentum eros et. Lectus lacus auctor, tortor ut augue mollis magna proin fermentum, bibendum dolor, ornare feugiat mi et amet elementum mi, dui quam mauris non est phasellus. Ac et pellentesque tortor eget ut condimentum, quis in vitae accumsan elementum neque aliquam. Vivamus commodo vehicula. Sem aliquet non, vel et libero, integer erat consequatur mollis aliquet dolor, nulla erat pede, pellentesque scelerisque neque mus. Maecenas viverra adipiscing integer quam sem, et neque nisl habitant curabitur, ut vitae, et praesent eget pellentesque amet enim lobortis. Lorem hymenaeos, placerat vitae consectetuer porta nec lectus, vitae dolor est tortor massa. Est lacus consectetuer maecenas dui ac porttitor, sit tellus ut quis vestibulum porta, odio et. Amet modi.&lt;/li&gt;\r\n&lt;/ol&gt;', 1, NULL, '2016-08-02 13:13:56', '2016-08-02 13:13:56'),
(6, 'facebook-posts', 'Facebook posts', '0678433001470143734.jpeg', '0678458001470143734.jpeg', '&lt;p style=&quot;margin: 0.5em 0px; line-height: 22.4px; color: #252525; font-family: sans-serif; font-size: 14px;&quot;&gt;&lt;strong&gt;Facebook&lt;/strong&gt;&amp;nbsp;(stylized as&amp;nbsp;&lt;strong&gt;facebook&lt;/strong&gt;) is a for-profit&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;Corporation&quot; href=&quot;https://en.wikipedia.org/wiki/Corporation&quot;&gt;corporation&lt;/a&gt;&amp;nbsp;and online&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;Social networking service&quot; href=&quot;https://en.wikipedia.org/wiki/Social_networking_service&quot;&gt;social networking service&lt;/a&gt;&amp;nbsp;based in&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;Menlo Park, California&quot; href=&quot;https://en.wikipedia.org/wiki/Menlo_Park,_California&quot;&gt;Menlo Park, California&lt;/a&gt;, United States. The Facebook website was launched on February 4, 2004 by&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;Mark Zuckerberg&quot; href=&quot;https://en.wikipedia.org/wiki/Mark_Zuckerberg&quot;&gt;Mark Zuckerberg&lt;/a&gt;, along with fellow&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;Harvard College&quot; href=&quot;https://en.wikipedia.org/wiki/Harvard_College&quot;&gt;Harvard College&lt;/a&gt;&amp;nbsp;students and roommates,&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;Eduardo Saverin&quot; href=&quot;https://en.wikipedia.org/wiki/Eduardo_Saverin&quot;&gt;Eduardo Saverin&lt;/a&gt;,&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;Andrew McCollum&quot; href=&quot;https://en.wikipedia.org/wiki/Andrew_McCollum&quot;&gt;Andrew McCollum&lt;/a&gt;,&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;Dustin Moskovitz&quot; href=&quot;https://en.wikipedia.org/wiki/Dustin_Moskovitz&quot;&gt;Dustin Moskovitz&lt;/a&gt;, and&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;Chris Hughes&quot; href=&quot;https://en.wikipedia.org/wiki/Chris_Hughes&quot;&gt;Chris Hughes&lt;/a&gt;.&lt;sup id=&quot;cite_ref-8&quot; class=&quot;reference&quot; style=&quot;line-height: 1; unicode-bidi: isolate; white-space: nowrap; font-size: 11.2px;&quot;&gt;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; href=&quot;https://en.wikipedia.org/wiki/Facebook#cite_note-8&quot;&gt;[8]&lt;/a&gt;&lt;/sup&gt;&lt;sup id=&quot;cite_ref-9&quot; class=&quot;reference&quot; style=&quot;line-height: 1; unicode-bidi: isolate; white-space: nowrap; font-size: 11.2px;&quot;&gt;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; href=&quot;https://en.wikipedia.org/wiki/Facebook#cite_note-9&quot;&gt;[9]&lt;/a&gt;&lt;/sup&gt;&lt;sup id=&quot;cite_ref-10&quot; class=&quot;reference&quot; style=&quot;line-height: 1; unicode-bidi: isolate; white-space: nowrap; font-size: 11.2px;&quot;&gt;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; href=&quot;https://en.wikipedia.org/wiki/Facebook#cite_note-10&quot;&gt;[10]&lt;/a&gt;&lt;/sup&gt;&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0.5em 0px; line-height: 22.4px; color: #252525; font-family: sans-serif; font-size: 14px;&quot;&gt;The founders had initially limited the website''s membership to Harvard students; however, later they expanded it to&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;List of colleges and universities in metropolitan Boston&quot; href=&quot;https://en.wikipedia.org/wiki/List_of_colleges_and_universities_in_metropolitan_Boston&quot;&gt;higher education institutions in the Boston area&lt;/a&gt;, the&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;Ivy League&quot; href=&quot;https://en.wikipedia.org/wiki/Ivy_League&quot;&gt;Ivy League&lt;/a&gt;&amp;nbsp;schools, and&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;Stanford University&quot; href=&quot;https://en.wikipedia.org/wiki/Stanford_University&quot;&gt;Stanford University&lt;/a&gt;. Facebook gradually added support for students at various other universities, and eventually to high school students as well. Since 2006, anyone age 13 and older has been allowed to become a registered user of Facebook, though variations exist in the minimum age requirement, depending on applicable local laws.&lt;sup id=&quot;cite_ref-11&quot; class=&quot;reference&quot; style=&quot;line-height: 1; unicode-bidi: isolate; white-space: nowrap; font-size: 11.2px;&quot;&gt;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; href=&quot;https://en.wikipedia.org/wiki/Facebook#cite_note-11&quot;&gt;[11]&lt;/a&gt;&lt;/sup&gt;&amp;nbsp;The Facebook name comes from the&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;Face book&quot; href=&quot;https://en.wikipedia.org/wiki/Face_book&quot;&gt;face book&lt;/a&gt;&amp;nbsp;directories often given to United States university students.&lt;sup id=&quot;cite_ref-Growth_12-0&quot; class=&quot;reference&quot; style=&quot;line-height: 1; unicode-bidi: isolate; white-space: nowrap; font-size: 11.2px;&quot;&gt;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; href=&quot;https://en.wikipedia.org/wiki/Facebook#cite_note-Growth-12&quot;&gt;[12]&lt;/a&gt;&lt;/sup&gt;&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0.5em 0px; line-height: 22.4px; color: #252525; font-family: sans-serif; font-size: 14px;&quot;&gt;After registering to use the site, users can create a&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;User profile&quot; href=&quot;https://en.wikipedia.org/wiki/User_profile&quot;&gt;user profile&lt;/a&gt;, add other users as&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;Friending&quot; href=&quot;https://en.wikipedia.org/wiki/Friending&quot;&gt;&quot;friends&quot;&lt;/a&gt;, exchange messages, post status updates and photos, share videos, use various applications (apps), and receive notifications when others update their profiles. Additionally, users may join common-interest user groups organized by workplace, school, or other topics, and categorize their friends into lists such as &quot;People From Work&quot; or &quot;Close Friends&quot;. In groups, editors can pin posts to top. Additionally, users can complain about or block unpleasant people. Because of the large volume of data that users submit to the service, Facebook has come under scrutiny for their privacy policies.&lt;/p&gt;\r\n&lt;p style=&quot;margin: 0.5em 0px; line-height: 22.4px; color: #252525; font-family: sans-serif; font-size: 14px;&quot;&gt;Facebook, Inc. held its&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;Initial public offering&quot; href=&quot;https://en.wikipedia.org/wiki/Initial_public_offering&quot;&gt;initial public offering&lt;/a&gt;&amp;nbsp;(IPO) in February 2012, and began selling&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;Stock&quot; href=&quot;https://en.wikipedia.org/wiki/Stock&quot;&gt;stock&lt;/a&gt;&amp;nbsp;to the public three months later, reaching an original peak&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;Market capitalization&quot; href=&quot;https://en.wikipedia.org/wiki/Market_capitalization&quot;&gt;market capitalization&lt;/a&gt;&amp;nbsp;of $104 billion. On July 13, 2015, Facebook became the fastest company in the&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;S&amp;amp;P 500 Index&quot; href=&quot;https://en.wikipedia.org/wiki/S%26P_500_Index&quot;&gt;Standard &amp;amp; Poor''s 500 Index&lt;/a&gt;&amp;nbsp;to reach a market cap of $250 billion.&lt;sup id=&quot;cite_ref-13&quot; class=&quot;reference&quot; style=&quot;line-height: 1; unicode-bidi: isolate; white-space: nowrap; font-size: 11.2px;&quot;&gt;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; href=&quot;https://en.wikipedia.org/wiki/Facebook#cite_note-13&quot;&gt;[13]&lt;/a&gt;&lt;/sup&gt;&amp;nbsp;Facebook has more than&amp;nbsp;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; title=&quot;List of virtual communities with more than 100 million active users&quot; href=&quot;https://en.wikipedia.org/wiki/List_of_virtual_communities_with_more_than_100_million_active_users&quot;&gt;1.65 billion monthly active users&lt;/a&gt;&amp;nbsp;as of March 31, 2016.&lt;sup id=&quot;cite_ref-Facebook-Newsroom_7-1&quot; class=&quot;reference&quot; style=&quot;line-height: 1; unicode-bidi: isolate; white-space: nowrap; font-size: 11.2px;&quot;&gt;&lt;a style=&quot;text-decoration: none; color: #0b0080; background: none;&quot; href=&quot;https://en.wikipedia.org/wiki/Facebook#cite_note-Facebook-Newsroom-7&quot;&gt;[7]&lt;/a&gt;&lt;/sup&gt;&lt;/p&gt;', 1, NULL, '2016-08-02 13:15:34', '2016-08-02 13:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE IF NOT EXISTS `partners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `link`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'CEFE International', 'http://www.cefe.net', '0161687001468878440.png', 'CEFE was first formed in 1980 by the German Ministry of Economy, and from there it was spread in the world by the German Agency for International Cooperation (GIZ). CEFE is considered to be one of the most successful learning methods for adults and business development.\r\n\r\nIn the last two decades the CEFE trainings are conducted successfully in more than 130 countries around the world through developing of an international network comprising of more than 10.000 active trainers who combined have trained more than 20 million people.', '2016-07-18 21:47:20', '2016-07-18 21:47:20'),
(2, 'CEFE Philippines', 'http://cefebdsnetwork.com/', '0450407001468878612.png', 'Philippine CEFE Network (CEFENet) was founded in 1996 by 15 CEFE trainers in the Philippines. It was established as a sustainability mechanism to the Philippine-German bilateral initiative called Countryside Entrepreneurship Development Program which lasted from 1995 to 2001. CEFE activities were indeed sustained by the members,  which eventually  expanded to 52 individuals and 5 institutional organizations.  By end of 2012,  about 44 members,  all from the private sector, remained active in various enterprise development programs around the country. CEFENet provides marketing and promotion of member services,  sources funds for projects,  supports product development and initiates membership development activities. Clients have ranged from  government to donor funded agencies,  people''s organizations,  as well as large and small companies located in the Philippines and overseas (Fiji,  Indonesia, Vietnam, and Afghanistan).', '2016-07-18 21:50:12', '2016-07-18 21:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE IF NOT EXISTS `research` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `document` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `research_category_id` int(10) unsigned DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `updated_by` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `research_research_category_id_foreign` (`research_category_id`),
  KEY `research_created_by_foreign` (`created_by`),
  KEY `research_updated_by_foreign` (`updated_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`id`, `document`, `title`, `description`, `research_category_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'pdf_sample.pdf', 'GETYES INFO BROCHURE', 'Maecenas atavis edite regibus,o et praesidium et dulce decus meum:sunt quos curriculo pulverem Olympicumcollegisse iuvat metaque fervidisevitata rotis palmaque nobilisterrarum dominos evehit ad deos;', 1, 1, 1, '2016-08-02 22:56:26', '2016-08-02 23:17:08'),
(2, 'TestWordDoc.doc', 'GETYES AUGUST REPORT', 'O Mecenate, che discendi da regali antenati,o tu che sei la mia protezione ed il mio dolce decoro:ci sono quelli a cui piace avere raccolto con un cocchio la polvere di Olimpia e;', 2, 1, 1, '2016-07-02 23:18:10', '2016-08-02 23:18:29'),
(3, 'pptexamples.ppt', 'GETYES JULY REPORT', 'L''edera, premio delle menti dotte, mi unisceagli dei celesti, il fresco bosco sacro e le delicate danze delle Ninfe con i Satiri mi separanodal popolo, se Euterpe non proibiscedi suonare i flauti.', 2, 1, NULL, '2016-08-03 23:18:56', '2016-08-02 23:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `research_category`
--

CREATE TABLE IF NOT EXISTS `research_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `research_category`
--

INSERT INTO `research_category` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Brochure', '2016-08-02 15:28:32', '2016-08-02 15:28:32'),
(2, 'Report', '2016-08-02 15:28:32', '2016-08-02 15:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2016-07-13 10:30:35', '2016-07-13 12:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscriptions_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_roles_id_foreign` (`roles_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `roles_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dijana Najdovska', 'najdovskadijana@gmail.com', '$2y$10$dPWS2IfdtkrWmgNXIebfpeUp6OM0yEFXfnEoE1DBoL4AVOKTNE1qC', 1, '89wTnH4OTWQ8Rql9SlMwsAk68xCanBKGObtJogRsYDjXLVw0JwD4XjpC00fZ', '2016-07-13 20:59:01', '2016-08-08 18:33:30');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_about_category_id_foreign` FOREIGN KEY (`about_category_id`) REFERENCES `about_category` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `materials_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `news_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `research`
--
ALTER TABLE `research`
  ADD CONSTRAINT `research_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `research_research_category_id_foreign` FOREIGN KEY (`research_category_id`) REFERENCES `research_category` (`id`),
  ADD CONSTRAINT `research_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
