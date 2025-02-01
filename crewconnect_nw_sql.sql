-- Supprimer la base de données si elle existe et la recréer
DROP DATABASE IF EXISTS crewconnect;
CREATE DATABASE crewconnect;
USE crewconnect;

-- Table des utilisateurs
CREATE TABLE user (
                       user_id    INT PRIMARY KEY AUTO_INCREMENT,
                       nom        VARCHAR(255),
                       prenom     VARCHAR(255),
                       age        INT CHECK (age >= 0), -- Vérification de l'âge positif
                       biographie TEXT,
                       mdp        VARCHAR(255) NOT NULL,
                       mail       VARCHAR(255) UNIQUE NOT NULL
);

-- Table des annonces
CREATE TABLE announce (
                           announce_id   INT PRIMARY KEY AUTO_INCREMENT,
                           user_id       INT NOT NULL,
                           texte         TEXT,
                           date_posted   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                           type          INT,
                           profil_voulu  VARCHAR(255),
                           FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE
);

-- Table des messages
CREATE TABLE message (
                          message_id   INT PRIMARY KEY AUTO_INCREMENT,
                          user_id      INT NOT NULL,
                          content      TEXT,
                          sent_date    TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                          FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE
);

-- Table des domaines
CREATE TABLE domain (
                         domain_id INT PRIMARY KEY AUTO_INCREMENT,
                         nom       VARCHAR(255) UNIQUE NOT NULL
);

-- Table des catégories
CREATE TABLE category (
                            category_id INT PRIMARY KEY AUTO_INCREMENT,
                            domain_id   INT NOT NULL,
                            nom         VARCHAR(255) UNIQUE NOT NULL,
                            FOREIGN KEY (domain_id) REFERENCES domain(domain_id) ON DELETE CASCADE
);

-- Table des relations entre utilisateurs et catégories
CREATE TABLE user_has_category (
                                   user_id      INT NOT NULL,
                                   category_id  INT NOT NULL,
                                   PRIMARY KEY (user_id, category_id),
                                   FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE,
                                   FOREIGN KEY (category_id) REFERENCES category(category_id) ON DELETE CASCADE
);

-- Table des notifications d'annonces
CREATE TABLE notification_announce (
                                       notification_id INT PRIMARY KEY AUTO_INCREMENT,
                                       announce_id     INT NOT NULL,
                                       user_id         INT NOT NULL,
                                       FOREIGN KEY (announce_id) REFERENCES announce(announce_id) ON DELETE CASCADE,
                                       FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE
);

-- Table des notifications des utilisateurs
CREATE TABLE notification_user (
                                   notification_id INT PRIMARY KEY AUTO_INCREMENT,
                                   user_id         INT NOT NULL,
                                   FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE
);

-- Table des likes sur les annonces
CREATE TABLE like (
                       like_id     INT PRIMARY KEY AUTO_INCREMENT,
                       announce_id INT NOT NULL,
                       user_id     INT NOT NULL,
                       FOREIGN KEY (announce_id) REFERENCES announce(announce_id) ON DELETE CASCADE,
                       FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE
);

-- Insertion des domaines par défaut
INSERT INTO domain (nom) VALUES
                              ('Musique'),
                              ('Cinéma'),
                              ('Sport'),
                              ('Lecture'),
                              ('Informatique'),
                              ('Gaming');
