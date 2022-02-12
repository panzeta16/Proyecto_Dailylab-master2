
<?php


if(!isset($_SESSION['user'])){
  header("location: ?c=home&a=index");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>


<!--blibiotecas -->

  <link rel="stylesheet" href="Views/css/menu.css">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

<!--jquery -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<!--funciones para abrir url -->

    <title>Document</title>
    <style>
    </style>
   
<!--stilos -->
  
  <link rel="stylesheet" href="Views/css/estilo.css" />
    
 
    
</head>

<header> 


<div class="wrapper"> 
  

    <div class="section">

      <!--barra superior -->
      <div class="top_navbar">

      


          <div class="hamburger">
              <a href="#">
                  <i class="fas fa-bars"></i>
              </a>
          </div>

          <!--barra de busqueda -->

          <form autocomplete="on" class="buscar">
            <div>
              <input type="text" name="q" placeholder="Buscar">
            </div>
          </form>

           <!--logo -->
          <div class="logo_name">
            <img class="logo" src="../Views/multimedia/logo.png" alt="" width="180" height="60" />

        </div>

      </div>

</header>


<body>


  <div class="wrapper"> 
  

    <div class="section">


      <!--barra lateral -->
   
      <div class="sidebar">
          <div class="profile">
             
            <i class='fas fa-user-cog' style='color:#fdfdfd' ></i>
            
            <h3>
                  Bienvenid@
                  <?=
                   $_SESSION['user']->getCorreo_Electronico();
                   
                 
                  ?>
                 
            </h3>
            
              <p> 
            Paciente
              </p> 
          </div>



<ul>
               <li class= "bubble" id="inicio"> <!--prueba-->
                <a href="?c=citas&a=Menu">
                    <span class="icon"> <i class='bx bx-grid-alt'></i> </span>
                    <span class="item:active">Inicio</span>
                </a>
            </li>
            <li id="perfil">
            <a href="?c=usuario&a=verPerfil" >
                    <span class="icon"><i class='bx bx-user' ></i></span>
                    <span class="item:active">Ver perfil</span>
                </a>
            </li>
            
       <!--     <li id="agendar">
                   <a href="?c=citas&a=viewAgendar" >Agendar citas 
                  <a href="?c=citas&a=Menu" >
                    <span class="icon"><i class='bx bx-band-aid'></i></span>
                    <span  class="item:active">Mis citas
                     </a>
                    </span>  
            </li> -->

            <li id="agendar">
                  <!-- <a href="?c=citas&a=viewAgendar" >Agendar citas -->
                  <a href="?c=citas&a=viewAgendar" >
                    <span class="icon"><i class='bx bxs-calendar-check'></i></span>
                    <span  class="item:active">Agendar citas
                     </a>
                    </span>  
            </li>

          
            <li id="resultados">
                  <!-- <a href="?c=citas&a=viewAgendar" >Agendar citas -->
                  <a href="?c=resultados&a=resultados" >
                    <span class="icon"><i class='far fa-clipboard'></i></span>
                    <span  class="item:active">Resultados
                     </a>
                    </span>  
            </li>

            <li id="historial">
            <a href="?c=citas&a=viewHistRolPac&&Id_Usuario=<?= $usuario->getId_Usuario() ?>">
        
                    <span class="icon"><i class='far fa-clock' ></i></span>
                    <span class="item:active">historial general</span>
                </a>
  

          
   
          

                <a href="?c=usuario&a=logout"  class="Cerrar_sesion">Cerrar sesión <i class="fas fa-sign-out-alt"></i> </a>
     </div>

           <!--contenido de la pagina -->

     

      

      

