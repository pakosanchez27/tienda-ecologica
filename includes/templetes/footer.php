<?php
    
   if(!isset($_SESSION)){
    session_start();
   }
   $auth = $_SESSION['login'] ?? false;

?>


<footer class="footer">
    <div class="contenido-footer">
    
            <nav class="navegacion-footer">
                
                <a href="index.php" class="enlace">Inicio</a>
                <a href="productos.php" class="enlace">Productos</a>
                <a href="nosotros.php" class="enlace">Nosotros</a>
                <a href="blog.php" class="enlace">Blog</a>
              
            </nav>
     
        <div class="central">
            <div class="footer-img">
                <h2>Ecologic</h2>
            </div>
            <div class="redes">
            
                <a href="#">
                    <img src="/src/img/facebook.png" alt="Redes Sociles">
                </a>
                <a href="#">
                    <img src="/src/img/youtube.png" alt="Redes Sociles">
                </a>
                <a href="#">
                    <img src="/src/img/tweeter.png" alt="Redes Sociles">
                </a>
                <a href="#">
                    <img src="/src/img/whatsapp.png" alt="Redes Sociles">
                </a>
              
                
               
                
                
            </div>
        </div>
        <div class="mas-info">

            <a href="#">Aviso de privacidad</a>
            <a href="#">Politica de devolucion</a>
            <?php if($auth): ?>
            <a href="/admin">Administrador</a>
            <a href="cerrar-sesion.php">Cerrar seccion</a>
            <?php elseif(!$auth): ?>
            <a href="login.php">Iniciar seccion</a>
            <?php endif; ?>
            <a href="#">Contacto</a>
        </div>
    </div>
    <div class="copy">
        <p>@EcoLogic, Copyrigth 2021. CleanKode.</p>
    </div>
</footer>
    <script src="js/app.js"></script>
</body>
</html>