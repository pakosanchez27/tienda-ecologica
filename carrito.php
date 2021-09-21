<?php

require 'includes/app.php';

incluirTemplete('header');

?>
    <main class="carrito">
        <div class="contenedor-car">
            <div class="car-titulo">
                <p>4 productos en tu carrito</p>
        </div>
        <table>
            <tr class="home">
                <td>Img</td>
                <td>Producto</td>
                <td>Color</td>
                <td>Costo</td>
                <td>Cantidad</td>
            </tr>
            <tr>
                <td>
                    <img src="src/img/botella.jpg" alt="">
                </td>
                <td>Botella</td>
                <td>Cafe</td>
                <td>$200</td>
                <td>4 pz</td>
            </tr>
            <tr>
                <td>
                    <img src="src/img/cepillos.png" alt="">
                </td>
                <td>Producto</td>
                <td>Azul</td>
                <td>$200</td>
                <td>4 pz</td>
            
            </tr>
            
            <tr>
                <td>
                    <img src="src/img/cubiertos.jpg" alt="">
                </td>
                <td>Producto</td>
                <td>Azul</td>
                <td>$200</td>
                <td>4 pz</td>
            </tr>
            <tr>
                <td>
                    <img src="src/img/kitcompu.jpg" alt="">
                </td>
                <td>Producto</td>
                <td>Azul</td>
                <td>$200</td>
                <td>4 pz</td>
            </tr>
        </table>
        </div>
        <div class="total">
            <div class="total-info verde">
                <p><span>Total: </span> </p>
                <p>$3000</p>
            </div>
            <div class="total-info negro" >
                <p><span>Subtotal: </span> </p>
                <p>$3000</p>
            </div>
            <div class="total-info verde">
                <p><span>Iva: </span> </p>
                <p>$3000</p>
            </div>
            <div class="boton negro">
                <a href="#" class="btn btn-verde">Pagar</a>
            </div>
        </div>
     
    </main>

    






</body>

<?php

incluirTemplete('footer');

?>