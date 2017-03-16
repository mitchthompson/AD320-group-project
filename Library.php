<?php

include 'Book.php';
/**
 * Created by PhpStorm.
 * User: ahand
 * Date: 3/8/17
 * Time: 7:38 PM
 */
class Library
{

    private function __Construct(){}

    public static function getBooksByUser($user_id){

        $conn = new dbPDO();
        $stmt = <<<SELECT
            SELECT user_id, isbn
            FROM ul.user_owns_book
            WHERE user_id = ?;
SELECT;

        $sth = $conn->prepare($stmt);
        $sth->execute([$user_id]);
        while($row = $sth->fetch(PDO::FETCH_ASSOC)){
            $book = new Book($row['isbn']);
            //echo 'fetching book...';
            echo $book->getElement();
        }
        $conn = null;
        $sth = null;

    }

    public static function getLibrary(){

        $conn = new dbPDO();
        $stmt = <<<SELECT
            SELECT *
            FROM ul.book;
SELECT;

        $sth = $conn->prepare($stmt);
        $sth->execute();
        while($row = $sth->fetch(PDO::FETCH_ASSOC)){
            $book = new Book($row['isbn']);
            //echo 'fetching book...';
            echo $book->getElement();
        }
        $conn = null;
        $sth = null;
    }

    public static function getRequestsByUser($user_id){

        $conn = new dbPDO();
        $stmt = <<<SELECT
            SELECT user_id, isbn
            FROM ul.user_requests_book
            WHERE user_id = ?;
SELECT;

        $sth = $conn->prepare($stmt);
        $sth->execute([$user_id]);
        while($row = $sth->fetch(PDO::FETCH_ASSOC)){
            $book = new Book($row['isbn']);
            //echo 'fetching book...';
            echo $book->getElement();
        }
        $conn = null;
        $sth = null;

    }

    public static function getUsersByBook($isbn){
        $conn = new dbPDO();
        $stmt = <<<SELECT
            SELECT u.user_id, u.user_email, u.user_city, u.user_state, b.title
            FROM ul.user u
            INNER JOIN ul.user_owns_book ub
                ON u.user_id = ub.user_id
            INNER JOIN ul.book b
                ON ub.isbn = b.isbn
            WHERE ub.isbn = ?;
SELECT;


        $sth = $conn->prepare($stmt);
        $sth->execute([$isbn]);
        while($row = $sth->fetch(PDO::FETCH_ASSOC)){
            //var_dump($row);
            echo <<<TABLE
             <table class="table">
             <thead class="thead-default">
                <tr>
                    <th>Email</th>
                    <th>City</th> 
                    <th>State</th>
                    <th>User Page</th>
                </tr>  
            </thead>
            <tbody>
                <tr>
                    <td>$row[user_email]</td>
                    <td>$row[user_city]</td>
                    <td>$row[user_state]</td>
                    <td><a href="./user-view.php?user_id=$row[user_id]">See All Books</a></td>
                </tr> 
              </tbody>       
            </table>
TABLE;
        }

        $conn = null;
        $sth = null;
    }

    public static function insertRequest($isbn, $user_id){
        $book = new Book($isbn);
        $title = $book->getTitle();
        $author = $book->getAuthor();
        $publishers = $book->getPublishers();
        $publish_date = $book->getPublishDate();
        $thumbnail_url = $book->getThumbnailUrl();

        $conn = new dbPDO();

            $stmt = <<<INSERT
           
                INSERT INTO user_requests_book (user_id, isbn)
                    VALUES($user_id, $isbn);
                INSERT INTO book (isbn, title, author, publishers, publish_date, thumbnail_url)
                    VALUES('$isbn','$title','$author','$publishers','$publish_date','$thumbnail_url'); 
                
INSERT;
        echo $stmt;
            $sth = $conn->prepare($stmt);
        try {
            $sth->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        $conn = null;
        $sth = null;
    }
    
    public static function getBook($isbn){

            $book = new Book($isbn);
            //echo 'fetching book...';
            echo $book->getElement();
        }

    public static function insertBook($isbn, $user_id){
        $book = new Book($isbn);
        $title = $book->getTitle();
        $author = $book->getAuthor();
        $publishers = $book->getPublishers();
        $publish_date = $book->getPublishDate();
        $thumbnail_url = $book->getThumbnailUrl();

        $conn = new dbPDO();

            $stmt = <<<INSERT
           
                INSERT INTO user_owns_book (user_id, isbn)
                    VALUES($user_id, $isbn);
                INSERT INTO book (isbn, title, author, publishers, publish_date, thumbnail_url)
                    VALUES('$isbn','$title','$author','$publishers','$publish_date','$thumbnail_url'); 
                
INSERT;
        echo $stmt;
            $sth = $conn->prepare($stmt);
        try {
            $sth->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        $conn = null;
        $sth = null;
        
    }

}



/**
 *
 * Sample usage
 *
 *
 */


//Library::getBooksByUser(1);
//Library::getUsersByBook(9780980200447);
//Library::insertRequest('9780553380958','2');
