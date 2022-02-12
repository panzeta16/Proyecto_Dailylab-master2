<?php

class Sucursal 
{
    private ?int $Id_Sucursal=null;
    private ?string $Nombre_Sucursal=null; 
    private ?string $Nomenclatura_Sucursal=null;
    private ?string $Numero_Telefono=null; 
    private ?int $Id_Barrio=null;

    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect(); 

    }

    public function list()
    {
        try{
            $query = $this->connection->prepare("SELECT * FROM sucursal");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function insert()
    {
        try{
        $query = "INSERT INTO sucursal (Nombre_Sucursal,Nomenclatura_Sucursal,Numero_Sucursal,Id_Barrio) VALUES (?,?,?,?);";
        $this -> connection-> prepare($query)
                            ->execute(array(
                                $this->Nombre_Sucursal,
                                $this->Nomenclatura_Sucursal,
                                $this->Numero_Sucursal,
                                $this->Id_Barrio
                            ));
                            $this->Id_Sucursal=$this->connection->lastInsertId();
                            return $this;
                        }catch(Exception $e){
                            die($e->getMessage());
                        }
                            
    }

    public function update()
    {
        try{
            $query = "UPDATE sucursal SET
                            Nombre_Sucursal = ?,
                            Nomenclatura_Sucursal = ? ,
                            Numero_Sucursal = ?,
                            Id_Barrio = ?
                            WHERE Id_Sucursal = ?;";
            $this->connection->prepare($query)
                            ->execute(array(
                                $this->getNombre_Sucursal(),
                                $this->getNomenclatura_Sucursal(),
                                $this->getNumero_Sucursal(),
                                $this->getId_Barrio(),
                                $this->getId_Sucursal()
 
                            ));
            return $this;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getById($Id_Sucursal){
        try{
        $query= "SELECT * FROM sucursal where Id_Sucursal=?;";
        $query= $this-> connection-> prepare($query);
        $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $query->execute(array($Id_Sucursal));
        return $query->fetch();

    }catch(Exception $e){
        die($e->getMessage());
        }
    }
    public function delete(){
        try{
            $query= "DELETE FROM sucursal WHERE Id_Sucursal=?;";
            $this-> connection->prepare($query)
                            ->execute(array($this->Id_Sucursal));
        }catch(Excepcion $e){
            die($e->getMessage());

        }
    }

//getters y settrs 


    public function getId_Sucursal()
    {
        return $this->Id_Sucursal;
    }

    public function setId_Sucursal($Id_Sucursal)
    {
        $this->Id_Sucursal = $Id_Sucursal;

        return $this;
    }

    public function getNombre_Sucursal()
    {
        return $this->Nombre_Sucursal;
    }

    public function setNombre_Sucursal($Nombre_Sucursal)
    {
        $this->Nombre_Sucursal = $Nombre_Sucursal;

        return $this;
    }
    

    public function getNomenclatura_Sucursal()
    {
        return $this->Nomenclatura_Sucursal;
    }

    public function setNomenclatura_Sucursal($Nomenclatura_Sucursal)
    {
        $this->Nomenclatura_Sucursal = $Nomenclatura_Sucursal;

        return $this;
    }
    

    public function getNumero_Telefono()
    {
        return $this->Numero_Telefono;
    }


    public function setNumero_Telefono($Numero_Telefono)
    {
        $this->Numero_Telefono = $Numero_Telefono;

        return $this;
    }
    

    public function getId_Barrio()
    {
        return $this->Id_Barrio;
    }


    public function setId_Barrio($Id_Barrio)
    {
        $this->Id_Barrio = $Id_Barrio;

        return $this;
    }
}