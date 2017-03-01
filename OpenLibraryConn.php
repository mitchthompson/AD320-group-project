<?php
include 'Book.php';
include './httpful.phar';
/**
 * Created by PhpStorm.
 * User: ahand
 * Date: 2/20/17
 * Time: 8:47 PM
 */
class OpenLibraryConn
{

    /**
     * Example url: https://openlibrary.org/api/books?bibkeys=ISBN:9780980200447&jscmd=data&format=json
     * NOTE: openlibrary only takes numerical identifiers for request info (isbn 10/13, lccn, etc.)
     */


    private $format = 'format=json';
    private $jsonType = 'jcmd=data';
    private $url = 'https://openlibrary.org/api/books?';

    private $isbn;
    private $data;

    /**
     * OpenLibraryConn constructor.
     * @param $isbn
     *
     * TODO: please verify isbn is numeric and is string
     */
    public function __construct($isbn)
    {
        $this->isbn = $isbn;
        if(strlen($isbn) === 10 || strlen($isbn) === 13 ) {
            $this->url .= 'bibkeys=ISBN:' . $isbn . "&" . $this->format . "&" . $this->jsonType;
        }
    }

    public function getBook(){
        $books = $this->CallAPI();
        var_dump($books);
    }


    private function CallAPI()
    {

        return file_get_contents($this->url);
    }

}




