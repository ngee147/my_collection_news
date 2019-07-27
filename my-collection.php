<?php
    include_once 'models/user-news-provider.inc.php';
    include_once 'view/tab-header.php';
    include_once 'view/add-collection-box.php';
?>

<link rel="stylesheet" href="css/my-collection.css" type="text/css">
<script>
    $(document).ready(function(){
        /* page load init*/
        $(".header-right a").eq(2).addClass('active');
     });

      function getRandomSize(min, max) {
            return Math.round(Math.random() * (max - min) + min);
        }

       function setCollectionLayout(collection){
           
            var allImages = "";
            var firstImgHeight = 0;
            var height = 0;
            var width = 98;
            var image = "";

            for (var i = 0; i < 6; i++) { //300 200
                
                if(firstImgHeight == 0){
                    height =  getRandomSize(50, 150);
                    firstImgHeight = height;
                }else{
                    height = 200 - height;
                    firstImgHeight = 0;
                }

                if(i < collection.collection_news.length){
                     /* need to laod image */
                    if(i == 0){  
                        allImages += '<div style="background-size:cover;background-repeat:no-repeat;background-position:center;background-image:url('+collection.collection_news[i].urlToImagele+');width:'+width+'px;height:'+height+'px;background-color:#DCDCDC;margin:0px auto;border-radius:8px;"></div>';
                    }else{
                        allImages += '<div style="background-size:cover;background-repeat: no-repeat;background-position: center;background-image:url('+collection.collection_news[i].urlToImagele+');width:'+width+'px;height:'+height+'px;background-color:#DCDCDC;margin:6px auto;border-radius:8px;"></div>';
                    }
                }else{ 
                    /* no need to laod image */
                    if(i == 0){
                        allImages += '<div style="width:'+width+'px;height:'+height+'px;background-color:#DCDCDC;margin:0px auto;border-radius:8px;"></div>';
                    }else{
                        allImages += '<div style="width:'+width+'px;height:'+height+'px;background-color:#DCDCDC;margin:6px auto;border-radius:8px;"></div>';
                    }
                }
              
            }

           $('#'+collection.id).append(allImages);
       }

       function removeCollection(collection){
        var ask = confirm("Are you sure to delete?");

        if(ask){
            /*delete news submit*/
            event.preventDefault();
            var collection_id = collection.id;

            $("#delete-collection-err").load("controllers/delete-user-collection.inc.php",
            {
                collection_id: collection_id,
            });
        }
       }

       function collectionDetail(collection){
           location.href="my-news.php?collectionRef="+collection.id+"&collectionTitle="+collection.collection_name; 
       }
   

</script>

<div id="my-collection">
    <h3>My Collection</h3>
    <div id="delete-collection-err"></div>
    <ul>
        <?php
            $user_collection_news = new UserNewsProvider();

            $x = $user_collection_news->getUserCollectionNews();

                # news list
                foreach($x as $single_collection)
                echo '<li>
                            <div class="collection-list" onclick="collectionDetail('.htmlspecialchars(json_encode($single_collection)).')">
                                <a>
                                    <section id="'.$single_collection->id.'" class="photos">
                                        <script type="text/javascript">setCollectionLayout('.json_encode($single_collection).');</script>
                                    </section>
                                </a>                        
                            </div>
                            <span class="collection-action">
                                 <span class="collection-title">'.$single_collection->collection_name.'</span>
                                  <i class="fa fa-trash" onclick="removeCollection('.htmlspecialchars(json_encode($single_collection)).')"></i>
                            </span> 
                        </li>';
            ?>
      </ul>
</div>

<?php
    include_once 'view/footer.php';
?>