<?php
    include 'models/news-provider.inc.php';
    include 'view/tab-header.php';
    include_once 'view/add-collection-box.php';
?>

<script>
    /* hide news image hwne it broke*/
    function newsImageBroke(event){
        event.style.display='none';
    }

     function checkUserLogin(user){
            if(user == null || user == false){
                /*add  collection icon*/
                 $(".news-action").hide();
            }else{
                /*add  collection icon*/  
                 $(".news-action").show();       
            }
           
        }

</script>

  <?php include_once 'view/top-search-section.php'; ?> 

<div id="news-section">

    <?php $search = $_SESSION['SEARCH_NEWS_BY_KEYWORD']; ?>

    <h3> key word '<?php echo $search ?>' Search</h3>

    <ul>
         <?php

           $news = new NewsProvider();
            # news list
            foreach($news->getSearchNews($search) as $single_new)
            echo '<li>
                        <div class="new-container">
                            <a href="'.$single_new->url.'">
                                <div class="news-from"><span>From</span>'.$single_new->source.'</div>
                                <div class="new-listing"><img src='. $single_new->urlToImagele.' onerror="newsImageBroke(this)"></div>
                                <p>'. $single_new->title.'</p>
                                <div class="news-date">'. $single_new->publishedAt.'</div> 
                                <div class="news-description">'. $single_new->description.'</div>
                            </a>
                            <span class="news-action">
                                  <i class="fa fa-plus-circle" onclick="addCollection('.htmlspecialchars(json_encode($single_new)).')"></i>
                            </span>                             
                        </div>
                    </li>';
        ?>
    </ul>

       <?php 
        /*check session exist for auto login purpose*/
        $user_session = new UserSession();
        $user = $user_session->useSessionAutoLogin();
        echo '<script type="text/javascript">',
        'checkUserLogin('.json_encode($user).');',
        '</script>';    
     ?>


    
</div>

<?php
    include_once 'view/footer.php';
?>