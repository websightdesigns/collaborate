CREATE TABLE IF NOT EXISTS `colab` (
`id` int(11) NOT NULL,
  `data` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;