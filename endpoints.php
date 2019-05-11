<?php

require_once(__DIR__.'/ln/lnUsers.php');
require_once(__DIR__.'/ln/lnVideos.php');
require_once(__DIR__.'/auth.php');

$lnUsers = new lnUsers();
$lnVideos = new lnVideos();
$auth = new Auth();

if(isset($_GET['action'])){

    switch($_GET['action']){
        
        case 'addUser':
            $lnUsers -> addUser($_POST);
            break;
        
        case 'login':
            $auth -> login();
            break;
        
        case 'logout':
            $auth -> logout();
            break;

        case 'addVideo':
            $lnVideos -> addVideo($_POST);
            break;

        case 'deleteVideo':
            $lnVideos -> deleteVideo($_POST);
            break;

        case 'editUser':
            $lnUsers -> editUser($_POST);
            break;

    }
}

?>