<?php

$message = '';

// Si los campos NO estan vacios ...
if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['phone']) && !empty($_POST['password']) && !empty($_POST['password_conf'])) {

  // Revisa que el email no este ya en el DB
  $email_check = $conn->prepare("SELECT COUNT(id) FROM usuarios WHERE email=:email");
  $email_check->bindParam(':email', $_POST['email']);
  $email_check->execute();

  $res = $email_check->fetchColumn();

  if ($res == 0) { // Si el email no existe en la base de datos se procede con el registro
    // Sacar información del usuario para el proceso
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $package = $_POST['package'];

    // Agrega valores de nuevo user a la base de datos
    $sql = "INSERT INTO usuarios (nombre, email, telefono, password) VALUES (:name, :email, :phone, :password);"; // retorna el id para crear la tarjeta
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);

    //cifra la contraseña
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) { // Se realiza el registro y se crea la tarjeta
      $id = $conn->lastInsertId();

      // La cuenta es creada con éxito y se manda al login
      $message = 'Cuenta creada con éxito.';
      header("location: ../../index.php?message=$message");
    } else {
      $message = 'Hubo un error, intentalo de nuevo.';
      header("location: ./register.php?message=$message");
    }
  } else if ($res == 1) { // Si el email ya esta en uso
    $message = 'El correo ya esta en uso, intentalo de nuevo.';
    header("location: ./register.php?message=$message");
  }
}