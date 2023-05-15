
CREATE TABLE `rental_equipment` (
  `equipment_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `staff_id` int(5) NOT NULL,
  `rental_time_start` datetime NOT NULL,
  `rental_time_end` datetime NOT NULL,
  `rental_cost` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


ALTER TABLE `rental_equipment`
  ADD PRIMARY KEY (`equipment_id`,`customer_id`),
  ADD KEY `FK_CUSTOMER_ID` (`customer_id`),
  ADD KEY `FK_STAFF_ID` (`staff_id`);


ALTER TABLE `rental_equipment`
  ADD CONSTRAINT `FK_CUSTOMER_ID` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `FK_EQUIPMENT_ID` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`equipment_id`),
  ADD CONSTRAINT `FK_STAFF_ID` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`);
COMMIT;

