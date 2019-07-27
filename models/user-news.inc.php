<?php

include_once 'user-session.inc.php';

class UserNews{

    public $id;
    public $author ;
    public $description ;
    public $publishedAt ;
    public $title ;
    public $url ;
    public $urlToImagele ;
    public $source;
    public $user_comment;

    public function __construct($id, $author, $description, 
        $publishedAt, $title, $url, $urlToImagele, $source, $user_comment)
   {
       $this->id = $id;
       $this->author = $author;
       $this->description = $description;
       $this->publishedAt = $publishedAt;
       $this->title = $title;
       $this->url = $url;
       $this->urlToImagele = $urlToImagele;
       $this->source = $source;
       $this->user_comment = $user_comment;
   }

}