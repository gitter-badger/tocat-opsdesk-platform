CREATE  TABLE IF NOT EXISTS `transactions` (
  `uid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `timestamp` INT UNSIGNED NOT NULL,
  `author_uid` INT UNSIGNED NOT NULL,
  `account_uid` INT UNSIGNED NOT NULL,
  `total` DECIMAL(12,3) NOT NULL DEFAULT 0.000,
  `comment` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COMMENT = 'Transactions';