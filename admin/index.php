<?php 
require '../includes/app.php';

estaAutenticado();



incluirTemplete('header');



// Importar BD
$db = conectarDB(); 

// Importar datos

$query = "SELECT * FROM producto INNER join categoria on categoriaId = categoria.idCategoria";
$resultadoConsulta = mysqli_query($db, $query);

$resultado = $_GET['resultado'] ?? null;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);


    if($id){

        // Eliminar imagen
        $query = "SELECT imagen FROM producto WHERE id = ${id}";

            $resultado = mysqli_query($db, $query);
            $producto = mysqli_fetch_assoc($resultado);
            
            unlink('../imagenes/' . $producto['imagen']);

        $query = "DELETE FROM producto WHERE id = ${id}";
    

        $resultado = mysqli_query($db, $query);

        if($resultado) {
            header('location: /admin?resultado=3');
        }

    }


}





?>

<main class="contenedor seccion">
    <h2 class="centrar">Panel de administrador</h2>
    <?php if( intval( $resultado ) === 1): ?>
            <p class="alerta exito">Producto Registrado Correctamente</p>
        <?php elseif( intval( $resultado ) === 2 ): ?>
            <p class="alerta exito">Producto Actualizado Correctamente</p>
        <?php elseif( intval( $resultado ) === 3 ): ?>
            <p class="alerta exito">Producto Eliminado Correctamente</p>
        <?php endif; ?>
    <a href="/admin/crud/crear.php" class=" boton-verde">Nuevo Registro</a>


    <table class="producto">
        <thead>
            <tr>
               
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripcion</th>
                <th>stock</th>
                <th>Categoria</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while($producto = mysqli_fetch_assoc($resultadoConsulta)): ?>
            
            <tr>
               
                <td><?php echo $producto['nombre'] ?></td>
                <td>$ <?php echo $producto['precio'] ?></td>
                <td><?php echo $producto['descripcion'] ?></td>
                <td><?php echo $producto['stock'] ?></td>
                <td><?php echo $producto['nombreCategoria'] ?></td>
                <td><img src="/imagenes/<?php echo $producto['imagen'] ?>" class="imagen-tabla"></td>
                <td>
                    <form method="POST" class="w-100">

                        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">

                        <input type="submit" class="boton-rojo-block" value="Eliminar">

                        <a href="/admin/crud/actualizar.php?id=<?php echo $producto['id']; ?> " class="boton-amarillo-block ">Actualizar</a>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>






<?php

incluirTemplete('footer');
?>