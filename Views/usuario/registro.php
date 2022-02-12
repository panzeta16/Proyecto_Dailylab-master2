<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="Views\css\loginyregistro.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<div class="home">
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <!--<form action="?c=usuario&a=validate" method="post"> -->

        <form action="?c=usuario&a=save" id="registro" method="post">
        <a class="boton" id="sign-up-btn" href="?c=usuario&a=login2">
              Inicia sesion
            </a>
          <h2 class="title"><b>Registrate</b></h2>

          <label class="guia" for="Nombres_Usuario"><b>Nombre*</b></label>
          <div class="input-field">

            <i class="fas fa-user"></i>
            <input name="Nombres_Usuario" id='Nombres_Usuario' type="text" maxlength="25" oninput="maxlengthNumber(this);"required />
          </div>

          <label class="guia" for="Apellidos_Usuario"><b>Apellido*</b></label>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input name="Apellidos_Usuario" id='Apellidos_Usuario' type="text" maxlength="25"  oninput="maxlengthNumber(this);" required />
          </div>

          <label class="guia" for="Documento_Identificacion"><b>Documento*</b></label>
          <div class="input-field">
            <i class="fas fa-id-card-alt"></i>
            <input name="Documento_Identificacion" id='Documento_Identificacion' type="number" maxlength="10" oninput="maxlengthNumber(this);" required />
          </div>


          <label class="guia" for="Telefono_Usuario"><b>Telefono*</b></label>
          <div class="input-field">
            <i class="fas fa-phone-alt"></i>
            <input name="Telefono_Usuario" id='Telefono_Usuario' type="number" maxlength="10" oninput="maxlengthNumber(this);" required />
          </div>
          <br>
          <div id="msg"></div>
          <br>

          <h8><b>*</b>Si eres empleado o enfermer@ por favor digita el codigo de tu area
            <br>
            de lo contrario, no llenes este espacio
          </h8>
          <br>
          <label class="guia" for="Id_Area"><b>Id Area</b></label>
          <div class="input-field">
            <i class="far fa-address-card"></i>
            <input name="Id_Area" id='Id_Area' type="number" maxlength="4" oninput="maxlengthNumber(this);" required />
          </div>
          <br>
          <script>
            function maxlengthNumber(obj) {
              if (obj.value.length > obj.maxLength) {
                obj.value = obj.value.slice(0, obj.maxLength);
              }
            }
          </script>
          <label class="guia" for="Id_RH"><b>Selecciona tu RH*</b></label>
          <div class="col-md-8">
            <select name="Id_RH" id="Id_RH" class="selectpicker show-tick">
              <option>Seleccione RH</option>
              <?php foreach ($RH as $RHS) : ?>
                <option value="<?= $RHS->getId_RH() ?>" <?= $RHS->getId_RH() == $usuario->getId_RH() ?
                                                          'selected' : '' ?>>
                  <?= $RHS->getTipo_RH() ?> </option>
              <?php endforeach; ?>
            </select>
          </div>
          <br>
          <label class="guia" for="Correo_Electronico"><b>Correo*</b></label>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input name="Correo_Electronico" id="Correo_Electronico" type="email" maxlength="40" oninput="maxlengthNumber(this);" required />
          </div>

          <label class="guia" for="Correo_Electronico2"><b>Confirma tu correo*</b></label>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input id="Correo_Electronico2" type="email" maxlength="40" oninput="maxlengthNumber(this);" required />
          </div>
          <label class="guia" for="Contrasena_Usuario">Contraseña* </label>
          <section class="social-media">
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="Contrasena_Usuario" type="password" id="Contrasena_Usuario" placeholder="contrasena" maxlength="11" oninput="maxlengthNumber(this);" required />

            </div>
            <div class="seña"> 

<i  onclick="mostrar()" value="ver" class="fas fa-low-vision" ></i>


</div>
</section>

          <label class="guia" for="Contrasena_Usuario2">Confirme Contraseña* </label>
          <section class="social-media">
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="Contrasena_Usuario2" id="Contrasena_Usuario2" placeholder="contrasenaConfirm" maxlength="11" oninput="maxlengthNumber(this);" required> </input>

            </div>

            <div class="seña"> 

          <i  onclick="mostrar2()" value="ver" class="fas fa-low-vision" ></i>


          </div>
          </section>
          
<!-- con esto se ve el ojito de la contraseña -->
          <script  type="text/javascript">
            function mostrar2(){
    var tipo = document.getElementById("Contrasena_Usuario2");

    if( tipo.type== 'password'){
        tipo.type='text';
    } else{
        tipo.type ='password';


    }
  }

    function mostrar(){
    var tipo = document.getElementById("Contrasena_Usuario");

    if( tipo.type== 'password'){
        tipo.type='text';
    } else{
        tipo.type ='password';


    }


}
</script>



          <br>
          <label><input type="checkbox" id="Terminos" value="first_checkbox" required /> Acepto terminos y condiciones</label><br>
          <input type="submit" onclick='return enviarFormulario();' id="login" class="btn solid" />
          <div id="error"></div>
          <script src='Views/js/registro.js'></script>
          <p class="social-text">Siguenos en nuestras redes sociales</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3> ¿Ya tienes una cuenta?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <a class="boton" id="sign-up-btn" href="./index.php?c=usuario&a=login">
              Inicia sesion
            </a>
          </div>
          <img src="Views/multimedia/logo.png" class="image" alt="" />
        </div>
      </div>
    </div>
    </form>