<?php
//front controller 
require_once "Models/conexion/Conexion.php";
require_once "Models/usuario.php";
session_start();

//if(isset($_SESSION['user']) || (isset($_POST['Correo_Electronico']) && isset($_POST['Contrasena_Usuario']))){ //esto valida que se necesite una sesion iniciada o hacer login para usar cualquier metodo 
if (!isset($_GET['c'])) { //home controller es donde esta la landing page  
    require_once 'Controllers/home.controller.php';
    $controller = new HomeController();
    call_user_func(array($controller, "index"));
} else {
    $controller = $_GET['c'];
    require_once "Controllers/$controller.controller.php";
    $controller = ucwords($controller) . "Controller";
    $controller = new $controller;
    $action = isset($_GET['a']) ? $_GET['a'] : 'index'; //operador ternario
    call_user_func(array($controller, $action));
}
/*}else { // si no se cumple la condicion reenvia al login 
    require_once 'Controllers/home.controller.php';// lo cambie porque al abrirlo se esta llendo por este condicional y no va al home 
    $controller = new HomeController();
    call_user_func(array($controller, "index"));
}*/
/*}else { // si no se cumple la condicion reenvia al login 
    require_once 'controllers/usuario.controller.php';
    $controller= new UsuarioController();
    call_user_func(array($controller, "login")); 
}*/