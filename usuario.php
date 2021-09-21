<?php 

// Importar la conexion 

require 'includes/app.php';
$db = conectarDB();

// Crear un email y password
$correo = "correo@corre.com";
$password = "root";

$passwordHash = password_hash($password, PASSWORD_DEFAULT);



//query para crear el usuario 
$query = " INSERT INTO usuarios (correo, password) VALUES ('${correo}', '${passwordHash}');";

echo $query;



 mysqli_query($db, $query);