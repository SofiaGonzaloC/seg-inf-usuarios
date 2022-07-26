<?php 

    session_start();

    session_unset();

    session_destroy(); // Cierra la sesión

    header('location: ../login.php'); // Redirecciona a login

?>