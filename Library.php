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
            echo 'fetching book...';
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
            SELECT u.user_id, u.user_email, u.user_first_name, u.user_last_name, b.title
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
            var_dump($row);
            echo <<<TABLE
            <table>
            <tr><td>USER: $row[user_first_name]</td></tr>
            <tr><td>TITLE: $row[title]</td></tr>
            </table>
TABLE;
        }

        $conn = null;
        $sth = null;
    }

    public static function insertBookByUser(){

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
