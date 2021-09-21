<?php

define('TEMPLETE_URL', __DIR__ . "/templetes");
define('FUNCIONES_URL', __DIR__ . 'funciones.php'); 




function incluirTemplete($nombre){
    include TEMPLETE_URL . "/${nombre}.php";
}


function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo"</pre>";
    exit;
}

function estaAutenticado()  {
    session_start();


    if(!$_SESSION['login']) {
        header('Location: /');
    }
}
   