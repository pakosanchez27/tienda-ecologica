<?php

function conectarDB() {
    $db = mysqli_connect('localhost', 'root', 'root', 'tiendalogic');

    if(!$db){
        echo 'Error no se pudo conectar';
        exit;
    }

    return $db;
    debuguear($db);
}