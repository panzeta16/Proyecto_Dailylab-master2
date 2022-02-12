<?php

class Sucursal_Examen
{
    private ?int $Id_Sucursal=null;
    private ?int $Id_Examen=null;

    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect(); 

    }

    //metodos 
    public function list()
    {
        try{
            $query = $this->connection->prepare("SELECT * FROM sucursal_examen");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function insert()
    {
        try{
        $query = "INSERT INTO sucursal_examen (Id_Sucursal,Id_Examen) VALUES (?,?);";
        $this -> connection-> prepare($query)
                            ->execute(array(
                                $this->Id_Sucursal,
                                $this->Id_Examen
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
            $query = "UPDATE sucursal_examen SET
                            Id_Sucursal = ?,
                            Id_Examen = ? 
                            WHERE Id_Sucursal = ?;";
            $this->connection->prepare($query)
                            ->execute(array(
                                $this->getId_Sucursal(),
                                $this->getId_Examen()
 
                            ));
            return $this;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getById($Id_Sucursal){
        try{
        $query= "SELECT * FROM sucursal_examen where Id_Sucursal=?;";
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
            $query= "DELETE FROM sucursal_examen WHERE Id_Sucursal=?;";
            $this-> connection->prepare($query)
                            ->execute(array($this->Id_Sucursal));
        }catch(Excepcion $e){
            die($e->getMessage());

        }
    }
    //getters y setters 
 
    public function getId_Sucursal()
    {
        return $this->Id_Sucursal;
    }

    public function setId_Sucursal($Id_Sucursal)
    {
        $this->Id_Sucursal = $Id_Sucursal;

        return $this;
    }

    public function getId_Examen()
    {
        return $this->Id_Examen;
    }

    public function setId_Examen($Id_Examen)
    {
        $this->Id_Examen = $Id_Examen;

        return $this;
    }
} 


