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
CREATE TABLE users
(
  user_id           INT             NOT NULL 	PRIMARY KEY AUTO_INCREMENT,
  user_first_name   VARCHAR(50)		NOT NULL,
  user_last_name    VARCHAR(50)     NOT NULL,
  user_city         VARCHAR(20)		  NOT NULL,
  user_state        VARCHAR(2)      NOT NULL,
  user_email		    VARCHAR(50)		  NOT NULL,
  user_password		  VARCHAR(255)		NOT NULL,
  CONSTRAINT user_email_unq
    UNIQUE (user_email)
);

CREATE TABLE book
(
  isbn     		    VARCHAR(13)    PRIMARY KEY  NOT NULL,
  title         	VARCHAR(100)	    NOT NULL,
  author          VARCHAR(255)      NOT NULL,
  publishers		  VARCHAR(100)	    NOT NULL,
  publish_date		YEAR			        NOT NULL,
  thumbnail_url		VARCHAR(255)
);

CREATE TABLE user_owns_book
(
  user_id			INT         	  NOT NULL,
  isbn       	VARCHAR(13)     NOT NULL,
  CONSTRAINT user_owns_book_PK
	  PRIMARY KEY (user_id, isbn),
  CONSTRAINT user_owns_book_user_id_FK
    FOREIGN KEY (user_id)
    REFERENCES users (user_id)	
);

CREATE TABLE user_requests_book
(
  user_id			INT         	      NOT NULL,
  isbn       	VARCHAR(13)         NOT NULL,
  CONSTRAINT user_requests_book_PK
	  PRIMARY KEY (user_id, isbn),
  CONSTRAINT user_requests_book_user_id_FK
    FOREIGN KEY (user_id)
    REFERENCES users (user_id)	
);
