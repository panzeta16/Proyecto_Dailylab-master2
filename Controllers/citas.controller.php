<?php

require_once "Models/cita.php";
require_once "Models/usuario.php"; //
require_once "Models/sucursal.php";
require_once "Models/RH.php";
require_once "Models/examen.php";
require_once "Models/muestra.examen.php";
require_once "Models/muestra.php";
require_once "Models/tipo_muestra.php";


class CitasController
{
  private $model;

  function __CONSTRUCT()
  {
    $this->model = new Cita();
  }

  function index() // este es el index que ve el paciente
  {

    require "Views/paciente/header.php";
    require "Views/paciente/indexPac.php";
    require "Views/footer.php";
  }

  function resulEnf()
  {
    error_reporting(E_ALL);
    ini_set('display_errors', 1); //con estas 2 lineas se supone que reporta los errores o warnings que encuentre y avisa, hay que ponerlas al inicio de los codigos 

    $cita = new Cita(); //?
    $cital = $this->model->listAnalisis(); //lista de los que les tiene que subir resultado

    $sucursal = new Sucursal();
    $usuario = new Usuario(); //
    $RH = new RH();
    $examen = new Examen();

    require "Views/Enfermero/header.php";
    require "Views/Enfermero/menu.php";
    require "Views/footer.php";
  }

  function subirResult()
  {
    $cita = new Cita();
   // $cital = $this->model->listAsist();
   $Id_Cita= $_GET['Id_Cita'];
    $cital = $this->model->list1($Id_Cita);
    $muestra_examen = new Muestra_Examen();
    $muestra_examen->list();
    $muestra = new Muestra();
    $usuario = new Usuario();
    $usuario->list();

    //
    $sucursal = new Sucursal();
    $sucursales = $sucursal->list();
    $examen = new Examen();
    $examen->list();
    if (isset($_GET['Id_Usuario'])) {
      $usuario = $usuario->getById($_GET['Id_Usuario']);
    }
    ///////////////////
    //primero llenamos la tabla muestra para ahi si llenar muestra_examen
    $referencia=mt_rand(1,10000000);
   /* echo $passAlea ;
    var_dump($passAlea);*/ //para ver que # esta sacando
    echo "<script>alert($Id_Cita);</script>";
   
    $muestra->setReferencia($referencia);
    $muestra->setId_Cita($_GET['Id_Cita']);
    $muestra->insert();
    echo "<script>alert('ya se lleno muestra');</script>";
    /////////////////////////
    require "Views/Enfermero/header.php";
    require "Views/Enfermero/subirResult.php";
    require "Views/footer.php";
  }

  function guardarResult()
  {
    $cita = new Cita(); 
    $muestra_examen= new Muestra_Examen();
    $muestra= new Muestra();

    $Id_Cita=$_GET['Id_Cita'];
    $Id_Muestra= $muestra_examen->list2($Id_Cita);
    $Id_Examen= $muestra_examen->list3($Id_Cita);
    //echo "<script>alert('ID MUESTRA ES'+(int)$Id_Muestra+' y ID EXAMEN ES'+(int)$Id_Examen)';</script>";
    
    $muestra_examen->setURL_Resultado($_POST['URL_Resultado']);
    $muestra_examen->setId_Muestra((int)$Id_Muestra);
    $muestra_examen->setEstado(1);
    $muestra_examen->setId_Examen((int)$Id_Examen);
    $muestra_examen->setId_Usuario($_GET['Id_Usuario']);
    $muestra_examen->insert();
    echo "<script>alert('ya se inserto el url');</script>";
    header("location:?c=citas&a=resulEnf");

  }

  function TomasEnf() // lista de las citas de hoy que ve la enfermera
  {
    $cita = new Cita(); //?
    $citas = $this->model->list(); //lista de los que les tiene que tomar muestra hoy

    $sucursal = new Sucursal();
    $usuario = new Usuario(); //
    $RH = new RH();
    $examen = new Examen();

    require "Views/Enfermero/header.php";
    require "Views/Enfermero/tomasEnf.php";
    require "Views/footer.php";
  }

  function Menu() // este es el menu de citas que ve el paciente
  {
    $cita = new Cita(); //?
    $cital = $this->model->listUnic(); //objet de tipo list

    $sucursal = new Sucursal();
    $usuario = new Usuario(); //
    $RH = new RH();
    $examen = new Examen();
    //  $Id_Usuario=$_SESSION['user']->getId_Usuario();//prueba

    require "Views/paciente/header.php";
    require "Views/paciente/menu.php";
    require "Views/footer.php";
  }


