<?php
require_once(__DIR__.'/connection.php');

class dbVideos extends Connection{

    function __construct(){

    }

    function getVideos($userID){

        $query = "SELECT * FROM videos WHERE idUser = $userID";
        return $this -> getData($query);

    }

    function addVideo($videoUrl, $userID){

        $query = "INSERT INTO videos(idUser,url) VALUES($userID,'$videoUrl')";
        return $this -> query($query);

    }

    function deleteVideo($videoID){

        $query = "DELETE FROM videos WHERE id = $videoID";
        return $this -> query($query);

    }
}
?>