<?php

$server = 'localhost:3306'; // Nombre del srv base de datos
$username = 'root'; // Nombre usuario
$password = 'admin123';
$database = 'seg-inf-usuarios';  // Nombre de la base de datos

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password); // Establece la conexión con la base de datos
  } catch (PDOException $e) {
    die('Connection Failed: ' . $e->getMessage());
  }

?>