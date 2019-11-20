-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2017 at 10:43 PM
-- Server version: 5.1.73-log
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b5026874_db1`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `EventsID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `EventsDate` datetime NOT NULL,
  `Location` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `Genre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `AmofTickets` int(11) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Image` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `Info` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`EventsID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventsID`, `Name`, `EventsDate`, `Location`, `Genre`, `AmofTickets`, `Capacity`, `Price`, `Image`, `Info`) VALUES
(1, 'Mouziq', '2017-04-26 23:00:00', 'O2 Arena', 'Hip-Hop', 1892, 4000, 5, 'event-6.jpg', 'Urban event made just for the people! Join us for an unforgettable night '),
(2, 'Inernational Party', '2017-04-28 23:00:00', 'Plug', 'Hip-Hop', 1000, 2000, 4, 'event-1.jpg', 'Best International Party in town make sure you will be there by grabbing your tickets early! Not to be missed!'),
(3, 'Icarus Live', '2017-04-29 23:00:00', 'Tank', 'Techno', 400, 1000, 5, 'event-2.jpg', 'Icarus live at Tank nightclub with his new single "King-Kong". Ready to set the roofs on fire!'),
(4, 'The Drop', '2017-05-03 23:00:00', 'Paris Nightclub', 'R&B', 134, 450, 4, 'event-3.jpg', 'That Drop was sick mate! Join us for an unforgettable evening with loads of classic bangerzzz!!'),
(5, 'The Sesh', '2017-05-05 23:00:00', 'Paris Nightclub', 'House', 100, 450, 0, 'event-3.jpg', 'This event is here to stay. Come down to our main event of the week. With a world renowned DJ!'),
(6, 'Ibiza Special', '2017-05-06 23:00:00', 'Tank', 'Techno', 650, 1000, 8, 'event-2.jpg', 'WE bring you one of the Ibiza residents to our very own clubs in Sheffield. Do not hesitate to buy your tickets early!!'),
(7, 'Shut Down', '2017-05-10 23:00:00', 'Viper Rooms', 'House', 28, 200, 3, 'event-7.jpg', 'And it''s Shut down ! One night that should definitely not be missed!'),
(8, 'R&B Special', '2017-05-12 23:00:00', 'Crystal', 'R&B', 320, 500, 5, 'event-4.jpg', 'Rhythm and Blues is what it means. Make sure you are there this Friday night!'),
(9, 'Housespecific', '2017-05-13 23:00:00', 'Area', 'House', 160, 700, 0, 'event-5.jpg', 'One town,One Club, One DJ. Join us '),
(10, 'Blow Up', '2017-05-17 23:00:00', 'Crystal', 'Pop', 238, 500, 0, 'event-4.jpg', 'Let''s blow up the speakers but we can''t do that alone!! Let''s do it together!!'),
(11, 'VIP', '2017-05-19 23:00:00', 'Paris Nightclub', 'Hip-Hop', 200, 450, 12, 'event-3.jpg', 'To the people looking a luxury night out full of wine and champagne this is for you!!'),
(12, 'Anna-Tur Live', '2017-05-20 23:00:00', 'O2 Arena', 'Techno', 2700, 4000, 6, 'event-6.jpg', 'Bringing you one of the best for the best crowd out there.! Make sure you are here to watch it.'),
(13, 'Speaker', '2017-05-24 23:00:00', 'Area', 'Trance', 346, 700, 7, 'event-5.jpg', 'Speaker is an event based from London and is coming for a night in Sheffield just for us!'),
(14, 'Dolce', '2017-05-26 23:00:00', 'Viper Rooms', 'R&B', 70, 200, 7, 'event-7.jpg', 'This event will be remember for weeks. Guaranteed to be a sell out! Grab your tickets early!!'),
(15, 'Pre-Summer-Party', '2017-05-27 23:00:00', 'Area', 'Pop', 350, 700, 10, 'event-5.jpg', 'Are you ready for the summer!!? Because we are ready for sure!'),
(16, 'Melody', '2017-05-31 23:00:00', 'SOYO', 'Hip-Hop', 122, 300, 8, 'event-8.jpg', 'Melody is one of the best events that is touring the UK at the moment! Are you sure you are ready for it !!?'),
(17, 'Boiler', '2017-06-02 23:00:00', 'Crystal', 'Trance', 200, 500, 6, 'event-4.jpg', 'Join us for a day full of Euphoria! Only with the best DJ''s around the world!'),
(18, 'Breeze', '2017-06-03 23:00:00', 'O2 Arena', 'Hip-Hop', 3200, 4000, 4, 'event-6.jpg', 'Is it getting Chilly in here? Let''s get summer started with a bang!'),
(19, 'Circus', '2017-06-07 23:00:00', 'Plug', 'Techno', 1375, 2000, 10, 'event-1.jpg', 'Join the Circus! Animals will be included!!'),
(20, 'Heatwave', '2017-06-09 23:00:00', 'Plug', 'Pop', 700, 2000, 8, 'event-1.jpg', 'A Heatwave is coming your way! And i don''t think it will last only for a day.'),
(21, 'Resort', '2017-06-10 23:00:00', 'Viper Rooms', 'Trance', 90, 200, 7, 'event-7.jpg', 'Make sure to be available on this Saturday as it''s going to be a big one!'),
(22, 'Pacha Special', '2017-06-14 23:00:00', 'Tank', 'Trance', 247, 1000, 3, 'event-2.jpg', 'Ibiza''s finest joining us for an unforgettable night!! Do not miss it!'),
(23, 'Festivalmode', '2017-06-16 23:00:00', 'SOYO', 'House', 120, 300, 10, 'event-8.jpg', 'Who is ready for pre-Creamfield! Because that''s where we are heading.'),
(24, 'Hi-Lo Live!', '2017-06-17 23:00:00', 'O2 Arena', 'Techno', 2765, 4000, 5, 'event-6.jpg', 'World renowned DJ Hi-Lo is coming for us to destroy the decks like he always does!!'),
(25, 'Takeover', '2017-06-21 23:00:00', 'Plug', 'Hip-Hop', 950, 2000, 3, 'event-1.jpg', 'Takeover is an external event company ready to rock your socks off!'),
(26, 'Smashed', '2017-06-23 23:00:00', 'Viper Rooms', 'Techno', 76, 200, 7, 'event-7.jpg', 'Come to us to get Smashed besides that''s what we''re all about'),
(27, 'Secret', '2017-06-24 23:00:00', 'SOYO', 'R&B', 200, 300, 4, 'event-8.jpg', 'SHHHHH It''s a Secret! Contact us for more information! '),
(28, 'Un-Drunk', '2017-06-28 23:00:00', 'Area', 'Pop', 230, 700, 5, 'event-5.jpg', 'The exact opposite! Join us for an event that you will definitely forget!'),
(29, 'Breakthrough', '2017-06-30 23:00:00', 'Paris Nightclub', 'R&B', 129, 450, 4, 'event-3.jpg', 'Breakthrough Urban DJ, Join the madness!!'),
(30, 'WaVy', '2017-07-01 23:00:00', 'Paris Nightclub', 'Hip-Hop', 278, 450, 10, 'event-3.jpg', 'Grab your boards join us to catch waves together with a Hawaiian DJ ready to take us on an exotic journey with his own melodies!!'),
(31, 'Binge', '2017-07-05 23:00:00', 'Tank', 'House', 347, 1000, 10, 'event-2.jpg', 'Binge drinking, nights out guaranteed to be great!'),
(32, 'Mashup', '2017-07-07 23:00:00', 'Crystal', 'Trance', 232, 500, 8, 'event-4.jpg', 'All night mashups !! Ready to rumble!!'),
(33, 'Baia', '2017-07-08 23:00:00', 'Viper Rooms', 'House', 37, 200, 6, 'event-7.jpg', 'Join us for a feeling that is similar to the one that is sitting by the seaside at full moon!! '),
(34, 'The Happening', '2017-07-12 23:00:00', 'SOYO', 'Techno', 126, 300, 6, 'event-8.jpg', 'Once upon a time a few friends came together and this happened!!'),
(35, 'Pool', '2017-07-14 23:00:00', 'O2 Arena', 'R&B', 2300, 4000, 0, 'event-6.jpg', 'Whirlpool of people drinking !! What else do you need'),
(36, 'The Bay', '2017-07-15 23:00:00', 'Area', 'Pop', 498, 700, 7, 'event-5.jpg', 'Join us to have a sensation that we live near to the bay !! DJ''s from around the world are joining us for this night only!'),
(37, 'Commercial', '2017-07-19 23:00:00', 'Paris Nighclub', 'Pop', 129, 450, 5, 'event-3.jpg', 'Ready for your flight to holiday destinations? but first join us before you fly!'),
(38, 'Modjo-Live', '2017-07-21 23:00:00', 'Viper Rooms', 'House', 39, 200, 12, 'event-7.jpg', 'Modjo Live ready for a night out in Sheffield!! Not to be missed!'),
(39, 'Shark', '2017-07-22 23:00:00', 'SOYO', 'Pop', 179, 300, 8, 'event-8.jpg', 'Be aware with our new light shows replicating a shark Attack!! Join us for a mesmerising show'),
(40, 'Riptastic', '2017-07-26 23:00:00', 'Crystal', 'Hip-Hop', 236, 500, 3, 'event-4.jpg', 'Let''s rip our intestines apart!! Cos nights out are all about that!'),
(41, 'Volcanoe', '2017-07-28 23:00:00', 'O2 Arena', 'Trance', 1734, 4000, 4, 'event-6.jpg', 'Explosive DJ''s from all over the world ready to take you on a journey of music'),
(42, 'BayWatch', '2017-07-29 23:00:00', 'Crystal', 'R&B', 320, 500, 9, 'event-4.jpg', 'We all know this series but do you know how it feels to be the actors dong it?!! Join us so you know ;)!'),
(43, 'Kanoo', '2017-08-02 23:00:00', 'Area', 'Techno', 267, 700, 0, 'event-5.jpg', 'Ready for an adventure!!? Because we sure are! '),
(44, 'Bedrock', '2017-08-04 23:00:00', 'Plug', 'R&B', 1198, 2000, 7, 'event-1.jpg', 'Flintstones Themed night out! Ready to knock the socks of your feet! with REAL Dinosaurs!'),
(45, 'XOYO', '2017-08-05 23:00:00', 'Tank', 'House', 325, 1000, 7, 'event-2.jpg', 'Housesessions coming to Sheffield for one night!! Make sure you don''t miss it!'),
(46, 'Tsunami', '2017-08-09 23:00:00', 'Plug', 'Trance', 1132, 2000, 0, 'event-1.jpg', 'Tsunami was once a banger tune! Now it''s a banger Event!'),
(47, 'Fabrikation', '2017-08-11 23:00:00', 'Plug', 'Pop', 1333, 2000, 6, 'event-1.jpg', 'Straight form London to our own city! Let''s make it work!'),
(48, 'Waters', '2017-08-12 23:00:00', 'Viper Rooms', 'Trance', 78, 200, 8, 'event-7.jpg', 'It shows by the name!! What''s going to go down in the club!'),
(49, 'Stampede', '2017-08-16 23:00:00', 'Tank', 'Techno', 365, 1000, 3, 'event-2.jpg', 'Stampede is one of the best events in Europe and it''s coming to The UK for their first time touring!! Not to be missed!'),
(50, 'Skydive', '2017-08-18 23:00:00', 'Paris Nightclub', 'Trance', 221, 450, 9, 'event-3.jpg', 'Join us for an event that will be written down in history!!'),
(51, 'Ambassaden', '2017-08-19 23:00:00', 'Crystal', 'R&B', 273, 500, 3, 'event-4.jpg', 'DJ Jazzy Jeff back with newer and better beats then ever!!'),
(52, 'StarFish', '2017-08-23 23:00:00', 'SOYO', 'Hip-Hop', 211, 300, 5, 'event-8.jpg', 'We know that it''s one of your favourite Asteroidea the Star-fish! so why not?! '),
(53, 'Bazaar', '2017-08-25 23:00:00', 'Area', 'House', 374, 700, 5, 'event-5.jpg', 'Join us for a bargain of drinks and deals !! And for a night that will be forgotten!'),
(54, 'Aruba', '2017-08-26 23:00:00', 'SOYO', 'Pop', 210, 300, 12, 'event-8.jpg', 'Exotic Island theme night out for the ones that are stuck in out moody England'),
(55, 'Shallow', '2017-08-30 23:00:00', 'O2 Arena', 'House', 3259, 4000, 4, 'event-6.jpg', 'Shallow water with our new hazers you would be feeling the sensation of the cold sea breeze!'),
(56, 'Senior Frogs', '2017-09-01 23:00:00', 'Tank', 'Techno', 789, 1000, 8, 'event-2.jpg', 'This one is for all the people that are single and ready to mingle!! Not to be missed!'),
(57, 'Zic Zac', '2017-09-02 23:00:00', 'O2 Arena', 'Pop', 3009, 4000, 12, 'event-6.jpg', 'One of the best nights out ever for my Switzerland oriented friends!! A night tailored for the peoples'' needs!'),
(58, 'Castle', '2017-09-06 23:00:00', 'Crystal', 'Hip-Hop', 370, 500, 9, 'event-4.jpg', 'Come and be the King and Queen of the dance-floor!! '),
(59, 'Starskeys', '2017-09-08 23:00:00', 'Area', 'R&B', 578, 700, 9, 'event-5.jpg', 'Let''s take it back to the old school!! Bring the costume ;)!'),
(60, 'Aqua', '2017-09-09 23:00:00', 'Tank', 'Trance', 430, 1000, 0, 'event-2.jpg', 'Aqua a night out that is guaranteed ready to make you wet! all the way up!! with water guns and water pistols given for each customer!');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
