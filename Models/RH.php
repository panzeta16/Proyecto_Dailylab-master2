<?php

class RH
{
    private ?int $Id_RH=null;
    private ?string $Tipo_RH=null;

    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect(); 

    }

    //metodos 
    public function list()
    {
        try{
            $query = $this->connection->prepare("SELECT * FROM RH");
            $query->execute();
           return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function insert()
    {
        try{
        $query = "INSERT INTO RH (Id_RH,Tipo_RH) VALUES (?,?);";
        $this -> connection-> prepare($query)
                            ->execute(array(
                                $this->Tipo_RH                   
                            ));
                            $this->Id_RH=$this->connection->lastInsertId();
                            return $this;
                        }catch(Exception $e){
                            die($e->getMessage());
                        }
                            
    }

    public function update()
    {
        try{
            $query = "UPDATE RH SET
                            Tipo_RH = ?
                            WHERE Id_RH = ?;";
            $this->connection->prepare($query)
                            ->execute(array(
                                $this->getTipo_RH(),
                                $this->getId_RH()
 
                            ));
            return $this;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getById($Id_RH){
        try{
        $query= "SELECT * FROM RH where Id_RH=?;";
        $query= $this-> connection-> prepare($query);
        $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $query->execute(array($Id_RH));
        return $query->fetch();


    }catch(Exception $e){
        die($e->getMessage());
        }
    }
    public function delete(){
        try{
            $query= "DELETE FROM RH WHERE Id_RH=?;";
            $this-> connection->prepare($query)
                            ->execute(array($this->Id_RH));
        }catch(Excepcion $e){
            die($e->getMessage());

        }
    }
    //GETTERS Y SETTERS 

    public function getId_RH()
    {
        return $this->Id_RH;
    }

    public function setId_RH($Id_RH)
    {
        $this->Id_RH = $Id_RH;

        return $this;
    }

    public function getTipo_RH()
    {
        return $this->Tipo_RH;
    }
 
    public function setTipo_RH($Tipo_RH)
    {
        $this->Tipo_RH = $Tipo_RH;

        return $this;
    }
}
