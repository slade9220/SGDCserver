# SGDCserver

You can find the front-end app at: https://github.com/slade9220/SGDC2018 <br>
You can find the management app at: https://github.com/slade9220/ManageSGDC <br>


Server configuration<br> 
-/database <br>
	-controller.php<br> 
-/model<br>
	-events.php<br>
	-news.php<br>
-/query<br>
	-createEvent.php<br>
	-deleteEvent.php<br>
	-getEvent.php	<br>
	-getNews.php<br>
	-sendNotification.php<br>
<br><br>
CREATE TABLE IF NOT EXISTS `Events` (<br>
  `id` int(11) NOT NULL AUTO_INCREMENT,<br>
  `name` varchar(255) DEFAULT NULL,<br>
  `tag` varchar(255) NOT NULL,<br>
  `day` int(11) NOT NULL,<br>
  `startingHour` int(11) NOT NULL,<br>
  `startingMinute` int(11) NOT NULL,<br>
  `endingHour` int(11) NOT NULL,<br>
  `endingMinute` int(11) NOT NULL,<br>
  `location` varchar(255) DEFAULT NULL,<br>
  `calendarLink` varchar(255) DEFAULT 'link',<br>
  `description` text NOT NULL,<br>
  PRIMARY KEY (`id`)<br>
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=235 ;<br>

INSERT INTO `Events` (`id`, `name`, `tag`, `day`, `startingHour`, `startingMinute`, `endingHour`, `endingMinute`, `location`, `calendarLink`, `description`) VALUES<br>
(27, 'Object Tracking in Vision', 'Wwdc conference', 4, 9, 0, 9, 40, 'Lab3', 'link', 'noDescption'),<br>
(22, 'Optimizing Your App For Today''s Internet', 'Wwdc conference', 3, 19, 0, 19, 40, 'Lab2+Collab2', 'link', ‘noDescption’);<br>
<br>
<br>
CREATE TABLE IF NOT EXISTS `News` (<br>
  `id` int(11) NOT NULL AUTO_INCREMENT,<br>
  `name` varchar(255) DEFAULT NULL,<br>
  `text` text,<br>
  `data` varchar(255) NOT NULL,<br>
  PRIMARY KEY (`id`)<br>
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;<br>
<br><br>
INSERT INTO `News` (`id`, `name`, `text`, `data`) VALUES<br>
(1, 'WWDC Week', 'WWDC is coming..', ‘');<br>
<br>
