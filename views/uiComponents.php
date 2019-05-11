<?php

class UIComponents{

    var $pageData;
    var $userData;

    function __construct($pageData, $userData = null){
        $this -> pageData = $pageData;
        $this -> userData = $userData;
    }


    function header(){
        ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
                <link rel="stylesheet" href="css/mainStyle.css">
                <link rel="stylesheet" href="css/modalStyle.css">
                <link rel="stylesheet" href="css/uploadBtns.css">
                <title><?=$this -> pageData['title']?> - VideoBook</title>
            </head>
            <body>
                <div class="pageContainer">
        <?php
    }

    function navbar(){
        ?>
            <div class="navbarr container-fluid">
                <div class="row py-2">
                    <div class="col-md-3 pt-2">
                        <a class="titleLogo" href="home.php"><h4>VideoBook</h4></a>
                    </div>
                    <?php
                    if($this -> pageData['page'] != 'login'){
                        if($this -> userData['profilePhoto'] !=''){
                            $profileImg = $this -> userData['profilePhoto'];
                        }else{
                            $profileImg = 'profilePhoto.jpeg';
                        }
                        ?>
                            <div class="col-md-6 pt-1">
                                <form action="search.php" method="POST">
                                    <input type="text" name="search" class="form-control searchUsr" placeholder="Buscar usuario...">
                                </form>
                            </div>
                            <div class="col-md-3 pt-2">
                                
                                <div class="profileImg float-right" style="background-image: url('uploads/<?=$profileImg?>')"><button class="btnShowProfile"> </button></div>
                                <a class="float-right mx-2 logoutTag" href="endpoints.php?action=logout">Salir</a>
                            </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="contentWrap"> 
        <?php
    }

    function footer(){
        ?>
                    </div> <!-- Closes contentWrap-->
                    <footer class="footer text-center">
                        <p>VideoBook 2019.</p>
                    </footer>
                </div> <!--Closes pageContainer-->

                <script
                    src="https://code.jquery.com/jquery-3.4.0.min.js"
                    integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
                    crossorigin="anonymous">
                </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                <script src="js/modal.js"></script>
            </body>
            </html>
        <?php
    }

    function addModal(){
        ?>
            <div class="addModalBackground">
                <div class="addModal">
                    <div class="container-fluid">
                        <div class="container pt-5">
                            <h4> Agregar video:</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="endpoints.php?action=addVideo" method="POST">
                                        <input name="videoUrl" type="text" class="form-control" placeholder="Url del video...">
                                        <input type="hidden" name="userID" value="<?=$this -> userData['id']?>">
                                        <br>
                                        <button type="submit" class="btn btn-outline-success float-right ml-2">Agregar</button>
                                        <button type="button" class="btn btn-outline-secondary float-right btnCancelAdd">Cancelar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }

    function profileModal(){
        if($this -> userData['profilePhoto'] !=''){
            $profileImg = $this -> userData['profilePhoto'];
        }else{
            $profileImg = 'profilePhoto.jpeg';
        }
        ?>
        <div class="profileModalBackground">
                <div class="profileModal">
                    <div class="container-fluid">
                        <div class="container py-3">
                            <h4> Mi Perfil:</h4>
                            <hr>                      
                            <form action="endpoints.php?action=editUser" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="modalProfileImg mb-2" style="background-image: url('uploads/<?=$profileImg?>')">             
                                            <div class="changeProfileImgBtnWrap">
                                                <button class="changeProfileImgBtn">Cambiar Imagen</button>
                                                <input id="profileImg" name="newProfilePhoto" type="file" accept="image/*" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="coverImg">Foto de portada:</label>
                                            <input id="coverImg" name="newCoverPhoto" type="file" accept="image/*" class="">
                                        </div>
                                        <input type="hidden" name="profilePhoto" value="<?=$this -> userData['profilePhoto']?>">
                                        <input type="hidden" name="coverPhoto" value="<?=$this -> userData['coverPhoto']?>">
                                        <input type="hidden" name="userID" value="<?=$this -> userData['id']?>">
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="fullName">Nombre:</label>
                                            <input id="fullName" name="fullName" type="text" class="form-control" value="<?=$this -> userData['fullName']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Correo:</label>
                                            <input id="email" name="email" type="text" class="form-control" value="<?=$this -> userData['email']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="pass">Contrasenia:</label>
                                            <input id="pass" name="pass" type="text" class="form-control" value="<?=$this -> userData['pass']?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">             
                                        <div class="form-group">
                                            <label for="phone">Telefono:</label>
                                            <input id="phone" name="phone" type="text" class="form-control" value="<?=$this -> userData['phone']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="legend">Cita:</label>
                                            <textarea id="legend" name="legend" type="text" class="form-control" rows="4" value=""><?=$this -> userData['legend']?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-outline-success float-right ml-2">Agregar</button>
                                        <button type="button" class="btn btn-outline-secondary float-right btnCancelEdit">Cancelar</button> 
                                    </div>   
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}

?>