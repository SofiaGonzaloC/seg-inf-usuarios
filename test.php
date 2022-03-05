<?php

error_reporting(0);

// ENCRIPTAR

$password = 'Admin#123';

echo 'Contraseña original' . $password . "<br>";

$metodo_cifrado = 'AES-128-CTR';        // Método de cifrado
$option = 0;
$encryption_iv =  hex2bin('1234567890123456'); // Vector inicializacion
$llave_encriptacion = 'seguridadinformatica';

$encriptacion = openssl_encrypt($password, $metodo_cifrado, $encryption_iv, $option, $llave_encriptacion);

echo "Contraseña encriptada " . $encriptacion . "<br>";

// DESENCRIPTAR

$metodo_cifrado = 'AES-128-CTR';        // Método de cifrado
$option = 0;
$decryption_iv =  hex2bin('1234567890123456'); // Vector inicializacion
$llave_desencriptacion = 'seguridadinformatica';

$desencriptacion = openssl_decrypt($encriptacion, $metodo_cifrado, $encryption_iv, $option, $llave_encriptacion);

echo "Contraseña desencriptada ". $desencriptacion;