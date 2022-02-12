<link rel="stylesheet" href="Views\css\loginyregistro.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

<title>Registro de usuarios</title>
</head>

<body>

  <h1>Registro de usuarios </h1>

  <div class= "container-fluid">
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="?c=citas&a=index2">Inicio</a></li>
        <li class="breadcrumb-item active"><b>Registrar Pacientes</b></li>
    </ol>
</nav>
    </div>

  <div class="home">
    <br>

    <div class="containerL">

      <div class="forms-container">
        <div class="signin-signup">

          <!--<form action="?c=usuario&a=validate" method="post"> -->

          <form action="?c=usuario&a=savePac" id="registro" method="post">
            <br>


            <h2 class="title">Registro</h2>
            <br>
            <label class="guia" for="Nombres_Usuario"><b>Nombre*</b></label>
            <div class="input-field">

              <i class="fas fa-user"></i>
              <input name="Nombres_Usuario" id="Nombres_Usuario" type="text" maxlength="25" oninput="maxlengthNumber(this);" required />
            </div>


            <label class="guia" for="Apellidos_Usuario"><b>Apellido*</b></label>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input name="Apellidos_Usuario" id="Apellidos_Usuario" type="text" maxlength="25" oninput="maxlengthNumber(this);" required />
            </div>

            <label class="guia" for=""><b>Documento*</b></label>
            <div class="input-field">
              <i class="fas fa-id-card-alt"></i>
              <input name="Documento_Identificacion" id="Documento_Identificacion" type="number" maxlength="10" oninput="maxlengthNumber(this);" required />
            </div>

            <label class="guia" for=""><b>Telefono*</b></label>
            <div class="input-field">
              <i class="fas fa-phone-alt"></i>
              <input name="Telefono_Usuario" id="Telefono_Usuario" type="number" maxlength="10" oninput="maxlengthNumber(this);" required />
            </div>

            <br>

            <script>
              function maxlengthNumber(obj) {
                if (obj.value.length > obj.maxLength) {
                  obj.value = obj.value.slice(0, obj.maxLength);
                }
              }
            </script>

            <label class="guia" for="Id_RH" id="Id_RH"><b>RH*</b></label>
            <div class="col-md-6">
              <select name="Id_RH" id="Id_RH" class="form-select">
                <option>Seleccione RH</option>
                <?php foreach ($RH as $RHS) : ?>
                  <option value="<?= $RHS->getId_RH() ?>" <?= $RHS->getId_RH() == $usuario->getId_RH() ?
                                                          'selected' : '' ?>>
                    <?= $RHS->getTipo_RH() ?> </option>
                <?php endforeach; ?>
              </select>
            </div>
            <br>
            <label class="guia" for=""><b>Correo*</b></label>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input name="Correo_Electronico" id="Correo_Electronico" type="email" maxlength="40" oninput="maxlengthNumber(this);" required />
            </div>

            <label class="guia" for=""><b>Confirma tu correo*</b></label>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input name="Correo_Electronico2" id="Correo_Electronico2" type="email" maxlength="40" oninput="maxlengthNumber(this);" required />
            </div>
            <input type="submit" onclick='return enviarFormulario();' id="login" class="btn solid" />
          <div id="error"></div>
          <script src='Views/js/registroPac.js'></script>
