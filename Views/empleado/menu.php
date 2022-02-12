

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->  
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<title>Usuarios</title>
    </head>
    <body>

<h1>Mis citas </h1>

<div class= "container-fluid">
<br>

<ol class= "breadcrumb">
    <li class="active">Inicio >> </li>  
    <li><a href="#">Menu </a></li> 
</ol>   
</div>


<br>
<div class="container"> 

</div> 
<br>
<div class="container">  
<br>
<table class="table table-hover table-striped"> 
    <thead class="table-dark">
        <tr>
            <td>ID</td>
            <td>Fecha </td>
            <td>Hora </td>
            <td>Estado </td>
            <td>Nombre Sucursal</td>
            <td>Nombre Examen</td>
            <td>Nombre Usuario</td>
            <td>Cancelar</td>
        </tr>    
    </thead>  

    <?php 
    try{
        foreach($cital as $cita): ?> 

        <tr>
        <td> <?= $cita->getId_Cita() ?> </td>
        <td> <?= $cita->getFecha_Cita() ?> </td>
        <td> <?= $cita->getHora_Cita() ?> </td>
        <td> <?= $cita->getEstado_Cita() ?> </td>
        <td> <?= $sucursal->getById($cita->getId_Sucursal())->getNombre_Sucursal() ?> </td>
        <td> <?= $examen->getById($cita->getId_Examen())->getNombre_Examen() ?> </td>
        <td> <?= $usuario->getById($cita->getId_Usuario())->getNombres_Usuario() ?> </td>
        <td> <a href="?c=citas&a=changeState&Id_Cita=<?= $cita->getId_Cita() ?>" class= "btn btn-danger">Cancelar</a> </td>        
                        
        </a>
        

        </td>
    </tr>
    <?php endforeach; 
    }catch(Exception $e){
        die($e->getMessage());
        die("No se pudo listar");
    }
    ?>
</table>

    </div>
    </body>
    </html>
