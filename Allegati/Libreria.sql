DROP DATABASE IF EXISTS libreria;

CREATE DATABASE libreria;

USE libreria;

CREATE TABLE book(
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(45) NOT NULL,
  summary TEXT(500),
  release_year INT NOT NULL,
  `ISBN` CHAR(13) NOT NULL,
  price DOUBLE,
  cover_image LONGBLOB,
  copies INT NOT NULL,
  author_id INT NOT NULL,
  publisher_id INT NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE author(
  id INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  surname VARCHAR(45) NOT NULL,
  birth_year INT,
  PRIMARY KEY(id)
);

CREATE TABLE publisher(
  id INT NOT NULL AUTO_INCREMENT,
  `name` INT NOT NULL,
  country INT,
  foundation_year INT,
  PRIMARY KEY(id)
);

CREATE TABLE `user`(
  id INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(45) NOT NULL,
  `password` CHAR(72) NOT NULL,
  `admin` BOOLEAN DEFAULT FALSE,
  PRIMARY KEY(id),
  CONSTRAINT unique_username UNIQUE(username)
);

ALTER TABLE book
  ADD CONSTRAINT author_book FOREIGN KEY (author_id) REFERENCES author (id);

ALTER TABLE book
  ADD CONSTRAINT publisher_book
    FOREIGN KEY (publisher_id) REFERENCES publisher (id);
