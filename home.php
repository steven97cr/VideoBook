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
$auth -> checkAccess('home');

$userData = $lnUsers -> getUser($_SESSION['user']['id']);

$uiComponents = new UIComponents(array(
    'title' => 'Home',
    'page' => 'home'
),$userData);

$uiComponents -> header();
$uiComponents -> addModal();
$uiComponents -> profileModal();
$uiComponents -> navbar();

?>

<div class="container-fluid">
    <div class="container pt-5 pb-5">
        <h4>Mis videos:</h4>
        <hr>
        <div class="row">
            <?php
                $videos = $lnVideos -> getVideos($_SESSION['user']['id']);
                foreach($videos as $video){
                    $videoUrl = $video['url'];
                    $videoID = $video['id'];
                    ?>
                    <div class="col-md-3">
                        <form class="videoContainer" action="endpoints.php?action=deleteVideo" method="POST">
                            <iframe width="100%" src="https://www.youtube.com/embed/<?=$videoUrl?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <input type="hidden" name="videoID" value="<?=$videoID?>">
                            <button type="submit" class="deleteVideoBtn btn btn-danger" onclick=""><i class="fas fa-trash-alt"></i></button>
                        </form>   
                    </div>
                    <?php
                }
            ?>
            <div class="col-md-3">
                <button class="addBtn">
                    <i class="fas fa-plus-circle fa-2x mb-3"></i>
                    <p>Agregar video.</p>
                </button>
            </div>
        </div>
    </div>
</div>

<?php

$uiComponents -> footer();

?>