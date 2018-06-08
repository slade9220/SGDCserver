# SGDCserver

Server configuration
-/database
	-controller.php
-/model
	-events.php
	-news.php
-/query
	-createEvent.php
	-deleteEvent.php
	-getEvent.php	
	-getNews.php
	-sendNotification.php

CREATE TABLE IF NOT EXISTS `Events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `tag` varchar(255) NOT NULL,
  `day` int(11) NOT NULL,
  `startingHour` int(11) NOT NULL,
  `startingMinute` int(11) NOT NULL,
  `endingHour` int(11) NOT NULL,
  `endingMinute` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `calendarLink` varchar(255) DEFAULT 'link',
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=235 ;

INSERT INTO `Events` (`id`, `name`, `tag`, `day`, `startingHour`, `startingMinute`, `endingHour`, `endingMinute`, `location`, `calendarLink`, `description`) VALUES
(27, 'Object Tracking in Vision', 'Wwdc conference', 4, 9, 0, 9, 40, 'Lab3', 'link', 'noDescption'),
(22, 'Optimizing Your App For Today''s Internet', 'Wwdc conference', 3, 19, 0, 19, 40, 'Lab2+Collab2', 'link', ‘noDescption’);


CREATE TABLE IF NOT EXISTS `News` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `text` text,
  `data` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

INSERT INTO `News` (`id`, `name`, `text`, `data`) VALUES
(1, 'WWDC Week', 'WWDC is coming..', ‘');
