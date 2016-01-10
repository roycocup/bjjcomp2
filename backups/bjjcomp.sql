-- Adminer 4.2.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_06_12_204614_create_users_table',	1),
('2014_06_15_115223_add_weight_to_users',	2),
('2014_06_15_211849_add_column_gender_on_users',	3)
ON DUPLICATE KEY UPDATE `migration` = VALUES(`migration`), `batch` = VALUES(`batch`);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `belt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `weight` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `t_shirt_size` varchar(2) COLLATE utf8_unicode_ci DEFAULT 'm',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `users` (`id`, `email`, `nickname`, `f_name`, `l_name`, `dob`, `belt`, `created_at`, `updated_at`, `weight`, `gender`, `t_shirt_size`) VALUES
(1,	'bernardo.lino.oliveira@gmail.com',	'Bernardo',	'Bernardo',	'de Oliveira',	'1986-08-09',	'white',	'2015-03-18 02:10:14',	'2015-03-18 02:10:14',	'm_heavy',	'male',	'l'),
(3,	'dimagilgur@gmail.com',	'LazyMan',	'Dima',	'Gilgur',	'1982-03-10',	'white',	'2015-03-18 02:11:40',	'2015-03-18 02:11:40',	'middle',	'male',	'm'),
(4,	'bcrdeco@hormail.com',	'Borjeira',	'Borja',	'casanova',	'1979-05-21',	'white',	'2015-03-18 02:12:17',	'2015-03-18 02:12:17',	'feather',	'male',	's'),
(5,	'naydenov87@yahoo.co.uk',	'nickname',	'Nayden',	'Naydenov',	'1987-12-08',	'white',	'2015-03-18 02:18:28',	'2015-03-18 02:18:28',	'm_heavy',	'male',	'l'),
(6,	'vrcadore@gmail.com',	'Maza',	'Vinicius',	'Cadore',	'1984-11-14',	'white',	'2015-03-18 02:30:06',	'2015-03-18 02:30:06',	'middle',	'male',	'm'),
(10,	'nick.butler@investigo.co.uk',	'NickMorning',	'Nick',	'Butler',	'1983-05-04',	'white',	'2015-03-18 03:23:38',	'2015-03-18 03:23:38',	'm_heavy',	'male',	'm'),
(11,	'hummingofevil@hotmail.com',	'Sexyraba',	'Sexyraba',	'Sexyraba',	'1980-03-15',	'blue',	'2015-03-18 05:46:02',	'2015-03-18 05:46:02',	'm_heavy',	'male',	'm'),
(12,	'paul@livingwithidiots.co.uk',	'',	'Paul',	'Brooks',	'1969-04-14',	'white',	'2015-03-18 10:36:13',	'2015-03-18 10:36:13',	'middle',	'male',	'm'),
(13,	'amp0308@gmail.com',	'Pocahontas',	'Archana',	'Patel',	'1980-08-03',	'white',	'2015-03-18 18:03:37',	'2015-03-18 18:03:37',	's_feather',	'female',	'xs'),
(14,	'ewerton_moreira@hotmail.com',	'WilliamBoner',	'Ewerton',	'Moreira',	'1980-10-20',	'white',	'2015-03-18 19:58:21',	'2015-03-18 19:58:21',	'light',	'male',	'm'),
(15,	'tomel7@gmail.com',	'RobertoCarlos',	'Tomas',	'Lubusky',	'1983-04-07',	'white',	'2015-03-19 02:37:46',	'2015-03-19 02:37:46',	'middle',	'male',	'm'),
(18,	'supershins@hotmail.co.uk',	'',	'Aaron',	'Ramos',	'1989-03-31',	'blue',	'2015-03-20 16:35:15',	'2015-03-20 16:35:15',	'm_heavy',	'male',	'm'),
(20,	'richard.shade1@btinternet.com',	'oldtimer',	'Richard',	'Shade',	'1973-02-14',	'white',	'2015-03-20 16:51:27',	'2015-03-20 16:51:27',	'middle',	'male',	'm'),
(21,	'jaiaht@live.com',	'Jay',	'Jaiah',	'Benson-Turay',	'1970-01-01',	'white',	'2015-03-20 17:59:54',	'2015-03-20 17:59:54',	'm_heavy',	'male',	'l'),
(22,	'waitingcheung@gmail.com',	'Miau',	'William',	'Cheung',	'1982-05-24',	'white',	'2015-03-20 19:14:13',	'2015-03-20 19:14:13',	'm_heavy',	'male',	'l'),
(23,	'harryalexturner@gmail.com',	'PrettyFace',	'Harry',	'Turner',	'1991-08-25',	'blue',	'2015-03-21 15:35:53',	'2015-03-21 15:35:53',	'light',	'male',	'm'),
(24,	'jaguberoi@hotmail.com',	'Jag',	'Jag',	'Singh ',	'1985-08-15',	'blue',	'2015-03-21 20:11:26',	'2015-03-21 20:11:26',	'm_heavy',	'male',	'l'),
(25,	'skrzat86@interia.eu',	'',	'Mateusz',	'Skrzat',	'1986-03-06',	'white',	'2015-03-23 02:50:29',	'2015-03-23 02:50:29',	's_heavy',	'male',	's'),
(28,	'rodrigo-balaka@hotmail.com',	'Reginho',	'Rodrigo',	'Lima',	'1991-12-10',	'white',	'2015-03-23 23:03:54',	'2015-03-23 23:03:54',	'feather',	'male',	's'),
(29,	'lo.lilene@gmail.com',	'Helena',	'Helene',	'Lo',	'1970-01-01',	'blue',	'2015-03-24 11:49:44',	'2015-03-24 11:49:44',	'feather',	'female',	's'),
(30,	'Geoffrey.carbonel@gmail.com',	'Jeff',	'Geoffrey',	'Carbonel',	'1985-07-31',	'blue',	'2015-03-24 15:40:25',	'2015-03-24 15:40:25',	'light',	'male',	'm'),
(31,	'okurtulus@hotmail.co.uk',	'ozzy',	'ozan',	'kurtulus',	'1988-07-14',	'white',	'2015-03-24 16:59:54',	'2015-03-24 16:59:54',	'feather',	'male',	's'),
(35,	'aminian13@gmail.com',	'',	'Bam',	'Abedi-Amin',	'1985-09-16',	'white',	'2015-03-26 22:02:22',	'2015-03-26 22:02:22',	'm_heavy',	'male',	'l'),
(37,	'billyseymour85@gmail.com',	'Ferrugem',	'Billy',	'Seymour ',	'1985-10-27',	'white',	'2015-03-27 00:56:18',	'2015-03-27 00:56:18',	'light',	'male',	'm'),
(38,	'farhaz.mussa@gmail.com',	'Farhaz',	'Farhaz',	'Mussa',	'1988-09-21',	'white',	'2015-03-27 00:56:36',	'2015-03-27 00:56:36',	'light',	'male',	'm'),
(39,	'andreamarini999@libero.it',	'Italian',	'Andrea',	'Marini',	'1986-09-23',	'white',	'2015-03-27 02:03:09',	'2015-03-27 02:03:09',	'light',	'male',	'm'),
(40,	'tkolodziej87@yahoo.co.uk',	'',	'Tomasz',	'Kolodziej',	'1987-06-11',	'white',	'2015-03-27 05:10:59',	'2015-03-27 05:10:59',	'u_heavy',	'male',	'xl'),
(42,	'battlemagick@gmail.com',	'',	'Fiona',	'Lee',	'1992-09-25',	'white',	'2015-03-28 00:32:14',	'2015-03-28 00:32:14',	's_feather',	'female',	'xs'),
(43,	'bikram_singh@hotmail.co.uk',	'Barba',	'Bikramjeet',	'Sandhu',	'1994-07-29',	'white',	'2015-03-28 03:13:59',	'2015-03-28 03:13:59',	'middle',	'male',	'xl'),
(44,	'philip@ogbodo.com',	'Spider',	'Philip',	'Ogbodo ',	'1978-05-15',	'white',	'2015-03-30 19:50:38',	'2015-03-30 19:50:38',	'm_heavy',	'male',	'm'),
(46,	'charlieforrest@hotmail.co.uk',	'Bombrill',	'Charlie',	'Forrest',	'1989-03-06',	'white',	'2015-04-01 01:05:45',	'2015-04-01 01:05:45',	'middle',	'male',	'l'),
(47,	'romalevin@gmail.com',	'heyman',	'Roma',	'Levin',	'1983-03-29',	'white',	'2015-04-02 22:46:31',	'2015-04-02 22:46:31',	'light',	'male',	's'),
(49,	'matthewherdman@hotmail.com',	'HeyMan!',	'Matthew',	'Herdman',	'1990-05-18',	'white',	'2015-04-02 22:48:29',	'2015-04-02 22:48:29',	'light',	'male',	'm'),
(50,	'p.causer@gmail.com',	'',	'Peter',	'Causer',	'1983-06-23',	'white',	'2015-04-03 15:04:32',	'2015-04-03 15:04:32',	'm_heavy',	'male',	'm'),
(51,	'robb.leahy@yahoo.com',	'',	'Robb',	'Summerskill-Leahy',	'1989-06-03',	'white',	'2015-04-03 17:25:21',	'2015-04-03 17:25:21',	'feather',	'male',	'm'),
(52,	'patrickjalloh@hotmail.co.uk',	'Patrick',	'Patrick',	'Jalloh',	'1986-04-04',	'white',	'2015-04-06 02:59:24',	'2015-04-06 02:59:24',	's_heavy',	'male',	'xl'),
(53,	'meredithjfoster@hotmail.com',	'Foster',	'Meredith',	'Foster',	'1979-05-06',	'white',	'2015-04-07 15:05:58',	'2015-04-07 15:05:58',	'middle',	'female',	's'),
(54,	'cesar.ramanauskas@gmail.com',	'Cesar',	'Cesar',	'Ramanauskas',	'1983-01-27',	'white',	'2015-04-07 20:34:21',	'2015-04-07 20:34:21',	'm_heavy',	'male',	'l'),
(55,	'lawrence.booker@ubs.com',	'LARRY',	'Larry',	'Booker',	'1980-09-19',	'white',	'2015-04-07 23:40:05',	'2015-04-07 23:40:05',	'light',	'male',	'm'),
(57,	'thornileyjames@gmail.com',	'James',	'James',	'Thorniley',	'1987-02-03',	'white',	'2015-04-08 01:06:52',	'2015-04-08 01:06:52',	'middle',	'male',	'm'),
(59,	'hubologista@gmail.com',	'',	'Michal',	'Sokolowski',	'1983-12-20',	'white',	'2015-04-10 00:46:25',	'2015-04-10 00:46:25',	'u_heavy',	'male',	'l'),
(60,	'oleg.dolganiuc@gmail.com',	'ollyG',	'oleg',	'Dolganiuc',	'1988-03-12',	'white',	'2015-04-10 01:51:02',	'2015-04-10 01:51:02',	'light',	'male',	'm'),
(64,	'marekkopycinski@op.pl',	'Marek',	'Marek',	'Kopycinski',	'1970-01-01',	'white',	'2015-04-10 02:23:58',	'2015-04-10 02:23:58',	'middle',	'male',	'l'),
(68,	'ross@rgclark.co.uk',	'Gaspar',	'Ross',	'Clark',	'1994-01-29',	'white',	'2015-04-10 17:53:00',	'2015-04-10 17:53:00',	'm_heavy',	'male',	'l'),
(70,	'oisinbarrett@hotmail.com',	'',	'Oisin',	'Barrett',	'1992-01-23',	'white',	'2015-04-13 17:21:03',	'2015-04-13 17:21:03',	'light',	'male',	'm'),
(71,	'mustafaaleem1990@gmail.com',	'',	'Mustafa',	'Aleem',	'1990-06-22',	'white',	'2015-04-13 22:02:28',	'2015-04-13 22:02:28',	'feather',	'male',	's'),
(72,	'ajbignell@gmail.com',	'Andy',	'Andy',	'Bignell',	'1988-01-10',	'white',	'2015-04-13 22:13:42',	'2015-04-13 22:13:42',	'light',	'male',	'm'),
(74,	'yeokhan@blueyonder.co.uk',	'yeohan',	'yeohan',	'khan',	'1973-05-17',	'white',	'2015-04-14 00:29:09',	'2015-04-14 00:29:09',	'middle',	'male',	'l'),
(75,	'benkouijzer@gmail.com',	'Ben',	'Ben',	'Kouijzer',	'1984-03-25',	'white',	'2015-04-15 13:40:06',	'2015-04-15 13:40:06',	'light',	'male',	'l'),
(76,	'kaytu786@hotmail.com',	'Surgeon',	'Kamran',	'Khalid',	'1978-08-08',	'blue',	'2015-04-20 13:25:50',	'2015-04-20 13:25:50',	'middle',	'male',	'm'),
(77,	'shelsonlim@gmail.com',	'shelson',	'Shelson',	'lim',	'1990-07-02',	'white',	'2015-04-21 23:39:23',	'2015-04-21 23:39:23',	'm_heavy',	'male',	'l'),
(78,	'danielprettidesouza@yahoo.co.uk',	'Pretti',	'Daniel',	'De souza',	'1978-10-30',	'white',	'2015-04-22 11:23:25',	'2015-04-22 11:23:25',	'middle',	'male',	'm'),
(79,	'ronaldmead21@gmx.com',	'BigAnton',	'Tommy',	'mead',	'1996-01-01',	'white',	'2015-04-23 21:45:57',	'2015-04-23 21:45:57',	'rooster',	'male',	'xs'),
(81,	'deiverson_deivin@hotmail.com',	'tutu',	'Deiverson',	'Siqueira',	'1989-03-31',	'white',	'2015-04-27 13:34:13',	'2015-04-27 13:34:13',	's_feather',	'male',	's'),
(83,	'lvdl@tagworldwide.com',	'Lv',	'leuvon',	'van der Leeuw',	'1988-02-23',	'blue',	'2015-04-28 03:45:33',	'2015-04-28 03:45:33',	'middle',	'male',	'm'),
(84,	'sal@salvadorbrown.com',	'Hicup',	'Salvador',	'Brown',	'1992-03-26',	'white',	'2015-04-29 04:07:42',	'2015-04-29 04:07:42',	'light',	'male',	'm'),
(86,	'harrywaight@gmail.com',	'Harry',	'Harry',	'Waight',	'1987-11-23',	'white',	'2015-04-29 10:56:56',	'2015-04-29 10:56:56',	'middle',	'male',	'l'),
(88,	'mattflieshigh@sky.com',	'Cabeca',	'Matt',	'Harmon',	'1987-11-02',	'blue',	'2015-04-29 13:05:05',	'2015-04-29 13:05:05',	'middle',	'male',	'l'),
(89,	'patomara@hotmail.co.uk',	'',	'patrick',	'omara',	'1983-10-23',	'white',	'2015-04-29 20:52:47',	'2015-04-29 20:52:47',	'middle',	'male',	'm'),
(91,	'akeber.m@live.com',	'Rebi',	'Rebeka',	'Meszaros',	'1989-09-05',	'white',	'2015-04-30 00:38:46',	'2015-04-30 00:38:46',	'm_heavy',	'female',	's'),
(93,	'eaburruza@hotmail.com',	'basque',	'Eneko',	'Aburruza',	'1991-06-06',	'white',	'2015-04-30 01:54:48',	'2015-04-30 01:54:48',	's_feather',	'male',	'm'),
(94,	'andrea.pasci@hotmail.it',	'Andrea',	'Andrea',	'Pasci',	'1984-06-04',	'white',	'2015-04-30 14:46:25',	'2015-04-30 14:46:25',	'feather',	'male',	'm'),
(95,	'tekano.bob@gmail.com',	'Amarrão',	'Rob',	'Chapman',	'1971-06-27',	'purple',	'2015-04-30 17:07:33',	'2015-04-30 17:07:33',	'light',	'male',	'l'),
(102,	'robert@crawford.org.uk',	'Rob',	'Robert',	'Crawford',	'1991-11-06',	'white',	'2015-04-30 21:17:38',	'2015-04-30 21:17:38',	'light',	'male',	's'),
(103,	'ericksilva-@hotmail.com',	'DeMenor',	'Erick',	'Silva',	'1996-07-26',	'white',	'2015-04-30 22:56:19',	'2015-04-30 22:56:19',	'rooster',	'male',	's'),
(105,	'362623120@qq.com',	'HarlemShakeeeeee',	'jingyuan',	'Liu',	'1991-03-19',	'white',	'2015-04-30 22:58:40',	'2015-04-30 22:58:40',	'light',	'male',	'm'),
(107,	'jmaholanyi@yahoo.com',	'Sol',	'Juraj',	'Maholanyi',	'1978-06-22',	'white',	'2015-04-30 23:03:17',	'2015-04-30 23:03:17',	'light',	'male',	'xs'),
(110,	'foshatogbe@gmail.com',	'WillSmith',	'Femi',	'Oshatogbe',	'1987-02-25',	'white',	'2015-05-01 03:37:34',	'2015-05-01 03:37:34',	'feather',	'male',	's'),
(111,	'l.pellizzoni@gmail.com',	'Mengatti',	'Luca',	'Pellizzoni',	'1980-09-23',	'white',	'2015-05-01 22:48:46',	'2015-05-01 22:48:46',	'middle',	'male',	'l'),
(112,	'liviu22@yahoo.com',	'',	'Liv',	'Itoafa',	'1985-06-22',	'white',	'2015-05-02 13:03:31',	'2015-05-02 13:03:31',	's_feather',	'male',	'xs'),
(113,	'khanandco@msn.com',	'Rodolfo',	'Wiqas',	'Khan',	'1981-10-13',	'white',	'2015-05-03 03:06:41',	'2015-05-03 03:06:41',	'middle',	'male',	'l'),
(114,	'hbhamra@gmail.com',	'Sheriff',	'Harman',	'Bhamra',	'1970-01-01',	'purple',	'2015-05-04 16:24:02',	'2015-05-04 16:24:02',	'light',	'male',	'm'),
(115,	'lukejamiethompson@icloud.com',	'',	'luke',	'thompson',	'1997-01-01',	'white',	'2015-05-04 17:09:04',	'2015-05-04 17:09:04',	'middle',	'male',	'm'),
(117,	'liria.min@gmail.com',	'Laila',	'Laila',	'Al-Minyawi',	'1984-09-01',	'white',	'2015-05-04 19:35:57',	'2015-05-04 19:35:57',	'light',	'female',	's'),
(119,	'andersongavioli@hotmail.com',	'mixaria',	'anderson',	'santos',	'1986-04-27',	'white',	'2015-05-05 00:10:45',	'2015-05-05 00:10:45',	'feather',	'male',	's'),
(121,	'mikestocks@hotmail.co.uk',	'Favela',	'Mike',	'Stocks',	'1983-07-21',	'white',	'2015-05-07 00:44:03',	'2015-05-07 00:44:03',	'light',	'male',	'm'),
(123,	'tomnevin1983@gmail.com',	'AussieTom',	'Tom',	'Nevin',	'1983-03-14',	'blue',	'2015-05-07 14:14:32',	'2015-05-07 14:14:32',	'middle',	'male',	'm'),
(125,	'gpolonski@icloud.com',	'MentalGHiroshimaGeorgia',	'Georgina',	'Polonski',	'1991-07-19',	'white',	'2015-05-07 14:48:41',	'2015-05-07 14:48:41',	'm_heavy',	'female',	's'),
(127,	'fredericdaull@gmail.com',	'Freddy',	'fred',	'daull',	'1981-08-27',	'white',	'2015-05-07 18:39:18',	'2015-05-07 18:39:18',	'u_heavy',	'male',	'l'),
(128,	'harj.s.bains@gmail.com',	'DIRTYGERMANALLIANCEBLACKCHICKEN',	'BAIN',	'BAIN',	'1987-12-10',	'blue',	'2015-05-08 02:34:43',	'2015-05-08 02:34:43',	'middle',	'male',	'l'),
(129,	'esonmez@hotmail.co.uk',	'Eric',	'Eric',	'Sonmez',	'1979-02-09',	'white',	'2015-05-08 03:02:44',	'2015-05-08 03:02:44',	'light',	'male',	'm'),
(130,	'test1@test.com',	'Gaetano',	'Gaetan',	'Uytterhaegen',	'1988-01-01',	'blue',	'2015-05-08 07:40:15',	'2015-05-08 07:40:15',	'light',	'male',	'm'),
(131,	'test2@tes.com',	'',	'Piers',	'Holden',	'1994-01-01',	'blue',	'2015-05-08 11:32:42',	'2015-05-08 11:32:42',	'middle',	'male',	'm'),
(132,	'felix@felix.com',	'Felix',	'Felix',	'Holmes',	'1994-01-01',	'blue',	'2015-05-08 11:34:13',	'2015-05-08 11:34:13',	'm_heavy',	'male',	'l'),
(133,	'arash@arash.com',	'Arash',	'Arash',	'Hagh',	'1984-01-01',	'white',	'2015-05-08 11:39:05',	'2015-05-08 11:39:05',	'middle',	'male',	'm'),
(134,	'wallid.ismail@wallid.com',	'Wallid',	'Luis',	'Amaral',	'1980-01-01',	'blue',	'2015-05-08 11:45:51',	'2015-05-08 11:45:51',	'light',	'male',	'm'),
(135,	'anton@anton.com',	'Anton',	'Anthony ',	'Mead',	'1980-01-01',	'purple',	'2015-05-08 12:24:12',	'2015-05-08 12:24:12',	'light',	'male',	'm')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `email` = VALUES(`email`), `nickname` = VALUES(`nickname`), `f_name` = VALUES(`f_name`), `l_name` = VALUES(`l_name`), `dob` = VALUES(`dob`), `belt` = VALUES(`belt`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`), `weight` = VALUES(`weight`), `gender` = VALUES(`gender`), `t_shirt_size` = VALUES(`t_shirt_size`);

-- 2016-01-11 04:24:55
