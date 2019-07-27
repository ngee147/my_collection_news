

<?php

include_once '../database/dbh.inc.php';
include_once '../models/user-session.inc.php';
include_once '../models/collection.inc.php';

 if(isset($_POST['submit'])){

     if(isset($_POST['collectionId'])){

    $collection_id = $_POST['collectionId'];

     $author = trim($_POST['author']);
     $description = trim($_POST['description']);
     $published_at = $_POST['publishedAt'];
     $title = trim($_POST['title']);
     $url = trim($_POST['url']);
     $urlToImagele = trim($_POST['urlToImagele']);
     $source = trim($_POST['source']);
     $user_comment = $_POST['userComment'];

    /*Error param*/
    $error_collection_not_selected = false;
    $error_colelction_not_exist = false;

    /*success param*/
    $seccuss_save = false;

        /*check user is login*/
        $user_session = new UserSession();
        $user = $user_session->getUserFromSession();

        if($user == false || $user == null){
            echo '<script>location.href="index.php?sessiontimeout=true";</script>' ;
        }else{

            $conn = DBH::getInstance();

             /* check user collection is exist*/
             $stmt = $conn->prepare("SELECT * FROM collection WHERE user_id = ? AND id = ?");
             $stmt->execute([$user->id,$collection_id]);
             $count = $stmt->rowCount();

            if ($count > 0) {

                /*add new collection to db*/
                $stmt = $conn->prepare("INSERT INTO news (author, description,
                published_at, title, url, urlToImagele, source, user_comment, collection_id) 
                VALUES (?,?,?,?,?,?,?,?,?)");
                $stmt->execute([
                     $author,
                     $description,
                     $published_at,
                     $title,
                     $url,
                     $urlToImagele,
                     $source,
                     $user_comment,
                     $collection_id
                ]);

                $seccuss_save = true;

            } else {
                echo '<span>Collection not exist</span>';
            }
        }

     }else{
        $error_collection_not_selected = true;
        echo '<span>Please select a collection</span>';
     }

 }else{
    echo "SYSTEM ERROR";
 }

?>

<script>

     var seccuss_save = "<?php echo $seccuss_save; ?>";

        if(seccuss_save == true){

            var x = document.getElementById("success-save-snackbar");
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 4000);

            document.getElementById('add-news-modal').style.display='none'
        }

</script>



