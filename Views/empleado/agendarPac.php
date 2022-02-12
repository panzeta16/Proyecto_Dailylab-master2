<h4><?=$cita->getId_Cita() ? 'Editar' : 'Nuevo'?> Agendamiento </h4>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class= "container-fluid">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="?c=citas&a=index2">Inicio</a></li>
    <li class="breadcrumb-item"><a href="?c=usuario&a=index">Pacientes</a></li>
        <li class="breadcrumb-item active">Agendar Pacientes</li>
    </ol>
</nav>
    </div>
       
    <title>Agenda</title>
</head>
<body>
    
<h1>Agenda cita </h1>

<div class="container">
<form action= "?c=citas&a=agendarPac&Id_Usuario=<?= $usuario->getId_Usuario() ?>" method ="post">

<input type="hidden" name="Id_Usuario" value="<?=$usuario->getId_Usuario() ?>">

<table class="table table-hover table-striped"> 
    <thead class="table-dark">
        <tr>
            <td>Documento</td>
            <td>Nombre </td>
            <td>Apellido </td>
            <td>Correo </td>
        </tr>    
    </thead>  

 
   
        <tr>
        <td> <?= $usuario->getDocumento_Identificacion()?> </td>
        <td> <?= $usuario->getNombres_Usuario()?> </td>
        <td> <?= $usuario->getApellidos_Usuario() ?> </td>
        <td> <?= $usuario->getCorreo_Electronico()?> </td> 
                        
        </a>
        

        </td>
    </tr>
   
</table>


<label for="Fecha_Cita"> Fecha: </label>
<br>
<input type="date" name="Fecha_Cita" >
<br>

<label for="Hora_Cita"> Hora: </label>
<br>
<input type="time" name="Hora_Cita" >
<br>

<label for="Id_Sucursal"> sucursal: </label>
<br>
<select  name="Id_Sucursal" class="form-select">
<option>Seleccione Sucursal</option>
<?php foreach($sucursales as $sucursal): ?>
    <option value="<?=$sucursal->getId_Sucursal()?>" <?=$sucursal->getId_Sucursal() == $cita->getId_Sucursal() ? 
    'selected' : ''?> >
     <?=$sucursal->getNombre_Sucursal()?> </option>
    <?php endforeach;?>
</select>
<br>

<label for="Id_Examen"> examenes: </label>
<br>
<select  name="Id_Examen" class="form-select">
<option>Seleccione Tipo de examen</option>
<?php foreach($examenes as $examen): ?>
    <option value="<?=$examen->getId_Examen()?>" <?=$examen->getId_Examen() == $cita->getId_Examen() ? 
    'selected' : ''?> >
     <?=$examen->getNombre_Examen()?> </option>
    <?php endforeach;?>
</select>
<button type="submit"> Guardar</button>
</form>
</div>
</body>
</html>
