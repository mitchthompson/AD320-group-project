<?php

/**
 * Created by PhpStorm.
 * User: ahand
 * Date: 2/20/17
 * Time: 8:36 PM
 */

include 'db/dbPDO.php';

class Book
{

    private $isbn, $title, $author, $publishers, $publish_date, $thumbnail_url;

    /**
     * Book constructor.
     *
     * Should self populate from isbn via DB.  If Db returns null rowset, get from api.
     * @param $isbn
     */
    public function __construct($isbn)
    {
        $this->isbn = "$isbn";
            try {
                $conn = new dbPDO();
                $sth = $conn->prepare('SELECT * FROM ul.book WHERE isbn=?');
                $sth->execute([$this->isbn]);
                $book = $sth->fetch(PDO::FETCH_ASSOC);

                if($book){
                    $this->author = $book['author'];
                    $this->title =  $book['title'];
                    $this->publishers = $book['publishers'];
                    $this->publish_date = $book['publish_date'];
                    $this->thumbnail_url = $book['thumbnail_url'];
                }else{$this->getBookFromAPI($isbn);}

            } catch (PDOException $p) {
                echo $p->getMessage();
            }
            $conn = null;
            $sth = null;
    }


    /**
     * @param $isbn
     */
    private function getBookFromAPI($isbn){
        $format = 'format=json';
        $jsonType = 'jscmd=data';
        $url = 'https://openlibrary.org/api/books?';
        $url .= 'bibkeys=ISBN:' . $isbn . "&" . $jsonType . "&" . $format;
        $json = json_decode(@file_get_contents($url),true);
        if($json === FALSE || empty($json["ISBN:$isbn"])){
            echo "Book does not exist.";
        }else {
                $this->author = $json["ISBN:$isbn"]['authors'][0]['name'];
                $this->title = $json["ISBN:$isbn"]['title'];
                $this->publishers = $json["ISBN:$isbn"]['publishers'][0]['name'];
                $this->publish_date = $json["ISBN:$isbn"]['publish_date'];
                $this->thumbnail_url = $json["ISBN:$isbn"]['cover']['medium'];
        }
    }

    /**
     * @return mixed
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param mixed $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getPublishDate()
    {
        return $this->publish_date;
    }

    /**
     * @param mixed $publish_date
     */
    public function setPublishDate($publish_date)
    {
        $this->publish_date = $publish_date;
    }

    /**
     * @return mixed
     */
    public function getThumbnailUrl()
    {
        return $this->thumbnail_url;
    }

    /**
     * @param mixed $thumbnail_url
     */
    public function setThumbnailUrl($thumbnail_url)
    {
        $this->thumbnail_url = $thumbnail_url;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getPublishers()
    {
        return $this->publishers;
    }

    /**
     * @param mixed $publishers
     */
    public function setPublishers($publishers)
    {
        $this->publishers = $publishers;
    }


    public function getElement($user=false){
        $book = "<td>";

        if($this->title){


            $book .= "<img width=\"100\" height=\"100\" class=\"img-thumbnail\" src='" .$this->thumbnail_url. "' />";
            $book .= "<small>Title:  "       .$this->title           ."</small>";
            $book .= "<small>Author:  "      .$this->author     ."<br></small>";
            $book .= "<small>Publisher:  "   .$this->publishers      ."<br></small>";
            $book .= "<small>ISBN:  "        .$this->isbn         ."<br></small>";
            if($user){
                $book .= "<h5>USER:"    .$user                  ."</h5>";
            }
        }
        $book .= "</td>";

        return $book;
    }

    public function isEmpty(){
        return $this->getTitle() == '';
    }

    function __toString()
    {
        return "$this->isbn,
                $this->title,
                $this->author,
                $this->publishers,
                $this->publish_date,
                $this->thumbnail_url";
    }
}

