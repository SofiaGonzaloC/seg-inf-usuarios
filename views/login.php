<?php
include_once("../models/login.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Iniciar sesion</title>
</head>

<body>

    <div class="container">
        <!-- Mensaje de error en caso de datos incorrectos -->
        <?php if (!empty($message)) : ?>
            <p> <?= $message ?></p>
        <?php endif; ?>

		<form action="#" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="text" placeholder="Usuario" name="username" />
			</div>
			<div class="input-group">
				<input type="password" placeholder="Contraseña" name="password" />
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Iniciar sesion</button>
			</div>
			<p class="login-register-text">¿Aún no tienes una cuenta? <a href="register.php">Crea una</a>.</p>
		</form>
	</div>

</body>

</html>
