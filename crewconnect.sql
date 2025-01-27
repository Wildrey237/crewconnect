DROP DATABASE IF EXISTS crewconnect;
CREATE DATABASE crewconnect;
USE crewconnect;

-- User Table

-- Domain Table
CREATE TABLE domain ( 
    domain_id INT PRIMARY KEY AUTO_INCREMENT,    
    nom VARCHAR(255) NOT NULL  
);
CREATE TABLE `user` (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255),
    prenom VARCHAR(255),
    age INT NOT NULL,
    biographie VARCHAR(255),
    domain_id INT,
    mdp VARCHAR(255) NOT NULL, -- Mot de passe 
    FOREIGN KEY (domain_id) REFERENCES domain (domain_id)
);

-- Like User Table
CREATE TABLE like_user (
    like_user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id_author INT NOT NULL,
    user_id_receiver INT NOT NULL,
    FOREIGN KEY (user_id_author) REFERENCES `user`(user_id),
    FOREIGN KEY (user_id_receiver) REFERENCES `user`(user_id)
);

-- Category Table
CREATE TABLE category (
    category_id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(255) NOT NULL,
    domain_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (domain_id) REFERENCES domain(domain_id),
    FOREIGN KEY (user_id) REFERENCES `user`(user_id)
);

-- Announce Table
CREATE TABLE announce (
    announce_id INT PRIMARY KEY AUTO_INCREMENT,
    texte VARCHAR(255) NOT NULL,
    `date` DATE NOT NULL,
    `type` INT NOT NULL,
    domain_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (domain_id) REFERENCES domain(domain_id),
    FOREIGN KEY (user_id) REFERENCES `user`(user_id)
);

-- Like Announce Table
CREATE TABLE like_announce (
    like_announce_id INT PRIMARY KEY AUTO_INCREMENT,
    announce_id INT NOT NULL,
    FOREIGN KEY (announce_id) REFERENCES announce(announce_id)
);

-- Message Table
CREATE TABLE message (
    message_id INT PRIMARY KEY AUTO_INCREMENT,
    content VARCHAR(255) NOT NULL,
    sent_date DATE,
    user_id_author INT NOT NULL,
    user_id_receiver INT NOT NULL,
    FOREIGN KEY (user_id_author) REFERENCES `user`(user_id),
    FOREIGN KEY (user_id_receiver) REFERENCES `user`(user_id)
);

-- Notification User Table
CREATE TABLE notification_user (
    notif_user_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id_author INT NOT NULL,
    user_id_receiver INT NOT NULL,
    FOREIGN KEY (user_id_author) REFERENCES `user`(user_id),
    FOREIGN KEY (user_id_receiver) REFERENCES `user`(user_id)
);

-- Notification Announce Table
CREATE TABLE notification_announce (
    notif_announce_id INT PRIMARY KEY AUTO_INCREMENT,
    announce_id INT NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (announce_id) REFERENCES announce(announce_id),
    FOREIGN KEY (user_id) REFERENCES `user`(user_id)
);
