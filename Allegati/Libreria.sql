CREATE TABLE book(
  id INT NOT NULL,
  title VARCHAR NOT NULL,
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
  id INT NOT NULL,
  `name` VARCHAR NOT NULL,
  surname VARCHAR NOT NULL,
  birth_year INT,
  PRIMARY KEY(id)
);

CREATE TABLE publisher(
  id INT NOT NULL,
  `name` INT NOT NULL,
  country INT,
  foundation_year INT,
  PRIMARY KEY(id)
);

CREATE TABLE `user`(
  id INT NOT NULL,
  username VARCHAR NOT NULL,
  `password` VARCHAR NOT NULL,
  `admin` BOOLEAN,
  PRIMARY KEY(id)
);

ALTER TABLE book
  ADD CONSTRAINT author_book FOREIGN KEY (author_id) REFERENCES author (id);

ALTER TABLE book
  ADD CONSTRAINT publisher_book
    FOREIGN KEY (publisher_id) REFERENCES publisher (id);
