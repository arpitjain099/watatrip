
CREATE TABLE IF NOT EXISTS `airline_access` (
`airline_access_id` int(11) NOT NULL,
  `airline_name` varchar(55) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `airline_access`
--

INSERT INTO `airline_access` (`airline_access_id`, `airline_name`) VALUES
(1, 'AirIndia');

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `airline_access_id` int(11) DEFAULT NULL,
  `added_on` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--
---Here Password is admin 

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `airline_access_id`, `added_on`) VALUES
(1, 'Rahul', 'admin@watatrip.com', '21232f297a57a5a743894a0e4a801fc3', 1, NULL);



CREATE TABLE IF NOT EXISTS `global_price_setting` (
`global_price_setting_id` int(11) NOT NULL,
  `price_discount` varchar(55) DEFAULT NULL,
  `weightage` varchar(55) DEFAULT NULL,
  `airline` varchar(55) DEFAULT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `flights` (
  `flightno` varchar(30) NOT NULL DEFAULT '',
  `airline` varchar(30) NOT NULL,
  `from1` varchar(30) NOT NULL,
  `to1` varchar(30) NOT NULL,
  `deptime` time DEFAULT NULL,
  `arrtime` time DEFAULT NULL,
  `duration` time DEFAULT NULL,
  `mode` varchar(255) DEFAULT NULL,
  `price_discount` varchar(255) DEFAULT NULL,
  `weightage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
