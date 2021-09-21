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
            <a href="#" class="atras" id="atras" onclick="avanzaSlide(-1)"> &#10094; </a>
            <a href="#" class="siguiente" id="siguiente" onclick="avanzaSlide(1)"> &#10095; </a>
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

<main class="contenido-principal">
    <div class="title">
        <h1>La primera Tienda Ecologica en Linea</h1>
    </div>
    <div class="info">
        <p>Todos nuestros productos hechos 100% ecológicos y en México, Además a bajo costo</p>
    </div>
    <div class="cards">
    <?php  
        $limite = 4;
        include 'includes/templetes/_cards.php'
    ?>
    </div>
    <div class="contenedor-oferta">
        <div class="oferta-img">
            <img src="src/img/setlimpieza.jpg" alt="">
        </div>
        <div class="oferta-info">
            <h2>oferta del mes!!!</h2>
            <p>Kit de limpieza con mas de 20 productos</p>
            <p>por solo la cantidad de <span>$800 MXN</span></p>
            <a href="producto.php" class="size btn btn-negro ">Mas Info</a>
        </div>

    </div>
    <div class="motivacion-contenedor">
    <div class="motivacion">
        <img src="src/img/Para cambiar el mundo, primero debemos cambiar nosotros..png" alt="">
    </div>
</div>

</main>

<?php

incluirTemplete('footer');

?>