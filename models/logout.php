<?php 

    session_start();

    session_unset();

    session_destroy(); // Cierra la sesión

    header('location: ../../index.php'); // Redirecciona a login

?>