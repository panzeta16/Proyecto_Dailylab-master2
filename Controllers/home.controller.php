<?php
//este home controller es el controlador del menu cuando ya se ha hecho login 
class HomeController
{
    function index(){
      
    //  require "Views/usuario/login.php";
        require "Views/home/main.php";
     
    }
    function test(){
        var_dump(Database::Connect());
    }
}