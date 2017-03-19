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
            FROM ul.users u
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

                <tr>
                    <td>$row[user_email]</td>
                    <td>$row[user_city]</td>
                    <td>$row[user_state]</td>
                    <td><a href="./user-view.php?user_id=$row[user_id]">See All Books</a></td>
                </tr> 
TABLE;
        }

        $conn = null;
        $sth = null;
    }

    public static function insertRequest($user_id, $isbn)
    {
        self::addBook($isbn);
        try {
            $conn = new dbPDO();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO user_requests_book VALUES ('" . $user_id . "','" . $isbn . "');";
            $conn->exec($sql);
            $conn = null;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    
    public static function getBook($isbn){

            $book = new Book($isbn);
            //echo 'fetching book...';
            echo $book->getElement();
        }

    public static function insertBook($user_id, $isbn)
    {
        self::addBook($isbn);
        try {
            $conn = new dbPDO();
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "INSERT INTO user_owns_book VALUES ('" . $user_id . "','" . $isbn . "');";
            $conn->exec($sql);
            $conn = null;

        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

public static function addBook($isbn)
    {
            $book = new Book($isbn);
            $title = $book->getTitle();
            $author = $book->getAuthor();
            $publishers = $book->getPublishers();
            $publish_date = $book->getPublishDate();
            $thumbnail_url = $book->getThumbnailUrl();
            $isbn = "$isbn";
            $title = "$title";
            $author = "$author";
            $publishers = "$publishers";
            $publish_date = "$publish_date";
            $thumbnail_url = "$thumbnail_url";

            try {
                $conn = new dbPDO();
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("INSERT INTO book (isbn, title, author, publishers, publish_date, thumbnail_url) VALUES (:isbn, :title, :author, :publishers, :publish_date, :thumbnail_url)");
                $stmt->bindParam(':isbn', $isbn);
                $stmt->bindParam(':title', $title);
                $stmt->bindParam(':author', $author);
                $stmt->bindParam(':publishers', $publishers);
                $stmt->bindParam(':publish_date', $publish_date);
                $stmt->bindParam(':thumbnail_url', $thumbnail_url);

                $stmt->execute();


            } catch (PDOException $e) {
                echo $e->getMessage();
            }
                $conn = null;

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
