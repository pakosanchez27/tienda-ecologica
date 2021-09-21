<?php

require 'includes/app.php';

incluirTemplete('header');

?>
    
    <div class="slider ">
        <div class="miSlider fade">
            <img src="src/img/slider1.jpg" alt="">
        </div>
        <div class="miSlider fade">
            <img src="src/img/slider2.jpg" alt="">
        </div>
        <div class="miSlider fade">
            <img src="src/img/slider3.jpg" alt="">
        </div>
        <div class="miSlider fade">
            <img src="src/img/slider4.jpg" alt="">
        </div>
        <div class="miSlider fade">
            <img src="src/img/slider5.jpg" alt="">
        </div>
        <div class="miSlider fade">
            <img src="src/img/slider6.jpg" alt="">
        </div>
        <div class="miSlider fade">
            <img src="src/img/slider7.png" alt="">
        </div>
        <div class="direccion">
            <a href="producto.php" class="atras" id="atras" onclick="avanzaSlide(-1)"> &#10094;  </a>
            <a href="producto.php" class="siguiente" id="siguiente" onclick="avanzaSlide(1)"> &#10095;  </a>
        </div>
        <div class="barras">
            <span class="barra active" id="barra" onclick="posicionSlide(1)"></span>
            <span class="barra " id="barra" onclick="posicionSlide(2)"></span>
            <span class="barra " id="barra" onclick="posicionSlide(3)"></span>
            <span class="barra " id="barra" onclick="posicionSlide(4)"></span>
            <span class="barra " id="barra" onclick="posicionSlide(5)"></span>
            <span class="barra " id="barra" onclick="posicionSlide(6)"></span>
            <span class="barra " id="barra" onclick="posicionSlide(7)"></span>
            
        </div>

    </div>
    <main class="productos-contenido">
        <h2>Productos</h2>
        
            <div class="cards-produtos">
            <?php  
                $limite = 20;
                include 'includes/templetes/_cards.php'
             ?>
            </div>
           
            
        

    </main>

    <?php


incluirTemplete('footer');

?>