-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time:  3 апр 2017 в 09:33
-- Версия на сървъра: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kalimag`
--

-- --------------------------------------------------------

--
-- Структура на таблица `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `street_address` varchar(150) NOT NULL,
  `city` varchar(45) NOT NULL,
  `post_code` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `addresses`
--

INSERT INTO `addresses` (`id`, `street_address`, `city`, `post_code`) VALUES
(1, '22 avenue', 'NY', '5555'),
(2, '22 str', 'EP', '2005'),
(3, '22 ave', 'elin pelin', '55');

-- --------------------------------------------------------

--
-- Структура на таблица `baskets`
--

CREATE TABLE `baskets` (
  `users_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `baskets`
--

INSERT INTO `baskets` (`users_id`, `product_id`, `quantity`) VALUES
(2, 2, 10);

-- --------------------------------------------------------

--
-- Структура на таблица `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Телефони, Таблети, Смартфони'),
(2, 'Компютри и периферия'),
(3, 'Телевизори, електроника, гейминг'),
(4, 'Фото, видео и оптика '),
(5, 'Електроуреди'),
(6, 'Книги и офис консумативи'),
(7, 'Спорт и свободно време'),
(8, 'Дом, градина и петшоп');

-- --------------------------------------------------------

--
-- Структура на таблица `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`) VALUES
(11, 'A+'),
(12, 'Acer'),
(2, 'Apple'),
(5, 'ASUS'),
(14, 'Dell'),
(9, 'Flexy'),
(13, 'HP'),
(3, 'Huawei'),
(4, 'Lenovo'),
(7, 'LG'),
(8, 'Mercury'),
(1, 'Samsung'),
(6, 'Sony'),
(15, 'Toshiba'),
(10, 'zaGSMnet');

-- --------------------------------------------------------

--
-- Структура на таблица `minicategories`
--

