<?php
require('./models/database.php');
include_once("./models/register.php");
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Registro</title>
</head>

<body>

    <div class="container">
        
        <?php if (!empty($message)) : ?>
            <p> <?= $message ?></p>
        <?php endif; ?>
		<form action="" method="POST" id='payment-form' class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Registro</p>
            <!-- Usuario-->
			<div class="input-group">
				<input type="text" placeholder="Username" name="username"  required>
			</div>
            <!-- Nombre-->
            <div class="input-group">
                <input type='text'  placeholder='Nombre' name='nombre' required/>
            </div>
            <!-- Apellido paterno-->
            <div class="input-group">
                <input type='text'  placeholder='Apellido Paterno' name='apellido_pat' required/>
            </div>
            <!-- Apellido materno-->
            <div class="input-group">
                <input type='text' placeholder='Apellido materno' name='apellido_mat' required/>
            </div>
            <!-- Telefono-->
            <div class="input-group">
                <input type='tel' id='phone'  placeholder='Teléfono' name='telefono' required/>
            </div>
            <!-- Direccion-->
            <div class="input-group">
                <input type='text' id='phone' placeholder='Dirección' name='direccion' required/>
            </div>
			<div class="input-group">
				<input type="password" placeholder="Contraseña" name="password"  required>
            </div>
            <!-- Contrasena-->
            <div class="input-group">
				<input type="password" placeholder="Confirma contraseña" name="password_conf"  required>
			</div>
            <!-- Concretar registro-->
			<div class="input-group">
				<button name="submit"  id= 'next-register' class="btn">Registrarse</button>
			</div>
			<p class="login-register-text">Ya tienes una cuenta? <a href="login.php">Inicia sesión</a>.</p>
		</form>
	</div>


</body>

</html>