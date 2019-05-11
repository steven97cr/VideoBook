<?php

require_once(__DIR__.'/../db/dbUsers.php');

class lnUsers{

    var $db;

    function __construct(){
        $this -> db = new dbUsers();
    }

    function addUser($data){

         $result = $this -> db -> addUser($data);
         
         if($result['errors']){
            header('Location: login.php?msg=Error&dsc='.$result['errors']);
         } else {
            header('Location: login.php?msg=Exito');
         }
    }

    function getUser($userID){
        return $this -> db -> getUser($userID);
    }

    function getUsers($search){
        return $this -> db -> getUsers($search);
    }

    function editUser($data){

        if(!empty($_FILES['newProfilePhoto']['name'])){
            $path = __DIR__."/../uploads/";
            $path = $path . basename( $_FILES['newProfilePhoto']['name']);
            if(move_uploaded_file($_FILES['newProfilePhoto']['tmp_name'], $path)) {
                // echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
                // " has been uploaded";
                $data['profilePhoto'] = basename($_FILES['newProfilePhoto']['name']);
            } else{
                echo "Ocurrio un error con la foto de perfil!";
            }
        }

        if(!empty($_FILES['newCoverPhoto']['name'])){
            $path = __DIR__."/../uploads/";
            $path = $path . basename( $_FILES['newCoverPhoto']['name']);
            if(move_uploaded_file($_FILES['newCoverPhoto']['tmp_name'], $path)) {
                // echo "The file ".  basename( $_FILES['uploaded_file']['name']). 
                // " has been uploaded";
                $data['coverPhoto'] = basename($_FILES['newCoverPhoto']['name']);
            } else{
                echo "Ocurrio un error con la foto de portada!";
            }
        }

        $result = $this -> db -> editUser($data);

        if($result['errors']){
            header('Location: home.php?msg=Error&dsc='.$result['errors']);
         } else {
            header('Location: home.php?msg=Exito');
         }

    }

    function login($email,$pass){
        return $this -> db -> login($email,$pass);
    }
}
?>