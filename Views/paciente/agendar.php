<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       
    <title>Agenda</title>
</head>
<body>
    
<h1>Agenda tu cita </h1>
<div class= "container-fluid">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?c=citas&a=Menu">Inicio</a></li>
        <li class="breadcrumb-item active">Agendar</li>
    </ol>
</nav>
    </div>

    <section class="contact-box">
    <div class="row no-gutters ">

<div class="container">
<form action= "?c=citas&a=agendar" method ="post">
<!--<form action= "?c=citas&a=saveAgendar" method ="post">
-->
<input type="hidden" name="Id_Cita" value="<?=$cita->getId_Cita() ?>">

<input type="hidden" name="Id_Usuario" value="<?=$_SESSION['user']->getId_Usuario() ?>">

<label for="Fecha_Cita"> Fecha: </label>
<br>
<input type="date" name="Fecha_Cita" value="<?=$cita->getFecha_Cita() ?>" >
<br>

<label for="Hora_Cita"> Hora: </label>
<br>
<input type="time" name="Hora_Cita" value="<?=$cita->getHora_Cita() ?>" >
<br>

<label for="Id_Sucursal"> sucursal: </label>
<br>
<div class="col-md-8">
<select  name="Id_Sucursal" class="form-select">
<option>Seleccione Sucursal</option>
<?php foreach($sucursales as $sucursal): ?>
    <option value="<?=$sucursal->getId_Sucursal()?>" <?=$sucursal->getId_Sucursal() == $cita->getId_Sucursal() ? 
    'selected' : ''?> >
     <?=$sucursal->getNombre_Sucursal()?> </option>
    <?php endforeach;?>
</select>
</div>
<br>

<label for="Id_Examen"> examenes: </label>
<br>
<div class="col-md-8">
<select  name="Id_Examen" class="form-select">
<option>Seleccione Tipo de examen</option>
<?php foreach($examenes as $examen): ?>
    <option value="<?=$examen->getId_Examen()?>" <?=$examen->getId_Examen() == $cita->getId_Examen() ? 
    'selected' : ''?> >
     <?=$examen->getNombre_Examen()?> </option>
    <?php endforeach;?>
</select>
</div>
<button type="submit" > Guardar</button>
</form>
</div>
</div>
</section>
</body>
</html>