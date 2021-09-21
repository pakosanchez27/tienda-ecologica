<?php 
    require 'includes/app.php'; 

    // conectar a la base de datos
    $db = conectarDB();

    // Validacion 
    $errores = []; 

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $correo = mysqli_real_escape_string($db, filter_var( $_POST['correo'], FILTER_VALIDATE_EMAIL) ); 
        $password =mysqli_real_escape_string($db, $_POST['password']);

        if(!$correo){
            $errores[] = 'El correo es necesario'; 
        }
        if(!$password){
            $errores[] = 'El password es necesario'; 
        }
        

        if(empty($errores)){

            // Consulta a la BD
            $query = "SELECT * FROM usuarios WHERE correo = '${correo}'";
            $resultado = mysqli_query($db, $query);
            
            if($resultado->num_rows){
                // Revisar si el password es correcto 
                $usuario = mysqli_fetch_assoc($resultado);
                // Verificar si el password es correcto 
                $aut =  password_verify($password, $usuario['password']);
                
                if($aut){
                    session_start(); 

                    $_SESSION['usuario'] = $usuario['correo'];
                    $_SESSION['login'] = true;

                    header('Location: /admin');
                }else{
                    $errores[] = 'El password es incorrecto';
                }


            }else{
                $errores[] ="El usuario no existe"; 
            }


        }
        
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/desarrollo/css/app.css">
    <title>login</title>
</head>
<body >
    

<div class="login-fondo">
    <div class="login">
        <div class="login-img">
            <img src="src/img/login.jpg">
        </div>
        <div class="login-form">
            <h2>Bienvenido!</h2>

            <form class="login-formulario" method="POST">
                <?php foreach($errores as $error): ?>
                    <p class="error-login"><?php echo $error; ?></p>
                <?php endforeach; ?>
                <label for="correo">Correo:</label>
                <input class="input" type="email" id="correo" name="correo" placeholder="Ingresa tu correo" require>
                <label for="password">Contraseña:</label>
                <input class="input" type="password" name="password" id="password" placeholder="Ingresa tu correo" require>
                
                <input type="submit" value="Iniciar Sesion" class=" boton-verde enviar">
            </form>
        </div>
    </div>
</div>


</body>
</html>