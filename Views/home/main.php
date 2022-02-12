<?/*php
require_once "Models/usuario.php";
$NombreUsuario = $_SESSION['user'];
if (isset($NombreUsuario)) {
 
}else{
  */?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete responsive app landing page website design tutorial</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="Views/css/landing.css">

</head>
<body>
    
<!-- header   -->

<header>
     
    
    <img class="logo" src="Views/multimedia/logo.png" alt="" width="230" height="90" />

    <input type="checkbox" id="menu-bar">
    <label for="menu-bar" class="fas fa-bars"></label>

    <nav class="navbar">
        <a href="#inicio">inicio</a>
        <a href="#Acerca">Acerca de dailylab</a>
        <a href="#Modulos">Modulos</a>
        <a href="#funcionalidades">Funcionalidades</a>
        <a href="#review">Ventajas</a>
        <a href="#contact">Contactenos</a>
     <!-- -->   <a href="?c=usuario&a=login"class="btn">Iniciar sesion</a> <!--<a href="?c=usuario&a=login"class="btn">Iniciar sesion</a><!--c es controller? tonces se fue al controller del usuario y a es accion, la accion de login-->
     <a href="?c=usuario&a=registro"class="btn">Registrar</a><!-- <a href="?c=usuario&a=registro" class="btn">Registrate</a> -->
    </nav>

</header>

<!-- header fin -->

<!-- seccion inicio  -->

<section class="home" id="inicio">

    <div class="content">
        <h3>Con Dailylab adquiera <h3>

        <h3><br><span>Velocidad en sus citas</span></h3>
        <p>la pagina que estabas esperando</p>
         
       
     
    </div>

    <div class="image">
        <img src="Views/multimedia/image1.jpg" alt="">
    </div>

</section>

<!-- seccion inicio fin -->

<!-- features section starts  -->

<section class="home" id="Acerca">

    <div class="image">
        <img src="Views/multimedia/image2.jpg" alt="">
    </div>

    <div class="content">
        <h3> <span>Acerca de dailylab</span></h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Perferendis numquam ab necessitatibus ratione aperiam 
            neque laborum eveniet tempora alias, iusto non corrupti consequatur ipsa
             tempore praesentium. Ullam quaerat alias facilis.</p>
        
    </div>



</section>

<!-- features section ends -->

<!-- about section starts  -->

<section class="features" id="Modulos">

    <h1 class="heading"> Modul�s de Dailylab </h1>

    <div class="box-container">

        <div class="box">
            <img src="Views/multimedia/analisis.png" alt="">
            <h3>An�lisis</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
            
        </div>

        <div class="box">
            <img src="Views/multimedia/cita.png" alt="">
            <h3>Gesti�n de citas</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
            
        </div>

        <div class="box">
            <img src="Views/multimedia/Checklist.png" alt="">
            <h3>Resultados</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
            
        </div>

    </div>
</section>

<!-- about section ends -->


    <section class="features" id="funcionalidades">

        <h1 class="heading"> Funcionalidades </h1>

    <div class="box-container">

        <div class="box">
       
            <h3>An�lisis</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
            
        </div>

        <div class="box">
          
            <h3>Gesti�n de citas</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
            
        </div>

        <div class="box">
            
            <h3>Resultados</h3>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
            
        </div>

    </div>
    </section>

<!-- newsletter  -->



<!-- review section starts  -->

<section class="review" id="review">

    <h1 class="heading"> Ventajas de dailyLab </h1>

    <div class="box-container">

        <div class="box">
            
            <div class="user">
                <img src="llenar" alt="">
                <h3>llenar</h3>

                <div class="comment">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus et, perspiciatis nisi tempore aspernatur accusantium sed distinctio facilis aperiam laborum autem earum repellat, commodi eum. Ullam cupiditate expedita officiis obcaecati?
                </div>
            </div>
        </div>

        <div class="box">
            
            <div class="user">
                <img src="llenar" alt="">
                <h3>llenar</h3>

                <div class="comment">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus et, perspiciatis nisi tempore aspernatur accusantium sed distinctio facilis aperiam laborum autem earum repellat, commodi eum. Ullam cupiditate expedita officiis obcaecati?
                </div>
            </div>
        </div>

        <div class="box">
           
            <div class="user">
                <img src="llenar" alt="">
                <h3>llenar</h3>

                <div class="comment">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus et, perspiciatis nisi tempore aspernatur accusantium sed distinctio facilis aperiam laborum autem earum repellat, commodi eum. Ullam cupiditate expedita officiis obcaecati?
                </div>
            </div>
        </div>

    </div>

</section>

<!-- review section ends -->

<!-- pricing section starts  -->

<section class="pricing" id="pricing">

    <h1 class="heading"> planes </h1>

    <div class="box-container">



        <div class="box">
            <h3 class="title">estandar</h3>
            <div class="price">$1000<span>/anual</span></div>
            <ul>
                <li> <i class="fas fa-check"></i> funcionalidades </li>
                <li> <i class="fas fa-check"></i> funcionalidades </li>
                <li> <i class="fas fa-check"></i> funcionalidades </li>
                <li> <i class="fas fa-times"></i> funcionalidades </li>
            </ul>
            <a href="#" class="btn">Comprar</a>
        </div>



    </div>

</section>

<!-- pricing section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

    <div class="image">
        <img src="Views/multimedia/IMAGE4.jpg" alt="">
    </div>

    <form action="">

        <h1 class="heading">CONTACTENOS</h1>

        <div class="inputBox">
            <input type="text" required>
            <label>Nombre</label>
        </div>

        <div class="inputBox">
            <input type="email" required>
            <label>email</label>
        </div>

        <div class="inputBox">
            <input type="number" required>
            <label>Telefono</label>
        </div>

        <div class="inputBox">
            <textarea required name="" id="" cols="30" rows="10"></textarea>
            <label>mensaje</label>
        </div>

        <input type="submit" class="btn" value="enviar mensaje">

    </form>

</section>

<!-- contact section edns -->

<!-- footer section starts  -->

<div class="footer">

    <div class="box-container">

        <div class="box">
            <h3>llenar</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet pariatur rerum consectetur architecto ad tempora blanditiis quo aliquid inventore a.</p>
        </div>

        <div class="box">
            <h3>Enlaces r�pidos</h3>
            <a href="#inicio">inicio</a>
            <a href="#Acerca">Acerca de dailylab</a>
            <a href="#Modulos">Modulos</a>
            <a href="#funcionalidades">Funcionalidades</a>
            <a href="#review">Ventajas</a>
            <a href="#contact">Contactenos</a>
        </div>

        <div class="box">
            <h3>Siguenos</h3>
            <a href="#">facebook</a>
            <a href="#">instagram</a>
            <a href="#">pinterest</a>
            <a href="#">twitter</a>
        </div>

        <div class="box">
            <h3>Mas informacion</h3>
            <div class="info">
                <i class="fas fa-phone"></i>
                <p> +123-456-7890 <br> +111-2222-333 </p>
            </div>
            <div class="info">
                <i class="fas fa-envelope"></i>
                <p> example@gmail.com <br> example@gmail.com </p>
            </div>
            <div class="info">
                <i class="fas fa-map-marker-alt"></i>
                <p> Bogota, Colombia - 400104 </p>
            </div>
        </div>

    </div>

    <h1 class="credit"> &copy; copyright @ 2021 by. Laura Camila Ramirez y Steven David Gonzalez  </h1>

</div>

<!-- footer section ends -->




</body>
</html>
<?/*php } */?>