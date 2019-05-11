<?php

require_once(__DIR__.'/views/uiComponents.php');
require_once(__DIR__.'/ln/lnUsers.php');
require_once(__DIR__.'/ln/lnVideos.php');
require_once(__DIR__.'/auth.php');

if(!isset($_SESSION['user'])){
    session_start();
}

$lnUsers = new lnUsers();

$auth = new Auth();
$auth -> checkAccess('search');

$userData = $lnUsers -> getUser($_SESSION['user']['id']);

$uiComponents = new UIComponents(array(
    'title' => 'Buscar',
    'page' => 'search'
),$userData);

$uiComponents -> header();
$uiComponents -> addModal();
$uiComponents -> profileModal();
$uiComponents -> navbar();

?>

<div class="container-fluid">
    <div class="container pt-5 pb-5">
        <h4>Resultados con <?=$_POST['search']?>:</h4>
        <hr>
        <div class="row">
            <?php
                $users = $lnUsers -> getUsers($_POST['search']);
                if(empty($users)){
                    ?>
                    <div class="col-md-12">
                        <h4>No se encontraron coincidencias!</h4>
                    </div>
                    <?php
                }
                foreach($users as $user){
                    ?>
                    
                    <div class="col-md-3">
                        <a href="userView.php?userID=<?=$user['id']?>">
                            <div class="userCard">
                                <div class="userCardCoverPhoto" style="background-image: url('uploads/<?=$user['coverPhoto']?>')"></div>
                                <div class="userCardProfilePhoto" style="background-image: url('uploads/<?=$user['profilePhoto']?>')"></div>
                                <div class="userCardName">
                                    <h5><?=$user['fullName']?></h5>
                                </div>
                            </div> 
                        </a> 
                    </div>
                    
                    <?php
                }
            ?>
        </div>
    </div>
</div>

<?php

$uiComponents -> footer();

?>