  function index2() // // este es el index que ve el empleado
  {
    $cita = new Cita(); //?
    $citas = $this->model->list(); //objet de tipo list

    $sucursal = new Sucursal();
    $usuario = new Usuario(); //
    $RH = new RH();
    $examen = new Examen();

    require "Views/empleado/header.php";
    require "Views/empleado/listCitas.php";
    require "Views/footer.php";
  }

  function viewHistorial()
  {
    $cita = new Cita();
    $citas = $this->model->listHistorial();
    $sucursal = new Sucursal();
    $sucursales = $sucursal->list();
    $examen = new Examen();
    $examenes = $examen->list();
    $usuario = new Usuario();
    $usuarios = $usuario->list();

    require "Views/empleado/header.php";
    require "Views/empleado/viewHistorial.php";
    require "Views/footer.php";
  }

  function viewHistRolPac()
  { //esta es la vista del historial que se ve en rol paciente
    $cita = new Cita();
    $sucursal = new Sucursal();
    $sucursales = $sucursal->list();
    $examen = new Examen();
    $examenes = $examen->list();
    $usuario = new Usuario();
    $usuarios = $usuario->list();
    $Id_Usuario = $_SESSION['user']->getId_Usuario(); //prueba

    if (isset($_GET['Id_Usuario'])) {
      $citas = $cita->listHistorialPac($_GET['Id_Usuario']);
    }
    require "Views/paciente/header.php";
    require "Views/paciente/historial.php";
    require "Views/footer.php";
  }
  function viewHistorialPac()
  {
    $cita = new Cita();
    $sucursal = new Sucursal();
    $sucursales = $sucursal->list();
    $examen = new Examen();
    $examenes = $examen->list();
    $usuario = new Usuario();
    $usuarios = $usuario->list();
    if (isset($_GET['Id_Usuario'])) {
      $citas = $cita->listHistorialPac($_GET['Id_Usuario']);
    }
    require "Views/empleado/header.php";
    require "Views/empleado/viewHistorialPac.php";
    require "Views/footer.php";
  }



  public function viewAgendar()
  { //vista de agendar que ve paciente
    $cita = new Cita();
    $sucursal = new Sucursal();
    $sucursales = $sucursal->list();
    $examen = new Examen();
    $examenes = $examen->list();
    $usuario = new Usuario();
    if (isset($_GET['Id_Cita'])) {
      $cita = $cita->getById($_GET['Id_Cita']);
    }
    require "Views/paciente/header.php";
    require "Views/paciente/agendar.php";
    require "Views/footer.php";
  }

  public function viewAgendarPac()
  {
    $cita = new Cita();
    $sucursal = new Sucursal();
    $sucursales = $sucursal->list();
    $examen = new Examen();
    $examenes = $examen->list();
    $usuario = new Usuario();
    $usuarios = $usuario->list();
    if (isset($_GET['Id_Usuario'])) {
      $usuario = $usuario->getById($_GET['Id_Usuario']);
    } else {
      echo "<script>alert('No se encontro id')";
    }
    require "Views/empleado/header.php";
    require "Views/empleado/agendarPac.php";
    require "Views/footer.php";
  }

  /*public function saveAgendar(){ //revisal aqui, hay un error y nose a que corresppnde esto
    $cita = new Cita();
      /*  $Id_Cita = intval($_POST['Id_Cita']);
        if($Id_Cita){
            $cita = $cita->getById($Id_Cita);
        }*/

  /*        $cita->setFecha_Cita($_POST['Fecha_Cita']);
        $cita->setHora_Cita($_POST['Hora_Cita']);
        $cita->setEstado_Cita($_POST['Estado_Cita']);
        $cita->setId_Sucursal($_POST['Id_Sucursal']);
        $cita->setId_Examen($_POST['Id_Examen']);

        $cita->insert();

       // var_dump($product->insert());
        header('location:?c=citas');
}*/

  function agendar() //del metodo save
  {

    $cita = new Cita();
    /*$Id_Cita = intval($_POST['Id_Cita']);
    if($Id_Cita)
    {
        $cita= $cita->getById($Id_Cita);
    }  */

    $cita->setFecha_Cita($_POST['Fecha_Cita']);
    $cita->setHora_Cita($_POST['Hora_Cita']);
    $cita->setEstado_Cita(1);
    $cita->setId_Sucursal($_POST['Id_Sucursal']);
    $cita->setId_Examen($_POST['Id_Examen']);
    $cita->setId_Usuario($_SESSION['user']->getId_Usuario());

    $cita->agendarUnic();

    header("location:?c=citas");
  }

