# Tracking report for table `user`
# 2026-07-26 20:52:52

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_id` smallint(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `real_name` varchar(50) NOT NULL,
  `emp_no` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_no` varchar(18) NOT NULL,
  `authority_level` smallint(6) NOT NULL,
  `role_no` tinyint(4) NOT NULL,
  `role_no2` tinyint(4) NOT NULL,
  `timestamp` datetime(4) NOT NULL DEFAULT current_timestamp(4)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;