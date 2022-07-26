<?php

//Función para validad password
function validar_clave($password,&$message){
   //Validación de mayor a 8 caracteres
   if(strlen($password) < 8){
      $message = "La clave debe tener al menos 8 caracteres";
      return false;
   }
   //Valicación de minusculas
   if (!preg_match('`[a-z]`',$password)){
      $message = "La clave debe tener al menos una letra minúscula";
      return false;
   }
   //Validación de Mayusculas
   if (!preg_match('`[A-Z]`',$password)){
      $message = "La clave debe tener al menos una letra mayúscula";
      return false;
   }
   //Validación de caracteres numericos
   if (!preg_match('`[0-9]`',$password)){
      $message = "La clave debe tener al menos un caracter numérico";
      return false;
   }
   //Valicación de caracteres especiales
   if (!preg_match('`[@!#$%^&*()<>?/|}{~:]`', $password)){
      $message = "La clave debe tener al menos un caracter especial";
      return false;      
   }
   $message = "";
   return true;
   
}
$message = '';

//123No437!
// Si los campos NO estan vacios ...
if (!empty($_POST['username']) && !empty($_POST['nombre']) && !empty($_POST['apellido_pat']) && !empty($_POST['apellido_mat']) && !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['password']) && !empty($_POST['password_conf'])) {
  if($_POST['password'] == $_POST['password_conf']){
      
      if(validar_clave($_POST['password'],$message)){
         // Revisa que el username no este ya en el DB
         $email_check = $conn->prepare("SELECT COUNT(id) FROM usuarios WHERE username=:username");
         $email_check->bindParam(':username', $_POST['username']);
         $email_check->execute();

         $res = $email_check->fetchColumn();

         if ($res == 0) { // Si el username no existe en la base de datos se procede con el registro
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
      
            
            //Encriptar la contraseña.
            $password = openssl_encrypt($_POST['password'], 'AES-128-ECB', OPENSSL_RAW_DATA);
            $password = base64_encode($password);
                         
            $stmt->bindParam(':password', $password);
            
            
            

            if ($stmt->execute()) { // Se realiza el registro y se crea la tarjeta
            // La cuenta es creada con éxito y se manda al login
            $message = 'Cuenta creada con éxito.';
            header("location: ./login.php?message=$message");
            } else {
            $message = 'Hubo un error, intentalo de nuevo.';
         }
         } else if ($res == 1) { // Si el usuario ya esta en uso
            $message = 'El nombre de usuario ya esta en uso.';
         }
      }      

  } else {
    $message = 'Las contraseñas no coinciden';
  }
}
