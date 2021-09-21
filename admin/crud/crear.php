<?php 
require '../../includes/app.php';

// importar la base de datos
$db = conectarDB(); 

// consultar la base de datos

$consulta = "SELECT * FROM categoria";
$resultado = mysqli_query($db, $consulta);

// Arreglo de errores
  $errores = [];

   $nombre = '';
   $precio = '';
   $descripcion = '';
   $stock = '';
   $categoriaId = null;




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

if(!$imagen['name'] || $imagen['error']) {
    $errores[] = 'La imagen es obligatoria';
}

$medida = 2 * 1000 * 1000;
    // var_dump($imagen['size']);
    // var_dump($imagen);

    if ($imagen['size'] > $medida) {
        $errores[] = 'La Imagen es muy grande';
    }



if(empty($errores)){

    // Crear carpeta de imagenes
    $carpetaImagenes = '../../imagenes/';
  
    if(!is_dir($carpetaImagenes)){
        mkdir(($carpetaImagenes));
    }
    // Darle nombre unico a las imagenes
    $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';


    //Subir la imagen 
    move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen );



    // Insertar en la BD

    $query = "INSERT INTO producto (nombre, precio, descripcion, imagen, stock, categoriaId) VALUES('${nombre}', ${precio}, '${descripcion}','${nombreImagen}', '${stock}', '${categoriaId}')";

     echo $query;
    $resultado = mysqli_query($db,$query);


    if($resultado){
        header( 'Location: /admin/index.php?resultado=1');
    }


}
}






incluirTemplete('header');
?>

<main class="contenedor seccion">
    <h2 class="centrar">Registra un producto</h2>

    <a href="/admin" class=" boton-verde">Volver</a>
    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>    
<form action="/admin/crud/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>Informacion del producto</legend>

        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Introduce el nombre del producto">

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio" placeholder="Precio del producto">

        <label for="descripcion">Descripcion:</label>
        <textarea name="descripcion" id="descripcion"></textarea>

        <label for="imagen">Foto del producto:</label>
        <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

        <label for="stock">Stock:</label>
        <input type="number" id="stock" name="stock" placeholder="numero de stock">

        <label >Categoria:</label>
        <select name="categoriaId" id="categoriaId">
            <option value="">Selecciona una categoria</option>
            <?php while($categoria = mysqli_fetch_assoc($resultado) ) :  ?>
            <option <?php echo $categoria === $categoria['idCategoria'] ? 'selected' : ''; ?> value="<?php echo $categoria['idCategoria']; ?>"><?php echo $categoria['nombreCategoria'] ?></option>
            <?php endwhile; ?>
        </select>

    </fieldset>
    <input type="submit" value="Enviar" class="boton boton-verde">
</form>

</main>








<?php

incluirTemplete('footer');
?>