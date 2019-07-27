<?php

include_once '../database/dbh.inc.php';
include_once '../models/user-session.inc.php';
include_once '../models/collection.inc.php';

/*success data return*/
$collections = array();

$conn = DBH::getInstance();

$user_session = new UserSession();
$user = $user_session->getUserFromSession();

if ($user == false || $user == null) {
    //echo '<script>location.href="index.php?sessiontimeout=true";</script>';
} else {

    /*retrive collection from db*/
    $stmt = $conn->prepare("SELECT * FROM collection WHERE user_id = ?");
    $stmt->execute([$user->id]);
    $count = $stmt->rowCount();

    if ($count > 0) {

        foreach ($stmt->fetchAll() as $result) {
            $object = new Collection($result->id, $result->collection_name);
            array_push($collections, $object);
        }

        foreach ($collections as $collection) {
            echo '<input type="radio" name="collection" value="'. $collection->id .'" id="'.$collection->id.'"><label for="'.$collection->id.'">' . $collection->collection_name . '</label><br>';
        }
    } else {
        echo '<span>No data</span>';
    }

    $seccuss_retrieve = true;
}
