
DROP SCHEMA IF EXISTS `crewconnect` ;
CREATE SCHEMA IF NOT EXISTS `crewconnect` DEFAULT CHARACTER SET utf8 ;
USE `crewconnect` ;

CREATE TABLE IF NOT EXISTS `crewconnect`.`user` (
                                                    `user_id` INT NOT NULL AUTO_INCREMENT,
                                                    `nom` VARCHAR(255) NULL,
                                                    `prenom` VARCHAR(255) NULL,
                                                    `age` INT NULL,
                                                    `biographie` VARCHAR(255) NULL,
                                                    `mdp` VARCHAR(255) NULL,
                                                    PRIMARY KEY (`user_id`));


CREATE TABLE IF NOT EXISTS `crewconnect`.`announce` (
                                                        `announce_id` INT NOT NULL AUTO_INCREMENT,
                                                        `texte` VARCHAR(255) NULL,
                                                        `date` DATE NULL,
                                                        `user_user_id` INT NOT NULL,
                                                        PRIMARY KEY (`announce_id`, `user_user_id`),
                                                            FOREIGN KEY (`user_user_id`)
                                                                REFERENCES `crewconnect`.`user` (`user_id`)
);


CREATE TABLE IF NOT EXISTS `crewconnect`.`message` (
                                                       `message_id` INT NOT NULL AUTO_INCREMENT,
                                                       `content` VARCHAR(255) NULL,
                                                       `sent_date` DATE NULL,
                                                       `user_user_id` INT NOT NULL,
                                                       PRIMARY KEY (`message_id`, `user_user_id`),
                                                           FOREIGN KEY (`user_user_id`)
                                                               REFERENCES `crewconnect`.`user` (`user_id`)
                                                               ON DELETE NO ACTION
                                                               ON UPDATE NO ACTION);


CREATE TABLE IF NOT EXISTS `crewconnect`.`domain` (
                                                      `domain_id` INT NOT NULL AUTO_INCREMENT,
                                                      `nom` VARCHAR(255) NULL,
                                                      PRIMARY KEY (`domain_id`));

CREATE TABLE IF NOT EXISTS `crewconnect`.`category` (
                                                        `category_id` INT NOT NULL AUTO_INCREMENT,
                                                        `nom` VARCHAR(255) NULL,
                                                        `domain_domain_id` INT NOT NULL,
                                                        PRIMARY KEY (`category_id`, `domain_domain_id`),
                                                            FOREIGN KEY (`domain_domain_id`)
                                                                REFERENCES `crewconnect`.`domain` (`domain_id`)
                                                                ON DELETE NO ACTION
                                                                ON UPDATE NO ACTION);

INSERT INTO `domain` (`domain_id`, `nom`) VALUES
                                              (1, 'Musique'),
                                              (2, 'Cinéma'),
                                              (3, 'Sport'),
                                              (4, 'Lecture'),
                                              (5, 'Informatique'),
                                              (6, 'Gaming');

CREATE TABLE IF NOT EXISTS `crewconnect`.`user_has_category` (
                                                                 `user_user_id` INT NOT NULL AUTO_INCREMENT,
                                                                 `category_category_id` INT NOT NULL,
                                                                 `category_domain_domain_id` INT NOT NULL,
                                                                 PRIMARY KEY (`user_user_id`, `category_category_id`, `category_domain_domain_id`),
                                                                     FOREIGN KEY (`user_user_id`)
                                                                         REFERENCES `crewconnect`.`user` (`user_id`)
                                                                         ON DELETE NO ACTION
                                                                         ON UPDATE NO ACTION,
                                                                     FOREIGN KEY (`category_category_id` , `category_domain_domain_id`)
                                                                         REFERENCES `crewconnect`.`category` (`category_id` , `domain_domain_id`)
                                                                         ON DELETE NO ACTION
                                                                         ON UPDATE NO ACTION);


CREATE TABLE IF NOT EXISTS `crewconnect`.`notification_announce` (
                                                                     `notification_announce_id` INT NOT NULL AUTO_INCREMENT,
                                                                     `announce_announce_id` INT NOT NULL,
                                                                     `announce_user_user_id` INT NOT NULL,
                                                                     PRIMARY KEY (`notification_announce_id`, `announce_announce_id`, `announce_user_user_id`),
                                                                         FOREIGN KEY (`announce_announce_id` , `announce_user_user_id`)
                                                                             REFERENCES `crewconnect`.`announce` (`announce_id` , `user_user_id`)
                                                                             ON DELETE NO ACTION
                                                                             ON UPDATE NO ACTION);


CREATE TABLE IF NOT EXISTS `crewconnect`.`notification_user` (
                                                                 `notification_user_id` INT NOT NULL AUTO_INCREMENT,
                                                                 `user_user_id` INT NOT NULL,
                                                                 PRIMARY KEY (`notification_user_id`, `user_user_id`),
                                                                     FOREIGN KEY (`user_user_id`)
                                                                         REFERENCES `crewconnect`.`user` (`user_id`)
                                                                         ON DELETE NO ACTION
                                                                         ON UPDATE NO ACTION);
