<?php


class Collection {

    public $id;
    public $collection_name;
    public $collection_news;

    public function __construct($id, $collection_name){
        $this->id = $id;
        $this->collection_name = $collection_name;
    }

    public function getCollectionNews(){
        return $this->collection_news;
    }

    public function setCollectionNews($list){
        $this->collection_news = $list;
    }

}