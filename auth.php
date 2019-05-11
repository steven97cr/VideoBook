<?php
require_once(__DIR__.'/ln/lnUsers.php');

class Auth{

    function __construct(){

    }

    function login(){
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $lnUsers = new lnUsers();
        $user = $lnUsers -> login($email,$pass);

        if($user){
            session_start();
            $_SESSION['user'] = $user[0];

            header('Location: home.php');
        }else{
            header('Location: login.php?msg=authError');
        }
    }

    function logout(){
		session_start();
		session_destroy();
		header('Location: login.php');
	}
	
	function checkAccess($page=""){
		
		if(!isset($_SESSION['user'])){
            session_start();
        }
		
		if($page=="login"){
			
			if(isset($_SESSION['user'])){
				header('Location:home.php');
			}
			
		}else{
			
			if(!isset($_SESSION['user'])){
				header('Location:login.php?msg=pageError');
			}
			
		}	
		
	}
}
?>