CREATE TABLE `minicategories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subcategory_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `minicategories`
--

INSERT INTO `minicategories` (`id`, `name`, `subcategory_id`) VALUES
(1, 'Мобилни телефони', 1),
(2, 'Калъфи за телефони', 1),
(3, 'Защитни фолиа за телефони', 1),
(4, 'Зарядни устройства за телефони', 1),
(5, 'Батерии за телефони', 1),
(6, 'Аудио и блутут слушалки', 1),
(7, 'Карти памет', 1),
(8, 'Таблети', 2),
(9, 'Калъфи за таблети', 2),
(10, 'Защитни фолиа за таблети', 2),
(11, 'Клавитури за таблети', 2),
(12, 'Лаптопи', 3),
(13, 'Чанти за лаптопи', 3),
(14, 'Хард дискове за лаптопи', 3),
(15, 'Охладителни подложки', 3),
(16, 'Батерии', 3),
(17, 'Смарт часовници', 4),
(18, 'Фитнес гривни', 4),
(19, 'Други джаджи', 4),
(20, 'Преносими тонколони', 4),
(21, 'VR очила', 4),
(22, 'Настолни компютри', 5),
(23, 'Монитори', 5),
(24, 'Мастиленоструйни принтери', 6),
(25, 'Лазерни принтери', 6),
(26, 'Скенери', 6),
(27, 'Клавиатури', 7),
(28, 'Мишки', 7),
(29, 'Външни хард дискове', 7),
(30, 'USB  памети', 7),
(31, 'Тонколони за компютър', 7),
(32, 'Процесори', 8),
(33, 'Видео карти', 8),
(34, 'Дънни платки', 8),
(35, 'RAM памет', 8),
(36, 'Хард дискове', 8),
(37, 'SSD', 8),
(38, 'Безжични рутери', 9),
(39, 'Безжични адаптери', 9),
(40, 'Камери за наблюдение', 9),
(41, 'Сървърни системи', 9),
(42, 'Операционни системи', 10),
(43, 'Офис и десктоп приложения', 10),
(44, 'Антивирусни програми', 10),
(45, 'Телевизори', 11),
(46, 'Кабели и адаптори', 11),
(47, 'Стойки', 11),
(48, 'Видео проектори', 12),
(49, 'Проекторни екрани', 12),
(50, 'МР3 и МР4 плейъри', 13),
(51, 'Аудио слушалки', 13),
(52, 'Електрони часовници', 13),
(53, 'Дронове', 13),
(54, 'eBook четци', 13),
(55, 'Системи за домашно кино', 14),
(56, 'Аудио системи', 14),
(57, 'Саундбар', 14),
(58, 'Усилватели', 14),
(59, 'Тонколони', 14),
(60, 'Хардуер конзоли', 15),
(61, 'Игри за конзола и компютър', 15),
(62, 'Геймпадове', 15),
(63, 'Джойстици', 15),
(64, 'Аксесоари за конзоли и РС', 15),
(65, 'Гейминг столове', 15),
(66, 'Компактни фотоапарати', 16),
(67, 'Фотоапарати DSLR', 16),
(68, 'Видеокамери', 17),
(69, 'Спортни видеокамери', 17),
(70, 'Карти памет', 18),
(71, 'Стативи', 18),
(72, 'Обективи', 18),
(73, 'Светкавици', 18),
(74, 'Чанти', 18),
(75, 'Ръкавици', 18),
(76, 'Калъфи', 18),
(77, 'Раници', 18),
(78, 'Батерии', 18),
(79, 'Зарядни за батерии', 18),
(80, 'Захранване за фотоапарати и видеокамери', 18),
(81, 'Аксесоари за спортни видеокамери', 18),
(82, 'Филтри DSLR', 18),
(83, 'Четци за карти', 18),
(84, 'Дигитални фото рамки', 18),
(85, 'Лупи', 19),
(86, 'Микроскопи', 19),
(87, 'Телескопи', 19),
(88, 'Бинокли', 19),
(89, 'Хладилници с фризер', 20),
(90, 'Хладилници с една врата', 20),
(91, 'Фризери', 20),
(92, 'Хладилни витрини', 20),
(93, 'Двукрилни хладилници', 20),
(94, 'Перални с предно зареждане', 21),
(95, 'Перални с горно зареждане', 21),
(96, 'Перални със сушилни', 21),
(97, 'Сушилни', 21),
(98, 'Съдомиялни', 22),
(99, 'Съдомиялни за вграждане', 23),
(100, 'Фурни за вграждане', 23),
(101, 'Плотове за вграждане', 23),
(102, 'Готварски печки', 24),
(103, 'Микровълнови фурни', 24),
(104, 'Абсорбатори', 24),
(105, 'Прахосмукачки', 25),
(106, 'Ютии', 25),
(107, 'Парови генератори', 25),
(108, 'Месомелачки', 26),
(109, 'Кухненски роботи', 26),
(110, 'Блендери', 26),
(111, 'Миксери', 26),
(112, 'Пасатори', 26),
(113, 'Хлебопекарни', 26),
(114, 'Художествена литература', 27),
(115, 'Световни романи', 27),
(116, 'Учебна литература', 27),
(117, 'Литература за деца и юноши', 27),
(118, 'Хоби и свободно време', 27),
(119, 'Книги на английски език', 27),
(120, 'Приказки', 27),
(121, 'Приложна психология', 27),
(122, 'Фантастика, фентъзи и хорър', 27),
(123, 'Енциклопедии', 27),
(124, 'Трилъри', 27),
(125, 'Криминални романи', 27),
(126, 'Екшън', 28),
(127, 'Фантастика', 28),
(128, 'Трилър', 28),
(129, 'Анимация', 28),
(130, 'Поп', 29),
(131, 'Рок', 29),
(132, 'Джаз', 29),
(133, 'Българска музика', 29),
(134, 'Луксозни химикалки и писалки', 30),
(135, 'Химикалки', 30),
(136, 'Тефтери', 30),
(137, 'Органайзери', 30),
(138, 'Календари', 30),
(139, 'Хартия', 30),
(140, 'Шредери', 30),
(141, 'Кецове и маратонки', 31),
(142, 'Спортно облекло', 31),
(143, 'Фитнес', 32),
(144, 'Хранителни добавки', 32),
(145, 'Кростренажори', 32),
(146, 'Велоергометри', 32),
(147, 'Маратонки', 33),
(148, 'Спортна екипировка', 33),
(149, 'Футбол', 34),
(150, 'Волейбол', 34),
(151, 'Баскетбол', 34),
(152, 'Къмпинг оборудване', 35),
(153, 'Къмпинг екипировка', 35),
(154, 'Куфари', 35),
(155, 'Ски', 36),
(156, 'Сноуборд', 36),
(157, 'Комплекти градински мебели', 37),
(158, 'Градински столове и шезлонги', 37),
(159, 'Градински маси', 37),
(160, 'Хамаци', 37),
(161, 'Люлки', 37),
(162, 'Градински чадъри', 37),
(163, 'Шатри', 37),
(164, 'Коледна украса', 38),
(165, 'Спално бельо', 39),
(166, 'Възглавници', 39),
(167, 'Завивки', 39),
(168, 'Одеяла и ковертюри', 39),
(169, 'Килими', 39),
(170, 'Мивки', 40),
(171, 'Тоалетни чинии', 40),
(172, 'Смесители за баня и кухня', 40),
(173, 'Косачки', 41),
(174, 'Градински въздуходувки и прахосмукачки', 41),
(175, 'Верижни триони', 41),
(176, 'Матраци', 42),
(177, 'Холни секции', 42),
(178, 'Дивани и канапета', 42),
(179, 'Офис столове', 42),
(180, 'Крушки', 43),
(181, 'Осветителни тела', 43),
(182, 'Ударни бормашини', 44),
(183, 'Винтоверти', 44),
(184, 'Електрически триони', 44),
(185, 'Аксесоари', 44),
(186, 'Перилни препарати', 45),
(187, 'Омекотители', 45),
(188, 'Храна за кучета', 46),
(189, 'Храна за котки', 46),
(190, 'Храна за птици', 46),
(191, 'Храна за гризачи', 46),
(192, 'Храна за риби', 46),
(193, 'Храна за влечуги', 46),
(194, 'Тигани', 47),
(195, 'Тенджери', 47),
(196, 'Тави', 47),
(197, 'Ножове', 47),
(198, 'Сервизи за хранене', 47),
(199, 'Чаши', 47);

-- --------------------------------------------------------

--
-- Структура на таблица `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `orders`
--

