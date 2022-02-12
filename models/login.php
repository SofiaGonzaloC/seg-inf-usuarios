<?php

session_start(); // Inicializa la variable _SESSION

require '../models/database.php';

// Verifica que ambos campos NO esten vacios
if (!empty($_POST['username']) && !empty($_POST['password'])) {
  $records = $conn->prepare('SELECT id, username, password FROM usuarios WHERE username= :username'); // Ejecuta una consulta sql. Toma id, email y pw de la tabla users
  $records->bindParam(':username', $_POST['username']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (!empty($results) > 0 && password_verify($_POST['password'], $results['password'])) { // Compara la contraseña de db con la que pone el usuario
    $_SESSION['user_id'] = $results['id'];

    header('location: ./home.php');
  } else {
    $message = 'Sorry, credentials are incorrect';
  }
}

?>
