DROP DATABASE IF EXISTS libreria;

CREATE DATABASE libreria;

USE libreria;

CREATE TABLE book(
  id INT NOT NULL AUTO_INCREMENT,
  title VARCHAR(45) NOT NULL,
  summary TEXT(500),
  release_year INT NOT NULL,
  `ISBN` CHAR(17) NOT NULL,
  price DOUBLE,
  cover_image CHAR(36),
  copies INT NOT NULL,
  ordered BOOLEAN DEFAULT FALSE,
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
  `name` VARCHAR(45) NOT NULL,
  country VARCHAR(45),
  foundation_year INT,
  PRIMARY KEY(id)
);

CREATE TABLE `user`(
  id INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(45) NOT NULL,
  `password` CHAR(72) NOT NULL,
  `admin` BOOLEAN,
  PRIMARY KEY(id),
  CONSTRAINT unique_username UNIQUE(username)
);

ALTER TABLE book
  ADD CONSTRAINT author_book FOREIGN KEY (author_id) REFERENCES author (id);

ALTER TABLE book
  ADD CONSTRAINT publisher_book
    FOREIGN KEY (publisher_id) REFERENCES publisher (id);
    
        
INSERT INTO author (name, surname, birth_year) VALUES ("Lil", "Pump", "1995");
INSERT INTO author (name, surname, birth_year) VALUES ("Bob", "Marley", "1988");

INSERT INTO publisher (name, country, foundation_year) VALUES ("Montadori", "Slovenia", 1945);
INSERT INTO publisher (name, country, foundation_year) VALUES ("Tinellibri", "Svizzera", 1980);

INSERT INTO book (title, summary, release_year, ISBN, price, cover_image, copies, author_id, publisher_id)
VALUES 
  ('The Great Gatsby', 'A novel about the American Dream', 1925, '978-3-16-148410-0', 25.99, 'gatsby_cover.jpg', 100, 1, 1),
  ('To Kill a Mockingbird', 'A classic tale of racial injustice in the Deep South', 1960, '978-0-06-112008-4', 19.99, 'mockingbird_cover.jpg', 150, 1, 2),
  ('1984', 'A dystopian novel by George Orwell', 1949, '978-0-452-28423-4', 18.99, '1984_cover.jpg', 120, 2, 1),
  ('The Hobbit', 'A fantasy novel by J.R.R. Tolkien', 1937, '978-0-395-08353-7', 22.99, 'hobbit_cover.jpg', 200, 2, 2);

INSERT INTO user (username, password, admin)
VALUES
('user', '$2y$10$BJn7KgQ5imRJlQ6ijNM4T.OvCmWkyHBFtfxv7lqRevWHUIas/itfq', 0),
('admin', '$2y$10$KQWcQVJS.bFK0vOnipF54eN/qSnd389TH3w85eW3yBLvi7UbNW4Xy', 1);