INSERT INTO `orders` (`id`, `date`, `user_id`, `address_id`, `product_id`, `quantity`) VALUES
(22, '2017-04-03', 5, 3, 5, 5),
(23, '2017-04-03', 5, 3, 6, 6);

-- --------------------------------------------------------

--
-- Структура на таблица `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `model` varchar(60) NOT NULL,
  `minicategory_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(100) NOT NULL,
  `warranty` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `products`
--

INSERT INTO `products` (`id`, `name`, `manufacturer_id`, `model`, `minicategory_id`, `price`, `picture`, `warranty`, `quantity`) VALUES
(1, 'Смартфон', 1, 'Galaxy J5 (2016)', 1, 330, 'Samsung-J3-2016.jpg', 24, 50),
(2, 'Смартфон', 3, 'P8 Lite', 1, 300, 'huawei-p8-lite.jpg', 24, 43),
(3, 'Смартфон', 2, 'iPhone 7', 1, 1400, 'iphone7.jpg', 30, 20),
(4, 'Смартфон', 1, 'Galaxy S7 Edge', 1, 1000, 'samsung-s7-edge.jpg', 24, 30),
(5, 'Смартфон', 4, 'A7010', 1, 289, 'lenovo-a7010.jpg', 24, 50),
(6, 'Смартфон', 1, 'Galaxy A5 (2016)', 1, 500, 'samsung-a5-2016.jpg', 25, 50),
(7, 'Смартфон', 3, 'P9 Lite', 1, 450, 'huawei-P9 Lite.jpg', 24, 60),
(8, 'Смартфон', 4, 'K6', 1, 300, 'lenovo-k6.jpg', 24, 40),
(9, 'Смартфон', 5, 'ZenFone Go ZB500KL', 1, 250, 'ASUS-ZenFone-Go-ZB500KL.jpg', 24, 30),
(10, 'Смартфон', 2, 'iPhone 5S', 1, 550, 'iPhone-5S.jpg', 30, 25),
(11, 'Смартфон', 6, 'Xperia M5', 1, 500, 'xperia-m5.jpg', 30, 54),
(12, 'Смартфон', 6, 'Xperia XA', 1, 540, 'xperia-xa.jpg', 30, 48),
(13, 'Смартфон', 6, 'Xperia Z5', 1, 901, 'sony-z5.jpg', 28, 56),
(14, 'Смартфон', 7, 'G4 Dual Sim', 1, 704, 'lg-g4.jpg', 24, 7),
(15, 'Протектор', 11, 'A+ Case ultraslim за iPhone 6/6s', 2, 15, 'A+CaseultraslimiPhone6s.jpg', 3, 20),
(16, 'Протектор', 11, 'A+ Case Nude за Iphone 6/6S, Gold', 2, 17.55, 'ACaseNudIphone6Gold.jpg', 4, 74),
(17, 'Силиконов гръб', 8, 'Jelly Case Sony Xperia M4 Aqua', 2, 4.23, 'MercuryJellyCaseSonyXperM4Aqua.jpg', 0, 33),
(18, 'Силиконов гръб', 8, 'Samsung S7 Edge, Blue', 2, 1, 'SamsungS7EdgeBlue.jpg', 0, 8),
(19, 'Кожен калъф', 10, 'Flip Cover Samsung Galaxy S3 Neo', 2, 9.53, 'zagsmnetFlipCoverSamsungGalaxyS3Neo.jpg', 1, 14),
(20, 'Твърд гръб', 10, 'Огледален Huawei P9 lite&sbquo;Златист', 2, 13.71, 'zaGSMnetОгледаленHuaweiP9lite&sbquo;Златист.jpg', 2, 18),
(21, 'Вертикален Флип калъф със силиконово легло', 9, 'Samsung Galaxy J1 Mini, Черен', 2, 9.92, 'FlexSamsungGalaxyJ1Mini,Черен.jpg', 0, 25),
(22, 'Лаптоп', 5, 'X540SA-XX411', 12, 439.9, 'ASUS-X540SA-XX411.jpg', 36, 12),
(23, 'Лаптоп', 13, '15-ay008nu', 12, 471.24, 'HP 15-ay008nu.jpg', 12, 5),
(24, 'Лаптоп', 4, 'IdeaPad110', 12, 544.5, 'lenovo-IdeaPad110.jpg', 24, 17),
(25, 'Лаптоп', 14, 'Inspiron 3552', 12, 480, 'Inspiron3552.jpg', 32, 48),
(26, 'Лаптоп', 2, 'MacBook Air 13', 12, 1000000, 'MacBookAir13.jpg', 1000, 3),
(27, 'Лаптоп', 12, 'Aspire E5-774G-32AX', 12, 1001, 'AspireE5-774G-32AX.jpg', 24, 15);

