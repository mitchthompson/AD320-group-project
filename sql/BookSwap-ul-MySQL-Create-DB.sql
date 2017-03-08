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
  user_city          VARCHAR(20)		NOT NULL,
  user_state        VARCHAR(2)    NOT NULL,
  user_email		VARCHAR(50)		NOT NULL,
  user_password		VARCHAR(20)		NOT NULL,
  CONSTRAINT user_pk 
    PRIMARY KEY (user_id),
  CONSTRAINT user_email_unq
    UNIQUE (user_first_name, user_last_name, user_email)
);

CREATE TABLE book
(
  isbn     		VARCHAR(13)     NOT NULL,
  title         	VARCHAR(100)	NOT NULL,
  author        VARCHAR(255) NOT NULL,
  publishers		VARCHAR(100)	NOT NULL,
  publish_date		DATE			NOT NULL,
  thumbnail_url		VARCHAR(255),			
  CONSTRAINT isbn_10_pk 
    PRIMARY KEY (isbn_10)
);

CREATE TABLE user_owns_book
(
  user_id			INT         	NOT NULL,
  isbn       	VARCHAR(13)     NOT NULL,
  entry_date        DATE        	NOT NULL,
  delete_date		DATE,
  CONSTRAINT user_book_pk
    PRIMARY KEY (user_id, isbn_10)
);

CREATE TABLE user_requests_book
(
  user_id			INT         	      NOT NULL,
  isbn       	VARCHAR(13)     NOT NULL,
  entry_date        DATE        	NOT NULL,
  delete_date		DATE,
  CONSTRAINT user_book_pk
    PRIMARY KEY (user_id, isbn_10)
);
