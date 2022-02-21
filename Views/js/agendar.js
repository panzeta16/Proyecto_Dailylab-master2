var fecha = document.getElementById('fecha');
var hora = document.getElementById('hora');
var sucursal =document.getElementById('sucursal');
var examenes =document.getElementById('examenes');

var error =document.getElementById('error');
error.style.color ='red';

       





function enviarFormulario() {



       
           var mensajesError = [];
       
         
           if (fecha.value === null  || fecha.value === '' ){
               mensajesError.push('Ingresa tu fecha')
               error.innerHTML= mensajesError.join(' ')
               return false;  
                 
           }
           
       
           if (hora.value === null  || hora.value === '' ){
               mensajesError.push('Confirma tu hora')
               error.innerHTML= mensajesError.join(' ')
               return false;  
                 
           }
           if (sucursal.value === null  || sucursal.value === '' ){
            mensajesError.push('elige sucursal')
            error.innerHTML= mensajesError.join(' ')
            return false;  
              
        }
        if (examenes.value === null  || examenes.value === '' ){
            mensajesError.push('elige tu examen')
            error.innerHTML= mensajesError.join(' ')
            return false;  
              
        }
           
       else {
           console.log('Enviando formulario...');
       }
           
       }
