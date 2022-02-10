<?php
require('../models/database.php');
include_once("../models/register.php");
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registro</title>
    <link rel="stylesheet" href="../../assets/vendors/iconfonts/mdi/css/materialdesignicons.css" />
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.addons.css" />
    <link rel="stylesheet" href="../../assets/css/shared/style.css" />
    <link rel="stylesheet" href="../../assets/css/demo_1/style.css">
    <link rel="shortcut icon" href="../../../assets/images/favicon.ico" />
    <link rel="stylesheet" href="../../assets/css/register-transition.css">

</head>

<body>

    <div class="authentication-theme auth-style_1" style="padding-top: 7%;">

        <div class='row'>
            <div class='col-lg-5 col-md-7 col-sm-9 col-11 mx-auto'>
                <div class='grid transition'>
                    <div class='grid-body'>
                        <div class='row'>
                            <div class='col-lg-7 col-md-8 col-sm-9 col-12 mx-auto form-wrapper'>

                                <?php
                                if ($_GET) {
                                    echo "<p style='text-align: center;'>" . $_GET['message'] . "</p> <br>";
                                } else {
                                    echo "<p id='result' style='text-align: center;'></p> <br>";
                                }
                                ?>

                                <form method='POST' id='payment-form'>
                                    <div class='form-group input-rounded'>
                                        <input type='text' class='form-control' placeholder='Nombre' name='name' />
                                    </div>
                                    <div class='form-group input-rounded'>
                                        <input type='email' id='email' class='form-control' placeholder='Correo' name='email' />
                                    </div>
                                    <div class='form-group input-rounded'>
                                        <input type='tel' id='phone' class='form-control' placeholder='Teléfono' name='phone' />
                                    </div>
                                    <div class='form-group input-rounded'>
                                        <input type='password' class='form-control' placeholder='Contraseña' name='password' />
                                    </div>
                                    <div class='form-group input-rounded'>
                                        <input type='password' class='form-control' placeholder='Confirma contraseña' name='password_conf' />
                                    </div>

                                    <button class='btn btn-dark btn-block' id='next-register'>
                                        Siguiente
                                    </button>
                                </form>

                                <div class='signup-link'>
                                    <p>¿Ya tienes una cuenta?</p>
                                    <a href='./login.php'>Inicia sesión</a>
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