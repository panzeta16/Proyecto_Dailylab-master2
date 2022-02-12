<?php

class Rol
{
    private ?int $Id_Rol=null;
    private ?string $Nombre_Rol=null;

   
    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect(); 

    }
//metodos
public function list()
{
    try{
        $query = $this->connection->prepare("SELECT * FROM rol");
        $query->execute();
       return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de rol y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
    }catch (Exception $e){
        die ($e->getMessage());
    }
}

public function insert()
{
    try{
    $query = "INSERT INTO rol (Nombre_Rol) VALUES (?);";
    $this -> connection-> prepare($query)
                        ->execute(array(
                            $this->Nombre_Rol
                        ));
                        $this->Id_Rol=$this->connection->lastInsertId();
                        return $this;
                    }catch(Exception $e){
                        die($e->getMessage());
                    }
                        
}


public function update()
{
    try{
        $query = "UPDATE rol SET
                        Nombre_Rol = ?
                        WHERE Id_Rol = ?;";
        $this->connection->prepare($query)
                        ->execute(array(
                            $this->getNombre_Rol(),
                            $this->getId_Rol()

                        ));
        return $this;
    }catch(Exception $e){
        die($e->getMessage());
    }
}

public function getById($Id_Rol){
    try{
    $query= "SELECT * FROM rol where Id_Rol=?;";
    $query= $this-> connection-> prepare($query);
    $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
    $query->execute(array($Id_Rol));
    return $query->fetch();

}catch(Exception $e){
    die($e->getMessage());
    }
}
public function delete(){
    try{
        $query= "DELETE FROM rol WHERE Id_Rol=?;";
        $this-> connection->prepare($query)
                        ->execute(array($this->Id_Rol));
    }catch(Exception $e){
        die($e->getMessage());

    }
}
    /**
     * Get the value of Id_Rol
     */ 
    public function getId_Rol()
    {
        return $this->Id_Rol;
    }

    /**
     * Set the value of Id_Rol
     *
     * @return  self
     */ 
    public function setId_Rol($Id_Rol)
    {
        $this->Id_Rol = $Id_Rol;

        return $this;
    }

    /**
     * Get the value of Nombre_Rol
     */ 
    public function getNombre_Rol()
    {
        return $this->Nombre_Rol;
    }

    /**
     * Set the value of Nombre_Rol
     *
     * @return  self
     */ 
    public function setNombre_Rol($Nombre_Rol)
    {
        $this->Nombre_Rol = $Nombre_Rol;

        return $this;
    }

}