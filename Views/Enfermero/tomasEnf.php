
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- esto va en cada tabla-->
<link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
<!-- esto va en cada tabla-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>Citas</title>
<h1> Citas </h1>

<div class= "container-fluid">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Inicio / Lista citas </li>
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
        <td>Fecha 
                <div class="float-right"> <i class="fas fa-arrow-up"></i> 
            <i class="fas fa-arrow-down"></i>
</div>
                    </td>
            <td>Hora</td>
            <td>Examen</td>
            <td>Usuario</td>
            <td>Documento</td>
            <td>Sucursal</td>
            <td>Estado</td>
            <td></td>
            <td></td>


</tr>    
</thead>  
<tbody>
    <?php foreach($citas as $cita): ?>
        <tr>
        <td> <?= $cita->getFecha_Cita() ?> </td>
        <td> <?= $cita->getHora_Cita() ?></td>
        <td> <?= $examen->getById($cita->getId_Examen())->getNombre_Examen() ?></td>
        <td> <?= $usuario->getById($cita->getId_Usuario())->getNombres_Usuario() ?></td>
        <td> <?= $usuario->getById($cita->getId_Usuario())->getApellidos_Usuario() ?></td>
        <td> <?= $usuario->getById($cita->getId_Usuario())->getDocumento_Identificacion() ?></td>
        <td> <?= $sucursal->getById($cita->getId_Sucursal())->getNombre_Sucursal() ?></td>
        <td> <a href="?c=citas&a=asistido&Id_Cita=<?= $cita->getId_Cita() ?>" class= "btn btn-warning">Atendido</a> </td>        
        <td> <a href="?c=citas&a=noAsistido&Id_Cita=<?= $cita->getId_Cita() ?>" class= "btn btn-danger">No Asistio</a> </td>        

        
    </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>


    </div>
    <script src='Views/js/dataTable.js'></script>
    </body>
    </html>