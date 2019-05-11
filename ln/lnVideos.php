<?php
require_once(__DIR__.'/../db/dbVideos.php');

class lnVideos{

    var $db;

    function __construct(){

        $this -> db = new dbVideos();

    }

    function getVideos($userID){

        return $this -> db -> getVideos($userID);

    }

    function addVideo($data){

        $videoUrl = substr($data['videoUrl'],32);
        $result = $this -> db -> addVideo($videoUrl,$data['userID']);

        if($result['errors']){
            header('Location: home.php?msg=Error&dsc='.$result['errors']);
        }else{
            header('Location: home.php?msg=Exito');
        }

    }

    function deleteVideo($data){

        $result =  $this -> db -> deleteVideo($data['videoID']);

        if($result['errors']){
            header('Location: home.php?msg=Error&dsc='.$result['errors']);
        }else{
            header('Location: home.php?msg=Exito');
        }

    }
}
?>