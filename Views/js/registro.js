var Nombres_Usuario = document.getElementById('Nombres_Usuario');
var Apellidos_Usuario = document.getElementById('Apellidos_Usuario');
var Telefono_Usuario = document.getElementById('Telefono_Usuario');
var Documento_Identificacion = document.getElementById('Documento_Identificacion');
var Correo_Electronico = document.getElementById('Correo_Electronico');
var Correo_Electronico2 = document.getElementById('Correo_Electronico2');
var Contrasena_Usuario =document.getElementById('Contrasena_Usuario');
var Contrasena_Usuario2 =document.getElementById('Contrasena_Usuario2');
var Id_RH =document.getElementById('Id_RH');

var error =document.getElementById('error');
var mensaje =document.getElementById('mensaje');
var mensaje =document.getElementById('mensaje');
error.style.color ='red';
mensaje.style.color ='red';




       
var mayus = new RegExp("^(?=.*[A-Z])");
var lower = new RegExp("^(?=.*[a-z])");

var numeros = new RegExp("^(?=.*[0-9])");
var special = new RegExp("^(?=.*[!@#$&*])");
var len = new RegExp("^(?=.{13,})");

$("#Contrasena_Usuario").on ("keyup", function(){
    var pass =$("#Contrasena_Usuario").val();

    if(mayus.test(pass)&& special.test(pass)&& numeros.test(pass) && lower.test(pass) && len.test(pass)){

        mensaje.style.color ='green';
        $("#mensaje").text("segura");
    }else{
        $("#mensaje").text("insegura");
    }

});




function enviarFormulario() {


     



            
       

       
       
         
       
       
       
       
       
           
       
           var mensajesError = [];
       
           if (Nombres_Usuario.value === null  || Nombres_Usuario.value === '' ){
               mensajesError.push('Ingresa tu nombre')
               error.innerHTML= mensajesError.join(' ') 
               return false;  
           //esto evita que el form se envie 
           }
           if (Apellidos_Usuario.value === null  || Apellidos_Usuario.value === '' ){
               mensajesError.push('Ingresa tu apellido')
               error.innerHTML= mensajesError.join(' ')
               return false;  
                 
           }
           if (Documento_Identificacion.value === null  || Documento_Identificacion.value === '' ){
               mensajesError.push('Ingresa tu Documento')
               error.innerHTML= mensajesError.join(' ')
               return false;  
                 
           }
           if (Telefono_Usuario.value === null  || Telefono_Usuario.value === '' ){
               mensajesError.push('Ingresa tu Telefono')
               error.innerHTML= mensajesError.join(' ')
               return false;  
                 
           }

           if (Id_RH.value === null  || Id_RH.value === '' ){
            mensajesError.push('Ingresa tu RH')
            error.innerHTML= mensajesError.join(' ')
            return false;  
              
        }
           if (Correo_Electronico.value === null  || Correo_Electronico.value === '' ){
               mensajesError.push('Ingresa tu Correo Electronico')
               error.innerHTML= mensajesError.join(' ')
               return false;  
                 
           }
           if (Correo_Electronico2.value === null  || Correo_Electronico2.value === '' ){
               mensajesError.push('Confirma tu correo electronico')
               error.innerHTML= mensajesError.join(' ')
               return false;  
                 
           }
           if (Contrasena_Usuario.value === null  || Contrasena_Usuario.value === '' ){
               mensajesError.push('Ingresa tu contraseña')
               error.innerHTML= mensajesError.join(' ')
               return false;  
                 
           }
           
       
           if (Contrasena_Usuario2.value === null  || Contrasena_Usuario2.value === '' ){
               mensajesError.push('Confirma tu contraseña')
               error.innerHTML= mensajesError.join(' ')
               return false;  
                 
           }
           if (Contrasena_Usuario2.value !==   Contrasena_Usuario.value){
               mensajesError.push('Las contraseñas no son iguales')
               error.innerHTML= mensajesError.join(' ')
               return false;  
                 
           }
           if (Correo_Electronico2.value !==   Correo_Electronico.value){
               mensajesError.push('Los correos no son iguales')
               error.innerHTML= mensajesError.join(' ')
               return false;  
                 
           }
           
       else {
           console.log('Enviando formulario...');
       }
           
       }




       


