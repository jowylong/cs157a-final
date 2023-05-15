
CREATE TABLE `customer` (
  `customer_id` int(5) NOT NULL,
  `customer_first_name` varchar(64) NOT NULL,
  `customer_last_name` varchar(64) NOT NULL,
  `customer_phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);
COMMIT;

