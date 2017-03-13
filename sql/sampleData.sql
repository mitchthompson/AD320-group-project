/**************************************************************
 *
 * Sample Data to Test Methods
 * 
 *************************************************************/

INSERT INTO `user`(`user_id`, `user_first_name`, `user_last_name`, `user_city`, `user_state`, `user_email`, `user_password`) 
VALUES ('1', 'John', 'Doe', 'Seattle', 'WA', 'jdoe@gmail.com', '12345');  

INSERT INTO `user`(`user_id`, `user_first_name`, `user_last_name`, `user_city`, `user_state`, `user_email`, `user_password`) 
VALUES ('2', 'Mary', 'Moe', 'Seattle', 'WA', 'mmoe0@gmail.com', 'abcde');              
            
INSERT INTO `book`(`isbn`, `title`, `author`, `publishers`, `publish_date`, `thumbnail_url`) 
VALUES ('9780316066747', 'Started Early, Took My Dog', 
        'Kate Atkinson', 'Reagan Arthur', '2011','https://covers.openlibrary.org/b/id/6935639-M.jpg');
        
INSERT INTO `book`(`isbn`, `title`, `author`, `publishers`, `publish_date`, `thumbnail_url`) 
VALUES ('9780525478812', 'The Fault in Our Stars', 
        'John Green', 'New York : Dutton Books', '2012','https://covers.openlibrary.org/w/id/7272823-M.jpg');
        
INSERT INTO `book`(`isbn`, `title`, `author`, `publishers`, `publish_date`, `thumbnail_url`) 
VALUES ('9781400067695', 'My Name Is Lucy Barton', 
        'Elizabeth Strout', 'New York : Random House', '2016','https://covers.openlibrary.org/w/id/7434845-M.jpg');
        
INSERT INTO `book`(`isbn`, `title`, `author`, `publishers`, `publish_date`, `thumbnail_url`) 
VALUES ('9781423160915', 'Magnus Chase and the Gods of Asgard, Book 1: The Sword of Summer', 
        'Rick Riordan', 'Los Angeles : Disney Hyperion', '2015','https://covers.openlibrary.org/b/id/7358586-M.jpg');


INSERT INTO `user_requests_book`(`user_id`, `isbn`, `entry_date`) 
    VALUES ('1','9780316066747','2017-03-12');   
    
INSERT INTO `user_requests_book`(`user_id`, `isbn`, `entry_date`) 
    VALUES ('1','9781423160915','2017-03-12'); 

INSERT INTO `user_owns_book`(`user_id`, `isbn`, `entry_date`) 
    VALUES ('1','9780525478812','2017-03-12');  

INSERT INTO `user_owns_book`(`user_id`, `isbn`, `entry_date`) 
    VALUES ('1','9781400067695','2017-03-12');  
