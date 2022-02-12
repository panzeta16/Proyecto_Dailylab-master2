<?php

class Tipo_Novedad
{
    private ?int $Id_T_Novedad=null;
    private ?string $Nombre_T_Novedad=null;


    private $connection;

    public function __CONSTRUCT(){
        $this->connection = Database::Connect(); 

    }

    //metodos 
    public function list()
    {
        try{
            $query = $this->connection->prepare("SELECT * FROM tipo_novedad");
            $query->execute();
           return $query->fetchAll(PDO::FETCH_CLASS,__CLASS__);//con este mapea los registros que vienen de product y los convierte en objeto de tipo podruct y permite usar todos los metodos que estan ahi metidos 
        }catch (Exception $e){
            die ($e->getMessage());
        }
    }

    public function insert()
    {
        try{
        $query = "INSERT INTO tipo_novedad (Nombre_T_Novedad) VALUES (?);";
        $this -> connection-> prepare($query)
                            ->execute(array(
                                $this->Nombre_T_Novedad

                            ));
                            $this->Id_T_Novedad=$this->connection->lastInsertId();
                            return $this;
                        }catch(Exception $e){
                            die($e->getMessage());
                        }
                            
    }

    public function update()
    {
        try{
            $query = "UPDATE tipo_novedad SET
                            Nombre_T_Novedad = ?
                            WHERE Id_T_Novedad = ?;";
            $this->connection->prepare($query)
                            ->execute(array(
                                $this->getNombre_T_Novedad()
 
                            ));
            return $this;
        }catch(Exception $e){
            die($e->getMessage());
        }
    }

    public function getById($Id_T_Novedad){
        try{
        $query= "SELECT * FROM products where Id_T_Novedad=?;";
        $query= $this-> connection-> prepare($query);
        $query->setFetchMode(PDO::FETCH_CLASS,__CLASS__);
        $query->execute(array($Id_T_Novedad));
        return $query->fetch();


    }catch(Exception $e){
        die($e->getMessage());
        }
    }
    public function delete(){
        try{
            $query= "DELETE FROM tipo_novedad WHERE Id_T_Novedad=?;";
            $this-> connection->prepare($query)
                            ->execute(array($this->Id_T_Novedad));
        }catch(Excepcion $e){
            die($e->getMessage());

        }
    }
    //getters y setters
    

    /**
     * Get the value of Id_T_Novedad
     */ 
    public function getId_T_Novedad()
    {
        return $this->Id_T_Novedad;
    }

    /**
     * Set the value of Id_T_Novedad
     *
     * @return  self
     */ 
    public function setId_T_Novedad($Id_T_Novedad)
    {
        $this->Id_T_Novedad = $Id_T_Novedad;

        return $this;
    }
    

    /**
     * Get the value of Nombre_T_Novedad
     */ 
    public function getNombre_T_Novedad()
    {
        return $this->Nombre_T_Novedad;
    }

    /**
     * Set the value of Nombre_T_Novedad
     *
     * @return  self
     */ 
    public function setNombre_T_Novedad($Nombre_T_Novedad)
    {
        $this->Nombre_T_Novedad = $Nombre_T_Novedad;

        return $this;
    }
}