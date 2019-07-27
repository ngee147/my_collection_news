<?php

include_once 'models/collection.inc.php';
include 'models/user-news.inc.php';

class UserNewsProvider{

 public function getUserCollectionNews(){
        $user_session = new UserSession();
        $user = $user_session->getUserFromSession();

         
        if($user == false || $user == null){
            echo '<script>location.href="index.php?sessiontimeout=true";</script>' ;
        }else{

             $conn = DBH::getInstance();

             $collections = array();

             /*retrive collection from db*/
            $stmt = $conn->prepare("SELECT * FROM collection WHERE user_id = ?");
            $stmt->execute([$user->id]);
            $count = $stmt->rowCount();

            if ($count > 0) {

                foreach ($stmt->fetchAll() as $result) {
                    $object = new Collection($result->id, $result->collection_name);
                    array_push($collections, $object);
                }

                foreach ($collections as $key=>$collection) {
                      $stmt = $conn->prepare("SELECT * FROM news WHERE collection_id = ?");
                      $stmt->execute([$collection->id]);
                      $count = $stmt->rowCount();

                      if( $count > 0){
                          $collections[$key]->collection_news = $stmt->fetchAll();
                        //   $collection.setCollectionNews($stmt->fetchAll());
                      }else{
                           $collections[$key]->collection_news = array();
                      }

                }
            } else {
                echo '<span>No Collection</span>';
            }

            return $collections;
        }
    }

    public function getNewsByCollection($collection_id){

        $user_session = new UserSession();
        $user = $user_session->getUserFromSession();

        if($user == false || $user == null){
            echo '<script>location.href="index.php?sessiontimeout=true";</script>' ;
        }else{

             $conn = DBH::getInstance();

             $news = array();
      
            if($this->CheckUserOwnCollection($collection_id, $user->id)){
                 /*retrive collection from db*/
                $stmt = $conn->prepare("SELECT * FROM news WHERE collection_id = ?");
                $stmt->execute([$collection_id]);
                $count = $stmt->rowCount();

                if ($count > 0) {
                    foreach ($stmt->fetchAll() as $result) {
                        $object = new UserNews($result->id, $result->author, 
                        $result->description, $result->published_at, $result->title, $result->url, 
                        $result->urlToImagele, $result->source, $result->user_comment);
                        array_push($news, $object);
                    }
                } else {
                    echo '<span>No Collection</span>';
                }

                return $news;
            }else{
                 return $news;
            }
        }
    }

    public function CheckUserOwnCollection($collection_id,$user_id){
        $conn = DBH::getInstance();

       /*check is this colleciton belong to this user*/
        $stmt = $conn->prepare("SELECT * FROM collection WHERE id = ? AND user_id = ?");
        $stmt->execute([$collection_id,$user_id]);
        $count = $stmt->rowCount();

          if ($count > 0) {
            return true;
          }else{
            return false;
          }
    }

    public function GetNewsFromId($news_id){
        $conn = DBH::getInstance();

       /*check is this colleciton belong to this user*/
        $stmt = $conn->prepare("SELECT * FROM news WHERE id = ?");
        $stmt->execute([$news_id]);
        $count = $stmt->rowCount();

         if ($count > 0) {
            foreach ($stmt->fetchAll() as $result) {
                $object = new UserNews($result->id, $result->author, 
                $result->description, $result->published_at, $result->title, $result->url, 
                $result->urlToImagele, $result->source, $result->user_comment);
                return $object;
            } 
        } else {
            return null;
        }
    }
}


?>