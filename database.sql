CREATE TABLE `auto` (
  `auto_id` INT UNSIGNED NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
  `name`    VARCHAR(255)                 DEFAULT NULL,
  `brand`   VARCHAR(255)                 DEFAULT NULL,
  `engine`  INT UNSIGNED                 DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT
  CHARSET = utf8;

CREATE TABLE `driver` (
  `driver_id` INT UNSIGNED NOT NULL UNIQUE AUTO_INCREMENT PRIMARY KEY,
  `name`      VARCHAR(255)                 DEFAULT NULL,
  `age`       INT(3) UNSIGNED              DEFAULT NULL
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
