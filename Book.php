<?php

/**
 * Created by PhpStorm.
 * User: ahand
 * Date: 2/20/17
 * Time: 8:36 PM
 */
class Book
{
    private $author,$title,$ISBN,$year,$thumbnail;

    /**
     * Book constructor.
     * @param $author
     * @param $title
     * @param $ISBN
     * @param $year
     * @param $thumbnail
     */
    public function __construct($author, $title, $ISBN, $year, $thumbnail)
    {
        $this->author = $author;
        $this->title = $title;
        $this->ISBN = $ISBN;
        $this->year = $year;
        $this->thumbnail = $thumbnail;
    }

    public static function retrieveBook(){
        $stmt = $pdo->prepare('SELECT isbn, author, title, year, thumbnail FROM books WHERE id=?');
        $stmt->execute([$id]);
        return $stmt->fetchObject(__CLASS__);
}

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return mixed
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    public function getElement(){
        return <<<BOOK

            <div class="book">
            <img src="$this->thumbnail"/>
            <h3>TITLE:  $this->title</h3>
            <h4>AUTHOR: $this->author</h4>
            <h4>ISBN:   $this->ISBN</h4>
            </div>
BOOK;
    }


}