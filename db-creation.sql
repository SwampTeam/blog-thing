SET
    @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS,
    UNIQUE_CHECKS = 0;
SET
    @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS,
    FOREIGN_KEY_CHECKS = 0;
SET
    @OLD_SQL_MODE = @@SQL_MODE,
    SQL_MODE = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
-- -----------------------------------------------------
-- Database `blog_db`
-- -----------------------------------------------------
CREATE DATABASE IF NOT EXISTS blog_db;
-- -----------------------------------------------------
-- Table `blog_db`.`messages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog_db`.`users`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `user_name` VARCHAR(45) NOT NULL,
    `user_pass` VARCHAR(45) NOT NULL,
    `date_created` VARCHAR(45) NULL,
    `avatar_path` VARCHAR(45) NULL,
    PRIMARY KEY(`id`)
) ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `blog_db`.`messages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `blog_db`.`messages`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `message` VARCHAR(45) NOT NULL,
    `image_path` VARCHAR(45) NULL,
    `title` VARCHAR(45) NOT NULL,
    `users_id` INT NOT NULL,
    PRIMARY KEY(`id`),
    CONSTRAINT `fk_messages_users1` FOREIGN KEY(`users_id`) REFERENCES `blog_db`.`users`(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;
CREATE INDEX `fk_messages_users1_idx` ON
    `blog_db`.`messages`(`users_id` ASC);