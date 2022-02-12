<?php

class Localidad
{
    private ?int $Id_Localidad=null;
    private ?string $Nombre_Localidad=null; 
    private ?int $Id_Ciudad=null;

    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect(); 

    }

//metodos 
public function list()
{
    try{
        $query = $this->connection->prepare("SELECT * FROM localidad");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
    }catch (Exception $e){
        die ($e->getMessage());
    }
}

public function insert()
{
    try{
    $query = "INSERT INTO localidad (Nombre_Localidad,Id_Ciudad) VALUES (?,?);";
    $this -> connection-> prepare($query)
                        ->execute(array(
                            $this->Nombre_Localidad,
                            $this->Id_Ciudad
                        ));
                        $this->Id_Localidad=$this->connection->lastInsertId();//revisar esta linea el id
                        return $this;
                    }catch(Exception $e){
                        die($e->getMessage());
                    }
                        
}

public function update()
{
    try{
        $query = "UPDATE localidad SET
                        Nombre_Localidad = ?,
                        Id_Ciudad = ? 
                        WHERE Id_Localidad = ?;";
        $this->connection->prepare($query)
                        ->execute(array(
                            $this->getNombre_Localidad(),
                            $this->getId_Ciudad(),
                            $this->getId_Localidad()

                        ));
        return $this;
    }catch(Exception $e){
        die($e->getMessage());
    }
}

public function getById($Id_Localidad){
    try{
    $query= "SELECT * FROM localidad where Id_Localidad=?;";
    $query= $this-> connection-> prepare($query);
    $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
    $query->execute(array($Id_Localidad));
    return $query->fetch();

}catch(Exception $e){
    die($e->getMessage());
    }
}
public function delete(){
    try{
        $query= "DELETE FROM localidad WHERE Id_Localidad=?;";
        $this-> connection->prepare($query)
                        ->execute(array($this->Id_Localidad));
    }catch(Excepcion $e){
        die($e->getMessage());

    }
}
//getters y setters
    public function getId_Localidad()
    {
        return $this->Id_Localidad;
    }

    public function setId_Localidad($Id_Localidad)
    {
        $this->Id_Localidad = $Id_Localidad;

        return $this;
    }

    
    public function getNombre_Localidad()
    {
        return $this->Nombre_Localidad;
    }

    public function setNombre_Localidad($Nombre_Localidad)
    {
        $this->Nombre_Localidad = $Nombre_Localidad;

        return $this;
    }


    public function getId_Ciudad()
    {
        return $this->Id_Ciudad;
    }

    public function setId_Ciudad($Id_Ciudad)
    {
        $this->Id_Ciudad = $Id_Ciudad;

        return $this;
    }
}