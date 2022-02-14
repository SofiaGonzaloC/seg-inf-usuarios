<?php

require_once("../models/logcheck.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Bienvenido</title>
</head>
<body>
    <div class="container">
        <p class="login-text" style="font-size: 2rem; font-weight: 800;">Bienvenido</p>
        <br>
        <br>
        <div style='text-align:center'><?= $user['username'] ?></div>
        <div style='padding-top: 150px'><p class="login-register-text"><a href="../models/logout.php">Cerrar sesión</a></p></div>
    </div>
</body>
</html>