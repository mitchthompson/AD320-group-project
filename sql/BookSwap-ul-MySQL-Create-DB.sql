/**************************************************************
 *
 * BookSwap application UL Database
 *
 * This script creates the UL (User Library) database
 * 		for the BookSwap application
 * 
 *************************************************************/

-- create the database
DROP DATABASE IF EXISTS ul;
CREATE database ul;

-- select the database
USE ul;

-- create tables
CREATE TABLE user
(
  user_id           INT             NOT NULL 	AUTO_INCREMENT,
  user_first_name   VARCHAR(50)		NOT NULL,
  user_last_name    VARCHAR(50)     NOT NULL,
  user_zip          VARCHAR(20)		NOT NULL,
  user_email		VARCHAR(50)		NOT NULL,
  user_password		VARCHAR(20)		NOT NULL,
  CONSTRAINT user_pk 
    PRIMARY KEY (user_id),
  CONSTRAINT user_email_unq
    UNIQUE (user_first_name, user_last_name, user_email)
);

CREATE TABLE book
(
  isbn_10      		VARCHAR(20)     NOT NULL,
  title         	VARCHAR(100)	NOT NULL,
  publishers		VARCHAR(100)	NOT NULL,
  publish_date		DATE			NOT NULL,
  number_of_pages	INT,
  thumbnail_url		VARCHAR(255),			
  CONSTRAINT isbn_10_pk 
    PRIMARY KEY (isbn_10)
);

CREATE TABLE user_book
(
  user_id			INT         	NOT NULL,
  isbn_10       	VARCHAR(20)     NOT NULL,
  entry_date        DATE        	NOT NULL,
  delete_date		DATE,
  CONSTRAINT user_book_pk
    PRIMARY KEY (user_id, isbn_10)
);

CREATE TABLE author
(
  author_id				INT         	NOT NULL	AUTO_INCREMENT,
  author_first_name		VARCHAR(50)     NOT NULL,
  author_last_name		VARCHAR(50)		NOT NULL,
  CONSTRAINT author_id_pk
    PRIMARY KEY (author_id)
);

CREATE TABLE author_book
(
  author_id				INT         	NOT NULL,
  isbn_10       		VARCHAR(20)     NOT NULL,
  CONSTRAINT author_book_pk
    PRIMARY KEY (author_id, isbn_10)
);