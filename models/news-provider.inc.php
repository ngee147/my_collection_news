<?php

# access third party api 
# documentation link "https://newsapi.org/docs/get-started"

include 'models/news.inc.php';

class NewsProvider {

    private const API_KEY = "[API KEY]";

    //property for retrieve headline
    private const HEADLINE_URL ="https://newsapi.org/v2/top-headlines?";

    //property for search news 
    private const SEARCH_NEWS_URL ="https://newsapi.org/v2/everything?";

    private $country = "my";
    private $sources = array(0=>"bbc-news", 1=>"techradar", 2=>"cnn", 3=>"reddit-r-all"); 
    private $sortBy = array(0=>"popularity");
    private $search = "";
    private $dateFrom = "";

   public function __construct()
   {
    
   }

    public function getHeadline(){
        $response = file_get_contents(self::HEADLINE_URL
                    .'country='. $this->country .'&'
                    .'apiKey='.self::API_KEY );
             $response = json_decode($response);
            //$response = json_decode(json_encode($response), true);
            //var_dump($response);
           // print_r($response->status);
            if($response->status == "ok"){
                $articles = $response->articles;
                $new_collection = array();
                foreach($articles as $key=>$article){
                    // print_r($article->author);
                    // echo "<br>";

                    $new_source =  $article->source; // obejct => {id: "" name: ""}

                    $headline_news = new News(
                        $article->author,
                         $article->content,
                          $article->description,
                           date('Y-m-d h:i:s', strtotime($article->publishedAt)),
                            $article->title,
                             $article->url,
                              $article->urlToImage,
                              $new_source->name
                    );
                    array_push($new_collection, $headline_news);
                }   
            }
            return  $new_collection;
    }

     public function getSearchNews($keyword){
        $search_date_from = date('Y-m-01');
        $response = file_get_contents(self::SEARCH_NEWS_URL
                    .'q='. $keyword .'&'
                    .'from='.$search_date_from.'&'
                    .'sortBy=popularity&'
                    .'apiKey='.self::API_KEY );
             $response = json_decode($response);
            if($response->status == "ok"){
                $articles = $response->articles;
                $new_collection = array();
                foreach($articles as $key=>$article){

                    $new_source =  $article->source; // obejct => {id: "" name: ""}

                    $headline_news = new News(
                        $article->author,
                         $article->content,
                          $article->description,
                           date('Y-m-d h:i:s', strtotime($article->publishedAt)),
                            $article->title,
                             $article->url,
                              $article->urlToImage,
                              $new_source->name
                    );
                    array_push($new_collection, $headline_news);
                }   
            }
            return  $new_collection;
    }

}

