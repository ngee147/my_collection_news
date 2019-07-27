<?php
    include_once 'models/user-news-provider.inc.php';
    include_once 'view/tab-header.php';
    include_once 'view/add-collection-box.php';
?>

<script>

    /* hide news image hwne it broke*/
    function newsImageBroke(event){
        event.style.display='none';
    }

    /*remove news*/
    function removeNews(singleNew){
        var ask = confirm("Are you sure to delete?");

        if(ask){

            var urlParams = new URLSearchParams(window.location.search);
            if(urlParams.has('collectionRef') && urlParams.has('collectionTitle')  ){
                var collectionRef = urlParams.get('collectionRef');
                var collectionTitle = urlParams.get('collectionTitle');
                var location = window.location.href; //for refresh purpose 

                   /*delete news submit*/
                        event.preventDefault();
                        var news_id = singleNew.id;

                            $("#delete-news-err").load("controllers/delete-user-news.inc.php",
                            {
                                news_id: news_id,
                                collection_ref:collectionRef,
                                location:location,
                                collection_title:collectionTitle
                            });
            }else{
                alert("fail to delete")
            }
        }
    }

    /* view comment*/
    // function viewNewsComment(singleNew){
    //     console.log("123123")
    // }

</script>

<div id="news-section">

    <?php $collection_id = $_GET['collectionRef']; ?>
    <?php $collection_title = $_GET['collectionTitle']; ?>

    <h3>'<?php echo $collection_title ?>' Collection</h3>
    <div id="delete-news-err"></div>

    <ul>
         <?php

           $news = new UserNewsProvider();
            # news list
            foreach($news->getNewsByCollection($collection_id) as $single_new)
            echo '<li>
                        <div class="new-container">
                            <a href="'.$single_new->url.'">
                                <div class="news-from"><span>From</span>'.$single_new->source.'</div>
                                <div class="new-listing" ><img src='. $single_new->urlToImagele.' onerror="newsImageBroke(this)"></div>
                                <p>'. $single_new->title.'</p>
                                <div class="news-date">'. $single_new->publishedAt.'</div> 
                                <div class="news-description">'. $single_new->description.'</div>
                            </a>
                            <span class="news-action">
                                   <a href="news-comment.php?news_id='.$single_new->id.'"><i class="fa fa-comment-o"></i></a>
                                    <i class="fa fa-trash" onclick="removeNews('.htmlspecialchars(json_encode($single_new)).')"></i>
                            </span>                             
                        </div>
                    </li>';
        ?>
    </ul>


</div>

<?php
    include_once 'view/footer.php';
?>