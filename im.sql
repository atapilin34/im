-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 07 2025 г., 22:21
-- Версия сервера: 5.6.51
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `im`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Category`
--

CREATE TABLE `Category` (
  `ID` int(11) NOT NULL,
  `Category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Category`
--

INSERT INTO `Category` (`ID`, `Category`) VALUES
(1, 'Electronic'),
(2, 'Clothes');

-- --------------------------------------------------------

--
-- Структура таблицы `Goods`
--

CREATE TABLE `Goods` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descr` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Amount` int(11) DEFAULT '0',
  `Price` int(11) DEFAULT '0',
  `Category` int(4) DEFAULT '0',
  `Picture` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Goods`
--

INSERT INTO `Goods` (`ID`, `Name`, `Descr`, `Amount`, `Price`, `Category`, `Picture`) VALUES
(1, 'Телевизор Sony FullHD', 'ТВ производство Япония, на рынке не первый год', 5, 50000, 1, '/assets/img/sony.jpg'),
(2, 'Телевизор LG FullHD', 'ТВ производство Корея, на рынке не первый год', 100, 40000, 1, '/assets/img/lg.jpg'),
(3, 'Куртка вельветовая', 'Легкая куртка для комфортного времяпровождения на природе', 36, 3000, 2, '/assets/img/kurtked9.jpg'),
(4, 'Рубашка поло', 'Легкая рубашка для комфортного времяпровождения на природе', 82, 1500, 2, '/assets/img/rubashka1.jpg,\r\n/assets/img/rubashka1.jpg'),
(5, 'Футболка поло красная', 'Легкая футболка для комфортного времяпровождения на природе', 62, 1500, 2, '/assets/img/football1.jpg'),
(6, 'Футболка поло синяя', 'Легкая футболка для комфортного времяпровождения на природе', 87, 1500, 2, '/assets/img/football2.jpg'),
(7, 'Футболка поло жёлтая', 'Легкая футболка для комфортного времяпровождения на природе', 100, 1500, 2, '/assets/img/football3.jpg'),
(8, 'Футболка поло розовая', 'Легкая футболка для комфортного времяпровождения на природе', 95, 1500, 2, '/assets/img/football4.jpg'),
(9, 'Рубашка поло бежевая', 'Легкая рубашка для комфортного времяпровождения на природе', 100, 1500, 2, '/assets/img/rubashka2.jpg'),
(10, 'Куртка хлопковая', 'Легкая куртка для комфортного времяпровождения на природе', 88, 1700, 2, '/assets/img/kurtked8.jpg'),
(11, 'Брюки хлопковые', 'Легкие брюки для комфортного времяпровождения на природе', 50, 1980, 2, '/assets/img/shtani1.jpg'),
(12, 'Джинсы Levins', 'Джинсы для комфортного времяпровождения на природе', 75, 2100, 2, '/assets/img/jeans2.jpg'),
(13, 'Куртка Lewis', 'Легкая куртка для комфортного времяпровождения на природе', 30, 2400, 2, '/assets/img/kurtked7.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Goods`
--
ALTER TABLE `Goods`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Goods`
--
ALTER TABLE `Goods`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
