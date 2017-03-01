<?php

/**
 * Created by PhpStorm.
 * User: ahand
 * Date: 2/20/17
 * Time: 8:36 PM
 */
class Book
{

    //sample
    private static $select = <<<'STMT'

    SELECT b.isbn_10
  , b.title
  , b.publish_date
  , b.thumbnail_url
  , a.author_first_name
  , a.author_last_name

    FROM book b
    INNER JOIN author_book ab
        on b.isbn_10 = ab.isbn_10
    INNER JOIN author a
        on ab.author_id = a.author_id;
    
STMT;



    protected static $isbn_10, $title, $publish_date, $thumbnail_url, $author_first, $author_last;


    private function __construct(){}



    private static function retrieveBook($isbn){
        $dbPDO = new dbPDO();
        $stmt = $dbPDO->prepare(self::$select);
        $stmt->execute([$isbn]);
        $result =  $stmt->fetchObject(__CLASS__);

        //close conn
        $dbPDO = null;
        $stmt = null;


}


    public static function getBookData($isbn){

        self::retrieveBook($isbn);

        $book = '<div class="book">';

        if(self::$isbn_10){
            $book .= "<img src='" . self::$thumbnail_url . "'>'";
            $book .= "<h3>TITLE:".self::$title."</h3>";
            $book .= "<h4>DATE:".self::$publish_date."</h4>";
            $book .= "<h4>AUTHOR:".self::$author_last.", ".self::$author_last."</h4>";
            $book .= "<h4>ISBN:".self::$isbn_10."</h4>";
            $book .= "</div>";
        }

        return $book;
    }


}