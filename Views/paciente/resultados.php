<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- esto va en cada tabla-->
    <link rel="stylesheet" href="Views/css/tablas.css">
<link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
<script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
<!-- esto va en cada tabla-->
    <h1>Mis Resultados </h1>
    
    <div class= "container-fluid">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?c=citas&a=Menu">Inicio</a></li>
        <li class="breadcrumb-item active">Resultados</li>
    </ol>
</nav>
    </div>
    <title>Mis citas</title>
</head>

<body>



    <br>
    <div class="container">

    </div>
    <br>
    <div  class="contact-box">
        <br>
        <table class="table table-hover table-striped" id="tabla" class="display">
            <thead class="cabecera" >
                <tr >
                <td>Id_Muestra 
                <div class="float-right"> <i class="fas fa-arrow-up"></i> 
            <i class="fas fa-arrow-down"></i>
</div>
                    </td>
                    <td>Id_Examen </td>
                    <td  >URL </td>
                    <td>Estado </td>

                </tr>
            </thead>

            <?php
            try {
                foreach ($muestra_examen as $mye) : ?>

                    <tr>
                        <td> <?= $muestra->getById($mye->getId_Muestra())->getReferencia() ?> </td>
                        <td> <?= $examen->getById($mye->getId_Examen())->getNombre_Examen() ?> </td>
                        <td> <a href="URL"> <?= $mye->getURL_Resultado() ?> </a></td>
                        <td> <?= $mye->getEstado() ?> </td>

                        </td>
                    </tr>
            <?php endforeach;
            } catch (Exception $e) {
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