<?php
require_once "models/brand.php";

class SucursalController
{
    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new Sucursal();
    }

    public function index()
    {
        $sucursales = $this->model->list();
        require "Views/paciente/header.php";
        require "Views/footer.php";
    }
/*
    public function form2(){
        $sucursal = new Sucursal();
        if(isset($_GET['Id_Sucursal'])){
            $sucursal = $sucursal->getById($_GET['Id_Sucursal']); 
        }
        require "Views/paciente/header.php";
        require "Views/footer.php";
    }


    public function save() {
        $brand = new Brand();
        $id = intval($_POST['id']);
        if($id){
            $brand = $brand->getById($id);
        }
        
        $brand->setName($_POST['name']);
        $brand->setDescription($_POST['description']);
       
        $id?$brand->update(): $brand->insert();
       // $id ? $description->update() : $brand->insert();

       // var_dump($product->insert());
        header('location:?c=brand');
    }

    public function delete(){
        $brand = new Brand();
        $brand=$brand->getById($_GET['id']);
        $brand->delete();
       header('location:?c=brand');
    }*/
}