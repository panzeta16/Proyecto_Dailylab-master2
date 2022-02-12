<?php

class Barrio
{
    private ?int $Id_Barrio=null;
    private ?string $Nombre_Barrio=null;
    private ?int $Id_Localidad=null;

    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect(); 

    }

    public function list()
    {
        try{
            $query = $this->connection->prepare("SELECT * FROM barrio");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function insert()
    {
        try{
        $query = "INSERT INTO barrio (Nombre_Barrio,Id_Localidad) VALUES (?,?);";
        $this -> connection-> prepare($query)
                            ->execute(array(
                                $this->Nombre_Barrio,
                                $this->Id_Localidad

                            ));
                            $this->Id_Barrio=$this->connection->lastInsertId();
                            return $this;
                        }catch(Exception $e){
                            die($e->getMessage());
                        }
                            
    }

    public function update()
    {
        try{
            $query = "UPDATE barrio SET
                            Nombre_Barrio = ?,
                            Id_Localidad = ? 
                            WHERE Id_Barrio = ?;";
            $this->connection->prepare($query)
                            ->execute(array(
                                $this->getNombre_Barrio(),
                                $this->getId_Localidad(),
                                $this->getId_Barrio ()
                            ));
            return $this;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getById($Id_Barrio){
        try{
        $query= "SELECT * FROM barrio where Id_Barrio=?;";
        $query= $this-> connection-> prepare($query);
        $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $query->execute(array($Id_Barrio));
        return $query->fetch();

    }catch(Exception $e){
        die($e->getMessage());
        }
    }
    public function delete(){
        try{
            $query= "DELETE FROM barrio WHERE Id_Barrio=?;";
            $this-> connection->prepare($query)
                            ->execute(array($this->Id_Barrio));
        }catch(Excepcion $e){
            die($e->getMessage());

        }
    }
    //getters y setters 

    public function getId_Barrio()
    {
        return $this->Id_Barrio;
    }

    public function setId_Barrio($Id_Barrio)
    {
        $this->Id_Barrio = $Id_Barrio;

        return $this;
    }


    public function getNombre_Barrio()
    {
        return $this->Nombre_Barrio;
    }

 
    public function setNombre_Barrio($Nombre_Barrio)
    {
        $this->Nombre_Barrio = $Nombre_Barrio;

        return $this;
    }


    public function getId_Localidad()
    {
        return $this->Id_Localidad;
    }


    public function setId_Localidad($Id_Localidad)
    {
        $this->Id_Localidad = $Id_Localidad;

        return $this;
    }
}