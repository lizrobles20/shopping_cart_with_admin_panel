<?php
include('process.php');
if (!isLoggedIn()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: index.php');
}
if (isAdmin()) {
  $_SESSION['msg'] = "You must log in first";
  header('location: ./index.php');
  session_destroy();
}
$id = $_SESSION['user']['id_usuario'];

?>

<!DOCTYPE html>
<html>
  <head>
             
   
    <link rel="stylesheet" href="src/estiloProductos.css" />  

    <link rel="shortcut icon" href="img/logocatra.png"> 
    <script src="https://kit.fontawesome.com/6b0dd32ac9.js" crossorigin="anonymous"></script>
   
    <script src="src/slide.js"></script>
    <title>Repostería Catra</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  </head>

  <body>
    <main>
      <header class="barra">
          <nav class="nav_barra">
              <div class="container nav_container">
                   <a href="cliente.php"><img src="img/logocatra.png" /><h1 class="titulo">Repostería Catra</h1></a>
        
                   <div class="links">
                       <i class="fas fa-user" style="color: white"></i>
                       <a href="index.php?logout='1'" class="link">Cerrar sesión</a>
                       <i class="fas fa-shopping-cart" style="color: white"></i>
                       <a href="carrito.php" class="link">Ver carrito<a href="carrito.php" class="link" name="numItems"></a></a>
                   </div>
              </div>
        </nav>
        </header>
   
  <section class="productos"> 
    <div class="contenedor">
                     
                      <article class="container-cards">
                          <div class="cardimg">
                              <div class="slide-contenedor">
                                <div class="miSlider fade">
                                   <img src="img/chocolate-cookie.jpg" class="card_img"> 
                                </div>
                                <div class="miSlider fade" style="display:none">
                                   <img src="img/chispas-galleta.png" class="card_img"> 
                                </div>
                                <div class="miSlider fade" style="display:none">
                                   <img src="img/macaron-cookie.png" class="card_img"> 
                                </div>
                                <div class="miSlider fade" style="display:none">
                                   <img src="img/polvoron-cookie.png" class="card_img"> 
                                </div>
                                <div class="miSlider fade" style="display:none">
                                   <img src="img/avena-cookie.jpg" class="card_img"> 
                                </div>
                              <div class="direcciones">
                                <a href="#" class="atras" onclick="avanzaSlide(-1)">&#10094;</a>
                                <a href="#" class="adelante" onclick="avanzaSlide(1)">&#10095;</a>
                              </div>
                              <div class="barras">
                                <span class="barrita active" onclick="posicionSlide(1)"></span>
                                <span class="barrita" onclick="posicionSlide(2)"></span>
                                <span class="barrita" onclick="posicionSlide(3)"></span>
                                <span class="barrita" onclick="posicionSlide(4)"></span>
                                <span class="barrita" onclick="posicionSlide(5)"></span>
                              </div>
                            </div>
                            </div>
                         
                          <div class="card">
                              <h3 class="card_title">Galletas</h3>
                              <p class="card_text">Exquisitas galletas elaboradas a base de harina y mantequilla con ingredientes de calidad y sin azúcar, 
                                  en presentación de 5 unidades, elige los sabores que más te gusten. </p>
                             
                              <a class="card_button">Sabor</a>

                              <select id="sabor" name="sabor" class="sabor">
                              <option value="$$$" data-pre="0">Selecciona un sabor</option>
                              <?php
                                $galletas="SELECT * FROM galletas";
                                $resultado=mysqli_query($db,$galletas);
                                while ($valores = mysqli_fetch_array($resultado)){
                                  echo '<option value ="$'.$valores[precio_galleta].'.00" data-pre="'.$valores[id_galleta].'">'.$valores[nombre_galleta].'</option>';
                                }
                               
                                ?>
                             </select>
                            
                             <a class="card_precio">Precio</a>
                             <input type="text" placeholder="$$$" id="precio" name="precio" class="precio" readonly required value=""/>

                             <script type="text/javascript">

document.addEventListener('DOMContentLoaded', function() {
    // Obtener select y campo de placas
    let cod = document.querySelector('.sabor');
    let precios = document.querySelector('.precio');
    // Escuchar cuando cambie valor del select
    cod.addEventListener('change', (e) => {
        // Obtener opción seleccionada
        let opt = cod.options[cod.selectedIndex].value;
        // Establecer valor del input precio
        // Si opt tiene valor de precio, asignarlo, de lo contrario, queda vacío
        precios.value = opt;
    });
});
</script>
                             <a class="card_cantidad">Cantidad</a>
                             <input type="number" class="cantidadProducto" name="cantidadProducto" min="1" value=1>
                             <button type="submit" name="añadir" class="button" id="submit"><strong>Añadir al carrito</strong></button>
                             
                          </div>

   </div>
   <div class="overlay" id="overlay">
  <div class="popup" id="popup">
    <h1>Se agregó al carrito</h1>  
    <button type="submit" name="cerrar" class="cerrar" id="cerrar">Ok</button>
  </div>
</section>
          </main>
          <script src="src/procesoCarrito.js"></script>
          <script src="src/itemsNumber.js"></script>    
          <script src="src/mensajeProductos.js"></script>
        </body>
</html>