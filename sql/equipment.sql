CREATE TABLE `equipment` (
  `equipment_id` int(5) NOT NULL,
  `equipment_type` varchar(64) NOT NULL,
  `equipment_price_rate` decimal(5,2) NOT NULL,
  `equipment_description` varchar(128) NOT NULL,
  `equipment_seat_location` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipment_id`);
COMMIT;

