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
        <li class="breadcrumb-item"><a href="?c=citas&a=TomasEnf">Inicio</a></li>
        <li class="breadcrumb-item active"><a href="c=citas&a=resulEnf">Resultados</a>Resultados</li>
        <li class="breadcrumb-item active">Subir resultados</li>
        
    </ol>
</nav>
    </div>
    <title>Subir resultado</title>
</head>

<body>

    <h1>Subir resultado </h1>

    <div class="container">
        <form action="?c=citas&a=guardarResult&Id_Usuario=<?= $usuario->getId_Usuario()?>&Id_Cita=<?= $cita = $_GET['Id_Cita'] ?>" method="post">

            <input type="" name="Id_Usuario" value="<?= $usuario->getId_Usuario() ?>">
            <input type="" name="Id_Cita" value="<?= $cita = $_GET['Id_Cita'] ?>">
       
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <td>Documento</td>
                        <td>Nombre </td>
                        <td>Apellido </td>
                        <td>Examen </td>
                        <td>Tipo muestra </td>
                        <td>Referencia </td>
                        <td>Id_Cita </td>
                        <td>Fecha </td>
                    </tr>
                </thead>



                <tr>
                    <td> <?= $usuario->getDocumento_Identificacion() ?> </td>
                    <td> <?= $usuario->getNombres_Usuario() ?> </td>
                    <td> <?= $usuario->getApellidos_Usuario() ?> </td>
                    <!-- <td> <?//= $examen->getById($muestra_examen->getId_Examen())-> getNombre_Examen() ?> </td> -->
                    <?php
                    try {
                        foreach ($cital as $cita) : ?>

                            <td> <?= $examen->getById($cita->getId_Examen())->getNombre_Examen() ?> </td>
                    <?php endforeach;
                    } catch (Exception $e) {
                        die($e->getMessage());
                        die("No se pudo listar");
                    }
                    ?>

                    <td>Tipo muestra </td>
                    <td>Referencia </td>
                    <td>id_Cita </td>
                    <td>Fecha </td>
                    </a>


                    </td>
                </tr>

            </table>

            <label class="izq" for="URL_Resultado">Ingresa el link de resultado</label>
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input name="URL_Resultado" type="link" placeholder="Usuario" />
            </div>
            <button type="submit"> Guardar</button>
            <br>
            <a id="sign-up-btn" href="?c=usuario&a=recuperarPass">
                <br> Reportar <br>Problema
            </a>


        </form>
    </div>
</body>

</html>