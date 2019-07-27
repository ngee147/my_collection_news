<?php

include_once '../database/dbh.inc.php';
include_once '../models/user-session.inc.php';
include_once '../models/collection.inc.php';


 if(isset($_POST['submit'])){

       $name = trim($_POST['name']);

         /*Error param*/
        $error_empty = false;

        /*success param*/
        $seccuss_add = false;

        /*success data return*/
        $collections=array();

        if(empty($name)){
            $error_empty = true;
        }
             
             $conn = DBH::getInstance();

             $user_session = new UserSession();
             $user = $user_session->getUserFromSession();

               if($user == false || $user == null){
                    echo '<script>location.href="index.php?sessiontimeout=true";</script>' ;
                }else{

                    if($error_empty != true){
                        /*add new collection to db*/
                        $stmt = $conn->prepare("INSERT INTO collection (collection_name, user_id) 
                        VALUES (?,?)");
                        $stmt->execute([$name,$user->id]);

                        $seccuss_add = true;
                    }

                    /*retrive collection from db*/
                    $stmt = $conn->prepare("SELECT * FROM collection WHERE user_id = ?");
                    $stmt->execute([$user->id]);
                    $count = $stmt->rowCount();

                    if($count > 0){

                        foreach($stmt->fetchAll() as $result){
                            $object = new Collection($result->id,$result->collection_name);
                            array_push( $collections,$object);
                        }

                        foreach($collections as $collection){
                            echo '<input type="radio" name="collection" value="'.$collection->id.'"> '.$collection->collection_name.'<br>';
                        }

                    }else{
                        echo '<span>No Record</span>';
                    }

                //    echo '<li>
                //         <div class="new-container">
                //             <a href="'.$single_new->url.'">
                //                 <div class="news-from"><span>From</span>'.$single_new->source.'</div>
                //                 <div class="new-listing"><img src='. $single_new->urlToImagele.' onerror="newsImageBroke(this)"></div>
                //                 <p>'. $single_new->title.'</p>
                //                 <div class="news-date">'. $single_new->publishedAt.'</div> 
                //                 <div class="news-description">'. $single_new->description.'</div>
                //             </a>
                //             <span id="news-action">
                //                 <span hidden="true" id="add-new-collection">'.json_encode($single_new).'</span>
                //                 <i class="fa fa-plus-circle" onclick="addCollection()"></i>
                //             </span>                             
                //         </div>
                //     </li>';

                }
 }else{
     echo "SYSTEM ERROR";
 }
?>

<script>

     var error_empty = "<?php echo $error_empty; ?>";
     var seccuss_add = "<?php echo $seccuss_add; ?>";

     $("#add-news input[name='collection-name']").removeClass('input-empty');

        if(seccuss_add == true){
            $("#add-news input[name='collection-name']").val("");
        }else if(error_empty){
            $("#add-news input[name='collection-name']").addClass('input-empty');
        }

</script>