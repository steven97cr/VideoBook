<?php

require_once(__DIR__.'/views/uiComponents.php');
require_once(__DIR__.'/ln/lnUsers.php');
require_once(__DIR__.'/ln/lnVideos.php');
require_once(__DIR__.'/auth.php');

if(!isset($_SESSION['user'])){
    session_start();
}

$lnUsers = new lnUsers();
$lnVideos = new lnVideos();

$auth = new Auth();
$auth -> checkAccess('userView');

$userData = $lnUsers -> getUser($_SESSION['user']['id']);
$resultUser = $lnUsers -> getUser($_GET['userID']);

$uiComponents = new UIComponents(array(
    'title' => 'Resultado',
    'page' => 'userView'
),$userData);

$uiComponents -> header();
$uiComponents -> addModal();
$uiComponents -> profileModal();
$uiComponents -> navbar();

?>

<div class="container-fluid">
    <div class="container pt-5 pb-5">
        <h4>Videos de <?=$resultUser['fullName']?></h4>
        <hr>
        <div class="row">
            <?php
                $videos = $lnVideos -> getVideos($resultUser['id']);
                if(empty($videos)){
                    ?>
                    <div class="col-md-12">
                        <h4>No se encontraron videos!</h4>
                    </div>
                    <?php
                }
                foreach($videos as $video){
                    $videoUrl = $video['url'];
                    $videoID = $video['id'];
                    ?>
                    <div class="col-md-3">
                        <div class="videoContainer">
                            <iframe width="100%" src="https://www.youtube.com/embed/<?=$videoUrl?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>   
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