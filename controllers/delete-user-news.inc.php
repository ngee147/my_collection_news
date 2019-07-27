<?php

include_once '../database/dbh.inc.php';
include_once '../models/user-session.inc.php';

    if(isset($_POST['news_id'])){

         $news_id = trim($_POST['news_id']);
         $location = trim($_POST['location']);
         $collection_ref = trim($_POST['collection_ref']);
         $collection_title = trim($_POST['collection_title']);


           /*check user is login*/
        $user_session = new UserSession();
        $user = $user_session->getUserFromSession();


        $userOwnCollection = CheckUserOwnCollection( $collection_ref,$user->id);


        if($user == false || $user == null){
            echo '<script>location.href="index.php?sessiontimeout=true";</script>' ;
        }else if($userOwnCollection == false){
            echo '<span>Permission Not Allow</span>';
        }else{


            $conn = DBH::getInstance();

             /*delete user news from db*/
            $stmt = $conn->prepare("DELETE FROM news WHERE id = ? AND collection_id = ?");
            $stmt->execute([$news_id, $collection_ref]);
            $count = $stmt->rowCount();

            if ($count > 0) {
                //header ('Location: ../my-news.php?collectionRef='. $collection_ref.'&collectionTitle='.collection_title.'');   
                echo '<script>location.href="my-news.php?collectionRef='.$collection_ref.'&collectionTitle='.$collection_title.'";</script>' ;
            } else {
                echo '<span>Delete Fail</span>';
            }

        }
    }else{
        echo "SYSTEM ERROR";
    } 


    function CheckUserOwnCollection($collection_id,$user_id){
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
?>