<?php

require_once(__DIR__.'/connection.php');

class dbUsers extends Connection{

    function __construct(){

    }

    function addUser($data){
        extract($data);
        $query = "INSERT INTO users(fullName,email,pass,phone) VALUES('$fullName','$email','$pass','$phone')";
        return $this -> query($query);
    }

    function getUser($userID){
        $query = "SELECT * FROM users WHERE id = $userID;";
        $data = $this -> getData($query);
        return $data[0];
    }

    function getUsers($search){
        $query = "SELECT * FROM users WHERE fullName LIKE '%$search%';";
        $data = $this -> getData($query);
        return $data;
    }

    function editUser($data){
        extract($data);
        $query = "UPDATE users SET
        fullName= '$fullName',
        pass 	= '$pass',
        email 	= '$email',
        phone 	= '$phone',
        coverPhoto = '$coverPhoto',
        profilePhoto	= '$profilePhoto',
        legend  = '$legend' 
        WHERE id = $userID;";
        return $this -> query($query);
    }

    function login($email,$pass){

        $email = addslashes($email);
        $pass = addslashes($pass);
        
        $query = "SELECT * FROM users
        WHERE email = '$email' AND pass = '$pass';";

        $data = $this -> getData($query);
        return $data;

    }
}

?>