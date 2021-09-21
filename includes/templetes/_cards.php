<?php 

  


    // conectar la BD
    $db = conectarDB();

    // consulta a la BD
    $query = "SELECT * FROM producto LIMIT ${limite}"; 
    $resultado = mysqli_query($db, $query);


?>




<?php while($producto = mysqli_fetch_assoc($resultado)): ?>
        <div class="card">
            <div class="img">
                <img src="/imagenes/<?php echo $producto['imagen']; ?>" alt="Productos">
            </div>
            <div class="des">
                <p class="titulo"><?php echo $producto['nombre'];?></p>
                <p>Costo: $<?php echo $producto['precio'];?></p>
                <a href="producto.php?id=<?php echo $producto['id'];?>" class="btn  btn-verde">Más info</a>
            </div>
        </div>
    
        <?php endwhile; ?>