  function agendarPac() //proviene del metodo save
  {

    $Id_Examen = $_POST['Id_Examen'];
    $Id_Usuario = $_GET['Id_Usuario'];
    $Fecha_Cita = $_POST['Fecha_Cita'];

    $hoy = date("d/m/Y");

    if ($this->model->dupliCitas($Id_Examen, $_GET['Id_Usuario'])) //esto evita que se pidan 2 citas de la misma especialidad si 1 de ella no se ha vencido todavia 
    {

      header('location:?c=usuario&a=registroPac');

      die("ya existe esta cita");
      echo "ya existe esta cita";
      echo "<script>alert('ya existe esta cita');</script>";

      /*   esto no funcinoa, siempre se va por este condicional aunque este bien    
}else{ //evita que se pidan citas anteriores a hoy
  if($Fecha_Cita < $hoy){
    echo "<script>alert('elige una fecha mayor al dia de hoy')
console.log('elige una fecha mayor al dia de hoy');</script>";
    header('location:?c=citas&a=viewAgendarPac2');
    die("elige una fecha mayor al dia de hoy"); 
    echo "elige una fecha mayor al dia de hoy";
    */
    } else {
      /*  if($Fecha_Cita >= $hoy){*/
      $cita = new Cita();
      $usuario = new Usuario();

      $Id_Usuario = intval($_POST['Id_Usuario']);
      if ($Id_Usuario) {
        $usuario = $usuario->getById($Id_Usuario);
      }


      $cita->setFecha_Cita($_POST['Fecha_Cita']);
      $cita->setHora_Cita($_POST['Hora_Cita']);
      $cita->setEstado_Cita(1);
      $cita->setId_Sucursal($_POST['Id_Sucursal']);
      $cita->setId_Examen($_POST['Id_Examen']);
      $cita->setId_Usuario($Id_Usuario);
      $cita->agendarUnicPac();

      header("location:?c=citas&a=index2");
    }
  }
  //}
  //}

  public function deleteCita()
  {
    $cita = new Cita();
    $cita = $cita->getById($_GET['Id_Cita']);
    $cita->deleteCita();
    header('location:?c=citas');
  }

  function resultados() // arreglar, no sirve
  {
    $cita = new Cita(); //?
    $cital = $this->model->listUnic(); //esta linea no sirve, este mal

    $sucursal = new Sucursal();
    $usuario = new Usuario(); //
    $RH = new RH();
    $examen = new Examen();
    $Id_Usuario = $_SESSION['user']->getId_Usuario(); //prueba

    require "Views/paciente/header.php";
    require "Views/paciente/menu.php";
    require "Views/footer.php";

    /*  
    $muestra_examen = new Muestra_Examen(); //?
    $muestra_examen->listResult()();
  //  $muestra_examen = $this->model->listResult();//objet de tipo list
    
    $muestra = new Muestra();
    $muestra->list();
    $examen = new Examen();//
    $examen->list();
    $usuario = new Usuario();
    $usuario->list();

    $Id_Usuario=$_SESSION['user']->getId_Usuario();//prueba
    
    require "Views/paciente/header.php";
    require "Views/paciente/resultados.php";
    require "Views/footer.php";
 */
  }
  function changeState()
  {
    /* FUNCION PARA QUE NO CANCELE SI YA PASARON MAS DE 24H ANTES DE LA CITA (EN PROCESO)
    $ahora = time();
    $unDiaEnSegundos = 24 * 60 * 60;
    $ayer = $ahora - $unDiaEnSegundos;
    $ayerLegible = date("Y-m-d", $ayer);
    # ahoraLegible únicamente es para demostrar
    $ahoraLegible = date("Y-m-d", $ahora);
    echo "Hoy es $ahoraLegible y ayer es $ayerLegible";


    $cita = new Cita();
    $Fecha_Cita= $cita->setFecha_Cita($_GET['Fecha_Cita']);
    //$cita->setHora_Cita($_POST['Hora_Cita']);
*/
    $cita = $this->model->getById($_GET['Id_Cita']);
/*      
    if($Fecha_Cita > $ayerLegible){
      echo "<script>alert('La cita debe ser cancelada 24 horas antes')
      console.log('La cita debe ser cancelada 24 horas antes');</script>";
    return false;      
    }else{
      return true;*/
    $cita->updateState();
    //header("Refresh:20");
    header("?c=citas&a=index2");
  //}
  }
  function asistido()
  {

    $cita = $this->model->getById($_GET['Id_Cita']);
    $cita->asistido();
    // header("Refresh:10");
    header("?c=citas&a=TomasEnf");
  }
  function noAsistido()
  {

    $cita = $this->model->getById($_GET['Id_Cita']);
    $cita->noAsistido();
    //header("Refresh"); 
    header("?c=citas&a=TomasEnf");
  }
}