-- --------------------------------------------------------

--
-- Структура на таблица `products_specification_names_specification_values`
--

CREATE TABLE `products_specification_names_specification_values` (
  `product_id` int(11) NOT NULL,
  `specification_names` varchar(50) NOT NULL,
  `specification_values` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `products_specification_names_specification_values`
--

INSERT INTO `products_specification_names_specification_values` (`product_id`, `specification_names`, `specification_values`) VALUES
(1, 'Процесор', 'Quad Core 1.2Ghz'),
(1, 'Размери (Ш x В x Д мм)', '72.3 x 145.8 x 8.1'),
(1, 'Тегло (гр)', '159'),
(1, 'Операционна система', 'Android v6.0 (Marshmallow)'),
(1, 'Вътрешна памет', '16 GB'),
(1, 'RAM памет', '2 GB'),
(1, 'Тип дисплей', 'Super AMOLED'),
(1, 'Диагонал', '5.2'),
(1, 'Oсновна камера (Mp)', '13'),
(1, 'Вторична камера (Mp)', '5'),
(1, 'Батерия', '3100 mAh'),
(2, 'Процесор', 'Octa Core 1.2GHz'),
(2, 'Размери (Ш x В x Д мм)', '70.6 x 143 x 7.7'),
(2, 'Операционна система', 'Android v5.0 (Lollipop)'),
(2, 'Вътрешна памет', '16 GB'),
(2, 'RAM памет', '2 GB'),
(2, 'Тип дисплей', 'IPS LSD'),
(2, 'Диагонал', '5.0'),
(2, 'Oсновна камера (Mp)', '13'),
(2, 'Вторична камера (Mp)', '13'),
(2, 'Батерия', '2200 mAh'),
(3, 'Процесор', 'A10 Fusion'),
(3, 'Размери (Ш x В x Д мм)', '67.1 x 138.3 x 7.1'),
(3, 'Тегло (гр)', '138'),
(3, 'Операционна система', 'iOS 10'),
(3, 'Вътрешна памет', '32 GB'),
(3, 'Тип дисплей', 'IPS LCD'),
(3, 'Диагонал', '4,7'),
(3, 'Основна камера (Mp)', '12'),
(3, 'Вторична камера (Mp)', '7'),
(3, 'Батерия', 'до 240 часа'),
(4, 'Процесор', '2 x Quad Core, 2.3GHz + 1.6Ghz'),
(4, 'Размери (Ш x В x Д мм)', '72.6 x 150.9 x 7.7'),
(4, 'Тегло (гр)', '157'),
(4, 'Операционна система', 'Android v6.0 (Marshmallow)'),
(4, 'Вътрешна памет', '32 GB'),
(4, 'RAM памет', '4 GB'),
(4, 'Тип дисплей', 'Super AMOLED'),
(4, 'Диагонал', '5.5'),
(4, 'Основна камера (Mpх)', '12'),
(4, 'Вторична камера (Mpх)', '5'),
(4, 'Батерия', '3600 mAh'),
(5, 'Процесор', 'Mediatek MT6753 Octa-Core, 1.3GHz'),
(5, 'Размери (Ш x В x Д мм)', '76.5 x 153.6 x 9'),
(5, 'Тегло (гр)', '160'),
(5, 'Операционна система', 'Android v5.1 (Lollipop)'),
(5, 'Вътрешна памет', '32 GB'),
(5, 'RAM памет', '2 GB'),
(5, 'Тип дисплей', 'Full HD IPS'),
(5, 'Диагонал', '5.5'),
(5, 'Основна камера (Mpх)', '13'),
(5, 'Вторична камера (Mpх)', '5'),
(5, 'Батерия', '3300 mAh'),
(6, 'Процесор', 'Octa-Core, 1.6GHz'),
(6, 'Размери (Ш x В x Д мм)', '71 x 144.8 x 7.3'),
(6, 'Тегло (гр)', '155'),
(6, 'Операционна система', 'Android v5.1 (Lollipop)'),
(6, 'Вътрешна памет', '16 GB'),
(6, 'RAM памет', '2 GB'),
(6, 'Тип дисплей', 'Super AMOLED'),
(6, 'Диагонал', '5.2'),
(6, 'Основна камера (Mpх)', '13'),
(6, 'Вторична камера (Mpх)', '5'),
(6, 'Батерия', '2900 mAh'),
(7, 'Процесор', '2 x Quad Core, 2GHz + 1.7GHz'),
(7, 'Размери (Ш x В x Д мм)', '72.6 x 146.8 x 7.5 mm'),
(7, 'Тегло (гр)', '147'),
(7, 'Операционна система', 'Android v6.0 (Marshmallow)'),
(7, 'Вътрешна памет', '16 GB'),
(7, 'RAM памет', '2 GB'),
(7, 'Тип дисплей', 'IPS LCD'),
(7, 'Диагонал', '5.2'),
(7, 'Основна камера (Mpх)', '13'),
(7, 'Вторична камера (Mpх)', '8'),
(7, 'Батерия', '3000 mAh'),
(8, 'Процесор', 'Qualcomm Snapdragon 430 Octa Core, 1.4GHz'),
(8, 'Размери (Ш x В x Д мм)', '70.3 x 141.9 x 8.2'),
(8, 'Тегло (гр)', '140'),
(8, 'Операционна система', 'Android v6.0 (Marshmallow)'),
(8, 'Вътрешна памет', '16 GB'),
(8, 'RAM памет', '2 GB'),
(8, 'Тип дисплей', 'IPS'),
(8, 'Диагонал', '5'),
(8, 'Основна камера (Mpх)', '13'),
(8, 'Вторична камера (Mpх)', '8'),
(8, 'Батерия', '3000 mAh'),
(9, 'Процесор', 'Qualcomm MSM8916 Quad-Core, 1GHz'),
(9, 'Размери (Ш x В x Д мм)', '70.8 x 143.7 x 11.2'),
(9, 'Тегло (гр)', '150'),
(9, 'Операционна система', 'Android v6.0 (Marshmallow)'),
(9, 'Вътрешна памет', '16 GB'),
(9, 'RAM памет', '2 GB'),
(9, 'Тип дисплей', 'IPS'),
(9, 'Диагонал', '5'),
(9, 'Основна камера (Mpх)', '13'),
(9, 'Вторична камера (Mpх)', '5'),
(9, 'Батерия', '2600 mAh'),
(10, 'Процесор', 'A7 64-bit (копроцесор M7 motion)'),
(10, 'Размери (Ш x В x Д мм)', '58,6 х 123,8 х 7.6'),
(10, 'Тегло (гр)', '112'),
(10, 'Вътрешна памет', '16 GB'),
(10, 'RAM памет', '1 GB'),
(10, 'Тип дисплей', 'Retina display'),
(10, 'Диагонал', '4'),
(10, 'Основна камера (Mpх)', '8'),
(10, 'Вторична камера (Mpх)', '1.2'),
(10, 'Батерия', '250 часа'),
(11, 'Процесор', 'Octa Core, 2.0 GHz Cortex-A53'),
(11, 'Размери (Ш x В x Д мм)', '72 x 145 x 7.6 mm'),
(11, 'Тегло (гр)', '142.5'),
(11, 'Операционна система', 'Android'),
(11, 'Вътрешна памет', '16 GB'),
(11, 'RAM памет', '3 GB'),
(11, 'Тип дисплей', 'Full-HD IPS LCD capacitive touchscreen'),
(11, 'Диагонал', '5'),
(11, 'Основна камера (Mpх)', '21.5'),
(11, 'Вторична камера (Mpх)', '13 MP'),
(11, 'Батерия', '2600 mAh'),
(12, 'Процесор', '2 x Helio P10 Octa Core, 2GHz +1GHz'),
(12, 'Размери (Ш x В x Д мм)', '66.8 x 143.6 x 7.9'),
(12, 'Тегло (гр)', '138'),
(12, 'Операционна система', 'Android v6.0 (Marshmallow)'),
(12, 'Вътрешна памет', '16 GB'),
(12, 'RAM памет', '2 GB'),
(12, 'Тип дисплей', 'IPS LCD'),
(12, 'Диагонал', '5'),
(12, 'Основна камера (Mpх)', '13'),
(12, 'Вторична камера (Mpх)', '8'),
(12, 'Процесор', '2300 mAh'),
(15, 'Материал', 'Силикон'),
(16, 'Материал', 'Пластмаса'),
(17, 'Материал', 'TPU'),
(18, 'Материал', 'TPU'),
(19, 'Материал', 'Пластмаса, Естествена кожа'),
(20, 'Материал', 'Пластмасa, Алуминий'),
(21, 'Материал', 'Кожа, Силикон'),
(22, 'Процесор', 'Intel Celeron Dual Core, 1.6GHz up to 2.48GHz'),
(22, 'Тип дисплей', 'LCD LED'),
(22, 'Диагонал', '15.6'),
(22, 'Хард диск', '1TB HDD'),
(22, 'RAM памет', '4GB DDR3'),
(22, 'Видео карта', 'Intel HD Graphics 400'),
(22, 'Батерия', 'Li Ion 3 клетки'),
(22, 'Размери (Ш x В x Д мм)', '381.4 x 25.4 x 251.5'),
(22, 'Тегло (kg)', '1.9'),
(22, 'Материал на корпуса', 'Пластмаса'),
(22, 'Операционна система', 'Windows 98'),
(23, 'Процесор', 'Intel Pentium Quad Core, 1.6GHz up to 2.56GHz'),
(23, 'Тип дисплей', 'LCD LED'),
(23, 'Диагонал', '15.6'),
(23, 'Хард диск', '1TB HDD'),
(23, 'RAM памет', '8GB'),
(23, 'Видео карта', 'AMD Radeon R5 M430 2GB'),
(23, 'Батерия', 'Li Ion 4 клетки'),
(23, 'Тегло (kg)', '2.04'),
(23, 'Материал на корпуса', 'Пластмаса'),
(23, 'Операционна система', 'Ubunto'),
(24, 'Процесор', 'Intel Pentium Quad-Core, 1.6GHz up to 2.56GHz'),
(24, 'Тип дисплей', 'LCD LED'),
(24, 'Диагонал', '15.6'),
(24, 'Хард диск', '1TB HDD'),
(24, 'RAM памет', '4GB DDR3L'),
(24, 'Видео карта', 'Intel HD Graphics 405'),
(24, 'Батерия', 'Li Ion 3 клетки'),
(24, 'Размери (Ш x В x Д мм)', '378 x 22.9 x 265'),
(24, 'Тегло (kg)', '2.2'),
(24, 'Материал на корпуса', 'Пластмаса'),
(24, 'Операционна система', 'Kobunto'),
(25, 'Процесор', 'Intel Celeron N3060 1.60 GHz'),
(25, 'Тип дисплей', 'LCD LED'),
(25, 'Диагонал', '15.6'),
(25, 'Хард диск', '500GB HDD'),
(25, 'RAM памет', '4GB DDR3L'),
(25, 'Видео карта', 'Intel HD Graphics 400'),
(25, 'Батерия', 'Li Ion 4 клетки'),
(25, 'Размери (Ш x В x Д мм)', '376.4 x 24.6 - 23.2 x 259'),
(25, 'Тегло (kg)', '2.2'),
(25, 'Материал на корпуса', 'Пластмаса'),
(25, 'Операционна система', 'Free DOS'),
(26, 'Процесор', 'Intel Heca Core i15 350GHz'),
(26, 'Тип дисплей', 'LCD LED'),
(26, 'Диагонал', '13.3'),
(26, 'Хард диск', '128GB SSD'),
(26, 'RAM памет', '8GB LPDDR3'),
(26, 'Видео карта', 'Intel HD Graphics 6000+'),
(26, 'Батерия', 'Li-Polymer'),
(26, 'Размери (Ш x В x Д мм)', '325 x 3 - 17 x 227'),
(26, 'Тегло (kg)', '1.35'),
(26, 'Материал на корпуса', 'Алуминий'),
(26, 'Операционна система', 'Mac OS X El Capitan'),
(27, 'Процесор', 'Intel Core i3-6100U 2.30GHz'),
(27, 'Тип дисплей', 'LCD LED'),
(27, 'Диагонал', '17.3'),
(27, 'Хард диск', '128GB SSD'),
(27, 'RAM памет', '4GB DDR4'),
(27, 'Видео карта', 'NVIDIA GeForce GTX 950M'),
(27, 'Батерия', 'Li Ion 6 клетки'),
(27, 'Размери (Ш x В x Д мм)', '423.3 x 33.1 - 27.58 x 281.9'),
(27, 'Тегло (kg)', '3.3'),
(27, 'Материал на корпуса', 'Пластмаса'),
(27, 'Операционна система', 'Linux');

-- --------------------------------------------------------

--
-- Структура на таблица `specification_names`
--

CREATE TABLE `specification_names` (
  `id` int(11) NOT NULL,
  `specification_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `specification_names`
--

INSERT INTO `specification_names` (`id`, `specification_name`) VALUES
(14, 'RAM памет (GB)'),
(12, 'Видео резолюция'),
(3, 'Вторична камера (Mpx)'),
(13, 'Вътрешна памет (GB)'),
(9, 'Диагонал на дисплея (инч)'),
(5, 'Модел процесор'),
(4, 'Мрежа'),
(11, 'Операционна система'),
(2, 'Основна камера (Mpх)'),
(8, 'Размери (Ш х В х Д мм)'),
(15, 'Резолюция (px)'),
(10, 'Тегло (гр)'),
(16, 'Тип дисплей'),
(7, 'Цвят'),
(6, 'Честота на процесора (GHz)');

-- --------------------------------------------------------

--
-- Структура на таблица `specification_values`
--

CREATE TABLE `specification_values` (
  `id` int(11) NOT NULL,
  `specification_value` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `specification_values`
--

INSERT INTO `specification_values` (`id`, `specification_value`) VALUES
(3, '1.2'),
(14, '1080p'),
(11, '1280 x 720'),
(12, '13'),
(6, '159'),
(8, '16'),
(9, '2'),
(15, '3100'),
(1, '4G'),
(13, '5'),
(16, '5.2'),
(5, '72.3 x 145.8 x 8.1'),
(7, 'Android v6.0 (Marshmallow)'),
(2, 'Quad Core'),
(10, 'Super AMOLED'),
(4, 'Черен');

-- --------------------------------------------------------

--
-- Структура на таблица `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `category_id`) VALUES
(1, 'Мобилни телефони и аксесоари', 1),
(2, 'Таблети и аксесоари', 1),
(3, 'Лаптопи и аксесоари', 1),
(4, 'Джаджи, смарт технологии и смартчасовници', 1),
(5, 'Настолни компютри и монитори', 2),
(6, 'Принтери и скенери', 2),
(7, 'Периферия', 2),
(8, 'РС компоненти', 2),
(9, 'Wireless & Networking', 2),
(10, 'Software', 2),
(11, 'Телевизори и аксесоари', 3),
(12, 'Видео проектори и екрани', 3),
(13, 'Електроника', 3),
(14, 'Системи за домашно кино и аудио Hi-Fi', 3),
(15, 'Конзоли и игри', 3),
(16, 'Фотоапарати', 4),
(17, 'Видеокамери', 4),
(18, 'Фото и видео аксесоари', 4),
(19, 'Оптика и астрономия', 4),
(20, 'Хладилна техника', 5),
(21, 'Перални и сушилни за дрехи', 5),
(22, 'Съдомиялни', 5),
(23, 'Уреди за вграждане', 5),
(24, 'Готварски печки и микровълнови', 5),
(25, 'Прахосмукачки и ютии', 5),
(26, 'Кухненски уреди', 5),
(27, 'Онлайн книжарница', 6),
(28, 'Филми', 6),
(29, 'Музика', 6),
(30, 'Офис консумативи', 6),
(31, 'Свободно време', 7),
(32, 'Фитнес и хранителни добавки', 7),
(33, 'Атлетика и бягане', 7),
(34, 'Отборни спортове', 7),
(35, 'Къмпинг артикули', 7),
(36, 'Зимни спортове', 7),
(37, 'Градински мебели', 8),
(38, 'Коледна украса', 8),
(39, 'Домашен текстил и килими', 8),
(40, 'Санитария', 8),
(41, 'Градинска техника', 8),
(42, 'Мебели и матраци', 8),
(43, 'Осветление и електроматериали', 8),
(44, 'Електрическо оборудване', 8),
(45, 'Почистване и поддръжка', 8),
(46, 'За домашните любимци', 8),
(47, 'Готвене и сервиране', 8);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `is_subscribed` tinyint(1) NOT NULL DEFAULT '0',
  `picture` varchar(100) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `phone`, `is_subscribed`, `picture`, `address_id`) VALUES
