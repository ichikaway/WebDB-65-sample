CREATE TABLE `posts` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`name` VARCHAR( 40 ) NOT NULL ,
`email` VARCHAR( 100 ) NOT NULL ,
`text` TEXT NOT NULL ,
`created` DATETIME NOT NULL ,
`modified` DATETIME NOT NULL
) ENGINE = InnoDB;

