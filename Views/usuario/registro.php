<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Views\css\style.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js"></script>
    <script src="views/js/jquery-3.6.0.min.js"></script>
    <script src="views/js/registro.js"></script>
    

    <title>registro</title>
  </head>
  <body>
   <section class="contact-box">
       <div class="row no-gutters bg-dark">
           <div class="col-xl-5 col-lg-10 register-bg">
            <div class="position-absolute testiomonial p-4">
                <img src="Views/multimedia/logo.png" width="450" class="my-4">

            </div>
           </div>
           <div class="col-xl-6 col-lg-10 d-flex">
                <div class="container align-self-center p-9">
                    <h1 class=" text-dark font-weight-bold mb-3">Registrate</h1>
                    <div class="form-group">
                        <button class="btn btn-outline-dark d-inline-block text-light mr-2 mb-3 width-100"><i class="icon ion-logo-google lead align-middle mr-2"></i> Google </button>
                        <button class="btn btn-outline-dark d-inline-block text-light mb-3 width-100"><i class="icon ion-logo-facebook lead align-middle mr-2"></i> Facebook</button>
                    </div>
                    

                    <form action="?c=usuario&a=save" id="registro" method="post" >
                        <div class="form-row mb-2">
                            <div class="form-group col-md-6">
                                <label class=" text-dark font-weight-bold">Nombre <span class="text-danger">*</span></label>
                                <input name="Nombres_Usuario" id='Nombres_Usuario' type="text" maxlength="25" oninput="maxlengthNumber(this);"required  class="form-control" placeholder="Tu nombre">
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" text-dark font-weight-bold">Apellido <span class="text-danger">*</span></label>
                                <input name="Apellidos_Usuario" id='Apellidos_Usuario' type="text" maxlength="25"  oninput="maxlengthNumber(this);" required class="form-control" placeholder="Tu apellido">
                            </div>
                        </div>


                        <div class="form-row mb-2">
                            <div class="form-group col-md-6">
                                <label class=" text-dark font-weight-bold">Docuemento <span class="text-danger">*</span></label>
                                <input name="Documento_Identificacion" id='Documento_Identificacion' type="number" maxlength="10" oninput="maxlengthNumber(this);" required class="form-control" placeholder="Tu Docuemnto">
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" text-dark font-weight-bold">Telefono <span class="text-danger">*</span></label>
                                <input name="Telefono_Usuario" id='Telefono_Usuario' type="number" maxlength="10" oninput="maxlengthNumber(this);" required class="form-control" placeholder="Tu Telefono">
                            </div>
                        </div>


                        <div class="form-row mb-2">
                            <div class=" form-group col-md-6">
                                
                                    <label class=" text-dark form-check-label  ">Si eres empleado o enfermer@ por favor digita el codigo de tu area
                                    
                                    de lo contrario, no llenes este espacio</label>
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" text-dark font-weight-bold">ID empleado <span class="text-danger"></span></label>
                                <input name="Id_Area" id='Id_Area' type="number" maxlength="4" oninput="maxlengthNumber(this);"  class="form-control"  />
                            </div>
                        </div>




                        <div class="form-row mb-2">
                         
                           
                  
                            
                            <div class="form-group col-md-6" class="col-md-12">
                              <select required class="form-control"  name="Id_Rol" id="Id_Rol" class="form-select" aria-label="Default select example">
                                <option required >Seleccione Rol</option>
                                <?php foreach ($roles as $rol) : ?>
                                  <option value="<?= $rol->getId_Rol() ?>" <?= $rol->getId_Rol() == $usuario->getId_Rol() ?
                                                                            'selected' : '' ?>>
                                    <?= $rol->getNombre_Rol() ?> </option>
                                <?php endforeach; ?>
                              </select>
                            </div>

                            
                            <div  class="form-group col-md-6" class="col-md-8">
                              <select required class="form-control" name="Id_RH" id="Id_RH" class="selectpicker show-tick">
                                <option required class="font-weight-bold" >Seleccione RH</option>
                                <?php foreach ($RH as $RHS) : ?>
                                  <option value="<?= $RHS->getId_RH() ?>" <?= $RHS->getId_RH() == $usuario->getId_RH() ?
                                                                          'selected' : '' ?>>
                                    <?= $RHS->getTipo_RH() ?> </option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <br>
                        </div>


                        <div class="form-row mb-2">
                            <div class="form-group col-md-6">
                                <label class=" text-dark font-weight-bold">Correo <span class="text-danger">*</span></label>
                                <input name="Correo_Electronico" id="Correo_Electronico" type="email" maxlength="40" oninput="maxlengthNumber(this);" required class="form-control" placeholder="Tu Correo">
                            </div>
                            <div class="form-group col-md-6">
                                <label class=" text-dark font-weight-bold">Confirma tu Correo <span class="text-danger">*</span></label>
                                <input id="Correo_Electronico2" type="email" maxlength="40" oninput="maxlengthNumber(this);" required class="form-control" placeholder="Confirma tu Correo">
                            </div>
                        </div>



                        <div class="form-row mb-2">

                            <div class="form-group col-md-6">
                                <label class=" text-dark font-weight-bold">Contraseña <span class="text-danger">*</span></label>
                                <input name="Contrasena_Usuario" type="password" id="Contrasena_Usuario"  maxlength="13" oninput="maxlengthNumber(this);" required class="form-control" placeholder="Tu Contraseña">
                                <span  id="mensaje"></span>

                                <div class="seña"> 
                                  <center>
                           <i  onclick="mostrar()" value="ver" class="fas fa-low-vision" ></i>

                           </center>
                               </div>
                                
                            </div>


                          

                           
                                

                            <div class="form-group col-md-6">
                                <label class=" text-dark font-weight-bold">Confirma tu Contraseña <span class="text-danger">*</span></label>
                                <input type="password" name="Contrasena_Usuario2" id="Contrasena_Usuario2" maxlength="13"  oninput="maxlengthNumber(this);" required class="form-control" placeholder="Confirma tu Contraseña">
                                <span id="mensaje"></span>
                            
                                <div class="seña"> 
                               

                                      <i  onclick="mostrar2()" value="ver" class="fas fa-low-vision" ></i>


                                    </div>
                            
                              </div>

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
                        
                        </div>
 
                        <div class="form-group mb-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" required>
                                <label class=" text-dark form-check-label  ">Al seleccionar esta casilla aceptas nuestro aviso de privacidad y los términos y condiciones</label>
                            </div>
                        </div>


                       
                        <input class="btn btn-primary width-100" type="submit" onclick='return enviarFormulario();' id="login" class="btn solid" />
                        <div class="error" id="error"></div>
                        <script src='Views/js/registro.js'></script>

                    </form>
                    <small class="d-inline-block text-dark mt-7">Dailylab| Colombia | © 2022 </small>
                </div>
           </div>
       </div>
   </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>