(1, 'ali_ch@abv.bg', '1234', 'Ali', 'Cholak', '0885400000', 0, '356a192b7913b04c54574d18c28d46e6395428ab.jpg', 1),
(2, 'asan@abv.bg', '1234', 'Angelinka', '', '', 0, NULL, NULL),
(3, 'minch@abv.bg', '1234', 'Минчо', 'Минчев', '0000000', 0, NULL, 2),
(4, 'dsa@abv.bg', '1234', '', '', '', 0, NULL, NULL),
(5, 'minka@abv.bg', '1234', 'Минка', 'Свирчока', '0888888888', 0, 'ac3478d69a3c81fa62e60f5c3696165a4e5e6ac4.jpg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`users_id`,`product_id`),
  ADD KEY `fk_baskets_products1_idx` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `minicategories`
--
ALTER TABLE `minicategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_minicategories_subcategories` (`subcategory_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_users1_idx` (`user_id`),
  ADD KEY `fk_orders_addresses1_idx` (`address_id`),
  ADD KEY `fk_orders_products1_idx` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `model_UNIQUE` (`model`),
  ADD KEY `fk_products_subcategories1_idx` (`minicategory_id`),
  ADD KEY `fk_products_manufacturers_idx` (`manufacturer_id`);

--
-- Indexes for table `products_specification_names_specification_values`
--
ALTER TABLE `products_specification_names_specification_values`
  ADD KEY `fk_productId_products_idx` (`product_id`);

--
-- Indexes for table `specification_names`
--
ALTER TABLE `specification_names`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `specification_name_UNIQUE` (`specification_name`);

--
-- Indexes for table `specification_values`
--
ALTER TABLE `specification_values`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `specification_value_UNIQUE` (`specification_value`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_subcategories_categories1_idx` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_users_addresses_idx` (`address_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `minicategories`
--
ALTER TABLE `minicategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `specification_names`
--
ALTER TABLE `specification_names`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `specification_values`
--
ALTER TABLE `specification_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `baskets`
--
ALTER TABLE `baskets`
  ADD CONSTRAINT `fk_baskets_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_baskets_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения за таблица `minicategories`
--
ALTER TABLE `minicategories`
  ADD CONSTRAINT `fk_minicategories_subcategories` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Ограничения за таблица `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_addresses1` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения за таблица `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_manufacturers_products` FOREIGN KEY (`manufacturer_id`) REFERENCES `manufacturers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_subcategories1` FOREIGN KEY (`minicategory_id`) REFERENCES `minicategories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения за таблица `products_specification_names_specification_values`
--
ALTER TABLE `products_specification_names_specification_values`
  ADD CONSTRAINT `fk_productId_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения за таблица `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `fk_subcategories_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения за таблица `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_addresses` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
