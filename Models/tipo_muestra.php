<?php

class Tipo_Muestra
{
    private ?int $Id_T_Muestra=null;
    private ?int $Nombre_T_Muestra=null;

    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect(); 

    }
    //metodos 
    public function list()
    {
        try{
            $query = $this->connection->prepare("SELECT * FROM tipo_muestra");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function insert()
    {
        try{
        $query = "INSERT INTO tipo_muestra (Nombre_T_Muestra) VALUES (?);";
        $this -> connection-> prepare($query)
                            ->execute(array(
                                $this->Nombre_T_Muestra
                            ));
                            $this->Id_T_Muestra=$this->connection->lastInsertId();
                            return $this;
                        }catch(Exception $e){
                            die($e->getMessage());
                        }
                            
    }

    public function update()
    {
        try{
            $query = "UPDATE tipo_muestra SET
                            Nombre_T_Muestra = ?
                            WHERE Id_T_Muestra = ?;";
            $this->connection->prepare($query)
                            ->execute(array(
                                $this->getNombre_T_Muestra(),
                                $this->getId_T_Muestra()
 
                            ));
            return $this;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getById($Id_T_Muestra){
        try{
        $query= "SELECT * FROM tipo_muestra where Id_T_Muestra=?;";
        $query= $this-> connection-> prepare($query);
        $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $query->execute(array($Id_T_Muestra));
        return $query->fetch();


    }catch(Exception $e){
        die($e->getMessage());
        }
    }
    public function delete(){
        try{
            $query= "DELETE FROM tipo_muestra WHERE Id_T_Muestra=?;";
            $this-> connection->prepare($query)
                            ->execute(array($this->Id_T_Muestra));
        }catch(Exception $e){
            die($e->getMessage());

        }
    }
    //getters y setters 

    public function getId_T_Muestra()
    {
        return $this->Id_T_Muestra;
    }

    public function setId_T_Muestra($Id_T_Muestra)
    {
        $this->Id_T_Muestra = $Id_T_Muestra;

        return $this;
    }

    public function getNombre_T_Muestra()
    {
        return $this->Nombre_T_Muestra;
    }

    public function setNombre_T_Muestra($Nombre_T_Muestra)
    {
        $this->Nombre_T_Muestra = $Nombre_T_Muestra;

        return $this;
    }
}