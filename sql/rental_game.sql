

CREATE TABLE `rental_game` (
  `game_id` int(5) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `staff_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `rental_game` (`game_id`, `customer_id`, `staff_id`) VALUES
(23, 12345, 11111);


ALTER TABLE `rental_game`
  ADD PRIMARY KEY (`game_id`,`customer_id`),
  ADD KEY `FK_GAME_EQUIPMENT_ID` (`customer_id`),
  ADD KEY `FK_GAME_ID` (`staff_id`);


ALTER TABLE `rental_game`
  ADD CONSTRAINT `FK_GAME_EQUIPMENT_ID` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `FK_GAME_ID` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
  ADD CONSTRAINT `rental_game_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`);
COMMIT;

