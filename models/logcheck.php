<?php
    // Revisa que haya una sesión iniciada, de lo contrario regresa a login

    session_start(); // Inicia una sesión

    require 'database.php';

    if(isset($_SESSION['user_id'])){ // Si existe una sesión
        $records = $conn->prepare('SELECT * FROM usuarios WHERE id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);
        
        $user = null;
        
        if(count($results) > 0){
            $user = $results;
        }

    }else{
        header('location: ./login.php');
    }

?>
