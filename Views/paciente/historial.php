
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

      
<!-- esto va en cada tabla-->
<link rel="stylesheet" href="Views/css/tablas.css">
<link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
<!-- esto va en cada tabla-->

<script src='Views/js/dataTable.js'></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <title>Historial</title>
<h1> Historial </h1>

<div class= "container-fluid">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?c=citas&a=index">Inicio</a></li>
        <li class="breadcrumb-item active">Historial</li>
    </ol>
</nav>
    </div>

    <div class= "container-fluid">
<h8>En este espacio encontrarás tus citas agendadas activas hasta el día de hoy. Para ver las citas que ya pasaron dirigete a historial general</h8>
</div>
<div class="container"> 

</div> 
<br>
<div class="contact-box">  
<br>
<table class="table table-hover table-striped" id="tabla" class="display"><!-- Datatable -->
    <thead class="table">
        <tr>
        <td>ID 
<div class="float-right"> <i class="fas fa-arrow-up"></i> <!-- Datatable -->
            <i class="fas fa-arrow-down"></i>
</div>
                    </td>
            <td>Hora</td>
            <td>Estado</td>
            <td>Examen</td>
            <td>Usuario</td>
            <td> </td>
            <td>Documento</td>
            <td>Sucursal</td>


</tr>    
</thead>  
<tbody>
    <?php foreach($citas as $cita): ?>
        <tr>
        <td> <?= $cita->getFecha_Cita() ?> </td>
        <td> <?= $cita->getHora_Cita() ?></td>
        <td> <?= $cita->getEstado_Cita() ?></td>
        <td> <?= $examen->getById($cita->getId_Examen())->getNombre_Examen() ?></td>
        <td> <?= $usuario->getById($cita->getId_Usuario())->getNombres_Usuario() ?></td>
        <td> <?= $usuario->getById($cita->getId_Usuario())->getApellidos_Usuario() ?></td>
        <td> <?= $usuario->getById($cita->getId_Usuario())->getDocumento_Identificacion() ?></td>
        <td> <?= $sucursal->getById($cita->getId_Sucursal())->getNombre_Sucursal() ?></td>

    </tr>
    <?php endforeach; ?>
    </tbody>
</table>


    </div>
    
    </body>
    </html>