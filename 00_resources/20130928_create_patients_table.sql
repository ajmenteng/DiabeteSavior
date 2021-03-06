USE `cs673`;
DROP TABLE IF EXISTS `cs673`.`patients`;
CREATE TABLE `cs673`.`patients` (
  `id` INT NOT NULL,
  `email` VARCHAR(255) NULL,
  `firstname` VARCHAR(45) NULL,
  `lastname` VARCHAR(45) NULL,
  `dob` DATE NULL,
  `gender` TINYINT NULL,
  `created` DATETIME NULL,
  `modified` DATETIME NULL,
  PRIMARY KEY (`id`));
