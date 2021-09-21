<?php
    
   if(!isset($_SESSION)){
    session_start();
   }
   $auth = $_SESSION['login'] ?? false;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/desarrollo/css/app.css">
    <title>Ecologic</title>

</head>
<body>
    <div class="header">
        <div class="logo">
            <a href="/">
                <img src="/src/img/Logo.png" alt="Logo de Ecologic">
            </a>
        </div>
        <div class="nav">
            <div class="var" id="var">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="52" height="52" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <line x1="4" y1="6" x2="20" y2="6" />
                <line x1="4" y1="12" x2="20" y2="12" />
                <line x1="4" y1="18" x2="20" y2="18" />
              </svg>
            </div>

            <nav class="navegacion">
                <a href="/" class="enlace">Inicio</a>
                <a href="/productos.php" class="enlace">Productos</a>
                <a href="/nosotros.php" class="enlace">Nosotros</a>
                <a href="/blog.php" class="enlace">Blog</a>
                <a href="/carrito.php" class="enlace">
                    <img src="/src/img/carrito-de-compras.png" alt="Carrito de compras">
                </a>
            </nav>

        </div>
    </div>
    
    