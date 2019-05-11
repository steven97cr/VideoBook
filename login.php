
<?php
    require_once(__DIR__.'/views/uiComponents.php');
    require_once(__DIR__.'/auth.php');

    $uiComponents = new UIComponents(array(
        'title' => 'Login',
        'page' => 'login'
    ));

    $auth = new Auth();
    $auth -> checkAccess('login');

    $uiComponents -> header();
    $uiComponents -> navbar();
?>         
    <div class="container-fluid">
        <div class="container pt-5 pb-5">
            <div class="row">
                <div class="col-md-6 px-5">
                    <h4>Registrarse:</h4>
                    <hr>
                    <form action="endpoints.php?action=addUser" method="POST">
                        <div class="form-group">
                            <label for="fullName">Nombre:</label>
                            <input id="fullName" name="fullName" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefono:</label>
                            <input id="phone" name="phone" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input id="email" name="email" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pass">Contrasenia:</label>
                            <input id="pass" name="pass" type="password" class="form-control">
                        </div>
                        <br>
                        <?php
                        if(isset($_GET['msg'])){
                            switch($_GET['msg']){
                                case 'Exito':
                                    ?>
                                    <div class="alert alert-success" role="alert">
                                        Te registraste satisfactoriamente!
                                    </div>
                                    <?php
                                    break;
                                case 'Error'
                                    ?>
                                    <div class="alert alert-danger" role="alert">
                                        Ocurrio un error!
                                    </div>
                                    <?php
                                    break;
                            }
                        }
                        ?>
                        <button type="submit" class="btn btn-primary">Continuar</button>
                    </form>
                </div>
                <div class="col-md-6 px-5">
                    <h4>Ingresar:</h4>
                    <hr>
                    <form action="endpoints.php?action=login" method="POST">
                        <div class="form-group">
                            <label for="email">Correo:</label>
                            <input id="email" name="email" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="pass">Contrasenia:</label>
                            <input id="pass" name="pass" type="password" class="form-control">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Continuar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
    $uiComponents -> footer();
?>
        