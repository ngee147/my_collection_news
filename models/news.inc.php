<?php

include_once 'user-session.inc.php';

class News{

    public $author ;
    public $content ;
    public $description ;
    public $publishedAt ;
    public $title ;
    public $url ;
    public $urlToImagele ;
    public $source;

    public function __construct($author, $content, $description, 
        $publishedAt, $title, $url, $urlToImagele, $source )
   {
       $this->author = $author;
       $this->content = $content;
       $this->description = $description;
       $this->publishedAt = $publishedAt;
       $this->title = $title;
       $this->url = $url;
       $this->urlToImagele = $urlToImagele;
       $this->source = $source;
   }

}