<?php

require 'includes/app.php';

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header('Location: /');
}
// conectar la BD
$db = conectarDB();


// consulta a la BD
$query = "SELECT * FROM producto WHERE id = ${id}"; 
$resultado = mysqli_query($db, $query);

$producto = mysqli_fetch_assoc($resultado);
if(!$resultado ->num_rows){
    header('Location: /');
}

incluirTemplete('header');

?>

    <main class="producto-contenido">
        <div class="titulo">
            <h2><?php echo $producto['nombre'];  ?></h2>
        </div>
        <div class="producto">
            <div class="img-producto">
                <img src="/imagenes/<?php echo $producto['imagen'];  ?>" alt="Producto">
            </div>
        
        <div class="info-producto">
            <p><span>Costo:</span> $<?php echo $producto['precio'];  ?></p>
            <p><span>Color:</span>  Azul</p>
            <p><span>Cantidad:</span>  4</p>
            <p><span>Descripcion: </span> <?php echo $producto['descripcion'];  ?></p>
            <a href="carrito.php" class="btn btn-verde">Agregar</a>
        </div>
        
        </div>
        <div class="sugerencia">
            <h2>Tambien Te Puede Interesar</h2>
            <div class="cards">
            <?php  
        $limite = 4;
        include 'includes/templetes/_cards.php'
    ?>
        </div>        
            </div>
        

    </main>

    <?php


incluirTemplete('footer');

?>