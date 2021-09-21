<?php 
require '../../includes/app.php';

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

// importar la base de datos
$db = conectarDB(); 

// consultar la base de datos
$consulta = "SELECT * FROM producto WHERE id = ${id}";
$resultado = mysqli_query($db, $consulta);
$producto = mysqli_fetch_assoc($resultado);


// Consulta de categoria 
$consulta = "SELECT * FROM categoria"; 
$resultado = mysqli_query($db, $consulta);



// Arreglo de errores
  $errores = [];

   $nombre = $producto['nombre'];
   $precio = $producto['precio'];
   $descripcion = $producto['descripcion'];
   $stock = $producto['stock'];
   $categoriaId = $producto['categoriaId'];
   $imagenProducto = $producto['imagen'];

   

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre =mysqli_real_escape_string($db, $_POST['nombre']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $stock = mysqli_real_escape_string($db, $_POST['stock']);
    $categoriaId = mysqli_real_escape_string($db, $_POST['categoriaId']);

   $imagen = $_FILES['imagen'] ?? null;


  
if(!$nombre){
    $errores[] = 'El nombre es obligatorio';
}
if(!$precio){
    $errores[] = 'El precio es obligatorio';
}
if(!$descripcion){
    $errores[] = 'La descripcion es obligatoria';
}
if(!$stock){
    $errores[] = 'El stock es obligatorio';
}
if(!$categoriaId){
    $errores[] = 'La catecategoria es obligatoria';
}







if(empty($errores)){

    // Crear carpeta de imagenes
    $carpetaImagenes = '../../imagenes/';
  
    if(!is_dir($carpetaImagenes)){
        mkdir(($carpetaImagenes));
    }

    $nombreImagen = '';

    /** SUBIDA DE ARCHIVOS */

    if($imagen['name']) {
        // Eliminar la imagen previa

        unlink($carpetaImagenes . $producto['imagen']);

        // // Generar un nombre único
        $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

        // // Subir la imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );
    } else {
        $nombreImagen = $producto['imagen'];
    }



    // Insertar en la BD

    $query = " UPDATE producto SET nombre = '${nombre}', precio = '${precio}', imagen = '${nombreImagen}', descripcion = '${descripcion}', stock = ${stock},  categoriaId = ${categoriaId} WHERE id = ${id}";

     echo $query;
     
    $resultado = mysqli_query($db,$query);


    if($resultado){
        header( 'Location: /admin/index.php?resultado=2');
    }


}
}






incluirTemplete('header');
?>

<main class="contenedor seccion">
    <h2 class="centrar">Actualizar</h2>

    <a href="/admin" class=" boton-verde">Volver</a>
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>    
<form class="formulario" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Informacion del producto</legend>

        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Introduce el nombre del producto" value="<?php echo $nombre ?>"> 

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" placeholder="Precio del producto" value="<?php echo $precio ?>">

        <label for="descripcion">Descripcion:</label>
        <textarea name="descripcion" id="descripcion"><?php echo $descripcion ?></textarea>

        <label for="imagen">Foto del producto:</label>
        <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
        <img src="/imagenes/<?php echo $imagenProducto ?>" class="imagen-small" >

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" placeholder="numero de stock" value="<?php echo $stock ?>">

        <label >Categoria:</label>
        <select name="categoriaId" >
            <option value="">Selecciona una categoria</option>
            <?php while($categoria = mysqli_fetch_assoc($resultado) ) :  ?>
            <option <?php echo $categoriaId === $categoria['idCategoria'] ? 'selected' : ''; ?> value="<?php echo   $categoria['idCategoria']; ?>"><?php echo $categoria['nombreCategoria'] ?></option>
            <?php endwhile; ?>
        </select>

    </fieldset>
    <input type="submit" value="Enviar" class="boton boton-verde">
</form>

</main>








<?php

incluirTemplete('footer');
?>