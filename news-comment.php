<?php
    include_once 'models/user-news-provider.inc.php';
    include_once 'view/tab-header.php';
    include_once 'view/add-collection-box.php';
?>
<link rel="stylesheet" href="css/news-comment.css" type="text/css">

<script>

    /* hide news image hwne it broke*/
    function newsImageBroke(event){
        event.style.display='none';
    }


</script>

<?php $news_id = $_GET['news_id']; ?>

 <?php
    $user_news = new UserNewsProvider();

    $single_new = $user_news->GetNewsFromId($news_id);

    if($single_new == null){
        echo "<span> No News Found</span>";
    }else{
       echo'  <div class="new-container">
                 <a href="'.$single_new->url.'">
                    <div class="new-listing"><img src='. $single_new->urlToImagele.' onerror="newsImageBroke(this)"></div>
                    <div class="news-from"><span>From</span>'.$single_new->source.'</div>
                    <p>'. $single_new->title.'</p>
                    <div class="news-date">'. $single_new->publishedAt.'</div> 
                    <div class="news-description">'. $single_new->description.'</div>
                 </a>
                    <div class="my-comment">My commment : </div>   
                        <span class="comment-content">
                        '. $single_new->user_comment.'
                        </span>                   
            </div>';
    }

?>

<?php
    include_once 'view/footer.php';
?>
