CREATE TABLE `staff` (
  `staff_id` int(5) NOT NULL,
  `staff_first_name` varchar(64) NOT NULL,
  `staff_last_name` varchar(64) NOT NULL,
  `staff_phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);
COMMIT;

