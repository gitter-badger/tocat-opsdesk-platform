CREATE TABLE IF NOT EXISTS `project` (
  `id` VARCHAR(100) NOT NULL ,
  `budget` DECIMAL(12,3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
COMMENT = 'Projects Table';