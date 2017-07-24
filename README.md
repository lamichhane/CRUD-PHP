# CRUD-PHP

CREATE TABLE `UserRego` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `firstname` VARCHAR(45) NOT NULL COMMENT 'First name of the user',
  `lastname` VARCHAR(45) NOT NULL COMMENT 'Last name of the user.',
  `email` VARCHAR(45) NOT NULL COMMENT 'email of the user',
  `gender` VARCHAR(45) NOT NULL COMMENT ' gender',
 `age` int(11) NOT NULL COMMENT ' age',
  PRIMARY KEY (`id`));
