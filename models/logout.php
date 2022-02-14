<?php 

    session_start();

    session_unset();

    session_destroy(); // Cierra la sesión

    header('location: ../views/login.php'); // Redirecciona a login

?>