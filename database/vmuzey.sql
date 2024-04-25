-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 19 2024 г., 19:29
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `vmuzey`
--

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE `city` (
  `ID` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `SRC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`ID`, `NAME`, `SRC`) VALUES
(2, 'Санкт-Петербург', 'img/city/6608b1f35c646.svg'),
(3, 'Москва', 'img/city/6608b32441f7c.svg'),
(4, 'Крым', 'img/city/6608b368c91f6.svg'),
(5, 'Казань', 'img/city/6608b3f57b464.svg'),
(6, 'Волгоград', 'img/city/6608b42a4f341.svg'),
(7, 'Ярославль', 'img/city/6608b43dabb60.svg'),
(8, 'Владимир', 'img/city/6608b459a6bf1.svg'),
(9, 'Калининград', 'img/city/6608b472df0a7.svg'),
(10, 'Великий Новгород', 'img/city/6608b4892d0d4.svg'),
(11, 'Нижний Новгород', 'img/city/6608b4d23ed0d.svg'),
(12, 'Псков', 'img/city/6608b4f845559.svg'),
(13, 'Тула', 'img/city/6608b50fca502.svg'),
(14, 'Рязань', 'img/city/6608b52b42ac7.svg');

-- --------------------------------------------------------

--
-- Структура таблицы `favorite`
--

CREATE TABLE `favorite` (
  `ID` int NOT NULL,
  `USERID` int NOT NULL,
  `PRODID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `favorite`
--

INSERT INTO `favorite` (`ID`, `USERID`, `PRODID`) VALUES
(4, 1, 5),
(5, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `ID` int NOT NULL,
  `IDUSER` int NOT NULL,
  `PRODNAME` varchar(255) NOT NULL,
  `TICKETTYPE` varchar(255) NOT NULL,
  `SUM` int NOT NULL,
  `SERVICE` int NOT NULL,
  `AMOUNTSUM` int NOT NULL,
  `SURNAMEUSER` varchar(255) NOT NULL,
  `NAMEUSER` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `NUMBER` varchar(255) NOT NULL,
  `STATUS` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`ID`, `IDUSER`, `PRODNAME`, `TICKETTYPE`, `SUM`, `SERVICE`, `AMOUNTSUM`, `SURNAMEUSER`, `NAMEUSER`, `EMAIL`, `NUMBER`, `STATUS`) VALUES
(1, 0, 'Музей Аптека доктора Пеля', 'Обзорная экскурсия по музею', 1500, 150, 1650, 'Иванов', 'Иван', 'ivan@mail.ru', '+79998887766', 2),
(2, 0, 'Музей Аптека доктора Пеля', 'Обзорная экскурсия по музею', 500, 50, 550, 'Пеля', 'Музей Аптека', 'ivan@mail.ru', '+79316398699', 1),
(3, 1, 'Музей Аптека доктора Пеля', 'Обзорная экскурсия по музею', 500, 50, 550, 'Иванов', 'Иван', 'ivan@mail.ru', '+79316398699', 1),
(4, 1, 'Музей Аптека доктора Пеля', 'Обзорная экскурсия по музею', 1500, 150, 1650, 'Иванов', 'Иван', 'ivan@mail.ru', '+79316398699', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `order_item`
--

CREATE TABLE `order_item` (
  `ID` int NOT NULL,
  `IDORDER` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `VALUE` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `order_item`
--

INSERT INTO `order_item` (`ID`, `IDORDER`, `NAME`, `VALUE`) VALUES
(1, 1, 'Взрослые (граждане РФ)', 3),
(2, 2, 'Взрослые (граждане РФ)', 1),
(3, 3, 'Взрослые (граждане РФ)', 1),
(4, 4, 'Взрослые (граждане РФ)', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `ID` int NOT NULL,
  `CATID` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `CITYID` int NOT NULL,
  `ADDRESS` varchar(255) NOT NULL,
  `TIME` varchar(255) NOT NULL,
  `NUMBER` varchar(255) NOT NULL,
  `MAIL` varchar(255) NOT NULL,
  `SITE` varchar(255) NOT NULL,
  `TEXT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`ID`, `CATID`, `NAME`, `CITYID`, `ADDRESS`, `TIME`, `NUMBER`, `MAIL`, `SITE`, `TEXT`) VALUES
(2, 1, 'Музей Аптека доктора Пеля', 2, '7-я линия Васильевского острова, 16-18', '12:00-20:00', '+79316398699', 'info@aptekapelya.ru', 'aptekapelya.ru', 'Музей-аптека доктора Пеля – старейшая аптека Санкт-Петербурга, поставщик двора Его Императорского Величества, с 1760 года располагается на Васильевском острове. В музейный комплекс входит сохранившееся помещение аптеки 19 века с антикварной мебелью - торговым прилавком, аптечными шкафами и более тремя сотнями экспонатов, среди которых найдутся старинные лекарства в гербовых флаконах, фармацевтическая реклама 18-19 веков, медицинские инструменты разных эпох. Особое внимание любители мистики уделяют алхимической лаборатории аптекарей Пелей. Гости музея также могут посетить действующее бомбоубежище времен блокадного Ленинграда. Главная загадка Васильевского острова – знаменитая Башня грифонов, тоже имеет отношение к аптеке. Согласно городским легендам, на ней до сих пор живут грифоны аптекаря Пеля. Увидеть башню и загадать желание может каждый посетитель музея! Интерьеры Аптеки Пеля встречаются во многих фильмах, телесериалах, фотосессиях и туристических гайдах. Вас ждёт погружение в мир тайн и загадок аптечного мира, интересные истории о дружбе Пелей с Менделеевым, Чеховым, Павловым и многими другими знаменитостями своего времени! В нашем музее интересно и взрослым и детям, потому что мы любим свою историю и рассказываем её так, чтобы каждый почувствовал себя горожанином 19 века, окунувшись в историю Петербурга и великих открытий замечательных ученых и новаторов своего времени!'),
(5, 1, 'Музей занимательных наук \"Экспериментаниум\"', 3, 'Ленинградский проспект, 80к11', '09:30 - 19:00', '+74951200520', 'enjoy@experimentanium.ru', 'experimentanium.ru', '«Экспериментаниум» – частный музей науки в Москве, открывшийся в 2011 году.\r\n\r\nЭкспозиция музея демонстрирует законы точных наук (электричество, механика, оптика и другое) и явлений окружающего мира и охватывает основные разделы школьного курса.\r\n\r\nКоллекция «Экспериментаниума» состоит из более 300 интерактивных экспонатов, около 80 % из них изготовлены в самом музее. Экспозиция регулярно обновляется, в том числе экспонатами из аналогичных мировых научных музеев и научных центров. Выставка занимает три этажа музея общей площадью 3 500 м² и поделена на 7 разделов: анатомия, механика, оптика, акустика, гидравлика, электромагнетизм и автомобилестроение. На экспозициях представлены образцы машин, механизмов и устройств, многие из которых приводятся в действие с помощью рычага или магнита.\r\n\r\nЗдесь проходят увлекательные научные шоу, мастер-классы и образовательные программы для исследователей всех возрастов.\r\n\r\nКак образуется торнадо? Как Леонардо да Винчи построил мост без единого гвоздя? Что такое тепловизор? Умеют ли магниты летать, а маятники – рисовать? На эти и многие другие вопросы можно найти ответ в Музее занимательных наук «Экспериментаниум», который принимает любознательных посетителей.\r\n\r\nУ «Экспериментаниума» есть лицензия учреждения дополнительного образования, чтобы поддерживать это направление. В музее проводятся занимательные уроки для школьников.\r\n\r\nВ «Экспериментаниуме» знакомство с наукой превращается в невероятно интересный процесс.');

-- --------------------------------------------------------

--
-- Структура таблицы `products_img`
--

CREATE TABLE `products_img` (
  `ID` int NOT NULL,
  `PRODID` int NOT NULL,
  `SRC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products_img`
--

INSERT INTO `products_img` (`ID`, `PRODID`, `SRC`) VALUES
(1, 2, 'img/products/6609470a895de.JPG'),
(2, 2, 'img/products/66094711eb375.jpg'),
(3, 2, 'img/products/660947164e394.JPG'),
(4, 2, 'img/products/6609471beca50.JPG'),
(9, 5, 'img/products/6609e0606bf72.jpg'),
(10, 5, 'img/products/6609e063541ca.jpg'),
(11, 5, 'img/products/6609e067034d6.jpg'),
(12, 5, 'img/products/6609e06a650f0.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `products_tickets_category`
--

CREATE TABLE `products_tickets_category` (
  `ID` int NOT NULL,
  `PRODID` int NOT NULL,
  `IDTYPE` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `PRICE` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products_tickets_category`
--

INSERT INTO `products_tickets_category` (`ID`, `PRODID`, `IDTYPE`, `NAME`, `PRICE`) VALUES
(6, 2, 1, 'Взрослые (граждане РФ)', 500),
(7, 5, 12, 'Взрослые (граждане РФ)', 850),
(8, 5, 12, 'Детский', 850),
(9, 5, 13, 'Взрослые (граждане РФ)', 950),
(10, 5, 13, 'Взрослые (Foreigner-иностранные граждане)', 950);

-- --------------------------------------------------------

--
-- Структура таблицы `products_tickets_type`
--

CREATE TABLE `products_tickets_type` (
  `ID` int NOT NULL,
  `PRODID` int NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `MINPRICE` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `products_tickets_type`
--

INSERT INTO `products_tickets_type` (`ID`, `PRODID`, `NAME`, `MINPRICE`) VALUES
(1, 2, 'Обзорная экскурсия по музею', 500),
(12, 5, 'Детский билет (экспозиция)', 850),
(13, 5, 'Взрослый билет (экспозиция)', 950);

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `ID` int NOT NULL,
  `USERID` int NOT NULL,
  `PHONE` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `QUESTION` text NOT NULL,
  `ANSWER` text NOT NULL,
  `VISIBLE` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`ID`, `USERID`, `PHONE`, `EMAIL`, `NAME`, `QUESTION`, `ANSWER`, `VISIBLE`) VALUES
(4, 0, '+79998887766', 'ivan@mail.ru', 'Иван', 'Что мне делать с электронным билетом?', 'Просто предъявите его на контроле в электронном или распечатанном виде и проходите.', 1),
(5, 0, '+79998887766', 'ivan@mail.ru', 'Иван', 'Я купил льготный билет. Нужно ли мне его обменивать в кассе?', 'Льготный билет не нужно обменивать в кассе. Будьте готовы, что контролер запросит у Вас документ подтверждающий льготу. В случае отсутствия документа подтверждающего льготу, организатор вправе отказать в проходе.', 1),
(6, 0, '+79998887766', 'ivan@mail.ru', 'Иван', 'Бесплатный билет для ребенка нужно обменивать?', 'Не нужно. Если ребенок выглядит старше своего возраста, контролер вправе потребовать от Вас документ, подтверждающий льготу (свидетельство о рождении / паспорт ребенка, если вход бесплатен для граждан до 16/18 лет) и удостовериться в присутствии сопровождающего ребенка лица.', 1),
(7, 0, '+79998887766', 'ivan@mail.ru', 'Иван', 'Мне нужно стоять в очереди?', 'Как правило, в музеях по электронным билетам вход без очереди. Многие крупные музеи имеют отдельный вход для покупателей электронного билета. Уточните в разделе \"Удобства\" в музее, предоставляет ли музей отдельный вход и как можно через него войти. Возможны случаи, когда очередь собирается на конкретную экспозицию, но и там очередь Вас не заставит ожидать, т.к. проход одного посетителя не составит более 3-6 секунд.', 1),
(8, 0, '+79998887766', 'ivan@mail.ru', 'Иван', 'Чек об оплате – это и есть электронный билет?', 'Вам на почту придет 3 письма. В двух из писем будет электронный чек оператора фискальных данных, который не является билетом и не дает возможности прохода, второе письмо будет содержать билет с QR-кодом, который и предъявляется для прохода на контроле организатора.', 1),
(9, 0, '+79998887766', 'ivan@mail.ru', 'Иван', 'Можно поменять билет, перенести дату/время?', 'Поменять билет или перенести дату/время нельзя. Вы можете вернуть билет и приобрести новый. Мы постоянно совершенствуем систему для удобства пользователей, и в скором времени такая возможность появится без необходимости возврата билетов у организатора.', 1),
(10, 0, '+79998887766', 'ivan@mail.ru', 'Иван', 'Я купил билеты на сайте, я могу их вернуть в кассе музея?', 'К сожалению, вернуть билеты на кассе музея у Вас не получится. Войдите в свой профиль и верните билеты в разделе \"Мои билеты\".', 1),
(11, 0, '+79998887766', 'ivan@mail.ru', 'Иван', 'Я опаздываю, смогу я пройти по своему билету с интервалом? А если я приеду раньше, меня пустят?', 'Музей оставляет за собой право не пустить Вас раньше или позже времени указанного на билете. Помните, контролер не сможет считать билет вне отведенного интервала.', 1),
(12, 0, '+79998887766', 'ivan@mail.ru', 'Иван', 'Билет купил я, а пойдет другой человек, его пустят?', 'Да, если билет не именной. Если же билет именной, то организатор вправе отказать в доступе. Информацию о статусе билета \"именной/не именной\" Вы получаете при покупке билета, а также сможете найти в \"Информации для посещения\" в приобретенном билете.', 1),
(13, 0, '+79998887766', 'ivan@mail.ru', 'Иван', 'Абонемент купил я, а пойдет другой человек, его пустят?', 'Нет, все абонементы являются именными. При предъявлении абонемента, организатор вправе потребовать документ, удостоверяющий личность.', 1),
(14, 0, '+79998887766', 'ivan@mail.ru', 'Иван', 'Электронный заказ оформлен на меня, может ли другой человек получить по нему билеты в кассе?', 'В получении билета на кассе нет необходимости. Вы, или другой человек сможет пройти минуя кассу, если же организатор не установил билет как именной. В таком случае Вы сможете пройти только по документу удостоверяющему личность.', 1),
(15, 0, '+79998887766', 'ivan@mail.ru', 'Иван', 'У меня в электронном заказе несколько билетов, можно вернуть только один из них?', 'Да, вернуть можно как один билет, так и весь заказ целиком. Для этого перейдите на страницу Вашего профиля.', 1),
(16, 0, '+79998887766', 'ivan@mail.ru', 'Иван', 'Я могу купить электронный билет на сегодня?', 'Если билеты на сегодняшний день у организатора имеются, Вы сможете купить билет и через 5-10 минут пройти по нему. Билет придет к Вам на указанную электронную почту.', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int NOT NULL,
  `LOGIN` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `SURNAME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `NUMBER` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `LOGIN`, `PASSWORD`, `NAME`, `SURNAME`, `EMAIL`, `NUMBER`) VALUES
(1, 'user', 'u', 'Иванов', 'Иван', 'ivan@mail.ru', '+79316398699');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products_img`
--
ALTER TABLE `products_img`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products_tickets_category`
--
ALTER TABLE `products_tickets_category`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `products_tickets_type`
--
ALTER TABLE `products_tickets_type`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `city`
--
ALTER TABLE `city`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `favorite`
--
ALTER TABLE `favorite`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `order_item`
--
ALTER TABLE `order_item`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `products_img`
--
ALTER TABLE `products_img`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `products_tickets_category`
--
ALTER TABLE `products_tickets_category`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `products_tickets_type`
--
ALTER TABLE `products_tickets_type`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
