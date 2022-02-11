<?php

$message = '';

// 

// Si los campos NO estan vacios ...
if (!empty($_POST['username']) && !empty($_POST['nombre']) && !empty($_POST['apellido_pat']) && !empty($_POST['apellido_mat']) && !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['password']) && !empty($_POST['password_conf'])) {
  if($_POST['password'] == $_POST['password_conf']){

    // Revisa que el email no este ya en el DB
    $email_check = $conn->prepare("SELECT COUNT(id) FROM usuarios WHERE username=:username");
    $email_check->bindParam(':username', $_POST['username']);
    $email_check->execute();

    $res = $email_check->fetchColumn();

    if ($res == 0) { // Si el email no existe en la base de datos se procede con el registro
      // Sacar información del usuario para el proceso
      $username     = $_POST['username'];
      $nombre       = $_POST['nombre'];
      $apellido_pat = $_POST['apellido_pat'];
      $apellido_mat = $_POST['apellido_mat'];
      $direccion    = $_POST['direccion'];
      $telefono     = $_POST['telefono'];

      // Agrega valores de nuevo user a la base de datos
      $sql = "INSERT INTO `usuarios` (`id`, `username`, `nombre`, `apellido-paterno`, `apellido-materno`, `password`, `telefono`, `direccion`)
              VALUES (NULL, :username, :nombre, :apellido_pat, :apellido_mat, :password, :telefono, :direccion);";
      $stmt = $conn->prepare($sql);

      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':nombre', $nombre);
      $stmt->bindParam(':apellido_pat', $apellido_pat);
      $stmt->bindParam(':apellido_mat', $apellido_mat);
      $stmt->bindParam(':direccion', $direccion);
      $stmt->bindParam(':telefono', $telefono);

      //cifra la contraseña
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $stmt->bindParam(':password', $password);

      if ($stmt->execute()) { // Se realiza el registro y se crea la tarjeta
        // La cuenta es creada con éxito y se manda al login
        $message = 'Cuenta creada con éxito.';
        header("location: ./login.php?message=$message");
      } else {
        $message = 'Hubo un error, intentalo de nuevo.';
      }

    } else if ($res == 1) { // Si el email ya esta en uso
      $message = 'El nombre de usuario ya esta en uso.';
    }

  } else {
    $message = 'Las contraseñas no coinciden';
  }
}