<!DOCTYPE html>
<html lang="en">
<head>


<!--blibiotecas -->

  <link rel="stylesheet" href="Views/css/menu.css">
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
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
  
  <link rel="stylesheet" href="Views/css/style.css" />
    
 
    
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
            <img class="logo" src="Views/multimedia/logo.png" alt=""  />

        </div>

      </div>

</header>


<body>


  <div class="wrapper"> 
  

    <div class="section">


      <!--barra lateral -->
   
      <div class="sidebar">
          <div class="profile">
             
            <div class="IconoPeque"><i class='fas fa-user-cog' style='color:#fdfdfd' ></i></div>
            <h6 class="titulo">
                  Bienvenid@
                  <?=
                   $_SESSION['user']->getCorreo_Electronico();
                   
                 
                  ?>
                 
            </h6>
            
              <p> 
            Empleado
              </p> 
          </div>


<ul>
               <li id="inicio">
                <a href="?c=citas&a=index2">
                    <span class="icon-lg"> <i class='bx bx-grid-alt'></i> </span>
                    <span class="item">Inicio</span>
                </a>
            </li>
            <li id="perfil">
                <a href="#" >
                    <span class="icon-lg"><i class='bx bx-user' ></i></span>
                    <span class="item">Perfil</span>
                </a>
            </li>

            
            <li id="usuarios">
            <a href="?c=usuario&a=registroPac" >
                    <span class="icon-lg"><i class='bx bx-band-aid'></i></span>
                    <span  class="item">Registrar</span>
                </a>
            </li>

           <li id="citas">
            <a href="?c=usuario&a=index" >
                    <span class="icon-lg"><i class='bx bx-band-aid'></i></span>
                    <span  class="item">Agendar</span>
                </a>
            </li>

            <li id="historial">
                <a href="?c=citas&a=viewHistorial" >
                    <span class="icon-lg"><i class='bx bxs-calendar-check' ></i></span>
                    <span class="item">Historial</span>
                </a>
  
                <li id="cerrarSesion">
                <a href="?c=usuario&a=logout" >
                    <span class="icon-lg"><i class='fas fa-sign-out-alt' ></i></span>
                    <span class="item">Cerrar </span>
                    <span class=""> Sesión</span>
                </a>

                <!-- <a href="?c=usuario&a=logout"  class="Cerrar_sesion">Cerrar sesión <i class="fas fa-sign-out-alt"></i> </a>-->
               </div> 

           <!--contenido de la pagina -->

     

      

      

