<?php
include_once("../models/login.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.css" />
    <link rel="stylesheet" href="assets/vendors/css/vendor.addons.css" />
    <link rel="stylesheet" href="assets/css/shared/style.css" />
    <link rel="stylesheet" href="assets/css/demo_1/style.css">
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
</head>

<body>

    <div class="authentication-theme auth-style_1">

        <div class="row">
            <div class="col-lg-5 col-md-7 col-sm-9 col-11 mx-auto">
                <div class="grid">
                    <div class="grid-body">
                        <div class="row">
                            <div class="col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper">

                                <!-- Mensaje de error en caso de datos incorrectos -->
                                <?php if ($_GET) : ?>
                                    <div style="text-align: center;">
                                        <p><?= $_GET['message'] ?></p> 
                                        <br>
                                    </div>
                                <?php endif; ?>

                                <form action="#" method="POST">
                                    <div class="form-group input-rounded">
                                        <input type="text" class="form-control" placeholder="Correo" name="email" />
                                    </div>
                                    <div class="form-group input-rounded">
                                        <input type="password" class="form-control" placeholder="Contraseña" name="password" />
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-block"> Iniciar sesión </button>
                                </form>

                                <div class="signup-link">
                                    <p>¿Aún no tienes una cuenta?</p>
                                    <a href="./register.php">Crea una</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>