CREATE TABLE `game` (
  `game_id` int(5) NOT NULL,
  `game_name` varchar(64) NOT NULL,
  `game_equipment_type` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`);
COMMIT;

