

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
<!-- esto va en cada tabla-->
<link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
<!-- esto va en cada tabla-->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<title>Pacientes</title>
    </head>
    <body>

<h1>Pacientes </h1>

<div class= "container-fluid">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?c=citas&a=index2">Inicio</a></li>
        <li class="breadcrumb-item active">Pacientes</li>
    </ol>
</nav>
    </div>

    
<div class="container"> 

</div> 

<div class="container">  
<br>
<table class="table table-hover table-striped" id="tabla" class="display"> 
    <thead class="table-dark">
    <tr>
    <th>Documento Identificacion 
                <div class="float-right"> <i class="fas fa-arrow-up"></i> 
            <i class="fas fa-arrow-down"></i>
</div>
                    </th>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Telefono</th>
		<th>Correo Electronico</th>
		<th colspan="2">Acciones</th>
	</tr>
	


    </thead>  

    <?php 
    try{
        foreach($usuarios as $usuario): ?> 

        <tr>
            
        <td> <?= $usuario->getDocumento_Identificacion() ?> </td>
        <td> <?= $usuario->getNombres_Usuario() ?> </td>
        <td> <?= $usuario->getApellidos_Usuario() ?> </td>
        <td> <?= $usuario->getTelefono_Usuario() ?> </td>
        <td> <?= $usuario->getCorreo_Electronico() ?> </td>
 
        <td> <a href="?c=citas&a=viewAgendarPac&Id_Usuario=<?= $usuario->getId_Usuario() ?>" class= "btn btn-primary">Agendar Cita</a> </td>        
        <td> <a href="?c=citas&a=viewHistorialPac&Id_Usuario=<?= $usuario->getId_Usuario() ?>" class= "btn btn-secondary">Ver Historial</a> </td>        
                          
        </a>
        

        </td>
    </tr>
    <?php endforeach; 
    }catch(Exception $e){
        die($e->getMessage());
        die("No se pudo listar");
    }
    ?>
    </tbody>
</table>

    </div>
    <script src='Views/js/dataTable.js'></script>
    </body>
    </html>