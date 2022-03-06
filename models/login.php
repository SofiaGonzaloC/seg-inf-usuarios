<?php
/*ESTE TRABAJO SE REALIZO POR EL EQUIPO 2:
  Ana Sofia Gonzalez Chavira
  Luis Angel Gonzalez Carrillo
  David Gonzalez Reyes
  Jassmin Alondra Ortiz Gomez
  Raul Fernando Vera Fernandez
*/

error_reporting(0);

function decrypt_password($password_enc){
  $cypher_method = 'AES-128-CTR';        // Método de cifrado
  $option = 0;
  $decryption_iv =  '1234567890123456'; // Vector inicializacion
  $llave_desencriptacion = 'seguridadinformatica';
  
  // Retorna la desencriptacion de la contraseña para compararla
  return openssl_decrypt($password_enc, $cypher_method, $decryption_iv, $option, $llave_desencriptacion);
}

session_start(); // Inicializa la variable _SESSION

require '../models/database.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){

  // Verifica que ambos campos NO esten vacios
  if (!empty($_POST['username']) && !empty($_POST['password'])) {

    $records = $conn->prepare('SELECT id, username, password FROM usuarios WHERE username= :username'); // Ejecuta una consulta sql. Toma id, email y pw de la tabla users
    $records->bindParam(':username', $_POST['username']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $db_password = decrypt_password($results['password']);

    echo "Contraseña desencriptar " . $db_password;

    $message = '';

    if (!empty($results) > 0 && $_POST['password'] == $db_password) { // Compara la contraseña de db con la que pone el usuario
      $_SESSION['user_id'] = $results['id'];
  
      header('location: ./home.php');
    } else {
      $message = 'La contraseña es incorrecta'; // No esta funcionando
    }
  
  } else {
    $message = 'Escriba un usuario y/o contraseña'; // No se escribio nada
  }
}
