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
     *
     * @param $isbn
     * @param bool $exists false will call api to fill in the rest
     */
    public function __construct($isbn)
    {
        $this->isbn = $isbn;
        //$exists = false;
        if($this->isbn){
            echo 'Book exists, fetching from db.';
            try {
                $conn = new dbPDO();
                $sth = $conn->prepare('SELECT * FROM ul.book WHERE isbn=?');
                $sth->execute([$this->isbn]);
                while($row = $sth->fetch(PDO::FETCH_ASSOC)){
                    $this->author = $row['author'];
                    $this->title =  $row['title'];
                    $this->publishers = $row['publishers'];
                    //var_dump($json["ISBN:$isbn"]['publishers']);
                    $this->publish_date = $row['publish_date'];
                    $this->thumbnail_url = $row['thumbnail_url'];
                }

                $conn = null;
                $sth = null;

            } catch (PDOException $p) {
                echo $p->getMessage();
            }
        }

        else{
            echo 'Book does not exist, trying from API';
            $format = 'format=json';
            $jsonType = 'jscmd=data';
            $url = 'https://openlibrary.org/api/books?';
            $url .= 'bibkeys=ISBN:' . $isbn . "&" . $jsonType . "&" . $format;

            echo $url;

            //TODO: error handling
            $json = json_decode(file_get_contents($url),true);


            $this->isbn_10 = $isbn;
            $this->author =         $json["ISBN:$isbn"]['authors'][0]['name'];
            $this->title =          $json["ISBN:$isbn"]['title'];
            $this->publishers =     $json["ISBN:$isbn"]['publishers'][0]['name'];
            //var_dump($json["ISBN:$isbn"]['publishers']);
            $this->publish_date =   $json["ISBN:$isbn"]['publish_date'];
            $this->thumbnail_url =  $json["ISBN:$isbn"]['cover']['medium'];

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
        $book = '<div class="book">';

        if($this->isbn){
            $book .= "<img src='"       .$this->thumbnail_url   . "'/>";
            $book .= "<h3>TITLE:"       .$this->title           ."</h3>";
            $book .= "<h3>PUBLISHER:"   .$this->publishers      ."</h3>";
            $book .= "<h4>DATE:"        .$this->publish_date    ."</h4>";
            $book .= "<h4>AUTHOR:"      .$this->author     ."</h4>";
            $book .= "<h4>ISBN:"        .$this->isbn         ."</h4>";
            if($user){
                $book .= "<h5>USER:"    .$user                  ."</h5>";
            }
        }
        $book .= "</div>";
        return $book;
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