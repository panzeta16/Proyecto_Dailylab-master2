<?php

require_once "Models/cita.php";
require_once "Models/usuario.php";//
require_once "Models/sucursal.php";
require_once "Models/RH.php";
require_once "Models/examen.php";
require_once "Models/muestra.examen.php";
require_once "Models/muestra.php";

class ResultadosController
{
private $model;

function __CONSTRUCT()
{
    $this->model = new Muestra_Examen(); 
}
function resultados()// arreglar
{
    $cita = new Cita(); 
    $muestra_examen = new Muestra_Examen(); //?
    $muestra_examen = $this->model->listResult();//objet de tipo list
    
    $muestra = new Muestra();
    $muestras=$muestra->list();
    $examen = new Examen();//
    $examenes=$examen->list();
    $usuario = new Usuario();
    $usuarios=$usuario->list();

    $Id_Usuario=$_SESSION['user']->getId_Usuario();//prueba
    
    require "Views/paciente/header.php";
    require "Views/paciente/resultados.php";
    require "Views/footer.php";
    

}

}